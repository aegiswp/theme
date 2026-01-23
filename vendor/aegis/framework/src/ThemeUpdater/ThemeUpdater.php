<?php
/**
 * Theme Updater
 *
 * Provides GitHub-based theme update functionality for the Aegis Framework.
 *
 * Responsibilities:
 * - Checks for theme updates from GitHub releases
 * - Integrates with WordPress update system
 * - Displays changelog in update modal
 *
 * @package    Aegis\Framework\ThemeUpdater
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file.
declare(strict_types=1);

// Declares the namespace for the theme updater within the Aegis Framework.
namespace Aegis\Framework\ThemeUpdater;

// Imports classes and functions used throughout this file.
use Aegis\Container\Interfaces\Conditional;
use stdClass;
use function apply_filters;
use function get_option;
use function get_stylesheet;
use function time;
use function update_option;
use function version_compare;
use function wp_get_theme;

/**
 * Theme Updater Service.
 *
 * Integrates with WordPress's theme update system to check for updates
 * from GitHub releases. Provides automatic update checking, changelog
 * display in the update modal, and auto-update support.
 *
 * Configuration is provided via the 'aegis_theme_updater_config' filter:
 * ```php
 * add_filter('aegis_theme_updater_config', function() {
 *     return [
 *         'repo'         => 'owner/repo',  // Required: GitHub repository.
 *         'slug'         => 'theme-slug',  // Optional: Theme directory name.
 *         'access_token' => '',            // Optional: GitHub access token.
 *     ];
 * });
 * ```
 *
 * @since 1.0.0
 */
class ThemeUpdater implements Conditional
{
	/**
	 * Transient key for storing update data.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private const TRANSIENT_KEY = 'aegis_theme_update';

	/**
	 * Option key for storing update state.
	 *
	 * Stores last check timestamp and cached release data.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private const OPTION_KEY = 'aegis_theme_update_state';

	/**
	 * Check interval in seconds.
	 *
	 * Default: 43200 seconds (12 hours). Prevents excessive
	 * API requests while ensuring timely update detection.
	 *
	 * @since 1.0.0
	 *
	 * @var int
	 */
	private const CHECK_INTERVAL = 43200;

	/**
	 * Configuration array.
	 *
	 * Contains 'repo', 'slug', and 'access_token' keys.
	 * Populated from the 'aegis_theme_updater_config' filter.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	private array $config;

	/**
	 * GitHub API instance.
	 *
	 * Lazily instantiated on first use.
	 *
	 * @since 1.0.0
	 *
	 * @var GitHubApi|null
	 */
	private ?GitHubApi $api = null;

	/**
	 * Condition to load this service.
	 *
	 * The service is only loaded if the 'aegis_theme_updater_config'
	 * filter returns a configuration with a non-empty 'repo' value.
	 *
	 * @since 1.0.0
	 *
	 * @return bool True if the updater should be loaded.
	 */
	public static function condition(): bool
	{
		$config = apply_filters('aegis_theme_updater_config', []);

		return !empty($config['repo']);
	}

	/**
	 * Get configuration.
	 *
	 * Retrieves and caches the configuration from the
	 * 'aegis_theme_updater_config' filter. Provides defaults
	 * for optional values.
	 *
	 * @since 1.0.0
	 *
	 * @return array Configuration with 'repo', 'slug', and 'access_token' keys.
	 */
	private function get_config(): array
	{
		if (!isset($this->config)) {
			$this->config = apply_filters('aegis_theme_updater_config', [
				'repo' => '',
				'slug' => get_stylesheet(),
				'access_token' => '',
			]);
		}

		return $this->config;
	}

	/**
	 * Get GitHub API instance.
	 *
	 * Lazily creates and caches the GitHubApi instance
	 * using the current configuration.
	 *
	 * @since 1.0.0
	 *
	 * @return GitHubApi Configured API client.
	 */
	private function get_api(): GitHubApi
	{
		if ($this->api === null) {
			$config = $this->get_config();
			$this->api = new GitHubApi(
				$config['repo'],
				$config['access_token'] ?? ''
			);
		}

		return $this->api;
	}

