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
 * @package    Aegis\Framework
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare( strict_types=1 );

namespace Aegis\Framework\BlockVariations;

use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\BlockSettings\Onclick;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Framework\ServiceProvider;
use Aegis\Icons\Icon;
use Aegis\Utilities\Str;
use DOMDocument;
use DOMElement;
use WP_Block;
use function __;
use function esc_attr;
use function explode;
use function implode;
use function is_array;
use function is_scalar;
use function rawurlencode;
use function register_block_style;
use function str_contains;
use function str_replace;
use function trim;

/**
 * Handles the "SVG" variation for the core/image block.
 *
 * Pasted markup is inlined as an `<svg>`. Mask mode (Aegis → Blocks → SVG → Mask)
 * uses the SVG as a CSS mask so it follows `currentColor`.
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
	 * Register the SVG style on core/image when the variation is implied on.
	 *
	 * @hook init
	 */
	public function register_style(): void {
		if ( ! ServiceProvider::is_block_enabled( 'svg' ) ) {
			return;
		}

		register_block_style(
			'core/image',
			array(
				'name'  => 'svg',
				'label' => __( 'SVG', 'aegis' ),
			)
		);
	}

	/**
	 * Renders the image block as a custom inline SVG.
	 *
	 * Saved `is-style-svg` blocks still inline on the front end when the variation
	 * is implied off (inserter hidden), so theme patterns keep working.
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

		if ( ! $svg_string || ! str_contains( $block_content, 'is-style-svg' ) ) {
			return $block_content;
		}

		$dom      = DOM::create( $block_content );
		$figure   = DOM::get_element( 'figure', $dom );
		$link     = DOM::get_element( 'a', $figure );
		$img      = DOM::get_element( 'img', $link ?? $figure );
		$svg      = DOM::get_element( 'svg', $link ?? $figure );
		$width    = $this->dimension( $attrs['width'] ?? $attrs['style']['width'] ?? '' );
		$height   = $this->dimension( $attrs['height'] ?? $attrs['style']['height'] ?? '' );
		$mask     = ServiceProvider::is_block_enabled( 'svg_mask' )
			&& (bool) ( $attrs['style']['maskSvg'] ?? false );
		$on_click = ServiceProvider::is_block_enabled( 'svg_onclick' )
			? $this->onclick->format_script( (string) ( $attrs['onclick'] ?? '' ), $block, $instance )
			: '';

		if ( $mask && $img instanceof DOMElement ) {
			return $this->render_mask( $img, $svg_string, $dom, $width, $height, $on_click );
		}

		if ( $on_click && ( $link ?? $figure ?? $img ) ) {
			( $link ?? $figure ?? $img )->setAttribute( 'onclick', $on_click );
			$block_content = $dom->saveHTML();
		}

		if ( $svg ) {
			return $block_content;
		}

		if ( $img && $img->parentNode ) {
			$img->parentNode->removeChild( $img );
		}

		$svg_dom     = DOM::create( $svg_string );
		$svg_element = DOM::get_element( 'svg', $svg_dom );
		if ( ! $svg_element ) {
			return $block_content;
		}

		$imported = DOM::node_to_element( $dom->importNode( $svg_element, true ) );

		if ( $width ) {
			$imported->setAttribute( 'width', $width );
		}
		if ( $height ) {
			$imported->setAttribute( 'height', $height );
		}

		if ( $link ) {
			$link->appendChild( $imported );
		} elseif ( $figure ) {
			$figure->appendChild( $imported );
		}

		return $dom->saveHTML();
	}

	/**
	 * Renders an SVG as a CSS mask on a `<span>` element.
	 *
	 * @since 1.0.0
	 *
	 * @param  DOMElement  $img        The original `<img>` element to be replaced.
	 * @param  string      $svg_string The raw SVG markup.
	 * @param  DOMDocument $dom        The main DOM document.
	 * @param  string      $width      The desired width.
	 * @param  string      $height     The desired height.
	 * @param  string      $on_click   Optional onclick handler.
	 *
	 * @return string The HTML for the new `<span>` element with the SVG mask.
	 */
	public function render_mask( DOMElement $img, string $svg_string, DOMDocument $dom, string $width, string $height, string $on_click = '' ): string {
		$span   = DOM::change_tag_name( 'span', $img );
		$styles = CSS::string_to_array( $span->getAttribute( 'style' ) );

		$encoded                      = rawurlencode( str_replace( '"', "'", trim( $svg_string ) ) );
		$mask_image                   = 'url("data:image/svg+xml;utf8,' . $encoded . '")';
		$styles['-webkit-mask-image'] = $mask_image;
		$styles['mask-image']         = $mask_image;

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

		if ( $alt = $span->getAttribute( 'alt' ) ) {
			$span->setAttribute( 'aria-label', esc_attr( $alt ) );
			$span->removeAttribute( 'alt' );
		}

		$classes   = explode( ' ', $span->getAttribute( 'class' ) );
		$classes[] = 'wp-block-image__svg';
		$span->setAttribute( 'class', implode( ' ', $classes ) );
		$span->setAttribute( 'role', 'img' );
		if ( $on_click ) {
			$span->setAttribute( 'onclick', $on_click );
		}
		$span->removeAttribute( 'style' );
		$span->setAttribute( 'style', CSS::array_to_string( $styles ) );
		$span->removeAttribute( 'src' );

		return $dom->saveHTML();
	}

	/**
	 * Normalize a width/height attribute that may be a string or `{ all: "80px" }`.
	 *
	 * @param mixed $value Block dimension attribute.
	 */
	private function dimension( mixed $value ): string {
		if ( is_array( $value ) ) {
			$value = $value['all'] ?? '';
		}

		if ( ! is_scalar( $value ) ) {
			return '';
		}

		return esc_attr( (string) $value );
	}
}
