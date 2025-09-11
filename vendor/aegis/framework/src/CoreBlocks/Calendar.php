<?php
/**
 * Calendar Block
 *
 * Provides support for rendering calendar blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and manipulating calendar block content
 * - Integrates with utility classes for DOM and string manipulation
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for core blocks.
declare( strict_types=1 );

// Declares the namespace for core blocks within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports utility classes and interfaces for DOM manipulation, renderable blocks, and string utilities.
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Utilities\Str;
use WP_Block;
use function explode;
use function implode;

// Implements the Calendar class to support calendar block rendering.

/**
 * Handles the rendering of the core/calendar block.
 *
 * This class corrects a styling issue in the default calendar block where
 * color and background classes are applied to the `<table>` element instead of
 * the main wrapper `<div>`. This class moves those classes to the parent `<div>`
 * to ensure styles like padding and margins are displayed correctly.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Calendar implements Renderable {

	/**
	 * Renders the calendar block with corrected color and background classes.
	 *
	 * This method is hooked into the `render_block_core/calendar` filter. It
	 * parses the block's HTML, finds any `has-background` or `has-text-color`
	 * classes on the `<table>` element, and moves them to the parent `<div>`.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/calendar 10
	 *
	 * @return string The modified block content with corrected class placements.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		// Create a DOM object from the block content.
		$dom   = DOM::create( $block_content );
		$div   = DOM::get_element( 'div', $dom );
		$table = DOM::get_element( 'table', $div );

		// If there is no table element, there's nothing to fix.
		if ( ! $table ) {
			return $block_content;
		}

		// Get the class lists from both the wrapper and the table.
		$div_classes   = explode( ' ', $div->getAttribute( 'class' ) );
		$table_classes = explode( ' ', $table->getAttribute( 'class' ) );

		// Iterate through the table's classes.
		foreach ( $table_classes as $index => $table_class ) {
			// If a class is related to color or background...
			if ( Str::contains_any( $table_class, 'background', 'color' ) ) {
				// ...move it from the table to the wrapper div...
				$div_classes[] = $table_class;
				// ...and remove it from the table's class list.
				unset( $table_classes[ $index ] );
			}
		}

		// Apply the updated class lists back to the elements.
		$div->setAttribute( 'class', implode( ' ', $div_classes ) );
		$table->setAttribute( 'class', implode( ' ', $table_classes ) );

		// Return the modified HTML.
		return $dom->saveHTML();
	}

}
