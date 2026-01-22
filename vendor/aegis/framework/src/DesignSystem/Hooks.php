<?php
/**
 * Theme Hooks Component
 *
 * Provides classic theme-style action hooks for block themes in the Aegis Framework.
 *
 * Responsibilities:
 * - Injects before/after action hooks into template parts (header, footer, sidebar, etc.)
 * - Injects before/after action hooks into post content
 * - Allows developers to hook into theme locations using standard add_action()
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare(strict_types=1);

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports WordPress functions for action hooks.
use function do_action;
use function ob_get_clean;
use function ob_start;

// Implements the Hooks class to provide classic theme-style action hooks for block themes.

class Hooks
{

	/**
	 * Inject hooks into template parts.
	 *
	 * Fires aegis_before_{slug} and aegis_after_{slug} actions
	 * for each template part (header, footer, sidebar, etc.).
	 *
	 * @since 1.0.0
	 *
	 * @param string $block_content Block HTML.
	 * @param array  $block         Block data.
	 *
	 * @hook  render_block_core/template-part 5
	 *
	 * @return string
	 */
	public function template_part_hooks(string $block_content, array $block): string
	{
		$slug = $block['attrs']['slug'] ?? '';

		if (!$slug) {
			return $block_content;
		}

		$before = $this->capture_hook("aegis_before_{$slug}");
		$after = $this->capture_hook("aegis_after_{$slug}");

		return $before . $block_content . $after;
	}

	/**
	 * Inject hooks into post content.
	 *
	 * Fires aegis_before_content and aegis_after_content actions
	 * around the post content block.
	 *
	 * @since 1.0.0
	 *
	 * @param string $block_content Block HTML.
	 * @param array  $block         Block data.
	 *
	 * @hook  render_block_core/post-content 5
	 *
	 * @return string
	 */
	public function post_content_hooks(string $block_content, array $block): string
	{
		$before = $this->capture_hook('aegis_before_content');
		$after = $this->capture_hook('aegis_after_content');

		return $before . $block_content . $after;
	}

	/**
	 * Capture output from an action hook.
	 *
	 * @since 1.0.0
	 *
	 * @param string $hook The action hook name.
	 *
	 * @return string The captured output.
	 */
	private function capture_hook(string $hook): string
	{
		ob_start();
		do_action($hook);

		return ob_get_clean() ?: '';
	}
}
