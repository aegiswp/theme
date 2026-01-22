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
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare(strict_types=1);

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports styleable interface, styles service, color utilities, CSS utilities, and WordPress helpers.
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Utilities\Color;
use Aegis\Dom\CSS;
use function file_exists;
use function get_template_directory;
use Aegis\Framework\ServiceProvider;
use function wp_json_file_decode;

// Implements the DeprecatedStyles class to support backward compatibility for deprecated styles.

class DeprecatedStyles implements Styleable
{

	/**
	 * Styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles.
	 *
	 * @return void
	 */
	public function styles(Styles $styles): void
	{
		$css = CSS::array_to_string($this->get_deprecated_color_palette());
		$css .= CSS::array_to_string($this->get_deprecated_typography());

		$styles->add_string("body{{$css}}", [], !empty($css));
	}

	/**
	 * Adds deprecated color palette to inline styles.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function get_deprecated_color_palette(): array
	{
		$colors = Color::get_deprecated_colors();
		$styles = [];

		foreach ($colors as $slug => $value) {
			if ($value) {
				$styles["--wp--preset--color--{$slug}"] = $value;
			}
		}

		return $styles;
	}

	/**
	 * Adds deprecated typography to inline styles.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function get_deprecated_typography(): array
	{
		$global_settings = ServiceProvider::get_global_settings();
		$font_sizes = $global_settings['typography']['fontSizes']['theme'] ?? [];

		$styles = [];

		if (!$font_sizes) {
			return $styles;
		}

		$has_deprecated = false;
		$slugs = [];

		foreach ($font_sizes as $font_size) {
			$slug = $font_size['slug'] ?? '';

			if ($slug === '81') {
				$has_deprecated = true;
			}

			$slugs[$slug] = $font_size;
		}

		if (!$has_deprecated) {
			return $styles;
		}

		$theme_json_file = get_template_directory() . '/theme.json';

		if (!file_exists($theme_json_file)) {
			return $styles;
		}

		$theme_json = wp_json_file_decode($theme_json_file);
		$theme_json_font_sizes = (array) ($theme_json->settings->typography->fontSizes ?? []);

		if (!$theme_json_font_sizes) {
			return $styles;
		}

		foreach ($theme_json_font_sizes as $font_size) {
			$slug = $font_size->slug ?? '';

			if (isset($slugs[$slug])) {
				continue;
			}

			$styles["--wp--preset--font-size--{$slug}"] = $font_size->size ?? '';
		}

		return $styles;
	}

}
