<?php
/**
 * Conditional Logic Settings Admin Page
 *
 * Provides an admin settings page for managing Conditional Logic features.
 *
 * @package    Aegis
 * @since      1.0.0
 */

declare(strict_types=1);

namespace Aegis\Admin;

/**
 * Conditional Logic Settings class.
 */
class ConditionalLogicSettings
{
	/**
	 * Option name for storing settings.
	 */
	public const OPTION_NAME = 'aegis_conditional_logic';

	/**
	 * Option name for integrations settings.
	 */
	public const INTEGRATIONS_OPTION = 'aegis_integrations';

	/**
	 * Default settings.
	 */
	public const DEFAULTS = [
		'visibility' => [
			'screen_size' => false,
			'custom_breakpoints' => false,
			'browser_device' => false,
		],
		'accessibility' => [
			'reduced_motion' => false,
			'screen_reader_only' => false,
			'color_scheme' => false,
			'high_contrast' => false,
			'forced_colors' => false,
		],
		'user' => [
			'user_status' => false,
			'user_role' => false,
		],
		'schedule' => [
			'date_time' => false,
		],
	];

	/**
	 * Integration defaults - all disabled by default.
	 */
	public const INTEGRATION_DEFAULTS = [
		'advanced_custom_fields' => false,
		'bunny_cdn' => false,
		'bunny_cdn_stream_library' => false,
		'bunny_cdn_direct_upload' => false,
		'bunny_cdn_hls_streaming' => false,
		'bunny_cdn_ai_transcription' => false,
		'bunny_cdn_video_thumbnails' => false,
		'bunny_cdn_video_watermark' => false,
		'code_block_pro' => false,
		'fluent_booking' => false,
		'fluent_forms' => false,
		'learndash' => false,
		'lifter_lms' => false,
		'rank_math' => false,
		'rank_math_video_sitemap' => false,
		'sensei_lms' => false,
		'syntax_highlighting' => false,
		'woocommerce' => false,
	];

	/**
	 * Option name for custom blocks settings.
	 */
	public const BLOCKS_OPTION = 'aegis_blocks';

	/**
	 * Option name for BunnyCDN API settings.
	 */
	public const BUNNYCDN_OPTION = 'aegis_bunnycdn';

	/**
	 * BunnyCDN API settings defaults.
	 */
	public const BUNNYCDN_DEFAULTS = [
		'api_key' => '',
		'cdn_pullzone' => '',
		'cdn_hostname' => '',
		'storage_zone' => '',
		'storage_api_key' => '',
		'storage_region' => 'de',
		'stream_library_id' => '',
		'stream_api_key' => '',
	];

	/**
	 * Custom blocks defaults - all disabled by default.
	 */
	public const BLOCKS_DEFAULTS = [
		'modal' => false,
		'modal_click' => false,
		'modal_icon' => false,
		'modal_text' => false,
		'modal_image' => false,
		'modal_exit_intent' => false,
		'modal_scroll_depth' => false,
		'modal_time_delay' => false,
		'modal_offcanvas' => false,
		'modal_fullscreen' => false,
		'modal_animations' => false,
		'modal_auto_close' => false,
		'modal_show_once' => false,
		'modal_device_visibility' => false,
		'slider' => false,
		'slider_slide' => false,
		'slider_fade' => false,
		'slider_navigation' => false,
		'slider_pagination' => false,
		'slider_loop' => false,
		'slider_keyboard' => false,
		'slider_responsive' => false,
		'slider_autoplay' => false,
		'slider_effects' => false,
		'slider_thumbnails' => false,
		'slider_lightbox' => false,
		'slider_mousewheel' => false,
		'slider_aspect_ratio' => false,
		'slider_lazy_load' => false,
		'slider_arrow_styles' => false,
		'slider_dot_styles' => false,
		'toggle' => false,
		'toggle_pill' => false,
		'toggle_switch' => false,
		'toggle_buttons' => false,
		'toggle_position' => false,
		'toggle_labels' => false,
		'toggle_url_sync' => false,
		'toggle_persist' => false,
		'toggle_animations' => false,
		'toggle_faq' => false,
		'toggle_nested' => false,
		'toggle_conditional' => false,
		// @todo Uncomment for v1.0.0 release.
		// 'global_styles' => false,
		// 'global_styles_spacing' => false,
		// 'global_styles_typography' => false,
		// 'global_styles_layout' => false,
		// 'global_styles_effects' => false,
		// 'global_styles_create' => false,
		// 'global_styles_library' => false,
		// 'global_styles_transfer' => false,
		// 'global_styles_export' => false,
		'query_loop' => false,
		'query_loop_post_types' => false,
		'query_loop_taxonomy' => false,
		'query_loop_include_exclude' => false,
		'query_loop_meta_query' => false,
		'query_loop_order_meta' => false,
		'query_loop_responsive_columns' => false,
		'query_loop_gap_controls' => false,
		'query_loop_featured_first' => false,
		'query_loop_equal_height' => false,
		'query_loop_no_results' => false,
		'query_loop_extended_order' => false,
		'query_loop_advanced_meta' => false,
		'query_loop_date_query' => false,
		'query_loop_related_posts' => false,
		'query_loop_parent_child' => false,
		'query_loop_acf_integration' => false,
		'query_loop_ajax_pagination' => false,
		'query_loop_frontend_filters' => false,
		'query_loop_masonry_layout' => false,
		'query_loop_carousel_layout' => false,
		'query_loop_woocommerce' => false,
		'query_loop_performance' => false,
		'video_custom_player' => false,
		'video_theater_mode' => false,
		'video_keyboard_shortcuts' => false,
		'video_schema_markup' => false,
		'video_ambient_light' => false,
		'video_thumbnail_preview' => false,
		'video_touch_gestures' => false,
		'video_playlists' => false,
		'video_sticky_player' => false,
		'video_focus_mode' => false,
		'video_save_progress' => false,
		'video_chapters' => false,
		'video_email_capture' => false,
		'video_analytics' => false,
		'video_multi_audio' => false,
		'video_privacy' => false,
		'video_sitemap' => false,
		'accordion' => false,
		'accordion_open_first' => false,
		'accordion_open_all' => false,
		'accordion_icon' => false,
		'accordion_border' => false,
		'accordion_faq_schema' => false,
		'accordion_single_open' => false,
		'counter' => false,
		'counter_prefix' => false,
		'counter_suffix' => false,
		'counter_delay' => false,
		'counter_duration' => false,
		'counter_intersection' => false,
		'icon' => false,
		'icon_gradient' => false,
		'icon_animation' => false,
		'icon_custom_svg' => false,
		'icon_gallery' => false,
		'icon_responsive' => false,
		'icon_rest_api' => false,
		'marquee' => false,
		'marquee_pause_hover' => false,
		'marquee_direction' => false,
		'marquee_speed' => false,
		'marquee_repeat' => false,
		'marquee_responsive_speed' => false,
		'newsletter' => false,
		'newsletter_email_validation' => false,
		'newsletter_success_message' => false,
		'newsletter_placeholder' => false,
		'svg' => false,
		'svg_mask' => false,
		'svg_onclick' => false,
		'svg_inline' => false,
		'svg_inline_file' => false,
	];

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
		add_action('wp_ajax_aegis_save_settings', [$this, 'ajax_save_settings']);
		add_action('wp_ajax_aegis_save_integrations', [$this, 'ajax_save_integrations']);
		add_action('wp_ajax_aegis_save_blocks', [$this, 'ajax_save_blocks']);
		add_action('wp_ajax_aegis_save_bunnycdn', [$this, 'ajax_save_bunnycdn']);
		add_action('wp_ajax_aegis_export_settings', [$this, 'ajax_export_settings']);
		add_action('wp_ajax_aegis_import_settings', [$this, 'ajax_import_settings']);

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
			$page = $_GET['page'] ?? '';

			// Match any page starting with 'aegis-' to keep menu active
			if (strpos($page, 'aegis-') === 0) {
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
			$page = $_GET['page'] ?? '';

			// Match any page starting with 'aegis-' to keep menu active
			if (strpos($page, 'aegis-') === 0) {
				return 'aegis-dashboard';
			}
		}

