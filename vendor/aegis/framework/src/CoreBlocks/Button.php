<?php
/**
 * Button Block
 *
 * Provides support for rendering button blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling button block content
 * - Integrates with utility classes for DOM, CSS, and JavaScript
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, JavaScript, responsive settings, transforms, icons, and string utilities.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Dom\JS;
use Aegis\Framework\BlockSettings\Responsive;
use Aegis\Framework\BlockSettings\Transform;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Icons\Icon;
use Aegis\Utilities\Str;
use WP_Block;
use function array_unique;
use function esc_attr;
use function esc_html;
use function esc_url;
use function explode;
use function implode;
use function in_array;
use function str_contains;
use function str_replace;
use function wp_get_global_settings;

// Implements the Button class to support button block rendering.

/**
 * Handles the rendering of the core/button block.
 *
 * This class enhances the default WordPress button block with advanced features
 * such as custom icons, responsive controls, and CSS transforms. It performs
 * extensive DOM manipulation to apply these features based on block attributes.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Button implements Renderable {

	/**
	 * The Responsive settings handler.
	 *
	 * @var Responsive
	 */
	private Responsive $responsive;

	/**
	 * The Transform settings handler.
	 *
	 * @var Transform
	 */
	private Transform $transform;

	/**
	 * Button constructor.
	 *
	 * Injects the required responsive and transform settings handlers.
	 *
	 * @since 1.0.0
	 *
	 * @param Responsive $responsive The responsive settings handler.
	 * @param Transform  $transform  The transform settings handler.
	 */
	public function __construct( Responsive $responsive, Transform $transform ) {
		$this->responsive = $responsive;
		$this->transform  = $transform;
	}

	/**
	 * Renders the enhanced button block.
	 *
	 * This method is hooked into the `render_block` filter to modify the output
	 * of the `core/button` block. It parses the block content, applies numerous
	 * custom styles and attributes, and adds icon support before returning the
	 * final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object, including name and attributes.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block 9
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		// Only apply modifications to the core/button block.
		if ( 'core/button' !== ( $block['blockName'] ?? null ) ) {
			return $block_content;
		}

		$attrs      = $block['attrs'] ?? [];
		$class_name = $attrs['className'] ?? '';

		// Create a DOM object from the block content for manipulation.
		$dom = DOM::create( $block_content );
		$div = DOM::get_element( 'div', $dom );

		// Ensure the main wrapper div exists.
		if ( ! $div ) {
			$div = DOM::create_element( 'div', $dom );
			$div->setAttribute( 'class', 'wp-block-button ' . $class_name );
			$dom->appendChild( $div );
		}

		// Ensure the anchor/link element exists.
		$link = DOM::get_element( 'a', $div );
		if ( ! $link ) {
			$link = DOM::create_element( 'a', $dom );
			$div->appendChild( $link );
		}

		$link_classes = DOM::get_classes( $link );
		$link_styles  = DOM::get_styles( $link );

		// Ensure the link has the default WordPress button classes.
		if ( empty( $link_classes ) ) {
			$link_classes[] = 'wp-element-button';
			$link_classes[] = 'wp-block-button__link';
		}

		// Special handling for the "outline" style to ensure text color is applied correctly.
		if ( str_contains( $class_name, 'is-style-outline' ) ) {
			$text_color        = $attrs['textColor'] ?? null;
			$custom_text_color = $attrs['style']['color']['text'] ?? null;

			if ( $text_color || $custom_text_color ) {
				$link_classes[] = 'has-text-color';
			}
			if ( $text_color ) {
				$link_classes[] = 'has-' . $text_color . '-color';
			}
			if ( $custom_text_color ) {
				$link_styles['color'] = $custom_text_color;
			}
		}

		$div_classes = DOM::get_classes( $div );
		$div_styles  = DOM::get_styles( $div );

		// Apply custom border styles from block attributes.
		if ( isset( $attrs['style']['border'] ) || isset( $attrs['borderColor'] ) ) {
			$global_settings = wp_get_global_settings();

			// Remove any default border classes/styles to avoid conflicts.
			foreach ( $div_classes as $index => $class ) {
				if ( str_contains( $class, '-border-' ) ) {
					unset( $div_classes[ $index ] );
				}
			}
			foreach ( $div_styles as $key => $style ) {
				if ( str_contains( $key, 'border-' ) ) {
					unset( $div_styles[ $key ] );
				}
			}

			// Adjust line-height to account for border width, maintaining vertical alignment.
			$border_width = $attrs['style']['border']['width'] ?? null;
			$border_color = $attrs['style']['border']['color'] ?? null;
			if ( $border_width || $border_color ) {
				$border_width = $border_width ?? $global_settings['custom']['border']['width'];
				$link_styles['line-height'] = "calc(1em - $border_width)";
			}
		}

		// Add size-specific classes.
		$size = esc_attr( $attrs['size'] ?? 'medium' );
		if ( in_array( $size, [ 'small', 'large' ] ) ) {
			$div_classes[] = "is-style-$size";
		}

		// Apply custom gap (for icons) and padding from block attributes.
		$gap = $attrs['style']['spacing']['blockGap'] ?? null;
		if ( $gap ) {
			$link_styles['gap'] = CSS::format_custom_property( $gap );
		}
		$padding = $attrs['style']['spacing']['padding'] ?? [];
		if ( $padding ) {
			$link_styles = CSS::add_shorthand_property( $link_styles, 'padding', $padding );
		}

		// Apply all collected classes and styles back to the DOM elements.
		DOM::add_classes( $link, $link_classes );
		DOM::add_styles( $link, $link_styles );
		DOM::add_classes( $div, $div_classes );
		DOM::add_styles( $div, $div_styles );

		// Ensure a valid URL or fallback href exists.
		$url = esc_url( $attrs['url'] ?? '' );
		if ( ! $url ) {
			$href = $link->getAttribute( 'href' );
			if ( ! $href ) {
				$on_click = $attrs['onclick'] ?? null;
				// If there's an onclick action, make it a JS void link. Otherwise, a simple hash.
				$link->setAttribute( 'href', $on_click ? 'javascript:void(0)' : '#' );
			}
		}

		// Apply aria-label for accessibility.
		$aria_label = $attrs['ariaLabel'] ?? null;
		if ( $aria_label ) {
			$link->setAttribute( 'aria-label', esc_html( $aria_label ) );
		}

		// If the element doesn't have a meaningful link, convert it to a <button> tag for semantics.
		$href = $link->getAttribute( 'href' );
		if ( ! $href || '#' === $href || 'javascript:void(0)' === $href ) {
			$button        = DOM::change_tag_name( 'button', $link );
			$button_styles = DOM::get_styles( $button );
			$padding       = $attrs['style']['spacing']['padding'] ?? [];
			$button_styles = CSS::add_shorthand_property( $button_styles, 'padding', $padding );
			DOM::add_styles( $button, $button_styles );
		}

		// Save the modified HTML and apply CSS transforms.
		$block_content = $dom->saveHTML();
		$block_content = $this->transform->render( $block_content, $block, $instance );

		// If an icon is specified, render it.
		$icon_set  = $attrs['iconSet'] ?? '';
		$icon_name = $attrs['iconName'] ?? '';
		$icon      = $icon_set && $icon_name ? Icon::get_svg( $icon_set, $icon_name ) : '';
		if ( $icon ) {
			$block_content = $this->render_icon( $block_content, $block, $icon );
		}

		// Correct any malformed URLs and return the final content.
		return $this->correct_urls( $block, $block_content );
	}

	/**
	 * Renders and injects an SVG icon into the button's DOM.
	 *
	 * This helper method takes the block content and an SVG string, parses them
	 * into DOM objects, and intelligently injects the SVG into the button's
	 * anchor or button tag, applying relevant styles and attributes.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $block_content The current block HTML content.
	 * @param  array  $block         The block's attributes and context.
	 * @param  string $icon          The raw SVG string for the icon.
	 *
	 * @return string The block content with the icon injected.
	 */
	public function render_icon( string $block_content, array $block, string $icon ): string {
		$dom   = DOM::create( $block_content );
		$div   = DOM::get_element( 'div', $dom );
		$attrs = $block['attrs'] ?? [];

		// Ensure the main wrapper div exists.
		if ( ! $div ) {
			$div   = DOM::create_element( 'div', $dom );
			$class = esc_attr( $attrs['className'] ?? '' );
			$div->setAttribute( 'class', 'wp-block-button ' . $class );
			$dom->appendChild( $div );
		}

		// Clean up any previously set icon-related CSS variables.
		$div_styles = CSS::string_to_array( $div->getAttribute( 'style' ) );
		foreach ( $div_styles as $key => $style ) {
			if ( str_contains( $key, '--wp--custom--icon--' ) ) {
				unset( $div_styles[ $key ] );
			}
		}
		$div->setAttribute( 'style', CSS::array_to_string( $div_styles ) );

		// Find the target element (either a link or a button).
		$link = DOM::get_element( 'a', $div ) ?? DOM::get_element( 'button', $div );
		if ( ! $link ) {
			$link = DOM::create_element( 'a', $dom );
			$link->setAttribute( 'class', 'wp-block-button__link wp-element-button' );
			$div->appendChild( $link );
		}

		// Prepare the SVG icon for injection.
		$svg_dom  = DOM::create( $icon );
		$svg      = DOM::get_element( 'svg', $svg_dom );
		$imported = DOM::node_to_element( $dom->importNode( $svg, true ) );
		$classes  = explode( ' ', $link->getAttribute( 'class' ) );
		$styles   = CSS::string_to_array( $link->getAttribute( 'style' ) );

		// Apply colors and border styles from attributes to the icon container.
		if ( $text_color = $attrs['textColor'] ?? null ) {
			$styles['color'] = CSS::format_custom_property( $text_color );
		}
		if ( $background_color = $attrs['backgroundColor'] ?? null ) {
			$styles['background-color'] = CSS::format_custom_property( $background_color );
			$classes[]                  = 'has-background';
		}
		if ( $border_width = $attrs['style']['border']['width'] ?? null ) {
			$styles['border-width'] = CSS::format_custom_property( $border_width );
		}
		if ( $border_style = $attrs['style']['border']['style'] ?? null ) {
			$styles['border-style'] = CSS::format_custom_property( $border_style );
		}
		if ( $border_color = $attrs['style']['border']['color'] ?? null ) {
			$styles['border-color'] = CSS::format_custom_property( $border_color );
		}

		$link->setAttribute( 'style', CSS::array_to_string( $styles ) );
		$link->setAttribute( 'class', implode( ' ', array_unique( $classes ) ) );

		// Handle onclick events.
		if ( $on_click = $attrs['onclick'] ?? null ) {
			$link->setAttribute( 'onclick', JS::format_inline_js( $on_click ) );
		}
		if ( ! ( $attrs['url'] ?? $link->getAttribute( 'href' ) ) ) {
			if ( ! $on_click ) {
				$link->setAttribute( 'href', '#' );
			} else {
				DOM::change_tag_name( 'button', $link );
				$link->setAttribute( 'href', 'javascript:void(0)' );
			}
		}

		// Apply size to the SVG element.
		$size = esc_attr( $attrs['iconSize'] ?? null ) ?: '20';
		if ( str_contains( $size, 'var' ) ) {
			$svg_styles = CSS::string_to_array( $svg->getAttribute( 'style' ) );
			unset( $svg_styles['enable-background'] );
			$svg_styles['height'] = CSS::format_custom_property( $size );
			$svg_styles['width']  = CSS::format_custom_property( $size );
			$imported->setAttribute( 'style', CSS::array_to_string( $svg_styles ) );
		} else {
			$imported->setAttribute( 'height', $size );
			$imported->setAttribute( 'width', $size );
		}

		// Ensure SVG has a fill color for visibility.
		if ( ! $imported->getAttribute( 'fill' ) ) {
			$imported->setAttribute( 'fill', 'currentColor' );
		}

		// Insert the icon at the specified position (start or end).
		$icon_position = $attrs['iconPosition'] ?? 'end';
		if ( 'start' === $icon_position ) {
			$link->insertBefore( $imported, $link->firstChild );
		} else {
			$link->appendChild( $imported );
		}

		// Add a <title> element to the SVG for accessibility.
		$title = $imported->insertBefore( DOM::create_element( 'title', $dom ), $imported->firstChild );
		$text  = $dom->createTextNode( Str::title_case( $attrs['iconName'] ?? '' ) );
		if ( $text ) {
			$title->appendChild( $text );
		}

		// Apply responsive classes and return the final HTML.
		return $this->responsive->add_responsive_classes(
			$dom->saveHTML(),
			$block,
			Responsive::SETTINGS
		);
	}

	/**
	 * Corrects common URL issues in the final block content.
	 *
	 * This utility method performs string replacements to fix malformed URLs that
	 * can arise from certain block configurations, such as `javascript:` links or
	 * empty `http://#` links.
	 *
	 * @since 1.0.0
	 *
	 * @param  array  $block         The block object.
	 * @param  string $block_content The current block HTML content.
	 *
	 * @return string The corrected block content.
	 */
	private function correct_urls( array $block, string $block_content ): string {
		$inner_html = $block['innerHTML'] ?? $block['innerContent'] ?? $block_content;
		$back_urls  = [
			'javascript:history.go(-1)',
			'javascript: history.go(-1)',
		];

		foreach ( $back_urls as $back_url ) {
			if ( str_contains( $inner_html, $back_url ) ) {
				$block_content = str_replace( 'href="#"', 'href="' . $back_url . '"', $block_content );
			}
		}

		if ( str_contains( $block_content, 'javascript:void' ) ) {
			$block_content = str_replace(
				[
					'http://javascript:void',
					'target="_blank"',
				],
				[
					'javascript:void',
					'disabled',
				],
				$block_content
			);
		}

		if ( str_contains( $block_content, 'href="http://#"' ) ) {
			$block_content = str_replace(
				[
					'href="http://#"',
					'target="_blank"',
				],
				[
					'href="#"',
					'',
				],
				$block_content
			);
		}

		if ( str_contains( $block_content, 'http://http' ) ) {
			$block_content = str_replace( 'http://http', 'http', $block_content );
		}

		return $block_content;
	}
}
