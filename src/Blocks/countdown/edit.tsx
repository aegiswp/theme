/**
 * Countdown Block - Editor Component
 *
 * @package Aegis
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
}

interface EditProps {
	attributes: CountdownAttributes;
	setAttributes: ( attrs: Partial<CountdownAttributes> ) => void;
}

interface TimeRemaining {
	days: number;
	hours: number;
	minutes: number;
	seconds: number;
	total: number;
}

const SEPARATOR_MAP: Record<string, string> = {
	colon: ':',
	dot: '·',
	dash: '—',
	none: '',
};

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
	} = attributes;

	const [ time, setTime ] = useState<TimeRemaining>( () =>
		getTimeRemaining( datetime, timezone )
	);

	useEffect( () => {
		if ( ! datetime ) {
			setTime( { days: 0, hours: 0, minutes: 0, seconds: 0, total: 0 } );
			return;
		}

		const tick = () => setTime( getTimeRemaining( datetime, timezone ) );
		tick();
		const id = setInterval( tick, 1000 );
		return () => clearInterval( id );
	}, [ datetime, timezone ] );

	const blockProps = useBlockProps( {
		className: `aegis-countdown aegis-countdown--${ layout }`,
	} );

	const isExpired = datetime !== '' && time.total <= 0;
	const sep = SEPARATOR_MAP[ separator ] || '';

	const segments: { key: string; show: boolean; value: number; label: string }[] = [
		{ key: 'days', show: showDays, value: time.days, label: labels.days },
		{ key: 'hours', show: showHours, value: time.hours, label: labels.hours },
		{ key: 'minutes', show: showMinutes, value: time.minutes, label: labels.minutes },
		{ key: 'seconds', show: showSeconds, value: time.seconds, label: labels.seconds },
	];

	const visibleSegments = segments.filter( ( s ) => s.show );

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
					<SelectControl
						label={ __( 'Timezone', 'aegis' ) }
						value={ timezone }
						options={ [
							{ label: __( 'UTC', 'aegis' ), value: 'utc' },
							{ label: __( 'Visitor Local', 'aegis' ), value: 'local' },
						] }
						onChange={ ( value ) => setAttributes( { timezone: value } ) }
					/>
				</PanelBody>

				<PanelBody title={ __( 'Display', 'aegis' ) } initialOpen={ false }>
					<ToggleControl
						label={ __( 'Show Days', 'aegis' ) }
						checked={ showDays }
						onChange={ ( value ) => setAttributes( { showDays: value } ) }
					/>
					<ToggleControl
						label={ __( 'Show Hours', 'aegis' ) }
						checked={ showHours }
						onChange={ ( value ) => setAttributes( { showHours: value } ) }
					/>
					<ToggleControl
						label={ __( 'Show Minutes', 'aegis' ) }
						checked={ showMinutes }
						onChange={ ( value ) => setAttributes( { showMinutes: value } ) }
					/>
					<ToggleControl
						label={ __( 'Show Seconds', 'aegis' ) }
						checked={ showSeconds }
						onChange={ ( value ) => setAttributes( { showSeconds: value } ) }
					/>
					<SelectControl
						label={ __( 'Separator', 'aegis' ) }
						value={ separator }
						options={ [
							{ label: __( 'Colon (:)', 'aegis' ), value: 'colon' },
							{ label: __( 'Dot (·)', 'aegis' ), value: 'dot' },
							{ label: __( 'Dash (—)', 'aegis' ), value: 'dash' },
							{ label: __( 'None', 'aegis' ), value: 'none' },
						] }
						onChange={ ( value ) => setAttributes( { separator: value } ) }
					/>
					<SelectControl
						label={ __( 'Layout', 'aegis' ) }
						value={ layout }
						options={ [
							{ label: __( 'Inline', 'aegis' ), value: 'inline' },
							{ label: __( 'Stacked', 'aegis' ), value: 'stacked' },
						] }
						onChange={ ( value ) => setAttributes( { layout: value } ) }
					/>
				</PanelBody>

				<PanelBody title={ __( 'Labels', 'aegis' ) } initialOpen={ false }>
					<TextControl
						label={ __( 'Days Label', 'aegis' ) }
						value={ labels.days }
						onChange={ ( value ) =>
							setAttributes( { labels: { ...labels, days: value } } )
						}
					/>
					<TextControl
						label={ __( 'Hours Label', 'aegis' ) }
						value={ labels.hours }
						onChange={ ( value ) =>
							setAttributes( { labels: { ...labels, hours: value } } )
						}
					/>
					<TextControl
						label={ __( 'Minutes Label', 'aegis' ) }
						value={ labels.minutes }
						onChange={ ( value ) =>
							setAttributes( { labels: { ...labels, minutes: value } } )
						}
					/>
					<TextControl
						label={ __( 'Seconds Label', 'aegis' ) }
						value={ labels.seconds }
						onChange={ ( value ) =>
							setAttributes( { labels: { ...labels, seconds: value } } )
						}
					/>
				</PanelBody>

				<PanelBody title={ __( 'Expiry', 'aegis' ) } initialOpen={ false }>
					<TextControl
						label={ __( 'Expiry Message', 'aegis' ) }
						value={ expiryMessage }
						onChange={ ( value ) => setAttributes( { expiryMessage: value } ) }
						help={ __( 'Text displayed when the countdown reaches zero. Leave empty to keep showing 00:00:00.', 'aegis' ) }
					/>
				</PanelBody>
			</InspectorControls>

			{ ! datetime && (
				<div className="aegis-countdown-editor__placeholder">
					<span className="dashicons dashicons-clock"></span>
					<p>{ __( 'Select a target date and time in the block settings.', 'aegis' ) }</p>
				</div>
			) }

			{ datetime && isExpired && expiryMessage && (
				<div className="aegis-countdown__expired">
					<p>{ expiryMessage }</p>
				</div>
			) }

			{ datetime && ( ! isExpired || ! expiryMessage ) && (
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
