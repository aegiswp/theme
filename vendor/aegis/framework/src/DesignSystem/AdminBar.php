<?php
/**
 * AdminBar.php
 *
 * Handles the admin bar design system logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\DesignSystem
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\DesignSystem;

use Aegis\Framework\InlineAssets\Styleable;
use Aegis\Framework\InlineAssets\Styles;
use function is_admin_bar_showing;

/**
 * Admin bar.
 *
 * @since 1.0.0
 */
class AdminBar implements Styleable {

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
	 * Removes the default callback for the admin bar.
	 *
	 * @since 1.0.0
	 *
	 * @hook  after_setup_theme
	 *
	 * @return void
	 */
	public function remove_default_callback() {
		add_theme_support( 'admin-bar', [
			'callback' => '__return_false',
		] );
	}
}
