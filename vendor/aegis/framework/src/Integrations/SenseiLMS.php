<?php
/**
 * Sensei LMS Integration Component
 *
 * Provides support for integrating Sensei LMS plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Sensei LMS plugin presence and conditionally adds theme support or styles
 * - Integrates with the Aegis container and conditional system
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for integration components.
declare( strict_types=1 );

// Declares the namespace for integration components within the Aegis Framework.
namespace Aegis\Framework\Integrations;

// Imports interfaces and helpers for conditional logic and style management.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function add_theme_support;
use function add_filter;
use function class_exists;

// Implements the Sensei LMS integration class for the design system.

class SenseiLMS implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return class_exists( '\Sensei_Main' ) || class_exists( 'Sensei' );
	}

	/**
	 * Register styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles instance.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/sensei-lms.css',
			[
				'sensei-lms',
				'sensei-course',
				'sensei-lesson',
			]
		);
	}

	/**
	 * Adds theme support or disables default Sensei styles (optional).
	 *
	 * @since 1.0.0
	 * @hook after_setup_theme
	 *
	 * @return void
	 */
	public function add_senseilms_support(): void {
		if ( class_exists( '\Sensei_Main' ) || class_exists( 'Sensei' ) ) {
			// Example: add_theme_support( 'sensei-lms' );
			// Example: add_filter( 'sensei_disable_styles', '__return_true' );
		}
	}
}
