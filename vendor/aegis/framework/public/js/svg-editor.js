( function ( wp ) {
	'use strict';

	if ( ! wp || ! wp.hooks || ! wp.compose || ! wp.element ) {
		return;
	}

	const { addFilter, removeFilter } = wp.hooks;
	const { createHigherOrderComponent } = wp.compose;
	const { createElement: el, Fragment, useEffect } = wp.element;
	const { InspectorControls } = wp.blockEditor || {};
	const { PanelBody, PanelRow, TextareaControl, ToggleControl, Notice } =
		wp.components || {};
	const { useSelect } = wp.data || {};
	const { __ } = wp.i18n || { __: ( text ) => text };

	const PLACEHOLDER_PATH = 'M47 32.1 39 41 23 20.9 0 55.1h64z';

	function features() {
		const raw = window.aegisSvgFeatures;

		if ( ! raw ) {
			return { enabled: true, mask: true, inline: true };
		}

		return {
			enabled: !! raw.enabled,
			mask: !! raw.mask,
			inline: !! raw.inline,
		};
	}

	function isSvgImage( attributes ) {
		return (
			attributes &&
			typeof attributes.className === 'string' &&
			attributes.className.includes( 'is-style-svg' )
		);
	}

	function dimension( value ) {
		if ( value && typeof value === 'object' ) {
			return value.all ? String( value.all ) : '';
		}

		return value || value === 0 ? String( value ) : '';
	}

	function dataUri( svgString ) {
		return 'data:image/svg+xml;utf8,' + encodeURIComponent( svgString || '' );
	}

	function maskUri( svgString ) {
		return (
			"url('data:image/svg+xml;utf8," +
			encodeURIComponent( svgString || '' ) +
			"')"
		);
	}

	function isEmptyPreviewUrl( url ) {
		if ( ! url || url === '#' ) {
			return true;
		}

		if ( String( url ).indexOf( 'data:image/svg+xml' ) !== 0 ) {
			return false;
		}

		const comma = String( url ).lastIndexOf( ',' );
		let payload = comma === -1 ? '' : String( url ).slice( comma + 1 );

		try {
			payload = decodeURIComponent( payload );
		} catch ( e ) {
			return false;
		}

		return payload.trim() === '';
	}

	function unregisterSvgVariation() {
		if ( wp.blocks && wp.blocks.unregisterBlockVariation ) {
			wp.blocks.unregisterBlockVariation( 'core/image', 'svg' );
		}
		if ( wp.blocks && wp.blocks.unregisterBlockStyle ) {
			wp.blocks.unregisterBlockStyle( 'core/image', 'svg' );
		}
	}

	function unregisterInlineSvgFormat() {
		if ( wp.richText && wp.richText.unregisterFormatType ) {
			wp.richText.unregisterFormatType( 'aegis/inline-svg' );
		}
	}

	function useCanEditSvgMarkup() {
		return useSelect( function ( select ) {
			const core = select( 'core' );

			if ( ! core ) {
				return true;
			}

			if ( typeof core.canUser === 'function' ) {
				const allowed = core.canUser( 'update', 'settings' );

				if ( true === allowed ) {
					return true;
				}

				if ( false === allowed ) {
					return false;
				}
			}

			const current = core.getCurrentUser ? core.getCurrentUser() : null;

			if ( ! current || ! current.id ) {
				return true;
			}

			const user = core.getUser ? core.getUser( current.id ) : null;
			const roles = ( user && user.roles ) || current.roles || [];

			if ( ! Array.isArray( roles ) || ! roles.length ) {
				return true;
			}

			return roles.indexOf( 'administrator' ) !== -1;
		}, [] );
	}

	function SvgInspector( props ) {
		const { svgString, maskSvg, style, setAttributes, maskEnabled } = props;
		const canEdit = useCanEditSvgMarkup();

		if ( ! canEdit ) {
			return el(
				PanelRow,
				null,
				el(
					Notice,
					{ status: 'warning', isDismissible: false },
					__( 'Only administrators can edit the SVG string.', 'aegis' )
				)
			);
		}

		const rows = [
			el(
				PanelRow,
				{ key: 'markup' },
				el( TextareaControl, {
					label: __( 'SVG markup', 'aegis' ),
					help: __(
						'Paste SVG markup for logos and illustrations. Decorative icons use the Icon block.',
						'aegis'
					),
					value: svgString || '',
					rows: 12,
					onChange: function ( value ) {
						const next = {
							style: Object.assign( {}, style, { svgString: value } ),
						};

						if ( value ) {
							next.url = maskEnabled && maskSvg ? '#' : dataUri( value );
						} else {
							next.url = '';
						}

						setAttributes( next );
					},
					style: {
						fontFamily:
							'var(--wp--preset--font-family--monospace, monospace)',
					},
				} )
			),
		];

		if ( maskEnabled ) {
			rows.push(
				el(
					PanelRow,
					{ key: 'mask' },
					el( ToggleControl, {
						label: __( 'Preview mask', 'aegis' ),
						help: __(
							'Use the SVG as a CSS mask so it follows the text color.',
							'aegis'
						),
						checked: !! maskSvg,
						onChange: function ( value ) {
							setAttributes( {
								style: Object.assign( {}, style, { maskSvg: value } ),
								url: svgString
									? value
										? '#'
										: dataUri( svgString )
									: '',
							} );
						},
					} )
				)
			);
		}

		return el( Fragment, null, rows );
	}

	function emptyPreviewCss( clientId ) {
		const root = '#block-' + clientId;

		return (
			root +
			'{position:relative;min-height:12rem;background:var(--wp--custom--placeholder--background,var(--wp--custom--surface--background));aspect-ratio:var(--wp--custom--placeholder--aspect-ratio,16/9);}' +
			root +
			' .components-placeholder{position:absolute;inset:0;opacity:0;pointer-events:none;}' +
			root +
			' .aegis-svg-empty-preview{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:0.75rem;color:var(--wp--preset--color--neutral-300,currentColor);pointer-events:none;z-index:1;padding:1rem;text-align:center;}' +
			root +
			' .aegis-svg-empty-preview p{margin:0;font-size:13px;}' +
			root +
			' .aegis-svg-empty-preview svg{fill:currentColor;display:block;}'
		);
	}

	function SvgEmptyPreview() {
		return el(
			'div',
			{
				className: 'aegis-svg-empty-preview',
				'aria-hidden': 'true',
			},
			el(
				'svg',
				{
					xmlns: 'http://www.w3.org/2000/svg',
					viewBox: '0 0 64 64',
					width: 32,
					height: 32,
					role: 'img',
					fill: 'currentColor',
				},
				el( 'circle', { cx: 52, cy: 18, r: 7 } ),
				el( 'path', { d: PLACEHOLDER_PATH } )
			),
			el(
				'p',
				null,
				__( 'Paste SVG markup in SVG Settings.', 'aegis' )
			)
		);
	}

	function replaceInspector() {
		removeFilter( 'editor.BlockEdit', 'aegis/with-svg-controls' );

		addFilter(
			'editor.BlockEdit',
			'aegis/with-svg-controls',
			createHigherOrderComponent( function ( BlockEdit ) {
				return function ( props ) {
					if ( ! isSvgImage( props.attributes ) ) {
						return el( BlockEdit, props );
					}

					const f = features();
					const style = props.attributes.style || {};
					const svgString = style.svgString || '';
					const maskSvg = f.mask && !! style.maskSvg;
					const clientId = props.clientId;
					const url = props.attributes.url || '';
					const setAttributes = props.setAttributes;

					useEffect(
						function () {
							if ( ! svgString ) {
								if ( url && isEmptyPreviewUrl( url ) ) {
									setAttributes( { url: '' } );
								}
								return;
							}

							const nextUrl = maskSvg ? '#' : dataUri( svgString );

							if ( url !== nextUrl ) {
								setAttributes( { url: nextUrl } );
							}
						},
						[ svgString, maskSvg, url, setAttributes ]
					);

					let previewCss = '';
					if ( maskSvg && svgString ) {
						const width =
							dimension( props.attributes.width ) ||
							dimension( style.width ) ||
							'var(--width,1em)';
						const height =
							dimension( props.attributes.height ) ||
							dimension( style.height ) ||
							'auto';
						previewCss =
							'#block-' +
							clientId +
							'>div:first-of-type{width:' +
							width +
							' !important;height:' +
							height +
							' !important;display:inline-flex;background:currentColor;overflow:hidden;-webkit-mask-repeat:no-repeat;mask-repeat:no-repeat;-webkit-mask-size:100% 100%;mask-size:100% 100%;-webkit-mask-position:center;mask-position:center bottom;-webkit-mask-image:' +
							maskUri( svgString ) +
							';mask-image:' +
							maskUri( svgString ) +
							';}';
					}

					return el(
						Fragment,
						null,
						! svgString
							? el( 'style', null, emptyPreviewCss( clientId ) )
							: null,
						maskSvg ? el( 'style', null, previewCss ) : null,
						el( BlockEdit, props ),
						! svgString ? el( SvgEmptyPreview, null ) : null,
						InspectorControls
							? el(
									InspectorControls,
									null,
									el(
										PanelBody,
										{
											title: __( 'SVG Settings', 'aegis' ),
											className: 'aegis-svg-controls',
										},
										el( SvgInspector, {
											svgString: svgString,
											maskSvg: !! style.maskSvg,
											style: style,
											setAttributes: setAttributes,
											maskEnabled: f.mask,
										} )
									)
							  )
							: null
					);
				};
			}, 'withSvgControls' ),
			9
		);
	}

	function boot() {
		replaceInspector();

		if ( ! features().enabled ) {
			unregisterSvgVariation();
		}

		if ( ! features().inline ) {
			unregisterInlineSvgFormat();
		}
	}

	boot();

	if ( wp.domReady ) {
		wp.domReady( boot );
	}
} )( window.wp );
