<?php
/**
 * Site Identity section.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->get_section( 'title_tagline' )->priority = 1;
$wp_customize->get_control( 'blogname' )->priority = 1;
$wp_customize->get_control( 'blogdescription' )->priority = 3;
$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'aeon_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'aeon_customize_partial_blogdescription',
		)
	);
}

$wp_customize->add_setting(
	'aeon_settings[show_site_title]',
	array(
		'default' => $defaults['show_site_title'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Aeon_Switch_Control(
		$wp_customize,
		'aeon_settings[show_site_title]',
		array(
			'label' => esc_html__( 'Display Site Title', 'aeonwp' ),
			'section' => 'title_tagline',
			'priority' => 2,
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[show_tagline]',
	array(
		'default' => $defaults['show_tagline'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Aeon_Switch_Control(
		$wp_customize,
		'aeon_settings[show_tagline]',
		array(
			'label' => esc_html__( 'Display Tagline', 'aeonwp' ),
			'section' => 'title_tagline',
			'priority' => 4,
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'aeon_settings[retina_logo]',
		array(
			'selector'            => '.site-header-inner .site-branding',
			'container_inclusive' => true,
			'render_callback'     => 'aeon_add_logo',
			'fallback_refresh'    => false,
		)
	);
}

$wp_customize->add_setting(
	'aeon_settings[add_retina_logo]',
	array(
		'default' => $defaults['add_retina_logo'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_checkbox',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Switch_Control(
		$wp_customize,
		'aeon_settings[add_retina_logo]',
		array(
			'label' => esc_html__( 'Add Retina Logo', 'aeonwp' ),
			'section' => 'title_tagline',
			'priority' => 50,
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[retina_logo]',
	array(
		'default' => $defaults['retina_logo'],
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'aeon_settings[retina_logo]',
		array(
			'label' => esc_html__( 'Retina Logo', 'aeonwp' ),
			'section' => 'title_tagline',
			'priority' => 50,
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[logo_width]',
	array(
		'default' => $defaults['logo_width'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_responsive_slider',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_setting(
	'aeon_settings[logo_width_unit]',
	array(
		'default' => $defaults['logo_width_unit'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Resp_Slider_Control(
		$wp_customize,
		'aeon_settings[logo_width]',
		array(
			'label' => esc_html__( 'Logo Size', 'aeonwp' ),
			'section' => 'title_tagline',
			'default' => $defaults['logo_width'],
			'defaultUnit' => $defaults['logo_width_unit'],
			'settings' => array(
				'size' => 'aeon_settings[logo_width]',
				'sizeUnit' => 'aeon_settings[logo_width_unit]',
			),
			'input_attrs' => array(
				'max'  => 600,
				'step' => 1,
			),
			'suffix' => array( 'px', 'em', 'rem', '%' ),
			'priority' => 50,
		)
	)
);
