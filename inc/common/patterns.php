<?php
/**
 * Pattern Management for Aegis Theme
 *
 * This file handles the registration and management of block patterns for the Aegis theme.
 * It provides functionality to register custom block patterns from PHP files, remove core
 * block patterns, and organize patterns into categories. Block patterns are pre-designed
 * layouts that can be inserted into the block editor, making it easier for users to create
 * complex designs.
 *
 * The file includes functions to:
 * - Remove core block patterns
 * - Get pattern directories
 * - Register default patterns
 * - Parse pattern files
 * - Register block patterns from files
 * - Generate block HTML
 *
 * @package aegis
 * @subpackage theme
 * @since 1.0.0
 */

declare( strict_types=1 );

namespace aegis\theme;

use WP_Block_Patterns_Registry;
use function _cleanup_header_comment;
use function add_action;
use function apply_filters;
use function array_unique;
use function basename;
use function explode;
use function get_file_data;
use function get_stylesheet;
use function get_stylesheet_directory;
use function get_template;
use function get_template_directory;
use function glob;
use function implode;
use function in_array;
use function is_readable;
use function ksort;
use function ob_get_clean;
use function ob_start;
use function parse_blocks;
use function preg_match;
use function preg_quote;
use function register_block_pattern;
use function register_block_pattern_category;
use function remove_theme_support;
use function render_block;
use function serialize_block;
use function str_contains;
use function str_replace;
use function strip_core_block_namespace;
use function strtoupper;
use function ucwords;
use function wp_get_global_settings;

add_action( 'init', __NAMESPACE__ . '\\remove_core_patterns', 9 );
/**
 * Removes core block patterns.
 *
 * This function disables the default WordPress core block patterns,
 * allowing the theme to provide its own custom patterns instead.
 *
 * @since 1.0.0
 *
 * @return void
 */
function remove_core_patterns(): void {
	remove_theme_support( 'core-block-patterns' );
}

/**
 * Returns array of pattern directories.
 *
 * Collects pattern directories from the parent theme, child theme (if applicable),
 * and allows filtering through the 'aegis_pattern_dirs' hook.
 *
 * @since 1.0.0
 *
 * @return array Array of directory paths containing block patterns.
 */
function get_pattern_dirs(): array {
	$default    = get_dir() . '/patterns/*';
	$template   = get_template_directory() . '/patterns/*';
	$stylesheet = get_stylesheet_directory() . '/patterns/*';

	return array_unique( apply_filters( 'aegis_pattern_dirs', [
		...glob( $default, GLOB_ONLYDIR ),
		...glob( $template, GLOB_ONLYDIR ),
		...glob( $stylesheet, GLOB_ONLYDIR ),
	] ) );
}

add_action( 'init', __NAMESPACE__ . '\\register_default_patterns' );
/**
 * Manually registers default patterns to avoid loading in child themes.
 *
 * This function scans pattern directories, organizes patterns by category,
 * and registers them with WordPress. It ensures patterns are only registered
 * once and handles category registration as well.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_default_patterns(): void {
	$all_dirs   = get_pattern_dirs();
	$categories = [];

	foreach ( $all_dirs as $dir ) {
		$files    = glob( $dir . '/*.php' );
		$category = basename( $dir );

		foreach ( $files as $file ) {
			$pattern = basename( $file, '.php' );

			if ( ! isset( $categories[ $category ] ) ) {
				$categories[ $category ] = [];
			}

			$categories[ $category ][ $pattern ] = $file;
		}
	}

	$categories = apply_filters( 'aegis_patterns', $categories );

	ksort( $categories );

	$registered_categories = [];
	$registered_slugs      = [];
	$all_patterns          = WP_Block_Patterns_Registry::get_instance()->get_all_registered() ?? [];

	foreach ( $all_patterns as $pattern ) {
		$registered_slugs[] = $pattern['slug'] ?? '';
	}

	foreach ( $categories as $category => $patterns ) {

		if ( ! in_array( $category, $registered_categories, true ) ) {

			if ( in_array( $category, [ 'cta', 'faq' ], true ) ) {
				$label = strtoupper( $category );
			} else {
				$label = ucwords( str_replace( '-', ' ', $category ) );
			}

			register_block_pattern_category(
				$category,
				[
					'label' => $label,
				]
			);

			$registered_categories[ $category ] = [];
		}

		foreach ( $patterns as $pattern => $file ) {
			$basename = basename( $file, '.php' );

			if ( in_array( $basename, $registered_categories[ $category ], true ) ) {
				continue;
			}

			$registered_categories[ $category ][] = $basename;

			$slug = $category . '-' . $basename;

			if ( in_array( $slug, $registered_slugs, true ) ) {
				continue;
			}

			register_block_pattern_from_file( $file );
		}
	}
}

/**
 * Parses a pattern file and returns the pattern data.
 *
 * Extracts pattern metadata from PHP file headers and content,
 * organizing it into a structured array for registration.
 *
 * @since 1.0.0
 *
 * @param string $file The file path or content.
 *
 * @return array Pattern data including slug, title, content, and other properties.
 */
