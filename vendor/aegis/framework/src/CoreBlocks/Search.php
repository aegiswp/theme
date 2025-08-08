<?php
/**
 * Search Block
 *
 * Provides support for rendering search blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling search block content
 * - Integrates with utility classes for DOM, CSS, icons, and string helpers
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, icon rendering, string helpers, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Icons\Icon;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Utilities\Str;
use WP_Block;
use function array_unique;
use function esc_attr;
use function explode;
use function trim;

// Implements the Search class to support search block rendering.

/**
 * Handles the rendering of the core/search block.
 *
 * This is a highly complex class that heavily customizes the default search
 * block. It adds a wide range of advanced styling options, injects an inline
 * search icon, and adds the ability to restrict the search to a specific post type.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Search implements Renderable {

	/**
	 * Renders the search block with extensive customizations.
	 *
	 * This method is hooked into the `render_block_core/search` filter. It
	 * performs a large number of DOM manipulations to apply styles and add
	 * functionality based on the block's attributes.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/search
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom   = DOM::create( $block_content );
		$form  = DOM::get_element( 'form', $dom );
		$wrap  = DOM::get_element( 'div', $form );
		$input = DOM::get_element( 'input', $wrap );

		if ( ! $input ) {
			return $block_content;
		}

		// --- Attribute and Element Preparation ---
		$attrs               = $block['attrs'] ?? [];
		$button              = DOM::get_element( 'button', $wrap );
		$use_icon            = $attrs['buttonUseIcon'] ?? false;
		$button_position     = $attrs['buttonPosition'] ?? 'button-outside';
		$show_icon           = ! $use_icon || ( 'button-outside' === $button_position || 'no-button' === $button_position );
		$padding             = $attrs['style']['spacing']['padding'] ?? [];
		$margin              = $attrs['style']['spacing']['margin'] ?? [];
		$border              = $attrs['style']['border'] ?? [];
		$box_shadow          = $attrs['style']['boxShadow'] ?? [];
		$shadow_preset       = esc_attr( $attrs['shadowPreset'] ?? '' );
		$shadow_preset_hover = esc_attr( $attrs['shadowPresetHover'] ?? '' );
		$input_styles        = CSS::string_to_array( $input->getAttribute( 'style' ) );
		$input_classes       = explode( ' ', $input->getAttribute( 'class' ) );

		// --- Style Application for the <input> element ---
		// Apply background color.
		if ( ! $button || 'button-inside' === $button_position ) {
			if ( $background_color = $attrs['backgroundColor'] ?? '' ) {
				$input_classes[] = "has-{$background_color}-background-color";
			}
			if ( $background_custom = $attrs['style']['color']['background'] ?? '' ) {
				$input_styles['background-color'] = CSS::format_custom_property( $background_custom );
			}
		}

		// Apply box-shadow presets.
		if ( $shadow_preset ) {
			$input_classes[] = "has-{$shadow_preset}-shadow";
		}
		if ( $shadow_preset_hover ) {
			$input_classes[] = "has-{$shadow_preset_hover}-shadow-hover";
		}

		// Apply custom box-shadow.
		if ( $box_shadow ) {
			$input_styles['box-shadow'] = "{$box_shadow['x']}px {$box_shadow['y']}px {$box_shadow['blur']}px {$box_shadow['spread']}px {$box_shadow['color']}";
		}

		// Apply padding, with special calculation for left padding to accommodate the icon.
		if ( $padding['top'] ?? '' ) {
			$input_styles['padding-top'] = CSS::format_custom_property( $padding['top'] );
		}
		if ( $padding['right'] ?? '' ) {
			$input_styles['padding-right'] = CSS::format_custom_property( $padding['right'] );
		}
		if ( $padding['bottom'] ?? '' ) {
			$input_styles['padding-bottom'] = CSS::format_custom_property( $padding['bottom'] );
		}
		if ( $padding['left'] ?? '' ) {
			$padding_left = 'calc(' . CSS::format_custom_property( $padding['left'] ) . ' * 2)';
			if ( $show_icon ) {
				$padding_left = 'calc(1em + (' . CSS::format_custom_property( $padding['left'] ) . ' * 2))';
			}
			$input_styles['padding-left'] = $padding_left;
		}

		// Apply border styles.
		if ( $border['width'] ?? '' ) {
			$input_styles['border-width'] = CSS::format_custom_property( $border['width'] );
		}
		if ( $border['style'] ?? '' ) {
			$input_styles['border-style'] = CSS::format_custom_property( $border['style'] );
		}
		if ( $border_color = $attrs['style']['border']['color'] ?? $attrs['borderColor'] ?? '' ) {
			$input_styles['border-color'] = CSS::format_custom_property( $border_color );
		}
		if ( $border['radius'] ?? '' ) {
			$input_styles['border-radius'] = CSS::format_custom_property( $border['radius'] );
		}

		// Apply text color.
		if ( ( $text_color = $attrs['textColor'] ?? '' ) || ( $text_custom = $attrs['style']['color']['text'] ?? '' ) ) {
			$input_styles['color'] = $text_color ?: $text_custom;
		}

		// Handle a separate, specific background color for the input field, overriding other settings.
		if ( $input_background = $attrs['inputBackgroundColor'] ?? '' ) {
			foreach ( $input_classes as $index => $class ) {
				if ( Str::contains_any( $class, 'has-background', '-background-color' ) ) {
					unset( $input_classes[ $index ] );
				}
			}
			unset( $input_styles['color'] );
			$input_styles['background-color'] = CSS::format_custom_property( $input_background );
		}

		// Set final styles and classes for the input.
		if ( $input_styles ) {
			$input_styles['height'] = 'auto';
			$input->setAttribute( 'style', CSS::array_to_string( $input_styles ) );
		}
		$input->setAttribute( 'class', implode( ' ', array_unique( $input_classes ) ) );

		// --- Style Application for other elements ---
		// Apply margin to the <form> element.
		$form_styles = CSS::string_to_array( $form->getAttribute( 'style' ) );
		$form_styles = CSS::add_shorthand_property( $form_styles, 'margin', $margin );
		if ( $form_styles ) {
			$form->setAttribute( 'style', CSS::array_to_string( $form_styles ) );
		}

		// Apply gap and border-radius to the inner wrapper `div`.
		$wrap_styles = CSS::string_to_array( $wrap->getAttribute( 'style' ) );
		if ( $gap = $attrs['style']['spacing']['blockGap'] ?? '' ) {
			$wrap_styles['gap'] = CSS::format_custom_property( $gap );
		}
		if ( $border['radius'] ?? '' ) {
			$wrap_styles['border-radius'] = CSS::format_custom_property( $border['radius'] );
		}
		if ( $wrap_styles ) {
			$wrap->setAttribute( 'style', CSS::array_to_string( $wrap_styles ) );
		}

		// --- Icon Injection ---
		// If an icon is to be shown, create it and inject it before the input field.
		if ( $show_icon ) {
			$svg_dom = DOM::create( Icon::get_svg( 'wordpress', 'search' ) );
			$svg     = DOM::get_element( 'svg', $svg_dom );
			if ( $svg ) {
				$svg_classes   = explode( ' ', $svg->getAttribute( 'class' ) );
				$svg_styles    = CSS::string_to_array( $svg->getAttribute( 'style' ) );
				$svg_classes[] = 'wp-block-search__icon';
				// Calculate the icon's position based on left padding.
				if ( $padding['left'] ?? '' ) {
					$left               = CSS::format_custom_property( $padding['left'] );
					$svg_styles['left'] = 'calc(0.25em + (' . $left . ' / 2))';
				}
				$svg->setAttribute( 'class', trim( implode( ' ', $svg_classes ) ) );
				if ( $svg_styles ) {
					$svg->setAttribute( 'style', CSS::array_to_string( $svg_styles ) );
				}
				$imported_svg = $dom->importNode( $svg, true );
				$wrap->insertBefore( $imported_svg, $input );
			}
		}

		// --- Post Type Restriction ---
		// If a post type is specified, add a hidden input field to the form.
		if ( $post_type = esc_attr( $attrs['postType'] ?? '' ) ) {
			$form = DOM::get_element( 'form', $dom );
			if ( $form ) {
				$post_type_field = DOM::create_element( 'input', $dom );
				$post_type_field->setAttribute( 'type', 'hidden' );
				$post_type_field->setAttribute( 'name', 'post_type' );
				$post_type_field->setAttribute( 'value', $post_type );
				$form->insertBefore( $post_type_field, $form->firstChild );
			}
		}

		return $dom->saveHTML();
	}
}
