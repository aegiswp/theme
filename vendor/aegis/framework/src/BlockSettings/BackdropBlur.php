<?php
/**
 * BackdropBlur.php
 *
 * Handles backdrop blur logic for the Aegis WordPress theme.
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
use function str_replace;

/**
 * Backdrop blur class.
 *
 * @since 1.0.0
 */
class BackdropBlur implements Renderable {

	/**
	 * Renders backdrop blur style.
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
		$blur = (string) ( $block['attrs']['style']['filter']['blur'] ?? '' );

		if ( ! $blur ) {
			return $block_content;
		}

		$use_backdrop = (string) ( $block['attrs']['style']['filter']['backdrop'] ?? '' );

		if ( ! $use_backdrop ) {
			return $block_content;
		}

		$name = $block['blockName'] ?? '';

		if ( $name === 'core/navigation' ) {
			return $block_content;
		}

		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom );

		if ( ! $first ) {
			return $block_content;
		}

		$styles = CSS::string_to_array( $first->getAttribute( 'style' ) );

		$backdrop_blur = 'blur(' . $blur . 'px)';

		unset( $styles['backdrop-filter'] );
		unset( $styles['-webkit-backdrop-filter'] );

		$styles['backdrop-filter']         = $backdrop_blur;
		$styles['-webkit-backdrop-filter'] = $backdrop_blur;

		$opacity = (int) ( $block['attrs']['style']['filter']['opacity'] ?? '' );

		if ( $opacity ) {
			$existing = $styles['filter'] ?? '';

			if ( $existing ) {
				$styles['filter'] = str_replace(
					' opacity(' . $opacity . '%)',
					'',
					$existing
				);
			}
		}

		$first->setAttribute( 'style', CSS::array_to_string( $styles ) );

		return $dom->saveHTML();
	}
}
