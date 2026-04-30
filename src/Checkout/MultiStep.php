<?php
/**
 * WooCommerce multi-step checkout (front-end assets)
 *
 * Registers scripts and styles through the framework `AssetManager` when the main
 * checkout template is rendering. Strings are passed to JS via `wp_localize_script`.
 *
 * @package Aegis
 * @since 1.0.0
 * @link https://github.com/aegiswp/theme
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
	 * Enqueues when WooCommerce is available and the main checkout template is
	 * being rendered (`is_checkout()`), so assets are not loaded site-wide.
	 * Localization runs here so the handle is registered before `wp_localize_script`.
	 *
	 * @return void
	 */
	public function enqueue_assets(): void {
		if ( is_admin() ) {
			return;
		}

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
