<?php
/**
 * Patterns Component
 *
 * Provides support for registering, loading, and managing block patterns for the Aegis Framework.
 *
 * Responsibilities:
 * - Registers and manages default and custom block patterns
 * - Integrates with the block editor and theme patterns directory
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for patterns component.
declare( strict_types=1 );

// Declares the namespace for the patterns component.
namespace Aegis\Framework\DesignSystem;

// Imports classes, interfaces, and functions used by the patterns component.
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Utilities\Debug;
use Aegis\Utilities\Pattern;
use WP_Block;
use WP_Block_Patterns_Registry;
use function apply_filters;
use function array_diff_key;
use function array_intersect_key;
use function array_unique;
use function basename;
use function class_exists;
use function defined;
use function esc_html;
use function render_block;
use function filemtime;
use function function_exists;
use function get_option;
use function get_stylesheet;
use function get_stylesheet_directory;
use function glob;
use function in_array;
use function is_admin;
use function is_dir;
use function is_string;
use function ksort;
use function register_block_pattern_category;
use function remove_theme_support;
use function rest_get_url_prefix;
use function str_contains;
use function str_replace;
use function strtoupper;
use function trailingslashit;
use function ucwords;
use function update_option;
use function wp_get_theme;
use function wp_unslash;

/**
 * Patterns extension.
 *
 * @since 1.0.0
 */
class Patterns implements Renderable {

	/**
	 * Removes core block patterns.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init 9
	 *
	 * @return void
	 */
	function remove_core_patterns(): void {
		remove_theme_support( 'core-block-patterns' );
	}

	/**
	 * Prevent WordPress core from scanning the theme patterns/ directory.
	 *
	 * This class registers patterns with computed slugs ({category}-{slug}).
	 * Core would register duplicates using the raw Slug header.
	 *
	 * @hook theme_block_pattern_files
	 *
	 * @return array
	 */
	public function disable_core_pattern_files(): array {
		return [];
	}

	/**
	 * Manually registers default patterns to avoid loading in child themes.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 *
	 * @return void
	 */
	public function register_default_patterns(): void {
		$all_dirs   = $this->get_pattern_dirs();
		$categories = [];

		$this->load_cache();

		$this->files_validated = $this->should_validate_files();

		foreach ( $all_dirs as $dir ) {
			$files    = $this->get_dir_files( $dir );
			$category = basename( $dir );

			// PHP casts numeric directory names (e.g. patterns/404/) to int array keys.
			if ( ctype_digit( $category ) ) {
				$category = 'error-' . $category;
			}

			foreach ( $files as $file ) {
				$pattern = basename( $file, '.php' );

				if ( ! isset( $categories[ $category ] ) ) {
					$categories[ $category ] = [];
				}

				$categories[ $category ][ $pattern ] = $file;
			}
		}

		$categories = apply_filters( 'aegis_patterns', $categories );

		ksort( $categories );

		$registered_categories = [];

		foreach ( $categories as $category => $patterns ) {
			$category = (string) $category;

			if ( ! array_key_exists( $category, $registered_categories ) ) {

				if ( in_array( $category, [ 'cta', 'faq' ], true ) ) {
					$label = strtoupper( $category );
				} else {
					$label = ucwords( str_replace( '-', ' ', $category ) );
				}

				register_block_pattern_category(
					$category,
					[
						'label' => $label,
					]
				);

				$registered_categories[ $category ] = [];
			}

			foreach ( $patterns as $pattern => $file ) {
				$basename = basename( $file, '.php' );

				if ( in_array( $basename, $registered_categories[ $category ], true ) ) {
					continue;
				}

				// Plugin commerce patterns own these slugs when WooCommerce is active.
				if ( $this->skip_theme_commerce_overlay( $category, $basename ) ) {
					continue;
				}

				$registered_categories[ $category ][] = $basename;

				$pattern = $this->get_file_pattern( $file, $this->files_validated );

				Pattern::register( $pattern );

				$this->registered_files[ $file ] = (string) ( $pattern['slug'] ?? '' );
			}
		}

		$this->save_cache();
	}

