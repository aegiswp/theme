<?php
/**
 * Layout section.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_section(
	'aeon_layout',
	array(
		'title' => esc_html__( 'Layout', 'aeonwp' ),
		'priority' => 40,
	)
);

$wp_customize->add_setting(
	'aeon_settings[container_width]',
	array(
		'default' => $defaults['container_width'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_decimal_integer',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_setting(
	'aeon_settings[container_width_unit]',
	array(
		'default' => $defaults['container_width_unit'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Slider_Control(
		$wp_customize,
		'aeon_settings[container_width]',
		array(
			'label' => esc_html__( 'Container Width', 'aeonwp' ),
			'section' => 'aeon_layout',
			'default' => $defaults['container_width'],
			'defaultUnit' => $defaults['container_width_unit'],
			'settings' => array(
				'size' => 'aeon_settings[container_width]',
				'sizeUnit' => 'aeon_settings[container_width_unit]',
			),
			'input_attrs' => array(
				'min'  => 700,
				'max'  => 2000,
				'step' => 5,
			),
			'suffix' => array( 'px', '%' ),
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[general_layout]',
	array(
		'default' => $defaults['general_layout'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_choices',
	)
);

$wp_customize->add_control(
	new Aeon_Radio_Image_Control(
		$wp_customize,
		'aeon_settings[general_layout]',
		array(
			'label' => esc_html__( 'General Layout', 'aeonwp' ),
			'section' => 'aeon_layout',
			'choices' => array(
				'full-width'  => array(
					'label' => esc_html__( 'Full Width', 'aeonwp' ),
					'icon'  => aeon_get_svg_icon( 'full-width' ),
				),
				'left-sidebar' => array(
					'label' => esc_html__( 'Left Sidebar', 'aeonwp' ),
					'icon'  => aeon_get_svg_icon( 'left-sidebar' ),
				),
				'right-sidebar' => array(
					'label' => esc_html__( 'Right Sidebar', 'aeonwp' ),
					'icon'  => aeon_get_svg_icon( 'right-sidebar' ),
				),
				'no-sidebar' => array(
					'label' => esc_html__( 'No Sidebar', 'aeonwp' ),
					'icon'  => aeon_get_svg_icon( 'no-sidebar' ),
				),
			),
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[blog_layout]',
	array(
		'default' => $defaults['blog_layout'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_choices',
	)
);

$wp_customize->add_control(
	new Aeon_Radio_Image_Control(
		$wp_customize,
		'aeon_settings[blog_layout]',
		array(
			'label' => esc_html__( 'Blog Layout', 'aeonwp' ),
			'section' => 'aeon_layout',
			'choices' => array(
				'full-width'  => array(
					'label' => esc_html__( 'Full Width', 'aeonwp' ),
					'icon'  => aeon_get_svg_icon( 'full-width' ),
				),
				'left-sidebar' => array(
					'label' => esc_html__( 'Left Sidebar', 'aeonwp' ),
					'icon'  => aeon_get_svg_icon( 'left-sidebar' ),
				),
				'right-sidebar' => array(
					'label' => esc_html__( 'Right Sidebar', 'aeonwp' ),
					'icon'  => aeon_get_svg_icon( 'right-sidebar' ),
				),
				'no-sidebar' => array(
					'label' => esc_html__( 'No Sidebar', 'aeonwp' ),
					'icon'  => aeon_get_svg_icon( 'no-sidebar' ),
				),
			),
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[single_post_layout]',
	array(
		'default' => $defaults['single_post_layout'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_choices',
	)
);

$wp_customize->add_control(
	new Aeon_Radio_Image_Control(
		$wp_customize,
		'aeon_settings[single_post_layout]',
		array(
			'label' => esc_html__( 'Single Post Layout', 'aeonwp' ),
			'section' => 'aeon_layout',
			'choices' => array(
				'full-width'  => array(
					'label' => esc_html__( 'Full Width', 'aeonwp' ),
					'icon'  => aeon_get_svg_icon( 'full-width' ),
				),
				'left-sidebar' => array(
					'label' => esc_html__( 'Left Sidebar', 'aeonwp' ),
					'icon'  => aeon_get_svg_icon( 'left-sidebar' ),
				),
				'right-sidebar' => array(
					'label' => esc_html__( 'Right Sidebar', 'aeonwp' ),
					'icon'  => aeon_get_svg_icon( 'right-sidebar' ),
				),
				'no-sidebar' => array(
					'label' => esc_html__( 'No Sidebar', 'aeonwp' ),
					'icon'  => aeon_get_svg_icon( 'no-sidebar' ),
				),
			),
		)
	)
);

// If WooCommerce exist.
if ( class_exists( 'WooCommerce' ) ) {
	$wp_customize->add_setting(
		'aeon_settings[shop_layout]',
		array(
			'default' => $defaults['shop_layout'],
			'type' => 'option',
			'sanitize_callback' => 'aeon_sanitize_choices',
		)
	);
	
	$wp_customize->add_control(
		new Aeon_Radio_Image_Control(
			$wp_customize,
			'aeon_settings[shop_layout]',
			array(
				'label' => esc_html__( 'Shop Layout', 'aeonwp' ),
				'section' => 'aeon_layout',
				'choices' => array(
					'full-width'  => array(
						'label' => esc_html__( 'Full Width', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'full-width' ),
					),
					'left-sidebar' => array(
						'label' => esc_html__( 'Left Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'left-sidebar' ),
					),
					'right-sidebar' => array(
						'label' => esc_html__( 'Right Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'right-sidebar' ),
					),
					'no-sidebar' => array(
						'label' => esc_html__( 'No Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'no-sidebar' ),
					),
				),
			)
		)
	);
 
	$wp_customize->add_setting(
		'aeon_settings[single_product_layout]',
		array(
			'default' => $defaults['single_product_layout'],
			'type' => 'option',
			'sanitize_callback' => 'aeon_sanitize_choices',
		)
	);
	
	$wp_customize->add_control(
		new Aeon_Radio_Image_Control(
			$wp_customize,
			'aeon_settings[single_product_layout]',
			array(
				'label' => esc_html__( 'Single Product Layout', 'aeonwp' ),
				'section' => 'aeon_layout',
				'choices' => array(
					'full-width'  => array(
						'label' => esc_html__( 'Full Width', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'full-width' ),
					),
					'left-sidebar' => array(
						'label' => esc_html__( 'Left Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'left-sidebar' ),
					),
					'right-sidebar' => array(
						'label' => esc_html__( 'Right Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'right-sidebar' ),
					),
					'no-sidebar' => array(
						'label' => esc_html__( 'No Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'no-sidebar' ),
					),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'aeon_settings[cart_layout]',
		array(
			'default' => $defaults['cart_layout'],
			'type' => 'option',
			'sanitize_callback' => 'aeon_sanitize_choices',
		)
	);
	
	$wp_customize->add_control(
		new Aeon_Radio_Image_Control(
			$wp_customize,
			'aeon_settings[cart_layout]',
			array(
				'label' => esc_html__( 'Cart Layout', 'aeonwp' ),
				'section' => 'aeon_layout',
				'choices' => array(
					'full-width'  => array(
						'label' => esc_html__( 'Full Width', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'full-width' ),
					),
					'left-sidebar' => array(
						'label' => esc_html__( 'Left Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'left-sidebar' ),
					),
					'right-sidebar' => array(
						'label' => esc_html__( 'Right Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'right-sidebar' ),
					),
					'no-sidebar' => array(
						'label' => esc_html__( 'No Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'no-sidebar' ),
					),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'aeon_settings[checkout_layout]',
		array(
			'default' => $defaults['checkout_layout'],
			'type' => 'option',
			'sanitize_callback' => 'aeon_sanitize_choices',
		)
	);
	
	$wp_customize->add_control(
		new Aeon_Radio_Image_Control(
			$wp_customize,
			'aeon_settings[checkout_layout]',
			array(
				'label' => esc_html__( 'Checkout Layout', 'aeonwp' ),
				'section' => 'aeon_layout',
				'choices' => array(
					'full-width'  => array(
						'label' => esc_html__( 'Full Width', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'full-width' ),
					),
					'left-sidebar' => array(
						'label' => esc_html__( 'Left Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'left-sidebar' ),
					),
					'right-sidebar' => array(
						'label' => esc_html__( 'Right Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'right-sidebar' ),
					),
					'no-sidebar' => array(
						'label' => esc_html__( 'No Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'no-sidebar' ),
					),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'aeon_settings[my_account_layout]',
		array(
			'default' => $defaults['my_account_layout'],
			'type' => 'option',
			'sanitize_callback' => 'aeon_sanitize_choices',
		)
	);
	
	$wp_customize->add_control(
		new Aeon_Radio_Image_Control(
			$wp_customize,
			'aeon_settings[my_account_layout]',
			array(
				'label' => esc_html__( 'My Account Layout', 'aeonwp' ),
				'section' => 'aeon_layout',
				'choices' => array(
					'full-width'  => array(
						'label' => esc_html__( 'Full Width', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'full-width' ),
					),
					'left-sidebar' => array(
						'label' => esc_html__( 'Left Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'left-sidebar' ),
					),
					'right-sidebar' => array(
						'label' => esc_html__( 'Right Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'right-sidebar' ),
					),
					'no-sidebar' => array(
						'label' => esc_html__( 'No Sidebar', 'aeonwp' ),
						'icon'  => aeon_get_svg_icon( 'no-sidebar' ),
					),
				),
			)
		)
	);
}

// If LearnDash exist.
if ( defined( 'LEARNDASH_VERSION' ) ) {
	$ld_pt = array(
		'sfwd_quiz' => esc_html__( 'Quiz', 'aeonwp' ),
		'sfwd_certificates' => esc_html__( 'Certificates', 'aeonwp' ),
		'sfwd_lessons' => esc_html__( 'Lessons', 'aeonwp' ),
		'sfwd_topic' => esc_html__( 'Topic', 'aeonwp' ),
		'sfwd_transactions' => esc_html__( 'Transactions', 'aeonwp' ),
		'sfwd_essays' => esc_html__( 'Essays', 'aeonwp' ),
		'sfwd_assignment' => esc_html__( 'Assignment', 'aeonwp' ),
		'sfwd_courses' => esc_html__( 'Courses', 'aeonwp' ),
		'ld_exam' => esc_html__( 'Challenges', 'aeonwp' ),
	);
	foreach ( $ld_pt as $name => $label ) {
		$wp_customize->add_setting(
			'aeon_settings[' . $name . '_layout]',
			array(
				'default' => $defaults[$name . '_layout'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_choices',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Radio_Image_Control(
				$wp_customize,
				'aeon_settings[' . $name . '_layout]',
				array(
					'label' => $label . ' ' . esc_html__( 'Layout', 'aeonwp' ),
					'section' => 'aeon_layout',
					'choices' => array(
						'full-width'  => array(
							'label' => esc_html__( 'Full Width', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'full-width' ),
						),
						'left-sidebar' => array(
							'label' => esc_html__( 'Left Sidebar', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'left-sidebar' ),
						),
						'right-sidebar' => array(
							'label' => esc_html__( 'Right Sidebar', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'right-sidebar' ),
						),
						'no-sidebar' => array(
							'label' => esc_html__( 'No Sidebar', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'no-sidebar' ),
						),
					),
				)
			)
		);
	}
}

// If LifterLMS exist.
if ( class_exists( 'LifterLMS' ) ) {
	$llms_pt = array(
		'course' => esc_html__( 'Course', 'aeonwp' ),
		'lesson' => esc_html__( 'Lesson', 'aeonwp' ),
		'llms_quiz' => esc_html__( 'Quiz', 'aeonwp' ),
		'llms_membership' => esc_html__( 'Membership', 'aeonwp' ),
		'llms_certificate' => esc_html__( 'Certificate', 'aeonwp' ),
		'llms_my_certificate' => esc_html__( 'My Certificate', 'aeonwp' ),
	);
	foreach ( $llms_pt as $name => $label ) {
		$wp_customize->add_setting(
			'aeon_settings[' . $name . '_layout]',
			array(
				'default' => $defaults[$name . '_layout'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_choices',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Radio_Image_Control(
				$wp_customize,
				'aeon_settings[' . $name . '_layout]',
				array(
					'label' => $label . ' ' . esc_html__( 'Layout', 'aeonwp' ),
					'section' => 'aeon_layout',
					'choices' => array(
						'full-width'  => array(
							'label' => esc_html__( 'Full Width', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'full-width' ),
						),
						'left-sidebar' => array(
							'label' => esc_html__( 'Left Sidebar', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'left-sidebar' ),
						),
						'right-sidebar' => array(
							'label' => esc_html__( 'Right Sidebar', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'right-sidebar' ),
						),
						'no-sidebar' => array(
							'label' => esc_html__( 'No Sidebar', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'no-sidebar' ),
						),
					),
				)
			)
		);
	}
}

// If Custom Post Type exist.
$all_post_types = aeon_get_post_types_objects();
foreach ( $all_post_types as $post_type_item ) {
	$post_type_name  = $post_type_item->name;
	$post_type_label = $post_type_item->label;
	$ignore_type     = aeon_get_post_types_to_ignore();

	if ( ! in_array( $post_type_name, $ignore_type, true ) ) {
		$wp_customize->add_setting(
			'aeon_settings[' . $post_type_name . '_layout]',
			array(
				'default' => $defaults[$post_type_name . '_layout'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_choices',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Radio_Image_Control(
				$wp_customize,
				'aeon_settings[' . $post_type_name . '_layout]',
				array(
					'label' => $post_type_label . ' ' . esc_html__( 'Layout', 'aeonwp' ),
					'section' => 'aeon_layout',
					'choices' => array(
						'full-width'  => array(
							'label' => esc_html__( 'Full Width', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'full-width' ),
						),
						'left-sidebar' => array(
							'label' => esc_html__( 'Left Sidebar', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'left-sidebar' ),
						),
						'right-sidebar' => array(
							'label' => esc_html__( 'Right Sidebar', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'right-sidebar' ),
						),
						'no-sidebar' => array(
							'label' => esc_html__( 'No Sidebar', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'no-sidebar' ),
						),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'aeon_settings[single_' . $post_type_name . '_layout]',
			array(
				'default' => $defaults['single_' . $post_type_name . '_layout'],
				'type' => 'option',
				'sanitize_callback' => 'aeon_sanitize_choices',
			)
		);
		
		$wp_customize->add_control(
			new Aeon_Radio_Image_Control(
				$wp_customize,
				'aeon_settings[single_' . $post_type_name . '_layout]',
				array(
					'label' => esc_html__( 'Single', 'aeonwp' ) . ' ' . $post_type_label . ' ' . esc_html__( 'Layout', 'aeonwp' ),
					'section' => 'aeon_layout',
					'choices' => array(
						'full-width'  => array(
							'label' => esc_html__( 'Full Width', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'full-width' ),
						),
						'left-sidebar' => array(
							'label' => esc_html__( 'Left Sidebar', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'left-sidebar' ),
						),
						'right-sidebar' => array(
							'label' => esc_html__( 'Right Sidebar', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'right-sidebar' ),
						),
						'no-sidebar' => array(
							'label' => esc_html__( 'No Sidebar', 'aeonwp' ),
							'icon'  => aeon_get_svg_icon( 'no-sidebar' ),
						),
					),
				)
			)
		);
	}
}
