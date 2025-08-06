<?php
/**
 * Opacity Block Setting
 *
 * Provides support for applying opacity styles to blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for rendering custom opacity styles for block content
 * - Integrates with the Renderable interface for block output
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

// Imports utility classes and interfaces for DOM manipulation and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;

// Implements the Opacity class to support custom opacity styling for blocks.

/**
 * Handles the "Opacity" block setting.
 *
 * This class is intended to apply a CSS `opacity` style to any block that has
 * the `style.filter.opacity` attribute set.
 *
 * @todo As of the current version, the core logic of this class is commented
 *       out, so it does not actually apply any styles.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class Opacity implements Renderable {

	/**
	 * Renders the block with a custom opacity style.
	 *
	 * @todo The line that applies the opacity style is currently commented out,
	 *       making this method non-functional.
	 *
	 * This method is hooked into the generic `render_block` filter. It is
	 * intended to read an opacity value (e.g., 80), convert it to a decimal
	 * (0.8), and apply it as an inline `opacity` style to the block's wrapper.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block 12
	 *
	 * @return string The block content (currently unmodified).
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs   = $block['attrs'] ?? [];
		$opacity = $attrs['style']['filter']['opacity'] ?? '';

		if ( $opacity ) {
			$dom   = DOM::create( $block_content );
			$first = DOM::get_element( '*', $dom );

			if ( ! $first ) {
				return $block_content;
			}

			$styles = CSS::string_to_array( $first->getAttribute( 'style' ) );

			// The following line is the core logic, which is currently disabled.
			// $styles['opacity'] = $opacity / 100;

			$first->setAttribute( 'style', CSS::array_to_string( $styles ) );

			$block_content = $dom->saveHTML();
		}

		return $block_content;
	}

}
