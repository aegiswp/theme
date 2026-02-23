<?php
/**
 * Countdown Block - Server-side Render
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

// Extract attributes with defaults.
$datetime     = $attributes['datetime'] ?? '';
$show_days    = $attributes['showDays'] ?? true;
$show_hours   = $attributes['showHours'] ?? true;
$show_minutes = $attributes['showMinutes'] ?? true;
$show_seconds = $attributes['showSeconds'] ?? true;
$labels       = $attributes['labels'] ?? [
	'days'    => 'Days',
	'hours'   => 'Hours',
	'minutes' => 'Minutes',
	'seconds' => 'Seconds',
];
$separator     = $attributes['separator'] ?? 'colon';
$layout        = $attributes['layout'] ?? 'inline';
$expiry_message = $attributes['expiryMessage'] ?? '';
$timezone      = $attributes['timezone'] ?? 'utc';

// Separator characters.
$separator_chars = [
	'colon' => ':',
	'dot'   => '·',
	'dash'  => '—',
	'none'  => '',
];
$sep_char = $separator_chars[ $separator ] ?? '';

// Build wrapper classes.
$wrapper_classes = [
	'wp-block-aegis-countdown',
	'aegis-countdown',
	'aegis-countdown--' . $layout,
];

if ( ! empty( $attributes['className'] ) ) {
	$wrapper_classes[] = $attributes['className'];
}

if ( ! empty( $attributes['align'] ) ) {
	$wrapper_classes[] = 'align' . $attributes['align'];
}

$wrapper_class = implode( ' ', $wrapper_classes );

// Build data attributes for the frontend JS.
$data_attrs = sprintf(
	'data-datetime="%s" data-show-days="%s" data-show-hours="%s" data-show-minutes="%s" data-show-seconds="%s" data-separator="%s" data-layout="%s" data-expiry-message="%s" data-timezone="%s" data-label-days="%s" data-label-hours="%s" data-label-minutes="%s" data-label-seconds="%s"',
	esc_attr( $datetime ),
	$show_days ? 'true' : 'false',
	$show_hours ? 'true' : 'false',
	$show_minutes ? 'true' : 'false',
	$show_seconds ? 'true' : 'false',
	esc_attr( $separator ),
	esc_attr( $layout ),
	esc_attr( $expiry_message ),
	esc_attr( $timezone ),
	esc_attr( $labels['days'] ?? 'Days' ),
	esc_attr( $labels['hours'] ?? 'Hours' ),
	esc_attr( $labels['minutes'] ?? 'Minutes' ),
	esc_attr( $labels['seconds'] ?? 'Seconds' )
);

// Build visible segments list.
$segments = [];
if ( $show_days ) {
	$segments[] = [
		'unit'  => 'days',
		'label' => $labels['days'] ?? 'Days',
	];
}
if ( $show_hours ) {
	$segments[] = [
		'unit'  => 'hours',
		'label' => $labels['hours'] ?? 'Hours',
	];
}
if ( $show_minutes ) {
	$segments[] = [
		'unit'  => 'minutes',
		'label' => $labels['minutes'] ?? 'Minutes',
	];
}
if ( $show_seconds ) {
	$segments[] = [
		'unit'  => 'seconds',
		'label' => $labels['seconds'] ?? 'Seconds',
	];
}

// Format the target date for noscript fallback.
$formatted_date = '';
if ( $datetime ) {
	$timestamp = strtotime( $datetime );
	if ( $timestamp ) {
		$formatted_date = wp_date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), $timestamp );
	}
}

?>
<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $data_attrs built from esc_attr() calls. ?>
<div
	class="<?php echo esc_attr( $wrapper_class ); ?>"
	<?php echo $data_attrs; ?>
	<?php if ( ! empty( $attributes['anchor'] ) ) : ?>
		id="<?php echo esc_attr( $attributes['anchor'] ); ?>"
	<?php endif; ?>
	role="timer"
	aria-label="<?php esc_attr_e( 'Countdown timer', 'aegis' ); ?>"
	aria-atomic="true"
>
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
