<?php
/**
 * Slider Block - Server-side Render
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

// Extract attributes with defaults.
$type          = $attributes['type'] ?? 'slider';
$per_page      = $attributes['perPage'] ?? 3;
$per_move      = $attributes['perMove'] ?? 1;
$autoplay      = $attributes['autoplay'] ?? false;
$pause_on_hover = $attributes['pauseOnHover'] ?? true;
$loop          = $attributes['loop'] ?? false;
$drag          = $attributes['drag'] ?? true;
$show_arrows   = $attributes['showArrows'] ?? true;
$show_dots     = $attributes['showDots'] ?? true;
$speed         = $attributes['speed'] ?? 400;
$interval      = $attributes['interval'] ?? 5000;
$direction     = $attributes['direction'] ?? 'ltr';
$height        = $attributes['height'] ?? '';
$breakpoints   = $attributes['breakpoints'] ?? true;
$gap_raw       = $attributes['style']['spacing']['blockGap'] ?? '0';
$gap           = is_array( $gap_raw ) ? ( $gap_raw['left'] ?? $gap_raw['horizontal'] ?? '0' ) : $gap_raw;

// Lightbox mode — check admin toggle.
$lightbox = false;
if ( class_exists( '\Aegis\Admin\ConditionalLogicSettings' ) ) {
	$lightbox = \Aegis\Admin\ConditionalLogicSettings::is_block_enabled( 'slider_lightbox' );
}

// Build wrapper classes.
$wrapper_classes = array(
	'wp-block-aegis-slider',
	'splide',
);

if ( ! empty( $attributes['className'] ) ) {
	$wrapper_classes[] = $attributes['className'];
}

if ( ! empty( $attributes['align'] ) ) {
	$wrapper_classes[] = 'align' . $attributes['align'];
}

$wrapper_class = implode( ' ', $wrapper_classes );

// Build data attributes for the frontend JS.
$data_attrs = sprintf(
	'data-type="%s" data-per-page="%s" data-per-move="%s" data-autoplay="%s" data-pause-on-hover="%s" data-loop="%s" data-drag="%s" data-show-arrows="%s" data-show-dots="%s" data-speed="%s" data-interval="%s" data-direction="%s" data-height="%s" data-breakpoints="%s" data-gap="%s" data-lightbox="%s"',
	esc_attr( $type ),
	esc_attr( (string) $per_page ),
	esc_attr( (string) $per_move ),
	$autoplay ? 'true' : 'false',
	$pause_on_hover ? 'true' : 'false',
	$loop ? 'true' : 'false',
	$drag ? 'true' : 'false',
	$show_arrows ? 'true' : 'false',
	$show_dots ? 'true' : 'false',
	esc_attr( (string) $speed ),
	esc_attr( (string) $interval ),
	esc_attr( $direction ),
	esc_attr( $height ),
	$breakpoints ? 'true' : 'false',
	esc_attr( $gap ),
	$lightbox ? 'true' : 'false'
);

?>
<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $data_attrs built from esc_attr() calls. ?>
<div
	class="<?php echo esc_attr( $wrapper_class ); ?>"
	<?php echo $data_attrs; ?>
	<?php if ( ! empty( $attributes['anchor'] ) ) : ?>
		id="<?php echo esc_attr( $attributes['anchor'] ); ?>"
	<?php endif; ?>
	role="region"
	aria-roledescription="<?php esc_attr_e( 'carousel', 'aegis' ); ?>"
	aria-label="<?php echo esc_attr( ! empty( $attributes['anchor'] ) ? $attributes['anchor'] : __( 'Slider', 'aegis' ) ); ?>"
>
	<div class="splide__track">
		<div class="splide__list">
			<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</div>
	<div class="splide__sr" aria-live="polite" aria-atomic="true"></div>
</div>
