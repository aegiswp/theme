<?php
/**
 * Counter Block Variation
 *
 * Provides support for rendering counter blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling counter block content
 * - Integrates with the Renderable and Scriptable interfaces for block output
 *
 * @package    Aegis\Framework\BlockVariations
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for block variations.
declare( strict_types=1 );

// Declares the namespace for block variations within the Aegis Framework.
namespace Aegis\Framework\BlockVariations;

// Imports utility classes and interfaces for asset management, DOM manipulation, and renderable blocks.
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function esc_attr;
use function esc_html;
use function trim;

// Implements the Counter class to support counter block rendering and scripting.

/**
 * Handles the "Counter" style variation for the core/paragraph block.
 *
 * This class transforms a simple paragraph block into an animated number counter.
 * It works by adding `data-*` attributes to the paragraph's HTML, which are then
 * read and animated by a corresponding JavaScript file.
 *
 * @package Aegis\Framework\BlockVariations
 * @since   1.0.0
 */
class Counter implements Renderable, Scriptable {

	/**
	 * Renders the paragraph block with data attributes for the counter animation.
	 *
	 * This method is hooked into the `render_block_core/paragraph` filter. If it
	 * finds custom `style.counter` attributes, it transfers them to the `<p>`
	 * element as `data-*` attributes (e.g., `data-start`, `data-end`) for the
	 * JavaScript to consume.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/paragraph
	 *
	 * @return string The modified block content with data attributes.
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

		// Loop through the counter settings and apply them as data attributes.
		foreach ( $counter as $attribute => $value ) {
			$p->setAttribute( "data-$attribute", esc_attr( $value ) );
		}

		// Ensure the text content is trimmed and properly escaped.
		$p->textContent = esc_html( trim( $p->textContent ) );

		return $dom->saveHTML();
	}

	/**
	 * Conditionally enqueues the JavaScript for the counter animation.
	 *
	 * This script is only loaded if a block with the `is-style-counter` class
	 * exists on the page. The script is responsible for reading the `data-*`
	 * attributes and animating the number.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts The Scripts service instance.
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_file( 'counter.js', [ 'is-style-counter' ] );
	}
}
