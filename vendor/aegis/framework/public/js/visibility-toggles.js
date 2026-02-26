/**
 * Visibility & Accessibility Editor Extension
 *
 * Adds two standalone panels:
 * 1. Visibility panel with:
 *    - Screen size (hide on mobile/tablet/desktop)
 *    - Custom breakpoints (user-defined min/max width)
 *    - Browser & Device (iOS/Android/Chrome/Safari/Firefox/Edge with is/is not)
 * 2. Accessibility panel with:
 *    - Reduced motion preference
 *    - Screen reader only
 *    - Color scheme (light/dark mode)
 *
 * @package Aegis
 * @since   1.0.0
 */

( function( wp ) {
	'use strict';

	const { addFilter } = wp.hooks;
	const { createHigherOrderComponent } = wp.compose;
	const { Fragment, createElement: el } = wp.element;
	const { InspectorControls } = wp.blockEditor;
	const { PanelBody, ToggleControl, SelectControl, Button, Flex, FlexItem, TextControl, __experimentalNumberControl: NumberControl } = wp.components;
	const { __ } = wp.i18n;

	// Get conditional logic settings from PHP - all disabled by default
	const clSettings = window.aegis?.conditionalLogicSettings || {
		visibility: { screen_size: false, custom_breakpoints: false, browser_device: false, lockdown: false, query_string: false, specific_users: false },
		accessibility: { reduced_motion: false, screen_reader_only: false, color_scheme: false, high_contrast: false, forced_colors: false },
		user: { user_status: false, user_role: false },
		schedule: { date_time: false }
	};

	// Query string operator options
	const queryStringOperatorOptions = [
		{ label: __( 'is', 'aegis' ), value: 'is' },
		{ label: __( 'is not', 'aegis' ), value: 'isNot' },
		{ label: __( 'exists', 'aegis' ), value: 'exists' },
		{ label: __( 'does not exist', 'aegis' ), value: 'notExists' },
		{ label: __( 'contains', 'aegis' ), value: 'contains' },
	];

	// Show/hide logic options
	const showHideOptions = [
		{ label: __( 'Show when matched', 'aegis' ), value: 'show' },
		{ label: __( 'Hide when matched', 'aegis' ), value: 'hide' },
	];

	// Relation options
	const relationOptions = [
		{ label: __( 'All rules must match', 'aegis' ), value: 'all' },
		{ label: __( 'Any rule must match', 'aegis' ), value: 'any' },
	];

	// Device/Browser options
	const deviceOptions = [
		{ label: __( 'Select...', 'aegis' ), value: '' },
		{ label: __( 'iOS', 'aegis' ), value: 'ios' },
		{ label: __( 'Android', 'aegis' ), value: 'android' },
		{ label: __( 'Chrome', 'aegis' ), value: 'chrome' },
		{ label: __( 'Safari', 'aegis' ), value: 'safari' },
		{ label: __( 'Firefox', 'aegis' ), value: 'firefox' },
		{ label: __( 'Edge', 'aegis' ), value: 'edge' },
	];

	const operatorOptions = [
		{ label: __( 'is', 'aegis' ), value: 'is' },
		{ label: __( 'is not', 'aegis' ), value: 'isNot' },
	];

	// Color scheme options
	const colorSchemeOptions = [
		{ label: __( 'Both', 'aegis' ), value: '' },
		{ label: __( 'Light Mode Only', 'aegis' ), value: 'light' },
		{ label: __( 'Dark Mode Only', 'aegis' ), value: 'dark' },
	];

	// User status options
	const userStatusOptions = [
		{ label: __( 'All Users', 'aegis' ), value: '' },
		{ label: __( 'Logged In Only', 'aegis' ), value: 'logged_in' },
		{ label: __( 'Logged Out Only', 'aegis' ), value: 'logged_out' },
	];

	// User role options — dynamically populated from WordPress via wp_roles()
	const dynamicRoles = ( window.aegis?.userRoles || [] ).map( function( r ) {
		return { label: r.label, value: r.value };
	} );
	const userRoleOptions = [
		{ label: __( 'Select Role...', 'aegis' ), value: '' },
		...dynamicRoles,
	];

	// Role operator options
	const roleOperatorOptions = [
		{ label: __( 'is', 'aegis' ), value: 'is' },
		{ label: __( 'is not', 'aegis' ), value: 'isNot' },
	];

	/**
	 * Query String Rule Component
	 */
	function QueryStringRule( { rule, index, onUpdate, onRemove } ) {
		const needsValue = rule.operator !== 'exists' && rule.operator !== 'notExists';

		return el(
			'div',
			{
				style: {
					marginBottom: '12px',
					padding: '12px',
					backgroundColor: '#f6f7f7',
					borderRadius: '4px',
				},
			},
			el(
				Flex,
				{
					align: 'flex-end',
					style: { marginBottom: '8px' },
				},
				el(
					FlexItem,
					{ style: { flex: 1 } },
					el( TextControl, {
						label: __( 'Parameter', 'aegis' ),
						value: rule.param || '',
						placeholder: 'e.g. utm_source',
						onChange: function( value ) {
							onUpdate( index, { ...rule, param: value } );
						},
						__nextHasNoMarginBottom: true,
					} )
				),
				el(
					FlexItem,
					{ style: { flex: 1 } },
					el( SelectControl, {
						label: __( 'Operator', 'aegis' ),
						value: rule.operator || 'is',
						options: queryStringOperatorOptions,
						onChange: function( value ) {
							onUpdate( index, { ...rule, operator: value } );
						},
						__nextHasNoMarginBottom: true,
					} )
				),
				el(
					FlexItem,
					{},
					el( Button, {
						icon: 'no-alt',
						isSmall: true,
						isDestructive: true,
						onClick: function() {
							onRemove( index );
						},
						label: __( 'Remove rule', 'aegis' ),
					} )
				)
			),
			needsValue && el( TextControl, {
				label: __( 'Value', 'aegis' ),
				value: rule.value || '',
				placeholder: 'e.g. google',
				onChange: function( value ) {
					onUpdate( index, { ...rule, value: value } );
				},
				__nextHasNoMarginBottom: true,
			} )
		);
	}

	/**
	 * User Role Rule Component
	 */
	function UserRoleRule( { rule, index, onUpdate, onRemove } ) {
		return el(
			'div',
			{
				style: {
					display: 'flex',
					gap: '8px',
					marginBottom: '8px',
					alignItems: 'flex-start',
				},
			},
			el( SelectControl, {
				value: rule.role || '',
				options: userRoleOptions,
				onChange: function( value ) {
					onUpdate( index, { ...rule, role: value } );
				},
				__nextHasNoMarginBottom: true,
				style: { flex: 1 },
			} ),
			el( SelectControl, {
				value: rule.operator || 'is',
				options: roleOperatorOptions,
				onChange: function( value ) {
					onUpdate( index, { ...rule, operator: value } );
				},
				__nextHasNoMarginBottom: true,
				style: { width: '80px' },
			} ),
			el( Button, {
				icon: 'no-alt',
				isSmall: true,
				isDestructive: true,
				onClick: function() {
					onRemove( index );
				},
				label: __( 'Remove', 'aegis' ),
			} )
		);
	}

	/**
	 * Add visibility attributes to all blocks.
	 */
	function addVisibilityAttributes( settings, name ) {
		// Skip adding visibility to certain core blocks that may have issues
		const skipBlocks = [
			'core/freeform',
			'core/html',
			'core/missing',
		];

		if ( skipBlocks.includes( name ) ) {
			return settings;
		}

		if ( settings.attributes ) {
			settings.attributes = {
				...settings.attributes,
				visibility: {
					type: 'object',
					default: {},
				},
			};
		}

		return settings;
	}

	addFilter(
		'blocks.registerBlockType',
		'aegis/visibility-attributes',
		addVisibilityAttributes
	);

	/**
	 * Custom Breakpoint Rule Component
	 */
	function BreakpointRule( { rule, index, onUpdate, onRemove } ) {
		return el(
			'div',
			{
				style: {
					marginBottom: '12px',
					padding: '12px',
					backgroundColor: '#f6f7f7',
					borderRadius: '4px',
				},
			},
			el(
				Flex,
				{
					align: 'flex-end',
					style: { marginBottom: '8px' },
				},
				el(
					FlexItem,
					{ style: { flex: 1 } },
					el( TextControl, {
						label: __( 'Min Width (px)', 'aegis' ),
						type: 'number',
						value: rule.minWidth || '',
						onChange: function( value ) {
							onUpdate( index, { ...rule, minWidth: value } );
						},
						__nextHasNoMarginBottom: true,
					} )
				),
				el(
					FlexItem,
					{ style: { flex: 1 } },
					el( TextControl, {
						label: __( 'Max Width (px)', 'aegis' ),
						type: 'number',
						value: rule.maxWidth || '',
						onChange: function( value ) {
							onUpdate( index, { ...rule, maxWidth: value } );
						},
						__nextHasNoMarginBottom: true,
					} )
				),
				el(
					FlexItem,
					{},
					el( Button, {
						icon: 'no-alt',
						isSmall: true,
						isDestructive: true,
						onClick: function() {
							onRemove( index );
						},
						label: __( 'Remove breakpoint', 'aegis' ),
					} )
				)
			),
			el( 'p', {
				style: {
					fontSize: '12px',
					color: '#757575',
					margin: 0,
				},
			}, rule.minWidth && rule.maxWidth
				? __( 'Hide between ', 'aegis' ) + rule.minWidth + 'px - ' + rule.maxWidth + 'px'
				: rule.minWidth
					? __( 'Hide above ', 'aegis' ) + rule.minWidth + 'px'
					: rule.maxWidth
						? __( 'Hide below ', 'aegis' ) + rule.maxWidth + 'px'
						: __( 'Enter min and/or max width', 'aegis' )
			)
		);
	}

	/**
	 * Device Rule Component
	 */
	function DeviceRule( { rule, index, onUpdate, onRemove } ) {
		return el(
			Flex,
			{
				align: 'flex-start',
				style: { marginBottom: '8px' },
			},
			el(
				FlexItem,
				{ style: { flex: 1 } },
				el( SelectControl, {
					value: rule.device || '',
					options: deviceOptions,
					onChange: function( value ) {
						onUpdate( index, { ...rule, device: value } );
					},
					__nextHasNoMarginBottom: true,
				} )
			),
			el(
				FlexItem,
				{ style: { flex: 1 } },
				el( SelectControl, {
					value: rule.operator || 'is',
					options: operatorOptions,
					onChange: function( value ) {
						onUpdate( index, { ...rule, operator: value } );
					},
					__nextHasNoMarginBottom: true,
				} )
			),
			el(
				FlexItem,
				{},
				el( Button, {
					icon: 'no-alt',
					isSmall: true,
					isDestructive: true,
					onClick: function() {
						onRemove( index );
					},
					label: __( 'Remove rule', 'aegis' ),
				} )
			)
		);
	}

	/**
	 * Add standalone Visibility panel below Display panel.
	 */
	const withVisibilityControls = createHigherOrderComponent( function( BlockEdit ) {
		return function( props ) {
			const { attributes, setAttributes, isSelected } = props;
			const visibility = attributes.visibility || {};
			const deviceRules = visibility.deviceRules || [];
			const customBreakpoints = visibility.customBreakpoints || [];
			const userRoleRules = visibility.userRoleRules || [];
			const queryStringRules = visibility.queryStringRules || [];
			const specificUserIds = visibility.specificUserIds || [];
			const lockdown = visibility.lockdown || false;

			const updateVisibility = function( key, value ) {
				setAttributes( {
					visibility: {
						...visibility,
						[ key ]: value,
					},
				} );
			};

			// Query string rule handlers
			const addQueryStringRule = function() {
				const newRules = [ ...queryStringRules, { param: '', operator: 'is', value: '' } ];
				updateVisibility( 'queryStringRules', newRules );
			};

			const updateQueryStringRule = function( index, rule ) {
				const newRules = [ ...queryStringRules ];
				newRules[ index ] = rule;
				updateVisibility( 'queryStringRules', newRules );
			};

			const removeQueryStringRule = function( index ) {
				const newRules = queryStringRules.filter( function( _, i ) {
					return i !== index;
				} );
				updateVisibility( 'queryStringRules', newRules );
			};

			// Device rule handlers
			const addDeviceRule = function() {
				const newRules = [ ...deviceRules, { device: '', operator: 'is' } ];
				updateVisibility( 'deviceRules', newRules );
			};

			const updateDeviceRule = function( index, rule ) {
				const newRules = [ ...deviceRules ];
				newRules[ index ] = rule;
				updateVisibility( 'deviceRules', newRules );
			};

			const removeDeviceRule = function( index ) {
				const newRules = deviceRules.filter( function( _, i ) {
					return i !== index;
				} );
				updateVisibility( 'deviceRules', newRules );
			};

			const addBreakpoint = function() {
				const newBreakpoints = [ ...customBreakpoints, { minWidth: '', maxWidth: '' } ];
				updateVisibility( 'customBreakpoints', newBreakpoints );
			};

			const updateBreakpoint = function( index, rule ) {
				const newBreakpoints = [ ...customBreakpoints ];
				newBreakpoints[ index ] = rule;
				updateVisibility( 'customBreakpoints', newBreakpoints );
			};

			const removeBreakpoint = function( index ) {
				const newBreakpoints = customBreakpoints.filter( function( _, i ) {
					return i !== index;
				} );
				updateVisibility( 'customBreakpoints', newBreakpoints );
			};

			// User role rule handlers
			const addUserRoleRule = function() {
				const newRules = [ ...userRoleRules, { role: '', operator: 'is' } ];
				updateVisibility( 'userRoleRules', newRules );
			};

			const updateUserRoleRule = function( index, rule ) {
				const newRules = [ ...userRoleRules ];
				newRules[ index ] = rule;
				updateVisibility( 'userRoleRules', newRules );
			};

			const removeUserRoleRule = function( index ) {
				const newRules = userRoleRules.filter( function( _, i ) {
					return i !== index;
				} );
				updateVisibility( 'userRoleRules', newRules );
			};

			// Check if any visibility features are enabled
			const hasVisibilityFeatures = clSettings.visibility.screen_size || 
				clSettings.visibility.custom_breakpoints || 
				clSettings.visibility.browser_device ||
				clSettings.visibility.lockdown ||
				clSettings.visibility.query_string ||
				clSettings.visibility.specific_users;

			// Check if any accessibility features are enabled
			const hasAccessibilityFeatures = clSettings.accessibility.reduced_motion ||
				clSettings.accessibility.screen_reader_only ||
				clSettings.accessibility.color_scheme ||
				clSettings.accessibility.high_contrast ||
				clSettings.accessibility.forced_colors;

			// Build visibility panel sections
			const visibilitySections = [];
			let isFirstSection = true;

			// Screen Size Section
			if ( clSettings.visibility.screen_size ) {
				visibilitySections.push(
					el( 'div', { 
						key: 'screen-size',
						className: 'aegis-visibility-section',
						style: isFirstSection ? {} : {
							borderTop: '1px solid #e0e0e0',
							marginTop: '16px',
							paddingTop: '16px',
						}
					},
						el( 'h3', {
							style: {
								fontSize: '11px',
								fontWeight: 500,
								textTransform: 'uppercase',
								marginBottom: '12px',
								marginTop: 0,
								color: '#1e1e1e',
							},
						}, __( 'Screen Size', 'aegis' ) ),
						el( ToggleControl, {
							label: __( 'Hide on Mobile', 'aegis' ),
							help: __( 'Screens smaller than 480px', 'aegis' ),
							checked: !! visibility.hideOnMobile,
							onChange: function( value ) {
								updateVisibility( 'hideOnMobile', value );
							},
						} ),
						el( ToggleControl, {
							label: __( 'Hide on Tablet', 'aegis' ),
							help: __( 'Screens 768px - 1023px', 'aegis' ),
							checked: !! visibility.hideOnTablet,
							onChange: function( value ) {
								updateVisibility( 'hideOnTablet', value );
							},
						} ),
						el( ToggleControl, {
							label: __( 'Hide on Desktop', 'aegis' ),
							help: __( 'Screens 1024px and larger', 'aegis' ),
							checked: !! visibility.hideOnDesktop,
							onChange: function( value ) {
								updateVisibility( 'hideOnDesktop', value );
							},
						} )
					)
				);
				isFirstSection = false;
			}

			// Custom Breakpoints Section
			if ( clSettings.visibility.custom_breakpoints ) {
				visibilitySections.push(
					el( 'div', {
						key: 'custom-breakpoints',
						className: 'aegis-visibility-section',
						style: isFirstSection ? {} : {
							borderTop: '1px solid #e0e0e0',
							marginTop: '16px',
							paddingTop: '16px',
						},
					},
						el( 'h3', {
							style: {
								fontSize: '11px',
								fontWeight: 500,
								textTransform: 'uppercase',
								marginBottom: '12px',
								marginTop: 0,
								color: '#1e1e1e',
							},
						}, __( 'Custom Breakpoints', 'aegis' ) ),
						customBreakpoints.length > 0 && customBreakpoints.map( function( rule, index ) {
							return el( BreakpointRule, {
								key: index,
								rule: rule,
								index: index,
								onUpdate: updateBreakpoint,
								onRemove: removeBreakpoint,
							} );
						} ),
						el( Button, {
							variant: 'secondary',
							isSmall: true,
							onClick: addBreakpoint,
							style: { marginTop: '8px' },
						}, __( 'Add Breakpoint', 'aegis' ) )
					)
				);
				isFirstSection = false;
			}

			// Browser & Device Section
			if ( clSettings.visibility.browser_device ) {
				visibilitySections.push(
					el( 'div', {
						key: 'browser-device',
						className: 'aegis-visibility-section',
						style: isFirstSection ? {} : {
							borderTop: '1px solid #e0e0e0',
							marginTop: '16px',
							paddingTop: '16px',
						},
					},
						el( 'h3', {
							style: {
								fontSize: '11px',
								fontWeight: 500,
								textTransform: 'uppercase',
								marginBottom: '12px',
								marginTop: 0,
								color: '#1e1e1e',
							},
						}, __( 'Browser & Device', 'aegis' ) ),
						deviceRules.length > 0 && deviceRules.map( function( rule, index ) {
							return el( DeviceRule, {
								key: index,
								rule: rule,
								index: index,
								onUpdate: updateDeviceRule,
								onRemove: removeDeviceRule,
							} );
						} ),
						el( Button, {
							variant: 'secondary',
							isSmall: true,
							onClick: addDeviceRule,
							style: { marginTop: '8px' },
						}, __( 'Add Rule', 'aegis' ) )
					)
				);
				isFirstSection = false;
			}

			// Lockdown Section
			if ( clSettings.visibility.lockdown ) {
				visibilitySections.push(
					el( 'div', {
						key: 'lockdown',
						className: 'aegis-visibility-section',
						style: isFirstSection ? {} : {
							borderTop: '1px solid #e0e0e0',
							marginTop: '16px',
							paddingTop: '16px',
						},
					},
						el( 'h3', {
							style: {
								fontSize: '11px',
								fontWeight: 500,
								textTransform: 'uppercase',
								marginBottom: '12px',
								marginTop: 0,
								color: '#1e1e1e',
							},
						}, __( 'Lockdown', 'aegis' ) ),
						el( ToggleControl, {
							label: __( 'Hide from All Users', 'aegis' ),
							help: __( 'Block will be hidden on the frontend for everyone. Useful for draft content on live pages.', 'aegis' ),
							checked: !! visibility.hideFromAll,
							onChange: function( value ) {
								updateVisibility( 'hideFromAll', value );
							},
						} )
					)
				);
				isFirstSection = false;
			}

			// URL Query String Section
			if ( clSettings.visibility.query_string ) {
				visibilitySections.push(
					el( 'div', {
						key: 'query-string',
						className: 'aegis-visibility-section',
						style: isFirstSection ? {} : {
							borderTop: '1px solid #e0e0e0',
							marginTop: '16px',
							paddingTop: '16px',
						},
					},
						el( 'h3', {
							style: {
								fontSize: '11px',
								fontWeight: 500,
								textTransform: 'uppercase',
								marginBottom: '12px',
								marginTop: 0,
								color: '#1e1e1e',
							},
						}, __( 'URL Query String', 'aegis' ) ),
						el( SelectControl, {
							label: __( 'Logic', 'aegis' ),
							value: visibility.queryStringLogic || 'show',
							options: showHideOptions,
							onChange: function( value ) {
								updateVisibility( 'queryStringLogic', value );
							},
							__nextHasNoMarginBottom: true,
						} ),
						queryStringRules.length > 1 && el( SelectControl, {
							label: __( 'Relation', 'aegis' ),
							value: visibility.queryStringRelation || 'all',
							options: relationOptions,
							onChange: function( value ) {
								updateVisibility( 'queryStringRelation', value );
							},
							__nextHasNoMarginBottom: true,
						} ),
						queryStringRules.length > 0 && queryStringRules.map( function( rule, index ) {
							return el( QueryStringRule, {
								key: index,
								rule: rule,
								index: index,
								onUpdate: updateQueryStringRule,
								onRemove: removeQueryStringRule,
							} );
						} ),
						el( Button, {
							variant: 'secondary',
							isSmall: true,
							onClick: addQueryStringRule,
							style: { marginTop: '8px' },
						}, __( 'Add Rule', 'aegis' ) )
					)
				);
				isFirstSection = false;
			}

			// Specific Users Section
			if ( clSettings.visibility.specific_users ) {
				visibilitySections.push(
					el( 'div', {
						key: 'specific-users',
						className: 'aegis-visibility-section',
						style: isFirstSection ? {} : {
							borderTop: '1px solid #e0e0e0',
							marginTop: '16px',
							paddingTop: '16px',
						},
					},
						el( 'h3', {
							style: {
								fontSize: '11px',
								fontWeight: 500,
								textTransform: 'uppercase',
								marginBottom: '12px',
								marginTop: 0,
								color: '#1e1e1e',
							},
						}, __( 'Specific Users', 'aegis' ) ),
						el( SelectControl, {
							label: __( 'Logic', 'aegis' ),
							value: visibility.specificUsersLogic || 'show',
							options: [
								{ label: __( 'Show only to these users', 'aegis' ), value: 'show' },
								{ label: __( 'Hide from these users', 'aegis' ), value: 'hide' },
							],
							onChange: function( value ) {
								updateVisibility( 'specificUsersLogic', value );
							},
							__nextHasNoMarginBottom: true,
						} ),
						el( TextControl, {
							label: __( 'User IDs', 'aegis' ),
							help: __( 'Comma-separated list of user IDs (e.g. 1, 5, 12)', 'aegis' ),
							value: visibility.specificUserIds || '',
							onChange: function( value ) {
								updateVisibility( 'specificUserIds', value );
							},
						} )
					)
				);
				isFirstSection = false;
			}

			// Build accessibility panel controls
			const accessibilityControls = [];

			if ( clSettings.accessibility.reduced_motion ) {
				accessibilityControls.push(
					el( ToggleControl, {
						key: 'reduced-motion',
						label: __( 'Hide with Reduced Motion', 'aegis' ),
						help: __( 'Hide when user prefers reduced motion', 'aegis' ),
						checked: !! visibility.hideReducedMotion,
						onChange: function( value ) {
							updateVisibility( 'hideReducedMotion', value );
						},
					} )
				);
			}

			if ( clSettings.accessibility.screen_reader_only ) {
				accessibilityControls.push(
					el( ToggleControl, {
						key: 'screen-reader',
						label: __( 'Screen Reader Only', 'aegis' ),
						help: __( 'Visually hidden but accessible to screen readers', 'aegis' ),
						checked: !! visibility.screenReaderOnly,
						onChange: function( value ) {
							updateVisibility( 'screenReaderOnly', value );
						},
					} )
				);
			}

			if ( clSettings.accessibility.color_scheme ) {
				accessibilityControls.push(
					el( SelectControl, {
						key: 'color-scheme',
						label: __( 'Color Scheme', 'aegis' ),
						help: __( 'Show block only in specific color scheme', 'aegis' ),
						value: visibility.colorScheme || '',
						options: colorSchemeOptions,
						onChange: function( value ) {
							updateVisibility( 'colorScheme', value );
						},
						__nextHasNoMarginBottom: true,
					} )
				);
			}

			if ( clSettings.accessibility.high_contrast ) {
				accessibilityControls.push(
					el( ToggleControl, {
						key: 'high-contrast',
						label: __( 'Hide in High Contrast', 'aegis' ),
						help: __( 'Hide when user prefers high contrast', 'aegis' ),
						checked: !! visibility.hideHighContrast,
						onChange: function( value ) {
							updateVisibility( 'hideHighContrast', value );
						},
					} )
				);
			}

			if ( clSettings.accessibility.forced_colors ) {
				accessibilityControls.push(
					el( ToggleControl, {
						key: 'forced-colors',
						label: __( 'Hide in Forced Colors', 'aegis' ),
						help: __( 'Hide when forced colors mode is active (Windows High Contrast)', 'aegis' ),
						checked: !! visibility.hideForcedColors,
						onChange: function( value ) {
							updateVisibility( 'hideForcedColors', value );
						},
					} )
				);
			}

			// Check if any user features are enabled
			const hasUserFeatures = clSettings.user.user_status || clSettings.user.user_role;

			// Build user controls
			const userControls = [];

			if ( clSettings.user.user_status ) {
				userControls.push(
					el( SelectControl, {
						key: 'user-status',
						label: __( 'User Status', 'aegis' ),
						help: __( 'Show block based on login status', 'aegis' ),
						value: visibility.userStatus || '',
						options: userStatusOptions,
						onChange: function( value ) {
							updateVisibility( 'userStatus', value );
						},
						__nextHasNoMarginBottom: true,
					} )
				);
			}

			if ( clSettings.user.user_role ) {
				userControls.push(
					el( 'div', {
						key: 'user-roles',
						style: {
							borderTop: clSettings.user.user_status ? '1px solid #e0e0e0' : 'none',
							marginTop: clSettings.user.user_status ? '16px' : 0,
							paddingTop: clSettings.user.user_status ? '16px' : 0,
						},
					},
						el( 'h3', {
							style: {
								fontSize: '11px',
								fontWeight: 500,
								textTransform: 'uppercase',
								marginBottom: '12px',
								marginTop: 0,
								color: '#1e1e1e',
							},
						}, __( 'User Roles', 'aegis' ) ),
						userRoleRules.length > 0 && userRoleRules.map( function( rule, index ) {
							return el( UserRoleRule, {
								key: index,
								rule: rule,
								index: index,
								onUpdate: updateUserRoleRule,
								onRemove: removeUserRoleRule,
							} );
						} ),
						el( Button, {
							variant: 'secondary',
							isSmall: true,
							onClick: addUserRoleRule,
							style: { marginTop: '8px' },
						}, __( 'Add Role Rule', 'aegis' ) )
					)
				);
			}

			// Check if schedule features are enabled
			const hasScheduleFeatures = clSettings.schedule.date_time;

			// Build schedule controls
			const scheduleControls = [];

			if ( clSettings.schedule.date_time ) {
				scheduleControls.push(
					el( 'div', { key: 'schedule-start' },
						el( TextControl, {
							label: __( 'Start Date/Time', 'aegis' ),
							help: __( 'Show block starting from this date/time (YYYY-MM-DD HH:MM)', 'aegis' ),
							value: visibility.scheduleStart || '',
							onChange: function( value ) {
								updateVisibility( 'scheduleStart', value );
							},
							type: 'datetime-local',
						} )
					),
					el( 'div', { key: 'schedule-end' },
						el( TextControl, {
							label: __( 'End Date/Time', 'aegis' ),
							help: __( 'Hide block after this date/time (YYYY-MM-DD HH:MM)', 'aegis' ),
							value: visibility.scheduleEnd || '',
							onChange: function( value ) {
								updateVisibility( 'scheduleEnd', value );
							},
							type: 'datetime-local',
						} )
					)
				);
			}

			return el(
				Fragment,
				{},
				el( BlockEdit, props ),
				isSelected && el(
					InspectorControls,
					{},
					// Visibility Panel (only if features enabled)
					hasVisibilityFeatures && el(
						PanelBody,
						{
							title: __( 'Visibility', 'aegis' ),
							initialOpen: false,
							className: 'aegis-visibility-panel',
						},
						visibilitySections
					),
					// Accessibility Panel (only if features enabled)
					hasAccessibilityFeatures && el(
						PanelBody,
						{
							title: __( 'Accessibility', 'aegis' ),
							initialOpen: false,
							className: 'aegis-accessibility-panel',
						},
						accessibilityControls
					),
					// User Panel (only if features enabled)
					hasUserFeatures && el(
						PanelBody,
						{
							title: __( 'User', 'aegis' ),
							initialOpen: false,
							className: 'aegis-user-panel',
						},
						userControls
					),
					// Schedule Panel (only if features enabled)
					hasScheduleFeatures && el(
						PanelBody,
						{
							title: __( 'Schedule', 'aegis' ),
							initialOpen: false,
							className: 'aegis-schedule-panel',
						},
						scheduleControls
					)
				)
			);
		};
	}, 'withVisibilityControls' );

	addFilter(
		'editor.BlockEdit',
		'aegis/visibility-controls',
		withVisibilityControls,
		100 // Higher priority to appear after Display panel
	);

} )( window.wp );
