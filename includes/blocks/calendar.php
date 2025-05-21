<?php
/**
 * Calendar Block
 *
 * Modifies rendering and HTML output for the Calendar block, including transferring color and background classes.
 *
 * Responsibilities:
 * - Alters the front-end HTML output of the Calendar block
 * - Moves color/background classes from the table to the wrapper div for styling consistency
 * - Integrates with utility functions for DOM and class manipulation
 *
 * Hooks/Filters Registered:
 * - 'render_block_core/calendar': Modifies Calendar block HTML on render
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
use function explode;
use function implode;

/**
 * Filter: 'render_block_core/calendar'
 * Modifies Calendar block HTML on render.
 *
 * @see render_block_core_calendar()
 */
add_filter( 'render_block_core/calendar', NS . 'render_block_core_calendar', 10, 2 );
/**
 * Modifies the front-end HTML output of the Calendar block.
 *
 * Moves color and background classes from the <table> to the wrapper <div> for styling consistency.
 *
 * @since 1.0.0
 *
 * @param string $html  The block content being rendered.
 * @param array  $block The block being rendered.
 * @return string Modified HTML for the Calendar block.
 */
function render_block_core_calendar( string $html, array $block ): string {
	$dom   = dom( $html );
	$div   = get_dom_element( 'div', $dom );
	$table = get_dom_element( 'table', $div );

	// Only proceed if a <table> element is found
	if ( ! $table ) {
		return $html;
	}

	$div_classes   = explode( ' ', $div->getAttribute( 'class' ) );
	$table_classes = explode( ' ', $table->getAttribute( 'class' ) );

	// Move color/background classes from table to div
	foreach ( $table_classes as $index => $table_class ) {
		if ( str_contains_any( $table_class, 'background', 'color' ) ) {
			$div_classes[] = $table_class;
			unset( $table_classes[ $index ] );
		}
	}

	$div->setAttribute( 'class', implode( ' ', $div_classes ) );
	$table->setAttribute( 'class', implode( ' ', $table_classes ) );
	
	return $dom->saveHTML();
}
