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

<<<<<<< Updated upstream
// Configure the theme updater for GitHub releases (must be before Aegis::register).
add_filter('aegis_theme_updater_config', function () {
    return [
        'repo' => 'aegiswp/theme',
        'slug' => 'aegis',
    ];
});

// Registers the Aegis Framework, initializing all its components and services.
Aegis::register( __FILE__ );

// Theme-level classes are bootstrapped via Composer files autoload (src/bootstrap.php).

/**
 * Block editor: suppress core `metadata.blockVisibility` support.
 *
 * WordPress 6.9+ adds a built-in "Visibility" inspector panel and Options-menu
 * entry via `supports.metadata.blockVisibility`. Aegis ships its own visibility
 * UI (`.aegis-visibility-panel`), so we strip the core support at registration
 * time to prevent duplicate controls. No client-side DOM hiding required.
 *
 * @see https://make.wordpress.org/core/2025/12/01/ability-to-hide-blocks/
 */
add_filter(
	'block_type_metadata',
	static function (array $metadata): array {
		if (isset($metadata['supports']['metadata']['blockVisibility'])) {
			unset($metadata['supports']['metadata']['blockVisibility']);
		}
		return $metadata;
	}
);

// Add resource hints for external resources (Performance Optimization).
add_filter('wp_resource_hints', function ($urls, $relation_type) {
	if ('dns-prefetch' === $relation_type) {
		// Add any external domains used by the theme.
		// Example: $urls[] = '//fonts.googleapis.com';
	}
	return $urls;
}, 10, 2);

// Ensure title-tag support is explicitly declared (SEO).
add_action('after_setup_theme', function () {
	add_theme_support('title-tag');
});
=======
// Pattern files call these helpers during registration on `init`.
require_once __DIR__ . '/src/helpers.php';

// Theme-owned register_block_pattern bridge (see src/BlockPatterns.php).
require_once __DIR__ . '/src/BlockPatterns.php';

add_action(
	'init',
	static function (): void {
		load_theme_textdomain( 'aegis', get_template_directory() . '/languages' );
	},
	0
);

add_action(
	'init',
	static function (): void {
		Aegis::register( __FILE__ );
	},
	5
);

// Theme-level classes are bootstrapped via Composer files autoload (src/bootstrap.php).

// Ensure title-tag support is explicitly declared (SEO).
add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'title-tag' );
	}
);
>>>>>>> Stashed changes
