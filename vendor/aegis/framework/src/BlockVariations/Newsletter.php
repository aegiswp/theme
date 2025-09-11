<?php
/**
 * Newsletter Block Variation
 *
 * Provides support for rendering newsletter layout blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling newsletter block content
 * - Integrates with the Renderable interface for block output
 *
 * @package    Aegis\Framework\BlockVariations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for blocks variations.
declare( strict_types=1 );

// Declares the namespace for block variations within the Aegis Framework.
namespace Aegis\Framework\BlockVariations;

// Imports utility classes and interfaces for DOM manipulation and renderable blocks.
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function str_contains;

// Implements the Newsletter class to support newsletter block rendering.

/**
 * Handles the "Newsletter" style variation for the core/search block.
 *
 * This class transforms a standard `core/search` block into a newsletter signup
 * form. It modifies the form and input elements to make them suitable for
 * a JavaScript-based newsletter submission handler.
 *
 * @package Aegis\Framework\BlockVariations
 * @since   1.0.0
 */
class Newsletter implements Renderable {

	/**
	 * Renders the search block as a newsletter signup form.
	 *
	 * This method is hooked into the `render_block_core/search` filter. If the
	 * block has the `is-style-newsletter` class, it removes the form's default
	 * submission behavior and changes the input type and name to prepare it
	 * for a custom newsletter submission script.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/search
	 *
	 * @return string The modified block content, now structured as a newsletter form.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs      = $block['attrs'] ?? [];
		$class_name = $attrs['className'] ?? '';

		// Only run on blocks with the "newsletter" style variation.
		if ( ! str_contains( $class_name, 'is-style-newsletter' ) ) {
			return $block_content;
		}

		$dom   = DOM::create( $block_content );
		$form  = DOM::get_element( 'form', $dom );
		$div   = DOM::get_element( 'div', $form );
		$input = DOM::get_element( 'input', ( $div ?? $form ) );

		if ( ! $form || ! $input ) {
			return $block_content;
		}

		// --- Repurpose the form for JavaScript handling ---
		// Remove standard form attributes.
		$form->removeAttribute( 'action' );
		$form->removeAttribute( 'method' );
		$form->removeAttribute( 'role' );

		// Prevent the form from submitting via a page reload.
		$form->setAttribute( 'onsubmit', 'event.preventDefault();' );

		// Change the input to a standard text field named "newsletter".
		$input->setAttribute( 'type', 'text' );
		$input->setAttribute( 'name', 'newsletter' );

		return $dom->saveHTML();
	}

}
