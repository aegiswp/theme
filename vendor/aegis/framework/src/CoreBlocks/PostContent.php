<?php
/**
 * PostContent.php
 *
 * Handles the post content core block logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\CoreBlocks
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\CoreBlocks;

use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use DOMXPath;
use WP_Block;
use function intval;
use function method_exists;

/**
 * PostContent class.
 *
 * @since 1.0.0
 */
class PostContent implements Renderable {

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @hook  render_block_core/post-content
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$margin  = $block['attrs']['style']['spacing']['margin'] ?? [];
		$padding = $block['attrs']['style']['spacing']['padding'] ?? [];

		if ( ! empty( $margin ) || ! empty( $padding ) ) {
			$dom = DOM::create( $block_content );
			$div = DOM::get_element( 'div', $dom );

			if ( ! $div || ! method_exists( $div, 'getAttribute' ) ) {
				return $block_content;
			}

			$styles = CSS::string_to_array( $div->getAttribute( 'style' ) );
			$styles = CSS::add_shorthand_property( $styles, 'margin', $margin );
			$styles = CSS::add_shorthand_property( $styles, 'padding', $padding );

			if ( $styles ) {
				$div->setAttribute( 'style', CSS::array_to_string( $styles ) );
			}

			$block_content = $dom->saveHTML();
		}

		$limit = intval( $block['attrs']['contentLimit'] ?? 0 );

		if ( ! $limit ) {
			return $block_content;
		}

		$dom   = DOM::create( $block_content );
		$xpath = new DOMXPath( $dom );
		$nodes = $xpath->query( '//text()' );
		$index = 0;

		foreach ( $nodes as $node ) {
			if ( $index > $limit ) {
				$node->parentNode->removeChild( $node );
			}

			if ( $node->parentNode && ! $node->textContent ) {
				$node->parentNode->removeChild( $node );
			}

			$index++;
		}

		return $dom->saveHTML();
	}

}
