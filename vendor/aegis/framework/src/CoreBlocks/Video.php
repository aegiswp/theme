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
declare(strict_types=1);

// Declares the namespace for core blocks within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports utility classes and interfaces for DOM manipulation, CSS helpers, renderable blocks, and WordPress helpers.
use Aegis\Dom\CSS;
use Aegis\Dom\DOM;
use Aegis\Framework\Interfaces\Renderable;
use WP_Block;
use function add_action;
use function add_theme_support;
use function esc_attr;
use function wp_add_inline_script;
use function wp_enqueue_script;
use function wp_enqueue_style;

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
	 * Enqueue media element scripts and styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function video_scripts_styles(): void
	{
		$js = <<<JS
		const videoBlocks = document.getElementsByTagName( 'video' );

		[ ...videoBlocks ].forEach( function( videoBlock ) {
			new MediaElementPlayer( videoBlock, {
				videoWidth: '100%',
				videoHeight: '100%',
				enableAutosize: true
			} );

			videoBlock.style.width = '100%';
			videoBlock.style.height = '100%';
		} );
	JS;

		wp_enqueue_script('wp-mediaelement');
		wp_enqueue_style('wp-mediaelement');
		wp_add_inline_script('wp-mediaelement', $js);
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
}
