<?php
/**
 * FluentForms Integration Component
 *
 * Provides support for integrating Fluent Forms plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Fluent Forms plugin presence and conditionally registers styles
 * - Integrates with the Aegis container and inline assets system
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

// Imports interfaces and helpers for conditional logic and style registration.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;

// Implements the FluentForms integration class for the design system.

class FluentForms implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return defined( 'FLUENTFORM' ) || class_exists( 'FluentForm\App\Modules\Form\Form' );
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
			'plugins/fluent-forms.css',
			[
				'fluentform',
				'ff_form',
				'fluent_form',
			]
		);
	}

	/**
	 * Remove the default Fluent Forms styles.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 *
	 * @return void
	 */
	public function remove_default_styles() {
		// Uncomment to disable Fluent Forms default styles
		add_filter( 'fluentform_load_default_public', '__return_false' );
	}
}
