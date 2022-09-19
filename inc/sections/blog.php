<?php
/**
 * Blog section.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_panel(
	'aeon_blog',
	array(
		'title' => esc_html__( 'Blog', 'aeonwp' ),
		'priority' => 70,
	)
);

$wp_customize->add_section(
	'aeon_blog_archive',
	array(
		'title' => esc_html__( 'Blog Archive', 'aeonwp' ),
		'panel' => 'aeon_blog',
	)
);

$wp_customize->add_setting(
	'aeon_settings[archive_structure]',
	array(
		'default' => $defaults['archive_structure'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_multi_choices',
	)
);

$wp_customize->add_control(
	new Aeon_Sortable_Control(
		$wp_customize,
		'aeon_settings[archive_structure]',
		array(
			'label' => esc_html__( 'Structure', 'aeonwp' ),
			'section' => 'aeon_blog_archive',
			'choices' => array(
				'image' => esc_html__( 'Featured Image', 'aeonwp' ),
				'title-meta' => esc_html__( 'Title And Meta', 'aeonwp' ),
			),
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[archive_meta]',
	array(
		'default' => $defaults['archive_meta'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_multi_choices',
	)
);

$wp_customize->add_control(
	new Aeon_Sortable_Control(
		$wp_customize,
		'aeon_settings[archive_meta]',
		array(
			'label' => esc_html__( 'Meta', 'aeonwp' ),
			'section' => 'aeon_blog_archive',
			'choices' => array(
				'author' => esc_html__( 'Author', 'aeonwp' ),
				'date' => esc_html__( 'Date', 'aeonwp' ),
				'cat' => esc_html__( 'Category', 'aeonwp' ),
				'comments' => esc_html__( 'Comments', 'aeonwp' ),
			),
		)
	)
);

$wp_customize->add_section(
	'aeon_single_post',
	array(
		'title' => esc_html__( 'Single Post', 'aeonwp' ),
		'panel' => 'aeon_blog',
	)
);

$wp_customize->add_setting(
	'aeon_settings[single_post_structure]',
	array(
		'default' => $defaults['single_post_structure'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_multi_choices',
	)
);

$wp_customize->add_control(
	new Aeon_Sortable_Control(
		$wp_customize,
		'aeon_settings[single_post_structure]',
		array(
			'label' => esc_html__( 'Structure', 'aeonwp' ),
			'section' => 'aeon_single_post',
			'choices' => array(
				'image' => esc_html__( 'Featured Image', 'aeonwp' ),
				'title-meta' => esc_html__( 'Title And Meta', 'aeonwp' ),
			),
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[single_meta]',
	array(
		'default' => $defaults['single_meta'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_multi_choices',
	)
);

$wp_customize->add_control(
	new Aeon_Sortable_Control(
		$wp_customize,
		'aeon_settings[single_meta]',
		array(
			'label' => esc_html__( 'Meta', 'aeonwp' ),
			'section' => 'aeon_single_post',
			'choices' => array(
				'author' => esc_html__( 'Author', 'aeonwp' ),
				'date' => esc_html__( 'Date', 'aeonwp' ),
				'cat' => esc_html__( 'Category', 'aeonwp' ),
				'comments' => esc_html__( 'Comments', 'aeonwp' ),
			),
		)
	)
);
