<?php
/**
 * Query Block
 *
 * Provides support for rendering query blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling query block content
 * - Integrates with utility classes for DOM and CSS
 *
 * Image lazy-load for Query Loop lives in Aegis Pro QueryPerformance when
 * Aegis → Performance → Query Loop Performance is enabled. WordPress still
 * applies native lazy-loading without that toggle.
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for query block.
declare( strict_types=1 );

// Declares the namespace for the query block.
namespace Aegis\Framework\CoreBlocks;

// Imports classes, interfaces, and functions used by the query block.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function str_contains;

class Query implements Renderable {

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/query
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$block_gap = $block['attrs']['style']['spacing']['blockGap'] ?? null;

		// Apply custom block gap as a CSS custom property.
		if ( $block_gap ) {
			$dom = DOM::create( $block_content );
			$div = DOM::get_element( 'div', $dom );

			if ( ! $div ) {
				return $block_content;
			}

			$styles = CSS::string_to_array( $div->getAttribute( 'style' ) );

			$styles['--wp--style--block-gap'] = CSS::format_custom_property( $block_gap );

			$div->setAttribute( 'style', CSS::array_to_string( $styles ) );

			$block_content = $dom->saveHTML();
		}

		$columns = $block['attrs']['displayLayout']['columns'] ?? null;

		// Set column count for nowrap flex layouts.
		if ( $columns && str_contains( $block_content, 'nowrap' ) ) {
			$dom = DOM::create( $block_content );
			$div = DOM::get_element( 'div', $dom );

			if ( $div ) {
				$styles              = CSS::string_to_array( $div->getAttribute( 'style' ) );
				$styles['--columns'] = $columns;
				$div->setAttribute( 'style', CSS::array_to_string( $styles ) );

				$block_content = $dom->saveHTML();
			}
		}

		return $block_content;
	}
}
