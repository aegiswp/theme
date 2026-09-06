<?php
/**
 * Toggle Content Block - Server-side Render
 *
 * @package Aegis
 * @since   1.1.0
 */

declare(strict_types=1);

defined( 'ABSPATH' ) || exit;

$slot = ( $attributes['slot'] ?? 'a' ) === 'b' ? 'b' : 'a';
$context = is_object( $block ) && isset( $block->context ) && is_array( $block->context )
	? $block->context
	: array();
$active = ( $context['aegis/toggleActiveSlot'] ?? 'a' ) === 'b' ? 'b' : 'a';
$is_on  = $slot === $active;
$toggle_id = isset( $context['aegis/toggleDomId'] ) && is_string( $context['aegis/toggleDomId'] )
	? $context['aegis/toggleDomId']
	: '';

$classes = array( 'aegis-toggle-content' );

if ( $is_on ) {
	$classes[] = 'is-active';
}

$wrapper_args = array(
	'class'       => implode( ' ', $classes ),
	'data-slot'   => $slot,
	'role'        => 'tabpanel',
	'aria-hidden' => $is_on ? 'false' : 'true',
);

if ( $toggle_id !== '' ) {
	$wrapper_args['id']              = $toggle_id . '-' . $slot;
	$wrapper_args['aria-labelledby'] = $toggle_id . '-tab-' . $slot;
}

$wrapper_attributes = get_block_wrapper_attributes( $wrapper_args );

?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by get_block_wrapper_attributes(). ?>>
	<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</div>
