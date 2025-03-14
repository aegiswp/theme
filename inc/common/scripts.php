<?php
/**
 * Script Management for Aegis Theme
 *
 * This file handles the registration and management of JavaScript for the Aegis theme.
 * It provides functionality to enqueue scripts, add inline JavaScript, and manage
 * editor scripts. The file optimizes script loading and provides data to the block
 * editor for enhanced functionality.
 *
 * The file includes functions to:
 * - Generate and filter inline scripts
 * - Enqueue frontend scripts
 * - Enqueue editor scripts
 * - Provide editor data through localization
 * - Prevent emoji detection scripts
 *
 * @package aegis
 * @subpackage theme
 * @since 1.0.0
 */

declare( strict_types=1 );

namespace aegis\theme;

use function add_action;
use function apply_filters;
use function filemtime;
use function function_exists;
use function get_current_screen;
use function get_template;
use function home_url;
use function is_admin;
use function remove_action;
use function trailingslashit;
use function wp_add_inline_script;
use function wp_enqueue_script;
use function wp_get_theme;
use function wp_localize_script;
use function wp_register_script;

/**
 * Returns inline scripts with optional filtering.
 *
 * Processes and returns inline JavaScript for the theme. Can return all scripts
 * or only those needed for the current page. Applies whitespace reduction for
 * optimized delivery.
 *
 * @since 1.0.0
 *
 * @param string $content Page content to analyze for script requirements.
 * @param bool   $all     Whether to return all inline scripts or only page-specific ones.
 *
 * @return string Processed inline JavaScript ready for inclusion.
 */
function get_inline_scripts( string $content, bool $all ): string {

	/**
	 * Filters inline scripts.
	 *
	 * @since 1.0.0
	 *
	 * @param string $js      Inline scripts.
	 * @param string $content Template HTML.
	 * @param bool   $all     Whether to return all inline scripts.
	 */
	$js = apply_filters(
		'aegis_inline_js',
		'',
		$content,
		$all
	);

	return reduce_whitespace( trim( $js ) );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_scripts' );
/**
 * Register proxy handle for inline frontend scripts.
 *
 * Creates a script handle that serves as a container for inline JavaScript.
 * This approach allows for proper script dependency management while still
 * using inline scripts for performance optimization.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_scripts(): void {
	$handle = get_template();

	wp_register_script(
		$handle,
		'',
		[],
		wp_get_theme()->get( 'version' ),
		true
	);

	wp_add_inline_script(
		$handle,
		get_inline_scripts(
			(string) ( $GLOBALS['template_html'] ?? '' ),
			false
		),
	);

	wp_enqueue_script( $handle );
}

add_action( 'enqueue_block_assets', __NAMESPACE__ . '\\enqueue_editor_scripts' );
/**
 * Enqueues editor assets.
 *
 * Loads JavaScript files needed for the block editor experience.
 * Only loads in admin context and checks for file existence before
 * attempting to enqueue.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_editor_scripts(): void {
	if ( ! is_admin() ) {
		return;
	}

	$dir   = get_dir();
	$asset = $dir . 'assets/js/editor.asset.php';

	if ( ! file_exists( $asset ) ) {
		return;
	}

	$asset  = require $asset;
	$handle = 'aegis-editor';
	$file   = 'assets/js/editor.js';

	wp_register_script(
		$handle,
		get_uri() . $file,
		$asset['dependencies'] ?? [],
		filemtime( $dir . $file ),
		true
	);

	wp_enqueue_script( $handle );

	wp_localize_script(
		$handle,
		'aegis',
		get_editor_data()
	);
}

/**
 * Returns filtered editor data.
 *
 * Provides an array of data needed by the editor JavaScript.
 * Includes URLs, nonce for security, and other configuration options.
 *
 * @since 1.0.0
 *
 * @return array Editor data for script localization.
 */
function get_editor_data(): array {
	$current_screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;

	/**
	 * Filters editor data.
	 *
	 * @since 1.0.0
	 *
	 * @param array $data Editor data.
	 */
	return apply_filters(
		'aegis_editor_data',
		[
			'url'           => get_uri(),
			'siteUrl'       => trailingslashit( home_url() ),
			'ajaxUrl'       => admin_url( 'admin-ajax.php' ),
			'adminUrl'      => trailingslashit( admin_url() ),
			'nonce'         => wp_create_nonce( 'aegis' ),
			'icon'          => get_icon( 'social', 'aegis' ),
			'siteEditor'    => $current_screen && $current_screen->base === 'site-editor',
			'excerptLength' => apply_filters( 'excerpt_length', 55 ),
		]
	);
}

// Prevent special characters converting to emojis (arrows, lines, etc.).
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

/**
 * Reduces whitespace in a string.
 *
 * Removes unnecessary whitespace from JavaScript to reduce file size
 * while preserving functionality.
 *
 * @since 1.0.0
 *
 * @param string $string The string to reduce whitespace in.
 *
 * @return string The string with reduced whitespace.
 */
function reduce_whitespace( string $string ): string {
	$string = preg_replace( '/\s+/', ' ', $string );
	$string = preg_replace( '/(\s+)(\W)/', '$2', $string );
	$string = preg_replace( '/(\W)(\s+)/', '$1', $string );
	
	return trim( $string );
}

/**
 * Gets the URI for the theme directory.
 *
 * @since 1.0.0
 *
 * @return string The URI for the theme directory.
 */
function get_uri(): string {
	return trailingslashit( get_template_directory_uri() );
}
