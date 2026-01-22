<?php
/**
 * Scripts Component
 *
 * Provides support for registering, enqueuing, and managing inline scripts in the Aegis Framework.
 *
 * Responsibilities:
 * - Registers and enqueues inline scripts for the theme and block editor
 * - Integrates with the Aegis inline assets system and WordPress script API
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

// Imports utility classes and WordPress functions for script management.
use Aegis\Utilities\Str;
use function apply_filters;
use function is_admin;
use function wp_add_inline_script;
use function wp_enqueue_script;
use function wp_localize_script;
use function wp_register_script;

// Implements the Scripts class to support inline script management for the design system.

class Scripts implements Inlinable
{

	use AssetsTrait;

	/**
	 * Enqueue inline scripts.
	 *
	 * @hook enqueue_block_assets
	 *
	 * @return void
	 */
	public function enqueue(): void
	{
		if (is_admin()) {
			return;
		}

		$template_html = $GLOBALS['template_html'] ?? '';
		$load_all = apply_filters('aegis_load_all_scripts', !$template_html);

		$js = $this->get_inline_assets($template_html, $load_all);
		$data = $this->get_data($template_html, $load_all);

		wp_register_script($this->handle, '', [], '', true);
		wp_enqueue_script($this->handle);
		wp_add_inline_script($this->handle, $js);

		if ($data) {
			wp_localize_script($this->handle, 'aegis', $data);
		}
	}

	/**
	 * Returns array of localized data.
	 *
	 * @param string $template_html Global template HTML variable.
	 * @param bool   $load_all      Load all scripts.
	 *
	 * @return array
	 */
	public function get_data(string $template_html, bool $load_all): array
	{
		$data = [];

		foreach ($this->data as $key => $args) {
			$value = $args[0] ?? [];
			$strings = $args[1] ?? [];
			$condition = $args[2] ?? true;

			if (!$condition) {
				continue;
			}

			if ($load_all || Str::contains_any($template_html, ...$strings)) {
				$data[$key] = $value;
			}
		}

		return $data;
	}
}
