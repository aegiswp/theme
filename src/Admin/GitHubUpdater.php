<?php
/**
 * GitHub Theme Updater
 *
 * Offers Aegis updates from the latest GitHub release through WordPress core's
 * native update flow. The theme declares `Update URI: https://github.com/aegiswp/theme`
 * in style.css, so core skips WordPress.org for it and asks the
 * `update_themes_github.com` filter instead. Core then compares versions and
 * shows the usual "Update now" links, Dashboard → Updates entry, and the
 * auto-update toggle; the update itself installs the release's aegis.zip asset.
 *
 * @package Aegis
 * @since   1.0.1
 */

// Enforces strict type checking for all code in this file, ensuring type safety for the GitHub theme updater.
declare( strict_types=1 );

// Declares the namespace for the GitHub theme updater.
namespace Aegis\Admin;

// Imports functions used by the GitHub theme updater.
use function __;
use function add_action;
use function add_filter;
use function admin_url;
use function apply_filters;
use function bloginfo;
use function current_user_can;
use function delete_site_transient;
use function esc_html;
use function esc_html__;
use function esc_html_e;
use function esc_url;
use function function_exists;
use function get_current_screen;
use function get_file_data;
use function get_site_transient;
use function home_url;
use function in_array;
use function is_array;
use function is_plugin_active;
use function is_readable;
use function is_wp_error;
use function preg_match_all;
use function version_compare;
use function json_decode;
use function language_attributes;
use function ltrim;
use function preg_match;
use function set_site_transient;
use function sprintf;
use function wp_die;
use function wp_remote_get;
use function wp_remote_retrieve_body;
use function wp_remote_retrieve_response_code;
use function wpautop;

/**
 * Supplies update data for the Aegis theme from GitHub releases.
 */
class GitHubUpdater {

	/**
	 * Theme directory (stylesheet) handled by this updater.
	 *
	 * @var string
	 */
	public const THEME_SLUG = 'aegis';

	/**
	 * GitHub repository in owner/name form.
	 *
	 * @var string
	 */
	public const REPOSITORY = 'aegiswp/theme';

	/**
	 * Release asset installed on update. Its top-level folder must be "aegis/".
	 *
	 * @var string
	 */
	public const ASSET_NAME = 'aegis.zip';

	/**
	 * Site transient caching the latest release.
	 *
	 * @var string
	 */
	public const CACHE_KEY = 'aegis_github_theme_release';

	/**
	 * Seconds to cache a successful lookup.
	 *
	 * @var int
	 */
	public const CACHE_TTL = 6 * HOUR_IN_SECONDS;

	/**
	 * Seconds to cache a failed lookup, so GitHub's unauthenticated rate limit is respected.
	 *
	 * @var int
	 */
	public const ERROR_TTL = 30 * MINUTE_IN_SECONDS;

	/**
	 * AJAX action that renders release notes for the "View version details" popup.
	 *
	 * @var string
	 */
	public const NOTES_ACTION = 'aegis_theme_release_notes';

	/**
	 * Companion plugin basename checked by the update hold.
	 *
	 * @var string
	 */
	public const PLUGIN_FILE = 'aegis/aegis.php';

	/**
	 * Register update hooks.
	 *
	 * Runs on every request (not only admin): core also checks for updates from cron.
	 *
	 * @return void
	 */
	public function init(): void {
		add_filter( 'update_themes_github.com', array( $this, 'filter_update' ), 10, 3 );
		add_action( 'wp_ajax_' . self::NOTES_ACTION, array( $this, 'render_release_notes' ) );
		add_action( 'upgrader_process_complete', array( $this, 'flush_cache' ) );
		add_action( 'admin_notices', array( $this, 'render_hold_notice' ) );
	}

	/**
	 * Plugin version a release requires, read from its notes.
	 *
	 * Matches a line such as `Requires Aegis plugin: 1.1.0` (case-insensitive;
	 * tolerates list markers, quotes, headings, bold, italics and code ticks).
	 * When several lines match, the highest version wins.
	 *
	 * @param string $notes GitHub release body.
	 *
	 * @return string|null Version like "1.1.0", or null when the release has no requirement.
	 */
	public static function parse_required_plugin_version( string $notes ): ?string {
		$matches = array();

		if ( ! preg_match_all( '/^[\s>*_`#+-]*Requires\s+Aegis\s+plugin[\s*_`]*:[\s*_`]*v?(\d+\.\d+(?:\.\d+)?)(?![\d.]*\d)/im', $notes, $matches ) ) {
			return null;
		}

		$highest = null;

		foreach ( $matches[1] as $version ) {
			if ( null === $highest || version_compare( $version, $highest, '>' ) ) {
				$highest = $version;
			}
		}

		return $highest;
	}

