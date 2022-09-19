<?php
/**
 * Performance section.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_section(
	'aeon_performance',
	array(
		'title' => esc_html__( 'Performance', 'aeonwp' ),
		'priority' => 90,
	)
);

$wp_customize->add_setting(
	'aeon_settings[load_css_file]',
	array(
		'default' => $defaults['load_css_file'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_checkbox',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Switch_Control(
		$wp_customize,
		'aeon_settings[load_css_file]',
		array(
			'label' => esc_html__( 'Load Dynamic CSS In External File', 'aeonwp' ),
			'description' => esc_html__( 'Generating your dynamic CSS in an external file offers significant performance advantages.', 'aeonwp' ),
			'section' => 'aeon_performance',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[regenerate_external_css]',
	array(
		'type' => 'option',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Action_Button_Control(
		$wp_customize,
		'aeon_settings[regenerate_external_css]',
		array(
			'label' => esc_html__( 'Regenerate CSS', 'aeonwp' ),
			'description' => esc_html__( 'Click the button to regenerate your CSS file.', 'aeonwp' ),
			'button' => esc_html__( 'Regenerate CSS File', 'aeonwp' ),
			'custom_class' => 'aeon-regenerate-css',
			'section' => 'aeon_performance',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[load_fonts_locally]',
	array(
		'default' => $defaults['load_fonts_locally'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_checkbox',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Switch_Control(
		$wp_customize,
		'aeon_settings[load_fonts_locally]',
		array(
			'label' => esc_html__( 'Load Google Fonts Locally', 'aeonwp' ),
			'section' => 'aeon_performance',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[preload_local_fonts]',
	array(
		'default' => $defaults['preload_local_fonts'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_checkbox',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Switch_Control(
		$wp_customize,
		'aeon_settings[preload_local_fonts]',
		array(
			'label' => esc_html__( 'Preload Local Fonts', 'aeonwp' ),
			'section' => 'aeon_performance',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[flush_local_font_files]',
	array(
		'type' => 'option',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Action_Button_Control(
		$wp_customize,
		'aeon_settings[flush_local_font_files]',
		array(
			'label' => esc_html__( 'Flush Local Fonts', 'aeonwp' ),
			'description' => esc_html__( 'Click the button to reset the local fonts cache.', 'aeonwp' ),
			'button' => esc_html__( 'Flush Local Font Files', 'aeonwp' ),
			'custom_class' => 'aeon-regenerate-fonts',
			'section' => 'aeon_performance',
		)
	)
);
