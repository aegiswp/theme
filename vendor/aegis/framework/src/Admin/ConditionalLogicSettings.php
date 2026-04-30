<?php
/**
 * Conditional Logic Settings Admin Page
 *
 * Provides an admin settings page for managing Conditional Logic features.
 *
 * Responsibilities:
 * - Registers the top-level Aegis admin menu and Conditional Logic submenu
 * - Enqueues admin-specific scripts and styles for the settings UI
 * - Renders the settings page with toggle controls for each feature group
 * - Handles form submission, sanitization, and persistence of settings
 * - Exposes static helpers for querying feature-enabled state site-wide
 *
 * @package    Aegis\Framework\Admin
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file.
declare(strict_types=1);

// Declares the namespace for admin components within the Aegis Framework.
namespace Aegis\Framework\Admin;

// Imports WordPress functions used throughout this file.
use function add_action;
use function add_menu_page;
use function add_submenu_page;
use function check_admin_referer;
use function current_user_can;
use function esc_html__;
use function get_option;
use function update_option;
use function wp_unslash;
use function file_exists;
use function get_template_directory;
use function get_template_directory_uri;
use function str_contains;
use function wp_enqueue_script;
use function wp_enqueue_style;
use function wp_create_nonce;
use function wp_localize_script;

/**
 * Conditional Logic Settings.
 *
 * Manages the WordPress admin interface for configuring which conditional
 * logic features are available in the block editor. Features are organized
 * into four groups: visibility, accessibility, user, and schedule.
 *
 * Settings are stored as a single serialized option keyed by
 * {@see OPTION_NAME}. Defaults are defined in {@see DEFAULTS} and
 * merged on retrieval to ensure forward-compatible key coverage.
 *
 * @since 1.0.0
 */