	/**
	 * Check for theme updates.
	 *
	 * @since 1.0.0
	 *
	 * @hook  pre_set_site_transient_update_themes
	 *
	 * @param mixed $transient Update transient data.
	 *
	 * @return mixed Modified transient data.
	 */
	public function check_for_updates($transient)
	{
		if (!is_object($transient)) {
			$transient = new stdClass();
		}

		$config = $this->get_config();

		if (empty($config['repo'])) {
			return $transient;
		}

		$slug = $config['slug'];
		$theme = wp_get_theme($slug);

		if (!$theme->exists()) {
			return $transient;
		}

		// Initialize arrays if not set.
		if (!isset($transient->response)) {
			$transient->response = [];
		}
		if (!isset($transient->no_update)) {
			$transient->no_update = [];
		}

		$current_version = $theme->get('Version');
		$release = $this->get_cached_release();

		if ($release === null) {
			return $transient;
		}

		$update_data = [
			'theme' => $slug,
			'new_version' => $release->version,
			'url' => $release->html_url,
			'package' => $release->download_url,
		];

		if (version_compare($release->version, $current_version, '>')) {
			$transient->response[$slug] = $update_data;
		} else {
			// Add to no_update to enable auto-update UI even when current.
			$update_data['new_version'] = $current_version;
			$transient->no_update[$slug] = $update_data;
		}

		return $transient;
	}

	/**
	 * Get cached release or fetch new one.
	 *
	 * Returns cached release data if within the check interval,
	 * otherwise fetches fresh data from GitHub and updates the cache.
	 *
	 * @since 1.0.0
	 *
	 * @return stdClass|null Release data object or null on failure.
	 */
	private function get_cached_release(): ?stdClass
	{
		$state = get_option(self::OPTION_KEY, []);
		$last_check = $state['last_check'] ?? 0;
		$cached_release = $state['release'] ?? null;

		if ((time() - $last_check) < self::CHECK_INTERVAL && $cached_release !== null) {
			return (object) $cached_release;
		}

		$release = $this->get_api()->get_latest_release();

		if ($release !== null) {
			update_option(self::OPTION_KEY, [
				'last_check' => time(),
				'release' => (array) $release,
			], false);
		}

		return $release;
	}

	/**
	 * Enable auto-updates for this theme.
	 *
	 * Adds the theme to the list of auto-updatable themes so the
	 * "Enable auto-updates" link appears in the theme details modal.
	 *
	 * @since 1.0.0
	 *
	 * @hook  themes_auto_update_enabled
	 *
	 * @param bool $enabled Whether auto-updates are enabled.
	 *
	 * @return bool
	 */
	public function enable_auto_updates(bool $enabled): bool
	{
		return true;
	}

	/**
	 * Include theme in auto-update list.
	 *
	 * @since 1.0.0
	 *
	 * @hook  auto_update_theme
	 *
	 * @param bool|null $update Whether to update the theme.
	 * @param object    $item   The update offer.
	 *
	 * @return bool|null
	 */
	public function auto_update_theme($update, object $item)
	{
		$config = $this->get_config();

		if (isset($item->theme) && $item->theme === $config['slug']) {
			return true;
		}

		return $update;
	}

	/**
	 * Provide theme information for the update modal.
	 *
	 * @since 1.0.0
	 *
	 * @hook  themes_api 10
	 *
	 * @param false|object|array $result Result from themes_api.
	 * @param string             $action API action.
	 * @param object             $args   API arguments.
	 *
	 * @return false|object|array Modified result.
	 */
	public function theme_info($result, string $action, object $args)
	{
		if ($action !== 'theme_information') {
			return $result;
		}

		$config = $this->get_config();
		$slug = $config['slug'];

		if (!isset($args->slug) || $args->slug !== $slug) {
			return $result;
		}

		$theme = wp_get_theme($slug);
		$release = $this->get_cached_release();

		if ($release === null) {
			return $result;
		}

		$info = new stdClass();
		$info->name = $theme->get('Name');
		$info->slug = $slug;
		$info->version = $release->version;
		$info->author = $theme->get('Author');
		$info->homepage = $theme->get('ThemeURI');
		$info->download_link = $release->download_url;
		$info->last_updated = $release->published_at;

		$info->sections = [
			'description' => $theme->get('Description'),
			'changelog' => $this->get_api()->parse_changelog($release->changelog),
		];

		return $info;
	}
}
