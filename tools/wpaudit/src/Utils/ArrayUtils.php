<?php
/**
 * Array utility functions.
 *
 * @package WPAudit
 */

declare( strict_types=1 );

namespace WPAudit\Utils;

/**
 * Provides static array utility methods.
 */
class ArrayUtils {
	/**
	 * Recursively merge arrays with distinct values.
	 *
	 * Unlike array_merge_recursive(), this replaces scalar values
	 * instead of converting them to arrays.
	 *
	 * @param array $array1 Base array.
	 * @param array $array2 Array to merge.
	 * @return array Merged array.
	 */
	public static function merge_recursive_distinct( array $array1, array $array2 ): array {
		$merged = $array1;

		foreach ( $array2 as $key => $value ) {
			if ( is_array( $value ) && isset( $merged[ $key ] ) && is_array( $merged[ $key ] ) ) {
				$merged[ $key ] = self::merge_recursive_distinct( $merged[ $key ], $value );
			} else {
				$merged[ $key ] = $value;
			}
		}

		return $merged;
	}
}
