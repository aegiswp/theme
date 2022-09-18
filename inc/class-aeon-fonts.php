<?php
/**
 * Helper class for font settings.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Aeon_Fonts {

	/**
	 * Get fonts to generate.
	 *
	 * @var array $fonts
	 */
	private static $fonts = array();

	/**
	 * Adds data to the $fonts array for a font to be rendered.
	 *
	 * @param string $name The name key of the font to add.
	 * @param array  $variants An array of weight variants.
	 * @return void
	 */
	public static function add_font( $name, $variants = array() ) {

		if ( 'inherit' == $name ) {
			return;
		}
		if ( ! is_array( $variants ) ) {
			// For multiple variant selectons for fonts.
			$variants = explode( ',', str_replace( 'italic', 'i', $variants ) );
		}

		if ( is_array( $variants ) ) {
			$key = array_search( 'inherit', $variants );
			if ( false !== $key ) {

				unset( $variants[ $key ] );

				if ( ! in_array( 400, $variants ) ) {
					$variants[] = 400;
				}
			}
		} elseif ( 'inherit' == $variants ) {
			$variants = 400;
		}

		if ( isset( self::$fonts[ $name ] ) ) {
			foreach ( (array) $variants as $variant ) {
				if ( ! in_array( $variant, self::$fonts[ $name ]['variants'] ) ) {
					self::$fonts[ $name ]['variants'][] = $variant;
				}
			}
		} else {
			self::$fonts[ $name ] = array(
				'variants' => (array) $variants,
			);
		}
	}

	/**
	 * Get fonts.
	 */
	public static function get_fonts() {
		do_action( 'aeon_get_fonts' );
		return apply_filters( 'aeon_add_fonts', self::$fonts );
	}

	/**
	 * Renders the <link> tag for all fonts in the $fonts array.
	 *
	 * @return void
	 */
	public static function render_fonts() {

		$font_list = apply_filters( 'aeon_render_fonts', self::get_fonts() );

		$google_fonts = array();
		$font_subset  = array();

		$system_fonts = array(
			'Arial',
			'Helvetica',
			'Times New Roman',
			'Georgia',
		);

		foreach ( $font_list as $name => $font ) {
			if ( ! empty( $name ) && ! isset( $system_fonts[ $name ] ) ) {

				// Add font variants.
				$google_fonts[ $name ] = $font['variants'];

				// Add Subset.
				$subset = apply_filters( 'aeon_font_subset', '', $name );
				if ( ! empty( $subset ) ) {
					$font_subset[] = $subset;
				}
			}
		}

		$google_font_url = self::google_fonts_url( $google_fonts, $font_subset );

		// Do not load Google Fonts remote or local font asset if not any font selected.
		if ( '' === $google_font_url ) {
			return;
		}

		/**
		 * Enqueue Fonts.
		 */
		if ( aeon_get_option( 'load_fonts_locally' ) && ! is_customize_preview() && ! is_admin() ) {
			if ( aeon_get_option( 'preload_local_fonts' ) ) {
				aeon_preload_fonts( $google_font_url );
			}
			wp_enqueue_style( 'aeon-google-fonts', aeon_get_webfont_url( $google_font_url ), array(), AEON_VERSION, 'all' );
		} else {
			wp_enqueue_style( 'aeon-google-fonts', $google_font_url, array(), AEON_VERSION, 'all' );
		}
	}
	
	/**
	 * Get the value for font-display property.
	 *
	 * @return string
	 */
	public static function display_property() {
		return apply_filters( 'aeon_fonts_display_property', 'fallback' );
	}

	/**
	 * Google Font URL.
	 * Combine multiple google font in one URL.
	 *
	 * @link https://shellcreeper.com/how-to-load-multiple-google-font-in-one-url-request/
	 * @param array $fonts      Google Fonts array.
	 * @param array $subsets    Font's Subsets array.
	 *
	 * @return string
	 */
	public static function google_fonts_url( $fonts, $subsets = array() ) {

		/* URL */
		$base_url  = 'https://fonts.googleapis.com/css';
		$font_args = array();
		$family    = array();

		$fonts = apply_filters( 'aeon_google_fonts_selected', $fonts );

		/* Format each Font Family in array */
		foreach ( $fonts as $font_name => $font_weight ) {
			$font_name = str_replace( ' ', '+', $font_name );
			if ( ! empty( $font_weight ) ) {
				if ( is_array( $font_weight ) ) {
					$font_weight = implode( ',', $font_weight );
				}
				$font_family = explode( ',', $font_name );
				$font_family = str_replace( "'", '', aeon_get_prop( $font_family, 0 ) );
				$family[]    = trim( $font_family . ':' . rawurlencode( trim( $font_weight ) ) );
			} else {
				$family[] = trim( $font_name );
			}
		}

		/* Only return URL if font family defined. */
		if ( ! empty( $family ) ) {

			/* Make font family a String */
			$family = implode( '|', $family );

			/* Add font family in args */
			$font_args['family'] = $family;

			/* Add font subsets in args */
			if ( ! empty( $subsets ) ) {

				/* format subsets to string */
				if ( is_array( $subsets ) ) {
					$subsets = implode( ',', $subsets );
				}

				$font_args['subset'] = rawurlencode( trim( $subsets ) );
			}

			$font_args['display'] = self::display_property();

			return add_query_arg( $font_args, $base_url );
		}

		return '';
	}
}
