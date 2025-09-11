<?php
/**
 * Copy To Clipboard Block Setting
 *
 * Provides support for copying code blocks to the clipboard within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the rendering of code blocks with clipboard functionality
 * - Integrates with the Renderable and Scriptable interfaces for block output
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

// Imports interfaces and utility classes for asset management, DOM manipulation, and rendering.
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function esc_html__;
use function explode;
use function html_entity_decode;
use function implode;
use function is_admin;
use function trim;
use function wp_strip_all_tags;

// Implements the CopyToClipboard class to support code block clipboard functionality.

/**
 * Handles the "Copy to Clipboard" block setting for the core/code block.
 *
 * This class enhances the code block by adding a "Copy to Clipboard" button,
 * which is then made functional by an associated JavaScript file. It also handles
 * a setting for showing line numbers.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class CopyToClipboard implements Renderable, Scriptable {

	/**
	 * Renders the code block with a "Copy to Clipboard" button.
	 *
	 * This method is hooked into the `render_block_core/code` filter. It injects
	 * the necessary HTML for the copy button, including a hidden textarea that
	 * holds the raw code content for easy copying.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/code
	 *
	 * @return string The modified block content with the copy button HTML.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		// This functionality is for the front-end only.
		if ( is_admin() ) {
			return $block_content;
		}

		// Only run if the copyToClipboard attribute is enabled.
		$enabled = $block['attrs']['copyToClipboard'] ?? true;
		if ( ! $enabled ) {
			return $block_content;
		}

		// --- HTML Construction for the Copy Button ---
		// Get the raw, unformatted code content. The hidden textarea makes it easy for JS to grab.
		$content = trim( html_entity_decode( wp_strip_all_tags( $block['innerHTML'] ) ) );
		$label   = esc_html__( 'Copy to clipboard', 'aegis' );
		$copied  = esc_html__( 'Copied!', 'aegis' );
		$svg     = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" fill="none">
  <path d="M12.9975 10.7499L11.7475 10.7499C10.6429 10.7499 9.74747 11.6453 9.74747 12.7499L9.74747 21.2499C9.74747 22.3544 10.6429 23.2499 11.7475 23.2499L20.2475 23.2499C21.352 23.2499 22.2475 22.3544 22.2475 21.2499L22.2475 12.7499C22.2475 11.6453 21.352 10.7499 20.2475 10.7499L18.9975 10.7499Z"></path>
  <path d="M17.9975 12.2499L13.9975 12.2499C13.4452 12.2499 12.9975 11.8022 12.9975 11.2499L12.9975 9.74988C12.9975 9.19759 13.4452 8.74988 13.9975 8.74988L17.9975 8.74988C18.5498 8.74988 18.9975 9.19759 18.9975 9.74988L18.9975 11.2499C18.9975 11.8022 18.5498 12.2499 17.9975 12.2499Z"></path>
  <path d="M13.7475 16.2499L18.2475 16.2499"></path>
  <path d="M13.7475 19.2499L18.2475 19.2499"></path>
</svg>
SVG;
		$copy_to_clipboard_html = "<div class='copy-to-clipboard'><span >$copied</span><button class='click-to-copy-button' title='$label'>$svg</button><textarea>$content</textarea></div>";

		// --- DOM Manipulation ---
		$dom     = DOM::create( $block_content );
		$element = DOM::get_element( 'pre', $dom ) ?? DOM::get_element( 'code', $dom );

		if ( ! $element ) {
			return $block_content;
		}

		// Add line number class if enabled.
		if ( $block['attrs']['showLineNumbers'] ?? false ) {
			$classes   = explode( ' ', $element->getAttribute( 'class' ) );
			$classes[] = 'show-line-numbers';
			$element->setAttribute( 'class', implode( ' ', $classes ) );
		}

		// Inject the copy button HTML into the code block element.
		$copy_dom = DOM::create( $copy_to_clipboard_html );
		$div      = DOM::get_element( 'div', $copy_dom );
		$imported = $element->ownerDocument->importNode( $div, true );
		$element->insertBefore( $imported, $element->firstChild );

		return $dom->saveHTML();
	}

	/**
	 * Conditionally enqueues the JavaScript for the copy-to-clipboard functionality.
	 *
	 * This script is only loaded if a block with the `copy-to-clipboard` class
	 * exists on the page.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts The Scripts service instance.
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_file( 'copy-to-clipboard.js', [ 'copy-to-clipboard' ] );
	}

}
