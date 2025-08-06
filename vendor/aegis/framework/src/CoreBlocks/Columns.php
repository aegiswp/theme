<?php
/**
 * Columns Block
 *
 * Provides support for rendering columns blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling columns block content
 * - Integrates with utility classes for DOM and CSS
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function array_unique;
use function count;
use function explode;

// Implements the Columns class to support columns block rendering.

/**
 * Handles the rendering of the core/columns block.
 *
 * This class enhances the default columns block by adding several useful features:
 * - Applies custom margin values from the block's spacing settings.
 * - Adds a `is-stacked-on-mobile` or `is-not-stacked-on-mobile` class for responsive control.
 * - Injects the number of columns as a `data-columns` attribute and a `--columns` CSS
 *   custom property, allowing for advanced styling based on the column count.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Columns implements Renderable {

	/**
	 * Renders the columns block with additional attributes and classes.
	 *
	 * This method is hooked into the `render_block_core/columns` filter to add
	 * custom styles, classes, and data attributes to the block's wrapper `<div>`.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/columns
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs = $block['attrs'] ?? [];

		// Create a DOM object from the block content.
		$dom = DOM::create( $block_content );
		$div = DOM::get_element( 'div', $dom );

		// If the main wrapper div isn't found, return the original content.
		if ( ! $div ) {
			return $block_content;
		}

		$classes = explode( ' ', $div->getAttribute( 'class' ) );
		$styles  = CSS::string_to_array( $div->getAttribute( 'style' ) );

		// Apply custom margins from block attributes.
		$margin = $attrs['style']['spacing']['margin'] ?? null;
		if ( $margin ) {
			$styles = CSS::add_shorthand_property( $styles, 'margin', $margin );
		}

		// Add a class based on whether the columns are set to stack on mobile.
		$stacked   = $attrs['isStackedOnMobile'] ?? true;
		$classes[] = $stacked ? 'is-stacked-on-mobile' : 'is-not-stacked-on-mobile';

		// Count the number of inner blocks (columns).
		$column_count = (string) count( $block['innerBlocks'] ?? 0 );

		// Add the column count as a data attribute and a CSS custom property.
		$div->setAttribute( 'data-columns', $column_count );
		$styles['--columns'] = $column_count;

		// Apply the updated styles and classes back to the wrapper div.
		$div->setAttribute( 'style', CSS::array_to_string( $styles ) );
		$div->setAttribute( 'class', implode( ' ', array_unique( $classes ) ) );

		// Return the modified HTML.
		return $dom->saveHTML();
	}

}
