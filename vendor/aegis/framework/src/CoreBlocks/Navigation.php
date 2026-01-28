<?php
/**
 * Navigation Block
 *
 * Provides support for rendering navigation blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling navigation block content
 * - Integrates with utility classes for DOM, CSS, and inline assets
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
declare(strict_types=1);

// Declares the namespace for core blocks within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, inline assets, and renderable blocks.
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function array_keys;
use function array_search;
use function in_array;
use function is_array;
use function is_string;
use function str_contains;
use function str_replace;
use function trim;
use Aegis\Framework\ServiceProvider;
use function wp_list_pluck;

// Implements the Navigation class to support navigation block rendering.

/**
 * Handles the rendering and styling of the core/navigation block.
 *
 * This is a highly complex class that heavily customizes the default navigation
 * block. It applies advanced styling for CSS filters and overlay menus, injects
 * dynamic CSS based on `theme.json` settings for submenus, and performs DOM
 * manipulations to improve accessibility and styling capabilities.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Navigation implements Renderable, Styleable
{

	/**
	 * Renders the navigation block with numerous enhancements.
	 *
	 * This method is hooked into the `render_block_core/navigation` filter. It
	 * performs a wide range of modifications, including:
	 * - Applying custom CSS filters and backdrop-filters.
	 * - Setting the overlay (mobile) menu's background color.
	 * - Applying custom spacing (margin, padding, gap).
	 * - Restructuring submenu toggle buttons for better accessibility.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/navigation
	 *
	 * @return string The modified block content.
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		// Pre-emptive fix for invalid root-relative URLs.
		$block_content = str_replace('http://./', './', $block_content);

		$dom = DOM::create($block_content);
		$nav = DOM::get_element('nav', $dom);

		if (!$nav) {
			return $block_content;
		}

		$styles = DOM::get_styles($nav);
		$classes = DOM::get_classes($nav);
		$attrs = $block['attrs'] ?? [];
		$overlay_menu = $attrs['overlayMenu'] ?? $attrs['icon'] ?? true;

		// --- CSS Filter and Backdrop Filter ---
		$filter = $attrs['style']['filter'] ?? null;
		if (!empty($filter)) {
			$filter_value = '';
			foreach ($filter as $property => $value) {
				if ('backdrop' === $property) {
					continue;
				}
				$value = CSS::format_custom_property($value) . 'px';
				$filter_value .= "$property($value) ";
			}
			$styles['--wp--custom--nav--filter'] = trim($filter_value);

			if ($filter['backdrop'] ?? null) {
				$classes[] = 'has-backdrop-filter';
			}

			DOM::add_classes($nav, $classes);
		}

		// --- Overlay Menu Background Color ---
		if ($overlay_menu) {
			$overlay_background_color = $attrs['overlayBackgroundColor'] ?? $attrs['customOverlayBackgroundColor'] ?? '';
			$global_settings = ServiceProvider::get_global_settings();
			$color_slugs = wp_list_pluck($global_settings['color']['palette']['theme'] ?? [], 'slug');
			$color_values = wp_list_pluck($global_settings['color']['palette']['theme'] ?? [], 'color');

			// Handle 'white' as a special case, mapping it to a theme color slug if available.
			if ('white' === $overlay_background_color && in_array('#f8f9fa', $color_values, true)) {
				$index = array_search('#f8f9fa', $color_values, true);
				if ($index) {
					$overlay_background_color = $color_slugs[$index] ?? '';
				}
			}

			// Convert color slug to a CSS variable.
			if (in_array($overlay_background_color, $color_slugs, true)) {
				$overlay_background_color = "var(--wp--preset--color--{$overlay_background_color})";
			}

			if ($overlay_background_color) {
				$styles['--wp--custom--nav--background-color'] = CSS::format_custom_property($overlay_background_color);
			}
		}

		// --- Custom Spacing ---
		$spacing = $attrs['style']['spacing'] ?? null;
		if ($spacing) {
			$padding = $spacing['padding'] ?? null;
			unset($spacing['padding']);

			foreach (array_keys($spacing) as $attribute) {
				$prop = 'blockGap' === $attribute ? 'gap' : $attribute;
				if (is_string($spacing[$attribute])) {
					$styles[$prop] = CSS::format_custom_property($spacing[$attribute]);
				}
				if (is_array($spacing[$attribute])) {
					foreach (array_keys($spacing[$attribute]) as $side) {
						$styles["$prop-$side"] = CSS::format_custom_property($spacing[$attribute][$side]);
					}
				}
			}

			if ($padding) {
				$padding_top = CSS::format_custom_property($padding['top'] ?? '');
				$padding_bottom = CSS::format_custom_property($padding['bottom'] ?? '');
				$styles['--wp--custom--nav--padding'] = $padding_top ?: $padding_bottom;
			}
		}

		DOM::add_styles($nav, $styles);

		// --- Submenu Toggle DOM Correction ---
		// Find all submenu toggle buttons and move the label span inside the button
		// for better accessibility and easier styling.
		$buttons = DOM::get_elements_by_class_name('wp-block-navigation-submenu__toggle', $dom);
		foreach ($buttons as $button) {
			$span = $button->nextSibling;
			if (!$span || 'span' !== $span->tagName) {
				continue;
			}
			$span->parentNode->removeChild($span);
			$button->appendChild($span);
		}

		return $dom->saveHTML();
	}

	/**
	 * Enqueues static and dynamic CSS for the navigation block.
	 *
	 * Registers a static CSS file for base navigation styles and a callback
	 * to generate dynamic CSS for submenu borders based on `theme.json` settings.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The style manager instance.
	 */
	public function styles(Styles $styles): void
	{
		$styles->add_file('core-blocks/navigation.css', ['wp-block-navigation__submenu-container']);
		$styles->add_callback([$this, 'get_submenu_styles']);
	}

	/**
	 * Generates dynamic CSS for submenu borders from global styles.
	 *
	 * This function reads the border settings for the `core/navigation-submenu`
	 * block from `theme.json` and generates an inline style block to apply them.
	 * This is necessary for complex border styles that are not natively
	 * supported by WordPress's block style engine.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $template_html The HTML content of the current template.
	 * @param  bool   $load_all      Whether to load all styles regardless of content.
	 *
	 * @return string The generated CSS string, or an empty string if not needed.
	 */
	public function get_submenu_styles(string $template_html, bool $load_all): string
	{
		// Only generate styles if a submenu is present in the current template.
		if (!$load_all && !str_contains($template_html, 'wp-block-navigation__submenu-container')) {
			return '';
		}

		// Retrieve border settings from global styles (theme.json).
		$global_styles = wp_get_global_styles();
		$border = $global_styles['blocks']['core/navigation-submenu']['border'] ?? [];
		$styles = [];

		// Construct border styles for each side.
		foreach (['top', 'right', 'bottom', 'left'] as $side) {
			if (!isset($border[$side])) {
				continue;
			}
			if ($border[$side]['width'] ?? '') {
				$styles["border-$side-width"] = $border[$side]['width'];
			}
			if ($border[$side]['style'] ?? '') {
				$styles["border-$side-style"] = $border[$side]['style'];
			}
			if ($border[$side]['color'] ?? '') {
				$styles["border-$side-color"] = CSS::format_custom_property($border[$side]['color']);
			}
		}

		// Add border-radius.
		$radius = $border['radius'] ?? null;
		if ($radius) {
			$styles['border-radius'] = CSS::format_custom_property($radius);
		}

		// Build the final CSS rule.
		$css = '';
		if ($styles) {
			$css = '.wp-block-navigation-submenu{border:0}.wp-block-navigation .wp-block-navigation-item .wp-block-navigation__submenu-container{' . CSS::array_to_string($styles) . '}';
		}

		return $css;
	}
}
