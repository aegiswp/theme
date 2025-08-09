<?php
/**
 * Social Links Block
 *
 * Provides support for rendering social links blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling social links block content
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
use DOMElement;
use WP_Block;
use function esc_attr;
use function trim;
use function wp_get_global_settings;

// Implements the SocialLinks class to support social links block rendering.

/**
 * Handles the rendering of the core/social-links block.
 *
 * This class is responsible for ensuring that custom colors applied to individual
 * social links use CSS variables from the theme's color palette, rather than
 * hard-coded hex values.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class SocialLinks implements Renderable {

	/**
	 * Renders the social-links block, converting hard-coded colors to CSS variables.
	 *
	 * This method is hooked into the `render_block_core/social-links` filter. It
	 * iterates through each social link (`<li>`), checks if its inline `color` style
	 * is a hard-coded hex value that matches a color in the theme's palette,
	 * and if so, replaces it with the corresponding CSS variable.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/social-links
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom = DOM::create( $block_content );
		$ul  = DOM::get_element( 'ul', $dom );

		if ( ! $ul || ! $ul->hasChildNodes() ) {
			return $block_content;
		}

		// Get the theme's color palette from global settings.
		$global_settings = wp_get_global_settings();
		$color_palette   = $global_settings['color']['palette']['theme'] ?? [];

		// Iterate over each list item (each social link).
		foreach ( $ul->childNodes as $child ) {
			if ( ! $child instanceof DOMElement || 'li' !== $child->nodeName ) {
				continue;
			}

			$styles = CSS::string_to_array( $child->getAttribute( 'style' ) );

			// If the item has no inline color style, skip it.
			if ( ! ( $styles['color'] ?? null ) ) {
				continue;
			}

			// Check if the hard-coded color matches any color in the theme palette.
			foreach ( $color_palette as $color ) {
				$hex = $color['color'] ?? '';
				if ( trim( $styles['color'] ) === trim( $hex ) ) {
					$slug = esc_attr( $color['slug'] ?? '' );
					if ( ! $slug ) {
						continue;
					}

					// If a match is found, replace the hex code with the CSS variable.
					$styles['color'] = "var(--wp--preset--color--$slug)";
					$child->setAttribute( 'style', CSS::array_to_string( $styles ) );
					break; // Move to the next list item once a match is found.
				}
			}
		}

		return $dom->saveHTML();
	}
}
