<?php
/**
 * Post Featured Image Block
 *
 * Provides support for rendering post featured image blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling post featured image block content
 * - Integrates with utility classes for DOM, CSS, and filter settings
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for core blocks.
declare( strict_types=1 );

// Declares the namespace for core blocks within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, filter settings, and renderable blocks.
use Aegis\Framework\BlockSettings\CssFilter;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function array_unique;
use function esc_attr;
use function explode;
use function implode;

// Implements the PostFeaturedImage class to support post featured image block rendering.

/**
 * Handles the rendering of the core/post-featured-image block.
 *
 * This class adds a wide range of advanced styling options to the featured
 * image block, including box-shadows, CSS transforms, and CSS filters, for
 * both normal and hover states.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class PostFeaturedImage implements Renderable {

	/**
	 * Holds the configuration for CSS filter units (e.g., px, deg).
	 *
	 * @var array
	 */
	private array $filter_options;

	/**
	 * PostFeaturedImage constructor.
	 *
	 * Injects the CSS Filter settings service.
	 *
	 * @since 1.0.0
	 *
	 * @param CssFilter $css_filter The CSS Filter settings service.
	 */
	public function __construct( CssFilter $css_filter ) {
		$this->filter_options = $css_filter->settings;
	}

	/**
	 * Renders the featured image block with advanced styling.
	 *
	 * This method is hooked into the `render_block_core/post-featured-image`
	 * filter. It reads numerous style attributes from the block and applies them
	 * as CSS classes and inline styles to the `<figure>` element.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/post-featured-image
	 *
	 * @return string The modified block content.
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$dom    = DOM::create( $block_content );
		$figure = DOM::get_element( 'figure', $dom );

		if ( ! $figure ) {
			return $block_content;
		}

		$attrs          = $block['attrs'] ?? [];
		$figure_classes = explode( ' ', $figure->getAttribute( 'class' ) );
		$figure_styles  = CSS::string_to_array( $figure->getAttribute( 'style' ) );

		// --- Box Shadow ---
		// Apply box-shadow presets and custom colors for normal and hover states.
		$shadow_preset = esc_attr( $attrs['shadowPreset'] ?? '' );
		if ( $shadow_preset ) {
			$figure_classes[] = 'has-shadow';
			$figure_classes[] = "has-{$shadow_preset}-shadow";
		}

		$hover_preset = esc_attr( $attrs['shadowPresetHover'] ?? '' );
		if ( $hover_preset ) {
			$figure_classes[] = "has-{$hover_preset}-shadow-hover";
		}

		$use_custom    = $attrs['useCustomBoxShadow'] ?? null;
		$shadow_custom = $attrs['style']['boxShadow'] ?? null;
		if ( $use_custom && $shadow_custom ) {
			if ( $color = $shadow_custom['color'] ?? null ) {
				$figure_styles['--wp--custom--box-shadow--color'] = CSS::format_custom_property( $color );
			}
		}

		$hover_custom = $attrs['style']['boxShadow']['hover'] ?? null;
		if ( $use_custom && $hover_custom ) {
			if ( $color = $hover_custom['color'] ?? null ) {
				$figure_styles['--wp--custom--box-shadow--hover--color'] = CSS::format_custom_property( $color );
			}
		}

		// --- Spacing and Border ---
		// Apply border-radius and margin from block attributes.
		if ( $border_radius = $attrs['style']['border']['radius'] ?? null ) {
			$figure_styles['border-radius'] = $border_radius;
		}
		if ( $margin = $attrs['style']['spacing']['margin'] ?? null ) {
			$figure_styles = CSS::add_shorthand_property( $figure_styles, 'margin', $margin );
		}

		// --- CSS Transforms ---
		// Construct and apply CSS `transform` properties for normal and hover states.
		$transform       = $attrs['style']['transform'] ?? [];
		$transform_hover = $attrs['style']['transformHover'] ?? [];
		$transform_units = [ 'rotate' => 'deg', 'skew' => 'deg', 'scale' => '', 'translate' => '' ];

		if ( ! empty( $transform ) && is_array( $transform ) ) {
			$transform_value = '';
			foreach ( $transform as $key => $value ) {
				$unit = $transform_units[ $key ] ?? '';
				$transform_value .= "{$key}({$value}{$unit}) ";
			}
			$figure_styles['transform'] = $transform_value;
			$figure_classes[]           = 'has-transform';
		}

		if ( ! empty( $transform_hover ) && is_array( $transform_hover ) ) {
			$transform_value = '';
			foreach ( $transform_hover as $key => $value ) {
				$unit = $transform_units[ $key ] ?? '';
				$transform_value .= "{$key}({$value}{$unit}) ";
			}
			$figure_styles['--transform-hover'] = $transform_value;
			$figure_classes[]                   = 'has-transform';
		}

		// --- CSS Filters ---
		// Construct and apply CSS `filter` properties for normal and hover states.
		$filter       = $attrs['style']['filter'] ?? [];
		$filter_hover = $attrs['style']['filterHover'] ?? [];

		if ( ! empty( $filter ) && is_array( $filter ) ) {
			$filter_value = '';
			foreach ( $filter as $key => $value ) {
				$unit = $this->filter_options[ $key ]['unit'] ?? '';
				$filter_value .= "{$key}({$value}{$unit}) ";
			}
			$figure_styles['filter'] = $filter_value;
			$figure_classes[]        = 'has-filter';
		}

		if ( ! empty( $filter_hover ) && is_array( $filter_hover ) ) {
			$filter_value = '';
			foreach ( $filter_hover as $key => $value ) {
				$unit = $this->filter_options[ $key ]['unit'] ?? '';
				$filter_value .= "{$key}({$value}{$unit}) ";
			}
			$figure_styles['--filter-hover'] = $filter_value;
			$figure_classes[]                = 'has-filter';
		}

		// Apply all collected classes and styles back to the <figure> element.
		$figure->setAttribute( 'class', implode( ' ', array_unique( $figure_classes ) ) );
		if ( $figure_styles ) {
			$figure->setAttribute( 'style', CSS::array_to_string( $figure_styles ) );
		}

		return $dom->saveHTML();
	}

}
