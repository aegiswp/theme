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
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for template part block.
declare( strict_types=1 );

// Declares the namespace for the template part block.
namespace Aegis\Framework\CoreBlocks;

// Imports classes, interfaces, and functions used by the template part block.
use Aegis\Framework\Traits\InjectionPoints;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function esc_attr;

class TemplatePart implements Renderable {

	use InjectionPoints;

	/**
	 * Modifies the template part block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/template-part
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		// Parse block HTML and locate the root element.
		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom );

		if ( ! $first ) {
			return $block_content;
		}

		// Apply background and text colors from block attributes.
		$attrs  = $block['attrs'] ?? [];
		$styles = CSS::string_to_array( $first->getAttribute( 'style' ) );
		$color  = $attrs['style']['color'] ?? [];

		if ( isset( $color['background'] ) ) {
			$styles['background'] = esc_attr( $color['background'] );
		}

		if ( isset( $attrs['backgroundColor'] ) ) {
			$styles['background'] = 'var(--wp--preset--color--' . esc_attr( $attrs['backgroundColor'] ) . ')';
		}

		if ( isset( $color['gradient'] ) ) {
			$styles['background'] = esc_attr( $color['gradient'] );
		}

		if ( isset( $attrs['gradient'] ) ) {
			$styles['background'] = 'var(--wp--preset--gradient--' . esc_attr( $attrs['gradient'] ) . ')';
		}

		if ( isset( $color['text'] ) ) {
			$styles['color'] = esc_attr( $color['text'] );
		}

		if ( isset( $attrs['textColor'] ) ) {
			$styles['color'] = 'var(--wp--preset--color--' . esc_attr( $attrs['textColor'] ) . ')';
		}

		$styles = CSS::array_to_string( $styles );

		if ( $styles ) {
			$first->setAttribute( 'style', $styles );
		} else {
			$first->removeAttribute( 'style' );
		}

		// Set landmark roles based on template part slug.
		if ( $block['attrs']['slug'] === 'header' ) {
			$first->setAttribute( 'role', 'banner' );
		}

		if ( $block['attrs']['slug'] === 'main' ) {
			$first->setAttribute( 'role', 'main' );
		}

		if ( $block['attrs']['slug'] === 'footer' ) {
			$first->setAttribute( 'role', 'contentinfo' );
		}

		$output = $dom->saveHTML();
		$slug   = (string) ( $block['attrs']['slug'] ?? '' );

		if ( $slug !== '' ) {
			return $this->wrap_with_injection_hooks(
				"aegis_before_{$slug}",
				"aegis_after_{$slug}",
				$output
			);
		}

		return $output;
	}
}
