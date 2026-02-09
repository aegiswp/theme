<?php
/**
 * Toggle Block - Server-side Render
 *
 * @package Aegis
 * @since   1.0.0
 */

declare( strict_types=1 );

defined( 'ABSPATH' ) || exit;

$heading            = $attributes['heading'] ?? '';
$heading_tag        = $attributes['headingTag'] ?? 'h3';
$is_open            = $attributes['isOpen'] ?? false;
$icon_position      = $attributes['iconPosition'] ?? 'right';
$icon_type          = $attributes['iconType'] ?? 'chevron';
$allow_multiple     = $attributes['allowMultiple'] ?? true;
$animation_duration = $attributes['animationDuration'] ?? 300;

// Sanitize heading tag against allowlist.
$allowed_heading_tags = array( 'h2', 'h3', 'h4', 'h5', 'h6', 'p' );
if ( ! in_array( $heading_tag, $allowed_heading_tags, true ) ) {
	$heading_tag = 'h3';
}

// Sanitize icon position against allowlist (R1).
$allowed_positions = array( 'left', 'right' );
if ( ! in_array( $icon_position, $allowed_positions, true ) ) {
	$icon_position = 'right';
}

// Sanitize icon type against allowlist (R2).
$allowed_icon_types = array( 'chevron', 'plus', 'arrow' );
if ( ! in_array( $icon_type, $allowed_icon_types, true ) ) {
	$icon_type = 'chevron';
}

// Sanitize animation duration to a positive integer.
$animation_duration = absint( $animation_duration );

$toggle_id  = 'aegis-toggle-' . wp_unique_id();
$content_id = $toggle_id . '-content';

// Build extra classes for the wrapper (R9: use get_block_wrapper_attributes).
$extra_classes = array(
	'aegis-toggle',
	'aegis-toggle--icon-' . $icon_position,
	'aegis-toggle--icon-' . $icon_type,
);

if ( $is_open ) {
	$extra_classes[] = 'aegis-toggle--open';
}

// Icon SVGs.
$icons = array(
	'chevron' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6z"/></svg>',
	'plus'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6z"/></svg>',
	'arrow'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false"><path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z"/></svg>',
);

$icon_svg = $icons[ $icon_type ] ?? $icons['chevron'];

$allowed_svg = array(
	'svg'  => array(
		'xmlns'       => true,
		'viewbox'     => true,
		'width'       => true,
		'height'      => true,
		'aria-hidden' => true,
		'focusable'   => true,
	),
	'path' => array(
		'd' => true,
	),
);

$wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class'                   => implode( ' ', $extra_classes ),
		'data-allow-multiple'     => $allow_multiple ? 'true' : 'false',
		'data-animation-duration' => (string) $animation_duration,
	)
);

?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by get_block_wrapper_attributes(). ?>>
	<<?php echo esc_html( $heading_tag ); ?> class="aegis-toggle__header">
		<button
			type="button"
			class="aegis-toggle__trigger"
			id="<?php echo esc_attr( $toggle_id ); ?>"
			aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>"
			aria-controls="<?php echo esc_attr( $content_id ); ?>"
		>
			<span class="aegis-toggle__heading"><?php echo wp_kses_post( $heading ); ?></span>
			<span class="aegis-toggle__icon">
				<?php echo wp_kses( $icon_svg, $allowed_svg ); ?>
			</span>
		</button>
	</<?php echo esc_html( $heading_tag ); ?>>

	<div
		id="<?php echo esc_attr( $content_id ); ?>"
		class="aegis-toggle__content"
		role="region"
		aria-labelledby="<?php echo esc_attr( $toggle_id ); ?>"
		<?php echo $is_open ? '' : 'hidden'; ?>
	>
		<div class="aegis-toggle__body">
			<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</div>
</div>
