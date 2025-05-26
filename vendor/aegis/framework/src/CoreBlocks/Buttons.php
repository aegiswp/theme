<?php
/**
 * Buttons.php
 *
 * Handles the buttons core block logic for the Aegis WordPress theme.
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
use WP_Block;

/**
 * Buttons block.
 *
 * @since 1.0.0
 */
class Buttons implements Renderable {

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @hook  render_block_core/buttons
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs   = $block['attrs'] ?? [];
		$margin  = $attrs['style']['spacing']['margin'] ?? [];
		$padding = $attrs['style']['spacing']['padding'] ?? [];

		if ( $margin || $padding ) {
			$dom = DOM::create( $block_content );
			$div = DOM::get_element( 'div', $dom );

			if ( $div ) {
				$styles = CSS::string_to_array( $div->getAttribute( 'style' ) );
				$styles = CSS::add_shorthand_property( $styles, 'margin', $margin );
				$styles = CSS::add_shorthand_property( $styles, 'padding', $padding );

				$div->setAttribute( 'style', CSS::array_to_string( $styles ) );

				$block_content = $dom->saveHTML();
			}
		}

		return $block_content;
	}

}
