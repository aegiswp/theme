<?php
/**
 * AccordionList Block Variation
 *
 * Provides support for rendering list blocks as accordions within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling list blocks as accordions
 * - Integrates with the Renderable interface for block output
 *
 * @package    Aegis\Framework\BlockVariations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for blocks variations.
declare( strict_types=1 );

// Declares the namespace for block variations within the Aegis Framework.
namespace Aegis\Framework\BlockVariations;

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Utilities\Str;
use DOMElement;
use WP_Block;

// Implements the AccordionList class to support accordion-style list blocks.

/**
 * Handles the "Accordion" style variation for the core/list block.
 *
 * This class transforms a standard `<ul>` or `<ol>` list block into a semantic
 * and functional accordion using `<details>` and `<summary>` HTML elements.
 * This is triggered by applying the "Accordion" style variation in the block editor,
 * which adds the `is-style-accordion` class.
 *
 * @package Aegis\Framework\BlockVariations
 * @since   1.0.0
 */
class AccordionList implements Renderable {

	/**
	 * Renders a list block as a semantic accordion.
	 *
	 * This method is hooked into the `render_block_core/list` filter. If the
	 * block has the `is-style-accordion` class, it completely reconstructs the
	 * list's DOM structure.
	 *
	 * It expects each `<li>` element to contain a `<br>` tag. The content before
	 * the `<br>` becomes the accordion title (`<summary>`), and the content after
	 * becomes the collapsible panel (`<section>`).
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/list 12
	 *
	 * @return string The modified block content, now structured as an accordion.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		if ( ! str_contains( $block_content, 'is-style-accordion' ) ) {
			return $block_content;
		}

		$dom = DOM::create( $block_content );
		$ul  = DOM::get_element( 'ul', $dom );
		$ol  = DOM::get_element( 'ol', $dom );
		$list = $ul ?? $ol;

		if ( ! $list ) {
			return $block_content;
		}

		// --- Start Reconstruction ---
		// Create a new parent div to hold the <details> elements.
		$accordion_wrapper_html = '<div>';

		// Iterate over each original list item.
		foreach ( $list->getElementsByTagName( 'li' ) as $li ) {
			if ( ! $li instanceof DOMElement ) {
				continue;
			}

			$inner_html = $dom->saveHTML( $li );

			// The <br> tag is used as a delimiter between the title and content.
			if ( ! str_contains( $inner_html, '<br>' ) ) {
				continue;
			}

			// Create the new <details> and <summary> elements.
			$details = DOM::create_element( 'details', $dom );
			// Transfer all attributes (class, style, etc.) from the <li> to the <details>.
			foreach ( $li->attributes as $attribute ) {
				$details->setAttribute( esc_attr( $attribute->name ), esc_attr( $attribute->value ) );
			}

			$summary = DOM::create_element( 'summary', $dom );
			$section = DOM::create_element( 'section', $dom );
			$explode = explode( '<br>', $inner_html );

			// --- Populate Title and Content ---
			// The content before the first <br> becomes the summary (title).
			$title_dom = DOM::create( $explode[0] );
			$list_item = DOM::get_element( 'li', $title_dom );
			foreach ( $list_item->childNodes as $child_node ) {
				$summary->appendChild( $dom->importNode( $child_node, true ) );
			}

			// The content after the <br> becomes the section (collapsible content).
			// The strip_tags is used to clean up any leftover HTML.
			$section->textContent = strip_tags( $explode[2] ?? $explode[1], '' );

			// --- Assemble the Accordion Item ---
			$details->appendChild( $summary );

			// If the original list item had a border, add a visual <hr> separator.
			$li_style   = $li->getAttribute( 'style' );
			$has_border = Str::contains_any( $li_style, 'border-width', 'border-style', 'border-color' ) && ! str_contains( $li_style, 'border-width:0' );
			if ( $has_border ) {
				$details->appendChild( DOM::create_element( 'hr', $dom ) );
			}

			$details->appendChild( $section );

			// --- Handle Padding ---
			// Padding styles are moved from the parent <details> to the inner <summary> and <section>
			// for more accurate visual styling.
			$styles  = CSS::string_to_array( $details->getAttribute( 'style' ) );
			$padding = [];
			foreach ( $styles as $key => $value ) {
				if ( str_contains( $key, 'padding' ) ) {
					unset( $styles[ $key ] );
					$padding[ $key ] = $value;
				}
			}
			if ( $padding ) {
				$summary->setAttribute( 'style', CSS::array_to_string( $padding ) );
				if ( ! $has_border ) {
					unset( $padding['padding-top'] );
				}
				$section->setAttribute( 'style', CSS::array_to_string( $padding ) );
			}

			// Re-apply the non-padding styles to the <details> element.
			$details->setAttribute( 'style', CSS::array_to_string( $styles ) );
			if ( ! $styles ) {
				$details->removeAttribute( 'style' );
			}

			// Add the expand/collapse icon.
			$icon = DOM::create_element( 'span', $dom );
			$icon->setAttribute( 'class', 'accordion-toggle' );
			$summary->appendChild( $icon );

			// Append the fully constructed <details> element to our wrapper.
			$accordion_wrapper_html .= $dom->saveHTML( $details );
		}

		$accordion_wrapper_html .= '</div>';

		// --- Final DOM Replacement ---
		// Replace the original <ul>/<ol> with the new <div> containing the accordion.
		$div_dom  = DOM::create( $accordion_wrapper_html );
		$imported = $dom->importNode( $div_dom->documentElement, true );

		// Transfer all attributes from the original list to the new wrapper.
		foreach ( $list->attributes as $attribute ) {
			if ( method_exists( $imported, 'setAttribute' ) ) {
				$imported->setAttribute( $attribute->localName, $attribute->nodeValue );
			}
		}

		$dom->removeChild( $list );
		$dom->appendChild( $imported );

		return $dom->saveHTML();
	}

}
