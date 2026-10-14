<?php
/**
 * FluentBooking Integration Component
 *
 * Provides support for integrating FluentBooking plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for FluentBooking plugin presence and conditionally registers styles
 * - Unregisters Fluent Booking block patterns when pattern removal is enabled
 * - Integrates with the Aegis container and inline assets system
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare( strict_types=1 );

namespace Aegis\Framework\Integrations;

use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use WP_Block_Patterns_Registry;
use function class_exists;
use function defined;
use function get_option;
use function is_array;
use function is_string;
use function str_contains;
use function str_replace;
use function str_starts_with;

class FluentBooking implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		if ( class_exists( '\\Aegis\\Plugin\\Integrations\\FluentBooking' ) ) {
			return \Aegis\Plugin\Integrations\FluentBooking::is_plugin_active();
		}

		return defined( 'FLUENT_BOOKING_VERSION' ) || class_exists( 'FluentBooking\\App\\App' );
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
			'plugins/fluentbooking.css',
			[
				'fluent-booking',
				'fcal_',
				'fcal-',
				'fluentbooking',
			]
		);
	}

	/**
	 * Unregister Fluent Booking plugin block patterns when enabled.
	 *
	 * @since 1.0.0
	 *
	 * @hook init 11
	 *
	 * @return void
	 */
	public function unregister_fluentbooking_block_patterns(): void {
		$control = get_option( 'aegis_pattern_control', [] );
		$remove  = is_array( $control ) && ! empty( $control['fluentbooking_keep_patterns'] );

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
			$from_fb_plugin = str_starts_with( $name, 'fluent-booking/' )
				|| str_starts_with( $name, 'fluentbooking/' )
				|| ( is_string( $file ) && str_contains( str_replace( '\\', '/', $file ), '/fluent-booking/' ) );

			if ( $from_fb_plugin ) {
				$registry->unregister( $name );
			}
		}
	}
}
