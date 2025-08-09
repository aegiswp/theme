<?php
/**
 * Dark Mode Component
 *
 * Provides support for dark mode CSS and logic within the Aegis Framework.
 *
 * Responsibilities:
 * - Detects and applies dark mode styling
 * - Integrates with global settings and user preferences
 * - Delivers CSS variables and classes for dark mode
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare( strict_types=1 );

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports CSS utilities, styleable interface, styles service, and various helpers for color, JSON, and string manipulation.
use Aegis\Dom\CSS;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Utilities\Color;
use Aegis\Utilities\JSON;
use Aegis\Utilities\Str;
use function apply_filters;
use function array_diff;
use function array_replace;
use function array_unique;
use function explode;
use function filter_input;
use function hexdec;
use function in_array;
use function is_admin;
use function is_null;
use function is_string;
use function ltrim;
use function round;
use function sprintf;
use function str_contains;
use function substr;
use function wp_get_global_settings;
use const FILTER_SANITIZE_FULL_SPECIAL_CHARS;
use const INPUT_COOKIE;
use const INPUT_GET;

// Implements the DarkMode class to support dark mode logic and CSS for the design system.

/**
 * Handles the dynamic light and dark mode color system.
 *
 * This class is the engine for the theme's color-switching functionality. It
 * reads the color palette from `theme.json`, uses a "shade map" to generate an
 * inverted (opposite) palette, and injects both palettes as CSS custom properties
 * under `.is-style-light` and `.is-style-dark` classes. It also adds a media
 * query to respect the user's OS-level preference.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */
class DarkMode implements Styleable {

	/**
	 * A map for inverting color palette shades between light and dark modes.
	 *
	 * For a given color name (e.g., 'primary'), it maps a light mode shade
	 * (e.g., 950) to its corresponding dark mode shade (e.g., 50).
	 *
	 * @var   array
	 * @since 1.0.0
	 */
	private array $map = [
		'primary'   => [
			950 => 50, 900 => 100, 800 => 200, 700 => 300, 600 => 400, 500 => 500,
			400 => 600, 300 => 700, 200 => 800, 100 => 900, 50 => 950, 25 => 1000,
		],
		'secondary' => [
			950 => 50, 900 => 100, 800 => 200, 700 => 300, 600 => 400, 500 => 500,
			400 => 600, 300 => 700, 200 => 800, 100 => 900, 50 => 950, 25 => 1000,
		],
		'neutral'   => [
			950 => 0, 900 => 50, 800 => 100, 700 => 200, 600 => 300, 500 => 400,
			400 => 500, 300 => 600, 200 => 700, 100 => 800, 50 => 900, 0 => 950,
		],
		'success'   => [ 600 => 100, 500 => 500, 100 => 600 ],
		'warning'   => [ 600 => 100, 500 => 500, 100 => 600 ],
		'error'     => [ 600 => 100, 500 => 500, 100 => 600 ],
	];

	/**
	 * The CustomProperties service instance.
	 *
	 * @var CustomProperties
	 */
	private CustomProperties $custom_properties;

	/**
	 * DarkMode constructor.
	 *
	 * @since 1.0.0
	 * @param CustomProperties $custom_properties The CustomProperties service instance.
	 */
	public function __construct( CustomProperties $custom_properties ) {
		$this->custom_properties = $custom_properties;
	}

