<?php
/**
 * Fast wp/v2/icons listing for the Icon library on WordPress 7.1+.
 *
 * @package Aegis\Framework\Icons
 * @since   1.0.2
 */

// Enforces strict type checking for all code in this file, ensuring type safety for the fast wp/v2/icons listing.
declare( strict_types=1 );

// Declares the namespace for the fast wp/v2/icons listing.
namespace Aegis\Framework\Icons;

// Imports classes, interfaces, and functions used by the fast wp/v2/icons listing.
use Aegis\Icons\Icon;
use Closure;
use WP_Icon_Collections_Registry;
use WP_Icons_Registry;
use WP_REST_Controller;
use WP_REST_Request;
use function class_exists;
use function delete_option;
use function dirname;
use function file_get_contents;
use function filemtime;
use function function_exists;
use function get_option;
use function is_array;
use function is_readable;
use function is_string;
use function is_wp_error;
use function md5;
use function rest_ensure_response;
use function serialize;
use function stripos;
use function update_option;
use function wp_get_theme;

/**
 * Serves the icon list routes without reading every registered SVG.
 *
 * Core's `WP_REST_Icons_Controller::get_items()` loads and sanitizes the
 * content of every registered icon before it filters by collection. With
 * the Aegis sets that is several thousand files on each request, so the
 * Icon library never finishes loading on slower hosts. This filters first,
 * then loads only the matching icons, and keeps the sanitized SVG of each
 * collection in a non-autoloaded option until its icons change.
 *
 * @since 1.0.2
 */
class RestIconsList {

	/**
	 * Option prefix for a collection's cached icon content.
	 */
	private const CACHE_PREFIX = 'aegis_icon_content_';

	/**
	 * Core controller the replaced routes belong to.
	 *
	 * @var WP_REST_Controller|null
	 */
	private ?WP_REST_Controller $controller = null;

	/**
	 * Points the core icon list routes at this class.
	 *
	 * Permission checks, arguments, and the schema stay core's.
	 *
	 * @since 1.0.2
	 *
	 * @param array $endpoints Registered REST endpoints.
	 *
	 * @return array
	 * @hook rest_endpoints
	 */
	public function replace_list_callbacks( $endpoints ) {
		if ( ! is_array( $endpoints ) || ! function_exists( 'wp_register_icon' ) || ! class_exists( WP_Icons_Registry::class ) ) {
			return $endpoints;
		}

		$list_routes = [
			'/wp/v2/icons',
			'/wp/v2/icons/(?P<collection>[a-z0-9](?:[a-z0-9_-]*[a-z0-9])?)',
		];
		$item_route  = '/wp/v2/icons/(?P<name>[a-z0-9](?:[a-z0-9_-]*[a-z0-9])?/[a-z0-9](?:[a-z0-9_-]*[a-z0-9])?)';

		foreach ( $endpoints as $route => $handlers ) {
			$is_list = in_array( $route, $list_routes, true );
			$is_item = $route === $item_route;

			if ( ! $is_list && ! $is_item ) {
				continue;
			}

			foreach ( (array) $handlers as $key => $handler ) {
				$callback = is_array( $handler ) ? ( $handler['callback'] ?? null ) : null;

				if ( ! is_array( $callback ) || ! ( $callback[0] ?? null ) instanceof WP_REST_Controller ) {
					continue;
				}

				$method = (string) ( $callback[1] ?? '' );

				if ( $is_list && $method !== 'get_items' ) {
					continue;
				}

				if ( $is_item && $method !== 'get_item' ) {
					continue;
				}

				$this->controller                        = $callback[0];
				$endpoints[ $route ][ $key ]['callback'] = [ $this, $method ];
			}
		}

		return $endpoints;
	}

