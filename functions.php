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

// Configure the theme updater for GitHub releases (must be before Aegis::register).
add_filter('aegis_theme_updater_config', function () {
    return [
        'repo' => 'aegiswp/theme',
        'slug' => 'aegis',
    ];
});

// Registers the Aegis Framework, initializing all its components and services.
Aegis::register(__FILE__);

// Bootstraps theme-level classes (admin settings, analytics, navigation, etc.).
require_once __DIR__ . '/src/bootstrap.php';

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
