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
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for core blocks.
declare( strict_types=1 );

// Declares the namespace for core blocks within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function str_contains;

// Implements the Query class to support query block rendering.

/**
 * Handles the rendering of the core/query block.
 *
 * This class enhances the Query Loop block by applying `blockGap` and `columnCount`
 * settings from the block editor as CSS custom properties, allowing for more
 * flexible styling of the query results.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Query implements Renderable {

	/**
	 * Renders the query block with custom layout styles.
	 *
	 * This method is hooked into the `render_block_core/query` filter. It applies
	 * the `blockGap` setting as a `--wp--style--block-gap` CSS variable. If a
	 * column count is set, it applies that as a `--columns` variable.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/query
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs     = $block['attrs'] ?? [];
		$block_gap = $attrs['style']['spacing']['blockGap'] ?? null;

		// Apply the block gap setting as a CSS custom property.
		if ( $block_gap ) {
			$dom = DOM::create( $block_content );
			$div = DOM::get_element( 'div', $dom );

			if ( $div ) {
				$styles = CSS::string_to_array( $div->getAttribute( 'style' ) );
				$styles['--wp--style--block-gap'] = CSS::format_custom_property( $block_gap );
				$div->setAttribute( 'style', CSS::array_to_string( $styles ) );
				$block_content = $dom->saveHTML();
			}
		}

		// Apply the column count as a CSS custom property.
		$columns = $attrs['displayLayout']['columns'] ?? null;

		// The `nowrap` check is a way to see if the flex layout is being used,
		// which is when the column count is most relevant for grid-like layouts.
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
