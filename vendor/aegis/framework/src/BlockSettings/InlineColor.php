<?php
/**
 * Inline Color Block Setting
 *
 * Provides support for inline color styling of blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for applying inline color styles to block output
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
declare(strict_types=1);

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports utility classes and interfaces for DOM manipulation and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use DOMElement;
use WP_Block;
use function explode;
use function in_array;
use function str_contains;
use Aegis\Framework\ServiceProvider;

// Implements the InlineColor class to support inline color styling for blocks.
/**
 * Handles inline color settings for text within blocks.
 *
 * This class is responsible for converting hard-coded inline text color styles
 * into their corresponding CSS variables from the theme's color palette. This
 * ensures consistency and maintainability for features like dark mode.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class InlineColor implements Renderable
{

	/**
	 * Renders blocks with inline colors, converting hex codes to CSS variables.
	 *
	 * This method is hooked into the generic `render_block` filter. It scans for
	 * child elements within a block that have the `has-inline-color` class. For
	 * each found element, it checks if its inline `color` style matches a color
	 * in the theme's palette and, if so, replaces the hard-coded value with the
	 * appropriate `var(--wp--preset--color--...)`.
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
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		// As a performance optimization, only parse the DOM if the class is present.
		if (!str_contains($block_content, 'has-inline-color')) {
			return $block_content;
		}

		$dom = DOM::create($block_content);
		$first = DOM::get_element('*', $dom);

		if (!$first) {
			return $block_content;
		}

		$global_settings = ServiceProvider::get_global_settings();
		$color_palette = $global_settings['color']['palette']['theme'] ?? [];

		// Iterate through the direct children of the block's wrapper.
		foreach ($first->childNodes as $child) {
			if (!$child instanceof DOMElement) {
				continue;
			}

			$classes = explode(' ', $child->getAttribute('class'));

			// Only act on elements that have the `has-inline-color` class.
			if (!in_array('has-inline-color', $classes, true)) {
				continue;
			}

			$styles = CSS::string_to_array($child->getAttribute('style'));

			// Check if the element's hard-coded color matches a theme palette color.
			foreach ($color_palette as $color) {
				$hex_value = $styles['color'] ?? '';
				$color_value = $color['color'] ?? '';

				if (!$hex_value || !$color_value) {
					continue;
				}

				if ($hex_value === $color_value) {
					// If a match is found, replace the hex code with the CSS variable.
					$styles['color'] = "var(--wp--preset--color--{$color['slug']})";
					$child->setAttribute('style', CSS::array_to_string($styles));
					break; // Move to the next child element.
				}
			}
		}

		// Return the potentially modified HTML.
		return $dom->saveHTML();
	}
}
