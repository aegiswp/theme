<?php
/**
 * Shortcode Block
 *
 * Provides support for rendering shortcode blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and cleaning up shortcode block content
 * - Integrates with utility classes for string manipulation and WordPress helpers
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

// Imports utility interfaces and functions for renderable blocks and string manipulation.
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function str_replace;

// Implements the Shortcode class to support shortcode block rendering.

/**
 * Handles the rendering of the core/shortcode block.
 *
 * This class uses two separate methods hooked into the same filter at different
 * priorities to first clean up the shortcode output and then ensure it is
 * executed.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Shortcode implements Renderable {

	/**
	 * Removes paragraph tags that WordPress often wraps around shortcode output.
	 *
	 * This method runs at a very early priority (1) to strip `<p>` tags from the
	 * block's content, preventing them from breaking layouts.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/shortcode 1
	 *
	 * @return string The block content with `<p>` tags removed.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		return str_replace( [ '<p>', '</p>' ], '', $block_content );
	}

	/**
	 * Ensures the shortcode is executed.
	 *
	 * This method runs at a late priority (11) to call `do_shortcode` on the
	 * block's content. This ensures that the shortcode is rendered after any
	 * other modifications (like the `<p>` tag stripping) have occurred.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $block_content The block content, potentially modified by other filters.
	 *
	 * @hook   render_block_core/shortcode 11
	 *
	 * @return string The rendered output of the shortcode.
	 */
	public function render_block_shortcode( string $block_content ): string {
		return do_shortcode( $block_content );
	}
}
