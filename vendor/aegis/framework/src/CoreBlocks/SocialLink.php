<?php
/**
 * Social Link Block
 *
 * Provides support for rendering social link blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling social link block content
 * - Integrates with utility classes for DOM, CSS, icons, and WordPress helpers
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for core blocks.
declare( strict_types=1 );

// Declares the namespace for core blocks within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, icon rendering, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Icons\Icon;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function esc_attr;

// Implements the SocialLink class to support social link block rendering.

/**
 * Handles the rendering of the core/social-link block.
 *
 * This class customizes individual social links by applying text color and
 * replacing the default Slack icon with a custom version.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class SocialLink implements Renderable {

	/**
	 * Renders the social-link block with custom enhancements.
	 *
	 * This method is hooked into the `render_block_core/social-link` filter.
	 * It applies a custom text color and, if the service is Slack, it replaces
	 * the default WordPress icon with a custom SVG.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/social-link
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs     = $block['attrs'] ?? [];
		$textColor = esc_attr( $attrs['textColor'] ?? '' );

		// Apply custom text color from block attributes.
		if ( $textColor ) {
			$dom       = DOM::create( $block_content );
			$list_item = DOM::get_element( 'li', $dom );

			if ( $list_item ) {
				$styles          = CSS::string_to_array( $list_item->getAttribute( 'style' ) );
				$styles['color'] = "var(--wp--preset--color--$textColor)";
				$list_item->setAttribute( 'style', CSS::array_to_string( $styles ) );

				$classes   = explode( ' ', $list_item->getAttribute( 'class' ) );
				$classes[] = 'has-text-color';
				$list_item->setAttribute( 'class', implode( ' ', $classes ) );

				$block_content = $dom->saveHTML();
			}
		}

		// If the social link is for Slack, replace the default icon with a custom one.
		$service = $attrs['service'] ?? null;
		if ( 'slack' === $service ) {
			$dom         = DOM::create( $block_content );
			$li          = DOM::get_element( 'li', $dom );
			$a           = DOM::get_element( 'a', $li );
			$default_svg = DOM::get_element( 'svg', $a );

			if ( $default_svg ) {
				// @todo New svg location.
				$svg_dom  = DOM::create( Icon::get_svg( 'social', 'slack' ) );
				$svg      = DOM::get_element( 'svg', $svg_dom );
				$imported = $dom->importNode( $svg, true );

				// Set standard attributes for the new SVG.
				$imported->setAttribute( 'fill', 'currentColor' );
				$imported->setAttribute( 'width', '24' );
				$imported->setAttribute( 'height', '24' );
				$imported->setAttribute( 'aria-hidden', 'true' );
				$imported->setAttribute( 'focusable', 'false' );
				$imported->setAttribute( 'role', 'img' );

				// Replace the old SVG with the new one.
				$a->appendChild( $imported );
				$a->removeChild( $default_svg );

				$block_content = $dom->saveHTML( $li );
			}
		}

		// This logic seems to re-apply a '#' href if it is already set.
		// It might be a defensive measure against other filters stripping the attribute.
		$url = $attrs['url'] ?? null;
		if ( '#' === $url ) {
			$dom = DOM::create( $block_content );
			$li  = DOM::get_element( 'li', $dom );
			$a   = DOM::get_element( 'a', $li );

			if ( $a ) {
				$a->setAttribute( 'href', '#' );
				$block_content = $dom->saveHTML( $li );
			}
		}

		return $block_content;
	}
}
