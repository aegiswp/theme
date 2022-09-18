<?php
/**
 * This file handles adding Customizer controls.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Helper functions to add Customizer fields.
 */
class Aeon_Customize_Field {
	/**
	 * Instance.
	 *
	 * @access private
	 * @var object Instance
	 */
	private static $instance;

	/**
	 * Initiator.
	 *
	 * @since 1.0.0
	 * @return object initialized object of class.
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Add a wrapper for defined controls.
	 *
	 * @param string $id The settings ID for this field.
	 * @param array  $control_args The args for add_control().
	 */
	public static function add_wrapper( $id, $control_args = array() ) {
		global $wp_customize;

		if ( ! $id ) {
			return;
		}

		$control_args['settings'] = isset( $wp_customize->selective_refresh ) ? array() : 'blogname';
		$control_args['choices']['id'] = str_replace( '_', '-', $id );
		$control_args['type'] = 'aeon-wrapper';

		$wp_customize->add_control(
			new Aeon_React_Control(
				$wp_customize,
				$id,
				$control_args
			)
		);
	}

	/**
	 * Add a Customizer field.
	 *
	 * @param string $id The settings ID for this field.
	 * @param object $control_class A custom control classes if we want one.
	 * @param array  $setting_args The args for add_setting().
	 * @param array  $control_args The args for add_control().
	 */
	public static function add_field( $id, $control_class, $setting_args = array(), $control_args = array() ) {
		global $wp_customize;

		if ( ! $id ) {
			return;
		}

		$settings = wp_parse_args(
			$setting_args,
			array(
				'type' => 'option',
				'capability' => 'edit_theme_options',
				'default' => '',
				'transport' => 'refresh',
				'validate_callback' => '',
				'sanitize_callback' => '',
			)
		);

		$wp_customize->add_setting(
			$id,
			array(
				'type' => $settings['type'],
				'capability' => $settings['capability'],
				'default' => $settings['default'],
				'transport' => $settings['transport'],
				'validate_callback' => $settings['validate_callback'],
				'sanitize_callback' => $settings['sanitize_callback'],
			)
		);

		$control_args['settings'] = $id;

		if ( ! isset( $control_args['type'] ) ) {
			unset( $control_args['type'] );
		}

		if ( ! isset( $control_args['defaultValue'] ) && isset( $setting_args['default'] ) ) {
			$control_args['defaultValue'] = $setting_args['default'];
		}

		if ( $control_class ) {
			$wp_customize->add_control(
				new $control_class(
					$wp_customize,
					$id,
					$control_args
				)
			);

			return;
		}

		$wp_customize->add_control(
			$id,
			$control_args
		);
	}

	/**
	 * Add color field group.
	 *
	 * @param string $id The ID for the group wrapper.
	 * @param string $section_id The section ID.
	 * @param string $toggle_id The Toggle ID.
	 * @param array  $fields The color fields.
	 */
	public static function add_color_field_group( $id, $section_id, $fields ) {
		self::add_wrapper(
			"aeon_{$id}_wrapper",
			array(
				'section' => $section_id,
				'choices' => array(
					'type' => 'color',
					'items' => array_keys( $fields ),
				),
			)
		);

		foreach ( $fields as $key => $field ) {
			self::add_field(
				$key,
				'Aeon_Color_Control',
				array(
					'default' => $field['default_value'],
					'transport' => 'postMessage',
					'sanitize_callback' => 'aeon_sanitize_rgba_color',
				),
				array(
					'label' => $field['label'],
					'section' => $section_id,
					'choices' => array(
						'alpha' => isset( $field['alpha'] ) ? $field['alpha'] : true,
						'wrapper' => $key,
						'tooltip' => $field['tooltip'],
						'hideLabel' => isset( $field['hide_label'] ) ? $field['hide_label'] : false,
					),
				)
			);
		}
	}
}
