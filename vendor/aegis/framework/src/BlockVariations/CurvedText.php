<?php
/**
 * CurvedText.php
 *
 * Handles the curved text block variation logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\BlockVariations
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\BlockVariations;

use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;

/**
 * CurvedText class.
 *
 * @since 1.0.0
 */
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
	 * @hook  render_block_core/paragraph
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
