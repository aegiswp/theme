<?php
/**
 * BunnyCDN Media Player Integration Component
 *
 * Provides integration for BunnyCDN Stream Media Player in the Aegis Framework.
 *
 * Responsibilities:
 * - Applies theme border radius to BunnyCDN iframe embeds
 * - Supports light/dark mode styling for player containers
 * - Ensures consistent styling with theme images
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

// Enforces strict type checking for all code in this file, ensuring type safety for integration components.
declare(strict_types=1);

// Declares the namespace for integration components within the Aegis Framework.
namespace Aegis\Framework\Integrations;

// Imports interfaces and helpers for conditional logic and inline assets.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;

// Implements the BunnyCDN integration class for the design system.

class BunnyCDN implements Conditional, Styleable
{

	/**
	 * Condition.
	 *
	 * Always returns true as BunnyCDN is a service, not a plugin.
	 * Styles are loaded when BunnyCDN iframe selectors are present.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool
	{
		return true;
	}

	/**
	 * Register styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The styles instance.
	 *
	 * @return void
	 */
	public function styles(Styles $styles): void
	{
		$styles->add_file(
			'plugins/bunnycdn.css',
			[
				'bunnycdn-player',
				'bunny-stream',
				'bunny-video',
			],
			static::condition()
		);
	}
}
