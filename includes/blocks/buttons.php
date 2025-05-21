<?php
/**
 * Buttons Block
 *
 * Modifies rendering and HTML output for the Buttons block, including custom spacing and style logic.
 *
 * Responsibilities:
 * - Alters the front-end HTML output of the Buttons block
 * - Applies custom margin and padding styles based on block settings
 * - Integrates with utility functions for CSS manipulation
 *
 * Hooks/Filters Registered:
 * - 'render_block_core/buttons': Modifies Buttons block HTML on render
 *
 * @package    Aegis\Theme
 * @subpackage Blocks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this doc update.
 */

declare( strict_types=1 );

namespace Aegis\Theme;

use function add_filter;

/**
 * Filter: 'render_block_core/buttons'
 * Modifies Buttons block HTML on render.
 *
 * @see render_buttons_block()
 */
add_filter( 'render_block_core/buttons', NS . 'render_buttons_block', 10, 2 );
/**
 * Modifies the front-end HTML output of the Buttons block.
 *
 * Alters the output for the 'core/buttons' block, applying custom margin and padding styles using utility functions.
 *
 * @since 1.0.0
 *
 * @param string $html  Block HTML.
 * @param array  $block Block data.
 * @return string Modified HTML for the Buttons block.
 */
function render_buttons_block( string $html, array $block ): string {
	$margin  = $block['attrs']['style']['spacing']['margin'] ?? [];
	$padding = $block['attrs']['style']['spacing']['padding'] ?? [];

	// Only modify if margin or padding is set on the block
	if ( $margin || $padding ) {
		$dom = dom( $html );
		$div = get_dom_element( 'div', $dom );

		if ( $div ) {
			// Parse existing inline styles and add custom margin/padding
			$styles = css_string_to_array( $div->getAttribute( 'style' ) );
			$styles = add_shorthand_property( $styles, 'margin', $margin );
			$styles = add_shorthand_property( $styles, 'padding', $padding );

			$div->setAttribute( 'style', css_array_to_string( $styles ) );

			$html = $dom->saveHTML();
		}
	}

	return $html;
}
