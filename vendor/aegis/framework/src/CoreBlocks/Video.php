<?php
/**
 * Video Block
 *
 * Provides support for rendering video blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and managing video block content
 * - Integrates with utility classes for DOM, CSS, and WordPress helpers
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for core blocks.
declare( strict_types=1 );

// Declares the namespace for core blocks within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, renderable blocks, and WordPress helpers.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function add_action;
use function add_theme_support;
use function esc_attr;
use function wp_add_inline_script;
use function wp_enqueue_script;
use function wp_enqueue_style;

// Implements the Video class to support video block rendering.

/**
 * Handles the rendering and functionality of the core/video block.
 *
 * This class customizes the video block to make it responsive and to handle
 * custom background colors more flexibly. It uses a combination of a render
 * filter, a script enqueueing action, and a theme support hook to achieve this.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Video implements Renderable {

	/**
	 * Renders the video block with custom styles and enqueues player scripts.
	 *
	 * This method is hooked into the `render_block_core/video` filter. It moves
	 * any background color styles into a CSS custom property for better theme
	 * control. It also ensures that the necessary scripts and styles for the
	 * responsive video player are enqueued exactly once per page load.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/video 11
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom    = DOM::create( $block_content );
		$figure = DOM::get_element( 'figure', $dom );

		if ( ! $figure ) {
			return $block_content;
		}

		// Move the background color to a CSS custom property for more flexible styling.
		$styles     = CSS::string_to_array( $figure->getAttribute( 'style' ) );
		$background = $styles['background'] ?? $styles['background-color'] ?? '';
		if ( $background ) {
			$styles['--wp--custom--video--background'] = esc_attr( $background );
			unset( $styles['background'], $styles['background-color'] );
		}
		$figure->setAttribute( 'style', CSS::array_to_string( $styles ) );

		$block_content = $dom->saveHTML();

		// Use a static flag to ensure the scripts are only enqueued once per page load,
		// even if multiple video blocks are present.
		static $is_enqueued = false;
		if ( ! $is_enqueued ) {
			add_action( 'wp_enqueue_scripts', [ $this, 'video_scripts_styles' ] );
			$is_enqueued = true;
		}

		return $block_content;
	}

	/**
	 * Enqueues and initializes the WordPress media player.
	 *
	 * This method loads the `wp-mediaelement` library and adds an inline script
	 * to initialize the player on all `<video>` elements, forcing them to be
	 * responsive by setting their width and height to 100%.
	 *
	 * @since 1.0.0
	 */
	public function video_scripts_styles(): void {
		$js = <<<JS
		const videoBlocks = document.getElementsByTagName( 'video' );

		[ ...videoBlocks ].forEach( function( videoBlock ) {
			new MediaElementPlayer( videoBlock, {
				videoWidth: '100%',
				videoHeight: '100%',
				enableAutosize: true
			} );

			videoBlock.style.width = '100%';
			videoBlock.style.height = '100%';
		} );
	JS;

		wp_enqueue_script( 'wp-mediaelement' );
		wp_enqueue_style( 'wp-mediaelement' );
		wp_add_inline_script( 'wp-mediaelement', $js );
	}

	/**
	 * Adds theme support for responsive embeds.
	 *
	 * This ensures that WordPress's core responsive embed wrappers are applied,
	 * which is a prerequisite for some responsive video behaviors.
	 *
	 * @since 1.0.0
	 *
	 * @hook   after_setup_theme
	 */
	public function theme_supports(): void {
		add_theme_support( 'responsive-embeds' );
	}
}
