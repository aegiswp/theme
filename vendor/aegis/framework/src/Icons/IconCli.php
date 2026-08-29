<?php
/**
 * WP-CLI: migrate legacy image icon blocks to core/icon.
 *
 * @package Aegis\Framework\Icons
 * @since   1.0.0
 */

// Enforces strict type checking for all code in this file, ensuring type safety for wp-cli: migrate legacy image icon blocks to core/icon.
declare( strict_types=1 );

// Declares the namespace for the wp-cli: migrate legacy image icon blocks to core/icon.
namespace Aegis\Framework\Icons;

// Imports classes, interfaces, and functions used by the wp-cli: migrate legacy image icon blocks to core/icon.
use WP_CLI;
use function preg_replace_callback;
use function str_contains;
use function WP_CLI\Utils\get_flag_value;

/**
 * Registers WP-CLI commands for icon migration.
 */
class IconCli {

	/**
	 * @hook cli_init
	 */
	public function register_commands(): void {
		if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
			return;
		}

		WP_CLI::add_command( 'aegis migrate-icons', [ $this, 'migrate_icons' ] );
	}

	/**
	 * Migrates wp:image is-style-icon block comments to wp:icon.
	 *
	 * ## OPTIONS
	 *
	 * [--dry-run]
	 * : Preview changes without writing.
	 *
	 * @when after_wp_load
	 */
	public function migrate_icons( array $args, array $assoc_args ): void {
		unset( $args );

		$dry_run = (bool) get_flag_value( $assoc_args, 'dry-run', false );
		$count   = 0;

		// Load all public posts for icon block migration.
		$post_types = get_post_types( [ 'public' => true ], 'names' );
		$posts      = get_posts(
			[
				'post_type'      => $post_types,
				'post_status'    => 'any',
				'posts_per_page' => -1,
				'fields'         => 'ids',
			]
		);

		foreach ( $posts as $post_id ) {
			$content = (string) get_post_field( 'post_content', $post_id );

			if ( $content === '' || ! str_contains( $content, 'is-style-icon' ) ) {
				continue;
			}

			$updated = IconMigrationMapper::migrate_block_comments( $content );

			if ( $updated !== $content ) {
				++$count;

				if ( ! $dry_run ) {
					wp_update_post(
						[
							'ID'           => $post_id,
							'post_content' => $updated,
						]
					);
				}

				WP_CLI::log( sprintf( 'Post %d: icon blocks migrated.', $post_id ) );
			}
		}

		if ( $dry_run ) {
			WP_CLI::success( sprintf( 'Dry run: %d post(s) would be updated.', $count ) );
		} else {
			WP_CLI::success( sprintf( 'Migrated icon blocks in %d post(s).', $count ) );
		}
	}

}
