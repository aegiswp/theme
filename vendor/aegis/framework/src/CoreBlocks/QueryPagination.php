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
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for query pagination block.
declare( strict_types=1 );

// Declares the namespace for the query pagination block.
namespace Aegis\Framework\CoreBlocks;

// Imports classes, interfaces, and functions used by the query pagination block.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function str_contains;

class QueryPagination implements Renderable {

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/query-pagination
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		// Parse block HTML and locate the nav element.
		$dom = DOM::create( $block_content );
		$nav = DOM::get_element( 'nav', $dom );

		if ( ! $nav ) {
			return $block_content;
		}

		// Merge margin and padding from block attributes into inline styles.
		$styles  = CSS::string_to_array( $nav->getAttribute( 'style' ) );
		$margin  = $block['attrs']['style']['spacing']['margin'] ?? null;
		$padding = $block['attrs']['style']['spacing']['padding'] ?? null;
		$styles  = CSS::add_shorthand_property( $styles, 'margin', $margin );
		$styles  = CSS::add_shorthand_property( $styles, 'padding', $padding );

		// Format WordPress custom property values in style declarations.
		foreach ( $styles as $key => $value ) {
			if ( ! $value ) {
				continue;
			}

			// TODO: Which properties need formatting?
			if ( str_contains( $value, 'var:' ) ) {
				$styles[ $key ] = CSS::format_custom_property( $value );
			}
		}

		// Apply border radius when set in block attributes.
		$border_radius = $block['attrs']['style']['border']['radius'] ?? null;

		if ( $border_radius ) {
			$styles['border-radius'] = $border_radius;
		}

		// Write updated styles back to the nav element.
		$nav->setAttribute( 'style', CSS::array_to_string( $styles ) );

		return $dom->saveHTML();
	}
}