		return $submenu_file;
	}

	/**
	 * Handle AJAX save settings.
	 *
	 * @return void
	 */
	public function ajax_save_settings(): void
	{
		// Verify nonce
		if (!check_ajax_referer('aegis_settings_nonce', 'nonce', false)) {
			wp_send_json_error(['message' => __('Security check failed.', 'aegis')]);
		}

		// Check permissions
		if (!current_user_can('manage_options')) {
			wp_send_json_error(['message' => __('Permission denied.', 'aegis')]);
		}

		// Get and sanitize settings
		$settings = isset($_POST['settings']) ? $_POST['settings'] : [];
		$sanitized = $this->sanitize_settings($settings);

		// Save settings
		update_option(self::OPTION_NAME, $sanitized);

		wp_send_json_success(['message' => __('Settings saved.', 'aegis')]);
	}

	/**
	 * Handle AJAX save integrations.
	 *
	 * @return void
	 */
	public function ajax_save_integrations(): void
	{
		// Verify nonce
		if (!check_ajax_referer('aegis_settings_nonce', 'nonce', false)) {
			wp_send_json_error(['message' => __('Security check failed.', 'aegis')]);
		}

		// Check permissions
		if (!current_user_can('manage_options')) {
			wp_send_json_error(['message' => __('Permission denied.', 'aegis')]);
		}

		// Get and sanitize settings
		$settings = isset($_POST['settings']) ? $_POST['settings'] : [];
		$sanitized = $this->sanitize_integrations($settings);

		// Save settings
		update_option(self::INTEGRATIONS_OPTION, $sanitized);

		wp_send_json_success(['message' => __('Settings saved.', 'aegis')]);
	}

	/**
	 * Handle AJAX save blocks.
	 *
	 * @return void
	 */
	public function ajax_save_blocks(): void
	{
		// Verify nonce
		if (!check_ajax_referer('aegis_settings_nonce', 'nonce', false)) {
			wp_send_json_error(['message' => __('Security check failed.', 'aegis')]);
		}

		// Check permissions
		if (!current_user_can('manage_options')) {
			wp_send_json_error(['message' => __('Permission denied.', 'aegis')]);
		}

		// Get and sanitize settings
		$settings = isset($_POST['settings']) ? $_POST['settings'] : [];
		$sanitized = $this->sanitize_blocks($settings);

		// Save settings
		update_option(self::BLOCKS_OPTION, $sanitized);

		wp_send_json_success(['message' => __('Settings saved.', 'aegis')]);
	}

	/**
	 * Handle AJAX save BunnyCDN settings.
	 *
	 * @return void
	 */
	public function ajax_save_bunnycdn(): void
	{
		// Verify nonce
		if (!check_ajax_referer('aegis_settings_nonce', 'nonce', false)) {
			wp_send_json_error(['message' => __('Security check failed.', 'aegis')]);
		}

		// Check permissions
		if (!current_user_can('manage_options')) {
			wp_send_json_error(['message' => __('Permission denied.', 'aegis')]);
		}

		// Get and sanitize settings
		$settings = isset($_POST['settings']) ? $_POST['settings'] : [];
		$sanitized = $this->sanitize_bunnycdn($settings);

		// Save settings
		update_option(self::BUNNYCDN_OPTION, $sanitized);

		wp_send_json_success(['message' => __('Settings saved.', 'aegis')]);
	}

	/**
	 * Sanitize BunnyCDN settings.
	 *
	 * @param array $input Input settings.
	 * @return array Sanitized settings.
	 */
	public function sanitize_bunnycdn(array $input): array
	{
		$sanitized = [];

		foreach (self::BUNNYCDN_DEFAULTS as $key => $default) {
			if (isset($input[$key])) {
				$sanitized[$key] = sanitize_text_field($input[$key]);
			} else {
				$sanitized[$key] = $default;
			}
		}

		return $sanitized;
	}

	/**
	 * Handle AJAX export settings.
	 *
	 * @return void
	 */
	public function ajax_export_settings(): void
	{
		// Verify nonce
		if (!check_ajax_referer('aegis_settings_nonce', 'nonce', false)) {
			wp_send_json_error(['message' => __('Security check failed.', 'aegis')]);
		}

		// Check permissions
		if (!current_user_can('manage_options')) {
			wp_send_json_error(['message' => __('Permission denied.', 'aegis')]);
		}

		$export_data = [
			'conditional_logic' => self::get_settings(),
			'integrations' => self::get_integration_settings(),
			'version' => '1.0.0',
			'exported_at' => current_time('mysql'),
		];

		wp_send_json_success($export_data);
	}

	/**
	 * Handle AJAX import settings.
	 *
	 * @return void
	 */
	public function ajax_import_settings(): void
	{
		// Verify nonce
		if (!check_ajax_referer('aegis_settings_nonce', 'nonce', false)) {
			wp_send_json_error(['message' => __('Security check failed.', 'aegis')]);
		}

		// Check permissions
		if (!current_user_can('manage_options')) {
			wp_send_json_error(['message' => __('Permission denied.', 'aegis')]);
		}

		// Get and decode settings
		$settings_json = isset($_POST['settings']) ? wp_unslash($_POST['settings']) : '';
		$settings = json_decode($settings_json, true);

		if (!$settings || !is_array($settings)) {
			wp_send_json_error(['message' => __('Invalid settings data.', 'aegis')]);
		}

		// Import conditional logic settings
		if (isset($settings['conditional_logic']) && is_array($settings['conditional_logic'])) {
			$sanitized = $this->sanitize_settings($settings['conditional_logic']);
			update_option(self::OPTION_NAME, $sanitized);
		}

		// Import integrations settings
		if (isset($settings['integrations']) && is_array($settings['integrations'])) {
			$sanitized = $this->sanitize_integrations($settings['integrations']);
			update_option(self::INTEGRATIONS_OPTION, $sanitized);
		}

		wp_send_json_success(['message' => __('Settings imported successfully.', 'aegis')]);
	}

	/**
	 * Register admin menu.
	 *
	 * @return void
	 */
	public function register_menu(): void
	{
		// SVG icon encoded as base64 data URI
		$icon = 'data:image/svg+xml;base64,' . base64_encode('<svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.06 7.75 L12.02 3.87 L13.95 7.72 L16.65 9.29 L12.03 0 L7.34 9.3 L10.06 7.75 Z M18.37 12.72 L18.2 12.36 L15.5 10.79 L17.02 13.68 L20.05 18.61 L12.02 15.17 L3.98 18.62 L6.96 13.68 L8.39 10.81 L5.67 12.39 L5.5 12.71 L0 22.87 L12.01 16.87 L24 22.94 L18.37 12.72 Z"/></svg>');

		// Main menu - Dashboard as default
		add_menu_page(
			esc_html__('Aegis', 'aegis'),
			esc_html__('Aegis', 'aegis'),
			'manage_options',
			'aegis-dashboard',
			[$this, 'render_dashboard_page'],
			$icon,
			59
		);

		// Dashboard submenu (default)
		add_submenu_page(
			'aegis-dashboard',
			esc_html__('Dashboard', 'aegis'),
			esc_html__('Dashboard', 'aegis'),
			'manage_options',
			'aegis-dashboard',
			[$this, 'render_dashboard_page']
		);

		// Hidden pages for tabs (accessed via page tabs, not sidebar)
		add_submenu_page(
			null,
			esc_html__('Conditionals', 'aegis'),
			esc_html__('Conditionals', 'aegis'),
			'manage_options',
			'aegis-settings',
			[$this, 'render_conditional_logic_page']
		);

		add_submenu_page(
			null,
			esc_html__('Integrations', 'aegis'),
			esc_html__('Integrations', 'aegis'),
			'manage_options',
			'aegis-integrations',
			[$this, 'render_integrations_page']
		);

		add_submenu_page(
			null,
			esc_html__('Blocks', 'aegis'),
			esc_html__('Blocks', 'aegis'),
			'manage_options',
			'aegis-blocks',
			[$this, 'render_blocks_page']
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
			self::OPTION_NAME,
			[
				'type' => 'array',
				'sanitize_callback' => [$this, 'sanitize_settings'],
				'default' => self::DEFAULTS,
			]
		);

		register_setting(
			'aegis_integrations_group',
			self::INTEGRATIONS_OPTION,
			[
				'type' => 'array',
				'sanitize_callback' => [$this, 'sanitize_integrations'],
				'default' => self::INTEGRATION_DEFAULTS,
			]
		);

		register_setting(
			'aegis_blocks_group',
			self::BLOCKS_OPTION,
			[
				'type' => 'array',
				'sanitize_callback' => [$this, 'sanitize_blocks'],
				'default' => self::BLOCKS_DEFAULTS,
			]
		);
	}

	/**
	 * Sanitize blocks settings.
	 *
	 * @param array $input Input settings.
	 * @return array Sanitized settings.
	 */
	public function sanitize_blocks(array $input): array
	{
		$sanitized = [];

		foreach (self::BLOCKS_DEFAULTS as $key => $default) {
			$sanitized[$key] = isset($input[$key]) ? (bool) $input[$key] : false;
		}

		return $sanitized;
	}

	/**
	 * Sanitize integrations settings.
	 *
	 * @param array $input Input settings.
	 * @return array Sanitized settings.
	 */
	public function sanitize_integrations(array $input): array
	{
		$sanitized = [];

		foreach (self::INTEGRATION_DEFAULTS as $key => $default) {
			$sanitized[$key] = isset($input[$key]) ? (bool) $input[$key] : false;
		}

		return $sanitized;
	}

	/**
	 * Sanitize settings.
	 *
	 * @param array $input Input settings.
	 * @return array Sanitized settings.
	 */
	public function sanitize_settings(array $input): array
	{
		$sanitized = [];

		foreach (self::DEFAULTS as $group => $options) {
			$sanitized[$group] = [];
			foreach ($options as $key => $default) {
				$sanitized[$group][$key] = isset($input[$group][$key]) ? (bool) $input[$group][$key] : false;
			}
		}

		return $sanitized;
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

			wp_enqueue_style(
				'aegis-admin-settings',
				$theme_url . '/src/Admin/build/index.css',
				[],
				$asset['version']
			);

			wp_enqueue_script(
				'aegis-admin-settings',
				$theme_url . '/src/Admin/build/index.js',
				array_merge($asset['dependencies'], ['jquery']),
				$asset['version'],
				true
			);
		} else {
			// Fallback to source files (development without build).
			wp_enqueue_style(
				'aegis-admin-settings',
				$theme_url . '/src/Admin/css/admin-settings.css',
				[],
				time()
			);

			wp_enqueue_script(
				'aegis-admin-settings',
				$theme_url . '/src/Admin/js/admin-settings.js',
				['jquery'],
				time(),
				true
			);
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

		wp_localize_script('aegis-admin-settings', 'aegisAdmin', [
			'ajaxUrl' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('aegis_settings_nonce'),
			'saving' => __('Saving...', 'aegis'),
			'saved' => __('Settings saved.', 'aegis'),
			'error' => __('Error saving settings.', 'aegis'),
		]);
	}

	/**
	 * Render main settings page.
	 *
	 * @return void
	 */
	public function render_settings_page(): void
	{
		?>
		<div class="wrap aegis-admin-wrap">
			<h1><?php esc_html_e('Aegis Theme Settings', 'aegis'); ?></h1>
			<p><?php esc_html_e('Welcome to Aegis. Use the submenu to access specific settings.', 'aegis'); ?></p>
		</div>
		<?php
	}

	/**
	 * Render the top header bar with logo and links.
	 *
	 * @return void
	 */
	private function render_top_bar(): void
	{
		?>
		<div class="aegis-top-bar">
			<div class="aegis-top-bar-left">
				<div class="aegis-top-bar-title">
					<svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M10.06 7.75 L12.02 3.87 L13.95 7.72 L16.65 9.29 L12.03 0 L7.34 9.3 L10.06 7.75 Z M18.37 12.72 L18.2 12.36 L15.5 10.79 L17.02 13.68 L20.05 18.61 L12.02 15.17 L3.98 18.62 L6.96 13.68 L8.39 10.81 L5.67 12.39 L5.5 12.71 L0 22.87 L12.01 16.87 L24 22.94 L18.37 12.72 Z"/>
					</svg>
					<span><?php esc_html_e('Native Block Framework', 'aegis'); ?></span>
				</div>
			</div>
			<div class="aegis-top-bar-right">
				<a href="https://github.com/aegiswp/theme" target="_blank" rel="noopener noreferrer" class="aegis-top-bar-link">
					<span class="dashicons dashicons-editor-code"></span>
					<span><?php esc_html_e('GitHub', 'aegis'); ?></span>
				</a>
				<a href="https://www.facebook.com/groups/aegiswp" target="_blank" rel="noopener noreferrer" class="aegis-top-bar-link">
					<span class="dashicons dashicons-groups"></span>
					<span><?php esc_html_e('Support', 'aegis'); ?></span>
				</a>
			</div>
		</div>
		<?php
	}

	/**
	 * Render the page tabs navigation.
	 *
	 * @param string $active_tab The currently active tab.
	 * @return void
	 */
	private function render_page_tabs(string $active_tab = 'dashboard'): void
	{
		?>
		<div class="aegis-page-tabs">
			<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-dashboard')); ?>" class="aegis-page-tab <?php echo $active_tab === 'dashboard' ? 'active' : ''; ?>">
				<?php esc_html_e('Dashboard', 'aegis'); ?>
			</a>
			<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-settings')); ?>" class="aegis-page-tab <?php echo $active_tab === 'conditional-logic' ? 'active' : ''; ?>">
				<?php esc_html_e('Conditionals', 'aegis'); ?>
			</a>
			<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-blocks')); ?>" class="aegis-page-tab <?php echo $active_tab === 'blocks' ? 'active' : ''; ?>">
				<?php esc_html_e('Blocks', 'aegis'); ?>
			</a>
			<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-integrations')); ?>" class="aegis-page-tab <?php echo $active_tab === 'integrations' ? 'active' : ''; ?>">
				<?php esc_html_e('Integrations', 'aegis'); ?>
			</a>
		</div>
		<?php
	}

	/**
	 * Render dashboard page.
	 *
	 * @return void
	 */
	public function render_dashboard_page(): void
	{
		$theme = wp_get_theme();
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs('dashboard'); ?>

			<div class="aegis-settings-wrap">
				<div class="aegis-settings-header">
					<h1><?php esc_html_e('Dashboard', 'aegis'); ?></h1>
					<p><?php esc_html_e('Welcome to the Aegis Native Block Framework. Get started with the resources below.', 'aegis'); ?></p>
				</div>

				<div class="aegis-settings-layout">
					<nav class="aegis-settings-nav">
						<a href="#getting-started" class="aegis-nav-item active">
							<span class="dashicons dashicons-welcome-learn-more"></span>
							<?php esc_html_e('Getting Started', 'aegis'); ?>
						</a>
						<a href="#quick-links" class="aegis-nav-item">
							<span class="dashicons dashicons-admin-links"></span>
							<?php esc_html_e('Quick Links', 'aegis'); ?>
						</a>
						<a href="#theme-info" class="aegis-nav-item">
							<span class="dashicons dashicons-info"></span>
							<?php esc_html_e('Theme Info', 'aegis'); ?>
						</a>
					</nav>

					<div class="aegis-settings-content">
						<!-- Getting Started Section -->
						<section id="getting-started" class="aegis-settings-section active">
							<?php $this->render_section_header(__('Getting Started', 'aegis'), __('Learn the basics of the Aegis Native Block Framework.', 'aegis'), false); ?>

							<div class="aegis-settings-grid">
								<div class="aegis-toggle-card">
									<div class="aegis-toggle-info">
										<div class="aegis-toggle-icon">
											<span class="dashicons dashicons-admin-appearance"></span>
										</div>
										<div class="aegis-toggle-text">
											<h3><?php esc_html_e('Site Editor', 'aegis'); ?></h3>
											<p><?php esc_html_e('Customize your site templates, styles, and global settings using the WordPress Site Editor.', 'aegis'); ?></p>
										</div>
									</div>
									<a href="<?php echo esc_url(admin_url('site-editor.php')); ?>" class="button button-secondary"><?php esc_html_e('Open', 'aegis'); ?></a>
								</div>

								<div class="aegis-toggle-card">
									<div class="aegis-toggle-info">
										<div class="aegis-toggle-icon">
											<span class="dashicons dashicons-screenoptions"></span>
										</div>
										<div class="aegis-toggle-text">
											<h3><?php esc_html_e('Templates', 'aegis'); ?></h3>
											<p><?php esc_html_e('Create and manage page templates for your site.', 'aegis'); ?></p>
										</div>
									</div>
									<a href="<?php echo esc_url(admin_url('site-editor.php?path=%2Fwp_template')); ?>" class="button button-secondary"><?php esc_html_e('Manage', 'aegis'); ?></a>
								</div>

								<div class="aegis-toggle-card">
									<div class="aegis-toggle-info">
										<div class="aegis-toggle-icon">
											<span class="dashicons dashicons-layout"></span>
										</div>
										<div class="aegis-toggle-text">
											<h3><?php esc_html_e('Pattern Library', 'aegis'); ?></h3>
											<p><?php esc_html_e('Browse and insert pre-designed patterns to quickly build beautiful pages.', 'aegis'); ?></p>
										</div>
									</div>
									<a href="<?php echo esc_url(admin_url('site-editor.php?path=%2Fpatterns')); ?>" class="button button-secondary"><?php esc_html_e('Browse', 'aegis'); ?></a>
								</div>

								<div class="aegis-toggle-card">
									<div class="aegis-toggle-info">
										<div class="aegis-toggle-icon">
											<span class="dashicons dashicons-art"></span>
										</div>
										<div class="aegis-toggle-text">
											<h3><?php esc_html_e('Global Styles', 'aegis'); ?></h3>
											<p><?php esc_html_e('Customize colors, typography, and spacing across your entire site.', 'aegis'); ?></p>
										</div>
									</div>
									<a href="<?php echo esc_url(admin_url('site-editor.php?path=%2Fwp_global_styles')); ?>" class="button button-secondary"><?php esc_html_e('Customize', 'aegis'); ?></a>
								</div>
							</div>
						</section>

						<!-- Quick Links Section -->
						<section id="quick-links" class="aegis-settings-section">
							<?php $this->render_section_header(__('Quick Links', 'aegis'), __('Jump to commonly used settings and tools.', 'aegis'), false); ?>

							<div class="aegis-settings-grid">
								<div class="aegis-toggle-card">
									<div class="aegis-toggle-info">
										<div class="aegis-toggle-icon">
											<span class="dashicons dashicons-visibility"></span>
										</div>
										<div class="aegis-toggle-text">
											<h3><?php esc_html_e('Conditionals', 'aegis'); ?></h3>
											<p><?php esc_html_e('Control block visibility based on user roles, schedules, and more.', 'aegis'); ?></p>
										</div>
									</div>
									<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-settings')); ?>" class="button button-secondary"><?php esc_html_e('Configure', 'aegis'); ?></a>
								</div>

								<div class="aegis-toggle-card">
									<div class="aegis-toggle-info">
										<div class="aegis-toggle-icon">
											<span class="dashicons dashicons-block-default"></span>
										</div>
										<div class="aegis-toggle-text">
											<h3><?php esc_html_e('Blocks', 'aegis'); ?></h3>
											<p><?php esc_html_e('Enable or disable blocks like Modal, Slider, and Toggle.', 'aegis'); ?></p>
										</div>
									</div>
									<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-blocks')); ?>" class="button button-secondary"><?php esc_html_e('Manage', 'aegis'); ?></a>
								</div>

								<div class="aegis-toggle-card">
									<div class="aegis-toggle-info">
										<div class="aegis-toggle-icon">
											<span class="dashicons dashicons-admin-plugins"></span>
										</div>
										<div class="aegis-toggle-text">
											<h3><?php esc_html_e('Integrations', 'aegis'); ?></h3>
											<p><?php esc_html_e('Connect with WooCommerce, LearnDash, and other popular plugins.', 'aegis'); ?></p>
										</div>
									</div>
									<a href="<?php echo esc_url(admin_url('admin.php?page=aegis-integrations')); ?>" class="button button-secondary"><?php esc_html_e('View', 'aegis'); ?></a>
								</div>
							</div>
						</section>

						<!-- Theme Info Section -->
						<section id="theme-info" class="aegis-settings-section">
							<?php $this->render_section_header(__('Theme Information', 'aegis'), __('Details about your current theme installation.', 'aegis'), false); ?>

							<div class="aegis-settings-grid">
								<div class="aegis-toggle-card">
									<div class="aegis-toggle-info">
										<div class="aegis-toggle-icon">
											<span class="dashicons dashicons-info-outline"></span>
										</div>
										<div class="aegis-toggle-text">
											<h3><?php esc_html_e('Theme Version', 'aegis'); ?></h3>
											<p><?php echo esc_html($theme->get('Version')); ?></p>
										</div>
									</div>
								</div>

								<div class="aegis-toggle-card">
									<div class="aegis-toggle-info">
										<div class="aegis-toggle-icon">
											<span class="dashicons dashicons-wordpress"></span>
										</div>
										<div class="aegis-toggle-text">
											<h3><?php esc_html_e('WordPress Version', 'aegis'); ?></h3>
											<p><?php echo esc_html(get_bloginfo('version')); ?></p>
										</div>
									</div>
								</div>

								<div class="aegis-toggle-card">
									<div class="aegis-toggle-info">
										<div class="aegis-toggle-icon">
											<span class="dashicons dashicons-editor-code"></span>
										</div>
										<div class="aegis-toggle-text">
											<h3><?php esc_html_e('PHP Version', 'aegis'); ?></h3>
											<p><?php echo esc_html(PHP_VERSION); ?></p>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Render conditional logic settings page.
	 *
	 * @return void
	 */
	public function render_conditional_logic_page(): void
	{
		$options = get_option(self::OPTION_NAME, self::DEFAULTS);
		$options = wp_parse_args($options, self::DEFAULTS);
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs('conditional-logic'); ?>

			<div class="aegis-settings-wrap">
				<div class="aegis-settings-header">
					<h1><?php esc_html_e('Conditionals', 'aegis'); ?></h1>
					<p><?php esc_html_e('Enable or disable conditional logic features for the block editor.', 'aegis'); ?></p>
				</div>

				<?php $this->render_toolbar(); ?>

				<form method="post" action="options.php" class="aegis-settings-form">
					<?php settings_fields('aegis_conditional_logic_group'); ?>

					<div class="aegis-settings-layout">
						<nav class="aegis-settings-nav">
							<a href="#visibility" class="aegis-nav-item active">
								<span class="dashicons dashicons-visibility"></span>
								<?php esc_html_e('Visibility', 'aegis'); ?>
							</a>
							<a href="#accessibility" class="aegis-nav-item">
								<span class="dashicons dashicons-universal-access"></span>
								<?php esc_html_e('Accessibility', 'aegis'); ?>
							</a>
							<a href="#user" class="aegis-nav-item">
								<span class="dashicons dashicons-admin-users"></span>
								<?php esc_html_e('User', 'aegis'); ?>
							</a>
							<a href="#schedule" class="aegis-nav-item">
								<span class="dashicons dashicons-calendar-alt"></span>
								<?php esc_html_e('Schedule', 'aegis'); ?>
							</a>
						</nav>

					<div class="aegis-settings-content">
						<!-- Visibility Section -->
						<section id="visibility" class="aegis-settings-section active">
							<?php $this->render_section_header(__('Visibility Controls', 'aegis'), __('Control block visibility based on screen size and device.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('visibility', 'screen_size', __('Screen Size', 'aegis'), __('Hide blocks on mobile, tablet, or desktop.', 'aegis'), $options); ?>
								<?php $this->render_toggle('visibility', 'custom_breakpoints', __('Custom Breakpoints', 'aegis'), __('Define custom min/max width breakpoints.', 'aegis'), $options); ?>
								<?php $this->render_toggle('visibility', 'browser_device', __('Browser & Device', 'aegis'), __('Target specific browsers and devices.', 'aegis'), $options); ?>
							</div>
						</section>

						<!-- Accessibility Section -->
						<section id="accessibility" class="aegis-settings-section">
							<?php $this->render_section_header(__('Accessibility Controls', 'aegis'), __('Respect user accessibility preferences.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('accessibility', 'reduced_motion', __('Reduced Motion', 'aegis'), __('Hide content for users who prefer reduced motion.', 'aegis'), $options); ?>
								<?php $this->render_toggle('accessibility', 'screen_reader_only', __('Screen Reader Only', 'aegis'), __('Make content visible only to screen readers.', 'aegis'), $options); ?>
								<?php $this->render_toggle('accessibility', 'color_scheme', __('Color Scheme', 'aegis'), __('Show content only in light or dark mode.', 'aegis'), $options); ?>
								<?php $this->render_toggle('accessibility', 'high_contrast', __('High Contrast', 'aegis'), __('Hide content in high contrast mode.', 'aegis'), $options); ?>
								<?php $this->render_toggle('accessibility', 'forced_colors', __('Forced Colors', 'aegis'), __('Hide content in Windows High Contrast mode.', 'aegis'), $options); ?>
							</div>
						</section>

						<!-- User Section -->
						<section id="user" class="aegis-settings-section">
							<?php $this->render_section_header(__('User Controls', 'aegis'), __('Control visibility based on user status and role.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('user', 'user_status', __('User Status', 'aegis'), __('Show content to logged-in or logged-out users.', 'aegis'), $options); ?>
								<?php $this->render_toggle('user', 'user_role', __('User Role', 'aegis'), __('Show content to specific user roles.', 'aegis'), $options); ?>
							</div>
						</section>

						<!-- Schedule Section -->
						<section id="schedule" class="aegis-settings-section">
							<?php $this->render_section_header(__('Schedule Controls', 'aegis'), __('Control visibility based on date and time.', 'aegis')); ?>

							<div class="aegis-settings-grid">
								<?php $this->render_toggle('schedule', 'date_time', __('Date & Time', 'aegis'), __('Show content during specific dates and times.', 'aegis'), $options); ?>
							</div>
						</section>

						<div class="aegis-settings-footer">
							<?php submit_button(__('Save Settings', 'aegis'), 'primary', 'submit', false); ?>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
		<?php
	}

	/**
	 * Render integrations settings page.
	 *
	 * @return void
	 */
	public function render_integrations_page(): void
	{
		$options = get_option(self::INTEGRATIONS_OPTION, self::INTEGRATION_DEFAULTS);
		$options = wp_parse_args($options, self::INTEGRATION_DEFAULTS);
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs('integrations'); ?>

			<div class="aegis-settings-wrap">
				<div class="aegis-settings-header">
					<h1><?php esc_html_e('Integrations', 'aegis'); ?></h1>
					<p><?php esc_html_e('Enable or disable third-party plugin integrations.', 'aegis'); ?></p>
				</div>

				<?php $this->render_toolbar(); ?>

				<form method="post" action="options.php" class="aegis-settings-form aegis-integrations-form">
					<?php settings_fields('aegis_integrations_group'); ?>

					<div class="aegis-settings-layout">
						<nav class="aegis-settings-nav">
							<a href="#ecommerce" class="aegis-nav-item active">
								<span class="dashicons dashicons-cart"></span>
								<?php esc_html_e('E-Commerce', 'aegis'); ?>
							</a>
							<a href="#lms" class="aegis-nav-item">
								<span class="dashicons dashicons-welcome-learn-more"></span>
								<?php esc_html_e('LMS', 'aegis'); ?>
							</a>
							<a href="#forms" class="aegis-nav-item">
								<span class="dashicons dashicons-feedback"></span>
								<?php esc_html_e('Forms & Booking', 'aegis'); ?>
							</a>
							<a href="#seo" class="aegis-nav-item">
								<span class="dashicons dashicons-chart-line"></span>
								<?php esc_html_e('SEO', 'aegis'); ?>
							</a>
							<a href="#developer" class="aegis-nav-item">
								<span class="dashicons dashicons-editor-code"></span>
								<?php esc_html_e('Developer', 'aegis'); ?>
							</a>
							<a href="#performance" class="aegis-nav-item">
								<span class="dashicons dashicons-performance"></span>
								<?php esc_html_e('Performance', 'aegis'); ?>
							</a>
						</nav>

						<div class="aegis-settings-content">
							<!-- E-Commerce Section -->
							<section id="ecommerce" class="aegis-settings-section active">
								<?php $this->render_section_header(__('E-Commerce Integrations', 'aegis'), __('Integrations for e-commerce plugins.', 'aegis')); ?>

								<div class="aegis-settings-grid">
									<?php $this->render_integration_toggle('woocommerce', __('WooCommerce', 'aegis'), __('E-commerce platform for selling products and services.', 'aegis'), $options, 'woocommerce', 'cart'); ?>
								</div>
							</section>

							<!-- LMS Section -->
							<section id="lms" class="aegis-settings-section">
								<?php $this->render_section_header(__('Learning Management Systems', 'aegis'), __('Integrations for online course and learning platforms.', 'aegis')); ?>

								<div class="aegis-settings-grid">
									<?php $this->render_integration_toggle('learndash', __('LearnDash', 'aegis'), __('Powerful LMS plugin for creating and selling courses.', 'aegis'), $options, 'learndash', 'welcome-learn-more'); ?>
									<?php $this->render_integration_toggle('lifter_lms', __('LifterLMS', 'aegis'), __('Complete LMS solution for course creation and membership.', 'aegis'), $options, 'lifter_lms', 'awards'); ?>
									<?php $this->render_integration_toggle('sensei_lms', __('Sensei LMS', 'aegis'), __('Learning management by WooCommerce.', 'aegis'), $options, 'sensei_lms', 'book'); ?>
								</div>
							</section>

							<!-- Forms & Booking Section -->
							<section id="forms" class="aegis-settings-section">
								<?php $this->render_section_header(__('Forms & Booking', 'aegis'), __('Integrations for form builders and booking systems.', 'aegis')); ?>

								<div class="aegis-settings-grid">
									<?php $this->render_integration_toggle('fluent_forms', __('Fluent Forms', 'aegis'), __('Fast and lightweight form builder plugin.', 'aegis'), $options, 'fluent_forms', 'feedback'); ?>
									<?php $this->render_integration_toggle('fluent_booking', __('Fluent Booking', 'aegis'), __('Appointment and booking management system.', 'aegis'), $options, 'fluent_booking', 'calendar-alt'); ?>
								</div>
							</section>

							<!-- SEO Section -->
							<section id="seo" class="aegis-settings-section">
								<?php $this->render_section_header(__('SEO', 'aegis'), __('Integrations for search engine optimization plugins.', 'aegis')); ?>

								<div class="aegis-settings-grid">
									<?php $this->render_integration_toggle('rank_math', __('Rank Math', 'aegis'), __('SEO plugin for optimizing your content.', 'aegis'), $options, 'rank_math', 'chart-line'); ?>
								</div>
							</section>

							<!-- Developer Section -->
							<section id="developer" class="aegis-settings-section">
								<?php $this->render_section_header(__('Developer Tools', 'aegis'), __('Integrations for developer-focused plugins.', 'aegis')); ?>

								<div class="aegis-settings-grid">
									<?php $this->render_integration_toggle('advanced_custom_fields', __('Advanced Custom Fields', 'aegis'), __('Custom fields and meta boxes for WordPress.', 'aegis'), $options, 'acf', 'admin-generic'); ?>
									<?php $this->render_integration_toggle('code_block_pro', __('Code Block Pro', 'aegis'), __('Syntax highlighting for code blocks.', 'aegis'), $options, 'code_block_pro', 'editor-code'); ?>
									<?php $this->render_integration_toggle('syntax_highlighting', __('Syntax Highlighting Code Block', 'aegis'), __('Alternative syntax highlighting for code.', 'aegis'), $options, 'syntax_highlighting', 'editor-code'); ?>
								</div>
							</section>

							<!-- Performance Section -->
							<section id="performance" class="aegis-settings-section">
								<?php $this->render_section_header(__('Performance', 'aegis'), __('Integrations for performance and CDN plugins.', 'aegis')); ?>

								<div class="aegis-settings-grid">
									<?php $this->render_integration_toggle('bunny_cdn', __('Bunny CDN', 'aegis'), __('Content delivery network for faster loading.', 'aegis'), $options, 'bunny_cdn', 'performance'); ?>
								</div>
							</section>

							<div class="aegis-settings-footer">
								<?php submit_button(__('Save Settings', 'aegis'), 'primary', 'submit', false); ?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
	}

	/**
	 * Render custom blocks settings page.
	 *
	 * @return void
	 */
	public function render_blocks_page(): void
	{
		$options = get_option(self::BLOCKS_OPTION, self::BLOCKS_DEFAULTS);
		$options = wp_parse_args($options, self::BLOCKS_DEFAULTS);
		?>
		<div class="aegis-admin-page">
			<?php $this->render_top_bar(); ?>
			<?php $this->render_page_tabs('blocks'); ?>

			<div class="aegis-settings-wrap">
				<div class="aegis-settings-header">
					<h1><?php esc_html_e('Blocks', 'aegis'); ?></h1>
					<p><?php esc_html_e('Enable or disable blocks enhancements provided by the framework.', 'aegis'); ?></p>
				</div>

				<?php $this->render_toolbar(); ?>

				<form method="post" action="options.php" class="aegis-settings-form aegis-blocks-form">
					<?php settings_fields('aegis_blocks_group'); ?>

					<div class="aegis-settings-layout">
						<nav class="aegis-settings-nav">
							<a href="#accordion" class="aegis-nav-item active">
								<span class="dashicons dashicons-list-view"></span>
								<?php esc_html_e('Accordion', 'aegis'); ?>
							</a>
							<a href="#counter" class="aegis-nav-item">
								<span class="dashicons dashicons-editor-ol"></span>
								<?php esc_html_e('Counter', 'aegis'); ?>
							</a>
							<a href="#icon" class="aegis-nav-item">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e('Icon', 'aegis'); ?>
							</a>
							<a href="#marquee" class="aegis-nav-item">
								<span class="dashicons dashicons-minus"></span>
								<?php esc_html_e('Marquee', 'aegis'); ?>
							</a>
							<a href="#modal" class="aegis-nav-item">
								<span class="dashicons dashicons-editor-expand"></span>
								<?php esc_html_e('Modal', 'aegis'); ?>
							</a>
							<a href="#newsletter" class="aegis-nav-item">
								<span class="dashicons dashicons-email-alt"></span>
								<?php esc_html_e('Newsletter', 'aegis'); ?>
							</a>
							<a href="#query-loop" class="aegis-nav-item">
								<span class="dashicons dashicons-database"></span>
								<?php esc_html_e('Query Loop', 'aegis'); ?>
							</a>
							<a href="#slider" class="aegis-nav-item">
								<span class="dashicons dashicons-slides"></span>
								<?php esc_html_e('Slider', 'aegis'); ?>
							</a>
							<a href="#svg" class="aegis-nav-item">
								<span class="dashicons dashicons-superhero-alt"></span>
								<?php esc_html_e('SVG', 'aegis'); ?>
							</a>
							<a href="#toggle" class="aegis-nav-item">
								<span class="dashicons dashicons-arrow-down-alt2"></span>
								<?php esc_html_e('Toggle', 'aegis'); ?>
							</a>
							<?php /* @todo Uncomment for v1.0.0 release.
							<a href="#global-styles" class="aegis-nav-item">
								<span class="dashicons dashicons-screenoptions"></span>
								<?php esc_html_e('Utilities', 'aegis'); ?>
							</a>
							*/ ?>
							<a href="#video-block" class="aegis-nav-item">
								<span class="dashicons dashicons-video-alt3"></span>
								<?php esc_html_e('Video', 'aegis'); ?>
							</a>
						</nav>

						<div class="aegis-settings-content">
							<!-- Accordion Section -->
							<section id="accordion" class="aegis-settings-section active">
								<?php $this->render_section_header(__('Accordion Block', 'aegis'), __('List block variation that transforms lists into semantic accordions.', 'aegis'), true, 'list-view'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('accordion_open_first', __('Open First Item', 'aegis'), __('Automatically expand the first accordion item on load.', 'aegis'), $options, 'arrow-down-alt2'); ?>
										<?php $this->render_block_feature_toggle('accordion_open_all', __('Open All Items', 'aegis'), __('Expand all accordion items by default.', 'aegis'), $options, 'editor-expand'); ?>
										<?php $this->render_block_feature_toggle('accordion_icon', __('Toggle Icon', 'aegis'), __('Show expand/collapse icon indicator.', 'aegis'), $options, 'plus-alt'); ?>
										<?php $this->render_block_feature_toggle('accordion_border', __('Border Separator', 'aegis'), __('Show border separator between title and content.', 'aegis'), $options, 'minus'); ?>
										<?php $this->render_block_feature_toggle('accordion_faq_schema', __('FAQ Schema', 'aegis'), __('Add FAQPage structured data markup for SEO.', 'aegis'), $options, 'editor-help', true); ?>
										<?php $this->render_block_feature_toggle('accordion_single_open', __('Single Open Mode', 'aegis'), __('Close other items when one is opened.', 'aegis'), $options, 'controls-repeat', true); ?>
									</div>
								</div>
							</section>

							<!-- Counter Section -->
							<section id="counter" class="aegis-settings-section">
								<?php $this->render_section_header(__('Counter Block', 'aegis'), __('Paragraph block variation that animates numbers with counting effects.', 'aegis'), true, 'editor-ol'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('counter_prefix', __('Prefix Text', 'aegis'), __('Display text before the counter number (e.g. currency symbol).', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('counter_suffix', __('Suffix Text', 'aegis'), __('Display text after the counter number (e.g. percentage sign).', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('counter_delay', __('Start Delay', 'aegis'), __('Delay before the counting animation begins.', 'aegis'), $options, 'clock'); ?>
										<?php $this->render_block_feature_toggle('counter_duration', __('Custom Duration', 'aegis'), __('Control the speed of the counting animation.', 'aegis'), $options, 'dashboard'); ?>
										<?php $this->render_block_feature_toggle('counter_intersection', __('Scroll Trigger', 'aegis'), __('Start animation when the counter scrolls into view.', 'aegis'), $options, 'visibility', true); ?>
									</div>
								</div>
							</section>

							<!-- Icon Section -->
							<section id="icon" class="aegis-settings-section">
								<?php $this->render_section_header(__('Icon Block', 'aegis'), __('Image block variation that transforms images into inline SVG icons.', 'aegis'), true, 'star-filled'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('icon_gradient', __('Gradient Colors', 'aegis'), __('Apply gradient colors to icons using CSS mask technique.', 'aegis'), $options, 'art'); ?>
										<?php $this->render_block_feature_toggle('icon_animation', __('Animations', 'aegis'), __('Add animation effects to icon elements.', 'aegis'), $options, 'image-rotate'); ?>
										<?php $this->render_block_feature_toggle('icon_custom_svg', __('Custom SVG', 'aegis'), __('Allow custom SVG string input for icons.', 'aegis'), $options, 'editor-code'); ?>
										<?php $this->render_block_feature_toggle('icon_gallery', __('Icon Gallery', 'aegis'), __('Display all available icons in a grid gallery view.', 'aegis'), $options, 'format-gallery'); ?>
										<?php $this->render_block_feature_toggle('icon_responsive', __('Responsive Sizing', 'aegis'), __('Different icon sizes per breakpoint.', 'aegis'), $options, 'smartphone', true); ?>
										<?php $this->render_block_feature_toggle('icon_rest_api', __('REST API Endpoint', 'aegis'), __('Expose icon sets via REST API for editor integration.', 'aegis'), $options, 'rest-api', true); ?>
									</div>
								</div>
							</section>

							<!-- Marquee Section -->
							<section id="marquee" class="aegis-settings-section">
								<?php $this->render_section_header(__('Marquee Block', 'aegis'), __('Group block variation that creates CSS-powered infinite scrolling banners.', 'aegis'), true, 'minus'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('marquee_pause_hover', __('Pause on Hover', 'aegis'), __('Pause the scrolling animation on hover and focus.', 'aegis'), $options, 'controls-pause'); ?>
										<?php $this->render_block_feature_toggle('marquee_direction', __('Direction Control', 'aegis'), __('Set scroll direction (left-to-right or right-to-left).', 'aegis'), $options, 'arrow-right-alt'); ?>
										<?php $this->render_block_feature_toggle('marquee_speed', __('Speed Control', 'aegis'), __('Adjust the animation speed of the scrolling content.', 'aegis'), $options, 'dashboard'); ?>
										<?php $this->render_block_feature_toggle('marquee_repeat', __('Repeat Items', 'aegis'), __('Control how many times items are cloned for seamless looping.', 'aegis'), $options, 'controls-repeat'); ?>
										<?php $this->render_block_feature_toggle('marquee_responsive_speed', __('Responsive Speed', 'aegis'), __('Different animation speeds for mobile and desktop.', 'aegis'), $options, 'smartphone', true); ?>
									</div>
								</div>
							</section>

							<!-- Modal Section -->
							<section id="modal" class="aegis-settings-section">
								<?php $this->render_section_header(__('Modal Block', 'aegis'), __('Popup/modal block with various trigger types.', 'aegis'), true, 'editor-expand'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('modal_click', __('Button Trigger', 'aegis'), __('Open modal on button click.', 'aegis'), $options, 'button'); ?>
										<?php $this->render_block_feature_toggle('modal_icon', __('Icon Trigger', 'aegis'), __('Open modal on icon click.', 'aegis'), $options, 'admin-customizer'); ?>
										<?php $this->render_block_feature_toggle('modal_text', __('Text Trigger', 'aegis'), __('Open modal on text link click.', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('modal_image', __('Image Trigger', 'aegis'), __('Open modal on image click.', 'aegis'), $options, 'format-image'); ?>
										<?php $this->render_block_feature_toggle('modal_offcanvas', __('Off-Canvas Modes', 'aegis'), __('Left, right off-canvas and bottom sheet styles.', 'aegis'), $options, 'align-pull-left'); ?>
										<?php $this->render_block_feature_toggle('modal_fullscreen', __('Fullscreen Mode', 'aegis'), __('Full viewport modal style.', 'aegis'), $options, 'fullscreen-alt'); ?>
										<?php $this->render_block_feature_toggle('modal_animations', __('Animations', 'aegis'), __('Fade, scale, slide, flip, zoom effects.', 'aegis'), $options, 'image-rotate'); ?>
										<?php $this->render_block_feature_toggle('modal_exit_intent', __('Exit Intent', 'aegis'), __('Open modal when user moves to leave the page.', 'aegis'), $options, 'migrate', true); ?>
										<?php $this->render_block_feature_toggle('modal_scroll_depth', __('Scroll Depth', 'aegis'), __('Open modal after scrolling a percentage of the page.', 'aegis'), $options, 'sort', true); ?>
										<?php $this->render_block_feature_toggle('modal_time_delay', __('Time Delay', 'aegis'), __('Open modal after a specified time delay.', 'aegis'), $options, 'clock', true); ?>
										<?php $this->render_block_feature_toggle('modal_auto_close', __('Auto Close', 'aegis'), __('Automatically close modal after delay.', 'aegis'), $options, 'dismiss', true); ?>
										<?php $this->render_block_feature_toggle('modal_show_once', __('Show Once', 'aegis'), __('Remember if user has seen this modal.', 'aegis'), $options, 'hidden', true); ?>
										<?php $this->render_block_feature_toggle('modal_device_visibility', __('Device Visibility', 'aegis'), __('Show/hide on specific devices.', 'aegis'), $options, 'smartphone', true); ?>
									</div>
								</div>
							</section>

							<!-- Newsletter Section -->
							<section id="newsletter" class="aegis-settings-section">
								<?php $this->render_section_header(__('Newsletter Block', 'aegis'), __('Search block variation that transforms the search form into a newsletter signup.', 'aegis'), true, 'email-alt'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('newsletter_email_validation', __('Email Validation', 'aegis'), __('Validate email format on the input field before submission.', 'aegis'), $options, 'shield'); ?>
										<?php $this->render_block_feature_toggle('newsletter_success_message', __('Success Message', 'aegis'), __('Display a confirmation message after successful signup.', 'aegis'), $options, 'yes-alt'); ?>
										<?php $this->render_block_feature_toggle('newsletter_placeholder', __('Custom Placeholder', 'aegis'), __('Set custom placeholder text for the email input field.', 'aegis'), $options, 'editor-textcolor'); ?>
									</div>
								</div>
							</section>

							<!-- Query Loop Section -->
							<section id="query-loop" class="aegis-settings-section">
								<?php $this->render_section_header(__('Query Loop', 'aegis'), __('Advanced query parameters and layout controls for the Query Loop block.', 'aegis'), true, 'database'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('query_loop_post_types', __('Multiple Post Types', 'aegis'), __('Query multiple post types in a single loop.', 'aegis'), $options, 'admin-post'); ?>
										<?php $this->render_block_feature_toggle('query_loop_taxonomy', __('Taxonomy Filtering', 'aegis'), __('Filter by categories, tags, and custom taxonomies.', 'aegis'), $options, 'tag'); ?>
										<?php $this->render_block_feature_toggle('query_loop_include_exclude', __('Include/Exclude Posts', 'aegis'), __('Manually select posts to include or exclude.', 'aegis'), $options, 'list-view'); ?>
										<?php $this->render_block_feature_toggle('query_loop_meta_query', __('Custom Field Query', 'aegis'), __('Filter posts by custom field values.', 'aegis'), $options, 'admin-generic'); ?>
										<?php $this->render_block_feature_toggle('query_loop_order_meta', __('Order by Custom Field', 'aegis'), __('Sort posts by custom field values.', 'aegis'), $options, 'sort'); ?>
										<?php $this->render_block_feature_toggle('query_loop_responsive_columns', __('Responsive Columns', 'aegis'), __('Different column counts per breakpoint.', 'aegis'), $options, 'columns'); ?>
										<?php $this->render_block_feature_toggle('query_loop_gap_controls', __('Gap Controls', 'aegis'), __('Custom row and column gap settings.', 'aegis'), $options, 'editor-expand'); ?>
										<?php $this->render_block_feature_toggle('query_loop_featured_first', __('Featured First Post', 'aegis'), __('Make the first post span multiple columns.', 'aegis'), $options, 'star-filled'); ?>
										<?php $this->render_block_feature_toggle('query_loop_equal_height', __('Equal Height Cards', 'aegis'), __('Force all cards to have equal height.', 'aegis'), $options, 'align-full-width'); ?>
										<?php $this->render_block_feature_toggle('query_loop_no_results', __('No Results Template', 'aegis'), __('Custom message when no posts match query.', 'aegis'), $options, 'warning'); ?>
										<?php $this->render_block_feature_toggle('query_loop_extended_order', __('Extended Ordering', 'aegis'), __('Random, comment count, modified date, etc.', 'aegis'), $options, 'sort'); ?>
										<?php $this->render_block_feature_toggle('query_loop_advanced_meta', __('Advanced Meta Query', 'aegis'), __('Multiple meta queries with AND/OR relation.', 'aegis'), $options, 'filter', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_date_query', __('Date Query', 'aegis'), __('Filter by date ranges and relative dates.', 'aegis'), $options, 'calendar-alt', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_related_posts', __('Related Posts', 'aegis'), __('Show posts related by category, tag, or field.', 'aegis'), $options, 'admin-links', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_parent_child', __('Parent/Child Posts', 'aegis'), __('Query child pages of current or specific post.', 'aegis'), $options, 'networking', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_acf_integration', __('ACF/MetaBox Integration', 'aegis'), __('Field picker for ACF and Meta Box plugins.', 'aegis'), $options, 'admin-plugins', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_ajax_pagination', __('AJAX Pagination', 'aegis'), __('Load more, infinite scroll, AJAX page nav.', 'aegis'), $options, 'update', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_frontend_filters', __('Frontend Filters', 'aegis'), __('Taxonomy, search, and sort filters.', 'aegis'), $options, 'filter', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_masonry_layout', __('Masonry Layout', 'aegis'), __('CSS and JS masonry grid with animations.', 'aegis'), $options, 'grid-view', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_carousel_layout', __('Carousel Layout', 'aegis'), __('Slider with navigation, pagination, autoplay.', 'aegis'), $options, 'slides', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_woocommerce', __('WooCommerce Integration', 'aegis'), __('Product filtering, sorting, and display options.', 'aegis'), $options, 'cart', true); ?>
										<?php $this->render_block_feature_toggle('query_loop_performance', __('Performance Optimization', 'aegis'), __('Caching, lazy loading, skeleton loading.', 'aegis'), $options, 'performance', true); ?>
									</div>
								</div>
							</section>

							<!-- Slider Section -->
							<section id="slider" class="aegis-settings-section">
								<?php $this->render_section_header(__('Slider Block', 'aegis'), __('Slider/carousel block with multiple navigation options.', 'aegis'), true, 'slides'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('slider_slide', __('Slide Effect', 'aegis'), __('Basic slide transition between slides.', 'aegis'), $options, 'slides'); ?>
										<?php $this->render_block_feature_toggle('slider_fade', __('Fade Effect', 'aegis'), __('Fade transition between slides.', 'aegis'), $options, 'visibility'); ?>
										<?php $this->render_block_feature_toggle('slider_navigation', __('Navigation Arrows', 'aegis'), __('Show previous/next navigation arrows.', 'aegis'), $options, 'arrow-left-alt2'); ?>
										<?php $this->render_block_feature_toggle('slider_pagination', __('Pagination Dots', 'aegis'), __('Show pagination dots below the slider.', 'aegis'), $options, 'marker'); ?>
										<?php $this->render_block_feature_toggle('slider_loop', __('Infinite Loop', 'aegis'), __('Loop slides infinitely.', 'aegis'), $options, 'controls-repeat'); ?>
										<?php $this->render_block_feature_toggle('slider_keyboard', __('Keyboard Navigation', 'aegis'), __('Navigate slides with arrow keys.', 'aegis'), $options, 'laptop'); ?>
										<?php $this->render_block_feature_toggle('slider_responsive', __('Responsive Slides', 'aegis'), __('Different slides per view on devices.', 'aegis'), $options, 'smartphone'); ?>
										<?php $this->render_block_feature_toggle('slider_autoplay', __('Autoplay', 'aegis'), __('Auto-advance slides with configurable delay.', 'aegis'), $options, 'controls-play', true); ?>
										<?php $this->render_block_feature_toggle('slider_effects', __('Advanced Effects', 'aegis'), __('Cube, coverflow, flip, cards, creative effects.', 'aegis'), $options, 'image-rotate', true); ?>
										<?php $this->render_block_feature_toggle('slider_thumbnails', __('Thumbnail Navigation', 'aegis'), __('Thumbnail strip for slide navigation.', 'aegis'), $options, 'format-gallery', true); ?>
										<?php $this->render_block_feature_toggle('slider_lightbox', __('Lightbox Mode', 'aegis'), __('Open slides in fullscreen lightbox.', 'aegis'), $options, 'fullscreen-alt', true); ?>
										<?php $this->render_block_feature_toggle('slider_mousewheel', __('Mousewheel Control', 'aegis'), __('Navigate slides with mouse scroll.', 'aegis'), $options, 'arrow-down-alt', true); ?>
										<?php $this->render_block_feature_toggle('slider_aspect_ratio', __('Aspect Ratio Lock', 'aegis'), __('Lock to specific aspect ratios.', 'aegis'), $options, 'image-crop', true); ?>
										<?php $this->render_block_feature_toggle('slider_lazy_load', __('Lazy Loading', 'aegis'), __('Performance optimization for images.', 'aegis'), $options, 'performance', true); ?>
										<?php $this->render_block_feature_toggle('slider_arrow_styles', __('Custom Arrow Styles', 'aegis'), __('Minimal, rounded, square arrow styles.', 'aegis'), $options, 'admin-customizer', true); ?>
										<?php $this->render_block_feature_toggle('slider_dot_styles', __('Custom Dot Styles', 'aegis'), __('Line, dash, fraction pagination styles.', 'aegis'), $options, 'ellipsis', true); ?>
									</div>
								</div>
							</section>

							<!-- SVG Section -->
							<section id="svg" class="aegis-settings-section">
								<?php $this->render_section_header(__('SVG Block', 'aegis'), __('Image block variation and settings for inline SVG rendering and manipulation.', 'aegis'), true, 'superhero-alt'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('svg_mask', __('Mask Mode', 'aegis'), __('Render SVG as a CSS mask for colorization via background-color.', 'aegis'), $options, 'art'); ?>
										<?php $this->render_block_feature_toggle('svg_onclick', __('Onclick Action', 'aegis'), __('Attach custom onclick behavior to SVG elements.', 'aegis'), $options, 'admin-links'); ?>
										<?php $this->render_block_feature_toggle('svg_inline', __('Inline SVG', 'aegis'), __('Replace CSS-masked images with raw inline SVG elements.', 'aegis'), $options, 'editor-code'); ?>
										<?php $this->render_block_feature_toggle('svg_inline_file', __('Inline SVG Files', 'aegis'), __('Replace image tags linking to .svg files with inline SVG markup.', 'aegis'), $options, 'media-default'); ?>
									</div>
								</div>
							</section>

							<!-- Toggle Section -->
							<section id="toggle" class="aegis-settings-section">
								<?php $this->render_section_header(__('Toggle Block', 'aegis'), __('Expandable/collapsible toggle block for content.', 'aegis'), true, 'arrow-down-alt2'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('toggle_pill', __('Pill Style', 'aegis'), __('Pill-shaped toggle control.', 'aegis'), $options, 'button'); ?>
										<?php $this->render_block_feature_toggle('toggle_switch', __('Switch Style', 'aegis'), __('On/off switch style toggle.', 'aegis'), $options, 'controls-repeat'); ?>
										<?php $this->render_block_feature_toggle('toggle_buttons', __('Button Style', 'aegis'), __('Button group style toggle.', 'aegis'), $options, 'button'); ?>
										<?php $this->render_block_feature_toggle('toggle_position', __('Position Control', 'aegis'), __('Left, center, right alignment options.', 'aegis'), $options, 'align-center'); ?>
										<?php $this->render_block_feature_toggle('toggle_labels', __('Custom Labels', 'aegis'), __('Customizable toggle labels.', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('toggle_url_sync', __('URL Sync', 'aegis'), __('Sync toggle state with URL parameter.', 'aegis'), $options, 'admin-links', true); ?>
										<?php $this->render_block_feature_toggle('toggle_persist', __('State Persistence', 'aegis'), __('Remember user choice via localStorage.', 'aegis'), $options, 'database', true); ?>
										<?php $this->render_block_feature_toggle('toggle_animations', __('Animations', 'aegis'), __('Fade, slide, scale transitions.', 'aegis'), $options, 'image-rotate', true); ?>
										<?php $this->render_block_feature_toggle('toggle_faq', __('FAQ Schema', 'aegis'), __('Structured data markup for SEO.', 'aegis'), $options, 'editor-help', true); ?>
										<?php $this->render_block_feature_toggle('toggle_nested', __('Nested Toggles', 'aegis'), __('Toggles within toggles for complex content.', 'aegis'), $options, 'networking', true); ?>
										<?php $this->render_block_feature_toggle('toggle_conditional', __('Conditional Visibility', 'aegis'), __('Show/hide other elements based on state.', 'aegis'), $options, 'hidden', true); ?>
									</div>
								</div>
							</section>

							<?php /* @todo Uncomment for v1.0.0 release.
							<!-- Utilities Section -->
							<section id="global-styles" class="aegis-settings-section">
								<?php $this->render_section_header(__('Utilities', 'aegis'), __('Utility CSS classes for consistent styling across blocks.', 'aegis'), true, 'screenoptions'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('global_styles_spacing', __('Spacing Classes', 'aegis'), __('Padding, margin, and gap utilities.', 'aegis'), $options, 'editor-expand'); ?>
										<?php $this->render_block_feature_toggle('global_styles_typography', __('Typography Classes', 'aegis'), __('Font size, weight, and text utilities.', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('global_styles_layout', __('Layout Classes', 'aegis'), __('Flexbox, grid, and display utilities.', 'aegis'), $options, 'layout'); ?>
										<?php $this->render_block_feature_toggle('global_styles_effects', __('Effects Classes', 'aegis'), __('Shadows, borders, and opacity utilities.', 'aegis'), $options, 'admin-appearance'); ?>
										<?php $this->render_block_feature_toggle('global_styles_create', __('Create Custom Classes', 'aegis'), __('Create reusable CSS classes with visual editor.', 'aegis'), $options, 'plus-alt', true); ?>
										<?php $this->render_block_feature_toggle('global_styles_library', __('Class Library', 'aegis'), __('Manage and organize custom global classes.', 'aegis'), $options, 'portfolio', true); ?>
										<?php $this->render_block_feature_toggle('global_styles_transfer', __('Transfer Local to Global', 'aegis'), __('Convert block styles to reusable classes.', 'aegis'), $options, 'migrate', true); ?>
										<?php $this->render_block_feature_toggle('global_styles_export', __('Import/Export', 'aegis'), __('Export and import class libraries.', 'aegis'), $options, 'download', true); ?>
									</div>
								</div>
							</section>
							*/ ?>

							<!-- Video Section -->
							<section class="aegis-settings-section" id="video-block">
								<?php $this->render_section_header(__('Video Block', 'aegis'), __('Enhanced video player with modern controls and features.', 'aegis'), true, 'video-alt3'); ?>
								<div class="aegis-settings-section__content">
									<div class="aegis-settings-grid aegis-settings-grid--features">
										<?php $this->render_block_feature_toggle('video_custom_player', __('Custom Player', 'aegis'), __('Modern player with custom controls.', 'aegis'), $options, 'controls-play'); ?>
										<?php $this->render_block_feature_toggle('video_theater_mode', __('Theater Mode', 'aegis'), __('Expand video to viewport width.', 'aegis'), $options, 'fullscreen-alt'); ?>
										<?php $this->render_block_feature_toggle('video_keyboard_shortcuts', __('Keyboard Shortcuts', 'aegis'), __('Space, arrows, M, F keyboard controls.', 'aegis'), $options, 'editor-textcolor'); ?>
										<?php $this->render_block_feature_toggle('video_schema_markup', __('Schema Markup', 'aegis'), __('VideoObject SEO schema for search engines.', 'aegis'), $options, 'admin-site-alt3'); ?>
										<?php $this->render_block_feature_toggle('video_ambient_light', __('Ambient Light', 'aegis'), __('Glow effect behind video based on colors.', 'aegis'), $options, 'lightbulb'); ?>
										<?php $this->render_block_feature_toggle('video_thumbnail_preview', __('Thumbnail Preview', 'aegis'), __('Show preview when hovering progress bar.', 'aegis'), $options, 'format-image'); ?>
										<?php $this->render_block_feature_toggle('video_touch_gestures', __('Touch Gestures', 'aegis'), __('Double-tap seek, swipe volume controls.', 'aegis'), $options, 'smartphone'); ?>
										<?php $this->render_block_feature_toggle('video_playlists', __('Playlists', 'aegis'), __('Multi-video playlists with autoplay.', 'aegis'), $options, 'playlist-video'); ?>
										<?php 
										// Video Sitemap - check if Rank Math is handling it
										$integrations = get_option(self::INTEGRATIONS_OPTION, self::INTEGRATION_DEFAULTS);
										$rank_math_handles_sitemap = !empty($integrations['rank_math']) && !empty($integrations['rank_math_video_sitemap']);
										$sitemap_desc = $rank_math_handles_sitemap 
											? __('Video sitemap is handled by Rank Math. Disable in Integrations to use built-in sitemap.', 'aegis')
											: __('Generate video sitemap for search engines.', 'aegis');
										$this->render_block_feature_toggle('video_sitemap', __('Video Sitemap', 'aegis'), $sitemap_desc, $options, 'networking', false, $rank_math_handles_sitemap); 
										?>
										<?php $this->render_block_feature_toggle('video_sticky_player', __('Sticky Player', 'aegis'), __('Floating video when scrolling past.', 'aegis'), $options, 'sticky', true); ?>
										<?php $this->render_block_feature_toggle('video_focus_mode', __('Focus Mode', 'aegis'), __('Dim background when video plays.', 'aegis'), $options, 'visibility', true); ?>
										<?php $this->render_block_feature_toggle('video_save_progress', __('Save Progress', 'aegis'), __('Remember playback position.', 'aegis'), $options, 'backup', true); ?>
										<?php $this->render_block_feature_toggle('video_chapters', __('Chapters', 'aegis'), __('Video chapters with navigation.', 'aegis'), $options, 'editor-ol', true); ?>
										<?php $this->render_block_feature_toggle('video_email_capture', __('Email Capture', 'aegis'), __('Collect emails during playback.', 'aegis'), $options, 'email', true); ?>
										<?php $this->render_block_feature_toggle('video_analytics', __('Analytics', 'aegis'), __('Track video engagement metrics.', 'aegis'), $options, 'chart-bar', true); ?>
										<?php $this->render_block_feature_toggle('video_multi_audio', __('Multi-Audio', 'aegis'), __('Multiple audio track support.', 'aegis'), $options, 'format-audio', true); ?>
										<?php $this->render_block_feature_toggle('video_privacy', __('Privacy Controls', 'aegis'), __('Private videos, watermarks, expiring URLs.', 'aegis'), $options, 'lock', true); ?>
									</div>
									<div class="aegis-settings-notice" style="margin-top: 16px; padding: 12px; background: #f0f0f1; border-left: 4px solid #2271b1; border-radius: 4px;">
										<p style="margin: 0;">
											<strong><?php esc_html_e('BunnyCDN Integration', 'aegis'); ?></strong><br>
											<?php 
											printf(
												/* translators: %s: link to Integrations page */
												esc_html__('Configure BunnyCDN features for cloud video hosting in %s.', 'aegis'),
												'<a href="' . esc_url(admin_url('admin.php?page=aegis-integrations#performance')) . '">' . esc_html__('Integrations → Performance', 'aegis') . '</a>'
											);
											?>
										</p>
									</div>
								</div>
							</section>

							<div class="aegis-settings-footer">
								<?php submit_button(__('Save Settings', 'aegis'), 'primary', 'submit', false); ?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
	}

	/**
	 * Render a block toggle control.
	 *
	 * @param string $key     Setting key.
	 * @param string $label   Toggle label.
	 * @param string $desc    Toggle description.
	 * @param array  $options Current options.
	 * @return void
	 */
	private function render_block_toggle(string $key, string $label, string $desc, array $options, string $icon = 'block-default'): void
	{
		$name = self::BLOCKS_OPTION . "[{$key}]";
		$checked = $options[$key] ?? self::BLOCKS_DEFAULTS[$key];
		?>
		<div class="aegis-toggle-card">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr($icon); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3><?php echo esc_html($label); ?></h3>
					<p><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr($name); ?>" value="1" <?php checked($checked); ?>>
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php
	}

	/**
	 * Render a block toggle control with features support.
	 *
	 * @param string $key     Setting key.
	 * @param string $label   Toggle label.
	 * @param string $desc    Toggle description.
	 * @param array  $options Current options.
	 * @param string $icon    Dashicon name.
	 * @return void
	 */
	private function render_block_toggle_with_features(string $key, string $label, string $desc, array $options, string $icon = 'block-default'): void
	{
		$name = self::BLOCKS_OPTION . "[{$key}]";
		$checked = $options[$key] ?? self::BLOCKS_DEFAULTS[$key];
		?>
		<div class="aegis-toggle-card aegis-toggle-main">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr($icon); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3><?php echo esc_html($label); ?></h3>
					<p><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr($name); ?>" value="1" <?php checked($checked); ?> class="aegis-block-main-toggle">
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php
	}

	/**
	 * Render a block feature toggle control (sub-option).
	 *
	 * @param string $key            Setting key.
	 * @param string $label          Toggle label.
	 * @param string $desc           Toggle description.
	 * @param array  $options        Current options.
	 * @param string $icon           Dashicon name.
	 * @param bool   $is_pro         Whether this is a Pro feature.
	 * @param bool   $force_disabled Force the toggle to be disabled (e.g., when handled by another plugin).
	 * @return void
	 */
	private function render_block_feature_toggle(string $key, string $label, string $desc, array $options, string $icon = 'admin-generic', bool $is_pro = false, bool $force_disabled = false): void
	{
		$name = self::BLOCKS_OPTION . "[{$key}]";
		$checked = $options[$key] ?? self::BLOCKS_DEFAULTS[$key] ?? false;
		$has_pro = $this->is_aegis_pro_active();
		$is_disabled = ($is_pro && !$has_pro) || $force_disabled;
		
		$classes = 'aegis-toggle-card aegis-toggle-subcard';
		if ($is_pro) {
			$classes .= ' aegis-pro-feature';
		}
		if ($is_disabled) {
			$classes .= ' aegis-toggle-disabled';
		}
		?>
		<div class="<?php echo esc_attr($classes); ?>">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr($icon); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3>
						<?php echo esc_html($label); ?>
						<?php if ($is_pro): ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php echo $has_pro ? esc_html__('Pro', 'aegis') : esc_html__('Upgrade to Unlock', 'aegis'); ?>
							</span>
						<?php endif; ?>
					</h3>
					<p><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr($name); ?>" value="1" <?php checked($checked); ?> <?php disabled($is_disabled); ?>>
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php
	}

	/**
	 * Check if Aegis Pro plugin is active.
	 *
	 * @return bool
	 */
	private function is_aegis_pro_active(): bool
	{
		return defined('AEGIS_PRO_VERSION') || class_exists('Aegis_Pro') || class_exists('AegisPro\\Plugin');
	}

	/**
	 * Render an integration toggle control.
	 *
	 * @param string $key     Setting key.
	 * @param string $label   Toggle label.
	 * @param string $desc    Toggle description.
	 * @param array  $options Current options.
	 * @param string $plugin_check Plugin check identifier.
	 * @return void
	 */
	private function render_integration_toggle(string $key, string $label, string $desc, array $options, string $plugin_check = '', string $icon = 'admin-plugins'): void
	{
		$name = self::INTEGRATIONS_OPTION . "[{$key}]";
		$checked = $options[$key] ?? self::INTEGRATION_DEFAULTS[$key];
		$plugin_status = $this->get_plugin_status($plugin_check);
		$is_installed = $plugin_status['class'] === 'active';
		$is_enabled = $is_installed && $checked;
		$patterns_key = $key . '_patterns';
		$patterns_checked = $options[$patterns_key] ?? true;
		?>
		<div class="aegis-toggle-card <?php echo !$is_installed ? 'aegis-toggle-disabled' : ''; ?>">
			<div class="aegis-toggle-info">
				<div class="aegis-toggle-icon">
					<span class="dashicons dashicons-<?php echo esc_attr($icon); ?>"></span>
				</div>
				<div class="aegis-toggle-text">
					<h3>
						<?php echo esc_html($label); ?>
						<?php if ($plugin_check): ?>
							<span class="aegis-plugin-status <?php echo esc_attr($plugin_status['class']); ?>">
								<?php echo esc_html($plugin_status['label']); ?>
							</span>
						<?php endif; ?>
					</h3>
					<p><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr($name); ?>" value="1" <?php checked($checked); ?> <?php disabled(!$is_installed); ?>>
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php if ($is_enabled): ?>
		<div class="aegis-toggle-suboptions">
			<div class="aegis-toggle-card aegis-toggle-subcard">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-layout"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3><?php esc_html_e('Default Patterns', 'aegis'); ?></h3>
						<p><?php printf(esc_html__('Enable default %s patterns provided by the theme.', 'aegis'), esc_html($label)); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(self::INTEGRATIONS_OPTION . "[{$patterns_key}]"); ?>" value="1" <?php checked($patterns_checked); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>
		</div>
		<?php endif; ?>
		<?php 
		// Video Sitemap option for Rank Math - always show when plugin is installed
		if ($key === 'rank_math' && $is_installed): 
			$video_sitemap_key = 'rank_math_video_sitemap';
			$video_sitemap_checked = $options[$video_sitemap_key] ?? false;
		?>
		<div class="aegis-toggle-suboptions">
			<div class="aegis-toggle-card aegis-toggle-subcard">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-video-alt3"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3><?php esc_html_e('Video Sitemap', 'aegis'); ?></h3>
						<p><?php esc_html_e('Let Rank Math handle Video Sitemap instead of the Core Video Block. When enabled, the Video Block\'s built-in sitemap is disabled.', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(self::INTEGRATIONS_OPTION . "[{$video_sitemap_key}]"); ?>" value="1" <?php checked($video_sitemap_checked); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>
		</div>
		<?php endif; ?>
		<?php 
		// BunnyCDN options - always show for Video Block integration
		if ($key === 'bunny_cdn'): 
			$has_pro = $this->is_aegis_pro_active();
		?>
		<div class="aegis-toggle-suboptions">
			<?php 
			// Stream Library
			$stream_key = 'bunny_cdn_stream_library';
			$stream_checked = $options[$stream_key] ?? false;
			?>
			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-video-alt3"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e('Stream Library', 'aegis'); ?>
							<?php if (!$has_pro): ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e('Pro', 'aegis'); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e('Access and manage your BunnyCDN Stream video library directly from WordPress.', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(self::INTEGRATIONS_OPTION . "[{$stream_key}]"); ?>" value="1" <?php checked($stream_checked); ?> <?php disabled(!$has_pro); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<?php 
			// Direct Upload
			$upload_key = 'bunny_cdn_direct_upload';
			$upload_checked = $options[$upload_key] ?? false;
			?>
			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-upload"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e('Direct Upload', 'aegis'); ?>
							<?php if (!$has_pro): ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e('Pro', 'aegis'); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e('Upload videos directly to BunnyCDN Stream from the block editor.', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(self::INTEGRATIONS_OPTION . "[{$upload_key}]"); ?>" value="1" <?php checked($upload_checked); ?> <?php disabled(!$has_pro); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<?php 
			// HLS Streaming
			$hls_key = 'bunny_cdn_hls_streaming';
			$hls_checked = $options[$hls_key] ?? false;
			?>
			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-controls-play"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e('HLS Streaming', 'aegis'); ?>
							<?php if (!$has_pro): ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e('Pro', 'aegis'); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e('Enable adaptive bitrate HLS streaming for optimal playback quality.', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(self::INTEGRATIONS_OPTION . "[{$hls_key}]"); ?>" value="1" <?php checked($hls_checked); ?> <?php disabled(!$has_pro); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<?php 
			// AI Transcription
			$transcription_key = 'bunny_cdn_ai_transcription';
			$transcription_checked = $options[$transcription_key] ?? false;
			?>
			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-text"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e('AI Transcription', 'aegis'); ?>
							<?php if (!$has_pro): ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e('Pro', 'aegis'); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e('Automatic video transcription and captions powered by AI.', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(self::INTEGRATIONS_OPTION . "[{$transcription_key}]"); ?>" value="1" <?php checked($transcription_checked); ?> <?php disabled(!$has_pro); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<?php 
			// Video Thumbnails
			$thumbnails_key = 'bunny_cdn_video_thumbnails';
			$thumbnails_checked = $options[$thumbnails_key] ?? false;
			?>
			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-format-image"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e('Video Thumbnails', 'aegis'); ?>
							<?php if (!$has_pro): ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e('Pro', 'aegis'); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e('Auto-generate video thumbnails and preview sprites from BunnyCDN.', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(self::INTEGRATIONS_OPTION . "[{$thumbnails_key}]"); ?>" value="1" <?php checked($thumbnails_checked); ?> <?php disabled(!$has_pro); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<?php 
			// Video Watermark
			$watermark_key = 'bunny_cdn_video_watermark';
			$watermark_checked = $options[$watermark_key] ?? false;
			?>
			<div class="aegis-toggle-card aegis-toggle-subcard <?php echo !$has_pro ? 'aegis-pro-feature aegis-toggle-disabled' : ''; ?>">
				<div class="aegis-toggle-info">
					<div class="aegis-toggle-icon">
						<span class="dashicons dashicons-shield"></span>
					</div>
					<div class="aegis-toggle-text">
						<h3>
							<?php esc_html_e('Video Watermark', 'aegis'); ?>
							<?php if (!$has_pro): ?>
							<span class="aegis-pro-badge">
								<span class="dashicons dashicons-star-filled"></span>
								<?php esc_html_e('Pro', 'aegis'); ?>
							</span>
							<?php endif; ?>
						</h3>
						<p><?php esc_html_e('Add watermarks to videos for branding and copyright protection.', 'aegis'); ?></p>
					</div>
				</div>
				<label class="aegis-toggle">
					<input type="checkbox" name="<?php echo esc_attr(self::INTEGRATIONS_OPTION . "[{$watermark_key}]"); ?>" value="1" <?php checked($watermark_checked); ?> <?php disabled(!$has_pro); ?>>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>

			<?php 
			// BunnyCDN API Configuration Form
			$bunnycdn_settings = get_option(self::BUNNYCDN_OPTION, self::BUNNYCDN_DEFAULTS);
			$bunnycdn_settings = wp_parse_args($bunnycdn_settings, self::BUNNYCDN_DEFAULTS);
			?>
			<div class="aegis-api-config <?php echo !$has_pro ? 'aegis-api-config-disabled' : ''; ?>">
				<div class="aegis-api-config-header">
					<div class="aegis-api-config-title">
						<span class="dashicons dashicons-admin-network"></span>
						<span><?php esc_html_e('API Configuration', 'aegis'); ?></span>
					</div>
					<?php if (!$has_pro): ?>
					<span class="aegis-pro-badge">
						<span class="dashicons dashicons-lock"></span>
						<?php esc_html_e('Pro', 'aegis'); ?>
					</span>
					<?php endif; ?>
				</div>

				<!-- Account API Key -->
				<div class="aegis-api-field-row">
					<div class="aegis-api-field-info">
						<div class="aegis-api-field-icon">
							<span class="dashicons dashicons-admin-network"></span>
						</div>
						<div class="aegis-api-field-text">
							<label><?php esc_html_e('Account API Key', 'aegis'); ?></label>
							<p><?php esc_html_e('Found in your BunnyCDN dashboard under Account → API.', 'aegis'); ?></p>
						</div>
					</div>
					<div class="aegis-api-field-input">
						<input type="password" 
							name="<?php echo esc_attr(self::BUNNYCDN_OPTION . '[api_key]'); ?>" 
							value="<?php echo esc_attr($bunnycdn_settings['api_key']); ?>" 
							class="aegis-bunnycdn-field"
							placeholder="<?php esc_attr_e('Enter API Key', 'aegis'); ?>"
							<?php disabled(!$has_pro); ?>>
					</div>
				</div>

				<!-- CDN Section Header -->
				<div class="aegis-api-section-header">
					<span class="dashicons dashicons-performance"></span>
					<?php esc_html_e('CDN Settings', 'aegis'); ?>
				</div>

				<!-- Pull Zone -->
				<div class="aegis-api-field-row">
					<div class="aegis-api-field-info">
						<div class="aegis-api-field-icon">
							<span class="dashicons dashicons-networking"></span>
						</div>
						<div class="aegis-api-field-text">
							<label><?php esc_html_e('Pull Zone Name', 'aegis'); ?></label>
							<p><?php esc_html_e('The name of your CDN pull zone.', 'aegis'); ?></p>
						</div>
					</div>
					<div class="aegis-api-field-input">
						<input type="text" 
							name="<?php echo esc_attr(self::BUNNYCDN_OPTION . '[cdn_pullzone]'); ?>" 
							value="<?php echo esc_attr($bunnycdn_settings['cdn_pullzone']); ?>" 
							class="aegis-bunnycdn-field"
							placeholder="<?php esc_attr_e('my-pullzone', 'aegis'); ?>"
							<?php disabled(!$has_pro); ?>>
					</div>
				</div>

				<!-- CDN Hostname -->
				<div class="aegis-api-field-row">
					<div class="aegis-api-field-info">
						<div class="aegis-api-field-icon">
							<span class="dashicons dashicons-admin-site-alt3"></span>
						</div>
						<div class="aegis-api-field-text">
							<label><?php esc_html_e('CDN Hostname', 'aegis'); ?></label>
							<p><?php esc_html_e('Your CDN hostname or custom domain.', 'aegis'); ?></p>
						</div>
					</div>
					<div class="aegis-api-field-input">
						<input type="text" 
							name="<?php echo esc_attr(self::BUNNYCDN_OPTION . '[cdn_hostname]'); ?>" 
							value="<?php echo esc_attr($bunnycdn_settings['cdn_hostname']); ?>" 
							class="aegis-bunnycdn-field"
							placeholder="<?php esc_attr_e('cdn.example.com', 'aegis'); ?>"
							<?php disabled(!$has_pro); ?>>
					</div>
				</div>

				<!-- Storage Section Header -->
				<div class="aegis-api-section-header">
					<span class="dashicons dashicons-cloud"></span>
					<?php esc_html_e('Storage Settings', 'aegis'); ?>
				</div>

				<!-- Storage Zone -->
				<div class="aegis-api-field-row">
					<div class="aegis-api-field-info">
						<div class="aegis-api-field-icon">
							<span class="dashicons dashicons-portfolio"></span>
						</div>
						<div class="aegis-api-field-text">
							<label><?php esc_html_e('Storage Zone Name', 'aegis'); ?></label>
							<p><?php esc_html_e('The name of your storage zone.', 'aegis'); ?></p>
						</div>
					</div>
					<div class="aegis-api-field-input">
						<input type="text" 
							name="<?php echo esc_attr(self::BUNNYCDN_OPTION . '[storage_zone]'); ?>" 
							value="<?php echo esc_attr($bunnycdn_settings['storage_zone']); ?>" 
							class="aegis-bunnycdn-field"
							placeholder="<?php esc_attr_e('my-storage-zone', 'aegis'); ?>"
							<?php disabled(!$has_pro); ?>>
					</div>
				</div>

				<!-- Storage API Key -->
				<div class="aegis-api-field-row">
					<div class="aegis-api-field-info">
						<div class="aegis-api-field-icon">
							<span class="dashicons dashicons-lock"></span>
						</div>
						<div class="aegis-api-field-text">
							<label><?php esc_html_e('Storage API Key', 'aegis'); ?></label>
							<p><?php esc_html_e('Storage zone password/API key.', 'aegis'); ?></p>
						</div>
					</div>
					<div class="aegis-api-field-input">
						<input type="password" 
							name="<?php echo esc_attr(self::BUNNYCDN_OPTION . '[storage_api_key]'); ?>" 
							value="<?php echo esc_attr($bunnycdn_settings['storage_api_key']); ?>" 
							class="aegis-bunnycdn-field"
							placeholder="<?php esc_attr_e('Enter Storage API Key', 'aegis'); ?>"
							<?php disabled(!$has_pro); ?>>
					</div>
				</div>

				<!-- Storage Region -->
				<div class="aegis-api-field-row">
					<div class="aegis-api-field-info">
						<div class="aegis-api-field-icon">
							<span class="dashicons dashicons-location-alt"></span>
						</div>
						<div class="aegis-api-field-text">
							<label><?php esc_html_e('Storage Region', 'aegis'); ?></label>
							<p><?php esc_html_e('Select your storage zone region.', 'aegis'); ?></p>
						</div>
					</div>
					<div class="aegis-api-field-input">
						<select name="<?php echo esc_attr(self::BUNNYCDN_OPTION . '[storage_region]'); ?>" 
							class="aegis-bunnycdn-field"
							<?php disabled(!$has_pro); ?>>
							<option value="de" <?php selected($bunnycdn_settings['storage_region'], 'de'); ?>><?php esc_html_e('Falkenstein (DE)', 'aegis'); ?></option>
							<option value="ny" <?php selected($bunnycdn_settings['storage_region'], 'ny'); ?>><?php esc_html_e('New York (US)', 'aegis'); ?></option>
							<option value="la" <?php selected($bunnycdn_settings['storage_region'], 'la'); ?>><?php esc_html_e('Los Angeles (US)', 'aegis'); ?></option>
							<option value="sg" <?php selected($bunnycdn_settings['storage_region'], 'sg'); ?>><?php esc_html_e('Singapore (SG)', 'aegis'); ?></option>
							<option value="syd" <?php selected($bunnycdn_settings['storage_region'], 'syd'); ?>><?php esc_html_e('Sydney (AU)', 'aegis'); ?></option>
							<option value="uk" <?php selected($bunnycdn_settings['storage_region'], 'uk'); ?>><?php esc_html_e('London (UK)', 'aegis'); ?></option>
							<option value="se" <?php selected($bunnycdn_settings['storage_region'], 'se'); ?>><?php esc_html_e('Stockholm (SE)', 'aegis'); ?></option>
							<option value="br" <?php selected($bunnycdn_settings['storage_region'], 'br'); ?>><?php esc_html_e('São Paulo (BR)', 'aegis'); ?></option>
							<option value="jh" <?php selected($bunnycdn_settings['storage_region'], 'jh'); ?>><?php esc_html_e('Johannesburg (ZA)', 'aegis'); ?></option>
						</select>
					</div>
				</div>

				<!-- Stream Section Header -->
				<div class="aegis-api-section-header">
					<span class="dashicons dashicons-video-alt3"></span>
					<?php esc_html_e('Stream Settings', 'aegis'); ?>
				</div>

				<!-- Stream Library ID -->
				<div class="aegis-api-field-row">
					<div class="aegis-api-field-info">
						<div class="aegis-api-field-icon">
							<span class="dashicons dashicons-id"></span>
						</div>
						<div class="aegis-api-field-text">
							<label><?php esc_html_e('Stream Library ID', 'aegis'); ?></label>
							<p><?php esc_html_e('Found in Stream → Library → API.', 'aegis'); ?></p>
						</div>
					</div>
					<div class="aegis-api-field-input">
						<input type="text" 
							name="<?php echo esc_attr(self::BUNNYCDN_OPTION . '[stream_library_id]'); ?>" 
							value="<?php echo esc_attr($bunnycdn_settings['stream_library_id']); ?>" 
							class="aegis-bunnycdn-field"
							placeholder="<?php esc_attr_e('12345', 'aegis'); ?>"
							<?php disabled(!$has_pro); ?>>
					</div>
				</div>

				<!-- Stream API Key -->
				<div class="aegis-api-field-row">
					<div class="aegis-api-field-info">
						<div class="aegis-api-field-icon">
							<span class="dashicons dashicons-admin-network"></span>
						</div>
						<div class="aegis-api-field-text">
							<label><?php esc_html_e('Stream API Key', 'aegis'); ?></label>
							<p><?php esc_html_e('Stream library API key for authentication.', 'aegis'); ?></p>
						</div>
					</div>
					<div class="aegis-api-field-input">
						<input type="password" 
							name="<?php echo esc_attr(self::BUNNYCDN_OPTION . '[stream_api_key]'); ?>" 
							value="<?php echo esc_attr($bunnycdn_settings['stream_api_key']); ?>" 
							class="aegis-bunnycdn-field"
							placeholder="<?php esc_attr_e('Enter Stream API Key', 'aegis'); ?>"
							<?php disabled(!$has_pro); ?>>
					</div>
				</div>

				<!-- Actions -->
				<div class="aegis-api-config-footer">
					<?php if ($has_pro): ?>
					<button type="button" class="button button-primary aegis-save-bunnycdn">
						<span class="dashicons dashicons-saved"></span>
						<?php esc_html_e('Save API Settings', 'aegis'); ?>
					</button>
					<button type="button" class="button aegis-test-bunnycdn">
						<span class="dashicons dashicons-yes-alt"></span>
						<?php esc_html_e('Test Connection', 'aegis'); ?>
					</button>
					<?php else: ?>
					<div class="aegis-api-pro-notice">
						<span class="dashicons dashicons-lock"></span>
						<?php esc_html_e('BunnyCDN API configuration requires Aegis Pro.', 'aegis'); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif;
	}

	/**
	 * Get plugin status.
	 *
	 * @param string $plugin_check Plugin check identifier.
	 * @return array Status with class and label.
	 */
	private function get_plugin_status(string $plugin_check): array
	{
		if (empty($plugin_check)) {
			return ['class' => '', 'label' => ''];
		}

		// Map of plugin checks
		$plugin_checks = [
			'woocommerce' => 'class_exists("WooCommerce")',
			'acf' => 'class_exists("ACF")',
			'rank_math' => 'class_exists("RankMath")',
			'learndash' => 'defined("LEARNDASH_VERSION")',
			'lifter_lms' => 'class_exists("LifterLMS")',
			'sensei_lms' => 'class_exists("Sensei_Main")',
			'fluent_forms' => 'defined("FLUENTFORM")',
			'fluent_booking' => 'defined("JETRULES_VERSION") || class_exists("FluentBooking\\App\\App")',
			'code_block_pro' => 'function_exists("code_block_pro_init")',
			'syntax_highlighting' => 'class_exists("Developer_Starter_Starter")',
			'bunny_cdn' => 'defined("JETRULES_VERSION")',
		];

		// Check if plugin is active
		$is_active = false;
		switch ($plugin_check) {
			case 'woocommerce':
				$is_active = class_exists('WooCommerce');
				break;
			case 'acf':
				$is_active = class_exists('ACF');
				break;
			case 'rank_math':
				$is_active = class_exists('RankMath');
				break;
			case 'learndash':
				$is_active = defined('LEARNDASH_VERSION');
				break;
			case 'lifter_lms':
				$is_active = class_exists('LifterLMS');
				break;
			case 'sensei_lms':
				$is_active = class_exists('Sensei_Main');
				break;
			case 'fluent_forms':
				$is_active = defined('FLUENTFORM');
				break;
			case 'fluent_booking':
				$is_active = class_exists('FluentBooking\\App\\App');
				break;
			case 'code_block_pro':
				$is_active = defined('CODE_BLOCK_PRO_VERSION');
				break;
			case 'syntax_highlighting':
				$is_active = class_exists('Developer_Starter_Starter') || function_exists('Developer_Starter_Starter');
				break;
			case 'bunny_cdn':
				$is_active = defined('JETRULES_VERSION');
				break;
		}

		if ($is_active) {
			return [
				'class' => 'active',
				'label' => __('Active', 'aegis'),
			];
		}

		return [
			'class' => 'not-installed',
			'label' => __('Not Installed', 'aegis'),
		];
	}

	/**
	 * Render a toggle control.
	 *
	 * @param string $group   Settings group.
	 * @param string $key     Setting key.
	 * @param string $label   Toggle label.
	 * @param string $desc    Toggle description.
	 * @param array  $options Current options.
	 * @return void
	 */
	private function render_toggle(string $group, string $key, string $label, string $desc, array $options): void
	{
		$name = self::OPTION_NAME . "[{$group}][{$key}]";
		$checked = $options[$group][$key] ?? self::DEFAULTS[$group][$key];
		?>
		<div class="aegis-toggle-card">
			<div class="aegis-toggle-info">
				<h3><?php echo esc_html($label); ?></h3>
				<p><?php echo esc_html($desc); ?></p>
			</div>
			<label class="aegis-toggle">
				<input type="checkbox" name="<?php echo esc_attr($name); ?>" value="1" <?php checked($checked); ?>>
				<span class="aegis-toggle-slider"></span>
			</label>
		</div>
		<?php
	}

	/**
	 * Render the toolbar with search and export/import.
	 *
	 * @return void
	 */
	private function render_toolbar(): void
	{
		?>
		<div class="aegis-toolbar">
			<div class="aegis-toolbar-left">
				<input type="text" class="aegis-search-input" placeholder="<?php esc_attr_e('Search settings...', 'aegis'); ?>">
			</div>
			<div class="aegis-toolbar-right">
				<button type="button" class="button aegis-export-btn">
					<?php esc_html_e('Export', 'aegis'); ?>
				</button>
				<button type="button" class="button aegis-import-btn">
					<?php esc_html_e('Import', 'aegis'); ?>
				</button>
				<input type="file" id="aegis-import-file" accept=".json" style="display:none;">
			</div>
		</div>
		<?php
	}

	/**
	 * Render section header with bulk actions.
	 *
	 * @param string $title       Section title.
	 * @param string $description Section description.
	 * @param bool   $show_bulk_actions Whether to show bulk action buttons.
	 * @param string $icon        Optional dashicon name for the title.
	 * @return void
	 */
	private function render_section_header(string $title, string $description, bool $show_bulk_actions = true, string $icon = ''): void
	{
		$pro_installed = $this->is_aegis_pro_active() ? 'true' : 'false';
		?>
		<div class="aegis-section-header">
			<div class="aegis-section-title">
				<h2>
					<?php if ($icon) : ?>
					<span class="dashicons dashicons-<?php echo esc_attr($icon); ?>"></span>
					<?php endif; ?>
					<?php echo esc_html($title); ?>
				</h2>
				<p class="description"><?php echo esc_html($description); ?></p>
			</div>
			<?php if ($show_bulk_actions) : ?>
			<div class="aegis-bulk-actions">
				<button type="button" class="button button-small aegis-bulk-enable" data-pro-installed="<?php echo esc_attr($pro_installed); ?>"><?php esc_html_e('Enable All', 'aegis'); ?></button>
				<button type="button" class="button button-small aegis-bulk-disable" data-pro-installed="<?php echo esc_attr($pro_installed); ?>"><?php esc_html_e('Disable All', 'aegis'); ?></button>
			</div>
			<?php endif; ?>
		</div>
		<?php
	}

	/**
	 * Get settings for use in JavaScript.
	 *
	 * @return array
	 */
	public static function get_settings(): array
	{
		static $cached = null;

		if ($cached !== null) {
			return $cached;
		}

		$options = get_option(self::OPTION_NAME, []);

		// Deep merge with defaults for nested arrays
		$merged = [];
		foreach (self::DEFAULTS as $group => $defaults) {
			$merged[$group] = [];
			foreach ($defaults as $key => $default) {
				$merged[$group][$key] = isset($options[$group][$key]) ? (bool) $options[$group][$key] : $default;
			}
		}

		$cached = $merged;

		return $cached;
	}

	/**
	 * Get integration settings.
	 *
	 * @return array
	 */
	public static function get_integration_settings(): array
	{
		static $cached = null;

		if ($cached !== null) {
			return $cached;
		}

		$options = get_option(self::INTEGRATIONS_OPTION, []);

		$merged = [];
		foreach (self::INTEGRATION_DEFAULTS as $key => $default) {
			$merged[$key] = isset($options[$key]) ? (bool) $options[$key] : $default;
		}

		$cached = $merged;

		return $cached;
	}

	/**
	 * Check if a specific integration is enabled.
	 *
	 * @param string $integration Integration key.
	 * @return bool
	 */
	public static function is_integration_enabled(string $integration): bool
	{
		$settings = self::get_integration_settings();
		return $settings[$integration] ?? true;
	}

	/**
	 * Get block settings.
	 *
	 * @return array
	 */
	public static function get_block_settings(): array
	{
		static $cached = null;

		if ($cached !== null) {
			return $cached;
		}

		$options = get_option(self::BLOCKS_OPTION, []);

		$merged = [];
		foreach (self::BLOCKS_DEFAULTS as $key => $default) {
			$merged[$key] = isset($options[$key]) ? (bool) $options[$key] : $default;
		}

		$cached = $merged;

		return $cached;
	}

	/**
	 * Check if a specific block is enabled.
	 *
	 * @param string $block Block key.
	 * @return bool
	 */
	public static function is_block_enabled(string $block): bool
	{
		$settings = self::get_block_settings();
		return $settings[$block] ?? true;
	}
}
