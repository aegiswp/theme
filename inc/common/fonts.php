<?php
/**
 * Font Management for Aegis Theme
 *
 * This file handles the registration and management of fonts for the Aegis theme.
 * It provides system font stacks and integrates them with any custom fonts defined
 * in the theme.json file. The system fonts ensure consistent text rendering across
 * different operating systems and devices without requiring web font downloads,
 * improving performance and reliability.
 *
 * The file includes functions to:
 * - Get the theme directory path
 * - Add system fonts to the theme.json data
 * - Define and return system font stacks
 *
 * @package aegis
 * @subpackage theme
 * @since 1.0.0
 */

declare( strict_types=1 );

namespace aegis\theme;

use function add_filter;
use function apply_filters;
use function array_merge;
use function is_readable;
use function file_get_contents;
use function json_decode;
use function get_template_directory;

/**
 * Get the theme directory path.
 *
 * @since 1.0.0
 * @return string The theme directory path.
 */
function get_dir(): string {
	return get_template_directory() . '/';
}

add_filter( 'wp_theme_json_data_theme', __NAMESPACE__ . '\\add_system_fonts' );
/**
 * Adds system font stacks to the theme.json data.
 *
 * This function enhances the theme's font options by adding system font stacks
 * to the theme.json configuration. It merges system fonts with any existing
 * font families defined in the theme, ensuring that reliable system fonts
 * are always available as fallback options.
 *
 * The function checks if fonts are already defined to avoid duplicate additions
 * and attempts to load fonts from the theme.json file if needed.
 *
 * @since 1.0.0
 * @param mixed $theme_json WP_Theme_JSON_Data object containing theme settings.
 * @return mixed Modified WP_Theme_JSON_Data object with system fonts added.
 */
function add_system_fonts( $theme_json ) {
	$data        = $theme_json->get_data();
	$theme_fonts = $data['settings']['typography']['fontFamilies']['theme'] ?? [];

	static $added = false;

	if ( ! $theme_fonts && ! $added ) {
		$added = true;

		$framework_theme_json_file = get_dir() . 'theme.json';

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
			get_system_fonts(),
			$framework_fonts,
		);
	}

	// Always ensure system fonts are included in the theme fonts
	$data['settings']['typography']['fontFamilies']['theme'] = array_merge(
		get_system_fonts(),
		$data['settings']['typography']['fontFamilies']['theme'] ?? [],
	);

	$theme_json->update_with( $data );

	return $theme_json;
}

/**
 * Returns an array of system font stack definitions.
 *
 * Provides carefully crafted system font stacks that work across different operating
 * systems and devices. These font stacks ensure text appears consistently without
 * requiring web font downloads, improving performance and reliability.
 * 
 * Includes three primary font categories:
 * - Sans Serif: Modern, clean fonts without decorative features
 * - Serif: Traditional fonts with decorative features at the end of strokes
 * - Monospace: Fixed-width fonts where each character occupies the same space
 *
 * These system fonts are merged with any custom fonts defined in theme.json,
 * providing both performance-optimized system fonts and custom web fonts.
 *
 * The returned array can be filtered using the 'aegis_system_fonts' hook.
 *
 * @since 1.0.0
 * @return array[] Array of font definitions with name, slug, and fontFamily properties.
 */
function get_system_fonts(): array {
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
