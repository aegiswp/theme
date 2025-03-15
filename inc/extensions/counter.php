<?php
/**
 * Counter Block Extension for Aegis Theme
 *
 * This file handles the counter block variation functionality for the Aegis theme.
 * It provides the ability to create animated number counters within paragraph blocks,
 * enhancing the visual presentation of numerical data.
 *
 * The file includes functions to:
 * - Render counter block variation with appropriate data attributes
 * - Add counter JavaScript conditionally based on content
 *
 * @package aegis
 * @subpackage theme
 * @since 1.0.0
 */

declare( strict_types=1 );

namespace aegis\theme;

use function add_filter;
use function esc_attr;
use function esc_html;
use function file_get_contents;
use function str_contains;
use function trim;

add_filter( 'render_block_core/paragraph', __NAMESPACE__ . '\\render_counter_block_variation', 10, 2 );
/**
 * Render counter block markup.
 *
 * Adds the necessary data attributes to paragraph blocks with counter
 * styling to enable the JavaScript counter functionality. Ensures the
 * content is properly escaped for security.
 *
 * @since 1.0.0
 *
 * @param string $html  Block html content.
 * @param array  $block Block data.
 *
 * @return string Modified block HTML with counter attributes.
 */
function render_counter_block_variation( string $html, array $block ): string {
	$counter = $block['attrs']['style']['counter'] ?? '';

	if ( ! $counter ) {
		return $html;
	}

	$dom = dom( $html );
	$p   = get_dom_element( 'p', $dom );

	if ( ! $p ) {
		return $html;
	}

	foreach ( $counter as $attribute => $value ) {
		$p->setAttribute( "data-$attribute", esc_attr( $value ) );
	}

	$p->textContent = esc_html( trim( $p->textContent ) );

	return $dom->saveHTML();
}

add_filter( 'aegis_inline_js', __NAMESPACE__ . '\\add_counter_js', 10, 3 );
/**
 * Conditionally add counter JS.
 *
 * Adds the counter JavaScript to the inline JS when counter
 * blocks are detected in the page content.
 *
 * @since 1.0.0
 *
 * @param string $js   Inline js.
 * @param string $html Block html content.
 * @param bool   $all  Whether to add all inline js regardless of content.
 *
 * @return string Modified inline JS with counter scripts.
 */
function add_counter_js( string $js, string $html, bool $all ): string {
	if ( $all || str_contains( $html, 'is-style-counter' ) ) {
		$js .= file_get_contents( get_dir() . 'assets/js/counter.js' );
	}

	return $js;
}
