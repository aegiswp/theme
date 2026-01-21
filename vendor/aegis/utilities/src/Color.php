<?php
/**
 * Aegis Color Utilities
 *
 * Provides utility functions for working with color values and color-related logic in the Aegis Framework.
 *
 * Responsibilities:
 * - Offers helper methods for retrieving and managing color constants
 * - Ensures consistency and reusability of color logic across the framework
 *
 * @package    Aegis\Utilities
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for utility functions.
declare(strict_types=1);

// Declares the namespace for utility classes within the Aegis Framework.
namespace Aegis\Utilities;

// Imports standard classes and WordPress helper functions for color operations.
use function explode;

// Implements the Aegis color utility class for reusable color operations.
class Color
{

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
	public static function get_system_colors(): array
	{
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
	public static function reverse_color_shade(string $slug): string
	{
		$explode = explode('-', $slug);
		$color = $explode[0] ?? '';
		$shade = $explode[1] ?? '';
		$scale = self::get_shade_scales($color);
		$reverse = $scale[(int) $shade] ?? '';

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
	public static function get_shade_scales(?string $color = null): array
	{
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
				50 => 900,
				0 => 950,
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
			'accent' => [
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
			'error' => [
				600 => 100,
				500 => 500,
				100 => 600,
			],
		];

		return $color ? ($map[$color] ?? []) : $map;
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
	public static function get_color_values(array $colors, string $type = 'color'): array
	{
		$color_values = [];

		foreach ($colors as $color) {
			$color = (array) $color;

			if (!isset($color['slug'], $color[$type])) {
				continue;
			}

			$color_values[$color['slug']] = $color[$type];
		}

		return $color_values;
	}
}
