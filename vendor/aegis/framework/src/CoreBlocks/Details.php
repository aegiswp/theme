<?php
/**
 * Details Block
 *
 * Provides support for rendering details blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling details block content
 * - Integrates with utility classes for DOM, CSS, and scripts
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, scripts, and renderable blocks.
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function explode;

// Implements the Details class to support details block rendering.

/**
 * Handles the rendering and assets for the core/details block.
 *
 * This class enhances the default details block (used for accordions/collapsible
 * content) by adding custom expand/collapse icons and applying custom padding.
 * It also enqueues a JavaScript file to provide smooth animation for the
 * expand and collapse behavior.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Details implements Renderable, Scriptable {

	/**
	 * Renders the details block with custom icon styles and padding.
	 *
	 * This method is hooked into the `render_block_core/details` filter. It adds
	 * a style class based on the chosen `expandIcon` attribute and applies custom
	 * padding to the `<summary>` element while using negative margins to preserve
	 * the layout.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/details
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom     = DOM::create( $block_content );
		$details = DOM::get_element( 'details', $dom );

		if ( ! $details ) {
			return $block_content;
		}

		$summary     = DOM::get_element( 'summary', $details );
		$attrs       = $block['attrs'] ?? [];
		$padding     = $attrs['style']['spacing']['padding'] ?? [];
		$expand_icon = $attrs['expandIcon'] ?? '';
		$classes     = explode( ' ', $details->getAttribute( 'class' ) );

		// Add a class to the <details> element based on the selected icon style.
		if ( ! $expand_icon || 'chevron' === $expand_icon ) {
			$classes[] = 'is-style-chevron';
		}
		if ( 'plus' === $expand_icon ) {
			$classes[] = 'is-style-plus';
		}
		if ( 'circle' === $expand_icon ) {
			$classes[] = 'is-style-circle';
		}

		$details->setAttribute( 'class', implode( ' ', $classes ) );

		// Apply custom padding to the <summary> element.
		if ( $summary && $padding ) {
			$summary_styles = CSS::string_to_array( $summary->getAttribute( 'style' ) );

			// Apply padding from attributes.
			$summary_styles['padding-top']    = $padding['top'] ?? '';
			$summary_styles['padding-bottom'] = $padding['bottom'] ?? '';
			$summary_styles['padding-left']   = $padding['left'] ?? '';

			// Apply negative margins to counteract the padding, ensuring the element's
			// outer dimensions remain unchanged, which prevents layout shifts.
			$summary_styles['margin-top']    = 'calc(0px - ' . ( $padding['top'] ?? '' ) . ')';
			$summary_styles['margin-bottom'] = 'calc(0px - ' . ( $padding['bottom'] ?? '' ) . ')';
			$summary_styles['margin-left']   = 'calc(0px - ' . ( $padding['left'] ?? '' ) . ')';

			$summary->setAttribute( 'style', CSS::array_to_string( $summary_styles ) );
		}

		return $dom->saveHTML();
	}

	/**
	 * Enqueues the JavaScript file for the details block.
	 *
	 * This script provides smooth open/close animations, which are not
	 * supported by the native `<details>` HTML element.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts The script manager instance.
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_file( 'details.js', [ 'wp-block-details' ] );
	}

}
