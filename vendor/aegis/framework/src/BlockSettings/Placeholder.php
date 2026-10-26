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
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for placeholder block setting.
declare( strict_types=1 );

// Declares the namespace for the placeholder block setting.
namespace Aegis\Framework\BlockSettings;

// Imports classes, interfaces, and functions used by the placeholder block setting.
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
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
use function property_exists;
use function str_replace;
use function str_starts_with;
use function trim;
use function urldecode;


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
	 * The styles load when a block with the `is-placeholder` class is in
	 * the rendered HTML (any template, not only archives).
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The Styles service instance.
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'block-extensions/placeholder-image.css',
			[ 'is-placeholder' ]
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

		// Do not run if an image ID or custom SVG is already set.
		$attrs = $block['attrs'] ?? [];
		if ( ( $attrs['id'] ?? '' ) || ( $attrs['style']['svgString'] ?? '' ) ) {
			return $block_content;
		}

		// Decorative icons stored as the legacy Image variation are not empty photos.
		if ( \Aegis\Framework\Icons\IconMigrationMapper::is_legacy_image_icon( $attrs ) ) {
			return $block_content;
		}

		// Do not run if placeholders are explicitly disabled.
		if ( false === ( $attrs['usePlaceholder'] ?? true ) || 'none' === ( $attrs['usePlaceholder'] ?? '' ) ) {
			return $block_content;
		}

		// Check the DOM to see if an `<img>` with a `src` or an `<svg>` already exists.
		$dom    = DOM::create( $block_content );
		$figure = DOM::get_element( 'figure', $dom );
		$img    = DOM::get_element( 'img', $figure );
		$link   = DOM::get_element( 'a', $figure );
		$svg    = DOM::get_element( 'svg', $link ?? $figure );
		if ( $svg || $this->img_has_real_src( $img ) ) {
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
			DOM::set_link_target( $link, (string) ( $block['linkTarget'] ?? '' ), (string) ( $block['rel'] ?? '' ) );
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
		$width            = $attrs['width'] ?? null;
		$height           = $attrs['height'] ?? null;
		$radius           = $border['radius'] ?? null;

		// Equal width/height (common for circular avatars) must keep a 1:1 box.
		// Without this, .is-placeholder defaults to 16/9 and border-radius:100% becomes an oval.
		if ( ( ! $aspect_ratio || 'auto' === $aspect_ratio ) && $width && $height && $width === $height ) {
			$aspect_ratio = '1';
		}

		// Fully rounded corners imply a circle when no explicit aspect ratio is set.
		if ( ( ! $aspect_ratio || 'auto' === $aspect_ratio ) && $this->is_fully_rounded_radius( $radius ) ) {
			$aspect_ratio = '1';
		}

		$styles = [
			'width'                      => $width,
			'height'                     => $height,
			'border-width'               => $border['width'] ?? null,
			'border-style'               => $border['style'] ?? ( ( $border['width'] ?? null ) ? 'solid' : null ),
			'border-color'               => $border['color'] ?? null,
			'border-top-left-radius'     => is_array( $radius ) ? ( $radius['topLeft'] ?? null ) : null,
			'border-top-right-radius'    => is_array( $radius ) ? ( $radius['topRight'] ?? null ) : null,
			'border-bottom-left-radius'  => is_array( $radius ) ? ( $radius['bottomLeft'] ?? null ) : null,
			'border-bottom-right-radius' => is_array( $radius ) ? ( $radius['bottomRight'] ?? null ) : null,
			'position'                   => $style['position']['all'] ?? null,
			'top'                        => $style['top']['all'] ?? null,
			'right'                      => $style['right']['all'] ?? null,
			'bottom'                     => $style['bottom']['all'] ?? null,
			'left'                       => $style['left']['all'] ?? null,
			'z-index'                    => $style['zIndex']['all'] ?? null,
		];
		$styles = CSS::add_shorthand_property( $styles, 'margin', $spacing['margin'] ?? [] );
		$styles = CSS::add_shorthand_property( $styles, 'padding', $spacing['padding'] ?? [] );
		$styles = CSS::add_shorthand_property( $styles, 'border-radius', is_string( $radius ) ? $radius : [] );

		if ( $aspect_ratio && 'auto' !== $aspect_ratio ) {
			$styles['aspect-ratio'] = $aspect_ratio;
			// Let aspect-ratio define the box; keep any explicit width for sizing.
			if ( $width && $height && $width === $height ) {
				unset( $styles['height'] );
			}
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

	/**
	 * Whether a border-radius value describes a full circle/ellipse.
	 *
	 * @param mixed $radius Border radius attribute (string or corner map).
	 */
	private function is_fully_rounded_radius( $radius ): bool {
		if ( is_string( $radius ) ) {
			$value = trim( $radius );

			return '50%' === $value || '100%' === $value || '9999px' === $value || '99px' === $value;
		}

		if ( ! is_array( $radius ) ) {
			return false;
		}

		$corners = [
			$radius['topLeft'] ?? null,
			$radius['topRight'] ?? null,
			$radius['bottomLeft'] ?? null,
			$radius['bottomRight'] ?? null,
		];

		if ( in_array( null, $corners, true ) || in_array( '', $corners, true ) ) {
			return false;
		}

		foreach ( $corners as $corner ) {
			$value = trim( (string) $corner );
			if ( ! in_array( $value, [ '50%', '100%', '9999px', '99px' ], true ) ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Whether an image already has a src that should skip the placeholder.
	 *
	 * Empty mask hashes and blank SVG data URIs left by the editor are not
	 * real media — treat them as empty so the Aegis placeholder can render.
	 *
	 * @param DOMElement|null $img Image element, if any.
	 */
	private function img_has_real_src( ?DOMElement $img ): bool {
		if ( ! $img instanceof DOMElement ) {
			return false;
		}

		$src = trim( (string) $img->getAttribute( 'src' ) );

		if ( '' === $src || '#' === $src ) {
			return false;
		}

		if ( ! str_starts_with( $src, 'data:image/svg+xml' ) ) {
			return true;
		}

		$comma = strrpos( $src, ',' );
		$payload = false === $comma ? '' : substr( $src, $comma + 1 );

		return '' !== trim( urldecode( $payload ) );
	}
}
