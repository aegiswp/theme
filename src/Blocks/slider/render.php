<?php
/**
 * Slider Block - Server-side Render
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'aegis_slider_apply_lazy_load' ) ) {
	/**
	 * Apply Splide lazy-load attributes to slider slide images.
	 *
	 * @param string $content       Inner slide markup.
	 * @param int    $preload_count Number of images to keep eager-loaded.
	 *
	 * @return string
	 */
	function aegis_slider_apply_lazy_load( string $content, int $preload_count = 1 ): string {
		$image_count = 0;
		$placeholder = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';

		return (string) preg_replace_callback(
			'/<img([^>]*?)>/i',
			static function ( array $matches ) use ( &$image_count, $preload_count, $placeholder ): string {
				++$image_count;
				$attrs = $matches[1];

				if ( str_contains( $attrs, 'data-splide-lazy=' ) ) {
					return $matches[0];
				}

				if ( ! preg_match( '/\ssrc=(["\'])([^"\']+)\1/i', $attrs, $src_match ) ) {
					return $matches[0];
				}

				$src = $src_match[2];

				if ( $image_count <= $preload_count ) {
					if ( ! str_contains( $attrs, 'loading=' ) ) {
						$loading = $image_count === 1 ? 'loading="eager" fetchpriority="high"' : 'loading="eager"';
						return '<img' . $attrs . ' ' . $loading . '>';
					}

					return $matches[0];
				}

				$attrs = (string) preg_replace( '/\ssrc=(["\'])([^"\']+)\1/i', '', $attrs );

				return sprintf(
					'<img%s src="%s" data-splide-lazy="%s" loading="lazy">',
					$attrs,
					esc_attr( $placeholder ),
					esc_attr( $src )
				);
			},
			$content
		);
	}
}

// Extract attributes with defaults.
$type           = $attributes['type'] ?? 'slider';
$per_page       = $attributes['perPage'] ?? 3;
$per_move       = $attributes['perMove'] ?? 1;
$autoplay       = $attributes['autoplay'] ?? false;
$pause_on_hover = $attributes['pauseOnHover'] ?? true;
$loop           = $attributes['loop'] ?? false;
$drag           = $attributes['drag'] ?? true;
$show_arrows    = $attributes['showArrows'] ?? true;
$show_dots      = $attributes['showDots'] ?? true;
$speed          = $attributes['speed'] ?? 400;
$interval       = $attributes['interval'] ?? 5000;
$direction      = $attributes['direction'] ?? 'ltr';
$height         = $attributes['height'] ?? '';
$breakpoints    = $attributes['breakpoints'] ?? true;
$gap_raw        = $attributes['style']['spacing']['blockGap'] ?? '0';
$gap            = is_array( $gap_raw ) ? ( $gap_raw['left'] ?? $gap_raw['horizontal'] ?? '0' ) : $gap_raw;

// Lightbox mode — check admin toggle.
$lightbox = false;
if ( class_exists( '\Aegis\Admin\ConditionalLogicSettings' ) ) {
	$lightbox = \Aegis\Admin\ConditionalLogicSettings::is_block_enabled( 'slider_lightbox' );
}

$lazy_load = false;
$lazy_preload = 1;

if ( class_exists( '\Aegis\Plugin\Blocks\Settings' ) ) {
	$lazy_load = \Aegis\Plugin\Blocks\Settings::is_enabled( 'slider_lazy_load' );
}

if ( ! empty( $attributes['lazyLoadEnabled'] ) ) {
	$lazy_load    = true;
	$lazy_preload = max( 1, (int) ( $attributes['lazyLoadThreshold'] ?? 1 ) );
}

if ( $lazy_load && $content !== '' ) {
	$content = aegis_slider_apply_lazy_load( $content, $lazy_preload );
}

// Build wrapper attributes using get_block_wrapper_attributes() to
// honour block supports (spacing) and handle className / anchor / align.
$wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class'                => 'splide',
		'data-type'            => esc_attr( $type ),
		'data-per-page'        => esc_attr( (string) $per_page ),
		'data-per-move'        => esc_attr( (string) $per_move ),
		'data-autoplay'        => $autoplay ? 'true' : 'false',
		'data-pause-on-hover'  => $pause_on_hover ? 'true' : 'false',
		'data-loop'            => $loop ? 'true' : 'false',
		'data-drag'            => $drag ? 'true' : 'false',
		'data-show-arrows'     => $show_arrows ? 'true' : 'false',
		'data-show-dots'       => $show_dots ? 'true' : 'false',
		'data-speed'           => esc_attr( (string) $speed ),
		'data-interval'        => esc_attr( (string) $interval ),
		'data-direction'       => esc_attr( $direction ),
		'data-height'          => esc_attr( $height ),
		'data-breakpoints'     => $breakpoints ? 'true' : 'false',
		'data-gap'             => esc_attr( $gap ),
		'data-lightbox'        => $lightbox ? 'true' : 'false',
		'data-lazy-load'       => $lazy_load ? 'true' : 'false',
		'data-lazy-preload'    => esc_attr( (string) $lazy_preload ),
		'role'                 => 'region',
		'aria-roledescription' => esc_attr__( 'carousel', 'aegis' ),
		'aria-label'           => esc_attr( ! empty( $attributes['anchor'] ) ? $attributes['anchor'] : __( 'Slider', 'aegis' ) ),
	)
);

?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by get_block_wrapper_attributes(). ?>>
	<div class="splide__track">
		<div class="splide__list">
			<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</div>
	<div class="splide__sr" aria-live="polite" aria-atomic="true"></div>
</div>
