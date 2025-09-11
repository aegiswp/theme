<?php
/**
 * Heading Block
 *
 * Provides support for rendering heading blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling heading block content
 * - Integrates with utility classes for DOM, CSS, and string manipulation
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for core blocks.
declare( strict_types=1 );

// Declares the namespace for core blocks within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, string utilities, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Utilities\Str;
use WP_Block;
use function esc_html;
use function esc_html__;
use function explode;
use function get_search_query;
use function implode;
use function in_array;
use function intval;
use function sanitize_title_with_dashes;
use function sprintf;

// Implements the Heading class to support heading block rendering.

/**
 * Handles the rendering of the core/heading block.
 *
 * This class enhances the default heading block by applying custom spacing,
 * ensuring a unique ID for anchor links, and improving the heading text on
 * search results pages.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Heading implements Renderable {

	/**
	 * Renders the heading block with custom enhancements.
	 *
	 * This method is hooked into the `render_block_core/heading` filter. It
	 * applies custom spacing, generates a sanitized ID if one doesn't exist,
	 * and replaces the default "Search Results" title with a more specific one.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/heading
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom     = DOM::create( $block_content );
		$level   = intval( $block['attrs']['level'] ?? 2 );
		$heading = DOM::get_element( 'h' . $level, $dom );

		if ( ! $heading ) {
			return $block_content;
		}

		// --- Class and Style application ---
		$classes = explode( ' ', $heading->getAttribute( 'class' ) );
		if ( ! in_array( 'wp-block-heading', $classes, true ) ) {
			$classes[] = 'wp-block-heading';
		}

		$styles = CSS::string_to_array( $heading->getAttribute( 'style' ) );
		$gap    = $block['attrs']['style']['spacing']['blockGap'] ?? null;

		if ( $gap ) {
			$styles['gap'] = CSS::format_custom_property( $gap );
		}
		$styles = CSS::add_shorthand_property( $styles, 'margin', $block['attrs']['style']['spacing']['margin'] ?? [] );

		$heading->setAttribute( 'class', implode( ' ', $classes ) );
		if ( $styles ) {
			$heading->setAttribute( 'style', CSS::array_to_string( $styles ) );
		}

		// --- Automatic ID Generation ---
		// If the heading does not have an ID, create one from its text content.
		// This is useful for creating anchor links and for accessibility.
		if ( ! $heading->getAttribute( 'id' ) ) {
			$heading->setAttribute(
				'id',
				Str::remove_non_alphanumeric(
					sanitize_title_with_dashes(
						$heading->textContent
					)
				)
			);
		}

		// Clean up empty style attribute if it exists.
		if ( ! $heading->getAttribute( 'style' ) ) {
			$heading->removeAttribute( 'style' );
		}

		// --- Search Results Heading Enhancement ---
		// On search pages, replace the generic "Search Results" H1 with a more descriptive title.
		$search_query = get_search_query();
		$default      = esc_html__( 'Search Results', 'aegis' );

		if ( 1 === $level && $search_query && $heading->textContent === $default ) {
			$heading->textContent = sprintf(
				esc_html__( 'Search results for: ', 'aegis' ) . '%s',
				esc_html( $search_query )
			);
		}

		return $dom->saveHTML();
	}

}
