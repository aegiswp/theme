<?php
/**
 * Footer section.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_section(
	'aeon_footer',
	array(
		'title' => esc_html__( 'Footer', 'aeonwp' ),
		'priority' => 80,
	)
);

$wp_customize->add_setting(
	'aeon_settings[footer_columns]',
	array(
		'default' => $defaults['footer_columns'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_check_numberic_values',
	)
);

$wp_customize->add_control(
	new Aeon_Slider_Control(
		$wp_customize,
		'aeon_settings[footer_columns]',
		array(
			'label' => esc_html__( 'Footer Columns', 'aeonwp' ),
			'section' => 'aeon_footer',
			'default' => $defaults['footer_columns'],
			'settings' => array(
				'size' => 'aeon_settings[footer_columns]',
			),
			'input_attrs' => array(
				'min' => 1,
				'max' => 6,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[footer_padding]',
	array(
		'default' => $defaults['footer_padding'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_responsive_spacing',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Spacing_Control(
		$wp_customize,
		'aeon_settings[footer_padding]',
		array(
			'label' => esc_html__( 'Padding', 'aeonwp' ),
			'section' => 'aeon_footer',
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
	'aeon_settings[footer_copyright]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Aeon_Heading_Control(
		$wp_customize,
		'aeon_settings[footer_copyright]',
		array(
			'label' => esc_html__( 'Copyright', 'aeonwp' ),
			'section' => 'aeon_footer',
			'custom_class' => 'no-separator custom-heading',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[copyright]',
	array(
		'default' => $defaults['copyright'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_html',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Editor_Control(
		$wp_customize,
		'aeon_settings[copyright]',
		array(
			'section' => 'aeon_footer',
			'input_attrs' => array(
				'id' => 'ae-footer-copyright',
			),
			'custom_class' => 'no-separator',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[copyright_align]',
	array(
		'default' => $defaults['copyright_align'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_html_class',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Selector_Control(
		$wp_customize,
		'aeon_settings[copyright_align]',
		array(
			'label' => esc_html__( 'Alignment', 'aeonwp' ),
			'section' => 'aeon_footer',
			'choices'   => array(
				'left'   => aeon_get_svg_icon( 'align-left' ),
				'center' => aeon_get_svg_icon( 'align-center' ),
				'right'  => aeon_get_svg_icon( 'align-right' ),
			),
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[copyright_font_size]',
	array(
		'default' => $defaults['copyright_font_size'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_responsive_slider',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_setting(
	'aeon_settings[copyright_font_size_unit]',
	array(
		'default' => $defaults['copyright_font_size_unit'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Resp_Slider_Control(
		$wp_customize,
		'aeon_settings[copyright_font_size]',
		array(
			'label' => esc_html__( 'Font size', 'aeonwp' ),
			'section' => 'aeon_footer',
			'default' => $defaults['copyright_font_size'],
			'defaultUnit' => $defaults['copyright_font_size_unit'],
			'settings' => array(
				'size' => 'aeon_settings[copyright_font_size]',
				'sizeUnit' => 'aeon_settings[copyright_font_size_unit]',
			),
			'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[copyright_padding]',
	array(
		'default' => $defaults['copyright_padding'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_responsive_spacing',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Spacing_Control(
		$wp_customize,
		'aeon_settings[copyright_padding]',
		array(
			'label' => esc_html__( 'Padding', 'aeonwp' ),
			'section' => 'aeon_footer',
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
	'aeon_settings[footer_design]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Aeon_Heading_Control(
		$wp_customize,
		'aeon_settings[footer_design]',
		array(
			'label' => esc_html__( 'Design', 'aeonwp' ),
			'section' => 'aeon_footer',
			'custom_class' => 'no-separator custom-heading',
		)
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_footer_colors_wrapper',
	array(
		'section' => 'aeon_footer',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'footer_background',
				'footer_titles_color',
				'footer_text_color',
			),
		),
		'custom_class' => 'no-separator',
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[footer_background]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['footer_background'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
	),
	array(
		'label' => esc_html__( 'Footer Colors', 'aeonwp' ),
		'section' => 'aeon_footer',
		'choices' => array(
			'wrapper' => 'footer_background',
			'tooltip' => esc_html__( 'Background Color', 'aeonwp' ),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[footer_titles_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['footer_titles_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
	),
	array(
		'label' => esc_html__( 'Footer Titles', 'aeonwp' ),
		'section' => 'aeon_footer',
		'choices' => array(
			'wrapper' => 'footer_titles_color',
			'tooltip' => esc_html__( 'Titles Color', 'aeonwp' ),
			'hideLabel' => true,
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[footer_text_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['footer_text_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
	),
	array(
		'label' => esc_html__( 'Text Color', 'aeonwp' ),
		'section' => 'aeon_footer',
		'choices' => array(
			'wrapper' => 'footer_text_color',
			'tooltip' => esc_html__( 'Text Color', 'aeonwp' ),
			'hideLabel' => true,
		),
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_footer_links_color_wrapper',
	array(
		'section' => 'aeon_footer',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'footer_links',
				'footer_links_hover',
			),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[footer_links]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['footer_links'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Footer Links', 'aeonwp' ),
		'section' => 'aeon_footer',
		'choices' => array(
			'wrapper' => 'footer_links',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[footer_links_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['footer_links_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Footer Links Hover', 'aeonwp' ),
		'section' => 'aeon_footer',
		'choices' => array(
			'wrapper' => 'footer_links_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_copyright_colors_wrapper',
	array(
		'section' => 'aeon_footer',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'copyright_background',
				'copyright_text_color',
			),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[copyright_background]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['copyright_background'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
	),
	array(
		'label' => esc_html__( 'Copyright Colors', 'aeonwp' ),
		'section' => 'aeon_footer',
		'choices' => array(
			'wrapper' => 'copyright_background',
			'tooltip' => esc_html__( 'Background Color', 'aeonwp' ),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[copyright_text_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['copyright_text_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
	),
	array(
		'label' => esc_html__( 'Text Color', 'aeonwp' ),
		'section' => 'aeon_footer',
		'choices' => array(
			'wrapper' => 'copyright_text_color',
			'tooltip' => esc_html__( 'Text Color', 'aeonwp' ),
			'hideLabel' => true,
		),
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_copyright_links_color_wrapper',
	array(
		'section' => 'aeon_footer',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'copyright_links',
				'copyright_links_hover',
			),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[copyright_links]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['copyright_links'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Copyright Links', 'aeonwp' ),
		'section' => 'aeon_footer',
		'choices' => array(
			'wrapper' => 'copyright_links',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[copyright_links_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['copyright_links_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Copyright Links Hover', 'aeonwp' ),
		'section' => 'aeon_footer',
		'choices' => array(
			'wrapper' => 'copyright_links_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);
