<?php
/**
 * Multi-Step Checkout
 *
 * Registers and loads multi-step checkout JS/CSS using WordPress asset system
 * when checkout functionality is detected on the page.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Checkout;

use Aegis\Core\AssetManager;

use function add_action;
use function is_admin;
use function is_checkout;
use function wp_localize_script;
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
	 * Conditionally enqueue multi-step checkout assets.
	 *
	 * Uses WordPress conditional functions and block detection for optimal loading.
	 * Localization is done here (after enqueue) to guarantee the script is registered.
	 *
	 * @return void
	 */
	public function enqueue_assets(): void {
		if ( is_admin() ) {
			return;
		}

		// Also load on WooCommerce checkout pages (function-based detection)
		if ( function_exists( 'is_checkout' ) && is_checkout() ) {
			AssetManager::enqueue_style( 'aegis-checkout-multi-step' );
			AssetManager::enqueue_script( 'aegis-checkout-multi-step' );

			wp_localize_script( 'aegis-checkout-multi-step', 'aegisCheckout', [
				'continueToPayment' => esc_html__( 'Continue to Payment →', 'aegis' ),
				'reviewOrder'       => esc_html__( 'Review Order →', 'aegis' ),
			] );
		}
	}
}
