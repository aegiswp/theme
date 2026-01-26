<?php
/**
 * Skip Link Component
 *
 * Provides accessible skip-to-content link functionality for the Aegis Framework.
 *
 * Responsibilities:
 * - Injects a skip link at the beginning of the page for keyboard navigation
 * - Allows users to bypass repetitive navigation and jump to main content
 * - Meets WCAG 2.4.1 Bypass Blocks requirement
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare(strict_types=1);

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports WordPress functions for escaping and translation.
use function esc_attr;
use function esc_html__;
use function is_admin;

// Implements the SkipLink class to provide accessible skip-to-content functionality.

/**
 * Handles the skip link for keyboard accessibility.
 *
 * This class injects a skip-to-content link at the beginning of the header
 * template part, allowing keyboard users to bypass navigation and jump
 * directly to the main content area.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */
class SkipLink
{

	/**
	 * The target ID for the skip link.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private string $target = 'main';

	/**
	 * Inject skip link before the header template part.
	 *
	 * This method is hooked into the `render_block_core/template-part` filter.
	 * It prepends a skip link to the header template part output.
	 *
	 * @since 1.0.0
	 *
	 * @param string $block_content Block HTML.
	 * @param array  $block         Block data.
	 *
	 * @hook  render_block_core/template-part 4
	 *
	 * @return string
	 */
	public function add_skip_link(string $block_content, array $block): string
	{
		if (is_admin()) {
			return $block_content;
		}

		$slug = $block['attrs']['slug'] ?? '';

		// Only add skip link to header template part.
		if ('header' !== $slug) {
			return $block_content;
		}

		$target = esc_attr($this->target);
		$text = esc_html__('Skip to content', 'aegis');

		$skip_link = sprintf(
			'<a class="skip-link screen-reader-text" href="#%s">%s</a>',
			$target,
			$text
		);

		return $skip_link . $block_content;
	}
}
