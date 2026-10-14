<?php
/**
 * FluentForms Integration Component
 *
 * Provides support for integrating Fluent Forms plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Fluent Forms plugin presence and conditionally registers styles
 * - Integrates with the Aegis container and inline assets system
 * - Unregisters Fluent Forms plugin patterns when pattern control is active
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for fluentforms integration component.
declare( strict_types=1 );

// Declares the namespace for the fluentforms integration component.
namespace Aegis\Framework\Integrations;

// Imports classes, interfaces, and functions used by the fluentforms integration component.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use WP_Block_Patterns_Registry;
use function add_filter;
use function class_exists;
use function defined;
use function function_exists;
use function get_option;
use function is_array;
use function is_string;
use function str_contains;
use function str_replace;
use function str_starts_with;

class FluentForms implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		if ( class_exists( '\\Aegis\\Plugin\\Integrations\\FluentForms' ) ) {
			return \Aegis\Plugin\Integrations\FluentForms::is_plugin_active();
		}

		return defined( 'FLUENTFORM' )
			|| defined( 'FLUENTFORM_VERSION' )
			|| class_exists( 'FluentForm\\App\\Modules\\Form\\Form' )
			|| function_exists( 'wpFluentForm' );
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
				'fluent-form',
				'ff-form',
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
	public function remove_default_styles(): void {
		// Disables Fluent Forms default styles.
		add_filter( 'fluentform_load_default_public', '__return_false' );
	}

	/**
	 * Unregister Fluent Forms plugin block patterns when enabled.
	 *
	 * @since 1.0.0
	 *
	 * @hook init 11
	 *
	 * @return void
	 */
	public function unregister_fluentforms_block_patterns(): void {
		$control = get_option( 'aegis_pattern_control', [] );
		$remove  = is_array( $control ) && ! empty( $control['fluentforms_keep_patterns'] );

		if ( ! $remove || ! defined( 'AEGIS_PRO_VERSION' ) ) {
			return;
		}

		$registry   = WP_Block_Patterns_Registry::get_instance();
		$registered = $registry->get_all_registered();

		foreach ( $registered as $pattern ) {
			$name = $pattern['name'] ?? '';

			if ( $name === '' || str_starts_with( $name, 'aegis/' ) ) {
				continue;
			}

			$file           = $pattern['filePath'] ?? '';
			$from_ff_plugin = str_starts_with( $name, 'fluentform/' )
				|| str_starts_with( $name, 'fluentforms/' )
				|| str_starts_with( $name, 'fluent-forms/' )
				|| str_starts_with( $name, 'fluent-form/' )
				|| ( is_string( $file ) && (
					str_contains( str_replace( '\\', '/', $file ), '/fluentform/' )
					|| str_contains( str_replace( '\\', '/', $file ), '/fluentformpro/' )
					|| str_contains( str_replace( '\\', '/', $file ), '/fluent-forms/' )
					|| str_contains( str_replace( '\\', '/', $file ), '/fluent-form/' )
				) );

			if ( $from_ff_plugin ) {
				$registry->unregister( $name );
			}
		}
	}
}
