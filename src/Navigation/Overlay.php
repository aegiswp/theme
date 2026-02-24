<?php
/**
 * Navigation Overlay Variants
 *
 * Registers and loads navigation overlay CSS using WordPress asset system
 * when a navigation block with overlay variant is detected on the page.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Navigation;

use function add_action;
use function register_block_style;
use function __;

class Overlay {

	/**
	 * Initialize hooks and register block styles.
	 *
	 * @return void
	 */
	public function init(): void {
		add_action( 'init', [ $this, 'register_block_styles' ] );
	}

	/**
	 * Register WordPress block style variations for navigation overlay.
	 *
	 * @return void
	 */
	public function register_block_styles(): void {
		register_block_style(
			'core/navigation',
			[
				'name'         => 'slide-in',
				'label'        => __( 'Slide-in Drawer', 'aegis' ),
				'inline_style' => $this->get_slide_in_styles(),
			]
		);

		register_block_style(
			'core/navigation',
			[
				'name'         => 'slide-in-left',
				'label'        => __( 'Slide-in Left', 'aegis' ),
				'inline_style' => $this->get_slide_in_left_styles(),
			]
		);

		register_block_style(
			'core/navigation',
			[
				'name'         => 'fullscreen',
				'label'        => __( 'Fullscreen Overlay', 'aegis' ),
				'inline_style' => $this->get_fullscreen_styles(),
			]
		);

		register_block_style(
			'core/navigation',
			[
				'name'         => 'scroll',
				'label'        => __( 'Scroll Overlay', 'aegis' ),
				'inline_style' => $this->get_scroll_styles(),
			]
		);
	}

	/**
	 * Get slide-in drawer styles.
	 *
	 * @return string CSS styles for slide-in variation
	 */
	private function get_slide_in_styles(): string {
		return '
			.wp-block-navigation.is-style-slide-in {
				position: fixed;
				top: 0;
				right: 0;
				bottom: 0;
				width: 300px;
				background: var(--wp--preset--color--base);
				transform: translateX(100%);
				transition: transform 0.3s ease;
				z-index: 1000;
			}
			.wp-block-navigation.is-style-slide-in.is-open {
				transform: translateX(0);
			}
		';
	}

	/**
	 * Get slide-in left drawer styles.
	 *
	 * @return string CSS styles for slide-in-left variation
	 */
	private function get_slide_in_left_styles(): string {
		return '
			.wp-block-navigation.is-style-slide-in-left {
				position: fixed;
				top: 0;
				left: 0;
				bottom: 0;
				width: 300px;
				background: var(--wp--preset--color--base);
				transform: translateX(-100%);
				transition: transform 0.3s ease;
				z-index: 1000;
			}
			.wp-block-navigation.is-style-slide-in-left.is-open {
				transform: translateX(0);
			}
		';
	}

	/**
	 * Get fullscreen overlay styles.
	 *
	 * @return string CSS styles for fullscreen variation
	 */
	private function get_fullscreen_styles(): string {
		return '
			.wp-block-navigation.is-style-fullscreen {
				position: fixed;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				background: var(--wp--preset--color--base);
				display: flex;
				align-items: center;
				justify-content: center;
				z-index: 1000;
				opacity: 0;
				visibility: hidden;
				transition: opacity 0.3s ease, visibility 0.3s ease;
			}
			.wp-block-navigation.is-style-fullscreen.is-open {
				opacity: 1;
				visibility: visible;
			}
		';
	}

	/**
	 * Get scroll overlay styles.
	 *
	 * @return string CSS styles for scroll variation
	 */
	private function get_scroll_styles(): string {
		return '
			.wp-block-navigation.is-style-scroll {
				position: fixed;
				top: 0;
				left: 0;
				right: 0;
				background: var(--wp--preset--color--base);
				transform: translateY(-100%);
				transition: transform 0.3s ease;
				z-index: 1000;
			}
			.wp-block-navigation.is-style-scroll.is-open {
				transform: translateY(0);
			}
		';
	}
}
