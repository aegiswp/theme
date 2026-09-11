/**
 * Query Loop enhancements editor extension.
 *
 * Adds inspector panels to core/query. Each panel follows Aegis → Blocks → Query Loop extras.
 *
 * @package Aegis
 * @since   1.0.0
 */

( function ( wp ) {
	'use strict';

	const { addFilter } = wp.hooks;
	const { createHigherOrderComponent } = wp.compose;
	const { Fragment, createElement: el, useState, useEffect } = wp.element;
	const { InspectorControls } = wp.blockEditor;
	const {
		PanelBody,
		SelectControl,
		TextControl,
		ToggleControl,
		RangeControl,
		FormTokenField,
		Button,
	} = wp.components;
	const { __ } = wp.i18n;
	const apiFetch = wp.apiFetch;

	const enhancements = window.aegis?.queryEnhancements || {};
	const postTypes = enhancements.postTypes || [];
	const taxonomies = enhancements.taxonomies || [];
	const metaCompareOperators = enhancements.metaCompareOperators || [];
	const metaTypes = enhancements.metaTypes || [];
	const orderByOptions = enhancements.orderByOptions || [];
	const layoutData = window.aegis?.queryLayout || {};
	const noResultsData = window.aegis?.queryNoResults || {};
	const templateOptions = noResultsData.templates || [];
	const iconOptions = noResultsData.icons || [];
	const breakpoints = layoutData.breakpoints || {
		mobile: '480px',
		tablet: '782px',
		desktop: '1024px',
	};

	function features() {
		const raw = window.aegisQueryLoopFeatures;

		if ( ! raw ) {
			return {
				enabled: false,
				postTypes: false,
				taxonomy: false,
				includeExclude: false,
				metaQuery: false,
				orderMeta: false,
				extendedOrder: false,
				responsiveColumns: false,
				gapControls: false,
				featuredFirst: false,
				equalHeight: false,
				noResults: false,
			};
		}

		return {
			enabled: !! raw.enabled,
			postTypes: !! raw.postTypes,
			taxonomy: !! raw.taxonomy,
			includeExclude: !! raw.includeExclude,
			metaQuery: !! raw.metaQuery,
			orderMeta: !! raw.orderMeta,
			extendedOrder: !! raw.extendedOrder,
			responsiveColumns: !! raw.responsiveColumns,
			gapControls: !! raw.gapControls,
			featuredFirst: !! raw.featuredFirst,
			equalHeight: !! raw.equalHeight,
			noResults: !! raw.noResults,
		};
	}

	const queryAttributeSchema = {
		aegisPostTypes: { type: 'array', default: [] },
		aegisTaxQuery: { type: 'array', default: [] },
		aegisIncludePosts: { type: 'array', default: [] },
		aegisExcludePosts: { type: 'array', default: [] },
		aegisOffset: { type: 'number', default: 0 },
		aegisStickyPosts: { type: 'string', default: 'include' },
		aegisMetaKey: { type: 'string', default: '' },
		aegisMetaValue: { type: 'string', default: '' },
		aegisMetaCompare: { type: 'string', default: '=' },
		aegisMetaType: { type: 'string', default: 'CHAR' },
		aegisOrderByMeta: { type: 'boolean', default: false },
		aegisOrderMetaKey: { type: 'string', default: '' },
		aegisOrderMetaType: { type: 'string', default: 'CHAR' },
		aegisOrderBy: { type: 'string', default: '' },
		aegisRandomSeed: { type: 'number', default: 0 },
		aegisColumnsMobile: { type: 'number', default: 0 },
		aegisColumnsTablet: { type: 'number', default: 0 },
		aegisColumnsDesktop: { type: 'number', default: 0 },
		aegisRowGap: { type: 'string', default: '' },
		aegisColumnGap: { type: 'string', default: '' },
		aegisFeaturedFirst: { type: 'boolean', default: false },
		aegisFeaturedFirstSpan: { type: 'number', default: 2 },
		aegisEqualHeight: { type: 'boolean', default: false },
		aegisNoResultsEnabled: { type: 'boolean', default: false },
		aegisNoResultsMessage: { type: 'string', default: '' },
		aegisNoResultsTemplate: { type: 'string', default: 'default' },
		aegisNoResultsIcon: { type: 'string', default: 'search' },
		aegisNoResultsShowSearch: { type: 'boolean', default: false },
	};

	addFilter(
		'blocks.registerBlockType',
		'aegis/query-enhancement-attributes',
		function ( settings, name ) {
			if ( name !== 'core/query' ) {
				return settings;
			}

			return Object.assign( {}, settings, {
				attributes: Object.assign( {}, settings.attributes || {}, queryAttributeSchema ),
			} );
		}
	);

	if ( wp.blocks && wp.blocks.getBlockType ) {
		const registeredQuery = wp.blocks.getBlockType( 'core/query' );

		if ( registeredQuery ) {
			registeredQuery.attributes = Object.assign(
				{},
				registeredQuery.attributes || {},
				queryAttributeSchema
			);
		}
	}

	function addClass( existing, className ) {
		const list = String( existing || '' )
			.split( /\s+/ )
			.filter( Boolean );

		if ( list.indexOf( className ) === -1 ) {
			list.push( className );
		}

		return list.join( ' ' );
	}

	function columnCount( value ) {
		const parsed = parseInt( value, 10 );

		if ( Number.isNaN( parsed ) ) {
			return 0;
		}

		return Math.max( 0, Math.min( 12, parsed ) );
	}

	function layoutPreview( attributes, flags ) {
		const style = {};
		const classNames = [];
		const columnClasses = [];
		let hasColumns = false;

		if ( flags.responsiveColumns ) {
			const mobile = columnCount( attributes.aegisColumnsMobile );
			const tablet = columnCount( attributes.aegisColumnsTablet );
			const desktop = columnCount( attributes.aegisColumnsDesktop );

			if ( mobile > 0 ) {
				style[ '--aegis-query-columns-mobile' ] = String( mobile );
				columnClasses.push( 'aegis-query-cols-mobile' );
				hasColumns = true;
			}

			if ( tablet > 0 ) {
				style[ '--aegis-query-columns-tablet' ] = String( tablet );
				columnClasses.push( 'aegis-query-cols-tablet' );
				hasColumns = true;
			}

			if ( desktop > 0 ) {
				style[ '--aegis-query-columns-desktop' ] = String( desktop );
				columnClasses.push( 'aegis-query-cols-desktop' );
				hasColumns = true;
			}
		}

		if ( flags.gapControls ) {
			if ( attributes.aegisRowGap ) {
				style[ '--aegis-query-row-gap' ] = attributes.aegisRowGap;
			}

			if ( attributes.aegisColumnGap ) {
				style[ '--aegis-query-column-gap' ] = attributes.aegisColumnGap;
			}
		}

		const featured = flags.featuredFirst && !! attributes.aegisFeaturedFirst;
		const equalHeight = flags.equalHeight && !! attributes.aegisEqualHeight;
		const hasGap = !! ( style[ '--aegis-query-row-gap' ] || style[ '--aegis-query-column-gap' ] );

		if ( ! hasColumns && ! hasGap && ! featured && ! equalHeight ) {
			return { className: '', style: {} };
		}

		classNames.push( 'aegis-query-layout' );

		if ( hasColumns ) {
			classNames.push( 'aegis-query-has-columns' );
			Array.prototype.push.apply( classNames, columnClasses );
		}

		if ( featured ) {
			classNames.push( 'aegis-query-featured-first' );
			style[ '--aegis-query-featured-span' ] = String(
				Math.max( 2, columnCount( attributes.aegisFeaturedFirstSpan ) || 2 )
			);
		}

		if ( equalHeight ) {
			classNames.push( 'aegis-query-equal-height' );
		}

		return {
			className: classNames.join( ' ' ),
			style: style,
		};
	}

	function getRestBase( taxonomy ) {
		const found = taxonomies.find( function ( item ) {
			return item.value === taxonomy;
		} );

		if ( found && found.restBase ) {
			return found.restBase;
		}

		return { category: 'categories', post_tag: 'tags' }[ taxonomy ] || taxonomy;
	}

	function PostSearch( { selectedPosts, onChange, label } ) {
		const [ search, setSearch ] = useState( '' );
		const [ results, setResults ] = useState( [] );
		const [ isSearching, setIsSearching ] = useState( false );

		useEffect(
			function () {
				if ( search.length < 2 ) {
					setResults( [] );
					return;
				}

				setIsSearching( true );
				const controller = new AbortController();

				apiFetch( {
					path:
						'/wp/v2/search?search=' +
						encodeURIComponent( search ) +
						'&per_page=10&type=post',
					signal: controller.signal,
				} )
					.then( function ( items ) {
						setResults(
							items.map( function ( item ) {
								return { id: item.id, title: item.title };
							} )
						);
						setIsSearching( false );
					} )
					.catch( function () {
						setIsSearching( false );
					} );

				return function () {
					controller.abort();
				};
			},
			[ search ]
		);

		return el(
			'div',
			{ style: { marginBottom: '16px' } },
			el( TextControl, {
				label: label,
				value: search,
				onChange: setSearch,
				placeholder: __( 'Search posts...', 'aegis' ),
				'aria-autocomplete': 'list',
			} ),
			isSearching &&
				el(
					'p',
					{
						style: { fontSize: '12px', color: '#757575' },
						'aria-live': 'polite',
					},
					__( 'Searching...', 'aegis' )
				),
			results.length > 0 &&
				el(
					'div',
					{
						role: 'listbox',
						'aria-label': label,
						style: {
							border: '1px solid #ddd',
							borderRadius: '4px',
							maxHeight: '150px',
							overflow: 'auto',
							marginBottom: '8px',
						},
					},
					results.map( function ( item ) {
						return el(
							Button,
							{
								key: item.id,
								role: 'option',
								variant: 'tertiary',
								onClick: function () {
									if ( selectedPosts.indexOf( item.id ) === -1 ) {
										onChange( [ ...selectedPosts, item.id ] );
									}
									setSearch( '' );
									setResults( [] );
								},
								style: {
									display: 'block',
									width: '100%',
									textAlign: 'left',
								},
							},
							item.title
						);
					} )
				),
			selectedPosts.length > 0 &&
				el(
					'div',
					{
						style: {
							display: 'flex',
							flexWrap: 'wrap',
							gap: '4px',
						},
					},
					selectedPosts.map( function ( id ) {
						return el(
							'span',
							{
								key: id,
								style: {
									display: 'inline-flex',
									alignItems: 'center',
									gap: '4px',
									padding: '2px 8px',
									backgroundColor: '#f0f0f0',
									borderRadius: '3px',
									fontSize: '12px',
								},
							},
							el( 'span', null, 'ID: ' + id ),
							el( Button, {
								icon: 'no-alt',
								iconSize: 12,
								isSmall: true,
								onClick: function () {
									onChange(
										selectedPosts.filter( function ( postId ) {
											return postId !== id;
										} )
									);
								},
								label: __( 'Remove post ID:', 'aegis' ) + ' ' + id,
								style: {
									minWidth: 'auto',
									padding: '0',
									height: 'auto',
								},
							} )
						);
					} )
				)
		);
	}

	function TaxQueryBuilder( { taxQuery, onChange } ) {
		const [ taxonomy, setTaxonomy ] = useState( '' );
		const [ terms, setTerms ] = useState( [] );
		const [ selectedTermIds, setSelectedTermIds ] = useState( [] );

		useEffect(
			function () {
				if ( ! taxonomy ) {
					setTerms( [] );
					return;
				}

				apiFetch( {
					path: '/wp/v2/' + getRestBase( taxonomy ) + '?per_page=100',
				} )
					.then( function ( items ) {
						setTerms(
							items.map( function ( item ) {
								return { id: item.id, name: item.name };
							} )
						);
					} )
					.catch( function () {
						setTerms( [] );
					} );
			},
			[ taxonomy ]
		);

		const taxonomyOptions = [
			{ value: '', label: __( 'Select taxonomy...', 'aegis' ) },
			...taxonomies.map( function ( item ) {
				return { value: item.value, label: item.label };
			} ),
		];

		return el(
			'div',
			{ style: { marginBottom: '16px' } },
			el(
				'p',
				{ style: { fontWeight: '500', marginBottom: '8px' } },
				__( 'Taxonomy Filters', 'aegis' )
			),
			taxQuery.length > 0 &&
				el(
					'div',
					{ style: { marginBottom: '12px' } },
					taxQuery.map( function ( item, index ) {
						const tax = taxonomies.find( function ( entry ) {
							return entry.value === item.taxonomy;
						} );

						return el(
							'div',
							{
								key: index,
								style: {
									display: 'flex',
									alignItems: 'center',
									gap: '8px',
									padding: '8px',
									backgroundColor: '#f0f0f0',
									borderRadius: '4px',
									marginBottom: '4px',
								},
							},
							el(
								'span',
								{ style: { flex: 1, fontSize: '12px' } },
								( tax ? tax.label : item.taxonomy ) +
									': ' +
									item.terms.length +
									' terms'
							),
							el( Button, {
								icon: 'no-alt',
								iconSize: 16,
								isSmall: true,
								onClick: function () {
									onChange(
										taxQuery.filter( function ( _, i ) {
											return i !== index;
										} )
									);
								},
								label: __( 'Remove', 'aegis' ),
							} )
						);
					} )
				),
			el( SelectControl, {
				value: taxonomy,
				options: taxonomyOptions,
				onChange: setTaxonomy,
			} ),
			taxonomy &&
				terms.length > 0 &&
				el( FormTokenField, {
					label: __( 'Select terms', 'aegis' ),
					value: selectedTermIds
						.map( function ( id ) {
							const term = terms.find( function ( entry ) {
								return entry.id === id;
							} );
							return term ? term.name : '';
						} )
						.filter( Boolean ),
					suggestions: terms.map( function ( term ) {
						return term.name;
					} ),
					onChange: function ( names ) {
						setSelectedTermIds(
							names
								.map( function ( name ) {
									const term = terms.find( function ( entry ) {
										return entry.name === name;
									} );
									return term ? term.id : null;
								} )
								.filter( Boolean )
						);
					},
				} ),
			taxonomy &&
				selectedTermIds.length > 0 &&
				el(
					Button,
					{
						variant: 'secondary',
						onClick: function () {
							if ( ! taxonomy || selectedTermIds.length === 0 ) {
								return;
							}

							onChange( [
								...taxQuery,
								{
									taxonomy: taxonomy,
									terms: selectedTermIds,
									operator: 'IN',
								},
							] );
							setTaxonomy( '' );
							setSelectedTermIds( [] );
						},
						style: { marginTop: '8px' },
					},
					__( 'Add Filter', 'aegis' )
				)
		);
	}

	function QueryParametersPanel( { attributes, setAttributes, flags } ) {
		const {
			aegisPostTypes = [],
			aegisTaxQuery = [],
			aegisIncludePosts = [],
			aegisExcludePosts = [],
			aegisOffset = 0,
			aegisStickyPosts = 'include',
		} = attributes;

		const stickyOptions = [
			{ value: 'include', label: __( 'Include sticky posts', 'aegis' ) },
			{ value: 'exclude', label: __( 'Exclude sticky posts', 'aegis' ) },
			{ value: 'only', label: __( 'Only sticky posts', 'aegis' ) },
		];

		return el(
			PanelBody,
			{ title: __( 'Query Parameters', 'aegis' ), initialOpen: false },
			flags.postTypes &&
				el(
					'div',
					{ style: { marginBottom: '16px' } },
					el(
						'p',
						{ style: { fontWeight: '500', marginBottom: '8px' } },
						__( 'Post Types', 'aegis' )
					),
					postTypes.map( function ( type ) {
						const checked = aegisPostTypes.indexOf( type.value ) !== -1;

						return el( ToggleControl, {
							key: type.value,
							label: type.label,
							checked: checked,
							onChange: function ( value ) {
								setAttributes( {
									aegisPostTypes: value
										? [ ...aegisPostTypes, type.value ]
										: aegisPostTypes.filter( function ( slug ) {
												return slug !== type.value;
										  } ),
								} );
							},
						} );
					} )
				),
			flags.taxonomy &&
				el( TaxQueryBuilder, {
					taxQuery: aegisTaxQuery,
					onChange: function ( value ) {
						setAttributes( { aegisTaxQuery: value } );
					},
				} ),
			flags.includeExclude &&
				el( PostSearch, {
					label: __( 'Include Specific Posts', 'aegis' ),
					selectedPosts: aegisIncludePosts,
					onChange: function ( value ) {
						setAttributes( { aegisIncludePosts: value } );
					},
				} ),
			flags.includeExclude &&
				el( PostSearch, {
					label: __( 'Exclude Specific Posts', 'aegis' ),
					selectedPosts: aegisExcludePosts,
					onChange: function ( value ) {
						setAttributes( { aegisExcludePosts: value } );
					},
				} ),
			el( RangeControl, {
				label: __( 'Offset', 'aegis' ),
				help: __( 'Skip this many posts from the beginning.', 'aegis' ),
				value: aegisOffset,
				onChange: function ( value ) {
					setAttributes( { aegisOffset: value } );
				},
				min: 0,
				max: 50,
			} ),
			el( SelectControl, {
				label: __( 'Sticky Posts', 'aegis' ),
				value: aegisStickyPosts,
				options: stickyOptions,
				onChange: function ( value ) {
					setAttributes( { aegisStickyPosts: value } );
				},
			} )
		);
	}

	function CustomFieldPanel( { attributes, setAttributes, flags } ) {
		const {
			aegisMetaKey = '',
			aegisMetaValue = '',
			aegisMetaCompare = '=',
			aegisMetaType = 'CHAR',
			aegisOrderByMeta = false,
			aegisOrderMetaKey = '',
			aegisOrderMetaType = 'CHAR',
		} = attributes;

		return el(
			PanelBody,
			{ title: __( 'Custom Field Query', 'aegis' ), initialOpen: false },
			flags.metaQuery &&
				el( Fragment, null,
					el( TextControl, {
						label: __( 'Meta Key', 'aegis' ),
						value: aegisMetaKey,
						onChange: function ( value ) {
							setAttributes( { aegisMetaKey: value } );
						},
						placeholder: __( 'e.g., _price, event_date', 'aegis' ),
					} ),
					aegisMetaKey &&
						el( Fragment, null,
							el( SelectControl, {
								label: __( 'Compare', 'aegis' ),
								value: aegisMetaCompare,
								options: metaCompareOperators,
								onChange: function ( value ) {
									setAttributes( { aegisMetaCompare: value } );
								},
							} ),
							aegisMetaCompare !== 'EXISTS' &&
								aegisMetaCompare !== 'NOT EXISTS' &&
								el( TextControl, {
									label: __( 'Value', 'aegis' ),
									value: aegisMetaValue,
									onChange: function ( value ) {
										setAttributes( { aegisMetaValue: value } );
									},
								} ),
							el( SelectControl, {
								label: __( 'Value Type', 'aegis' ),
								value: aegisMetaType,
								options: metaTypes,
								onChange: function ( value ) {
									setAttributes( { aegisMetaType: value } );
								},
							} )
						)
				),
			flags.orderMeta &&
				el( Fragment, null,
					el( ToggleControl, {
						label: __( 'Order by Custom Field', 'aegis' ),
						checked: aegisOrderByMeta,
						onChange: function ( value ) {
							setAttributes( { aegisOrderByMeta: value } );
						},
					} ),
					aegisOrderByMeta &&
						el( Fragment, null,
							el( TextControl, {
								label: __( 'Order Meta Key', 'aegis' ),
								value: aegisOrderMetaKey,
								onChange: function ( value ) {
									setAttributes( { aegisOrderMetaKey: value } );
								},
								placeholder: __( 'e.g., _price, event_date', 'aegis' ),
							} ),
							el( SelectControl, {
								label: __( 'Order Meta Type', 'aegis' ),
								value: aegisOrderMetaType,
								options: metaTypes,
								onChange: function ( value ) {
									setAttributes( { aegisOrderMetaType: value } );
								},
							} )
						)
				)
		);
	}

	function OrderingPanel( { attributes, setAttributes } ) {
		return el(
			PanelBody,
			{ title: __( 'Ordering', 'aegis' ), initialOpen: false },
			el( SelectControl, {
				label: __( 'Order By', 'aegis' ),
				value: attributes.aegisOrderBy || '',
				options: orderByOptions,
				onChange: function ( value ) {
					setAttributes( { aegisOrderBy: value } );
				},
				help: __( 'Extended ordering options beyond the default.', 'aegis' ),
			} ),
			attributes.aegisOrderBy === 'rand' &&
				el( RangeControl, {
					label: __( 'Random Seed', 'aegis' ),
					help: __(
						'Use a seed for consistent random order across pagination. Leave at 0 for true random.',
						'aegis'
					),
					value: attributes.aegisRandomSeed || 0,
					onChange: function ( value ) {
						setAttributes( { aegisRandomSeed: value } );
					},
					min: 0,
					max: 9999,
				} )
		);
	}

	function LayoutPanel( { attributes, setAttributes, flags } ) {
		return el(
			PanelBody,
			{ title: __( 'Layout', 'aegis' ), initialOpen: false },
			flags.responsiveColumns &&
				el( Fragment, null,
					el( RangeControl, {
						label: __( 'Columns (Mobile)', 'aegis' ),
						help: breakpoints.mobile
							? breakpoints.mobile + ' — ' + __( '0 keeps the Query Loop layout.', 'aegis' )
							: __( '0 keeps the Query Loop layout.', 'aegis' ),
						value: columnCount( attributes.aegisColumnsMobile ),
						onChange: function ( value ) {
							setAttributes( { aegisColumnsMobile: columnCount( value ) } );
						},
						min: 0,
						max: 12,
					} ),
					el( RangeControl, {
						label: __( 'Columns (Tablet)', 'aegis' ),
						help: breakpoints.tablet
							? breakpoints.tablet + ' — ' + __( '0 keeps the Query Loop layout.', 'aegis' )
							: __( '0 keeps the Query Loop layout.', 'aegis' ),
						value: columnCount( attributes.aegisColumnsTablet ),
						onChange: function ( value ) {
							setAttributes( { aegisColumnsTablet: columnCount( value ) } );
						},
						min: 0,
						max: 12,
					} ),
					el( RangeControl, {
						label: __( 'Columns (Desktop)', 'aegis' ),
						help: breakpoints.desktop
							? breakpoints.desktop + ' — ' + __( '0 keeps the Query Loop layout.', 'aegis' )
							: __( '0 keeps the Query Loop layout.', 'aegis' ),
						value: columnCount( attributes.aegisColumnsDesktop ),
						onChange: function ( value ) {
							setAttributes( { aegisColumnsDesktop: columnCount( value ) } );
						},
						min: 0,
						max: 12,
					} )
				),
			flags.gapControls &&
				el( Fragment, null,
					el( TextControl, {
						label: __( 'Row Gap', 'aegis' ),
						value: attributes.aegisRowGap || '',
						onChange: function ( value ) {
							setAttributes( { aegisRowGap: value || '' } );
						},
						placeholder: '1.5rem',
						help: __( 'CSS length, e.g. 1.5rem or 24px.', 'aegis' ),
					} ),
					el( TextControl, {
						label: __( 'Column Gap', 'aegis' ),
						value: attributes.aegisColumnGap || '',
						onChange: function ( value ) {
							setAttributes( { aegisColumnGap: value || '' } );
						},
						placeholder: '1.5rem',
						help: __( 'CSS length, e.g. 1.5rem or 24px.', 'aegis' ),
					} )
				),
			flags.featuredFirst &&
				el( Fragment, null,
					el( ToggleControl, {
						label: __( 'Featured First Post', 'aegis' ),
						help: __( 'Make the first post span multiple columns.', 'aegis' ),
						checked: !! attributes.aegisFeaturedFirst,
						onChange: function ( value ) {
							setAttributes( { aegisFeaturedFirst: value } );
						},
					} ),
					attributes.aegisFeaturedFirst &&
						el( RangeControl, {
							label: __( 'Featured Span', 'aegis' ),
							value: attributes.aegisFeaturedFirstSpan || 2,
							onChange: function ( value ) {
								setAttributes( { aegisFeaturedFirstSpan: value } );
							},
							min: 2,
							max: 6,
						} )
				),
			flags.equalHeight &&
				el( ToggleControl, {
					label: __( 'Equal Height Cards', 'aegis' ),
					help: __( 'Force all cards to have equal height.', 'aegis' ),
					checked: !! attributes.aegisEqualHeight,
					onChange: function ( value ) {
						setAttributes( { aegisEqualHeight: value } );
					},
				} )
		);
	}

	function NoResultsPanel( { attributes, setAttributes } ) {
		const templates =
			templateOptions.length > 0
				? templateOptions
				: [
						{ value: 'default', label: __( 'Default', 'aegis' ) },
						{ value: 'minimal', label: __( 'Minimal', 'aegis' ) },
						{ value: 'card', label: __( 'Card', 'aegis' ) },
						{ value: 'centered', label: __( 'Centered', 'aegis' ) },
				  ];
		const icons =
			iconOptions.length > 0
				? iconOptions
				: [
						{ value: 'search', label: __( 'Search', 'aegis' ) },
						{ value: 'folder', label: __( 'Folder', 'aegis' ) },
						{ value: 'document', label: __( 'Document', 'aegis' ) },
						{ value: 'info', label: __( 'Info', 'aegis' ) },
						{ value: 'none', label: __( 'None', 'aegis' ) },
				  ];

		return el(
			PanelBody,
			{ title: __( 'No Results', 'aegis' ), initialOpen: false },
			el( ToggleControl, {
				label: __( 'Enable No Results Template', 'aegis' ),
				help: __( 'Show a custom message when no posts match the query.', 'aegis' ),
				checked: !! attributes.aegisNoResultsEnabled,
				onChange: function ( value ) {
					setAttributes( { aegisNoResultsEnabled: value } );
				},
			} ),
			attributes.aegisNoResultsEnabled &&
				el( Fragment, null,
					el( TextControl, {
						label: __( 'Message', 'aegis' ),
						value: attributes.aegisNoResultsMessage || '',
						onChange: function ( value ) {
							setAttributes( { aegisNoResultsMessage: value } );
						},
						placeholder: __(
							'No posts found matching your criteria.',
							'aegis'
						),
					} ),
					el( SelectControl, {
						label: __( 'Template Style', 'aegis' ),
						value: attributes.aegisNoResultsTemplate || 'default',
						options: templates,
						onChange: function ( value ) {
							setAttributes( { aegisNoResultsTemplate: value } );
						},
					} ),
					el( SelectControl, {
						label: __( 'Icon', 'aegis' ),
						value: attributes.aegisNoResultsIcon || 'search',
						options: icons,
						onChange: function ( value ) {
							setAttributes( { aegisNoResultsIcon: value } );
						},
					} ),
					el( ToggleControl, {
						label: __( 'Show Search Form', 'aegis' ),
						help: __(
							'Display a search form in the no results message.',
							'aegis'
						),
						checked: !! attributes.aegisNoResultsShowSearch,
						onChange: function ( value ) {
							setAttributes( { aegisNoResultsShowSearch: value } );
						},
					} )
				)
		);
	}

	function QueryEnhancementsPanels( { attributes, setAttributes } ) {
		const flags = features();
		const showLayout =
			flags.responsiveColumns ||
			flags.gapControls ||
			flags.featuredFirst ||
			flags.equalHeight;
		const showCustomField = flags.metaQuery || flags.orderMeta;

		return el(
			Fragment,
			null,
			el( QueryParametersPanel, {
				attributes: attributes,
				setAttributes: setAttributes,
				flags: flags,
			} ),
			showCustomField &&
				el( CustomFieldPanel, {
					attributes: attributes,
					setAttributes: setAttributes,
					flags: flags,
				} ),
			flags.extendedOrder &&
				el( OrderingPanel, {
					attributes: attributes,
					setAttributes: setAttributes,
				} ),
			showLayout &&
				el( LayoutPanel, {
					attributes: attributes,
					setAttributes: setAttributes,
					flags: flags,
				} ),
			flags.noResults &&
				el( NoResultsPanel, {
					attributes: attributes,
					setAttributes: setAttributes,
				} )
		);
	}

	const withQueryEnhancements = createHigherOrderComponent( function ( BlockEdit ) {
		return function ( props ) {
			if ( props.name !== 'core/query' || ! features().enabled ) {
				return el( BlockEdit, props );
			}

			return el(
				Fragment,
				null,
				el( BlockEdit, props ),
				el(
					InspectorControls,
					null,
					el( QueryEnhancementsPanels, {
						attributes: props.attributes,
						setAttributes: props.setAttributes,
					} )
				)
			);
		};
	}, 'withQueryEnhancements' );

	addFilter( 'editor.BlockEdit', 'aegis/query-enhancements', withQueryEnhancements );

	addFilter(
		'editor.BlockListBlock',
		'aegis/query-layout-preview',
		createHigherOrderComponent( function ( BlockListBlock ) {
			return function ( props ) {
				if ( props.name !== 'core/query' || ! features().enabled ) {
					return el( BlockListBlock, props );
				}

				const preview = layoutPreview( props.attributes || {}, features() );

				if ( ! preview.className ) {
					return el( BlockListBlock, props );
				}

				const wrapperProps = Object.assign( {}, props.wrapperProps || {} );
				let className = wrapperProps.className || props.className || '';

				preview.className.split( /\s+/ ).forEach( function ( name ) {
					className = addClass( className, name );
				} );

				wrapperProps.style = Object.assign( {}, wrapperProps.style || {}, preview.style );
				wrapperProps.className = className;

				return el(
					BlockListBlock,
					Object.assign( {}, props, {
						className: className,
						wrapperProps: wrapperProps,
					} )
				);
			};
		}, 'withQueryLayoutPreview' )
	);
} )( window.wp );
