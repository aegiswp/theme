<?php
/**
 * Header section.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$wp_customize->add_panel(
	'aeon_header',
	array(
		'title' => esc_html__( 'Header', 'aeonwp' ),
		'priority' => 50,
	)
);

$wp_customize->add_section(
	'aeon_header_general',
	array(
		'title' => esc_html__( 'General', 'aeonwp' ),
		'panel' => 'aeon_header',
		'priority' => 10,
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'aeon_settings[sticky_logo]',
		array(
			'selector'        => '.site-header-inner .site-branding',
			'container_inclusive' => true,
			'render_callback' => 'aeon_add_logo',
			'fallback_refresh'    => false,
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'aeon_settings[sticky_retina_logo]',
		array(
			'selector'        => '.site-header-inner .site-branding',
			'container_inclusive' => true,
			'render_callback' => 'aeon_add_logo',
			'fallback_refresh'    => false,
		)
	);
}

$wp_customize->add_setting(
	'aeon_settings[header_breakpoint]',
	array(
		'default' => $defaults['header_breakpoint'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_decimal_integer',
	)
);

$wp_customize->add_control(
	new Aeon_Slider_Control(
		$wp_customize,
		'aeon_settings[header_breakpoint]',
		array(
			'label' => esc_html__( 'Breakpoint', 'aeonwp' ),
			'section' => 'aeon_header_general',
			'default' => $defaults['header_breakpoint'],
			'settings' => array(
				'size' => 'aeon_settings[header_breakpoint]',
			),
			'input_attrs' => array(
				'min'  => 200,
				'max'  => 3000,
				'step' => 1,
			),
			'priority' => 50,
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[remove_container]',
	array(
		'default' => $defaults['remove_container'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_checkbox',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Switch_Control(
		$wp_customize,
		'aeon_settings[remove_container]',
		array(
			'label' => esc_html__( 'Remove Container', 'aeonwp' ),
			'section' => 'aeon_header_general',
			'priority' => 50,
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[transparent_header]',
	array(
		'default' => $defaults['transparent_header'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_checkbox',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Switch_Control(
		$wp_customize,
		'aeon_settings[transparent_header]',
		array(
			'label' => esc_html__( 'Make Header Transparent', 'aeonwp' ),
			'section' => 'aeon_header_general',
			'priority' => 50,
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[search_style]',
	array(
		'default' => $defaults['search_style'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_choices',
	)
);

$wp_customize->add_control(
	new Aeon_Select_Control(
		$wp_customize,
		'aeon_settings[search_style]',
		array(
			'label' => esc_html__( 'Search Style', 'aeonwp' ),
			'section' => 'aeon_header_general',
			'choices' => array(
				'none' => esc_html__( 'None', 'aeonwp' ),
				'dropdown' => esc_html__( 'Dropdown', 'aeonwp' ),
				'full-screen' => esc_html__( 'Full Screen', 'aeonwp' ),
				'slide' => esc_html__( 'Slide', 'aeonwp' ),
			),
			'priority' => 50,
			'custom_class' => 'inline',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[search_fullscreen_heading]',
	array(
		'default' => $defaults['search_fullscreen_heading'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Text_Control(
		$wp_customize,
		'aeon_settings[search_fullscreen_heading]',
		array(
			'label' => esc_html__( 'Full Screen Heading', 'aeonwp' ),
			'section' => 'aeon_header_general',
			'priority' => 50,
			'custom_class' => 'inline',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[search_source]',
	array(
		'default' => $defaults['search_source'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_choices',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Select_Control(
		$wp_customize,
		'aeon_settings[search_source]',
		array(
			'label' => esc_html__( 'Search Source', 'aeonwp' ),
			'section' => 'aeon_header_general',
			'choices' => aeon_get_post_types(),
			'priority' => 50,
			'custom_class' => 'inline',
		)
	)
);

if ( class_exists( 'WooCommerce' ) ) {
	$wp_customize->add_setting(
		'aeon_settings[add_cart_icon]',
		array(
			'default' => $defaults['add_cart_icon'],
			'type' => 'option',
			'sanitize_callback' => 'aeon_sanitize_checkbox',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Aeon_Switch_Control(
			$wp_customize,
			'aeon_settings[add_cart_icon]',
			array(
				'label' => esc_html__( 'Add Cart Icon', 'aeonwp' ),
				'section' => 'aeon_header_general',
				'priority' => 50,
			)
		)
	);

	$wp_customize->add_setting(
		'aeon_settings[cart_count]',
		array(
			'default' => $defaults['cart_count'],
			'type' => 'option',
			'sanitize_callback' => 'aeon_sanitize_checkbox',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Aeon_Switch_Control(
			$wp_customize,
			'aeon_settings[cart_count]',
			array(
				'label' => esc_html__( 'Display Cart Count', 'aeonwp' ),
				'section' => 'aeon_header_general',
				'priority' => 50,
			)
		)
	);

	$wp_customize->add_setting(
		'aeon_settings[cart_total]',
		array(
			'default' => $defaults['cart_total'],
			'type' => 'option',
			'sanitize_callback' => 'aeon_sanitize_checkbox',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Aeon_Switch_Control(
			$wp_customize,
			'aeon_settings[cart_total]',
			array(
				'label' => esc_html__( 'Display Cart Total', 'aeonwp' ),
				'section' => 'aeon_header_general',
				'priority' => 50,
			)
		)
	);
}

$wp_customize->add_setting(
	'aeon_settings[header_padding]',
	array(
		'default' => $defaults['header_padding'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_responsive_spacing',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Spacing_Control(
		$wp_customize,
		'aeon_settings[header_padding]',
		array(
			'label' => esc_html__( 'Header Padding', 'aeonwp' ),
			'section' => 'aeon_header_general',
			'choices' => array(
				'top'    => esc_html__( 'Top', 'aeonwp' ),
				'right'  => esc_html__( 'Right', 'aeonwp' ),
				'bottom' => esc_html__( 'Bottom', 'aeonwp' ),
				'left'   => esc_html__( 'Left', 'aeonwp' ),
			),
			'priority' => 50,
		)
	)
);

$wp_customize->add_section(
	'aeon_header_sticky',
	array(
		'title' => esc_html__( 'Sticky Header', 'aeonwp' ),
		'panel' => 'aeon_header',
		'priority' => 20,
	)
);

$wp_customize->add_setting(
	'aeon_settings[add_sticky]',
	array(
		'default' => $defaults['add_sticky'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Aeon_Switch_Control(
		$wp_customize,
		'aeon_settings[add_sticky]',
		array(
			'label' => esc_html__( 'Add Sticky', 'aeonwp' ),
			'section' => 'aeon_header_sticky',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[add_sticky_shadow]',
	array(
		'default' => $defaults['add_sticky_shadow'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_checkbox',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Switch_Control(
		$wp_customize,
		'aeon_settings[add_sticky_shadow]',
		array(
			'label' => esc_html__( 'Add Shadow On Sticky', 'aeonwp' ),
			'section' => 'aeon_header_sticky',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[sticky_style]',
	array(
		'default' => $defaults['sticky_style'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_choices',
	)
);

$wp_customize->add_control(
	new Aeon_Select_Control(
		$wp_customize,
		'aeon_settings[sticky_style]',
		array(
			'label' => esc_html__( 'Style', 'aeonwp' ),
			'section' => 'aeon_header_sticky',
			'choices' => array(
				'classic' => esc_html__( 'Classic', 'aeonwp' ),
				'hide-scroll' => esc_html__( 'Hide When Scrolling Down', 'aeonwp' ),
			),
			'custom_class' => 'inline',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[sticky_logo]',
	array(
		'default' => $defaults['sticky_logo'],
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'aeon_settings[sticky_logo]',
		array(
			'label' => esc_html__( 'Add Logo On Sticky', 'aeonwp' ),
			'section' => 'aeon_header_sticky',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[sticky_retina_logo]',
	array(
		'default' => $defaults['sticky_retina_logo'],
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'aeon_settings[sticky_retina_logo]',
		array(
			'label' => esc_html__( 'Add Retina Logo On Sticky', 'aeonwp' ),
			'section' => 'aeon_header_sticky',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[sticky_logo_width]',
	array(
		'default' => $defaults['sticky_logo_width'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_responsive_slider',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_setting(
	'aeon_settings[sticky_logo_width_unit]',
	array(
		'default' => $defaults['sticky_logo_width_unit'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Resp_Slider_Control(
		$wp_customize,
		'aeon_settings[sticky_logo_width]',
		array(
			'label' => esc_html__( 'Sticky Logo Size', 'aeonwp' ),
			'section' => 'aeon_header_sticky',
			'default' => $defaults['sticky_logo_width'],
			'defaultUnit' => $defaults['sticky_logo_width_unit'],
			'settings' => array(
				'size' => 'aeon_settings[sticky_logo_width]',
				'sizeUnit' => 'aeon_settings[sticky_logo_width_unit]',
			),
			'input_attrs' => array(
				'max'  => 600,
				'step' => 1,
			),
			'suffix' => array( 'px', 'em', 'rem', '%' ),
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[sticky_breakpoint]',
	array(
		'default' => $defaults['sticky_breakpoint'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_choices',
	)
);

$wp_customize->add_control(
	new Aeon_Select_Control(
		$wp_customize,
		'aeon_settings[sticky_breakpoint]',
		array(
			'label' => esc_html__( 'Breakpoint', 'aeonwp' ),
			'section' => 'aeon_header_sticky',
			'choices' => array(
				'767' => esc_html__( 'Mobile (767px)', 'aeonwp' ),
				'1024' => esc_html__( 'Tablet (1024px)', 'aeonwp' ),
				'none' => esc_html__( 'Stick On All Devices', 'aeonwp' ),
			),
			'custom_class' => 'inline',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[sticky_background]',
	array(
		'default' => $defaults['sticky_background'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Color_Control(
		$wp_customize,
		'aeon_settings[sticky_background]',
		array(
			'label' => esc_html__( 'Background Color', 'aeonwp' ),
			'section' => 'aeon_header_sticky',
			'choices' => array(
				'alpha' => true,
			),
		)
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_sticky_links_color_wrapper',
	array(
		'section' => 'aeon_header_sticky',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'sticky_links_color',
				'sticky_links_color_hover',
			),
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[sticky_links_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['sticky_links_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color', 'aeonwp' ),
		'section' => 'aeon_header_sticky',
		'choices' => array(
			'wrapper' => 'sticky_links_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[sticky_links_color_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['sticky_links_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color Hover', 'aeonwp' ),
		'section' => 'aeon_header_sticky',
		'choices' => array(
			'wrapper' => 'sticky_links_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
	)
);

$wp_customize->add_section(
	'aeon_header_mobile',
	array(
		'title' => esc_html__( 'Mobile Menu', 'aeonwp' ),
		'panel' => 'aeon_header',
		'priority' => 30,
	)
);

$wp_customize->add_setting(
	'aeon_settings[mobile_label]',
	array(
		'default' => $defaults['mobile_label'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Text_Control(
		$wp_customize,
		'aeon_settings[mobile_label]',
		array(
			'label' => esc_html__( 'Menu Label', 'aeonwp' ),
			'section' => 'aeon_header_mobile',
			'custom_class' => 'inline',
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[mobile_icon_size]',
	array(
		'default' => $defaults['mobile_icon_size'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_decimal_integer',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_setting(
	'aeon_settings[mobile_icon_size_unit]',
	array(
		'default' => $defaults['mobile_icon_size_unit'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Slider_Control(
		$wp_customize,
		'aeon_settings[mobile_icon_size]',
		array(
			'label' => esc_html__( 'Icon Size', 'aeonwp' ),
			'section' => 'aeon_header_mobile',
			'default' => $defaults['mobile_icon_size'],
			'defaultUnit' => $defaults['mobile_icon_size_unit'],
			'settings' => array(
				'size' => 'aeon_settings[mobile_icon_size]',
				'sizeUnit' => 'aeon_settings[mobile_icon_size_unit]',
			),
			'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[mobile_font_size]',
	array(
		'default' => $defaults['mobile_font_size'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_decimal_integer',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_setting(
	'aeon_settings[mobile_font_size_unit]',
	array(
		'default' => $defaults['mobile_font_size_unit'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Slider_Control(
		$wp_customize,
		'aeon_settings[mobile_font_size]',
		array(
			'label' => esc_html__( 'Font Size', 'aeonwp' ),
			'section' => 'aeon_header_mobile',
			'default' => $defaults['mobile_font_size'],
			'defaultUnit' => $defaults['mobile_font_size_unit'],
			'settings' => array(
				'size' => 'aeon_settings[mobile_font_size]',
				'sizeUnit' => 'aeon_settings[mobile_font_size_unit]',
			),
			'suffix' => array( 'px', 'em', 'rem', '%', 'vh', 'vw' ),
		)
	)
);

$wp_customize->add_section(
	'aeon_header_design',
	array(
		'title' => esc_html__( 'Design', 'aeonwp' ),
		'panel' => 'aeon_header',
		'priority' => 40,
	)
);

$wp_customize->add_setting(
	'aeon_settings[header_background]',
	array(
		'default' => $defaults['header_background'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Color_Control(
		$wp_customize,
		'aeon_settings[header_background]',
		array(
			'label' => esc_html__( 'Header Background', 'aeonwp' ),
			'section' => 'aeon_header_design',
			'priority' => 10,
		)
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_menu_links_bg_wrapper',
	array(
		'section' => 'aeon_header_design',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'menu_links_bg',
				'menu_links_bg_hover',
			),
		),
		'priority' => 20,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[menu_links_bg]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['menu_links_bg'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Background', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'menu_links_bg',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
		'priority' => 20,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[menu_links_bg_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['menu_links_bg_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Background Hover', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'menu_links_bg_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 20,
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_menu_links_color_wrapper',
	array(
		'section' => 'aeon_header_design',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'menu_links_color',
				'menu_links_color_hover',
			),
		),
		'priority' => 30,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[menu_links_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['menu_links_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'menu_links_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
		'priority' => 30,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[menu_links_color_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['menu_links_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color Hover', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'menu_links_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 30,
	)
);

$wp_customize->add_setting(
	'aeon_settings[dropdown_heading]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Aeon_Heading_Control(
		$wp_customize,
		'aeon_settings[dropdown_heading]',
		array(
			'label' => esc_html__( 'Dropdown', 'aeonwp' ),
			'section' => 'aeon_header_design',
			'custom_class' => 'no-separator custom-heading',
			'priority' => 40,
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[dropdown_width]',
	array(
		'default' => $defaults['dropdown_width'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_decimal_integer',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_setting(
	'aeon_settings[dropdown_width_unit]',
	array(
		'default' => $defaults['dropdown_width_unit'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Slider_Control(
		$wp_customize,
		'aeon_settings[dropdown_width]',
		array(
			'label' => esc_html__( 'Width', 'aeonwp' ),
			'section' => 'aeon_header_design',
			'default' => $defaults['dropdown_width'],
			'defaultUnit' => $defaults['dropdown_width_unit'],
			'settings' => array(
				'size' => 'aeon_settings[dropdown_width]',
				'sizeUnit' => 'aeon_settings[dropdown_width_unit]',
			),
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 600,
				'step' => 1,
			),
			'suffix' => array( 'px', 'em', 'rem' ),
			'custom_class' => 'no-separator',
			'priority' => 50,
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[dropdown_border_top_height]',
	array(
		'default' => $defaults['dropdown_border_top_height'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_check_numberic_values',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Slider_Control(
		$wp_customize,
		'aeon_settings[dropdown_border_top_height]',
		array(
			'label' => esc_html__( 'Border Top Height', 'aeonwp' ),
			'section' => 'aeon_header_design',
			'default' => $defaults['dropdown_border_top_height'],
			'settings' => array(
				'size' => 'aeon_settings[dropdown_border_top_height]',
			),
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
			'priority' => 50,
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[dropdown_design]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Aeon_Heading_Control(
		$wp_customize,
		'aeon_settings[dropdown_design]',
		array(
			'label' => esc_html__( 'Dropdown Design', 'aeonwp' ),
			'section' => 'aeon_header_design',
			'custom_class' => 'no-separator custom-heading',
			'priority' => 60,
		)
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_dropdown_links_bg_wrapper',
	array(
		'section' => 'aeon_header_design',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'dropdown_links_bg',
				'dropdown_links_bg_hover',
			),
		),
		'custom_class' => 'no-separator',
		'priority' => 70,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[dropdown_links_bg]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['dropdown_links_bg'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Background', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'dropdown_links_bg',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
		'priority' => 70,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[dropdown_links_bg_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['dropdown_links_bg_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Background Hover', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'dropdown_links_bg_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 70,
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_dropdown_links_color_wrapper',
	array(
		'section' => 'aeon_header_design',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'dropdown_links_color',
				'dropdown_links_color_hover',
			),
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[dropdown_links_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['dropdown_links_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'dropdown_links_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[dropdown_links_color_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['dropdown_links_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Links Color Hover', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'dropdown_links_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 80,
	)
);

$wp_customize->add_setting(
	'aeon_settings[dropdown_border_top_color]',
	array(
		'default' => $defaults['dropdown_border_top_color'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Color_Control(
		$wp_customize,
		'aeon_settings[dropdown_border_top_color]',
		array(
			'label' => esc_html__( 'Border Top Color', 'aeonwp' ),
			'section' => 'aeon_header_design',
			'priority' => 80,
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[search_dropdown_heading]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Aeon_Heading_Control(
		$wp_customize,
		'aeon_settings[search_dropdown_heading]',
		array(
			'label' => esc_html__( 'Search Dropdown', 'aeonwp' ),
			'section' => 'aeon_header_design',
			'custom_class' => 'no-separator custom-heading',
			'priority' => 80,
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[search_dropdown_bg]',
	array(
		'default' => $defaults['search_dropdown_bg'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Color_Control(
		$wp_customize,
		'aeon_settings[search_dropdown_bg]',
		array(
			'label' => esc_html__( 'Background Color', 'aeonwp' ),
			'section' => 'aeon_header_design',
			'custom_class' => 'no-separator',
			'priority' => 80,
		)
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_search_dropdown_input_wrapper',
	array(
		'section' => 'aeon_header_design',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'search_dropdown_input_bg',
				'search_dropdown_input_color',
			),
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_dropdown_input_bg]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_dropdown_input_bg'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Background / Color', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_dropdown_input_bg',
			'tooltip' => esc_html__( 'Choose Background Color', 'aeonwp' ),
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_dropdown_input_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_dropdown_input_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Color', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_dropdown_input_color',
			'tooltip' => esc_html__( 'Choose Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_search_dropdown_input_border_wrapper',
	array(
		'section' => 'aeon_header_design',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'search_dropdown_input_border',
				'search_dropdown_input_border_hover',
				'search_dropdown_input_border_focus',
			),
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_dropdown_input_border]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_dropdown_input_border'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Border Color', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_dropdown_input_border',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_dropdown_input_border_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_dropdown_input_border_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Border Color Hover', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_dropdown_input_border_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_dropdown_input_border_focus]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_dropdown_input_border_focus'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Border Color Hover', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_dropdown_input_border_focus',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 80,
	)
);

$wp_customize->add_setting(
	'aeon_settings[search_fullscreen_design_heading]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Aeon_Heading_Control(
		$wp_customize,
		'aeon_settings[search_fullscreen_design_heading]',
		array(
			'label' => esc_html__( 'Search Full Screen', 'aeonwp' ),
			'section' => 'aeon_header_design',
			'custom_class' => 'no-separator custom-heading',
			'priority' => 80,
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[search_fullscreen_bg]',
	array(
		'default' => $defaults['search_fullscreen_bg'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Color_Control(
		$wp_customize,
		'aeon_settings[search_fullscreen_bg]',
		array(
			'label' => esc_html__( 'Background Color', 'aeonwp' ),
			'section' => 'aeon_header_design',
			'custom_class' => 'no-separator',
			'priority' => 80,
		)
	)
);

$wp_customize->add_setting(
	'aeon_settings[search_fullscreen_title_color]',
	array(
		'default' => $defaults['search_fullscreen_title_color'],
		'type' => 'option',
		'sanitize_callback' => 'aeon_sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new Aeon_Color_Control(
		$wp_customize,
		'aeon_settings[search_fullscreen_title_color]',
		array(
			'label' => esc_html__( 'Title Color', 'aeonwp' ),
			'section' => 'aeon_header_design',
			'priority' => 80,
		)
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_search_fullscreen_input_wrapper',
	array(
		'section' => 'aeon_header_design',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'search_fullscreen_input_bg',
				'search_fullscreen_input_color',
			),
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_fullscreen_input_bg]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_fullscreen_input_bg'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Background / Color', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_fullscreen_input_bg',
			'tooltip' => esc_html__( 'Choose Background Color', 'aeonwp' ),
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_fullscreen_input_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_fullscreen_input_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Color', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_fullscreen_input_color',
			'tooltip' => esc_html__( 'Choose Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_search_fullscreen_input_border_wrapper',
	array(
		'section' => 'aeon_header_design',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'search_fullscreen_input_border',
				'search_fullscreen_input_border_hover',
				'search_fullscreen_input_border_focus',
			),
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_fullscreen_input_border]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_fullscreen_input_border'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Border Color', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_fullscreen_input_border',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_fullscreen_input_border_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_fullscreen_input_border_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Border Color Hover', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_fullscreen_input_border_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_fullscreen_input_border_focus]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_fullscreen_input_border_focus'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Border Color Hover', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_fullscreen_input_border_focus',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_search_fullscreen_close_btn_wrapper',
	array(
		'section' => 'aeon_header_design',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'search_fullscreen_close_btn_color',
				'search_fullscreen_close_btn_color_hover',
			),
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_fullscreen_close_btn_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_fullscreen_close_btn_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Close Button Color', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_fullscreen_close_btn_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_fullscreen_close_btn_color_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_fullscreen_close_btn_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Close Button Color Hover', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_fullscreen_close_btn_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 80,
	)
);

$wp_customize->add_setting(
	'aeon_settings[search_slide_heading]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Aeon_Heading_Control(
		$wp_customize,
		'aeon_settings[search_slide_heading]',
		array(
			'label' => esc_html__( 'Search Slide', 'aeonwp' ),
			'section' => 'aeon_header_design',
			'custom_class' => 'no-separator custom-heading',
			'priority' => 80,
		)
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_search_slide_input_wrapper',
	array(
		'section' => 'aeon_header_design',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'search_slide_input_bg',
				'search_slide_input_color',
			),
		),
		'custom_class' => 'no-separator',
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_slide_input_bg]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_slide_input_bg'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Background / Color', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_slide_input_bg',
			'tooltip' => esc_html__( 'Choose Background Color', 'aeonwp' ),
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_slide_input_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_slide_input_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Color', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_slide_input_color',
			'tooltip' => esc_html__( 'Choose Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_search_slide_input_border_wrapper',
	array(
		'section' => 'aeon_header_design',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'search_slide_input_border',
				'search_slide_input_border_hover',
				'search_slide_input_border_focus',
			),
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_slide_input_border]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_slide_input_border'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Border Color', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_slide_input_border',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_slide_input_border_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_slide_input_border_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Border Color Hover', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_slide_input_border_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_slide_input_border_focus]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_slide_input_border_focus'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Input Border Color Hover', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_slide_input_border_focus',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_wrapper(
	'aeon_search_slide_close_btn_wrapper',
	array(
		'section' => 'aeon_header_design',
		'choices' => array(
			'type' => 'color',
			'items' => array(
				'search_slide_close_btn_color',
				'search_slide_close_btn_color_hover',
			),
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_slide_close_btn_color]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_slide_close_btn_color'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Close Button Color', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_slide_close_btn_color',
			'tooltip' => esc_html__( 'Choose Initial Color', 'aeonwp' ),
			'alpha' => true,
		),
		'priority' => 80,
	)
);

Aeon_Customize_Field::add_field(
	'aeon_settings[search_slide_close_btn_color_hover]',
	'Aeon_Color_Control',
	array(
		'default' => $defaults['search_slide_close_btn_color_hover'],
		'transport' => 'postMessage',
		'sanitize_callback' => 'aeon_sanitize_rgba_color',
	),
	array(
		'label' => esc_html__( 'Close Button Color Hover', 'aeonwp' ),
		'section' => 'aeon_header_design',
		'choices' => array(
			'wrapper' => 'search_slide_close_btn_color_hover',
			'tooltip' => esc_html__( 'Choose Hover Color', 'aeonwp' ),
			'hideLabel' => true,
			'alpha' => true,
		),
		'priority' => 80,
	)
);
