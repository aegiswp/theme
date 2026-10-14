<?php
/**
 * WooCommerce sale badge (rectangular chip + percent off).
 *
 * @package    Aegis\Framework\Integrations\WooCommerce
 * @since      1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\Integrations\WooCommerce;

use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use WC_Product;
use function __;
use function class_exists;
use function defined;
use function esc_html;
use function function_exists;
use function is_numeric;
use function max;
use function round;
use function sprintf;

/**
 * Replaces the circular “Sale!” flash with a theme chip showing −N% when possible.
 */
class SaleBadge implements Conditional, Styleable {

	/**
	 * @var string[]
	 */
	private const ASSET_MARKERS = [
		'onsale',
		'product-sale-badge',
		'wc-block-components-product-sale-badge',
		'woocommerce',
	];

	public static function condition(): bool {
		if ( class_exists( \Aegis\Plugin\Integrations\WooCommerce::class ) ) {
			return \Aegis\Plugin\Integrations\WooCommerce::is_plugin_active();
		}

		return class_exists( 'WooCommerce' )
			|| function_exists( 'WC' )
			|| defined( 'WC_VERSION' );
	}

	/**
	 * Block product-sale-badge label.
	 *
	 * @param string     $sale_text Default label.
	 * @param WC_Product $product   Product.
	 *
	 * @hook woocommerce_sale_badge_text 10
	 */
	public function badge_text( string $sale_text, WC_Product $product ): string {
		$percent = $this->percent_off( $product );

		if ( null === $percent ) {
			return $sale_text !== '' ? $sale_text : __( 'Sale', 'aegis' );
		}

		/* translators: %d: discount percentage */
		return sprintf( __( '−%d%%', 'aegis' ), $percent );
	}

	/**
	 * Classic loop / single-product sale flash markup.
	 *
	 * @param string      $html    Default flash HTML.
	 * @param mixed       $post    Post object.
	 * @param WC_Product  $product Product.
	 *
	 * @hook woocommerce_sale_flash 10
	 */
	public function sale_flash( string $html, $post, WC_Product $product ): string {
		$text = apply_filters( 'woocommerce_sale_badge_text', __( 'Sale', 'aegis' ), $product );

		return '<span class="onsale">' . esc_html( (string) $text ) . '</span>';
	}

	/**
	 * @param Styles $styles Styles service.
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/woocommerce/woocommerce-sale-badge.css',
			self::ASSET_MARKERS
		);
	}

	/**
	 * Largest whole-number percent off for simple or variable products.
	 */
	private function percent_off( WC_Product $product ): ?int {
		if ( $product->is_type( 'variable' ) ) {
			$max = 0;

			foreach ( $product->get_children() as $child_id ) {
				$child = wc_get_product( $child_id );

				if ( ! $child instanceof WC_Product || ! $child->is_on_sale() ) {
					continue;
				}

				$percent = $this->percent_from_prices(
					$child->get_regular_price(),
					$child->get_sale_price()
				);

				if ( null !== $percent ) {
					$max = max( $max, $percent );
				}
			}

			return $max > 0 ? $max : null;
		}

		return $this->percent_from_prices(
			$product->get_regular_price(),
			$product->get_sale_price()
		);
	}

	/**
	 * @param string|float $regular Regular price.
	 * @param string|float $sale    Sale price.
	 */
	private function percent_from_prices( $regular, $sale ): ?int {
		if ( ! is_numeric( $regular ) || ! is_numeric( $sale ) ) {
			return null;
		}

		$regular = (float) $regular;
		$sale    = (float) $sale;

		if ( $regular <= 0 || $sale < 0 || $sale >= $regular ) {
			return null;
		}

		return (int) max( 1, round( ( ( $regular - $sale ) / $regular ) * 100 ) );
	}
}
