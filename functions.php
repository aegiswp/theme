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

// Load the Plugin Update Checker Library
$pucPath = __DIR__ . '/inc/plugin-update-checker/plugin-update-checker.php';
if (file_exists($pucPath)) {
    require_once $pucPath;
}

// Registers the Aegis Framework, initializing all its components and services.
Aegis::register(__FILE__);

// Initialize the GitHub Updater (Public Repo)
if (class_exists('YahnisElsts\PluginUpdateChecker\v5\PucFactory')) {
    $myUpdateChecker = YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker(
        'https://github.com/aegiswp/theme', // Public URL
        __FILE__,                           // Full path to this file
        'aegis'                             // Theme slug
    );

    // GitHub branch to watch
    $myUpdateChecker->setBranch('main');

}
