<?php
/**
 * TagCloud.php
 *
 * Handles the tag cloud core block logic for the Aegis WordPress theme.
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

use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function esc_attr;
use function implode;

/**
 * TagCloud class.
 *
 * @since 1.0.0
 */
class TagCloud implements Renderable {

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/tag-cloud
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$smallest  = esc_attr( $block['attrs']['smallestFontSize'] ?? '1em' );
		$largest   = esc_attr( $block['attrs']['largestFontSize'] ?? '1em' );
		$dom       = DOM::create( $block_content );
		$paragraph = DOM::get_element( 'p', $dom );

		$paragraph->setAttribute(
			'style',
			implode(
				';',
				[
					'font-size:max(' . $smallest . ',' . $largest . ')',
					$paragraph->getAttribute( 'style' ),
				]
			)
		);

		return $dom->saveHTML();
	}
}
