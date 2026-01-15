<?php
/**
 * List Block
 *
 * Provides support for rendering list blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling list block content
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
use function array_unshift;
use function esc_attr;
use function explode;
use function str_replace;

// Implements the ListBlock class to support list block rendering.

/**
 * Handles the rendering of the core/list block.
 *
 * This class enhances the default list block by adding flexbox layout controls,
 * custom spacing, and a fix for a potential URL formatting issue.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class ListBlock implements Renderable
{

	/**
	 * Renders the list block with custom enhancements.
	 *
	 * This method is hooked into the `render_block_core/list` filter. It applies
	 * custom spacing and converts the list to a flex container if layout
	 * properties like `justifyContent` are set. It also includes a patch for
	 * malformed URLs.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/list 11
	 *
	 * @return string The modified block content.
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{

		// Pre-emptive fix for a potential issue where URLs might be malformed.
		$block_content = str_replace(
			'http://https://',
			'https://',
			$block_content
		);

		$dom = DOM::create($block_content);
		$ul = DOM::get_element('ul', $dom);
		$ol = DOM::get_element('ol', $dom);

		// Target the `<ul>` or `<ol>` element. If neither exists, do nothing.
		$list = $ul ?? $ol;
		if (!$list) {
			return $block_content;
		}

		$attrs = $block['attrs'] ?? [];
		$block_gap = $attrs['style']['spacing']['blockGap'] ?? null;
		$justify_content = $attrs['layout']['justifyContent'] ?? '';
		$margin = $attrs['style']['spacing']['margin'] ?? [];
		$styles = CSS::string_to_array($list->getAttribute('style'));

		// Apply custom gap between list items.
		if ('0' === $block_gap || $block_gap) {
			$styles['gap'] = CSS::format_custom_property($block_gap);
		}

		// If `justifyContent` is set, convert the list to a flex container.
		if ($justify_content) {
			$styles['display'] = 'flex';
			$styles['flex-wrap'] = 'wrap';
			$styles['justify-content'] = esc_attr($justify_content);
		}

		// Apply custom margins.
		$styles = CSS::add_shorthand_property($styles, 'margin', $margin);

		if ($styles) {
			$list->setAttribute('style', CSS::array_to_string($styles));
		}

		// Ensure the `wp-block-list` class is present.
		$classes = explode(' ', $list->getAttribute('class'));
		array_unshift($classes, 'wp-block-list');
		$list->setAttribute('class', implode(' ', $classes));

		return $dom->saveHTML();
	}
}
