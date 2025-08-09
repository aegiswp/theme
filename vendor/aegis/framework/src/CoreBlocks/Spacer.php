<?php
/**
 * Spacer Block
 *
 * Provides support for rendering spacer blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling spacer block content
 * - Integrates with utility classes for DOM, CSS, and WordPress helpers
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, renderable blocks, and WordPress helpers.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;

// Implements the Spacer class to support spacer block rendering.

/**
 * Handles the rendering of the core/spacer block.
 *
 * This class enhances the default spacer block by applying custom margin values
 * and handling potential conflicts between legacy and responsive width settings.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Spacer implements Renderable {

	/**
	 * Renders the spacer block with custom enhancements.
	 *
	 * This method is hooked into the `render_block_core/spacer` filter. It
	 * applies custom margins and also includes logic to remove the legacy `width`
	 * style if a modern responsive width setting is also present, preventing
	 * style conflicts.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/spacer 11
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom = DOM::create( $block_content );
		$div = DOM::get_element( 'div', $dom );

		if ( ! $div ) {
			return $block_content;
		}

		$attrs      = $block['attrs'] ?? [];
		$div_styles = CSS::string_to_array( $div->getAttribute( 'style' ) );

		// Apply custom margins from block attributes.
		$margin     = $attrs['style']['spacing']['margin'] ?? '';
		$div_styles = CSS::add_shorthand_property( $div_styles, 'margin', $margin );

		// If a responsive width is set, unset the legacy width attribute to prevent conflicts.
		// The responsive width is likely applied via a separate class or mechanism.
		$width            = $attrs['width'] ?? '';
		$responsive_width = $attrs['style']['width']['all'] ?? '';
		if ( $width && $responsive_width ) {
			unset( $div_styles['width'] );
		}

		$div->setAttribute( 'style', CSS::array_to_string( $div_styles ) );

		return $dom->saveHTML();
	}
}
