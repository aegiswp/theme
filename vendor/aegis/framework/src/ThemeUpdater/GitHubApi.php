<?php
/**
 * GitHub API Client
 *
 * Fetches release information from GitHub repositories for theme updates.
 *
 * Responsibilities:
 * - Fetches latest release data from GitHub API
 * - Extracts version, download URL, and changelog
 * - Parses markdown changelog to HTML
 *
 * @package    Aegis\Framework\ThemeUpdater
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

declare(strict_types=1);

namespace Aegis\Framework\ThemeUpdater;

use stdClass;
use function is_wp_error;
use function json_decode;
use function ltrim;
use function substr;
use function wp_remote_get;
use function wp_remote_retrieve_body;
use function wp_remote_retrieve_response_code;

/**
 * GitHub API Client.
 *
 * Provides methods to interact with the GitHub API for fetching release
 * information used by the theme updater. Handles authentication, rate
 * limiting considerations, and response parsing.
 *
 * @since 1.0.0
 */
class GitHubApi
{
	/**
	 * GitHub API base URL.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private const API_BASE = 'https://api.github.com';

	/**
	 * Repository owner/name.
	 *
	 * Format: "owner/repo" (e.g., "aegiswp/theme").
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private string $repo;

	/**
	 * GitHub access token.
	 *
	 * Optional. Required for private repositories or to increase
	 * the API rate limit from 60 to 5,000 requests per hour.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private string $access_token;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param string $repo         Repository in format "owner/repo".
	 * @param string $access_token Optional GitHub personal access token.
	 */
	public function __construct(string $repo, string $access_token = '')
	{
		$this->repo = $repo;
		$this->access_token = $access_token;
	}

	/**
	 * Get the latest release from GitHub.
	 *
	 * Fetches the latest non-draft, non-prerelease release from the
	 * configured repository. Returns a parsed release object containing
	 * version, download URL, changelog, and publication date.
	 *
	 * @since 1.0.0
	 *
	 * @return stdClass|null Parsed release object with properties:
	 *                       - version: Normalized version string.
	 *                       - download_url: URL to the .zip asset or zipball.
	 *                       - changelog: Raw markdown changelog content.
	 *                       - published_at: ISO 8601 publication timestamp.
	 *                       - html_url: URL to the release page on GitHub.
	 *                       Returns null on API failure.
	 */
	public function get_latest_release(): ?stdClass
	{
		$url = self::API_BASE . "/repos/{$this->repo}/releases/latest";
		$response = $this->api_request($url);

		if ($response === null) {
			return null;
		}

		return $this->parse_release($response);
	}

	/**
	 * Parse release data into a standardized object.
	 *
	 * Extracts and normalizes relevant fields from the raw GitHub API
	 * response into a consistent format for the theme updater.
	 *
	 * @since 1.0.0
	 *
	 * @param stdClass $release Raw release data from GitHub API.
	 *
	 * @return stdClass Parsed release object.
	 */
	private function parse_release(stdClass $release): stdClass
	{
		$parsed = new stdClass();

		$parsed->version = $this->normalize_version($release->tag_name ?? '');
		$parsed->download_url = $this->get_release_asset_url($release);
		$parsed->changelog = $release->body ?? '';
		$parsed->published_at = $release->published_at ?? '';
		$parsed->html_url = $release->html_url ?? '';

		return $parsed;
	}

	/**
	 * Get the download URL from release assets.
	 *
	 * Searches release assets for a .zip file and returns its download URL.
	 * Falls back to the repository zipball URL if no .zip asset is found.
	 *
	 * @since 1.0.0
	 *
	 * @param stdClass $release Release data from GitHub API.
	 *
	 * @return string Download URL for the theme package.
	 */
	private function get_release_asset_url(stdClass $release): string
	{
		$assets = $release->assets ?? [];

		foreach ($assets as $asset) {
			if (isset($asset->browser_download_url) && substr($asset->name, -4) === '.zip') {
				return $asset->browser_download_url;
			}
		}

		return $release->zipball_url ?? '';
	}

	/**
	 * Normalize version string.
	 *
	 * Removes the 'v' or 'V' prefix commonly used in Git tags
	 * (e.g., "v1.0.0" becomes "1.0.0").
	 *
	 * @since 1.0.0
	 *
	 * @param string $version Version string from Git tag.
	 *
	 * @return string Normalized version without prefix.
	 */
	private function normalize_version(string $version): string
	{
		return ltrim($version, 'vV');
	}

	/**
	 * Make an API request to GitHub.
	 *
	 * Sends a GET request to the GitHub API with appropriate headers
	 * for authentication and content negotiation. Handles errors and
	 * validates the response format.
	 *
	 * @since 1.0.0
	 *
	 * @param string $url Full API endpoint URL.
	 *
	 * @return stdClass|null Decoded JSON response object, or null on:
	 *                        - Network error (WP_Error).
	 *                        - Non-200 HTTP status code.
	 *                        - Invalid JSON response.
	 */
	private function api_request(string $url): ?stdClass
	{
		$args = [
			'timeout' => 10,
			'headers' => [
				'Accept' => 'application/vnd.github.v3+json',
				'User-Agent' => 'Aegis-Theme-Updater/1.0',
			],
		];

		if (!empty($this->access_token)) {
			$args['headers']['Authorization'] = 'token ' . $this->access_token;
		}

		$response = wp_remote_get($url, $args);

		if (is_wp_error($response)) {
			return null;
		}

		$code = wp_remote_retrieve_response_code($response);

		if ($code !== 200) {
			return null;
		}

		$body = wp_remote_retrieve_body($response);
		$data = json_decode($body);

		if (!$data instanceof stdClass) {
			return null;
		}

		return $data;
	}

	/**
	 * Parse markdown changelog to HTML.
	 *
	 * Converts the release body markdown content to safe HTML for
	 * display in the WordPress theme update modal.
	 *
	 * @since 1.0.0
	 *
	 * @param string $markdown Raw markdown content from release body.
	 *
	 * @return string Sanitized HTML content.
	 */
	public function parse_changelog(string $markdown): string
	{
		if (empty($markdown)) {
			return '';
		}

		$parsedown = new Parsedown();
		$parsedown->setSafeMode(true);

		return $parsedown->text($markdown);
	}
}
