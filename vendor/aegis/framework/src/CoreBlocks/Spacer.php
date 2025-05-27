<?php
/**
 * Spacer.php
 *
 * Handles the spacer core block logic for the Aegis WordPress theme.
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
 * Spacer class.
 *
 * @since 1.0.0
 */
class Spacer implements Renderable {

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/spacer
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom = DOM::create( $block_content );
		$div = DOM::get_element( 'div', $dom );

		if ( ! $div ) {
			return $block_content;
		}

		$div_styles = CSS::string_to_array( $div->getAttribute( 'style' ) );

		$margin     = $block['attrs']['style']['spacing']['margin'] ?? '';
		$div_styles = CSS::add_shorthand_property( $div_styles, 'margin', $margin );

		$width            = $block['attrs']['width'] ?? '';
		$responsive_width = $block['attrs']['style']['width']['all'] ?? '';

		if ( $width && $responsive_width ) {
			unset ( $div_styles['width'] );
		}

		$div->setAttribute( 'style', CSS::array_to_string( $div_styles ) );

		return $dom->saveHTML();
	}

}
