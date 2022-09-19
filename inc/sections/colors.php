<?php
/**
 * Colors section.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->get_section( 'colors' )->priority = 30;

Aeon_Customize_Field::add_wrapper(
	'aeon_global_color_wrapper',
	array(
		'section' => 'colors',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'global_color',
				'global_color_hover',
			),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[global_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['global_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Global Color', 'aeonwp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'global_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[global_color_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['global_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Global Color Hover', 'aeonwp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'global_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

$wp_customize->add_setting(
	'aeon_settings[background_color]',
	array(
		'default' => $defaults['background_color'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Color_Control(
		$wp_customize,
		'aeon_settings[background_color]',
		array(
			'label' => esc_html__( 'Background Color', 'aeonwp' ),
			'section' => 'colors',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[headings_color]',
	array(
		'default' => $defaults['headings_color'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Color_Control(
		$wp_customize,
		'aeon_settings[headings_color]',
		array(
			'label' => esc_html__( 'Headings Color', 'aeonwp' ),
			'section' => 'colors',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[text_color]',
	array(
		'default' => $defaults['text_color'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Color_Control(
		$wp_customize,
		'aeon_settings[text_color]',
		array(
			'label' => esc_html__( 'Text Color', 'aeonwp' ),
			'section' => 'colors',
		)
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_links_color_wrapper',
	array(
		'section' => 'colors',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'link_color',
				'link_color_hover',
				'link_color_active',
				'link_color_visited',
			),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[link_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['link_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color', 'aeonwp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'link_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[link_color_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['link_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color Hover', 'aeonwp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'link_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[link_color_active]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['link_color_active'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color Active', 'aeonwp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'link_color_active',
			'tooltip' => esc_html__( 'Choose Active Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[link_color_visited]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['link_color_visited'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color Visited', 'aeonwp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'link_color_visited',
			'tooltip' => esc_html__( 'Choose Visited Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_post_title_color_wrapper',
	array(
		'section' => 'colors',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'post_title_color',
				'post_title_color_hover',
			),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[post_title_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['post_title_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Post Title Color', 'aeonwp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'post_title_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[post_title_color_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['post_title_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Post Title Color Hover', 'aeonwp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'post_title_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
		),
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_button_background_color_wrapper',
	array(
		'section' => 'colors',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'button_background_color',
				'button_background_color_hover',
			),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[button_background_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['button_background_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Buttons Background', 'aeonwp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'button_background_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[button_background_color_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['button_background_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Buttons Background Hover', 'aeonwp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'button_background_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_button_color_wrapper',
	array(
		'section' => 'colors',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'button_color',
				'button_color_hover',
			),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[button_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['button_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Buttons Color', 'aeonwp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'button_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[button_color_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['button_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Buttons Color Hover', 'aeonwp' ),
		'section' => 'colors',
		'choices' => array(
			'wrapper' => 'button_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);
