<?php
/**
 * Settings Controller
 *
 * Handles all AJAX save/export/import/reset/test operations and
 * sanitization callbacks for Aegis admin settings.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

namespace Aegis\Admin;

/**
 * Settings Controller class.
 */
class SettingsController
{
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
		$settings = isset($_POST['settings']) ? wp_unslash($_POST['settings']) : []; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$sanitized = $this->sanitize_settings($settings);

		// Save settings
		update_option(SettingsRepository::OPTION_NAME, $sanitized);
		SettingsRepository::flush_cache();

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
		$settings = isset($_POST['settings']) ? wp_unslash($_POST['settings']) : []; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$sanitized = $this->sanitize_integrations($settings);

		// Save settings
		update_option(SettingsRepository::INTEGRATIONS_OPTION, $sanitized);
		SettingsRepository::flush_cache();

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
		$settings = isset($_POST['settings']) ? wp_unslash($_POST['settings']) : []; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$sanitized = $this->sanitize_blocks($settings);

		// Save settings
		update_option(SettingsRepository::BLOCKS_OPTION, $sanitized);
		SettingsRepository::flush_cache();

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
		$settings = isset($_POST['settings']) ? wp_unslash($_POST['settings']) : []; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$sanitized = $this->sanitize_bunnycdn($settings);

		// Save settings
		update_option(SettingsRepository::BUNNYCDN_OPTION, $sanitized, '', false);
		SettingsRepository::flush_cache();

