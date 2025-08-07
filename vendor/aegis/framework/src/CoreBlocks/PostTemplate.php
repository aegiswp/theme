<?php
/**
 * Post Template Block
 *
 * Provides support for rendering post template blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling post template block content
 * - Integrates with utility classes for DOM and CSS
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function is_null;

// Implements the PostTemplate class to support post template block rendering.

/**
 * Handles the rendering of the core/post-template block.
 *
 * This class is responsible for applying advanced layout and spacing styles to
 * the Post Template block, which is the container for each item in a Query Loop.
 * It sets the block up as either a grid or a flex container based on the
 * block's layout settings in the editor.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class PostTemplate implements Renderable {

	/**
	 * Renders the post-template block with custom layout styles.
	 *
	 * This method is hooked into the `render_block_core/post-template` filter.
	 * If the layout is set to 'grid', it applies a `--columns` CSS variable.
	 * For other layouts with a specified `blockGap`, it converts the container
	 * to a flexbox and applies the gap.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/post-template
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs     = $block['attrs'] ?? [];
		$block_gap = $attrs['style']['spacing']['blockGap'] ?? null;
		$layout    = $attrs['layout']['type'] ?? null;
		$columns   = $attrs['layout']['columnCount'] ?? null;

		// If a column count is specified (typically for grid layouts),
		// apply it as a CSS custom property for the theme's CSS to use.
		if ( $columns ) {
			$dom   = DOM::create( $block_content );
			$first = DOM::get_element( '*', $dom );

			if ( $first ) {
				$first_styles              = CSS::string_to_array( $first->getAttribute( 'style' ) );
				$first_styles['--columns'] = $columns;
				$first->setAttribute( 'style', CSS::array_to_string( $first_styles ) );
				$block_content = $dom->saveHTML();
			}
		}

		// If a block gap is set and the layout is NOT grid (e.g., flex or default),
		// apply flexbox styles to make the gap work.
		if ( ! is_null( $block_gap ) && 'grid' !== $layout ) {
			$dom   = DOM::create( $block_content );
			$first = DOM::get_element( '*', $dom );

			if ( $first ) {
				$first_styles              = CSS::string_to_array( $first->getAttribute( 'style' ) );
				$first_styles['gap']       = CSS::format_custom_property( $block_gap );
				$first_styles['display']   = 'flex';
				$first_styles['flex-wrap'] = 'wrap';
				$first->setAttribute( 'style', CSS::array_to_string( $first_styles ) );
				$block_content = $dom->saveHTML();
			}
		}

		return $block_content;
	}
}
