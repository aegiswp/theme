/**
 * Map Block - Editor Component
 *
 * Renders a live interactive Google Maps preview or an OpenStreetMap
 * iframe embed inside the block editor with full InspectorControls sidebar.
 *
 * @package Aegis
 * @since   1.0.0
 */

import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InspectorControls,
} from '@wordpress/block-editor';
import {
	PanelBody,
	TextControl,
	SelectControl,
	ToggleControl,
	RangeControl,
	Button,
	Notice,
	__experimentalUnitControl as UnitControl,
} from '@wordpress/components';
import { useEffect, useRef, useCallback, useState, useMemo } from '@wordpress/element';

declare global {
	interface Window {
		aegisMapEditor?: {
			apiKey: string;
			restUrl: string;
			restNonce: string;
			isPro: boolean;
			hasApiKey: boolean;
		};
		google?: typeof google;
	}
}

interface Marker {
	lat: number;
	lng: number;
	title: string;
	description: string;
}

interface MapAttributes {
	address: string;
	lat: number;
	lng: number;
	zoom: number;
	height: string;
	mapType: string;
	mapStyle: string;
	markers: Marker[];
	showZoomControl: boolean;
	showMapType: boolean;
	showStreetView: boolean;
	showFullscreen: boolean;
	scrollWheel: boolean;
	draggable: boolean;
	provider: string;
}

interface EditProps {
	attributes: MapAttributes;
	setAttributes: ( attrs: Partial<MapAttributes> ) => void;
	clientId: string;
}

/**
 * Google Maps style presets.
 */
