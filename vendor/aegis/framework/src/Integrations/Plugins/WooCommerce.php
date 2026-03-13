<?php
/**
 * WooCommerce Integration Component
 *
 * Provides support for integrating WooCommerce plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for WooCommerce plugin presence and conditionally registers hooks
 * - Integrates with the Aegis container and hook system
 *
 * @package    Aegis\Framework\Integrations\Plugins
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for integration components.
declare( strict_types=1 );

// Declares the namespace for integration components within the Aegis Framework.
namespace Aegis\Framework\Integrations\Plugins;

// Imports interfaces, registry, and helpers for conditional logic and hook management.
use Aegis\Container\Interfaces\Conditional;
use WP_Block_Patterns_Registry;
use function add_theme_support;
use function class_exists;
use function remove_action;
use function str_contains;

// Implements the WooCommerce integration class for the design system.

class WooCommerce implements Conditional {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return class_exists( 'WooCommerce' );
	}

	/**
	 * Declare WooCommerce theme support.
	 *
	 * @hook after_setup_theme
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function declare_woocommerce_support(): void {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	/**
	 * Unregister WooCommerce block patterns.
	 *
	 * @hook init 11
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function unregister_woocommerce_block_patterns(): void {
		remove_action( 'init', [
			'Automattic\WooCommerce\Blocks\BlockPatterns',
			'register_block_patterns',
		] );

		$registry   = WP_Block_Patterns_Registry::get_instance();
		$registered = $registry->get_all_registered();

		foreach ( $registered as $pattern ) {
			$name = $pattern['name'];

			if ( str_contains( $name, 'woocommerce' ) ) {
				$registry->unregister( $name );
			}
		}
	}
}
