<?php
/**
 * AdditionalStyles.php
 *
 * Handles additional styles logic for the Aegis WordPress theme.
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
use function rtrim;

/**
 * Additional styles.
 *
 * @since 1.0.0
 */
class AdditionalStyles implements Renderable {

	/**
	 * Render block.
	 *
	 * @param string   $block_content Block content.
	 * @param array    $block         Block attributes.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook render_block
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs             = $block['attrs'] ?? [];
		$additional_styles = $attrs['additionalStyles'] ?? '';

		if ( ! $additional_styles ) {
			return $block_content;
		}

		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom );

		if ( ! $first ) {
			return $block_content;
		}

		$style = $first->getAttribute( 'style' );
		$style = $style ? rtrim( $style, ';' ) . ';' : '';

		$first->setAttribute( 'style', $style . CSS::minify( $additional_styles ) );

		return $dom->saveHTML();
	}

}
