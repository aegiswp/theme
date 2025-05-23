<?php
/**
 * aegis.php
 *
 * Singleton bootstrap for the Aegis WordPress theme framework.
 *
 * Registers the service provider and dependency container for the theme.
 *
 * @package   Aegis\Framework
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

use Aegis\Container\Container;
use Aegis\Framework\ServiceProvider;

if ( ! class_exists( 'Aegis' ) ) {

	/**
	 * Aegis singleton.
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
		 * Registers container with service provider.
		 *
		 * @param string $file Main plugin or theme file.
		 *
		 * @return void
		 */
		public static function register( string $file ): void {
			if ( is_null( self::$provider ) ) {
				self::$provider = new ServiceProvider( $file );
				self::$provider->register( new Container() );
			}
		}
	}
}
