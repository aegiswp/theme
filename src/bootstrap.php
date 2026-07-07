<?php
/**
 * Theme Bootstrap
 *
 * Initializes all theme-level src/ classes. This file is loaded
 * automatically via Composer's `files` autoload, so no manual
 * require_once calls are needed in functions.php.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

// Bail when loaded outside WordPress. Composer CLI tooling (PHPCS, PHPUnit,
// composer scripts) includes vendor/autoload.php, which loads this file via
// the `files` autoload rule before WordPress functions exist.
if ( ! function_exists( 'add_action' ) ) {
	return;
}

use Aegis\Admin\CompanionNotice;
use Aegis\Admin\ConditionalLogicSettings;
use Aegis\Core\AssetManager;
use Aegis\Editor\EditorOverlayFix;
use Aegis\HookPatternsRenderer;
use Aegis\Checkout\MultiStep;
use Aegis\CoreBlocks\Breadcrumbs;
use Aegis\Navigation\Overlay;
use Aegis\BlockPatternsRest;
use Aegis\Blocks\BlockRegistrar;
use Aegis\TemplatePatternExpander;

// Initialize centralized asset management first.
AssetManager::init();

( new EditorOverlayFix() )->init();

( new CompanionNotice() )->init();

BlockRegistrar::init();

TemplatePatternExpander::boot();
BlockPatternsRest::boot();

// Prevent WordPress core from scanning the patterns/ directory.
// The framework (Aegis\Framework\DesignSystem\Patterns) handles registration
// with computed slugs ({category}-{slug}). Core would register duplicates
// using the raw Slug header, doubling the patterns REST payload.
add_filter( 'theme_block_pattern_files', '__return_empty_array' );

add_action(
	'init',
	static function (): void {
		if ( is_admin() && class_exists( \Aegis\Plugin\Conditionals\Settings::class ) ) {
			ConditionalLogicSettings::get_instance()->init();
		}
		( new MultiStep() )->init();
		( new Overlay() )->init();
		( new Breadcrumbs() )->init();
	}
);

// Register hook pattern rendering on template_redirect (frontend only).
add_action(
	'template_redirect',
	static function (): void {
		( new HookPatternsRenderer() )->init();
	}
);
