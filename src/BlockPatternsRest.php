<?php
/**
 * Trims block pattern REST payloads for the Site Editor.
 *
 * @package Aegis
 */

declare(strict_types=1);

namespace Aegis;

use WP_Block_Patterns_Registry;
use WP_REST_Request;
use WP_REST_Response;
use function array_flip;
use function array_keys;
use function array_merge;
use function array_unique;
use function did_action;
use function file_get_contents;
use function get_template_directory;
use function glob;
use function is_array;
use function is_readable;
use function preg_match_all;

/**
 * Prevents multi-megabyte block-patterns REST responses from freezing the editor.
 *
 * Patterns referenced by theme templates and template parts must keep their content
 * so the editor can hydrate wp:pattern blocks (empty content yields blocks without attributes).
 */
final class BlockPatternsRest {

	/**
	 * Cached map of required pattern slugs.
	 *
	 * @var array<string, true>|null
	 */
	private static ?array $required_slugs = null;

	/**
	 * Hook the REST payload trimmer.
	 *
	 * @return void
	 */
	public static function boot(): void {
		add_filter( 'rest_request_after_callbacks', array( self::class, 'trim_patterns_payload' ), 100, 3 );
	}

	/**
	 * Pattern slugs required for Site Editor canvas hydration (templates, parts, nested refs).
	 *
	 * @return array<string, true>
	 */
	private static function get_required_slug_map(): array {
		if ( self::$required_slugs !== null ) {
			return self::$required_slugs;
		}

		$slugs = self::collect_pattern_slugs_from_theme_files();

		if ( did_action( 'init' ) ) {
			$slugs = self::expand_nested_pattern_slugs( $slugs );
		}

		self::$required_slugs = array_flip( array_unique( $slugs ) );

		return self::$required_slugs;
	}

	/**
	 * Collect pattern slugs referenced by theme templates and template parts.
	 *
	 * @return list<string>
	 */
	private static function collect_pattern_slugs_from_theme_files(): array {
		$slugs  = array();
		$theme  = get_template_directory();
		$groups = array( $theme . '/templates/*.html', $theme . '/parts/*.html' );

		foreach ( $groups as $glob_path ) {
			$files = glob( $glob_path );
			foreach ( is_array( $files ) ? $files : array() as $file ) {
				if ( ! is_readable( $file ) ) {
					continue;
				}

				$content = (string) file_get_contents( $file );
				if ( preg_match_all( '/<!-- wp:pattern \{"slug":"([^"]+)"/', $content, $matches ) ) {
					$slugs = array_merge( $slugs, $matches[1] );
				}
			}
		}

		return $slugs;
	}

	/**
	 * Includes nested wp:pattern slugs referenced inside required pattern content.
	 *
	 * @param array $seed Slugs from theme template files.
	 *
	 * @return list<string>
	 */
	private static function expand_nested_pattern_slugs( array $seed ): array {
		$registry = WP_Block_Patterns_Registry::get_instance();
		$queue    = array_unique( $seed );
		$seen     = array();

		while ( $queue !== array() ) {
			$slug = array_shift( $queue );
			if ( $slug === '' || isset( $seen[ $slug ] ) ) {
				continue;
			}

			$seen[ $slug ] = true;
			$pattern       = $registry->get_registered( $slug );
			if ( ! $pattern || empty( $pattern['content'] ) ) {
				continue;
			}

			if ( preg_match_all( '/<!-- wp:pattern \{"slug":"([^"]+)"/', (string) $pattern['content'], $matches ) ) {
				foreach ( $matches[1] as $nested ) {
					if ( ! isset( $seen[ $nested ] ) ) {
						$queue[] = $nested;
					}
				}
			}
		}

		return array_keys( $seen );
	}

	/**
	 * Resolve the slug for a REST pattern row.
	 *
	 * @param array<string, mixed> $pattern REST pattern row.
	 */
	private static function pattern_slug( array $pattern ): string {
		return (string) ( $pattern['name'] ?? $pattern['slug'] ?? '' );
	}

	/**
	 * Strip content from inserter-only patterns in the block-patterns REST payload.
	 *
	 * @param WP_REST_Response|\WP_Error $response Response.
	 * @param array                      $handler  Route handler.
	 * @param WP_REST_Request            $request  Current request.
	 */
	public static function trim_patterns_payload( $response, array $handler, WP_REST_Request $request ) {
		if ( ! $response instanceof WP_REST_Response ) {
			return $response;
		}

		if ( $request->get_route() !== '/wp/v2/block-patterns/patterns' || $request->get_method() !== 'GET' ) {
			return $response;
		}

		$data = $response->get_data();
		if ( ! is_array( $data ) ) {
			return $response;
		}

		$required = self::get_required_slug_map();

		foreach ( $data as $index => $pattern ) {
			if ( ! is_array( $pattern ) ) {
				continue;
			}

			$slug = self::pattern_slug( $pattern );
			if ( $slug === '' || isset( $required[ $slug ] ) ) {
				continue;
			}

			// Inserter-only patterns: metadata is enough at bootstrap.
			if ( array_key_exists( 'content', $pattern ) ) {
				$data[ $index ]['content'] = '';
			}
		}

		$response->set_data( $data );

		return $response;
	}
}
