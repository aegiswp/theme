<?php
/**
 * Slide Block - Server-side Render
 *
 * Ensures every slide is a Splide slide item on the frontend. Patterns and
 * InnerBlocks-only saves omit the wrapper markup; Splide needs `.splide__slide`.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

defined( 'ABSPATH' ) || exit;

$inner = (string) $content;

// Already wrapped (static-save post content) — avoid a double wrapper.
if (
	str_contains( $inner, 'splide__slide' )
	|| str_contains( $inner, 'wp-block-aegis-slide' )
) {
	echo $inner; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	return;
}

$wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class'                => 'aegis-slide splide__slide',
		'role'                 => 'group',
		'aria-roledescription' => esc_attr__( 'slide', 'aegis' ),
	)
);
?>
<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by get_block_wrapper_attributes(). ?>>
	<?php echo $inner; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</div>
