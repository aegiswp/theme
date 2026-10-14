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
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use WP_HTML_Tag_Processor;
use function esc_attr;
use function str_contains;

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
		unset( $instance );

		$processor = new WP_HTML_Tag_Processor( $block_content );
		$found     = false;

		while ( $processor->next_tag() ) {
			$class = (string) $processor->get_attribute( 'class' );

			if ( str_contains( $class, 'skip-link' ) ) {
				continue;
			}

			$found = true;
			break;
		}

		if ( ! $found ) {
			return $block_content;
		}

		$attrs  = $block['attrs'] ?? [];
		$styles = CSS::string_to_array( (string) $processor->get_attribute( 'style' ) );
		$color  = $attrs['style']['color'] ?? [];

		if ( isset( $color['background'] ) ) {
			$styles['background'] = esc_attr( (string) $color['background'] );
		}

		if ( isset( $attrs['backgroundColor'] ) ) {
			$styles['background'] = 'var(--wp--preset--color--' . esc_attr( (string) $attrs['backgroundColor'] ) . ')';
		}

		if ( isset( $color['gradient'] ) ) {
			$styles['background'] = esc_attr( (string) $color['gradient'] );
		}

		if ( isset( $attrs['gradient'] ) ) {
			$styles['background'] = 'var(--wp--preset--gradient--' . esc_attr( (string) $attrs['gradient'] ) . ')';
		}

		if ( isset( $color['text'] ) ) {
			$styles['color'] = esc_attr( (string) $color['text'] );
		}

		if ( isset( $attrs['textColor'] ) ) {
			$styles['color'] = 'var(--wp--preset--color--' . esc_attr( (string) $attrs['textColor'] ) . ')';
		}

		$style_string = CSS::array_to_string( $styles );

		if ( $style_string !== '' ) {
			$processor->set_attribute( 'style', $style_string );
		} else {
			$processor->remove_attribute( 'style' );
		}

		$slug = (string) ( $attrs['slug'] ?? '' );

		if ( $slug === 'header' ) {
			$processor->set_attribute( 'role', 'banner' );
		}

		if ( $slug === 'main' ) {
			$processor->set_attribute( 'role', 'main' );
		}

		if ( $slug === 'footer' ) {
			$processor->set_attribute( 'role', 'contentinfo' );
		}

		$output = $processor->get_updated_html();

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
