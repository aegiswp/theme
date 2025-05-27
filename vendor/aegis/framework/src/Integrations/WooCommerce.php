<?php
/**
 * WooCommerce.php
 *
 * Handles WooCommerce integration for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\Integrations
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\Integrations;

use Aegis\Container\Interfaces\Conditional;
use WP_Block_Patterns_Registry;
use function add_action;
use function class_exists;
use function remove_action;
use function str_contains;

/**
 * WooCommerce integration.
 *
 * @since 1.0.0
 */
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
