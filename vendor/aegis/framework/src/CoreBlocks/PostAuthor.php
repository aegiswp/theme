<?php
/**
 * Post Author Block
 *
 * Provides support for rendering post author blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling post author block content
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
use function str_replace;

// Implements the PostAuthor class to support post author block rendering.

/**
 * Handles the rendering of the core/post-author block.
 *
 * This class enhances the default post author block by applying custom border
 * and spacing styles. It also changes the default wrapper tag for the author's
 * name from `<p>` to `<span>` to provide more layout flexibility.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class PostAuthor implements Renderable
{

	/**
	 * Renders the post-author block with custom enhancements.
	 *
	 * This method is hooked into the `render_block_core/post-author` filter. It
	 * applies custom border and blockGap styles and converts the inner `<p>` tag
	 * to a `<span>`.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/post-author
	 *
	 * @return string The modified block content.
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$dom = DOM::create($block_content);
		$div = DOM::get_element('div', $dom);
		$styles = [];

		if (!$div) {
			return $block_content;
		}

		$style = $div->getAttribute('style');

		// Apply custom border styles from block attributes.
		if ($block['attrs']['style']['border'] ?? null) {
			$styles['border-width'] = $block['attrs']['style']['border']['width'] ?? null;
			$styles['border-style'] = $block['attrs']['style']['border']['style'] ?? null;
			$styles['border-color'] = $block['attrs']['style']['border']['color'] ?? null;
			$styles['border-radius'] = $block['attrs']['style']['border']['radius'] ?? null;
		}

		// Apply block gap as a CSS custom property.
		$gap = $block['attrs']['style']['spacing']['blockGap'] ?? null;
		if ($gap) {
			$styles['--wp--style--block-gap'] = CSS::format_custom_property($gap);
		}

		// Append new styles to any existing inline styles.
		$div->setAttribute(
			'style',
			($style ? $style . ';' : '') . CSS::array_to_string($styles)
		);

		// Replace the default <p> tag with a <span> for more flexible styling within layouts like flex.
		return str_replace(
			['<p ', '</p>'],
			['<span ', '</span>'],
			$dom->saveHTML()
		);
	}
}
