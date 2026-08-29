<?php
/**
 * AffiliateWP Integration Component
 *
 * Provides support for integrating AffiliateWP plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for AffiliateWP plugin presence and conditionally disables styles
 * - Integrates with the Aegis container and conditional system
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for affiliatewp integration component.
declare( strict_types=1 );

// Declares the namespace for the affiliatewp integration component.
namespace Aegis\Framework\Integrations;

// Imports classes, interfaces, and functions used by the affiliatewp integration component.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function class_exists;

class AffiliateWP implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return class_exists( '\\Affiliate_WP' );
	}

	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/affiliate-wp.css',
			[
				'affwp-form',
				'affiliate-wp',
				'affwp',
			]
		);
	}

	/**
	 * Hooks.
	 *
	 * @since 1.0.0
	 *
	 * @hook  affwp_enqueue_style_affwp-forms
	 *
	 * @return bool
	 */
	public function remove_styles(): bool {
		return false;
	}
}
