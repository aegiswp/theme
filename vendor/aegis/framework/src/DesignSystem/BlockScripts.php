<?php
/**
 * Block Scripts Component
 *
 * Provides support for registering and managing block-specific JavaScript files within the Aegis Framework.
 *
 * Responsibilities:
 * - Registers and loads JavaScript files for individual blocks
 * - Integrates with the scripts service and WordPress script APIs
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare( strict_types=1 );

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports scripts service, debugging utilities, and WordPress integration helpers.
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Utilities\Debug;
use function in_array;
use function is_admin;
use function str_contains;
use function str_replace;
use function wp_enqueue_script;
use function wp_script_add_data;
use function wp_register_script;

// Implements the BlockScripts class to support block-level script registration and management.

class BlockScripts
{

	/**
	 * The scripts instance
	 *
	 * @var Scripts
	 */
	private Scripts $scripts;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts
	 *
	 * @return void
	 */
	public function __construct(Scripts $scripts)
	{
		$this->scripts = $scripts;
	}

	/**
	 * Register the block scripts
	 *
	 * @since 1.0.0
	 *
	 * @hook  wp_enqueue_scripts
	 *
	 * @return void
	 */
	public function register(): void
	{
		global $template_html;

		$scripts = [
			'packery' => 'packery',
			'splide' => 'splide',
			'splide-autoscroll' => 'data-type="marquee"',
		];

		foreach ($scripts as $handle => $strings) {
			if (!str_contains($template_html ?? '', $strings)) {
				continue;
			}

			$asset_file = $this->scripts->dir . $handle . '.asset.php';

			if (!file_exists($asset_file)) {
				continue;
			}

			$asset = require $asset_file;

			// Register only — actual loading is handled by the IntersectionObserver
			// lazy loader in Scripts::lazy_loader() for better performance.
			wp_register_script(
				$handle,
				$this->scripts->url . $handle . '.js',
				$asset['dependencies'] ?? [],
				$asset['version'] ?? (Debug::is_enabled() ? (string) filemtime($this->scripts->dir . $handle . '.js') : '1.0.0'),
				true
			);
		}
	}

	public function add_defer_attribute(string $tag, string $handle, string $src): string
	{
		if (is_admin()) {
			return $tag;
		}

		$defer_handles = [
			'packery',
			'splide',
			'splide-autoscroll',
		];

		if (!in_array($handle, $defer_handles, true)) {
			return $tag;
		}

		if (str_contains($tag, ' defer')) {
			return $tag;
		}

		return str_replace('<script ', '<script defer ', $tag);
	}
}
