<?php
/**
 * Registers theme custom blocks from block.json metadata.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Blocks;

use WP_Block_Type_Registry;
use function function_exists;
use function get_template_directory;
use function glob;
use function is_readable;
use function register_block_type;
use function wp_register_block_metadata_collection;

/**
 * Registers theme block directories that contain block.json.
 */
final class BlockRegistrar {

	/**
	 * Boot block registration on init (priority 9, before Pro enhancements at 10).
	 *
	 * @return void
	 */
	public static function init(): void {
		add_action( 'init', array( self::class, 'register' ), 9 );
	}

	/**
	 * Register theme block types from metadata.
	 *
	 * Metadata collection is registered for performance; each block is still
	 * registered individually so only theme-owned directories are loaded.
	 *
	 * @return void
	 */
	public static function register(): void {
		$blocks_dir = get_template_directory() . '/src/Blocks';
		$manifest   = $blocks_dir . '/blocks-manifest.php';

		if ( function_exists( 'wp_register_block_metadata_collection' ) && is_readable( $manifest ) ) {
			wp_register_block_metadata_collection( $blocks_dir, $manifest );
		}

		self::register_from_glob( $blocks_dir );
	}

	/**
	 * Register each block directory that contains block.json.
	 *
	 * @param string $blocks_dir Absolute path to src/Blocks.
	 *
	 * @return void
	 */
	private static function register_from_glob( string $blocks_dir ): void {
		$registry = WP_Block_Type_Registry::get_instance();

		$block_json_files = glob( $blocks_dir . '/*/block.json' );

		foreach ( is_array( $block_json_files ) ? $block_json_files : array() as $block_json ) {
			$block_dir = dirname( $block_json );

			if ( ! is_readable( $block_json ) ) {
				continue;
			}

			$metadata = wp_json_file_decode( $block_json, array( 'associative' => true ) );

			if ( ! is_array( $metadata ) || empty( $metadata['name'] ) ) {
				continue;
			}

			$name = (string) $metadata['name'];

			if ( ! str_starts_with( $name, 'aegis/' ) ) {
				continue;
			}

			if ( $registry->is_registered( $name ) ) {
				continue;
			}

			register_block_type( $block_dir );
		}
	}
}
