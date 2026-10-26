<?php
/**
 * Onclick Block Setting
 *
 * Provides support for handling onclick events and dynamic template tag replacement within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for processing onclick attributes on blocks
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

// Enforces strict type checking for all code in this file, ensuring type safety for onclick block setting.
declare( strict_types=1 );

// Declares the namespace for the onclick block setting.
namespace Aegis\Framework\BlockSettings;

// Imports classes, interfaces, and functions used by the onclick block setting.
use Aegis\Dom\DOM;
use Aegis\Dom\JS;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function current_user_can;
use function is_array;
use function is_string;
use function parse_blocks;
use function serialize_blocks;
use function str_contains;
use function strval;
use function trim;
use function wp_slash;
use function wp_unslash;


/**
 * Handles the "Onclick" block setting.
 *
 * This class provides a generic way to add a JavaScript `onclick` event handler
 * to various blocks. It also processes the JavaScript string for any dynamic
 * template tags before applying it to the block's HTML.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class Onclick implements Renderable {

	/**
	 * The TemplateTags service instance.
	 *
	 * @var TemplateTags
	 */
	private TemplateTags $template_tags;

	/**
	 * Onclick constructor.
	 *
	 * Injects the TemplateTags service to process template tags in the JS code.
	 *
	 * @since 1.0.0
	 *
	 * @param TemplateTags $template_tags The TemplateTags service instance.
	 */
	public function __construct( TemplateTags $template_tags ) {
		$this->template_tags = $template_tags;
	}

	/**
	 * Strips `onclick` block attributes saved by users without `unfiltered_html`.
	 *
	 * The attribute becomes a live event handler on render, so it carries the
	 * same trust as raw script. Core kses only strips tags from attribute
	 * values, so it is removed here, like kses removes `on*` HTML attributes.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Slashed post content.
	 *
	 * @hook  content_save_pre 20
	 *
	 * @return string
	 */
	public function strip_unfiltered( $content ) {
		if ( ! is_string( $content ) || ! str_contains( $content, 'onclick' ) || current_user_can( 'unfiltered_html' ) ) {
			return $content;
		}

		return wp_slash( serialize_blocks( self::strip_blocks( parse_blocks( wp_unslash( $content ) ) ) ) );
	}

	/**
	 * Removes the `onclick` attribute from blocks and their inner blocks.
	 *
	 * @param array $blocks Parsed blocks.
	 *
	 * @return array
	 */
	private static function strip_blocks( array $blocks ): array {
		foreach ( $blocks as &$block ) {
			if ( is_array( $block['attrs'] ?? null ) ) {
				unset( $block['attrs']['onclick'] );
			}

			if ( ! empty( $block['innerBlocks'] ) ) {
				$block['innerBlocks'] = self::strip_blocks( $block['innerBlocks'] );
			}
		}

		return $blocks;
	}

	/**
	 * Format an onclick handler (template tags + inline JS sanitization).
	 *
	 * @since 1.0.0
	 *
	 * @param string   $js       Raw onclick script.
	 * @param array    $block    Block data.
	 * @param WP_Block $instance Block instance.
	 */
	public function format_script( string $js, array $block, WP_Block $instance ): string {
		$js = trim( $js );

		if ( $js === '' ) {
			return '';
		}

		$js = $this->template_tags->render( $js, $block, $instance );

		return JS::format_inline_js( $js );
	}

	/**
	 * Renders the block with a custom `onclick` attribute.
	 *
	 * This method is hooked into the generic `render_block` filter. If it finds
	 * an `onclick` attribute, it processes the JS string for template tags and then
	 * applies the formatted `onclick` attribute to the most appropriate element
	 * within the block (e.g., the `<a>` in a button, an `<img>`, or the wrapper `<div>`).
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
		$on_click = $this->format_script( strval( $block['attrs']['onclick'] ?? '' ), $block, $instance );

		if ( ! $on_click ) {
			return $block_content;
		}

		$link = null;
		$name = $block['blockName'] ?? '';

		// --- Apply onclick to Groups and Buttons ---
		if ( $on_click && $block_content ) {
			$dom  = DOM::create( $block_content );
			$div  = DOM::get_element( 'div', $dom );
			$link = DOM::get_element( 'a', $div );

			// For core/button blocks, apply the onclick to the inner link.
			if ( $link && 'core/button' === $name ) {
				$link->setAttribute( 'onclick', $on_click );
			} elseif ( $div ) {
				// For other blocks, apply it to the main wrapper div.
				$div->setAttribute( 'onclick', $on_click );
			}

			$block_content = $dom->saveHTML();
		}

		// --- Apply onclick to Images ---
		// This is a separate check for blocks that might be just an image.
		if ( $on_click && $block_content && null === $link ) {
			$dom    = DOM::create( $block_content );
			$figure = DOM::get_element( 'figure', $dom );
			$img    = DOM::get_element( 'img', $figure );

			// Excludes the post-featured-image block.
			if ( $img && ! str_contains( $figure->getAttribute( 'class' ), 'wp-block-post-featured-image' ) ) {
				$img->setAttribute( 'onclick', $on_click );
			}

			$block_content = $dom->saveHTML();
		}

		return $block_content;
	}
}
