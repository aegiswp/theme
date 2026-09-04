<?php
/**
 * Countdown Block - Server-side Render
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

defined( 'ABSPATH' ) || exit;

$feature_on = static function ( string $key ): bool {
	if ( class_exists( '\Aegis\Framework\ServiceProvider' ) ) {
		return \Aegis\Framework\ServiceProvider::is_block_enabled( $key );
	}

	return true;
};

$datetime       = $attributes['datetime'] ?? '';
$show_days      = $attributes['showDays'] ?? true;
$show_hours     = $attributes['showHours'] ?? true;
$show_minutes   = $attributes['showMinutes'] ?? true;
$show_seconds   = $attributes['showSeconds'] ?? true;
$labels         = $attributes['labels'] ?? array(
	'days'    => 'Days',
	'hours'   => 'Hours',
	'minutes' => 'Minutes',
	'seconds' => 'Seconds',
);
$separator      = $attributes['separator'] ?? 'colon';
$layout         = $attributes['layout'] ?? 'inline';
$expiry_message = $attributes['expiryMessage'] ?? '';
$timezone       = $attributes['timezone'] ?? 'utc';

if ( ! $feature_on( 'countdown_segments' ) ) {
	$show_days    = true;
	$show_hours   = true;
	$show_minutes = true;
	$show_seconds = true;
}

if ( ! $feature_on( 'countdown_labels' ) ) {
	$labels = array(
		'days'    => 'Days',
		'hours'   => 'Hours',
		'minutes' => 'Minutes',
		'seconds' => 'Seconds',
	);
}

if ( ! $feature_on( 'countdown_separator' ) ) {
	$separator = 'colon';
}

if ( ! $feature_on( 'countdown_layout' ) ) {
	$layout = 'inline';
}

if ( ! $feature_on( 'countdown_expiry_message' ) ) {
	$expiry_message = '';
}

if ( ! $feature_on( 'countdown_timezone' ) ) {
	$timezone = 'utc';
}

$separator_chars = array(
	'colon' => ':',
	'dot'   => '·',
	'dash'  => '—',
	'none'  => '',
);
$sep_char        = $separator_chars[ $separator ] ?? '';

$wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class'               => 'aegis-countdown aegis-countdown--' . esc_attr( $layout ),
		'data-datetime'       => esc_attr( $datetime ),
		'data-show-days'      => $show_days ? 'true' : 'false',
		'data-show-hours'     => $show_hours ? 'true' : 'false',
		'data-show-minutes'   => $show_minutes ? 'true' : 'false',
		'data-show-seconds'   => $show_seconds ? 'true' : 'false',
		'data-separator'      => esc_attr( $separator ),
		'data-layout'         => esc_attr( $layout ),
		'data-expiry-message' => esc_attr( $expiry_message ),
		'data-timezone'       => esc_attr( $timezone ),
		'data-label-days'     => esc_attr( $labels['days'] ?? 'Days' ),
		'data-label-hours'    => esc_attr( $labels['hours'] ?? 'Hours' ),
		'data-label-minutes'  => esc_attr( $labels['minutes'] ?? 'Minutes' ),
		'data-label-seconds'  => esc_attr( $labels['seconds'] ?? 'Seconds' ),
		'role'                => 'timer',
		'aria-label'          => esc_attr__( 'Countdown timer', 'aegis' ),
		'aria-atomic'         => 'true',
	)
);

$segments = array();
if ( $show_days ) {
	$segments[] = array(
		'unit'  => 'days',
		'label' => $labels['days'] ?? 'Days',
	);
}
if ( $show_hours ) {
	$segments[] = array(
		'unit'  => 'hours',
		'label' => $labels['hours'] ?? 'Hours',
	);
}
if ( $show_minutes ) {
	$segments[] = array(
		'unit'  => 'minutes',
		'label' => $labels['minutes'] ?? 'Minutes',
	);
}
if ( $show_seconds ) {
	$segments[] = array(
		'unit'  => 'seconds',
		'label' => $labels['seconds'] ?? 'Seconds',
	);
}

$formatted_date = '';
if ( $datetime ) {
	$timestamp = strtotime( $datetime );
	if ( $timestamp ) {
		$formatted_date = wp_date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), $timestamp );
	}
}

?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by get_block_wrapper_attributes(). ?>>
	<div class="aegis-countdown__segments">
		<?php foreach ( $segments as $index => $segment ) : ?>
			<?php if ( $index > 0 && $sep_char !== '' ) : ?>
				<span class="aegis-countdown__separator" aria-hidden="true"><?php echo esc_html( $sep_char ); ?></span>
			<?php endif; ?>
			<div class="aegis-countdown__segment" data-unit="<?php echo esc_attr( $segment['unit'] ); ?>">
				<span class="aegis-countdown__digits" aria-hidden="true">00</span>
				<span class="aegis-countdown__label"><?php echo esc_html( $segment['label'] ); ?></span>
			</div>
		<?php endforeach; ?>
	</div>

	<?php if ( $expiry_message ) : ?>
		<div class="aegis-countdown__expired" hidden>
			<p><?php echo esc_html( $expiry_message ); ?></p>
		</div>
	<?php endif; ?>

	<div class="aegis-countdown__sr screen-reader-text" aria-live="polite" aria-atomic="true"></div>

	<noscript>
		<?php if ( $formatted_date ) : ?>
			<p><?php echo esc_html( $formatted_date ); ?></p>
		<?php endif; ?>
	</noscript>
</div>
<?php
$schema_enabled = ! empty( $attributes['schemaEnabled'] );
$event_name     = sanitize_text_field( (string) ( $attributes['schemaEventName'] ?? '' ) );

if (
	$schema_enabled
	&& $event_name !== ''
	&& $datetime !== ''
	&& $feature_on( 'countdown_schema' )
	&& (
		! class_exists( '\Aegis\Plugin\Settings\Repository' )
		|| ! \Aegis\Plugin\Settings\Repository::is_schema_delegated_to_seo( 'event' )
	)
) {
	$schema = array(
		'@context'  => 'https://schema.org',
		'@type'     => 'Event',
		'name'      => $event_name,
		'startDate' => $datetime,
	);

	$description = sanitize_text_field( (string) ( $attributes['schemaEventDescription'] ?? '' ) );
	$location    = sanitize_text_field( (string) ( $attributes['schemaEventLocation'] ?? '' ) );
	$event_url   = esc_url_raw( (string) ( $attributes['schemaEventUrl'] ?? '' ) );

	if ( $description !== '' ) {
		$schema['description'] = $description;
	}

	if ( $location !== '' ) {
		$schema['location'] = array(
			'@type' => 'Place',
			'name'  => $location,
		);
	}

	if ( $event_url !== '' ) {
		$schema['url'] = $event_url;
	}

	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES ) . '</script>';
}
