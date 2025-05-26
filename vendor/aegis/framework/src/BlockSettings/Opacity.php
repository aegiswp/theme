<?php
/**
 * Opacity.php
 *
 * Handles opacity logic for the Aegis WordPress theme.
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

use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;

/**
 * Opacity class.
 *
 * @since 1.0.0
 */
class Opacity implements Renderable {

	/**
	 * Renders block opacity style.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block object.
	 *
	 * @hook  render_block
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs   = $block['attrs'] ?? [];
		$opacity = $attrs['style']['filter']['opacity'] ?? '';

		if ( $opacity ) {
			$dom   = DOM::create( $block_content );
			$first = DOM::get_element( '*', $dom );

			if ( ! $first ) {
				return $block_content;
			}

			$styles = CSS::string_to_array( $first->getAttribute( 'style' ) );

			//$styles['opacity'] = $opacity / 100;

			$first->setAttribute( 'style', CSS::array_to_string( $styles ) );

			$block_content = $dom->saveHTML();
		}

		return $block_content;
	}

}
