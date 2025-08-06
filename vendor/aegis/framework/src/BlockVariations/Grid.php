<?php
/**
 * Grid Block Variation
 *
 * Provides support for rendering grid layout blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling grid block content
 * - Integrates with the Renderable interface for block output
 *
 * @package    Aegis\Framework\BlockVariations
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for block variations.
declare( strict_types=1 );

// Declares the namespace for block variations within the Aegis Framework.
namespace Aegis\Framework\BlockVariations;

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;

// Implements the Grid class to support grid block rendering.

/**
 * Handles the "Grid" layout variation for the core/group block.
 *
 * When a Group block is set to the "Grid" layout orientation, this class ensures
 * that it has a sensible default for vertical alignment, making all items in a
 * row the same height unless specified otherwise.
 *
 * @package Aegis\Framework\BlockVariations
 * @since   1.0.0
 */
class Grid implements Renderable {

	/**
	 * Applies a default vertical alignment to grid-based group blocks.
	 *
	 * This method is hooked into the `render_block_core/group` filter. If it
	 * detects that the group block is using the "Grid" layout but does not have
	 * a vertical alignment set, it applies `align-items: stretch` as a default.
	 * This ensures all grid items are equal height by default.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/group
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$layout      = $block['attrs']['layout'] ?? [];
		$orientation = $layout['orientation'] ?? '';

		// Only apply to blocks with the "grid" layout orientation.
		if ( 'grid' !== $orientation ) {
			return $block_content;
		}

		// If a vertical alignment is already set by the user, do nothing.
		if ( ! empty( $layout['verticalAlignment'] ) ) {
			return $block_content;
		}

		// --- Apply the default style ---
		$dom = DOM::create( $block_content );
		$div = DOM::get_element( 'div', $dom );

		if ( $div ) {
			// Default to stretching items to be equal height.
			$styles                = CSS::string_to_array( $div->getAttribute( 'style' ) );
			$styles['align-items'] = 'stretch';
			$div->setAttribute( 'style', CSS::array_to_string( $styles ) );
			$block_content = $dom->saveHTML();
		}

		return $block_content;
	}

}
