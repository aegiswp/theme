<?php
/**
 * Inline SVG Block Setting
 *
 * Provides support for rendering inline SVG icons and assets within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for embedding SVG content directly into block output
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

// Imports utility classes and interfaces for DOM manipulation, SVG handling, and renderable blocks.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Icons\Icon;
use WP_Block;
use function array_diff;
use function content_url;
use function dirname;
use function esc_attr;
use function explode;
use function file_exists;
use function file_get_contents;
use function get_template_directory;
use function implode;
use function in_array;
use function method_exists;
use function property_exists;
use function str_contains;
use function str_replace;
use function trim;
use function urldecode;

// Implements the InlineSvg class to support inline SVG rendering for blocks.

/**
 * Handles two different methods for inlining SVG images into block content.
 *
 * This class provides two distinct functionalities, both hooked into `render_block`:
 * 1. `render()`: Converts `<img>` tags that use an SVG as a CSS mask into
 *    raw, inline `<svg>` elements. This is primarily for colorizing icons.
 * 2. `render_inline_svg()`: Replaces `<img>` tags that have a `.svg` source file
 *    with the actual content of that file, allowing the SVG to be styled with CSS.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class InlineSvg implements Renderable
{

	/**
	 * Replaces CSS-masked `<img>` tags with inline `<svg>` elements.
	 *
	 * This method scans block content for `<img>` tags with the `has-inline-svg`
	 * class. If an image uses a data URI SVG as a `-webkit-mask-image`, this
	 * method extracts the SVG code, decodes it, and replaces the `<img>` tag
	 * with the raw `<svg>` markup. This allows the SVG to be colored by CSS
	 * using `fill: currentColor`.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block
	 *
	 * @return string The modified block content with the `<img>` replaced by an `<svg>`.
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		// As a performance optimization, only parse the DOM if the class is present.
		if (!str_contains($block_content, 'has-inline-svg')) {
			return $block_content;
		}

		$dom = DOM::create($block_content);
		if (!DOM::get_element('*', $dom)) {
			return $block_content;
		}

		$images = $dom->getElementsByTagName('img');
		if (!$images->length) {
			return $block_content;
		}

		// Iterate through all images in the block.
		foreach ($images as $img) {
			// Check for the CSS mask style.
			$style = CSS::string_to_array($img->getAttribute('style'));
			$mask = $style['-webkit-mask-image'] ?? '';
			if (!$mask) {
				continue;
			}

			// Extract the raw SVG from the data URI string.
			$svg_string = str_replace(["url('data:image/svg+xml;utf8,", "')"], '', $mask);
			$svg_string = urldecode($svg_string);
			$svg_dom = DOM::create($svg_string);
			$svg_element = DOM::get_element('svg', $svg_dom);
			if (!$svg_element) {
				continue;
			}

			// Create a new <svg> element in the main document.
			$imported = DOM::node_to_element($dom->importNode($svg_element, true));
			$imported->removeAttribute('height');
			$imported->removeAttribute('width');

			// Transfer all attributes from the original <img> to the new <svg>,
			// except for the -webkit-mask-image style.
			foreach ($img->attributes as $attribute) {
				if ('style' === $attribute->name) {
					unset($style['-webkit-mask-image']);
					$imported->setAttribute('style', CSS::array_to_string($style));
					continue;
				}
				$imported->setAttribute(esc_attr($attribute->name), esc_attr($attribute->value));
			}

			// Set fill to currentColor to allow CSS color control.
			$imported->setAttribute('fill', 'currentColor');

			// Transfer classes.
			$classes = explode(' ', $img->getAttribute('class'));
			$classes = array_diff($classes, ['has-inline-svg']);
			$classes[] = 'inline-svg';
			$imported->setAttribute('class', implode(' ', $classes) . ' ' . $svg_element->getAttribute('class'));

			// Replace the <img> tag with the new <svg> tag in the block content.
			$block_content = str_replace(
				$dom->saveHTML($img),
				$dom->saveHTML($imported),
				$block_content
			);
		}

		return $block_content;
	}

	/**
	 * Replaces `<img>` tags that link to `.svg` files with inline `<svg>` markup.
	 *
	 * This method targets specific core blocks. If it finds an `<img>` tag with a
	 * `.svg` source, it reads the content of the SVG file from the theme directory,
	 * sanitizes it, and replaces the `<img>` tag with the raw `<svg>` content.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block
	 *
	 * @return string The modified block content with the `<img>` replaced by an `<svg>`.
	 */
	public function render_inline_svg(string $block_content, array $block, WP_Block $instance): string
	{
		$blocks_to_check = ['core/button', 'core/image', 'core/site-logo', 'core/post-featured-image'];
		$name = $block['blockName'] ?? '';

		// Only run on specific blocks and only if they contain '.svg'.
		if (!in_array($name, $blocks_to_check, true) || !str_contains($block_content, '.svg')) {
			return $block_content;
		}

		// Find the <img> element, which may be nested.
		$attrs = $block['attrs'] ?? [];
		$dom = DOM::create($block_content);
		$first = DOM::get_element('*', $dom);
		$link = DOM::get_element('a', $first) ?? DOM::get_element('button', $first);
		$img = DOM::get_element('img', $link ?? $first);
		if (!$img) {
			return $block_content;
		}

		// Construct the absolute server path to the SVG file.
		$file = str_replace(content_url(), dirname(get_template_directory(), 2), $img->getAttribute('src'));
		if (!file_exists($file)) {
			return $block_content;
		}

		// Read and sanitize the SVG file content.
		$svg_content = file_get_contents($file);

		if (false === $svg_content) {
			return $block_content;
		}

		$html = Icon::sanitize_svg($svg_content);
		$svg_dom = DOM::create($html);
		if (!property_exists($svg_dom, 'documentElement')) {
			return $block_content;
		}

		// Create a new <svg> element in the main document.
		$svg = $dom->importNode($svg_dom->documentElement, true);
		if (!method_exists($svg, 'setAttribute')) {
			return $block_content;
		}

		// Transfer width, height, and alt attributes from the <img> to the <svg>.
		$img_styles = DOM::get_styles($img);
		$width = $img_styles['width'] ?? $attrs['width'] ?? $img->getAttribute('width') ?? '';
		$height = $img_styles['height'] ?? $attrs['height'] ?? $img->getAttribute('height') ?? '';
		$alt = $attrs['alt'] ?? $img->getAttribute('alt') ?? '';

		// Special case for buttons.
		if ('core/button' === $name && !$height) {
			$height = $width;
		}

		if ($width) {
			$svg->setAttribute('width', trim(str_replace('px', '', (string) $width)));
		}
		if ($height) {
			$svg->setAttribute('height', trim(str_replace('px', '', (string) $height)));
		}
		if ($alt) {
			$svg->setAttribute('aria-label', $alt);
		}

		// Transfer the class attribute.
		$svg->setAttribute('class', $img->getAttribute('class'));

		// Replace the <img> with the new <svg> and add a helper class.
		($link ?? $first)->removeChild($img);
		($link ?? $first)->appendChild($svg);
		$first_classes = explode(' ', $first->getAttribute('class'));
		$first_classes[] = 'has-inlined-svg';
		$first->setAttribute('class', implode(' ', $first_classes));

		return $dom->saveHTML();
	}
}
