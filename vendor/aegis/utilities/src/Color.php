<?php
/**
 * Color.php
 *
 * Utility class for color operations in the Aegis WordPress theme.
 *
 * Provides static methods for handling color values and system colors.
 *
 * @package   Aegis\Utilities
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Utilities;

use stdClass;
use function _wp_to_kebab_case;
use function array_replace;
use function explode;
use function file_exists;
use function get_stylesheet_directory;
use function get_template_directory;
use function wp_get_global_settings;
use function wp_json_file_decode;

class Color {

	const SYSTEM_COLORS = [
		'current',
		'currentcolor',
		'currentColor',
		'inherit',
		'initial',
		'transparent',
		'unset',
	];

	/**
	 * Gets system colors.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function get_system_colors(): array {
		return self::SYSTEM_COLORS;
	}

	/**
	 * Reverses color shade.
	 *
	 * @since 1.0.0
	 *
	 * @param string $slug Color slug.
	 *
	 * @return string
	 */
	public static function reverse_color_shade( string $slug ): string {
		$explode = explode( '-', $slug );
		$color   = $explode[0] ?? '';
		$shade   = $explode[1] ?? '';
		$scale   = self::get_shade_scales( $color );
		$reverse = $scale[ (int) $shade ] ?? '';

		return $reverse ? "{$color}-{$reverse}" : '';
	}

	/**
	 * Gets color shades.
	 *
	 * @since 1.0.0
	 *
	 * @param ?string $color Color slug.
	 *
	 * @return array
	 */
	public static function get_shade_scales( ?string $color = null ): array {
		$map = [
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
			'primary' => [
				950 => 25,
				900 => 100,
				700 => 300,
				600 => 500,
				500 => 600,
				300 => 700,
				100 => 900,
			],
			'accent'  => [
				900 => 100,
				700 => 300,
				600 => 500,
				500 => 600,
				300 => 700,
				100 => 900,
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

		return $color ? ( $map[ $color ] ?? [] ) : $map;
	}

	/**
	 * Returns key value pairs of deprecated colors with replacements.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function get_deprecated_colors(): array {
		$child_theme_file  = get_stylesheet_directory() . '/theme.json';
		$parent_theme_file = get_template_directory() . '/theme.json';
		$child_theme_json  = file_exists( $child_theme_file ) ? wp_json_file_decode( $child_theme_file ) : new stdClass();
		$parent_theme_json = file_exists( $parent_theme_file ) ? wp_json_file_decode( $parent_theme_file ) : new stdClass();
		$parent_colors     = self::get_color_values( $parent_theme_json->settings->color->palette ?? [] );
		$child_colors      = self::get_color_values( $child_theme_json->settings->color->palette ?? [] );
		$settings          = wp_get_global_settings();
		$replacements      = self::get_replacement_colors( $settings );
		$user_colors       = self::get_color_values( $settings['color']['palette']['theme'] ?? [] );
		$default_colors    = array_replace( $parent_colors, $child_colors, $user_colors );

		$has_deprecated = $settings['custom']['deprecatedColors'] ?? false;
		$new_colors     = [];
		$old_colors     = [];

		foreach ( $replacements as $old => $new ) {
			$old = _wp_to_kebab_case( $old );

			if ( isset( $user_colors[ $old ] ) ) {
				$has_deprecated = true;
			}

			if ( ! isset( $user_colors[ $new ] ) ) {
				$value = $user_colors[ $old ] ?? $default_colors[ $new ] ?? '';

				if ( $value ) {
					$new_colors[ $new ] = $value;
				}

				if ( isset( $user_colors[ $old ] ) ) {
					continue;
				}
			}

			$old = _wp_to_kebab_case( $old );

			if ( ! Str::contains_any( $new, 'var', '#', 'rgb', 'hsl' ) ) {
				$new = "var(--wp--preset--color--$new)";
			}

			if ( $new ) {
				$old_colors[ $old ] = $new;
			}
		}

		return $has_deprecated ? array_replace( $new_colors, $old_colors ) : [];
	}

	/**
	 * Gets color values from a color palette.
	 *
	 * @since 1.0.0
	 *
	 * @param array  $colors Color palette.
	 * @param string $type   Color or gradient. Default is color.
	 *
	 * @return array
	 */
	public static function get_color_values( array $colors, string $type = 'color' ): array {
		$color_values = [];

		foreach ( $colors as $color ) {
			$color = (array) $color;

			if ( ! isset( $color['slug'], $color[ $type ] ) ) {
				continue;
			}

			$color_values[ $color['slug'] ] = $color[ $type ];
		}

		return $color_values;
	}
}
