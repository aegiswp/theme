<?php
/**
 * TextShadow Block Setting
 *
 * Provides support for applying text shadow styles to blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for rendering custom text shadow styles for block content
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function array_unique;
use function esc_attr;
use Aegis\Framework\ServiceProvider;

// Implements the TextShadow class to support custom text shadow styling for blocks.

/**
 * Handles the "Text Shadow" block setting.
 *
 * This class provides a generic way to apply custom text-shadow styles to any
 * block. It works by adding a `has-text-shadow` class and a suite of CSS custom
 * properties based on the block's `style.textShadow` attribute.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class TextShadow implements Renderable
{

	/**
	 * Renders the block with custom text-shadow CSS variables.
	 *
	 * This method is hooked into the generic `render_block` filter. If it finds
	 * a `textShadow` attribute, it adds a helper class and applies the shadow's
	 * x, y, blur, and color values as CSS custom properties to the block's
	 * wrapper element.
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
		$text_shadow = $block['attrs']['style']['textShadow'] ?? [];

		if (!$text_shadow) {
			return $block_content;
		}

		$dom = DOM::create($block_content);
		$first = DOM::get_element('*', $dom);

		if (!$first) {
			return $block_content;
		}

		// Add a helper class to the block to activate the text-shadow styles.
		$first_classes = explode(' ', $first->getAttribute('class'));
		$text_classes = array_unique([...$first_classes, 'has-text-shadow']);
		$first->setAttribute('class', implode(' ', $text_classes));

		$first_styles = CSS::string_to_array($first->getAttribute('style'));

		// Set the dimensional properties as CSS variables.
		if ($x = $text_shadow['x'] ?? null) {
			$first_styles['--wp--custom--text-shadow--x'] = esc_attr($x) . 'px';
		}
		if ($y = $text_shadow['y'] ?? null) {
			$first_styles['--wp--custom--text-shadow--y'] = esc_attr($y) . 'px';
		}
		if ($blur = $text_shadow['blur'] ?? null) {
			$first_styles['--wp--custom--text-shadow--blur'] = esc_attr($blur) . 'px';
		}

		// Set the color property, converting a palette color to a CSS variable if it matches.
		if ($color = $text_shadow['color'] ?? null) {
			$palette = ServiceProvider::get_global_settings()['color']['palette']['theme'] ?? [];
			$first_styles['--wp--custom--text-shadow--color'] = esc_attr($color);
			foreach ($palette as $theme_color) {
				if ($theme_color['color'] === $color) {
					$first_styles['--wp--custom--text-shadow--color'] = "var(--wp--preset--color--{$theme_color['slug']})";
				}
			}
		}

		$first->setAttribute('style', CSS::array_to_string($first_styles));

		return $dom->saveHTML();
	}
}
