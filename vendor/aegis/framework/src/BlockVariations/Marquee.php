<?php
/**
 * Marquee Block Variation
 *
 * Provides support for rendering marquee layout blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling marquee block content
 * - Integrates with the Renderable interface for block output
 *
 * @package    Aegis\Framework\BlockVariations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for blocks variations.
declare(strict_types=1);

// Declares the namespace for block variations within the Aegis Framework.
namespace Aegis\Framework\BlockVariations;

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function is_array;

// Implements the Marquee class to support marquee block rendering.

/**
 * Handles the "Marquee" layout variation for the core/group block.
 *
 * This class transforms a Group block into a CSS-powered marquee (a continuously
 * scrolling banner). It achieves this by restructuring the block's DOM, creating
 * an inner wrapper, and duplicating the inner blocks to create a seamless,
 * infinite scrolling effect.
 *
 * @package Aegis\Framework\BlockVariations
 * @since   1.0.0
 */
class Marquee implements Renderable
{

	/**
	 * Renders the group block as a marquee.
	 *
	 * This method is hooked into the `render_block_core/group` filter. If the
	 * block's layout orientation is set to "marquee", it takes the block's
	 * inner elements, wraps them in a new `is-marquee` div, and then creates
	 * multiple clones of those elements to facilitate a smooth, looping animation.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/group
	 *
	 * @return string The modified block content, structured for a marquee effect.
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$attrs = $block['attrs'] ?? [];
		$orientation = $attrs['layout']['orientation'] ?? '';

		// Only run on Group blocks with the "marquee" orientation.
		if ('marquee' !== $orientation) {
			return $block_content;
		}

		$dom = DOM::create($block_content);
		$first = DOM::get_element('*', $dom); // The main group block wrapper.
		if (!$first) {
			return $block_content;
		}

		// --- Prepare Styles and Wrapper ---
		$repeat = $attrs['repeatItems'] ?? 2;
		$wrap = DOM::create_element('div', $dom); // The new inner wrapper for the scrolling items.
		$styles = CSS::string_to_array($first->getAttribute('style'));
		$classes = array_diff(explode(' ', $first->getAttribute('class')), ['is-marquee']);

		// Apply blockGap as a CSS custom property for the marquee gap.
		$gap = $attrs['style']['spacing']['blockGap'] ?? null;
		if ($gap || '0' === $gap) {
			if (is_array($gap)) {
				$gap = $gap['horizontal'] ?? $gap['left'] ?? $gap['right'] ?? null;
			}
			if ($gap) {
				$styles['--marquee-gap'] = CSS::format_custom_property($gap);
			}
		}

		$first->setAttribute('class', implode(' ', $classes));
		$first->setAttribute('style', CSS::array_to_string($styles));
		$wrap->setAttribute('class', 'is-marquee');

		// --- Clone and Append Items ---
		$count = $first->childNodes->count();
		for ($i = 0; $i < $count; $i++) {
			$item = $first->childNodes->item($i);
			if (!$item || !method_exists($item, 'setAttribute')) {
				continue;
			}

			// Move the original item into the new marquee wrapper.
			$wrap->appendChild($item);

			// Create multiple clones of the item to create the infinite scroll effect.
			for ($j = 0; $j < $repeat; $j++) {
				$clone = DOM::node_to_element($item->cloneNode(true));
				if (!$clone) {
					continue;
				}
				$clone_classes = explode(' ', $clone->getAttribute('class'));
				$clone_classes[] = 'is-cloned';
				$clone->setAttribute('class', implode(' ', $clone_classes));
				$wrap->appendChild($clone);
			}
		}

		// Insert the new wrapper containing all original and cloned items into the main group block.
		$first->insertBefore($wrap, $first->firstChild);

		return $dom->saveHTML();
	}
}
