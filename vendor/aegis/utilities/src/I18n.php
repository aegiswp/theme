<?php
/**
 * Aegis Internationalization Utilities
 *
 * Provides utility functions for loading plugin and theme translations in the Aegis Framework.
 *
 * Responsibilities:
 * - Offers helper methods for loading text domains and managing localization
 * - Ensures consistency and reusability of i18n logic across the framework
 *
 * @package    Aegis\Utilities
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for utility functions.
declare( strict_types=1 );

// Declares the namespace for utility classes within the Aegis Framework.
namespace Aegis\Utilities;

// Imports data utility class and WordPress core function for i18n operations.
use Aegis\Utilities\Data;
use function load_plugin_textdomain;

// Implements the Aegis i18n utility class for reusable internationalization operations.

class I18n {

	private Data $plugin;

	/**
	 * I18n constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param Data $plugin Plugin instance.
	 *
	 * @return void
	 */
	public function __construct( Data $plugin ) {
		$this->plugin = $plugin;
	}

	/**
	 * Loads plugin textdomain.
	 *
	 * @since 1.0.0
	 *
	 * @hook  plugins_loaded
	 *
	 * @return void
	 */
	public function load_textdomain(): void {
		load_plugin_textdomain(
			$this->plugin->slug,
			false,
			$this->plugin->dir . $this->plugin->domain_path
		);
	}
}
