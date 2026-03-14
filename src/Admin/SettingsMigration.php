<?php
/**
 * Settings Migration
 *
 * One-time data migrations for Aegis admin settings.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

namespace Aegis\Admin;

/**
 * Settings Migration class.
 */
class SettingsMigration
{
	/**
	 * Run all pending migrations.
	 *
	 * @return void
	 */
	public function run(): void
	{
		if (!get_option('aegis_integrations_defaults_v2')) {
			$this->migrate_integrations_defaults_v2();
		}

		if (!get_option('aegis_blocks_defaults_v2')) {
			$this->migrate_blocks_defaults_v2();
		}
	}

	/**
	 * Migrate integration defaults to v2.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function migrate_integrations_defaults_v2(): void
	{
		$saved = get_option(SettingsRepository::INTEGRATIONS_OPTION);
		if (is_array($saved)) {
			$updated = false;
			foreach (SettingsRepository::INTEGRATION_DEFAULTS as $key => $default) {
				if ($default === true && !array_key_exists($key, $saved)) {
					$saved[$key] = true;
					$updated = true;
				}
			}
			if ($updated) {
				update_option(SettingsRepository::INTEGRATIONS_OPTION, $saved);
			}
		}
		update_option('aegis_integrations_defaults_v2', true);
	}

	/**
	 * Migrate block defaults to v2.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function migrate_blocks_defaults_v2(): void
	{
		$saved = get_option(SettingsRepository::BLOCKS_OPTION);
		if (is_array($saved)) {
			$updated = false;
			foreach (SettingsRepository::BLOCKS_DEFAULTS as $key => $default) {
				if ($default === true && !array_key_exists($key, $saved)) {
					$saved[$key] = true;
					$updated = true;
				}
			}
			if ($updated) {
				update_option(SettingsRepository::BLOCKS_OPTION, $saved);
			}
		}
		update_option('aegis_blocks_defaults_v2', true);
	}
}