	/**
	 * Whether the Aegis plugin is installed, active and at least the given version.
	 *
	 * Reads the plugin header directly, so it works without the plugin loaded.
	 *
	 * @param string $required Minimum plugin version.
	 *
	 * @return bool
	 */
	public static function plugin_requirement_met( string $required ): bool {
		$file = WP_PLUGIN_DIR . '/' . self::PLUGIN_FILE;

		if ( ! is_readable( $file ) ) {
			return false;
		}

		if ( ! function_exists( 'is_plugin_active' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		if ( ! is_plugin_active( self::PLUGIN_FILE ) ) {
			return false;
		}

		$data      = get_file_data( $file, array( 'Version' => 'Version' ) );
		$installed = (string) ( $data['Version'] ?? '' );

		return '' !== $installed && version_compare( $installed, $required, '>=' );
	}

	/**
	 * Show why a theme update is not offered, on update-related admin screens.
	 *
	 * Uses the cached release only, so it never triggers a GitHub request.
	 *
	 * @return void
	 */
	public function render_hold_notice(): void {
		if ( ! current_user_can( 'update_themes' ) && ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;

		if ( ! $screen || ! in_array( $screen->id, array( 'themes', 'update-core', 'plugins' ), true ) ) {
			return;
		}

		$cached = get_site_transient( self::CACHE_KEY );

		if ( ! is_array( $cached ) || empty( $cached['version'] ) ) {
			return;
		}

		$required = self::parse_required_plugin_version( (string) ( $cached['notes'] ?? '' ) );

		if ( null === $required || self::plugin_requirement_met( $required ) ) {
			return;
		}
		?>
		<div class="notice notice-warning aegis-update-hold-notice">
			<p>
				<?php
				echo esc_html(
					sprintf(
						/* translators: 1: Required Aegis plugin version, 2: Aegis theme version that is waiting. */
						__( 'Update the Aegis plugin to %1$s before updating the theme. Aegis theme %2$s is waiting for it and will be offered once the plugin is installed, active and up to date.', 'aegis' ),
						$required,
						(string) $cached['version']
					)
				);
				?>
				<?php if ( current_user_can( 'activate_plugins' ) || current_user_can( 'update_plugins' ) ) : ?>
					<a href="<?php echo esc_url( admin_url( 'plugins.php' ) ); ?>"><?php esc_html_e( 'Go to Plugins', 'aegis' ); ?></a>
				<?php endif; ?>
			</p>
		</div>
		<?php
	}

	/**
	 * Provide update data for core's Update URI flow.
	 *
	 * @param array<string, mixed>|false $update           Update data from earlier callbacks, or false.
	 * @param array<string, mixed>       $theme_data       Theme headers.
	 * @param string                     $theme_stylesheet Theme directory name.
	 *
	 * @return array<string, mixed>|false
	 */
	public function filter_update( $update, array $theme_data, string $theme_stylesheet ) {
		if ( self::THEME_SLUG !== $theme_stylesheet ) {
			return $update;
		}

		$release = $this->get_release();

		if ( null === $release ) {
			return $update;
		}

		// Hold releases that need a newer Aegis plugin until it is installed, active and new enough.
		$required = self::parse_required_plugin_version( $release['notes'] );

		if ( null !== $required && ! self::plugin_requirement_met( $required ) ) {
			return $update;
		}

		return array(
			'theme'   => self::THEME_SLUG,
			'version' => $release['version'],
			'url'     => admin_url( 'admin-ajax.php?action=' . self::NOTES_ACTION ),
			'package' => $release['package'],
		);
	}

	/**
	 * Latest published release, cached.
	 *
	 * "Check again" on Dashboard → Updates (force-check) bypasses the cache.
	 *
	 * @return array{version: string, package: string, url: string, name: string, notes: string, published: string}|null
	 */
	public function get_release(): ?array {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only cache bypass, mirrors core's force-check.
		$force  = ! empty( $_GET['force-check'] ) && current_user_can( 'update_themes' );
		$cached = $force ? false : get_site_transient( self::CACHE_KEY );

		if ( is_array( $cached ) ) {
			return empty( $cached['version'] ) ? null : $cached;
		}

		$release = $this->fetch_release();

		set_site_transient( self::CACHE_KEY, $release ?? array( 'error' => true ), null === $release ? self::ERROR_TTL : self::CACHE_TTL );

		return $release;
	}

	/**
	 * Query GitHub for the latest non-draft, non-prerelease release with the theme asset.
	 *
	 * @return array{version: string, package: string, url: string, name: string, notes: string, published: string}|null
	 */
	private function fetch_release(): ?array {
		/**
		 * Filters the GitHub repository the theme updates from.
		 *
		 * @since 1.0.1
		 *
		 * @param string $repository Repository in owner/name form.
		 */
		$repository = (string) apply_filters( 'aegis_theme_update_repository', self::REPOSITORY );

		$response = wp_remote_get(
			'https://api.github.com/repos/' . $repository . '/releases/latest',
			array(
				'timeout' => 10,
				'headers' => array(
					'Accept'     => 'application/vnd.github+json',
					'User-Agent' => 'Aegis-Theme-Updater; ' . home_url(),
				),
			)
		);

		if ( is_wp_error( $response ) || 200 !== (int) wp_remote_retrieve_response_code( $response ) ) {
			return null;
		}

		$data = json_decode( (string) wp_remote_retrieve_body( $response ), true );

		if ( ! is_array( $data ) || ! empty( $data['draft'] ) || ! empty( $data['prerelease'] ) ) {
			return null;
		}

		$version = ltrim( (string) ( $data['tag_name'] ?? '' ), 'vV' );

		if ( ! preg_match( '/^\d+\.\d+(\.\d+)?([.-][0-9A-Za-z.-]+)?$/', $version ) ) {
			return null;
		}

		$package = '';

		foreach ( (array) ( $data['assets'] ?? array() ) as $asset ) {
			if ( is_array( $asset ) && self::ASSET_NAME === ( $asset['name'] ?? '' ) ) {
				$package = (string) ( $asset['browser_download_url'] ?? '' );
				break;
			}
		}

		// Without the packaged asset there is nothing safe to install (source zipballs use another folder name).
		if ( '' === $package ) {
			return null;
		}

		return array(
			'version'   => $version,
			'package'   => $package,
			'url'       => (string) ( $data['html_url'] ?? '' ),
			'name'      => (string) ( $data['name'] ?? $data['tag_name'] ?? '' ),
			'notes'     => (string) ( $data['body'] ?? '' ),
			'published' => (string) ( $data['published_at'] ?? '' ),
		);
	}

	/**
	 * Render the release notes shown in core's "View version details" popup.
	 *
	 * GitHub refuses to load inside frames, so the notes are served from the site.
	 *
	 * @return void
	 */
	public function render_release_notes(): void {
		if ( ! current_user_can( 'update_themes' ) ) {
			wp_die( esc_html__( 'Sorry, you are not allowed to update themes for this site.', 'aegis' ) );
		}

		$release = $this->get_release();
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<title><?php esc_html_e( 'Aegis release notes', 'aegis' ); ?></title>
			<style>
				body { font: 14px/1.6 -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; color: #1e1e1e; margin: 24px; }
				h1 { font-size: 20px; margin: 0 0 4px; }
				.meta { color: #757575; margin: 0 0 20px; }
				.notes { white-space: normal; }
			</style>
		</head>
		<body>
			<?php if ( null === $release ) : ?>
				<p><?php esc_html_e( 'Release notes are not available right now.', 'aegis' ); ?></p>
			<?php else : ?>
				<h1><?php echo esc_html( $release['name'] ); ?></h1>
				<p class="meta">
					<?php
					/* translators: %s: Theme version number. */
					echo esc_html( sprintf( __( 'Version %s', 'aegis' ), $release['version'] ) );
					?>
				</p>
				<div class="notes"><?php echo wpautop( esc_html( $release['notes'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped before wpautop. ?></div>
				<?php if ( '' !== $release['url'] ) : ?>
					<p><a href="<?php echo esc_url( $release['url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'View this release on GitHub', 'aegis' ); ?></a></p>
				<?php endif; ?>
			<?php endif; ?>
		</body>
		</html>
		<?php
		exit;
	}

	/**
	 * Drop the cached release after any update, so the next check sees fresh data.
	 *
	 * @return void
	 */
	public function flush_cache(): void {
		delete_site_transient( self::CACHE_KEY );
	}
}
