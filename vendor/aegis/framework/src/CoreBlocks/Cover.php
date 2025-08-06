<?php
/**
 * Cover Block
 *
 * Provides support for rendering cover blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling cover block content
 * - Integrates with utility classes for DOM, CSS, and icons
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, icons, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Icons\Icon;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function is_null;

// Implements the Cover class to support cover block rendering.

/**
 * Handles the rendering of the core/cover block.
 *
 * This class enhances the default cover block by adding a fallback placeholder
 * image, custom padding support, and z-index control via a CSS custom property.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Cover implements Renderable {

	/**
	 * Renders the cover block with custom enhancements.
	 *
	 * This method is hooked into the `render_block_core/cover` filter. It applies
	 * custom padding and a z-index CSS variable. If no background image is set,
	 * it injects a default placeholder SVG to prevent an empty display.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/cover
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom = DOM::create( $block_content );
		$div = DOM::get_element( 'div', $dom );

		// If the main wrapper div isn't found, return the original content.
		if ( ! $div ) {
			return $block_content;
		}

		$attrs = $block['attrs'] ?? [];
		$url   = $attrs['url'] ?? null;

		// If no background image URL is provided, inject a placeholder SVG.
		if ( ! $url ) {
			$placeholder = Icon::get_placeholder( $dom );
			$imported    = $dom->importNode( $placeholder, true );
			$svg         = DOM::node_to_element( $imported );
			$svg->setAttribute( 'class', 'wp-block-cover__image-background' );
		}

		// Apply custom padding and z-index from block attributes.
		$padding = $attrs['style']['spacing']['padding'] ?? null;
		$z_index = $attrs['style']['zIndex']['all'] ?? null;

		$styles = CSS::string_to_array( $div->getAttribute( 'style' ) );
		$styles = CSS::add_shorthand_property( $styles, 'padding', $padding );

		// The z-index is applied as a CSS custom property for more flexible styling.
		if ( ! is_null( $z_index ) ) {
			$styles['--z-index'] = CSS::format_custom_property( $z_index );
		}

		$div->setAttribute( 'style', CSS::array_to_string( $styles ) );

		return $dom->saveHTML();
	}

}
