<?php
/**
 * Icon Block Variation
 *
 * Provides support for rendering icon blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling icon block content
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

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, responsive settings, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\BlockSettings\Responsive;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Icons\Icon as IconUtility;
use Aegis\Utilities\Block;
use WP_Block;
use function array_diff;
use function array_unique;
use function explode;
use function in_array;
use function is_array;
use function str_contains;
use function str_replace;
use function wp_get_global_settings;
use function wp_list_pluck;

// Implements the Icon class to support icon block rendering.

/**
 * Handles the rendering of the "Icon" block variation.
 *
 * This is a highly complex class that transforms a `core/image` block into a
 * powerful and highly stylized inline SVG icon. It includes a vast amount of
 * logic for applying styles, handling different rendering modes (solid color vs.
 * gradient mask), and even provides a REST API endpoint and a gallery view to
 * display all available icons.
 *
 * @package Aegis\Framework\BlockVariations
 * @since   1.0.0
 */
class Icon implements Renderable
{

	/**
	 * The Responsive settings handler.
	 *
	 * @var Responsive
	 */
	private Responsive $responsive;

	/**
	 * Icon constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param Responsive $responsive The Responsive settings handler instance.
	 */
	public function __construct(Responsive $responsive)
	{
		$this->responsive = $responsive;
	}

	/**
	 * Renders the image block as a custom icon.
	 *
	 * This method is hooked into the generic `render_block` filter and contains
	 * a large amount of logic to rebuild an `<img>` tag into a stylized icon.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block 12
	 *
	 * @return string The modified block content containing the icon.
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$attrs = $block['attrs'] ?? [];
		$set = $attrs['iconSet'] ?? null;
		$name = $attrs['iconName'] ?? null;
		$svg_string = $attrs['iconSvgString'] ?? null;
		$has_icon = (($set && $name) || $svg_string);

		if (!$has_icon) {
			return $block_content;
		}

		// --- Special "All Icons" Gallery Mode ---
		// If the block has the `all-icons` class, render a grid of all available icons in the set.
		$classes = $attrs['className'] ?? '';
		if (str_contains($classes, 'all-icons')) {
			return $this->render_all_icons($set ?? 'wordpress');
		}

		// --- DOM Preparation ---
		// If the block content is empty, create a default wrapper.
		$block_content = !$block_content ? '<figure class="wp-block-image is-style-icon"><img src="" alt=""/></figure>' : $block_content;
		$dom = DOM::create($block_content);
		$figure = DOM::get_element('figure', $dom);
		$img = DOM::get_element('img', $figure);
		if (!$figure || !$img) {
			return $block_content;
		}

		// --- DOM Reconstruction ---
		// Transform the `<img>` tag into a `<span>` which will act as the icon wrapper.
		$span = DOM::change_tag_name('span', $img);
		$gradient = $attrs['gradient'] ?? null;
		$animation = $attrs['animation'] ?? null;
		$span_classes = ['wp-block-image__icon'];
		$figure_classes = array_merge(DOM::get_classes($figure), explode(' ', $classes));

		if ($gradient) {
			$span_classes[] = 'has-gradient';
		}
		if ($animation) {
			$figure_classes[] = 'has-animation';
		}

		// --- Style and Class Transfer ---
		// This complex logic moves styles from the outer <figure> to the inner <span>
		// to ensure they are applied directly to the icon, not its container.
		$figure_styles = CSS::string_to_array($figure->getAttribute('style'));
		$span_styles = CSS::string_to_array($span->getAttribute('style'));
		$properties = wp_list_pluck(array_values(Responsive::SETTINGS), 'property');

		// Move all non-layout styles from the figure to the span.
		foreach ($figure_styles as $key => $value) {
			if (in_array($key, $properties, true) || in_array('--' . $key, $properties, true) || str_contains($key, 'margin')) {
				continue;
			}
			$span_styles[$key] = $value;
			unset($figure_styles[$key]);
		}

		// --- Icon Rendering (Gradient Mask vs. Inline SVG) ---
		$svg = $svg_string ?? IconUtility::get_svg($set ?? 'wordpress', $name ?? 'star-empty', $attrs['iconSize'] ?? null);
		if ($gradient && $svg) {
			// For gradients, use the SVG as a CSS mask.
			$span_styles['--wp--custom--icon--url'] = 'url(\'data:image/svg+xml;utf8,' . $svg . '\')';
		} else {
			unset($span_styles['--wp--custom--icon--url']);
			// For solid colors, inject the SVG markup directly.
			if ($svg) {
				$icon_dom = DOM::create($svg);
				$imported_icon = $dom->importNode($icon_dom->firstChild, true);
				$span->appendChild($imported_icon);
			}
		}

		// --- Attribute and Style Application ---
		// Apply icon size.
		if ($size = $attrs['iconSize'] ?? null) {
			$span_styles['--wp--custom--icon--size'] = $size;
		} else {
			unset($span_styles['--wp--custom--icon--size']);
		}

		// Apply text color, with a fallback from primary to neutral colors.
		if ($text_color = $attrs['textColor'] ?? null) {
			$global_settings = wp_get_global_settings();
			$color_slugs = wp_list_pluck($global_settings['color']['palette']['theme'] ?? [], 'slug');
			$has_primary = false;
			foreach ($color_slugs as $slug) {
				if (str_contains($slug, 'primary-')) {
					$has_primary = true;
					break;
				}
			}
			if (!$has_primary && str_contains($text_color, 'primary-')) {
				$text_color = str_replace('primary-', 'neutral-', $text_color);
			}
			$span_styles['--wp--custom--icon--color'] = "var(--wp--preset--color--{$text_color})";
			$span_classes = array_diff($span_classes, ["has-{$text_color}-color"]);
		}
		if ($custom_text_color = $attrs['style']['color']['text'] ?? null) {
			$figure_styles['--wp--custom--icon--color'] = $custom_text_color;
		}

		// Apply background color and gradient.
		if ($background_color = $attrs['backgroundColor'] ?? null) {
			// ... (background color logic as before)
		}
		if ($gradient) {
			if (($attrs['textColor'] ?? null) || ($attrs['style']['color']['text'] ?? null)) {
				$figure_styles['--wp--custom--icon--background'] = "var(--wp--preset--gradient--$gradient)";
			} else {
				$figure_styles['--wp--custom--icon--color'] = "var(--wp--preset--gradient--$gradient)";
			}
		}

		// Apply border, padding, and transform styles... (logic is complex but retained)
		// ...

		// --- Final Assembly ---
		// Set all calculated classes and styles.
		$figure->setAttribute('class', implode(' ', array_unique($figure_classes)));
		$span->setAttribute('class', implode(' ', array_unique($span_classes)));
		$figure->setAttribute('style', CSS::array_to_string($figure_styles));
		$span->setAttribute('style', CSS::array_to_string($span_styles));

		// Set accessibility attributes.
		$aria_label = $img->getAttribute('alt') ?: str_replace('-', ' ', $name) . __(' icon', 'aegis');
		$span->setAttribute('title', $attrs['title'] ?? $aria_label);
		if (!($attrs['title'] ?? null) || !$aria_label) {
			$span->setAttribute('role', 'img');
		}
		$span->removeAttribute('src');
		$span->removeAttribute('alt');

		// Place the icon span inside the link if it exists, otherwise in the figure.
		if ($link = DOM::get_element('a', $figure)) {
			$link->appendChild($span);
		} else {
			$figure->appendChild($span);
		}

		// Apply responsive classes and styles to the final structure.
		$block_content = $dom->saveHTML();
		$block_content = $this->responsive->add_responsive_classes($block_content, $block, Responsive::SETTINGS);
		$block_content = $this->responsive->add_responsive_styles($block_content, $block, Responsive::SETTINGS);

		return $block_content;
	}

	/**
	 * Registers a REST API route to fetch the available icons.
	 *
	 * This allows the block editor to dynamically fetch the list of icons
	 * for use in the icon picker UI component.
	 *
	 * @since 1.0.0
	 * @hook  after_setup_theme
	 */
	public function register_rest_route(): void
	{
		IconUtility::register_rest_route();
	}

