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

		// Core Buttons Block: Show on Desktop
		register_block_style(
			'core/buttons',
			array(
				'name'  => 'show-on-desktop',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Buttons Block: Hide on Desktop
		register_block_style(
			'core/buttons',
			array(
				'name'  => 'hide-on-desktop',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Buttons Block: Show on Tablet
		register_block_style(
			'core/buttons',
			array(
				'name'  => 'show-on-tablet',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Buttons Block: Hide on Tablet
		register_block_style(
			'core/buttons',
			array(
				'name'  => 'hide-on-tablet',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Buttons Block: Show on Mobile
		register_block_style(
			'core/buttons',
			array(
				'name'  => 'show-on-mobile',
				'label' => esc_html__('Show on Mobile', 'aegis'),
			)
		);

		// Core Buttons Block: Hide on Mobile
		register_block_style(
			'core/buttons',
			array(
				'name'  => 'hide-on-mobile',
				'label' => esc_html__('Hide on Mobile', 'aegis'),
			)
		);

		// Core Buttons Block: Show on Mobile Landscape
		register_block_style(
			'core/buttons',
			array(
				'name'  => 'show-on-mobile-landscape',
				'label' => esc_html__('Show on Mobile Landscape', 'aegis'),
			)
		);

		// Core Buttons Block: Hide on Mobile Landscape
		register_block_style(
			'core/buttons',
			array(
				'name'  => 'hide-on-mobile-landscape',
				'label' => esc_html__('Hide on Mobile Landscape', 'aegis'),
			)
		);

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

		// Core Button Block: Underline Border Style
		register_block_style(
			'core/button',
			array(
				'name'  => 'underline-border',
				'label' => esc_html__('Underline Border', 'aegis'),
			)
		);

		// Core Button Block: Show on Desktop
		register_block_style(
			'core/button',
			array(
				'name'  => 'show-on-desktop',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Button Block: Hide on Desktop
		register_block_style(
			'core/button',
			array(
				'name'  => 'hide-on-desktop',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Button Block: Show on Tablet
		register_block_style(
			'core/button',
			array(
				'name'  => 'show-on-tablet',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Button Block: Hide on Tablet
		register_block_style(
			'core/button',
			array(
				'name'  => 'hide-on-tablet',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Button Block: Show on Mobile
		register_block_style(
			'core/button',
			array(
				'name'  => 'show-on-mobile',
				'label' => esc_html__('Show on Mobile', 'aegis'),
			)
		);

		// Core Button Block: Hide on Mobile
		register_block_style(
			'core/button',
			array(
				'name'  => 'hide-on-mobile',
				'label' => esc_html__('Hide on Mobile', 'aegis'),
			)
		);

		// Core Button Block: Show on Mobile Landscape
		register_block_style(
			'core/button',
			array(
				'name'  => 'show-on-mobile-landscape',
				'label' => esc_html__('Show on Mobile Landscape', 'aegis'),
			)
		);

		// Core Button Block: Hide on Mobile Landscape
		register_block_style(
			'core/button',
			array(
				'name'  => 'hide-on-mobile-landscape',
				'label' => esc_html__('Hide on Mobile Landscape', 'aegis'),
			)
		);

		// Core Columns Block: Show on Desktop
		register_block_style(
			'core/columns',
			array(
				'name'  => 'show-on-desktop',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Columns Block: Hide on Desktop
		register_block_style(
			'core/columns',
			array(
				'name'  => 'hide-on-desktop',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Columns Block: Show on Tablet
		register_block_style(
			'core/columns',
			array(
				'name'  => 'show-on-tablet',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Columns Block: Hide on Tablet
		register_block_style(
			'core/columns',
			array(
				'name'  => 'hide-on-tablet',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Columns Block: Show on Mobile
		register_block_style(
			'core/columns',
			array(
				'name'  => 'show-on-mobile',
				'label' => esc_html__('Show on Mobile', 'aegis'),
			)
		);

		// Core Columns Block: Hide on Mobile
		register_block_style(
			'core/columns',
			array(
				'name'  => 'hide-on-mobile',
				'label' => esc_html__('Hide on Mobile', 'aegis'),
			)
		);

		// Core Columns Block: Show on Mobile Landscape
		register_block_style(
			'core/columns',
			array(
				'name'  => 'show-on-mobile-landscape',
				'label' => esc_html__('Show on Mobile Landscape', 'aegis'),
			)
		);

		// Core Columns Block: Hide on Mobile Landscape
		register_block_style(
			'core/columns',
			array(
				'name'  => 'hide-on-mobile-landscape',
				'label' => esc_html__('Hide on Mobile Landscape', 'aegis'),
			)
		);

		// Core Column Block: Show on Desktop
		register_block_style(
			'core/column',
			array(
				'name'  => 'show-on-desktop',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Column Block: Hide on Desktop
		register_block_style(
			'core/column',
			array(
				'name'  => 'hide-on-desktop',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Column Block: Show on Tablet
		register_block_style(
			'core/column',
			array(
				'name'  => 'show-on-tablet',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Column Block: Hide on Tablet
		register_block_style(
			'core/column',
			array(
				'name'  => 'hide-on-tablet',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Column Block: Show on Mobile
		register_block_style(
			'core/column',
			array(
				'name'  => 'show-on-mobile',
				'label' => esc_html__('Show on Mobile', 'aegis'),
			)
		);

		// Core Column Block: Hide on Mobile
		register_block_style(
			'core/column',
			array(
				'name'  => 'hide-on-mobile',
				'label' => esc_html__('Hide on Mobile', 'aegis'),
			)
		);

		// Core Column Block: Show on Mobile Landscape
		register_block_style(
			'core/column',
			array(
				'name'  => 'show-on-mobile-landscape',
				'label' => esc_html__('Show on Mobile Landscape', 'aegis'),
			)
		);

		// Core Column Block: Hide on Mobile Landscape
		register_block_style(
			'core/column',
			array(
				'name'  => 'hide-on-mobile-landscape',
				'label' => esc_html__('Hide on Mobile Landscape', 'aegis'),
			)
		);

		// Core Cover Block: Show on Desktop
		register_block_style(
			'core/cover',
			array(
				'name'  => 'show-on-desktop',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Cover Block: Hide on Desktop
		register_block_style(
			'core/cover',
			array(
				'name'  => 'hide-on-desktop',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Cover Block: Show on Tablet
		register_block_style(
			'core/cover',
			array(
				'name'  => 'show-on-tablet',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Cover Block: Hide on Tablet
		register_block_style(
			'core/cover',
			array(
				'name'  => 'hide-on-tablet',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Cover Block: Show on Mobile
		register_block_style(
			'core/cover',
			array(
				'name'  => 'show-on-mobile',
				'label' => esc_html__('Show on Mobile', 'aegis'),
			)
		);

		// Core Cover Block: Hide on Mobile
		register_block_style(
			'core/cover',
			array(
				'name'  => 'hide-on-mobile',
				'label' => esc_html__('Hide on Mobile', 'aegis'),
			)
		);

		// Core Cover Block: Show on Mobile Landscape
		register_block_style(
			'core/cover',
			array(
				'name'  => 'show-on-mobile-landscape',
				'label' => esc_html__('Show on Mobile Landscape', 'aegis'),
			)
		);

		// Core Cover Block: Hide on Mobile Landscape
		register_block_style(
			'core/cover',
			array(
				'name'  => 'hide-on-mobile-landscape',
				'label' => esc_html__('Hide on Mobile Landscape', 'aegis'),
			)
		);

		// Core Group Block: Show on Desktop
		register_block_style(
			'core/group',
			array(
				'name'  => 'show-on-desktop',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Group Block: Hide on Desktop
		register_block_style(
			'core/group',
			array(
				'name'  => 'hide-on-desktop',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Group Block: Show on Tablet
		register_block_style(
			'core/group',
			array(
				'name'  => 'show-on-tablet',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Group Block: Hide on Tablet
		register_block_style(
			'core/group',
			array(
				'name'  => 'hide-on-tablet',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Group Block: Show on Mobile
		register_block_style(
			'core/group',
			array(
				'name'  => 'show-on-mobile',
				'label' => esc_html__('Show on Mobile', 'aegis'),
			)
		);

		// Core Group Block: Hide on Mobile
		register_block_style(
			'core/group',
			array(
				'name'  => 'hide-on-mobile',
				'label' => esc_html__('Hide on Mobile', 'aegis'),
			)
		);

		// Core Group Block: Show on Mobile Landscape
		register_block_style(
			'core/group',
			array(
				'name'  => 'show-on-mobile-landscape',
				'label' => esc_html__('Show on Mobile Landscape', 'aegis'),
			)
		);

		// Core Group Block: Hide on Mobile Landscape
		register_block_style(
			'core/group',
			array(
				'name'  => 'hide-on-mobile-landscape',
				'label' => esc_html__('Hide on Mobile Landscape', 'aegis'),
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

		// Core Image Block: Show on Desktop
		register_block_style(
			'core/image',
			array(
				'name'  => 'show-on-desktop',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Image Block: Hide on Desktop
		register_block_style(
			'core/image',
			array(
				'name'  => 'hide-on-desktop',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Image Block: Show on Tablet
		register_block_style(
			'core/image',
			array(
				'name'  => 'show-on-tablet',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Image Block: Hide on Tablet
		register_block_style(
			'core/image',
			array(
				'name'  => 'hide-on-tablet',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Image Block: Show on Mobile
		register_block_style(
			'core/image',
			array(
				'name'  => 'show-on-mobile',
				'label' => esc_html__('Show on Mobile', 'aegis'),
			)
		);

		// Core Image Block: Hide on Mobile
		register_block_style(
			'core/image',
			array(
				'name'  => 'hide-on-mobile',
				'label' => esc_html__('Hide on Mobile', 'aegis'),
			)
		);

		// Core Image Block: Show on Mobile Landscape
		register_block_style(
			'core/image',
			array(
				'name'  => 'show-on-mobile-landscape',
				'label' => esc_html__('Show on Mobile Landscape', 'aegis'),
			)
		);

		// Core Image Block: Hide on Mobile Landscape
		register_block_style(
			'core/image',
			array(
				'name'  => 'hide-on-mobile-landscape',
				'label' => esc_html__('Hide on Mobile Landscape', 'aegis'),
			)
		);

		// Core Navigation Block: Mega Menu Style
		register_block_style(
			'core/navigation-submenu',
			array(
				'name'  => 'mega-menu',
				'label' => esc_html__('Mega Menu', 'aegis'),
			)
		);

		// Core Paragraph Block: Show on Desktop
		register_block_style(
			'core/paragraph',
			array(
				'name'  => 'show-on-desktop',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Paragraph Block: Hide on Desktop
		register_block_style(
			'core/paragraph',
			array(
				'name'  => 'hide-on-desktop',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Paragraph Block: Show on Tablet
		register_block_style(
			'core/paragraph',
			array(
				'name'  => 'show-on-tablet',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Paragraph Block: Hide on Tablet
		register_block_style(
			'core/paragraph',
			array(
				'name'  => 'hide-on-tablet',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Paragraph Block: Show on Mobile
		register_block_style(
			'core/paragraph',
			array(
				'name'  => 'show-on-mobile',
				'label' => esc_html__('Show on Mobile', 'aegis'),
			)
		);

		// Core Paragraph Block: Hide on Mobile
		register_block_style(
			'core/paragraph',
			array(
				'name'  => 'hide-on-mobile',
				'label' => esc_html__('Hide on Mobile', 'aegis'),
			)
		);

		// Core Paragraph Block: Show on Mobile Landscape
		register_block_style(
			'core/paragraph',
			array(
				'name'  => 'show-on-mobile-landscape',
				'label' => esc_html__('Show on Mobile Landscape', 'aegis'),
			)
		);

		// Core Paragraph Block: Hide on Mobile Landscape
		register_block_style(
			'core/paragraph',
			array(
				'name'  => 'hide-on-mobile-landscape',
				'label' => esc_html__('Hide on Mobile Landscape', 'aegis'),
			)
		);

		// Core Post Date Block: Hide Underline Style
		register_block_style(
			'core/post-date',
			array(
				'name'  => 'hide-underline',
				'label' => esc_html__( 'Hide Underline', 'aegis' ),
			)
		);

		// Core Post Date Block: Show on Desktop
		register_block_style(
			'core/post-date',
			array(
				'name'  => 'show-on-desktop',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Post Date Block: Hide on Desktop
		register_block_style(
			'core/post-date',
			array(
				'name'  => 'hide-on-desktop',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Post Date Block: Show on Tablet
		register_block_style(
			'core/post-date',
			array(
				'name'  => 'show-on-tablet',
				'label' => esc_html__('Show on Desktop', 'aegis'),
			)
		);

		// Core Post Date Block: Hide on Tablet
		register_block_style(
			'core/post-date',
			array(
				'name'  => 'hide-on-tablet',
				'label' => esc_html__('Hide on Desktop', 'aegis'),
			)
		);

		// Core Post Date Block: Show on Mobile
		register_block_style(
			'core/post-date',
			array(
				'name'  => 'show-on-mobile',
				'label' => esc_html__('Show on Mobile', 'aegis'),
			)
		);

		// Core Post Date Block: Hide on Mobile
		register_block_style(
			'core/post-date',
			array(
				'name'  => 'hide-on-mobile',
				'label' => esc_html__('Hide on Mobile', 'aegis'),
			)
		);

		// Core Post Date Block: Show on Mobile Landscape
		register_block_style(
			'core/post-date',
			array(
				'name'  => 'show-on-mobile-landscape',
				'label' => esc_html__('Show on Mobile Landscape', 'aegis'),
			)
		);

		// Core Post Date Block: Hide on Mobile Landscape
		register_block_style(
			'core/post-date',
			array(
				'name'  => 'hide-on-mobile-landscape',
				'label' => esc_html__('Hide on Mobile Landscape', 'aegis'),
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