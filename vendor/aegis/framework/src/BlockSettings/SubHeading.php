<?php
/**
 * SubHeading Block Setting
 *
 * Provides support for rendering sub-heading styles and clip text in the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling sub-heading content for blocks
 * - Integrates with the Renderable interface for block output
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for block settings.
declare(strict_types=1);

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports utility classes and interfaces for renderable blocks and string operations.
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function str_contains;
use function str_replace;
use function wp_get_global_settings;

// Implements the SubHeading class to support sub-heading content and styling for blocks.

/**
 * Handles the "Sub-Heading" block style variation.
 *
 * This class provides a helper function for the "sub-heading" block style. It
 * checks if a gradient background is defined for sub-headings in `theme.json`
 * and, if so, adds a helper class to the block to enable a text gradient effect.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class SubHeading implements Renderable
{

	/**
	 * Adds a helper class to sub-heading blocks when a gradient is set.
	 *
	 * This method is hooked into the generic `render_block` filter. If it finds
	 * a block with the `is-style-sub-heading` class, it checks the global
	 * settings for a `subHeading.background` gradient. If found, it adds the
	 * `has-text-gradient-background` class, which the theme's CSS uses to
	 * apply the gradient to the text color.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block
	 *
	 * @return string The modified block content.
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$class_names = $block['attrs']['className'] ?? '';

		// Only act on blocks with the sub-heading style.
		if (!str_contains($class_names, 'is-style-sub-heading')) {
			return $block_content;
		}

		// Check the global settings (from theme.json) for a gradient background.
		$global_settings = wp_get_global_settings();
		$background = $global_settings['custom']['subHeading']['background'] ?? '';

		// If there is no gradient background defined, do nothing.
		if (!str_contains($background, 'gradient')) {
			return $block_content;
		}

		// Add the helper class to activate the CSS for the text gradient effect.
		return str_replace('is-style-sub-heading', 'is-style-sub-heading has-text-gradient-background', $block_content);
	}
}
