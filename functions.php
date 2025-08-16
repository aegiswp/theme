<?php
/**
 * Aegis Theme Functions
 *
 * Initializes the Aegis theme, setting up the autoloader and registering
 * core theme services with the Aegis framework.
 *
 * Responsibilities:
 * - Load the Composer autoloader for dependency management.
 * - Register the theme with the Aegis framework to kickstart functionality.
 *
 * @package    Aegis
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * This is the primary entry point for the Aegis theme. It ensures that all
 * necessary components are loaded and initialized.
 */

// Enforces strict type checking for all code in this file.
declare( strict_types=1 );

// Loads the Composer autoloader to manage all PHP dependencies.
require_once __DIR__ . '/vendor/autoload.php';

// Registers the theme with the Aegis framework, initializing its core functionality.
Aegis::register( __FILE__ );
