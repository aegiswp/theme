<?php
/**
 * Video Block
 *
 * Provides support for rendering video blocks within the Aegis Framework.
 *
 * Responsibilities:
 * - Handles the logic for displaying and managing video block content
 * - Integrates with utility classes for DOM, CSS, and WordPress helpers
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
declare( strict_types=1 );

// Declares the namespace for core blocks within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, renderable blocks, and WordPress helpers.
use Aegis\Framework\ServiceProvider;
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function add_action;
use function add_filter;
use function add_theme_support;
use function esc_attr;
use function esc_url;
use function file_exists;
use function get_template_directory;
use function get_template_directory_uri;
use function get_the_title;
use function get_the_excerpt;
use function get_the_date;
use function wp_enqueue_script;
use function wp_enqueue_style;
use function wp_json_encode;
use function get_permalink;

// Implements the Video class to support video block rendering.

class Video implements Renderable
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
	 * @hook  render_block_core/video 11
	 *
	 * @return string
	 */
	public function render(string $block_content, array $block, WP_Block $instance): string
	{
		$attrs = $block['attrs'] ?? [];
		$video_type = $attrs['aegisVideoType'] ?? 'video';

		// Handle external video types.
		if ($video_type !== 'video') {
			return $this->render_external_video($video_type, $attrs, $block_content);
		}

		$dom = DOM::create($block_content);
		$figure = DOM::get_element('figure', $dom);

		if (!$figure) {
			return $block_content;
		}

		$styles = CSS::string_to_array($figure->getAttribute('style'));
		$background = $styles['background'] ?? $styles['background-color'] ?? '';

		if ($background) {
			$styles['--wp--custom--video--background'] = esc_attr($background);

			unset($styles['background'], $styles['background-color']);
		}

		$figure->setAttribute('style', CSS::array_to_string($styles));

		$block_content = $dom->saveHTML();

		static $is_enqueued = false;

		if (!$is_enqueued) {
			add_action('wp_enqueue_scripts', [$this, 'video_scripts_styles']);
		}

		$is_enqueued = true;

		return $block_content;
	}

	/**
	 * Render external video embeds (YouTube, Vimeo, Bunny.net).
	 *
	 * @since 1.0.0
	 *
	 * @param string $video_type    The video type.
	 * @param array  $attrs         Block attributes.
	 * @param string $block_content Original block content.
	 *
	 * @return string
	 */
	private function render_external_video(string $video_type, array $attrs, string $block_content): string
	{
		$output = '';

		switch ($video_type) {
			case 'youtube':
				$youtube_url = $attrs['aegisYoutubeUrl'] ?? '';
				if ($youtube_url) {
					$youtube_id = $this->extract_youtube_id($youtube_url);
					if ($youtube_id) {
						$embed_url = 'https://www.youtube.com/embed/' . $youtube_id;
						$output = sprintf(
							'<figure class="wp-block-video aegis-video-type-youtube"><div class="aegis-video-embed aegis-video-embed--youtube"><iframe src="%s" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen loading="lazy"></iframe></div></figure>',
							esc_url($embed_url)
						);
					}
				}
				break;

			case 'vimeo':
				$vimeo_url = $attrs['aegisVimeoUrl'] ?? '';
				if ($vimeo_url) {
					$vimeo_id = $this->extract_vimeo_id($vimeo_url);
					if ($vimeo_id) {
						$embed_url = 'https://player.vimeo.com/video/' . $vimeo_id;
						$output = sprintf(
							'<figure class="wp-block-video aegis-video-type-vimeo"><div class="aegis-video-embed aegis-video-embed--vimeo"><iframe src="%s" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen loading="lazy"></iframe></div></figure>',
							esc_url($embed_url)
						);
					}
				}
				break;

			case 'bunny':
				$bunny_library_id = $attrs['aegisBunnyLibraryId'] ?? '';
				$bunny_video_id = $attrs['aegisBunnyVideoId'] ?? '';
				if ($bunny_library_id && $bunny_video_id) {
					$embed_url = 'https://iframe.mediadelivery.net/embed/' . esc_attr($bunny_library_id) . '/' . esc_attr($bunny_video_id);
					$output = sprintf(
						'<figure class="wp-block-video aegis-video-type-bunny"><div class="aegis-video-embed aegis-video-embed--bunny"><iframe src="%s" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe></div></figure>',
						esc_url($embed_url)
					);
				}
				break;
		}

		// Return original content if no external video rendered.
		return $output ?: $block_content;
	}

	/**
	 * Extract YouTube video ID from URL.
	 *
	 * @since 1.0.0
	 *
	 * @param string $url YouTube URL.
	 *
	 * @return string|null
	 */
	private function extract_youtube_id(string $url): ?string
	{
		if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches)) {
			return $matches[1];
		}
		return null;
	}

	/**
	 * Extract Vimeo video ID from URL.
	 *
	 * @since 1.0.0
	 *
	 * @param string $url Vimeo URL.
	 *
	 * @return string|null
	 */
	private function extract_vimeo_id(string $url): ?string
	{
		if (preg_match('/vimeo\.com\/(?:video\/)?(\d+)/', $url, $matches)) {
			return $matches[1];
		}
		return null;
	}

	/**
	 * Enqueue video player scripts and styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function video_scripts_styles(): void
	{
		$framework_dir = get_template_directory() . '/vendor/aegis/framework/public';
		$framework_url = get_template_directory_uri() . '/vendor/aegis/framework/public';
		$asset_file = $framework_dir . '/js/video-player.asset.php';

		if (!file_exists($asset_file)) {
			return;
		}

		$asset = require $asset_file;

		wp_enqueue_style(
			'aegis-video-player',
			$framework_url . '/css/core-blocks/video-player.css',
			[],
			$asset['version'] ?? '1.0.0'
		);

		wp_enqueue_script(
			'aegis-video-player',
			$framework_url . '/js/video-player.js',
			$asset['dependencies'] ?? [],
			$asset['version'] ?? '1.0.0',
			true
		);
	}

	/**
	 * Handles theme supports.
	 *
	 * @since 1.0.0
	 *
	 * @hook  after_setup_theme
	 *
	 * @return void
	 */
	public function theme_supports(): void
	{
		add_theme_support('responsive-embeds');
	}

	/**
	 * Add VideoObject schema markup.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $block_content Block HTML.
	 * @param array    $block         Block data.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook  render_block_core/video 12
	 *
	 * @return string
	 */
	public function add_schema(string $block_content, array $block, WP_Block $instance): string
	{
		$attrs = $block['attrs'] ?? [];

		if ( ! ServiceProvider::is_block_enabled( 'video_schema_markup' ) ) {
			return $block_content;
		}

		if ( ServiceProvider::is_schema_handled_by_rank_math( 'rank_math_video_schema' ) ) {
			return $block_content;
		}

		// Get video source.
		$dom = DOM::create($block_content);
		$video = DOM::get_element('video', $dom);

		if (!$video) {
			return $block_content;
		}

		$src = $video->getAttribute('src');
		$poster = $video->getAttribute('poster');

		if (empty($src)) {
			// Try to get from source element.
			$source = DOM::get_element('source', $dom);
			if ($source) {
				$src = $source->getAttribute('src');
			}
		}

		if (empty($src)) {
			return $block_content;
		}

		// Build schema.
		$schema = [
			'@context' => 'https://schema.org',
			'@type' => 'VideoObject',
			'contentUrl' => esc_url($src),
		];

		// Add name from caption or post title.
		$figcaption = DOM::get_element('figcaption', $dom);
		if ($figcaption && $figcaption->textContent) {
			$schema['name'] = trim($figcaption->textContent);
		} else {
			$schema['name'] = get_the_title() ?: 'Video';
		}

		// Add description.
		$schema['description'] = get_the_excerpt() ?: $schema['name'];

		// Add thumbnail.
		if (!empty($poster)) {
			$schema['thumbnailUrl'] = esc_url($poster);
		}

		// Add upload date.
		$schema['uploadDate'] = get_the_date('c');

		// Link video to its parent page.
		$schema['mainEntityOfPage'] = get_permalink();

		// Output schema as JSON-LD.
		$schema_json = wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

		$schema_markup = sprintf(
			'<script type="application/ld+json">%s</script>',
			$schema_json
		);

		return $block_content . $schema_markup;
	}
}
