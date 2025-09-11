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
 * @package    Aegis\Framework\Integrations
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
namespace Aegis\Framework\Integrations;

// Imports interfaces, registry, and helpers for conditional logic and hook management.
use Aegis\Container\Interfaces\Conditional;
use WP_Block_Patterns_Registry;
use function add_action;
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
	 * Register hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function hooks(): void {
		remove_action( 'init', [
			'Automattic\WooCommerce\Blocks\BlockPatterns',
			'register_block_patterns',
		] );

		add_action( 'init', [ $this, 'unregister_woocommerce_block_patterns' ], 11 );
	}

	/**
	 * Unregister WooCommerce block patterns.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function unregister_woocommerce_block_patterns(): void {
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
