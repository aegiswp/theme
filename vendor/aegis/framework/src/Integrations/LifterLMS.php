<?php
/**
 * LifterLMS Integration Component
 *
 * Provides support for integrating LifterLMS plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for LifterLMS plugin presence and conditionally adds theme support
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

// Imports interfaces and helpers for conditional logic and theme support management.
use Aegis\Container\Interfaces\Conditional;
use function add_filter;
use function add_theme_support;
use function class_exists;

// Implements the LifterLMS integration class for the design system.

class LifterLMS implements Conditional {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return class_exists( '\\LifterLMS' );
	}

	/**
	 * Adds theme support for LifterLMS course and lesson sidebars.
	 *
	 * @since 1.0.0
	 *
	 * @hook  after_setup_theme
	 *
	 * @return void
	 */
	public function add_lifterlms_support(): void {
		if ( class_exists( '\\LifterLMS' ) ) {
			add_theme_support( 'lifterlms-sidebars' );
			add_filter( 'llms_get_theme_default_sidebar', static fn() => null );
		}
	}
}
