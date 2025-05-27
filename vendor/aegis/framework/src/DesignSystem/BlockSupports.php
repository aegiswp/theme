<?php
/**
 * BlockSupports.php
 *
 * Handles the block supports design system logic for the Aegis WordPress theme.
 *
 * @package   Aegis\Framework\DesignSystem
 * @author    Atmostfear Entertainment
 * @copyright Copyright (c) 2025
 * @license   GPL-2.0-or-later
 * @link      https://github.com/aegiswp/theme
 * @since     1.0.0
 */

declare( strict_types=1 );

namespace Aegis\Framework\DesignSystem;

use Aegis\Framework\InlineAssets\Scriptable;
use Aegis\Framework\InlineAssets\Scripts;
use function is_admin;

/**
 * Block supports.
 *
 * @since 1.0.0
 */
class BlockSupports implements Scriptable {

	private array $config = [
		'aegis/accordion'          => [
			'aegisBoxShadow' => true,
		],
		'arraypress/edd-image-slider' => [
			'aegisPosition' => true,
		],
		'aegis/post-content'       => [
			'aegisPosition'  => true,
			'aegisBoxShadow' => true,
		],
		'aegis/template-part'      => [
			'aegisPosition' => true,
		],
		'core/block'                  => [
			'className'       => true,
			'customClassName' => true,
		],
		'core/buttons'                => [
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
			'aegisTransform'    => true,
		],
		'core/button'                 => [
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
			'aegisFilter'       => true,
			'aegisTransform'    => true,
			'aegisColor'        => [
				//'iconColor'       => [
				//	'property' => '--wp--custom--icon--color',
				//	'selector' => '.%1$s > div',
				//],
				//'backgroundHover' => [
				//	'property' => '--wp--custom--background-color-hover',
				//	'selector' => '.%1$s',
				//],
			],
		],
		'core/code'                   => [
			'aegisBoxShadow' => true,
			'aegisPosition'  => true,
			'aegisTransform' => true,
		],
		'core/column'                 => [
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
		'core/columns'                => [
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
		'core/cover'                  => [
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
			'aegisOnclick'      => true,
			'aegisPosition'     => true,
		],
		'core/details'                => [
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
		'core/embed'                  => [
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
		'core/gallery'                => [
			'spacing' => [
				'margin' => true,
			],
		],
		'core/group'                  => [
			'spacing'                => [
				'blockGap'                      => [
					'__experimentalDefault' => 'var(--wp--style--block-gap)',
					'sides'                 => [ 'horizontal', 'vertical' ],
				],
				'margin'                        => [ 'top', 'bottom' ],
				'padding'                       => true,
				'__experimentalDefaultControls' => [
					'padding'  => true,
					'blockGap' => true,
				],
			],
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
		'core/heading'                => [
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
		'core/html'                   => [
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
		'core/image'                  => [
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
		'core/list'                   => [
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
		'core/list-item'              => [
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
		'core/media-text'             => [
			'__experimentalBorder' => [
				'radius' => true,
			],
			'spacing'              => [
				'margin' => true,
			],
			'aegisPosition'     => true,
		],
		'core/navigation'             => [
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
		'core/navigation-submenu'     => [
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
		'core/page-list'              => [
			'spacing' => [
				'blockGap' => true,
			],
		],
		'core/paragraph'              => [
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
		'core/pattern'                => [
			'className' => true,
		],
		'core/post-content'           => [
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
		'core/post-author'            => [
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
		'core/post-excerpt'           => [
			'__experimentalLayout' => [
				'allowSwitching'  => false,
				'allowInheriting' => false,
				'default'         => [
					'type' => 'flex',
				],
			],
		],
		'core/post-date'              => [
			'spacing' => [
				'margin' => true,
			],
		],
		'core/post-featured-image'    => [
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
		'core/post-terms'             => [
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
		'core/post-title'             => [
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
		'core/pullquote'              => [
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
		'core/query'                  => [
			'spacing'          => [
				'padding' => true,
				'margin'  => true,
			],
			'aegisPosition' => true,
		],
		'core/query-pagination'       => [
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
		'core/quote'                  => [
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
		'core/row'                    => [
			'aegisBoxShadow' => true,
			'aegisPosition'  => true,
		],
		'core/search'                 => [
			'spacing'           => [
				'padding'  => true,
				'margin'   => true,
				'blockGap' => true,
			],
			'aegisBoxShadow' => true,
			'aegisPosition'  => true,
		],
		'core/separator'              => [
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
		'core/site-logo'              => [
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
		'core/stack'                  => [
			'aegisPosition' => true,
		],
		'core/social-links'           => [
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
		'core/social-link'            => [
			'color' => [
				'background' => false,
				'text'       => true,
			],
		],
		'core/spacer'                 => [
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
		'core/table-of-contents'      => [
			'spacing' => [
				'margin'   => true,
				'padding'  => true,
				'blockGap' => true,
			],
		],
		'core/tag-cloud'              => [
			'typography' => [
				'textTransform' => true, // Doesn't work.
				'letterSpacing' => true, // Doesn't work.
			],
		],
		'core/template-part'          => [
			'aegisBoxShadow' => true,
			'color'             => [
				'background' => true,
				'gradients'  => true,
				'link'       => true,
				'text'       => true,
			],
			'aegisPosition'  => true,
		],
		'core/video'                  => [
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

	/**
	 * Add data to the editor.
	 *
	 * @param Scripts $scripts Scripts instance.
	 *
	 * @return void
	 */
	public function scripts( Scripts $scripts ): void {
		$scripts->add_data(
			'blockSupports',
			$this->config,
			[],
			is_admin()
		);
	}
}
