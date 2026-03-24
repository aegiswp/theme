<?php
/**
 * Settings Repository
 *
 * Single source of truth for all Aegis admin settings: option names,
 * default values, and cached static getters.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

namespace Aegis\Admin;

/**
 * Settings Repository class.
 */
class SettingsRepository
{
	/**
	 * Cached settings values.
	 *
	 * @var array<string, mixed>
	 */
	private static ?array $settings_cache = null;
	private static ?array $integrations_cache = null;
	private static ?array $blocks_cache = null;
	private static ?array $general_cache = null;
	/**
	 * Option name for storing settings.
	 */
	public const OPTION_NAME = 'aegis_conditional_logic';

	/**
	 * Option name for integrations settings.
	 */
	public const INTEGRATIONS_OPTION = 'aegis_integrations';

	/**
	 * Option name for custom blocks settings.
	 */
	public const BLOCKS_OPTION = 'aegis_blocks';

	/**
	 * Option name for BunnyCDN API settings.
	 */
	public const BUNNYCDN_OPTION = 'aegis_bunnycdn';

	/**
	 * Option name for Google Maps API settings.
	 */
	public const GOOGLE_MAPS_OPTION = 'aegis_google_maps';

	/**
	 * Option name for general settings.
	 */
	public const SETTINGS_OPTION = 'aegis_settings';

	/**
	 * Option name for analytics settings.
	 */
	public const ANALYTICS_OPTION = 'aegis_analytics';

	/**
	 * Analytics defaults.
	 */
	public const ANALYTICS_DEFAULTS = [
		// FREE — Google Analytics (GA4).
		'ga4_enabled'          => false,
		'ga4_measurement_id'   => '',
		'ga4_anonymize_ip'     => false,
		// FREE — Google Tag Manager.
		'gtm_enabled'          => false,
		'gtm_container_id'     => '',
		// FREE — Microsoft Clarity.
		'clarity_enabled'      => false,
		'clarity_project_id'   => '',
		// FREE — Plausible Analytics.
		'plausible_enabled'    => false,
		'plausible_domain'     => '',
		'plausible_script_url' => '',
		// FREE — Fathom Analytics.
		'fathom_enabled'       => false,
		'fathom_site_id'       => '',
		// FREE — GDPR & Privacy.
		'gdpr_consent_required' => false,
		'gdpr_respect_dnt'      => false,
		'gdpr_complianz'        => false,
		'local_scripts'         => false,
		// FREE — Matomo.
		'matomo_enabled'       => false,
		'matomo_url'           => '',
		'matomo_site_id'       => '',
		'matomo_anonymize_ip'  => false,
		// PRO — Meta Pixel.
		'meta_pixel_enabled'   => false,
		'meta_pixel_id'        => '',
		'meta_pixel_woo_events' => false,
		// PRO — GA4 Enhancements.
		'ga4_consent_mode'     => false,
		'gtm_data_layer'       => false,
		'gdpr_debug_mode'      => false,
	];

