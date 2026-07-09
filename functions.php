<?php
/**
 * Theme Functions
 *
 * Main entry point for the Aegis theme. This file is responsible for
 * bootstrapping the theme by loading necessary files and initializing the
 * Aegis Framework.
 *
 * Responsibilities:
 * - Loads the Composer autoloader to make all dependencies available.
 * - Initializes the Aegis Framework by calling `Aegis::register()`.
 *
 * @package    Aegis
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 */

// Enforces strict type checking for all code in this file.
declare(strict_types=1);

// Includes the Composer-generated autoloader to make all dependencies available.
require_once __DIR__ . '/vendor/autoload.php';

// Pattern files call these helpers during registration on `init`.
require_once __DIR__ . '/src/helpers.php';

// Theme-owned register_block_pattern bridge (see src/BlockPatterns.php).
require_once __DIR__ . '/src/BlockPatterns.php';

add_action(
	'init',
	static function (): void {
		load_theme_textdomain( 'aegis', get_template_directory() . '/languages' );
	},
);

add_action(
	'init',
	static function (): void {
		Aegis::register( __FILE__ );
	},
);

// Theme-level classes are bootstrapped via Composer files autoload (src/bootstrap.php).

// Ensure title-tag support is explicitly declared (SEO).
add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'title-tag' );
	}
);
