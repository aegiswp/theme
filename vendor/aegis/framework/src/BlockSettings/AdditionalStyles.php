<?php
/**
 * Additional Styles Block Setting
 *
 * Provides support for additional custom CSS styles on blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the rendering of additional CSS styles for block content
 * - Integrates with the Renderable interface for block output
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for additional styles block setting.
declare( strict_types=1 );

// Declares the namespace for the additional styles block setting.
namespace Aegis\Framework\BlockSettings;

// Imports classes, interfaces, and functions used by the additional styles block setting.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function current_user_can;
use function is_array;
use function is_string;
use function parse_blocks;
use function rtrim;
use function safecss_filter_attr;
use function serialize_blocks;
use function str_contains;
use function wp_slash;
use function wp_unslash;


/**
 * Handles the "Additional Styles" block setting.
 *
 * This class provides a generic way to add a block of raw, custom CSS to any
 * block that has the `additionalStyles` attribute. It runs on all blocks and
 * appends the minified CSS to the block's main wrapper element.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class AdditionalStyles implements Renderable {

	/**
	 * Filters `additionalStyles` saved by users without `unfiltered_html`.
	 *
	 * Core kses runs inline `style` attributes through safecss_filter_attr(),
	 * but not block attributes, so the same filter is applied here.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Slashed post content.
	 *
	 * @hook  content_save_pre 20
	 *
	 * @return string
	 */
	public function filter_unfiltered( $content ) {
		if ( ! is_string( $content ) || ! str_contains( $content, 'additionalStyles' ) || current_user_can( 'unfiltered_html' ) ) {
			return $content;
		}

		return wp_slash( serialize_blocks( self::filter_blocks( parse_blocks( wp_unslash( $content ) ) ) ) );
	}

	/**
	 * Runs `additionalStyles` through safecss_filter_attr() in blocks and inner blocks.
	 *
	 * @param array $blocks Parsed blocks.
	 *
	 * @return array
	 */
	private static function filter_blocks( array $blocks ): array {
		foreach ( $blocks as &$block ) {
			if ( is_string( $block['attrs']['additionalStyles'] ?? null ) ) {
				$block['attrs']['additionalStyles'] = safecss_filter_attr( $block['attrs']['additionalStyles'] );
			} elseif ( is_array( $block['attrs'] ?? null ) ) {
				unset( $block['attrs']['additionalStyles'] );
			}

			if ( ! empty( $block['innerBlocks'] ) ) {
				$block['innerBlocks'] = self::filter_blocks( $block['innerBlocks'] );
			}
		}

		return $blocks;
	}

	/**
	 * Renders the block with additional custom CSS.
	 *
	 * This method is hooked into the generic `render_block` filter and runs on
	 * every block. If it finds an `additionalStyles` attribute, it minifies the
	 * CSS string and appends it to the inline `style` attribute of the block's
	 * first HTML element.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs             = $block['attrs'] ?? [];
		$additional_styles = $attrs['additionalStyles'] ?? '';

		// If there are no additional styles, do nothing.
		if ( ! $additional_styles ) {
			return $block_content;
		}

		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom );

		// If no wrapper element is found, do nothing.
		if ( ! $first ) {
			return $block_content;
		}

		// Get the existing inline styles and ensure it ends with a semicolon.
		$style = $first->getAttribute( 'style' );
		$style = $style ? rtrim( $style, ';' ) . ';' : '';

		// Append the new, minified styles.
		$first->setAttribute( 'style', $style . CSS::minify( $additional_styles ) );

		return $dom->saveHTML();
	}
}