	/**
	 * Default settings.
	 */
	public const DEFAULTS = [
		'visibility' => [
			'screen_size' => false,
			'custom_breakpoints' => false,
			'browser_device' => false,
			'lockdown' => false,
			'query_string' => false,
			'specific_users' => false,
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
		'pro_conditions' => [
			'cookie' => false,
			'referral' => false,
			'acf_field' => false,
			'metabox_field' => false,
			'post_meta' => false,
			'user_meta' => false,
			'advanced_location' => false,
		],
		'woocommerce' => [
			'woo_cart' => false,
			'woo_customer' => false,
			'woo_product' => false,
		],
		'learndash' => [
			'ld_enrollment' => false,
			'ld_completion' => false,
			'ld_progress' => false,
			'ld_quiz' => false,
			'ld_group' => false,
		],
		'lifterlms' => [
			'llms_enrollment' => false,
			'llms_completion' => false,
			'llms_progress' => false,
			'llms_membership' => false,
		],
		'sensei' => [
			'sensei_enrollment' => false,
			'sensei_completion' => false,
			'sensei_progress' => false,
			'sensei_quiz' => false,
		],
		'fluentforms' => [
			'ff_submitted' => false,
			'ff_count' => false,
			'ff_field' => false,
		],
		'fluentbooking' => [
			'fb_has_booking' => false,
			'fb_upcoming' => false,
			'fb_past' => false,
			'fb_status' => false,
		],
		'image_source' => [
			'image_source_order' => false,
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
		'co_authors_plus' => false,
		'cap_social_links' => false,
		'cap_role_badges' => false,
		'code_block_pro' => false,
		'fluent_booking' => false,
		'fluent_forms' => false,
		'learndash' => false,
		'lifter_lms' => false,
		'meta_box' => false,
		'fluent_crm' => false,
		'rank_math' => true,
		'rank_math_video_sitemap' => false,
		'rank_math_faq_schema' => false,
		'rank_math_event_schema' => false,
		'rank_math_local_schema' => false,
		'rank_math_video_schema' => false,
		'sensei_lms' => false,
		'syntax_highlighting' => false,
		'woocommerce' => true,
	];

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
	 * Google Maps API settings defaults.
	 */
	public const GOOGLE_MAPS_DEFAULTS = [
		'api_key' => '',
	];

	/**
	 * General settings defaults.
	 */
	public const SETTINGS_DEFAULTS = [
		'svg_upload'           => true,
		'svg_strip_colors'     => false,
		'svg_strip_dimensions' => false,
		'svg_strip_styles'     => false,
	];

	/**
	 * Custom blocks defaults - parent blocks enabled, sub-features disabled by default.
	 */
	public const BLOCKS_DEFAULTS = [
		'modal' => true,
		'modal_click' => true,
		'modal_icon' => true,
		'modal_text' => true,
		'modal_image' => true,
		'modal_exit_intent' => false,
		'modal_scroll_depth' => false,
		'modal_time_delay' => false,
		'modal_offcanvas' => true,
		'modal_fullscreen' => true,
		'modal_animations' => true,
		'modal_auto_close' => false,
		'modal_show_once' => false,
		'modal_device_visibility' => false,
		'slider' => true,
		'slider_slide' => true,
		'slider_fade' => true,
		'slider_navigation' => true,
		'slider_pagination' => true,
		'slider_loop' => true,
		'slider_keyboard' => true,
		'slider_responsive' => true,
		'slider_autoplay' => false,
		'slider_effects' => false,
		'slider_thumbnails' => false,
		'slider_lightbox' => false,
		'slider_mousewheel' => false,
		'slider_aspect_ratio' => false,
		'slider_lazy_load' => false,
		'slider_arrow_styles' => false,
		'slider_dot_styles' => false,
		'toggle' => true,
		'toggle_pill' => true,
		'toggle_switch' => true,
		'toggle_buttons' => true,
		'toggle_position' => true,
		'toggle_labels' => true,
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
		'query_loop' => true,
		'query_loop_post_types' => true,
		'query_loop_taxonomy' => true,
		'query_loop_include_exclude' => true,
		'query_loop_meta_query' => true,
		'query_loop_order_meta' => true,
		'query_loop_responsive_columns' => true,
		'query_loop_gap_controls' => true,
		'query_loop_featured_first' => true,
		'query_loop_equal_height' => true,
		'query_loop_no_results' => true,
		'query_loop_extended_order' => true,
		'query_loop_advanced_meta' => false,
		'query_loop_date_query' => false,
		'query_loop_parent_child' => false,
		'query_loop_acf_integration' => false,
		'query_loop_ajax_pagination' => false,
		'query_loop_frontend_filters' => false,
		'query_loop_masonry_layout' => false,
		'query_loop_carousel_layout' => false,
		'query_loop_woocommerce' => false,
		'query_loop_performance' => false,
		'related_posts' => true,
		'related_posts_taxonomy_source' => true,
		'related_posts_fallback' => true,
		'related_posts_style_variants' => true,
		'related_posts_excerpt_length' => true,
		'related_posts_image_ratio' => true,
		'video_custom_player' => true,
		'video_theater_mode' => true,
		'video_keyboard_shortcuts' => true,
		'video_schema_markup' => true,
		'video_ambient_light' => true,
		'video_thumbnail_preview' => true,
		'video_touch_gestures' => true,
		'video_playlists' => true,
		'video_sticky_player' => false,
		'video_focus_mode' => false,
		'video_save_progress' => false,
		'video_chapters' => false,
		'video_email_capture' => false,
		'video_analytics' => false,
		'video_multi_audio' => false,
		'video_privacy' => false,
		'video_sitemap' => true,
		'accordion' => true,
		'accordion_open_first' => true,
		'accordion_open_all' => true,
		'accordion_icon' => true,
		'accordion_border' => true,
		'accordion_faq_schema' => true,
		'accordion_single_open' => false,
		'counter' => true,
		'counter_prefix' => true,
		'counter_suffix' => true,
		'counter_delay' => true,
		'counter_duration' => true,
		'counter_intersection' => false,
		'countdown' => true,
		'countdown_segments' => true,
		'countdown_labels' => true,
		'countdown_separator' => true,
		'countdown_layout' => true,
		'countdown_expiry_message' => true,
		'countdown_timezone' => true,
		'countdown_schema' => true,
		'countdown_evergreen' => false,
		'countdown_animation' => false,
		'countdown_auto_restart' => false,
		'countdown_expiry_actions' => false,
		'countdown_urgency' => false,
		'icon' => true,
		'icon_gradient' => true,
		'icon_animation' => true,
		'icon_custom_svg' => true,
		'icon_gallery' => true,
		'icon_responsive' => true,
		'icon_rest_api' => false,
		'image_lightbox' => true,
		'image_lightbox_gallery_nav' => true,
		'image_lightbox_captions' => true,
		'image_lightbox_zoom' => true,
		'image_lightbox_thumbnails' => true,
		'image_lightbox_swipe' => true,
		'marquee' => true,
		'marquee_pause_hover' => true,
		'marquee_direction' => true,
		'marquee_speed' => true,
		'marquee_repeat' => true,
		'marquee_responsive_speed' => false,
		'newsletter' => true,
		'newsletter_email_validation' => true,
		'newsletter_success_message' => true,
		'newsletter_placeholder' => true,
		'svg' => true,
		'svg_mask' => true,
		'svg_onclick' => true,
		'svg_inline' => true,
		'svg_inline_file' => true,
		'map' => true,
		'map_markers' => true,
		'map_styles' => true,
		'map_controls' => true,
		'map_osm_fallback' => true,
		'map_directions' => false,
		'map_store_locator' => false,
		'map_geolocation' => false,
		'map_heatmap' => false,
		'map_drawing' => false,
		'map_kml_geojson' => false,
		'map_schema' => true,
		'map_dynamic_markers' => false,
		'map_custom_styles' => false,
		'map_custom_icons' => false,
		'map_clustering' => false,
	];

	/**
	 * Parent block keys that always use their default value.
	 *
	 * These keys have no UI toggle and act as master switches for block
	 * variation rendering. They must always be true so the render methods
	 * are not bypassed.
	 */
	public const PARENT_BLOCK_KEYS = [
		'modal',
		'slider',
		'toggle',
		'query_loop',
		'accordion',
		'counter',
		'icon',
		'marquee',
		'newsletter',
		'svg',
		'map',
	];

	/**
	 * Get settings for use in JavaScript.
	 *
	 * @return array
	 */
	public static function get_settings(): array
	{
		if (self::$settings_cache !== null) {
			return self::$settings_cache;
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

		self::$settings_cache = $merged;

		return self::$settings_cache;
	}

	/**
	 * Get integration settings.
	 *
	 * @return array
	 */
	public static function get_integration_settings(): array
	{
		if (self::$integrations_cache !== null) {
			return self::$integrations_cache;
		}

		$options = get_option(self::INTEGRATIONS_OPTION, []);

		$merged = [];
		foreach (self::INTEGRATION_DEFAULTS as $key => $default) {
			$merged[$key] = isset($options[$key]) ? (bool) $options[$key] : $default;
		}

		self::$integrations_cache = $merged;

		return self::$integrations_cache;
	}

	/**
	 * Check if a specific integration is enabled.
	 *
	 * @param string $integration Integration key.
	 * @return bool
	 */
	public static function is_integration_enabled(string $integration): bool
	{
		// Co-Authors Plus is handled by Aegis Companion when active.
		// Returning false prevents the framework from registering its hooks.
		if ( 'co_authors_plus' === $integration && defined( 'AegisCompanion\\VERSION' ) ) {
			return false;
		}

		$settings = self::get_integration_settings();
		return $settings[$integration] ?? true;
	}

	/**
	 * Check if a schema type is handled by Rank Math.
	 *
	 * @param string $schema_key Integration key for the schema handoff option.
	 * @return bool
	 */
	public static function is_schema_handled_by_rank_math(string $schema_key): bool
	{
		$integrations = self::get_integration_settings();
		return !empty($integrations['rank_math']) && !empty($integrations[$schema_key]) && class_exists('RankMath');
	}

	/**
	 * Get block settings.
	 *
	 * @return array
	 */
	public static function get_block_settings(): array
	{
		if (self::$blocks_cache !== null) {
			return self::$blocks_cache;
		}

		$options = get_option(self::BLOCKS_OPTION, []);

		$merged = [];
		foreach (self::BLOCKS_DEFAULTS as $key => $default) {
			if (in_array($key, self::PARENT_BLOCK_KEYS, true)) {
				$merged[$key] = $default;
			} else {
				$merged[$key] = isset($options[$key]) ? (bool) $options[$key] : $default;
			}
		}

		self::$blocks_cache = $merged;

		return self::$blocks_cache;
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

	/**
	 * Get general settings.
	 *
	 * @return array
	 */
	public static function get_general_settings(): array
	{
		if (self::$general_cache !== null) {
			return self::$general_cache;
		}

		$options = get_option(self::SETTINGS_OPTION, []);

		$merged = [];
		foreach (self::SETTINGS_DEFAULTS as $key => $default) {
			$merged[$key] = isset($options[$key]) ? (bool) $options[$key] : $default;
		}

		self::$general_cache = $merged;

		return self::$general_cache;
	}

	/**
	 * Check if SVG upload is enabled.
	 *
	 * @return bool
	 */
	public static function is_svg_upload_enabled(): bool
	{
		$settings = self::get_general_settings();
		return $settings['svg_upload'] ?? true;
	}

	/**
	 * Flush all static caches.
	 *
	 * Call after update_option() to ensure subsequent reads
	 * within the same request return fresh values.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function flush_cache(): void
	{
		self::$settings_cache     = null;
		self::$integrations_cache = null;
		self::$blocks_cache       = null;
		self::$general_cache      = null;
	}
}
