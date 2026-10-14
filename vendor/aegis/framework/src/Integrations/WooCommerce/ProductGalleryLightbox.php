<?php
/**
 * WooCommerce product gallery lightbox (Aegis / Core image style).
 *
 * @package    Aegis\Framework\Integrations\WooCommerce
 * @since      1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\Integrations\WooCommerce;

use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function __;
use function class_exists;
use function defined;
use function esc_attr;
use function esc_html__;
use function function_exists;
use function remove_theme_support;
use function str_contains;
use function wp_dequeue_script;
use function wp_dequeue_style;

/**
 * Replaces Photoswipe with the theme image lightbox look (expand trigger + overlay).
 */
class ProductGalleryLightbox implements Conditional, Scriptable, Styleable {

	/**
	 * Asset scan needles for conditional enqueue.
	 *
	 * @var string[]
	 */
	private const ASSET_MARKERS = [
		'woocommerce-product-gallery',
		'wp-block-woocommerce-product-image-gallery',
		'aegis-wc-lightbox',
	];

	/**
	 * Expand-corners icon (same path as Core `lightbox-trigger`).
	 */
	private const TRIGGER_ICON = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 12 12" aria-hidden="true" focusable="false"><path fill="currentColor" d="M2 0a2 2 0 0 0-2 2v2h1.5V2a.5.5 0 0 1 .5-.5h2V0H2Zm2 10.5H2a.5.5 0 0 1-.5-.5V8H0v2a2 2 0 0 0 2 2h2v-1.5ZM8 12v-1.5h2a.5.5 0 0 0 .5-.5V8H12v2a2 2 0 0 1-2 2H8Zm2-12a2 2 0 0 1 2 2v2h-1.5V2a.5.5 0 0 0-.5-.5H8V0h2Z"/></svg>';

	public static function condition(): bool {
		if ( class_exists( \Aegis\Plugin\Integrations\WooCommerce::class ) ) {
			return \Aegis\Plugin\Integrations\WooCommerce::is_plugin_active();
		}

		return class_exists( 'WooCommerce' )
			|| function_exists( 'WC' )
			|| defined( 'WC_VERSION' );
	}

	/**
	 * Prefer Aegis lightbox over Photoswipe.
	 *
	 * @hook after_setup_theme 20
	 */
	public function disable_photoswipe_theme_support(): void {
		remove_theme_support( 'wc-product-gallery-lightbox' );
	}

	/**
	 * Block theme product gallery forces Photoswipe on; keep it off.
	 *
	 * @hook woocommerce_single_product_photoswipe_enabled 20
	 */
	public function disable_photoswipe(): bool {
		return false;
	}

	/**
	 * Drop Photoswipe assets if something else enqueued them.
	 *
	 * @hook wp_enqueue_scripts 30
	 */
	public function dequeue_photoswipe_assets(): void {
		wp_dequeue_script( 'wc-photoswipe' );
		wp_dequeue_script( 'wc-photoswipe-ui-default' );
		wp_dequeue_style( 'photoswipe' );
		wp_dequeue_style( 'photoswipe-default-skin' );
	}

	/**
	 * Add Core-style expand trigger to each gallery image (main + thumbs).
	 *
	 * @param string $html          Gallery image HTML.
	 * @param int    $attachment_id Attachment ID.
	 *
	 * @hook woocommerce_single_product_image_thumbnail_html 20
	 */
	public function enhance_gallery_image_html( string $html, int $attachment_id ): string {
		if ( '' === $html || str_contains( $html, 'aegis-wc-lightbox' ) ) {
			return $html;
		}

		if ( ! str_contains( $html, '<img' ) ) {
			return $html;
		}

		$label  = esc_attr__( 'Enlarge', 'aegis' );
		$button = '<button type="button" class="lightbox-trigger aegis-wc-lightbox-trigger" aria-haspopup="dialog" aria-label="' . $label . '">' . self::TRIGGER_ICON . '</button>';

		$enhanced = preg_replace(
			'/(<div[^>]*class="[^"]*woocommerce-product-gallery__image[^"]*"[^>]*>)/',
			'$1<div class="aegis-lightbox-media aegis-wc-lightbox">',
			$html,
			1
		);

		if ( ! is_string( $enhanced ) || $enhanced === $html ) {
			return $html;
		}

		$with_button = preg_replace(
			'/(<\/a>)/',
			'$1' . $button . '</div>',
			$enhanced,
			1
		);

		return is_string( $with_button ) ? $with_button : $html;
	}

	/**
	 * Mark the gallery wrapper for the frontend script.
	 *
	 * @param string               $content Block HTML.
	 * @param array<string, mixed> $block   Block data.
	 *
	 * @hook render_block_woocommerce/product-image-gallery
	 */
	public function mark_gallery_block( string $content, array $block ): string {
		if ( '' === $content || str_contains( $content, 'aegis-wc-lightbox-gallery' ) ) {
			return $content;
		}

		return (string) preg_replace(
			'/(class="[^"]*wp-block-woocommerce-product-image-gallery)/',
			'$1 aegis-wc-lightbox-gallery',
			$content,
			1
		);
	}

	/**
	 * @param Scripts $scripts Scripts service.
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_file(
			'woocommerce-gallery-lightbox.js',
			self::ASSET_MARKERS
		);

		$scripts->add_data(
			'wcLightbox',
			[
				'closeLabel'    => __( 'Close', 'aegis' ),
				'prevLabel'     => __( 'Previous', 'aegis' ),
				'nextLabel'     => __( 'Next', 'aegis' ),
				'dialogLabel'   => __( 'Enlarged images', 'aegis' ),
				'closeIcon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false"><path d="m13.06 12 6.47-6.47-1.06-1.06L12 10.94 5.53 4.47 4.47 5.53 10.94 12l-6.47 6.47 1.06 1.06L12 13.06l6.47 6.47 1.06-1.06L13.06 12Z"></path></svg>',
				'prevIcon'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" aria-hidden="true" focusable="false"><path d="M14.6 7l-1.2-1L8 12l5.4 6 1.2-1-4.6-5z"></path></svg>',
				'nextIcon'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28" aria-hidden="true" focusable="false"><path d="M10.6 6L9.4 7l4.6 5-4.6 5 1.2 1 5.4-6z"></path></svg>',
			],
			self::ASSET_MARKERS
		);
	}

	/**
	 * @param Styles $styles Styles service.
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/woocommerce/woocommerce-gallery-lightbox.css',
			self::ASSET_MARKERS
		);
	}
}
