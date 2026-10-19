<?php
/**
 * Icon Utilities
 *
 * Provides utility functions and classes for SVG icon management, sanitization, and REST API integration.
 *
 * Responsibilities:
 * - Loads and sanitizes SVG icons from the filesystem
 * - Exposes icon management endpoints via the WordPress REST API
 * - Integrates with DOM and CSS utilities for icon manipulation
 * - Ensures security and proper permissions for icon access
 *
 * @package    Aegis\Icons
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this doc update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for icon utilities.
declare( strict_types=1 );

// Declares the namespace for the icon utilities.
namespace Aegis\Icons;

// Imports classes, interfaces, and functions used by the icon utilities.
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
use function defined;
use function explode;
use function esc_html__;
use function file_exists;
use function file_get_contents;
use function function_exists;
use function get_stylesheet_directory;
use function get_template_directory;
use function glob;
use function implode;
use function in_array;
use function is_array;
use function is_dir;
use function is_numeric;
use function is_null;
use function is_readable;
use function is_string;
use function str_replace;
use function strtolower;
use function trim;
use function uniqid;

use const GLOB_ONLYDIR;

/**
 * Icon utility class.
 *
 * @since 1.0.0
 */
class Icon {

	const FILTER = 'aegis_icon_sets';

	/**
	 * Returns array of all icon sets and their directory path.
	 *
	 * @since 1.0.0
	 *
	 * @return array <string, string>
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
	 * Returns SVG string for given icon.
	 *
	 * @since 1.0.0
	 *
	 * @param string          $set   Icon set.
	 * @param string          $name  Icon name.
	 * @param string|int|null $size  Icon size.
	 * @param ?string         $title Icon title.
	 *
	 * @return string
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
			if ( $set === 'wordpress' && function_exists( 'wp_get_icon' ) ) {
				$core = wp_get_icon(
					'core/' . $name,
					[
						'size' => is_numeric( $size ) ? (int) $size : 24,
					]
				);

				if ( is_string( $core ) && $core !== '' ) {
					$cache[ $cache_key ] = $core;

					return $core;
				}
			}

			return '';
		}

		$html = file_get_contents( $file );

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

				// Payment card marks use a 3:2 frame; a square height crushes them in the editor.
				if ( str_starts_with( $set, 'payment' ) ) {
					$styles['width']        = $size;
					$styles['height']       = 'auto';
					$styles['aspect-ratio'] = '3 / 2';
				} else {
					$styles['height'] = $size;
				}

				$svg->setAttribute( 'style', CSS::array_to_string( $styles ) );
			} else {
				$svg->setAttribute( 'width', (string) $size );

				if ( str_starts_with( $set, 'payment' ) ) {
					$svg->setAttribute( 'height', (string) ( (float) $size * 2 / 3 ) );
				} else {
					$svg->setAttribute( 'height', (string) $size );
				}
			}
		}

		static::apply_theme_color( $svg );

		$cache[ $cache_key ] = static::sanitize_svg( $dom->saveHTML() );

		return $cache[ $cache_key ];
	}

	/**
	 * Makes hardcoded black fills/strokes follow the current text color.
	 */
	private static function apply_theme_color( DOMElement $svg ): void {
		$fill = strtolower( trim( $svg->getAttribute( 'fill' ) ) );

		if ( $fill === '' || static::is_literal_ink( $fill ) ) {
			$svg->setAttribute( 'fill', 'currentColor' );
		}

		$stroke = strtolower( trim( $svg->getAttribute( 'stroke' ) ) );

		if ( static::is_literal_ink( $stroke ) ) {
			$svg->setAttribute( 'stroke', 'currentColor' );
		}

		foreach ( $svg->getElementsByTagName( '*' ) as $el ) {
			if ( ! $el instanceof DOMElement ) {
				continue;
			}

			$child_fill = strtolower( trim( $el->getAttribute( 'fill' ) ) );

			if ( static::is_literal_ink( $child_fill ) ) {
				$el->setAttribute( 'fill', 'currentColor' );
			}

			$child_stroke = strtolower( trim( $el->getAttribute( 'stroke' ) ) );

			if ( static::is_literal_ink( $child_stroke ) ) {
				$el->setAttribute( 'stroke', 'currentColor' );
			}
		}
	}

