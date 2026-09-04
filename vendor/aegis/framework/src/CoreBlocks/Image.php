<?php
/**
 * Image Block
 *
 * Provides support for rendering image blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling image block content
 * - Integrates with utility classes for DOM and CSS
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for image block.
declare( strict_types=1 );

// Declares the namespace for the image block.
namespace Aegis\Framework\CoreBlocks;

// Imports classes, interfaces, and functions used by the image block.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\BlockSettings\Image as ImageSettings;
use Aegis\Framework\BlockSettings\Responsive;
use Aegis\Framework\Interfaces\Renderable;
use DOMElement;
use WP_Block;
use function esc_attr;
use function esc_html;
use function esc_html__;
use function explode;
use function implode;
use function in_array;
use function str_contains;

/**
 * Handles the rendering of the core/image and core/post-featured-image blocks.
 *
 * This class serves as a centralized renderer for multiple image-related blocks.
 * It is responsible for applying responsive visibility classes and custom styles
 * like margin and border-radius.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Image implements Renderable {

	/**
	 * The Responsive settings handler.
	 *
	 * @var Responsive
	 */
	private Responsive $responsive;

	/**
	 * Image block constructor.
	 *
	 * Injects the required responsive settings handler.
	 *
	 * @since 1.0.0
	 *
	 * @param Responsive $responsive The responsive settings handler.
	 */
	public function __construct( Responsive $responsive ) {
		$this->responsive = $responsive;
	}

	/**
	 * Renders the image block with custom enhancements.
	 *
	 * This method is hooked into the generic `render_block` filter and acts on
	 * multiple image-related blocks. It applies responsive classes and adds
	 * inline styles for margin and border-radius based on block attributes.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block 12
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$name = $block['blockName'] ?? '';

		// This renderer targets multiple image-related blocks.
		if ( ! in_array( $name, [ 'core/image', 'core/post-featured-image', 'aegis/image-compare' ], true ) ) {
			return $block_content;
		}

		$attrs         = $block['attrs'] ?? [];
		$id            = $attrs['id'] ?? '';
		$style         = $attrs['style'] ?? [];
		$margin        = $style['spacing']['margin'] ?? '';
		$border_radius = $style['border']['radius'] ?? '';

		// --- Responsive Classes ---
		// Custom SVG image variations skip standard responsive image handling.
		$has_svg = $style['svgString'] ?? '';

		if ( ! $has_svg ) {
			if ( in_array( $name, [ 'core/image', 'core/post-featured-image' ], true ) ) {
				$block_content = $this->responsive->add_responsive_classes(
					$block_content,
					$block,
					ImageSettings::SETTINGS,
					(bool) $id
				);
			}
		}

		// --- Style Application ---
		$dom    = DOM::create( $block_content );
		$figure = DOM::get_element( 'figure', $dom );

		// Apply margin and border-radius to the <figure> element.
		if ( $figure ) {
			$styles = CSS::string_to_array( $figure->getAttribute( 'style' ) );

			if ( $margin ) {
				$styles = CSS::add_shorthand_property( $styles, 'margin', $style['spacing']['margin'] ?? [] );
			}
			if ( $border_radius ) {
				$styles = CSS::add_shorthand_property( $styles, 'border-radius', $style['border']['radius'] ?? [] );
			}

			$figure->setAttribute( 'style', CSS::array_to_string( $styles ) );
		}

		return $dom->saveHTML();
	}

	/**
	 * Wrap the lightbox image and trigger so Core positions the button on the image.
	 *
	 * Aegis centers images in a full-width figure. Core's trigger math treats leftover
	 * figure space as left-aligned, which puts the expand control in the wrong place.
	 *
	 * @param string $block_content Block HTML.
	 * @param array  $block         Block data.
	 *
	 * @hook render_block_core/image 17
	 *
	 * @return string
	 */
	public function wrap_lightbox_trigger( string $block_content, array $block ): string {
		if ( ! str_contains( $block_content, 'lightbox-trigger' ) || str_contains( $block_content, 'aegis-lightbox-media' ) ) {
			return $block_content;
		}

		$dom    = DOM::create( $block_content );
		$figure = DOM::get_element( 'figure', $dom );

		if ( ! $figure ) {
			return $block_content;
		}

		$img    = DOM::get_element( 'img', $figure );
		$button = $this->lightbox_trigger_button( $figure );

		if ( ! $img || ! $button || ! $figure->ownerDocument ) {
			return $block_content;
		}

		$wrap = DOM::create_element( 'span', $figure->ownerDocument );

		if ( ! $wrap || ! $img->parentNode ) {
			return $block_content;
		}

		$wrap->setAttribute( 'class', 'aegis-lightbox-media' );
		$img->parentNode->insertBefore( $wrap, $img );
		$wrap->appendChild( $img );
		$wrap->appendChild( $button );

		return $dom->saveHTML();
	}

	private function lightbox_trigger_button( DOMElement $figure ): ?DOMElement {
		foreach ( $figure->getElementsByTagName( 'button' ) as $candidate ) {
			if ( ! $candidate instanceof DOMElement ) {
				continue;
			}

			if ( str_contains( $candidate->getAttribute( 'class' ), 'lightbox-trigger' ) ) {
				return $candidate;
			}
		}

		return null;
	}
}
