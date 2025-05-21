<?php
/**
 * Block Supports API
 *
 * Manages registration of block supports for core and custom blocks, and related editor config hooks.
 *
 * Responsibilities:
 * - Registers custom and core block supports for use in the editor
 * - Adds or modifies block support settings for blocks via the editor config
 * - Includes extensible support for custom Aegis block features
 *
 * Hooks/Filters Registered:
 * - 'aegis_editor_data': Registers block supports in the editor config
 *
 * @package    Aegis\Theme
 * @subpackage Block Supports
 * @since      1.0.0
 * @author     Atmostfear Entertainment
 * @link       https://github.com/aegiswp/theme
 *
 * For developer documentation and onboarding. No logic changes in this doc update.
 */

declare( strict_types=1 );

namespace Aegis\Theme;

use function add_filter;

/**
 * Filter: 'aegis_editor_data'
 * Registers block supports into the Aegis editor config.
 *
 * @see register_block_supports()
 */
add_filter( 'aegis_editor_data', NS . 'register_block_supports' );
/**
 * Registers block supports for core and custom blocks in the editor config.
 *
 * Adds or modifies block support settings for blocks, including custom Aegis features. (See @todo for planned enhancements.)
 *
 * @todo  Move to REST settings for more dynamic configuration.
 * @since 1.0.0
 *
 * @param array $data Aegis editor config.
 * @return array Modified editor config with block supports registered.
 */
