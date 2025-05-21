<?php
/**
 * Code Block
 *
 * Modifies rendering and HTML output for the Code block, including custom margin style handling.
 *
 * Responsibilities:
 * - Alters the front-end HTML output of the Code block
 * - Applies custom margin styles to <pre> elements based on block attributes
 * - Integrates with utility functions for CSS manipulation
 *
 * Hooks/Filters Registered:
 * - 'render_block_core/code': Modifies Code block HTML on render
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

use WP_Block;
use function add_filter;

/**
 * Filter: 'render_block_core/code'
 * Modifies Code block HTML on render.
 *
 * @see render_code_block()
 */
add_filter( 'render_block_core/code', NS . 'render_code_block', 12, 3 );
/**
 * Modifies the front-end HTML output of the Code block.
 *
 * Alters the output for the 'core/code' block, applying custom margin styles to the <pre> element using utility functions.
 *
 * @since 1.0.0
 *
 * @param string   $html   Block HTML.
 * @param array    $block  Block data.
 * @param WP_Block $object Block object.
 * @return string Modified HTML for the Code block.
 */
function render_code_block( string $html, array $block, WP_Block $object ): string {
	$attrs  = $block['attrs'] ?? [];
	$margin = $attrs['style']['spacing']['margin'] ?? '';

	// Only modify if margin is set on the block
	if ( $margin ) {
		$dom = dom( $html );
		$pre = get_dom_element( 'pre', $dom );

		if ( $pre ) {
			// Parse existing inline styles and add custom margin
			$pre_styles = css_string_to_array( $pre->getAttribute( 'style' ) );
			$pre_styles = add_shorthand_property( $pre_styles, 'margin', $margin );

			$pre->setAttribute( 'style', css_array_to_string( $pre_styles ) );
		}

		$html = $dom->saveHTML();
	}

	return $html;
}
