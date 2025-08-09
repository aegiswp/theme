<?php
/**
 * NinjaForms Integration Component
 *
 * Provides support for integrating Ninja Forms plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Ninja Forms plugin presence and conditionally dequeues plugin styles
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

// Imports interfaces and helpers for conditional logic and style management.
use Aegis\Container\Interfaces\Conditional;
use function wp_dequeue_style;

// Implements the NinjaForms integration class for the design system.

class NinjaForms implements Conditional {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return class_exists( 'Ninja_Forms' );
	}

	/**
	 * Dequeue Ninja Forms CSS.
	 *
	 * @since 1.0.0
	 *
	 * @hook  nf_display_enqueue_scripts
	 *
	 * @return void
	 */
	function dequeue_ninja_forms_css() {
		wp_dequeue_style( 'nf-display' );
	}
}
