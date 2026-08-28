<?php
/**
 * Admin Bar Component
 *
 * Provides support for rendering and managing the WordPress admin bar within the Aegis Framework.
 *
 * Responsibilities:
 * - Registers and manages admin bar styles and assets
 * - Integrates with the styles service for dynamic CSS loading
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for admin bar component.
declare( strict_types=1 );

// Declares the namespace for the admin bar component.
namespace Aegis\Framework\DesignSystem;

// Imports classes, interfaces, and functions used by the admin bar component.
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function is_admin_bar_showing;

class AdminBar implements Styleable {

	/**
	 * Constructor.
	 *
	 * Theme support must be declared before bump styles enqueue (wp_enqueue_scripts).
	 * Hooking after_setup_theme from ServiceProvider is too late because the framework
	 * boots on init.
	 */
	public function __construct() {
		$this->remove_default_callback();
	}

	/**
	 * Registers service with access to provider.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles Styles service.
	 *
	 * @return void
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'components/admin-bar.css',
			[],
			is_admin_bar_showing()
		);
	}

	/**
	 * Disables core admin-bar bump styles (html margin-top) for in-flow admin bar.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function remove_default_callback() {
		add_theme_support( 'admin-bar', [
			'callback' => '__return_false',
		] );
	}
}
