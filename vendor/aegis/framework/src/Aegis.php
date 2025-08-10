<?php
/**
 * Aegis Singleton Loader
 *
 * Provides a singleton loader for the Aegis Framework, responsible for registering the service provider and dependency container.
 *
 * Responsibilities:
 * - Ensures a single instance of the Aegis service provider is registered
 * - Integrates the dependency injection container for the framework
 *
 * @package    Aegis\Framework
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for the framework loader.
declare( strict_types=1 );

// Imports the Aegis dependency injection container and service provider.
use Aegis\Container\Container;
use Aegis\Framework\ServiceProvider;

if ( ! class_exists( 'Aegis' ) ) {

	/**
	 * The main entry point for the Aegis Framework.
	 *
	 * This class acts as a singleton loader, ensuring that the framework's core
	 * services are initialized only once. It provides a static `register` method
	 * that kicks off the entire framework by setting up the Service Provider and
	 * the dependency injection container.
	 *
	 * @since 1.0.0
	 */
	class Aegis {

		/**
		 * The single instance of the framework's Service Provider.
		 *
		 * @var ?ServiceProvider
		 */
		private static ?ServiceProvider $provider = null;

		/**
		 * Initializes the framework.
		 *
		 * This static method creates the ServiceProvider and registers the dependency
		 * injection container, effectively booting up the Aegis framework. It ensures
		 * this process only runs once.
		 *
		 * Example usage from a theme's functions.php or a plugin's main file:
		 * `Aegis::register( __FILE__ );`
		 *
		 * @since 1.0.0
		 *
		 * @param string $file The full path to the main plugin file or theme's functions.php.
		 *                     This is used by the framework to correctly locate assets and other files.
		 *
		 * @return void
		 */
		public static function register( string $file ): void {
			// Ensure the framework is only initialized once.
			if ( ! is_null( self::$provider ) ) {
				return;
			}

			// Instantiate the main Service Provider, which manages all framework modules.
			self::$provider = new ServiceProvider( $file );

			// Register the dependency injection container with the Service Provider.
			self::$provider->register( new Container() );
		}
	}
}
