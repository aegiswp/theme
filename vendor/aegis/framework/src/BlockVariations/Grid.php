<?php
/**
 * Grid.php
 *
 * Handles the grid block variation logic for the Aegis WordPress theme.
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

use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;

/**
 * Grid block variation.
 *
 * @since 1.0.0
 */
class Grid implements Renderable {

	/**
	 * Render grid block variation.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block content.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/group
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$orientation = $block['attrs']['layout']['orientation'] ?? '';

		if ( $orientation !== 'grid' ) {
			return $block_content;
		}

		$vertical_alignment = $block['attrs']['layout']['verticalAlignment'] ?? '';

		if ( ! $vertical_alignment ) {
			$dom                   = DOM::create( $block_content );
			$div                   = DOM::get_element( 'div', $dom );
			$styles                = CSS::string_to_array( $div->getAttribute( 'style' ) );
			$styles['align-items'] = 'stretch';

			$div->setAttribute( 'style', CSS::array_to_string( $styles ) );

			$block_content = $dom->saveHTML();
		}

		return $block_content;
	}

}
