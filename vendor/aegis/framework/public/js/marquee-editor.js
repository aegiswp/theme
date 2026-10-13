( function ( wp ) {
	'use strict';

	if ( ! wp || ! wp.hooks || ! wp.compose || ! wp.element ) {
		return;
	}

	const { addFilter, removeFilter } = wp.hooks;
	const { createHigherOrderComponent } = wp.compose;
	const { createElement: el, Fragment } = wp.element;
	const { InspectorControls } = wp.blockEditor || {};
	const components = wp.components || {};
	const {
		PanelBody,
		PanelRow,
		RangeControl,
		ToggleControl,
		Flex,
		FlexItem,
		FlexBlock,
	} = components;
	const NumberControl =
		components.__experimentalNumberControl || components.NumberControl;
	const VStack = components.__experimentalVStack || components.VStack;
	const { __ } = wp.i18n;
	const DEFAULT_MOBILE = '60';
	const DEFAULT_DESKTOP = '90';

	function features() {
		const raw = window.aegisMarqueeFeatures;

		if ( ! raw ) {
			return {
				enabled: true,
				pauseHover: true,
				direction: true,
				speed: true,
				repeat: true,
				responsiveSpeed: true,
			};
		}

		return {
			enabled: !! raw.enabled,
			pauseHover: !! raw.pauseHover,
			direction: !! raw.direction,
			speed: !! raw.speed,
			repeat: !! raw.repeat,
			responsiveSpeed: !! raw.responsiveSpeed,
		};
	}

	function addClass( className, extra ) {
		const parts = String( className || '' )
			.split( /\s+/ )
			.filter( Boolean );

		if ( extra && parts.indexOf( extra ) === -1 ) {
			parts.push( extra );
		}

		return parts.join( ' ' );
	}

	function speedToCss( value, fallback ) {
		let raw =
			value === undefined || value === null || value === ''
				? fallback
				: String( value ).trim();

		if ( /ms$/i.test( raw ) ) {
			return raw.toLowerCase();
		}

		if ( /s$/i.test( raw ) ) {
			const numeric = raw.slice( 0, -1 );
			if ( numeric !== '' && ! isNaN( Number( numeric ) ) ) {
				return numeric + 's';
			}
		}

		if ( raw === '' || isNaN( Number( raw ) ) ) {
			raw = fallback;
		}

		return raw + 's';
	}

	function gateMarqueeStyles( style, attrs ) {
		const f = features();
		const next = Object.assign( {}, style );
		let mobile = attrs && attrs.speedMobile;
		let desktop = attrs && attrs.speedDesktop;

		if ( ! f.speed ) {
			mobile = DEFAULT_MOBILE;
			desktop = DEFAULT_DESKTOP;
		} else if ( ! f.responsiveSpeed ) {
			desktop = mobile != null && mobile !== '' ? mobile : DEFAULT_MOBILE;
		}

		next[ '--marquee-speed-mobile' ] = speedToCss( mobile, DEFAULT_MOBILE );
		next[ '--marquee-speed-desktop' ] = speedToCss( desktop, DEFAULT_DESKTOP );
		next[ '--marquee-speed' ] = next[ '--marquee-speed-mobile' ];
		next[ '--marquee-direction' ] =
			f.direction && attrs && attrs.reverse ? 'reverse' : 'forwards';
		next[ '--marquee-pause' ] =
			f.pauseHover && ( ! attrs || attrs.pauseOnHover !== false )
				? 'paused'
				: 'running';

		return next;
	}

	function isMarquee( attributes ) {
		return attributes && attributes.layout && attributes.layout.orientation === 'marquee';
	}

	function unregisterMarquee() {
		if ( wp.blocks && wp.blocks.unregisterBlockVariation ) {
			wp.blocks.unregisterBlockVariation( 'core/group', 'marquee' );
		}

		removeFilter( 'editor.BlockEdit', 'aegis/with-marquee-controls' );
		removeFilter( 'editor.BlockListBlock', 'aegis/with-marquee' );
		removeFilter( 'editor.BlockListBlock', 'aegis/gate-marquee-preview' );
		removeFilter( 'blocks.getSaveContent.extraProps', 'aegis/save-marquee-styles' );
		removeFilter( 'blocks.getSaveContent.extraProps', 'aegis/gate-marquee-extras' );
	}

	function registerMarqueeAttributes() {
		if ( ! wp.hooks || ! wp.hooks.addFilter ) {
			return;
		}

		addFilter(
			'blocks.registerBlockType',
			'aegis/marquee-attributes-gated',
			function ( settings, name ) {
				if ( name !== 'core/group' ) {
					return settings;
				}

				const attributes = Object.assign( {}, settings.attributes || {}, {
					speedMobile: { type: 'string' },
					speedDesktop: { type: 'string' },
					reverse: { type: 'boolean' },
					pauseOnHover: { type: 'boolean' },
					repeatItems: { type: 'number' },
					fadeEdges: { type: 'boolean' },
				} );

				return Object.assign( {}, settings, { attributes: attributes } );
			},
			1
		);
	}

	function MarqueeInspector( { attributes, setAttributes } ) {
		const f = features();
		const speedMobile =
			attributes.speedMobile != null && attributes.speedMobile !== ''
				? attributes.speedMobile
				: DEFAULT_MOBILE;
		const speedDesktop =
			attributes.speedDesktop != null && attributes.speedDesktop !== ''
				? attributes.speedDesktop
				: DEFAULT_DESKTOP;
		const repeatItems =
			attributes.repeatItems != null ? attributes.repeatItems : 2;

		return el(
			InspectorControls,
			null,
			el(
				PanelBody,
				{
					title: __( 'Marquee Settings', 'aegis' ),
					className: 'aegis-width-control',
				},
				f.speed &&
					NumberControl &&
					el(
						PanelRow,
						null,
						el(
							VStack || 'div',
							null,
							el(
								'strong',
								null,
								__( 'Loop duration (seconds)', 'aegis' )
							),
							el(
								'p',
								{
									className: 'components-base-control__help',
									style: { marginTop: 0 },
								},
								f.responsiveSpeed
									? __(
											'Lower is faster. Desktop is used in the editor and on screens 782px and wider.',
											'aegis'
									  )
									: __(
											'Lower is faster. This is the time for one full loop.',
											'aegis'
									  )
							),
							el(
								Flex,
								null,
								f.responsiveSpeed &&
									el(
										FlexBlock,
										null,
										el( NumberControl, {
											isShiftStepEnabled: true,
											min: 1,
											label: __( 'Desktop', 'aegis' ),
											value: speedDesktop,
											onChange: function ( value ) {
												setAttributes( { speedDesktop: value } );
											},
										} )
									),
								el(
									FlexItem,
									{ style: { width: f.responsiveSpeed ? '50%' : '100%' } },
									el( NumberControl, {
										isShiftStepEnabled: true,
										min: 1,
										label: f.responsiveSpeed
											? __( 'Mobile', 'aegis' )
											: __( 'Duration', 'aegis' ),
										value: speedMobile,
										onChange: function ( value ) {
											const next = { speedMobile: value };
											if ( ! f.responsiveSpeed ) {
												next.speedDesktop = value;
											}
											setAttributes( next );
										},
									} )
								)
							)
						)
					),
				f.repeat &&
					el(
						PanelRow,
						null,
						el( RangeControl, {
							label: __( 'Repeat Items', 'aegis' ),
							help: __(
								'How many times should the items be duplicated/cloned.',
								'aegis'
							),
							value: repeatItems,
							onChange: function ( value ) {
								setAttributes( { repeatItems: value } );
							},
							min: 0,
							max: 10,
							step: 1,
							allowReset: true,
						} )
					),
				f.pauseHover &&
					el(
						PanelRow,
						null,
						el( ToggleControl, {
							label: __( 'Pause on hover', 'aegis' ),
							checked: attributes.pauseOnHover !== false,
							onChange: function () {
								setAttributes( {
									pauseOnHover: attributes.pauseOnHover === false,
								} );
							},
						} )
					),
				f.direction &&
					el(
						PanelRow,
						null,
						el( ToggleControl, {
							label: __( 'Reverse direction', 'aegis' ),
							checked: !! attributes.reverse,
							onChange: function () {
								setAttributes( { reverse: ! attributes.reverse } );
							},
						} )
					),
				el(
					PanelRow,
					null,
					el( ToggleControl, {
						label: __( 'Fade Edges', 'aegis' ),
						checked: !! attributes.fadeEdges,
						onChange: function () {
							setAttributes( { fadeEdges: ! attributes.fadeEdges } );
						},
					} )
				)
			)
		);
	}

	function installGatedControls() {
		if ( ! InspectorControls ) {
			return;
		}

		removeFilter( 'editor.BlockEdit', 'aegis/with-marquee-controls' );
		removeFilter( 'editor.BlockListBlock', 'aegis/with-marquee' );
		removeFilter( 'editor.BlockListBlock', 'aegis/gate-marquee-preview' );
		removeFilter( 'blocks.getSaveContent.extraProps', 'aegis/save-marquee-styles' );
		removeFilter( 'blocks.getSaveContent.extraProps', 'aegis/gate-marquee-extras' );

		addFilter(
			'editor.BlockEdit',
			'aegis/with-marquee-controls',
			createHigherOrderComponent( function ( BlockEdit ) {
				return function ( props ) {
					if ( ! isMarquee( props.attributes ) ) {
						return el( BlockEdit, props );
					}

					return el(
						Fragment,
						null,
						el( MarqueeInspector, {
							attributes: props.attributes,
							setAttributes: props.setAttributes,
						} ),
						el( BlockEdit, props )
					);
				};
			}, 'withInspectorControl' ),
			9
		);

		addFilter(
			'editor.BlockListBlock',
			'aegis/gate-marquee-preview',
			createHigherOrderComponent( function ( BlockListBlock ) {
				return function ( props ) {
					if ( ! isMarquee( props.attributes ) ) {
						return el( BlockListBlock, props );
					}

					const wrapperProps = Object.assign( {}, props.wrapperProps || {} );
					wrapperProps.style = gateMarqueeStyles(
						wrapperProps.style || {},
						props.attributes
					);
					wrapperProps.className = addClass(
						wrapperProps.className || props.className,
						'is-marquee'
					);
					if ( props.attributes && props.attributes.fadeEdges ) {
						wrapperProps.className = addClass(
							wrapperProps.className,
							'fade-horizontal'
						);
					}

					return el(
						BlockListBlock,
						Object.assign( {}, props, {
							className: wrapperProps.className,
							wrapperProps: wrapperProps,
						} )
					);
				};
			}, 'withMarqueeGates' ),
			10
		);

		addFilter(
			'blocks.getSaveContent.extraProps',
			'aegis/gate-marquee-extras',
			function ( extraProps, _blockType, attributes ) {
				if ( ! isMarquee( attributes ) ) {
					return extraProps;
				}

				let className = addClass( extraProps.className, 'is-marquee' );
				if ( attributes.fadeEdges ) {
					className = addClass( className, 'fade-horizontal' );
				}

				return Object.assign( {}, extraProps, {
					className: className,
					style: gateMarqueeStyles( extraProps.style || {}, attributes ),
				} );
			},
			11
		);
	}

	let booted = false;

	function boot() {
		if ( booted ) {
			return;
		}

		booted = true;

		const f = features();

		if ( ! f.enabled ) {
			unregisterMarquee();
			return;
		}

		registerMarqueeAttributes();
		installGatedControls();
	}

	boot();

	if ( wp.domReady ) {
		wp.domReady( boot );
	}
} )( window.wp );
