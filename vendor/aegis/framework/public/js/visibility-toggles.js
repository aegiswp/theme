/**
 * Block visibility controls for the block editor sidebar.
 *
 * @package Aegis\Framework
 */
( function ( wp ) {
	'use strict';

	const { addFilter } = wp.hooks;
	const { createHigherOrderComponent } = wp.compose;
	const { Fragment, createElement: el } = wp.element;
	const { InspectorControls } = wp.blockEditor;
	const { PanelBody, SelectControl, ToggleControl, TextControl, Button, Flex, FlexItem } = wp.components;
	const { __ } = wp.i18n;

	const settings = window.aegis?.conditionalLogicSettings || {};
	const userRoles = window.aegis?.userRoles || [];
	const canManage = window.aegis?.canManageConditionals !== false;
	const presets = window.aegis?.visibilityPresets || [];

	if ( ! canManage ) {
		return;
	}

	function isEnabled( group, feature ) {
		return !!( settings[ group ] && settings[ group ][ feature ] );
	}

	const showHideOptions = [
		{ label: __( 'Show when matched', 'aegis' ), value: 'show' },
		{ label: __( 'Hide when matched', 'aegis' ), value: 'hide' },
	];

	const relationOptions = [
		{ label: __( 'All rules must match', 'aegis' ), value: 'all' },
		{ label: __( 'Any rule must match', 'aegis' ), value: 'any' },
	];

	const isIsNotOptions = [
		{ label: __( 'is', 'aegis' ), value: 'is' },
		{ label: __( 'is not', 'aegis' ), value: 'isNot' },
	];

	const deviceOptions = [
		{ label: __( 'Select…', 'aegis' ), value: '' },
		{ label: 'iOS', value: 'ios' },
		{ label: 'Android', value: 'android' },
		{ label: 'Windows', value: 'windows' },
		{ label: 'macOS', value: 'macos' },
		{ label: 'Linux', value: 'linux' },
		{ label: 'Chrome', value: 'chrome' },
		{ label: 'Firefox', value: 'firefox' },
		{ label: 'Safari', value: 'safari' },
		{ label: 'Edge', value: 'edge' },
		{ label: __( 'Mobile', 'aegis' ), value: 'mobile' },
		{ label: __( 'Tablet', 'aegis' ), value: 'tablet' },
		{ label: __( 'Desktop', 'aegis' ), value: 'desktop' },
	];

	const weekdayOptions = [
		{ label: __( 'Sunday', 'aegis' ), value: '0' },
		{ label: __( 'Monday', 'aegis' ), value: '1' },
		{ label: __( 'Tuesday', 'aegis' ), value: '2' },
		{ label: __( 'Wednesday', 'aegis' ), value: '3' },
		{ label: __( 'Thursday', 'aegis' ), value: '4' },
		{ label: __( 'Friday', 'aegis' ), value: '5' },
		{ label: __( 'Saturday', 'aegis' ), value: '6' },
	];

	function RuleList( props ) {
		const { rulesKey, logicKey, relationKey, fields, defaultRule, visibility, updateVisibility } = props;
		const rules = visibility[ rulesKey ] || [];

		function updateRule( index, patch ) {
			const next = rules.map( ( rule, i ) => ( i === index ? { ...rule, ...patch } : rule ) );
			updateVisibility( rulesKey, next );
		}

		function removeRule( index ) {
			updateVisibility( rulesKey, rules.filter( ( _, i ) => i !== index ) );
		}

		function addRule() {
			updateVisibility( rulesKey, [ ...rules, { ...defaultRule } ] );
		}

		return el(
			Fragment,
			{},
			el( SelectControl, {
				label: __( 'Logic', 'aegis' ),
				value: visibility[ logicKey ] || 'show',
				options: showHideOptions,
				onChange: ( v ) => updateVisibility( logicKey, v ),
				__nextHasNoMarginBottom: true,
			} ),
			rules.length > 1 && el( SelectControl, {
				label: __( 'Relation', 'aegis' ),
				value: visibility[ relationKey ] || 'all',
				options: relationOptions,
				onChange: ( v ) => updateVisibility( relationKey, v ),
				__nextHasNoMarginBottom: true,
			} ),
			rules.map( ( rule, index ) =>
				el(
					'div',
					{ key: index, className: 'aegis-visibility-rule-row', style: { marginBottom: '8px' } },
					fields.map( ( field ) => {
						if ( field.type === 'select' ) {
							return el( SelectControl, {
								key: field.key,
								label: field.label,
								value: rule[ field.key ] || '',
								options: field.options,
								onChange: ( v ) => updateRule( index, { [ field.key ]: v } ),
								__nextHasNoMarginBottom: true,
							} );
						}
						return el( TextControl, {
							key: field.key,
							label: field.label,
							value: rule[ field.key ] || '',
							onChange: ( v ) => updateRule( index, { [ field.key ]: v } ),
							__nextHasNoMarginBottom: true,
						} );
					} ),
					el( Button, {
						isDestructive: true,
						isSmall: true,
						onClick: () => removeRule( index ),
					}, __( 'Remove', 'aegis' ) )
				)
			),
			el( Button, { variant: 'secondary', isSmall: true, onClick: addRule }, __( 'Add Rule', 'aegis' ) )
		);
	}

	const withVisibilityToggles = createHigherOrderComponent( ( BlockEdit ) => {
		return function ( props ) {
			const { attributes, setAttributes } = props;
			const visibility = attributes.visibility || {};

			function updateVisibility( key, value ) {
				setAttributes( { visibility: { ...visibility, [ key ]: value } } );
			}

			function applyPreset( presetId ) {
				const preset = presets.find( ( p ) => p.id === presetId );
				if ( ! preset || ! preset.visibility ) {
					return;
				}
				if ( ! window.confirm( __( 'Replace current visibility settings with this preset?', 'aegis' ) ) ) {
					return;
				}
				setAttributes( { visibility: { ...preset.visibility } } );
			}

			const sections = [];

			if ( presets.length ) {
				sections.push(
					el( SelectControl, {
						key: 'presets',
						label: __( 'Apply Preset', 'aegis' ),
						value: '',
						options: [
							{ label: __( 'Select preset…', 'aegis' ), value: '' },
							...presets.map( ( p ) => ( { label: p.name, value: p.id } ) ),
						],
						onChange: applyPreset,
						__nextHasNoMarginBottom: true,
					} )
				);
			}

			if ( isEnabled( 'visibility', 'lockdown' ) ) {
				sections.push(
					el( ToggleControl, {
						key: 'lockdown',
						label: __( 'Lockdown (hide on frontend)', 'aegis' ),
						checked: !! visibility.lockdown,
						onChange: ( v ) => updateVisibility( 'lockdown', v ),
					} )
				);
			}

			if ( isEnabled( 'user', 'user_status' ) ) {
				sections.push(
					el( SelectControl, {
						key: 'userStatus',
						label: __( 'User Status', 'aegis' ),
						value: visibility.userStatus || '',
						options: [
							{ label: __( 'All Users', 'aegis' ), value: '' },
							{ label: __( 'Logged In', 'aegis' ), value: 'logged-in' },
							{ label: __( 'Logged Out', 'aegis' ), value: 'logged-out' },
						],
						onChange: ( v ) => updateVisibility( 'userStatus', v ),
						__nextHasNoMarginBottom: true,
					} )
				);
			}

			if ( isEnabled( 'user', 'user_role' ) ) {
				const roleOpts = [ { label: __( 'Any Role', 'aegis' ), value: '' }, ...userRoles ];
				sections.push(
					el(
						'div',
						{ key: 'userRole' },
						el( 'p', { className: 'components-base-control__label' }, __( 'User Role Rules', 'aegis' ) ),
						el( RuleList, {
							rulesKey: 'userRoleRules',
							logicKey: 'userRoleLogic',
							relationKey: 'userRoleRelation',
							defaultRule: { role: '', operator: 'is' },
							visibility,
							updateVisibility,
							fields: [
								{ key: 'role', type: 'select', label: __( 'Role', 'aegis' ), options: roleOpts },
								{ key: 'operator', type: 'select', label: __( 'Operator', 'aegis' ), options: isIsNotOptions },
							],
						} )
					)
				);
			}

			if ( isEnabled( 'schedule', 'date_time' ) || isEnabled( 'schedule', 'time_range' ) || isEnabled( 'schedule', 'timezone' ) ) {
				const scheduleFields = [];
				if ( isEnabled( 'schedule', 'date_time' ) ) {
					scheduleFields.push(
						el( TextControl, { key: 'scheduleStart', label: __( 'Schedule Start', 'aegis' ), type: 'datetime-local', value: visibility.scheduleStart || '', onChange: ( v ) => updateVisibility( 'scheduleStart', v ), __nextHasNoMarginBottom: true } ),
						el( TextControl, { key: 'scheduleEnd', label: __( 'Schedule End', 'aegis' ), type: 'datetime-local', value: visibility.scheduleEnd || '', onChange: ( v ) => updateVisibility( 'scheduleEnd', v ), __nextHasNoMarginBottom: true } )
					);
				}
				if ( isEnabled( 'schedule', 'time_range' ) ) {
					scheduleFields.push(
						el( TextControl, { key: 'scheduleTimeStart', label: __( 'Daily Start Time', 'aegis' ), type: 'time', value: visibility.scheduleTimeStart || '', onChange: ( v ) => updateVisibility( 'scheduleTimeStart', v ), __nextHasNoMarginBottom: true } ),
						el( TextControl, { key: 'scheduleTimeEnd', label: __( 'Daily End Time', 'aegis' ), type: 'time', value: visibility.scheduleTimeEnd || '', onChange: ( v ) => updateVisibility( 'scheduleTimeEnd', v ), __nextHasNoMarginBottom: true } )
					);
				}
				if ( isEnabled( 'schedule', 'timezone' ) ) {
					scheduleFields.push(
						el( TextControl, { key: 'scheduleTimezone', label: __( 'Timezone', 'aegis' ), help: __( 'Leave empty for site timezone.', 'aegis' ), value: visibility.scheduleTimezone || '', onChange: ( v ) => updateVisibility( 'scheduleTimezone', v ), __nextHasNoMarginBottom: true } )
					);
				}
				sections.push.apply( sections, scheduleFields );
			}

			if ( isEnabled( 'schedule', 'days_of_week' ) ) {
				const selectedDays = ( visibility.scheduleDays || [] ).map( String );
				sections.push(
					el(
						'div',
						{ key: 'scheduleDays', className: 'aegis-visibility-weekdays' },
						el( 'p', { className: 'components-base-control__label' }, __( 'Active Weekdays', 'aegis' ) ),
						weekdayOptions.map( ( day ) =>
							el( ToggleControl, {
								key: day.value,
								label: day.label,
								checked: selectedDays.indexOf( day.value ) !== -1,
								onChange: ( checked ) => {
									const next = selectedDays.slice();
									const idx = next.indexOf( day.value );
									if ( checked && idx === -1 ) {
										next.push( day.value );
									} else if ( ! checked && idx !== -1 ) {
										next.splice( idx, 1 );
									}
									updateVisibility( 'scheduleDays', next.map( Number ) );
								},
							} )
						)
					)
				);
			}

			if ( isEnabled( 'visibility', 'screen_size' ) ) {
				sections.push(
					el( ToggleControl, { key: 'hideMobile', label: __( 'Hide on Mobile', 'aegis' ), checked: !! visibility.hideOnMobile, onChange: ( v ) => updateVisibility( 'hideOnMobile', v ) } ),
					el( ToggleControl, { key: 'hideTablet', label: __( 'Hide on Tablet', 'aegis' ), checked: !! visibility.hideOnTablet, onChange: ( v ) => updateVisibility( 'hideOnTablet', v ) } ),
					el( ToggleControl, { key: 'hideDesktop', label: __( 'Hide on Desktop', 'aegis' ), checked: !! visibility.hideOnDesktop, onChange: ( v ) => updateVisibility( 'hideOnDesktop', v ) } )
				);
			}

			if ( isEnabled( 'visibility', 'browser_device' ) ) {
				sections.push(
					el(
						'div',
						{ key: 'device' },
						el( 'p', { className: 'components-base-control__label' }, __( 'Browser & Device', 'aegis' ) ),
						el( RuleList, {
							rulesKey: 'deviceRules',
							logicKey: 'deviceLogic',
							relationKey: 'deviceRelation',
							defaultRule: { device: '', operator: 'is' },
							visibility,
							updateVisibility,
							fields: [
								{ key: 'device', type: 'select', label: __( 'Device', 'aegis' ), options: deviceOptions },
								{ key: 'operator', type: 'select', label: __( 'Operator', 'aegis' ), options: isIsNotOptions },
							],
						} )
					)
				);
			}

			if ( isEnabled( 'visibility', 'query_string' ) ) {
				sections.push(
					el(
						'div',
						{ key: 'queryString' },
						el( 'p', { className: 'components-base-control__label' }, __( 'URL Query String', 'aegis' ) ),
						el( RuleList, {
							rulesKey: 'queryStringRules',
							logicKey: 'queryStringLogic',
							relationKey: 'queryStringRelation',
							defaultRule: { param: '', operator: 'is', value: '' },
							visibility,
							updateVisibility,
							fields: [
								{ key: 'param', type: 'text', label: __( 'Parameter', 'aegis' ) },
								{ key: 'operator', type: 'select', label: __( 'Operator', 'aegis' ), options: isIsNotOptions },
								{ key: 'value', type: 'text', label: __( 'Value', 'aegis' ) },
							],
						} )
					)
				);
			}

			if ( isEnabled( 'visibility', 'specific_users' ) ) {
				sections.push(
					el( TextControl, { key: 'specificUsers', label: __( 'User IDs (comma-separated)', 'aegis' ), value: visibility.specificUserIds || '', onChange: ( v ) => updateVisibility( 'specificUserIds', v ), __nextHasNoMarginBottom: true } ),
					el( SelectControl, { key: 'specificUsersLogic', label: __( 'Logic', 'aegis' ), value: visibility.specificUsersLogic || 'show', options: showHideOptions, onChange: ( v ) => updateVisibility( 'specificUsersLogic', v ), __nextHasNoMarginBottom: true } )
				);
			}

			if ( isEnabled( 'accessibility', 'screen_reader_only' ) ) {
				sections.push(
					el( ToggleControl, { key: 'srOnly', label: __( 'Screen reader only', 'aegis' ), checked: !! visibility.screenReaderOnly, onChange: ( v ) => updateVisibility( 'screenReaderOnly', v ) } )
				);
			}

			if ( isEnabled( 'accessibility', 'reduced_motion' ) ) {
				sections.push(
					el( ToggleControl, { key: 'reducedMotion', label: __( 'Hide when reduced motion preferred', 'aegis' ), checked: !! visibility.reducedMotion, onChange: ( v ) => updateVisibility( 'reducedMotion', v ) } )
				);
			}

			if ( isEnabled( 'accessibility', 'color_scheme' ) ) {
				sections.push(
					el( SelectControl, {
						key: 'colorScheme',
						label: __( 'Hide for color scheme', 'aegis' ),
						value: visibility.colorScheme || '',
						options: [
							{ label: __( 'None', 'aegis' ), value: '' },
							{ label: __( 'Dark', 'aegis' ), value: 'dark' },
							{ label: __( 'Light', 'aegis' ), value: 'light' },
						],
						onChange: ( v ) => updateVisibility( 'colorScheme', v ),
						__nextHasNoMarginBottom: true,
					} )
				);
			}

			if ( isEnabled( 'accessibility', 'high_contrast' ) ) {
				sections.push(
					el( ToggleControl, { key: 'highContrast', label: __( 'Hide when high contrast preferred', 'aegis' ), checked: !! visibility.highContrast, onChange: ( v ) => updateVisibility( 'highContrast', v ) } )
				);
			}

			if ( isEnabled( 'accessibility', 'forced_colors' ) ) {
				sections.push(
					el( ToggleControl, { key: 'forcedColors', label: __( 'Hide when forced colors active', 'aegis' ), checked: !! visibility.forcedColors, onChange: ( v ) => updateVisibility( 'forcedColors', v ) } )
				);
			}

			if ( ! sections.length ) {
				return el( BlockEdit, props );
			}

			return el(
				Fragment,
				{},
				el( BlockEdit, props ),
				el(
					InspectorControls,
					{},
					el(
						PanelBody,
						{ title: __( 'Visibility', 'aegis' ), initialOpen: false, className: 'aegis-visibility-panel' },
						sections
					)
				)
			);
		};
	}, 'withVisibilityToggles' );

	addFilter( 'editor.BlockEdit', 'aegis/visibility-toggles', withVisibilityToggles, 101 );
}( window.wp ) );
