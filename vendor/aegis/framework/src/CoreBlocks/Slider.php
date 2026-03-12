<?php
/**
 * Slider Block Registration
 *
 * Registers the Slider and Slide blocks with WordPress.
 *
 * Responsibilities:
 * - Registers the aegis/slider parent block and the aegis/slide child
 *   block using block.json metadata, gated behind the admin
 *   conditional-logic settings
 * - Provides slider/carousel functionality with support for images,
 *   videos, and custom content, along with multiple navigation and
 *   transition options
 * - Conditionally enqueues shared lightbox CSS and JS assets on the
 *   front end when the slider_lightbox feature is enabled
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file.
declare( strict_types=1 );

// Declares the namespace for core block registrations within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports classes and functions used throughout this file.
use Aegis\Framework\ServiceProvider;
use WP_Block_Type_Registry;
use function class_exists;
use function file_exists;
use function get_template_directory;
use function get_template_directory_uri;
use function register_block_type;
use function wp_enqueue_script;
use function wp_enqueue_style;
use function wp_register_script;
use function wp_register_style;
use function wp_script_is;
use function wp_style_is;

/**
 * Slider block.
 *
 * Handles registration for the aegis/slider parent block and the
 * aegis/slide child block. Together they provide slider/carousel
 * functionality supporting images, videos, and custom content with
 * multiple navigation and transition options. A shared lightbox
 * overlay is conditionally enqueued when the slider_lightbox feature
 * is active.
 *
 * Registration is gated behind the admin conditional-logic settings
 * so site owners can disable the block without code changes.
 *
 * @since 1.0.0
 */
class Slider
{
	/**
	 * Whether the lightbox assets have been enqueued.
	 *
	 * Prevents duplicate registration and enqueueing when multiple
	 * slider blocks appear on the same page.
	 *
	 * @since 1.0.0
	 *
	 * @var bool
	 */
	private bool $lightbox_enqueued = false;

	/**
	 * Register the slider and slide blocks with WordPress.
	 *
	 * Checks whether the block is enabled in the admin
	 * conditional-logic settings, then registers both
	 * `aegis/slider` and `aegis/slide` via their respective
	 * `block.json` files. Each block is only registered when it is
	 * not already present in the `WP_Block_Type_Registry` and the
	 * metadata file exists. Silently returns when disabled.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 *
	 * @return void
	 */
	public function register_block(): void
	{
		// Check if block is enabled in admin settings.
		if ( ! ServiceProvider::is_block_enabled( 'slider' ) ) {
			return;
		}

		$registry = WP_Block_Type_Registry::get_instance();

		// Register the slider block.
		$slider_path = get_template_directory() . '/src/Blocks/slider';

		if ( ! $registry->is_registered( 'aegis/slider' ) && file_exists( $slider_path . '/block.json' ) ) {
			register_block_type( $slider_path );
		}

		// Register the slide block.
		$slide_path = get_template_directory() . '/src/Blocks/slide';

		if ( ! $registry->is_registered( 'aegis/slide' ) && file_exists( $slide_path . '/block.json' ) ) {
			register_block_type( $slide_path );
		}
	}

	/**
	 * Conditionally enqueue lightbox assets for the slider block.
	 *
	 * When the `slider_lightbox` feature is enabled, registers (if
	 * not already registered by `Image::register_lightbox_assets()`)
	 * and enqueues the shared `aegis-image-lightbox` CSS and JS so
	 * the slider's lightbox overlay is styled consistently with the
	 * core/image lightbox. Assets are enqueued only once per request
	 * via the `$lightbox_enqueued` flag.
	 *
	 * @since 1.0.0
	 *
	 * @hook  render_block_aegis/slider
	 *
	 * @param string $block_content The original block HTML.
	 *
	 * @return string The unmodified block HTML.
	 */
	public function enqueue_lightbox_assets( string $block_content ): string
	{
		if ( $this->lightbox_enqueued ) {
			return $block_content;
		}

		// Only enqueue if the slider_lightbox feature is enabled.
		if ( ! ServiceProvider::is_block_enabled( 'slider_lightbox' ) ) {
			return $block_content;
		}

		// Delegate registration to Image so handles are defined in one place.
		Image::register_lightbox_assets_static();

		wp_enqueue_style( 'aegis-image-lightbox' );
		wp_enqueue_script( 'aegis-image-lightbox' );

		$this->lightbox_enqueued = true;

		return $block_content;
	}
}
