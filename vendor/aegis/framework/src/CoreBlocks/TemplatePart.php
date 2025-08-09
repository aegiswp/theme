<?php
/**
 * Template Part Block
 *
 * Provides support for rendering template part blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and managing template part block content
 * - Integrates with utility classes for DOM, CSS, and WordPress helpers
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, renderable blocks, and WordPress helpers.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function esc_attr;

// Implements the TemplatePart class to support template part block rendering.

/**
 * Handles the rendering of the core/template-part block.
 *
 * This class enhances template parts by applying custom color and gradient
 * styles, and by adding appropriate ARIA roles for landmark regions like
 * headers and footers to improve accessibility.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class TemplatePart implements Renderable {

	/**
	 * Renders the template-part block with custom styles and ARIA roles.
	 *
	 * This method is hooked into the `render_block_core/template-part` filter.
	 * It applies background colors, gradients, and text colors from block
	 * attributes, and adds `role` attributes for `header`, `main`, and `footer`
	 * template parts.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/template-part
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom );

		if ( ! $first ) {
			return $block_content;
		}

		$attrs  = $block['attrs'] ?? [];
		$styles = CSS::string_to_array( $first->getAttribute( 'style' ) );
		$color  = $attrs['style']['color'] ?? [];

		// --- Color and Gradient Application ---
		// Apply background color from either a custom value or a theme preset.
		if ( isset( $color['background'] ) ) {
			$styles['background'] = esc_attr( $color['background'] );
		}
		if ( isset( $attrs['backgroundColor'] ) ) {
			$styles['background'] = 'var(--wp--preset--color--' . esc_attr( $attrs['backgroundColor'] ) . ')';
		}

		// Apply background gradient from either a custom value or a theme preset.
		if ( isset( $color['gradient'] ) ) {
			$styles['background'] = esc_attr( $color['gradient'] );
		}
		if ( isset( $attrs['gradient'] ) ) {
			$styles['background'] = 'var(--wp--preset--gradient--' . esc_attr( $attrs['gradient'] ) . ')';
		}

		// Apply text color from either a custom value or a theme preset.
		if ( isset( $color['text'] ) ) {
			$styles['color'] = esc_attr( $color['text'] );
		}
		if ( isset( $attrs['textColor'] ) ) {
			$styles['color'] = 'var(--wp--preset--color--' . esc_attr( $attrs['textColor'] ) . ')';
		}

		$styles_string = CSS::array_to_string( $styles );
		if ( $styles_string ) {
			$first->setAttribute( 'style', $styles_string );
		} else {
			$first->removeAttribute( 'style' );
		}

		// --- ARIA Role Application ---
		// Add landmark roles for better accessibility based on the template part's slug.
		$slug = $attrs['slug'] ?? '';
		if ( 'header' === $slug ) {
			$first->setAttribute( 'role', 'banner' );
		}
		if ( 'main' === $slug ) {
			$first->setAttribute( 'role', 'main' );
		}
		if ( 'footer' === $slug ) {
			$first->setAttribute( 'role', 'contentinfo' );
		}

		return $dom->saveHTML();
	}
}
