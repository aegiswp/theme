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

class QueryTitle implements Renderable {

	/**
	 * Renders the Archive Title block.
	 *
	 * @param string   $block_content The block content.
	 * @param array    $block         The block.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @hook render_block_core/query-title
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		if ( $block_content ) {
			return $block_content;
		}

		$is_preview = Block::is_rendering_preview();

		if ( ( ! is_home() && ! $is_preview ) || is_front_page() ) {
			return $block_content;
		}

		$page_for_posts = get_option( 'page_for_posts' );

		if ( ! $page_for_posts && ! $is_preview ) {
			return '';
		}

		$dom = DOM::create( $block_content );
		$h1  = DOM::get_element( 'h1', $dom );

		if ( ! $h1 ) {
			$h1 = DOM::create_element( 'h1', $dom );
		}

		$classes = [
			'wp-block-query-title',
		];

		$attrs      = $block['attrs'] ?? [];
		$text_align = $attrs['textAlign'] ?? null;

		if ( $text_align ) {
			$classes[] = 'has-text-align-' . esc_attr( $text_align );
		}

		$text_color = $attrs['textColor'] ?? null;

		if ( $text_color ) {
			$classes[] = 'has-' . esc_attr( $text_color ) . '-color';
		}

		$h1->setAttribute( 'class', implode( ' ', $classes ) );

		$styles  = DOM::get_styles( $h1 );
		$margin  = $attrs['style']['spacing']['margin'] ?? [];
		$padding = $attrs['style']['spacing']['padding'] ?? [];
		$styles  = CSS::add_shorthand_property( $styles, 'margin', $margin );
		$styles  = CSS::add_shorthand_property( $styles, 'padding', $padding );

		DOM::add_styles( $h1, $styles );

		$title = $is_preview ? esc_html__( 'Archive', 'aegis' ) : get_the_title( $page_for_posts );

		$h1->nodeValue = esc_html( $title );
		$dom->appendChild( $h1 );

		return $dom->saveHTML();
	}

}
