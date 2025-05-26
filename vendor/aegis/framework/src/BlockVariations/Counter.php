<?php
/**
 * Counter.php
 *
 * Handles the counter block variation logic for the Aegis WordPress theme.
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

use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function esc_attr;
use function esc_html;
use function trim;

/**
 * Counter block variation.
 *
 * @since 1.0.0
 */
class Counter implements Renderable, Scriptable {

	/**
	 * Render counter block markup.
	 *
	 * @since 0.9.10
	 *
	 * @param string   $block_content Block html content.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/paragraph
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$counter = $block['attrs']['style']['counter'] ?? '';

		if ( ! $counter ) {
			return $block_content;
		}

		$dom = DOM::create( $block_content );
		$p   = DOM::get_element( 'p', $dom );

		if ( ! $p ) {
			return $block_content;
		}

		foreach ( $counter as $attribute => $value ) {
			$p->setAttribute( "data-$attribute", esc_attr( $value ) );
		}

		$p->textContent = esc_html( trim( $p->textContent ) );

		return $dom->saveHTML();
	}

	/**
	 * Conditionally add counter JS.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts The scripts instance.
	 *
	 * @return void
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_file( 'counter.js', [ 'is-style-counter' ] );
	}
}
