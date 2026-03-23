<?php
/**
 * Admin Menu
 *
 * Hook registration, admin menu/submenu registration, settings registration,
 * and asset enqueueing for the Aegis settings dashboard.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

namespace Aegis\Admin;

/**
 * Admin Menu class.
 */
class AdminMenu
{
	/**
	 * Renderer instance for page callbacks.
	 *
	 * @var AdminRenderer
	 */
	private AdminRenderer $renderer;

	/**
	 * Controller instance for AJAX callbacks.
	 *
	 * @var SettingsController
	 */
	private SettingsController $controller;

	/**
	 * Constructor.
	 *
	 * @param AdminRenderer      $renderer   Renderer instance.
	 * @param SettingsController $controller Controller instance.
	 */
	public function __construct(AdminRenderer $renderer, SettingsController $controller)
	{
		$this->renderer   = $renderer;
		$this->controller = $controller;
	}

	/**
	 * Initialize the settings page.
	 *
	 * @return void
	 */
	public function init(): void
	{
		add_action('admin_menu', [$this, 'register_menu']);
		add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
		add_action('admin_init', [$this, 'register_settings']);
		add_action('wp_ajax_aegis_save_settings', [$this->controller, 'ajax_save_settings']);
		add_action('wp_ajax_aegis_save_integrations', [$this->controller, 'ajax_save_integrations']);
		add_action('wp_ajax_aegis_save_blocks', [$this->controller, 'ajax_save_blocks']);
		add_action('wp_ajax_aegis_save_bunnycdn', [$this->controller, 'ajax_save_bunnycdn']);
		add_action('wp_ajax_aegis_save_google_maps', [$this->controller, 'ajax_save_google_maps']);
		add_action('wp_ajax_aegis_test_google_maps', [$this->controller, 'ajax_test_google_maps']);
		add_action('wp_ajax_aegis_save_general_settings', [$this->controller, 'ajax_save_general_settings']);
		add_action('wp_ajax_aegis_save_analytics', [$this->controller, 'ajax_save_analytics']);
		add_action('wp_ajax_aegis_export_settings', [$this->controller, 'ajax_export_settings']);
		add_action('wp_ajax_aegis_import_settings', [$this->controller, 'ajax_import_settings']);
		add_action('wp_ajax_aegis_reset_settings', [$this->controller, 'ajax_reset_settings']);

		// Fix admin menu highlighting for hidden submenu pages
		add_filter('parent_file', [$this, 'fix_admin_parent_file']);
		add_filter('submenu_file', [$this, 'fix_admin_submenu_file']);
	}

	/**
	 * Fix parent file for admin menu highlighting.
	 *
	 * @param string $parent_file The parent file.
	 * @return string
	 */
	public function fix_admin_parent_file(string $parent_file): string
	{
		global $pagenow;

		if ($pagenow === 'admin.php') {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$page = isset($_GET['page']) ? sanitize_text_field(wp_unslash($_GET['page'])) : '';

			// Match any page starting with 'aegis-' to keep menu active
			if (str_starts_with($page, 'aegis-')) {
				return 'aegis-dashboard';
			}
		}

		return $parent_file;
	}

	/**
	 * Fix submenu file for admin menu highlighting.
	 *
	 * @param string|null $submenu_file The submenu file.
	 * @return string|null
	 */
	public function fix_admin_submenu_file(?string $submenu_file): ?string
	{
		global $pagenow;

		if ($pagenow === 'admin.php') {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$page = isset($_GET['page']) ? sanitize_text_field(wp_unslash($_GET['page'])) : '';

			// For hidden submenu pages, return null so WordPress doesn't
			// try to match against a non-existent submenu entry.
			if (str_starts_with($page, 'aegis-') && $page !== 'aegis-dashboard') {
				return null;
			}
		}

		return $submenu_file;
	}

