<?php
/**
 * Animation Management for Aegis Theme
 *
 * This file handles the registration and management of animations for the Aegis theme.
 * It provides functionality to extract animations from CSS files, add animation attributes
 * to blocks, and load animation-related JavaScript conditionally based on content.
 *
 * The file includes functions to:
 * - Extract animation keyframes from CSS files
 * - Add animation styles to inline CSS
 * - Add animation names to the editor data
 * - Render animation attributes on blocks
 * - Load animation and scroll JavaScript conditionally
 *
 * @package aegis
 * @subpackage theme
 * @since 1.0.0
 */

declare( strict_types=1 );

namespace aegis\theme;

use function add_filter;
use function array_diff;
use function array_unique;
use function esc_attr;
use function explode;
use function file_exists;
use function file_get_contents;
use function str_contains;

/**
 * Gets animations from stylesheet.
 *
 * Extracts animation keyframes from the animations CSS file and
 * organizes them into an associative array for use in the theme.
 *
 * @since 1.0.0
 *
 * @return array Array of animation keyframes with names as keys.
 */
function get_animations(): array {
	$file = get_dir() . 'assets/css/extensions/animations.css';

	if ( ! file_exists( $file ) ) {
		return [];
	}

	$parts      = explode( '@keyframes', file_get_contents( $file ) );
	$animations = [];

	unset( $parts[0] );

	foreach ( $parts as $animation ) {
		$name = trim( explode( '{', $animation )[0] ?? '' );

		$animations[ $name ] = str_replace( $name, '', $animation );
	}

	return $animations;
}

add_filter( 'aegis_inline_css', __NAMESPACE__ . '\\get_animation_styles', 10, 3 );
/**
 * Returns inline styles for animations.
 *
 * Processes animation keyframes and adds them to the inline CSS
 * when they are used in the page content. Also includes the main
 * animation CSS file if it exists.
 *
 * @since 1.0.0
 *
 * @param string $css     Inline CSS.
 * @param string $content Page content.
 * @param bool   $all     Whether to include all animations regardless of usage.
 *
 * @return string Modified inline CSS with animation styles.
 */
function get_animation_styles( string $css, string $content, bool $all ): string {
	$animations = get_animations();

	foreach ( $animations as $name => $animation ) {
		if ( $all || str_contains( $content, "animation-name:{$name}" ) ) {
			$css .= "@keyframes $name" . trim( $animation );
		}
	}

	$file = get_dir() . 'assets/css/extensions/animation.css';

	if ( file_exists( $file ) ) {
		$css .= file_get_contents( $file );
	}

	return $css;
}

add_filter( 'aegis_editor_data', __NAMESPACE__ . '\\add_animation_names' );
/**
 * Adds animation names to editor, so they are available for options.
 *
 * Makes animation names available in the editor interface for selection
 * in block settings and controls.
 *
 * @since 1.0.0
 *
 * @param array $data Editor data.
 *
 * @return array Modified editor data with animation names.
 */
function add_animation_names( array $data ): array {
	$data['animations'] = array_keys( get_animations() );

	return $data;
}

add_filter( 'render_block', __NAMESPACE__ . '\\render_animation_attributes', 10, 2 );
/**
 * Adds animation attributes to block.
 *
 * Processes block attributes and adds the necessary HTML attributes
 * for animations to work properly. Handles different animation events
 * like scroll and infinite animations.
 *
 * @since 1.0.0
 *
 * @param string $html  The block content.
 * @param array  $block The block data.
 *
 * @return string Modified block HTML with animation attributes.
 */
