<?php

// Enforces strict type checking for all code in this file, ensuring type safety for json utility helpers.
declare( strict_types=1 );

// Declares the namespace for the json utility helpers.
namespace Aegis\Utilities;

// Imports classes, interfaces, and functions used by the json utility helpers.
use function _wp_to_kebab_case;
use function is_array;
use function str_replace;
use function strtolower;

/**
 * JSON utility class for handling theme.json style data.
 *
 * This class provides methods to process and flatten nested setting arrays,
 * similar to how WordPress core handles `theme.json` data for generating
 * CSS custom properties.
 *
 * @since 1.0.0
 */
class JSON {

	/**
	 * Converts a nested array of custom values into a flat array of CSS Custom
	 * Properties.
	 *
	 * This method takes a settings array, flattens it, and prepends the
	 * `--wp--custom--` prefix to each key.
	 *
	 * @see WP_Theme_JSON::compute_theme_vars()
	 *
	 * @since 1.0.0
	 *
	 * @param array $custom_values The nested array of settings to process.
	 *
	 * @return array A flat associative array of CSS Custom Properties.
	 */
	public static function compute_theme_vars( array $custom_values ): array {
		$declarations = [];
		// Flatten the nested custom values tree.
		$css_vars     = self::flatten_tree( $custom_values );

		// Prefix each key with the WordPress custom property namespace.
		foreach ( $css_vars as $key => $value ) {
			$declarations[ '--wp--custom--' . $key ] = $value;
		}

		return $declarations;
	}

	/**
	 * Flattens a nested array by merging keys.
	 *
	 * This method recursively processes a nested array, combining parent and child
	 * keys to create a flat, single-level array. It also converts keys to
	 * kebab-case.
	 *
	 * Example:
	 * `[ 'nestedProperty' => [ 'subProperty' => 'value' ] ]`
	 * becomes
	 * `[ 'nested-property--sub-property' => 'value' ]`
	 *
	 * @see WP_Theme_JSON::flatten_tree()
	 *
	 * @since 1.0.0
	 *
	 * @param array  $tree   The nested array to flatten.
	 * @param string $prefix Optional. A prefix to prepend to each generated key.
	 * @param string $token  Optional. The separator to use between key levels.
	 *
	 * @return array The flattened array.
	 */
	public static function flatten_tree( array $tree, string $prefix = '', string $token = '--' ): array {
		$result = [];

		foreach ( $tree as $property => $value ) {
			// Build the kebab-case key for the current property.
			$new_key = $prefix . str_replace(
					'/',
					'-',
					strtolower( _wp_to_kebab_case( $property ) )
				);

			if ( is_array( $value ) ) {
				// Recursively flatten nested arrays.
				$new_prefix        = $new_key . $token;
				$flattened_subtree = self::flatten_tree( $value, $new_prefix, $token );

				foreach ( $flattened_subtree as $subtree_key => $subtree_value ) {
					$result[ $subtree_key ] = $subtree_value;
				}

			} else {
				// Store leaf values at the flattened key.
				$result[ $new_key ] = $value;
			}
		}

		return $result;
	}
}
