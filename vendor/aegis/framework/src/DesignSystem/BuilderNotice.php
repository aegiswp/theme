<?php
/**
 * Builder Notice
 *
 * Detects third-party page builders and displays a dismissable admin notice
 * informing users that they are unsupported with this block theme.
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file.
declare(strict_types=1);

// Declares the namespace for the Builder Notice component.
namespace Aegis\Framework\DesignSystem;

// Imports WordPress functions for URL manipulation, security, capabilities, and user meta.
use function add_query_arg;
use function check_admin_referer;
use function current_user_can;
use function delete_user_meta;
use function esc_html;
use function esc_html__;
use function esc_url;
use function get_current_user_id;
use function get_user_meta;
use function is_plugin_active;
use function remove_query_arg;
use function update_user_meta;
use function wp_get_theme;
use function wp_nonce_url;
use function wp_safe_redirect;

/**
 * Builder Notice Class
 *
 * Handles detection of third-party page builders and displays a dismissable
 * admin notice informing users that they are unsupported with this block theme.
 *
 * @since 1.0.0
 */
class BuilderNotice
{
	/**
	 * User meta key for storing dismissed notice state.
	 *
	 * This key is used to track whether a user has permanently dismissed
	 * the builder compatibility notice.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private const META_KEY = 'aegis_builder_notice_dismissed';

	/**
	 * List of page builders to detect.
	 *
	 * Maps plugin file paths to their display names. When a plugin matching
	 * one of these paths is active, the notice will be displayed.
	 *
	 * @since 1.0.0
	 *
	 * @var array<string, string> Plugin file path => Builder display name.
	 */
	private const BUILDERS = [
		'fusion-builder/fusion-builder.php'             => 'Avada Builder',
		'bb-plugin/fl-builder.php'                      => 'Beaver Builder',
		'beaver-builder-lite-version/fl-builder.php'    => 'Beaver Builder Lite',
		'breakdance/plugin.php'                         => 'Breakdance',
		'bricks/bricks.php'                             => 'Bricks Builder',
		'brizy/brizy.php'                               => 'Brizy',
		'cornerstone/cornerstone.php'                   => 'Cornerstone',
		'divi-builder/divi-builder.php'                 => 'Divi Builder',
		'elementor/elementor.php'                       => 'Elementor',
		'elementor-pro/elementor-pro.php'               => 'Elementor Pro',
		'generateblocks/plugin.php'                     => 'GenerateBlocks',
		'jetelements/jetelements.php'                   => 'JetElements',
		'jetwoobuilder/jet-woo-builder.php'             => 'JetWooBuilder',
		'oxygen/functions.php'                          => 'Oxygen Builder',
		'coming-soon/coming-soon.php'                   => 'SeedProd',
		'siteorigin-panels/siteorigin-panels.php'       => 'SiteOrigin Page Builder',
		'spectra/starter-templates.php'                 => 'Spectra Blocks',
		'themify-builder/themify-builder.php'           => 'Themify Builder',
		'thrive-visual-editor/thrive-visual-editor.php' => 'Thrive Architect',
		'visual-composer/visualcomposer.php'            => 'Visual Composer',
		'js_composer/js_composer.php'                   => 'WPBakery Page Builder',
	];

	/**
	 * Display admin notice for unsupported page builders.
	 *
	 * Checks if any third-party page builders are active and displays
	 * a warning notice to administrators. The notice can be permanently
	 * dismissed by clicking the dismiss button.
	 *
	 * @since 1.0.0
	 *
	 * @hook admin_notices
	 *
	 * @return void
	 */
	public function display_notice(): void
	{
		if (!current_user_can('manage_options')) {
			return;
		}

		$user_id = get_current_user_id();

		if (get_user_meta($user_id, self::META_KEY, true)) {
			return;
		}

		$detected_builders = $this->detect_builders();

		if (empty($detected_builders)) {
			return;
		}

		$dismiss_url = wp_nonce_url(
			add_query_arg('aegis_dismiss_builder_notice', '1'),
			'aegis_dismiss_builder_notice'
		);

		$builder_list = implode(', ', $detected_builders);

		printf(
			'<div class="notice notice-warning is-dismissible aegis-builder-notice">
				<p><strong>%s</strong></p>
				<p>%s</p>
				<p><a href="%s" class="button button-small">%s</a></p>
			</div>',
			esc_html__('Unsupported Page Builder Detected', 'aegis'),
			sprintf(
				/* translators: %s: List of detected page builders */
				esc_html__('The following page builder(s) are active: %s. Aegis is a native block theme and does not support third-party page builders. For the best experience, please use the WordPress Block Editor (Gutenberg).', 'aegis'),
				'<strong>' . esc_html($builder_list) . '</strong>'
			),
			esc_url($dismiss_url),
			esc_html__('Dismiss permanently', 'aegis')
		);
	}

	/**
	 * Handle notice dismissal request.
	 *
	 * Processes the dismissal request when a user clicks the dismiss button.
	 * Verifies the nonce and user capability before storing the dismissal
	 * state in user meta.
	 *
	 * @since 1.0.0
	 *
	 * @hook admin_init
	 *
	 * @return void
	 */
	public function handle_dismissal(): void
	{
		if (!isset($_GET['aegis_dismiss_builder_notice'])) {
			return;
		}

		if (!current_user_can('manage_options')) {
			return;
		}

		check_admin_referer('aegis_dismiss_builder_notice');

		update_user_meta(get_current_user_id(), self::META_KEY, '1');

		wp_safe_redirect(remove_query_arg(['aegis_dismiss_builder_notice', '_wpnonce']));
		exit;
	}

	/**
	 * Detect active page builders.
	 *
	 * Iterates through the list of known page builders and checks if any
	 * are currently active.
	 *
	 * @since 1.0.0
	 *
	 * @return array<string> List of detected builder display names.
	 */
	private function detect_builders(): array
	{
		if (!function_exists('is_plugin_active')) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$detected = [];

		foreach (self::BUILDERS as $plugin_file => $builder_name) {
			if (is_plugin_active($plugin_file)) {
				$detected[] = $builder_name;
			}
		}

		return array_unique($detected);
	}

	/**
	 * Reset dismissed notice for a user.
	 *
	 * Removes the dismissal flag from user meta, allowing the notice
	 * to be displayed again. Useful for debugging or when builder
	 * status changes.
	 *
	 * @since 1.0.0
	 *
	 * @param int $user_id User ID to reset the notice for.
	 *
	 * @return void
	 */
	public static function reset_notice(int $user_id): void
	{
		delete_user_meta($user_id, self::META_KEY);
	}
}
