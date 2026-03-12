<?php
/**
 * Image Block
 *
 * Provides support for rendering image blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and styling image block content
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
use Aegis\Framework\ServiceProvider;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\BlockSettings\Image as ImageSettings;
use Aegis\Framework\BlockSettings\Responsive;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function class_exists;
use function esc_attr;
use function esc_html;
use function esc_html__;
use function explode;
use function get_template_directory_uri;
use function implode;
use function in_array;
use function wp_enqueue_script;
use function wp_enqueue_style;
use function wp_register_script;
use function wp_register_style;
use function wp_script_is;
use function wp_style_is;

/**
 * Handles the rendering of the core/image and core/post-featured-image blocks.
 *
 * This class serves as a centralized renderer for multiple image-related blocks.
 * It is responsible for applying responsive visibility classes and custom styles
 * like margin and border-radius.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Image implements Renderable
{

	/**
	 * The Responsive settings handler.
	 *
	 * @var Responsive
	 */
	private Responsive $responsive;

	/**
	 * Whether the lightbox stylesheet has been enqueued.
	 *
	 * @var bool
	 */
	private bool $lightbox_enqueued = false;

	/**
	 * Whether the lightbox assets have been registered.
	 *
	 * @var bool
	 */
	private static bool $lightbox_registered = false;

	/**
	 * Image block constructor.
	 *
	 * Injects the required responsive settings handler.
	 *
	 * @since 1.0.0
	 *
	 * @param Responsive $responsive The responsive settings handler.
	 */
	public function __construct(Responsive $responsive)
	{
		$this->responsive = $responsive;
	}

	/**
	 * Renders the image block with custom enhancements.
	 *
	 * This method is hooked into the generic `render_block` filter and acts on
	 * multiple image-related blocks. It applies responsive classes and adds
	 * inline styles for margin and border-radius based on block attributes.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block 12
	 *
	 * @return string The modified block content.
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$name = $block['blockName'] ?? '';

		// This renderer targets multiple image-related blocks.
		if (!in_array($name, ['core/image', 'core/post-featured-image', 'aegis/image-compare'], true)) {
			return $block_content;
		}

		$attrs = $block['attrs'] ?? [];
		$id = $attrs['id'] ?? '';
		$style = $attrs['style'] ?? [];
		$margin = $style['spacing']['margin'] ?? '';
		$border_radius = $style['border']['radius'] ?? '';

		// --- Responsive Classes ---
		// The presence of an icon or custom SVG suggests a different kind of block
		// (like an icon block using an image mask), which may not need standard
		// responsive image handling.
		$has_icon = ($attrs['iconSet'] ?? '') && ($attrs['iconName'] ?? '') || ($attrs['iconSvgString'] ?? '');
		$has_svg = $style['svgString'] ?? '';

		if (!$has_icon && !$has_svg) {
			if (in_array($name, ['core/image', 'core/post-featured-image'], true)) {
				$block_content = $this->responsive->add_responsive_classes(
					$block_content,
					$block,
					ImageSettings::SETTINGS,
					(bool) $id
				);
			}
		}

		// --- Style Application ---
		$dom = DOM::create($block_content);
		$figure = DOM::get_element('figure', $dom);

		// Apply margin and border-radius to the <figure> element.
		if ($figure) {
			$styles = CSS::string_to_array($figure->getAttribute('style'));

			if ($margin) {
				$styles = CSS::add_shorthand_property($styles, 'margin', $style['spacing']['margin'] ?? []);
			}
			if ($border_radius) {
				$styles = CSS::add_shorthand_property($styles, 'border-radius', $style['border']['radius'] ?? []);
			}

			$figure->setAttribute('style', CSS::array_to_string($styles));
		}

		return $dom->saveHTML();
	}

	/**
	 * Enhance the native WordPress lightbox for core/image blocks.
	 *
	 * Injects data attributes for gallery grouping, captions, and zoom
	 * based on admin panel feature toggles. Conditionally enqueues the
	 * lightbox stylesheet when an image with lightbox behavior is detected.
	 *
	 * @since 1.0.0
	 *
	 * @param  string   $block_content The original block content.
	 * @param  array    $block         The full block object.
	 * @param  WP_Block $instance      The block instance.
	 *
	 * @hook   render_block_core/image 15
	 *
	 * @return string The modified block content.
	 */
	public function enhance_lightbox(string $block_content, array $block, WP_Block $instance): string
	{
		// Only act on core/image blocks that have the lightbox behavior enabled.
		$behaviors = $block['attrs']['behaviors'] ?? [];
		$lightbox  = $behaviors['lightbox'] ?? [];

		if (empty($lightbox['enabled'])) {
			return $block_content;
		}

		// Check if lightbox enhancements are enabled in admin settings.
		if ( ! ServiceProvider::is_block_enabled( 'image_lightbox' ) ) {
			return $block_content;
		}

		// Enqueue the lightbox stylesheet once per page.
		$this->enqueue_lightbox_assets();

		$dom    = DOM::create($block_content);
		$figure = DOM::get_element('figure', $dom);

		if (!$figure) {
			return $block_content;
		}

		// --- Gallery grouping ---
		// Images inside a common parent (gallery, columns, group) share a group ID
		// so the frontend JS can enable prev/next navigation between them.
		if ($this->is_feature_enabled('image_lightbox_gallery_nav')) {
			$group_id = $instance->context['groupId'] ?? '';

			if (!$group_id) {
				$group_id = $instance->context['postId'] ?? 'page';
			}

			$figure->setAttribute('data-lightbox-group', esc_attr((string) $group_id));
		}

		// --- Caption data attribute ---
		// Extract caption text from <figcaption> and store it as a data attribute
		// so the frontend JS can display it in the lightbox overlay.
		if ($this->is_feature_enabled('image_lightbox_captions')) {
			$figcaption = DOM::get_element('figcaption', $dom);

			if ($figcaption) {
				$caption_text = trim($figcaption->textContent);

				if ($caption_text !== '') {
					$figure->setAttribute('data-lightbox-caption', esc_attr($caption_text));
				}
			}
		}

		// --- Zoom data attribute ---
		if ($this->is_feature_enabled('image_lightbox_zoom')) {
			$figure->setAttribute('data-lightbox-zoom', 'true');
		}

		// --- Thumbnail strip hint ---
		if ($this->is_feature_enabled('image_lightbox_thumbnails')) {
			$figure->setAttribute('data-lightbox-thumbnails', 'true');
		}

		// --- Swipe gesture hint ---
		if ($this->is_feature_enabled('image_lightbox_swipe')) {
			$figure->setAttribute('data-lightbox-swipe', 'true');
		}

		return $dom->saveHTML();
	}

	/**
	 * Register the lightbox assets early so they can be enqueued from
	 * multiple blocks (Image, Slider) without duplication.
	 *
	 * Uses wp_register_style / wp_register_script so the handles exist
	 * before any render_block filter calls wp_enqueue_*.
	 *
	 * @since 1.0.0
	 *
	 * @hook wp_enqueue_scripts
	 *
	 * @return void
	 */
	public function register_lightbox_assets(): void
	{
		self::register_lightbox_assets_static();
	}

	/**
	 * Static version of register_lightbox_assets().
	 *
	 * Allows other blocks (e.g. Slider) to register the shared lightbox
	 * handles without instantiating Image or its dependencies.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function register_lightbox_assets_static(): void
	{
		if (self::$lightbox_registered) {
			return;
		}

		$framework_url = get_template_directory_uri() . '/vendor/aegis/framework/public';

		wp_register_style(
			'aegis-image-lightbox',
			$framework_url . '/css/core-blocks/image-lightbox.css',
			[],
			'1.0.0'
		);

		wp_register_script(
			'aegis-image-lightbox',
			$framework_url . '/js/image-lightbox.js',
			[],
			'1.0.0',
			['strategy' => 'defer', 'in_footer' => true]
		);

		self::$lightbox_registered = true;
	}

	/**
	 * Enqueue the lightbox enhancement assets.
	 *
	 * Called once per page when a lightbox-enabled image is encountered.
	 * Assets are pre-registered via register_lightbox_assets() so this
	 * simply flips the enqueue flag on the already-registered handles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function enqueue_lightbox_assets(): void
	{
		if ($this->lightbox_enqueued) {
			return;
		}

		// Ensure handles are registered (covers edge cases where
		// wp_enqueue_scripts has not fired yet).
		$this->register_lightbox_assets();

		wp_enqueue_style('aegis-image-lightbox');
		wp_enqueue_script('aegis-image-lightbox');

		$this->lightbox_enqueued = true;
	}

	/**
	 * Check if a specific lightbox sub-feature is enabled.
	 *
	 * Falls back to true when ConditionalLogicSettings is not available
	 * (e.g. in unit tests or standalone usage).
	 *
	 * @since 1.0.0
	 *
	 * @param  string $feature The feature key.
	 *
	 * @return bool
	 */
	private function is_feature_enabled(string $feature): bool
	{
		return ServiceProvider::is_block_enabled($feature);
	}
}
