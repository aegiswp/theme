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

// Enforces strict type checking for all code in this file, ensuring type safety for newsletter block variation.
declare( strict_types=1 );

// Declares the namespace for the newsletter block variation.
namespace Aegis\Framework\BlockVariations;

// Imports classes, interfaces, and functions used by the newsletter block variation.
use Aegis\Dom\DOM;
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Framework\ServiceProvider;
use DOMDocument;
use DOMElement;
use WP_Block;
use function __;
use function register_block_style;
use function str_contains;
use function strtolower;
use function trim;


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
class Newsletter implements Renderable, Scriptable {

	/**
	 * Register the Newsletter style on core/search for the editor and PHP registry.
	 *
	 * @hook init
	 */
	public function register_style(): void {
		if ( ! ServiceProvider::is_block_enabled( 'newsletter' ) ) {
			return;
		}

		register_block_style(
			'core/search',
			array(
				'name'  => 'newsletter',
				'label' => __( 'Newsletter', 'aegis' ),
			)
		);
	}

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
		if ( ! ServiceProvider::is_block_enabled( 'newsletter' ) ) {
			return $block_content;
		}

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

		$input->setAttribute( 'name', 'newsletter' );

		$placeholder = $this->resolve_placeholder( $attrs );
		$input->setAttribute( 'placeholder', $placeholder );

		if ( empty( $attrs['showLabel'] ) ) {
			$input->setAttribute( 'aria-label', $placeholder );
		}

		if ( $this->should_validate_email( $placeholder ) ) {
			$input->setAttribute( 'type', 'email' );
			$input->setAttribute( 'autocomplete', 'email' );
			$input->setAttribute( 'inputmode', 'email' );
			$input->setAttribute( 'required', 'required' );
		} else {
			$input->setAttribute( 'type', 'text' );
			$input->removeAttribute( 'required' );
		}

		if ( ServiceProvider::is_block_enabled( 'newsletter_success_message' ) ) {
			$this->append_success_message( $dom, $form );
		}

		return $dom->saveHTML();
	}

	/**
	 * Conditionally enqueues the newsletter submit handler.
	 *
	 * Loaded only when a newsletter-styled search block is on the page.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts The Scripts service instance.
	 */
	public function scripts( Scripts $scripts ): void {
		if ( ! ServiceProvider::is_block_enabled( 'newsletter' ) ) {
			return;
		}

		$scripts->add_file( 'newsletter.js', [ 'is-style-newsletter' ] );
	}

	/**
	 * Resolve the email input placeholder from extras and block attributes.
	 *
	 * @param array<string, mixed> $attrs Block attributes.
	 */
	private function resolve_placeholder( array $attrs ): string {
		$default = __( 'Email address', 'aegis' );
		$custom  = trim( (string) ( $attrs['placeholder'] ?? '' ) );

		if ( ServiceProvider::is_block_enabled( 'newsletter_placeholder' ) && $custom !== '' ) {
			return $custom;
		}

		return $default;
	}

	/**
	 * Whether HTML5 email validation should apply to this field.
	 *
	 * Decorative newsletter-styled inputs (name, phone) keep type=text.
	 */
	private function should_validate_email( string $placeholder ): bool {
		if ( ! ServiceProvider::is_block_enabled( 'newsletter_email_validation' ) ) {
			return false;
		}

		$normalized = strtolower( trim( $placeholder ) );

		return $normalized === '' || str_contains( $normalized, 'email' );
	}

	/**
	 * Append a hidden status node used by the frontend script after signup.
	 */
	private function append_success_message( DOMDocument $dom, DOMElement $form ): void {
		$message = __( 'Thanks for subscribing.', 'aegis' );

		$form->setAttribute( 'data-aegis-newsletter-success', 'true' );
		$form->setAttribute( 'data-aegis-newsletter-success-text', $message );

		$status = DOM::create_element( 'p', $dom );

		if ( ! $status ) {
			return;
		}

		$status->setAttribute( 'class', 'aegis-newsletter__success' );
		$status->setAttribute( 'role', 'status' );
		$status->setAttribute( 'hidden', 'hidden' );

		$form->appendChild( $status );
	}
}