	/**
	 * Whether a paint value is a hardcoded dark ink color.
	 */
	private static function is_literal_ink( string $value ): bool {
		$value = strtolower( str_replace( ' ', '', $value ) );

		return in_array(
			$value,
			[ '#000', '#000000', 'black', '#111', '#111111', '#1e1e1e', '#0a0a0a', 'rgb(0,0,0)' ],
			true
		);
	}

	/**
	 * Registers icon REST endpoint.
	 *
	 * @since 1.0.0
	 *
	 * @param string $namespace Route namespace.
	 * @param string $route     Route path.
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
			'args'                => [
				'sets' => [
					'required'          => false,
					'type'              => 'string',
					'description'       => 'When set, return only icon set slugs.',
					'sanitize_callback' => 'sanitize_text_field',
				],
				'set'  => [
					'required'          => false,
					'type'              => 'string',
					'description'       => 'Load one set with full SVG markup (lazy picker).',
					'sanitize_callback' => 'sanitize_text_field',
				],
				'full' => [
					'required'    => false,
					'type'        => 'boolean',
					'description' => 'Load every set with SVGs (heavy; avoid in the editor).',
					'default'     => false,
				],
			],
		];

		add_action(
			'rest_api_init',
			static fn() => register_rest_route( $namespace, $route, $args )
		);
	}

	/**
	 * Registers icon set.
	 *
	 * @since 1.0.0
	 *
	 * @param string $name Icon set name.
	 * @param string $path Icon set path.
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
	 * Returns placeholder icon dom element.
	 *
	 * @since 1.0.0
	 *
	 * @param DOMDocument $dom DOM document.
	 *
	 * @return DOMElement
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
	 * Max SVG count loaded eagerly for the default catalog (button/tab picker).
	 * Larger Pro packs load on demand via ?set=.
	 */
	private const EAGER_SET_ICON_LIMIT = 80;

	/**
	 * Normalizes icon set slugs (legacy "WordPress" → wordpress).
	 */
	public static function normalize_set_slug( string $set ): string {
		$set = strtolower( trim( $set ) );

		return $set === '' ? 'wordpress' : $set;
	}

	/**
	 * Whether a set should ship full SVGs in the default catalog response.
	 *
	 * @param string               $set  Set slug.
	 * @param array<string,string> $dirs Icon set directories.
	 */
	private static function is_eager_icon_set( string $set, array $dirs ): bool {
		$always = [ 'wordpress', 'social', 'payment', 'payment-brand', 'brand' ];

		if ( in_array( $set, $always, true ) ) {
			return true;
		}

		// Known large Pro packs — stub without globbing (glob is slow on WASM).
		$lazy = [ 'feather', 'hand-drawn', 'heroicons', 'phosphor-duotone', 'remixicon', 'lucide', 'tabler' ];

		if ( in_array( $set, $lazy, true ) ) {
			return false;
		}

		$dir = $dirs[ $set ] ?? '';

		if ( $dir === '' || ! is_dir( $dir ) ) {
			return $set === 'wordpress';
		}

		$files = glob( $dir . '/*.svg' );

		return is_array( $files ) && count( $files ) <= self::EAGER_SET_ICON_LIMIT;
	}

	/**
	 * Icon names in a set (no SVG bodies).
	 *
	 * @return list<string>
	 */
	public static function get_set_icon_names( string $set ): array {
		$set       = static::normalize_set_slug( $set );
		$icon_sets = static::get_icon_sets();
		$names     = [];

		if ( isset( $icon_sets[ $set ] ) && is_string( $icon_sets[ $set ] ) ) {
			$files = glob( $icon_sets[ $set ] . '/*.svg' );

			if ( is_array( $files ) ) {
				foreach ( $files as $file ) {
					$names[] = basename( (string) $file, '.svg' );
				}
			}
		}

		if ( $set === 'wordpress' ) {
			foreach ( array_keys( static::get_core_library_slugs() ) as $core_slug ) {
				$names[] = (string) $core_slug;
			}
		}

		$names = array_values( array_unique( $names ) );
		sort( $names );

		return $names;
	}

