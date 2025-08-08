<?php
/**
 * Query Title Block
 *
 * Provides support for rendering query title blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling query title block content
 * - Integrates with utility classes for DOM, CSS, and WordPress helpers
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since 1.0.0
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
use Aegis\Utilities\Block;
use WP_Block;
use function esc_attr;
use function esc_html;
use function get_option;
use function implode;
use function is_front_page;
use function is_home;

// Implements the QueryTitle class to support query title block rendering.

/**
 * Handles the rendering of the core/query-title block.
 *
 * This class completely re-implements the rendering for the query title block
 * to ensure the correct title is displayed on the main blog page (the "Posts page").
 * It builds the `<h1>` element from scratch with the correct title and styles.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class QueryTitle implements Renderable {

	/**
	 * Renders the query-title block, ensuring the correct title on the blog page.
	 *
	 * This method is hooked into the `render_block_core/query-title` filter.
	 * It contains logic to only run on the main blog index page, where it
	 * fetches the title of the page assigned as the "Posts page" and uses it
	 * to construct a new `<h1>` element with the appropriate styles.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/query-title
	 *
	 * @return string The modified block content, or an empty string.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		// If the block already has content, or we are not on the main blog page,
		// or we are on the front page, do not do anything.
		if ( $block_content ) {
			return $block_content;
		}
		$is_preview = Block::is_rendering_preview();
		if ( ( ! is_home() && ! $is_preview ) || is_front_page() ) {
			return $block_content;
		}

		// Ensure a "page for posts" is set in the WordPress reading settings.
		$page_for_posts = get_option( 'page_for_posts' );
		if ( ! $page_for_posts && ! $is_preview ) {
			return '';
		}

		// --- Build the <h1> element from scratch ---
		$dom = DOM::create( $block_content );
		$h1  = DOM::get_element( 'h1', $dom ) ?? DOM::create_element( 'h1', $dom );

		// Apply classes for alignment and color.
		$classes = [ 'wp-block-query-title' ];
		$attrs   = $block['attrs'] ?? [];
		if ( $text_align = $attrs['textAlign'] ?? null ) {
			$classes[] = 'has-text-align-' . esc_attr( $text_align );
		}
		if ( $text_color = $attrs['textColor'] ?? null ) {
			$classes[] = 'has-' . esc_attr( $text_color ) . '-color';
		}
		$h1->setAttribute( 'class', implode( ' ', $classes ) );

		// Apply margin and padding styles.
		$styles  = DOM::get_styles( $h1 );
		$margin  = $attrs['style']['spacing']['margin'] ?? [];
		$padding = $attrs['style']['spacing']['padding'] ?? [];
		$styles  = CSS::add_shorthand_property( $styles, 'margin', $margin );
		$styles  = CSS::add_shorthand_property( $styles, 'padding', $padding );
		DOM::add_styles( $h1, $styles );

		// Set the correct title text.
		$title         = $is_preview ? esc_html__( 'Archive', 'aegis' ) : get_the_title( $page_for_posts );
		$h1->nodeValue = esc_html( $title );
		$dom->appendChild( $h1 );

		return $dom->saveHTML();
	}
}
