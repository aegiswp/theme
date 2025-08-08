<?php
/**
 * Query Pagination Block
 *
 * Provides support for rendering query pagination blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling query pagination block content
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

// Implements the QueryPagination class to support query pagination block rendering.

/**
 * Handles the rendering of the core/query-pagination block.
 *
 * This class is responsible for applying custom spacing and border styles from
 * the block's attributes to the block's `<nav>` wrapper element.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class QueryPagination implements Renderable {

	/**
	 * Renders the query-pagination block with custom styles.
	 *
	 * This method is hooked into the `render_block_core/query-pagination` filter.
	 * It applies margin, padding, and border-radius settings from the block
	 * editor to the block's wrapper element.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/query-pagination
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom = DOM::create( $block_content );
		$nav = DOM::get_element( 'nav', $dom );

		// If the <nav> element isn't found, return the original content.
		if ( ! $nav ) {
			return $block_content;
		}

		$styles  = CSS::string_to_array( $nav->getAttribute( 'style' ) );
		$attrs   = $block['attrs'] ?? [];
		$margin  = $attrs['style']['spacing']['margin'] ?? null;
		$padding = $attrs['style']['spacing']['padding'] ?? null;

		// Apply custom margin and padding.
		$styles = CSS::add_shorthand_property( $styles, 'margin', $margin );
		$styles = CSS::add_shorthand_property( $styles, 'padding', $padding );

		// This loop ensures that any values that are CSS variables (e.g., `var:preset|color|primary`)
		// are correctly formatted for the inline style attribute.
		// @todo The original developer questioned if this check is too broad.
		foreach ( $styles as $key => $value ) {
			if ( ! $value ) {
				continue;
			}
			if ( str_contains( $value, 'var:' ) ) {
				$styles[ $key ] = CSS::format_custom_property( $value );
			}
		}

		// Apply custom border-radius.
		if ( $border_radius = $attrs['style']['border']['radius'] ?? null ) {
			$styles['border-radius'] = $border_radius;
		}

		$nav->setAttribute( 'style', CSS::array_to_string( $styles ) );

		return $dom->saveHTML();
	}
}
