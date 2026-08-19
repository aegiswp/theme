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

( new CompanionNotice() )->init();

BlockRegistrar::init();
