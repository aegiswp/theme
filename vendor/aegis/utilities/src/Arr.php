<?php
/**
 * Aegis Array Utilities
 *
 * Provides utility functions for array operations within the Aegis Framework.
 *
 * Responsibilities:
 * - Offers helper methods for common array checks and manipulations
 * - Ensures consistency and reusability of array logic across the framework
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

// Imports native PHP array and type-checking functions for utility logic.
use function in_array;
use function is_array;
use function is_string;

// Implements the Aegis array utility class for reusable array operations.

class Arr {

	/**
	 * Check if any of the given values in needles exist in the haystack array.
	 *
	 * @since 1.0.0
	 *
	 * @param array $haystack The array to search in.
	 * @param array $needles  The values to search for.
	 *
	 * @return bool
	 */
	public static function contains_any( array $haystack, array $needles ): bool {
		foreach ( $needles as $needle ) {
			if ( in_array( $needle, $haystack, true ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Recursively converts all array keys to camel case.
	 *
	 * @since 1.0.0
	 *
	 * @param array $array The array to convert.
	 *
	 * @return array
	 */
	public static function keys_to_camel_case( array $array ): array {
		$converted = [];

		foreach ( $array as $key => $value ) {
			if ( is_string( $key ) ) {
				$key = Str::to_camel_case( $key );
			}

			$converted[ $key ] = is_array( $value ) ? static::keys_to_camel_case( $value ) : $value;
		}

		return $converted;
	}
}
