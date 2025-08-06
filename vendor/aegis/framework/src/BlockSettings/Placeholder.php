<?php
/**
 * Placeholder Block Setting
 *
 * Provides support for rendering placeholder content and styles within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling placeholder content for blocks
 * - Integrates with the Renderable and Styleable interfaces for block output
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for block settings.
declare( strict_types=1 );

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports utility classes and interfaces for asset management, DOM manipulation, placeholder icons, and string utilities.
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Utilities\Block;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Icons\Icon;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Utilities\Str;
use DOMElement;
use WP_Block;
use function array_merge;
use function esc_attr;
use function esc_url;
use function explode;
use function implode;
use function in_array;
use function is_archive;
use function property_exists;
use function str_replace;

// Implements the Placeholder class to support placeholder content and styling for blocks.

/**
 * Handles the rendering of placeholders for image-related blocks.
 *
 * This is a highly complex class that renders a styled placeholder when an
 * image-type block (like core/image or core/post-featured-image) does not have
 * an image selected. It builds the placeholder HTML from scratch, applies a
 * wide range of custom styles from block attributes, and conditionally loads
 * its own stylesheet.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class Placeholder implements Renderable, Styleable {

	/**
	 * Conditionally enqueues the stylesheet for placeholder images.
	 *
	 * The styles are only loaded on archive pages or in the editor preview,
	 * and only if a block with the `is-placeholder` class exists on the page.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The Styles service instance.
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'block-extensions/placeholder-image.css',
			[ 'is-placeholder' ],
			is_archive() || Block::is_rendering_preview()
		);
	}

	/**
	 * Renders a styled placeholder if an image block is empty.
	 *
	 * This method is hooked into the generic `render_block` filter. It contains
	 * extensive logic to determine if an image block is empty and, if so, builds
	 * a new `<figure>` element with a placeholder SVG and applies a vast number
	 * of styles from the block's attributes.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block 11
	 *
	 * @return string The block content, potentially replaced with a placeholder.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		// --- Bail-out Checks ---
		// Only run on blocks with "image" in their name.
		if ( ! Str::contains_any( $block['blockName'] ?? '', 'image' ) ) {
			return $block_content;
		}

		// Don't run if an image ID, icon, or custom SVG is already set.
		$attrs = $block['attrs'] ?? [];
		if ( ( $attrs['id'] ?? '' ) || ( ( $attrs['iconSet'] ?? '' ) && ( $attrs['iconName'] ?? '' ) ) || ( $attrs['iconSvgString'] ?? '' ) || ( $attrs['style']['svgString'] ?? '' ) ) {
			return $block_content;
		}

		// Don't run if placeholders are explicitly disabled.
		if ( false === ( $attrs['usePlaceholder'] ?? true ) || 'none' === ( $attrs['usePlaceholder'] ?? '' ) ) {
			return $block_content;
		}

		// Don't run on blocks that are already styled as icons or SVGs.
		if ( Str::contains_any( $block_content, 'is-style-icon', 'is-style-svg' ) ) {
			return $block_content;
		}

		// Check the DOM to see if an `<img>` with a `src` or an `<svg>` already exists.
		$dom    = DOM::create( $block_content );
		$figure = DOM::get_element( 'figure', $dom );
		$img    = DOM::get_element( 'img', $figure );
		$link   = DOM::get_element( 'a', $figure );
		$svg    = DOM::get_element( 'svg', $link ?? $figure );
		if ( $svg || ( $img && $img->getAttribute( 'src' ) ) ) {
			return $block_content;
		}

		// --- DOM Preparation ---
		// If the block content is empty, create a basic figure wrapper.
		$block_name    = str_replace( 'core/', '', $block['blockName'] ?? '' );
		$block_content = $block_content ?: "<figure class='wp-block-{$block_name}'></figure>";
		$dom           = DOM::create( $block_content );
		$figure        = DOM::get_element( 'figure', $dom );
		if ( ! $figure instanceof DOMElement ) {
			return $block_content;
		}

		// Remove any empty `<img>` tags.
		if ( ( $img = DOM::get_element( 'img', $figure ) ) instanceof DOMElement ) {
			$figure->removeChild( $img );
		}

		// --- Placeholder Injection and Link Handling ---
		$classes     = explode( ' ', $figure->getAttribute( 'class' ) );
		$classes[]   = 'is-placeholder';
		if ( $block['align'] ?? null ) {
			$classes[] = 'align' . $block['align'];
		}

		$placeholder = Icon::get_placeholder( $dom );
		if ( 'svg' === $placeholder->tagName ) {
			$classes[] = 'has-placeholder-icon';
		}

		// If the placeholder should be linked, create an `<a>` tag.
		if ( $attrs['isLink'] ?? false ) {
			$context = property_exists( $instance, 'context' ) ? (object) $instance->context : null;
			$link    = DOM::create_element( 'a', $dom );
			// Try to get the permalink from the block's context.
			if ( property_exists( $context, 'postId' ) && ( $post_id = $context->postId ?? null ) && ( $href = get_permalink( $post_id ) ) ) {
				$link->setAttribute( 'href', esc_url( $href ) );
			}
			// Add target and rel attributes.
			if ( $link_target = $block['linkTarget'] ?? '' ) {
				$link->setAttribute( 'target', $link_target );
			}
			if ( $rel = esc_attr( $block['rel'] ?? '' ) ) {
				$link->setAttribute( 'rel', $rel );
			}
			// Add classes and append the placeholder inside the link.
			$link_classes   = explode( ' ', $link->getAttribute( 'class' ) );
			$link_classes[] = 'wp-block-image__link';
			$link_classes[] = 'is-placeholder';
			$link->setAttribute( 'class', implode( ' ', $link_classes ) );
			$link->appendChild( $placeholder );
			$figure->appendChild( $link );
		} else {
			// Otherwise, just append the placeholder directly.
			$figure->appendChild( $placeholder );
		}

		// --- Style Application ---
		// This section applies a huge range of style attributes to the placeholder figure.
		$style            = $attrs['style'] ?? [];
		$spacing          = $style['spacing'] ?? [];
		$border           = $style['border'] ?? [];
		$aspect_ratio     = $attrs['aspectRatio'] ?? null;
		$background_color = $attrs['backgroundColor'] ?? null;

		$styles = [
			'width'                      => $block['width'] ?? null,
			'height'                     => $block['height'] ?? null,
			'border-width'               => $border['width'] ?? null,
			'border-style'               => $border['style'] ?? ( ( $border['width'] ?? null ) ? 'solid' : null ),
			'border-color'               => $border['color'] ?? null,
			'border-top-left-radius'     => $border['radius']['topLeft'] ?? null,
			'border-top-right-radius'    => $border['radius']['topRight'] ?? null,
			'border-bottom-left-radius'  => $border['radius']['bottomLeft'] ?? null,
			'border-bottom-right-radius' => $border['radius']['bottomRight'] ?? null,
			'position'                   => $style['position']['all'] ?? null,
			'top'                        => $style['top']['all'] ?? null,
			'right'                      => $style['right']['all'] ?? null,
			'bottom'                     => $style['bottom']['all'] ?? null,
			'left'                       => $style['left']['all'] ?? null,
			'z-index'                    => $style['zIndex']['all'] ?? null,
		];
		$styles = CSS::add_shorthand_property( $styles, 'margin', $spacing['margin'] ?? [] );
		$styles = CSS::add_shorthand_property( $styles, 'padding', $spacing['padding'] ?? [] );

		if ( $aspect_ratio && 'auto' !== $aspect_ratio ) {
			$styles['aspect-ratio'] = $aspect_ratio;
		}

		if ( 'transparent' === $background_color ) {
			$classes[] = 'has-transparent-background-color';
		} else {
			$styles['background-color'] = $background_color;
		}

		// Merge new styles with any existing inline styles and apply.
		$css = CSS::array_to_string( array_merge( CSS::string_to_array( $figure->getAttribute( 'style' ) ), $styles ) );
		if ( $css ) {
			$figure->setAttribute( 'style', $css );
		}
		$figure->setAttribute( 'class', implode( ' ', $classes ) );

		return $dom->saveHTML();
	}

}
