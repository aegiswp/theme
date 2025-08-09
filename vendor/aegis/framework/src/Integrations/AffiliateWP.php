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
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for integration components.
declare( strict_types=1 );

// Declares the namespace for integration components within the Aegis Framework.
namespace Aegis\Framework\Integrations;

// Imports interfaces and helpers for conditional logic and plugin detection.
use Aegis\Container\Interfaces\Conditional;
use function class_exists;

// Implements the AffiliateWP integration class for the design system.

class AffiliateWP implements Conditional {

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
