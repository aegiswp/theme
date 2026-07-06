<?php
/**
 * Admin Menu
 *
 * Dashboard menu, tab chrome hooks, and shared admin asset enqueueing.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

namespace Aegis\Admin;

/**
 * Admin Menu class.
 */
class AdminMenu {

	/**
	 * Renderer instance for page callbacks.
	 *
	 * @var AdminRenderer
	 */
	private AdminRenderer $renderer;

	/**
	 * Constructor.
	 *
	 * @param AdminRenderer $renderer Renderer instance.
	 */
	public function __construct( AdminRenderer $renderer ) {
		$this->renderer = $renderer;
	}

	/**
	 * Initialize the settings page.
	 *
	 * @return void
	 */
	public function init(): void {
		add_action( 'admin_menu', array( $this, 'register_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		// Fix admin menu highlighting for hidden submenu pages.
		add_filter( 'parent_file', array( $this, 'fix_admin_parent_file' ) );
		add_filter( 'submenu_file', array( $this, 'fix_admin_submenu_file' ) );

		add_action( 'aegis_admin_before_blocks_page', array( $this->renderer, 'render_blocks_chrome' ) );
		add_action( 'aegis_admin_before_modals_page', array( $this->renderer, 'render_modals_chrome' ) );
		add_action( 'aegis_admin_before_hooks_page', array( $this->renderer, 'render_hooks_chrome' ) );
		add_action( 'aegis_admin_before_conditionals_page', array( $this->renderer, 'render_conditionals_chrome' ) );
		add_action( 'aegis_admin_before_integrations_page', array( $this->renderer, 'render_integrations_chrome' ) );
		add_action( 'aegis_admin_before_general_settings_page', array( $this->renderer, 'render_general_settings_chrome' ) );
		add_action( 'aegis_admin_before_license_page', array( $this->renderer, 'render_license_chrome' ) );

		add_action( 'admin_menu', array( $this, 'hide_tab_submenu_items' ), 999 );
	}

	/**
	 * Remove tab-only pages from the sidebar (pages stay registered for direct URLs).
	 *
	 * @return void
	 */
	public function hide_tab_submenu_items(): void {
		global $submenu;

		if ( ! isset( $submenu['aegis-dashboard'] ) ) {
			return;
		}

		$hidden_slugs = array(
			'aegis-integrations',
			'aegis-general-settings',
			'aegis-license',
		);

		foreach ( $submenu['aegis-dashboard'] as $index => $item ) {
			if ( isset( $item[2] ) && in_array( $item[2], $hidden_slugs, true ) ) {
				unset( $submenu['aegis-dashboard'][ $index ] );
			}
		}

		// Collapse duplicate Dashboard entries to a single sidebar item.
		$dashboard_seen = false;
		foreach ( $submenu['aegis-dashboard'] as $index => $item ) {
			if ( ! isset( $item[2] ) || $item[2] !== 'aegis-dashboard' ) {
				continue;
			}
			if ( $dashboard_seen ) {
				unset( $submenu['aegis-dashboard'][ $index ] );
				continue;
			}
			$dashboard_seen = true;
			// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited -- Intentional relabelling of the theme's own submenu entry.
			$submenu['aegis-dashboard'][ $index ][0] = esc_html__( 'Aegis', 'aegis' );
		}
	}

	/**
	 * Fix parent file for admin menu highlighting.
	 *
	 * @param string $parent_file The parent file.
	 * @return string
	 */
	public function fix_admin_parent_file( string $parent_file ): string {
		global $pagenow;

		if ( $pagenow === 'admin.php' ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$page = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '';

			// Match any page starting with 'aegis-' to keep menu active.
			if ( str_starts_with( $page, 'aegis-' ) ) {
				return 'aegis-dashboard';
			}
		}

		return $parent_file;
	}

	/**
	 * Fix submenu file for admin menu highlighting.
	 *
	 * @param string|null $submenu_file The submenu file.
	 * @return string|null
	 */
	public function fix_admin_submenu_file( ?string $submenu_file ): ?string {
		global $pagenow;

		if ( $pagenow === 'admin.php' ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$page = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '';

			// For hidden submenu pages, return null so WordPress doesn't
			// try to match against a non-existent submenu entry.
			if ( str_starts_with( $page, 'aegis-' ) && $page !== 'aegis-dashboard' ) {
				return null;
			}
		}

		return $submenu_file;
	}

	/**
	 * Register admin menu.
	 *
	 * @return void
	 */
	public function register_menu(): void {
		$icon = AdminRenderer::BRAND_ICON_DATA_URI;

		// Main menu - Dashboard as default.
		add_menu_page(
			esc_html__( 'Aegis', 'aegis' ),
			esc_html__( 'Aegis', 'aegis' ),
			'manage_options',
			'aegis-dashboard',
			array( $this->renderer, 'render_dashboard_page' ),
			$icon,
			59
		);

		// Required so WordPress resolves the dashboard screen title (see admin-header.php).
		add_submenu_page(
			'aegis-dashboard',
			esc_html__( 'Dashboard', 'aegis' ),
			esc_html__( 'Dashboard', 'aegis' ),
			'manage_options',
			'aegis-dashboard',
			array( $this->renderer, 'render_dashboard_page' )
		);
	}

	/**
	 * Enqueue admin assets.
	 *
	 * @param string $hook_suffix Current admin page.
	 * @return void
	 */
	public function enqueue_assets( string $hook_suffix ): void {
		if ( ! str_contains( $hook_suffix, 'aegis' ) ) {
			return;
		}

		$theme_dir  = get_template_directory();
		$theme_url  = get_template_directory_uri();
		$asset_file = $theme_dir . '/src/Admin/build/index.asset.php';

		if ( file_exists( $asset_file ) ) {
			// Load built/minified assets from webpack build.
			$asset = require $asset_file;

			// Use centralized AssetManager for consistent loading.
			\Aegis\Core\AssetManager::register_style(
				'aegis-admin-settings',
				$theme_url . '/src/Admin/build/index.css',
				array( 'dashicons', 'wp-components' ),
				$asset['version']
			);

			\Aegis\Core\AssetManager::register_script(
				'aegis-admin-settings',
				$theme_url . '/src/Admin/build/index.js',
				array_merge( $asset['dependencies'], array( 'jquery' ) ),
				$asset['version'],
				true
			);

			\Aegis\Core\AssetManager::enqueue_style( 'aegis-admin-settings' );
			\Aegis\Core\AssetManager::enqueue_script( 'aegis-admin-settings' );
		} else {
			// Fallback to source files (development without build).
			\Aegis\Core\AssetManager::register_style(
				'aegis-admin-settings',
				$theme_url . '/src/Admin/css/admin-settings.css',
				array( 'dashicons', 'wp-components' ),
				(string) time()
			);

			\Aegis\Core\AssetManager::register_script(
				'aegis-admin-settings',
				$theme_url . '/src/Admin/js/admin-settings.js',
				array( 'jquery' ),
				(string) time(),
				true
			);

			\Aegis\Core\AssetManager::enqueue_style( 'aegis-admin-settings' );
			\Aegis\Core\AssetManager::enqueue_script( 'aegis-admin-settings' );
		}

		// Highlight Aegis menu item with the active admin color scheme.
		$menu_active_css = '
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top,
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top:hover,
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top:focus,
			#adminmenu li.toplevel_page_aegis-dashboard.current > a.menu-top,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-has-current-submenu > a.menu-top,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-menu-open > a.menu-top {
				background-color: var(--wp-admin-theme-color, #3858e9) !important;
				color: #fff !important;
			}
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top .wp-menu-image:before,
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top:hover .wp-menu-image:before,
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top:focus .wp-menu-image:before,
			#adminmenu li.toplevel_page_aegis-dashboard.current > a.menu-top .wp-menu-image:before,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-has-current-submenu > a.menu-top .wp-menu-image:before,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-menu-open > a.menu-top .wp-menu-image:before {
				color: #fff !important;
			}
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top .wp-menu-image svg,
			#adminmenu li.toplevel_page_aegis-dashboard > a.menu-top .wp-menu-image svg path {
				fill: currentColor;
			}
			#adminmenu li.toplevel_page_aegis-dashboard.current > a.menu-top .wp-menu-image svg,
			#adminmenu li.toplevel_page_aegis-dashboard.current > a.menu-top .wp-menu-image svg path,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-has-current-submenu > a.menu-top .wp-menu-image svg,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-has-current-submenu > a.menu-top .wp-menu-image svg path,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-menu-open > a.menu-top .wp-menu-image svg,
			#adminmenu li.toplevel_page_aegis-dashboard.wp-menu-open > a.menu-top .wp-menu-image svg path {
				fill: #fff !important;
			}
		';
		wp_add_inline_style( 'aegis-admin-settings', $menu_active_css );

		\Aegis\Core\AssetManager::localize_script(
			'aegis-admin-settings',
			'aegisAdmin',
			array(
				'ajaxUrl' => admin_url( 'admin-ajax.php' ),
				'nonce'   => wp_create_nonce( 'aegis_settings_nonce' ),
				'saving'  => __( 'Saving...', 'aegis' ),
				'saved'   => __( 'Settings saved.', 'aegis' ),
				'error'   => __( 'Error saving settings.', 'aegis' ),
			)
		);
	}
}
