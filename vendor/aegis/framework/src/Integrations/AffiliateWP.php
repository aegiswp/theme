<?php
/**
 * AffiliateWP Integration Component
 *
 * Overlay CSS for the Affiliate Area and forms, and dequeue of AffiliateWP’s
 * default forms stylesheet when the Aegis integration is on.
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare( strict_types=1 );

namespace Aegis\Framework\Integrations;

use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function class_exists;
use function defined;
use function function_exists;
use function is_admin;
use function wp_dequeue_style;

class AffiliateWP implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * Prefer the plugin helper when the Aegis plugin is loaded.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		if ( class_exists( \Aegis\Plugin\Integrations\AffiliateWP::class ) ) {
			return \Aegis\Plugin\Integrations\AffiliateWP::is_plugin_active();
		}

		return class_exists( 'Affiliate_WP' )
			|| function_exists( 'affiliate_wp' )
			|| defined( 'AFFILIATEWP_VERSION' );
	}

	/**
	 * Register styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The styles instance.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/affiliate-wp.css',
			[
				'affwp-affiliate-dashboard',
				'affwp-form',
				'affwp-notice',
				'affwp-register-form',
				'affwp-login-form',
			]
		);
	}

	/**
	 * Skip AffiliateWP’s bundled forms CSS so theme tokens apply.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $enqueue Whether AffiliateWP would enqueue forms.css.
	 *
	 * @hook  affwp_enqueue_style_affwp-forms
	 *
	 * @return bool
	 */
	public function enqueue_forms_style( $enqueue = true ): bool {
		unset( $enqueue );

		return false;
	}

	/**
	 * Dequeue AffiliateWP forms CSS if it was already queued.
	 *
	 * @since 1.0.0
	 *
	 * @hook  wp_enqueue_scripts 20
	 * @hook  wp_print_styles
	 *
	 * @return void
	 */
	public function dequeue_default_styles(): void {
		if ( is_admin() ) {
			return;
		}

		wp_dequeue_style( 'affwp-forms' );
	}
}
