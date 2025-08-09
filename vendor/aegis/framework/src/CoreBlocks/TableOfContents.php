<?php
/**
 * Table of Contents Block
 *
 * Provides support for rendering table of contents blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and managing a table of contents for content blocks
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

// Imports utility classes and interfaces for conditional logic, renderable blocks, DOM manipulation, CSS helpers, and WordPress helpers.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use WP_Block;
use function do_blocks;
use function esc_html__;
use function get_the_content;
use function get_the_title;
use function in_array;
use function is_admin;
use function sanitize_title;

// Implements the TableOfContents class to support table of contents block rendering.

/**
 * Handles the rendering of the core/table-of-contents block.
 *
 * This class enhances the Table of Contents block with a "sidebar" mode, which
 * automatically generates a list of links by scraping all heading blocks from
 * the current post's content. This class only runs on the front-end.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class TableOfContents implements Renderable, Conditional {

	/**
	 * Determines if the render modifications should be applied.
	 *
	 * This conditional check ensures that the render logic only runs on the
	 * front-end of the site, not within the admin editor, to prevent
	 * unexpected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True if not in the admin area, false otherwise.
	 */
	public static function condition(): bool {
		return ! is_admin();
	}

	/**
	 * Renders the Table of Contents block, potentially rebuilding it from post content.
	 *
	 * This method is hooked into the `render_block_core/table-of-contents` filter.
	 * If it detects specific keywords (like "Table of Contents") in the block's
	 * heading attributes, it triggers a "sidebar" mode. This mode discards the
	 * default block output and generates a new list of links by scraping all
	 * `<h2>` to `<h6>` headings from the current post's content.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/table-of-contents
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$headings = $block['attrs']['headings'] ?? [];
		$sidebar  = false;

		// Check if any heading attribute contains trigger keywords for sidebar mode.
		foreach ( $headings as $heading ) {
			$content = $heading['content'] ?? '';
			if ( in_array( $content, [
				esc_html__( 'Table of Contents', 'aegis' ),
				esc_html__( 'Contents', 'aegis' ),
				esc_html__( 'Table of contents', 'aegis' ),
			], true ) ) {
				$sidebar = true;
				break;
			}
		}

		// If sidebar mode is triggered, rebuild the block from scratch.
		if ( $sidebar ) {
			// --- Scrape Headings from Post Content ---
			$content_headings = [ get_the_title() ];
			$content_dom      = DOM::create( do_blocks( get_the_content() ) );
			foreach ( $content_dom->getElementsByTagName( '*' ) as $element ) {
				if ( in_array( $element->tagName, [ 'h2', 'h3', 'h4', 'h5', 'h6' ], true ) ) {
					$content_headings[] = $element->textContent;
				}
			}

			// --- Rebuild the Table of Contents DOM ---
			$dom = DOM::create( $block_content );
			$nav = DOM::get_element( 'nav', $dom );
			if ( ! $nav ) {
				return $block_content;
			}

			// Clear the existing list and create a new one.
			$nav->removeChild( $nav->firstChild );
			$ol = DOM::create_element( 'ol', $dom );
			$nav->appendChild( $ol );

			// Create a list item and link for each scraped heading.
			foreach ( $content_headings as $content_heading ) {
				$link = DOM::create_element( 'a', $dom );
				$link->setAttribute( 'href', '#' . sanitize_title( $content_heading ) );
				$link->textContent = $content_heading;

				$li = DOM::create_element( 'li', $dom );
				$li->appendChild( $link );
				$ol->appendChild( $li );
			}

			// Apply blockGap from attributes to the new list.
			$nav_styles = CSS::string_to_array( $nav->getAttribute( 'style' ) );
			$gap        = $block['attrs']['style']['spacing']['blockGap'] ?? null;
			if ( $gap ) {
				$nav_styles['gap'] = CSS::format_custom_property( $gap );
			}
			$ol->setAttribute( 'style', CSS::array_to_string( $nav_styles ) );
			$nav->removeAttribute( 'style' );

			$block_content = $dom->saveHTML();
		}

		return $block_content;
	}
}
