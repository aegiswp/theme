<?php
/**
 * Video Block
 *
 * Core Video block theme support. The custom player lives in the Aegis Video add-on.
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare( strict_types=1 );

namespace Aegis\Framework\CoreBlocks;

use function add_theme_support;

class Video {

	/**
	 * Handles theme supports.
	 *
	 * @since 1.0.0
	 *
	 * @hook  after_setup_theme
	 *
	 * @return void
	 */
	public function theme_supports(): void {
		add_theme_support( 'responsive-embeds' );
	}
}
