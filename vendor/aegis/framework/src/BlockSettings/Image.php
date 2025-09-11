<?php
/**
 * Image Block Setting
 *
 * Provides support for image-related block settings and controls within the Aegis Framework.
 *
 * Responsibilities:
 * - Defines and manages image block settings, such as aspect ratio and display options
 * - Integrates with the Scriptable interface for block output
 *
 * @package    Aegis\Framework\BlockSettings
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this
 * documentation update.
 */

// Enforces strict type checking for all code in this file, ensuring type safety for block settings.
declare( strict_types=1 );

// Declares the namespace for block settings within the Aegis Framework.
namespace Aegis\Framework\BlockSettings;

// Imports interfaces and utility classes for asset management and admin checks.
use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use function is_admin;

// Implements the Image class to support image block settings and controls.

/**
 * Handles image-related block settings and rendering for custom image blocks.
 *
 * This class serves two primary roles:
 * 1. It acts as a central configuration service, defining settings for image
 *    controls like aspect ratio and object-fit, and exposing them to the
 *    block editor's JavaScript.
 * 2. It handles the server-side rendering for the custom `aegis/image-compare`
 *    block, applying responsive visibility classes to it.
 *
 * @package Aegis\Framework\BlockSettings
 * @since   1.0.0
 */
class Image implements Scriptable {

	/**
	 * Defines the configuration for various image control settings.
	 *
	 * This array is exposed to the block editor's JavaScript to dynamically
	 * build UI controls (like dropdowns) for image settings such as aspect
	 * ratio, object-fit, and object-position.
	 *
	 * @var   array
	 * @since 1.0.0
	 */
	public const SETTINGS = [
		'aspectRatio'    => [
			'property' => 'aspect-ratio',
			'label'    => 'Aspect Ratio',
			'options'  => [
				[ 'label' => '', 'value' => '' ],
				[ 'label' => '1/1', 'value' => '1/1' ],
				[ 'label' => '1/2', 'value' => '1/2' ],
				[ 'label' => '1/3', 'value' => '1/3' ],
				[ 'label' => '2/1', 'value' => '2/1' ],
				[ 'label' => '2/3', 'value' => '2/3' ],
				[ 'label' => '3/1', 'value' => '3/1' ],
				[ 'label' => '3/2', 'value' => '3/2' ],
				[ 'label' => '3/4', 'value' => '3/4' ],
				[ 'label' => '4/3', 'value' => '4/3' ],
				[ 'label' => '4/5', 'value' => '4/5' ],
				[ 'label' => '5/2', 'value' => '5/2' ],
				[ 'label' => '5/4', 'value' => '5/4' ],
				[ 'label' => '9/16', 'value' => '9/16' ],
				[ 'label' => '16/9', 'value' => '16/9' ],
			],
		],
		'height'         => [
			'property' => 'height',
			'label'    => 'Height',
		],
		'objectFit'      => [
			'property' => 'object-fit',
			'label'    => 'Object Fit',
			'options'  => [
				[ 'label' => '', 'value' => '' ],
				[ 'label' => 'Fill', 'value' => 'fill' ],
				[ 'label' => 'Contain', 'value' => 'contain' ],
				[ 'label' => 'Cover', 'value' => 'cover' ],
				[ 'label' => 'None', 'value' => 'none' ],
				[ 'label' => 'Scale Down', 'value' => 'scale-down' ],
			],
		],
		'objectPosition' => [
			'property' => 'object-position',
			'label'    => 'Object Position',
			'options'  => [
				[ 'label' => '', 'value' => '' ],
				[ 'label' => 'Top', 'value' => 'top' ],
				[ 'label' => 'Top Right', 'value' => 'top right' ],
				[ 'label' => 'Right', 'value' => 'right' ],
				[ 'label' => 'Bottom Right', 'value' => 'bottom right' ],
				[ 'label' => 'Bottom', 'value' => 'bottom' ],
				[ 'label' => 'Bottom Left', 'value' => 'bottom left' ],
				[ 'label' => 'Left', 'value' => 'left' ],
				[ 'label' => 'Top Left', 'value' => 'top left' ],
				[ 'label' => 'Center', 'value' => 'center' ],
				[ 'label' => 'None', 'value' => 'none' ],
			],
		],
	];

	/**
	 * The Responsive settings handler instance.
	 *
	 * @var Responsive
	 */
	private Responsive $responsive;

	/**
	 * Image settings constructor.
	 *
	 * Injects the required Responsive settings handler.
	 *
	 * @since 1.0.0
	 *
	 * @param Responsive $responsive The Responsive settings handler instance.
	 */
	public function __construct( Responsive $responsive ) {
		$this->responsive = $responsive;
	}

	/**
	 * Exposes the image settings configuration to client-side scripts.
	 *
	 * This method makes the `SETTINGS` constant available to JavaScript under
	 * the `imageOptions` key, allowing the block editor to build its UI.
	 *
	 * @since 1.0.0
	 *
	 * @param Scripts $scripts The Scripts service instance.
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_data(
			'imageOptions',
			self::SETTINGS,
			[],
			is_admin()
		);
	}

	/**
	 * Renders the custom `aegis/image-compare` block.
	 *
	 * This method is hooked into the `render_block_aegis/image-compare` filter
	 * and is responsible for applying the responsive visibility classes to this
	 * specific custom block.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $content The original block content.
	 * @param  array  $block   The full block object.
	 *
	 * @hook   render_block_aegis/image-compare
	 *
	 * @return string The modified block content.
	 */
	public function render_image_compare( string $content, array $block ): string {
		return $this->responsive->add_responsive_classes( $content, $block, self::SETTINGS );
	}

}
