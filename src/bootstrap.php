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
use Aegis\NavigationFallback;
use Aegis\PatternDependencies;

( new CompanionNotice() )->init();
( new GitHubUpdater() )->init();

BlockRegistrar::init();
NavigationFallback::init();
PatternDependencies::init();

// Ensure payment-icon layout CSS reaches the Site Editor canvas.
add_action(
	'after_setup_theme',
	static function (): void {
		add_editor_style( 'style.css' );
	}
);
