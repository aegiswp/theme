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
 */

declare( strict_types=1 );

namespace Aegis\Framework\Integrations;

use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;

class BunnyCDN implements Conditional, Styleable {

	/**
	 * Condition.
	 *
	 * BunnyCDN is a service, not a WordPress plugin. Styles register when the
	 * Integrations toggle is enabled and load only when embed markers are present.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool {
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
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'plugins/bunnycdn.css',
			[
				'bunnycdn-player',
				'bunny-stream',
				'bunny-video',
				'mediadelivery.net',
				'bunny.net',
				'bunnycdn.com',
			]
		);
	}
}