	/**
	 * Single icon response with Aegis SVG sanitization for file-backed icons.
	 *
	 * @since 1.1.0
	 *
	 * @param WP_REST_Request $request Request object.
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	public function get_item( $request ) {
		$controller = $this->controller;

		if ( $controller === null ) {
			return rest_ensure_response( [] );
		}

		$icon = $controller->get_icon( (string) $request['name'] );

		if ( is_wp_error( $icon ) ) {
			return $icon;
		}

		$file = (string) ( $icon['file_path'] ?? '' );
		$svg  = $this->sanitize_file_svg( $file );

		if ( $svg !== '' ) {
			$icon['content'] = $svg;
		}

		return rest_ensure_response( $controller->prepare_item_for_response( $icon, $request ) );
	}

	/**
	 * Lists icons, filtered by collection and search before any file is read.
	 *
	 * Same response as core: icon fields come from the core controller.
	 *
	 * @since 1.0.2
	 *
	 * @param WP_REST_Request $request Request object.
	 *
	 * @return \WP_REST_Response|\WP_Error
	 */
	public function get_items( $request ) {
		$controller = $this->controller;
		$collection = $request->get_param( 'collection' );

		if ( $controller === null || ( $collection !== null && ! is_string( $collection ) ) ) {
			return $controller ? $controller->get_items( $request ) : rest_ensure_response( [] );
		}

		// Core's 404 for an unknown collection.
		if ( $collection !== null && ! WP_Icon_Collections_Registry::get_instance()->is_registered( $collection ) ) {
			return $controller->get_items( $request );
		}

		$search   = (string) $request->get_param( 'search' );
		$registry = WP_Icons_Registry::get_instance();
		$icons    = Closure::bind(
			static function ( WP_Icons_Registry $instance ): array {
				return $instance->registered_icons;
			},
			null,
			WP_Icons_Registry::class
		)( $registry );

		// Group the matching icons by collection, as core would filter them.
		$groups = [];

		foreach ( $icons as $name => $icon ) {
			$icon_collection = (string) ( $icon['collection'] ?? '' );

			if ( $collection !== null && $icon_collection !== $collection ) {
				continue;
			}

			if ( $search !== ''
				&& false === stripos( (string) $name, $search )
				&& false === stripos( (string) ( $icon['label'] ?? '' ), $search )
			) {
				continue;
			}

			$groups[ $icon_collection ][ $name ] = $icon;
		}

		$response = [];

		foreach ( $groups as $group => $group_icons ) {
			$content = $this->get_collection_content( (string) $group, $registry, $icons );

			foreach ( $group_icons as $name => $icon ) {
				$icon['content'] = $icon['content'] ?? ( $content[ $name ] ?? null );

				if ( $icon['content'] === null ) {
					continue;
				}

				$response[] = $controller->prepare_response_for_collection( $controller->prepare_item_for_response( $icon, $request ) );
			}
		}

		return rest_ensure_response( $response );
	}

	/**
	 * Sanitized SVG content of every icon in a collection, cached per collection.
	 *
	 * The cache is rebuilt when the collection's icons, their folders, or the
	 * theme version change. Aegis file-backed icons are sanitized with the
	 * icons package (keeps brand payment `rect`/`circle` fills). Core's
	 * registry kses only allows `path`/`polygon` and would strip those.
	 *
	 * @since 1.0.2
	 *
	 * @param string            $collection Collection slug.
	 * @param WP_Icons_Registry $registry   Icons registry.
	 * @param array             $icons      All registered icons.
	 *
	 * @return array<string, string> Icon name => SVG.
	 */
	private function get_collection_content( string $collection, WP_Icons_Registry $registry, array $icons ): array {
		$files = [];
		$dirs  = [];

		foreach ( $icons as $name => $icon ) {
			if ( (string) ( $icon['collection'] ?? '' ) !== $collection ) {
				continue;
			}

			$file           = (string) ( $icon['file_path'] ?? '' );
			$files[ $name ] = $file;
			$dir            = dirname( $file );

			if ( ! isset( $dirs[ $dir ] ) ) {
				// Adding, removing, or renaming an icon changes its folder's mtime.
				$dirs[ $dir ] = @filemtime( $dir ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
			}
		}

		// Bump cache when sanitizer strategy or payment SVG paints change.
		$signature = md5( serialize( [ 'v7-aegis-svg', $files, $dirs, wp_get_theme( 'aegis' )->get( 'Version' ) ] ) );
		$option    = self::CACHE_PREFIX . $collection;
		$cached    = get_option( $option );

		if ( is_array( $cached ) && ( $cached['signature'] ?? '' ) === $signature && is_array( $cached['icons'] ?? null ) ) {
			return $cached['icons'];
		}

		$content = [];

		foreach ( $files as $name => $file ) {
			$svg = $this->sanitize_file_svg( $file );

			if ( $svg !== '' ) {
				$content[ $name ] = $svg;
				continue;
			}

			$icon = $registry->get_registered_icon( $name );

			if ( is_array( $icon ) && is_string( $icon['content'] ?? null ) && $icon['content'] !== '' ) {
				$content[ $name ] = $icon['content'];
			}
		}

		delete_option( $option );
		update_option(
			$option,
			[
				'signature' => $signature,
				'icons'     => $content,
			],
			false
		);

		return $content;
	}

	/**
	 * Reads and sanitizes an icon SVG from disk with the Aegis sanitizer.
	 *
	 * @param string $file Absolute path to an .svg file.
	 */
	private function sanitize_file_svg( string $file ): string {
		if ( $file === '' || ! is_readable( $file ) ) {
			return '';
		}

		$raw = file_get_contents( $file );

		if ( ! is_string( $raw ) || $raw === '' ) {
			return '';
		}

		return Icon::sanitize_svg( $raw );
	}
}
