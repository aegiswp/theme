<?php
/**
 * Hides theme patterns whose blocks are not available on the site.
 *
 * Several theme patterns use WooCommerce blocks (shop, product, cart and
 * checkout layouts, and the cart and account icons in the headers) or blocks
 * from the Aegis plugin (maps). Without those plugins, the editor shows each
 * missing block as an "unsupported block" placeholder.
 *
 * - Header patterns keep their layout: standalone missing blocks are removed.
 * - Every other pattern with a missing block is unregistered.
 *
 * Runs only when the patterns REST endpoint is requested, which is how the
 * post and site editors load patterns. On the front end, unregistered blocks
 * already render as nothing, so other requests skip this work.
 *
 * @package Aegis
 * @since   1.0.1
 */

declare( strict_types=1 );

namespace Aegis;

use WP_Block_Patterns_Registry;
use WP_Block_Type_Registry;
use function add_filter;
use function array_diff_key;
use function array_flip;
use function array_keys;
use function array_unique;
use function get_stylesheet;
use function get_stylesheet_directory;
use function get_template;
use function get_template_directory;
use function in_array;
use function preg_match_all;
use function preg_quote;
use function preg_replace;
use function register_block_pattern;
use function str_starts_with;
use function strstr;
use function wp_doing_ajax;
use function wp_doing_cron;
use function wp_normalize_path;

/**
 * Removes theme pattern blocks that the site cannot render in the editor.
 */
final class PatternDependencies {

	/**
	 * Pattern slug prefixes whose missing blocks are removed instead of the pattern.
	 *
	 * @var string[]
	 */
	private const STRIP_PREFIXES = array( 'header-' );

	/**
	 * Registers the hooks.
	 *
	 * @return void
	 */
	public static function init(): void {
		add_filter( 'rest_pre_dispatch', array( self::class, 'before_patterns_request' ), 10, 3 );
	}

	/**
	 * Filters the registry right before the editor reads the patterns endpoint.
	 *
	 * @param mixed            $result  Response to replace the requested version with.
	 * @param \WP_REST_Server  $server  Server instance.
	 * @param \WP_REST_Request $request Request used to generate the response.
	 * @return mixed Unchanged result.
	 */
	public static function before_patterns_request( $result, $server, $request ) {
		if ( $request instanceof \WP_REST_Request && str_starts_with( $request->get_route(), '/wp/v2/block-patterns/patterns' ) ) {
			self::filter_patterns();
		}

		return $result;
	}

	/**
	 * Strips or unregisters theme patterns that use unregistered blocks.
	 *
	 * @return void
	 */
	public static function filter_patterns(): void {
		static $done = false;

		// AJAX and cron requests never serve patterns to the editor, and some
		// plugins (WooCommerce) skip registering their blocks there.
		if ( $done || wp_doing_ajax() || wp_doing_cron() ) {
			return;
		}
		$done = true;

		$patterns = WP_Block_Patterns_Registry::get_instance();
		$blocks   = WP_Block_Type_Registry::get_instance();
		$dirs     = array_unique(
			array(
				wp_normalize_path( get_template_directory() ) . '/',
				wp_normalize_path( get_stylesheet_directory() ) . '/',
			)
		);

		$themes = array( get_template(), get_stylesheet() );

		foreach ( $patterns->get_all_registered() as $pattern ) {
			$file     = wp_normalize_path( (string) ( $pattern['filePath'] ?? '' ) );
			$is_theme = in_array( (string) ( $pattern['theme'] ?? '' ), $themes, true )
				|| ( '' !== $file && self::in_dirs( $file, $dirs ) );

			if ( ! $is_theme ) {
				continue;
			}

			$content = (string) ( $pattern['content'] ?? '' );
			$missing = self::missing_blocks( $content, $blocks );

			if ( ! $missing ) {
				continue;
			}

			$name = (string) $pattern['name'];
			$patterns->unregister( $name );

			if ( ! self::is_strippable( $name ) ) {
				continue;
			}

			$stripped = self::strip_blocks( $content, $missing );

			if ( self::missing_blocks( $stripped, $blocks ) ) {
				continue;
			}

			$properties            = array_diff_key( $pattern, array_flip( array( 'name', 'filePath' ) ) );
			$properties['content'] = $stripped;

			register_block_pattern( $name, $properties );
		}
	}

	/**
	 * Whether a file lives in one of the theme directories.
	 *
	 * @param string   $file File path.
	 * @param string[] $dirs Theme directories with trailing slashes.
	 * @return bool
	 */
	private static function in_dirs( string $file, array $dirs ): bool {
		foreach ( $dirs as $dir ) {
			if ( str_starts_with( $file, $dir ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Whether missing blocks are removed from this pattern instead of hiding it.
	 *
	 * @param string $name Pattern name.
	 * @return bool
	 */
	private static function is_strippable( string $name ): bool {
		foreach ( self::STRIP_PREFIXES as $prefix ) {
			if ( str_starts_with( $name, $prefix ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Lists non-core block names in the markup whose plugin is not active.
	 *
	 * Some plugins register inner blocks in JavaScript only (WooCommerce cart
	 * and checkout blocks, for example), so a block missing from the server
	 * registry is treated as unavailable only when no block in its namespace is
	 * registered. Aegis blocks are all registered on the server, so they are
	 * checked one by one (the map block comes from the Aegis plugin).
	 *
	 * @param string                 $content Block markup.
	 * @param WP_Block_Type_Registry $blocks  Block type registry.
	 * @return string[]
	 */
	private static function missing_blocks( string $content, WP_Block_Type_Registry $blocks ): array {
		preg_match_all( '#<!--\s+wp:([a-z0-9-]+/[a-z0-9-]+)[\s/]#', $content, $matches );

		$missing = array();
		foreach ( array_unique( $matches[1] ) as $block_name ) {
			if ( str_starts_with( $block_name, 'core/' ) || $blocks->is_registered( $block_name ) ) {
				continue;
			}

			$prefix = strstr( $block_name, '/', true );

			if ( 'aegis' === $prefix || ! self::namespace_registered( (string) $prefix, $blocks ) ) {
				$missing[] = $block_name;
			}
		}

		return $missing;
	}

	/**
	 * Whether any block in a namespace is registered on the server.
	 *
	 * @param string                 $prefix Block namespace.
	 * @param WP_Block_Type_Registry $blocks    Block type registry.
	 * @return bool
	 */
	private static function namespace_registered( string $prefix, WP_Block_Type_Registry $blocks ): bool {
		static $namespaces = null;

		if ( null === $namespaces ) {
			$namespaces = array();
			foreach ( array_keys( $blocks->get_all_registered() ) as $registered ) {
				$namespaces[ (string) strstr( $registered, '/', true ) ] = true;
			}
		}

		return isset( $namespaces[ $prefix ] );
	}

	/**
	 * Removes self-closing blocks with the given names.
	 *
	 * Blocks with inner content are left in place, so the caller can detect them.
	 *
	 * @param string   $content Block markup.
	 * @param string[] $names   Block names to remove.
	 * @return string
	 */
	private static function strip_blocks( string $content, array $names ): string {
		foreach ( $names as $block_name ) {
			$content = (string) preg_replace(
				'#[ \t]*<!--\s+wp:' . preg_quote( $block_name, '#' ) . '(?:\s+\{.*?\})?\s+/-->\s*#s',
				'',
				$content
			);
		}

		return $content;
	}
}
