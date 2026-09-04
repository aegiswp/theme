<?php
/**
 * Registers Aegis icon sets with the WordPress Icon library.
 *
 * @package Aegis\Framework\Icons
 * @since   1.0.0
 */

// Enforces strict type checking for all code in this file, ensuring type safety for registers aegis icon sets with the wordpress icon library.
declare( strict_types=1 );

// Declares the namespace for the registers aegis icon sets with the wordpress icon library.
namespace Aegis\Framework\Icons;

// Imports classes, interfaces, and functions used by the registers aegis icon sets with the wordpress icon library.
use Aegis\Framework\ServiceProvider;
use Aegis\Icons\Icon;
use Aegis\Utilities\Str;
use WP_Icon_Collections_Registry;
use WP_Icons_Registry;
use function basename;
use function function_exists;
use function glob;
use function is_array;
use function is_string;
use function preg_match;
use function sprintf;
use function strtolower;
use function version_compare;
use function __;

/**
 * Registers custom Aegis icon collections on WP_Icons_Registry.
 */
class Library {

	/**
	 * Registers Aegis icon collections and icons with WordPress.
	 *
	 * @hook init 11
	 */
	public function register(): void {
		if ( version_compare( get_bloginfo( 'version' ), '7.1', '<' ) ) {
			return;
		}

		if ( ! function_exists( 'wp_register_icon_collection' ) || ! function_exists( 'wp_register_icon' ) ) {
			return;
		}

		if ( ! ServiceProvider::is_block_enabled( 'icon' ) ) {
			return;
		}

		$sets = Icon::get_icon_sets();

		if ( ! is_array( $sets ) ) {
			return;
		}

		foreach ( $sets as $set => $dir ) {
			$set = strtolower( (string) $set );

			if ( $set === '' || ! is_string( $dir ) || $dir === '' ) {
				continue;
			}

			if ( ! preg_match( '/^[a-z0-9](?:[a-z0-9_-]*[a-z0-9])?$/', $set ) ) {
				continue;
			}

			$files = glob( $dir . '/*.svg' );

			if ( ! is_array( $files ) || $files === [] ) {
				continue;
			}

			$icons = [];

			foreach ( $files as $file ) {
				$name = strtolower( basename( (string) $file, '.svg' ) );

				if ( $name === '' || ! preg_match( '/^[a-z0-9](?:[a-z0-9_-]*[a-z0-9])?$/', $name ) ) {
					continue;
				}

				if ( $set === 'wordpress' && IconMigrationMapper::is_core_icon( $name ) ) {
					continue;
				}

				$icons[ $name ] = (string) $file;
			}

			if ( $icons === [] ) {
				continue;
			}

			if ( ! WP_Icon_Collections_Registry::get_instance()->is_registered( $set ) ) {
				wp_register_icon_collection(
					$set,
					[
						'label'       => $this->get_collection_label( $set ),
						'description' => sprintf(
							/* translators: %s: icon set label */
							__( 'Aegis %s icons.', 'aegis' ),
							$this->get_collection_label( $set )
						),
					]
				);
			}

			$icons_registry = WP_Icons_Registry::get_instance();

			foreach ( $icons as $name => $file ) {
				$qualified = $set . '/' . $name;

				if ( $icons_registry->is_registered( $qualified ) ) {
					continue;
				}

				wp_register_icon(
					$qualified,
					[
						'label'     => Str::title_case( $name ),
						'file_path' => $file,
					]
				);
			}
		}
	}

	/**
	 * Human-readable collection label.
	 */
	private function get_collection_label( string $set ): string {
		$labels = [
			'wordpress'         => __( 'Aegis', 'aegis' ),
			'social'            => __( 'Social', 'aegis' ),
			'remixicon'         => __( 'Remix Icon', 'aegis' ),
			'plugin'            => __( 'Plugins', 'aegis' ),
			'hand-drawn'        => __( 'Hand Drawn', 'aegis' ),
			'phosphor-duotone'  => __( 'Phosphor Duotone', 'aegis' ),
			'heroicons'         => __( 'Heroicons', 'aegis' ),
			'feather'           => __( 'Feather', 'aegis' ),
			'brand'             => __( 'Brand', 'aegis' ),
		];

		return $labels[ $set ] ?? Str::title_case( $set );
	}

}
