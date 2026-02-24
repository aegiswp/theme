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

use Aegis\Admin\ConditionalLogicSettings;
use Aegis\Admin\HookPatternsManager;
use Aegis\Core\AssetManager;
use Aegis\HookPatternsRenderer;
use Aegis\Checkout\MultiStep;
use Aegis\CoreBlocks\Breadcrumbs;
use Aegis\Navigation\Overlay;

// Initialize centralized asset management first.
AssetManager::init();

add_action( 'init', static function (): void {
	( new ConditionalLogicSettings() )->init();
	( new HookPatternsManager() )->init();
	( new MultiStep() )->init();
	( new Overlay() )->init();
	( new Breadcrumbs() )->init();
} );

// Register hook pattern rendering on template_redirect (frontend only).
add_action( 'template_redirect', static function (): void {
	( new HookPatternsRenderer() )->init();
} );
