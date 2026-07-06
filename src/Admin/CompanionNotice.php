<?php
/**
 * Companion Plugin Onboarding Notice
 *
 * Displays an admin notice on Appearance → Themes when the Aegis companion
 * plugin is not active. The theme works standalone; the plugin unlocks blocks,
 * the settings dashboard, conditionals, hooks, and integrations.
 *
 * Supports install/activate actions, dismiss persistence (user meta + AJAX),
 * and passes a welcome flag through install/activate URLs for dashboard redirect.
 *
 * @package Aegis
 * @since   1.0.0
 */

// Enforces strict type checking for all code in this file, ensuring type safety for companion plugin onboarding notice.
declare( strict_types=1 );

// Declares the namespace for the companion plugin onboarding notice.
namespace Aegis\Admin;

// Imports classes, interfaces, and functions used by the companion plugin onboarding notice.
use function __;
use function add_action;
use function add_query_arg;
use function admin_url;
use function check_ajax_referer;
use function current_user_can;
use function esc_attr;
use function esc_html;
use function esc_html__;
use function esc_url;
use function get_current_screen;
use function get_current_user_id;
use function get_template;
use function get_user_meta;
use function is_admin;
use function sanitize_text_field;
use function self_admin_url;
use function update_user_meta;
use function wp_add_inline_script;
use function wp_create_nonce;
use function wp_enqueue_script;
use function wp_nonce_url;
use function wp_safe_redirect;
use function wp_send_json_error;
use function wp_send_json_success;
use function wp_unslash;
use function wp_verify_nonce;

/**
 * Prompts administrators to install or activate the Aegis companion plugin.
 */
class CompanionNotice {

	/**
	 * Plugin basename relative to wp-content/plugins.
	 *
	 * @var string
	 */
	public const PLUGIN_FILE = 'aegis/aegis.php';

	/**
	 * WordPress.org plugin directory slug used for installation.
	 *
	 * @var string
	 */
	public const PLUGIN_SLUG = 'aegis';

	/**
	 * User meta key that stores whether the notice was dismissed.
	 *
	 * @var string
	 */
	public const DISMISS_META = 'aegis_dismissed_companion_notice';

	/**
	 * Nonce action for dismiss links and AJAX requests.
	 *
	 * @var string
	 */
	public const DISMISS_NONCE = 'aegis_dismiss_companion_notice';

	/**
	 * Public plugin page on WordPress.org.
	 *
	 * @var string
	 */
	public const PLUGIN_URI = 'https://wordpress.org/plugins/aegis/';

	/**
	 * Query argument appended to install/activate URLs for post-activation redirect.
	 *
	 * @var string
	 */
	public const WELCOME_ARG = 'aegis_welcome';

	/**
	 * Register admin hooks for the companion notice.
	 *
	 * @return void
	 */
	public function init(): void {
		if ( ! is_admin() ) {
			return;
		}

		add_action( 'admin_init', array( $this, 'handle_dismiss' ) );
		add_action( 'admin_notices', array( $this, 'render_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_dismiss_script' ) );
		add_action( 'wp_ajax_aegis_dismiss_companion_notice', array( $this, 'ajax_dismiss' ) );
		add_filter( 'install_plugin_complete_actions', array( $this, 'append_welcome_to_install_activate' ), 10, 3 );
	}

