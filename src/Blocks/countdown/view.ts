/**
 * Countdown Block - Frontend View Script
 *
 * Handles live countdown updates, expiry behavior, and accessibility announcements.
 *
 * @package Aegis
 * @since   1.0.0
 */

( function () {
	'use strict';

	const INIT_FLAG = 'data-aegis-countdown-init';
	const SR_INTERVAL = 30000; // Screen reader announcement interval (30s).

	interface CountdownConfig {
		datetime: string;
		showDays: boolean;
		showHours: boolean;
		showMinutes: boolean;
		showSeconds: boolean;
		separator: string;
		layout: string;
		expiryMessage: string;
		timezone: string;
		labelDays: string;
		labelHours: string;
		labelMinutes: string;
		labelSeconds: string;
	}

	interface TimeRemaining {
		days: number;
		hours: number;
		minutes: number;
		seconds: number;
		total: number;
	}

	function parseConfig( el: HTMLElement ): CountdownConfig {
		return {
			datetime: el.getAttribute( 'data-datetime' ) || '',
			showDays: el.getAttribute( 'data-show-days' ) !== 'false',
			showHours: el.getAttribute( 'data-show-hours' ) !== 'false',
			showMinutes: el.getAttribute( 'data-show-minutes' ) !== 'false',
			showSeconds: el.getAttribute( 'data-show-seconds' ) !== 'false',
			separator: el.getAttribute( 'data-separator' ) || 'colon',
			layout: el.getAttribute( 'data-layout' ) || 'inline',
			expiryMessage: el.getAttribute( 'data-expiry-message' ) || '',
			timezone: el.getAttribute( 'data-timezone' ) || 'utc',
			labelDays: el.getAttribute( 'data-label-days' ) || 'Days',
			labelHours: el.getAttribute( 'data-label-hours' ) || 'Hours',
			labelMinutes: el.getAttribute( 'data-label-minutes' ) || 'Minutes',
			labelSeconds: el.getAttribute( 'data-label-seconds' ) || 'Seconds',
		};
	}

	function getTimeRemaining( datetime: string, timezone: string ): TimeRemaining {
		const now = new Date();
		let target: Date;

		if ( timezone === 'local' ) {
			target = new Date( datetime );
		} else {
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

	function initCountdown( wrapper: HTMLElement ): void {
		if ( wrapper.hasAttribute( INIT_FLAG ) ) {
			return;
		}
		wrapper.setAttribute( INIT_FLAG, '' );

		const config = parseConfig( wrapper );

		if ( ! config.datetime ) {
			return;
		}

		const segmentsContainer = wrapper.querySelector<HTMLElement>( '.aegis-countdown__segments' );
		const expiredContainer = wrapper.querySelector<HTMLElement>( '.aegis-countdown__expired' );
		const srRegion = wrapper.querySelector<HTMLElement>( '.aegis-countdown__sr' );

		if ( ! segmentsContainer ) {
			return;
		}

		// Collect digit elements by unit.
		const digitElements: Record<string, HTMLElement | null> = {};
		const units = [ 'days', 'hours', 'minutes', 'seconds' ];
		units.forEach( ( unit ) => {
			const segment = segmentsContainer.querySelector<HTMLElement>(
				`.aegis-countdown__segment[data-unit="${ unit }"]`
			);
			if ( segment ) {
				digitElements[ unit ] = segment.querySelector<HTMLElement>( '.aegis-countdown__digits' );
			}
		} );

		let lastSrUpdate = 0;

		function updateDisplay(): void {
			const time = getTimeRemaining( config.datetime, config.timezone );

			if ( time.total <= 0 ) {
				handleExpiry();
				return;
			}

			// Update digit text content.
			if ( digitElements.days ) {
				digitElements.days.textContent = pad( time.days );
			}
			if ( digitElements.hours ) {
				digitElements.hours.textContent = pad( time.hours );
			}
			if ( digitElements.minutes ) {
				digitElements.minutes.textContent = pad( time.minutes );
			}
			if ( digitElements.seconds ) {
				digitElements.seconds.textContent = pad( time.seconds );
			}

			// Throttled screen reader announcement.
			const now = Date.now();
			if ( srRegion && now - lastSrUpdate >= SR_INTERVAL ) {
				lastSrUpdate = now;
				const parts: string[] = [];
				if ( config.showDays && time.days > 0 ) {
					parts.push( time.days + ' ' + config.labelDays );
				}
				if ( config.showHours ) {
					parts.push( time.hours + ' ' + config.labelHours );
				}
				if ( config.showMinutes ) {
					parts.push( time.minutes + ' ' + config.labelMinutes );
				}
				if ( config.showSeconds ) {
					parts.push( time.seconds + ' ' + config.labelSeconds );
				}
				srRegion.textContent = parts.join( ', ' );
			}
		}

		function handleExpiry(): void {
			clearInterval( intervalId );

			// Zero out all digits.
			units.forEach( ( unit ) => {
				if ( digitElements[ unit ] ) {
					( digitElements[ unit ] as HTMLElement ).textContent = '00';
				}
			} );

			// Show expiry message if configured.
			if ( config.expiryMessage && expiredContainer ) {
				segmentsContainer.setAttribute( 'hidden', '' );
				expiredContainer.removeAttribute( 'hidden' );
			}

			// Update screen reader region.
			if ( srRegion ) {
				srRegion.textContent = config.expiryMessage || 'Countdown complete';
			}

			// Dispatch custom event.
			wrapper.dispatchEvent(
				new CustomEvent( 'aegis:countdown:expired', {
					bubbles: true,
					detail: { datetime: config.datetime },
				} )
			);
		}

		// Initial update + 1s interval.
		updateDisplay();
		const intervalId = setInterval( updateDisplay, 1000 );
	}

	function initAll(): void {
		const countdowns = document.querySelectorAll<HTMLElement>(
			'.aegis-countdown:not([' + INIT_FLAG + '])'
		);
		countdowns.forEach( initCountdown );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initAll );
	} else {
		initAll();
	}
} )();