const MAP_STYLES: Record<string, google.maps.MapTypeStyle[]> = {
	default: [],
	silver: [
		{ elementType: 'geometry', stylers: [ { color: '#f5f5f5' } ] },
		{ elementType: 'labels.icon', stylers: [ { visibility: 'off' } ] },
		{ elementType: 'labels.text.fill', stylers: [ { color: '#616161' } ] },
		{ elementType: 'labels.text.stroke', stylers: [ { color: '#f5f5f5' } ] },
		{ featureType: 'administrative.land_parcel', elementType: 'labels.text.fill', stylers: [ { color: '#bdbdbd' } ] },
		{ featureType: 'poi', elementType: 'geometry', stylers: [ { color: '#eeeeee' } ] },
		{ featureType: 'poi', elementType: 'labels.text.fill', stylers: [ { color: '#757575' } ] },
		{ featureType: 'road', elementType: 'geometry', stylers: [ { color: '#ffffff' } ] },
		{ featureType: 'road.arterial', elementType: 'labels.text.fill', stylers: [ { color: '#757575' } ] },
		{ featureType: 'road.highway', elementType: 'geometry', stylers: [ { color: '#dadada' } ] },
		{ featureType: 'water', elementType: 'geometry', stylers: [ { color: '#c9c9c9' } ] },
		{ featureType: 'water', elementType: 'labels.text.fill', stylers: [ { color: '#9e9e9e' } ] },
	],
	dark: [
		{ elementType: 'geometry', stylers: [ { color: '#212121' } ] },
		{ elementType: 'labels.icon', stylers: [ { visibility: 'off' } ] },
		{ elementType: 'labels.text.fill', stylers: [ { color: '#757575' } ] },
		{ elementType: 'labels.text.stroke', stylers: [ { color: '#212121' } ] },
		{ featureType: 'administrative', elementType: 'geometry', stylers: [ { color: '#757575' } ] },
		{ featureType: 'poi', elementType: 'geometry', stylers: [ { color: '#181818' } ] },
		{ featureType: 'road', elementType: 'geometry.fill', stylers: [ { color: '#2c2c2c' } ] },
		{ featureType: 'road', elementType: 'geometry.stroke', stylers: [ { color: '#212121' } ] },
		{ featureType: 'road.highway', elementType: 'geometry', stylers: [ { color: '#3c3c3c' } ] },
		{ featureType: 'water', elementType: 'geometry', stylers: [ { color: '#000000' } ] },
		{ featureType: 'water', elementType: 'labels.text.fill', stylers: [ { color: '#3d3d3d' } ] },
	],
	retro: [
		{ elementType: 'geometry', stylers: [ { color: '#ebe3cd' } ] },
		{ elementType: 'labels.text.fill', stylers: [ { color: '#523735' } ] },
		{ elementType: 'labels.text.stroke', stylers: [ { color: '#f5f1e6' } ] },
		{ featureType: 'administrative', elementType: 'geometry.stroke', stylers: [ { color: '#c9b2a6' } ] },
		{ featureType: 'poi', elementType: 'geometry', stylers: [ { color: '#dfd2ae' } ] },
		{ featureType: 'road', elementType: 'geometry', stylers: [ { color: '#f5f1e6' } ] },
		{ featureType: 'road.highway', elementType: 'geometry', stylers: [ { color: '#f8c967' } ] },
		{ featureType: 'road.highway', elementType: 'geometry.stroke', stylers: [ { color: '#e9bc62' } ] },
		{ featureType: 'water', elementType: 'geometry.fill', stylers: [ { color: '#b9d3c2' } ] },
	],
	night: [
		{ elementType: 'geometry', stylers: [ { color: '#242f3e' } ] },
		{ elementType: 'labels.text.fill', stylers: [ { color: '#746855' } ] },
		{ elementType: 'labels.text.stroke', stylers: [ { color: '#242f3e' } ] },
		{ featureType: 'administrative.locality', elementType: 'labels.text.fill', stylers: [ { color: '#d59563' } ] },
		{ featureType: 'poi', elementType: 'labels.text.fill', stylers: [ { color: '#d59563' } ] },
		{ featureType: 'road', elementType: 'geometry', stylers: [ { color: '#38414e' } ] },
		{ featureType: 'road', elementType: 'geometry.stroke', stylers: [ { color: '#212a37' } ] },
		{ featureType: 'road.highway', elementType: 'geometry', stylers: [ { color: '#746855' } ] },
		{ featureType: 'transit', elementType: 'geometry', stylers: [ { color: '#2f3948' } ] },
		{ featureType: 'water', elementType: 'geometry', stylers: [ { color: '#17263c' } ] },
		{ featureType: 'water', elementType: 'labels.text.fill', stylers: [ { color: '#515c6d' } ] },
	],
	aubergine: [
		{ elementType: 'geometry', stylers: [ { color: '#1d2c4d' } ] },
		{ elementType: 'labels.text.fill', stylers: [ { color: '#8ec3b9' } ] },
		{ elementType: 'labels.text.stroke', stylers: [ { color: '#1a3646' } ] },
		{ featureType: 'administrative.country', elementType: 'geometry.stroke', stylers: [ { color: '#4b6878' } ] },
		{ featureType: 'land_parcel', elementType: 'labels.text.fill', stylers: [ { color: '#64779e' } ] },
		{ featureType: 'poi', elementType: 'geometry', stylers: [ { color: '#283d6a' } ] },
		{ featureType: 'road', elementType: 'geometry', stylers: [ { color: '#304a7d' } ] },
		{ featureType: 'road', elementType: 'geometry.stroke', stylers: [ { color: '#255763' } ] },
		{ featureType: 'road.highway', elementType: 'geometry', stylers: [ { color: '#2c6675' } ] },
		{ featureType: 'transit', elementType: 'geometry', stylers: [ { color: '#182d57' } ] },
		{ featureType: 'water', elementType: 'geometry', stylers: [ { color: '#0e1626' } ] },
		{ featureType: 'water', elementType: 'labels.text.fill', stylers: [ { color: '#4e6d70' } ] },
	],
};

