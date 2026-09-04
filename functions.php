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

// Pattern files call these helpers during registration on `init`.
require_once __DIR__ . '/src/helpers.php';

// Theme-level classes are bootstrapped via Composer files autoload (src/bootstrap.php).
// Register the framework immediately so after_setup_theme and init annotations attach in time.
Aegis::register( __FILE__ );

\Aegis\Utilities\I18n::register( \Aegis\Utilities\Data::from( __FILE__ ) );

// #region agent log
add_action(
	'enqueue_block_editor_assets',
	static function (): void {
		wp_add_inline_script(
			'wp-blocks',
			"wp.domReady(function(){try{var t=wp.blocks.getBlockType('aegis/related-posts');fetch('http://127.0.0.1:7476/ingest/8a732b3e-1610-45fd-acd4-f298ec12f1e6',{method:'POST',headers:{'Content-Type':'application/json','X-Debug-Session-Id':'286df9'},body:JSON.stringify({sessionId:'286df9',hypothesisId:'C',location:'functions.php:editor',message:'client related-posts block type',data:{hasType:!!t,name:t&&t.name,hasEdit:!!(t&&t.edit),title:t&&t.title},timestamp:Date.now()})}).catch(function(){});}catch(e){}});",
			'after'
		);
	},
	20
);
// #endregion
