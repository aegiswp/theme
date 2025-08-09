<?php
/**
 * Deprecated Styles Component
 *
 * Provides support for loading deprecated color palette and typography styles for backward compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Loads deprecated color palette and typography styles
 * - Integrates with the styles service for frontend delivery
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

// Imports styleable interface, styles service, color utilities, CSS utilities, and WordPress helpers.
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Utilities\Color;
use Aegis\Dom\CSS;
use function file_exists;
use function get_template_directory;
use function wp_get_global_settings;
use function wp_json_file_decode;

// Implements the DeprecatedStyles class to support backward compatibility for deprecated styles.

/**
 * Handles backward compatibility for deprecated theme styles.
 *
 * This class is a compatibility layer that loads CSS custom properties for
 * deprecated color and typography presets from older theme versions, ensuring
 * that sites built with those versions continue to look correct after an update.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */
class DeprecatedStyles implements Styleable {

	/**
	 * Gathers all deprecated styles and adds them to the inline style queue.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The Styles service instance.
	 */
	public function styles( Styles $styles ): void {
		$css = CSS::array_to_string( $this->get_deprecated_color_palette() );
		$css .= CSS::array_to_string( $this->get_deprecated_typography() );

		// Only add the style block if there are any deprecated styles to add.
		$styles->add_string( "body{{$css}}", [], ! empty( $css ) );
	}

	/**
	 * Generates CSS variables for a hard-coded list of deprecated colors.
	 *
	 * @since 1.0.0
	 *
	 * @return array An associative array of CSS custom properties for deprecated colors.
	 */
	private function get_deprecated_color_palette(): array {
		$colors = Color::get_deprecated_colors();
		$styles = [];

		foreach ( $colors as $slug => $value ) {
			if ( $value ) {
				$styles["--wp--preset--color--{$slug}"] = $value;
			}
		}

		return $styles;
	}

	/**
	 * Generates CSS variables for deprecated font sizes found in `theme.json`.
	 *
	 * This method contains complex logic to detect if a site might be using
	 * deprecated font sizes. It manually parses `theme.json` and compares its
	 * font size presets with those currently registered by WordPress. If it
	 * finds any that are no longer registered, it creates CSS variables for
	 * them to ensure backward compatibility.
	 *
	 * @since 1.0.0
	 *
	 * @return array An associative array of CSS custom properties for deprecated font sizes.
	 */
	private function get_deprecated_typography(): array {
		$global_settings = wp_get_global_settings();
		$font_sizes      = $global_settings['typography']['fontSizes']['theme'] ?? [];
		$styles          = [];

		if ( ! $font_sizes ) {
			return $styles;
		}

		// The check for a font size with slug '81' acts as a trigger. If this
		// specific deprecated slug is found, the theme assumes it needs to
		// load all other potentially deprecated font sizes.
		$has_deprecated = false;
		$slugs          = [];
		foreach ( $font_sizes as $font_size ) {
			$slug = $font_size['slug'] ?? '';
			if ( '81' === $slug ) {
				$has_deprecated = true;
			}
			$slugs[ $slug ] = $font_size;
		}

		if ( ! $has_deprecated ) {
			return $styles;
		}

		// Manually read the theme.json file to get all defined font sizes.
		$theme_json_file = get_template_directory() . '/theme.json';
		if ( ! file_exists( $theme_json_file ) ) {
			return $styles;
		}
		$theme_json            = wp_json_file_decode( $theme_json_file );
		$theme_json_font_sizes = (array) ( $theme_json->settings->typography->fontSizes ?? [] );
		if ( ! $theme_json_font_sizes ) {
			return $styles;
		}

		// Compare the font sizes from theme.json with the ones WordPress has registered.
		foreach ( $theme_json_font_sizes as $font_size ) {
			$slug = $font_size->slug ?? '';
			// If a font size from theme.json is NOT in the registered list, it's deprecated.
			if ( isset( $slugs[ $slug ] ) ) {
				continue;
			}
			// Create a CSS variable for the deprecated font size.
			$styles["--wp--preset--font-size--{$slug}"] = $font_size->size ?? '';
		}

		return $styles;
	}
}
