<?php
/**
 * LearnDash LMS Plugin Integration Component
 *
 * Provides deep integration for LearnDash LMS plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for LearnDash LMS plugin presence and conditionally registers hooks
 * - Integrates Focus Mode with theme styling
 * - Applies theme colors and typography to LearnDash elements
 * - Unregisters default LearnDash block patterns in favor of theme patterns
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
use function defined;
use function remove_action;
use function str_contains;
use function wp_get_global_settings;

// Implements the LearnDash LMS integration class for the design system.

class LearnDash implements Conditional, Styleable
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
		return defined('LEARNDASH_VERSION');
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
		add_action('init', [$this, 'unregister_learndash_block_patterns'], 11);
		add_filter('learndash_wrapper_class', [$this, 'add_theme_wrapper_class'], 10, 3);
		add_filter('learndash_focus_mode_logo', [$this, 'focus_mode_logo'], 10, 3);
		add_filter('learndash_focus_header_logo_alt', [$this, 'focus_mode_logo_alt'], 10, 3);
		add_action('learndash-focus-template-start', [$this, 'focus_mode_header']);
		add_filter('body_class', [$this, 'add_body_classes']);
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
			'plugins/learndash.css',
			[
				'learndash-wrapper',
				'ld-focus',
				'sfwd-courses',
				'sfwd-lessons',
				'sfwd-topic',
				'sfwd-quiz',
			],
			static::condition()
		);
	}

	/**
	 * Unregister LearnDash block patterns to use theme patterns instead.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function unregister_learndash_block_patterns(): void
	{
		$registry = WP_Block_Patterns_Registry::get_instance();
		$registered = $registry->get_all_registered();

		foreach ($registered as $pattern) {
			$name = $pattern['name'];

			if (str_contains($name, 'learndash')) {
				$registry->unregister($name);
			}
		}
	}

	/**
	 * Add theme wrapper class to LearnDash content.
	 *
	 * @since 1.0.0
	 *
	 * @hook  learndash_wrapper_class
	 *
	 * @param string     $wrapper_class      The wrapper class.
	 * @param int|object $post               The post object or ID.
	 * @param string     $additional_classes Additional classes.
	 *
	 * @return string
	 */
	public function add_theme_wrapper_class(string $wrapper_class, $post, string $additional_classes): string
	{
		return $wrapper_class . ' aegis-learndash';
	}

	/**
	 * Set Focus Mode logo from theme custom logo.
	 *
	 * @since 1.0.0
	 *
	 * @hook  learndash_focus_mode_logo
	 *
	 * @param string $logo_url   The logo URL.
	 * @param int    $course_id  The course ID.
	 * @param int    $user_id    The user ID.
	 *
	 * @return string
	 */
	public function focus_mode_logo(string $logo_url, int $course_id, int $user_id): string
	{
		$custom_logo_id = get_theme_mod('custom_logo');

		if ($custom_logo_id) {
			$logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
		}

		return $logo_url ?: $logo_url;
	}

	/**
	 * Set Focus Mode logo alt text from site name.
	 *
	 * @since 1.0.0
	 *
	 * @hook  learndash_focus_header_logo_alt
	 *
	 * @param string $alt_text   The alt text.
	 * @param int    $course_id  The course ID.
	 * @param int    $user_id    The user ID.
	 *
	 * @return string
	 */
	public function focus_mode_logo_alt(string $alt_text, int $course_id, int $user_id): string
	{
		return get_bloginfo('name');
	}

	/**
	 * Add theme header to Focus Mode.
	 *
	 * @since 1.0.0
	 *
	 * @hook  learndash-focus-template-start
	 *
	 * @return void
	 */
	public function focus_mode_header(): void
	{
		// Allow themes to add custom header content in Focus Mode.
		do_action('aegis_learndash_focus_header');
	}

	/**
	 * Add body classes for LearnDash pages.
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
		if ($this->is_learndash_page()) {
			$classes[] = 'aegis-learndash-page';
		}

		return $classes;
	}

	/**
	 * Check if current page is a LearnDash page.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	private function is_learndash_page(): bool
	{
		if (!function_exists('get_post_type')) {
			return false;
		}

		$learndash_post_types = [
			'sfwd-courses',
			'sfwd-lessons',
			'sfwd-topic',
			'sfwd-quiz',
			'sfwd-certificates',
			'sfwd-assignment',
			'sfwd-essays',
			'groups',
		];

		return in_array(get_post_type(), $learndash_post_types, true);
	}
}
