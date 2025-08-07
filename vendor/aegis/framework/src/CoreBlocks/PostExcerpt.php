<?php
/**
 * Post Excerpt Block
 *
 * Provides support for rendering post excerpt blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling post excerpt block content
 * - Integrates with utility classes for DOM, CSS, and string manipulation
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, string utilities, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Utilities\Str;
use WP_Block;
use WP_Block_Supports;
use function add_post_type_support;
use function apply_filters;
use function esc_attr;
use function esc_html;
use function esc_html__;
use function explode;
use function get_post_field;
use function get_the_excerpt;
use function get_the_ID;
use function get_the_title;
use function implode;
use function in_array;
use function is_singular;
use function str_replace;
use function trim;
use function wp_trim_words;

// Implements the PostExcerpt class to support post excerpt block rendering.

/**
 * Handles the rendering and functionality of the core/post-excerpt block.
 *
 * This class provides extensive customization for the post excerpt block,
 * including controlling its visibility on singular pages, managing the "Read More"
 * link, sourcing the excerpt content from multiple potential attributes, applying
 * custom styling, and truncating the output to a specific length. It also adds
 * theme support for page excerpts and cleans up the "more" string.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class PostExcerpt implements Renderable {

	/**
	 * Renders the post excerpt block with extensive customizations.
	 *
	 * This method is hooked into the `render_block_core/post-excerpt` filter. It
	 * contains complex logic to build the excerpt from various sources, handle
	 * the "Read More" link, apply styles, and truncate the result.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/post-excerpt
	 *
	 * @return string The modified block content, or an empty string in specific contexts.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		// --- Conditional Rendering ---
		// On singular pages, if there's no manually written excerpt, the block should
		// render nothing to avoid showing the full post content. This doesn't apply
		// when inside a Query Loop (post-template).
		$query_post_id   = $instance->context['postId'] ?? false;
		$custom_excerpt  = get_post_field( 'post_excerpt', $query_post_id ?? get_the_ID() );
		$is_query_loop   = ( WP_Block_Supports::$block_to_render['blockName'] ?? '' ) === 'core/post-template';
		if ( is_singular() && ! $custom_excerpt && ! $is_query_loop ) {
			return '';
		}

		// --- DOM Preparation ---
		$attrs           = $block['attrs'] ?? [];
		$default_excerpt = $attrs['defaultExcerpt'] ?? '';
		$dom             = DOM::create( $block_content );
		$div             = DOM::get_element( 'div', $dom );

		if ( ! $div && ! $default_excerpt ) {
			return $block_content;
		}
		if ( ! $div ) {
			$div = DOM::create_element( 'div', $dom );
			$div->setAttribute( 'class', 'wp-block-post-excerpt' );
			$dom->appendChild( $div );
		}

		// --- "Read More" Link Handling ---
		// If the "Read More" link is explicitly hidden, remove it from the DOM.
		if ( $attrs['hideReadMore'] ?? false ) {
			$read_more = DOM::get_elements_by_class_name( 'wp-block-post-excerpt__more-text', $dom )[0] ?? null;
			if ( $read_more ) {
				$read_more->parentNode->removeChild( $read_more );
			} else {
				$classes = explode( ' ', $div->getAttribute( 'class' ) );
				if ( ! in_array( 'hide-read-more', $classes, true ) ) {
					$classes[] = 'hide-read-more';
				}
				$div->setAttribute( 'class', implode( ' ', $classes ) );
			}
		}

		// If custom "more" text is provided, add accessible screen-reader text.
		if ( $attrs['moreText'] ?? '' ) {
			$more_link = DOM::get_elements_by_class_name( 'wp-block-post-excerpt__more-link', $dom )[0] ?? null;
			if ( $more_link ) {
				$screen_reader              = DOM::create_element( 'span', $dom );
				$screen_reader->setAttribute( 'class', 'screen-reader-text' );
				$post_title                 = get_the_title( $query_post_id ) ?: esc_html__( 'this post', 'aegis' );
				$screen_reader->textContent = esc_html__( ' about ', 'aegis' ) . $post_title;
				$more_link->appendChild( $screen_reader );
			}
		}

		// --- Excerpt Content Sourcing and Truncation ---
		$p                = DOM::get_elements_by_class_name( 'wp-block-post-excerpt__excerpt', $dom )[0] ?? null;
		$rendered_excerpt = $p->textContent ?? '';
		$excerpt_length   = $attrs['excerptLength'] ?? apply_filters( 'excerpt_length', 55 );
		$excerpt          = $rendered_excerpt ?: $custom_excerpt ?: $default_excerpt ?: get_the_excerpt();

		if ( ! $p ) {
			$p              = DOM::create_element( 'p', $dom );
			$p->setAttribute( 'class', 'wp-block-post-excerpt__excerpt' );
			$div->appendChild( $p );
		}
		// Set the final determined excerpt text and then trim it.
		$p->textContent = esc_html( $excerpt );
		$p->nodeValue   = esc_html( wp_trim_words( $p->nodeValue ?? '', $excerpt_length ) );

		// --- Style Application ---
		$div_classes = explode( ' ', $div->getAttribute( 'class' ) );
		$styles      = [];
		$text_color  = $attrs['textColor'] ?? null;
		if ( $text_color ) {
			$custom_property = ! Str::contains_any( $text_color, '#', 'rgb', 'hsl' );
			$styles['color'] = esc_attr( $custom_property ? 'var(--wp--preset--color--' . $text_color . ')' : $text_color );
		}

		if ( $text_align = $attrs['textAlign'] ?? '' ) {
			$div_classes[] = 'has-text-align-' . esc_attr( $text_align );
		}

		$margin  = $attrs['style']['spacing']['margin'] ?? '';
		$padding = $attrs['style']['spacing']['padding'] ?? '';
		$styles  = CSS::add_shorthand_property( $styles, 'margin', $margin );
		$styles  = CSS::add_shorthand_property( $styles, 'padding', $padding );
		if ( $styles ) {
			$div->setAttribute( 'style', CSS::array_to_string( $styles ) );
		}

		if ( $align = $attrs['align'] ?? '' ) {
			$div_classes[] = 'align' . esc_attr( $align );
		}

		$div->setAttribute( 'class', trim( implode( ' ', $div_classes ) ) );
		$dom->appendChild( $div );

		return $dom->saveHTML();
	}

	/**
	 * Adds excerpt support to the 'page' post type.
	 *
	 * By default, WordPress does not enable excerpts for pages. This method
	 * ensures that the excerpt meta box is available on the page editing screen.
	 *
	 * @since 1.0.0
	 *
	 * @hook   after_setup_theme
	 */
	public function add_page_excerpt_support(): void {
		add_post_type_support( 'page', 'excerpt' );
	}

	/**
	 * Removes the brackets from the default "read more" string.
	 *
	 * WordPress automatically appends "[...]" to auto-generated excerpts. This
	 * method filters the "more" string to remove these brackets for a cleaner look.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $more The original "more" string (e.g., "[...]").
	 *
	 * @hook   excerpt_more
	 *
	 * @return string An empty string, effectively removing the "more" indicator.
	 */
	public function remove_brackets_from_excerpt( string $more ): string {
		return str_replace( [ '[', ']' ], '', $more );
	}
}