	/**
	 * Re-checks pattern files when a template asks for an unknown slug.
	 *
	 * Front-end requests trust cached headers, so a slug edited in a pattern
	 * file is picked up here, the first time a template references it.
	 *
	 * @param string|null $pre_render   The pre-rendered content.
	 * @param array       $parsed_block The block being rendered.
	 *
	 * @hook pre_render_block
	 *
	 * @return string|null Unchanged pre-rendered content.
	 */
	public function revalidate_on_missing_pattern( $pre_render, array $parsed_block ) {
		if ( $this->files_validated || ( $parsed_block['blockName'] ?? '' ) !== 'core/pattern' ) {
			return $pre_render;
		}

		$slug = $parsed_block['attrs']['slug'] ?? '';

		if ( ! is_string( $slug ) || $slug === '' || WP_Block_Patterns_Registry::get_instance()->is_registered( $slug ) ) {
			return $pre_render;
		}

		$this->files_validated = true;

		$registry = WP_Block_Patterns_Registry::get_instance();

		foreach ( $this->registered_files as $file => $old_slug ) {
			$before = $this->cache['files'][ $file ]['pattern'] ?? null;
			$after  = $this->get_file_pattern( $file, true );

			if ( $after === $before ) {
				continue;
			}

			if ( $old_slug !== '' && $registry->is_registered( $old_slug ) ) {
				$registry->unregister( $old_slug );
			}

			Pattern::register( $after );

			$this->registered_files[ $file ] = (string) ( $after['slug'] ?? '' );
		}

		$this->save_cache();

		return $pre_render;
	}

	/**
	 * Whether this request checks each pattern file for header edits.
	 *
	 * The editor, REST API and WP-CLI read pattern titles and categories, so
	 * they always check. Front-end requests only need slugs, and content is
	 * always read from the file itself.
	 *
	 * @return bool
	 */
	private function should_validate_files(): bool {
		if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
			return true;
		}

		// REST_REQUEST is not defined until after init, so check the URL.
		$uri = (string) wp_unslash( $_SERVER['REQUEST_URI'] ?? '' ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

		return isset( $_GET['rest_route'] ) // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			|| str_contains( $uri, '/' . rest_get_url_prefix() . '/' );
	}

	/**
	 * Whether pattern files were checked for header edits this request.
	 */
	private bool $files_validated = false;

	/**
	 * Registered pattern slugs keyed by file path.
	 *
	 * @var array<string, string>
	 */
	private array $registered_files = [];

	/**
	 * Option caching pattern directory listings and parsed file headers.
	 */
	private const CACHE_OPTION = 'aegis_pattern_headers';

	/**
	 * Cached listings and headers, loaded once per request.
	 *
	 * Listing and reading hundreds of pattern files on every request is slow
	 * on some hosts (open_basedir checks each file), so directory listings
	 * are reused until the directory's mtime changes, and parsed headers
	 * until the file's mtime changes.
	 *
	 * @var array{theme?: string, dirs: array<string, array>, files: array<string, array>}
	 */
	private array $cache = [
		'dirs'  => [],
		'files' => [],
	];

	/**
	 * Whether the cache changed during this request.
	 */
	private bool $cache_dirty = false;

	/**
	 * Directories and files read during this request, keyed by path.
	 *
	 * @var array{dirs: array<string, true>, files: array<string, true>}
	 */
	private array $seen = [
		'dirs'  => [],
		'files' => [],
	];

	/**
	 * Loads the cache, discarding it when the active theme or its version changed.
	 *
	 * A theme update can rewrite pattern headers in files front-end requests
	 * do not re-check, so each release starts with a fresh cache.
	 *
	 * @return void
	 */
	private function load_cache(): void {
		$cache  = get_option( self::CACHE_OPTION, [] );
		$active = wp_get_theme();
		$parent = $active->parent();
		$theme  = get_stylesheet() . '@' . $active->get( 'Version' ) . ( $parent ? '|' . $parent->get_stylesheet() . '@' . $parent->get( 'Version' ) : '' );

		if ( ! is_array( $cache ) || ( $cache['theme'] ?? null ) !== $theme || ! is_array( $cache['dirs'] ?? null ) || ! is_array( $cache['files'] ?? null ) ) {
			$cache = [
				'theme' => $theme,
				'dirs'  => [],
				'files' => [],
			];

			$this->cache_dirty = true;
		}

		$this->cache = $cache;
	}

	/**
	 * Saves the cache when it changed.
	 *
	 * @return void
	 */
	private function save_cache(): void {
		// Drop removed files and directories.
		foreach ( [ 'dirs', 'files' ] as $type ) {
			$unseen = array_diff_key( $this->cache[ $type ], $this->seen[ $type ] );

			if ( $unseen ) {
				$this->cache[ $type ] = array_intersect_key( $this->cache[ $type ], $this->seen[ $type ] );
				$this->cache_dirty    = true;
			}
		}

		if ( $this->cache_dirty ) {
			update_option( self::CACHE_OPTION, $this->cache, false );
			$this->cache_dirty = false;
		}
	}

