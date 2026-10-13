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
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for aegis singleton loader.
declare( strict_types=1 );

// Imports classes, interfaces, and functions used by the aegis singleton loader.
use Aegis\Container\Container;
use Aegis\Framework\ServiceProvider;

if ( ! class_exists( 'Aegis' ) ) {

	/**
	 * Aegis singleton loader.
	 *
	 * Provides a single entry point for registering the Aegis service provider and dependency container.
	 *
	 * @since 1.0.0
	 */
	class Aegis {

		/**
		 * Service provider instance.
		 *
		 * @var ?ServiceProvider
		 */
		private static ?ServiceProvider $provider = null;

		/**
		 * Registers the dependency injection container with the service provider.
		 *
		 * @param string $file Main plugin or theme file.
		 *
		 * @return void
		 */
		public static function register( string $file ): void {
			// Instantiate the service provider once and register the container.
			if ( is_null( self::$provider ) ) {
				self::$provider = new ServiceProvider( $file );
				self::$provider->register( new Container() );
			}
		}
	}
}
