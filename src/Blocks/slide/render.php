<?php
/**
 * Slide Block - Server-side Render
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

$wrapper_classes = array( 'wp-block-aegis-slide', 'splide__slide' );

if ( ! empty( $attributes['className'] ) ) {
	$wrapper_classes[] = $attributes['className'];
}

$wrapper_class = implode( ' ', $wrapper_classes );
?>
<div class="<?php echo esc_attr( $wrapper_class ); ?>">
	<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</div>
