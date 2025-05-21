<?php
/**
 * Block Styles API
 *
 * Manages registration and unregistration of block styles, and related rendering hooks.
 *
 * Responsibilities:
 * - Registers and unregisters custom block styles for core blocks
 * - Adds additional style options based on global settings
 * - Hooks into the block rendering pipeline to modify block HTML for certain styles
 *
 * Hooks/Filters Registered:
 * - 'aegis_editor_data': Registers block styles in the editor config
 * - 'render_block': Adds sub-heading clip text class to blocks as needed
 *
 * @package    Aegis\Theme
 * @subpackage Block Styles
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this doc update.
 */

declare( strict_types=1 );

namespace Aegis\Theme;

use function __;
use function add_filter;
use function str_contains;
use function str_replace;
use function wp_get_global_settings;

/**
 * Filter: 'aegis_editor_data'
 * Registers block styles into the Aegis editor config.
 *
 * @see register_block_styles()
 */
add_filter( 'aegis_editor_data', NS . 'register_block_styles' );
/**
 * Registers and unregisters block styles for core blocks in the editor config.
 *
 * Adds custom style options to blocks and removes unwanted styles based on global settings.
 *
 * @since 1.0.0
 *
 * @param array $config Aegis editor config.
 * @return array Modified editor config with block style registration and unregistration.
 */
function register_block_styles( array $config ): array {
	$register = [
		'core/archive-title'       => [ 'sub-heading' ],
		'core/buttons'             => [ 'surface' ],
		'core/button'              => [ 'reverse' ],
		'core/code'                => [ 'surface' ],
		'core/columns'             => [ 'surface' ],
		'core/column'              => [ 'surface' ],
		'core/comment-author-name' => [ 'heading' ],
		'core/details'             => [
			[ 'summary-heading' => __( 'Heading', 'aegis' ) ],
		],
		'core/group'               => [ 'surface' ],
		'core/list'                => [ 'checklist', 'check-outline', 'check-circle', 'square', 'list-heading', 'dash', 'none' ],
		'core/list-item'           => [ 'surface' ],
		'core/navigation'          => [ 'heading' ],
		'core/page-list'           => [ 'none' ],
		'core/paragraph'           => [ 'sub-heading', 'notice', 'heading' ],
		'core/post-author-name'    => [ 'heading' ],
		'core/post-terms'          => [ 'list', 'sub-heading', 'badges' ],
		'core/post-title'          => [ 'sub-heading' ],
		'core/query-pagination'    => [ 'badges' ],
		'core/read-more'           => [ 'button' ],
		'core/site-title'          => [ 'heading' ],
		'core/spacer'              => [ 'angle', 'curve', 'round', 'wave', 'fade' ],
		'core/tag-cloud'           => [ 'badges' ],
		'core/quote'               => [ 'surface' ],
	];

	$global_settings  = wp_get_global_settings();
	$button_secondary = $global_settings['custom']['buttonSecondary'] ?? null;

	if ( $button_secondary ) {
		$register['core/button'][] = 'secondary';
	}

	$dark_mode  = $global_settings['custom']['darkMode'] ?? null;
	$light_mode = $global_settings['custom']['lightMode'] ?? null;

	if ( $dark_mode || $light_mode ) {
		$register['core/code'][]    = 'light';
		$register['core/code'][]    = 'dark';
		$register['core/column'][]  = 'light';
		$register['core/column'][]  = 'dark';
		$register['core/columns'][] = 'light';
		$register['core/columns'][] = 'dark';
		$register['core/group'][]   = 'light';
		$register['core/group'][]   = 'dark';
	}

	// Values must be arrays.
	$unregister = [
		'core/image'     => [ 'rounded', 'default' ],
		'core/site-logo' => [ 'default', 'rounded' ],
		'core/separator' => [ 'wide', 'dots' ],
	];

	$config['blockStyles'] = [
		'register'   => $register,
		'unregister' => $unregister,
	];

	return $config;
}

/**
 * Filter: 'render_block'
 * Adds sub-heading clip text class to block HTML when required.
 *
 * @see add_sub_heading_clip_text()
 */
add_filter( 'render_block', NS . 'add_sub_heading_clip_text', 10, 2 );
/**
 * Adds sub-heading clip text class to block HTML if the style and global settings require it.
 *
 * If the block uses the 'sub-heading' style and the global subHeading background is a gradient, adds a class for gradient text background.
 *
 * @since 1.0.0
 *
 * @param string $html  Block HTML.
 * @param array  $block Block data.
 * @return string Modified block HTML with sub-heading gradient class if needed.
 */
function add_sub_heading_clip_text( string $html, array $block ): string {
	$class_names = $block['attrs']['className'] ?? '';

	// Only proceed if block uses the 'sub-heading' style
	if ( ! str_contains( $class_names, 'is-style-sub-heading' ) ) {
		return $html;
	}

	$global_settings = wp_get_global_settings();
	$background      = $global_settings['custom']['subHeading']['background'] ?? '';

	// Only add gradient class if the background is a gradient
	if ( ! str_contains( $background, 'gradient' ) ) {
		return $html;
	}

	// Add the has-text-gradient-background class
	return str_replace( 'is-style-sub-heading', 'is-style-sub-heading has-text-gradient-background', $html );
}
