<?php
/**
 * OnClick Extension for Aegis Theme
 *
 * This file handles the onclick attribute functionality for the Aegis theme.
 * It provides the ability to add JavaScript onclick handlers to blocks,
 * enabling interactive elements without requiring custom JavaScript files.
 *
 * The file includes functions to:
 * - Add onclick attributes to blocks based on block attributes
 * - Format inline JavaScript for proper execution
 * - Apply onclick handlers to appropriate HTML elements
 *
 * @package aegis
 * @subpackage theme
 * @since 1.0.0
 */

declare( strict_types=1 );

namespace aegis\theme;

use WP_Block;
use function add_filter;
use function apply_filters;
use function rtrim;
use function str_contains;
use function strval;
use function trim;

add_filter( 'render_block', __NAMESPACE__ . '\\render_block_onclick_attribute', 11, 3 );
/**
 * Modifies front end HTML output of block to add onclick attributes.
 *
 * Processes blocks with onclick attributes and adds the JavaScript
 * to the appropriate HTML element. Supports different block types
 * including groups, buttons, and images.
 *
 * @since 1.0.0
 *
 * @param string   $html   Block HTML.
 * @param array    $block  Block data.
 * @param WP_Block $object Block args.
 *
 * @return string Modified block HTML with onclick attributes.
 */
function render_block_onclick_attribute( string $html, array $block, WP_Block $object ): string {
	$js = strval( $block['attrs']['onclick'] ?? '' );

	if ( ! $js ) {
		return $html;
	}

	$js       = render_template_tags( $js, $block, $object );
	$on_click = format_inline_js( $js );
	$link     = null;
	$name     = $block['blockName'] ?? '';

	// Groups and buttons.
	if ( $on_click && $html ) {
		$dom  = dom( $html );
		$div  = get_dom_element( 'div', $dom );
		$link = get_dom_element( 'a', $div );

		if ( $link && $name === 'core/button' ) {
			$link->setAttribute( 'onclick', $on_click );
		} else if ( $div ) {
			$div->setAttribute( 'onclick', $on_click );
		}

		$html = $dom->saveHTML();
	}

	// Icon.
	if ( $on_click && $html && $link === null ) {
		$dom    = dom( $html );
		$figure = get_dom_element( 'figure', $dom );
		$img    = get_dom_element( 'img', $figure );

		if ( $img && ! str_contains( $figure->getAttribute( 'class' ), 'wp-block-post-featured-image' ) ) {
			$img->setAttribute( 'onclick', $on_click );
		}

		$html = $dom->saveHTML();
	}

	return $html;
}

/**
 * Formats inline JavaScript.
 *
 * Processes raw JavaScript to ensure it is properly formatted for
 * inline use in onclick attributes. Removes unnecessary whitespace,
 * line breaks, and standardizes quote usage.
 *
 * @since 1.0.0
 *
 * @param string $js JavaScript to format.
 *
 * @return string Formatted JavaScript for inline use.
 */
function format_inline_js( string $js ): string {
	$js = str_replace( '"', "'", $js );
	$js = trim( rtrim( $js, ';' ) );
	$js = reduce_whitespace( $js );
	$js = remove_line_breaks( $js );

	return apply_filters( 'aegis_format_inline_js', $js );
}
