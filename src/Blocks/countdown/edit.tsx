/**
 * Countdown Block - Editor Component
 *
 * @package
 * @since   1.0.0
 */

import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	ToggleControl,
	TextControl,
	DateTimePicker,
} from '@wordpress/components';
import { useState, useEffect } from '@wordpress/element';

interface CountdownLabels {
	days: string;
	hours: string;
	minutes: string;
	seconds: string;
}

interface CountdownAttributes {
	datetime: string;
	showDays: boolean;
	showHours: boolean;
	showMinutes: boolean;
	showSeconds: boolean;
	labels: CountdownLabels;
	separator: string;
	layout: string;
	expiryMessage: string;
	timezone: string;
	schemaEnabled: boolean;
	schemaEventName: string;
	schemaEventDescription: string;
	schemaEventLocation: string;
	schemaEventUrl: string;
}

interface EditProps {
	attributes: CountdownAttributes;
	setAttributes: ( attrs: Partial< CountdownAttributes > ) => void;
}

interface TimeRemaining {
	days: number;
	hours: number;
	minutes: number;
	seconds: number;
	total: number;
}

const SEPARATOR_MAP: Record< string, string > = {
	colon: ':',
	dot: '·',
	dash: '—',
	none: '',
};

const DEFAULT_LABELS: CountdownLabels = {
	days: 'Days',
	hours: 'Hours',
	minutes: 'Minutes',
	seconds: 'Seconds',
};

interface CountdownFeatures {
	segments: boolean;
	labels: boolean;
	separator: boolean;
	layout: boolean;
	expiryMessage: boolean;
	timezone: boolean;
	schema: boolean;
}

declare global {
	interface Window {
		aegisCountdownFeatures?: Partial< CountdownFeatures >;
	}
}

function countdownFeatures(): CountdownFeatures {
	const raw = window.aegisCountdownFeatures;

	if ( ! raw ) {
		return {
			segments: true,
			labels: true,
			separator: true,
			layout: true,
			expiryMessage: true,
			timezone: true,
			schema: true,
		};
	}

	return {
		segments: !! raw.segments,
		labels: !! raw.labels,
		separator: !! raw.separator,
		layout: !! raw.layout,
		expiryMessage: !! raw.expiryMessage,
		timezone: !! raw.timezone,
		schema: !! raw.schema,
	};
}

function getTimeRemaining( datetime: string, timezone: string ): TimeRemaining {
	if ( ! datetime ) {
		return { days: 0, hours: 0, minutes: 0, seconds: 0, total: 0 };
	}

	const now = new Date();
	let target: Date;

	if ( timezone === 'local' ) {
		target = new Date( datetime );
	} else {
		// Treat the stored datetime as UTC.
		const utcString = datetime.endsWith( 'Z' ) ? datetime : datetime + 'Z';
		target = new Date( utcString );
	}

	const total = Math.max( 0, target.getTime() - now.getTime() );
	const seconds = Math.floor( ( total / 1000 ) % 60 );
	const minutes = Math.floor( ( total / 1000 / 60 ) % 60 );
	const hours = Math.floor( ( total / ( 1000 * 60 * 60 ) ) % 24 );
	const days = Math.floor( total / ( 1000 * 60 * 60 * 24 ) );

	return { days, hours, minutes, seconds, total };
}

function pad( value: number ): string {
	return String( value ).padStart( 2, '0' );
}