/**
 * Load an external script by URL. Returns a promise that resolves when loaded.
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
		script.onerror = () => reject( new Error( `Failed to load script: ${ src }` ) );
		document.head.appendChild( script );
	} );
}


export default function Edit( { attributes, setAttributes }: EditProps ) {
	const blockProps = useBlockProps( {
		className: 'aegis-map-editor',
	} );

	const mapRef = useRef<HTMLDivElement>( null );
	const googleMapRef = useRef<google.maps.Map | null>( null );
	const googleMarkersRef = useRef<google.maps.Marker[]>( [] );
	const isUpdatingFromMap = useRef( false );
	const [ isLoading, setIsLoading ] = useState( true );
	const [ searchValue, setSearchValue ] = useState( '' );
	const [ isGeocoding, setIsGeocoding ] = useState( false );

	const editorConfig = window.aegisMapEditor;
	const apiKey = editorConfig?.apiKey || '';
	const hasApiKey = editorConfig?.hasApiKey || false;
	const useGoogle = attributes.provider === 'google' && hasApiKey;

	/**
	 * Initialize Google Maps.
	 */
	const initGoogleMap = useCallback( async () => {
		if ( ! mapRef.current || ! apiKey ) return;

		try {
			await loadScript(
				`https://maps.googleapis.com/maps/api/js?key=${ apiKey }&libraries=places`,
				'aegis-google-maps-api'
			);

			if ( ! window.google ) return;

			const map = new window.google.maps.Map( mapRef.current, {
				center: { lat: attributes.lat, lng: attributes.lng },
				zoom: attributes.zoom,
				mapTypeId: attributes.mapType as google.maps.MapTypeId,
				styles: MAP_STYLES[ attributes.mapStyle ] || [],
				zoomControl: attributes.showZoomControl,
				mapTypeControl: attributes.showMapType,
				streetViewControl: attributes.showStreetView,
				fullscreenControl: attributes.showFullscreen,
				scrollwheel: attributes.scrollWheel,
				draggable: attributes.draggable,
				gestureHandling: attributes.scrollWheel ? 'auto' : 'cooperative',
			} );

			googleMapRef.current = map;

			// Sync map → attributes on drag/zoom.
			map.addListener( 'center_changed', () => {
				if ( isUpdatingFromMap.current ) return;
				isUpdatingFromMap.current = true;
				const center = map.getCenter();
				if ( center ) {
					setAttributes( {
						lat: Math.round( center.lat() * 1e6 ) / 1e6,
						lng: Math.round( center.lng() * 1e6 ) / 1e6,
					} );
				}
				requestAnimationFrame( () => {
					isUpdatingFromMap.current = false;
				} );
			} );

			map.addListener( 'zoom_changed', () => {
				if ( isUpdatingFromMap.current ) return;
				isUpdatingFromMap.current = true;
				setAttributes( { zoom: map.getZoom() || attributes.zoom } );
				requestAnimationFrame( () => {
					isUpdatingFromMap.current = false;
				} );
			} );

			// Render markers.
			syncGoogleMarkers( map, attributes.markers );

			setIsLoading( false );
		} catch {
			setIsLoading( false );
		}
	}, [ apiKey ] ); // eslint-disable-line react-hooks/exhaustive-deps

	/**
	 * Sync Google Maps markers.
	 */
	function syncGoogleMarkers( map: google.maps.Map, markers: Marker[] ): void {
		// Clear existing.
		googleMarkersRef.current.forEach( ( m ) => m.setMap( null ) );
		googleMarkersRef.current = [];

		markers.forEach( ( marker ) => {
			const gMarker = new window.google!.maps.Marker( {
				position: { lat: marker.lat, lng: marker.lng },
				map,
				title: marker.title,
			} );

			if ( marker.title || marker.description ) {
				const infoWindow = new window.google!.maps.InfoWindow( {
					content: `<div class="aegis-map-info-window">` +
						( marker.title ? `<strong>${ marker.title }</strong>` : '' ) +
						( marker.description ? `<p>${ marker.description }</p>` : '' ) +
						`</div>`,
				} );
				gMarker.addListener( 'click', () => {
					infoWindow.open( map, gMarker );
				} );
			}

			googleMarkersRef.current.push( gMarker );
		} );
	}

	/**
	 * Geocode an address via the REST proxy.
	 */
	async function geocodeAddress( address: string ): Promise<void> {
		if ( ! address || ! editorConfig ) return;

		setIsGeocoding( true );

		try {
			const response = await window.fetch(
				`${ editorConfig.restUrl }?address=${ encodeURIComponent( address ) }`,
				{
					headers: {
						'X-WP-Nonce': editorConfig.restNonce,
					},
				}
			);

			const data = await response.json();

			if ( response.ok && data.lat && data.lng ) {
				setAttributes( {
					lat: data.lat,
					lng: data.lng,
					address: data.formatted_address || address,
				} );
			}
		} catch {
			// Geocoding failed silently.
		}

		setIsGeocoding( false );
	}

	// Initialize Google Map on mount (only when using Google provider).
	useEffect( () => {
		if ( useGoogle ) {
			initGoogleMap();
		}

		return () => {
			googleMapRef.current = null;
		};
	}, [ useGoogle, initGoogleMap ] );

	// Sync attributes → Google Map.
	useEffect( () => {
		if ( ! googleMapRef.current || isUpdatingFromMap.current ) return;
		const map = googleMapRef.current;

		map.setCenter( { lat: attributes.lat, lng: attributes.lng } );
		map.setZoom( attributes.zoom );
	}, [ attributes.lat, attributes.lng, attributes.zoom ] );

	// Sync Google Map options.
	useEffect( () => {
		if ( ! googleMapRef.current ) return;
		const map = googleMapRef.current;

		map.setMapTypeId( attributes.mapType as google.maps.MapTypeId );
		map.setOptions( {
			styles: MAP_STYLES[ attributes.mapStyle ] || [],
			zoomControl: attributes.showZoomControl,
			mapTypeControl: attributes.showMapType,
			streetViewControl: attributes.showStreetView,
			fullscreenControl: attributes.showFullscreen,
			scrollwheel: attributes.scrollWheel,
			draggable: attributes.draggable,
			gestureHandling: attributes.scrollWheel ? 'auto' : 'cooperative',
		} );
	}, [
		attributes.mapType,
		attributes.mapStyle,
		attributes.showZoomControl,
		attributes.showMapType,
		attributes.showStreetView,
		attributes.showFullscreen,
		attributes.scrollWheel,
		attributes.draggable,
	] );

	// Sync Google markers.
	useEffect( () => {
		if ( googleMapRef.current ) {
			syncGoogleMarkers( googleMapRef.current, attributes.markers );
		}
	}, [ attributes.markers ] ); // eslint-disable-line react-hooks/exhaustive-deps

	/**
	 * Build the OpenStreetMap embed URL.
	 */
	const osmEmbedUrl = useMemo( () => {
		const delta = 0.01 / ( attributes.zoom / 10 );
		const bbox = [
			attributes.lng - delta,
			attributes.lat - delta,
			attributes.lng + delta,
			attributes.lat + delta,
		].join( '%2C' );

		return `https://www.openstreetmap.org/export/embed.html?bbox=${ bbox }&layer=mapnik&marker=${ attributes.lat }%2C${ attributes.lng }`;
	}, [ attributes.lat, attributes.lng, attributes.zoom ] );

	/**
	 * Add a new marker at the current map center.
	 */
	function addMarker(): void {
		const newMarker: Marker = {
			lat: attributes.lat,
			lng: attributes.lng,
			title: '',
			description: '',
		};
		setAttributes( { markers: [ ...attributes.markers, newMarker ] } );
	}

	/**
	 * Update a marker at a given index.
	 */
	function updateMarker( index: number, updates: Partial<Marker> ): void {
		const updated = attributes.markers.map( ( m, i ) =>
			i === index ? { ...m, ...updates } : m
		);
		setAttributes( { markers: updated } );
	}

	/**
	 * Remove a marker at a given index.
	 */
	function removeMarker( index: number ): void {
		setAttributes( {
			markers: attributes.markers.filter( ( _, i ) => i !== index ),
		} );
	}

	return (
		<div { ...blockProps }>
			<InspectorControls>
				{ /* Map Settings */ }
				<PanelBody title={ __( 'Map Settings', 'aegis' ) }>
					<SelectControl
						label={ __( 'Map Provider', 'aegis' ) }
						value={ attributes.provider }
						options={ [
							{ label: __( 'Google Maps', 'aegis' ), value: 'google' },
							{ label: __( 'OpenStreetMap', 'aegis' ), value: 'openstreetmap' },
						] }
						onChange={ ( value ) => setAttributes( { provider: value } ) }
						help={
							attributes.provider === 'google' && ! hasApiKey
								? __( 'Configure your API key in Aegis → Integrations → Maps.', 'aegis' )
								: undefined
						}
					/>
					<TextControl
						label={ __( 'Address', 'aegis' ) }
						value={ searchValue || attributes.address }
						onChange={ ( value ) => setSearchValue( value ) }
						help={ __( 'Enter an address and click Search to geocode.', 'aegis' ) }
					/>
					<Button
						variant="secondary"
						onClick={ () => {
							geocodeAddress( searchValue || attributes.address );
						} }
						isBusy={ isGeocoding }
						disabled={ isGeocoding || ( ! searchValue && ! attributes.address ) }
						style={ { marginBottom: '16px' } }
					>
						{ isGeocoding
							? __( 'Searching…', 'aegis' )
							: __( 'Search Address', 'aegis' ) }
					</Button>
					<TextControl
						label={ __( 'Latitude', 'aegis' ) }
						value={ String( attributes.lat ) }
						onChange={ ( value ) => {
							const num = parseFloat( value );
							if ( ! isNaN( num ) ) setAttributes( { lat: num } );
						} }
					/>
					<TextControl
						label={ __( 'Longitude', 'aegis' ) }
						value={ String( attributes.lng ) }
						onChange={ ( value ) => {
							const num = parseFloat( value );
							if ( ! isNaN( num ) ) setAttributes( { lng: num } );
						} }
					/>
					<RangeControl
						label={ __( 'Zoom', 'aegis' ) }
						value={ attributes.zoom }
						onChange={ ( value ) => setAttributes( { zoom: value } ) }
						min={ 1 }
						max={ 21 }
					/>
					<UnitControl
						label={ __( 'Height', 'aegis' ) }
						value={ attributes.height }
						onChange={ ( value ) => setAttributes( { height: value || '400px' } ) }
					/>
				</PanelBody>

				{ /* Markers */ }
				<PanelBody title={ __( 'Markers', 'aegis' ) } initialOpen={ false }>
					{ attributes.markers.map( ( marker, index ) => (
						<div
							key={ index }
							style={ {
								padding: '12px',
								marginBottom: '12px',
								border: '1px solid #ddd',
								borderRadius: '4px',
								background: '#fafafa',
							} }
						>
							<TextControl
								label={ __( 'Title', 'aegis' ) }
								value={ marker.title }
								onChange={ ( value ) => updateMarker( index, { title: value } ) }
							/>
							<TextControl
								label={ __( 'Description', 'aegis' ) }
								value={ marker.description }
								onChange={ ( value ) => updateMarker( index, { description: value } ) }
							/>
							<TextControl
								label={ __( 'Latitude', 'aegis' ) }
								value={ String( marker.lat ) }
								onChange={ ( value ) => {
									const num = parseFloat( value );
									if ( ! isNaN( num ) ) updateMarker( index, { lat: num } );
								} }
							/>
							<TextControl
								label={ __( 'Longitude', 'aegis' ) }
								value={ String( marker.lng ) }
								onChange={ ( value ) => {
									const num = parseFloat( value );
									if ( ! isNaN( num ) ) updateMarker( index, { lng: num } );
								} }
							/>
							<Button
								variant="tertiary"
								isDestructive
								onClick={ () => removeMarker( index ) }
								style={ { marginTop: '4px' } }
							>
								{ __( 'Remove Marker', 'aegis' ) }
							</Button>
						</div>
					) ) }
					<Button
						variant="secondary"
						onClick={ addMarker }
						style={ { width: '100%', justifyContent: 'center' } }
					>
						{ __( 'Add Marker at Center', 'aegis' ) }
					</Button>
				</PanelBody>

				{ /* Map Style */ }
				<PanelBody title={ __( 'Map Style', 'aegis' ) } initialOpen={ false }>
					{ useGoogle && (
						<>
							<SelectControl
								label={ __( 'Map Type', 'aegis' ) }
								value={ attributes.mapType }
								options={ [
									{ label: __( 'Roadmap', 'aegis' ), value: 'roadmap' },
									{ label: __( 'Satellite', 'aegis' ), value: 'satellite' },
									{ label: __( 'Hybrid', 'aegis' ), value: 'hybrid' },
									{ label: __( 'Terrain', 'aegis' ), value: 'terrain' },
								] }
								onChange={ ( value ) => setAttributes( { mapType: value } ) }
							/>
							<SelectControl
								label={ __( 'Style Preset', 'aegis' ) }
								value={ attributes.mapStyle }
								options={ [
									{ label: __( 'Default', 'aegis' ), value: 'default' },
									{ label: __( 'Silver', 'aegis' ), value: 'silver' },
									{ label: __( 'Dark', 'aegis' ), value: 'dark' },
									{ label: __( 'Retro', 'aegis' ), value: 'retro' },
									{ label: __( 'Night', 'aegis' ), value: 'night' },
									{ label: __( 'Aubergine', 'aegis' ), value: 'aubergine' },
								] }
								onChange={ ( value ) => setAttributes( { mapStyle: value } ) }
							/>
						</>
					) }
					{ ! useGoogle && (
						<p style={ { color: '#757575', fontStyle: 'italic' } }>
							{ __( 'Style presets are available with Google Maps provider.', 'aegis' ) }
						</p>
					) }
				</PanelBody>

				{ /* Controls */ }
				<PanelBody title={ __( 'Controls', 'aegis' ) } initialOpen={ false }>
					<ToggleControl
						label={ __( 'Zoom Control', 'aegis' ) }
						checked={ attributes.showZoomControl }
						onChange={ ( value ) => setAttributes( { showZoomControl: value } ) }
					/>
					{ useGoogle && (
						<>
							<ToggleControl
								label={ __( 'Map Type Control', 'aegis' ) }
								checked={ attributes.showMapType }
								onChange={ ( value ) => setAttributes( { showMapType: value } ) }
							/>
							<ToggleControl
								label={ __( 'Street View Control', 'aegis' ) }
								checked={ attributes.showStreetView }
								onChange={ ( value ) => setAttributes( { showStreetView: value } ) }
							/>
							<ToggleControl
								label={ __( 'Fullscreen Control', 'aegis' ) }
								checked={ attributes.showFullscreen }
								onChange={ ( value ) => setAttributes( { showFullscreen: value } ) }
							/>
						</>
					) }
					<ToggleControl
						label={ __( 'Scroll Wheel Zoom', 'aegis' ) }
						checked={ attributes.scrollWheel }
						onChange={ ( value ) => setAttributes( { scrollWheel: value } ) }
						help={ __( 'Allow zooming with the mouse scroll wheel.', 'aegis' ) }
					/>
					<ToggleControl
						label={ __( 'Draggable', 'aegis' ) }
						checked={ attributes.draggable }
						onChange={ ( value ) => setAttributes( { draggable: value } ) }
					/>
				</PanelBody>
			</InspectorControls>

			{ /* No API key notice */ }
			{ attributes.provider === 'google' && ! hasApiKey && (
				<Notice status="warning" isDismissible={ false }>
					{ __( 'Google Maps API key not configured. Using OpenStreetMap fallback. Configure your key in Aegis → Integrations → Maps.', 'aegis' ) }
			</Notice>
			) }

			{ /* Google Maps: interactive canvas */ }
			{ useGoogle && (
				<div style={ { position: 'relative', width: '100%', height: attributes.height } }>
					{ isLoading && (
						<div
							className="aegis-map-editor__loading"
							style={ {
								position: 'absolute',
								inset: 0,
								zIndex: 1,
								display: 'flex',
								alignItems: 'center',
								justifyContent: 'center',
								background: '#f0f0f0',
								borderRadius: '4px',
								color: '#757575',
							} }
						>
							{ __( 'Loading map…', 'aegis' ) }
						</div>
					) }
					<div
						ref={ mapRef }
						className="aegis-map-editor__canvas"
						style={ {
							width: '100%',
							height: '100%',
							borderRadius: '4px',
							overflow: 'hidden',
						} }
					/>
				</div>
			) }

			{ /* OpenStreetMap: iframe embed */ }
			{ ! useGoogle && (
				<iframe
					title={ __( 'OpenStreetMap', 'aegis' ) }
					src={ osmEmbedUrl }
					style={ {
						width: '100%',
						height: attributes.height,
						border: 'none',
						borderRadius: '4px',
					} }
					loading="lazy"
				/>
			) }
		</div>
	);
}