function render_animation_attributes( string $html, array $block ): string {
	$animation = $block['attrs']['animation'] ?? [];

	if ( empty( $animation ) ) {
		return $html;
	}

	$infinite = ( $animation['iterationCount'] ?? null ) === '-1' || ( $animation['event'] ?? null ) === 'infinite';

	$dom   = dom( $html );
	$first = get_dom_element( '*', $dom );

	if ( ! $first ) {
		return $html;
	}

	$classes = explode( ' ', $first->getAttribute( 'class' ) );
	$classes = array_unique( $classes );
	$styles  = css_string_to_array( $first->getAttribute( 'style' ) );

	unset( $styles['animation-play-state'] );

	if ( $infinite ) {
		unset( $styles['--animation-event'] );

		$styles['animation-iteration-count'] = 'infinite';

	} else {
		unset( $styles['animation-name'] );

		$styles['--animation-name'] = esc_attr( $animation['name'] ?? '' );
	}

	$event = $animation['event'] ?? '';

	if ( $event === 'scroll' ) {
		$classes[] = 'animate';
		$classes[] = 'has-scroll-animation';

		$classes = array_diff( $classes, [ 'has-animation' ] );

		$styles['animation-delay']      = 'calc(var(--scroll) * -1s)';
		$styles['animation-play-state'] = 'paused';
		$styles['animation-duration']   = '1s';
		$styles['animation-fill-mode']  = 'both';

		unset( $styles['--animation-event'] );

		$offset = $animation['offset'] ?? '0';

		if ( $offset === '0' ) {
			$offset = '0.01';
		}

		if ( $offset ) {
			$first->setAttribute( 'data-offset', esc_attr( $offset ) );
		}
	}

	if ( $styles ) {
		$first->setAttribute( 'style', css_array_to_string( $styles ) );
	}

	$first->setAttribute( 'class', implode( ' ', $classes ) );

	return $dom->saveHTML();
}

add_filter( 'aegis_inline_js', __NAMESPACE__ . '\\add_animation_js', 10, 3 );
/**
 * Conditionally add animation JS.
 *
 * Adds animation JavaScript to the inline JS when animation
 * classes are detected in the page content.
 *
 * @since 1.0.0
 *
 * @param string $js      The inline JS.
 * @param string $content The block content.
 * @param bool   $all     Whether to add all JS regardless of content.
 *
 * @return string Modified inline JS with animation scripts.
 */
function add_animation_js( string $js, string $content, bool $all ): string {
	if ( $all || str_contains_any( $content, 'has-animation', 'has-scroll-animation' ) ) {
		$file = get_dir() . 'assets/js/animation.js';

		if ( file_exists( $file ) ) {
			$js .= file_get_contents( $file );
		}
	}

	return $js;
}

add_filter( 'aegis_inline_js', __NAMESPACE__ . '\\add_scroll_js', 10, 3 );
/**
 * Adds scroll JS to the inline JS.
 *
 * Adds scroll-related JavaScript to the inline JS when scroll
 * animations are detected in the page content.
 *
 * @since 1.0.0
 *
 * @param string $js      Inline JS.
 * @param string $content Page content.
 * @param bool   $all     Whether to add all JS regardless of content.
 *
 * @return string Modified inline JS with scroll scripts.
 */
function add_scroll_js( string $js, string $content, bool $all ): string {
	if ( $all || str_contains_any( $content, 'animation-event:scroll', 'has-scroll-animation' ) ) {
		$file = get_dir() . 'assets/js/scroll.js';

		if ( file_exists( $file ) ) {
			$js .= file_get_contents( $file );
		}
	}

	return $js;
}

add_filter( 'aegis_inline_js', __NAMESPACE__ . '\\add_packery_js', 10, 3 );
/**
 * Adds packery JS to the inline JS.
 *
 * Adds packery layout JavaScript to the inline JS when packery
 * classes are detected in the page content.
 *
 * @since 1.0.0
 *
 * @param string $js      Inline JS.
 * @param string $content Page content.
 * @param bool   $all     Whether to add all JS regardless of content.
 *
 * @return string Modified inline JS with packery scripts.
 */
function add_packery_js( string $js, string $content, bool $all ): string {
	if ( $all || str_contains_any( $content, 'packery' ) ) {
		$file = get_dir() . 'assets/js/packery.js';

		if ( file_exists( $file ) ) {
			$js .= file_get_contents( $file );
		}
	}

	return $js;
}
