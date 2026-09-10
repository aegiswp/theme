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
use function add_filter;
use function class_exists;
use function defined;
use function function_exists;

class GravityForms implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		if ( class_exists( '\\Aegis\\Plugin\\Integrations\\GravityForms' ) ) {
			return \Aegis\Plugin\Integrations\GravityForms::is_plugin_active();
		}

		return class_exists( 'GFForms' )
			|| class_exists( 'GFAPI' )
			|| defined( 'GF_MIN_WP_VERSION' )
			|| function_exists( 'gravity_form' );
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
				'gform_wrapper',
				'gravity-theme',
				'gform',
				'gform_body',
				'gform-body',
				'gfield',
			]
		);
	}

	/**
	 * Remove the default Gravity Forms styles.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 * @hook  gform_disable_form_theme_css
	 *
	 * @param bool $disabled Whether form theme CSS is disabled.
	 *
	 * @return bool
	 */
	public function remove_default_styles( bool $disabled = false ): bool {
		add_filter( 'gform_disable_form_theme_css', '__return_true' );

		return true;
	}
}
