<?php
/**
 * Aeon Theme Customizer
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$dir = AEON_THEME_DIR . 'inc/';

// Controls.
require_once $dir . 'controls/class-aeon-upsell-control.php';
require_once $dir . 'class-aeon-customize-field.php';
require_once $dir . 'controls/class-aeon-heading-control.php';
require_once $dir . 'controls/class-aeon-react-control.php';
require_once $dir . 'controls/class-aeon-color-control.php';
require_once $dir . 'controls/class-aeon-slider-control.php';
require_once $dir . 'controls/class-aeon-resp-slider-control.php';
require_once $dir . 'controls/class-aeon-radio-image-control.php';
require_once $dir . 'controls/class-aeon-select-control.php';
require_once $dir . 'controls/class-aeon-selector-control.php';
require_once $dir . 'controls/class-aeon-spacing-control.php';
require_once $dir . 'controls/class-aeon-social-control.php';
require_once $dir . 'controls/class-aeon-sortable-control.php';
require_once $dir . 'controls/class-aeon-switch-control.php';
require_once $dir . 'controls/class-aeon-editor-control.php';
require_once $dir . 'controls/class-aeon-text-control.php';
require_once $dir . 'controls/class-aeon-action-button-control.php';
require_once $dir . 'controls/class-aeon-description.php';
require_once $dir . 'controls/class-aeon-font-family-control.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aeon_customize_register( $wp_customize ) {
	$defaults = aeon_get_defaults();
	$dir = AEON_THEME_DIR . 'inc/';

	if ( method_exists( $wp_customize, 'register_control_type' ) ) {
		$wp_customize->register_control_type( 'Aeon_Heading_Control' );
		$wp_customize->register_control_type( 'Aeon_Color_Control' );
		$wp_customize->register_control_type( 'Aeon_Slider_Control' );
		$wp_customize->register_control_type( 'Aeon_Resp_Slider_Control' );
		$wp_customize->register_control_type( 'Aeon_Radio_Image_Control' );
		$wp_customize->register_control_type( 'Aeon_Select_Control' );
		$wp_customize->register_control_type( 'Aeon_Selector_Control' );
		$wp_customize->register_control_type( 'Aeon_Spacing_Control' );
		$wp_customize->register_control_type( 'Aeon_Social_Control' );
		$wp_customize->register_control_type( 'Aeon_Sortable_Control' );
		$wp_customize->register_control_type( 'Aeon_Switch_Control' );
		$wp_customize->register_control_type( 'Aeon_Editor_Control' );
		$wp_customize->register_control_type( 'Aeon_Text_Control' );
		$wp_customize->register_control_type( 'Aeon_Action_Button_Control' );
		$wp_customize->register_control_type( 'Aeon_Description_Control' );
		$wp_customize->register_control_type( 'Aeon_Font_Family_Control' );
	}

	if ( method_exists( $wp_customize, 'register_section_type' ) ) {
		$wp_customize->register_section_type( 'Aeon_UpSell_Control' );
	}

	if ( ! defined( 'AEON_PRO_VERSION' ) ) {
		$wp_customize->add_section(
			new Aeon_UpSell_Control(
				$wp_customize,
				'aeon_upsell_section',
				array(
					'pro_text' => esc_html__( 'Pro Modules Available', 'aeonwp' ),
					'pro_url' => aeon_get_premium_url( 'https://www.atmostfear-entertainment.com/aeon/pro' ),
					'capability' => 'edit_theme_options',
					'priority' => 0,
				)
			)
		);
	}

	if ( class_exists( 'WooCommerce' ) ) {
		$wp_customize->get_panel( 'woocommerce' )->priority = 70;
		$wp_customize->get_section( 'woocommerce_checkout' )->priority = 30;
	}

	require_once $dir . 'sections/site-identity.php';
	require_once $dir . 'sections/layout.php';
	require_once $dir . 'sections/colors.php';
	require_once $dir . 'sections/header.php';
	require_once $dir . 'sections/page-header.php';
	require_once $dir . 'sections/blog.php';
	if ( class_exists( 'WooCommerce' ) ) {
		require_once $dir . 'sections/woocommerce.php';
	}
	require_once $dir . 'sections/footer.php';
	require_once $dir . 'sections/performance.php';
}
add_action( 'customize_register', 'aeon_customize_register' );

/**
 * Sanitize a positive number, but allow an empty value.
 *
 * @param string $input The value to check.
 */
