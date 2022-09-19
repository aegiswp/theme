<?php
/**
 * Page Header section.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_section(
	'aeon_page_header',
	array(
		'title' => esc_html__( 'Page Header', 'aeonwp' ),
		'priority' => 60,
	)
);

$wp_customize->add_setting(
	'aeon_settings[hide_title]',
	array(
		'default' => $defaults['hide_title'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Aeon_Switch_Control(
		$wp_customize,
		'aeon_settings[hide_title]',
		array(
			'label' => esc_html__( 'Hide Page Title', 'aeonwp' ),
			'section' => 'aeon_page_header',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[add_breadcrumbs]',
	array(
		'default' => $defaults['add_breadcrumbs'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_checkbox',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Switch_Control(
		$wp_customize,
		'aeon_settings[add_breadcrumbs]',
		array(
			'label' => esc_html__( 'Add Breadcrumbs', 'aeonwp' ),
			'section' => 'aeon_page_header',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[page_header_padding]',
	array(
		'default' => $defaults['page_header_padding'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_responsive_spacing',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Spacing_Control(
		$wp_customize,
		'aeon_settings[page_header_padding]',
		array(
			'label' => esc_html__( 'Padding', 'aeonwp' ),
			'section' => 'aeon_page_header',
			'choices' => array(
				'top'    => esc_html__( 'Top', 'aeonwp' ),
				'right'  => esc_html__( 'Right', 'aeonwp' ),
				'bottom' => esc_html__( 'Bottom', 'aeonwp' ),
				'left'   => esc_html__( 'Left', 'aeonwp' ),
			),
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[page_header_design]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Aeon_Heading_Control(
		$wp_customize,
		'aeon_settings[page_header_design]',
		array(
			'label' => esc_html__( 'Design', 'aeonwp' ),
			'section' => 'aeon_page_header',
			'custom_class' => 'no-separator custom-heading',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[page_header_background]',
	array(
		'default' => $defaults['page_header_background'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Color_Control(
		$wp_customize,
		'aeon_settings[page_header_background]',
		array(
			'label' => esc_html__( 'Background Color', 'aeonwp' ),
			'section' => 'aeon_page_header',
			'custom_class' => 'no-separator',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[page_header_title_color]',
	array(
		'default' => $defaults['page_header_title_color'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Color_Control(
		$wp_customize,
		'aeon_settings[page_header_title_color]',
		array(
			'label' => esc_html__( 'Title Color', 'aeonwp' ),
			'section' => 'aeon_page_header',
		)
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_page_header_breadcrumbs_text_separator_color_wrapper',
	array(
		'section' => 'aeon_page_header',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'page_header_breadcrumbs_text_color',
				'page_header_breadcrumbs_separator_color',
			),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[page_header_breadcrumbs_text_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['page_header_breadcrumbs_text_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Breadcrumbs Color', 'aeonwp' ),
		'section' => 'aeon_page_header',
		'choices' => array(
			'wrapper' => 'page_header_breadcrumbs_text_color',
			'tooltip' => esc_html__( 'Text Color', 'aeonwp' ),
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[page_header_breadcrumbs_separator_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['page_header_breadcrumbs_separator_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Separator Color', 'aeonwp' ),
		'section' => 'aeon_page_header',
		'choices' => array(
			'wrapper' => 'page_header_breadcrumbs_separator_color',
			'tooltip' => esc_html__( 'Separator Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_page_header_breadcrumbs_links_wrapper',
	array(
		'section' => 'aeon_page_header',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'page_header_breadcrumbs_links',
				'page_header_breadcrumbs_links_hover',
			),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[page_header_breadcrumbs_links]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['page_header_breadcrumbs_links'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Breadcrumbs Links', 'aeonwp' ),
		'section' => 'aeon_page_header',
		'choices' => array(
			'wrapper' => 'page_header_breadcrumbs_links',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[page_header_breadcrumbs_links_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['page_header_breadcrumbs_links_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Breadcrumbs Links Hover', 'aeonwp' ),
		'section' => 'aeon_page_header',
		'choices' => array(
			'wrapper' => 'page_header_breadcrumbs_links_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);
