<?php
/**
 * Grid Layout Extension for Aegis Theme
 *
 * This file handles the grid layout functionality for the Aegis theme.
 * It provides enhancements to the Core Group Block when using grid layouts,
 * ensuring proper alignment and display of grid items.
 *
 * The file includes functions to:
 * - Modify grid block variations to ensure proper alignment
 * - Set default stretch alignment for grid items when no vertical alignment is specified
 *
 * @package aegis
 * @subpackage theme
 * @since 1.0.0
 */

declare( strict_types=1 );

namespace aegis\theme;

use function add_filter;

add_filter( 'render_block_core/group', __NAMESPACE__ . '\\render_grid_block_variation', 10, 2 );
/**
 * Render grid block variation.
 *
 * Enhances grid layout blocks by ensuring proper alignment of grid items.
 * When no vertical alignment is specified, sets items to stretch by default
 * to create a more consistent layout.
 *
 * @since 1.0.0
 *
 * @param string $content Block content.
 * @param array  $block   Block data.
 *
 * @return string Modified block HTML with proper grid alignment.
 */
function render_grid_block_variation( string $content, array $block ): string {
	$orientation = $block['attrs']['layout']['orientation'] ?? '';

	if ( $orientation !== 'grid' ) {
		return $content;
	}

	$vertical_alignment = $block['attrs']['layout']['verticalAlignment'] ?? '';

	if ( ! $vertical_alignment ) {
		$dom                   = dom( $content );
		$div                   = get_dom_element( 'div', $dom );
		$styles                = css_string_to_array( $div->getAttribute( 'style' ) );
		$styles['align-items'] = 'stretch';

		$div->setAttribute( 'style', css_array_to_string( $styles ) );

		$content = $dom->saveHTML();
	}

	return $content;
}
