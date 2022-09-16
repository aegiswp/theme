<?php
/**
 * Aeon functions and definitions.
 * 
 * Please do not make any edits to this file. All edits should be done in a child theme.
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aeon
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'AEON_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'AEON_VERSION', '1.0.0' );
}
define( 'AEON_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'AEON_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

if ( ! function_exists( 'aeon_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aeon_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you are building a theme based on Aeon, use a find and replace
		 * to change 'aeonwp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aeonwp', AEON_THEME_DIR . 'languages' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support( 'woocommerce' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'yoast-seo-breadcrumbs' );
		add_theme_support( 'rank-math-breadcrumbs' );
		add_theme_support( 'lifterlms-sidebars' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo',
			array(
				'height' => 80,
				'width' => 350,
				'flex-width' => true,
				'flex-height' => true,
			)
		);

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( 'assets/css/admin/editor-style.css' );
	}
	add_action( 'after_setup_theme', 'aeon_setup' );
}

if ( ! function_exists( 'aeon_register_menu' ) ) {
	/**
	 * Register Primary Menu.
	 */
	function aeon_register_menu() {
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary Menu', 'aeonwp' ),
			)
		);
	}
	add_action( 'init', 'aeon_register_menu', 5 );
}

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aeon_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'aeonwp' ),
			'id'            => 'aeon-sidebar',
			'description'   => esc_html__( 'This sidebar will be used as your main sidebar.', 'aeonwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'aeonwp' ),
			'id'            => 'aeon-footer-1',
			'description'   => esc_html__( 'This sidebar will be used for your footer.', 'aeonwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'aeonwp' ),
			'id'            => 'aeon-footer-2',
			'description'   => esc_html__( 'This sidebar will be used for your footer.', 'aeonwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'aeonwp' ),
			'id'            => 'aeon-footer-3',
			'description'   => esc_html__( 'This sidebar will be used for your footer.', 'aeonwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'aeonwp' ),
			'id'            => 'aeon-footer-4',
			'description'   => esc_html__( 'This sidebar will be used for your footer.', 'aeonwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 5', 'aeonwp' ),
			'id'            => 'aeon-footer-5',
			'description'   => esc_html__( 'This sidebar will be used for your footer.', 'aeonwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 6', 'aeonwp' ),
			'id'            => 'aeon-footer-6',
			'description'   => esc_html__( 'This sidebar will be used for your footer.', 'aeonwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'aeon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aeon_scripts() {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	// Main style.css file.
	wp_enqueue_style( 'aeon-style', AEON_THEME_URI . 'assets/css/style' . $suffix . '.css', array(), AEON_VERSION );
	wp_style_add_data( 'aeon-style', 'rtl', 'replace' );

	// Navigation script.
	wp_enqueue_script( 'aeon-navigation', AEON_THEME_URI . 'assets/js/navigation' . $suffix . '.js', array(), AEON_VERSION, true );

	wp_localize_script(
		'aeon-navigation',
		'aeLocalize',
		apply_filters(
			'aeon_localize_js_args',
			array(
				'openSubMenuLabel' => esc_attr__( 'Open Sub-Menu', 'aeonwp' ),
				'closeSubMenuLabel' => esc_attr__( 'Close Sub-Menu', 'aeonwp' ),
			)
		)
	);
	
	// Scroll Top script.
	wp_enqueue_script( 'aeon-scroll-top', AEON_THEME_URI . 'assets/js/scroll-top' . $suffix . '.js', array(), AEON_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aeon_scripts' );

/**
 * Get all necessary theme files.
 */
require AEON_THEME_DIR . 'inc/class-aeon-css.php';
require AEON_THEME_DIR . 'inc/css-output.php';
require AEON_THEME_DIR . 'inc/class-aeon-external-css.php';
require AEON_THEME_DIR . 'inc/class-aeon-theme-update.php';
require AEON_THEME_DIR . 'inc/block-editor.php';
require AEON_THEME_DIR . 'inc/class-aeon-breadcrumb-trail.php';

// Display notices if not white label enabled.
if ( defined( 'AEON_PRO_VERSION' ) && ! ae_is_module_active( 'ae_white_label', 'AEON_WHITE_LABEL' ) ) {
	require AEON_THEME_DIR . 'inc/class-aeon-notices.php';
}

/**
 * Implement site structure.
 */
require AEON_THEME_DIR . 'inc/structure/header.php';
require AEON_THEME_DIR . 'inc/structure/navigation.php';
require AEON_THEME_DIR . 'inc/structure/page-header.php';
require AEON_THEME_DIR . 'inc/structure/footer.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require AEON_THEME_DIR . 'inc/template-functions.php';

/**
 * WooCommerce class.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require AEON_THEME_DIR . 'inc/woocommerce-functions.php';
}

/**
 * Customizer additions.
 */
require_once AEON_THEME_DIR . 'inc/class-aeon-fonts.php';
require AEON_THEME_DIR . 'inc/customizer.php';
require AEON_THEME_DIR . 'inc/sections/typography.php';
require AEON_THEME_DIR . 'inc/class-aeon-webfont-loader.php';
