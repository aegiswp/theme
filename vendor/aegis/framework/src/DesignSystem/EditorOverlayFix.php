<?php
/**
 * FIX-WP7-EDITOR-RTC: Block editor overlay compatibility fix.
 *
 * Workaround for WP 7.0 real-time collaboration overlay blocking editor clicks.
 * Neutralizes .block-canvas-cover and .collaborators-overlay-full positioning.
 *
 * @todo Remove when core fixes RTC overlay pointer-events interception.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\DesignSystem;

use Aegis\Framework\InlineAssets\Styles;
use Aegis\Utilities\Debug;

use function file_exists;
use function filemtime;
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
	 * Styles service (package public/css/).
	 *
	 * @var Styles
	 */
	private Styles $styles;

	/**
	 * Constructor.
	 *
	 * @param Styles $styles Inlinable styles service.
	 */
	public function __construct( Styles $styles ) {
		$this->styles = $styles;
	}

	/**
	 * Enqueue overlay fix styles in the block editor canvas and chrome.
	 *
	 * @hook enqueue_block_assets 999
	 * @hook enqueue_block_editor_assets 999
	 *
	 * @return void
	 */
	public function enqueue_styles(): void {
		if ( ! is_admin() ) {
			return;
		}

		$file = $this->styles->dir . 'editor/editor-overlay-fix.css';

		if ( ! file_exists( $file ) ) {
			return;
		}

		$version = Debug::is_enabled() ? (string) filemtime( $file ) : '1.0.0';
		$deps    = wp_style_is( 'wp-edit-blocks', 'registered' ) ? array( 'wp-edit-blocks' ) : array();

		wp_register_style(
			self::HANDLE,
			$this->styles->url . 'editor/editor-overlay-fix.css',
			$deps,
			$version
		);

		wp_enqueue_style( self::HANDLE );
	}
}
