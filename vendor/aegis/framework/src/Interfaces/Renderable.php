<?php
/**
 * Renderable.php
 *
 * Interface for classes that can render objects in the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\Interfaces
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\Interfaces;

use WP_Block;

interface Renderable {

	/**
	 * Render the object.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content The block content.
	 * @param array    $block         The full block, including name and attributes.
	 * @param WP_Block $instance      The block instance.
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string;

}
