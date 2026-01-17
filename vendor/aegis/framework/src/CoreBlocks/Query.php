<?php
/**
 * Query Block
 *
 * Provides support for rendering query blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling query block content
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
use function str_contains;

// Implements the Query class to support query block rendering.

class Query implements Renderable
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
	 * @hook  render_block_core/query
	 *
	 * @return string
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$block_gap = $block['attrs']['style']['spacing']['blockGap'] ?? null;

		if ($block_gap) {
			$dom = DOM::create($block_content);
			$div = DOM::get_element('div', $dom);

			if (!$div) {
				return $block_content;
			}

			$styles = CSS::string_to_array($div->getAttribute('style'));

			$styles['--wp--style--block-gap'] = CSS::format_custom_property($block_gap);

			$div->setAttribute('style', CSS::array_to_string($styles));

			$block_content = $dom->saveHTML();
		}

		$columns = $block['attrs']['displayLayout']['columns'] ?? null;

		if ($columns && str_contains($block_content, 'nowrap')) {
			$dom = DOM::create($block_content);
			$div = DOM::get_element('div', $dom);

			if ($div) {
				$styles = CSS::string_to_array($div->getAttribute('style'));
				$styles['--columns'] = $columns;
				$div->setAttribute('style', CSS::array_to_string($styles));

				$block_content = $dom->saveHTML();
			}
		}

		return $block_content;
	}
}
