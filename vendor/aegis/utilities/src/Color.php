<?php

// Enforces strict type checking for all code in this file, ensuring type safety for color utility helpers.
declare( strict_types=1 );

// Declares the namespace for the color utility helpers.
namespace Aegis\Utilities;

// Imports classes, interfaces, and functions used by the color utility helpers.
use function explode;

/**
 * Color utility class for handling color-related operations.
 *
 * This class provides methods for working with color palettes, shade scales,
 * and system colors.
 *
 * @since 1.0.0
 */
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
	 * Returns an array of standard CSS system color keywords.
	 *
	 * These are colors that have a special meaning in CSS and are not part of
	 * a theme's color palette.
	 *
	 * @since 1.0.0
	 *
	 * @return string[] A list of system color keywords.
	 */
	public static function get_system_colors(): array {
		return self::SYSTEM_COLORS;
	}

	/**
	 * Reverses a color shade based on a predefined scale.
	 *
	 * For example, given a slug like 'primary-100', this might return 'primary-900'.
	 *
	 * @since 1.0.0
	 *
	 * @param string $slug The color slug to reverse (e.g., 'primary-100').
	 *
	 * @return string The reversed color slug, or an empty string if not found.
	 */
	public static function reverse_color_shade( string $slug ): string {
		// Split the slug into color name and shade number.
		$explode = explode( '-', $slug );
		$color   = $explode[0] ?? '';
		$shade   = $explode[1] ?? '';
		// Look up the reversed shade from the scale map.
		$scale   = self::get_shade_scales( $color );
		$reverse = $scale[ (int) $shade ] ?? '';

		return $reverse ? "{$color}-{$reverse}" : '';
	}

	/**
	 * Returns the mapping of color shade scales.
	 *
	 * This defines how color shades are inverted (e.g., a light shade maps to a
	 * dark one). If a specific color is provided, only its scale is returned.
	 *
	 * @since 1.0.0
	 *
	 * @param string|null $color Optional. The specific color to get the scale for.
	 *
	 * @return array The shade scale map for a specific color or the entire map.
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

		// Return the scale for a specific color or the full map.
		return $color ? ( $map[ $color ] ?? [] ) : $map;
	}

	/**
	 * Extracts a flat key-value array of colors from a WordPress palette array.
	 *
	 * Converts `[ [ 'slug' => 'primary', 'color' => '#000' ] ]` to
	 * `[ 'primary' => '#000' ]`.
	 *
	 * @since 1.0.0
	 *
	 * @param array  $colors The color palette array from theme.json.
	 * @param string $type   The property to extract ('color' or 'gradient').
	 *
	 * @return array A flat associative array of [slug] => [value].
	 */
	public static function get_color_values( array $colors, string $type = 'color' ): array {
		$color_values = [];

		foreach ( $colors as $color ) {
			$color = (array) $color;

			// Skip entries missing a slug or value.
			if ( ! isset( $color['slug'], $color[ $type ] ) ) {
				continue;
			}

			$color_values[ $color['slug'] ] = $color[ $type ];
		}

		return $color_values;
	}

}
