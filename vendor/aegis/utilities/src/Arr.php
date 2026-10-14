<?php

// Enforces strict type checking for all code in this file, ensuring type safety for array utility helpers.
declare( strict_types=1 );

// Declares the namespace for the array utility helpers.
namespace Aegis\Utilities;

// Imports classes, interfaces, and functions used by the array utility helpers.
use function in_array;
use function is_array;
use function is_string;

/**
 * Array utility class for common array operations.
 *
 * This class provides a set of static methods for array manipulation, such as
 * searching for values and converting keys to a different case format.
 *
 * @since 1.0.0
 */
class Arr {

	/**
	 * Checks if any of the given values in `needles` exist in the `haystack` array.
	 *
	 * @since 1.0.0
	 *
	 * @param array $haystack The array to search in.
	 * @param array $needles  The values to search for.
	 *
	 * @return bool True if any needle is found in the haystack, false otherwise.
	 */
	public static function contains_any( array $haystack, array $needles ): bool {
		foreach ( $needles as $needle ) {
			if ( in_array( $needle, $haystack, true ) ) {
				// Return early when a matching value is found.
				return true;
			}
		}

		return false;
	}

	/**
	 * Recursively converts all string keys in an array to camel case.
	 *
	 * Example:
	 * `[ 'first_name' => 'John', 'user_details' => [ 'last_name' => 'Doe' ] ]`
	 * becomes
	 * `[ 'firstName' => 'John', 'userDetails' => [ 'lastName' => 'Doe' ] ]`
	 *
	 * @since 1.0.0
	 *
	 * @param array $array The array to convert.
	 *
	 * @return array The new array with camel-cased keys.
	 */
	public static function keys_to_camel_case( array $array ): array {
		$converted = [];

		foreach ( $array as $key => $value ) {
			// Convert string keys to camel case.
			if ( is_string( $key ) ) {
				$key = Str::to_camel_case( $key );
			}

			// Recursively convert nested array keys.
			$converted[ $key ] = is_array( $value ) ? static::keys_to_camel_case( $value ) : $value;
		}

		return $converted;
	}
}
