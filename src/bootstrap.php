<?php
/**
 * Autoloaded theme services (`init` hook)
 *
 * Loaded via Composer `autoload.files` in `composer.json` whenever `vendor/autoload.php`
 * is required. Do not `require` this file from `functions.php` directly.
 *
 * Each class below is constructed once on `init` and calls `->init()` to register
 * its own hooks. Add new services here and implement `init()` in the class.
 *
 * - `Aegis\Checkout\MultiStep` — WooCommerce checkout assets (multi-step UI).
 * - `Aegis\Navigation\Overlay` — `core/navigation` block style variations (overlay).
 * - `Aegis\CoreBlocks\Breadcrumbs` — filters for `core/breadcrumbs` with `aegis_doc` / `doc_space`.
 *
 * Deeper block logic, the framework package, and editor tooling generally live in
 * `vendor/aegis/framework` and optional plugins, not in this file.
 *
 * @package Aegis
 * @since 1.0.0
 * @link https://github.com/aegiswp/theme
 */

declare( strict_types=1 );

use Aegis\Checkout\MultiStep;
use Aegis\CoreBlocks\Breadcrumbs;
use Aegis\Navigation\Overlay;

function aegis_init_services(): void {
	if ( function_exists( 'Aegis\\Plugin\\is_active' ) ) {
		return; // Plugin owns these services now.
	}

	( new MultiStep() )->init();
	( new Overlay() )->init();
	( new Breadcrumbs() )->init();
}
add_action( 'init', 'aegis_init_services' );
