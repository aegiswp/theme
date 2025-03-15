<?php
/**
 * Inline Color Extension for Aegis Theme
 *
 * This file handles the inline color functionality for the Aegis theme.
 * It provides the ability to use theme color variables within inline text,
 * ensuring consistent color usage and better compatibility with dark mode.
 *
 * The file includes functions to:
 * - Convert hex color values to CSS custom properties
 * - Process inline colored text to use theme color variables
 *
 * @package aegis
 * @subpackage theme
 * @since 1.0.0
 */

declare( strict_types=1 );

namespace aegis\theme;

use DOMElement;
use function add_filter;
use function explode;
use function in_array;
use function str_contains;

add_filter( 'render_block', __NAMESPACE__ . '\\render_inline_color' );
/**
 * Renders custom properties for inline colors.
 *
 * Processes blocks with inline colored text and converts hex color values
 * to CSS custom properties based on the theme's color palette. This ensures
 * consistent color usage and better compatibility with dark mode.
 *
 * @since 1.0.0
 *
 * @param string $html Block HTML content.
 *
 * @return string Modified block HTML with color custom properties.
 */
function render_inline_color( string $html ): string {
	if ( ! str_contains( $html, 'has-inline-color' ) ) {
		return $html;
	}

	$dom   = dom( $html );
	$first = get_dom_element( '*', $dom );

	if ( ! $first ) {
		return $html;
	}

	$global_settings = wp_get_global_settings();
	$color_palette   = $global_settings['color']['palette']['theme'] ?? [];

	foreach ( $first->childNodes as $child ) {
		if ( ! $child instanceof DOMElement ) {
			continue;
		}

		$classes = explode( ' ', $child->getAttribute( 'class' ) );

		if ( ! in_array( 'has-inline-color', $classes, true ) ) {
			continue;
		}

		$styles = css_string_to_array( $child->getAttribute( 'style' ) );

		foreach ( $color_palette as $color ) {
			$hex_value   = $styles['color'] ?? '';
			$color_value = $color['color'] ?? '';

			if ( ! $hex_value || ! $color_value ) {
				continue;
			}

			if ( $hex_value === $color_value ) {
				$styles['color'] = "var(--wp--preset--color--{$color['slug']})";
				$child->setAttribute( 'style', css_array_to_string( $styles ) );

				break;
			}
		}

		$html = $dom->saveHTML();
	}

	return $html;
}
