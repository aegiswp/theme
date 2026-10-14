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
use function array_diff;
use function array_filter;
use function array_values;
use function explode;
use function implode;
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
	 * Runs after CoreBlocks\Search so a leftover search icon can be removed.
	 * When Newsletter is off, `is-style-newsletter` is stripped so CSS does not
	 * hide the search icon on an ordinary search form.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/search 11
	 *
	 * @return string The modified block content, now structured as a newsletter form.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs = $block['attrs'] ?? [];

		if ( ! $this->is_newsletter_block( $attrs, $block_content ) ) {
			return $block_content;
		}

		if ( ! ServiceProvider::is_block_enabled( 'newsletter' ) ) {
			return $this->strip_newsletter_style( $block_content );
		}

		$dom   = DOM::create( $block_content );
		$form  = DOM::get_element( 'form', $dom );
		$div   = DOM::get_element( 'div', $form );
		$input = DOM::get_element( 'input', ( $div ?? $form ) );

		if ( ! $form || ! $input ) {
			return $block_content;
		}

		foreach ( DOM::get_elements_by_class_name( 'wp-block-search__icon', $dom ) as $icon ) {
			if ( $icon->parentNode ) {
				$icon->parentNode->removeChild( $icon );
			}
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

		$is_signup = $this->is_signup_field( $attrs );

		if ( $is_signup ) {
			$form->setAttribute( 'data-aegis-newsletter-signup', 'true' );
			$input->setAttribute( 'required', 'required' );
		} else {
			$input->removeAttribute( 'required' );
		}

		if ( $is_signup && ServiceProvider::is_block_enabled( 'newsletter_email_validation' ) ) {
			$input->setAttribute( 'type', 'email' );
			$input->setAttribute( 'autocomplete', 'email' );
			$input->setAttribute( 'inputmode', 'email' );
		} else {
			$input->setAttribute( 'type', 'text' );
		}

		if ( $is_signup && ServiceProvider::is_block_enabled( 'newsletter_success_message' ) ) {
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
	 * Whether this Search block uses the Newsletter style.
	 *
	 * @param array<string, mixed> $attrs          Block attributes.
	 * @param string               $block_content Rendered HTML.
	 */
	private function is_newsletter_block( array $attrs, string $block_content ): bool {
		$class_name = (string) ( $attrs['className'] ?? '' );

		return str_contains( $class_name, 'is-style-newsletter' )
			|| str_contains( $block_content, 'is-style-newsletter' );
	}

	/**
	 * Remove the Newsletter style class so leftover CSS does not hide search UI.
	 */
	private function strip_newsletter_style( string $block_content ): string {
		$dom  = DOM::create( $block_content );
		$form = DOM::get_element( 'form', $dom );

		if ( ! $form ) {
			return $block_content;
		}

		$classes = array_values(
			array_diff(
				array_filter( explode( ' ', $form->getAttribute( 'class' ) ) ),
				[ 'is-style-newsletter' ]
			)
		);

		if ( $classes ) {
			$form->setAttribute( 'class', implode( ' ', $classes ) );
		} else {
			$form->removeAttribute( 'class' );
		}

		return $dom->saveHTML();
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
	 * Whether this block is a signup field rather than a decorative input skin.
	 *
	 * Uses the saved placeholder (not the forced default) so Custom Placeholder
	 * being off does not turn name/phone fields into email signups.
	 *
	 * @param array<string, mixed> $attrs Block attributes.
	 */
	private function is_signup_field( array $attrs ): bool {
		$position = $attrs['buttonPosition'] ?? 'button-outside';

		if ( $position !== 'no-button' ) {
			return true;
		}

		$normalized = strtolower( trim( (string) ( $attrs['placeholder'] ?? '' ) ) );

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
