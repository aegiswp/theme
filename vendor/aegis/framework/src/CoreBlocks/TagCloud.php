<?php
/**
 * Tag Cloud Block
 *
 * Provides support for rendering tag cloud blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling tag cloud block content
 * - Integrates with utility classes for DOM and WordPress helpers
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for core blocks.
declare( strict_types=1 );

// Declares the namespace for core blocks within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports utility classes and interfaces for DOM manipulation, renderable blocks, and WordPress helpers.
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function esc_attr;
use function implode;

// Implements the TagCloud class to support tag cloud block rendering.

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
