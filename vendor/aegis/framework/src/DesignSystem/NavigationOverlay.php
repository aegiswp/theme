<?php
/**
 * Navigation overlay block styles.
 *
 * Registers slide-in, fullscreen, and scroll styles for `core/navigation`.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\DesignSystem;

use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function register_block_style;
use function __;

/**
 * Registers navigation overlay block styles and stylesheet.
 */
class NavigationOverlay implements Styleable {

	/**
	 * Load overlay CSS when a navigation block is present.
	 *
	 * @param Styles $styles Styles service.
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'block-styles/navigation-overlay.css',
			array(
				'wp-block-navigation',
				'is-style-slide-in',
				'is-style-slide-in-left',
				'is-style-fullscreen',
				'is-style-scroll',
			)
		);
	}

	/**
	 * Register WordPress block style variations for navigation overlay.
	 *
	 * @hook init
	 *
	 * @return void
	 */
	public function register_block_styles(): void {
		register_block_style(
			'core/navigation',
			array(
				'name'         => 'slide-in',
				'label'        => __( 'Slide-in Drawer', 'aegis' ),
				'inline_style' => $this->get_slide_in_styles(),
			)
		);

		register_block_style(
			'core/navigation',
			array(
				'name'         => 'slide-in-left',
				'label'        => __( 'Slide-in Left', 'aegis' ),
				'inline_style' => $this->get_slide_in_left_styles(),
			)
		);

		register_block_style(
			'core/navigation',
			array(
				'name'         => 'fullscreen',
				'label'        => __( 'Fullscreen Overlay', 'aegis' ),
				'inline_style' => $this->get_fullscreen_styles(),
			)
		);

		register_block_style(
			'core/navigation',
			array(
				'name'         => 'scroll',
				'label'        => __( 'Scroll Overlay', 'aegis' ),
				'inline_style' => $this->get_scroll_styles(),
			)
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
