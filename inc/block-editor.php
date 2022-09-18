<?php
/**
 * Integration with Gutenberg.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add CSS to the admin side of the block editor.
 *
 * @since 1.0.0
 */
function aeon_enqueue_backend_block_editor() {
	wp_enqueue_style(
		'aeon-block-editor-style',
		AEON_THEME_URI . 'assets/css/admin/block-editor.css',
		false,
		AEON_VERSION,
		'all'
	);
	wp_add_inline_style( 'aeon-block-editor-style', wp_strip_all_tags( aeon_do_inline_block_editor_css() ) );

	wp_enqueue_script(
		'aeon-block-editor',
		AEON_THEME_URI . 'assets/js/admin/block-editor.js',
		array(),
		AEON_VERSION,
		true
	);

	wp_localize_script(
		'aeon-block-editor',
		'aeBlockEditor',
		array(
			'containerWidth' => aeon_get_option( 'container_width' ),
			'rightSidebarWidth' => apply_filters( 'aeon_right_sidebar_width', '30' ),
			'leftSidebarWidth' => apply_filters( 'aeon_left_sidebar_width', '30' ),
		)
	);

	// Render fonts in Gutenberg layout.
	Aeon_Fonts::render_fonts();
}
add_action( 'enqueue_block_editor_assets', 'aeon_enqueue_backend_block_editor' );

/**
 * Write the CSS for the block editor.
 *
 * @since 1.0.0
 */
