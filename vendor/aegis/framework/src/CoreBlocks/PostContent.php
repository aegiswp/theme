<?php
/**
 * Post Content Block
 *
 * Provides support for rendering post content blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling post content block content
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
use DOMXPath;
use WP_Block;
use function intval;
use function method_exists;

// Implements the PostContent class to support post content block rendering.

/**
 * Handles the rendering of the core/post-content block.
 *
 * This class enhances the default post content block by applying custom spacing
 * and providing a custom (and potentially brittle) content limiting feature.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class PostContent implements Renderable {

	/**
	 * Renders the post-content block with custom enhancements.
	 *
	 * This method is hooked into the `render_block_core/post-content` filter.
	 * It applies custom margin and padding. It also includes a feature to limit
	 * the rendered content by truncating text nodes after a certain count, which
	 * may have unintended side effects.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/post-content
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs   = $block['attrs'] ?? [];
		$margin  = $attrs['style']['spacing']['margin'] ?? [];
		$padding = $attrs['style']['spacing']['padding'] ?? [];

		// --- Apply Custom Spacing ---
		if ( ! empty( $margin ) || ! empty( $padding ) ) {
			$dom = DOM::create( $block_content );
			$div = DOM::get_element( 'div', $dom );

			if ( $div && method_exists( $div, 'getAttribute' ) ) {
				$styles = CSS::string_to_array( $div->getAttribute( 'style' ) );
				$styles = CSS::add_shorthand_property( $styles, 'margin', $margin );
				$styles = CSS::add_shorthand_property( $styles, 'padding', $padding );

				if ( $styles ) {
					$div->setAttribute( 'style', CSS::array_to_string( $styles ) );
				}

				$block_content = $dom->saveHTML();
			}
		}

		// --- Content Limiting Feature ---
		$limit = intval( $attrs['contentLimit'] ?? 0 );

		// If no limit is set, return the content as is.
		if ( ! $limit ) {
			return $block_content;
		}

		// WARNING: This implementation is brittle. It counts all text nodes,
		// including whitespace, and removes them, which can leave empty HTML tags.
		$dom   = DOM::create( $block_content );
		$xpath = new DOMXPath( $dom );
		$nodes = $xpath->query( '//text()' );
		$index = 0;

		foreach ( $nodes as $node ) {
			// If we are past the text node limit, remove the node.
			if ( $index > $limit ) {
				$node->parentNode->removeChild( $node );
			}

			// Clean up nodes that are now empty.
			if ( $node->parentNode && ! $node->textContent ) {
				$node->parentNode->removeChild( $node );
			}

			$index++;
		}

		return $dom->saveHTML();
	}
}
