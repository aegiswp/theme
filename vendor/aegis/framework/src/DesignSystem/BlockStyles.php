<?php
/**
 * Block Styles Component
 *
 * Provides support for registering and managing block-specific style data for the WordPress editor within the Aegis Framework.
 *
 * Responsibilities:
 * - Registers and loads block style data for the editor
 * - Integrates with the scripts service for editor-side JavaScript data
 *
 * @package    Aegis\Framework\DesignSystem
 * @since      1.0.0
 * @author     @atmostfear-entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for design system components.
declare( strict_types=1 );

// Declares the namespace for design system components within the Aegis Framework.
namespace Aegis\Framework\DesignSystem;

// Imports scriptable interface, scripts service, and WordPress admin detection helper.
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use function is_admin;

// Implements the BlockStyles class to support block style data registration and management for the editor.

/**
 * Provides configuration for custom and default block style variations.
 *
 * This class does not render any content. Its sole purpose is to provide a
 * structured array of data to the block editor's JavaScript. This data is then
 * used to dynamically register custom block styles (e.g., "Checklist" for Lists)
 * and unregister default core styles (e.g., "Rounded" for Images) using the
 * `wp.blocks.registerBlockStyle` and `wp.blocks.unregisterBlockStyle` functions.
 *
 * @package Aegis\Framework\DesignSystem
 * @since   1.0.0
 */
class BlockStyles implements Scriptable {

	/**
	 * Exposes the block style configuration to client-side scripts.
	 *
	 * This method makes the array from `get_data()` available to JavaScript
	 * under the `blockStyles` key, but only when in the admin context.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts The Scripts service instance.
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_data(
			'blockStyles',
			$this->get_data(),
			[],
			is_admin(),
		);
	}

	/**
	 * Defines the lists of block styles to register and unregister.
	 *
	 * @since 1.0.0
	 *
	 * @return array A structured array containing 'register' and 'unregister' lists.
	 */
	private function get_data(): array {
		// Defines custom style variations to be added to core blocks.
		// The key is the block name, and the value is an array of style names.
		$register = [
			'core/archive-title'       => [ 'sub-heading' ],
			'core/buttons'             => [ 'surface' ],
			'core/button'              => [ 'ghost' ],
			'core/code'                => [ 'surface', 'light', 'dark' ],
			'core/columns'             => [ 'surface', 'light', 'dark' ],
			'core/column'              => [ 'surface', 'light', 'dark' ],
			'core/comment-author-name' => [ 'heading' ],
			'core/details'             => [ [ 'summary-heading' => __( 'Heading', 'aegis' ) ] ],
			'core/group'               => [ 'surface', 'light', 'dark' ],
			'core/list'                => [ 'checklist', 'check-outline', 'check-circle', 'square', 'list-heading', 'dash', 'none' ],
			'core/list-item'           => [ 'surface' ],
			'core/navigation'          => [ 'heading' ],
			'core/page-list'           => [ 'none' ],
			'core/paragraph'           => [ 'sub-heading', 'notice', 'heading' ],
			'core/post-author-name'    => [ 'heading' ],
			'core/post-terms'          => [ 'list', 'sub-heading', 'badges' ],
			'core/post-title'          => [ 'sub-heading' ],
			'core/query-pagination'    => [ 'badges' ],
			'core/read-more'           => [ 'button' ],
			'core/site-title'          => [ 'heading' ],
			'core/spacer'              => [ 'angle', 'curve', 'round', 'wave', 'fade' ],
			'core/tag-cloud'           => [ 'badges' ],
			'core/quote'               => [ 'surface' ],
		];

		// Defines default core styles that should be removed from the editor.
		$unregister = [
			'core/image'     => [ 'rounded', 'default' ],
			'core/site-logo' => [ 'default', 'rounded' ],
			'core/separator' => [ 'wide', 'dots' ],
		];

		return [
			'register'   => $register,
			'unregister' => $unregister,
		];
	}
}
