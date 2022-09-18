<?php
/**
 * Builds the notices.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Aeon_Notices {

	/**
	 * The admin notices key.
	 */
	const ADMIN_NOTICES_KEY = 'ae_admin_notices';

	/**
	 * Member Variable.
	 *
	 * @var object instance
	 */
	private static $instance;

	/**
	 * Initiator.
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_notices', array( $this, 'review_notice' ), 20 );
		add_action( 'admin_notices', array( $this, 'ae_pro_notice' ), 20 );
		add_action( 'admin_notices', array( $this, 'contest_notice' ), 20 );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_ajax_ae_set_admin_notice_viewed', array( $this, 'ajax_set_admin_notice_viewed' ) );
	}

	/**
	 * Get install time.
	 *
	 * @return int Unix timestamp when Aeon was installed.
	 */
	private function get_install_time( $source ) {
		$time = get_option( $source . '_aeon_installed_time' );
		if ( ! $time ) {
			$time = time();
			update_option( $source . '_aeon_installed_time', $time );
		}
		return $time;
	}

	/**
	 * Add a review notice.
	 *
	 * @access public
	 */
	public function review_notice() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$notice_id = 'ae_review_notice';

		if ( $this->is_user_notice_viewed( $notice_id ) ) {
			return;
		}

		// Show notice after 1 week from installed time.
		if ( strtotime( '+1 week', $this->get_install_time( $notice_id ) ) > time() ) {
			return;
		}

		$dismiss_url = add_query_arg( [
			'action' => 'ae_set_admin_notice_viewed',
			'notice_id' => esc_attr( $notice_id ),
		], admin_url( 'admin-post.php' ) );
		?>
		<div class="notice ae-notice ae-review-notice ae-dismiss-notice" data-notice_id="<?php echo esc_attr( $notice_id ); ?>">
			<div class="ae-notice-icon">
				<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="m29.911 13.75-6.229 6.072 1.471 8.576c.064.375-.09.754-.398.978-.174.127-.381.191-.588.191-.159 0-.319-.038-.465-.115l-7.702-4.049-7.701 4.048c-.336.178-.745.149-1.053-.076-.308-.224-.462-.603-.398-.978l1.471-8.576-6.23-6.071c-.272-.266-.371-.664-.253-1.025s.431-.626.808-.681l8.609-1.25 3.85-7.802c.337-.683 1.457-.683 1.794 0l3.85 7.802 8.609 1.25c.377.055.69.319.808.681s.019.758-.253 1.025z"/></svg>
			</div>
			<div class="ae-notice-content">
				<p><?php esc_html_e( 'Thank you for choosing Aeon as your theme. If you wish to motivate others to use it, consider giving it a 5-star rating on WordPress to help us spread the word.', 'aeonwp' ); ?></p>
				<p><strong>~ Alex de Borba<br>Atmostfear Entertainment</strong></p>

				<div class="ae-notice-buttons">
					<a href="https://wordpress.org/support/theme/aeon/reviews/?filter=5#new-post" rel="nofollow" target="_blank"><?php esc_html_e( 'Yes, you deserve it!', 'aeonwp' ); ?></a>
					<a href="<?php echo esc_url_raw( $dismiss_url ); ?>" class="ae-notice-dismiss"><?php esc_html_e( 'I already did', 'aeonwp' ); ?></a>
				</div>
			</div>
			<button type="button" class="notice-dismiss ae-notice-dismiss"><span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', 'aeonwp' ); ?></span></button>
		</div>
		<?php
	}

	/**
	 * Add Aeon Pro notice.
	 *
	 * @access public
	 */
	public function ae_pro_notice() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$notice_id = 'ae_pro_notice';

		if ( $this->is_user_notice_viewed( $notice_id ) ) {
			return;
		}

		// Do not show if Aeon Pro activated.
		if ( defined( 'AEON_PRO_VERSION' ) ) {
			return;
		}

		// Show notice after 2 weeks from installed time.
		if ( strtotime( '+2 weeks', $this->get_install_time( $notice_id ) ) > time() ) {
			return;
		}

		$dismiss_url = add_query_arg( [
			'action' => 'ae_set_admin_notice_viewed',
			'notice_id' => esc_attr( $notice_id ),
		], admin_url( 'admin-post.php' ) );
		?>
		<div class="notice ae-notice ae-pro-notice ae-dismiss-notice" data-notice_id="<?php echo esc_attr( $notice_id ); ?>">
			<div class="ae-notice-icon">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511 511.99931"><path d="m285.386719 157.222656 72.058593-110.484375s-114.71875-105.160156-272.464843 0c-85.503907 57.003907-91.890625 156.136719-79.808594 234.984375l90.960937-5.539062" fill="#ffffff"/><path d="m312.890625 19.046875c-48.199219-12.367187-115.175781-11.335937-192.480469 40.199219-80.332031 53.554687-90.835937 144.289062-81.789062 220.445312l-33.449219 2.03125c-12.085937-78.84375-5.699219-177.976562 79.8125-234.980468 98.632813-65.757813 180.445313-49.285157 227.90625-27.695313zm0 0" fill="#e9e9e9"/><path d="m303.125 130.019531-17.742188 27.203125-125.53125 118.957032-90.339843 1.625c-.105469-2.335938-.15625-4.683594-.15625-7.042969 0-87.9375 71.289062-159.226563 159.246093-159.226563 26.929688 0 52.289063 6.679688 74.523438 18.484375zm0 0" fill="#e9e9e9"/><path d="m311.621094 181.25-145.664063 64.171875-53.398437 23.519531c-.855469-5.230468-1.324219-10.585937-1.40625-16.046875-.019532-.617187-.019532-1.21875-.019532-1.835937 0-50.730469 33.632813-93.628906 79.832032-107.578125 5.054687-1.542969 10.261718-2.722657 15.597656-3.535157h.03125c5.523438-.832031 11.179688-1.269531 16.941406-1.269531 29.894532 0 57.058594 11.660157 77.1875 30.695313 3.910156 3.6875 7.554688 7.660156 10.898438 11.878906zm0 0" fill="#ffffff" data-original="#ffc84d" class=""/><path d="m165.957031 245.429688-53.402343 23.515624c-.945313-5.8125-1.425782-11.785156-1.425782-17.878906 0-50.742187 33.632813-93.628906 79.832032-107.582031-26.683594 12.984375-35.777344 59.722656-25.003907 101.945313zm0 0" fill="#e9e9e9"/><path d="m311.621094 181.25-95.503906 84.40625-103.558594 3.285156c-.855469-5.230468-1.324219-10.585937-1.40625-16.046875l82.230468-36.21875c.011719-.011719.019532-.023437.019532-.023437l107.320312-47.28125c3.910156 3.6875 7.554688 7.660156 10.898438 11.878906zm0 0" fill="#e9e9e9"/><path d="m317.609375 357.449219 43.023437 154.550781-173.671874-90.816406 7.960937-103.570313-32.144531 17.015625-49.117188 26.007813-17.527344-84.449219 97.246094-42.835938c.011719-.011718.019532-.019531.019532-.019531l130.589843-57.527343 49.386719 192.792968h-27.078125l-25.5-57.359375-73.289063-27.089843-12.753906 49.398437zm0 0" fill="#ffffff" data-original="#ffc84d" class=""/><path d="m162.777344 334.628906-49.117188 26.007813-17.527344-84.449219 97.246094-42.835938c-1.175781 1.148438-44.710937 43.992188-30.601562 101.277344zm0 0" fill="#e9e9e9"/></svg>
			</div>
			<div class="ae-notice-content">
				<p><?php esc_html_e( 'We noticed you like Aeon, it&rsquo;s time to unleash its full potential with its PRO version, and to show you our gratitude, we&rsquo;re offering 50% OFF, but hurry up, this code is running out soon.', 'aeonwp' ); ?></p>

				<div class="ae-notice-buttons">
					<a href="https://www.atmostfear-entertainment.com/aeon/pro/?utm_source=wp_dashboard&utm_medium=notice" rel="nofollow" target="_blank"><?php esc_html_e( 'I want Aeon Pro!', 'aeonwp' ); ?></a>
					<a href="<?php echo esc_url_raw( $dismiss_url ); ?>" class="ae-notice-dismiss"><?php esc_html_e( 'I don&rsquo;t want it', 'aeonwp' ); ?></a>
				</div>
			</div>
			<button type="button" class="notice-dismiss ae-notice-dismiss"><span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', 'aeonwp' ); ?></span></button>
		</div>
		<?php
	}

	/**
	 * Add contest notice.
	 *
	 * @access public
	 */
	public function contest_notice() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$notice_id = 'ae_contest_notice';

		if ( $this->is_user_notice_viewed( $notice_id ) ) {
			return;
		}

		// Do not show if Aeon Pro activated.
		if ( defined( 'AEON_PRO_VERSION' ) ) {
			return;
		}

		// Show notice after 1 month from installed time.
		if ( strtotime( '+1 month', $this->get_install_time( $notice_id ) ) > time() ) {
			return;
		}

		$dismiss_url = add_query_arg( [
			'action' => 'ae_set_admin_notice_viewed',
			'notice_id' => esc_attr( $notice_id ),
		], admin_url( 'admin-post.php' ) );
		?>
		<div class="notice ae-notice ae-contest-notice ae-dismiss-notice" data-notice_id="<?php echo esc_attr( $notice_id ); ?>">
			<div class="ae-notice-icon">
			<svg viewBox="0 0 512.004 512.004" xmlns="http://www.w3.org/2000/svg"><path d="m381.361 452.004h-250.717c-8.284 0-15 6.716-15 15v30c0 8.284 6.716 15 15 15h250.717c8.284 0 15-6.716 15-15v-30c0-8.284-6.716-15-15-15z"/><path d="m314.764 379.14h-10.587c-3.354-8.977-5.68-23.612-5.89-42.569-13.255 3.469-27.406 5.228-42.399 5.228-13.081 0-27.383-1.382-41.99-5.163-.045 8.862-.558 18.645-2.041 27.688-.839 5.115-2.119 10.421-3.803 14.815h-10.814c-19.299 0-35 15.701-35 35v7.864h187.523v-7.864c.001-19.298-15.7-34.999-34.999-34.999z"/><path d="m486.909 60.267h-53.331c-.646 7.185-1.21 14.557-1.621 19.943-.249 3.262-.507 6.624-.776 10.057h40.173c-3.358 41.122-21.991 76.861-55.535 106.624-3.236 12.803-7.158 25.45-11.979 37.6-1.887 4.757-3.891 9.349-5.991 13.801l17.996-13.028c57.107-41.342 86.064-94.755 86.064-158.755v-1.243c0-8.284-6.716-14.999-15-14.999z"/><path d="m95.07 196.001c-32.87-29.6-51.129-65.041-54.429-105.735h39.032c-.34-4.349-.658-8.577-.965-12.663-.371-4.937-.84-11.166-1.369-17.337h-52.243c-8.284 0-15 6.716-15 15v1.352c0 63.921 28.905 117.297 85.913 158.646l17.221 12.49c-2.215-4.693-4.346-9.598-6.375-14.748-4.724-11.987-8.585-24.426-11.785-37.005z"/><path d="m89.727 30h14.014c2.158 9.113 3.646 28.914 4.882 45.355 3.147 41.878 7.457 99.232 26.142 146.654 23.475 59.58 64.227 89.79 121.122 89.79 56.407 0 96.803-29.733 120.066-88.372 18.549-46.753 22.907-103.828 26.089-145.503 1.339-17.534 2.958-38.723 5.395-47.926h14.839c8.284 0 15-6.716 15-15s-6.716-15-15-15h-332.549c-8.284 0-15 6.716-15 15 0 8.286 6.716 15.002 15 15.002zm142.035 76.642 21.12-12.8c1.28-.8 2.88-1.12 4.641-1.12 5.12 0 11.04 3.04 11.04 7.84v101.762c0 5.12-6.24 7.68-12.48 7.68s-12.481-2.56-12.481-7.68v-81.442l-4.64 2.88c-1.44.96-2.88 1.28-4 1.28-4.641 0-7.841-4.96-7.841-9.92 0-3.36 1.441-6.56 4.641-8.48z"/></svg>
			</div>
			<div class="ae-notice-content">
				<p><?php esc_html_e( 'To thank you for being a loyal Aeon user, we want to offer you the opportunity to participate in our monthly contest where you can win a free license for Aeon Pro, just click the button and take your chance to win!', 'aeonwp' ); ?></p>

				<div class="ae-notice-buttons">
					<a href="https://www.atmostfear-entertainment.com/contest?utm_source=wp_dashboard&utm_medium=notice" rel="nofollow" target="_blank"><?php esc_html_e( 'I want to participate', 'aeonwp' ); ?></a>
					<a href="<?php echo esc_url_raw( $dismiss_url ); ?>" class="ae-notice-dismiss"><?php esc_html_e( 'No thanks', 'aeonwp' ); ?></a>
				</div>
			</div>
			<button type="button" class="notice-dismiss ae-notice-dismiss"><span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', 'aeonwp' ); ?></span></button>
		</div>
		<?php
	}

	/**
	 * Enqueue scripts.
	 *
	 * @access public
	 */
	public function enqueue_scripts() {
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		wp_enqueue_style( 'aeon-notice', AEON_THEME_URI . 'assets/css/admin/notice' . $suffix . '.css', array(), AEON_VERSION );
		wp_enqueue_script( 'aeon-notice', AEON_THEME_URI . 'assets/js/admin/notice' . $suffix . '.js', array(), AEON_VERSION, true );
	
		wp_localize_script(
			'aeon-notice',
			'aeNotice',
			apply_filters(
				'aeon_localize_js_notice',
				array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
				)
			)
		);
	}

	/**
	 * Get user notices.
	 *
	 * Retrieve the list of notices for the current user.
	 *
	 * @access private
	 * @static
	 *
	 * @return array A list of user notices.
	 */
	private static function get_user_notices() {
		return get_user_meta( get_current_user_id(), self::ADMIN_NOTICES_KEY, true );
	}

	/**
	 * Is user notice viewed.
	 *
	 * Whether the notice was viewed by the user.
	 *
	 * @access public
	 * @static
	 *
	 * @param int $notice_id The notice ID.
	 *
	 * @return bool Whether the notice was viewed by the user.
	 */
	public static function is_user_notice_viewed( $notice_id ) {
		$notices = self::get_user_notices();

		if ( empty( $notices ) || empty( $notices[ $notice_id ] ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Set admin notice as viewed.
	 *
	 * Flag the user admin notice as viewed using an authenticated ajax request.
	 *
	 * Fired by `wp_ajax_ae_set_admin_notice_viewed` action.
	 *
	 * @access public
	 * @static
	 */
	public static function ajax_set_admin_notice_viewed() {
		if ( empty( $_REQUEST['notice_id'] ) ) {
			wp_die();
		}

		$notices = self::get_user_notices();
		if ( empty( $notices ) ) {
			$notices = [];
		}

		$notices[ $_REQUEST['notice_id'] ] = 'true';
		update_user_meta( get_current_user_id(), self::ADMIN_NOTICES_KEY, $notices );

		if ( ! wp_doing_ajax() ) {
			wp_safe_redirect( admin_url() );
			die;
		}

		wp_die();
	}
}
Aeon_Notices::get_instance();
