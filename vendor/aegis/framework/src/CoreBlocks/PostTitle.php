<?php
/**
 * Post Title Block
 *
 * Provides support for rendering post title blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling post title block content
 * - Integrates with utility classes for DOM and string helpers
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

// Imports utility classes and interfaces for DOM manipulation, string helpers, and renderable blocks.
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use DOMElement;
use WP_Block;
use function esc_html;
use function esc_html__;
use function get_option;
use function get_post;
use function intval;
use function is_home;
use function sanitize_title_with_dashes;
use function str_contains;
use function str_replace;
use function wp_strip_all_tags;

// Implements the PostTitle class to support post title block rendering.

/**
 * Handles the rendering of the core/post-title block.
 *
 * This class enhances the default post title block by ensuring it displays the
 * correct title on the main blog page and by automatically generating a valid
 * `id` attribute for anchor linking.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class PostTitle implements Renderable {

	/**
	 * Renders the post-title block with custom enhancements.
	 *
	 * This method is hooked into the `render_block_core/post-title` filter. It
	 * corrects the title on the main "Posts page" and ensures the heading tag
	 * always has a sanitized `id` attribute.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/post-title
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		// --- Blog Page Title Correction ---
		// If we are on the main blog index page (is_home()), the post title block
		// often incorrectly shows the title of the first post. This logic corrects it.
		if ( is_home() && str_contains( $block_content, '<h1' ) ) {
			$text           = wp_strip_all_tags( $block_content );
			$page_for_posts = get_post( get_option( 'page_for_posts' ) );

			// Use the title of the page assigned as the "Posts page" in settings.
			if ( $page_for_posts->post_type === 'page' ) {
				$title = esc_html( $page_for_posts->post_title );
			} else {
				// Fallback to a generic title if no page is set.
				$title = esc_html__( 'Latest Posts', 'aegis' );
			}

			$block_content = str_replace( $text, $title, $block_content );
		}

		// --- Automatic ID Generation ---
		$tag     = 'h' . intval( $block['attrs']['level'] ?? 2 );
		$dom     = DOM::create( $block_content );
		$heading = DOM::get_element( $tag, $dom );

		// Ensure the heading tag has an ID for anchor links.
		// It prioritizes a custom anchor from attributes, otherwise creates one from the text.
		if ( $heading instanceof DOMElement ) {
			$heading->setAttribute(
				'id',
				sanitize_title_with_dashes( $block['attrs']['anchor'] ?? $heading->textContent )
			);
		}

		return $dom->saveHTML();
	}
}
