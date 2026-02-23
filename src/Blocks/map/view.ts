/**
 * Map Block - Frontend View Script
 *
 * Implements the facade pattern for Google Maps: renders a static image
 * placeholder, then loads the interactive map on user interaction.
 * OpenStreetMap uses a simple iframe embed (no JS needed).
 *
 * @package Aegis
 * @since   1.0.0
 */

declare namespace google.maps {
	class Map {
		constructor( el: HTMLElement, opts?: MapOptions );
	}
	class Marker {
		constructor( opts?: MarkerOptions );
		addListener( event: string, handler: () => void ): void;
		setMap( map: Map | null ): void;
	}
	class InfoWindow {
		constructor( opts?: { content?: string } );
		open( map: Map, anchor?: Marker ): void;
	}
	interface MapOptions {
		center?: { lat: number; lng: number };
		zoom?: number;
		mapTypeId?: string;
		styles?: MapTypeStyle[];
		zoomControl?: boolean;
		mapTypeControl?: boolean;
		streetViewControl?: boolean;
		fullscreenControl?: boolean;
		scrollwheel?: boolean;
		draggable?: boolean;
		gestureHandling?: string;
	}
	interface MarkerOptions {
		position?: { lat: number; lng: number };
		map?: Map;
		title?: string;
	}
	interface MapTypeStyle {
		elementType?: string;
		featureType?: string;
		stylers: Record<string, unknown>[];
	}
	type MapTypeId = string;
}

interface MapMarker {
	lat: number;
	lng: number;
	title: string;
	description: string;
}

interface MapConfig {
	lat: number;
	lng: number;
	zoom: number;
	mapType: string;
	mapStyle: string;
	provider: string;
	zoomControl: boolean;
	mapTypeControl: boolean;
	streetView: boolean;
	fullscreen: boolean;
	scrollWheel: boolean;
	draggable: boolean;
	markers: MapMarker[];
	apiSrc: string;
}

/**
 * Google Maps style presets (matching edit.tsx).
 */
const MAP_STYLES: Record<string, google.maps.MapTypeStyle[]> = {
	default: [],
	silver: [
		{ elementType: 'geometry', stylers: [ { color: '#f5f5f5' } ] },
		{ elementType: 'labels.icon', stylers: [ { visibility: 'off' } ] },
		{ elementType: 'labels.text.fill', stylers: [ { color: '#616161' } ] },
		{ elementType: 'labels.text.stroke', stylers: [ { color: '#f5f5f5' } ] },
		{ featureType: 'poi', elementType: 'geometry', stylers: [ { color: '#eeeeee' } ] },
		{ featureType: 'road', elementType: 'geometry', stylers: [ { color: '#ffffff' } ] },
		{ featureType: 'road.highway', elementType: 'geometry', stylers: [ { color: '#dadada' } ] },
		{ featureType: 'water', elementType: 'geometry', stylers: [ { color: '#c9c9c9' } ] },
	],
	dark: [
		{ elementType: 'geometry', stylers: [ { color: '#212121' } ] },
		{ elementType: 'labels.icon', stylers: [ { visibility: 'off' } ] },
		{ elementType: 'labels.text.fill', stylers: [ { color: '#757575' } ] },
		{ elementType: 'labels.text.stroke', stylers: [ { color: '#212121' } ] },
		{ featureType: 'poi', elementType: 'geometry', stylers: [ { color: '#181818' } ] },
		{ featureType: 'road', elementType: 'geometry.fill', stylers: [ { color: '#2c2c2c' } ] },
		{ featureType: 'road.highway', elementType: 'geometry', stylers: [ { color: '#3c3c3c' } ] },
		{ featureType: 'water', elementType: 'geometry', stylers: [ { color: '#000000' } ] },
	],
	retro: [
		{ elementType: 'geometry', stylers: [ { color: '#ebe3cd' } ] },
		{ elementType: 'labels.text.fill', stylers: [ { color: '#523735' } ] },
		{ elementType: 'labels.text.stroke', stylers: [ { color: '#f5f1e6' } ] },
		{ featureType: 'road', elementType: 'geometry', stylers: [ { color: '#f5f1e6' } ] },
		{ featureType: 'road.highway', elementType: 'geometry', stylers: [ { color: '#f8c967' } ] },
		{ featureType: 'water', elementType: 'geometry.fill', stylers: [ { color: '#b9d3c2' } ] },
	],
	night: [
		{ elementType: 'geometry', stylers: [ { color: '#242f3e' } ] },
		{ elementType: 'labels.text.fill', stylers: [ { color: '#746855' } ] },
		{ elementType: 'labels.text.stroke', stylers: [ { color: '#242f3e' } ] },
		{ featureType: 'road', elementType: 'geometry', stylers: [ { color: '#38414e' } ] },
		{ featureType: 'road.highway', elementType: 'geometry', stylers: [ { color: '#746855' } ] },
		{ featureType: 'water', elementType: 'geometry', stylers: [ { color: '#17263c' } ] },
	],
	aubergine: [
		{ elementType: 'geometry', stylers: [ { color: '#1d2c4d' } ] },
		{ elementType: 'labels.text.fill', stylers: [ { color: '#8ec3b9' } ] },
		{ elementType: 'labels.text.stroke', stylers: [ { color: '#1a3646' } ] },
		{ featureType: 'poi', elementType: 'geometry', stylers: [ { color: '#283d6a' } ] },
		{ featureType: 'road', elementType: 'geometry', stylers: [ { color: '#304a7d' } ] },
		{ featureType: 'road.highway', elementType: 'geometry', stylers: [ { color: '#2c6675' } ] },
		{ featureType: 'water', elementType: 'geometry', stylers: [ { color: '#0e1626' } ] },
	],
};

