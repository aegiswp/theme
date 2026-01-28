<?php
/**
 * Styles Component
 *
 * Provides support for registering, enqueuing, and managing inline styles in the Aegis Framework.
 *
 * Responsibilities:
 * - Registers and enqueues inline styles for the theme and block editor
 * - Integrates with the Aegis inline assets system and WordPress style API
 *
 * @package    Aegis\Framework\InlineAssets
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for inline asset management.
declare(strict_types=1);

// Declares the namespace for inline assets components within the Aegis Framework.
namespace Aegis\Framework\InlineAssets;

// Imports utility classes and WordPress functions for style management.
use Aegis\Utilities\Path;
use function apply_filters;
use function esc_url;
use function get_template_directory_uri;
use function in_array;
use function is_admin;
use function str_contains;
use function wp_add_inline_style;
use function wp_dequeue_style;
use function wp_enqueue_style;
use function wp_register_style;

// Implements the Styles class to support inline style management for the design system.

class Styles implements Inlinable
{

	use AssetsTrait;

	public const DYNAMIC_URL = 'https://aegis-dynamic-styles';

	/**
	 * Enqueue inline styles.
	 *
	 * @hook wp_enqueue_scripts 11
	 *
	 * @return void
	 */
	public function enqueue(): void
	{
		if (is_admin()) {
			return;
		}

		global $template_html;

		$load_all = apply_filters('aegis_load_all_styles', !$template_html);
		$css = $this->get_inline_assets($template_html, $load_all);

		wp_dequeue_style('wp-block-library-theme');
		wp_register_style($this->handle, '');
		wp_enqueue_style($this->handle);
		wp_add_inline_style($this->handle, $css);
	}

	/**
	 * Adds editor styles.
	 *
	 * @hook admin_init
	 *
	 * @return void
	 */
	public function add_editor_styles(): void
	{
		$blocks = glob($this->dir . 'core-blocks/*.css');
		$vendor_path = Path::get_segment($this->dir, -5);

		foreach ($blocks as $block) {
			add_editor_style($vendor_path . '/core-blocks/' . basename($block));
		}

		add_editor_style(static::DYNAMIC_URL);
	}

	/**
	 * @hook wp_head
	 */
	public function preload_assets(): void
	{
		if (is_admin()) {
			return;
		}

		$base = get_template_directory_uri();
		$template_html = $GLOBALS['template_html'] ?? '';
		$fonts = [];

		if (apply_filters('aegis_preload_font_lexend', false, $template_html)) {
			$fonts[] = $base . '/assets/fonts/lexend/lexend.woff2';
		}

		if (
			str_contains($template_html, '<code') ||
			str_contains($template_html, 'wp-block-code') ||
			str_contains($template_html, 'wp-block-preformatted')
		) {
			$fonts[] = $base . '/assets/fonts/jetbrains/jetbrains.woff2';
		}

		foreach ($fonts as $url) {
			echo '<link rel="preload" href="' . esc_url($url) . '" as="font" type="font/woff2" crossorigin="anonymous">';
		}
	}

	/**
	 * @hook wp_resource_hints
	 */
	public function resource_hints(array $urls, string $relation_type): array
	{
		if (is_admin()) {
			return $urls;
		}

		if (!in_array($relation_type, ['dns-prefetch', 'preconnect'], true)) {
			return $urls;
		}

		$template_html = $GLOBALS['template_html'] ?? '';
		$hosts = [];

		if (
			str_contains($template_html, 'youtube.com') ||
			str_contains($template_html, 'youtu.be') ||
			str_contains($template_html, 'ytimg.com')
		) {
			$hosts = array_merge($hosts, [
				'https://www.youtube.com',
				'https://i.ytimg.com',
			]);
		}

		if (
			str_contains($template_html, 'vimeo.com') ||
			str_contains($template_html, 'player.vimeo.com')
		) {
			$hosts = array_merge($hosts, [
				'https://player.vimeo.com',
				'https://vimeo.com',
			]);
		}

		$hosts = apply_filters('aegis_resource_hints_hosts', $hosts, $relation_type, $template_html);

		foreach ($hosts as $host) {
			if (!in_array($host, $urls, true)) {
				$urls[] = $host;
			}
		}

		return $urls;
	}

	/**
	 * Generates dynamic editor styles.
	 *
	 * @since 1.0.0
	 *
	 * @param array|bool $response    HTTP response.
	 * @param array      $parsed_args Response args.
	 * @param string     $url         Response URL.
	 *
	 * @hook  pre_http_request
	 *
	 * @return array|bool
	 */
	public function generate_dynamic_styles($response, array $parsed_args, string $url)
	{
		if ($url === static::DYNAMIC_URL) {
			$css = $this->get_inline_assets('', true);

			$response = [
				'body' => $css,
				'headers' => [],
				'response' => [
					'code' => 200,
					'message' => 'OK',
				],
				'cookies' => [],
				'filename' => null,
			];
		}

		return $response;
	}
}