export default function Edit( { attributes, setAttributes }: EditProps ) {
	const extras = countdownFeatures();
	const {
		datetime,
		showDays,
		showHours,
		showMinutes,
		showSeconds,
		labels,
		separator,
		layout,
		expiryMessage,
		timezone,
		schemaEnabled,
		schemaEventName,
		schemaEventDescription,
		schemaEventLocation,
		schemaEventUrl,
	} = attributes;

	const previewTimezone = extras.timezone ? timezone : 'utc';
	const previewLayout = extras.layout ? layout : 'inline';
	const previewSeparator = extras.separator ? separator : 'colon';
	const previewLabels = extras.labels ? labels : DEFAULT_LABELS;
	const previewExpiry = extras.expiryMessage ? expiryMessage : '';
	const previewShowDays = extras.segments ? showDays : true;
	const previewShowHours = extras.segments ? showHours : true;
	const previewShowMinutes = extras.segments ? showMinutes : true;
	const previewShowSeconds = extras.segments ? showSeconds : true;

	const [ time, setTime ] = useState< TimeRemaining >( () =>
		getTimeRemaining( datetime, previewTimezone )
	);

	useEffect( () => {
		if ( ! datetime ) {
			setTime( { days: 0, hours: 0, minutes: 0, seconds: 0, total: 0 } );
			return;
		}

		const tick = () => setTime( getTimeRemaining( datetime, previewTimezone ) );
		tick();
		const id = setInterval( tick, 1000 );
		return () => clearInterval( id );
	}, [ datetime, previewTimezone ] );

	const blockProps = useBlockProps( {
		className: `aegis-countdown aegis-countdown--${ previewLayout }`,
	} );

	const isExpired = datetime !== '' && time.total <= 0;
	const sep = SEPARATOR_MAP[ previewSeparator ] || '';

	const segments: {
		key: string;
		show: boolean;
		value: number;
		label: string;
	}[] = [
		{
			key: 'days',
			show: previewShowDays,
			value: time.days,
			label: previewLabels.days,
		},
		{
			key: 'hours',
			show: previewShowHours,
			value: time.hours,
			label: previewLabels.hours,
		},
		{
			key: 'minutes',
			show: previewShowMinutes,
			value: time.minutes,
			label: previewLabels.minutes,
		},
		{
			key: 'seconds',
			show: previewShowSeconds,
			value: time.seconds,
			label: previewLabels.seconds,
		},
	];

	const visibleSegments = segments.filter( ( s ) => s.show );
	const showDisplayPanel =
		extras.segments || extras.separator || extras.layout;

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Countdown Settings', 'aegis' ) }>
					<DateTimePicker
						currentDate={ datetime || undefined }
						onChange={ ( value ) =>
							setAttributes( { datetime: value || '' } )
						}
						is12Hour={ false }
					/>
					{ extras.timezone && (
						<SelectControl
							label={ __( 'Timezone', 'aegis' ) }
							value={ timezone }
							options={ [
								{ label: __( 'UTC', 'aegis' ), value: 'utc' },
								{
									label: __( 'Visitor Local', 'aegis' ),
									value: 'local',
								},
							] }
							onChange={ ( value ) =>
								setAttributes( { timezone: value } )
							}
						/>
					) }
				</PanelBody>

				{ showDisplayPanel && (
					<PanelBody
						title={ __( 'Display', 'aegis' ) }
						initialOpen={ false }
					>
						{ extras.segments && (
							<>
								<ToggleControl
									label={ __( 'Show Days', 'aegis' ) }
									checked={ showDays }
									onChange={ ( value ) =>
										setAttributes( { showDays: value } )
									}
								/>
								<ToggleControl
									label={ __( 'Show Hours', 'aegis' ) }
									checked={ showHours }
									onChange={ ( value ) =>
										setAttributes( { showHours: value } )
									}
								/>
								<ToggleControl
									label={ __( 'Show Minutes', 'aegis' ) }
									checked={ showMinutes }
									onChange={ ( value ) =>
										setAttributes( { showMinutes: value } )
									}
								/>
								<ToggleControl
									label={ __( 'Show Seconds', 'aegis' ) }
									checked={ showSeconds }
									onChange={ ( value ) =>
										setAttributes( { showSeconds: value } )
									}
								/>
							</>
						) }
						{ extras.separator && (
							<SelectControl
								label={ __( 'Separator', 'aegis' ) }
								value={ separator }
								options={ [
									{
										label: __( 'Colon (:)', 'aegis' ),
										value: 'colon',
									},
									{
										label: __( 'Dot (·)', 'aegis' ),
										value: 'dot',
									},
									{
										label: __( 'Dash (—)', 'aegis' ),
										value: 'dash',
									},
									{
										label: __( 'None', 'aegis' ),
										value: 'none',
									},
								] }
								onChange={ ( value ) =>
									setAttributes( { separator: value } )
								}
							/>
						) }
						{ extras.layout && (
							<SelectControl
								label={ __( 'Layout', 'aegis' ) }
								value={ layout }
								options={ [
									{
										label: __( 'Inline', 'aegis' ),
										value: 'inline',
									},
									{
										label: __( 'Stacked', 'aegis' ),
										value: 'stacked',
									},
								] }
								onChange={ ( value ) =>
									setAttributes( { layout: value } )
								}
							/>
						) }
					</PanelBody>
				) }

				{ extras.labels && (
				<PanelBody
					title={ __( 'Labels', 'aegis' ) }
					initialOpen={ false }
				>
					<TextControl
						label={ __( 'Days Label', 'aegis' ) }
						value={ labels.days }
						onChange={ ( value ) =>
							setAttributes( {
								labels: { ...labels, days: value },
							} )
						}
					/>
					<TextControl
						label={ __( 'Hours Label', 'aegis' ) }
						value={ labels.hours }
						onChange={ ( value ) =>
							setAttributes( {
								labels: { ...labels, hours: value },
							} )
						}
					/>
					<TextControl
						label={ __( 'Minutes Label', 'aegis' ) }
						value={ labels.minutes }
						onChange={ ( value ) =>
							setAttributes( {
								labels: { ...labels, minutes: value },
							} )
						}
					/>
					<TextControl
						label={ __( 'Seconds Label', 'aegis' ) }
						value={ labels.seconds }
						onChange={ ( value ) =>
							setAttributes( {
								labels: { ...labels, seconds: value },
							} )
						}
					/>
				</PanelBody>
				) }

				{ extras.expiryMessage && (
				<PanelBody
					title={ __( 'Expiry', 'aegis' ) }
					initialOpen={ false }
				>
					<TextControl
						label={ __( 'Expiry Message', 'aegis' ) }
						value={ expiryMessage }
						onChange={ ( value ) =>
							setAttributes( { expiryMessage: value } )
						}
						help={ __(
							'Text displayed when the countdown reaches zero. Leave empty to keep showing 00:00:00.',
							'aegis'
						) }
					/>
				</PanelBody>
				) }

				{ extras.schema && (
				<PanelBody
					title={ __( 'Schema.org Event', 'aegis' ) }
					initialOpen={ false }
				>
					<ToggleControl
						label={ __( 'Enable Event Schema', 'aegis' ) }
						checked={ schemaEnabled }
						onChange={ ( value ) =>
							setAttributes( { schemaEnabled: value } )
						}
						help={ __(
							'Add Schema.org Event structured data for search engines.',
							'aegis'
						) }
					/>
					{ schemaEnabled && (
						<>
							<TextControl
								label={ __( 'Event Name', 'aegis' ) }
								value={ schemaEventName }
								onChange={ ( value ) =>
									setAttributes( { schemaEventName: value } )
								}
							/>
							<TextControl
								label={ __( 'Description', 'aegis' ) }
								value={ schemaEventDescription }
								onChange={ ( value ) =>
									setAttributes( {
										schemaEventDescription: value,
									} )
								}
							/>
							<TextControl
								label={ __( 'Location', 'aegis' ) }
								value={ schemaEventLocation }
								onChange={ ( value ) =>
									setAttributes( {
										schemaEventLocation: value,
									} )
								}
							/>
							<TextControl
								label={ __( 'Event URL', 'aegis' ) }
								value={ schemaEventUrl }
								onChange={ ( value ) =>
									setAttributes( { schemaEventUrl: value } )
								}
								type="url"
							/>
						</>
					) }
				</PanelBody>
				) }
			</InspectorControls>

			{ ! datetime && (
				<div className="aegis-countdown-editor__placeholder">
					<span className="dashicons dashicons-clock"></span>
					<p>
						{ __(
							'Select a target date and time in the block settings.',
							'aegis'
						) }
					</p>
				</div>
			) }

			{ datetime && isExpired && previewExpiry && (
				<div className="aegis-countdown__expired">
					<p>{ previewExpiry }</p>
				</div>
			) }

			{ datetime && ( ! isExpired || ! previewExpiry ) && (
				<div className="aegis-countdown__segments">
					{ visibleSegments.map( ( segment, index ) => (
						<>
							{ index > 0 && sep && (
								<span
									key={ `sep-${ segment.key }` }
									className="aegis-countdown__separator"
									aria-hidden="true"
								>
									{ sep }
								</span>
							) }
							<div
								key={ segment.key }
								className="aegis-countdown__segment"
								data-unit={ segment.key }
							>
								<span className="aegis-countdown__digits">
									{ pad( segment.value ) }
								</span>
								<span className="aegis-countdown__label">
									{ segment.label }
								</span>
							</div>
						</>
					) ) }
				</div>
			) }
		</div>
	);
}
