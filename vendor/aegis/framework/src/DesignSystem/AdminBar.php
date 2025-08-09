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
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare( strict_types=1 );

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports interfaces and helpers for styling and admin bar detection.
use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function is_admin_bar_showing;

// Implements the AdminBar class to support admin bar rendering and asset management.

/**
 * Customizes the WordPress Admin Bar.
 *
 * This class disables the default styling for the WordPress admin bar and
 * enqueues a custom stylesheet, allowing the theme to have full control over
 * the admin bar's appearance.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */
class AdminBar implements Styleable {

	/**
	 * Conditionally enqueues the custom stylesheet for the admin bar.
	 *
	 * This method ensures that the `admin-bar.css` file is only loaded on pages
	 * where the admin bar is actually being displayed.
	 *
	 * @since 1.0.0
	 *
	 * @param Styles $styles The Styles service instance.
	 */
	public function styles( Styles $styles ): void {
		$styles->add_file(
			'components/admin-bar.css',
			[],
			is_admin_bar_showing()
		);
	}

	/**
	 * Removes the default inline styles for the admin bar.
	 *
	 * This method hooks into `after_setup_theme` to unhook the default WordPress
	 * function that prints the admin bar's CSS to the page header. This prevents
	 * default styles from conflicting with the theme's custom stylesheet.
	 *
	 * @since 1.0.0
	 *
	 * @hook   after_setup_theme
	 */
	public function remove_default_callback() {
		// By passing `__return_false` as the callback, we effectively disable
		// the default `_admin_bar_bump_cb` function.
		add_theme_support( 'admin-bar', [
			'callback' => '__return_false',
		] );
	}
}