	/**
	 * Full SVG map for one icon set.
	 *
	 * @return array<string, string> name => svg
	 */
	public static function get_set_icons( string $set ): array {
		$set = static::normalize_set_slug( $set );

		$cache_key = 'aegis_icon_set_v1_' . $set;
		$cached    = get_transient( $cache_key );

		if ( is_array( $cached ) ) {
			return $cached;
		}

		$icon_sets = static::get_icon_sets();
		$icons     = [];

		if ( isset( $icon_sets[ $set ] ) && is_string( $icon_sets[ $set ] ) ) {
			$files = glob( $icon_sets[ $set ] . '/*.svg' );

			if ( is_array( $files ) ) {
				foreach ( $files as $file ) {
					$name           = basename( (string) $file, '.svg' );
					$icons[ $name ] = static::get_svg( $set, $name, 24, null );
				}
			}
		}

		if ( $set === 'wordpress' ) {
			foreach ( array_keys( static::get_core_library_slugs() ) as $core_slug ) {
				if ( ! isset( $icons[ $core_slug ] ) ) {
					$icons[ $core_slug ] = static::get_svg( 'wordpress', $core_slug, 24, null );
				}
			}
		}

		set_transient( $cache_key, $icons, DAY_IN_SECONDS );

		return $icons;
	}

	/**
	 * Returns icon data for rest endpoint.
	 *
	 * Default (no params): catalog — small sets with SVGs, large packs as empty
	 * stubs so the button/tab picker can list them and load via ?set=.
	 * ?set=slug — one set with full SVGs.
	 * ?sets=1 — set slug list only.
	 * ?full=1 — every set with SVGs (legacy / WP 7.0 merge; avoid in editor).
	 *
	 * @since 1.0.0
	 *
	 * @param ?WP_REST_Request $request Request object.
	 *
	 * @return array<string, mixed>
	 */
	public static function get_icon_data( ?WP_REST_Request $request ) {
		$icon_sets = static::get_icon_sets();

		if ( ! isset( $icon_sets['wordpress'] ) ) {
			$icon_sets['wordpress'] = '';
		}

		if ( $request && $request->get_param( 'sets' ) ) {
			return array_keys( $icon_sets );
		}

		if ( $request && $request->get_param( 'set' ) ) {
			return static::get_set_icons( (string) $request->get_param( 'set' ) );
		}

		$force_full = $request && $request->get_param( 'full' );

		$icon_data = [];

		foreach ( array_keys( $icon_sets ) as $icon_set ) {
			$set = static::normalize_set_slug( (string) $icon_set );

			if ( $force_full || static::is_eager_icon_set( $set, $icon_sets ) ) {
				$icon_data[ $set ] = static::get_set_icons( $set );
			} else {
				// Stub: set appears in Select Icon Set; SVGs load via ?set=.
				$icon_data[ $set ] = [];
			}
		}

		return $icon_data;
	}

	/**
	 * Builds a registry-style icon identifier for the Aegis namespace.
	 *
	 * @since 1.0.0
	 *
	 * @param string $set  Icon set slug.
	 * @param string $name Icon file slug.
	 *
	 * @return string e.g. social/facebook or core/plus
	 */
	public static function to_registry_id( string $set, string $name ): string {
		$set  = strtolower( $set );
		$name = strtolower( $name );

		if ( $set === 'wordpress' && isset( static::get_core_library_slugs()[ $name ] ) ) {
			return 'core/' . $name;
		}

		return $set . '/' . $name;
	}

