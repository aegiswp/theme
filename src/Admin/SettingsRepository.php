<?php
/**
 * Settings Repository — backward-compatible facade.
 *
 * Canonical implementation: \Aegis\Plugin\Settings\Repository
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Admin;

/**
 * Delegates to the Aegis plugin settings repository when available.
 */
class SettingsRepository {

	public const OPTION_NAME         = 'aegis_conditional_logic';
	public const INTEGRATIONS_OPTION = 'aegis_integrations';
	public const BLOCKS_OPTION       = 'aegis_blocks';
	public const BUNNYCDN_OPTION     = 'aegis_bunnycdn';
	public const GOOGLE_MAPS_OPTION  = 'aegis_google_maps';
	public const SETTINGS_OPTION     = 'aegis_settings';
	public const ANALYTICS_OPTION    = 'aegis_analytics';

	public const GOOGLE_MAPS_DEFAULTS = array( 'api_key' => '' );

	public const SETTINGS_DEFAULTS = array(
		'svg_upload'           => true,
		'svg_strip_colors'     => false,
		'svg_strip_dimensions' => false,
		'svg_strip_styles'     => false,
	);

	/**
	 * Retrieve the conditional logic settings.
	 *
	 * @return array
	 */
	public static function get_settings(): array {
		if ( class_exists( \Aegis\Plugin\Settings\Repository::class ) ) {
			return \Aegis\Plugin\Settings\Repository::get_settings();
		}

		return array();
	}

	/**
	 * Retrieve the integration settings.
	 *
	 * @return array
	 */
	public static function get_integration_settings(): array {
		if ( class_exists( \Aegis\Plugin\Settings\Repository::class ) ) {
			return \Aegis\Plugin\Settings\Repository::get_integration_settings();
		}

		return array();
	}

	/**
	 * Whether an integration is enabled.
	 *
	 * @param string $integration Integration key.
	 * @return bool
	 */
	public static function is_integration_enabled( string $integration ): bool {
		if ( class_exists( \Aegis\Plugin\Settings\Repository::class ) ) {
			return \Aegis\Plugin\Settings\Repository::is_integration_enabled( $integration );
		}

		return true;
	}

	/**
	 * Whether a schema type is handled by Rank Math.
	 *
	 * @param string $schema_key Schema setting key.
	 * @return bool
	 */
	public static function is_schema_handled_by_rank_math( string $schema_key ): bool {
		if ( class_exists( \Aegis\Plugin\Settings\Repository::class ) ) {
			return \Aegis\Plugin\Settings\Repository::is_schema_handled_by_rank_math( $schema_key );
		}

		return false;
	}

	/**
	 * Retrieve the block settings.
	 *
	 * @return array
	 */
	public static function get_block_settings(): array {
		if ( class_exists( \Aegis\Plugin\Settings\Repository::class ) ) {
			return \Aegis\Plugin\Settings\Repository::get_block_settings();
		}

		return array();
	}

	/**
	 * Whether a block is enabled.
	 *
	 * @param string $block Block key.
	 * @return bool
	 */
	public static function is_block_enabled( string $block ): bool {
		if ( class_exists( \Aegis\Plugin\Settings\Repository::class ) ) {
			return \Aegis\Plugin\Settings\Repository::is_block_enabled( $block );
		}

		return true;
	}

	/**
	 * Retrieve the general settings merged with defaults.
	 *
	 * @return array
	 */
	public static function get_general_settings(): array {
		if ( class_exists( \Aegis\Plugin\Settings\Repository::class ) ) {
			return \Aegis\Plugin\Settings\Repository::get_general_settings();
		}

		$options = get_option( self::SETTINGS_OPTION, array() );
		$merged  = array();

		foreach ( self::SETTINGS_DEFAULTS as $key => $default ) {
			$merged[ $key ] = isset( $options[ $key ] ) ? (bool) $options[ $key ] : $default;
		}

		return $merged;
	}

	/**
	 * Whether SVG uploads are enabled.
	 *
	 * @return bool
	 */
	public static function is_svg_upload_enabled(): bool {
		if ( class_exists( \Aegis\Plugin\Settings\Repository::class ) ) {
			return \Aegis\Plugin\Settings\Repository::is_svg_upload_enabled();
		}

		$settings = self::get_general_settings();

		return $settings['svg_upload'] ?? true;
	}

	/**
	 * Flush the plugin settings cache.
	 *
	 * @return void
	 */
	public static function flush_cache(): void {
		if ( class_exists( \Aegis\Plugin\Settings\Repository::class ) ) {
			\Aegis\Plugin\Settings\Repository::flush_cache();
		}
	}
}
