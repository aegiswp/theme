<?php
/**
 * Query Pagination Block
 *
 * Provides support for rendering query pagination blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling query pagination block content
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

// Implements the QueryPagination class to support query pagination block rendering.

class QueryPagination implements Renderable
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
	 * @hook  render_block_core/query-pagination
	 *
	 * @return string
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$dom = DOM::create($block_content);
		$nav = DOM::get_element('nav', $dom);

		if (!$nav) {
			return $block_content;
		}

		$styles = CSS::string_to_array($nav->getAttribute('style'));
		$margin = $block['attrs']['style']['spacing']['margin'] ?? null;
		$padding = $block['attrs']['style']['spacing']['padding'] ?? null;
		$styles = CSS::add_shorthand_property($styles, 'margin', $margin);
		$styles = CSS::add_shorthand_property($styles, 'padding', $padding);

		foreach ($styles as $key => $value) {
			if (!$value) {
				continue;
			}

			// @todo Which properties need formatting?
			if (str_contains($value, 'var:')) {
				$styles[$key] = CSS::format_custom_property($value);
			}
		}

		$border_radius = $block['attrs']['style']['border']['radius'] ?? null;

		if ($border_radius) {
			$styles['border-radius'] = $border_radius;
		}

		$nav->setAttribute('style', CSS::array_to_string($styles));

		return $dom->saveHTML();
	}
}