function register_block_supports( array $data = [] ): array {
	// Register block supports for core and custom blocks, including custom Aegis features
	$data['blockSupports'] = [
		'aegis/accordion'        => [
			'aegisBoxShadow' => true,
		],
		'aegis/edd-image-slider' => [
			'aegisPosition' => true,
		],
		'aegis/post-content'     => [
			'aegisPosition'  => true,
			'aegisBoxShadow' => true,
		],
		'aegis/template-part'    => [
			'aegisPosition' => true,
		],
		'core/block'                => [
			'className'       => true,
			'customClassName' => true,
		],
		'core/buttons'              => [
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'color'                => [
				'text'       => true,
				'background' => true,
				'gradients'  => true,
			],
			'spacing'              => [
				'padding'  => true,
				'margin'   => true,
				'blockGap' => true,
			],
			'aegisBoxShadow'    => true,
			'aegisPosition'     => true,
		],
		'core/button'               => [
			'spacing'              => [
				'margin'   => true,
				'padding'  => true,
				'blockGap' => true,
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'__experimentalLayout' => [
				'allowSwitching'         => true,
				'allowEditing'           => true,
				'allowInheriting'        => true,
				'allowSizingOnChildren'  => true,
				'allowVerticalAlignment' => true,
				'allowJustification'     => true,
				'allowOrientation'       => true,
			],
			'aegisBoxShadow'    => true,
			'aegisOnclick'      => true,
			'aegisPosition'     => true,
			'aegisSize'         => true,
			'aegisIcon'         => true,
		],
		'core/code'                 => [
			'aegisBoxShadow' => true,
			'aegisPosition'  => true,
			'aegisTransform' => true,
		],
		'core/column'               => [
			'spacing'                => [
				'padding' => true,
				'margin'  => true,
			],
			'__experimentalBorder'   => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'aegisAnimation'      => true,
			'aegisBackground'     => true,
			'aegisBoxShadow'      => true,
			'aegisFilter'         => true,
			'aegisTransform'      => true,
			'aegisPosition'       => true,
			'aegisNegativeMargin' => true,
		],
		'core/columns'              => [
			'typography'             => [
				'fontSize'   => true,
				'fontWeight' => true,
			],
			'aegisAnimation'      => true,
			'aegisBoxShadow'      => true,
			'aegisPosition'       => true,
			'aegisTransform'      => true,
			'aegisNegativeMargin' => true,
			'aegisFilter'         => true,
			'aegisOnclick'        => true,
		],
		'core/cover'                => [
			'color'                => [
				'background' => true,
				'gradients'  => true,
				'text'       => true,
				'link'       => true,
				'overlay'    => true,
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'aegisPosition'     => true,
		],
		'core/details'              => [
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'aegisBoxShadow'    => true,
			'aegisPosition'     => true,
		],
		'core/embed'                => [
			'spacing'              => [
				'margin' => true,
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
		],
		'core/gallery'              => [
			'spacing' => [
				'margin' => true,
			],
		],
		'core/group'                => [
			'aegisAnimation'      => true,
			'aegisBackground'     => true,
			'aegisBoxShadow'      => true,
			'aegisOnclick'        => true,
			'aegisNegativeMargin' => true,
			'aegisFilter'         => true,
			'aegisTransform'      => true,
			'aegisDarkMode'       => true,
			'aegisPosition'       => true,
		],
		'core/heading'              => [
			'align'                  => [
				'full',
				'wide',
				'none',
			],
			'alignWide'              => true,
			'color'                  => [
				'gradients'  => true,
				'background' => true,
				'text'       => true, // For SVG currentColor.
			],
			'spacing'                => [
				'margin'   => true,
				'padding'  => true,
				'blockGap' => true,
			],
			'aegisNegativeMargin' => true,
			'aegisAnimation'      => true,
			'aegisBoxShadow'      => true,
			'aegisPosition'       => true,
			'aegisTransform'      => true,
			'aegisFilter'         => true,
		],
		'core/html'                 => [
			'color'             => [
				'background' => true,
				'text'       => true,
				'link'       => true,
				'gradient'   => true,
			],
			'aegisPosition'  => true,
			'aegisTransform' => true,
			'aegisFilter'    => true,
		],
		'core/image'                => [
			'__experimentalBorder'   => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'color'                  => [
				'gradients'  => true,
				'background' => true,
				'text'       => true, // For SVG currentColor.
			],
			'spacing'                => [
				'margin'  => true,
				'padding' => true,
			],
			'typography'             => [
				'fontSize' => true, // Used by icons.
			],
			'aegisAnimation'      => true,
			'aegisBackground'     => true,
			'aegisBoxShadow'      => true,
			'aegisFilter'         => true,
			'aegisIcon'           => true,
			'aegisNegativeMargin' => true,
			'aegisPosition'       => true,
			'aegisTransform'      => true,
			'aegisOnclick'        => true,
		],
		'core/list'                 => [
			'spacing'              => [
				'padding'  => true,
				'margin'   => true,
				'blockGap' => true,
			],
			'__experimentalLayout' => [
				'allowSwitching'  => false,
				'allowInheriting' => false,
				'default'         => [
					'type'        => 'flex',
					'orientation' => 'vertical',
				],
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'aegisPosition'     => true,
			'aegisShadow'       => true,
		],
		'core/list-item'            => [
			'color'                => [
				'text'       => true,
				'background' => true,
				'link'       => true,
				'gradient'   => true,
			],
			'spacing'              => [
				'padding' => true,
				'margin'  => true,
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'aegisBoxShadow'    => true,
		],
		'core/media-text'           => [
			'__experimentalBorder' => [
				'radius' => true,
			],
			'spacing'              => [
				'margin' => true,
			],
			'aegisPosition'     => true,
		],
		'core/navigation'           => [
			'spacing'              => [
				'margin'   => true,
				'padding'  => true,
				'blockGap' => true,
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => false,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'aegisPosition'     => true,
			'aegisFilter'       => true,
		],
		'core/navigation-submenu'   => [
			'spacing'              => [
				'margin'   => true,
				'padding'  => true,
				'blockGap' => true,
			],
			'color'                => [
				'background' => true,
				'gradients'  => true,
				'link'       => true,
				'text'       => true,
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => false,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
		],
		'core/page-list'            => [
			'spacing' => [
				'blockGap' => true,
			],
		],
		'core/paragraph'            => [
			'align'                  => [
				'full',
				'wide',
				'left',
				'center',
				'right',
				'none',
			],
			'alignWide'              => true,
			'color'                  => [
				'background' => true,
				'gradients'  => true,
				'link'       => true,
				'text'       => true,
			],
			'__experimentalBorder'   => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'spacing'                => [
				'margin'  => true,
				'padding' => true,
			],
			'aegisAnimation'      => true,
			'aegisBoxShadow'      => true,
			'aegisNegativeMargin' => true,
			'aegisPosition'       => true,
			'aegisTransform'      => true,
			'aegisFilter'         => true,
		],
		'core/pattern'              => [
			'className' => true,
		],
		'core/post-content'         => [
			'align'     => [
				'full',
				'wide',
				'left',
				'center',
				'right',
				'none',
			],
			'alignWide' => true,
			'spacing'   => [
				'margin'  => true,
				'padding' => true,
			],
		],
		'core/post-author'          => [
			'spacing'              => [
				'blockGap' => true,
			],
			// Border applied to avatar.
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => false,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
		],
		'core/post-excerpt'         => [
			'__experimentalLayout' => [
				'allowSwitching'  => false,
				'allowInheriting' => false,
				'default'         => [
					'type' => 'flex',
				],
			],
		],
		'core/post-date'            => [
			'spacing' => [
				'margin' => true,
			],
		],
		'core/post-featured-image'  => [
			'align'             => [
				'full',
				'wide',
				'left',
				'center',
				'right',
				'none',
			],
			'alignWide'         => true,
			'color'             => [
				'background' => true,
			],
			'spacing'           => [
				'margin'  => true,
				'padding' => true,
			],
			'aegisBoxShadow' => true,
			'aegisFilter'    => true,
			'aegisPosition'  => true,
			'aegisTransform' => true,
		],
		'core/post-terms'           => [
			'align'                => [
				'full',
				'wide',
				'left',
				'center',
				'right',
				'none',
			],
			'alignWide'            => true,
			'spacing'              => [
				'padding'  => true,
				'margin'   => true,
				'blockGap' => true,
			],
			'__experimentalBorder' => [
				'radius' => true,
			],
		],
		'core/post-title'           => [
			'spacing'              => [
				'padding' => true,
				'margin'  => true,
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'aegisPosition'     => true,
		],
		'core/pullquote'            => [
			'spacing'              => [
				'margin'   => true,
				'padding'  => true,
				'blockGap' => true,
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
		],
		'core/query'                => [
			'spacing'          => [
				'padding' => true,
				'margin'  => true,
			],
			'aegisPosition' => true,
		],
		'core/query-pagination'     => [
			'spacing'              => [
				'margin'  => true,
				'padding' => true,
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width'  => true,
					'color'  => true,
					'radius' => true,
				],
			],
		],
		'core/quote'                => [
			'spacing'              => [
				'margin'   => true,
				'padding'  => true,
				'blockGap' => true,
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
		],
		'core/row'                  => [
			'aegisBoxShadow' => true,
			'aegisPosition'  => true,
		],
		'core/search'               => [
			'spacing'           => [
				'padding'  => true,
				'margin'   => true,
				'blockGap' => true,
			],
			'aegisBoxShadow' => true,
			'aegisPosition'  => true,
		],
		'core/separator'            => [
			'align'                => [
				'full',
				'wide',
				'left',
				'center',
				'right',
				'none',
			],
			'color'                => [
				'text'       => true,
				'background' => false,
			],
			'alignWide'            => true,
			'__experimentalBorder' => [
				'radius'                        => false,
				'width'                         => true,
				'color'                         => false,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'spacing'              => [
				'margin'  => true,
				'padding' => false,
			],
		],
		'core/site-logo'            => [
			'color'                => [
				'background' => true,
				'gradients'  => true,
				'link'       => true,
				'text'       => true,
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => false,
				'color'                         => false,
				'style'                         => false,
				'__experimentalDefaultControls' => [
					'width' => false,
					'color' => false,
				],
			],
		],
		'core/stack'                => [
			'aegisPosition' => true,
		],
		'core/social-links'         => [
			'align'                => [
				'full',
				'wide',
				'left',
				'center',
				'right',
				'none',
			],
			'alignWide'            => true,
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'__experimentalLayout' => [
				'allowSwitching'  => false,
				'allowInheriting' => true,
				'default'         => [
					'type'           => 'flex',
					'justifyContent' => 'space-between',
					'orientation'    => 'horizontal',
				],
			],
			'aegisPosition'     => true,
		],
		'core/social-link'          => [
			'color' => [
				'background' => false,
				'text'       => true,
			],
		],
		'core/spacer'               => [
			'align'                => [
				'full',
				'wide',
				'left',
				'center',
				'right',
				'none',
			],
			'alignWide'            => true,
			'color'                => [
				'gradients'  => true,
				'background' => true,
				'text'       => true,
			],
			'spacing'              => [
				'margin' => true,
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'aegisAnimation'    => true,
			'aegisBoxShadow'    => true,
			'aegisPosition'     => true,
			'aegisFilter'       => true,
			'aegisTransform'    => true,
			'aegisOnclick'      => true,
		],
		'core/table-of-contents'    => [
			'spacing' => [
				'margin'   => true,
				'padding'  => true,
				'blockGap' => true,
			],
		],
		'core/tag-cloud'            => [
			'typography' => [
				'textTransform' => true, // Doesn't work.
				'letterSpacing' => true, // Doesn't work.
			],
		],
		'core/template-part'        => [
			'aegisBoxShadow' => true,
			'color'             => [
				'background' => true,
				'gradients'  => true,
				'link'       => true,
				'text'       => true,
			],
			'aegisPosition'  => true,
		],
		'core/video'                => [
			'color'                => [
				'gradients'  => true,
				'background' => true,
				'text'       => true,
			],
			'spacing'              => [
				'margin' => true, // Doesn't work.
			],
			'__experimentalBorder' => [
				'radius'                        => true,
				'width'                         => true,
				'color'                         => true,
				'style'                         => true,
				'__experimentalDefaultControls' => [
					'width' => true,
					'color' => true,
				],
			],
			'aegisBoxShadow'    => true,
			'aegisFilter'       => true,
			'aegisPosition'     => true,
			'aegisTransform'    => true,
		],
	];

	return $data;
}
