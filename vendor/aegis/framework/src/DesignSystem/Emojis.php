<?php
/**
 * Emojis.php
 *
 * Handles emoji-related logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\DesignSystem
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\DesignSystem;

/**
 * Emojis extension.
 *
 * @since 1.0.0
 */
class Emojis {

	/**
	 * Removes emoji scripts and styles from the editor and frontend.
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
