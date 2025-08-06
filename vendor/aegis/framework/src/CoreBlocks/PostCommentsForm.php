<?php
/**
 * Post Comments Form Block
 *
 * Provides support for rendering post comments form blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling post comments form block content
 * - Integrates with utility classes for DOM manipulation
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

// Imports utility classes and interfaces for DOM manipulation and renderable blocks.
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function apply_filters;
use function esc_attr;

// Implements the PostCommentsForm class to support post comments form block rendering.

/**
 * Handles customizations for the core/post-comments-form and core/comments blocks.
 *
 * This class modifies the heading level of the comments form title and adjusts
 * the block registration arguments for the parent `core/comments` block to ensure
 * it has the necessary context to function correctly.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class PostCommentsForm implements Renderable {

	/**
	 * Renders the Post Comments Form block with a modified title tag.
	 *
	 * By default, WordPress uses an `<h3>` for the "Leave a Reply" title. This
	 * method changes it to an `<h4>` by default, and allows developers to
	 * override this tag via the `aegis_comments_form_title_tag` filter.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/post-comments-form
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom = DOM::create( $block_content );
		$div = DOM::get_element( 'div', $dom );
		$h3  = DOM::get_element( 'h3', $div );

		// If the default <h3> title isn't found, do nothing.
		if ( ! $h3 ) {
			return $block_content;
		}

		// Change the tag name, allowing it to be filtered.
		DOM::change_tag_name(
			esc_attr( apply_filters( 'aegis_comments_form_title_tag', 'h4' ) ),
			$h3
		);

		return $dom->saveHTML();
	}

	/**
	 * Modifies the registration arguments for the core/comments block.
	 *
	 * This method hooks into `register_block_type_args` to ensure that the
	 * `core/comments` block (the parent of the comments form) makes the `postId`
	 * available in its context. This is crucial for ensuring the block and its
	 * children can function correctly when used in templates or outside the
	 * main post loop.
	 *
	 * @since 1.0.0
	 *
	 * @param  array  $args       The original block registration arguments.
	 * @param  string $block_type The handle of the block being registered.
	 *
	 * @hook   register_block_type_args
	 *
	 * @return array The modified block registration arguments.
	 */
	public function register_comments_args( array $args, string $block_type ): array {
		if ( 'core/comments' === $block_type ) {
			$args['available_context'] = [
				'postId' => '',
			];
		}

		return $args;
	}
}
