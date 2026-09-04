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

		// #region agent log
		$__dbg_rows = array();
		// #endregion

		foreach ( is_array( $block_json_files ) ? $block_json_files : array() as $block_json ) {
			$block_dir = dirname( $block_json );
			$dir_name  = basename( $block_dir );

			if ( ! is_readable( $block_json ) ) {
				continue;
			}

			$parent_key = self::parent_block_key( $dir_name );
			$enabled    = $parent_key === '' || \Aegis\Framework\ServiceProvider::is_block_enabled( $parent_key );

			if ( $parent_key !== '' && ! $enabled ) {
				// #region agent log
				$__dbg_rows[] = array(
					'dir'     => $dir_name,
					'parent'  => $parent_key,
					'enabled' => false,
					'skipped' => 'disabled',
				);
				// #endregion
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

			$already = $registry->is_registered( $name );

			if ( $already ) {
				// #region agent log
				$__dbg_rows[] = array(
					'dir'        => $dir_name,
					'name'       => $name,
					'parent'     => $parent_key,
					'enabled'    => $enabled,
					'skipped'    => 'already_registered',
					'indexJs'    => file_exists( $block_dir . '/index.js' ),
					'styleCss'   => file_exists( $block_dir . '/style.css' ),
				);
				// #endregion
				continue;
			}

			$result = register_block_type( $block_dir );

			// #region agent log
			$__dbg_rows[] = array(
				'dir'        => $dir_name,
				'name'       => $name,
				'parent'     => $parent_key,
				'enabled'    => $enabled,
				'skipped'    => null,
				'indexJs'    => file_exists( $block_dir . '/index.js' ),
				'styleCss'   => file_exists( $block_dir . '/style.css' ),
				'registered' => $result instanceof \WP_Block_Type,
				'nowInReg'   => $registry->is_registered( $name ),
			);
			// #endregion
		}

		// #region agent log
		$rp = $registry->get_registered( 'aegis/related-posts' );
		@file_put_contents(
			( defined( 'ABSPATH' ) ? ABSPATH : '' ) . 'debug-286df9.log',
			wp_json_encode(
				array(
					'sessionId'    => '286df9',
					'hypothesisId' => 'A',
					'location'     => 'BlockRegistrar.php:register_from_glob',
					'message'      => 'theme block registration',
					'data'         => array(
						'rows'              => $__dbg_rows,
						'relatedRegistered' => $registry->is_registered( 'aegis/related-posts' ),
						'relatedScripts'    => $rp instanceof \WP_Block_Type ? $rp->editor_script_handles : null,
						'relatedPostsKey'   => \Aegis\Framework\ServiceProvider::is_block_enabled( 'related_posts' ),
						'relatedPostsHyphen'=> \Aegis\Framework\ServiceProvider::is_block_enabled( 'related-posts' ),
					),
					'timestamp'    => (int) round( microtime( true ) * 1000 ),
				)
			) . "\n",
			FILE_APPEND
		);
		// #endregion
	}

	/**
	 * Map block directory names to parent block setting keys.
	 *
	 * @param string $dir_name Block directory basename.
	 *
	 * @return string
	 */
	private static function parent_block_key( string $dir_name ): string {
		return match ( $dir_name ) {
			'slide' => 'slider',
			'toggle-content' => 'toggle',
			'related-posts' => 'related_posts',
			default => $dir_name,
		};
	}
}
