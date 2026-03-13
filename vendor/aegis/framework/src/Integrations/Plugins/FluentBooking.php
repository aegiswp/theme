<?php
/**
 * FluentBooking Integration Component
 *
 * Provides support for integrating FluentBooking plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for FluentBooking plugin presence and conditionally registers styles
 * - Provides Dark/Light mode support for booking calendars
 * - Allows FluentBooking patterns to load with theme styling
 * - Integrates with the Aegis container and inline assets system
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for integration components.
declare(strict_types=1);

// Declares the namespace for integration components within the Aegis Framework.
namespace Aegis\Framework\Integrations;

// Imports interfaces and helpers for conditional logic and style registration.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function add_filter;
use function class_exists;
use function defined;

// Implements the FluentBooking integration class for the design system.

/**
 * Handles the FluentBooking plugin integration.
 *
 * This class provides theme compatibility for the FluentBooking appointment
 * scheduling plugin, including Dark/Light mode support and allowing the plugin's
 * own patterns to load with proper theme styling.
 *
 * @package Aegis\Framework\Integrations
 * @since   1.0.0
 */
class FluentBooking implements Conditional, Styleable
{

	/**
	 * Condition.
	 *
	 * Only load this integration if FluentBooking plugin is active.
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
	 * Adds the FluentBooking CSS file to the inline styles system,
	 * loading it only when FluentBooking elements are present on the page.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles instance.
	 *
	 * @return void
	 */
	public function styles(Styles $styles): void
	{
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
	 * This filter ensures that FluentBooking's own patterns can load
	 * alongside theme patterns without being blocked.
	 *
	 * @since 1.0.0
	 *
	 * @hook  should_load_remote_block_patterns
	 *
	 * @param bool $load Whether to load remote block patterns.
	 *
	 * @return bool
	 */
	public function allow_plugin_patterns(bool $load): bool
	{
		return $load;
	}

	/**
	 * Add FluentBooking to the list of allowed pattern sources.
	 *
	 * Ensures FluentBooking patterns are not unregistered by the theme's
	 * pattern management system.
	 *
	 * @since 1.0.0
	 *
	 * @hook  aegis_allowed_pattern_sources
	 *
	 * @param array $sources Array of allowed pattern source slugs.
	 *
	 * @return array
	 */
	public function register_pattern_source(array $sources): array
	{
		$sources[] = 'fluent-booking';
		$sources[] = 'fluentbooking';

		return $sources;
	}
}
