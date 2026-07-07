<?php
/**
 * FIX-WP7-EDITOR-RTC: Block editor overlay compatibility fix.
 *
 * Workaround for WP 7.0 real-time collaboration overlay blocking editor clicks.
 * Neutralizes .block-canvas-cover and .collaborators-overlay-full positioning.
 *
 * @todo Remove when core fixes RTC overlay pointer-events interception.
 *
 * @package Aegis
 * @since   1.0.0
 */

// Enforces strict type checking for all code in this file, ensuring type safety for fix-wp7-editor-rtc: block editor overlay compatibility fix.
declare( strict_types=1 );

// Declares the namespace for the fix-wp7-editor-rtc: block editor overlay compatibility fix.
namespace Aegis\Editor;

// Imports classes, interfaces, and functions used by the fix-wp7-editor-rtc: block editor overlay compatibility fix.
use Aegis\Utilities\Debug;

use function add_action;
use function file_exists;
use function filemtime;
use function get_template_directory;
use function get_template_directory_uri;
use function is_admin;
use function wp_enqueue_style;
use function wp_register_style;
use function wp_style_is;

/**
 * Enqueues editor CSS that overrides collaborator overlay positioning.
 */
class EditorOverlayFix {

	/**
	 * Stylesheet handle for the editor overlay fix.
	 *
	 * @var string
	 */
	private const HANDLE = 'aegis-editor-overlay-fix';

	/**
	 * Register editor asset hooks.
	 *
	 * @return void
	 */
	public function init(): void {
		// Enqueue overlay fix styles in the editor canvas and chrome.
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_styles' ), 999 );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_styles' ), 999 );
	}

	/**
	 * Enqueue overlay fix styles in the block editor canvas and chrome.
	 *
	 * @return void
	 */
	public function enqueue_styles(): void {
		// Only load in admin where the block editor runs.
		if ( ! is_admin() ) {
			return;
		}

		$file = get_template_directory() . '/src/Editor/css/editor-overlay-fix.css';

		if ( ! file_exists( $file ) ) {
			return;
		}

		// Bust cache in debug mode; depend on wp-edit-blocks when registered.
		$version = Debug::is_enabled() ? (string) filemtime( $file ) : '1.0.0';
		$deps    = wp_style_is( 'wp-edit-blocks', 'registered' ) ? array( 'wp-edit-blocks' ) : array();

		wp_register_style(
			self::HANDLE,
			get_template_directory_uri() . '/src/Editor/css/editor-overlay-fix.css',
			$deps,
			$version
		);

		wp_enqueue_style( self::HANDLE );
	}
}
