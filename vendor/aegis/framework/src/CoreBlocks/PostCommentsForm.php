<?php
/**
 * PostCommentsForm.php
 *
 * Handles the post comments form core block logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\CoreBlocks
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\CoreBlocks;

use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function apply_filters;
use function esc_attr;

/**
 * PostCommentsForm class.
 *
 * @since 1.0.0
 */
class PostCommentsForm implements Renderable {

	/**
	 * Renders the Post Comments Form block.
	 *
	 * @param string   $block_content The block content.
	 * @param array    $block         The block.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @hook render_block_core/post-comments-form
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom = DOM::create( $block_content );
		$div = DOM::get_element( 'div', $dom );
		$h3  = DOM::get_element( 'h3', $div );

		if ( ! $h3 ) {
			return $block_content;
		}

		DOM::change_tag_name(
			esc_attr( apply_filters( 'aegis_comments_form_title_tag', 'h4' ) ),
			$h3
		);

		return $dom->saveHTML();
	}

	/**
	 * Registers the Post Comments Form block.
	 *
	 * @param array  $args       The block arguments.
	 * @param string $block_type The block handle.
	 *
	 * @hook register_block_type_args
	 *
	 * @return array
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