	/**
	 * Whether the companion plugin is active.
	 *
	 * @return bool
	 */
	private function is_plugin_active(): bool {
		if ( ! function_exists( 'is_plugin_active' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		return is_plugin_active( self::PLUGIN_FILE );
	}

	/**
	 * Whether the companion plugin is installed (present in wp-content/plugins).
	 *
	 * @return bool
	 */
	private function is_plugin_installed(): bool {
		return is_readable( WP_PLUGIN_DIR . '/' . self::PLUGIN_FILE );
	}

	/**
	 * Whether the notice should be shown to the current user.
	 *
	 * @return bool
	 */
	private function should_show(): bool {
		if ( get_template() !== 'aegis' ) {
			return false;
		}

		if ( $this->is_plugin_active() ) {
			return false;
		}

		if ( ! current_user_can( 'install_plugins' ) && ! current_user_can( 'activate_plugins' ) ) {
			return false;
		}

		if ( get_user_meta( get_current_user_id(), self::DISMISS_META, true ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Persist dismiss when the user clicks the dismiss link.
	 *
	 * @return void
	 */
	public function handle_dismiss(): void {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( ! isset( $_GET['aegis-dismiss-companion'] ) ) {
			return;
		}

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$nonce = isset( $_GET['_wpnonce'] ) ? sanitize_text_field( wp_unslash( (string) $_GET['_wpnonce'] ) ) : '';

		if ( ! wp_verify_nonce( $nonce, self::DISMISS_NONCE ) ) {
			return;
		}

		update_user_meta( get_current_user_id(), self::DISMISS_META, '1' );

		wp_safe_redirect( admin_url( 'themes.php' ) );
		exit;
	}

	/**
	 * AJAX dismiss handler for the standard notice close button.
	 *
	 * @return void
	 */
	public function ajax_dismiss(): void {
		check_ajax_referer( self::DISMISS_NONCE, 'nonce' );

		if ( ! current_user_can( 'install_plugins' ) && ! current_user_can( 'activate_plugins' ) ) {
			wp_send_json_error();
		}

		update_user_meta( get_current_user_id(), self::DISMISS_META, '1' );
		wp_send_json_success();
	}

	/**
	 * Output the companion plugin notice on the themes screen.
	 *
	 * @return void
	 */
	public function render_notice(): void {
		if ( ! $this->should_show() ) {
			return;
		}

		$screen = get_current_screen();
		if ( ! $screen || $screen->id !== 'themes' ) {
			return;
		}

		$action_url   = $this->get_action_url();
		$action_label = $this->get_action_label();
		$dismiss_url  = wp_nonce_url(
			add_query_arg( 'aegis-dismiss-companion', '1', admin_url( 'themes.php' ) ),
			self::DISMISS_NONCE
		);
		$dismiss_nonce = wp_create_nonce( self::DISMISS_NONCE );
		?>
		<div
			class="notice notice-info is-dismissible aegis-companion-notice"
			data-aegis-companion-notice="1"
			data-dismiss-nonce="<?php echo esc_attr( $dismiss_nonce ); ?>"
		>
			<p>
				<strong><?php esc_html_e( 'Aegis is almost ready!', 'aegis' ); ?></strong>
				<?php
				esc_html_e(
					'Install the Aegis companion plugin to unlock custom blocks, the settings dashboard, conditionals, hooks, and integrations. The theme works on its own; the plugin adds the full feature set.',
					'aegis'
				);
				?>
			</p>
			<p>
				<?php if ( $action_url !== '' ) : ?>
					<a href="<?php echo esc_url( $action_url ); ?>" class="button button-primary">
						<?php echo esc_html( $action_label ); ?>
					</a>
				<?php endif; ?>
				<a href="<?php echo esc_url( self::PLUGIN_URI ); ?>" class="button button-secondary" target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'Learn more', 'aegis' ); ?>
				</a>
				<a href="<?php echo esc_url( $dismiss_url ); ?>" class="button-link aegis-companion-notice-dismiss-link">
					<?php esc_html_e( 'Dismiss', 'aegis' ); ?>
				</a>
			</p>
		</div>
		<?php
	}

	/**
	 * Append the welcome flag to the post-install Activate link.
	 *
	 * The plugin is not loaded during installation, so the theme must inject
	 * {@see self::WELCOME_ARG} into the Activate URL for dashboard redirect.
	 *
	 * @param array<string, string> $actions     Install complete actions.
	 * @param mixed                 $api         Plugin API response.
	 * @param string                $plugin_file Plugin basename.
	 *
	 * @return array<string, string>
	 */
	public function append_welcome_to_install_activate( array $actions, $api, string $plugin_file ): array {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( empty( $_GET[ self::WELCOME_ARG ] ) || $plugin_file !== self::PLUGIN_FILE ) {
			return $actions;
		}

		if ( isset( $actions['activate_plugin'] ) ) {
			$actions['activate_plugin'] = str_replace(
				array(
					'action=activate&amp;plugin=',
					'action=activate&plugin=',
				),
				array(
					'action=activate&amp;' . self::WELCOME_ARG . '=1&amp;plugin=',
					'action=activate&' . self::WELCOME_ARG . '=1&plugin=',
				),
				$actions['activate_plugin']
			);
		}

		return $actions;
	}

	/**
	 * Primary action URL — activate if installed, otherwise install from WordPress.org.
	 *
	 * @return string Empty string when the current user lacks the required capability.
	 */
	private function get_action_url(): string {
		if ( $this->is_plugin_installed() ) {
			if ( ! current_user_can( 'activate_plugins' ) ) {
				return '';
			}

			$url = add_query_arg(
				array(
					'action'          => 'activate',
					'plugin'          => self::PLUGIN_FILE,
					self::WELCOME_ARG => '1',
				),
				self_admin_url( 'plugins.php' )
			);

			return wp_nonce_url( $url, 'activate-plugin_' . self::PLUGIN_FILE );
		}

		if ( ! current_user_can( 'install_plugins' ) ) {
			return '';
		}

		$url = add_query_arg(
			array(
				'action'          => 'install-plugin',
				'plugin'          => self::PLUGIN_SLUG,
				self::WELCOME_ARG => '1',
			),
			self_admin_url( 'update.php' )
		);

		return wp_nonce_url( $url, 'install-plugin_' . self::PLUGIN_SLUG );
	}

	/**
	 * Primary action button label based on install state.
	 *
	 * @return string
	 */
	private function get_action_label(): string {
		if ( $this->is_plugin_installed() ) {
			return __( 'Activate Aegis Plugin', 'aegis' );
		}

		return __( 'Install Aegis Plugin', 'aegis' );
	}

	/**
	 * Enqueue script that persists dismiss via AJAX when using the core close button.
	 *
	 * @param string $hook_suffix Current admin page hook.
	 *
	 * @return void
	 */
	public function enqueue_dismiss_script( string $hook_suffix ): void {
		if ( $hook_suffix !== 'themes.php' || ! $this->should_show() ) {
			return;
		}

		wp_enqueue_script( 'jquery' );

		wp_add_inline_script(
			'jquery',
			<<<'JS'
jQuery( function ( $ ) {
	$( document ).on( 'click', '.aegis-companion-notice .notice-dismiss', function () {
		var $notice = $( this ).closest( '.aegis-companion-notice' );
		var nonce = $notice.data( 'dismissNonce' );
		if ( ! nonce ) {
			return;
		}
		$.post( ajaxurl, {
			action: 'aegis_dismiss_companion_notice',
			nonce: nonce
		} );
	} );
} );
JS
		);
	}
}
