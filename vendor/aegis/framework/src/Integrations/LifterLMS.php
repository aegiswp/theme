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
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for lifterlms integration component.
declare( strict_types=1 );

// Declares the namespace for the lifterlms integration component.
namespace Aegis\Framework\Integrations;

// Imports classes, interfaces, and functions used by the lifterlms integration component.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function add_filter;
use function add_theme_support;
use function class_exists;

class LifterLMS implements Conditional, Styleable {

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

	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/lifterlms.css',
			[
				'lifterlms',
				'llms',
				'llms-loop',
			]
		);
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
			// Register LifterLMS sidebars and suppress the default sidebar.
			add_theme_support( 'lifterlms-sidebars' );
			add_filter( 'llms_get_theme_default_sidebar', static fn() => null );
		}
	}
}
