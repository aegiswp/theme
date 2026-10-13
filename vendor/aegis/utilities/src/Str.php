<?php

// Enforces strict type checking for all code in this file, ensuring type safety for string utility helpers.
declare( strict_types=1 );

// Declares the namespace for the string utility helpers.
namespace Aegis\Utilities;

// Imports classes, interfaces, and functions used by the string utility helpers.
use function _deprecated_function;
use function capital_P_dangit;
use function esc_html;
use function implode;
use function lcfirst;
use function ltrim;
use function preg_replace;
use function str_contains;
use function str_replace;
use function strlen;
use function strpos;
use function trim;
use function ucwords;
use const DIRECTORY_SEPARATOR;
use const PHP_EOL;

/**
 * String utility class for common string manipulations.
 *
 * This class provides a collection of static methods for string searching,
 * replacement, case conversion, and sanitization.
 *
 * @since 1.0.0
 */
class Str {

	/**
	 * Checks if a string contains any of the given substrings.
	 *
	 * @since 1.0.0
	 *
	 * @param string $haystack The string to search within.
	 * @param string ...$needles A variable number of substrings to search for.
	 *
	 * @return bool True if any of the needles are found, false otherwise.
	 */
	public static function contains_any( string $haystack, ...$needles ): bool {
		foreach ( $needles as $needle ) {
			if ( str_contains( $haystack, $needle ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Checks if a string contains all of the given substrings.
	 *
	 * @since 1.0.0
	 *
	 * @param string $haystack The string to search within.
	 * @param string ...$needles A variable number of substrings to search for.
	 *
	 * @return bool True if all of the needles are found, false otherwise.
	 */
	public static function contains_all( string $haystack, ...$needles ): bool {
		foreach ( $needles as $needle ) {
			if ( ! str_contains( $haystack, $needle ) ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Reduces multiple consecutive whitespace characters to a single space.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string The input string.
	 *
	 * @return string The string with reduced whitespace.
	 */
	public static function reduce_whitespace( string $string ): string {
		return preg_replace( '/\s+/', ' ', $string );
	}

	/**
	 * Removes line breaks and other invisible characters from a string.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string The input string.
	 *
	 * @return string The cleaned string.
	 */
	public static function remove_line_breaks( string $string ): string {

		// Remove zero width spaces and other invisible characters.
		$string = preg_replace( '/^[\pZ\pC]+|[\pZ\pC]+$/u', '', $string );

		// Replace line breaks.
		str_replace( [ "\r", "\n", PHP_EOL, ], '', $string
		);

		return trim( $string );
	}

	/**
	 * Extracts the substring between two delimiter strings.
	 *
	 * @since 1.0.0
	 *
	 * @param string $start  The starting delimiter.
	 * @param string $end    The ending delimiter.
	 * @param string $string The string to search within.
	 * @param bool   $omit   If true, the delimiters are excluded from the result.
	 * @param bool   $all    If true, returns an array of all matches.
	 *
	 * @return string|string[] The matched substring or an array of matches.
	 */
	public static function between( string $start, string $end, string $string, bool $omit = false, bool $all = false ) {
		$ds      = '/'; // Cannot use DIRECTORY_SEPARATOR because of Windows.
		$pattern = $ds . preg_quote( $start, $ds ) . '(.*?)' . preg_quote( $end, $ds ) . '/s';
		preg_match_all( $pattern, $string, $matches );

		$selected_matches = $omit ? $matches[1] : $matches[0];
		$first_match      = $selected_matches[0] ?? '';

		return $all ? $selected_matches : $first_match;
	}

	/**
	 * Removes all characters that are not letters, numbers, or hyphens.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string The string to sanitize.
	 *
	 * @return string The sanitized string.
	 */
	public static function remove_non_alphanumeric( string $string ): string {
		return preg_replace( '/[^A-Za-z0-9\-]/', '', $string );
	}

	/**
	 * Replaces only the first occurrence of a substring.
	 *
	 * @since 1.0.0
	 *
	 * @param string $needle      The substring to search for.
	 * @param string $replacement The string to replace it with.
	 * @param string $haystack    The string to perform the replacement in.
	 *
	 * @return string The modified string.
	 */
	public static function replace_first( string $needle, string $replacement, string $haystack ): string {
		if ( ! $needle || ! $haystack ) {
			return $haystack;
		}

		$position = strpos( $haystack, $needle );

		if ( $position !== false ) {
			$haystack = substr_replace( $haystack, $replacement, $position, strlen( $needle ) );
		}

		return $haystack;
	}

	/**
	 * Converts a string to title case, respecting WordPress naming conventions.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $string The string to convert.
	 * @param string[] $search An array of characters to be replaced with spaces.
	 *
	 * @return string The title-cased and escaped string.
	 */
	public static function title_case( string $string, array $search = [ '-', '_' ] ): string {
		$title_case = trim( ucwords( str_replace( $search, ' ', $string ) ) );

		return esc_html( capital_P_dangit( $title_case ) );
	}

	/**
	 * Converts a camelCase string to kebab-case.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string The camelCase string to convert.
	 *
	 * @return string The kebab-cased string.
	 */
	public static function camel_to_kebab( string $string ): string {
		$strings = preg_split( '/(?=[A-Z])/', lcfirst( $string ) );

		return strtolower( implode( '-', $strings ) );
	}

	/**
	 * Converts kebab-case string to camelCase.
	 *
	 * @deprecated Use `Str::to_camel_case` instead.
	 *
	 * @param string $string kebab-case string to convert.
	 *
	 * @return string
	 */
	public static function kebab_to_camel( string $string ): string {
		_deprecated_function(
			__METHOD__,
			'1.0.0',
			static::class . '::to_camel_case'
		);

		return static::to_camel_case( $string );
	}

	/**
	 * Converts a string with hyphens or underscores to camelCase.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string The input string (e.g., 'kebab-case' or 'snake_case').
	 *
	 * @return string The camelCased string.
	 */
	public static function to_camel_case( string $string ): string {
		return lcfirst(
			str_replace(
				' ', '',
				ucwords(
					str_replace(
						[ '-', '_' ],
						' ',
						$string
					)
				)
			)
		);
	}

	/**
	 * Ensures a string starts with a single slash.
	 *
	 * Removes any existing leading slashes and then adds a single one.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string The string to modify.
	 *
	 * @return string The modified string with a leading slash.
	 */
	public static function leadingslashit( string $string ): string {
		return DIRECTORY_SEPARATOR . self::unleadingslashit( $string );
	}

	/**
	 * Removes any leading slashes from a string.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string The string to modify.
	 *
	 * @return string The string without leading slashes.
	 */
	public static function unleadingslashit( string $string ): string {
		return ltrim( $string, '/\\' );
	}

}