function parse_pattern_file( string $file ): array {
	if ( ! $file ) {
		return [];
	}

	$content         = '';
	$default_headers = [
		'categories'  => 'Categories',
		'title'       => 'Title',
		'slug'        => 'Slug',
		'block_types' => 'Block Types',
		'inserter'    => 'Inserter',
		'ID'          => 'ID',
		'theme'       => 'Theme',
	];

	if ( is_readable( $file ) ) {
		$headers = get_file_data( $file, $default_headers );

		ob_start();
		$global_settings = wp_get_global_settings();

		include $file;
		$content = ob_get_clean();

	} else {
		if ( str_contains( $file, 'Title: ' ) ) {
			$content = $file;
			$headers = $default_headers;

			// Use regex from get_file_data().
			foreach ( $headers as $field => $regex ) {
				if ( preg_match( '/^(?:[ \t]*<\?php)?[ \t\/*#@]*' . preg_quote( $regex, '/' ) . ':(.*)$/mi', $file, $match ) && $match[1] ) {
					$headers[ $field ] = _cleanup_header_comment( $match[1] );
				} else {
					$headers[ $field ] = '';
				}
			}
		}
	}

	if ( ! isset( $headers['title'], $headers['slug'], $headers['categories'] ) ) {
		return [];
	}

	$categories = explode( ',', $headers['categories'] );

	$theme = $headers['theme'] ?? null;

	if ( ! $theme ) {
		$stylesheet_dir = get_stylesheet_directory();
		$template_dir   = get_template_directory();

		if ( $stylesheet_dir === $template_dir ) {
			$theme = get_template();
		} else if ( str_contains( $file, $stylesheet_dir ) ) {
			$theme = get_stylesheet();
		} else if ( str_contains( $file, $template_dir ) ) {
			$theme = get_template();
		}
	}

	$pattern = [
		'slug'        => $categories[0] . '-' . $headers['slug'],
		'title'       => $headers['title'],
		'content'     => str_replace_first(
			str_between( '<?php', '?>', $content ),
			'',
			$content
		),
		'categories'  => [ ...$categories ],
		'description' => $headers['description'] ?? '',
		'blockTypes'  => explode( ',', $headers['block_types'] ?? [] ),
		'ID'          => $headers['ID'] ?? null,
		'theme'       => $theme,
	];

	if ( ( $headers['inserter'] ?? null ) === 'false' ) {
		$pattern['inserter'] = false;
	}

	return $pattern;
}

/**
 * Parses and registers block pattern from PHP file with header comment.
 *
 * Takes a PHP file containing a block pattern definition, parses it,
 * registers any necessary categories, and registers the pattern with WordPress.
 *
 * @since 1.0.0
 *
 * @param string $file Path to PHP file or content.
 *
 * @return void
 */
