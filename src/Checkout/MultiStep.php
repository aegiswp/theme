<?php
/**
 * Multi-Step Checkout
 *
 * Conditionally loads multi-step checkout JS/CSS only when
 * aegis-checkout-steps markup is detected in $template_html.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Checkout;

use function add_action;
use function file_exists;
use function file_get_contents;
use function get_template_directory;
use function get_template_directory_uri;
use function is_admin;
use function str_contains;
use function trim;
use function wp_add_inline_style;
use function wp_enqueue_script;
use function wp_localize_script;
use function wp_script_add_data;
use function esc_html__;

class MultiStep {

	/**
	 * Initialize hooks.
	 *
	 * @return void
	 */
	public function init(): void {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ], 11 );
	}

	/**
	 * Conditionally register and enqueue multi-step checkout assets.
	 *
	 * Only loads when aegis-checkout-steps markup is detected in $template_html.
	 *
	 * @return void
	 */
	public function enqueue_assets(): void {
		if ( is_admin() ) {
			return;
		}

		global $template_html;

		if ( empty( $template_html ) || ! str_contains( $template_html, 'aegis-checkout-steps' ) ) {
			return;
		}

		$base_dir = get_template_directory() . '/src/Checkout/';
		$base_uri = get_template_directory_uri() . '/src/Checkout/';

		$css_file = $base_dir . 'css/multi-step.css';

		if ( file_exists( $css_file ) ) {
			$css = trim( file_get_contents( $css_file ) );

			if ( $css ) {
				wp_add_inline_style( 'global-styles', $css );
			}
		}

		wp_enqueue_script(
			'aegis-checkout-multi-step',
			$base_uri . 'js/multi-step.js',
			[],
			'1.0.0',
			true
		);

		wp_script_add_data( 'aegis-checkout-multi-step', 'defer', true );

		wp_localize_script( 'aegis-checkout-multi-step', 'aegisCheckout', [
			'continueToPayment' => esc_html__( 'Continue to Payment →', 'aegis' ),
			'reviewOrder'       => esc_html__( 'Review Order →', 'aegis' ),
		] );
	}
}
