<?php
/**
 * Core Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage Aegis
 * @since 1.0.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register core block styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function aegis_register_block_styles() {

		// Core Button Block: 3D Dark.
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-3d-button-dark',
				'label' => esc_html__('3d Button Dark', 'aegis'),
			)
		);

		// Core Button Block: 3D Light.
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-3d-button-light',
				'label' => esc_html__('3d Button Light', 'aegis'),
			)
		);

		// Core Button Block: Effect 1.
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-button-effect-1',
				'label' => esc_html__('Button Effect One', 'aegis'),
			)
		);

		// Core Button Block: Effect 2.
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-button-effect-2',
				'label' => esc_html__('Button Effect Two', 'aegis'),
			)
		);

		// Core Button Block: Line Dark.
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-button-line-dark',
				'label' => esc_html__('Button Line Dark', 'aegis'),
			)
		);

		// Core Button Block: Line Light.
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-button-line-light',
				'label' => esc_html__('Button Line Light', 'aegis'),
			)
		);

		// Core Button Block: Shadow.
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-button-shadow',
				'label' => esc_html__('Button Shadow', 'aegis'),
			)
		);

		// Core Button Block: Outline Shadow.
		register_block_style(
			'core/button',
			array(
				'name'  => 'aegis-button-shadow-outline',
				'label' => esc_html__( 'Outline Shadow', 'aegis' ),
			)
		);

		// Core Columns Block: Border.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'aegis-border',
				'label' => esc_html__( 'Border', 'aegis' ),
			)
		);

		// Core Columns Block: Shadow.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'aegis-shadow',
				'label' => esc_html__( 'Shadow', 'aegis' ),
			)
		);

		// Core Columns Block: Hover Shadow.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'aegis-hover-shadow',
				'label' => esc_html__( 'Hover Shadow', 'aegis' ),
			)
		);

		// Core Column Block: Shadow.
		register_block_style(
			'core/column',
			array(
				'name'  => 'aegis-shadow',
				'label' => esc_html__( 'Shadow', 'aegis' ),
			)
		);

		// Core Column Block: Hover Shadow.
		register_block_style(
			'core/column',
			array(
				'name'  => 'aegis-hover-shadow',
				'label' => esc_html__( 'Hover Shadow', 'aegis' ),
			)
		);

		// Core Cover Block: Border.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'aegis-border',
				'label' => esc_html__( 'Border', 'aegis' ),
			)
		);

		// Core Cover Block: Shadow.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'aegis-shadow',
				'label' => esc_html__( 'Shadow', 'aegis' ),
			)
		);

		// Core Cover Block: Hover Shadow.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'aegis-hover-shadow',
				'label' => esc_html__( 'Hover Shadow', 'aegis' ),
			)
		);

		// Core Cover Block: Shape 1.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'aegis-shape-one',
				'label' => esc_html__( 'Shape One', 'aegis' ),
			)
		);

		// Core Cover Block: Shape 2.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'aegis-shape-two',
				'label' => esc_html__( 'Shape Two', 'aegis' ),
			)
		);

		// Core Cover Block: Shape 3.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'aegis-shape-three',
				'label' => esc_html__( 'Shape Three', 'aegis' ),
			)
		);

		// Core Post Excerpt Block: Button Border.
		register_block_style(
			'core/post-excerpt',
			array(
				'name'  => 'aegis-post-excerpt-border',
				'label' => esc_html__( 'Border', 'aegis' ),
			)
		);

		// Core Post Excerpt Block: Button Border, and Shadow.
		register_block_style(
			'core/post-excerpt',
			array(
				'name'  => 'aegis-post-excerpt-border-shadow',
				'label' => esc_html__( 'Border & Shadow', 'aegis' ),
			)
		);

		// Core Group Block: Border.
		register_block_style(
			'core/group',
			array(
				'name'  => 'aegis-border',
				'label' => esc_html__( 'Border', 'aegis' ),
			)
		);

		// Core Group Block: Shadow.
		register_block_style(
			'core/group',
			array(
				'name'  => 'aegis-shadow',
				'label' => esc_html__( 'Shadow', 'aegis' ),
			)
		);

		// Core Group Block: Hover Shadow.
		register_block_style(
			'core/group',
			array(
				'name'  => 'aegis-hover-shadow',
				'label' => esc_html__( 'Hover Shadow', 'aegis' ),
			)
		);

		// Core Heading Block: Border Top Radius.
		register_block_style(
			'core/heading',
			array(
				'name'  => 'aegis-heading-border-radius',
				'label' => esc_html__( 'Border Top Radius', 'aegis' ),
			)
		);

		// Core Heading Block: Scrolling Text.
		register_block_style(
			'core/heading',
			array(
				'name'  => 'aegis-scroll-text',
				'label' => esc_html__( 'Scroll', 'aegis' ),
			)
		);

		// Core Image Block: Border.
		register_block_style(
			'core/image',
			array(
				'name'  => 'aegis-border',
				'label' => esc_html__( 'Border', 'aegis' ),
			)
		);

		// Core Image Block: Effect 1.
		register_block_style(
			'core/image',
			array(
				'name'  => 'aegis-effect-1-image',
				'label' => esc_html__( 'Effect 1', 'aegis' ),
			)
		);

		// Core Image Block: Effect 2.
		register_block_style(
			'core/image',
			array(
				'name'  => 'aegis-effect-2-image',
				'label' => esc_html__( 'Effect 2', 'aegis' ),
			)
		);

		// Core Image Block: Effect 3.
		register_block_style(
			'core/image',
			array(
				'name'  => 'aegis-effect-3-image',
				'label' => esc_html__( 'Effect 3', 'aegis' ),
			)
		);

		// Core Image Block: Shadow.
		register_block_style(
			'core/image',
			array(
				'name'  => 'aegis-shadow-image',
				'label' => esc_html__( 'Shadow', 'aegis' ),
			)
		);

		// Core Image Block: Hover Shadow.
		register_block_style(
			'core/image',
			array(
				'name'  => 'aegis-hover-shadow-image',
				'label' => esc_html__( 'Hover Shadow', 'aegis' ),
			)
		);

		// Core Navigation Block: Mega Menus
		register_block_style(
			'core/navigation-submenu',
			array(
				'name'  => 'mega-menu',
				'label' => esc_html__('Mega Menu', 'aegis'),
			)
		);

		// Core Navigation Block: Underline Hover.
		register_block_style(
			'core/navigation',
			array(
				'name'  => 'aegis-navigation-line',
				'label' => esc_html__( 'Underline Hover', 'aegis' ),
			)
		);

		// Core Paragraph Block: Scrolling Text.
		register_block_style(
			'core/paragraph',
			array(
				'name'  => 'aegis-scroll-text',
				'label' => esc_html__( 'Scroll', 'aegis' ),
			)
		);

		// Core Post Title Block: No Border
		register_block_style(
			'core/post-title',
			array(
				'name'  => 'aegis-post-title-border',
				'label' => esc_html__( 'Link No Border', 'aegis' ),
			)
		);

		// Core Post Date Block: Border
		register_block_style(
			'core/post-date',
			array(
				'name'  => 'aegis-post-date-border',
				'label' => esc_html__( 'Link No Border', 'aegis' ),
			)
		);

		// Core Post Featured Image Block: Effect 1.
		register_block_style(
			'core/post-featured-image',
			array(
				'name'  => 'aegis-post-featured-image-effect-1',
				'label' => esc_html__( 'Effect 1', 'aegis' ),
			)
		);

		// Core Post Featured Image Block: Effect 2.
		register_block_style(
			'core/post-featured-image',
			array(
				'name'  => 'aegis-post-featured-image-effect-2',
				'label' => esc_html__( 'Effect 2', 'aegis' ),
			)
		);

		// Core Post Featured Image Block: Shadow.
		register_block_style(
			'core/post-featured-image',
			array(
				'name'  => 'aegis-post-featured-image-shadow',
				'label' => esc_html__( 'Shadow', 'aegis' ),
			)
		);

		// Core Video Block: Shadow.
		register_block_style(
			'core/video',
			array(
				'name'  => 'aegis-shadow',
				'label' => esc_html__('Shadow', 'aegis'),
			)
		);
	}
	add_action( 'init', 'aegis_register_block_styles' );
}