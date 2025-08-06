<?php
/**
 * Box Shadow Block Setting
 *
 * Provides support for custom box shadow CSS effects on blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the rendering of custom box shadow styles for block content
 * - Integrates with the Renderable and Styleable interfaces for block output
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     @atmostfear-entertainment
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
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function array_diff;
use function esc_attr;
use function in_array;
use function str_contains;
use function wp_get_global_settings;

// Implements the BoxShadow class to support custom box shadow styling.

/**
 * Handles the "Box Shadow" block setting.
 *
 * This class provides a comprehensive system for applying box-shadows to blocks.
 * It supports presets defined in `theme.json` as well as custom values set in
 * the block editor. It works by applying CSS classes and a suite of CSS custom
 * properties to the block's wrapper element, and dynamically generating CSS
 * for the presets.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class BoxShadow implements Renderable, Styleable {

	/**
	 * Applies box-shadow classes and styles to the block's wrapper element.
	 *
	 * This method is hooked into the generic `render_block` filter. It handles:
	 * - Applying classes for shadow presets (e.g., `has-shadow-preset-name`).
	 * - A special case for `core/button` to apply shadows to the inner `<a>` tag.
	 * - Setting a suite of CSS custom properties for custom shadow values (e.g.,
	 *   `--wp--custom--box-shadow--x`, `--wp--custom--box-shadow--hover--color`).
	 * - Converting custom shadow colors to CSS variables if they match a theme palette color.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block 13
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$attrs         = $block['attrs'] ?? [];
		$shadow_preset = $attrs['shadowPreset'] ?? null;
		$hover_preset  = $attrs['shadowPresetHover'] ?? null;

		// --- Preset Class Application ---
		if ( $shadow_preset ) {
			// Special handling for blocks like core/button where the shadow should
			// be applied to a nested element, not the main wrapper.
			if ( in_array( $block['blockName'], [ 'core/button' ], true ) ) {
				$dom    = DOM::create( $block_content );
				$first  = DOM::get_element( '*', $dom );
				$nested = DOM::get_element( '*', $first );

				if ( $first && $nested ) {
					$first_classes  = explode( ' ', $first->getAttribute( 'class' ) );
					$nested_classes = explode( ' ', $nested->getAttribute( 'class' ) );

					// Find shadow-related classes on the outer wrapper and move them to the inner element.
					foreach ( $first_classes as $index => $class ) {
						$exploded = explode( '-', $class );
						if ( 'has' === ( $exploded[0] ?? null ) && in_array( 'shadow', [ $exploded[1] ?? '', $exploded[2] ?? '' ], true ) ) {
							unset( $first_classes[ $index ] );
							$nested_classes[] = $class;
						}
					}
					$first->setAttribute( 'class', implode( ' ', $first_classes ) );
					$nested->setAttribute( 'class', implode( ' ', $nested_classes ) );
					$block_content = $dom->saveHTML();
				}
			}
		}

		// If there's only a hover preset, ensure the `has-shadow-hover` class is added.
		if ( $hover_preset && ! $shadow_preset ) {
			$dom       = DOM::create( $block_content );
			$first     = DOM::get_element( '*', $dom );
			if ( $first ) {
				$classes   = explode( ' ', $first->getAttribute( 'class' ) );
				$classes   = array_diff( $classes, [ 'has-shadow' ] );
				$classes[] = 'has-shadow-hover';
				$first->setAttribute( 'class', implode( ' ', $classes ) );
				$block_content = $dom->saveHTML();
			}
		}

		// --- Custom Shadow CSS Variable Application ---
		$custom_shadow = $attrs['style']['boxShadow'] ?? null;
		if ( ! $custom_shadow ) {
			return $block_content;
		}

		$dom   = DOM::create( $block_content );
		$first = DOM::get_element( '*', $dom );
		if ( ! $first ) {
			return $block_content;
		}

		// Add a general class to activate custom shadow styling.
		$first_classes = explode( ' ', $first->getAttribute( 'class' ) );
		if ( ! in_array( 'has-box-shadow', $first_classes, true ) ) {
			$first_classes[] = 'has-box-shadow';
		}
		$first->setAttribute( 'class', implode( ' ', $first_classes ) );

		$styles = CSS::string_to_array( $first->getAttribute( 'style' ) );

		// Set inset properties for normal and hover states.
		if ( $custom_shadow['inset'] ?? null ) {
			$styles['--wp--custom--box-shadow--inset'] = 'inset';
		}
		if ( $custom_shadow['hover']['inset'] ?? null ) {
			$styles['--wp--custom--box-shadow--hover--inset'] = 'inset';
		}

		// Set dimensional properties (x, y, blur, spread) for normal and hover states.
		foreach ( [ 'x', 'y', 'blur', 'spread' ] as $property ) {
			if ( $custom_shadow[ $property ] ?? '' ) {
				$styles[ '--wp--custom--box-shadow--' . $property ] = esc_attr( $custom_shadow[ $property ] ) . 'px';
			}
			if ( $custom_shadow['hover'][ $property ] ?? '' ) {
				$styles[ '--wp--custom--box-shadow--hover--' . $property ] = esc_attr( $custom_shadow['hover'][ $property ] ) . 'px';
			}
		}

		// Set color properties, converting palette colors to CSS variables.
		$color       = $custom_shadow['color'] ?? null;
		$hover_color = $custom_shadow['hover']['color'] ?? null;
		$palette     = wp_get_global_settings()['color']['palette']['theme'] ?? [];
		foreach ( $palette as $theme_color ) {
			if ( $theme_color['color'] === $color ) {
				$styles['--wp--custom--box-shadow--color'] = "var(--wp--preset--color--{$theme_color['slug']})";
			}
			if ( $theme_color['color'] === $hover_color ) {
				$styles['--wp--custom--box-shadow--hover--color'] = "var(--wp--preset--color--{$theme_color['slug']})";
			}
		}

		$first->setAttribute( 'style', CSS::array_to_string( $styles ) );
		return $dom->saveHTML();
	}

	/**
	 * Registers the dynamic CSS generation for box-shadow presets.
	 *
	 * @since 1.0.0
	 * @param Styles $styles The Styles service instance.
	 */
	public function styles( Styles $styles ): void {
		$styles->add_callback( [ $this, 'get_inline_css' ] );
	}

	/**
	 * Generates dynamic CSS for box-shadow presets from global settings.
	 *
	 * This function reads the shadow presets from `theme.json` and generates
	 * CSS custom properties for their hover states, but only for presets that
	 * are actually used on the current page.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $template_html The HTML content of the current template.
	 * @param  bool   $load_all      Whether to load all styles regardless of content.
	 *
	 * @return string The dynamically generated CSS string.
	 */
	public function get_inline_css( string $template_html, bool $load_all ): string {
		$settings = wp_get_global_settings();
		$presets  = $settings['shadow']['presets']['theme'] ?? [];
		$style    = [];

		foreach ( $presets as $preset ) {
			$slug   = $preset['slug'] ?? null;
			$shadow = $preset['shadow'] ?? null;
			if ( ! $slug || ! $shadow ) {
				continue;
			}

			// Only create the CSS variable if the preset is used on the page.
			if ( ! $load_all && ! str_contains( $template_html, "has-{$slug}" ) ) {
				continue;
			}

			$style[ '--wp--preset--shadow--' . $slug . '--hover' ] = esc_attr( $preset['shadow'] );
		}

		$css = '';
		if ( ! empty( $style ) ) {
			$css = 'body{' . CSS::array_to_string( $style ) . '}';
		}

		return $css;
	}
}
