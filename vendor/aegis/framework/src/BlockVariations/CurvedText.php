<?php
/**
 * CurvedText Block Variation
 *
 * Provides support for rendering curved text blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling curved text block content
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

// Imports utility classes and interfaces for DOM manipulation and renderable blocks.
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;

// Implements the CurvedText class to support curved text block rendering.

/**
 * Handles the "Curved Text" style variation for the core/paragraph block.
 *
 * This class transforms a paragraph block into an SVG element that renders the
 * text along a curved path. It works by taking a template SVG string and a
 * content string from the block's attributes, and injecting the content into
 * the SVG's `<textPath>` element.
 *
 * @package Aegis\Framework\BlockVariations
 * @since   1.0.0
 */
class CurvedText implements Renderable {

	/**
	 * Renders the paragraph block as curved SVG text.
	 *
	 * This method is hooked into the `render_block_core/paragraph` filter. If it
	 * finds the necessary `curvedText` attributes, it clears the content of the
	 * paragraph and appends a newly constructed SVG element with the curved text.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/paragraph 11
	 *
	 * @return string The modified block content, now containing an SVG.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$svg_string = $block['attrs']['curvedText']['svgString'] ?? '';

		if ( ! $svg_string ) {
			return $block_content;
		}

		// --- SVG and Content Preparation ---
		// Parse the original paragraph block to get the wrapper <p> element.
		$dom            = DOM::create( $block_content );
		$p              = DOM::get_element( 'p', $dom );
		// Clear any existing text content from the paragraph.
		$p->textContent = '';

		// Parse the SVG template string provided by the block attribute.
		$svg_dom     = DOM::create( $svg_string );
		$svg_element = DOM::get_element( 'svg', $svg_dom );
		if ( ! $svg_element ) {
			return $block_content;
		}

		// Find the <text> element within the SVG, which will contain the text path.
		$svg_text_element = DOM::get_element( 'text', $svg_element );
		if ( ! $svg_text_element ) {
			return $block_content;
		}

		// --- Content Injection and DOM Reconstruction ---
		// Find the <textPath> element (or the first child of <text>).
		$text_path_element = DOM::get_element( '*', $svg_text_element );
		if ( $text_path_element ) {
			// Inject the user's desired text content into the text path.
			$text_path_element->textContent = $block['attrs']['curvedText']['content'] ?? '';
		}

		// Save the modified SVG back to a string.
		$svg_string = $svg_dom->saveHTML( $svg_element );

		// Create a new DOM element from the modified SVG string and import it into the main document.
		$new_svg_dom     = DOM::create( $svg_string );
		$new_svg_element = DOM::get_element( 'svg', $new_svg_dom );
		$imported        = $dom->importNode( $new_svg_element, true );

		// Append the final SVG to the now-empty paragraph tag.
		$p->appendChild( $imported );

		return $dom->saveHTML( $p );
	}
}
