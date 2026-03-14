/**
 * Map Block - Frontend View Script
 *
 * Handles Google Maps facade pattern: loads interactive map on click.
 * OpenStreetMap uses iframe embed (no JS needed).
 *
 * @package Aegis
 * @since   1.0.0
 */

declare const google: any;

( function () {
	'use strict';

	const INIT_FLAG = 'data-aegis-map-init';

	interface MapConfig {
		lat: number;
		lng: number;
		zoom: number;
		mapType: string;
		mapStyle: string;
		provider: string;
		markers: Array<{ lat: number; lng: number; title: string; description: string }>;
		zoomControl: boolean;
		mapTypeControl: boolean;
		streetView: boolean;
		fullscreen: boolean;
		scrollWheel: boolean;
		draggable: boolean;
	}

	function parseConfig( el: HTMLElement ): MapConfig {
		const markersData = el.getAttribute( 'data-markers' );
		let markers: Array<{ lat: number; lng: number; title: string; description: string }> = [];

		if ( markersData ) {
			try {
				markers = JSON.parse( markersData );
			} catch ( e ) {
				console.error( 'Failed to parse map markers:', e );
			}
		}

		return {
			lat: parseFloat( el.getAttribute( 'data-lat' ) || '0' ),
			lng: parseFloat( el.getAttribute( 'data-lng' ) || '0' ),
			zoom: parseInt( el.getAttribute( 'data-zoom' ) || '15', 10 ),
			mapType: el.getAttribute( 'data-map-type' ) || 'roadmap',
			mapStyle: el.getAttribute( 'data-map-style' ) || 'default',
			provider: el.getAttribute( 'data-provider' ) || 'google',
			markers,
			zoomControl: el.getAttribute( 'data-zoom-control' ) !== 'false',
			mapTypeControl: el.getAttribute( 'data-map-type-control' ) === 'true',
			streetView: el.getAttribute( 'data-street-view' ) === 'true',
			fullscreen: el.getAttribute( 'data-fullscreen' ) === 'true',
			scrollWheel: el.getAttribute( 'data-scroll-wheel' ) === 'true',
			draggable: el.getAttribute( 'data-draggable' ) !== 'false',
		};
	}

	function initMap( wrapper: HTMLElement ): void {
		if ( wrapper.hasAttribute( INIT_FLAG ) ) {
			return;
		}
		wrapper.setAttribute( INIT_FLAG, '' );

		const config = parseConfig( wrapper );

		// Only Google Maps needs JS initialization (facade pattern).
		if ( config.provider !== 'google' ) {
			return;
		}

		const facade = wrapper.querySelector<HTMLElement>( '.aegis-map__facade' );
		const canvas = wrapper.querySelector<HTMLElement>( '.aegis-map__canvas' );
		const activateBtn = wrapper.querySelector<HTMLButtonElement>( '.aegis-map__activate' );
		const apiTemplate = wrapper.querySelector<HTMLTemplateElement>( '.aegis-map__api-src' );

		if ( ! facade || ! canvas || ! activateBtn || ! apiTemplate ) {
			return;
		}

		const apiSrc = apiTemplate.getAttribute( 'data-src' );
		if ( ! apiSrc ) {
			return;
		}

		activateBtn.addEventListener( 'click', () => {
			loadGoogleMapsAPI( apiSrc, () => {
				renderGoogleMap( canvas, config );
				facade.setAttribute( 'hidden', '' );
				canvas.removeAttribute( 'hidden' );
			} );
		} );
	}

	function loadGoogleMapsAPI( src: string, callback: () => void ): void {
		if ( typeof google !== 'undefined' && google.maps ) {
			callback();
			return;
		}

		if ( document.querySelector( `script[src="${ src }"]` ) ) {
			const checkInterval = setInterval( () => {
				if ( typeof google !== 'undefined' && google.maps ) {
					clearInterval( checkInterval );
					callback();
				}
			}, 100 );
			return;
		}

		const script = document.createElement( 'script' );
		script.src = src;
		script.async = true;
		script.defer = true;
		script.onload = callback;
		document.head.appendChild( script );
	}

	function renderGoogleMap( canvas: HTMLElement, config: MapConfig ): void {
		const mapOptions: any = {
			center: { lat: config.lat, lng: config.lng },
			zoom: config.zoom,
			mapTypeId: config.mapType,
			zoomControl: config.zoomControl,
			mapTypeControl: config.mapTypeControl,
			streetViewControl: config.streetView,
			fullscreenControl: config.fullscreen,
			scrollwheel: config.scrollWheel,
			draggable: config.draggable,
		};

		const map = new google.maps.Map( canvas, mapOptions );

		// Add markers.
		config.markers.forEach( ( marker ) => {
			const mapMarker = new google.maps.Marker( {
				position: { lat: marker.lat, lng: marker.lng },
				map,
				title: marker.title,
			} );

			if ( marker.description ) {
				const infoWindow = new google.maps.InfoWindow( {
					content: `<div><strong>${ marker.title }</strong><p>${ marker.description }</p></div>`,
				} );

				mapMarker.addListener( 'click', () => {
					infoWindow.open( map, mapMarker );
				} );
			}
		} );
	}

	function initAll(): void {
		const maps = document.querySelectorAll<HTMLElement>(
			'.aegis-map:not([' + INIT_FLAG + '])'
		);
		maps.forEach( initMap );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initAll );
	} else {
		initAll();
	}
} )();