function aeon_sanitize_empty_absint( $input ) {
	if ( '' == $input ) {
		return '';
	}

	return absint( $input );
}

/**
 * Sanitize integers.
 *
 * @param string $input The value to check.
 */
function aeon_sanitize_integer( $input ) {
	return absint( $input );
}

/**
 * Sanitize checkbox values.
 *
 * @param string $checked The value to check.
 */
function aeon_sanitize_checkbox( $checked ) {
	// phpcs:ignore WordPress.PHP.StrictComparisons.LooseComparison -- Intentially loose.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Sanitize choices.
 *
 * @param string $input The value to check.
 * @param object $setting The setting object.
 */
function aeon_sanitize_choices( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control.
	// associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it.
	// otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize Select choices
 *
 * @param  string $input    setting input.
 * @param  object $setting  setting object.
 * @return mixed            setting input value.
 */
function aeon_sanitize_multi_choices( $input, $setting ) {

	// Get list of choices from the control
	// associated with the setting.
	$choices    = $setting->manager->get_control( $setting->id )->choices;
	$input_keys = $input;

	foreach ( $input_keys as $key => $value ) {
		if ( ! array_key_exists( $value, $choices ) ) {
			unset( $input[ $key ] );
		}
	}

	// If the input is a valid key, return it;
	// otherwise, return the default.
	return ( is_array( $input ) ? $input : $setting->default );
}

/**
 * Sanitize colors.
 * Allow blank value.
 *
 * @param string $color The color to check.
 */
function aeon_sanitize_hex_color( $color ) {
	// phpcs:ignore WordPress.PHP.StrictComparisons.LooseComparison -- Intentially loose.
	if ( '' === $color ) {
		return '';
	}

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}

	return '';
}

/**
 * Sanitize RGBA colors.
 *
 * @param string $color The color to check.
 */
function aeon_sanitize_rgba_color( $color ) {
	if ( '' === $color ) {
		return '';
	}

	if ( false === strpos( $color, 'rgba' ) ) {
		return aeon_sanitize_hex_color( $color );
	}

	$color = str_replace( ' ', '', $color );
	sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );

	return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
}

/**
 * Sanitize integers that can use decimals.
 *
 * @param string $input The value to check.
 */
function aeon_sanitize_decimal_integer( $input ) {
	return abs( floatval( $input ) );
}

/**
 * Check if numerical value.
 *
 * @param string $value The value to check.
 */
function aeon_check_numberic_values( $value ) {
	return ( is_numeric( $value ) ) ? $value : '';
}

/**
 * Sanitize Responsive Slider
 *
 * @param  array|number $val Customizer setting input number.
 * @param  object       $setting Setting Onject.
 * @return array        Return number.
 */
function aeon_sanitize_responsive_slider( $val, $setting ) {

	$input_attrs = array();
	if ( isset( $setting->manager->get_control( $setting->id )->input_attrs ) ) {
		$input_attrs = $setting->manager->get_control( $setting->id )->input_attrs;
	}

	$responsive = array(
		'desktop' => '',
		'tablet'  => '',
		'mobile'  => '',
	);

	if ( is_array( $val ) ) {
		$responsive['desktop'] = is_numeric( $val['desktop'] ) ? abs( floatval( $val['desktop'] ) ) : '';
		$responsive['tablet'] = is_numeric( $val['tablet'] ) ? abs( floatval( $val['tablet'] ) ) : '';
		$responsive['mobile'] = is_numeric( $val['mobile'] ) ? abs( floatval( $val['mobile'] ) ) : '';
	} else {
		$responsive['desktop'] = is_numeric( $val ) ? abs( floatval( $val ) ) : '';
	}

	foreach ( $responsive as $key => $value ) {
		$responsive[ $key ] = $value;
	}

	return $responsive;
}

/**
 * Sanitize our responsive spacing.
 *
 * @param string $val The value to check.
 */
