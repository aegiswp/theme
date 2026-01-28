<?php
/**
 * Navigation Submenu Block
 *
 * Provides support for rendering navigation submenu blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling navigation submenu block content
 * - Integrates with utility classes for DOM and CSS
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function implode;

// Implements the NavigationSubmenu class to support navigation submenu block rendering.

/**
 * Handles the rendering of the core/navigation-submenu block.
 *
 * This class is intended to apply custom styling attributes (color, spacing)
 * from the block editor to the submenu's `<ul>` element by converting them into
 * CSS custom properties.
 *
 * @todo The original developer noted that this functionality "Does not work."
 *       This class may be incomplete, non-functional, or deprecated.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class NavigationSubmenu implements Renderable
{

	/**
	 * Renders the navigation submenu block with custom style properties.
	 *
	 * @todo This implementation may not function as expected.
	 *
	 * This method reads color, padding, margin, and gap settings from the
	 * block's attributes and attempts to apply them as CSS custom properties
	 * (e.g., `--wp--custom--submenu--background`) to the submenu's `<ul>` element.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/navigation-submenu
	 *
	 * @return string The modified block content.
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$dom = DOM::create($block_content);
		$attrs = $block['attrs'] ?? [];
		$style = $attrs['style'] ?? [];
		$spacing = $style['spacing'] ?? [];
		$padding = $spacing['padding'] ?? [];
		$margin = $spacing['margin'] ?? [];
		$color = $style['color'] ?? [];
		$styles = [];

		// --- Color Properties ---
		// Set background color from either a custom value or a theme preset.
		if (isset($color['background'])) {
			$styles['--wp--custom--submenu--background'] = $color['background'];
		}
		if (isset($attrs['backgroundColor'])) {
			$styles['--wp--custom--submenu--background'] = 'var(--wp--preset--color--' . $attrs['backgroundColor'] . ')';
		}

		// Set text color from either a custom value or a theme preset.
		if (isset($color['text'])) {
			$styles['--wp--custom--submenu--color'] = $color['text'];
		}
		if (isset($attrs['textColor'])) {
			$styles['--wp--custom--submenu--color'] = 'var(--wp--preset--color--' . $attrs['textColor'] . ')';
		}

		// --- Spacing Properties ---
		// Consolidate padding values into a single variable.
		$padding_shorthand = implode(' ', [
			$padding['top'] ?? 0,
			$padding['right'] ?? 0,
			$padding['bottom'] ?? 0,
			$padding['left'] ?? 0,
		]);
		if ('0 0 0 0' !== $padding_shorthand) {
			$styles['--wp--custom--submenu--padding'] = CSS::format_custom_property($padding_shorthand);
		}

		// Consolidate margin values into a single variable.
		$margin_shorthand = implode(' ', [
			$margin['top'] ?? 0,
			$margin['right'] ?? 0,
			$margin['bottom'] ?? 0,
			$margin['left'] ?? 0,
		]);
		if ('0 0 0 0' !== $margin_shorthand) {
			$styles['--wp--custom--submenu--margin'] = CSS::format_custom_property($margin_shorthand);
		}

		// Set block gap.
		$block_gap = $spacing['blockGap'] ?? null;
		if ($block_gap) {
			$styles['--wp--custom--submenu--gap'] = CSS::format_custom_property($block_gap);
		}

		// --- Apply Styles to DOM ---
		$submenu = DOM::get_element('ul', $dom);
		if (!$submenu) {
			return $block_content;
		}

		// Append new styles to any existing inline styles.
		$submenu_style = $submenu->getAttribute('style');
		$css = $submenu_style ? $submenu_style . ';' : '';
		foreach ($styles as $property => $value) {
			$css .= $value ? "$property:$value;" : '';
		}
		$submenu->setAttribute('style', $css);

		return $dom->saveHTML();
	}
}