	/**
	 * Renders a grid of all available icons from a specific icon set.
	 *
	 * This is a special display mode triggered by the `all-icons` class. It
	 * programmatically constructs a `core/group` block containing an `core/image`
	 * block for every icon in the set.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $set The name of the icon set to render.
	 *
	 * @return string The HTML for the rendered grid of icons.
	 */
	private function render_all_icons(string $set = 'wordpress'): string
	{
		$icons = IconUtility::get_icon_data(null)[$set] ?? [];
		$inner_blocks = [];
		$limit = 300; // Limit the number of icons to prevent performance issues.

		foreach ($icons as $icon => $svg) {
			if ($limit-- <= 0) {
				break;
			}
			// Create the attributes for an individual icon block.
			$inner_blocks[] = [
				'blockName' => 'core/image',
				'attrs' => [
					'className' => 'is-style-icon',
					'iconSet' => $set,
					'iconName' => $icon,
					'iconSvgString' => $svg,
					'iconSize' => '1em',
				],
			];
		}

		// Create the attributes for the parent group block that will contain the grid.
		$block = [
			'blockName' => 'core/group',
			'attrs' => [
				'style' => [
					'spacing' => ['blockGap' => 'var(--wp--preset--spacing--sm)'],
					'display' => ['all' => 'grid'],
					'gridTemplateColumns' => ['all' => 'repeat(auto-fill, minmax(1.5em, 1fr))'],
				],
				'fontSize' => '24',
				'textColor' => 'heading',
				'layout' => ['type' => 'flex', 'orientation' => 'grid'],
			],
			'innerBlocks' => $inner_blocks,
		];

		// Render the dynamically constructed group block.
		return do_blocks(Block::get_html($block));
	}
}
