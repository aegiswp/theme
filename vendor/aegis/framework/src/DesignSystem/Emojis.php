<?php
/**
 * Emojis Extension Component
 *
 * Provides support for disabling default WordPress emoji scripts and styles in the Aegis Framework.
 *
 * Responsibilities:
 * - Removes emoji scripts and styles from the frontend and editor
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for emojis extension component.
declare( strict_types=1 );

// Declares the namespace for the emojis extension component.
namespace Aegis\Framework\DesignSystem;

class Emojis {

	/**
	 * Adds editor only styles.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 *
	 * @return void
	 */
	public function remove_emoji_script(): void {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
	}
}