function aeon_sanitize_responsive_spacing( $val ) {
	$spacing = array(
		'desktop'      => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'tablet'       => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'mobile'       => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
		),
		'desktop-unit' => 'px',
		'tablet-unit'  => 'px',
		'mobile-unit'  => 'px',
	);

	if ( isset( $val['desktop'] ) ) {
		$spacing['desktop'] = array_map( 'aeon_check_numberic_values', $val['desktop'] );

		$spacing['tablet'] = array_map( 'aeon_check_numberic_values', $val['tablet'] );

		$spacing['mobile'] = array_map( 'aeon_check_numberic_values', $val['mobile'] );

		if ( isset( $val['desktop-unit'] ) ) {
			$spacing['desktop-unit'] = $val['desktop-unit'];
		}

		if ( isset( $val['tablet-unit'] ) ) {
			$spacing['tablet-unit'] = $val['tablet-unit'];
		}

		if ( isset( $val['mobile-unit'] ) ) {
			$spacing['mobile-unit'] = $val['mobile-unit'];
		}

		return $spacing;

	} else {
		foreach ( $val as $key => $value ) {
			$val[ $key ] = is_numeric( $val[ $key ] ) ? $val[ $key ] : '';
		}
		return $val;
	}

}

/**
 * Sanitize our editor.
 *
 * @param string $input The value to check.
 */