	/**
	 * Parses a registry icon identifier.
	 *
	 * @since 1.0.0
	 *
	 * @param string $id Icon id (`core/{name}`, `{set}/{name}`, or legacy `aegis/{set}/{name}`).
	 *
	 * @return array{namespace: string, set: string, name: string}|null
	 */
	public static function from_registry_id( string $id ): ?array {
		$id = strtolower( trim( $id ) );

		if ( $id === '' ) {
			return null;
		}

		$parts = explode( '/', $id );

		if ( ( $parts[1] ?? '' ) === '' ) {
			return null;
		}

		if ( $parts[0] === 'core' && isset( $parts[1] ) && ! isset( $parts[2] ) ) {
			return [
				'namespace' => 'core',
				'set'       => 'wordpress',
				'name'      => $parts[1],
			];
		}

		if ( $parts[0] === 'aegis' && isset( $parts[1], $parts[2] ) && ! isset( $parts[3] ) ) {
			return [
				'namespace' => 'aegis',
				'set'       => $parts[1],
				'name'      => $parts[2],
			];
		}

		if ( isset( $parts[0], $parts[1] ) && ! isset( $parts[2] ) ) {
			return [
				'namespace' => 'aegis',
				'set'       => $parts[0],
				'name'      => $parts[1],
			];
		}

		return null;
	}

	/**
	 * Core Icon library slugs shipped by WordPress.
	 *
	 * @return array<string, true>
	 */
	public static function get_core_library_slugs(): array {
		static $slugs = null;

		if ( $slugs !== null ) {
			return $slugs;
		}

		$slugs = [];

		if ( ! defined( 'ABSPATH' ) || ! defined( 'WPINC' ) ) {
			return $slugs;
		}

		$manifest = ABSPATH . WPINC . '/assets/icon-library-manifest.php';

		if ( ! is_readable( $manifest ) ) {
			return $slugs;
		}

		$collection = include $manifest;

		if ( is_array( $collection ) ) {
			foreach ( array_keys( $collection ) as $slug ) {
				$slugs[ (string) $slug ] = true;
			}
		}

		return $slugs;
	}

	/**
	 * Returns flat picker items for REST/editor merge.
	 *
	 * @since 1.0.0
	 *
	 * @return list<array{name: string, label: string, source: string, set: string}>
	 */
	public static function get_picker_items(): array {
		$items = [];

		foreach ( array_keys( static::get_icon_sets() ) as $set ) {
			$set = static::normalize_set_slug( (string) $set );

			foreach ( static::get_set_icon_names( $set ) as $name ) {
				$items[] = [
					'name'   => static::to_registry_id( $set, (string) $name ),
					'label'  => Str::title_case( (string) $name ),
					'source' => 'aegis',
					'set'    => $set,
				];
			}
		}

		return $items;
	}

	/**
	 * Sanitizes SVG string.
	 *
	 * @since 1.0.0
	 *
	 * @param string $svg SVG string.
	 *
	 * @return string
	 */
	public static function sanitize_svg( string $svg ): string {
		$svg = self::decode_svg_string( $svg );

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

	/**
	 * Normalize SVG markup that was JSON-hex-escaped without backslashes.
	 *
	 * Some editors persist `svgString` as `u003csvg…u0022…` instead of `<svg…"…`.
	 * Decode those sequences (and standard `\uXXXX` escapes) before sanitizing.
	 *
	 * @since 1.0.0
	 *
	 * @param string $svg Raw SVG attribute value.
	 */
	private static function decode_svg_string( string $svg ): string {
		$svg = trim( $svg );

		if ( $svg === '' || str_contains( $svg, '<svg' ) || str_contains( $svg, '<SVG' ) ) {
			return $svg;
		}

		// Bare JSON hex escapes (backslash stripped): u003c → <, u0022 → ".
		if ( preg_match( '/u00[0-9a-fA-F]{2}/', $svg ) ) {
			$svg = (string) preg_replace_callback(
				'/u00([0-9a-fA-F]{2})/',
				static fn( array $matches ): string => chr( (int) hexdec( $matches[1] ) ),
				$svg
			);
		}

		return $svg;
	}
}
