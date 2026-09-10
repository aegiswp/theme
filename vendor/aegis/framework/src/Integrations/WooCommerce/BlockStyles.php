<?php
/**
 * WooCommerce block styles integration.
 *
 * @package    Aegis\Framework\Integrations\WooCommerce
 * @since      1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\Integrations\WooCommerce;

use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function class_exists;
use function defined;
use function function_exists;

class BlockStyles implements Conditional, Styleable {

	public static function condition(): bool {
		if ( class_exists( \Aegis\Plugin\Integrations\WooCommerce::class ) ) {
			return \Aegis\Plugin\Integrations\WooCommerce::is_plugin_active();
		}

		return class_exists( 'WooCommerce' )
			|| function_exists( 'WC' )
			|| defined( 'WC_VERSION' );
	}

	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/woocommerce/woocommerce.css',
			[
				'woocommerce',
				'wc-block',
				'wp-block-woocommerce',
			]
		);

		$styles->add_file(
			'plugins/woocommerce/woocommerce-breadcrumbs.css',
			[
				'woocommerce-breadcrumb',
				'wc-block-breadcrumbs',
				'wp-block-woocommerce-breadcrumbs',
			]
		);
	}
}
