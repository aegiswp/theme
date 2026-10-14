<?php

// Enforces strict type checking for all code in this file, ensuring type safety for debug logging helpers.
declare( strict_types=1 );

// Declares the namespace for the debug logging helpers.
namespace Aegis\Utilities;

// Imports classes, interfaces, and functions used by the debug logging helpers.
use function add_action;
use function debug_backtrace;
use function defined;
use function json_encode;
use const SCRIPT_DEBUG;
use const WP_DEBUG;

/**
 * Debug utility class for logging data to the browser console.
 *
 * This class provides methods to help with debugging during development. It only
 * outputs logs when a WordPress debug constant is enabled.
 *
 * @since 1.0.0
 */
class Debug {

	/**
	 * Checks if WordPress debugging is enabled.
	 *
	 * Returns true if either `WP_DEBUG` or `SCRIPT_DEBUG` is defined and true.
	 *
	 * @return bool True if debugging is enabled, false otherwise.
	 */
	public static function is_enabled(): bool {
		// Check if WP_DEBUG is enabled.
		$wp_debug     = defined( 'WP_DEBUG' ) && WP_DEBUG;
		// Check if SCRIPT_DEBUG is enabled.
		$script_debug = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG;

		// Return true if either debug constant is enabled.
		return $wp_debug || $script_debug;
	}

	/**
	 * Queues data to be logged to the browser's JavaScript console.
	 *
	 * The log will be output in the footer of the front end or admin area.
	 *
	 * @param mixed $data  The data to be logged (e.g., array, object, string).
	 * @param bool  $trace If true, a stack trace will also be logged.
	 *
	 * @return void
	 */
	public static function console_log( $data, bool $trace = false ): void {
		// Queue logging for the front-end footer.
		add_action( 'wp_footer', static fn() => static::render_log( $data, $trace ) );
		// Queue logging for the admin footer.
		add_action( 'admin_footer', static fn() => static::render_log( $data, $trace ) );
	}

	/**
	 * Generates a simplified stack trace.
	 *
	 * @return array A list of strings, each representing a file and line number
	 *               in the call stack.
	 */
	public static function stacktrace(): array {
		$backtrace  = debug_backtrace();
		$stacktrace = [];

		foreach ( $backtrace as $index => $trace ) {
			// Skip entries without file or line information.
			if ( ! isset( $trace['file'] ) || ! isset( $trace['line'] ) ) {
				continue;
			}

			// Skip the current method call.
			if ( 0 === $index ) {
				continue;
			}

			$stacktrace[] = $trace['file'] . ': ' . $trace['line'] . "\n";
		}

		return $stacktrace;
	}

	/**
	 * Renders the script tag that logs data to the console.
	 *
	 * @internal This is a private helper method and should not be called directly.
	 *
	 * @param mixed $data  The data to log.
	 * @param bool  $trace If true, a stack trace will also be logged.
	 *
	 * @return void
	 */
	private static function render_log( $data, bool $trace = true ): void {
		$stacktrace = self::stacktrace();

		echo '<script>';
		echo 'console.log(' . json_encode( $data ) . ');';

		// Log each stack trace entry when tracing is enabled.
		if ( $trace && $stacktrace ) {
			foreach ( $stacktrace as $trace ) {
				echo 'console.log(' . json_encode( $trace ) . ');';
			}
		}

		echo '</script>';
	}

}
