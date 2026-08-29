<?php
/**
 * FluentBooking Integration Component
 *
 * Provides support for integrating FluentBooking plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for FluentBooking plugin presence and conditionally registers styles
 * - Allows FluentBooking patterns to load with theme styling
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
use function class_exists;
use function defined;

class FluentBooking implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
		return defined( 'FLUENT_BOOKING_VERSION' ) || class_exists( 'FluentBooking\App\App' );
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
	 * Allow FluentBooking block patterns to be registered.
	 *
	 * @since 1.0.0
	 *
	 * @hook  should_load_remote_block_patterns
	 *
	 * @param bool $load Whether to load remote block patterns.
	 *
	 * @return bool
	 */
	public function allow_plugin_patterns( bool $load ): bool {
		return $load;
	}

	/**
	 * Add FluentBooking to the list of allowed pattern sources.
	 *
	 * @since 1.0.0
	 *
	 * @hook  aegis_allowed_pattern_sources
	 *
	 * @param array $sources Array of allowed pattern source slugs.
	 *
	 * @return array
	 */
	public function register_pattern_source( array $sources ): array {
		$sources[] = 'fluent-booking';
		$sources[] = 'fluentbooking';

		return $sources;
	}
}
