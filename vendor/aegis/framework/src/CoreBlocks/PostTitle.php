<?php
/**
 * PostTitle.php
 *
 * Handles the post title core block logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\CoreBlocks
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\CoreBlocks;

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

/**
 * PostTitle class.
 *
 * @since 1.0.0
 */
class PostTitle implements Renderable {

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/post-title
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		if ( is_home() && str_contains( $block_content, '<h1' ) ) {
			$text           = wp_strip_all_tags( $block_content );
			$page_for_posts = get_post( get_option( 'page_for_posts' ) );

			if ( $page_for_posts->post_type === 'page' ) {
				$title = esc_html( $page_for_posts->post_title );
			} else {
				$title = esc_html__( 'Latest Posts', 'aegis' );
			}

			$block_content = str_replace( $text, $title, $block_content );
		}

		$tag     = 'h' . intval( $block['attrs']['level'] ?? 2 );
		$dom     = DOM::create( $block_content );
		$heading = DOM::get_element( $tag, $dom );

		if ( $heading instanceof DOMElement ) {
			$heading->setAttribute(
				'id',
				sanitize_title_with_dashes( $block['attrs']['anchor'] ?? $heading->textContent )
			);
		}

		return $dom->saveHTML();
	}
}
