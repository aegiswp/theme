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

// Enforces strict type checking for all code in this file, ensuring type safety for accordionlist block variation.
declare( strict_types=1 );

// Declares the namespace for the accordionlist block variation.
namespace Aegis\Framework\BlockVariations;

// Imports classes, interfaces, and functions used by the accordionlist block variation.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Framework\ServiceProvider;
use DOMElement;
use WP_Block;
use function __;
use function register_block_style;
use function wp_json_encode;
use function wp_strip_all_tags;
use function wp_unique_id;


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
	 * Register the Accordion style on core/list for the editor and PHP registry.
	 *
	 * @hook init
	 */
	public function register_style(): void {
		if ( ! ServiceProvider::is_block_enabled( 'accordion' ) ) {
			return;
		}

		register_block_style(
			'core/list',
			array(
				'name'  => 'accordion',
				'label' => __( 'Accordion', 'aegis' ),
			)
		);
	}

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

		if ( ! ServiceProvider::is_block_enabled( 'accordion' ) ) {
			return $block_content;
		}

		$open_first  = ServiceProvider::is_block_enabled( 'accordion_open_first' );
		$open_all    = ServiceProvider::is_block_enabled( 'accordion_open_all' );
		$show_icon   = ServiceProvider::is_block_enabled( 'accordion_icon' );
		$show_border = ServiceProvider::is_block_enabled( 'accordion_border' );
		$faq_schema  = ServiceProvider::is_block_enabled( 'accordion_faq_schema' );
		$single_open = ServiceProvider::is_block_enabled( 'accordion_single_open' );

		if (
			$faq_schema
			&& class_exists( '\Aegis\Plugin\Settings\Repository' )
			&& \Aegis\Plugin\Settings\Repository::is_schema_delegated_to_seo( 'faq' )
		) {
			$faq_schema = false;
		}

		$dom = DOM::create( $block_content );
		$ul  = DOM::get_element( 'ul', $dom );
		$ol  = DOM::get_element( 'ol', $dom );
		$list = $ul ?? $ol;

		if ( ! $list ) {
			return $block_content;
		}

		$group_name             = wp_unique_id( 'aegis-accordion-' );
		$item_index             = 0;
		$faq_entities           = array();
		$accordion_wrapper_html = '<div>';

		foreach ( $list->getElementsByTagName( 'li' ) as $li ) {
			if ( ! $li instanceof DOMElement ) {
				continue;
			}

			$inner_html = $dom->saveHTML( $li );

			if ( ! str_contains( $inner_html, '<br>' ) ) {
				continue;
			}

			$details = DOM::create_element( 'details', $dom );
			foreach ( $li->attributes as $attribute ) {
				$details->setAttribute( esc_attr( $attribute->name ), esc_attr( $attribute->value ) );
			}

			if ( $open_all || ( $open_first && 0 === $item_index ) ) {
				$details->setAttribute( 'open', 'open' );
			}

			if ( $single_open ) {
				$details->setAttribute( 'name', $group_name );
			}

			$summary = DOM::create_element( 'summary', $dom );
			$section = DOM::create_element( 'section', $dom );
			$explode = explode( '<br>', $inner_html );

			$title_dom = DOM::create( $explode[0] );
			$list_item = DOM::get_element( 'li', $title_dom );
			if ( $list_item ) {
				foreach ( $list_item->childNodes as $child_node ) {
					$summary->appendChild( $dom->importNode( $child_node, true ) );
				}
			}

			$section->textContent = strip_tags( $explode[2] ?? $explode[1], '' );

			$details->appendChild( $summary );

			$has_border = $show_border;
			if ( $has_border ) {
				$details->appendChild( DOM::create_element( 'hr', $dom ) );
			}

			$details->appendChild( $section );

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

			$details->setAttribute( 'style', CSS::array_to_string( $styles ) );
			if ( ! $styles ) {
				$details->removeAttribute( 'style' );
			}

			if ( $show_icon ) {
				$icon = DOM::create_element( 'span', $dom );
				$icon->setAttribute( 'class', 'accordion-toggle' );
				$summary->appendChild( $icon );
			}

			if ( $faq_schema ) {
				$question = wp_strip_all_tags( (string) $summary->textContent );
				$answer   = wp_strip_all_tags( (string) $section->textContent );
				if ( '' !== $question && '' !== $answer ) {
					$faq_entities[] = array(
						'@type'          => 'Question',
						'name'           => $question,
						'acceptedAnswer' => array(
							'@type' => 'Answer',
							'text'  => $answer,
						),
					);
				}
			}

			$accordion_wrapper_html .= $dom->saveHTML( $details );
			++$item_index;
		}

		$accordion_wrapper_html .= '</div>';

		$div_dom  = DOM::create( $accordion_wrapper_html );
		$imported = $dom->importNode( $div_dom->documentElement, true );

		foreach ( $list->attributes as $attribute ) {
			if ( method_exists( $imported, 'setAttribute' ) ) {
				$imported->setAttribute( $attribute->localName, $attribute->nodeValue );
			}
		}

		$dom->removeChild( $list );
		$dom->appendChild( $imported );

		$html = $dom->saveHTML();

		if ( $faq_entities ) {
			$schema = array(
				'@context'   => 'https://schema.org',
				'@type'      => 'FAQPage',
				'mainEntity' => $faq_entities,
			);
			$html  .= '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES ) . '</script>';
		}

		return $html;
	}
}
