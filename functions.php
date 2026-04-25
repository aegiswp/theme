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
 * Block editor: core `metadata.blockVisibility` UI alignment with Aegis.
 *
 * - Registers `aegis-editor-block-visibility-canvas` script + style (priority `1` so
 *   gettext filters run before most editor code).
 * - JS: renames default-domain Hide/Show/Hidden/Visible strings; hides duplicate
 *   items in the block Options menu and the core inspector "Visibility" panel
 *   (Aegis's `.aegis-visibility-panel` is left intact).
 *
 * Assets: `assets/js/editor-block-visibility-canvas.js`, `assets/css/editor-block-visibility-canvas.css`.
 */
add_action(
	'enqueue_block_editor_assets',
	static function (): void {
		$path = get_template_directory() . '/assets/js/editor-block-visibility-canvas.js';
		if (! is_readable($path)) {
			return;
		}
		wp_enqueue_script(
			'aegis-editor-block-visibility-canvas',
			get_template_directory_uri() . '/assets/js/editor-block-visibility-canvas.js',
			[ 'wp-hooks', 'wp-i18n', 'wp-dom-ready' ],
			(string) filemtime($path),
			true
		);
		$style_path = get_template_directory() . '/assets/css/editor-block-visibility-canvas.css';
		if (is_readable($style_path)) {
			wp_enqueue_style(
				'aegis-editor-block-visibility-canvas',
				get_template_directory_uri() . '/assets/css/editor-block-visibility-canvas.css',
				[],
				(string) filemtime($style_path)
			);
		}
	},
	1
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
