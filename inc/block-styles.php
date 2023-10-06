<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage Aegis
 * @since 1.0.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function aegis_register_block_styles() {
		// Columns: Shadow.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'aegis-shadow',
				'label' => esc_html__( 'Shadow', 'aegis' ),
			)
		);

		// Column: Shadow.
		register_block_style(
			'core/column',
			array(
				'name'  => 'aegis-shadow',
				'label' => esc_html__( 'Shadow', 'aegis' ),
			)
		);

		// Cover: Shadow.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'aegis-shadow',
				'label' => esc_html__( 'Shadow', 'aegis' ),
			)
		);

		// Cover: Shape 1.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'aegis-shape-one',
				'label' => esc_html__( 'Shape One', 'aegis' ),
			)
		);

		// Cover: Shape 2.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'aegis-shape-two',
				'label' => esc_html__( 'Shape Two', 'aegis' ),
			)
		);

		// Cover: Shape 3.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'aegis-shape-three',
				'label' => esc_html__( 'Shape Three', 'aegis' ),
			)
		);

		// Group: Shadow.
		register_block_style(
			'core/group',
			array(
				'name'  => 'aegis-shadow',
				'label' => esc_html__( 'Shadow', 'aegis' ),
			)
		);

		// Image: Shadow.
		register_block_style(
			'core/image',
			array(
				'name'  => 'aegis-shadow-image',
				'label' => esc_html__( 'Shadow', 'aegis' ),
			)
		);

		// Image: Effect 1.
		register_block_style(
			'core/image',
			array(
				'name'  => 'aegis-effect-1-image',
				'label' => esc_html__( 'Effect 1', 'aegis' ),
			)
		);

		// Image: Effect 2.
		register_block_style(
			'core/image',
			array(
				'name'  => 'aegis-effect-2-image',
				'label' => esc_html__( 'Effect 2', 'aegis' ),
			)
		);

		// Image: Effect 3.
		register_block_style(
			'core/image',
			array(
				'name'  => 'aegis-effect-3-image',
				'label' => esc_html__( 'Effect 3', 'aegis' ),
			)
		);

		// Columns: Border.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'aegis-border',
				'label' => esc_html__( 'Border', 'aegis' ),
			)
		);

		// Cover: Border.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'aegis-border',
				'label' => esc_html__( 'Border', 'aegis' ),
			)
		);

		// Group: Border.
		register_block_style(
			'core/group',
			array(
				'name'  => 'aegis-border',
				'label' => esc_html__( 'Border', 'aegis' ),
			)
		);

		// Image: Border.
		register_block_style(
			'core/image',
			array(
				'name'  => 'aegis-border',
				'label' => esc_html__( 'Border', 'aegis' ),
			)
		);

		// Columns: Hover Shadow.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'aegis-hover-shadow',
				'label' => esc_html__( 'Hover Shadow', 'aegis' ),
			)
		);

		// Column: Hover Shadow.
		register_block_style(
			'core/column',
			array(
				'name'  => 'aegis-hover-shadow',
				'label' => esc_html__( 'Hover Shadow', 'aegis' ),
			)
		);

		// Cover: Hover Shadow.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'aegis-hover-shadow',
				'label' => esc_html__( 'Hover Shadow', 'aegis' ),
			)
		);

		// Group: Hover Shadow.
		register_block_style(
			'core/group',
			array(
				'name'  => 'aegis-hover-shadow',
				'label' => esc_html__( 'Hover Shadow', 'aegis' ),
			)
		);

		// Image: Hover Shadow.
		register_block_style(
			'core/image',
			array(
				'name'  => 'aegis-hover-shadow-image',
				'label' => esc_html__( 'Hover Shadow', 'aegis' ),
			)
		);

		// Button: Shadow.
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-button-shadow-outline',
				'label' => esc_html__( 'Outline Shadow', 'aegis' ),
			)
		);
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-3d-button-light',
				'label' => esc_html__('3d Button Light', 'aegis'),
			)
		);
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-3d-button-dark',
				'label' => esc_html__('3d Button Dark', 'aegis'),
			)
		);
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-button-line-light',
				'label' => esc_html__('Button Line Light', 'aegis'),
			)
		);
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-button-line-dark',
				'label' => esc_html__('Button Line Dark', 'aegis'),
			)
		);
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-button-shadow',
				'label' => esc_html__('Button Shadow', 'aegis'),
			)
		);
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-button-effect-1',
				'label' => esc_html__('Button Effect One', 'aegis'),
			)
		);
		
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-button-effect-2',
				'label' => esc_html__('Button Effect Two', 'aegis'),
			)
		);

		// Navigation: Hover.
		register_block_style(
			'core/navigation',
			array(
				'name'  => 'aegis-navigation-line',
				'label' => esc_html__( 'Underline Hover', 'aegis' ),
			)
		);
		
		// Button: Border and Shadow.
		register_block_style(
			'core/post-excerpt',
			array(
				'name'  => 'aegis-post-excerpt-border-shadow',
				'label' => esc_html__( 'Border & Shadow', 'aegis' ),
			)
		);

		// Button: Border
		register_block_style(
			'core/post-excerpt',
			array(
				'name'  => 'aegis-post-excerpt-border',
				'label' => esc_html__( 'Border', 'aegis' ),
			)
		);

		// Post Title: Border
		register_block_style(
			'core/post-title',
			array(
				'name'  => 'aegis-post-title-border',
				'label' => esc_html__( 'Link No Border', 'aegis' ),
			)
		);

		// Post Date: Border
		register_block_style(
			'core/post-date',
			array(
				'name'  => 'aegis-post-date-border',
				'label' => esc_html__( 'Link No Border', 'aegis' ),
			)
		);

		// Post Featured Image: Shadow
		register_block_style(
			'core/post-featured-image',
			array(
				'name'  => 'aegis-post-featured-image-shadow',
				'label' => esc_html__( 'Shadow', 'aegis' ),
			)
		);

		// Post Featured Image: Effect 1
		register_block_style(
			'core/post-featured-image',
			array(
				'name'  => 'aegis-post-featured-image-effect-1',
				'label' => esc_html__( 'Effect 1', 'aegis' ),
			)
		);

		// Post Featured Image: Effect 2
		register_block_style(
			'core/post-featured-image',
			array(
				'name'  => 'aegis-post-featured-image-effect-2',
				'label' => esc_html__( 'Effect 2', 'aegis' ),
			)
		);

		register_block_style(
			'core/navigation-submenu',
			array(
				'name'  => 'mega-menu',
				'label' => esc_html__('Mega Menu', 'aegis'),
			)
		);

		// Heading: Border Top Radius
		register_block_style(
			'core/heading',
			array(
				'name'  => 'aegis-heading-border-radius',
				'label' => esc_html__( 'Border Top Radius', 'aegis' ),
			)
		);

		// Heading: Scrolling Text
		register_block_style(
			'core/heading',
			array(
				'name'  => 'aegis-scroll-text',
				'label' => esc_html__( 'Scroll', 'aegis' ),
			)
		);

		// Paragraph: Scrolling Text
		register_block_style(
			'core/paragraph',
			array(
				'name'  => 'aegis-scroll-text',
				'label' => esc_html__( 'Scroll', 'aegis' ),
			)
		);
	}
	add_action( 'init', 'aegis_register_block_styles' );
}