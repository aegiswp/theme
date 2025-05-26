<?php
/**
 * Details.php
 *
 * Handles the details core block logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\CoreBlocks
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\CoreBlocks;

use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function explode;

/**
 * Details class.
 *
 * @since 1.0.0
 */
class Details implements Renderable, Scriptable {

	/**
	 * Renders the details block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/details
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom     = DOM::create( $block_content );
		$details = DOM::get_element( 'details', $dom );

		if ( ! $details ) {
			return $block_content;
		}

		$summary     = DOM::get_element( 'summary', $details );
		$attrs       = $block['attrs'] ?? [];
		$padding     = $attrs['style']['spacing']['padding'] ?? [];
		$expand_icon = $attrs['expandIcon'] ?? '';
		$classes     = explode( ' ', $details->getAttribute( 'class' ) );

		if ( ! $expand_icon || $expand_icon === 'chevron' ) {
			$classes[] = 'is-style-chevron';
		}

		if ( $expand_icon === 'plus' ) {
			$classes[] = 'is-style-plus';
		}

		if ( $expand_icon === 'circle' ) {
			$classes[] = 'is-style-circle';
		}

		$details->setAttribute( 'class', implode( ' ', $classes ) );

		if ( $summary && $padding ) {
			$summary_styles = CSS::string_to_array( $summary->getAttribute( 'style' ) );

			$summary_styles['padding-top']    = $padding['top'] ?? '';
			$summary_styles['padding-bottom'] = $padding['bottom'] ?? '';
			$summary_styles['padding-left']   = $padding['left'] ?? '';
			$summary_styles['margin-top']     = 'calc(0px - ' . ( $padding['top'] ?? '' ) . ')';
			$summary_styles['margin-bottom']  = 'calc(0px - ' . ( $padding['bottom'] ?? '' ) . ')';
			$summary_styles['margin-left']    = 'calc(0px - ' . ( $padding['left'] ?? '' ) . ')';

			$summary->setAttribute( 'style', CSS::array_to_string( $summary_styles ) );
		}

		return $dom->saveHTML();
	}

	/**
	 * Adds assets.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts The scripts service.
	 *
	 * @return void
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_file( 'details.js', [ 'wp-block-details' ] );
	}

}
