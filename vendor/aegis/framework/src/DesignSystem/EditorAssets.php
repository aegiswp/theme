<?php
/**
 * Editor Assets Component
 *
 * Provides support for registering and managing editor scripts and styles for the Aegis Framework block editor experience.
 *
 * Responsibilities:
 * - Registers and enqueues editor scripts and styles
 * - Integrates with the scripts and styles services for backend delivery
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

// Imports scripts and styles services, debug utilities, and WordPress helpers for asset management.
use Aegis\Framework\BlockSettings\Responsive;
use Aegis\Framework\InlineAssets\Scripts;
use Aegis\Framework\InlineAssets\Styles;
use Aegis\Utilities\Debug;
use function apply_filters;
use function array_merge;
use function esc_url;
use function file_exists;
use function get_admin_url;
use function get_home_url;
use function is_admin;
use function filemtime;
use function wp_dequeue_style;
use function wp_enqueue_style;
use function wp_localize_script;
use function wp_enqueue_script;
use function wp_register_script;
use function wp_register_style;
use function wp_set_script_translations;
use function wp_roles;
use function translate_user_role;
use function get_template_directory;
use function get_template_directory_uri;

// Implements the EditorAssets class to support editor asset management for the design system.

class EditorAssets
{

	/**
	 * Scripts instance.
	 *
	 * @var Scripts
	 */
	private Scripts $scripts;

	/**
	 * Styles instance.
	 *
	 * @var Styles
	 */
	private Styles $styles;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles  $styles  Inlinable service.
	 * @param Scripts $scripts Inlinable service.
	 *
	 * @return void
	 */
	public function __construct(Scripts $scripts, Styles $styles)
	{
		$this->scripts = $scripts;
		$this->styles = $styles;
	}

	/**
	 * Enqueue editor scripts.
	 *
	 * @hook enqueue_block_editor_assets 11
	 *
	 * @return void
	 */
	public function enqueue_scripts(): void
	{
		if (!is_admin()) {
			return;
		}

		$asset_file = $this->scripts->dir . 'editor.asset.php';

		if (!file_exists($asset_file)) {
			return;
		}

		$asset = require $asset_file;
		$handle = $this->scripts->handle . '-editor';

		wp_register_script(
			$handle,
			$this->scripts->url . 'editor.js',
			$asset['dependencies'] ?? [],
			$asset['version'] ?? (Debug::is_enabled() ? (string) filemtime($this->scripts->dir . 'editor.js') : '1.0.0'),
			true
		);

		wp_enqueue_script($handle);

		$default = [
			'siteUrl' => esc_url(get_home_url()),
			'adminUrl' => esc_url(get_admin_url()),
		];

		$data = apply_filters(
			'aegis_editor_data',
			array_merge(
				$default,
				$this->scripts->get_data('', true)
			)
		);

		wp_localize_script(
			$handle,
			'aegis',
			$data
		);

		// Enqueue responsive breakpoints extension script.
		$this->enqueue_responsive_breakpoints();

		// Enqueue visibility toggles extension script.
		$this->enqueue_visibility_toggles();

		// Enqueue display panel extension script.
		$this->enqueue_display_panel();

		// @todo Uncomment for v1.0.0 release.
		// Enqueue global classes extension script.
		// $this->enqueue_global_classes();

		// Enqueue query enhancements extension script.
		$this->enqueue_query_enhancements();

		// Enqueue video editor extension script.
		$this->enqueue_video_editor();
	}

	/**
	 * Enqueue visibility toggles editor extension script.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function enqueue_visibility_toggles(): void
	{
		$asset_file = $this->scripts->dir . 'visibility-toggles.asset.php';

		if (!file_exists($asset_file)) {
			return;
		}

		$asset = require $asset_file;
		$handle = $this->scripts->handle . '-visibility-toggles';

		wp_register_script(
			$handle,
			$this->scripts->url . 'visibility-toggles.js',
			$asset['dependencies'] ?? [],
			$asset['version'] ?? (Debug::is_enabled() ? (string) filemtime($this->scripts->dir . 'visibility-toggles.js') : '1.0.0'),
			true
		);

		wp_enqueue_script($handle);

		// Get conditional logic settings from the single source of truth
		$conditionalLogicSettings = Responsive::get_conditional_logic_settings();

		// Build dynamic role list from WordPress
		$wp_roles = wp_roles();
		$roles = [];

		foreach ($wp_roles->role_names as $slug => $name) {
			$roles[] = [
				'label' => translate_user_role($name),
				'value' => $slug,
			];
		}

		// Merge with other script data
		$data = $this->scripts->get_data('', true);
		$data['conditionalLogicSettings'] = $conditionalLogicSettings;
		$data['userRoles'] = $roles;

		if (!empty($data)) {
			wp_localize_script($handle, 'aegis', $data);
		}

		wp_set_script_translations(
			$handle,
			'aegis'
		);
	}

	/**
	 * Enqueue display panel editor extension script.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function enqueue_display_panel(): void
	{
		$asset_file = $this->scripts->dir . 'display-panel.asset.php';

		if (!file_exists($asset_file)) {
			return;
		}

		$asset = require $asset_file;
		$handle = $this->scripts->handle . '-display-panel';
		$deps  = $asset['dependencies'] ?? [];
		$deps[] = $this->scripts->handle . '-visibility-toggles';

		wp_register_script(
			$handle,
			$this->scripts->url . 'display-panel.js',
			$deps,
			$asset['version'] ?? (Debug::is_enabled() ? (string) filemtime($this->scripts->dir . 'display-panel.js') : '1.0.0'),
			true
		);

		wp_enqueue_script($handle);

		wp_set_script_translations(
			$handle,
			'aegis'
		);
	}

	/**
	 * Enqueue global classes editor extension script.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function enqueue_global_classes(): void
	{
		$asset_file = $this->scripts->dir . 'global-classes-editor.asset.php';

		if (!file_exists($asset_file)) {
			return;
		}

		$asset = require $asset_file;
		$handle = $this->scripts->handle . '-global-classes';

		wp_register_script(
			$handle,
			$this->scripts->url . 'global-classes-editor.js',
			$asset['dependencies'] ?? [],
			$asset['version'] ?? (Debug::is_enabled() ? (string) filemtime($this->scripts->dir . 'global-classes-editor.js') : '1.0.0'),
			true
		);

		wp_enqueue_script($handle);

		wp_set_script_translations(
			$handle,
			'aegis'
		);
	}

	/**
	 * Enqueue responsive breakpoints editor extension script.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function enqueue_responsive_breakpoints(): void
	{
		$asset_file = $this->scripts->dir . 'responsive-breakpoints.asset.php';

		if (!file_exists($asset_file)) {
			return;
		}

		$asset = require $asset_file;
		$handle = $this->scripts->handle . '-responsive-breakpoints';

		wp_register_script(
			$handle,
			$this->scripts->url . 'responsive-breakpoints.js',
			$asset['dependencies'] ?? [],
			$asset['version'] ?? (Debug::is_enabled() ? (string) filemtime($this->scripts->dir . 'responsive-breakpoints.js') : '1.0.0'),
			true
		);

		wp_enqueue_script($handle);

		wp_set_script_translations(
			$handle,
			'aegis'
		);
	}

	/**
	 * Enqueue query enhancements editor extension script.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function enqueue_query_enhancements(): void
	{
		$asset_file = $this->scripts->dir . 'query-enhancements-editor.asset.php';

		if (!file_exists($asset_file)) {
			return;
		}

		$asset = require $asset_file;
		$handle = $this->scripts->handle . '-query-enhancements';

		wp_register_script(
			$handle,
			$this->scripts->url . 'query-enhancements-editor.js',
			$asset['dependencies'] ?? [],
			$asset['version'] ?? (Debug::is_enabled() ? (string) filemtime($this->scripts->dir . 'query-enhancements-editor.js') : '1.0.0'),
			true
		);

		wp_enqueue_script($handle);

		wp_set_script_translations(
			$handle,
			'aegis'
		);
	}

	/**
	 * Enqueue video editor extension script.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function enqueue_video_editor(): void
	{
		$theme_dir = \get_template_directory();
		$theme_url = \get_template_directory_uri();
		$asset_file = $theme_dir . '/src/Blocks/editor/video-editor.asset.php';

		if (!\file_exists($asset_file)) {
			return;
		}

		$asset = require $asset_file;
		$handle = 'aegis-video-editor';

		\wp_register_script(
			$handle,
			$theme_url . '/src/Blocks/editor/video-editor.js',
			$asset['dependencies'] ?? [],
			$asset['version'] ?? (Debug::is_enabled() ? (string) \filemtime($theme_dir . '/src/Blocks/editor/video-editor.js') : '1.0.0'),
			true
		);

		\wp_enqueue_script($handle);

		// Pass data to JavaScript
		\wp_localize_script($handle, 'aegisVideo', [
			'isPro' => \class_exists('AegisPro\\Video\\BunnyCDN'),
		]);

		\wp_set_script_translations(
			$handle,
			'aegis'
		);
	}

	/**
	 * Enqueue editor styles.
	 *
	 * @hook enqueue_block_assets 11
	 *
	 * @return void
	 */
	public function enqueue_styles(): void
	{
		if (!is_admin()) {
			return;
		}

		$handle = $this->styles->handle . '-editor';

		wp_dequeue_style('wp-block-library-theme');

		wp_register_style(
			$handle,
			$this->styles->url . 'editor.css',
			[],
			Debug::is_enabled() ? (string) filemtime($this->styles->dir . 'editor.css') : '1.0.0'
		);

		wp_enqueue_style($handle);

		wp_enqueue_style(
			'wp-codemirror'
		);
	}
}
