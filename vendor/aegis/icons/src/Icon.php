<?php
/**
 * Icon Utilities
 *
 * Provides a comprehensive suite of static methods for managing, sanitizing, and
 * delivering SVG icons within the Aegis theme environment. This class handles
 * everything from discovering icon sets in the theme's directory structure to
 * exposing them via a secure REST API endpoint.
 *
 * Responsibilities:
 * - Dynamically discovers and registers SVG icon sets from predefined directories.
 * - Provides a REST API endpoint for fetching icon data, supporting client-side UIs.
 * - Sanitizes SVG code to prevent XSS vulnerabilities using the `enshrined/svg-sanitize` library.
 * - Generates SVG markup with appropriate ARIA attributes for accessibility.
 * - Caches retrieved icons to optimize performance.
 *
 * @package    Aegis\Icons
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file.
declare( strict_types=1 );

// Declares the namespace for the Aegis icon utilities.
namespace Aegis\Icons;

// Imports external classes and WordPress functions for icon management.
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

// Provides static methods for SVG icon management, sanitization, and REST API integration.

/**
 * Manages SVG icons for the Aegis theme.
 *
 * This utility class provides a centralized system for handling SVG icons. It
 * automatically discovers icon sets, provides methods to retrieve and sanitize
 * individual SVGs, and exposes all icons through a WordPress REST API endpoint.
 * All methods are static, so no instantiation is required.
 *
 * @package Aegis\Icons
 * @since   1.0.0
 */
class Icon {

	/**
	 * The filter hook name used to modify the list of icon sets.
	 *
	 * @since 1.0.0
	 *
	 * @var   string
	 */
	const FILTER = 'aegis_icon_sets';

	/**
	 * Discovers and returns all available icon sets.
	 *
	 * This method scans the parent theme, child theme, and the plugin's own
	 * `public/icons` directory to find icon set subdirectories. It also checks for
	 * a theme option (`aegis['iconSets']`) that may define a specific list of sets
	 * to use. The results are passed through a filter to allow for customization.
	 *
	 * @since  1.0.0
	 *
	 * @return array<string, string> An associative array where keys are icon set slugs
	 *                               and values are their absolute directory paths.
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
	 * Retrieves and sanitizes the SVG markup for a specific icon.
	 *
	 * This method fetches an SVG file from the specified set, sanitizes it to
	 * prevent security issues, and adds necessary attributes for accessibility and
	 * styling. It includes an in-memory static cache to avoid redundant file
	 * operations and processing for the same icon within a single request.
	 *
	 * @since  1.0.0
	 *
	 * @param  string          $set   The slug of the icon set (e.g., 'social').
	 * @param  string          $name  The filename of the icon without the .svg extension.
	 * @param  string|int|null $size  Optional. The desired size for the icon, which sets
	 *                                its width and height attributes.
	 * @param  ?string         $title Optional. A title for the SVG, used for the `<title>`
	 *                                element for accessibility. Defaults to an empty string.
	 *
	 * @return string                 The sanitized, complete SVG markup, or an empty string
	 *                                if the icon is not found.
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
	 * Registers the REST API endpoint for accessing icon data.
	 *
	 * This sets up a `GET` endpoint that allows authenticated users with the
	 * `edit_posts` capability to fetch a list of all icons or icons from a
	 * specific set. The endpoint is only registered once per namespace.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $namespace The REST API namespace (e.g., 'aegis/v1').
	 * @param  string $route     The specific route for the icons endpoint.
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
	 * Registers a new icon set programmatically.
	 *
	 * This method provides a way for other parts of the theme or plugins to add
	 * a new icon set by hooking into the `aegis_icon_sets` filter. It's a simple
	 * wrapper around `add_filter`.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $name The slug for the new icon set.
	 * @param  string $path The absolute path to the directory containing the SVGs.
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
	 * Generates a generic placeholder icon as a DOMElement.
	 *
	 * This creates a default SVG placeholder, commonly used for images that are
	 * loading or missing. The generated SVG is filterable via `aegis_placeholder_svg`
	 * and is returned as a `DOMElement` ready to be imported into another `DOMDocument`.
	 *
	 * @since  1.0.0
	 *
	 * @param  DOMDocument $dom The `DOMDocument` instance to which the new element
	 *                        will belong.
	 *
	 * @return DOMElement     The generated placeholder icon as a `DOMElement`.
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
	 * Gathers and returns icon data for the REST API endpoint.
	 *
	 * This method compiles a structured array of all available icons, grouped by set.
	 * It can return all icon data, just the data for a specific set, or a list of
	 * available set names, depending on the request parameters.
	 *
	 * @since  1.0.0
	 *
	 * @param  ?WP_REST_Request $request The incoming REST request object. Can be null if called directly.
	 *
	 * @return array<string, mixed>|string[] The icon data, which varies based on request parameters.
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
	 * Cleans and sanitizes an SVG string for safe output.
	 *
	 * This method performs several operations to secure and optimize the SVG markup:
	 * 1. Uses `enshrined/svg-sanitize` to remove malicious code if the library is available.
	 * 2. Strips XML comments and unnecessary whitespace.
	 * 3. Normalizes the `viewBox` attribute casing.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $svg The raw SVG markup to be sanitized.
	 *
	 * @return string      The sanitized and trimmed SVG markup.
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
