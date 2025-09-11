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

// Enforces strict type checking for all code in this file, ensuring type safety for block settings.
declare( strict_types=1 );

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports utility classes and interfaces for DOM manipulation, JS utilities, and renderable blocks.
use Aegis\Dom\DOM;
use Aegis\Dom\JS;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function str_contains;
use function strval;
use function trim;

// Implements the Onclick class to support onclick event handling and template tag replacement.

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
		$js = trim( strval( $block['attrs']['onclick'] ?? '' ) );

		if ( ! $js ) {
			return $block_content;
		}

		// First, process the JS string for any dynamic template tags (e.g., `{post_title}`).
		$js       = $this->template_tags->render( $js, $block, $instance );
		$on_click = JS::format_inline_js( $js );
		$link     = null;
		$name     = $block['blockName'] ?? '';

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
