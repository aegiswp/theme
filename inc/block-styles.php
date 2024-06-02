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
	 * Register Core Block Styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function aegis_register_block_styles() {

		// Core Button Block: 3D Push Style
		register_block_style(
			'core/button',
			array(
				'name'  => '3d-push',
				'label' => esc_html__('3D Push', 'aegis'),
			)
		);

		// Core Button Block: Bubble Pop Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'bubble-pop',
				'label' => esc_html__('Bubble Pop', 'aegis'),
			)
		);

		// Core Button Block: Center Fill Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'center-fill',
				'label' => esc_html__('Center Fill', 'aegis'),
			)
		);

		// Core Button Block: Color Wipe Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'color-wipe',
				'label' => esc_html__('Color Wipe', 'aegis'),
			)
		);

		// Core Button Block: Dense Shadow Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'dense-shadow',
				'label' => esc_html__('Dense Shadow', 'aegis'),
			)
		);

		// Core Button Block: Outline Border Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'outline-border',
				'label' => esc_html__('Outline Border', 'aegis'),
			)
		);

		// Core Button Block: Outline Shadow Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'outline-shadow',
				'label' => esc_html__( 'Outline Shadow', 'aegis' ),
			)
		);

		// Core Button Block: Underline Border Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'underline-border',
				'label' => esc_html__('Underline Border', 'aegis'),
			)
		);

		// Core Button Block: Soft Fade Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'soft-fade',
				'label' => esc_html__('Soft Fade', 'aegis'),
			)
		);

		// Core Button Block: Split Reveal Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'split-reveal',
				'label' => esc_html__('Split Reveal', 'aegis'),
			)
		);

		// Core Heading Block: Hide Underline Style
		register_block_style(
			'core/heading',
			array(
				'name'  => 'hide-underline',
				'label' => esc_html__( 'Hide Underline', 'aegis' ),
			)
		);

	    // Core Image Block: Color Overlay Style
		register_block_style(
			'core/image',
			array(
				'name'  => 'color-overlay',
				'label' => esc_html__( 'Color Overlay', 'aegis' ),
			)
		);

		// Core Image Block: Ease Out Style
		register_block_style(
			'core/image',
			array(
				'name'  => 'ease-out',
				'label' => esc_html__( 'Ease Out', 'aegis' ),
			)
		);

	    // Core Image Block: Fade Scale Style
		register_block_style(
			'core/image',
			array(
				'name'  => 'fade-scale',
				'label' => esc_html__( 'Fade Scale', 'aegis' ),
			)
		);

	    // Core Image Block: Flip Hover Style
		register_block_style(
			'core/image',
			array(
				'name'  => 'flip-hover',
				'label' => esc_html__( 'Flip Hover', 'aegis' ),
			)
		);

		// Core Image Block: Grayscale Hover Style
		register_block_style(
			'core/image',
			array(
				'name'  => 'grayscale-hover',
				'label' => esc_html__( 'Grayscale Hover', 'aegis' ),
			)
		);

	    // Core Image Block: Reveal Hover Style
		register_block_style(
			'core/image',
			array(
				'name'  => 'reveal-hover',
				'label' => esc_html__( 'Reveal Hover', 'aegis' ),
			)
		);

	    // Core Image Block: Rotate Hover Style
		register_block_style(
			'core/image',
			array(
				'name'  => 'rotate-hover',
				'label' => esc_html__( 'Rotate Hover', 'aegis' ),
			)
		);

	    // Core Image Block: Shine Over Style
		register_block_style(
			'core/image',
			array(
				'name'  => 'shine-hover',
				'label' => esc_html__( 'Shine Hover', 'aegis' ),
			)
		);

	    // Core Image Block: Split Reveal Style
		register_block_style(
			'core/image',
			array(
				'name'  => 'split-reveal',
				'label' => esc_html__( 'Split Reveal', 'aegis' ),
			)
		);

	    // Core Image Block: Zoom Hover Style
		register_block_style(
			'core/image',
			array(
				'name'  => 'zoom-hover',
				'label' => esc_html__( 'Zoom Hover', 'aegis' ),
			)
		);

		// Core Post Title Block: Hide Underline Style
		register_block_style(
			'core/post-title',
			array(
				'name'  => 'hide-underline',
				'label' => esc_html__( 'Hide Underline', 'aegis' ),
			)
		);

		// Core Video Block: Hide Underline Style
		register_block_style(
			'core/video',
			array(
				'name'  => 'dark-shadow',
				'label' => esc_html__( 'Dark Shadow', 'aegis' ),
			)
		);

	}
	add_action( 'init', 'aegis_register_block_styles' );
}