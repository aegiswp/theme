<?php
/**
 * Dark Mode Extension for Aegis Theme
 *
 * This file handles the dark mode functionality for the Aegis theme.
 * It provides the ability to switch between light and dark color schemes,
 * with support for user preferences, system settings, and manual toggling.
 *
 * The file includes functions to:
 * - Add dark mode body classes based on user preferences
 * - Generate and apply dark mode color styles
 * - Map color values between light and dark modes
 *
 * @package aegis
 * @subpackage theme
 * @since 1.0.0
 */

declare( strict_types=1 );

namespace aegis\theme;

use function add_filter;
use function array_diff;
use function array_replace;
use function array_unique;
use function filter_input;
use function in_array;
use function is_null;
use function is_string;
use function wp_get_global_settings;
use const FILTER_SANITIZE_FULL_SPECIAL_CHARS;
use const INPUT_COOKIE;
use const INPUT_GET;

add_filter( 'body_class', __NAMESPACE__ . '\\add_dark_mode_body_class' );
/**
 * Sets dark mode body classes.
 *
 * Adds appropriate body classes based on user preferences, cookie settings,
 * URL parameters, and theme defaults to control dark mode appearance.
 *
 * @since 1.0.0
 *
 * @param array $classes Body classes.
 *
 * @return array Modified array of body classes.
 */
function add_dark_mode_body_class( array $classes ): array {
	$cookie          = filter_input( INPUT_COOKIE, 'aegisDarkMode', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
	$url_param       = filter_input( INPUT_GET, 'dark_mode', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
	$stylesheet_dir  = get_stylesheet_directory();
	$global_settings = wp_get_global_settings();
	$default_mode    = $global_settings['custom']['darkMode']['defaultMode'] ?? 'light';
	$both_classes    = [ 'is-style-light', 'is-style-dark' ];

	$classes[] = 'default-mode-' . $default_mode;

	if ( ! $cookie ) {
		$classes[] = 'is-style-' . $default_mode;
	}

	if ( $cookie === 'true' ) {
		$classes[] = 'is-style-dark';
	} else if ( $cookie === 'false' ) {
		$classes[] = 'is-style-light';
	} else if ( $cookie === 'auto' ) {
		$classes = array_diff( $classes, $both_classes );

		$classes[] = 'default-mode-auto';
	}

	if ( $url_param ) {
		$classes = array_diff( $classes, $both_classes );

		$classes[] = $url_param === 'true' ? 'is-style-dark' : 'is-style-light';
	}

	return array_unique( $classes );
}

add_filter( 'aegis_inline_css', __NAMESPACE__ . '\\get_dark_mode_styles' );
/**
 * Adds dark mode styles.
 *
 * Generates CSS custom properties for dark mode by mapping color values
 * between light and dark modes based on predefined relationships.
 * Creates style rules for both default and opposite modes.
 *
 * @since 1.0.0
 *
 * @param string $css Inline CSS.
 *
 * @return string Modified inline CSS with dark mode styles.
 */
function get_dark_mode_styles( string $css ): string {
	$settings        = wp_get_global_settings();
	$palette         = $settings['color']['palette']['theme'] ?? [];
	$custom          = array_replace(
		compute_theme_vars( $settings['custom'] ?? [] ),
		get_dynamic_custom_properties()
	);
	$colors          = get_color_values( $palette );
	$gradients       = get_color_values( $settings['color']['gradients']['theme'] ?? [], 'gradient' );
	$system          = get_system_colors();
	$default_mode    = $settings['custom']['darkMode']['defaultMode'] ?? 'light';
	$opposite_mode   = $default_mode === 'light' ? 'dark' : 'light';
	$default_styles  = [];
	$opposite_styles = [];

	$maps = [
		'primary' => [
			950 => 25,
			900 => 50,
			800 => 100,
			700 => 200,
			600 => 300,
			500 => 400,
			400 => 500,
			300 => 600,
			200 => 700,
			100 => 800,
			50  => 900,
			25  => 950,
		],
		'neutral' => [
			950 => 0,
			900 => 50,
			800 => 100,
			700 => 200,
			600 => 300,
			500 => 400,
			400 => 500,
			300 => 600,
			200 => 700,
			100 => 800,
			50  => 900,
			0   => 950,
		],
		'success' => [
			600 => 100,
			500 => 500,
			100 => 600,
		],
		'warning' => [
			600 => 100,
			500 => 500,
			100 => 600,
		],
		'error'   => [
			600 => 100,
			500 => 500,
			100 => 600,
		],
	];

	foreach ( $colors as $slug => $value ) {
		$explode = explode( '-', $slug );
		$name    = $explode[0] ?? '';
		$shade   = $explode[1] ?? '';

		if ( is_null( $shade ) || in_array( $slug, $system, true ) ) {
			continue;
		}

		$default_styles["--wp--preset--color--{$slug}"] = $value;

		$opposite_shade = $maps[ $name ][ $shade ] ?? '';
		$opposite_value = $colors[ $name . '-' . $opposite_shade ] ?? '';

		if ( $opposite_value ) {
			$opposite_styles["--wp--preset--color--{$slug}"] = $opposite_value;
		}
	}

	foreach ( $gradients as $slug => $value ) {
		$default_styles["--wp--preset--gradient--{$slug}"]  = $value;
		$opposite_styles["--wp--preset--gradient--{$slug}"] = $value;
	}

	foreach ( $custom as $name => $value ) {
		if ( is_string( $value ) && str_contains_any( $value, '--wp--preset--color--', '--wp--preset--gradient--' ) ) {
			$default_styles[ $name ]  = $value;
			$opposite_styles[ $name ] = $value;
		}
	}

	$css .= "html .is-style-{$default_mode}{" . css_array_to_string( $default_styles ) . '}';
	$css .= "html .is-style-{$opposite_mode}{" . css_array_to_string( $opposite_styles ) . '}';

	return $css;
}
