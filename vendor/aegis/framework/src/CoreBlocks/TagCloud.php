<?php
/**
 * Tag Cloud Block
 *
 * Provides support for rendering tag cloud blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling tag cloud block content
 * - Integrates with utility classes for DOM and WordPress helpers
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

// Imports utility classes and interfaces for DOM manipulation, renderable blocks, and WordPress helpers.
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function esc_attr;
use function implode;

// Implements the TagCloud class to support tag cloud block rendering.

/**
 * Handles the rendering of the core/tag-cloud block.
 *
 * This class customizes the tag cloud block by applying a font size based on
 * the block's `smallestFontSize` and `largestFontSize` attributes.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class TagCloud implements Renderable {

	/**
	 * Renders the tag cloud block with a custom font size.
	 *
	 * This method is hooked into the `render_block_core/tag-cloud` filter. It
	 * takes the `smallestFontSize` and `largestFontSize` attributes and uses them
	 * to set a single font size on the wrapper element.
	 *
	 * Note: The use of `max()` means the font size for the entire block will be
	 * set to whichever of the two values is larger, effectively making all tags
	 * the same size rather than a range.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/tag-cloud
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$smallest  = esc_attr( $block['attrs']['smallestFontSize'] ?? '1em' );
		$largest   = esc_attr( $block['attrs']['largestFontSize'] ?? '1em' );
		$dom       = DOM::create( $block_content );
		$paragraph = DOM::get_element( 'p', $dom );

		if ( ! $paragraph ) {
			return $block_content;
		}

		// Prepend a `font-size` style to the existing inline styles.
		// The use of `max()` will set the font size to the larger of the two values.
		$paragraph->setAttribute(
			'style',
			implode( ';', [
				'font-size:max(' . $smallest . ',' . $largest . ')',
				$paragraph->getAttribute( 'style' ),
			] )
		);

		return $dom->saveHTML();
	}
}
