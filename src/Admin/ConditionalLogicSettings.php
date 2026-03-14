<?php
/**
 * Conditional Logic Settings — Backward-compatible Facade
 *
 * This class is intentionally kept as a thin delegation layer so that the
 * dozens of external references (framework, blocks, render files) continue
 * to resolve without modification.  All real logic now lives in:
 *
 *   - SettingsRepository  (constants, defaults, static getters)
 *   - SettingsController  (AJAX handlers, sanitization)
 *   - AdminRenderer       (render methods, UI helpers)
 *   - AdminMenu           (hook registration, menu, assets)
 *   - SettingsMigration   (one-time data migrations)
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

namespace Aegis\Admin;

/**
 * Conditional Logic Settings class (facade).
 */
class ConditionalLogicSettings
{
	/* ------------------------------------------------------------------
	 * Singleton
	 * ----------------------------------------------------------------*/

	private static ?self $instance = null;

	public static function get_instance(): self
	{
		if (self::$instance === null) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/* ------------------------------------------------------------------
	 * Constants — aliased from SettingsRepository for BC
	 * ----------------------------------------------------------------*/

	public const OPTION_NAME          = SettingsRepository::OPTION_NAME;
	public const INTEGRATIONS_OPTION  = SettingsRepository::INTEGRATIONS_OPTION;
	public const BLOCKS_OPTION        = SettingsRepository::BLOCKS_OPTION;
	public const BUNNYCDN_OPTION      = SettingsRepository::BUNNYCDN_OPTION;
	public const GOOGLE_MAPS_OPTION   = SettingsRepository::GOOGLE_MAPS_OPTION;
	public const SETTINGS_OPTION      = SettingsRepository::SETTINGS_OPTION;

	public const DEFAULTS             = SettingsRepository::DEFAULTS;
	public const INTEGRATION_DEFAULTS = SettingsRepository::INTEGRATION_DEFAULTS;
	public const BLOCKS_DEFAULTS      = SettingsRepository::BLOCKS_DEFAULTS;
	public const BUNNYCDN_DEFAULTS    = SettingsRepository::BUNNYCDN_DEFAULTS;
	public const GOOGLE_MAPS_DEFAULTS = SettingsRepository::GOOGLE_MAPS_DEFAULTS;
	public const SETTINGS_DEFAULTS    = SettingsRepository::SETTINGS_DEFAULTS;

	/* ------------------------------------------------------------------
	 * Collaborators (lazy-loaded)
	 * ----------------------------------------------------------------*/

	private ?AdminMenu $menu = null;

	private function menu(): AdminMenu
	{
		if ($this->menu === null) {
			$this->menu = new AdminMenu(
				new AdminRenderer(),
				new SettingsController()
			);
		}
		return $this->menu;
	}

	/* ------------------------------------------------------------------
	 * Lifecycle
	 * ----------------------------------------------------------------*/

	/**
	 * Initialize the settings page (delegates to AdminMenu).
	 */
	public function init(): void
	{
		$this->menu()->init();
	}

	/* ------------------------------------------------------------------
	 * Static getters — delegates to SettingsRepository
	 * ----------------------------------------------------------------*/

	public static function get_settings(): array
	{
		return SettingsRepository::get_settings();
	}

	public static function get_block_settings(): array
	{
		return SettingsRepository::get_block_settings();
	}

	public static function is_block_enabled(string $block): bool
	{
		return SettingsRepository::is_block_enabled($block);
	}

	public static function get_integration_settings(): array
	{
		return SettingsRepository::get_integration_settings();
	}

	public static function is_integration_enabled(string $integration): bool
	{
		return SettingsRepository::is_integration_enabled($integration);
	}

	public static function is_schema_handled_by_rank_math(string $schema_key): bool
	{
		return SettingsRepository::is_schema_handled_by_rank_math($schema_key);
	}

	public static function get_general_settings(): array
	{
		return SettingsRepository::get_general_settings();
	}

	public static function is_svg_upload_enabled(): bool
	{
		return SettingsRepository::is_svg_upload_enabled();
	}
}
