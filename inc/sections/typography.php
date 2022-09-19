<?php
/**
 * Typography related functions.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'aeon_default_fonts_customize_register' ) ) {
	/**
	 * Build our Typography options.
	 *
	 * @param std_Class $wp_customize The Customize class.
	 */
	function aeon_default_fonts_customize_register( $wp_customize ) {
		$defaults = aeon_get_default_fonts();

		$wp_customize->add_section(
			'font_section',
			array(
				'title' => esc_html__( 'Typography', 'aeonwp' ),
				'capability' => 'edit_theme_options',
				'priority' => 20,
			)
		);

		/**
		 * Body.
		 */
		$wp_customize->add_setting(
			'aeon_settings[body_heading]',
			array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Heading_Control(
				$wp_customize,
				'aeon_settings[body_heading]',
				array(
					'label' => esc_html__( 'Body', 'aeonwp' ),
					'section' => 'font_section',
					'custom_class' => 'no-separator custom-heading nom',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[font_body]',
			array(
				'default' => $defaults['font_body'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[body_font_weight]',
			array(
				'default' => $defaults['body_font_weight'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[body_font_transform]',
			array(
				'default' => $defaults['body_font_transform'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Font_Family_Control(
				$wp_customize,
				'aeon_settings[font_body]',
				array(
					'label' => esc_html__( 'Font Family', 'aeonwp' ),
					'section' => 'font_section',
					'settings' => array(
						'fontFamily' => 'aeon_settings[font_body]',
						'fontWeight' => 'aeon_settings[body_font_weight]',
						'fontTransform' => 'aeon_settings[body_font_transform]',
					),
					'custom_class' => 'no-separator aeon-typo-wrap',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[body_font_size]',
			array(
				'default' => $defaults['body_font_size'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_responsive_slider',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[body_font_size_unit]',
			array(
				'default' => $defaults['body_font_size_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Resp_Slider_Control(
				$wp_customize,
				'aeon_settings[body_font_size]',
				array(
					'label' => esc_html__( 'Font size', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['body_font_size'],
					'defaultUnit' => $defaults['body_font_size_unit'],
					'settings' => array(
						'size' => 'aeon_settings[body_font_size]',
						'sizeUnit' => 'aeon_settings[body_font_size_unit]',
					),
					'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[body_line_height]',
			array(
				'default' => $defaults['body_line_height'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[body_line_height_unit]',
			array(
				'default' => $defaults['body_line_height_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[body_line_height]',
				array(
					'label' => esc_html__( 'Line height', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['body_line_height'],
					'defaultUnit' => $defaults['body_line_height_unit'],
					'settings' => array(
						'size' => 'aeon_settings[body_line_height]',
						'sizeUnit' => 'aeon_settings[body_line_height_unit]',
					),
					'suffix' => array( '-', 'px', 'em', 'rem' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);

		/**
		 * All Headings.
		 */
		$wp_customize->add_setting(
			'aeon_settings[all_headings]',
			array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Heading_Control(
				$wp_customize,
				'aeon_settings[all_headings]',
				array(
					'label' => esc_html__( 'All Headings', 'aeonwp' ),
					'section' => 'font_section',
					'custom_class' => 'no-separator custom-heading',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[font_headings]',
			array(
				'default' => $defaults['font_headings'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[headings_weight]',
			array(
				'default' => $defaults['headings_weight'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[headings_transform]',
			array(
				'default' => $defaults['headings_transform'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Font_Family_Control(
				$wp_customize,
				'aeon_settings[font_headings]',
				array(
					'label' => esc_html__( 'Font Family', 'aeonwp' ),
					'section' => 'font_section',
					'settings' => array(
						'fontFamily' => 'aeon_settings[font_headings]',
						'fontWeight' => 'aeon_settings[headings_weight]',
						'fontTransform' => 'aeon_settings[headings_transform]',
					),
					'custom_class' => 'no-separator aeon-typo-wrap',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[headings_font_size]',
			array(
				'default' => $defaults['headings_font_size'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_responsive_slider',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[headings_font_size_unit]',
			array(
				'default' => $defaults['headings_font_size_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Resp_Slider_Control(
				$wp_customize,
				'aeon_settings[headings_font_size]',
				array(
					'label' => esc_html__( 'Font size', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['headings_font_size'],
					'defaultUnit' => $defaults['headings_font_size_unit'],
					'settings' => array(
						'size' => 'aeon_settings[headings_font_size]',
						'sizeUnit' => 'aeon_settings[headings_font_size_unit]',
					),
					'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[headings_line_height]',
			array(
				'default' => $defaults['headings_line_height'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[headings_line_height_unit]',
			array(
				'default' => $defaults['headings_line_height_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[headings_line_height]',
				array(
					'label' => esc_html__( 'Line height', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['headings_line_height'],
					'defaultUnit' => $defaults['headings_line_height_unit'],
					'settings' => array(
						'size' => 'aeon_settings[headings_line_height]',
						'sizeUnit' => 'aeon_settings[headings_line_height_unit]',
					),
					'suffix' => array( '-', 'px', 'em', 'rem' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);

		/**
		 * H1.
		 */
		$wp_customize->add_setting(
			'aeon_settings[h1_heading]',
			array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Heading_Control(
				$wp_customize,
				'aeon_settings[h1_heading]',
				array(
					'label' => esc_html__( 'Heading 1 (H1)', 'aeonwp' ),
					'section' => 'font_section',
					'custom_class' => 'no-separator custom-heading',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[font_heading_1]',
			array(
				'default' => $defaults['font_heading_1'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_1_weight]',
			array(
				'default' => $defaults['heading_1_weight'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_1_transform]',
			array(
				'default' => $defaults['heading_1_transform'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Font_Family_Control(
				$wp_customize,
				'aeon_settings[font_heading_1]',
				array(
					'label' => esc_html__( 'Font Family', 'aeonwp' ),
					'section' => 'font_section',
					'settings' => array(
						'fontFamily' => 'aeon_settings[font_heading_1]',
						'fontWeight' => 'aeon_settings[heading_1_weight]',
						'fontTransform' => 'aeon_settings[heading_1_transform]',
					),
					'custom_class' => 'no-separator aeon-typo-wrap',
				)
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_1_font_size]',
			array(
				'default' => $defaults['heading_1_font_size'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_responsive_slider',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_1_font_size_unit]',
			array(
				'default' => $defaults['heading_1_font_size_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Resp_Slider_Control(
				$wp_customize,
				'aeon_settings[heading_1_font_size]',
				array(
					'label' => esc_html__( 'Font size', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['heading_1_font_size'],
					'defaultUnit' => $defaults['heading_1_font_size_unit'],
					'settings' => array(
						'size' => 'aeon_settings[heading_1_font_size]',
						'sizeUnit' => 'aeon_settings[heading_1_font_size_unit]',
					),
					'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_1_line_height]',
			array(
				'default' => $defaults['heading_1_line_height'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_1_line_height_unit]',
			array(
				'default' => $defaults['heading_1_line_height_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[heading_1_line_height]',
				array(
					'label' => esc_html__( 'Line height', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['heading_1_line_height'],
					'defaultUnit' => $defaults['heading_1_line_height_unit'],
					'settings' => array(
						'size' => 'aeon_settings[heading_1_line_height]',
						'sizeUnit' => 'aeon_settings[heading_1_line_height_unit]',
					),
					'suffix' => array( '-', 'px', 'em', 'rem' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);

		/**
		 * H2.
		 */
		$wp_customize->add_setting(
			'aeon_settings[h2_heading]',
			array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Heading_Control(
				$wp_customize,
				'aeon_settings[h2_heading]',
				array(
					'label' => esc_html__( 'Heading 2 (H2)', 'aeonwp' ),
					'section' => 'font_section',
					'custom_class' => 'no-separator custom-heading',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[font_heading_2]',
			array(
				'default' => $defaults['font_heading_2'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_2_weight]',
			array(
				'default' => $defaults['heading_2_weight'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_2_transform]',
			array(
				'default' => $defaults['heading_2_transform'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Font_Family_Control(
				$wp_customize,
				'aeon_settings[font_heading_2]',
				array(
					'label' => esc_html__( 'Font Family', 'aeonwp' ),
					'section' => 'font_section',
					'settings' => array(
						'fontFamily' => 'aeon_settings[font_heading_2]',
						'fontWeight' => 'aeon_settings[heading_2_weight]',
						'fontTransform' => 'aeon_settings[heading_2_transform]',
					),
					'custom_class' => 'no-separator aeon-typo-wrap',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_2_font_size]',
			array(
				'default' => $defaults['heading_2_font_size'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_responsive_slider',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_2_font_size_unit]',
			array(
				'default' => $defaults['heading_2_font_size_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Resp_Slider_Control(
				$wp_customize,
				'aeon_settings[heading_2_font_size]',
				array(
					'label' => esc_html__( 'Font size', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['heading_2_font_size'],
					'defaultUnit' => $defaults['heading_2_font_size_unit'],
					'settings' => array(
						'size' => 'aeon_settings[heading_2_font_size]',
						'sizeUnit' => 'aeon_settings[heading_2_font_size_unit]',
					),
					'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_2_line_height]',
			array(
				'default' => $defaults['heading_2_line_height'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_2_line_height_unit]',
			array(
				'default' => $defaults['heading_2_line_height_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[heading_2_line_height]',
				array(
					'label' => esc_html__( 'Line height', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['heading_2_line_height'],
					'defaultUnit' => $defaults['heading_2_line_height_unit'],
					'settings' => array(
						'size' => 'aeon_settings[heading_2_line_height]',
						'sizeUnit' => 'aeon_settings[heading_2_line_height_unit]',
					),
					'suffix' => array( '-', 'px', 'em', 'rem' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);

		/**
		 * H3.
		 */
		$wp_customize->add_setting(
			'aeon_settings[h3_heading]',
			array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Heading_Control(
				$wp_customize,
				'aeon_settings[h3_heading]',
				array(
					'label' => esc_html__( 'Heading 3 (H3)', 'aeonwp' ),
					'section' => 'font_section',
					'custom_class' => 'no-separator custom-heading',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[font_heading_3]',
			array(
				'default' => $defaults['font_heading_3'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_3_weight]',
			array(
				'default' => $defaults['heading_3_weight'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_3_transform]',
			array(
				'default' => $defaults['heading_3_transform'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Font_Family_Control(
				$wp_customize,
				'aeon_settings[font_heading_3]',
				array(
					'label' => esc_html__( 'Font Family', 'aeonwp' ),
					'section' => 'font_section',
					'settings' => array(
						'fontFamily' => 'aeon_settings[font_heading_3]',
						'fontWeight' => 'aeon_settings[heading_3_weight]',
						'fontTransform' => 'aeon_settings[heading_3_transform]',
					),
					'custom_class' => 'no-separator aeon-typo-wrap',
				)
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_3_font_size]',
			array(
				'default' => $defaults['heading_3_font_size'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[heading_3_font_size]',
				array(
					'label' => esc_html__( 'Font size', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['heading_3_font_size'],
					'input_attrs' => array(
						'min' => 15,
						'max' => 100,
						'step' => 1,
					),
					'suffix' => 'px',
					'custom_class' => 'no-separator typo-range',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_3_font_size]',
			array(
				'default' => $defaults['heading_3_font_size'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_3_font_size_unit]',
			array(
				'default' => $defaults['heading_3_font_size_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[heading_3_font_size]',
				array(
					'label' => esc_html__( 'Font size', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['heading_3_font_size'],
					'defaultUnit' => $defaults['heading_3_font_size_unit'],
					'settings' => array(
						'size' => 'aeon_settings[heading_3_font_size]',
						'sizeUnit' => 'aeon_settings[heading_3_font_size_unit]',
					),
					'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_3_line_height]',
			array(
				'default' => $defaults['heading_3_line_height'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_3_line_height_unit]',
			array(
				'default' => $defaults['heading_3_line_height_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[heading_3_line_height]',
				array(
					'label' => esc_html__( 'Line height', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['heading_3_line_height'],
					'defaultUnit' => $defaults['heading_3_line_height_unit'],
					'settings' => array(
						'size' => 'aeon_settings[heading_3_line_height]',
						'sizeUnit' => 'aeon_settings[heading_3_line_height_unit]',
					),
					'suffix' => array( '-', 'px', 'em', 'rem' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);

		/**
		 * H4.
		 */
		$wp_customize->add_setting(
			'aeon_settings[h4_heading]',
			array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Heading_Control(
				$wp_customize,
				'aeon_settings[h4_heading]',
				array(
					'label' => esc_html__( 'Heading 4 (H4)', 'aeonwp' ),
					'section' => 'font_section',
					'custom_class' => 'no-separator custom-heading',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[font_heading_4]',
			array(
				'default' => $defaults['font_heading_4'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_4_weight]',
			array(
				'default' => $defaults['heading_4_weight'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_4_transform]',
			array(
				'default' => $defaults['heading_4_transform'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Font_Family_Control(
				$wp_customize,
				'aeon_settings[font_heading_4]',
				array(
					'label' => esc_html__( 'Font Family', 'aeonwp' ),
					'section' => 'font_section',
					'settings' => array(
						'fontFamily' => 'aeon_settings[font_heading_4]',
						'fontWeight' => 'aeon_settings[heading_4_weight]',
						'fontTransform' => 'aeon_settings[heading_4_transform]',
					),
					'custom_class' => 'no-separator aeon-typo-wrap',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_4_font_size]',
			array(
				'default' => $defaults['heading_4_font_size'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_4_font_size_unit]',
			array(
				'default' => $defaults['heading_4_font_size_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[heading_4_font_size]',
				array(
					'label' => esc_html__( 'Font size', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['heading_4_font_size'],
					'defaultUnit' => $defaults['heading_4_font_size_unit'],
					'settings' => array(
						'size' => 'aeon_settings[heading_4_font_size]',
						'sizeUnit' => 'aeon_settings[heading_4_font_size_unit]',
					),
					'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_4_line_height]',
			array(
				'default' => $defaults['heading_4_line_height'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_4_line_height_unit]',
			array(
				'default' => $defaults['heading_4_line_height_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[heading_4_line_height]',
				array(
					'label' => esc_html__( 'Line height', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['heading_4_line_height'],
					'defaultUnit' => $defaults['heading_4_line_height_unit'],
					'settings' => array(
						'size' => 'aeon_settings[heading_4_line_height]',
						'sizeUnit' => 'aeon_settings[heading_4_line_height_unit]',
					),
					'suffix' => array( '-', 'px', 'em', 'rem' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);

		/**
		 * H5.
		 */
		$wp_customize->add_setting(
			'aeon_settings[h5_heading]',
			array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Heading_Control(
				$wp_customize,
				'aeon_settings[h5_heading]',
				array(
					'label' => esc_html__( 'Heading 5 (H5)', 'aeonwp' ),
					'section' => 'font_section',
					'custom_class' => 'no-separator custom-heading',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[font_heading_5]',
			array(
				'default' => $defaults['font_heading_5'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_5_weight]',
			array(
				'default' => $defaults['heading_5_weight'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_5_transform]',
			array(
				'default' => $defaults['heading_5_transform'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Font_Family_Control(
				$wp_customize,
				'aeon_settings[font_heading_5]',
				array(
					'label' => esc_html__( 'Font Family', 'aeonwp' ),
					'section' => 'font_section',
					'settings' => array(
						'fontFamily' => 'aeon_settings[font_heading_5]',
						'fontWeight' => 'aeon_settings[heading_5_weight]',
						'fontTransform' => 'aeon_settings[heading_5_transform]',
					),
					'custom_class' => 'no-separator aeon-typo-wrap',
				)
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_5_font_size]',
			array(
				'default' => $defaults['heading_5_font_size'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_5_font_size_unit]',
			array(
				'default' => $defaults['heading_5_font_size_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[heading_5_font_size]',
				array(
					'label' => esc_html__( 'Font size', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['heading_5_font_size'],
					'defaultUnit' => $defaults['heading_5_font_size_unit'],
					'settings' => array(
						'size' => 'aeon_settings[heading_5_font_size]',
						'sizeUnit' => 'aeon_settings[heading_5_font_size_unit]',
					),
					'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_5_line_height]',
			array(
				'default' => $defaults['heading_5_line_height'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_5_line_height_unit]',
			array(
				'default' => $defaults['heading_5_line_height_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[heading_5_line_height]',
				array(
					'label' => esc_html__( 'Line height', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['heading_5_line_height'],
					'defaultUnit' => $defaults['heading_5_line_height_unit'],
					'settings' => array(
						'size' => 'aeon_settings[heading_5_line_height]',
						'sizeUnit' => 'aeon_settings[heading_5_line_height_unit]',
					),
					'suffix' => array( '-', 'px', 'em', 'rem' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);

		/**
		 * H6.
		 */
		$wp_customize->add_setting(
			'aeon_settings[h6_heading]',
			array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Heading_Control(
				$wp_customize,
				'aeon_settings[h6_heading]',
				array(
					'label' => esc_html__( 'Heading 6 (H6)', 'aeonwp' ),
					'section' => 'font_section',
					'custom_class' => 'no-separator custom-heading',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[font_heading_6]',
			array(
				'default' => $defaults['font_heading_6'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_6_weight]',
			array(
				'default' => $defaults['heading_6_weight'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_6_transform]',
			array(
				'default' => $defaults['heading_6_transform'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Font_Family_Control(
				$wp_customize,
				'aeon_settings[font_heading_6]',
				array(
					'label' => esc_html__( 'Font Family', 'aeonwp' ),
					'section' => 'font_section',
					'settings' => array(
						'fontFamily' => 'aeon_settings[font_heading_6]',
						'fontWeight' => 'aeon_settings[heading_6_weight]',
						'fontTransform' => 'aeon_settings[heading_6_transform]',
					),
					'custom_class' => 'no-separator aeon-typo-wrap',
				)
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_6_font_size]',
			array(
				'default' => $defaults['heading_6_font_size'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_6_font_size_unit]',
			array(
				'default' => $defaults['heading_6_font_size_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[heading_6_font_size]',
				array(
					'label' => esc_html__( 'Font size', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['heading_6_font_size'],
					'defaultUnit' => $defaults['heading_6_font_size_unit'],
					'settings' => array(
						'size' => 'aeon_settings[heading_6_font_size]',
						'sizeUnit' => 'aeon_settings[heading_6_font_size_unit]',
					),
					'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[heading_6_line_height]',
			array(
				'default' => $defaults['heading_6_line_height'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[heading_6_line_height_unit]',
			array(
				'default' => $defaults['heading_6_line_height_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[heading_6_line_height]',
				array(
					'label' => esc_html__( 'Line height', 'aeonwp' ),
					'section' => 'font_section',
					'default' => $defaults['heading_6_line_height'],
					'defaultUnit' => $defaults['heading_6_line_height_unit'],
					'settings' => array(
						'size' => 'aeon_settings[heading_6_line_height]',
						'sizeUnit' => 'aeon_settings[heading_6_line_height_unit]',
					),
					'suffix' => array( '-', 'px', 'em', 'rem' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);
	}
	add_action( 'customize_register', 'aeon_default_fonts_customize_register' );
}

if ( ! function_exists( 'aeon_header_fonts_customize_register' ) ) {
	/**
	 * Build the Typography options.
	 *
	 * @param std_Class $wp_customize The Customize class.
	 */
	function aeon_header_fonts_customize_register( $wp_customize ) {
		$defaults = aeon_get_default_fonts();

		$wp_customize->add_section(
			'aeon_header_typo',
			array(
				'title' => esc_html__( 'Menu Typography', 'aeonwp' ),
				'panel' => 'aeon_header',
				'priority' => 45,
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[font_menu]',
			array(
				'default' => $defaults['font_menu'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[menu_weight]',
			array(
				'default' => $defaults['menu_weight'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[menu_transform]',
			array(
				'default' => $defaults['menu_transform'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Aeon_Font_Family_Control(
				$wp_customize,
				'aeon_settings[font_menu]',
				array(
					'label' => esc_html__( 'Font Family', 'aeonwp' ),
					'section' => 'aeon_header_typo',
					'settings' => array(
						'fontFamily' => 'aeon_settings[font_menu]',
						'fontWeight' => 'aeon_settings[menu_weight]',
						'fontTransform' => 'aeon_settings[menu_transform]',
					),
					'custom_class' => 'no-separator aeon-typo-wrap',
				)
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[menu_font_size]',
			array(
				'default' => $defaults['menu_font_size'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_responsive_slider',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[menu_font_size_unit]',
			array(
				'default' => $defaults['menu_font_size_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Aeon_Resp_Slider_Control(
				$wp_customize,
				'aeon_settings[menu_font_size]',
				array(
					'label' => esc_html__( 'Font size', 'aeonwp' ),
					'section' => 'aeon_header_typo',
					'default' => $defaults['menu_font_size'],
					'defaultUnit' => $defaults['menu_font_size_unit'],
					'settings' => array(
						'size' => 'aeon_settings[menu_font_size]',
						'sizeUnit' => 'aeon_settings[menu_font_size_unit]',
					),
					'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[menu_line_height]',
			array(
				'default' => $defaults['menu_line_height'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[menu_line_height_unit]',
			array(
				'default' => $defaults['menu_line_height_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[menu_line_height]',
				array(
					'label' => esc_html__( 'Line height', 'aeonwp' ),
					'section' => 'aeon_header_typo',
					'default' => $defaults['menu_line_height'],
					'defaultUnit' => $defaults['menu_line_height_unit'],
					'settings' => array(
						'size' => 'aeon_settings[menu_line_height]',
						'sizeUnit' => 'aeon_settings[menu_line_height_unit]',
					),
					'suffix' => array( 'px', '-', 'em', 'rem' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[dropdown_typo_heading]',
			array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Heading_Control(
				$wp_customize,
				'aeon_settings[dropdown_typo_heading]',
				array(
					'label' => esc_html__( 'Dropdown', 'aeonwp' ),
					'section' => 'aeon_header_typo',
					'custom_class' => 'no-separator custom-heading',
				)
			)
		);
		
		$wp_customize->add_setting(
			'aeon_settings[font_dropdown]',
			array(
				'default' => $defaults['font_dropdown'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[dropdown_weight]',
			array(
				'default' => $defaults['dropdown_weight'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[dropdown_transform]',
			array(
				'default' => $defaults['dropdown_transform'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Aeon_Font_Family_Control(
				$wp_customize,
				'aeon_settings[font_dropdown]',
				array(
					'label' => esc_html__( 'Font Family', 'aeonwp' ),
					'section' => 'aeon_header_typo',
					'settings' => array(
						'fontFamily' => 'aeon_settings[font_dropdown]',
						'fontWeight' => 'aeon_settings[dropdown_weight]',
						'fontTransform' => 'aeon_settings[dropdown_transform]',
					),
					'custom_class' => 'no-separator aeon-typo-wrap',
				)
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[dropdown_font_size]',
			array(
				'default' => $defaults['dropdown_font_size'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_responsive_slider',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[dropdown_font_size_unit]',
			array(
				'default' => $defaults['dropdown_font_size_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Aeon_Resp_Slider_Control(
				$wp_customize,
				'aeon_settings[dropdown_font_size]',
				array(
					'label' => esc_html__( 'Font size', 'aeonwp' ),
					'section' => 'aeon_header_typo',
					'default' => $defaults['dropdown_font_size'],
					'defaultUnit' => $defaults['dropdown_font_size_unit'],
					'settings' => array(
						'size' => 'aeon_settings[dropdown_font_size]',
						'sizeUnit' => 'aeon_settings[dropdown_font_size_unit]',
					),
					'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[dropdown_line_height]',
			array(
				'default' => $defaults['dropdown_line_height'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_decimal_integer',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[dropdown_line_height_unit]',
			array(
				'default' => $defaults['dropdown_line_height_unit'],
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Aeon_Slider_Control(
				$wp_customize,
				'aeon_settings[dropdown_line_height]',
				array(
					'label' => esc_html__( 'Line height', 'aeonwp' ),
					'section' => 'aeon_header_typo',
					'default' => $defaults['dropdown_line_height'],
					'defaultUnit' => $defaults['dropdown_line_height_unit'],
					'settings' => array(
						'size' => 'aeon_settings[dropdown_line_height]',
						'sizeUnit' => 'aeon_settings[dropdown_line_height_unit]',
					),
					'suffix' => array( 'px', '-', 'em', 'rem' ),
					'custom_class' => 'no-separator typo-range',
				)
			)
		);
	}
	add_action( 'customize_register', 'aeon_header_fonts_customize_register' );
}

/**
 * Enqueue Google Fonts.
 */
function aeon_fonts_scripts() {
	Aeon_Fonts::render_fonts();
}
add_action( 'wp_enqueue_scripts', 'aeon_fonts_scripts', 0 );

/**
 * Add Google Fonts.
 */
function aeon_add_fonts() {
	$settings = wp_parse_args(
		get_option( 'aeon_settings', array() ),
		aeon_get_default_fonts()
	);

	/**
	 * Body.
	 */
	$body_family  = $settings[ 'font_body' ];
	$body_weight  = $settings[ 'body_font_weight' ];
	Aeon_Fonts::add_font( $body_family, $body_weight );

	/**
	 * Menu.
	 */
	$menu_family  = $settings[ 'font_menu' ];
	$menu_weight  = $settings[ 'menu_weight' ];
	Aeon_Fonts::add_font( $menu_family, $menu_weight );

	/**
	 * Dropdown.
	 */
	$dropdown_family  = $settings[ 'font_dropdown' ];
	$dropdown_weight  = $settings[ 'dropdown_weight' ];
	Aeon_Fonts::add_font( $dropdown_family, $dropdown_weight );

	/**
	 * All Headings.
	 */
	$headings_family  = $settings[ 'font_headings' ];
	$headings_weight  = $settings[ 'headings_weight' ];
	Aeon_Fonts::add_font( $headings_family, $headings_weight );

	/**
	 * H1.
	 */
	$h1_family  = $settings[ 'font_heading_1' ];
	$h1_weight  = $settings[ 'heading_1_weight' ];
	Aeon_Fonts::add_font( $h1_family, $h1_weight );

	/**
	 * H2.
	 */
	$h2_family  = $settings[ 'font_heading_2' ];
	$h2_weight  = $settings[ 'heading_2_weight' ];
	Aeon_Fonts::add_font( $h2_family, $h2_weight );

	/**
	 * H3.
	 */
	$h3_family  = $settings[ 'font_heading_3' ];
	$h3_weight  = $settings[ 'heading_3_weight' ];
	Aeon_Fonts::add_font( $h3_family, $h3_weight );

	/**
	 * H4.
	 */
	$h4_family  = $settings[ 'font_heading_4' ];
	$h4_weight  = $settings[ 'heading_4_weight' ];
	Aeon_Fonts::add_font( $h4_family, $h4_weight );

	/**
	 * H5.
	 */
	$h5_family  = $settings[ 'font_heading_5' ];
	$h5_weight  = $settings[ 'heading_5_weight' ];
	Aeon_Fonts::add_font( $h5_family, $h5_weight );

	/**
	 * H6.
	 */
	$h6_family  = $settings[ 'font_heading_6' ];
	$h6_weight  = $settings[ 'heading_6_weight' ];
	Aeon_Fonts::add_font( $h6_family, $h6_weight );
}
add_action( 'aeon_get_fonts', 'aeon_add_fonts', 1 );
