<?php
/**
 * Page List Block
 *
 * Provides support for rendering page list blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling page list block content
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

// Enforces strict type checking for all code in this file, ensuring type safety for core blocks.
declare( strict_types=1 );

// Declares the namespace for core blocks within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;

// Implements the PageList class to support page list block rendering.

/**
 * Handles the rendering of the core/page-list block.
 *
 * This class is responsible for applying the `blockGap` spacing setting from
 * the block's attributes as a CSS custom property, allowing for flexible
 * styling of the space between page list items.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class PageList implements Renderable {

	/**
	 * Renders the page-list block with custom block gap spacing.
	 *
	 * This method is hooked into the `render_block_core/page-list` filter. It
	 * takes the `blockGap` attribute and applies it as a `--wp--style--block-gap`
	 * CSS custom property to the `<ul>` element.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/page-list
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$block_gap = $block['attrs']['style']['spacing']['blockGap'] ?? null;

		// Only proceed if a block gap value is set.
		if ( ! $block_gap ) {
			return $block_content;
		}

		$dom = DOM::create( $block_content );
		$ul  = DOM::get_element( 'ul', $dom );

		// If the <ul> element is not found, return the original content.
		if ( ! $ul ) {
			return $block_content;
		}

		// Apply the block gap as a CSS custom property.
		$styles = CSS::string_to_array( $ul->getAttribute( 'style' ) );
		$styles['--wp--style--block-gap'] = CSS::format_custom_property( $block_gap );
		$ul->setAttribute( 'style', CSS::array_to_string( $styles ) );

		return $dom->saveHTML();
	}

}
