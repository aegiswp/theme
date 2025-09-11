<?php
/**
 * Svg Block Variation
 *
 * Provides support for rendering SVG content within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and manipulating SVG block content
 * - Integrates with utility classes for DOM and CSS
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, icon utilities, and renderable blocks.
use Aegis\Framework\BlockSettings\Onclick;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Icons\Icon;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Utilities\Str;
use DOMDocument;
use DOMElement;
use WP_Block;
use function esc_attr;
use function explode;
use function implode;
use function rawurlencode;
use function str_contains;
use function str_replace;
use function trim;

// Implements the Svg class to support SVG block rendering.

/**
 * Handles the "SVG" style variation for the core/image block.
 *
 * This class transforms an image block into a custom inline SVG. It has two
 * rendering modes: direct injection of the SVG markup, and a currently-disabled
 * mode that uses the SVG as a CSS mask for colorization.
 *
 * @package Aegis\Framework\BlockVariations
 * @since   1.0.0
 */
class Svg implements Renderable {

	/**
	 * The Onclick service instance.
	 *
	 * @var Onclick
	 */
	private Onclick $onclick;

	/**
	 * Svg constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param Onclick $onclick The Onclick service instance.
	 */
	public function __construct( Onclick $onclick ) {
		$this->onclick = $onclick;
	}

	/**
	 * Renders the image block as a custom inline SVG.
	 *
	 * This method is hooked into the `render_block_core/image` filter. If it
	 * finds the `is-style-svg` class and a `style.svgString` attribute, it
	 * replaces the content of the block with the provided SVG markup.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/image 9
	 *
	 * @return string The modified block content containing the SVG.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs      = $block['attrs'] ?? [];
		$svg_string = Icon::sanitize_svg( $attrs['style']['svgString'] ?? '' );

		// Only run if an SVG string is provided and the block has the correct style variation.
		if ( ! $svg_string || ! str_contains( $block_content, 'is-style-svg' ) ) {
			return $block_content;
		}

		$dom      = DOM::create( $block_content );
		$figure   = DOM::get_element( 'figure', $dom );
		$link     = DOM::get_element( 'a', $figure );
		$img      = DOM::get_element( 'img', $link ?? $figure );
		$svg      = DOM::get_element( 'svg', $link ?? $figure );
		$width    = esc_attr( $attrs['width'] ?? '' );
		$height   = esc_attr( $attrs['height'] ?? '' );
		$mask     = (bool) ( $attrs['style']['maskSvg'] ?? false );
		$on_click = $attrs['onclick'] ?? '';

		// The "mask" render path is currently disabled.
		if ( $mask ) {
			//return $this->render_mask( $img, $svg_string, $dom, $width, $height );
		}

		// Apply onclick attribute if it exists.
		if ( $on_click ) {
			( $link ?? $figure ?? $img )->setAttribute( 'onclick', $on_click );
			$block_content = $dom->saveHTML();
		}

		// If there is already an SVG, do not re-render.
		if ( $svg ) {
			return $block_content;
		}

		// Remove the original `<img>` tag to make way for the new SVG.
		if ( $img ) {
			$img->parentNode->removeChild( $img );
		}

		// Create a new SVG element from the provided string.
		$svg_dom     = DOM::create( $svg_string );
		$svg_element = DOM::get_element( 'svg', $svg_dom );
		if ( ! $svg_element ) {
			return $block_content;
		}

		// Import the new SVG into the main document.
		$imported = DOM::node_to_element( $dom->importNode( $svg_element, true ) );

		// Apply width and height attributes.
		if ( $width ) {
			$imported->setAttribute( 'width', $width );
		}
		if ( $height ) {
			$imported->setAttribute( 'height', $height );
		}

		// Append the new SVG to the link if it exists, otherwise to the figure.
		if ( $link ) {
			$link->appendChild( $imported );
		} else {
			$figure->appendChild( $imported );
		}

		return $dom->saveHTML();
	}

	/**
	 * Renders an SVG as a CSS mask on a `<span>` element.
	 *
	 * @todo This method is currently unused as the call to it is commented out.
	 *
	 * This method allows an SVG to be "colored" by the `background-color` of
	 * its parent element by using the SVG as a CSS mask.
	 *
	 * @since 1.0.0
	 *
	 * @param  DOMElement  $img        The original `<img>` element to be replaced.
	 * @param  string      $svg_string The raw SVG markup.
	 * @param  DOMDocument $dom        The main DOM document.
	 * @param  string      $width      The desired width.
	 * @param  string      $height     The desired height.
	 *
	 * @return string The HTML for the new `<span>` element with the SVG mask.
	 */
	public function render_mask( DOMElement $img, string $svg_string, DOMDocument $dom, string $width, string $height ): string {
		$span   = DOM::change_tag_name( 'span', $img );
		$styles = CSS::string_to_array( $span->getAttribute( 'style' ) );

		// URL-encode the SVG and set it as the mask image.
		$encoded                      = rawurlencode( str_replace( '"', "'", trim( $svg_string ) ) );
		$styles['-webkit-mask-image'] = 'url("data:image/svg+xml;utf8,' . $encoded . '")';

		// Apply width and height.
		if ( $width ) {
			$unit            = Str::contains_any( $width, 'px', 'em', 'rem', 'vh', 'vw', '%' ) ? '' : 'px';
			$styles['width'] = $width . $unit;
			$span->removeAttribute( 'width' );
		}
		if ( $height ) {
			$unit             = Str::contains_any( $height, 'px', 'em', 'rem', 'vh', 'vw', '%' ) ? '' : 'px';
			$styles['height'] = $height . $unit;
			$span->removeAttribute( 'height' );
		}

		// Transfer alt text to an aria-label for accessibility.
		if ( $alt = $img->getAttribute( 'alt' ) ) {
			$span->setAttribute( 'aria-label', esc_attr( $alt ) );
			$span->removeAttribute( 'alt' );
		}

		// Clean up and set final attributes.
		$classes   = explode( ' ', $span->getAttribute( 'class' ) );
		$classes[] = 'wp-block-image__svg';
		$span->setAttribute( 'class', implode( ' ', $classes ) );
		$span->setAttribute( 'role', 'img' );
		$span->removeAttribute( 'style' );
		$span->setAttribute( 'style', CSS::array_to_string( $styles ) );
		$span->removeAttribute( 'src' );

		return $dom->saveHTML();
	}

}
