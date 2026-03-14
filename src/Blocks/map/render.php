<?php
/**
 * Map Block - Server-side Render
 *
 * Renders the map block on the frontend. Google Maps uses a facade pattern
 * (static image → interactive map on click). OpenStreetMap uses a simple iframe embed.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Get Google Maps API key.
$google_maps = get_option( 'aegis_google_maps', [ 'api_key' => '' ] );
$api_key     = $google_maps['api_key'] ?? '';
$has_key     = ! empty( $api_key );

// Extract attributes with defaults.
$address           = $attributes['address'] ?? '';
$lat               = (float) ( $attributes['lat'] ?? 4.6495 );
$lng               = (float) ( $attributes['lng'] ?? -74.0627 );
$zoom              = (int) ( $attributes['zoom'] ?? 15 );
$height            = $attributes['height'] ?? '400px';
$map_type          = $attributes['mapType'] ?? 'roadmap';
$map_style         = $attributes['mapStyle'] ?? 'default';
$markers           = $attributes['markers'] ?? [];
$show_zoom_control = $attributes['showZoomControl'] ?? true;
$show_map_type     = $attributes['showMapType'] ?? false;
$show_street_view  = $attributes['showStreetView'] ?? false;
$show_fullscreen   = $attributes['showFullscreen'] ?? false;
$scroll_wheel      = $attributes['scrollWheel'] ?? false;
$draggable         = $attributes['draggable'] ?? true;
$provider          = $attributes['provider'] ?? 'google';

// Determine effective provider.
$use_google = ( 'google' === $provider && $has_key );

// Build shared wrapper attributes using get_block_wrapper_attributes()
// to handle className / anchor / align automatically.
$shared_attrs = [
	'class' => 'aegis-map',
	'style' => '--aegis-map-height: ' . esc_attr( $height ) . ';',
];

if ( $use_google ) :

	// --- Google Maps: facade pattern with interactive map on click ---

	// Encode markers for data attribute.
	$markers_json = wp_json_encode( array_map( function ( $marker ) {
		return [
			'lat'         => (float) ( $marker['lat'] ?? 0 ),
			'lng'         => (float) ( $marker['lng'] ?? 0 ),
			'title'       => sanitize_text_field( $marker['title'] ?? '' ),
			'description' => sanitize_text_field( $marker['description'] ?? '' ),
		];
	}, $markers ) );

	// Build wrapper attributes with data attrs for view.ts.
	$google_attrs = array_merge( $shared_attrs, [
		'data-lat'              => esc_attr( (string) $lat ),
		'data-lng'              => esc_attr( (string) $lng ),
		'data-zoom'             => esc_attr( (string) $zoom ),
		'data-map-type'         => esc_attr( $map_type ),
		'data-map-style'        => esc_attr( $map_style ),
		'data-provider'         => 'google',
		'data-zoom-control'     => $show_zoom_control ? 'true' : 'false',
		'data-map-type-control' => $show_map_type ? 'true' : 'false',
		'data-street-view'      => $show_street_view ? 'true' : 'false',
		'data-fullscreen'       => $show_fullscreen ? 'true' : 'false',
		'data-scroll-wheel'     => $scroll_wheel ? 'true' : 'false',
		'data-draggable'        => $draggable ? 'true' : 'false',
		'data-markers'          => esc_attr( $markers_json ?: '[]' ),
	] );
	$wrapper_attributes = get_block_wrapper_attributes( $google_attrs );

	// Build static map image URL for facade.
	$static_params = [
		'center'  => $lat . ',' . $lng,
		'zoom'    => $zoom,
		'size'    => '640x' . intval( $height ),
		'maptype' => $map_type,
		'key'     => $api_key,
	];

	if ( ! empty( $markers ) ) {
		$marker_params = [];
		foreach ( $markers as $marker ) {
			$marker_params[] = ( $marker['lat'] ?? 0 ) . ',' . ( $marker['lng'] ?? 0 );
		}
		$static_params['markers'] = implode( '|', $marker_params );
	}

	$static_url = add_query_arg( $static_params, 'https://maps.googleapis.com/maps/api/staticmap' );

?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by get_block_wrapper_attributes(). ?>>

	<?php // Facade: static image placeholder that loads interactive map on click. ?>
	<div class="aegis-map__facade" role="img" aria-label="<?php echo esc_attr( $address ?: __( 'Interactive map', 'aegis' ) ); ?>">
		<img
			class="aegis-map__static"
			src="<?php echo esc_url( $static_url ); ?>"
			alt="<?php echo esc_attr( $address ?: __( 'Map preview', 'aegis' ) ); ?>"
			loading="lazy"
			width="640"
			height="<?php echo esc_attr( (string) intval( $height ) ); ?>"
		/>
		<button
			type="button"
			class="aegis-map__activate"
			aria-label="<?php esc_attr_e( 'Load interactive map', 'aegis' ); ?>"
		>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" aria-hidden="true" focusable="false">
				<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z" fill="currentColor"/>
			</svg>
			<span><?php esc_html_e( 'Click to load map', 'aegis' ); ?></span>
		</button>
	</div>

	<?php // Interactive map container (hidden until activated). ?>
	<div class="aegis-map__canvas" hidden></div>

	<template class="aegis-map__api-src" data-src="<?php echo esc_url( 'https://maps.googleapis.com/maps/api/js?key=' . $api_key . '&libraries=places' ); ?>"></template>

</div>

<?php else :

	// --- OpenStreetMap: simple iframe embed (no JS, no API key) ---

	$delta    = 0.01 / ( $zoom / 10 );
	$bbox     = implode( '%2C', [
		$lng - $delta,
		$lat - $delta,
		$lng + $delta,
		$lat + $delta,
	] );
	$osm_url  = sprintf(
		'https://www.openstreetmap.org/export/embed.html?bbox=%s&layer=mapnik&marker=%s%%2C%s',
		$bbox,
		$lat,
		$lng
	);

	$wrapper_attributes = get_block_wrapper_attributes( $shared_attrs );
?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by get_block_wrapper_attributes(). ?>>
	<iframe
		class="aegis-map__embed"
		title="<?php echo esc_attr( $address ?: __( 'OpenStreetMap', 'aegis' ) ); ?>"
		src="<?php echo esc_url( $osm_url ); ?>"
		style="width: 100%; height: <?php echo esc_attr( $height ); ?>; border: none; border-radius: var(--aegis-map-radius, 4px);"
		loading="lazy"
		referrerpolicy="no-referrer"
	></iframe>
</div>

<?php endif; ?>