	/**
	 * Sets the appropriate light/dark mode classes on the `<body>` tag.
	 *
	 * This method determines which color mode to apply based on a hierarchy of
	 * user preferences:
	 * 1. A `dark_mode` URL parameter (`?dark_mode=true` or `?dark_mode=false`).
	 * 2. An `aegisDarkMode` cookie (`true`, `false`, or `system`).
	 * 3. The default mode defined in `theme.json`.
	 *
	 * @since 1.0.0
	 * @param  array $classes Existing body classes.
	 * @hook   body_class
	 * @return array The modified array of body classes.
	 */
	public function body_classes( array $classes ): array {
		if ( is_admin() || ! $this->is_enabled() ) {
			return $classes;
		}

		// Check for user preference via cookie or URL parameter.
		$cookie          = filter_input( INPUT_COOKIE, 'aegisDarkMode', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$url_param       = filter_input( INPUT_GET, 'dark_mode', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$global_settings = wp_get_global_settings();
		$default_mode    = $this->get_default_mode( $global_settings );
		$both_classes    = [ 'is-style-light', 'is-style-dark' ];

		$classes[] = 'default-mode-' . $default_mode;

		// Apply class based on cookie value.
		if ( 'true' === $cookie ) {
			$classes[] = 'is-style-dark';
		} elseif ( 'false' === $cookie ) {
			$classes[] = 'is-style-light';
		} elseif ( 'system' === $cookie ) {
			$classes   = array_diff( $classes, $both_classes );
			$classes[] = 'default-mode-system';
		}

		// URL parameter overrides the cookie.
		if ( $url_param ) {
			$classes   = array_diff( $classes, $both_classes );
			$classes[] = 'true' === $url_param ? 'is-style-dark' : 'is-style-light';
		}

		return array_unique( $classes );
	}

	/**
	 * Generates and enqueues the dynamic CSS variables for both light and dark modes.
	 *
	 * @since 1.0.0
	 * @param Styles $styles The Styles service instance.
	 */
	public function styles( Styles $styles ): void {
		if ( is_admin() || ! $this->is_enabled() ) {
			return;
		}

		$settings = wp_get_global_settings();
		if ( false === ( $settings['custom']['darkMode'] ?? null ) ) {
			return;
		}

		// --- Data Preparation ---
		$palette           = $settings['color']['palette']['theme'] ?? [];
		$custom            = array_replace( JSON::compute_theme_vars( $settings['custom'] ?? [] ), $this->custom_properties->get_custom_properties() );
		$colors            = Color::get_color_values( $palette );
		$gradients         = Color::get_color_values( $settings['color']['gradients']['theme'] ?? [], 'gradient' );
		$system            = Color::get_system_colors();
		$default_mode      = $this->get_default_mode( $settings );
		$opposite_mode     = 'light' === $default_mode ? 'dark' : 'light';
		$opposite_settings = ( $settings['custom']['lightMode'] ?? null ) ?? ( $settings['custom']['darkMode'] ?? null );
		$default_styles    = [];
		$opposite_styles   = [];

		// --- Palette Inversion Logic ---
		// Create two sets of CSS variables: one for the default mode, one for the opposite.
		foreach ( $colors as $slug => $value ) {
			$explode = explode( '-', $slug );
			$name    = $explode[0] ?? '';
			$shade   = $explode[1] ?? '';
			if ( is_null( $shade ) || in_array( $slug, $system, true ) ) {
				continue;
			}

			// Set the default value.
			$default_styles[ "--wp--preset--color--{$slug}" ] = $value;

			// Find the opposite shade using the shade map.
			$opposite_shade = $this->map[ $name ][ $shade ] ?? '';
			$opposite_value = $colors[ $name . '-' . $opposite_shade ] ?? '';
			if ( 1000 === ( (int) $opposite_shade ?? 0 ) ) {
				$opposite_value = $this->darken( $colors[ $name . '-950' ] ?? '', 50 );
			}
			// Allow for manual overrides from theme.json.
			if ( isset( $opposite_settings['palette'][ $slug ] ) ) {
				$opposite_value = $opposite_settings['palette'][ $slug ];
			}
			if ( $opposite_value ) {
				$opposite_styles[ "--wp--preset--color--{$slug}" ] = $opposite_value;
			}
		}

		// Invert gradients.
		foreach ( $gradients as $slug => $value ) {
			$default_styles[ "--wp--preset--gradient--{$slug}" ] = $value;
			$camel_case                                         = Str::to_camel_case( $slug );
			$opposite_value                                     = $opposite_settings['gradients'][ $slug ] ?? $value;
			$opposite_value                                     = $opposite_settings['gradients'][ $camel_case ] ?? $opposite_value;
			$opposite_styles[ "--wp--preset--gradient--{$slug}" ] = $opposite_value;
		}

		// Invert custom properties that are linked to the palette.
		foreach ( $custom as $name => $value ) {
			if ( str_contains( $name, 'dark-mode--gradients' ) ) {
				continue;
			}
			if ( is_string( $value ) && Str::contains_any( $value, '--wp--preset--color--', '--wp--preset--gradient--' ) ) {
				$default_styles[ $name ]  = $value;
				$opposite_styles[ $name ] = $value;
			}
		}

		// --- CSS Generation ---
		// Create the final CSS string with rules for both modes and the media query.
		$css  = "html .is-style-{$default_mode}{" . CSS::array_to_string( $default_styles ) . '}';
		$css .= "html .is-style-{$opposite_mode}{" . CSS::array_to_string( $opposite_styles ) . '}';
		$css .= "@media (prefers-color-scheme:$opposite_mode){body{" . CSS::array_to_string( $opposite_styles ) . "}}";
		$styles->add_string( $css );
	}

	/**
	 * Checks if dark mode is enabled via a filter.
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	private function is_enabled(): bool {
		return apply_filters( 'aegis_dark_mode', true );
	}

	/**
	 * Gets the default color mode from `theme.json`.
	 *
	 * @since 1.0.0
	 * @param  array $global_settings The global settings array.
	 * @return string The default mode ('light' or 'dark').
	 */
	private function get_default_mode( array $global_settings ): string {
		return apply_filters( 'aegis_default_mode', isset( $global_settings['custom']['lightMode'] ) ? 'dark' : 'light', $global_settings );
	}

	/**
	 * Darkens a hex color by a given percentage.
	 *
	 * @since 1.0.0
	 * @param  string $hex        The hex color string.
	 * @param  int    $percentage The percentage to darken by.
	 * @return string The new, darkened hex color string.
	 */
	private function darken( string $hex, int $percentage ): string {
		$hex        = ltrim( $hex, '#' );
		$percentage = $percentage / 100;
		$r          = hexdec( substr( $hex, 0, 2 ) );
		$g          = hexdec( substr( $hex, 2, 2 ) );
		$b          = hexdec( substr( $hex, 4, 2 ) );
		$r          = round( $r * $percentage );
		$g          = round( $g * $percentage );
		$b          = round( $b * $percentage );
		return sprintf( "#%02x%02x%02x", $r, $g, $b );
	}
}
