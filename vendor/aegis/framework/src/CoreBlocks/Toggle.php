<?php
/**
 * Toggle Block Registration
 *
 * Registers the Toggle and Toggle Content blocks with WordPress.
 *
 * Responsibilities:
 * - Registers the aegis/toggle parent block and the aegis/toggle-content
 *   child block using block.json metadata, gated behind the admin
 *   conditional-logic settings
 * - Provides expandable/collapsible toggle functionality for showing
 *   and hiding content sections
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

// Imports functions used throughout this file.
use Aegis\Framework\ServiceProvider;
use WP_Block_Type_Registry;
use function file_exists;
use function get_template_directory;
use function register_block_type;

/**
 * Toggle block.
 *
 * Handles registration for the aegis/toggle parent block and the
 * aegis/toggle-content child block. Together they provide
 * expandable/collapsible toggle functionality for showing and
 * hiding content sections. Pro features (URL sync, animations,
 * FAQ schema, etc.) are extended via the aegis-pro plugin.
 *
 * Registration is gated behind the admin conditional-logic settings
 * so site owners can disable the block without code changes.
 *
 * @since 1.0.0
 */
class Toggle
{
	/**
	 * Register the toggle and toggle-content blocks with WordPress.
	 *
	 * Checks whether the block is enabled in the admin
	 * conditional-logic settings, then registers both
	 * `aegis/toggle` and `aegis/toggle-content` via their
	 * respective `block.json` files. Each block is only registered
	 * when its metadata file exists. Silently returns when the
	 * block is disabled.
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
		if ( ! ServiceProvider::is_block_enabled( 'toggle' ) ) {
			return;
		}

		$registry = WP_Block_Type_Registry::get_instance();

		// Register the toggle block.
		$toggle_path = get_template_directory() . '/src/Blocks/toggle';

		if ( ! $registry->is_registered( 'aegis/toggle' ) && file_exists($toggle_path . '/block.json')) {
			register_block_type($toggle_path);
		}

		// Register the toggle-content block.
		$toggle_content_path = get_template_directory() . '/src/Blocks/toggle-content';

		if ( ! $registry->is_registered( 'aegis/toggle-content' ) && file_exists($toggle_content_path . '/block.json')) {
			register_block_type($toggle_content_path);
		}
	}
}
