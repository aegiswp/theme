<?php
/**
 * WooCommerce Block Styles
 *
 * Conditionally loads WooCommerce block CSS only when the relevant
 * blocks are present on the current page.
 *
 * Responsibilities:
 * - Detects WooCommerce block class-name markers inside the global
 *   `$template_html` string (the same approach used by the
 *   framework's BlockScripts and BlockCss components)
 * - Injects per-block CSS files as inline styles appended to the
 *   `global-styles` handle, keeping the stylesheet count minimal
 * - Loads a legacy stylesheet when classic WooCommerce shortcode
 *   markers (cart totals, billing fields, My Account, etc.) are
 *   detected
 * - Appends a dark-mode stylesheet when any WooCommerce content
 *   is present on the page
 * - Caches file reads in a static array to avoid redundant I/O
 *   when multiple blocks appear on the same page
 *
 * @package    Aegis\Framework\Integrations\Plugins\WooCommerce
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file.
declare( strict_types=1 );

// Declares the namespace for WooCommerce integration within the Aegis Framework.
namespace Aegis\Framework\Integrations\Plugins\WooCommerce;

// Imports interfaces and functions used throughout this file.
use Aegis\Container\Interfaces\Conditional;
use function add_action;
use function class_exists;
use function file_exists;
use function file_get_contents;
use function get_template_directory;
use function is_admin;
use function str_contains;
use function trim;
use function wp_add_inline_style;
use function wp_register_style;

/**
 * WooCommerce block styles.
 *
 * Implements the {@see Conditional} interface so the service is only
 * booted when the WooCommerce plugin is active. On the front end it
 * scans `$template_html` for known block class-name markers and
 * injects the matching CSS files as inline styles, plus optional
 * legacy and dark-mode stylesheets.
 *
 * @since 1.0.0
 */
class BlockStyles implements Conditional {

	/**
	 * Determine whether this service should be loaded.
	 *
	 * Returns `true` only when the `WooCommerce` class exists,
	 * meaning the WooCommerce plugin is active.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True when WooCommerce is active.
	 */
	public static function condition(): bool {
		return class_exists( 'WooCommerce' );
	}

	/**
	 * Initialise hooks.
	 *
	 * Registers the block-style injection callback on
	 * `wp_enqueue_scripts` at priority 11 so it runs after
	 * WordPress has enqueued `global-styles`.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function hooks(): void {
		add_action( 'wp_enqueue_scripts', [ $this, 'add_wc_block_styles' ], 11 );
	}

	/**
	 * Conditionally inject WooCommerce block CSS via inline styles.
	 *
	 * Scans the global `$template_html` for WooCommerce block
	 * class-name markers and appends the matching CSS file contents
	 * to the `global-styles` handle via `wp_add_inline_style()`.
	 *
	 * Three layers of styles may be injected:
	 * 1. **Per-block CSS** — one file per detected block slug
	 *    (e.g. `mini-cart.css`, `cart.css`)
	 * 2. **Legacy CSS** — `woocommerce-legacy.css` when classic
	 *    shortcode markers are found
	 * 3. **Dark-mode CSS** — `woocommerce-dark.css` when any
	 *    WooCommerce content is present
	 *
	 * File reads are cached in a static `$file_cache` array so
	 * repeated calls within the same request do not hit the
	 * filesystem again. Skipped entirely in the admin context.
	 *
	 * @since 1.0.0
	 *
	 * @hook  wp_enqueue_scripts 11
	 *
	 * @return void
	 */
	public function add_wc_block_styles(): void {
		if ( is_admin() ) {
			return;
		}

		global $template_html;

		if ( empty( $template_html ) ) {
			return;
		}

		$dir = get_template_directory() . '/vendor/aegis/framework/public/css/plugins/woocommerce/';

		$blocks = [
			'product-image-gallery' => 'woocommerce-product-gallery',
			'product-details'       => 'woocommerce-tabs',
			'filter-wrapper'        => 'wp-block-woocommerce-filter-wrapper',
			'product-rating'        => 'wc-block-components-product-rating',
			'product-sale-badge'    => 'wc-block-components-product-sale-badge',
			'mini-cart'             => 'wc-block-mini-cart',
			'cart'                  => 'wc-block-cart',
			'product-collection'    => 'wp-block-woocommerce-product-collection',
			'product-button'        => 'wc-block-components-product-button',
			'quantity-selector'     => 'wc-block-components-quantity-selector',
		];

		static $file_cache = [];
		$has_wc_block  = false;
		$has_wc_legacy = false;

		foreach ( $blocks as $slug => $marker ) {
			if ( ! str_contains( $template_html, $marker ) ) {
				continue;
			}

			$has_wc_block = true;
			$file         = $dir . $slug . '.css';

			if ( ! isset( $file_cache[ $file ] ) ) {
				if ( ! file_exists( $file ) ) {
					$file_cache[ $file ] = false;
					continue;
				}

				$file_cache[ $file ] = trim( file_get_contents( $file ) );
			}

			$css = $file_cache[ $file ];

			if ( $css === false ) {
				continue;
			}

			wp_add_inline_style( 'global-styles', $css );
		}

		$legacy_markers = [
			'cart_totals',
			'woocommerce-billing-fields',
			'woocommerce-MyAccount',
			'single_add_to_cart_button',
			'woocommerce-form-coupon',
			'woocommerce-checkout-review-order',
		];

		foreach ( $legacy_markers as $marker ) {
			if ( str_contains( $template_html, $marker ) ) {
				$has_wc_legacy = true;
				break;
			}
		}

		if ( $has_wc_legacy ) {
			$legacy_file = $dir . 'woocommerce-legacy.css';

			if ( ! isset( $file_cache[ $legacy_file ] ) ) {
				$file_cache[ $legacy_file ] = file_exists( $legacy_file )
					? trim( file_get_contents( $legacy_file ) )
					: false;
			}

			if ( $file_cache[ $legacy_file ] !== false ) {
				wp_add_inline_style( 'global-styles', $file_cache[ $legacy_file ] );
			}
		}

		if ( $has_wc_block || $has_wc_legacy || str_contains( $template_html, 'woocommerce' ) ) {
			$dark_file = $dir . 'woocommerce-dark.css';

			if ( ! isset( $file_cache[ $dark_file ] ) ) {
				$file_cache[ $dark_file ] = file_exists( $dark_file )
					? trim( file_get_contents( $dark_file ) )
					: false;
			}

			if ( $file_cache[ $dark_file ] !== false ) {
				wp_add_inline_style( 'global-styles', $file_cache[ $dark_file ] );
			}
		}
	}
}
