<?php
/**
 * Newsletter.php
 *
 * Handles the newsletter block variation logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\BlockVariations
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\BlockVariations;

use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function str_contains;

/**
 * Newsletter block variation.
 *
 * @since 1.0.0
 */
class Newsletter implements Renderable {

	/**
	 * Render newsletter block variation.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block content.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/search
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs      = $block['attrs'] ?? [];
		$class_name = $attrs['className'] ?? '';

		if ( ! str_contains( $class_name, 'is-style-newsletter' ) ) {
			return $block_content;
		}

		$dom   = DOM::create( $block_content );
		$form  = DOM::get_element( 'form', $dom );
		$div   = DOM::get_element( 'div', $form );
		$input = DOM::get_element( 'input', ( $div ?? $form ) );

		$form->removeAttribute( 'action' );
		$form->removeAttribute( 'method' );
		$form->setAttribute( 'onsubmit', 'event.preventDefault();' );
		$form->removeAttribute( 'role' );

		$input->setAttribute( 'type', 'text' );
		$input->setAttribute( 'name', 'newsletter' );

		return $dom->saveHTML();
	}

}
