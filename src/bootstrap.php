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
use Aegis\Admin\GitHubUpdater;
use Aegis\Blocks\BlockRegistrar;
use Aegis\Icons\Icon;
use Aegis\NavigationFallback;
use Aegis\PatternDependencies;

( new CompanionNotice() )->init();
( new GitHubUpdater() )->init();

BlockRegistrar::init();
NavigationFallback::init();
PatternDependencies::init();

// Theme payment icon sets (theme-adaptive + optional brand colors).
Icon::register_icon_set( 'payment', get_template_directory() . '/assets/icons/payment' );
Icon::register_icon_set( 'payment-brand', get_template_directory() . '/assets/icons/payment-brand' );

// Single-color (currentColor) integration plugin marks, used by the custom landing patterns.
Icon::register_icon_set( 'integrations', get_template_directory() . '/assets/icons/integrations' );

// Ensure payment-icon layout CSS reaches the Site Editor canvas.
add_action(
	'after_setup_theme',
	static function (): void {
		add_editor_style( 'style.css' );
	}
);