		wp_send_json_success(['message' => __('Settings saved.', 'aegis')]);
	}

	/**
	 * Handle AJAX save Google Maps settings.
	 *
	 * @return void
	 */
	public function ajax_save_google_maps(): void
	{
		if (!check_ajax_referer('aegis_settings_nonce', 'nonce', false)) {
			wp_send_json_error(['message' => __('Security check failed.', 'aegis')]);
		}

		if (!current_user_can('manage_options')) {
			wp_send_json_error(['message' => __('Permission denied.', 'aegis')]);
		}

		$settings = isset($_POST['settings']) ? wp_unslash($_POST['settings']) : []; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$sanitized = $this->sanitize_google_maps($settings);

		update_option(SettingsRepository::GOOGLE_MAPS_OPTION, $sanitized, '', false);
		SettingsRepository::flush_cache();

		wp_send_json_success(['message' => __('Settings saved.', 'aegis')]);
	}

	/**
	 * Handle AJAX test Google Maps API key.
	 *
	 * @return void
	 */
	public function ajax_test_google_maps(): void
	{
		if (!check_ajax_referer('aegis_settings_nonce', 'nonce', false)) {
			wp_send_json_error(['message' => __('Security check failed.', 'aegis')]);
		}

		if (!current_user_can('manage_options')) {
			wp_send_json_error(['message' => __('Permission denied.', 'aegis')]);
		}

		$google_maps = get_option(SettingsRepository::GOOGLE_MAPS_OPTION, SettingsRepository::GOOGLE_MAPS_DEFAULTS);
		$api_key = $google_maps['api_key'] ?? '';

		if (empty($api_key)) {
			wp_send_json_error(['message' => __('No API key configured.', 'aegis')]);
		}

		$response = wp_remote_get(
			add_query_arg(
				[
					'address' => 'Google HQ, Mountain View, CA',
					'key'     => $api_key,
				],
				'https://maps.googleapis.com/maps/api/geocode/json'
			),
			['timeout' => 10]
		);

		if (is_wp_error($response)) {
			wp_send_json_error(['message' => $response->get_error_message()]);
		}

		$body = json_decode(wp_remote_retrieve_body($response), true);

		if (isset($body['status']) && $body['status'] === 'OK') {
			wp_send_json_success(['message' => __('API key is valid. Connection successful.', 'aegis')]);
		}

		$error_message = $body['error_message'] ?? $body['status'] ?? __('Unknown error.', 'aegis');
		wp_send_json_error(['message' => $error_message]);
	}

	/**
	 * Handle AJAX save general settings.
	 *
	 * @return void
	 */
	public function ajax_save_general_settings(): void
	{
		if (!check_ajax_referer('aegis_settings_nonce', 'nonce', false)) {
			wp_send_json_error(['message' => __('Security check failed.', 'aegis')]);
		}

		if (!current_user_can('manage_options')) {
			wp_send_json_error(['message' => __('Permission denied.', 'aegis')]);
		}

		$settings = isset($_POST['settings']) ? wp_unslash($_POST['settings']) : []; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$sanitized = $this->sanitize_general_settings($settings);

		update_option(SettingsRepository::SETTINGS_OPTION, $sanitized);
		SettingsRepository::flush_cache();

		wp_send_json_success(['message' => __('Settings saved.', 'aegis')]);
	}

	/**
	 * Handle AJAX save analytics settings.
	 *
	 * @return void
	 */
	public function ajax_save_analytics(): void
	{
		if (!check_ajax_referer('aegis_settings_nonce', 'nonce', false)) {
			wp_send_json_error(['message' => __('Security check failed.', 'aegis')]);
		}

		if (!current_user_can('manage_options')) {
			wp_send_json_error(['message' => __('Permission denied.', 'aegis')]);
		}

		$settings = isset($_POST['settings']) ? wp_unslash($_POST['settings']) : []; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		$sanitized = $this->sanitize_analytics($settings);

		update_option(SettingsRepository::ANALYTICS_OPTION, $sanitized);
		SettingsRepository::flush_cache();

		// Schedule or unschedule local script cron.
		$proxy = new \Aegis\Analytics\ScriptProxy();
		if (!empty($sanitized['local_scripts'])) {
			$proxy->schedule();
			$proxy->refresh_scripts();
		} else {
			$proxy->unschedule();
		}

		wp_send_json_success(['message' => __('Analytics settings saved.', 'aegis')]);
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
			'conditional_logic' => SettingsRepository::get_settings(),
			'integrations' => SettingsRepository::get_integration_settings(),
			'blocks' => get_option(SettingsRepository::BLOCKS_OPTION, SettingsRepository::BLOCKS_DEFAULTS),
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
			update_option(SettingsRepository::OPTION_NAME, $sanitized);
		}

		// Import integrations settings
		if (isset($settings['integrations']) && is_array($settings['integrations'])) {
			$sanitized = $this->sanitize_integrations($settings['integrations']);
			update_option(SettingsRepository::INTEGRATIONS_OPTION, $sanitized);
		}

		// Import blocks settings
		if (isset($settings['blocks']) && is_array($settings['blocks'])) {
			$sanitized = $this->sanitize_blocks($settings['blocks']);
			update_option(SettingsRepository::BLOCKS_OPTION, $sanitized);
		}

		SettingsRepository::flush_cache();

		wp_send_json_success(['message' => __('Settings imported successfully.', 'aegis')]);
	}

	/**
	 * Handle AJAX reset settings to defaults.
	 *
	 * @return void
	 */
	public function ajax_reset_settings(): void
	{
		if (!check_ajax_referer('aegis_settings_nonce', 'nonce', false)) {
			wp_send_json_error(['message' => __('Security check failed.', 'aegis')]);
		}

		if (!current_user_can('manage_options')) {
			wp_send_json_error(['message' => __('Permission denied.', 'aegis')]);
		}

		$group = isset($_POST['group']) ? sanitize_text_field(wp_unslash($_POST['group'])) : '';

		switch ($group) {
			case 'conditionals':
				delete_option(SettingsRepository::OPTION_NAME);
				break;
			case 'integrations':
				delete_option(SettingsRepository::INTEGRATIONS_OPTION);
				break;
			case 'blocks':
				delete_option(SettingsRepository::BLOCKS_OPTION);
				break;
			default:
				wp_send_json_error(['message' => __('Invalid settings group.', 'aegis')]);
		}

		SettingsRepository::flush_cache();

		wp_send_json_success(['message' => __('Settings reset to defaults.', 'aegis')]);
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

		foreach (SettingsRepository::DEFAULTS as $group => $options) {
			$sanitized[$group] = [];
			foreach ($options as $key => $default) {
				$sanitized[$group][$key] = isset($input[$group][$key]) ? (bool) $input[$group][$key] : false;
			}
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

		foreach (SettingsRepository::INTEGRATION_DEFAULTS as $key => $default) {
			$sanitized[$key] = isset($input[$key]) ? (bool) $input[$key] : false;
		}

		return $sanitized;
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

		foreach (SettingsRepository::BLOCKS_DEFAULTS as $key => $default) {
			if (in_array($key, SettingsRepository::PARENT_BLOCK_KEYS, true)) {
				$sanitized[$key] = $default;
			} else {
				$sanitized[$key] = isset($input[$key]) ? (bool) $input[$key] : $default;
			}
		}

		return $sanitized;
	}

	/**
	 * Sanitize pattern control settings.
	 *
	 * @param array $input Input settings.
	 * @return array Sanitized settings.
	 */
	public function sanitize_pattern_control(array $input): array
	{
		$defaults = [
			'woocommerce_keep_patterns'   => false,
			'woocommerce_keep_templates'  => false,
			'learndash_keep_patterns'     => false,
			'lifterlms_keep_patterns'     => false,
			'sensei_keep_patterns'        => false,
			'fluentforms_keep_patterns'   => false,
			'fluentbooking_keep_patterns' => false,
		];

		$sanitized = [];

		foreach ($defaults as $key => $default) {
			$sanitized[$key] = isset($input[$key]) ? (bool) $input[$key] : false;
		}

		return $sanitized;
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

		foreach (SettingsRepository::BUNNYCDN_DEFAULTS as $key => $default) {
			if (isset($input[$key])) {
				$sanitized[$key] = sanitize_text_field($input[$key]);
			} else {
				$sanitized[$key] = $default;
			}
		}

		return $sanitized;
	}

	/**
	 * Sanitize Google Maps settings.
	 *
	 * @param array $input Input settings.
	 * @return array Sanitized settings.
	 */
	public function sanitize_google_maps(array $input): array
	{
		$sanitized = [];

		foreach (SettingsRepository::GOOGLE_MAPS_DEFAULTS as $key => $default) {
			if (isset($input[$key])) {
				$sanitized[$key] = sanitize_text_field($input[$key]);
			} else {
				$sanitized[$key] = $default;
			}
		}

		return $sanitized;
	}

	/**
	 * Sanitize general settings.
	 *
	 * @param array $input Input settings.
	 * @return array Sanitized settings.
	 */
	public function sanitize_general_settings(array $input): array
	{
		$sanitized = [];

		foreach (SettingsRepository::SETTINGS_DEFAULTS as $key => $default) {
			$sanitized[$key] = isset($input[$key]) ? (bool) $input[$key] : false;
		}

		return $sanitized;
	}

	/**
	 * Sanitize analytics settings.
	 *
	 * @param array $input Input settings.
	 * @return array Sanitized settings.
	 */
	public function sanitize_analytics(array $input): array
	{
		$defaults = SettingsRepository::ANALYTICS_DEFAULTS;
		$sanitized = [];

		// Boolean fields.
		$booleans = [
			'ga4_enabled', 'ga4_anonymize_ip',
			'gtm_enabled',
			'clarity_enabled',
			'plausible_enabled',
			'fathom_enabled',
			'gdpr_consent_required', 'gdpr_respect_dnt', 'gdpr_complianz',
			'local_scripts',
			'matomo_enabled', 'matomo_anonymize_ip',
			'meta_pixel_enabled', 'meta_pixel_woo_events',
			'ga4_consent_mode', 'gtm_data_layer', 'gdpr_debug_mode',
		];

		foreach ($booleans as $key) {
			$sanitized[$key] = !empty($input[$key]);
		}

		// Text fields.
		$text_fields = [
			'ga4_measurement_id', 'gtm_container_id',
			'clarity_project_id',
			'plausible_domain', 'plausible_script_url',
			'fathom_site_id',
			'matomo_url', 'matomo_site_id',
			'meta_pixel_id',
		];

		foreach ($text_fields as $key) {
			$sanitized[$key] = isset($input[$key]) ? sanitize_text_field($input[$key]) : ($defaults[$key] ?? '');
		}

		// Validate URL fields.
		if (!empty($sanitized['matomo_url']) && !filter_var($sanitized['matomo_url'], FILTER_VALIDATE_URL)) {
			$sanitized['matomo_url'] = '';
		}

		if (!empty($sanitized['plausible_script_url']) && !filter_var($sanitized['plausible_script_url'], FILTER_VALIDATE_URL)) {
			$sanitized['plausible_script_url'] = '';
		}

		return $sanitized;
	}
}
