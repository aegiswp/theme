<?php
/**
 * Group Block
 *
 * Provides support for rendering group blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling group block content
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
use function array_diff;
use function esc_attr;
use function explode;
use function implode;
use function in_array;

// Implements the Group class to support group block rendering.

/**
 * Handles the rendering of the core/group block.
 *
 * This class enhances the default group block by applying `minHeight`, custom
 * spacing, and adding special accessibility and styling logic when the block's
 * HTML tag is set to `<main>`.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Group implements Renderable
{

	/**
	 * Renders the group block with custom enhancements.
	 *
	 * This method is hooked into the `render_block_core/group` filter. It applies
	 * `minHeight`, margin, and padding from block attributes. It also adds a `role`
	 * attribute and reorders classes if the group block is using the `<main>` tag.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/group
	 *
	 * @return string The modified block content.
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$dom = DOM::create($block_content);
		$first = DOM::get_element('*', $dom);

		// If the main wrapper element is not found, return the original content.
		if (!$first) {
			return $block_content;
		}

		$attrs = $block['attrs'] ?? [];

		// Apply minHeight from block attributes as an inline style.
		if ($min_height = $attrs['minHeight'] ?? null) {
			$first->setAttribute(
				'style',
				$first->getAttribute('style') . ';min-height:' . $min_height
			);
		}

		// Apply custom margin and padding from block attributes.
		$margin = $attrs['style']['spacing']['margin'] ?? [];
		$padding = $attrs['style']['spacing']['padding'] ?? [];

		$div_styles = CSS::string_to_array($first->getAttribute('style'));
		$div_styles = CSS::add_shorthand_property($div_styles, 'margin', $margin);
		$div_styles = CSS::add_shorthand_property($div_styles, 'padding', $padding);

		if ($div_styles) {
			$first->setAttribute('style', CSS::array_to_string($div_styles));
		}

		// Special handling when the group block's tag is set to <main>.
		$tag = esc_attr($attrs['tagName'] ?? 'div');
		if ('main' === $tag) {
			// Add role="main" for better accessibility.
			$first->setAttribute('role', $tag);

			$classes = explode(' ', $first->getAttribute('class'));

			// If the `site-main` class exists, ensure it is the first class in the list.
			// This can be important for CSS specificity.
			if (in_array('site-main', $classes, true)) {
				$classes = [
					'site-main',
					...(array_diff($classes, ['site-main'])),
				];
			}

			$first->setAttribute('class', implode(' ', $classes));
		}

		return $dom->saveHTML();
	}
}
