<?php
/**
 * Toggle Block - Server-side Render
 *
 * Content switcher with two labeled views (not an accordion).
 *
 * @package Aegis
 * @since   1.1.0
 */

declare(strict_types=1);

defined( 'ABSPATH' ) || exit;

$switch_style       = $attributes['switchStyle'] ?? 'switch';
$alignment          = $attributes['alignment'] ?? 'center';
$primary_label      = $attributes['primaryLabel'] ?? '';
$secondary_label    = $attributes['secondaryLabel'] ?? '';
$initial_content    = $attributes['initialContent'] ?? 'a';
$animation_duration = $attributes['animationDuration'] ?? 300;

$feature_on = static function ( string $key ): bool {
	if ( class_exists( '\Aegis\Framework\ServiceProvider' ) ) {
		return \Aegis\Framework\ServiceProvider::is_block_enabled( $key );
	}

	return true;
};

$enabled_styles = array();

if ( $feature_on( 'toggle_pill' ) ) {
	$enabled_styles[] = 'pill';
}

if ( $feature_on( 'toggle_switch' ) ) {
	$enabled_styles[] = 'switch';
}

if ( $feature_on( 'toggle_buttons' ) ) {
	$enabled_styles[] = 'buttons';
}

if ( $enabled_styles === array() ) {
	$enabled_styles[] = 'switch';
}

if ( ! in_array( $switch_style, $enabled_styles, true ) ) {
	$switch_style = $enabled_styles[0];
}

if ( ! $feature_on( 'toggle_position' ) ) {
	$alignment = 'center';
}

if ( ! $feature_on( 'toggle_labels' ) ) {
	$primary_label   = __( 'First', 'aegis' );
	$secondary_label = __( 'Second', 'aegis' );
}

if ( ! $feature_on( 'toggle_animations' ) ) {
	$animation_duration = 300;
}

$allowed_styles = array( 'pill', 'switch', 'buttons' );
if ( ! in_array( $switch_style, $allowed_styles, true ) ) {
	$switch_style = 'switch';
}

$allowed_align = array( 'left', 'center', 'right' );
if ( ! in_array( $alignment, $allowed_align, true ) ) {
	$alignment = 'center';
}

$initial_content    = $initial_content === 'b' ? 'b' : 'a';
$animation_duration = absint( $animation_duration );

if ( $primary_label === '' ) {
	$primary_label = __( 'First', 'aegis' );
}

if ( $secondary_label === '' ) {
	$secondary_label = __( 'Second', 'aegis' );
}

$toggle_id = \Aegis\Blocks\ToggleId::from_block(
	( isset( $block ) && $block instanceof \WP_Block ) ? $block : null,
	is_array( $attributes ) ? $attributes : array(),
	is_string( $content ) ? $content : ''
);

$a_active = $initial_content === 'a';
$b_active = $initial_content === 'b';

$wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class'          => implode(
			' ',
			array(
				'aegis-toggle',
				'aegis-toggle--style-' . $switch_style,
				'aegis-toggle--align-' . $alignment,
			)
		),
		'data-toggle-id' => $toggle_id,
		'data-active'    => $initial_content,
		'style'          => sprintf(
			'--toggle-animation-duration: %1$dms; --aegis-toggle-duration: %1$dms;',
			$animation_duration
		),
	)
);

?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by get_block_wrapper_attributes(). ?>>
	<div
		class="aegis-toggle__control"
		role="tablist"
		aria-label="<?php echo esc_attr__( 'Content switcher', 'aegis' ); ?>"
	>
		<button
			type="button"
			class="aegis-toggle__button<?php echo $a_active ? ' is-active' : ''; ?>"
			data-toggle-target="a"
			role="tab"
			aria-selected="<?php echo $a_active ? 'true' : 'false'; ?>"
			aria-controls="<?php echo esc_attr( $toggle_id . '-a' ); ?>"
			id="<?php echo esc_attr( $toggle_id . '-tab-a' ); ?>"
		>
			<?php echo wp_kses_post( $primary_label ); ?>
		</button>
		<?php if ( $switch_style === 'switch' ) : ?>
			<span class="aegis-toggle__track" aria-hidden="true"><span class="aegis-toggle__thumb"></span></span>
		<?php endif; ?>
		<?php if ( $switch_style === 'pill' ) : ?>
			<span class="aegis-toggle__indicator" aria-hidden="true"></span>
		<?php endif; ?>
		<button
			type="button"
			class="aegis-toggle__button<?php echo $b_active ? ' is-active' : ''; ?>"
			data-toggle-target="b"
			role="tab"
			aria-selected="<?php echo $b_active ? 'true' : 'false'; ?>"
			aria-controls="<?php echo esc_attr( $toggle_id . '-b' ); ?>"
			id="<?php echo esc_attr( $toggle_id . '-tab-b' ); ?>"
		>
			<?php echo wp_kses_post( $secondary_label ); ?>
		</button>
	</div>
	<div class="aegis-toggle__panels">
		<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>
</div>