class ConditionalLogicSettings
{
	/**
	 * Option name for storing settings.
	 *
	 * A single serialized array stored in the wp_options table
	 * containing all feature-group toggle states.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public const OPTION_NAME = 'aegis_conditional_logic';

	/**
	 * Default settings.
	 *
	 * Nested array keyed by group → feature → enabled boolean.
	 * Used as the fallback when no saved option exists and to
	 * ensure new features are included after updates.
	 *
	 * @since 1.0.0
	 *
	 * @var array<string, array<string, bool>>
	 */
	public const DEFAULTS = [
		'visibility' => [
			'screen_size' => true,
			'custom_breakpoints' => true,
			'browser_device' => true,
		],
		'accessibility' => [
			'reduced_motion' => true,
			'screen_reader_only' => true,
			'color_scheme' => true,
			'high_contrast' => true,
			'forced_colors' => true,
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
	 * Register the Aegis admin menu and Conditional Logic submenu.
	 *
	 * Creates the top-level "Aegis" menu page and adds the
	 * "Conditional Logic" submenu underneath it.
	 *
	 * @since 1.0.0
	 *
	 * @hook  admin_menu
	 *
	 * @return void
	 */
	public function register_menu(): void
	{
		add_menu_page(
			esc_html__('Aegis', 'aegis'),
			esc_html__('Aegis', 'aegis'),
			'manage_options',
			'aegis-settings',
			[$this, 'render_page'],
			$this->get_menu_icon(),
			59
		);

		add_submenu_page(
			'aegis-settings',
			esc_html__('Conditional Logic', 'aegis'),
			esc_html__('Conditional Logic', 'aegis'),
			'manage_options',
			'aegis-conditional-logic',
			[$this, 'render_conditional_logic_page']
		);
	}

	/**
	 * Enqueue admin assets.
	 *
	 * Loads the settings page stylesheet and script only on Aegis
	 * admin screens. The asset manifest is read from the compiled
	 * build output to resolve dependencies and cache-busting version.
	 * Localizes the current settings and defaults for the JS UI.
	 *
	 * @since 1.0.0
	 *
	 * @hook  admin_enqueue_scripts
	 *
	 * @param string $hook_suffix Current admin page hook suffix.
	 *
	 * @return void
	 */
	public function enqueue_assets(string $hook_suffix): void
	{
		if (!str_contains($hook_suffix, 'aegis')) {
			return;
		}

		$framework_dir = get_template_directory() . '/vendor/aegis/framework/public';
		$framework_url = get_template_directory_uri() . '/vendor/aegis/framework/public';
		$asset_file = $framework_dir . '/js/admin-settings.asset.php';

		if (!file_exists($asset_file)) {
			return;
		}

		$asset = require $asset_file;

		wp_enqueue_style(
			'aegis-admin-settings',
			$framework_url . '/css/admin-settings.css',
			[],
			$asset['version'] ?? '1.0.0'
		);

		wp_enqueue_script(
			'aegis-admin-settings',
			$framework_url . '/js/admin-settings.js',
			$asset['dependencies'] ?? [],
			$asset['version'] ?? '1.0.0',
			true
		);

		wp_localize_script('aegis-admin-settings', 'aegisSettings', [
			'nonce' => wp_create_nonce('aegis_settings_nonce'),
			'settings' => self::get_settings(),
			'defaults' => self::DEFAULTS,
		]);
	}

	/**
	 * Get menu icon SVG.
	 *
	 * Returns a base64-encoded data URI of the Aegis layers icon
	 * used in the WordPress admin sidebar menu.
	 *
	 * @since 1.0.0
	 *
	 * @return string Base64-encoded SVG data URI.
	 */
	private function get_menu_icon(): string
	{
		return 'data:image/svg+xml;base64,' . base64_encode(
			'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>'
		);
	}

	/**
	 * Render main settings page.
	 *
	 * Outputs a root container for the React-powered Aegis
	 * settings dashboard. Requires `manage_options` capability.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function render_page(): void
	{
		if (!current_user_can('manage_options')) {
			return;
		}

		echo '<div id="aegis-settings-root" class="aegis-admin-wrap"></div>';
	}

	/**
	 * Render conditional logic settings page.
	 *
	 * Outputs the full admin UI including sidebar navigation,
	 * feature-group sections with toggle cards, and the save
	 * button. Processes any pending form submission first.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function render_conditional_logic_page(): void
	{
		if (!current_user_can('manage_options')) {
			return;
		}

		$this->handle_form_submission();

		$settings = self::get_settings();
		?>
		<div class="aegis-admin-wrap">
			<div class="aegis-admin-container">
				<aside class="aegis-admin-sidebar">
					<div class="aegis-admin-header">
						<div class="aegis-admin-logo">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="32" height="32">
								<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
							</svg>
						</div>
						<div class="aegis-admin-title">
							<h1><?php esc_html_e('Aegis', 'aegis'); ?></h1>
							<p><?php esc_html_e('Conditional Logic Settings', 'aegis'); ?></p>
						</div>
					</div>
					<nav class="aegis-admin-nav">
						<a href="#visibility" class="aegis-nav-item active">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
								<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
								<circle cx="12" cy="12" r="3"/>
							</svg>
							<?php esc_html_e('Visibility', 'aegis'); ?>
						</a>
						<a href="#accessibility" class="aegis-nav-item">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
								<circle cx="12" cy="12" r="10"/>
								<path d="M12 8v4l2 2"/>
							</svg>
							<?php esc_html_e('Accessibility', 'aegis'); ?>
						</a>
						<a href="#user" class="aegis-nav-item">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
								<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
								<circle cx="12" cy="7" r="4"/>
							</svg>
							<?php esc_html_e('User', 'aegis'); ?>
						</a>
						<a href="#schedule" class="aegis-nav-item">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
								<line x1="16" y1="2" x2="16" y2="6"/>
								<line x1="8" y1="2" x2="8" y2="6"/>
								<line x1="3" y1="10" x2="21" y2="10"/>
							</svg>
							<?php esc_html_e('Schedule', 'aegis'); ?>
						</a>
					</nav>
				</aside>
				<main class="aegis-admin-content">
					<form method="post" action="">
						<?php wp_nonce_field('aegis_conditional_logic_save', 'aegis_nonce'); ?>
						
						<section id="visibility" class="aegis-settings-section active">
							<div class="aegis-section-header">
								<h2><?php esc_html_e('Visibility Controls', 'aegis'); ?></h2>
								<p><?php esc_html_e('Control which visibility options are available in the block editor.', 'aegis'); ?></p>
							</div>
							<div class="aegis-settings-grid">
								<?php $this->render_toggle('visibility', 'screen_size', __('Screen Size', 'aegis'), __('Hide blocks on mobile, tablet, or desktop.', 'aegis'), $settings); ?>
								<?php $this->render_toggle('visibility', 'custom_breakpoints', __('Custom Breakpoints', 'aegis'), __('Define custom min/max width breakpoints.', 'aegis'), $settings); ?>
								<?php $this->render_toggle('visibility', 'browser_device', __('Browser & Device', 'aegis'), __('Target specific browsers and devices.', 'aegis'), $settings); ?>
							</div>
						</section>

						<section id="accessibility" class="aegis-settings-section">
							<div class="aegis-section-header">
								<h2><?php esc_html_e('Accessibility Controls', 'aegis'); ?></h2>
								<p><?php esc_html_e('Control which accessibility options are available in the block editor.', 'aegis'); ?></p>
							</div>
							<div class="aegis-settings-grid">
								<?php $this->render_toggle('accessibility', 'reduced_motion', __('Reduced Motion', 'aegis'), __('Hide content for users who prefer reduced motion.', 'aegis'), $settings); ?>
								<?php $this->render_toggle('accessibility', 'screen_reader_only', __('Screen Reader Only', 'aegis'), __('Make content visually hidden but accessible.', 'aegis'), $settings); ?>
								<?php $this->render_toggle('accessibility', 'color_scheme', __('Color Scheme', 'aegis'), __('Show content only in light or dark mode.', 'aegis'), $settings); ?>
								<?php $this->render_toggle('accessibility', 'high_contrast', __('High Contrast', 'aegis'), __('Hide content in high contrast mode.', 'aegis'), $settings); ?>
								<?php $this->render_toggle('accessibility', 'forced_colors', __('Forced Colors', 'aegis'), __('Hide content in Windows High Contrast mode.', 'aegis'), $settings); ?>
							</div>
						</section>

						<section id="user" class="aegis-settings-section">
							<div class="aegis-section-header">
								<h2><?php esc_html_e('User Controls', 'aegis'); ?></h2>
								<p><?php esc_html_e('Control content visibility based on user status and roles.', 'aegis'); ?></p>
							</div>
							<div class="aegis-settings-grid">
								<?php $this->render_toggle('user', 'user_status', __('User Status', 'aegis'), __('Show/hide content for logged in or logged out users.', 'aegis'), $settings); ?>
								<?php $this->render_toggle('user', 'user_role', __('User Role', 'aegis'), __('Show/hide content based on user roles.', 'aegis'), $settings); ?>
							</div>
						</section>

						<section id="schedule" class="aegis-settings-section">
							<div class="aegis-section-header">
								<h2><?php esc_html_e('Schedule Controls', 'aegis'); ?></h2>
								<p><?php esc_html_e('Control content visibility based on date and time.', 'aegis'); ?></p>
							</div>
							<div class="aegis-settings-grid">
								<?php $this->render_toggle('schedule', 'date_time', __('Date & Time', 'aegis'), __('Schedule content to show/hide at specific times.', 'aegis'), $settings); ?>
							</div>
						</section>

						<div class="aegis-settings-footer">
							<button type="submit" name="aegis_save_settings" class="aegis-button aegis-button-primary">
								<?php esc_html_e('Save Settings', 'aegis'); ?>
							</button>
						</div>
					</form>
				</main>
			</div>
		</div>
		<?php
	}

	/**
	 * Render a toggle setting card.
	 *
	 * Outputs a labeled toggle switch with a hidden input fallback
	 * to ensure unchecked values are submitted as '0'.
	 *
	 * @since 1.0.0
	 *
	 * @param string $group    Setting group (e.g. 'visibility').
	 * @param string $key      Setting key within the group (e.g. 'screen_size').
	 * @param string $label    Human-readable setting label.
	 * @param string $desc     Explanatory description shown below the label.
	 * @param array  $settings Current merged settings array.
	 *
	 * @return void
	 */
	private function render_toggle(string $group, string $key, string $label, string $desc, array $settings): void
	{
		$name = "aegis_settings[{$group}][{$key}]";
		$checked = $settings[$group][$key] ?? self::DEFAULTS[$group][$key] ?? false;
		$id = "aegis-{$group}-{$key}";
		?>
		<div class="aegis-setting-card">
			<div class="aegis-setting-info">
				<label for="<?php echo esc_attr($id); ?>" class="aegis-setting-label">
					<?php echo esc_html($label); ?>
				</label>
				<p class="aegis-setting-desc"><?php echo esc_html($desc); ?></p>
			</div>
			<div class="aegis-setting-control">
				<label class="aegis-toggle">
					<input type="hidden" name="<?php echo esc_attr($name); ?>" value="0">
					<input 
						type="checkbox" 
						id="<?php echo esc_attr($id); ?>"
						name="<?php echo esc_attr($name); ?>" 
						value="1" 
						<?php checked($checked, true); ?>
					>
					<span class="aegis-toggle-slider"></span>
				</label>
			</div>
		</div>
		<?php
	}

	/**
	 * Handle form submission.
	 *
	 * Processes the save request by verifying the nonce and
	 * capability, sanitizing the posted settings, persisting
	 * them to the database, and enqueuing a success notice.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function handle_form_submission(): void
	{
		if (!isset($_POST['aegis_save_settings'])) {
			return;
		}

		if (!check_admin_referer('aegis_conditional_logic_save', 'aegis_nonce')) {
			return;
		}

		if (!current_user_can('manage_options')) {
			return;
		}

		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$settings = isset( $_POST['aegis_settings'] ) ? wp_unslash( $_POST['aegis_settings'] ) : [];
		$sanitized = $this->sanitize_settings($settings);

		update_option(self::OPTION_NAME, $sanitized);

		add_action('admin_notices', function () {
			echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__('Settings saved successfully.', 'aegis') . '</p></div>';
		});
	}

	/**
	 * Sanitize settings array.
	 *
	 * Iterates over the known defaults and casts each submitted
	 * value to a boolean. Unknown keys are silently discarded.
	 *
	 * @since 1.0.0
	 *
	 * @param array $settings Raw $_POST settings data.
	 *
	 * @return array<string, array<string, bool>> Sanitized settings.
	 */
	private function sanitize_settings(array $settings): array
	{
		$sanitized = [];

		foreach (self::DEFAULTS as $group => $options) {
			$sanitized[$group] = [];
			foreach ($options as $key => $default) {
				$sanitized[$group][$key] = !empty($settings[$group][$key]);
			}
		}

		return $sanitized;
	}

	/**
	 * Get current settings.
	 *
	 * Retrieves the stored option and merges it with the
	 * defaults to ensure all expected keys are present.
	 * Returns the full defaults if no option exists yet.
	 *
	 * @since 1.0.0
	 *
	 * @return array<string, array<string, bool>> Merged settings.
	 */
	public static function get_settings(): array
	{
		$settings = get_option(self::OPTION_NAME, []);

		if (empty($settings)) {
			return self::DEFAULTS;
		}

		// Merge with defaults to ensure all keys exist
		$merged = [];
		foreach (self::DEFAULTS as $group => $options) {
			$merged[$group] = [];
			foreach ($options as $key => $default) {
				$merged[$group][$key] = $settings[$group][$key] ?? $default;
			}
		}

		return $merged;
	}

	/**
	 * Check if a specific feature is enabled.
	 *
	 * Convenience method used by block-editor integrations to
	 * conditionally register controls based on admin settings.
	 *
	 * @since 1.0.0
	 *
	 * @param string $group Feature group (e.g. 'accessibility').
	 * @param string $key   Feature key within the group (e.g. 'reduced_motion').
	 *
	 * @return bool True if the feature is enabled.
	 */
	public static function is_enabled(string $group, string $key): bool
	{
		$settings = self::get_settings();
		return $settings[$group][$key] ?? self::DEFAULTS[$group][$key] ?? false;
	}
}
