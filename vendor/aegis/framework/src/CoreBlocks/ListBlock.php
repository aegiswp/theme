<?php
/**
 * ListBlock.php
 *
 * Handles the list core block logic for the Aegis WordPress theme.
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
use function array_unshift;
use function esc_attr;
use function explode;
use function str_replace;

/**
 * List class.
 *
 * @since 1.0.0
 */
class ListBlock implements Renderable {

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/list
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {

		// Correct URLs for template tags.
		$block_content = str_replace(
			[
				'http://https://',
			],
			[
				'https://',
			],
			$block_content
		);

		$dom = DOM::create( $block_content );
		$ul  = DOM::get_element( 'ul', $dom );
		$ol  = DOM::get_element( 'ol', $dom );

		if ( ! $ul && ! $ol ) {
			return $block_content;
		}

		$block_gap       = $block['attrs']['style']['spacing']['blockGap'] ?? null;
		$justify_content = $block['attrs']['layout']['justifyContent'] ?? '';
		$margin          = $block['attrs']['style']['spacing']['margin'] ?? [];
		$list            = $ul ?? $ol;
		$styles          = CSS::string_to_array( $list->getAttribute( 'style' ) );

		if ( $block_gap === '0' || $block_gap ) {
			$styles['gap'] = CSS::format_custom_property( $block_gap );
		}

		if ( $justify_content ) {
			$styles['display']         = 'flex';
			$styles['flex-wrap']       = 'wrap';
			$styles['justify-content'] = esc_attr( $justify_content );
		}

		$styles = CSS::add_shorthand_property( $styles, 'margin', $margin );

		if ( $styles ) {
			$list->setAttribute( 'style', CSS::array_to_string( $styles ) );
		}

		$classes = explode( ' ', $list->getAttribute( 'class' ) );

		array_unshift( $classes, 'wp-block-list' );

		$list->setAttribute( 'class', implode( ' ', $classes ) );

		return $dom->saveHTML();
	}

}
