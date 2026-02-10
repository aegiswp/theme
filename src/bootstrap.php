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
use Aegis\Checkout\MultiStep;
use Aegis\Navigation\Overlay;

add_action( 'init', static function (): void {
	( new ConditionalLogicSettings() )->init();
	( new MultiStep() )->init();
	( new Overlay() )->init();
} );