	/**
	 * Register admin menu.
	 *
	 * @return void
	 */
	public function register_menu(): void
	{
		// SVG icon as pre-encoded base64 data URI
		$icon = 'data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMjQgMjQiIGZpbGw9ImN1cnJlbnRDb2xvciIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMC4wNiA3Ljc1IEwxMi4wMiAzLjg3IEwxMy45NSA3LjcyIEwxNi42NSA5LjI5IEwxMi4wMyAwIEw3LjM0IDkuMyBMMTAuMDYgNy43NSBaIE0xOC4zNyAxMi43MiBMMTguMiAxMi4zNiBMMTUuNSAxMC43OSBMMTcuMDIgMTMuNjggTDIwLjA1IDE4LjYxIEwxMi4wMiAxNS4xNyBMMy45OCAxOC42MiBMNi45NiAxMy42OCBMOC4zOSAxMC44MSBMNS42NyAxMi4zOSBMNS41IDEyLjcxIEwwIDIyLjg3IEwxMi4wMSAxNi44NyBMMjQgMjIuOTQgTDE4LjM3IDEyLjcyIFoiLz48L3N2Zz4=';

		// Main menu - Dashboard as default
		add_menu_page(
			esc_html__('Aegis', 'aegis'),
			esc_html__('Aegis', 'aegis'),
			'manage_options',
			'aegis-dashboard',
			[$this->renderer, 'render_dashboard_page'],
			$icon,
			59
		);

		// Hidden pages for tabs (accessed via page tabs, not sidebar)
		add_submenu_page(
			null,
			esc_html__('Conditionals', 'aegis'),
			esc_html__('Conditionals', 'aegis'),
			'manage_options',
			'aegis-settings',
			[$this->renderer, 'render_conditional_logic_page']
		);

		add_submenu_page(
			null,
			esc_html__('Integrations', 'aegis'),
			esc_html__('Integrations', 'aegis'),
			'manage_options',
			'aegis-integrations',
			[$this->renderer, 'render_integrations_page']
		);

		add_submenu_page(
			null,
			esc_html__('Blocks', 'aegis'),
			esc_html__('Blocks', 'aegis'),
			'manage_options',
			'aegis-blocks',
			[$this->renderer, 'render_blocks_page']
		);

		add_submenu_page(
			null,
			esc_html__('Hooks', 'aegis'),
			esc_html__('Hooks', 'aegis'),
			'manage_options',
			'aegis-hook-patterns',
			[$this->renderer, 'render_hook_patterns_page']
		);

		add_submenu_page(
			null,
			esc_html__('Modals', 'aegis'),
			esc_html__('Modals', 'aegis'),
			'manage_options',
			'aegis-modals',
			[$this->renderer, 'render_modals_page']
		);

		add_submenu_page(
			null,
			esc_html__('Settings', 'aegis'),
			esc_html__('Settings', 'aegis'),
			'manage_options',
			'aegis-general-settings',
			[$this->renderer, 'render_general_settings_page']
		);

		add_submenu_page(
			null,
			esc_html__('Analytics', 'aegis'),
			esc_html__('Analytics', 'aegis'),
			'manage_options',
			'aegis-analytics',
			[$this->renderer, 'render_analytics_page']
		);

		add_submenu_page(
			null,
			esc_html__('License', 'aegis'),
			esc_html__('License', 'aegis'),
			'manage_options',
			'aegis-license',
			[$this->renderer, 'render_license_page']
		);
	}

	/**
	 * Register settings.
	 *
	 * @return void
	 */
	public function register_settings(): void
	{
		register_setting(
			'aegis_conditional_logic_group',
			SettingsRepository::OPTION_NAME,
			[
				'type' => 'array',
				'sanitize_callback' => [$this->controller, 'sanitize_settings'],
				'default' => SettingsRepository::DEFAULTS,
			]
		);

		register_setting(
			'aegis_integrations_group',
			SettingsRepository::INTEGRATIONS_OPTION,
			[
				'type' => 'array',
				'sanitize_callback' => [$this->controller, 'sanitize_integrations'],
				'default' => SettingsRepository::INTEGRATION_DEFAULTS,
			]
		);

		// One-time migrations: enable defaults that now default to true
		(new SettingsMigration())->run();

		register_setting(
			'aegis_blocks_group',
			SettingsRepository::BLOCKS_OPTION,
			[
				'type' => 'array',
				'sanitize_callback' => [$this->controller, 'sanitize_blocks'],
				'default' => SettingsRepository::BLOCKS_DEFAULTS,
			]
		);

		register_setting(
			'aegis_integrations_group',
			'aegis_pattern_control',
			[
				'type' => 'array',
				'sanitize_callback' => [$this->controller, 'sanitize_pattern_control'],
				'default' => [],
			]
		);

		register_setting(
			'aegis_general_settings_group',
			SettingsRepository::SETTINGS_OPTION,
			[
				'type' => 'array',
				'sanitize_callback' => [$this->controller, 'sanitize_general_settings'],
				'default' => SettingsRepository::SETTINGS_DEFAULTS,
			]
		);

		register_setting(
			'aegis_analytics_group',
			SettingsRepository::ANALYTICS_OPTION,
			[
				'type' => 'array',
				'sanitize_callback' => [$this->controller, 'sanitize_analytics'],
				'default' => SettingsRepository::ANALYTICS_DEFAULTS,
			]
		);
	}

