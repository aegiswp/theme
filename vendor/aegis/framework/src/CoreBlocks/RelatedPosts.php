<?php
/**
 * Related Posts Block Registration
 *
 * Registers the Related Posts block with WordPress.
 *
 * Responsibilities:
 * - Registers the aegis/related-posts block using block.json metadata,
 *   gated behind the admin conditional-logic settings
 * - Provides related posts querying by shared taxonomy terms with
 *   multiple layout variants and configurable fallback behaviour
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
use function class_exists;
use function file_exists;
use function get_template_directory;
use function register_block_type;

/**
 * Related Posts block.
 *
 * Handles registration for the aegis/related-posts block. The block
 * queries and displays posts related to the current content by shared
 * taxonomy terms, with multiple layout variants and configurable
 * fallback behaviour when no related posts are found.
 *
 * Registration is gated behind the admin conditional-logic settings
 * so site owners can disable the block without code changes.
 *
 * @since 1.0.0
 */
class RelatedPosts
{
	/**
	 * Register the related-posts block with WordPress.
	 *
	 * Checks whether the block is enabled in the admin
	 * conditional-logic settings, then verifies that the
	 * `block.json` file exists in the theme's
	 * `src/Blocks/related-posts` directory before calling
	 * `register_block_type()`. Silently returns when the block is
	 * disabled or the metadata file is missing.
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
		if ( ! ServiceProvider::is_block_enabled( 'related_posts' ) ) {
			return;
		}

		$block_path = get_template_directory() . '/src/Blocks/related-posts';

		if ( ! file_exists( $block_path . '/block.json' ) ) {
			return;
		}

		register_block_type( $block_path );
	}
}
