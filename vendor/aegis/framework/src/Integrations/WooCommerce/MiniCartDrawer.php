<?php
/**
 * WooCommerce Mini-Cart Drawer
 *
 * Keeps the closed mini-cart drawer out of the keyboard tab order.
 *
 * @package    Aegis\Framework\Integrations\WooCommerce
 * @since      1.0.1
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare( strict_types=1 );

namespace Aegis\Framework\Integrations\WooCommerce;

use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use function class_exists;
use function defined;
use function function_exists;

/**
 * Makes the closed mini-cart drawer inert.
 *
 * WooCommerce hides the closed drawer with aria-hidden="true" but leaves its
 * Close button and links focusable, so keyboard users tab into an invisible
 * panel. The script mirrors aria-hidden with the inert attribute.
 *
 * @since 1.0.1
 */
class MiniCartDrawer implements Conditional, Scriptable {

	/**
	 * Loads only when WooCommerce is active.
	 *
	 * @since 1.0.1
	 */
	public static function condition(): bool {
		if ( class_exists( \Aegis\Plugin\Integrations\WooCommerce::class ) ) {
			return \Aegis\Plugin\Integrations\WooCommerce::is_plugin_active();
		}

		return class_exists( 'WooCommerce' )
			|| function_exists( 'WC' )
			|| defined( 'WC_VERSION' );
	}

	/**
	 * Registers the drawer script on pages with a mini cart.
	 *
	 * @since 1.0.1
	 *
	 * @param Scripts $scripts The Scripts service instance.
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_file( 'woocommerce-mini-cart-drawer.js', [ 'wc-block-mini-cart' ] );
	}
}
