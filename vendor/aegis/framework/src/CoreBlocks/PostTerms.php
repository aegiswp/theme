<?php
/**
 * Post Terms Block
 *
 * Provides support for rendering post terms blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling post terms block content
 * - Integrates with utility classes for DOM, CSS, and WordPress taxonomy helpers
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, renderable blocks, and taxonomy functions.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function array_key_last;
use function array_unique;
use function esc_attr;
use function esc_html;
use function esc_html__;
use function esc_url;
use function explode;
use function get_post_type;
use function get_term_link;
use function get_terms;
use function in_array;
use function is_front_page;
use function is_singular;
use function is_string;
use function trim;

// Implements the PostTerms class to support post terms block rendering.

/**
 * Handles the rendering of the core/post-terms block.
 *
 * This is a highly complex class that heavily customizes and often completely
 * rebuilds the post-terms block from scratch. It adds a "show all" mode to
 * display all terms of a taxonomy, applies numerous custom styles, and handles
 * special styling for term "badges".
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class PostTerms implements Renderable {

	/**
	 * Renders the post-terms block with extensive customizations.
	 *
	 * This method is hooked into the `render_block_core/post-terms` filter.
	 * Its logic is split into two main paths:
	 * 1. Minor fixes for alignment and separators on the default block output.
	 * 2. A complete, from-scratch rebuild of the block if the `showAll` attribute
	 *    is true or if the default block content is empty. This rebuild fetches
	 *    all terms of a taxonomy and applies a wide range of custom styles.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/post-terms
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs = $block['attrs'] ?? [];

		// --- Initial Minor Fixes ---
		// Apply flexbox alignment classes if specified.
		if ( $attrs['align'] ?? null ) {
			$dom = DOM::create( $block_content );
			$div = DOM::get_element( 'div', $dom );
			if ( $div ) {
				$classes = array_unique( [
					'wp-block-post-terms',
					'flex',
					'wrap',
					'justify-' . esc_attr( $attrs['align'] ?? 'left' ),
					...( explode( ' ', $div->getAttribute( 'class' ) ) ),
				] );
				$div->setAttribute( 'class', trim( implode( ' ', $classes ) ) );
				$block_content = $dom->saveHTML();
			}
		}

		$term = $attrs['term'] ?? '';
		if ( ! $term ) {
			return $block_content;
		}

		// Remove empty separator spans if the separator is set to an empty string.
		$separator = $attrs['separator'] ?? null;
		if ( '' === $separator ) {
			$dom = DOM::create( $block_content );
			$div = DOM::get_element( 'div', $dom );
			if ( $div ) {
				foreach ( $div->childNodes as $child ) {
					if ( 'span' === $child->nodeName && ! trim( $child->nodeValue ) ) {
						$div->removeChild( $child );
					}
				}
				$block_content = $dom->saveHTML();
			}
		}

		// --- Full Block Re-render Logic ---
		// If the block content is empty OR the "Show All" attribute is checked,
		// ignore the default rendering and build the term list from scratch.
		$show_all = $attrs['showAll'] ?? false;
		if ( ! $block_content || $show_all ) {
			$dom         = DOM::create( '<div></div>' );
			$div         = DOM::get_element( 'div', $dom );
			$div_classes = [
				...( explode( ' ', $attrs['className'] ?? '' ) ),
				'wp-block-post-terms',
				'taxonomy-' . $term,
			];

			// Apply alignment and text color classes.
			if ( $text_align = esc_attr( $attrs['textAlign'] ?? '' ) ) {
				$div_classes[] = 'has-text-align-' . $text_align;
				$div_classes[] = 'justify-' . $text_align;
			}
			if ( $text_color = esc_attr( $attrs['textColor'] ?? '' ) ) {
				$div_classes[] = 'has-' . $text_color . '-color';
			}

			$taxonomy  = get_taxonomy( $term );
			$post_type = $taxonomy->object_type[0] ?? get_post_type();

			// On singular pages, if not "Show All", display "not found" text. Otherwise, build the full list.
			if ( ( is_singular() && ! is_front_page() && ! $show_all ) || ! $show_all ) {
				$p            = DOM::create_element( 'p', $dom );
				$p->nodeValue = esc_html( $taxonomy->labels->not_found ?? '' );
				$p->setAttribute( 'class', 'margin-top-auto margin-bottom-auto' );
				$div->appendChild( $p );
			} else {
				// Add a link to the main archive page for the post type.
				$a            = DOM::create_element( 'a', $dom );
				$archive_link = get_post_type_archive_link( $post_type );
				if ( ! is_string( $archive_link ) ) {
					return '';
				}
				$a->setAttribute( 'href', esc_url( $archive_link ) );
				$a->setAttribute( 'class', 'wp-block-post-terms__link' );
				$a->setAttribute( 'rel', 'tag' );
				$a->nodeValue = esc_html__( 'All', 'aegis' );
				$div->appendChild( $a );

				// Add a separator after the "All" link.
				if ( ! in_array( 'is-style-badges', $div_classes, true ) ) {
					$div->appendChild( $dom->createTextNode( $separator ?? '' ) );
				}

				// Fetch and display all terms for the taxonomy.
				$terms = get_terms( [ 'taxonomy' => $term, 'hide_empty' => true ] );
				foreach ( $terms as $index => $term_object ) {
					$a         = DOM::create_element( 'a', $dom );
					$term_link = get_term_link( $term_object );
					if ( ! is_string( $term_link ) ) {
						continue;
					}
					$a->setAttribute( 'href', esc_url( $term_link ) );
					$a->setAttribute( 'class', 'wp-block-post-terms__link' );
					$a->setAttribute( 'rel', 'tag' );
					$a->nodeValue = esc_html( $term_object->name ?? '' );
					$div->appendChild( $a );

					// Add a separator between terms, but not at the end.
					if ( ! in_array( 'is-style-badges', $div_classes, true ) && $index !== array_key_last( $terms ) ) {
						$div->appendChild( $dom->createTextNode( $separator ?? '' ) );
					}
				}
			}

			// Apply a wide range of custom styles from attributes.
			$styles = [];
			if ( $margin = $attrs['style']['spacing']['margin'] ?? null ) {
				$styles = CSS::add_shorthand_property( $styles, 'margin', $margin );
			}
			if ( $text_decoration = esc_attr( $attrs['style']['typography']['textDecoration'] ?? '' ) ) {
				$styles['text-decoration'] = $text_decoration;
			}
			if ( $font_size = esc_attr( $attrs['fontSize'] ?? '' ) ) {
				$div_classes[] = 'has-font-size';
				$div_classes[] = 'has-' . $font_size . '-font-size';
			}
			if ( $font_size_custom = esc_attr( $attrs['style']['typography']['fontSize'] ?? '' ) ) {
				$styles['font-size'] = CSS::format_custom_property( $font_size_custom );
				$div_classes[]       = 'has-font-size';
			}
			if ( $padding = $attrs['style']['spacing']['padding'] ?? null ) {
				$styles = CSS::add_shorthand_property( $styles, 'padding', $padding );
			}

			$div->setAttribute( 'class', trim( implode( ' ', array_unique( $div_classes ) ) ) );
			if ( $styles ) {
				$div->setAttribute( 'style', CSS::array_to_string( $styles ) );
			}

			$block_content = $dom->saveHTML();
		}

		// --- Final Style Application on the Resulting HTML ---
		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom ); // The main wrapper, either a div or ul.
		if ( $first ) {
			$styles = CSS::string_to_array( $first->getAttribute( 'style' ) );
			// Apply block gap.
			if ( $gap = $attrs['style']['spacing']['blockGap'] ?? '' ) {
				$styles['gap'] = CSS::format_custom_property( $gap );
			}
			// Apply font weight.
			if ( $font_weight = esc_attr( $attrs['style']['typography']['fontWeight'] ?? '' ) ) {
				$styles['font-weight'] = $font_weight;
			}
			// Apply border-radius as a CSS variable.
			if ( $radius = $attrs['style']['border']['radius'] ?? null ) {
				$styles['--wp--custom--border--radius'] = esc_attr( $radius );
			}
			if ( $styles ) {
				$first->setAttribute( 'style', CSS::array_to_string( $styles ) );
			}
		}

		// Special handling for the "badges" style variation.
		$class_names = explode( ' ', $attrs['className'] ?? '' );
		if ( in_array( 'is-style-badges', $class_names, true ) ) {
			if ( ( $padding = $attrs['style']['spacing']['padding'] ?? null ) && $first ) {
				$styles = CSS::string_to_array( $first->getAttribute( 'style' ) );
				unset( $styles['padding'] );
				$styles = CSS::add_shorthand_property( $styles, '--wp--custom--badge--padding', $padding );
				$first->setAttribute( 'style', CSS::array_to_string( $styles ) );
			}
		}

		return $dom->saveHTML();
	}
}
