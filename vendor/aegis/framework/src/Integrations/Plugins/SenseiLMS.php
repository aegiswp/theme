<?php
/**
 * Sensei LMS Integration Component
 *
 * Provides deep integration for Sensei LMS plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Sensei LMS plugin presence and conditionally registers hooks
 * - Declares theme support for Sensei to disable default theme compatibility
 * - Applies theme colors and typography to Sensei elements
 * - Unregisters default Sensei block patterns in favor of theme patterns
 * - Integrates with the Aegis container and inline assets system
 *
 * @package    Aegis\Framework\Integrations
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for integration components.
declare(strict_types=1);

// Declares the namespace for integration components within the Aegis Framework.
namespace Aegis\Framework\Integrations;

// Imports interfaces and helpers for conditional logic, inline assets, and hook management.
use Aegis\Container\Interfaces\Conditional;
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use WP_Block_Patterns_Registry;
use function add_action;
use function add_filter;
use function add_theme_support;
use function class_exists;
use function function_exists;
use function get_post_type;
use function in_array;
use function str_contains;

// Implements the Sensei LMS integration class for the design system.

class SenseiLMS implements Conditional, Styleable
{

	/**
	 * Condition.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public static function condition(): bool
	{
		return class_exists('Sensei_Main') || function_exists('Sensei');
	}

	/**
	 * Register hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function hooks(): void
	{
		add_action('after_setup_theme', [$this, 'declare_sensei_support']);
		add_action('init', [$this, 'unregister_sensei_block_patterns'], 11);
		add_filter('body_class', [$this, 'add_body_classes']);
		add_filter('sensei_video_embed_html', [$this, 'wrap_video_embed'], 10, 2);
	}

	/**
	 * Register styles.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The styles instance.
	 *
	 * @return void
	 */
	public function styles(Styles $styles): void
	{
		$styles->add_file(
			'plugins/senseilms.css',
			[
				'sensei',
				'course',
				'lesson',
				'quiz',
				'sensei-course',
				'sensei-lesson',
			],
			static::condition()
		);
	}

	/**
	 * Declare theme support for Sensei.
	 *
	 * This disables Sensei's default theme compatibility mode,
	 * allowing the theme to fully control Sensei's appearance.
	 *
	 * @since 1.0.0
	 *
	 * @hook  after_setup_theme
	 *
	 * @return void
	 */
	public function declare_sensei_support(): void
	{
		add_theme_support('sensei');
	}

	/**
	 * Unregister Sensei block patterns to use theme patterns instead.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function unregister_sensei_block_patterns(): void
	{
		$registry = WP_Block_Patterns_Registry::get_instance();
		$registered = $registry->get_all_registered();

		foreach ($registered as $pattern) {
			$name = $pattern['name'];

			if (str_contains($name, 'sensei')) {
				$registry->unregister($name);
			}
		}
	}

	/**
	 * Add body classes for Sensei pages.
	 *
	 * @since 1.0.0
	 *
	 * @hook  body_class
	 *
	 * @param array $classes The body classes.
	 *
	 * @return array
	 */
	public function add_body_classes(array $classes): array
	{
		if ($this->is_sensei_page()) {
			$classes[] = 'aegis-sensei-page';
		}

		return $classes;
	}

	/**
	 * Wrap video embeds with theme-styled container.
	 *
	 * @since 1.0.0
	 *
	 * @hook  sensei_video_embed_html
	 *
	 * @param string $html     The video embed HTML.
	 * @param string $video_url The video URL.
	 *
	 * @return string
	 */
	public function wrap_video_embed(string $html, string $video_url): string
	{
		return '<div class="aegis-sensei-video-wrapper">' . $html . '</div>';
	}

	/**
	 * Check if current page is a Sensei page.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	private function is_sensei_page(): bool
	{
		if (!function_exists('get_post_type')) {
			return false;
		}

		$sensei_post_types = [
			'course',
			'lesson',
			'quiz',
			'question',
			'sensei_message',
			'certificate',
		];

		$post_type = get_post_type();

		if (in_array($post_type, $sensei_post_types, true)) {
			return true;
		}

		// Check for Sensei pages using functions if available.
		if (function_exists('Sensei') && method_exists(Sensei(), 'is_sensei')) {
			return Sensei()->is_sensei();
		}

		return false;
	}
}
