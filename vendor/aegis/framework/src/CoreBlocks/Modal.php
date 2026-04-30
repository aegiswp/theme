<?php
/**
 * Modal Block Registration
 *
 * Registers the Modal block with WordPress.
 *
 * Responsibilities:
 * - Registers the aegis/modal block using block.json metadata
 * - Provides popup/modal functionality with various trigger types
 *
 * @package    Aegis\Framework\CoreBlocks
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for core blocks.
declare(strict_types=1);

// Declares the namespace for core blocks within the Aegis Framework.
namespace Aegis\Framework\CoreBlocks;

// Imports WordPress functions for file system checks and block registration.
use Aegis\Framework\ServiceProvider;
use WP_Block_Type_Registry;
use function file_exists;
use function get_template_directory;
use function register_block_type;

// Implements the Modal class to register the modal block with WordPress.

/**
 * Modal Block.
 *
 * Handles registration for the Modal block. This block provides popup/modal
 * functionality with support for various trigger types including click,
 * exit intent, scroll depth, and time delay.
 *
 * @package Aegis\Framework\CoreBlocks
 * @since   1.0.0
 */
class Modal
{
	/**
	 * Register the block with WordPress.
	 *
	 * Uses the block.json file in the modal block directory to register
	 * the block with all its attributes, scripts, and styles.
	 *
	 * @since 1.0.0
	 *
	 * @hook init
	 *
	 * @return void
	 */
	public function register_block(): void
	{
		// Check if block is enabled in admin settings.
		if ( ! ServiceProvider::is_block_enabled( 'modal' ) ) {
			return;
		}

		$registry = WP_Block_Type_Registry::get_instance();

		// Build the path to the modal block directory.
		$block_path = get_template_directory() . '/src/Blocks/modal';

		// Verify block.json exists and block is not already registered.
		if ( ! $registry->is_registered( 'aegis/modal' ) && file_exists( $block_path . '/block.json' ) ) {
			register_block_type( $block_path );
		}
	}
}
