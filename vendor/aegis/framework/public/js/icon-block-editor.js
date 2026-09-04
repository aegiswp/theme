( function ( wp ) {
	'use strict';

	if ( ! wp || ! wp.blocks || ! wp.hooks ) {
		return;
	}

	const { addFilter } = wp.hooks;
	const { createHigherOrderComponent } = wp.compose;
	const { Fragment, createElement: el, cloneElement } = wp.element;
	const { InspectorControls } = wp.blockEditor;
	const { PanelBody, TextControl, TextareaControl, ToggleControl, GradientPicker } = wp.components;
	const { createBlock } = wp.blocks;
	const { __ } = wp.i18n;
	const MAPPER = window.aegis?.iconMigration || {};
	const FEATURES = window.aegis?.iconFeatures || {};
	const EXTENDED_ATTRIBUTES = {
		gradient: { type: 'string' },
		url: { type: 'string' },
		linkTarget: { type: 'string' },
		rel: { type: 'string' },
		animation: { type: 'string' },
		iconSvgString: { type: 'string' },
	};

	const ICON_STYLE_BLOCK_NAMES = [ 'core/button', 'aegis/tab' ];

	function supportsIconStyles( blockName ) {
		return ICON_STYLE_BLOCK_NAMES.includes( blockName );
	}

	function isLegacyImageIcon( attributes ) {
		const className = attributes?.className || '';

		if ( className.includes( 'is-style-icon' ) ) {
			return true;
		}

		if ( attributes?.iconSvgString ) {
			return true;
		}

		return Boolean( attributes?.iconSet && attributes?.iconName );
	}

	function shouldApplyIconSaveStyles( blockName, attributes ) {
		if ( ! supportsIconStyles( blockName ) ) {
			return false;
		}

		return Boolean(
			attributes?.iconSvgString ||
				( attributes?.iconSet && attributes?.iconName )
		);
	}

	/**
	 * Mirrors the legacy icon style builder in editor.js (previously extraProps-only).
	 */
	function buildIconCustomProperties( attributes ) {
		const styles = {};
		let background = '';

		if ( ! ( ( attributes?.iconSet && attributes?.iconName ) || attributes?.iconSvgString ) ) {
			return styles;
		}

		if ( attributes?.style?.color?.background ) {
			background = attributes.style.color.background;
		}

		if ( attributes?.backgroundColor ) {
			background =
				'var(--wp--preset--color--' +
				attributes.backgroundColor +
				', currentColor)';
		}

		if ( attributes?.iconPosition === 'start' ) {
			styles[ '--wp--custom--icon--order' ] = '-1';
		}

		let gradient = '';

		if ( attributes?.style?.color?.gradient ) {
			gradient = attributes.style.color.gradient;
		}

		if ( attributes?.gradient ) {
			gradient =
				'var(--wp--preset--gradient--' +
				attributes.gradient +
				',currentColor)';
		}

		let color = '';

		if ( attributes?.style?.color?.text ) {
			color = attributes.style.color.text;
		}

		if ( attributes?.textColor ) {
			color =
				'var(--wp--preset--color--' +
				attributes.textColor +
				',currentColor)';
		}

		if ( background !== '' ) {
			styles[ '--wp--custom--icon--background' ] = background;
		}

		if ( color ) {
			styles[ '--wp--custom--icon--color' ] = color;
			if ( gradient ) {
				styles[ '--wp--custom--icon--background' ] = gradient;
			}
		} else if ( gradient ) {
			styles[ '--wp--custom--icon--color' ] = gradient;
		}

		const spacingSides = [ 'top', 'right', 'bottom', 'left' ];

		if ( attributes?.style?.spacing?.padding ) {
			const padding = attributes.style.spacing.padding;
			const values = {};

			spacingSides.forEach( ( side ) => {
				let value = padding?.[ side ] ?? '0';
				if ( value && value.includes( 'var:preset' ) ) {
					value =
						'var(--wp--preset--spacing--' +
						value.replace( 'var:preset|spacing|', '' ) +
						')';
				}
				values[ side ] = value;
			} );

			styles[ '--wp--custom--icon--padding' ] =
				spacingSides.map( ( side ) => values[ side ] ).join( ' ' );
		}

		if ( attributes?.style?.spacing?.margin ) {
			const margin = attributes.style.spacing.margin;
			const values = {};

			spacingSides.forEach( ( side ) => {
				let value = margin?.[ side ] ?? '';
				if ( value && value.includes( 'var:preset' ) ) {
					value =
						'var(--wp--preset--spacing--' +
						value.replace( 'var:preset|spacing|', '' ) +
						')';
				}
				values[ side ] = value;
			} );

			styles[ '--wp--custom--icon--margin' ] =
				spacingSides.map( ( side ) => values[ side ] ).join( ' ' );
		}

		let borderColor = '';

		if ( attributes?.borderColor ) {
			borderColor = 'var(--wp--preset--color--' + attributes.borderColor + ')';
		}

		if ( attributes?.style?.border?.width ) {
			styles[ '--wp--custom--icon--border-width' ] =
				attributes.style.border.width;
			styles[ '--wp--custom--icon--border-style' ] =
				attributes.style.border?.style ?? 'solid';
			styles[ '--wp--custom--icon--border-color' ] =
				attributes.style.border?.color ?? borderColor;
		}

		let iconSize = attributes?.iconSize ?? '';

		if ( iconSize !== '' ) {
			const hasUnit = [ 'px', 'em', 'rem', 'vh', 'vw', '%' ].some( ( unit ) =>
				iconSize.includes( unit )
			);
			iconSize = hasUnit ? iconSize : iconSize + 'px';
			styles[ '--wp--custom--icon--size' ] = iconSize;
		}

		const iconSvgString = attributes?.iconSvgString ?? '';

		if ( iconSvgString ) {
			styles[ '--wp--custom--icon--url' ] =
				"url('data:image/svg+xml;utf8," + iconSvgString + "')";
		}

		return styles;
	}

	function mergeSaveElementIconStyles( element, iconStyles ) {
		if ( ! element || ! iconStyles || ! Object.keys( iconStyles ).length ) {
			return element;
		}

		return cloneElement( element, {
			style: {
				...( element.props?.style || {} ),
				...iconStyles,
			},
		} );
	}

	function mapToCoreIcon( attributes ) {
		const set = ( attributes.iconSet || 'wordpress' ).toLowerCase();
		const name = ( attributes.iconName || '' ).toLowerCase();
		const coreSlugs = MAPPER.coreManifestSlugs || [];
		const icon =
			set === 'wordpress' && coreSlugs.includes( name )
				? 'core/' + name
				: set + '/' + name;

		const next = {
			icon,
		};

		if ( attributes.gradient ) {
			next.gradient = attributes.gradient;
		}
		if ( attributes.url ) {
			next.url = attributes.url;
		}
		if ( attributes.linkTarget ) {
			next.linkTarget = attributes.linkTarget;
		}
		if ( attributes.rel ) {
			next.rel = attributes.rel;
		}
		if ( attributes.textColor ) {
			next.textColor = attributes.textColor;
		}
		if ( attributes.backgroundColor ) {
			next.backgroundColor = attributes.backgroundColor;
		}
		if ( attributes.alt || attributes.title ) {
			next.ariaLabel = attributes.alt || attributes.title;
		}
		if ( attributes.animation ) {
			next.animation = attributes.animation;
		}
		if ( attributes.iconSvgString ) {
			next.iconSvgString = attributes.iconSvgString;
		}
		if ( attributes.align ) {
			next.align = attributes.align;
		}

		const style = attributes.style ? { ...attributes.style } : {};

		if ( attributes.iconSize ) {
			style.dimensions = {
				...( style.dimensions || {} ),
				width: attributes.iconSize,
			};
		}

		if ( Object.keys( style ).length ) {
			next.style = style;
		}

		const classes = ( attributes.className || '' )
			.split( /\s+/ )
			.filter(
				( c ) => c && c !== 'is-style-icon' && c !== 'all-icons'
			);

		if ( attributes.animation ) {
			classes.push( 'has-animation' );
		}

		if ( classes.length ) {
			next.className = classes.join( ' ' );
		}

		return next;
	}

	addFilter(
		'blocks.registerBlockType',
		'aegis/core-icon-attributes',
		function ( settings, name ) {
			if ( name !== 'core/icon' ) {
				return settings;
			}

			const from = settings.transforms?.from || [];

			return {
				...settings,
				attributes: {
					...( settings.attributes || {} ),
					...EXTENDED_ATTRIBUTES,
				},
				transforms: {
					...( settings.transforms || {} ),
					from: [
						...from,
						{
							type: 'block',
							blocks: [ 'core/image' ],
							isMatch: ( attributes ) => isLegacyImageIcon( attributes ),
							transform: ( attributes ) =>
								createBlock( 'core/icon', mapToCoreIcon( attributes ) ),
						},
					],
				},
			};
		}
	);

	// WP 7 / block API v3: extraProps no longer runs during save validation.
	addFilter(
		'blocks.getSaveElement',
		'aegis/save-icon-styles-api-v3',
		function ( element, blockType, attributes ) {
			if ( ! element || ! blockType?.name ) {
				return element;
			}

			if ( ! shouldApplyIconSaveStyles( blockType.name, attributes ) ) {
				return element;
			}

			return mergeSaveElementIconStyles(
				element,
				buildIconCustomProperties( attributes )
			);
		}
	);

	const withIconExtensions = createHigherOrderComponent( function ( BlockEdit ) {
		return function ( props ) {
			if ( props.name !== 'core/icon' ) {
				return el( BlockEdit, props );
			}

			const { attributes, setAttributes, isSelected } = props;
			const editorSettings =
				wp.data.select( 'core/block-editor' )?.getSettings() || {};
			const gradients =
				editorSettings.gradients ||
				editorSettings.color?.gradients ||
				editorSettings.colors?.gradients ||
				[];
			const className = attributes.className || '';
			const isGallery = className.split( /\s+/ ).includes( 'all-icons' );

			return el(
				Fragment,
				null,
				el( BlockEdit, props ),
				isSelected &&
					el(
						InspectorControls,
						null,
						el(
							PanelBody,
							{ title: __( 'Icon link', 'aegis' ), initialOpen: false },
							el( TextControl, {
								label: __( 'URL', 'aegis' ),
								value: attributes.url || '',
								onChange: ( url ) => setAttributes( { url } ),
							} ),
							el( TextControl, {
								label: __( 'Link target', 'aegis' ),
								value: attributes.linkTarget || '',
								onChange: ( linkTarget ) =>
									setAttributes( { linkTarget } ),
							} ),
							el( TextControl, {
								label: __( 'Rel', 'aegis' ),
								value: attributes.rel || '',
								onChange: ( rel ) => setAttributes( { rel } ),
							} )
						),
						FEATURES.customSvg !== false &&
							el(
								PanelBody,
								{
									title: __( 'Custom SVG', 'aegis' ),
									initialOpen: false,
								},
								el( TextareaControl, {
									label: __( 'SVG markup', 'aegis' ),
									value: attributes.iconSvgString || '',
									onChange: ( iconSvgString ) =>
										setAttributes( { iconSvgString } ),
									help: __(
										'Paste SVG markup to override the selected icon.',
										'aegis'
									),
									rows: 6,
								} )
							),
						FEATURES.gallery !== false &&
							el(
								PanelBody,
								{
									title: __( 'Icon gallery', 'aegis' ),
									initialOpen: false,
								},
								el( ToggleControl, {
									label: __(
										'Display all icons from the selected set',
										'aegis'
									),
									checked: isGallery,
									onChange: ( enabled ) => {
										const classes = className
											.split( /\s+/ )
											.filter(
												( item ) => item && item !== 'all-icons'
											);
										if ( enabled ) {
											classes.push( 'all-icons' );
										}
										setAttributes( {
											className: classes.join( ' ' ),
										} );
									},
								} )
							),
						FEATURES.gradient !== false &&
							gradients.length > 0 &&
							el(
								PanelBody,
								{
									title: __( 'Icon gradient', 'aegis' ),
									initialOpen: false,
								},
								el( GradientPicker, {
									value: attributes.gradient || undefined,
									onChange: ( gradient ) =>
										setAttributes( { gradient: gradient || undefined } ),
									gradients,
								} )
							)
					)
			);
		};
	}, 'withAegisIconExtensions' );

	addFilter(
		'editor.BlockEdit',
		'aegis/core-icon-extensions',
		withIconExtensions
	);
} )( window.wp );
