<?php
/**
 * Theme Bootstrap
 *
 * Initializes theme-owned services. Framework engine services register via
 * Aegis::register() in functions.php.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

if ( ! function_exists( 'add_action' ) ) {
	return;
}

use Aegis\Admin\CompanionNotice;
use Aegis\Blocks\BlockRegistrar;
use Aegis\Icons\Icon;

( new CompanionNotice() )->init();

BlockRegistrar::init();

// Theme payment icon sets (theme-adaptive + optional brand colors).
Icon::register_icon_set( 'payment', get_template_directory() . '/assets/icons/payment' );
Icon::register_icon_set( 'payment-brand', get_template_directory() . '/assets/icons/payment-brand' );

// Ensure payment-icon layout CSS reaches the Site Editor canvas.
add_action(
	'after_setup_theme',
	static function (): void {
		add_editor_style( 'style.css' );
	}
);
