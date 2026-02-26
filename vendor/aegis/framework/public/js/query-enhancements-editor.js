/**
 * Query Enhancements Editor Extension
 *
 * Adds advanced query controls to the core/query block.
 *
 * @package Aegis
 * @since   1.0.0
 */

( function( wp ) {
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
		Flex,
		FlexItem,
		__experimentalNumberControl: NumberControl,
		__experimentalUnitControl: UnitControl,
	} = wp.components;
	const { __ } = wp.i18n;
	const { useSelect } = wp.data;
	const apiFetch = wp.apiFetch;

	// Get data from PHP
	const queryEnhancementsData = window.aegis?.queryEnhancements || {};
	const postTypes = queryEnhancementsData.postTypes || [];
	const taxonomies = queryEnhancementsData.taxonomies || [];
	const metaCompareOperators = queryEnhancementsData.metaCompareOperators || [];
	const metaTypes = queryEnhancementsData.metaTypes || [];
	const orderByOptions = queryEnhancementsData.orderByOptions || [];

	const queryLayoutData = window.aegis?.queryLayout || {};
	const queryNoResultsData = window.aegis?.queryNoResults || {};
	const noResultsTemplates = queryNoResultsData.templates || [];
	const noResultsIcons = queryNoResultsData.icons || [];

	/**
	 * Get the REST base for a taxonomy.
	 *
	 * JS2: Taxonomy REST base is not always the taxonomy name
	 * (e.g., category -> categories, post_tag -> tags).
	 *
	 * @param {string} taxonomySlug The taxonomy slug.
	 * @return {string} The REST base path segment.
	 */
	function getTaxonomyRestBase( taxonomySlug ) {
		const tax = taxonomies.find( function( t ) { return t.value === taxonomySlug; } );
		if ( tax && tax.restBase ) {
			return tax.restBase;
		}
		// Fallback: common WP core mappings.
		var mapping = { 'category': 'categories', 'post_tag': 'tags' };
		return mapping[ taxonomySlug ] || taxonomySlug;
	}

	/**
	 * Post Search Component
	 */
	function PostSearch( { selectedPosts, onChange, label } ) {
		const [ searchTerm, setSearchTerm ] = useState( '' );
		const [ searchResults, setSearchResults ] = useState( [] );
		const [ isSearching, setIsSearching ] = useState( false );

		useEffect( function() {
			if ( searchTerm.length < 2 ) {
				setSearchResults( [] );
				return;
			}

			setIsSearching( true );

			const controller = new AbortController();

			apiFetch( {
				path: '/wp/v2/search?search=' + encodeURIComponent( searchTerm ) + '&per_page=10&type=post',
				signal: controller.signal,
			} ).then( function( results ) {
				setSearchResults( results.map( function( post ) {
					return { id: post.id, title: post.title };
				} ) );
				setIsSearching( false );
			} ).catch( function() {
				setIsSearching( false );
			} );

			return function() {
				controller.abort();
			};
		}, [ searchTerm ] );

		const addPost = function( postId ) {
			if ( selectedPosts.indexOf( postId ) === -1 ) {
				onChange( [ ...selectedPosts, postId ] );
			}
			setSearchTerm( '' );
			setSearchResults( [] );
		};

		const removePost = function( postId ) {
			onChange( selectedPosts.filter( function( id ) { return id !== postId; } ) );
		};

		// JS3: Add ARIA role="listbox" to search results for screen reader accessibility.
		return el( 'div', { style: { marginBottom: '16px' } },
			el( TextControl, {
				label: label,
				value: searchTerm,
				onChange: setSearchTerm,
				placeholder: __( 'Search posts...', 'aegis' ),
				'aria-autocomplete': 'list',
			} ),
			isSearching && el( 'p', { style: { fontSize: '12px', color: '#757575' }, 'aria-live': 'polite' }, __( 'Searching...', 'aegis' ) ),
			searchResults.length > 0 && el( 'div', {
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
				searchResults.map( function( post ) {
					return el( Button, {
						key: post.id,
						role: 'option',
						variant: 'tertiary',
						onClick: function() { addPost( post.id ); },
						style: { display: 'block', width: '100%', textAlign: 'left' },
					}, post.title );
				} )
			),
			selectedPosts.length > 0 && el( 'div', { style: { display: 'flex', flexWrap: 'wrap', gap: '4px' } },
				selectedPosts.map( function( postId ) {
					return el( 'span', {
						key: postId,
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
						el( 'span', null, 'ID: ' + postId ),
						el( Button, {
							icon: 'no-alt',
							iconSize: 12,
							isSmall: true,
							onClick: function() { removePost( postId ); },
							// JS4: Include post ID in label for screen readers.
							label: __( 'Remove post ID:', 'aegis' ) + ' ' + postId,
							style: { minWidth: 'auto', padding: '0', height: 'auto' },
						} )
					);
				} )
			)
		);
	}

	/**
	 * Taxonomy Term Selector Component
	 */
	function TaxonomyTermSelector( { taxQuery, onChange } ) {
		const [ selectedTaxonomy, setSelectedTaxonomy ] = useState( '' );
		const [ terms, setTerms ] = useState( [] );
		const [ selectedTerms, setSelectedTerms ] = useState( [] );

		useEffect( function() {
			if ( ! selectedTaxonomy ) {
				setTerms( [] );
				return;
			}

			apiFetch( {
				path: '/wp/v2/' + getTaxonomyRestBase( selectedTaxonomy ) + '?per_page=100',
			} ).then( function( results ) {
				setTerms( results.map( function( term ) {
					return { id: term.id, name: term.name };
				} ) );
			} ).catch( function() {
				setTerms( [] );
			} );
		}, [ selectedTaxonomy ] );

		const addTaxQuery = function() {
			if ( ! selectedTaxonomy || selectedTerms.length === 0 ) {
				return;
			}

			const newQuery = [
				...taxQuery,
				{
					taxonomy: selectedTaxonomy,
					terms: selectedTerms,
					operator: 'IN',
				},
			];

			onChange( newQuery );
			setSelectedTaxonomy( '' );
			setSelectedTerms( [] );
		};

		const removeTaxQuery = function( index ) {
			const newQuery = taxQuery.filter( function( _, i ) { return i !== index; } );
			onChange( newQuery );
		};

		const taxonomyOptions = [
			{ value: '', label: __( 'Select taxonomy...', 'aegis' ) },
			...taxonomies.map( function( tax ) {
				return { value: tax.value, label: tax.label };
			} ),
		];

		return el( 'div', { style: { marginBottom: '16px' } },
			el( 'p', { style: { fontWeight: '500', marginBottom: '8px' } }, __( 'Taxonomy Filters', 'aegis' ) ),

			// Existing filters
			taxQuery.length > 0 && el( 'div', { style: { marginBottom: '12px' } },
				taxQuery.map( function( item, index ) {
					const taxLabel = taxonomies.find( function( t ) { return t.value === item.taxonomy; } );
					return el( 'div', {
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
						el( 'span', { style: { flex: 1, fontSize: '12px' } },
							( taxLabel ? taxLabel.label : item.taxonomy ) + ': ' + item.terms.length + ' terms'
						),
						el( Button, {
							icon: 'no-alt',
							iconSize: 16,
							isSmall: true,
							onClick: function() { removeTaxQuery( index ); },
							label: __( 'Remove', 'aegis' ),
						} )
					);
				} )
			),

			// Add new filter
			el( SelectControl, {
				value: selectedTaxonomy,
				options: taxonomyOptions,
				onChange: setSelectedTaxonomy,
			} ),

			selectedTaxonomy && terms.length > 0 && el( FormTokenField, {
				label: __( 'Select terms', 'aegis' ),
				value: selectedTerms.map( function( id ) {
					const term = terms.find( function( t ) { return t.id === id; } );
					return term ? term.name : '';
				} ).filter( Boolean ),
				suggestions: terms.map( function( t ) { return t.name; } ),
				onChange: function( tokens ) {
					const ids = tokens.map( function( token ) {
						const term = terms.find( function( t ) { return t.name === token; } );
						return term ? term.id : null;
					} ).filter( Boolean );
					setSelectedTerms( ids );
				},
			} ),

			selectedTaxonomy && selectedTerms.length > 0 && el( Button, {
				variant: 'secondary',
				onClick: addTaxQuery,
				style: { marginTop: '8px' },
			}, __( 'Add Filter', 'aegis' ) )
		);
	}

	/**
	 * Query Enhancements Panel Component
	 */
	function QueryEnhancementsPanel( { attributes, setAttributes } ) {
		const {
			aegisPostTypes = [],
			aegisTaxQuery = [],
			aegisIncludePosts = [],
			aegisExcludePosts = [],
			aegisOffset = 0,
			aegisStickyPosts = 'include',
			aegisMetaKey = '',
			aegisMetaValue = '',
			aegisMetaCompare = '=',
			aegisMetaType = 'CHAR',
			aegisOrderByMeta = false,
			aegisOrderMetaKey = '',
			aegisOrderMetaType = 'CHAR',
		} = attributes;

		const postTypeOptions = postTypes.map( function( pt ) {
			return { value: pt.value, label: pt.label };
		} );

		const stickyOptions = [
			{ value: 'include', label: __( 'Include sticky posts', 'aegis' ) },
			{ value: 'exclude', label: __( 'Exclude sticky posts', 'aegis' ) },
			{ value: 'only', label: __( 'Only sticky posts', 'aegis' ) },
		];

		const compareOptions = metaCompareOperators.map( function( op ) {
			return { value: op.value, label: op.label };
		} );

		const typeOptions = metaTypes.map( function( t ) {
			return { value: t.value, label: t.label };
		} );

		return el( Fragment, null,
			el( PanelBody, {
				title: __( 'Query Parameters', 'aegis' ),
				initialOpen: false,
			},
				// Post Types
				el( 'div', { style: { marginBottom: '16px' } },
					el( 'p', { style: { fontWeight: '500', marginBottom: '8px' } }, __( 'Post Types', 'aegis' ) ),
					postTypeOptions.map( function( pt ) {
						const isSelected = aegisPostTypes.indexOf( pt.value ) !== -1;
						return el( ToggleControl, {
							key: pt.value,
							label: pt.label,
							checked: isSelected,
							onChange: function( checked ) {
								let newTypes;
								if ( checked ) {
									newTypes = [ ...aegisPostTypes, pt.value ];
								} else {
									newTypes = aegisPostTypes.filter( function( t ) { return t !== pt.value; } );
								}
								setAttributes( { aegisPostTypes: newTypes } );
							},
						} );
					} )
				),

				// Taxonomy Query
				el( TaxonomyTermSelector, {
					taxQuery: aegisTaxQuery,
					onChange: function( newQuery ) {
						setAttributes( { aegisTaxQuery: newQuery } );
					},
				} ),

				// Include Posts
				el( PostSearch, {
					label: __( 'Include Specific Posts', 'aegis' ),
					selectedPosts: aegisIncludePosts,
					onChange: function( posts ) {
						setAttributes( { aegisIncludePosts: posts } );
					},
				} ),

				// Exclude Posts
				el( PostSearch, {
					label: __( 'Exclude Specific Posts', 'aegis' ),
					selectedPosts: aegisExcludePosts,
					onChange: function( posts ) {
						setAttributes( { aegisExcludePosts: posts } );
					},
				} ),

				// Offset
				el( RangeControl, {
					label: __( 'Offset', 'aegis' ),
					help: __( 'Skip this many posts from the beginning.', 'aegis' ),
					value: aegisOffset,
					onChange: function( value ) {
						setAttributes( { aegisOffset: value } );
					},
					min: 0,
					max: 50,
				} ),

				// Sticky Posts
				el( SelectControl, {
					label: __( 'Sticky Posts', 'aegis' ),
					value: aegisStickyPosts,
					options: stickyOptions,
					onChange: function( value ) {
						setAttributes( { aegisStickyPosts: value } );
					},
				} )
			),

			// Meta Query Panel
			el( PanelBody, {
				title: __( 'Custom Field Query', 'aegis' ),
				initialOpen: false,
			},
				el( TextControl, {
					label: __( 'Meta Key', 'aegis' ),
					value: aegisMetaKey,
					onChange: function( value ) {
						setAttributes( { aegisMetaKey: value } );
					},
					placeholder: __( 'e.g., _price, event_date', 'aegis' ),
				} ),

				aegisMetaKey && el( Fragment, null,
					el( SelectControl, {
						label: __( 'Compare', 'aegis' ),
						value: aegisMetaCompare,
						options: compareOptions,
						onChange: function( value ) {
							setAttributes( { aegisMetaCompare: value } );
						},
					} ),

					aegisMetaCompare !== 'EXISTS' && aegisMetaCompare !== 'NOT EXISTS' && el( TextControl, {
						label: __( 'Value', 'aegis' ),
						value: aegisMetaValue,
						onChange: function( value ) {
							setAttributes( { aegisMetaValue: value } );
						},
					} ),

					el( SelectControl, {
						label: __( 'Value Type', 'aegis' ),
						value: aegisMetaType,
						options: typeOptions,
						onChange: function( value ) {
							setAttributes( { aegisMetaType: value } );
						},
					} )
				),

				// Order by Meta
				el( ToggleControl, {
					label: __( 'Order by Custom Field', 'aegis' ),
					checked: aegisOrderByMeta,
					onChange: function( value ) {
						setAttributes( { aegisOrderByMeta: value } );
					},
				} ),

				aegisOrderByMeta && el( Fragment, null,
					el( TextControl, {
						label: __( 'Order Meta Key', 'aegis' ),
						value: aegisOrderMetaKey,
						onChange: function( value ) {
							setAttributes( { aegisOrderMetaKey: value } );
						},
						placeholder: __( 'e.g., _price, event_date', 'aegis' ),
					} ),

					el( SelectControl, {
						label: __( 'Order Meta Type', 'aegis' ),
						value: aegisOrderMetaType,
						options: typeOptions,
						onChange: function( value ) {
							setAttributes( { aegisOrderMetaType: value } );
						},
					} )
				)
			),

			// Layout Panel
			el( PanelBody, {
				title: __( 'Responsive Layout', 'aegis' ),
				initialOpen: false,
			},
				el( RangeControl, {
					label: __( 'Columns (Mobile)', 'aegis' ),
					value: attributes.aegisColumnsMobile || 1,
					onChange: function( value ) {
						setAttributes( { aegisColumnsMobile: value } );
					},
					min: 1,
					max: 6,
				} ),

				el( RangeControl, {
					label: __( 'Columns (Tablet)', 'aegis' ),
					value: attributes.aegisColumnsTablet || 2,
					onChange: function( value ) {
						setAttributes( { aegisColumnsTablet: value } );
					},
					min: 1,
					max: 6,
				} ),

				el( RangeControl, {
					label: __( 'Columns (Desktop)', 'aegis' ),
					value: attributes.aegisColumnsDesktop || 3,
					onChange: function( value ) {
						setAttributes( { aegisColumnsDesktop: value } );
					},
					min: 1,
					max: 6,
				} ),

				el( TextControl, {
					label: __( 'Row Gap', 'aegis' ),
					value: attributes.aegisRowGap || '',
					onChange: function( value ) {
						setAttributes( { aegisRowGap: value } );
					},
					placeholder: __( 'e.g., 2rem, 20px', 'aegis' ),
				} ),

				el( TextControl, {
					label: __( 'Column Gap', 'aegis' ),
					value: attributes.aegisColumnGap || '',
					onChange: function( value ) {
						setAttributes( { aegisColumnGap: value } );
					},
					placeholder: __( 'e.g., 2rem, 20px', 'aegis' ),
				} ),

				el( ToggleControl, {
					label: __( 'Featured First Post', 'aegis' ),
					help: __( 'Make the first post span multiple columns.', 'aegis' ),
					checked: attributes.aegisFeaturedFirst || false,
					onChange: function( value ) {
						setAttributes( { aegisFeaturedFirst: value } );
					},
				} ),

				attributes.aegisFeaturedFirst && el( RangeControl, {
					label: __( 'Featured Span', 'aegis' ),
					value: attributes.aegisFeaturedFirstSpan || 2,
					onChange: function( value ) {
						setAttributes( { aegisFeaturedFirstSpan: value } );
					},
					min: 2,
					max: 6,
				} ),

				el( ToggleControl, {
					label: __( 'Equal Height Cards', 'aegis' ),
					help: __( 'Force all cards to have equal height.', 'aegis' ),
					checked: attributes.aegisEqualHeight || false,
					onChange: function( value ) {
						setAttributes( { aegisEqualHeight: value } );
					},
				} )
			),

			// Extended Ordering Panel
			el( PanelBody, {
				title: __( 'Ordering', 'aegis' ),
				initialOpen: false,
			},
				el( SelectControl, {
					label: __( 'Order By', 'aegis' ),
					value: attributes.aegisOrderBy || '',
					options: orderByOptions.map( function( opt ) {
						return { value: opt.value, label: opt.label };
					} ),
					onChange: function( value ) {
						setAttributes( { aegisOrderBy: value } );
					},
					help: __( 'Extended ordering options beyond the default.', 'aegis' ),
				} ),

				attributes.aegisOrderBy === 'rand' && el( RangeControl, {
					label: __( 'Random Seed', 'aegis' ),
					help: __( 'Use a seed for consistent random order across pagination. Leave at 0 for true random.', 'aegis' ),
					value: attributes.aegisRandomSeed || 0,
					onChange: function( value ) {
						setAttributes( { aegisRandomSeed: value } );
					},
					min: 0,
					max: 9999,
				} )
			),

			// No Results Panel
			el( PanelBody, {
				title: __( 'No Results', 'aegis' ),
				initialOpen: false,
			},
				el( ToggleControl, {
					label: __( 'Enable No Results Template', 'aegis' ),
					help: __( 'Show a custom message when no posts match the query.', 'aegis' ),
					checked: attributes.aegisNoResultsEnabled || false,
					onChange: function( value ) {
						setAttributes( { aegisNoResultsEnabled: value } );
					},
				} ),

				attributes.aegisNoResultsEnabled && el( Fragment, null,
					el( TextControl, {
						label: __( 'Message', 'aegis' ),
						value: attributes.aegisNoResultsMessage || '',
						onChange: function( value ) {
							setAttributes( { aegisNoResultsMessage: value } );
						},
						placeholder: __( 'No posts found matching your criteria.', 'aegis' ),
					} ),

					el( SelectControl, {
						label: __( 'Template Style', 'aegis' ),
						value: attributes.aegisNoResultsTemplate || 'default',
						options: noResultsTemplates.length > 0 ? noResultsTemplates.map( function( t ) {
							return { value: t.value, label: t.label };
						} ) : [
							{ value: 'default', label: __( 'Default', 'aegis' ) },
							{ value: 'minimal', label: __( 'Minimal', 'aegis' ) },
							{ value: 'card', label: __( 'Card', 'aegis' ) },
							{ value: 'centered', label: __( 'Centered', 'aegis' ) },
						],
						onChange: function( value ) {
							setAttributes( { aegisNoResultsTemplate: value } );
						},
					} ),

					el( SelectControl, {
						label: __( 'Icon', 'aegis' ),
						value: attributes.aegisNoResultsIcon || 'search',
						options: noResultsIcons.length > 0 ? noResultsIcons.map( function( i ) {
							return { value: i.value, label: i.label };
						} ) : [
							{ value: 'search', label: __( 'Search', 'aegis' ) },
							{ value: 'folder', label: __( 'Folder', 'aegis' ) },
							{ value: 'document', label: __( 'Document', 'aegis' ) },
							{ value: 'info', label: __( 'Info', 'aegis' ) },
							{ value: 'none', label: __( 'None', 'aegis' ) },
						],
						onChange: function( value ) {
							setAttributes( { aegisNoResultsIcon: value } );
						},
					} ),

					el( ToggleControl, {
						label: __( 'Show Search Form', 'aegis' ),
						help: __( 'Display a search form in the no results message.', 'aegis' ),
						checked: attributes.aegisNoResultsShowSearch || false,
						onChange: function( value ) {
							setAttributes( { aegisNoResultsShowSearch: value } );
						},
					} )
				)
			)
		);
	}

	/**
	 * Add Query Enhancements panel to core/query block.
	 */
	const withQueryEnhancements = createHigherOrderComponent( function( BlockEdit ) {
		return function( props ) {
			if ( props.name !== 'core/query' ) {
				return el( BlockEdit, props );
			}

			return el( Fragment, null,
				el( BlockEdit, props ),
				el( InspectorControls, null,
					el( QueryEnhancementsPanel, {
						attributes: props.attributes,
						setAttributes: props.setAttributes,
					} )
				)
			);
		};
	}, 'withQueryEnhancements' );

	addFilter(
		'editor.BlockEdit',
		'aegis/query-enhancements',
		withQueryEnhancements
	);

} )( window.wp );
