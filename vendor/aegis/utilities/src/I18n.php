<?php

// Enforces strict type checking for all code in this file, ensuring type safety for internationalization helpers.
declare( strict_types=1 );

// Declares the namespace for the internationalization helpers.
namespace Aegis\Utilities;

// Imports classes, interfaces, and functions used by the internationalization helpers.
use Aegis\Hooks\Hook;
use function load_plugin_textdomain;

/**
 * Handles internationalization (I18n) for plugins and themes.
 *
 * This class is responsible for loading the text domain, allowing for the
 * translation of strings.
 *
 * @since 1.0.0
 */
class I18n {

	private Data $data;

	/**
	 * I18n constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param Data $data The Data object for the plugin or theme.
	 */
	public function __construct( Data $data ) {
		$this->data = $data;
	}

	/**
	 * Static factory to create or retrieve a cached instance of the I18n class.
	 *
	 * This method ensures that the text domain is only registered once per plugin
	 * or theme and automatically hooks the `load_textdomain` method.
	 *
	 * @since 1.0.0
	 *
	 * @param Data $data The Data object for the plugin or theme.
	 *
	 * @return self The I18n instance.
	 */
	public static function register( Data $data ): self {
		// Static cache to hold I18n instances.
		static $instances = [];

		// If no instance exists for this slug, create and register hooks.
		if ( ! isset( $instances[ $data->slug ] ) ) {
			$instances[ $data->slug ] = new self( $data );

			Hook::annotations( $instances[ $data->slug ] );
		}

		// Return the existing or newly created instance.
		return $instances[ $data->slug ];
	}

	/**
	 * Loads the plugin or theme text domain.
	 *
	 * This method is automatically hooked into the `plugins_loaded` action.
	 *
	 * @since 1.0.0
	 *
	 * @hook  plugins_loaded
	 *
	 * @return void
	 */
	public function load_textdomain(): void {
		load_plugin_textdomain(
			$this->data->slug,
			false,
			$this->data->dir . $this->data->domain_path
		);
	}

}