function aeon_do_inline_block_editor_css() {
	$settings = wp_parse_args(
		get_option( 'aeon_settings', array() ),
		aeon_get_defaults()
	);

	$font_settings = wp_parse_args(
		get_option( 'aeon_settings', array() ),
		aeon_get_default_fonts()
	);

	$css = new Aeon_CSS();

	$css->set_selector( 'body .wp-block, html body.gutenberg-editor-page .editor-post-title__block, html body.gutenberg-editor-page .editor-default-block-appender, html body.gutenberg-editor-page .editor-block-list__block' );
	if ( 'full-width' === get_post_meta( get_the_ID(), 'aeon-layout-meta', true ) ) {
		$css->add_property( 'max-width', '100%' );
	} else {
		$css->add_property( 'max-width', absint( aeon_get_block_editor_content_width() ), false, 'px'  );
	}

	$css->set_selector( 'html body.gutenberg-editor-page .block-editor-block-list__block[data-align="full"]' );
	$css->add_property( 'max-width', 'none' );

	$css->set_selector( '.wp-block-button__link' );
	$css->add_property( 'background-color', $settings['global_color'] );

	$css->set_selector( '.editor-styles-wrapper a:hover' );
	$css->add_property( 'color', $settings['global_color'] );

	$css->set_selector( '.wp-block-button__link:hover' );
	$css->add_property( 'background-color', $settings['global_color_hover'] );

	$css->set_selector( '.editor-styles-wrapper h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-styles-wrapper .editor-post-title__input, .editor-styles-wrapper h2, .wp-block-heading h2.editor-rich-text__tinymce, .editor-styles-wrapper h3, .wp-block-heading h3.editor-rich-text__tinymce, .editor-styles-wrapper h4, .wp-block-heading h4.editor-rich-text__tinymce, .editor-styles-wrapper h5, .wp-block-heading h5.editor-rich-text__tinymce, .editor-styles-wrapper h6, .wp-block-heading h6.editor-rich-text__tinymce' );
	$css->add_property( 'color', $settings['headings_color'] );

	$css->set_selector( 'body.block-editor-page, .editor-styles-wrapper' );
	$css->add_property( 'background-color', $settings['background_color'] );
	$css->add_property( 'color', $settings['text_color'] );

	$css->set_selector( 'body .editor-styles-wrapper a' );
	$css->add_property( 'color', $settings['link_color'] );

	$css->set_selector( 'body .editor-styles-wrapper a:hover' );
	$css->add_property( 'color', $settings['link_color_hover'] );

	$css->set_selector( 'body .editor-styles-wrapper a:active' );
	$css->add_property( 'color', $settings['link_color_active'] );

	$css->set_selector( 'body .editor-styles-wrapper a:visited' );
	$css->add_property( 'color', $settings['link_color_visited'] );

	$css->set_selector( 'body .block-editor-block-list__layout .wp-block-button .wp-block-button__link' );
	$css->add_property( 'background-color', $settings['button_background_color'] );

	$css->set_selector( 'body .block-editor-block-list__layout .wp-block-button .wp-block-button__link:hover' );
	$css->add_property( 'background-color', $settings['button_background_color_hover'] );

	$css->set_selector( 'body .block-editor-block-list__layout .wp-block-button .wp-block-button__link' );
	$css->add_property( 'color', $settings['button_color'] );

	$css->set_selector( 'body .block-editor-block-list__layout .wp-block-button .wp-block-button__link:hover' );
	$css->add_property( 'color', $settings['button_color_hover'] );

	// Fonts.
	$css->set_selector( 'body.gutenberg-editor-page .block-editor-block-list__block, body .editor-styles-wrapper' );
	$css->add_property( 'font-family', $font_settings['font_body'] );
	$css->add_property( 'font-weight', $font_settings['body_font_weight'] );
	$css->add_property( 'text-transform', $font_settings['body_font_transform'] );
	if ( ! empty( $font_settings['body_font_size']['desktop'] ) ) {
		$css->add_property( 'font-size', absint( $font_settings['body_font_size']['desktop'] ), false, $font_settings['body_font_size_unit'] );
	}
	$css->set_selector( '.editor-styles-wrapper, .editor-styles-wrapper p, .editor-styles-wrapper .mce-content-body' );
	$css->add_property( 'line-height', floatval( $font_settings['body_line_height'] ), false, $font_settings['body_line_height_unit'] );
	
	$css->set_selector( '.editor-styles-wrapper h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-styles-wrapper .editor-post-title__input, .editor-styles-wrapper h2, .wp-block-heading h2.editor-rich-text__tinymce, .editor-styles-wrapper h3, .wp-block-heading h3.editor-rich-text__tinymce, .editor-styles-wrapper h4, .wp-block-heading h4.editor-rich-text__tinymce, .editor-styles-wrapper h5, .wp-block-heading h5.editor-rich-text__tinymce, .editor-styles-wrapper h6, .wp-block-heading h6.editor-rich-text__tinymce' );
	$css->add_property( 'font-family', $font_settings['font_headings'] );
	$css->add_property( 'font-weight', $font_settings['headings_weight'] );
	$css->add_property( 'text-transform', $font_settings['headings_transform'] );
	if ( ! empty( $font_settings['headings_font_size']['desktop'] ) ) {
		$css->add_property( 'font-size', absint( $font_settings['headings_font_size']['desktop'] ), false, $font_settings['headings_font_size_unit'] );
	}
	if ( ! empty( $font_settings['headings_line_height'] ) ) {
		$css->add_property( 'line-height', floatval( $font_settings['headings_line_height'] ), false, $font_settings['headings_line_height_unit'] );
	}
	
	$css->set_selector( '.editor-styles-wrapper h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-styles-wrapper .editor-post-title__input' );
	$css->add_property( 'font-family', $font_settings['font_heading_1'] );
	$css->add_property( 'font-weight', $font_settings['heading_1_weight'] );
	$css->add_property( 'text-transform', $font_settings['heading_1_transform'] );
	if ( ! empty( $font_settings['heading_1_font_size']['desktop'] ) ) {
		$css->add_property( 'font-size', absint( $font_settings['heading_1_font_size']['desktop'] ), false, $font_settings['heading_1_font_size_unit'] );
	}
	$css->add_property( 'line-height', floatval( $font_settings['heading_1_line_height'] ), false, $font_settings['heading_1_line_height_unit'] );

	$css->set_selector( '.editor-styles-wrapper h2, .wp-block-heading h2.editor-rich-text__tinymce' );
	$css->add_property( 'font-family', $font_settings['font_heading_2'] );
	$css->add_property( 'font-weight', $font_settings['heading_2_weight'] );
	$css->add_property( 'text-transform', $font_settings['heading_2_transform'] );
	if ( ! empty( $font_settings['heading_2_font_size']['desktop'] ) ) {
		$css->add_property( 'font-size', absint( $font_settings['heading_2_font_size']['desktop'] ), false, $font_settings['heading_2_font_size_unit'] );
	}
	$css->add_property( 'line-height', floatval( $font_settings['heading_2_line_height'] ), false, $font_settings['heading_2_line_height_unit'] );

	$css->set_selector( '.editor-styles-wrapper h3, .wp-block-heading h3.editor-rich-text__tinymce' );
	$css->add_property( 'font-family', $font_settings['font_heading_3'] );
	$css->add_property( 'font-weight', $font_settings['heading_3_weight'] );
	$css->add_property( 'text-transform', $font_settings['heading_3_transform'] );
	$css->add_property( 'font-size', absint( $font_settings['heading_3_font_size'] ), false, $font_settings['heading_3_font_size_unit'] );
	$css->add_property( 'line-height', floatval( $font_settings['heading_3_line_height'] ), false, $font_settings['heading_3_line_height_unit'] );

	$css->set_selector( '.editor-styles-wrapper h4, .wp-block-heading h4.editor-rich-text__tinymce' );
	$css->add_property( 'font-family', $font_settings['font_heading_4'] );
	$css->add_property( 'font-weight', $font_settings['heading_4_weight'] );
	$css->add_property( 'text-transform', $font_settings['heading_4_transform'] );
	$css->add_property( 'font-size', absint( $font_settings['heading_4_font_size'] ), false, $font_settings['heading_4_font_size_unit'] );
	if ( ! empty( $font_settings['heading_4_line_height'] ) ) {
		$css->add_property( 'line-height', floatval( $font_settings['heading_4_line_height'] ), false, $font_settings['heading_4_line_height_unit'] );
	}

	$css->set_selector( '.editor-styles-wrapper h5, .wp-block-heading h5.editor-rich-text__tinymce' );
	$css->add_property( 'font-family', $font_settings['font_heading_5'] );
	$css->add_property( 'font-weight', $font_settings['heading_5_weight'] );
	$css->add_property( 'text-transform', $font_settings['heading_5_transform'] );
	$css->add_property( 'font-size', absint( $font_settings['heading_5_font_size'] ), false, $font_settings['heading_5_font_size_unit'] );
	if ( ! empty( $font_settings['heading_5_line_height'] ) ) {
		$css->add_property( 'line-height', floatval( $font_settings['heading_5_line_height'] ), false, $font_settings['heading_5_line_height_unit'] );
	}

	$css->set_selector( '.editor-styles-wrapper h6, .wp-block-heading h6.editor-rich-text__tinymce' );
	$css->add_property( 'font-family', $font_settings['font_heading_6'] );
	$css->add_property( 'font-weight', $font_settings['heading_6_weight'] );
	$css->add_property( 'text-transform', $font_settings['heading_6_transform'] );
	$css->add_property( 'font-size', absint( $font_settings['heading_6_font_size'] ), false, $font_settings['heading_6_font_size_unit'] );
	if ( ! empty( $font_settings['heading_6_line_height'] ) ) {
		$css->add_property( 'line-height', floatval( $font_settings['heading_6_line_height'] ), false, $font_settings['heading_6_line_height_unit'] );
	}

	$css->start_media_query( aeon_get_media_query( 'tablet' ) );
	if ( ! empty( $font_settings['body_font_size']['tablet'] ) ) {
		$css->set_selector( '.editor-styles-wrapper h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-styles-wrapper .editor-post-title__input' );
		$css->add_property( 'font-size', absint( $font_settings['body_font_size']['tablet'] ), false, $font_settings['body_font_size_unit'] );
	}

	if ( ! empty( $font_settings['headings_font_size']['tablet'] ) ) {
		$css->set_selector( '.editor-styles-wrapper h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-styles-wrapper .editor-post-title__input, .editor-styles-wrapper h2, .wp-block-heading h2.editor-rich-text__tinymce, .editor-styles-wrapper h3, .wp-block-heading h3.editor-rich-text__tinymce, .editor-styles-wrapper h4, .wp-block-heading h4.editor-rich-text__tinymce, .editor-styles-wrapper h5, .wp-block-heading h5.editor-rich-text__tinymce, .editor-styles-wrapper h6, .wp-block-heading h6.editor-rich-text__tinymce' );
		$css->add_property( 'font-size', absint( $font_settings['headings_font_size']['tablet'] ), false, $font_settings['headings_font_size_unit'] );
	}

	if ( ! empty( $font_settings['heading_1_font_size']['tablet'] ) ) {
		$css->set_selector( '.editor-styles-wrapper h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-styles-wrapper .editor-post-title__input' );
		$css->add_property( 'font-size', absint( $font_settings['heading_1_font_size']['tablet'] ), false, $font_settings['heading_1_font_size_unit'] );
	}

	if ( ! empty( $font_settings['heading_2_font_size']['tablet'] ) ) {
		$css->set_selector( '.editor-styles-wrapper h2, .wp-block-heading h2.editor-rich-text__tinymce' );
		$css->add_property( 'font-size', absint( $font_settings['heading_2_font_size']['tablet'] ), false, $font_settings['heading_2_font_size_unit'] );
	}
	$css->stop_media_query();

	$css->start_media_query( aeon_get_media_query( 'mobile' ) );
	if ( ! empty( $font_settings['body_font_size']['mobile'] ) ) {
		$css->set_selector( '.editor-styles-wrapper h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-styles-wrapper .editor-post-title__input' );
		$css->add_property( 'font-size', absint( $font_settings['body_font_size']['mobile'] ), false, $font_settings['body_font_size_unit'] );
	}

	if ( ! empty( $font_settings['headings_font_size']['mobile'] ) ) {
		$css->set_selector( '.editor-styles-wrapper h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-styles-wrapper .editor-post-title__input, .editor-styles-wrapper h2, .wp-block-heading h2.editor-rich-text__tinymce, .editor-styles-wrapper h3, .wp-block-heading h3.editor-rich-text__tinymce, .editor-styles-wrapper h4, .wp-block-heading h4.editor-rich-text__tinymce, .editor-styles-wrapper h5, .wp-block-heading h5.editor-rich-text__tinymce, .editor-styles-wrapper h6, .wp-block-heading h6.editor-rich-text__tinymce' );
		$css->add_property( 'font-size', absint( $font_settings['headings_font_size']['mobile'] ), false, $font_settings['headings_font_size_unit'] );
	}

	if ( ! empty( $font_settings['heading_1_font_size']['mobile'] ) ) {
		$css->set_selector( '.editor-styles-wrapper h1, .wp-block-heading h1.editor-rich-text__tinymce, .editor-styles-wrapper .editor-post-title__input' );
		$css->add_property( 'font-size', absint( $font_settings['heading_1_font_size']['mobile'] ), false, $font_settings['heading_1_font_size_unit'] );
	}

	if ( ! empty( $font_settings['heading_2_font_size']['mobile'] ) ) {
		$css->set_selector( '.editor-styles-wrapper h2, .wp-block-heading h2.editor-rich-text__tinymce' );
		$css->add_property( 'font-size', absint( $font_settings['heading_2_font_size']['mobile'] ), false, $font_settings['heading_2_font_size_unit'] );
	}
	$css->stop_media_query();

	return $css->css_output();
}

/**
 * Get the content width.
 */
function aeon_get_block_editor_content_width() {
	$layout = get_post_meta( get_the_ID(), 'aeon-layout-meta', true );
	$container_width = aeon_get_option( 'container_width' );
	$content_width = $container_width;
	$right_sidebar_width = apply_filters( 'aeon_right_sidebar_width', '30' );
	$left_sidebar_width = apply_filters( 'aeon_left_sidebar_width', '30' );

	if ( 'no-sidebar' === $layout ) {
		$content_width = $container_width;
	} elseif ( 'left-sidebar' === $layout ) {
		$content_width = $container_width * ( ( 100 - $left_sidebar_width ) / 100 );
	} elseif ( 'right-sidebar' === $layout ) {
		$content_width = $container_width * ( ( 100 - $right_sidebar_width ) / 100 );
	}

	return apply_filters( 'aeon_block_editor_content_width', $content_width );
}