function aeon_sanitize_html( $input ) {
	return wp_kses_post( $input );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function aeon_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function aeon_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Get a specific property of an array without needing to check if that property exists.
 *
 * Provide a default value if you want to return a specific value if the property is not set.
 *
 * @param array  $array   Array from which the property's value should be retrieved.
 * @param string $prop    Name of the property to be retrieved.
 * @param string $default Optional. Value that should be returned if the property is not set or empty. Defaults to null.
 *
 * @return null|string|mixed The value
 */
function aeon_get_prop( $array, $prop, $default = null ) {

	if ( ! is_array( $array ) && ! ( is_object( $array ) && $array instanceof ArrayAccess ) ) {
		return $default;
	}

	if ( ( isset( $array[ $prop ] ) && false === $array[ $prop ] ) ) {
		return false;
	}

	if ( isset( $array[ $prop ] ) ) {
		$value = $array[ $prop ];
	} else {
		$value = '';
	}

	return empty( $value ) && null !== $default ? $default : $value;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aeon_customize_preview() {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_script(
		'aeon-customizer-preview',
		AEON_THEME_URI . 'inc/controls/js/customizer-preview' . $suffix . '.js',
		array( 'customize-preview' ),
		AEON_VERSION,
		true
	);

	wp_localize_script(
		'aeon-customizer-preview',
		'aeon_preview',
		array(
			'mobile' => aeon_get_media_query( 'mobile' ),
			'tablet' => aeon_get_media_query( 'tablet' ),
			'desktop' => aeon_get_media_query( 'desktop' ),
			'isRTL' => is_rtl(),
		)
	);
}
add_action( 'customize_preview_init', 'aeon_customize_preview', 100 );

/**
 * Add scripts to our controls.
 *
 * We do not want to add these to the controls themselves, as they will be repeated
 * each time the control is initialized.
 */
function aeon_customize_enqueue_scripts() {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_script(
		'aeon-customizer-controls',
		AEON_THEME_URI . 'assets/dist/customizer.js',
		// We are including wp-color-picker for localized strings, nothing more.
		array(
			'customize-controls',
			'wp-i18n',
			'wp-components',
			'wp-element',
			'jquery',
			'customize-base',
			'wp-color-picker'
		),
		AEON_VERSION,
		true
	);

	if ( function_exists( 'wp_set_script_translations' ) ) {
		wp_set_script_translations( 'aeon-customizer-controls', 'aeonwp' );
	}

	$localize = array(
		'100'       => esc_html__( 'Thin 100', 'aeonwp' ),
		'200'       => esc_html__( 'Extra-Light 200', 'aeonwp' ),
		'300'       => esc_html__( 'Light 300', 'aeonwp' ),
		'400'       => esc_html__( 'Normal 400', 'aeonwp' ),
		'500'       => esc_html__( 'Medium 500', 'aeonwp' ),
		'600'       => esc_html__( 'Semi-Bold 600', 'aeonwp' ),
		'700'       => esc_html__( 'Bold 700', 'aeonwp' ),
		'800'       => esc_html__( 'Extra-Bold 800', 'aeonwp' ),
		'900'       => esc_html__( 'Ultra-Bold 900', 'aeonwp' ),
	);

	wp_localize_script(
		'aeon-customizer-controls',
		'aeonControls',
		array(
			'localize' => $localize,
			'regenerate_css' => wp_create_nonce( 'aeon-regenerate-external-css' ),
			'initialCSS' => __( 'Regenerate CSS File', 'aeonwp' ),
			'successCSS' => __( 'Successfully Regenerated', 'aeonwp' ),
			'failedCSS' => __( 'Failed, Please try again later.', 'aeonwp' ),
			'regenerate_fonts' => wp_create_nonce( 'aeon-regenerate-local-fonts' ),
			'initial' => __( 'Flush Local Font Files', 'aeonwp' ),
			'success' => __( 'Successfully Flushed', 'aeonwp' ),
			'failed' => __( 'Failed, Please try again later.', 'aeonwp' ),
		)
	);

	wp_enqueue_style(
		'aeon-customizer-controls',
		AEON_THEME_URI . 'assets/dist/style-customizer.css',
		array( 'wp-components' ),
		AEON_VERSION
	);
}
add_action( 'customize_controls_enqueue_scripts', 'aeon_customize_enqueue_scripts', 100 );

/**
 * Add some CSS only for the customizer preview.
 */
function aeon_customizer_css() {
	$css = new Aeon_CSS();

	$css->set_selector( '.aeon-page-header .hide-breadcrumbs, .aeon-cart-icon.hide-cart, .aeon-count.hide-cart-count, .aeon-cart-total.hide-cart-total, .aeon-cart-mobile.hide-cart, button.menu-toggle .mobile-menu-wrap.hide-mobile-label, .aeon-search-full-screen .search-text.hide-fs-search-text' );
	$css->add_property( 'display', 'none' );

	$css->set_selector( '.aeon-page-header .show-breadcrumbs, .aeon-count.show-cart-count, .show-cart-total, button.menu-toggle .mobile-menu-wrap.show-mobile-label, .aeon-search-full-screen .search-text.show-fs-search-text' );
	$css->add_property( 'display', 'block' );

	$css->set_selector( '.aeon-cart-icon.show-cart' );
	$css->add_property( 'display', 'flex' );

	$css->start_media_query( '(max-width:960px)' );
	$css->set_selector( '.aeon-cart-mobile.hide-cart, .aeon-cart-icon.show-cart' );
	$css->add_property( 'display', 'none' );

	$css->set_selector( '.aeon-cart-mobile.show-cart' );
	$css->add_property( 'display', 'block' );
	$css->stop_media_query();

	// Remove retina and sticky shortcut
	$css->set_selector( '.customize-partial-edit-shortcut-aeon_settings-retina_logo, .customize-partial-edit-shortcut-aeon_settings-sticky_logo, .customize-partial-edit-shortcut-aeon_settings-sticky_retina_logo' );
	$css->add_property( 'display', 'none' );

	do_action( 'aeon_customizer_css', $css );

	return apply_filters( 'aeon_customizer_css_output', $css->css_output() );
}

/**
 * Enqueue scripts.
 */
function aeon_enqueue_scripts() {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	// Add CSS to for the customizer preview.
	$css = aeon_customizer_css();
	if ( is_customize_preview() ) {
		wp_add_inline_style( 'aeon-style', wp_strip_all_tags( $css ) );
	}

	// If search icon.
	if ( 'none' !== aeon_get_option( 'search_style' ) ) {
		wp_enqueue_script(
			'aeon-search',
			AEON_THEME_URI . 'assets/js/search' . $suffix . '.js',
			array(),
			AEON_VERSION,
			true
		);
	}

	// If sticky header.
	if ( true === aeon_get_option( 'add_sticky' ) ) {
		wp_enqueue_script(
			'aeon-sticky',
			AEON_THEME_URI . 'assets/js/sticky' . $suffix . '.js',
			array(),
			AEON_VERSION,
			true
		);

		wp_enqueue_style(
			'aeon-sticky',
			AEON_THEME_URI . 'assets/css/header/sticky' . $suffix . '.css',
			array(),
			AEON_VERSION
		);
	}
}
add_action( 'wp_enqueue_scripts', 'aeon_enqueue_scripts', 100 );