( function () {
	'use strict';

	/**
	 * Parse config from data attributes.
	 */
	function parseConfig( wrapper: HTMLElement ): MapConfig {
		let markers: MapMarker[] = [];
		try {
			markers = JSON.parse( wrapper.getAttribute( 'data-markers' ) || '[]' );
		} catch {
			markers = [];
		}

		const template = wrapper.querySelector<HTMLTemplateElement>( '.aegis-map__api-src' );

		return {
			lat: parseFloat( wrapper.getAttribute( 'data-lat' ) || '4.6495' ),
			lng: parseFloat( wrapper.getAttribute( 'data-lng' ) || '-74.0627' ),
			zoom: parseInt( wrapper.getAttribute( 'data-zoom' ) || '15', 10 ),
			mapType: wrapper.getAttribute( 'data-map-type' ) || 'roadmap',
			mapStyle: wrapper.getAttribute( 'data-map-style' ) || 'default',
			provider: wrapper.getAttribute( 'data-provider' ) || 'openstreetmap',
			zoomControl: wrapper.getAttribute( 'data-zoom-control' ) !== 'false',
			mapTypeControl: wrapper.getAttribute( 'data-map-type-control' ) !== 'false',
			streetView: wrapper.getAttribute( 'data-street-view' ) !== 'false',
			fullscreen: wrapper.getAttribute( 'data-fullscreen' ) !== 'false',
			scrollWheel: wrapper.getAttribute( 'data-scroll-wheel' ) === 'true',
			draggable: wrapper.getAttribute( 'data-draggable' ) !== 'false',
			markers,
			apiSrc: template?.getAttribute( 'data-src' ) || '',
		};
	}

	/**
	 * Load a script dynamically.
	 */
	function loadScript( src: string, id: string ): Promise<void> {
		return new Promise( ( resolve, reject ) => {
			if ( document.getElementById( id ) ) {
				resolve();
				return;
			}
			const script = document.createElement( 'script' );
			script.id = id;
			script.src = src;
			script.async = true;
			script.onload = () => resolve();
			script.onerror = () => reject( new Error( `Failed to load: ${ src }` ) );
			document.head.appendChild( script );
		} );
	}

	/**
	 * Initialize Google Maps on the canvas element.
	 */
	function initGoogleMap( canvas: HTMLElement, config: MapConfig ): void {
		const map = new google.maps.Map( canvas, {
			center: { lat: config.lat, lng: config.lng },
			zoom: config.zoom,
			mapTypeId: config.mapType as google.maps.MapTypeId,
			styles: MAP_STYLES[ config.mapStyle ] || [],
			zoomControl: config.zoomControl,
			mapTypeControl: config.mapTypeControl,
			streetViewControl: config.streetView,
			fullscreenControl: config.fullscreen,
			scrollwheel: config.scrollWheel,
			draggable: config.draggable,
			gestureHandling: config.scrollWheel ? 'auto' : 'cooperative',
		} );

		// Add markers.
		config.markers.forEach( ( marker ) => {
			const gMarker = new google.maps.Marker( {
				position: { lat: marker.lat, lng: marker.lng },
				map,
				title: marker.title,
			} );

			if ( marker.title || marker.description ) {
				const infoWindow = new google.maps.InfoWindow( {
					content:
						`<div class="aegis-map-info-window">` +
						( marker.title ? `<strong>${ escapeHtml( marker.title ) }</strong>` : '' ) +
						( marker.description ? `<p>${ escapeHtml( marker.description ) }</p>` : '' ) +
						`</div>`,
				} );
				gMarker.addListener( 'click', () => {
					infoWindow.open( map, gMarker );
				} );
			}
		} );
	}

	/**
	 * Escape HTML entities for safe insertion.
	 */
	function escapeHtml( str: string ): string {
		const div = document.createElement( 'div' );
		div.appendChild( document.createTextNode( str ) );
		return div.innerHTML;
	}

	/**
	 * Activate a map instance: hide facade, show canvas, load interactive map.
	 */
	async function activateMap( wrapper: HTMLElement ): Promise<void> {
		const config = parseConfig( wrapper );
		const facade = wrapper.querySelector<HTMLElement>( '.aegis-map__facade' );
		const canvas = wrapper.querySelector<HTMLElement>( '.aegis-map__canvas' );

		if ( ! canvas ) return;

		// Show canvas, hide facade.
		if ( facade ) {
			facade.hidden = true;
		}
		canvas.hidden = false;

		// Load and initialize Google Maps.
		if ( config.apiSrc ) {
			try {
				await loadScript( config.apiSrc, 'aegis-google-maps-api' );
				initGoogleMap( canvas, config );
			} catch {
				// Google Maps failed to load — canvas remains empty.
			}
		}

		// Mark as activated.
		wrapper.classList.add( 'is-activated' );
	}

	/**
	 * Initialize all map blocks on the page.
	 */
	function initAllMaps(): void {
		const wrappers = document.querySelectorAll<HTMLElement>( '.aegis-map:not(.is-activated)' );

		wrappers.forEach( ( wrapper ) => {
			// Activate on click of the facade button.
			const activateBtn = wrapper.querySelector<HTMLButtonElement>( '.aegis-map__activate' );
			if ( activateBtn ) {
				activateBtn.addEventListener( 'click', () => activateMap( wrapper ) );
			}

			// Also activate on hover (preload).
			let hoverTimeout: ReturnType<typeof setTimeout> | null = null;
			wrapper.addEventListener( 'mouseenter', () => {
				if ( wrapper.classList.contains( 'is-activated' ) ) return;
				hoverTimeout = setTimeout( () => activateMap( wrapper ), 200 );
			} );
			wrapper.addEventListener( 'mouseleave', () => {
				if ( hoverTimeout ) {
					clearTimeout( hoverTimeout );
					hoverTimeout = null;
				}
			} );
		} );
	}

	// Initialize when DOM is ready.
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initAllMaps );
	} else {
		initAllMaps();
	}
} )();
