<?php
/**
 * Paragraph Block
 *
 * Provides support for rendering paragraph blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling paragraph block content
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
use function explode;
use function implode;
use function is_array;

// Implements the Paragraph class to support paragraph block rendering.

/**
 * Handles the rendering of the core/paragraph block.
 *
 * This class enhances the default paragraph block by ensuring the default
 * `wp-block-paragraph` class is present, applying custom spacing (margin and
 * padding), and correcting a potential URL formatting issue.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Paragraph implements Renderable {

	/**
	 * Renders the paragraph block with custom enhancements.
	 *
	 * This method is hooked into the `render_block_core/paragraph` filter. It
	 * applies custom margin and padding and includes a patch for a specific
	 * malformed URL issue.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/paragraph
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom = DOM::create( $block_content );
		$p   = DOM::get_element( 'p', $dom );

		// If the <p> element is not found, return the original content.
		if ( ! $p ) {
			return $block_content;
		}

		// Ensure the default `wp-block-paragraph` class is always present.
		$p->setAttribute(
			'class',
			implode( ' ', [
				'wp-block-paragraph',
				...explode( ' ', $p->getAttribute( 'class' ) ),
			] )
		);

		// Apply custom margin and padding from block attributes.
		$p_styles = CSS::string_to_array( $p->getAttribute( 'style' ) );
		$padding  = $block['attrs']['style']['spacing']['padding'] ?? '';
		$margin   = $block['attrs']['style']['spacing']['margin'] ?? '';

		if ( is_array( $padding ) && ! empty( $padding ) ) {
			$p_styles = CSS::add_shorthand_property( $p_styles, 'padding', $padding );
		}
		if ( is_array( $margin ) && ! empty( $margin ) ) {
			$p_styles = CSS::add_shorthand_property( $p_styles, 'margin', $margin );
		}

		$p->setAttribute( 'style', CSS::array_to_string( $p_styles ) );

		$block_content = $dom->saveHTML();

		// Pre-emptive fix for a potential issue where URLs might be malformed as "http://http".
		if ( str_contains( $block_content, 'http://http' ) ) {
			$block_content = str_replace( 'http://http', 'http', $block_content );
		}

		return $block_content;
	}
}
