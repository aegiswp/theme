<?php
/**
 * Backdrop Blur Block Setting
 *
 * Provides support for backdrop blur CSS effects on blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the rendering of custom backdrop blur styles for block content
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
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function str_replace;

// Implements the BackdropBlur class to support custom backdrop blur styling.

/**
 * Handles the "Backdrop Blur" block setting.
 *
 * This class provides a generic way to apply a `backdrop-filter: blur()` CSS
 * effect to any block that has the appropriate attributes set. It runs on all
 * blocks except for `core/navigation`, which has its own filter handling.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class BackdropBlur implements Renderable {

	/**
	 * Renders the block with a backdrop-filter blur effect.
	 *
	 * This method is hooked into the generic `render_block` filter. If it finds
	 * the `style.filter.blur` and `style.filter.backdrop` attributes, it applies
	 * the `backdrop-filter` CSS property to the block's main wrapper element.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block 12 2
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$blur = (string) ( $block['attrs']['style']['filter']['blur'] ?? '' );
		$use_backdrop = (string) ( $block['attrs']['style']['filter']['backdrop'] ?? '' );

		// Only proceed if both blur and backdrop attributes are set.
		if ( ! $blur || ! $use_backdrop ) {
			return $block_content;
		}

		// The core/navigation block has its own, more complex filter handling, so we exclude it here.
		if ( 'core/navigation' === ( $block['blockName'] ?? '' ) ) {
			return $block_content;
		}

		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom );

		if ( ! $first ) {
			return $block_content;
		}

		$styles = CSS::string_to_array( $first->getAttribute( 'style' ) );

		// Construct the blur value and apply it with the necessary vendor prefix.
		$backdrop_blur = 'blur(' . $blur . 'px)';
		unset( $styles['backdrop-filter'], $styles['-webkit-backdrop-filter'] );
		$styles['backdrop-filter']         = $backdrop_blur;
		$styles['-webkit-backdrop-filter'] = $backdrop_blur;

		// This seems intended to remove an opacity filter if it was also applied,
		// as it might conflict with the backdrop-filter effect.
		$opacity = (int) ( $block['attrs']['style']['filter']['opacity'] ?? '' );
		if ( $opacity ) {
			if ( $existing_filter = $styles['filter'] ?? '' ) {
				$styles['filter'] = str_replace(
					' opacity(' . $opacity . '%)',
					'',
					$existing_filter
				);
			}
		}

		$first->setAttribute( 'style', CSS::array_to_string( $styles ) );

		return $dom->saveHTML();
	}
	
}
