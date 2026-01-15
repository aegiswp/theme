<?php
/**
 * Patterns Component
 *
 * Provides support for registering, loading, and managing block patterns for the Aegis Framework.
 *
 * Responsibilities:
 * - Registers and manages default and custom block patterns
 * - Integrates with the block editor and theme patterns directory
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare( strict_types=1 );

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports the Renderable interface, Debug and Pattern utilities, WordPress block components, and various helper functions.
use Aegis\Framework\Interfaces\Renderable;
use Aegis\Utilities\Debug;
use Aegis\Utilities\Pattern;
use WP_Block;
use WP_Block_Patterns_Registry;
use function apply_filters;
use function array_unique;
use function basename;
use function do_blocks;
use function get_stylesheet_directory;
use function glob;
use function in_array;
use function is_dir;
use function ksort;
use function register_block_pattern_category;
use function remove_theme_support;
use function str_replace;
use function strtoupper;
use function trailingslashit;
use function ucwords;

/**
 * Patterns extension.
 *
 * @since 1.0.0
 */
class Patterns implements Renderable {

	/**
	 * Removes core block patterns.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init 9
	 *
	 * @return void
	 */
	function remove_core_patterns(): void {
		remove_theme_support( 'core-block-patterns' );
	}

	/**
	 * Manually registers default patterns to avoid loading in child themes.
	 *
	 * @since 1.0.0
	 *
	 * @hook  init
	 *
	 * @return void
	 */
	public function register_default_patterns(): void {
		$all_dirs   = $this->get_pattern_dirs();
		$categories = [];

		foreach ( $all_dirs as $dir ) {
			$files    = glob( $dir . '/*.php' );
			$category = basename( $dir );

			foreach ( $files as $file ) {
				$pattern = basename( $file, '.php' );

				if ( ! isset( $categories[ $category ] ) ) {
					$categories[ $category ] = [];
				}

				$categories[ $category ][ $pattern ] = $file;
			}
		}

		$categories = apply_filters( 'aegis_patterns', $categories );

		ksort( $categories );

		$registered_categories = [];

		foreach ( $categories as $category => $patterns ) {

			if ( ! in_array( $category, $registered_categories, true ) ) {

				if ( in_array( $category, [ 'cta', 'faq' ], true ) ) {
					$label = strtoupper( $category );
				} else {
					$label = ucwords( str_replace( '-', ' ', $category ) );
				}

				register_block_pattern_category(
					$category,
					[
						'label' => $label,
					]
				);

				$registered_categories[ $category ] = [];
			}

			foreach ( $patterns as $pattern => $file ) {
				$basename = basename( $file, '.php' );

				if ( in_array( $basename, $registered_categories[ $category ], true ) ) {
					continue;
				}

				$registered_categories[ $category ][] = $basename;

				Pattern::register_from_file( $file );
			}
		}
	}

	/**
	 * Renders the block.
	 *
	 * @param string   $block_content Block content.
	 * @param array    $block         Block attributes.
	 * @param WP_Block $instance      Block instance.
	 *
	 * @hook render_block_core/pattern
	 * @hook render_block_aegis/pattern
	 *
	 * @return string
	 */
	public function render( string $block_content, array $block, WP_Block $instance ): string {
		$slug = $block['attrs']['slug'] ?? '';
		$name = $block['blockName'] ?? '';

		if ( ! $block_content && $name === 'aegis/pattern' ) {
			$block_content = do_blocks( "<!-- wp:pattern {\"slug\":\"$slug\"} /-->" );
		}

		if ( ! Debug::is_enabled() || ! $slug ) {
			return $block_content;
		}

		return <<<HTML
<!-- $slug -->
	$block_content
<!-- /$slug -->
HTML;
	}

	/**
	 * Returns array of pattern directories.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	private function get_pattern_dirs(): array {
		$template_dir   = get_template_directory();
		$stylesheet_dir = get_stylesheet_directory();
		$default_dirs   = [];
		$default_dirs[] = $stylesheet_dir . '/patterns';

		$dirs = apply_filters( 'aegis_pattern_dirs', $default_dirs );

		$category_dirs = [];

		// Register parent template patterns.
		if ( $template_dir !== $stylesheet_dir ) {
			$category_dirs[] = $template_dir . '/patterns/template';
		}

		foreach ( $dirs as $dir ) {
			$dir = trailingslashit( $dir );

			if ( ! is_dir( $dir ) ) {
				continue;
			}

			$category_dirs = [
				...$category_dirs,
				...glob( $dir . '*', GLOB_ONLYDIR ),
			];
		}

		return array_unique( $category_dirs );
	}
}