function register_block_pattern_from_file( string $file ): void {
	$pattern    = parse_pattern_file( $file );
	$categories = $pattern['categories'] ?? [];

	foreach ( $categories as $category ) {

		if ( in_array( $category, [ 'cta', 'faq' ], true ) ) {
			$label = strtoupper( $category );
		} else {
			$label = ucwords( str_replace( '-', ' ', $category ) );
		}

		register_block_pattern_category(
			$category,
			[
				'label' => $label,
			]
		);
	}

	register_block_pattern( $pattern['slug'], $pattern );
}

/**
 * Get block HTML.
 *
 * Generates HTML for a block, optionally rendering it. Handles nested blocks
 * and applies appropriate classes and styles.
 *
 * @since 1.0.0
 *
 * @param array $block  Block data structure.
 * @param bool  $render Whether to render the block.
 *
 * @return string Generated HTML or serialized block.
 */
function get_block_html( array $block, bool $render = false ): string {
	$block['innerContent'] = $block['innerContent'] ?? [];
	$block['innerHTML']    = $block['innerHTML'] ?? '';
	$block['innerBlocks']  = $block['innerBlocks'] ?? [];
	$name                  = strip_core_block_namespace( $block['blockName'] ?? '' );

	if ( ! $name || empty( $block['innerBlocks'] ) ) {
		return serialize_block( $block );
	}

	$classes = array_filter( [
		'wp-block-' . $name,
		$block['attrs']['className'] ?? null,
		isset( $block['attrs']['fontSize'] ) ? 'has-' . $block['attrs']['fontSize'] . '-font-size' : null,
		isset( $block['attrs']['textColor'] ) ? 'has-' . $block['attrs']['textColor'] . '-color' : null,
		isset( $block['attrs']['backgroundColor'] ) ? 'has-' . $block['attrs']['backgroundColor'] . '-background-color' : null,
	] );

	$styles = array_filter( [
		'gap' => $block['attrs']['style']['spacing']['blockGap'] ?? null,
	] );

	$tag     = $block['tagName'] ?? $block['attrs']['tagName'] ?? 'div';
	$opening = sprintf( '<%s class="%s" style="%s">', $tag, implode( ' ', $classes ), css_array_to_string( $styles ) );
	$closing = sprintf( '</%s>', $tag );

	$inner_content = $block['innerContent'];
	array_unshift( $inner_content, $opening );
	$inner_content[] = $closing;

	foreach ( $block['innerBlocks'] as $inner_block ) {
		$inner_content[] = get_block_html( $inner_block );
	}

	$block['innerContent'] = $inner_content;
	$block['innerHTML']    = implode( '', $inner_content );

	$serialized   = serialize_block( $block );
	$parsed_block = parse_blocks( $serialized )[0];

	return $render ? render_block( $parsed_block ) : $serialized;
}

/**
 * Converts a CSS property array to a string.
 *
 * @since 1.0.0
 *
 * @param array $styles Array of CSS properties.
 *
 * @return string CSS string.
 */
function css_array_to_string( array $styles ): string {
	$css = '';

	foreach ( $styles as $property => $value ) {
		if ( $value ) {
			$css .= $property . ':' . $value . ';';
		}
	}

	return $css;
}

/**
 * Extracts content between two strings.
 *
 * @since 1.0.0
 *
 * @param string $start  Start string.
 * @param string $end    End string.
 * @param string $content Content to search in.
 *
 * @return string Content between start and end strings.
 */
function str_between( string $start, string $end, string $content ): string {
	$r = explode( $start, $content );
	
	if ( isset( $r[1] ) ) {
		$r = explode( $end, $r[1] );
		return $start . $r[0] . $end;
	}
	
	return '';
}

/**
 * Replaces first occurrence of a string.
 *
 * @since 1.0.0
 *
 * @param string $search  String to search for.
 * @param string $replace Replacement string.
 * @param string $subject String to search in.
 *
 * @return string Modified string.
 */
function str_replace_first( string $search, string $replace, string $subject ): string {
	$pos = strpos( $subject, $search );
	
	if ( $pos !== false ) {
		return substr_replace( $subject, $replace, $pos, strlen( $search ) );
	}
	
	return $subject;
}
