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

// Imports scriptable interface, scripts service, and WordPress admin detection helper.
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use function is_admin;

// Implements the BlockStyles class to support block style data registration and management for the editor.

class BlockStyles implements Scriptable {

	/**
	 * Adds data to the editor.
	 *
	 * @param Scripts $scripts
	 *
	 * @return void
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_data(
			'blockStyles',
			$this->get_data( wp_get_global_settings() ?? [] ),
			[],
			is_admin(),
		);
	}

	/**
	 * Returns array of localized data.
	 *
	 * @param array $global_settings Global settings.
	 *
	 * @return array
	 */
	private function get_data( array $global_settings ): array {
		$register = [
			'core/archive-title'       => [ 'sub-heading' ],
			'core/buttons'             => [ 'surface' ],
			'core/button'              => [ 'ghost' ],
			'core/code'                => [ 'surface' ],
			'core/columns'             => [ 'surface' ],
			'core/column'              => [ 'surface' ],
			'core/comment-author-name' => [ 'heading' ],
			'core/details'             => [
				[ 'summary-heading' => __( 'Heading', 'aegis' ) ],
			],
			'core/group'               => [ 'surface' ],
			'core/list'                => [
				'checklist',
				'check-outline',
				'check-circle',
				'square',
				'list-heading',
				'dash',
				'none',
			],
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

		$register['core/code'][]    = 'light';
		$register['core/code'][]    = 'dark';
		$register['core/column'][]  = 'light';
		$register['core/column'][]  = 'dark';
		$register['core/columns'][] = 'light';
		$register['core/columns'][] = 'dark';
		$register['core/group'][]   = 'light';
		$register['core/group'][]   = 'dark';

		// Values must be arrays.
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