	/**
	 * Enqueue admin assets.
	 *
	 * @param string $hook_suffix Current admin page.
	 * @return void
	 */
	public function enqueue_assets(string $hook_suffix): void
	{
		if (!str_contains($hook_suffix, 'aegis')) {
			return;
		}

		$theme_dir = get_template_directory();
		$theme_url = get_template_directory_uri();
		$asset_file = $theme_dir . '/src/Admin/build/index.asset.php';

		if (file_exists($asset_file)) {
			// Load built/minified assets from webpack build.
			$asset = require $asset_file;

			// Use centralized AssetManager for consistent loading
			\Aegis\Core\AssetManager::register_style(
				'aegis-admin-settings',
				$theme_url . '/src/Admin/build/index.css',
				['wp-components'],
				$asset['version']
			);

			\Aegis\Core\AssetManager::register_script(
				'aegis-admin-settings',
				$theme_url . '/src/Admin/build/index.js',
				array_merge($asset['dependencies'], ['jquery']),
				$asset['version'],
				true
			);

			\Aegis\Core\AssetManager::enqueue_style('aegis-admin-settings');
			\Aegis\Core\AssetManager::enqueue_script('aegis-admin-settings');
		} else {
			// Fallback to source files (development without build).
			\Aegis\Core\AssetManager::register_style(
				'aegis-admin-settings',
				$theme_url . '/src/Admin/css/admin-settings.css',
				['wp-components'],
				(string) time()
			);

			\Aegis\Core\AssetManager::register_script(
				'aegis-admin-settings',
				$theme_url . '/src/Admin/js/admin-settings.js',
				['jquery'],
				(string) time(),
				true
			);

			\Aegis\Core\AssetManager::enqueue_style('aegis-admin-settings');
			\Aegis\Core\AssetManager::enqueue_script('aegis-admin-settings');
		}

		// Force Aegis menu active state via inline CSS (matches WP admin dark theme)
		$menu_active_css = '
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top,
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top:hover,
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top:focus,
			#adminmenu li.toplevel_page_aegis-dashboard.current > a.menu-top,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-has-current-submenu > a.menu-top,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-menu-open > a.menu-top {
				background-color: #2271b1 !important;
				color: #fff !important;
			}
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top .wp-menu-image,
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top:hover .wp-menu-image,
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top:focus .wp-menu-image,
			#adminmenu li.toplevel_page_aegis-dashboard.current > a.menu-top .wp-menu-image,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-has-current-submenu > a.menu-top .wp-menu-image,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-menu-open > a.menu-top .wp-menu-image {
				color: #fff !important;
			}
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top .wp-menu-image:before,
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top:hover .wp-menu-image:before,
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top:focus .wp-menu-image:before,
			#adminmenu li.toplevel_page_aegis-dashboard.current > a.menu-top .wp-menu-image:before,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-has-current-submenu > a.menu-top .wp-menu-image:before,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-menu-open > a.menu-top .wp-menu-image:before {
				color: #fff !important;
			}
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top .wp-menu-image svg,
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top .wp-menu-image svg path {
				fill: #fff !important;
			}
		';
		wp_add_inline_style('aegis-admin-settings', $menu_active_css);

		// Load hook-patterns styles on the Hooks and Modals settings pages.
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if (isset($_GET['page']) && in_array(sanitize_text_field(wp_unslash($_GET['page'])), ['aegis-hook-patterns', 'aegis-modals'], true)) {
			\Aegis\Core\AssetManager::register_style(
				'aegis-hook-patterns-admin',
				$theme_url . '/src/Admin/css/hook-patterns.css',
				['aegis-admin-settings'],
				'1.0.0'
			);
			\Aegis\Core\AssetManager::enqueue_style('aegis-hook-patterns-admin');
		}

		\Aegis\Core\AssetManager::localize_script('aegis-admin-settings', 'aegisAdmin', [
			'ajaxUrl' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('aegis_settings_nonce'),
			'saving' => __('Saving...', 'aegis'),
			'saved' => __('Settings saved.', 'aegis'),
			'error' => __('Error saving settings.', 'aegis'),
		]);
	}
}
