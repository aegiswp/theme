<?php
/**
 * Cover.php
 *
 * Handles the cover core block logic for the Aegis WordPress theme.
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
use Aegis\Icons\Icon;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function is_null;

/**
 * Cover class.
 *
 * @since 1.0.0
 */
class Cover implements Renderable {

	/**
	 * Renders the cover block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/cover
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom = DOM::create( $block_content );
		$div = DOM::get_element( 'div', $dom );

		if ( ! $div ) {
			return $block_content;
		}

		$url = $block['attrs']['url'] ?? null;

		if ( ! $url ) {
			$imported = $dom->importNode( Icon::get_placeholder( $dom ), true );
			$svg      = DOM::node_to_element( $imported );

			$classes   = [];
			$classes[] = 'wp-block-cover__image-background';

			$svg->setAttribute( 'class', implode( ' ', $classes ) );
		}

		$padding = $block['attrs']['style']['spacing']['padding'] ?? null;
		$zIndex  = $block['attrs']['style']['zIndex']['all'] ?? null;

		$styles = CSS::string_to_array( $div->getAttribute( 'style' ) );
		$styles = CSS::add_shorthand_property( $styles, 'padding', $padding );

		if ( ! is_null( $zIndex ) ) {
			$styles['--z-index'] = CSS::format_custom_property( $zIndex );
		}

		$div->setAttribute( 'style', CSS::array_to_string( $styles ) );

		return $dom->saveHTML();
	}

}
