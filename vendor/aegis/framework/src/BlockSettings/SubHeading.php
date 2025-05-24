<?php
/**
 * SubHeading.php
 *
 * Handles subheading logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\BlockSettings
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\BlockSettings;

use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function str_contains;
use function str_replace;
use function wp_get_global_settings;

/**
 * SubHeading class.
 *
 * @since 1.0.0
 */
class SubHeading implements Renderable {

	/**
	 * Add sub heading clip text.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$class_names = $block['attrs']['className'] ?? '';

		if ( ! str_contains( $class_names, 'is-style-sub-heading' ) ) {
			return $block_content;
		}

		$global_settings = wp_get_global_settings();
		$background      = $global_settings['custom']['subHeading']['background'] ?? '';

		if ( ! str_contains( $background, 'gradient' ) ) {
			return $block_content;
		}

		return str_replace( 'is-style-sub-heading', 'is-style-sub-heading has-text-gradient-background', $block_content );
	}

}
