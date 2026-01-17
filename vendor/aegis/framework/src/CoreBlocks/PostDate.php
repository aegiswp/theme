<?php
/**
 * Post Date Block
 *
 * Provides support for rendering post date blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling post date block content
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

// Implements the PostDate class to support post date block rendering.

/**
 * Handles the rendering of the core/post-date block.
 *
 * This class is responsible for applying custom margin values from the block's
 * spacing settings to the block's wrapper element.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class PostDate implements Renderable
{

	/**
	 * Renders the post-date block with custom margins.
	 *
	 * This method is hooked into the `render_block_core/post-date` filter to
	 * apply margin values from the block's attributes as an inline style on the
	 * block's wrapper `<div>`.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/post-date
	 *
	 * @return string The modified block content.
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$margin = $block['attrs']['style']['spacing']['margin'] ?? null;

		// Only proceed if a margin value is set.
		if ($margin) {
			$dom = DOM::create($block_content);
			$div = DOM::get_element('div', $dom);

			// If the wrapper div is found, apply the styles.
			if ($div) {
				$styles = CSS::string_to_array($div->getAttribute('style'));
				$styles = CSS::add_shorthand_property($styles, 'margin', $margin);

				$div->setAttribute('style', CSS::array_to_string($styles));

				$block_content = $dom->saveHTML();
			}
		}

		return $block_content;
	}
}
