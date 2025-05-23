<?php
/**
 * Icon.php
 *
 * Utility class for managing SVG icons in the Aegis WordPress theme.
 *
 * Handles icon set discovery, SVG retrieval and sanitation, REST API endpoints, and placeholder icons.
 *
 * @package   Aegis\Icons
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Icons;

use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Utilities\Str;
use DOMDocument;
use DOMElement;
use enshrined\svgSanitize\Sanitizer;
use WP_REST_Request;
use WP_REST_Server;
use function add_action;
use function add_filter;
use function apply_filters;
use function basename;
use function class_exists;
use function current_user_can;
use function esc_html__;
use function file_exists;
use function file_get_contents;
use function get_stylesheet_directory;
use function get_template_directory;
use function glob;
use function implode;
use function is_dir;
use function is_null;
use function str_replace;
use function strtolower;
use function trim;
use function uniqid;
use const GLOB_ONLYDIR;

/**
 * Icon utility class for the Aegis theme.
 *
 * Provides static methods to manage SVG icon sets, retrieve and sanitize SVGs, register REST endpoints,
 * and output placeholder icons for the Aegis WordPress theme.
 *
 * @package Aegis\Icons
 * @since   1.0.0
 */
class Icon {

	const FILTER = 'aegis_icon_sets';

	/**
	 * Returns an array of all icon sets and their directory paths.
	 *
	 * Scans the theme and child theme directories for icon sets and returns them as an associative array.
	 *
	 * @since 1.0.0
	 *
	 * @return array<string, string> Associative array of icon set slugs and their directory paths.
	 */
	public static function get_icon_sets(): array {
		$utility_dir    = dirname( __DIR__ ) . '/public/icons/';
		$template_dir   = get_template_directory() . '/assets/icons/';
		$stylesheet_dir = get_stylesheet_directory() . '/assets/icons/';

		$dirs = [
			...glob( $utility_dir . '*', GLOB_ONLYDIR ),
			...glob( $template_dir . '*', GLOB_ONLYDIR ),
			...glob( $stylesheet_dir . '*', GLOB_ONLYDIR ),
		];

		$found = [];

		foreach ( $dirs as $dir ) {
			$slug = basename( $dir );

			$found[] = [
				'label' => Str::title_case( $slug ),
				'value' => $slug,
			];
		}

		$db_option = get_option( 'aegis' )['iconSets'] ?? null;
		$options   = $db_option ?: $found;
		$icon_sets = [];

		foreach ( $options as $option ) {
			$value = $option['value'] ?? null;

			if ( is_null( $value ) ) {
				continue;
			}

			$utility = $utility_dir . $value;
			$parent  = $template_dir . $value;
			$child   = $stylesheet_dir . $value;

			if ( is_dir( $utility ) ) {
				$icon_sets[ $value ] = $utility;
			}

			if ( is_dir( $parent ) ) {
				$icon_sets[ $value ] = $parent;
			}

			if ( is_dir( $child ) ) {
				$icon_sets[ $value ] = $child;
			}
		}

		/**
		 * Filters the icon sets.
		 *
		 * @since 1.0.0
		 *
		 * @param array $icon_sets <string, string> Set name, set path.
		 */
		return apply_filters( static::FILTER, $icon_sets );
	}

