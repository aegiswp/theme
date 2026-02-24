<?php
/**
 * Centralized WordPress Asset Management
 *
 * Provides unified asset registration and loading for the Aegis theme
 * using WordPress core asset system with proper dependencies and caching.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Core;

use function add_action;
use function get_template_directory_uri;
use function has_block;
use function is_admin;
use function wp_register_style;
use function wp_register_script;
use function wp_enqueue_style;
use function wp_enqueue_script;
use function wp_localize_script;
use function wp_script_add_data;

class AssetManager {

	/**
	 * Registered assets cache.
	 *
	 * @var array
	 */
	private static array $registered = [];

	/**
	 * Initialize hooks and register core assets.
	 *
	 * @return void
	 */
	public static function init(): void {
		add_action( 'init', [ __CLASS__, 'register_core_assets' ] );
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'conditionally_enqueue_assets' ], 10 );
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'conditionally_enqueue_admin_assets' ], 10 );
	}

	/**
	 * Register all theme assets with WordPress system.
	 *
	 * @return void
	 */
	public static function register_core_assets(): void {
		$base_uri = get_template_directory_uri();

		// Navigation overlay assets
		self::register_style(
			'aegis-navigation-overlay',
			$base_uri . '/src/Navigation/css/overlay.css',
			[ 'wp-blocks', 'wp-navigation' ],
			'1.0.0'
		);

		// Checkout multi-step assets (only when WooCommerce is active)
		if ( class_exists( 'WooCommerce' ) ) {
			self::register_style(
				'aegis-checkout-multi-step',
				$base_uri . '/src/Checkout/css/multi-step.css',
				[ 'wc-checkout', 'woocommerce-general' ],
				'1.0.0'
			);

			self::register_script(
				'aegis-checkout-multi-step',
				$base_uri . '/src/Checkout/js/multi-step.js',
				[ 'jquery', 'wc-checkout', 'wp-blocks' ],
				'1.0.0',
				true
			);
		}

		// Breadcrumbs assets
		self::register_style(
			'aegis-breadcrumbs',
			$base_uri . '/src/CoreBlocks/css/breadcrumbs.css',
			[ 'wp-blocks' ],
			'1.0.0'
		);

	}

	/**
	 * Conditionally enqueue assets based on block presence.
	 *
	 * @return void
	 */
	public static function conditionally_enqueue_assets(): void {
		if ( is_admin() ) {
			return;
		}

		// Navigation overlay
		if ( has_block( 'core/navigation' ) ) {
			self::enqueue_style( 'aegis-navigation-overlay' );
		}

		// Checkout multi-step
		if ( has_block( 'woocommerce/checkout' ) || has_block( 'woocommerce/cart' ) ) {
			self::enqueue_style( 'aegis-checkout-multi-step' );
			self::enqueue_script( 'aegis-checkout-multi-step' );
		}

		// Breadcrumbs
		if ( has_block( 'core/breadcrumbs' ) ) {
			self::enqueue_style( 'aegis-breadcrumbs' );
		}

	}

	/**
	 * Conditionally enqueue admin assets.
	 *
	 * Admin assets are handled by ConditionalLogicSettings::enqueue_assets()
	 * which has build/source fallback logic. This hook is reserved for
	 * future centralized admin assets.
	 *
	 * @param string $hook Current admin page hook.
	 *
	 * @return void
	 */
	public static function conditionally_enqueue_admin_assets( string $hook ): void {
		// Admin assets are managed by ConditionalLogicSettings::enqueue_assets().
	}

	/**
	 * Register style with WordPress system.
	 *
	 * @param string $handle       Style handle.
	 * @param string $src          Style source URL.
	 * @param array  $dependencies  Dependencies.
	 * @param string $version      Version.
	 * @param string $media        Media.
	 *
	 * @return void
	 */
	public static function register_style(
		string $handle,
		string $src,
		array $dependencies = [],
		string $version = '1.0.0',
		string $media = 'all'
	): void {
		if ( isset( self::$registered['styles'][ $handle ] ) ) {
			return;
		}

		wp_register_style( $handle, $src, $dependencies, $version, $media );
		self::$registered['styles'][ $handle ] = true;
	}

	/**
	 * Register script with WordPress system.
	 *
	 * @param string $handle       Script handle.
	 * @param string $src          Script source URL.
	 * @param array  $dependencies  Dependencies.
	 * @param string $version      Version.
	 * @param bool   $in_footer    Load in footer.
	 *
	 * @return void
	 */
	public static function register_script(
		string $handle,
		string $src,
		array $dependencies = [],
		string $version = '1.0.0',
		bool $in_footer = true
	): void {
		if ( isset( self::$registered['scripts'][ $handle ] ) ) {
			return;
		}

		wp_register_script( $handle, $src, $dependencies, $version, $in_footer );
		self::$registered['scripts'][ $handle ] = true;
	}

	/**
	 * Enqueue style if registered.
	 *
	 * @param string $handle Style handle.
	 *
	 * @return void
	 */
	public static function enqueue_style( string $handle ): void {
		if ( ! isset( self::$registered['styles'][ $handle ] ) ) {
			return;
		}

		wp_enqueue_style( $handle );
	}

	/**
	 * Enqueue script if registered.
	 *
	 * @param string $handle Script handle.
	 *
	 * @return void
	 */
	public static function enqueue_script( string $handle ): void {
		if ( ! isset( self::$registered['scripts'][ $handle ] ) ) {
			return;
		}

		wp_enqueue_script( $handle );
	}

	/**
	 * Localize script with data.
	 *
	 * @param string $handle      Script handle.
	 * @param string $object_name JavaScript object name.
	 * @param array  $data        Data to localize.
	 *
	 * @return void
	 */
	public static function localize_script( string $handle, string $object_name, array $data ): void {
		if ( ! isset( self::$registered['scripts'][ $handle ] ) ) {
			return;
		}

		wp_localize_script( $handle, $object_name, $data );
	}

	/**
	 * Add script data.
	 *
	 * @param string $handle Script handle.
	 * @param string $key    Data key.
	 * @param mixed  $value  Data value.
	 *
	 * @return void
	 */
	public static function add_script_data( string $handle, string $key, $value ): void {
		if ( ! isset( self::$registered['scripts'][ $handle ] ) ) {
			return;
		}

		wp_script_add_data( $handle, $key, $value );
	}

	/**
	 * Check if asset is registered.
	 *
	 * @param string $handle Asset handle.
	 * @param string $type   Asset type ('style' or 'script').
	 *
	 * @return bool
	 */
	public static function is_registered( string $handle, string $type = 'style' ): bool {
		return isset( self::$registered[ $type . 's' ][ $handle ] );
	}

	/**
	 * Get registered assets.
	 *
	 * @return array
	 */
	public static function get_registered(): array {
		return self::$registered;
	}

	/**
	 * Clear registered assets cache.
	 *
	 * @return void
	 */
	public static function clear_cache(): void {
		self::$registered = [];
	}
}
