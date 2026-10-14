<?php

// Enforces strict type checking for all code in this file, ensuring type safety for css utility helpers.
declare( strict_types=1 );

// Declares the namespace for the css utility helpers.
namespace Aegis\Dom;

// Imports classes, interfaces, and functions used by the css utility helpers.
use function array_key_last;
use function array_merge;
use function count;
use function explode;
use function file_exists;
use function get_template_directory;
use function in_array;
use function is_array;
use function is_null;
use function is_string;
use function preg_replace;
use function rtrim;
use function str_contains;
use function str_replace;
use function trim;
use function wp_json_file_decode;

/**
 * CSS utility class.
 *
 * @since 1.0.0
 */
class CSS {

	/**
	 * Converts an associative array of CSS rules into a CSS string.
	 *
	 * Example:
	 * [ 'color' => 'red', 'background' => 'blue' ]
	 * becomes
	 * 'color:red;background:blue;'
	 *
	 * @since 1.0.0
	 *
	 * @param array $styles Associative array of CSS rules.
	 * @param bool  $trim   Whether to trim the trailing semicolon.
	 *
	 * @return string The CSS string.
	 */
	public static function array_to_string( array $styles, bool $trim = false ): string {
		$css = '';

		foreach ( $styles as $property => $value ) {
			if ( is_null( $value ) || is_array( $value ) ) {
				continue;
			}

			$value     = self::format_custom_property( (string) $value );
			$semicolon = $trim && $property === array_key_last( $styles ) ? '' : ';';
			$css       .= $property . ':' . $value . $semicolon;
		}

		return rtrim( $css, ';' );
	}

	/**
	 * Formats custom property values to be valid CSS.
	 *
	 * Handles `var:preset|color|slug` format by converting it to
	 * `var(--wp--preset--color--slug)`.
	 *
	 * @since 1.0.0
	 *
	 * @param string|null $custom_property Custom property value to format.
	 *
	 * @return string|null The formatted custom property value.
	 */
	public static function format_custom_property( ?string $custom_property ): ?string {
		if ( ! $custom_property ) {
			return $custom_property;
		}

		if ( str_contains( $custom_property, 'var:' ) ) {
			return str_replace(
				[ 'var:', '|', ],
				[ 'var(--wp--', '--', ],
				$custom_property . ')'
			);
		}

		static $global_settings = null;
		static $theme_json = null;

		if ( is_null( $global_settings ) ) {
			$global_settings = function_exists( 'wp_get_global_settings' ) ? wp_get_global_settings() : [];
		}

		if ( ! $global_settings ) {
			return $custom_property;
		}

		if ( is_null( $theme_json ) ) {
			$theme_json_file = get_template_directory() . '/theme.json';
			$theme_json      = [];

			if ( file_exists( $theme_json_file ) ) {
				$theme_json = wp_json_file_decode( $theme_json_file );
			}
		}

		if ( ! $theme_json ) {
			return $custom_property;
		}

		if ( ! isset( $global_settings['color']['palette']['theme'] ) && ! isset( $theme_json->settings->color->palette ) ) {
			return $custom_property;
		}

		$colors = array_merge(
			(array) ( $global_settings['color']['palette']['theme'] ?? [] ),
			(array) $theme_json->settings->color->palette
		);

		$system_colors = [
			'current',
			'currentcolor',
			'currentColor',
			'inherit',
			'initial',
			'transparent',
			'unset',
		];

		if ( in_array( $custom_property, $system_colors, true ) ) {
			if ( $custom_property === 'current' ) {
				return 'currentcolor';
			}
		}

		$color_slugs = array_diff(
			wp_list_pluck( $colors, 'slug' ),
			$system_colors
		);

		if ( in_array( $custom_property, $color_slugs, true ) ) {
			return "var(--wp--preset--color--{$custom_property})";
		}

		return $custom_property;
	}