	/**
	 * Returns SVG string for a given icon.
	 *
	 * Retrieves the SVG markup for a specified icon from a set, optionally setting its size and title.
	 *
	 * @since 1.0.0
	 *
	 * @param string          $set   Icon set slug.
	 * @param string          $name  Icon name (without extension).
	 * @param string|int|null $size  Optional. Icon size (may include units).
	 * @param string|null     $title Optional. Icon title for accessibility.
	 *
	 * @return string SVG markup for the requested icon, or an empty string if not found.
	 */
	public static function get_svg( string $set, string $name, $size = null, ?string $title = '' ): string {
		$set = strtolower( $set );

		static $cache = [];

		$cache_key = implode( '-', [ $set, $name, $size ] );

		if ( isset( $cache[ $cache_key ] ) ) {
			return $cache[ $cache_key ];
		}

		$icon_sets = static::get_icon_sets();

		if ( ! isset( $icon_sets[ $set ] ) ) {
			return '';
		}

		$dir  = $icon_sets[ $set ];
		$file = $dir . '/' . $name . '.svg';

		if ( ! file_exists( $file ) ) {
			return '';
		}

		$html = file_get_contents( $file );

		if ( $set === 'WordPress' ) {
			$html = str_replace(
				[ 'fill="none"' ],
				[ 'fill="currentColor"' ],
				$html
			);
		}

		$dom = DOM::create( trim( $html ) );
		$svg = DOM::get_element( 'svg', $dom );

		if ( ! $svg ) {
			return '';
		}

		$unique_id = 'icon-' . uniqid();

		$svg->setAttribute( 'role', 'img' );
		$svg->setAttribute( 'aria-labelledby', $unique_id );
		$svg->setAttribute( 'data-icon', $set . '-' . $name );

		$label     = $title ?: Str::title_case( $name ) . __( ' Icon', 'aegis' );
		$title_tag = DOM::create_element( 'title', $dom );

		$title_tag->appendChild( $dom->createTextNode( $label ) );
		$title_tag->setAttribute( 'id', $unique_id );

		$svg->insertBefore( $title_tag, $svg->firstChild );

		if ( $size ) {
			$has_unit = Str::contains_any( (string) $size, 'px', 'em', 'rem', '%', 'vh', 'vw' );

			if ( $has_unit ) {
				$styles = CSS::string_to_array( $svg->getAttribute( 'style' ) );

				$styles['min-width'] = $size;
				$styles['height']    = $size;

				$svg->setAttribute( 'style', CSS::array_to_string( $styles ) );
			} else {
				$svg->setAttribute( 'width', (string) $size );
				$svg->setAttribute( 'height', (string) $size );
			}
		}

		$fill = $svg->getAttribute( 'fill' );

		if ( ! $fill ) {
			$svg->setAttribute( 'fill', 'currentColor' );
		}

		$cache[ $cache_key ] = static::sanitize_svg( $dom->saveHTML() );

		return $cache[ $cache_key ];
	}

	/**
	 * Registers the icon REST API endpoint.
	 *
	 * Adds a REST route for retrieving icon data via the WordPress REST API.
	 *
	 * @since 1.0.0
	 *
	 * @param string $namespace Optional. Route namespace. Default 'aegis/v1'.
	 * @param string $route     Optional. Route path. Default '/icons/'.
	 *
	 * @return void
	 */
	public static function register_rest_route( string $namespace = 'aegis/v1', string $route = '/icons/' ): void {
		static $registered = [];

		if ( isset( $registered[ $namespace ] ) ) {
			return;
		}

		$registered[ $namespace ] = $route;

		$args = [
			'permission_callback' => static fn() => current_user_can( 'edit_posts' ),
			'callback'            => static fn( WP_REST_Request $request ): array => static::get_icon_data( $request ),
			'methods'             => WP_REST_Server::READABLE,
			[
				'args' => [
					'sets' => [
						'required' => false,
						'type'     => 'string',
					],
					'set'  => [
						'required' => false,
						'type'     => 'string',
					],
				],
			],
		];

		add_action(
			'rest_api_init',
			static fn() => register_rest_route( $namespace, $route, $args )
		);
	}

	/**
	 * Registers an icon set with the theme.
	 *
	 * Allows third-party plugins or themes to register additional icon sets.
	 *
	 * @since 1.0.0
	 *
	 * @param string $name Icon set name/slug.
	 * @param string $path Absolute path to the icon set directory.
	 *
	 * @return void
	 */
	public static function register_icon_set( string $name, string $path ): void {
		add_filter(
			static::FILTER,
			static fn( array $icon_sets ) => array_merge( $icon_sets, [ $name => $path ] )
		);
	}

