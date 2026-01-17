<?php
/**
 * Spacer Block
 *
 * Provides support for rendering spacer blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling spacer block content
 * - Integrates with utility classes for DOM, CSS, and WordPress helpers
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, renderable blocks, and WordPress helpers.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;

// Implements the Spacer class to support spacer block rendering.

class Spacer implements Renderable
{

	/**
	 * Modifies front end HTML output of block.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/spacer 11
	 *
	 * @return string
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$dom = DOM::create($block_content);
		$div = DOM::get_element('div', $dom);

		if (!$div) {
			return $block_content;
		}

		$div_styles = CSS::string_to_array($div->getAttribute('style'));

		$margin = $block['attrs']['style']['spacing']['margin'] ?? '';
		$div_styles = CSS::add_shorthand_property($div_styles, 'margin', $margin);

		$width = $block['attrs']['width'] ?? '';
		$responsive_width = $block['attrs']['style']['width']['all'] ?? '';

		if ($width && $responsive_width) {
			unset($div_styles['width']);
		}

		$div->setAttribute('style', CSS::array_to_string($div_styles));

		return $dom->saveHTML();
	}
}
