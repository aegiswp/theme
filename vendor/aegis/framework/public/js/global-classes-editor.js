/**
 * Global Classes Editor Extension
 *
 * Adds a panel for applying utility CSS classes to blocks.
 *
 * @package Aegis
 * @since   1.0.0
 */

( function( wp ) {
	'use strict';

	const { addFilter } = wp.hooks;
	const { createHigherOrderComponent } = wp.compose;
	const { Fragment, createElement: el, useState, useCallback } = wp.element;
	const { InspectorControls } = wp.blockEditor;
	const { PanelBody, TextControl, Button, Flex, FlexItem, DropdownMenu, MenuGroup, MenuItem, __experimentalInputControl: InputControl } = wp.components;
	const { __ } = wp.i18n;

	// Get class list from PHP
	const globalClassesData = window.aegis?.globalClasses || { classes: {} };
	const availableClasses = globalClassesData.classes || {};

	// Category labels
	const categoryLabels = {
		spacing: __( 'Spacing', 'aegis' ),
		typography: __( 'Typography', 'aegis' ),
		layout: __( 'Layout', 'aegis' ),
		effects: __( 'Effects', 'aegis' ),
	};

	// Category icons
	const categoryIcons = {
		spacing: 'editor-expand',
		typography: 'editor-textcolor',
		layout: 'layout',
		effects: 'admin-appearance',
	};

	/**
	 * Class Tag Component
	 */
	function ClassTag( { className, onRemove } ) {
		return el(
			'span',
			{
				style: {
					display: 'inline-flex',
					alignItems: 'center',
					gap: '4px',
					padding: '2px 8px',
					backgroundColor: '#f0f0f0',
					borderRadius: '3px',
					fontSize: '12px',
					marginRight: '4px',
					marginBottom: '4px',
				},
			},
			el( 'span', null, className ),
			el( Button, {
				icon: 'no-alt',
				iconSize: 12,
				isSmall: true,
				onClick: onRemove,
				label: __( 'Remove class', 'aegis' ),
				style: {
					minWidth: 'auto',
					padding: '0',
					height: 'auto',
				},
			} )
		);
	}

	/**
	 * Class Suggestions Dropdown
	 */
	function ClassSuggestions( { category, classes, onSelect, appliedClasses } ) {
		const filteredClasses = classes.filter( function( cls ) {
			return appliedClasses.indexOf( cls ) === -1;
		} );

		if ( filteredClasses.length === 0 ) {
			return null;
		}

		return el( DropdownMenu, {
			icon: categoryIcons[ category ] || 'plus',
			label: categoryLabels[ category ] || category,
			text: categoryLabels[ category ] || category,
			controls: filteredClasses.slice( 0, 20 ).map( function( cls ) {
				return {
					title: cls.replace( 'aegis-', '' ),
					onClick: function() {
						onSelect( cls );
					},
				};
			} ),
		} );
	}

	/**
	 * Global Classes Panel Component
	 */
	function GlobalClassesPanel( { attributes, setAttributes } ) {
		const aegisClasses = attributes.aegisClasses || '';
		const [ inputValue, setInputValue ] = useState( '' );
		const [ suggestions, setSuggestions ] = useState( [] );

		// Parse current classes
		const appliedClasses = aegisClasses
			.split( ' ' )
			.map( function( c ) { return c.trim(); } )
			.filter( function( c ) { return c.length > 0; } );

		// Add a class
		const addClass = useCallback( function( className ) {
			if ( ! className || appliedClasses.indexOf( className ) !== -1 ) {
				return;
			}
			const newClasses = appliedClasses.concat( [ className ] );
			setAttributes( { aegisClasses: newClasses.join( ' ' ) } );
			setInputValue( '' );
			setSuggestions( [] );
		}, [ appliedClasses, setAttributes ] );

		// Remove a class
		const removeClass = useCallback( function( className ) {
			const newClasses = appliedClasses.filter( function( c ) {
				return c !== className;
			} );
			setAttributes( { aegisClasses: newClasses.join( ' ' ) } );
		}, [ appliedClasses, setAttributes ] );

		// Handle input change with suggestions
		const handleInputChange = useCallback( function( value ) {
			setInputValue( value );

			if ( value.length < 2 ) {
				setSuggestions( [] );
				return;
			}

			// Search all categories for matching classes
			const allClasses = [];
			Object.keys( availableClasses ).forEach( function( category ) {
				availableClasses[ category ].forEach( function( cls ) {
					if ( cls.toLowerCase().indexOf( value.toLowerCase() ) !== -1 ) {
						allClasses.push( cls );
					}
				} );
			} );

			// Filter out already applied and limit to 10
			const filtered = allClasses
				.filter( function( cls ) {
					return appliedClasses.indexOf( cls ) === -1;
				} )
				.slice( 0, 10 );

			setSuggestions( filtered );
		}, [ appliedClasses ] );

		// Handle Enter key
		const handleKeyDown = useCallback( function( event ) {
			if ( event.key === 'Enter' ) {
				event.preventDefault();
				if ( suggestions.length > 0 ) {
					addClass( suggestions[ 0 ] );
				} else if ( inputValue.trim() ) {
					addClass( inputValue.trim() );
				}
			}
		}, [ suggestions, inputValue, addClass ] );

		return el( PanelBody, {
			title: __( 'Utilities', 'aegis' ),
			initialOpen: false,
		},
			// Applied classes display
			appliedClasses.length > 0 && el(
				'div',
				{
					style: {
						marginBottom: '12px',
						display: 'flex',
						flexWrap: 'wrap',
					},
				},
				appliedClasses.map( function( cls ) {
					return el( ClassTag, {
						key: cls,
						className: cls,
						onRemove: function() {
							removeClass( cls );
						},
					} );
				} )
			),

			// Class input with suggestions
			el(
				'div',
				{ style: { marginBottom: '12px', position: 'relative' } },
				el( TextControl, {
					label: __( 'Add Class', 'aegis' ),
					value: inputValue,
					onChange: handleInputChange,
					onKeyDown: handleKeyDown,
					placeholder: __( 'Type to search...', 'aegis' ),
					help: __( 'Type class name or use quick add below', 'aegis' ),
				} ),

				// Suggestions dropdown
				suggestions.length > 0 && el(
					'div',
					{
						style: {
							position: 'absolute',
							top: '100%',
							left: 0,
							right: 0,
							backgroundColor: '#fff',
							border: '1px solid #ddd',
							borderRadius: '4px',
							boxShadow: '0 2px 8px rgba(0,0,0,0.1)',
							zIndex: 100,
							maxHeight: '200px',
							overflowY: 'auto',
						},
					},
					suggestions.map( function( cls ) {
						return el(
							'button',
							{
								key: cls,
								type: 'button',
								onClick: function() {
									addClass( cls );
								},
								style: {
									display: 'block',
									width: '100%',
									padding: '8px 12px',
									textAlign: 'left',
									border: 'none',
									background: 'none',
									cursor: 'pointer',
									fontSize: '13px',
								},
								onMouseEnter: function( e ) {
									e.target.style.backgroundColor = '#f0f0f0';
								},
								onMouseLeave: function( e ) {
									e.target.style.backgroundColor = 'transparent';
								},
							},
							cls
						);
					} )
				)
			),

			// Quick add section
			el(
				'div',
				null,
				el(
					'p',
					{
						style: {
							fontSize: '11px',
							textTransform: 'uppercase',
							fontWeight: 500,
							marginBottom: '8px',
							color: '#757575',
						},
					},
					__( 'Quick Add', 'aegis' )
				),
				el(
					Flex,
					{
						wrap: true,
						gap: 2,
					},
					Object.keys( availableClasses ).map( function( category ) {
						return el(
							FlexItem,
							{ key: category },
							el( ClassSuggestions, {
								category: category,
								classes: availableClasses[ category ] || [],
								onSelect: addClass,
								appliedClasses: appliedClasses,
							} )
						);
					} )
				)
			),

			// Clear all button
			appliedClasses.length > 0 && el(
				'div',
				{ style: { marginTop: '12px' } },
				el( Button, {
					isDestructive: true,
					isSmall: true,
					onClick: function() {
						setAttributes( { aegisClasses: '' } );
					},
				}, __( 'Clear All Classes', 'aegis' ) )
			)
		);
	}

	/**
	 * Add Global Classes panel to block inspector
	 */
	const withGlobalClassesPanel = createHigherOrderComponent( function( BlockEdit ) {
		return function( props ) {
			// Skip for blocks that shouldn't have utility classes
			const skipBlocks = [
				'core/freeform',
				'core/html',
				'core/shortcode',
			];

			if ( skipBlocks.indexOf( props.name ) !== -1 ) {
				return el( BlockEdit, props );
			}

			return el(
				Fragment,
				null,
				el( BlockEdit, props ),
				el(
					InspectorControls,
					null,
					el( GlobalClassesPanel, {
						attributes: props.attributes,
						setAttributes: props.setAttributes,
					} )
				)
			);
		};
	}, 'withGlobalClassesPanel' );

	// Add the filter
	addFilter(
		'editor.BlockEdit',
		'aegis/global-classes-panel',
		withGlobalClassesPanel
	);

} )( window.wp );
