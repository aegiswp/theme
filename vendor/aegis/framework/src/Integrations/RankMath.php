<?php
/**
 * Rank Math SEO Integration Component
 *
 * Provides support for integrating Rank Math SEO plugin compatibility in the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for Rank Math SEO plugin presence and conditionally registers hooks
 * - Provides fallback meta description when Rank Math is not active
 * - Integrates with the Aegis container and hook system
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

// Imports interfaces and helpers for conditional logic and hook management.
use Aegis\Container\Interfaces\Conditional;
use function add_action;
use function esc_html;
use function get_bloginfo;
use function get_the_archive_description;
use function get_the_excerpt;
use function is_archive;
use function is_plugin_active;
use function is_singular;
use function printf;

// Implements the Rank Math SEO integration class for the design system.

class RankMath implements Conditional
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
		return !is_plugin_active('seo-by-rank-math/rank-math.php');
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
		add_action('wp_head', [$this, 'fallback_meta_description'], 2);
	}

	/**
	 * Fallback meta description if Rank Math SEO is not active.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function fallback_meta_description(): void
	{
		$description = get_bloginfo('description');

		if (!$description) {
			$description = get_bloginfo('name');
		}

		if (is_singular()) {
			$excerpt = get_the_excerpt();
			$description = $excerpt ?: $description;
		}

		if (is_archive()) {
			$archive_description = get_the_archive_description();
			$description = $archive_description ?: $description;
		}

		printf(
			'<meta name="description" content="%s">',
			esc_html($description)
		);
	}
}
