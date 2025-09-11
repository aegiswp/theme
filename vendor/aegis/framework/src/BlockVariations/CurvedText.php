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
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for blocks variations.
declare( strict_types=1 );

// Declares the namespace for block variations within the Aegis Framework.
namespace Aegis\Framework\BlockVariations;

// Imports utility classes and interfaces for DOM manipulation and renderable blocks.
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;

// Implements the CurvedText class to support curved text block rendering.

class CurvedText implements Renderable {

	/**
	 * Renders curved text.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/paragraph 11
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$svg_string = $block['attrs']['curvedText']['svgString'] ?? '';

		if ( ! $svg_string ) {
			return $block_content;
		}

		$dom            = DOM::create( $block_content );
		$p              = DOM::get_element( 'p', $dom );
		$p->textContent = '';

		$svg_dom     = DOM::create( $svg_string );
		$svg_element = DOM::get_element( 'svg', $svg_dom );

		if ( ! $svg_element ) {
			return $block_content;
		}

		$svg_text_element = DOM::get_element( 'text', $svg_element );

		if ( ! $svg_text_element ) {
			return $block_content;
		}

		$text_path_element = DOM::get_element( '*', $svg_text_element );

		if ( $text_path_element ) {
			$text_path_element->textContent = $block['attrs']['curvedText']['content'] ?? '';
		}

		$svg_string      = $svg_dom->saveHTML( $svg_element );
		$new_svg_dom     = DOM::create( $svg_string );
		$new_svg_element = DOM::get_element( 'svg', $new_svg_dom );
		$imported        = $dom->importNode( $new_svg_element, true );

		$p->appendChild( $imported );

		return $dom->saveHTML( $p );
	}

}
