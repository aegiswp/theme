<?php
/**
 * Conditional Logic Settings — backward-compatible facade.
 *
 * Bootstraps the theme admin shell (AdminMenu). Settings data and AJAX live in
 * the Aegis plugin: \Aegis\Plugin\Settings\Repository and related classes.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

namespace Aegis\Admin;

/**
 * Facade for framework and block render files that reference Aegis\Admin\*.
 */
class ConditionalLogicSettings {

	/**
	 * Singleton instance.
	 *
	 * @var self|null
	 */
	private static ?self $instance = null;

	/**
	 * Retrieve the singleton instance.
	 *
	 * @return self
	 */
	public static function get_instance(): self {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public const OPTION_NAME         = SettingsRepository::OPTION_NAME;
	public const INTEGRATIONS_OPTION = SettingsRepository::INTEGRATIONS_OPTION;
	public const BLOCKS_OPTION       = SettingsRepository::BLOCKS_OPTION;
	public const BUNNYCDN_OPTION     = SettingsRepository::BUNNYCDN_OPTION;
	public const GOOGLE_MAPS_OPTION  = SettingsRepository::GOOGLE_MAPS_OPTION;
	public const SETTINGS_OPTION     = SettingsRepository::SETTINGS_OPTION;

	public const DEFAULTS             = \Aegis\Plugin\Conditionals\Settings::DEFAULTS;
	public const INTEGRATION_DEFAULTS = \Aegis\Plugin\Integrations\Settings::INTEGRATION_DEFAULTS;
	public const BLOCKS_DEFAULTS      = \Aegis\Plugin\Blocks\Settings::DEFAULTS;
	public const BUNNYCDN_DEFAULTS    = \Aegis\Plugin\Integrations\Settings::BUNNYCDN_DEFAULTS;
	public const GOOGLE_MAPS_DEFAULTS = \Aegis\Plugin\Map\Settings::DEFAULTS;
	public const SETTINGS_DEFAULTS    = \Aegis\Plugin\General\Settings::DEFAULTS;

	/**
	 * Lazily created admin menu.
	 *
	 * @var AdminMenu|null
	 */
	private ?AdminMenu $menu = null;

	/**
	 * Retrieve the admin menu, creating it on first use.
	 *
	 * @return AdminMenu
	 */
	private function menu(): AdminMenu {
		if ( $this->menu === null ) {
			$this->menu = new AdminMenu( new AdminRenderer() );
		}
		return $this->menu;
	}

	/**
	 * Initialize the admin menu hooks.
	 *
	 * @return void
	 */
	public function init(): void {
		$this->menu()->init();
	}

	/**
	 * Retrieve the conditional logic settings.
	 *
	 * @return array
	 */
	public static function get_settings(): array {
		return SettingsRepository::get_settings();
	}

	/**
	 * Retrieve the block settings.
	 *
	 * @return array
	 */
	public static function get_block_settings(): array {
		return SettingsRepository::get_block_settings();
	}

	/**
	 * Whether a block is enabled.
	 *
	 * @param string $block Block key.
	 * @return bool
	 */
	public static function is_block_enabled( string $block ): bool {
		return SettingsRepository::is_block_enabled( $block );
	}

	/**
	 * Retrieve the integration settings.
	 *
	 * @return array
	 */
	public static function get_integration_settings(): array {
		return SettingsRepository::get_integration_settings();
	}

	/**
	 * Whether an integration is enabled.
	 *
	 * @param string $integration Integration key.
	 * @return bool
	 */
	public static function is_integration_enabled( string $integration ): bool {
		return SettingsRepository::is_integration_enabled( $integration );
	}

	/**
	 * Whether a schema type is handled by Rank Math.
	 *
	 * @param string $schema_key Schema setting key.
	 * @return bool
	 */
	public static function is_schema_handled_by_rank_math( string $schema_key ): bool {
		return SettingsRepository::is_schema_handled_by_rank_math( $schema_key );
	}

	/**
	 * Retrieve the general settings.
	 *
	 * @return array
	 */
	public static function get_general_settings(): array {
		return SettingsRepository::get_general_settings();
	}

	/**
	 * Whether SVG uploads are enabled.
	 *
	 * @return bool
	 */
	public static function is_svg_upload_enabled(): bool {
		return SettingsRepository::is_svg_upload_enabled();
	}
}
