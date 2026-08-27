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
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for spacer block.
declare( strict_types=1 );

// Declares the namespace for the spacer block.
namespace Aegis\Framework\CoreBlocks;

// Imports classes, interfaces, and functions used by the spacer block.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;

class Spacer implements Renderable {

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/spacer 11
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		// Parse block HTML and locate the spacer div.
		$dom = DOM::create( $block_content );
		$div = DOM::get_element( 'div', $dom );

		if ( ! $div ) {
			return $block_content;
		}

		// Merge margin from block attributes into inline styles.
		$div_styles = CSS::string_to_array( $div->getAttribute( 'style' ) );

		$margin     = $block['attrs']['style']['spacing']['margin'] ?? '';
		$div_styles = CSS::add_shorthand_property( $div_styles, 'margin', $margin );

		// Remove fixed width when responsive width is also set.
		$width            = $block['attrs']['width'] ?? '';
		$responsive_width = $block['attrs']['style']['width']['all'] ?? '';

		if ( $width && $responsive_width ) {
			unset ( $div_styles['width'] );
		}

		$div->setAttribute( 'style', CSS::array_to_string( $div_styles ) );

		return $dom->saveHTML();
	}
}
