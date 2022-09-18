<?php
/**
 * WooCommerce section.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->get_panel( 'woocommerce' )->priority = 71;

$wp_customize->add_setting(
	'aeon_settings[shop_columns]',
	array(
		'default' => $defaults['shop_columns'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_responsive_slider',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Resp_Slider_Control(
		$wp_customize,
		'aeon_settings[shop_columns]',
		array(
			'label' => esc_html__( 'Shop Columns', 'aeonwp' ),
			'section' => 'woocommerce_product_catalog',
			'default' => $defaults['shop_columns'],
			'settings' => array(
				'size' => 'aeon_settings[shop_columns]',
			),
			'input_attrs' => array(
				'min'  => 1,
				'max'  => 6,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[shop_no_of_products]',
	array(
		'default' => $defaults['shop_no_of_products'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_check_numberic_values',
	)
);

$wp_customize->add_control(
	new Aeon_Slider_Control(
		$wp_customize,
		'aeon_settings[shop_no_of_products]',
		array(
			'label' => esc_html__( 'Products Per Page', 'aeonwp' ),
			'section' => 'woocommerce_product_catalog',
			'default' => $defaults['shop_no_of_products'],
			'settings' => array(
				'size' => 'aeon_settings[shop_no_of_products]',
			),
			'input_attrs' => array(
				'min' => 1,
				'max' => 100,
				'step' => 1,
			),
		)
	)
);
