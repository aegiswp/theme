<?php
/**
 * System Fonts Component
 *
 * Provides support for adding and managing system font stacks in the Aegis Framework.
 *
 * Responsibilities:
 * - Adds system font stacks to the theme JSON configuration
 * - Integrates with the block editor and theme typography settings
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
declare( strict_types=1 );

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports WordPress helpers for filters, arrays, and file system access.
use function apply_filters;
use function array_merge;
use function get_template_directory;
use function is_readable;

// Implements the SystemFonts class to support system font stack management for the design system.

class SystemFonts {

	/**
	 * Add system fonts.
	 *
	 * @param mixed $theme_json Theme JSON.
	 *
	 * @hook wp_theme_json_data_theme
	 *
	 * @return mixed
	 */
	public function add_system_font_stacks( $theme_json ) {
		$data        = $theme_json->get_data();
		$theme_fonts = $data['settings']['typography']['fontFamilies']['theme'] ?? [];

		static $added = false;

		if ( ! $theme_fonts && ! $added ) {
			$added = true;

			$framework_theme_json_file = get_template_directory() . '/theme.json';

			if ( ! is_readable( $framework_theme_json_file ) ) {
				return $theme_json;
			}

			$file_contents             = file_get_contents( $framework_theme_json_file );
			$framework_theme_json_file = json_decode( $file_contents, true );
			$framework_fonts           = $framework_theme_json_file['settings']['typography']['fontFamilies'] ?? [];

			if ( ! $framework_fonts ) {
				return $theme_json;
			}

			$data['settings']['typography']['fontFamilies']['theme'] = array_merge(
				$this->get_system_font_stacks(),
				$framework_fonts,
			);
		}

		$data['settings']['typography']['fontFamilies']['theme'] = array_merge(
			$this->get_system_font_stacks(),
			$data['settings']['typography']['fontFamilies']['theme'] ?? [],
		);

		$theme_json->update_with( $data );

		return $theme_json;
	}

	/**
	 * Return system font stacks.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function get_system_font_stacks(): array {
		$fonts = [
			[
				'name'       => 'Sans Serif',
				'slug'       => 'sans-serif',
				'fontFamily' => '-apple-system, BlinkMacSystemFont, avenir next, avenir, segoe ui, helvetica neue, helvetica, Cantarell, Ubuntu, roboto, noto, arial, sans-serif',
			],
			[
				'name'       => 'Serif',
				'slug'       => 'serif',
				'fontFamily' => 'Iowan Old Style, Apple Garamond, Baskerville, Times New Roman, Droid Serif, Times, Source Serif Pro, serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol',
			],
			[
				'name'       => 'Monospace',
				'slug'       => 'monospace',
				'fontFamily' => 'Menlo, Consolas, Monaco, Liberation Mono, Lucida Console, monospace',
			],
		];

		return apply_filters( 'aegis_system_fonts', $fonts );
	}

}