	/**
	 * Converts a CSS string into an associative array of CSS rules.
	 *
	 * Example:
	 * 'color:red;background:blue;'
	 * becomes
	 * [ 'color' => 'red', 'background' => 'blue' ]
	 *
	 * @since 1.0.0
	 *
	 * @param string $css CSS string to convert.
	 *
	 * @return array Associative array of CSS rules.
	 */
	public static function string_to_array( string $css ): array {
		$array = [];

		// Prevent svg url strings from being split.
		$css = str_replace( 'xml;', 'xml$', $css );

		$elements = explode( ';', $css );

		foreach ( $elements as $element ) {
			$parts = explode( ':', $element, 2 );

			if ( isset( $parts[1] ) ) {
				$property = $parts[0];
				$value    = $parts[1];

				if ( $value !== '' && $value !== 'null' ) {
					$value = str_replace( 'xml$', 'xml;', $value );
					$value = self::format_custom_property( (string) $value );

					if ( $value ) {
						$array[ $property ] = $value;
					}
				}
			}
		}

		return $array;
	}

	/**
	 * Adds shorthand CSS properties to a styles array.
	 *
	 * This function will add a shorthand property to the styles array if it does not
	 * already exist. It can handle both string and array values.
	 *
	 * @since 1.0.0
	 *
	 * @param array        $styles   Existing CSS array.
	 * @param string       $property CSS property to add. E.g. 'margin'.
	 * @param array|string $values   CSS values to add.
	 *
	 * @return array The updated styles array.
	 */
	public static function add_shorthand_property( array $styles, string $property, $values ): array {
		if ( empty( $values ) || isset( $styles[ $property ] ) ) {
			return $styles;
		}

		if ( is_string( $values ) ) {
			$styles[ $property ] = self::format_custom_property( $values );

			return $styles;
		}

		$sides = [ 'top', 'right', 'bottom', 'left' ];

		if ( count( $values ) === 1 ) {
			foreach ( $values as $side => $value ) {
				if ( ! in_array( $side, $sides, true ) ) {
					continue;
				}

				$styles[ $property . '-' . $side ] = self::format_custom_property( $value );
			}

			return $styles;
		}

		$has_top    = isset( $values['top'] );
		$has_right  = isset( $values['right'] );
		$has_bottom = isset( $values['bottom'] );
		$has_left   = isset( $values['left'] );

		if ( ! $has_top && ! $has_right && ! $has_bottom && ! $has_left ) {
			return $styles;
		}

		$top    = self::format_custom_property( $values['top'] ?? '0' );
		$right  = self::format_custom_property( $values['right'] ?? '0' );
		$bottom = self::format_custom_property( $values['bottom'] ?? '0' );
		$left   = self::format_custom_property( $values['left'] ?? '0' );

		unset( $styles[ $property . '-top' ] );
		unset( $styles[ $property . '-right' ] );
		unset( $styles[ $property . '-bottom' ] );
		unset( $styles[ $property . '-left' ] );

		if ( $top === $right && $right === $bottom && $bottom === $left ) {
			$styles[ $property ] = self::format_custom_property( $top );
		} else {
			if ( $top === $bottom && $left === $right ) {
				$styles[ $property ] = "$top $right";
			} else {
				$styles[ $property ] = "$top $right $bottom $left";
			}
		}

		return $styles;
	}

	/**
	 * Normalizes and compacts inline CSS declaration strings.
	 *
	 * Intended for inline `style` attribute values (property: value pairs),
	 * not full stylesheets with selectors or at-rules.
	 *
	 * @since 1.0.0
	 *
	 * @param string $css Inline CSS declarations to normalize.
	 *
	 * @return string Compacted CSS declarations.
	 */
	public static function minify( string $css ): string {
		$css = trim( $css );

		if ( $css === '' ) {
			return '';
		}

		// Remove block comments from inline declaration strings.
		$css = preg_replace( '/\/\*.*?\*\//s', '', $css ) ?? $css;

		// Collapse whitespace and normalize property separators.
		$css = preg_replace( '/\s+/', ' ', $css ) ?? $css;
		$css = preg_replace( '/\s*:\s*/', ':', $css ) ?? $css;
		$css = preg_replace( '/\s*;\s*/', ';', $css ) ?? $css;
		$css = trim( $css, " ;" );

		if ( $css === '' ) {
			return '';
		}

		$declarations = self::string_to_array( $css );
		$normalized   = [];

		foreach ( $declarations as $property => $value ) {
			$property = trim( $property );

			if ( $property === '' ) {
				continue;
			}

			$normalized[ $property ] = is_string( $value ) ? trim( $value ) : $value;
		}

		if ( $normalized === [] ) {
			return '';
		}

		return self::array_to_string( $normalized );
	}
}
