<?php
/**
 * Theme bootstrap and public hooks
 *
 * Main entry for the Aegis block theme. Loads Composer, registers the framework,
 * and wires theme-level WordPress hooks that are not part of `src/bootstrap.php`
 * (that file is autoloaded and registers `init` services only).
 *
 * Responsibilities in this file:
 * - `vendor/autoload.php` — PSR-4 and Composer `files` (`src/bootstrap.php`).
 * - GitHub release updater config filter (`aegis_theme_updater_config`).
 * - `Aegis::register( __FILE__ )` — framework and design system.
 * - Block editor: core canvas visibility UI overrides (see assets below).
 * - `wp_resource_hints` — optional DNS-prefetch targets.
 * - `title-tag` — theme support.
 *
 * @package Aegis
 * @since 1.0.0
 * @link https://github.com/aegiswp/theme
 * @author Atmostfear Entertainment
 */

// Enforces strict type checking for all code in this file.
declare(strict_types=1);

// Includes the Composer-generated autoloader to make all dependencies available.
require_once __DIR__ . '/vendor/autoload.php';

// Configure the theme updater for GitHub releases (must be before Aegis::register).
function aegis_theme_updater_config(): array {
    return [
        'repo' => 'aegiswp/theme',
        'slug' => 'aegis',
    ];
}
add_filter( 'aegis_theme_updater_config', 'aegis_theme_updater_config' );

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
function aegis_suppress_block_visibility( array $metadata ): array {
	if ( isset( $metadata['supports']['metadata']['blockVisibility'] ) ) {
		unset( $metadata['supports']['metadata']['blockVisibility'] );
	}
	return $metadata;
}
add_filter( 'block_type_metadata', 'aegis_suppress_block_visibility' );

// Add resource hints for external resources (Performance Optimization).
function aegis_resource_hints( $urls, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		// Add any external domains used by the theme.
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'aegis_resource_hints', 10, 2 );

// Ensure title-tag support is explicitly declared (SEO).
function aegis_setup_theme(): void {
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'aegis_setup_theme' );
