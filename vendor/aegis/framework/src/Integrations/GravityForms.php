<?php
/**
 * GravityForms Integration Component
 *
 * Provides support for integrating Gravity Forms plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Gravity Forms plugin presence and conditionally registers styles
 * - Integrates with the Aegis container and inline assets system
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for gravityforms integration component.
declare( strict_types=1 );

// Declares the namespace for the gravityforms integration component.
namespace Aegis\Framework\Integrations;

// Imports classes, interfaces, and functions used by the gravityforms integration component.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;

class GravityForms implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return class_exists( 'GFForms' );
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
			'plugins/gravity-forms.css',
			[
				'gform-body',
			]
		);
	}

	/**
	 * Remove the default Gravity Forms styles.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 *
	 * @return void
	 */
	public function remove_default_styles() {
		add_filter( 'gform_disable_form_theme_css', '__return_true' );
	}
}
