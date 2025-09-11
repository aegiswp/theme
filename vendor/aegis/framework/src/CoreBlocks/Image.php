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

// Enforces strict type checking for all code in this file, ensuring type safety for core blocks.
declare( strict_types=1 );

// Declares the namespace for core blocks within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\BlockSettings\Image as ImageSettings;
use Aegis\Framework\BlockSettings\Responsive;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function esc_attr;
use function esc_html;
use function esc_html__;
use function explode;
use function implode;
use function in_array;

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
		// The presence of an icon or custom SVG suggests a different kind of block
		// (like an icon block using an image mask), which may not need standard
		// responsive image handling.
		$has_icon = ( $attrs['iconSet'] ?? '' ) && ( $attrs['iconName'] ?? '' ) || ( $attrs['iconSvgString'] ?? '' );
		$has_svg  = $style['svgString'] ?? '';

		if ( ! $has_icon && ! $has_svg ) {
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

}
