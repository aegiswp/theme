<?php
/**
 * Aegis Debug Utilities
 *
 * Provides utility functions for debugging and logging in the Aegis Framework.
 *
 * Responsibilities:
 * - Offers helper methods for checking debug mode and logging data
 * - Ensures consistency and reusability of debug logic across the framework
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

// Imports WordPress core functions and constants for debug operations.
use function add_action;
use function debug_backtrace;
use function defined;
use function json_encode;
use const SCRIPT_DEBUG;
use const WP_DEBUG;

// Implements the Aegis debug utility class for reusable debug operations.

class Debug {

	/**
	 * Check if debug mode is enabled.
	 *
	 * @return bool
	 */
	public static function is_enabled(): bool {
		$wp_debug     = defined( 'WP_DEBUG' ) && WP_DEBUG;
		$script_debug = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG;

		return $wp_debug || $script_debug;
	}

	/**
	 * Log data to the console.
	 *
	 * @param mixed $data  Data to log.
	 * @param bool  $trace Whether to log the stacktrace.
	 *
	 * @return void
	 */
	public static function console_log( $data, bool $trace = false ): void {
		add_action( 'wp_footer', static fn() => static::render_log( $data, $trace ) );
		add_action( 'admin_footer', static fn() => static::render_log( $data, $trace ) );
	}

	/**
	 * Log data to the console.
	 *
	 * @return void
	 */
	public static function stacktrace(): array {
		$backtrace  = debug_backtrace();
		$stacktrace = [];

		foreach ( $backtrace as $index => $trace ) {
			if ( ! isset( $trace['file'] ) || ! isset( $trace['line'] ) ) {
				continue;
			}

			if ( 0 === $index ) {
				continue;
			}

			$stacktrace[] = $trace['file'] . ': ' . $trace['line'] . "\n";
		}

		return $stacktrace;
	}

	/**
	 * Render the log.
	 *
	 * @param mixed $data  Data to log.
	 * @param bool  $trace Whether to log the stacktrace.
	 *
	 * @return void
	 */
	private static function render_log( $data, bool $trace = true ): void {
		$stacktrace = self::stacktrace();

		echo '<script>';
		echo 'console.log(' . json_encode( $data ) . ');';

		if ( $trace && $stacktrace ) {
			foreach ( $stacktrace as $trace ) {
				echo 'console.log(' . json_encode( $trace ) . ');';
			}
		}

		echo '</script>';
	}
}
