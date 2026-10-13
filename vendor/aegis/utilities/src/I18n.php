<?php

// Enforces strict type checking for all code in this file, ensuring type safety for internationalization helpers.
declare( strict_types=1 );

// Declares the namespace for the internationalization helpers.
namespace Aegis\Utilities;

// Imports classes, interfaces, and functions used by the internationalization helpers.
use Aegis\Hooks\Hook;
use function load_plugin_textdomain;
use function load_theme_textdomain;
use function str_contains;

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
	 * This method is automatically hooked into the `init` action.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 *
	 * @return void
	 */
	public function load_textdomain(): void {
		$domain = $this->data->slug;

		if ( $domain === '' ) {
			return;
		}

		if ( str_contains( $this->data->file, 'content/themes' ) ) {
			$path = $this->data->dir . ltrim( $this->data->domain_path, '/' );
			load_theme_textdomain( $domain, $path );

			return;
		}

		load_plugin_textdomain(
			$domain,
			false,
			$this->plugin_textdomain_path()
		);
	}

	/**
	 * Relative path (from wp-content/plugins) for plugin language files.
	 *
	 * @return string
	 */
	private function plugin_textdomain_path(): string {
		$relative    = dirname( $this->data->basename );
		$domain_path = ltrim( $this->data->domain_path, '/' );

		if ( $domain_path !== '' ) {
			return $relative . '/' . $domain_path;
		}

		return $relative . '/languages';
	}

}