	/**
	 * Returns a placeholder icon DOM element.
	 *
	 * Used as a fallback or placeholder in image blocks or icon fields.
	 *
	 * @since 1.0.0
	 *
	 * @param DOMDocument $dom DOMDocument instance to use for creating the element.
	 *
	 * @return DOMElement The placeholder SVG element.
	 */
	public static function get_placeholder( DOMDocument $dom ): DOMElement {
		$svg_title = esc_html__( 'Image placeholder', 'aegis' );
		$svg_icon  = <<<HTML
<svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 64 64" width="32" height="32">
	<title>$svg_title</title>
	<circle cx="52" cy="18" r="7"/>
	<path d="M47 32.1 39 41 23 20.9 0 55.1h64z"/>
</svg>
HTML;

		/**
		 * Filters the SVG icon for the placeholder image.
		 *
		 * @since 1.0.0
		 *
		 * @param string $svg_icon  SVG icon.
		 * @param string $svg_title SVG title.
		 */
		$svg_icon    = apply_filters( 'aegis_placeholder_svg', $svg_icon, $svg_title );
		$svg_icon    = static::sanitize_svg( $svg_icon );
		$svg_dom     = DOM::create( $svg_icon );
		$svg_element = DOM::get_element( 'svg', $svg_dom );

		if ( ! $svg_element ) {
			return DOM::create_element( 'span', $dom );
		}

		$svg_classes   = explode( ' ', $svg_element->getAttribute( 'class' ) );
		$svg_classes[] = 'wp-block-image__placeholder-icon';

		$svg_element->setAttribute( 'class', implode( ' ', $svg_classes ) );
		$svg_element->setAttribute( 'fill', 'currentColor' );

		$imported = $dom->importNode( $svg_element, true );

		return DOM::node_to_element( $imported );
	}

	/**
	 * Returns icon data for the REST endpoint.
	 *
	 * Returns all available icons, or icons for a specific set, for the REST API endpoint.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_REST_Request|null $request Optional. Request object.
	 *
	 * @return array|string Icon data array, set array, or icon markup string depending on request.
	 */
	public static function get_icon_data( ?WP_REST_Request $request ) {
		$icon_data = [];
		$icon_sets = Icon::get_icon_sets();

		foreach ( $icon_sets as $icon_set => $set_dir ) {
			$icons = glob( $set_dir . '/*.svg' );

			foreach ( $icons as $icon ) {
				$name = basename( $icon, '.svg' );

				$icon_data[ $icon_set ][ $name ] = static::get_svg( $icon_set, $name, 24, null );
			}
		}

		if ( $request && $request->get_param( 'set' ) ) {
			$set = $request->get_param( 'set' );

			return $icon_data[ $set ];
		}

		if ( $request && $request->get_param( 'sets' ) ) {
			return array_keys( $icon_data );
		}

		return $icon_data;
	}

	/**
	 * Sanitizes an SVG string for safe output.
	 *
	 * Uses the svgSanitize library if available and applies additional cleaning for output in WordPress.
	 *
	 * @since 1.0.0
	 *
	 * @param string $svg SVG string to sanitize.
	 *
	 * @return string Sanitized SVG markup.
	 */
	public static function sanitize_svg( string $svg ): string {

		// Sanitize SVG.
		if ( class_exists( 'enshrined\svgSanitize\Sanitizer' ) ) {
			static $sanitizer = null;

			if ( is_null( $sanitizer ) ) {
				$sanitizer = new Sanitizer();

				$sanitizer->minify( true );
				$sanitizer->removeXMLTag( true );
			}

			$svg = $sanitizer->sanitize( $svg ) ?: '';
		}

		// Remove comments.
		$svg = preg_replace( '/<!--(.|\s)*?-->/', '', $svg );

		// Remove new lines.
		$svg = preg_replace( '/\s+/', ' ', $svg );

		// Remove tabs.
		$svg = preg_replace( '/\t+/', '', $svg );

		// Remove spaces between tags.
		$svg = preg_replace( '/>\s+</', '><', $svg );

		// Correct viewBox.
		$svg = str_replace( 'viewbox=', 'viewBox=', $svg );

		return trim( $svg );
	}

}