	/**
	 * Pattern files in a category directory.
	 *
	 * @param string $dir Category directory.
	 *
	 * @return string[] Absolute file paths.
	 */
	private function get_dir_files( string $dir ): array {
		$mtime = @filemtime( $dir ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
		$entry = $this->cache['dirs'][ $dir ] ?? null;

		$this->seen['dirs'][ $dir ] = true;

		if ( $mtime === false || ! is_array( $entry ) || ( $entry['mtime'] ?? null ) !== $mtime || ! is_array( $entry['names'] ?? null ) ) {
			$names = [];

			foreach ( glob( $dir . '/*.php' ) ?: [] as $file ) {
				$names[] = basename( $file );
			}

			$entry = [
				'mtime' => $mtime,
				'names' => $names,
			];

			$this->cache['dirs'][ $dir ] = $entry;
			$this->cache_dirty           = true;
		}

		$files = [];

		foreach ( $entry['names'] as $name ) {
			$files[] = $dir . '/' . $name;
		}

		return $files;
	}

	/**
	 * Parsed pattern data for a file, from its header.
	 *
	 * @param string $file     Pattern file path.
	 * @param bool   $validate Whether to re-read the header when the file changed.
	 *
	 * @return array
	 */
	private function get_file_pattern( string $file, bool $validate ): array {
		$entry = $this->cache['files'][ $file ] ?? null;

		$this->seen['files'][ $file ] = true;

		if ( ! $validate && is_array( $entry ) && is_array( $entry['pattern'] ?? null ) ) {
			return $entry['pattern'];
		}

		$mtime = @filemtime( $file ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged

		if ( $mtime !== false && is_array( $entry ) && ( $entry['mtime'] ?? null ) === $mtime && is_array( $entry['pattern'] ?? null ) ) {
			return $entry['pattern'];
		}

		$pattern = $mtime === false ? [] : Pattern::parse_headers( $file );

		$this->cache['files'][ $file ] = [
			'mtime'   => $mtime,
			'pattern' => $pattern,
		];
		$this->cache_dirty             = true;

		return $pattern;
	}

	/**
	 * Renders the block.
	 *
	 * @param string   $block_content Block content.
	 * @param array    $block         Block attributes.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook render_block_core/pattern
	 * @hook render_block_aegis/pattern
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$slug = $block['attrs']['slug'] ?? '';
		$name = $block['blockName'] ?? '';

		if ( ! is_string( $slug ) ) {
			return $block_content;
		}

		if ( ! $block_content && $name === 'aegis/pattern' ) {
			// Build the block from data so the slug cannot inject block markup.
			$block_content = render_block(
				[
					'blockName'    => 'core/pattern',
					'attrs'        => [ 'slug' => $slug ],
					'innerBlocks'  => [],
					'innerHTML'    => '',
					'innerContent' => [],
				]
			);
		}

		if ( ! Debug::is_enabled() || ! $slug ) {
			return $block_content;
		}

		// HTML comments cannot contain "--", so strip it along with markup.
		$slug = str_replace( '--', '', esc_html( $slug ) );

		return <<<HTML
<!-- $slug -->
	$block_content
<!-- /$slug -->
HTML;
	}

	/**
	 * Skip theme patterns that the companion plugin overlays when WooCommerce is on.
	 *
	 * `header-default` stays in the theme (no Woo blocks) so the site header
	 * still resolves when WooCommerce is inactive or the companion plugin is
	 * not loaded. Only skip when the plugin is present and will register the
	 * mini-cart overlay for the same slug.
	 */
	private function skip_theme_commerce_overlay( string $category, string $basename ): bool {
		if ( 'header' !== $category || 'default' !== $basename ) {
			return false;
		}

		// Without the companion plugin there is no overlay — keep the theme pattern.
		if ( ! class_exists( \Aegis\Plugin\Integrations\WooCommerce::class ) ) {
			return false;
		}

		return \Aegis\Plugin\Integrations\WooCommerce::is_plugin_active();
	}

	/**
	 * Returns array of pattern directories.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function get_pattern_dirs(): array {
		$template_dir   = get_template_directory();
		$stylesheet_dir = get_stylesheet_directory();
		$default_dirs   = [];
		$default_dirs[] = $stylesheet_dir . '/patterns';

		$dirs = apply_filters( 'aegis_pattern_dirs', $default_dirs );

		$category_dirs = [];

		// Register parent template patterns.
		if ( $template_dir !== $stylesheet_dir ) {
			$category_dirs[] = $template_dir . '/patterns/template';
		}

		foreach ( $dirs as $dir ) {
			$dir = trailingslashit( $dir );

			if ( ! is_dir( $dir ) ) {
				continue;
			}

			foreach ( glob( $dir . '*', GLOB_ONLYDIR ) ?: [] as $category_dir ) {
				$basename = basename( $category_dir );

				if ( str_starts_with( $basename, '.' ) ) {
					continue;
				}

				$category_dirs[] = $category_dir;
			}
		}

		return array_unique( $category_dirs );
	}
}
