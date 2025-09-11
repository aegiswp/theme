<?php
/**
 * Transform Block Setting
 *
 * Provides support for applying CSS transform styles to blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for rendering custom transform styles for block content
 * - Integrates with the Renderable interface for block output
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for block settings.
declare( strict_types=1 );

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports utility classes and interfaces for DOM manipulation and renderable blocks.
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function is_array;
use function trim;

// Implements the Transform class to support custom transform styling for blocks.

/**
 * Handles the "Transform" block setting.
 *
 * This class provides a generic way to apply CSS transforms to any block. It
 * works by adding a `has-transform` class and then converting `transform` and
 * `transformHover` attributes into CSS custom properties that the theme's main
 * stylesheet can use to apply the actual `transform`.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class Transform implements Renderable {

	/**
	 * A map of CSS transform functions to their required units.
	 *
	 * @var   array
	 * @since 1.0.0
	 */
	private const UNITS = [
		'rotate'     => 'deg',
		'rotateX'    => 'deg',
		'rotateY'    => 'deg',
		'scale'      => '',
		'scaleX'     => '',
		'scaleY'     => '',
		'skew'       => 'deg',
		'skewX'      => 'deg',
		'skewY'      => 'deg',
		'translateX' => '',
		'translateY' => '',
		'translateZ' => '',
	];

	/**
	 * Renders the block with custom transform CSS variables.
	 *
	 * This method is hooked into the generic `render_block` filter. If it finds
	 * `transform` or `transformHover` attributes, it iterates through them,
	 * constructs a valid CSS `transform` string, and applies it as a
	 * `--transform` or `--transform-hover` CSS custom property.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs           = $block['attrs'] ?? [];
		$transform       = $attrs['style']['transform'] ?? null;
		$transform_hover = $attrs['style']['transformHover'] ?? null;

		// If there are no transform settings, do nothing.
		if ( ! $transform && ! $transform_hover ) {
			return $block_content;
		}

		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom );
		if ( ! $first ) {
			return $block_content;
		}

		// Add a helper class to the block to activate the transform styles.
		$classes   = DOM::get_classes( $first );
		$classes[] = 'has-transform';
		DOM::add_classes( $first, $classes );

		$styles = DOM::get_styles( $first );

		// Build the --transform CSS variable from the array of transform functions.
		if ( is_array( $transform ) ) {
			$transform_value = '';
			foreach ( $transform as $key => $value ) {
				$unit = self::UNITS[ $key ] ?? '';
				$transform_value .= "{$key}({$value}{$unit}) ";
			}
			$styles['--transform'] = trim( $transform_value );
		}

		// Build the --transform-hover CSS variable.
		if ( is_array( $transform_hover ) ) {
			$transform_hover_value = '';
			foreach ( $transform_hover as $key => $value ) {
				$unit = self::UNITS[ $key ] ?? '';
				$transform_hover_value .= "{$key}({$value}{$unit}) ";
			}
			$styles['--transform-hover'] = trim( $transform_hover_value );
		}

		DOM::add_styles( $first, $styles );

		return $dom->saveHTML();
	}

}
