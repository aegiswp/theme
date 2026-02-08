<?php
/**
 * Modal Block - Server-side Render
 *
 * Renders the modal block on the frontend with full accessibility support.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Generate unique ID if not set.
$modal_id = ! empty( $attributes['modalId'] ) ? $attributes['modalId'] : 'aegis-modal-' . wp_unique_id();

// Extract attributes with defaults.
$modal_type           = $attributes['modalType'] ?? 'popup';
$trigger_type         = $attributes['triggerType'] ?? 'button';
$trigger_text         = $attributes['triggerText'] ?? __( 'Open Modal', 'aegis' );
$trigger_icon         = $attributes['triggerIcon'] ?? '';
$trigger_image_url    = $attributes['triggerImageUrl'] ?? '';
$trigger_image_alt    = $attributes['triggerImageAlt'] ?? '';
$modal_title          = $attributes['modalTitle'] ?? '';
$animation            = $attributes['animation'] ?? 'fade';
$animation_duration   = $attributes['animationDuration'] ?? 200;
$close_on_esc         = $attributes['closeOnEsc'] ?? true;
$close_on_overlay     = $attributes['closeOnOverlay'] ?? true;
$show_close_button    = $attributes['showCloseButton'] ?? true;
$close_button_pos     = $attributes['closeButtonPosition'] ?? 'inside';
$prevent_body_scroll  = $attributes['preventBodyScroll'] ?? true;
$focus_trap           = $attributes['focusTrap'] ?? true;
$return_focus         = $attributes['returnFocus'] ?? true;
$width                = $attributes['width'] ?? '500px';
$max_width            = $attributes['maxWidth'] ?? '90vw';
$height               = $attributes['height'] ?? 'auto';
$max_height           = $attributes['maxHeight'] ?? '90vh';
$overlay_color        = $attributes['overlayColor'] ?? 'rgba(0, 0, 0, 0.5)';
$overlay_blur         = $attributes['overlayBlur'] ?? 0;
$background_color     = $attributes['backgroundColor'] ?? '#ffffff';
$border_radius        = $attributes['borderRadius'] ?? '8px';
$padding              = $attributes['padding'] ?? '24px';

// Phase 2 attributes.
$scroll_trigger_percent   = $attributes['scrollTriggerPercent'] ?? 50;
$scroll_trigger_once      = $attributes['scrollTriggerOnce'] ?? true;
$exit_intent_sensitivity  = $attributes['exitIntentSensitivity'] ?? 20;
$exit_intent_delay        = $attributes['exitIntentDelay'] ?? 0;
$timed_trigger_delay      = $attributes['timedTriggerDelay'] ?? 5000;
$auto_close_delay         = $attributes['autoCloseDelay'] ?? 0;
$show_once                = $attributes['showOnce'] ?? false;
$show_once_expiry         = $attributes['showOnceExpiry'] ?? 7;
$device_visibility        = $attributes['deviceVisibility'] ?? array( 'desktop', 'tablet', 'mobile' );

// Build CSS custom properties for the modal.
$modal_styles = sprintf(
	'--aegis-modal-width: %s; --aegis-modal-max-width: %s; --aegis-modal-height: %s; --aegis-modal-max-height: %s; --aegis-modal-overlay-color: %s; --aegis-modal-overlay-blur: %spx; --aegis-modal-bg: %s; --aegis-modal-radius: %s; --aegis-modal-padding: %s; --aegis-modal-duration: %sms;',
	esc_attr( $width ),
	esc_attr( $max_width ),
	esc_attr( $height ),
	esc_attr( $max_height ),
	esc_attr( $overlay_color ),
	esc_attr( $overlay_blur ),
	esc_attr( $background_color ),
	esc_attr( $border_radius ),
	esc_attr( $padding ),
	esc_attr( $animation_duration )
);

// Build data attributes for JS.
$data_attrs = sprintf(
	'data-modal-id="%s" data-modal-type="%s" data-trigger-type="%s" data-animation="%s" data-close-esc="%s" data-close-overlay="%s" data-prevent-scroll="%s" data-focus-trap="%s" data-return-focus="%s" data-scroll-trigger-percent="%s" data-scroll-trigger-once="%s" data-exit-intent-sensitivity="%s" data-exit-intent-delay="%s" data-timed-trigger-delay="%s" data-auto-close-delay="%s" data-show-once="%s" data-show-once-expiry="%s" data-device-visibility="%s"',
	esc_attr( $modal_id ),
	esc_attr( $modal_type ),
	esc_attr( $trigger_type ),
	esc_attr( $animation ),
	$close_on_esc ? 'true' : 'false',
	$close_on_overlay ? 'true' : 'false',
	$prevent_body_scroll ? 'true' : 'false',
	$focus_trap ? 'true' : 'false',
	$return_focus ? 'true' : 'false',
	esc_attr( $scroll_trigger_percent ),
	$scroll_trigger_once ? 'true' : 'false',
	esc_attr( $exit_intent_sensitivity ),
	esc_attr( $exit_intent_delay ),
	esc_attr( $timed_trigger_delay ),
	esc_attr( $auto_close_delay ),
	$show_once ? 'true' : 'false',
	esc_attr( $show_once_expiry ),
	esc_attr( implode( ',', $device_visibility ) )
);

// Generate title ID for aria-labelledby.
$title_id = $modal_id . '-title';

// Wrapper classes.
$wrapper_classes = array(
	'wp-block-aegis-modal',
	'aegis-modal-wrapper',
	'aegis-modal-type-' . $modal_type,
);

if ( ! empty( $attributes['className'] ) ) {
	$wrapper_classes[] = $attributes['className'];
}

if ( ! empty( $attributes['align'] ) ) {
	$wrapper_classes[] = 'align' . $attributes['align'];
}

$wrapper_class = implode( ' ', $wrapper_classes );

// Close button SVG (accessible).
$close_button_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>';

?>
<div class="<?php echo esc_attr( $wrapper_class ); ?>" <?php echo $data_attrs; ?> style="<?php echo esc_attr( $modal_styles ); ?>">
	
	<?php // Trigger Button/Element. ?>
	<<?php echo 'image' === $trigger_type ? 'button' : 'button'; ?>
		type="button"
		class="aegis-modal-trigger aegis-modal-trigger--<?php echo esc_attr( $trigger_type ); ?>"
		aria-haspopup="dialog"
		aria-expanded="false"
		aria-controls="<?php echo esc_attr( $modal_id ); ?>"
	>
		<?php if ( 'button' === $trigger_type || 'text' === $trigger_type ) : ?>
			<span class="aegis-modal-trigger__text"><?php echo esc_html( $trigger_text ); ?></span>
		<?php elseif ( 'icon' === $trigger_type && $trigger_icon ) : ?>
			<span class="aegis-modal-trigger__icon" aria-hidden="true"><?php echo wp_kses_post( $trigger_icon ); ?></span>
			<span class="screen-reader-text"><?php echo esc_html( $trigger_text ); ?></span>
		<?php elseif ( 'image' === $trigger_type && $trigger_image_url ) : ?>
			<img 
				src="<?php echo esc_url( $trigger_image_url ); ?>" 
				alt="<?php echo esc_attr( $trigger_image_alt ?: $trigger_text ); ?>"
				class="aegis-modal-trigger__image"
			/>
		<?php else : ?>
			<span class="aegis-modal-trigger__text"><?php echo esc_html( $trigger_text ); ?></span>
		<?php endif; ?>
	</button>

	<?php // Modal Dialog (hidden by default, rendered in DOM for SEO/accessibility). ?>
	<div
		id="<?php echo esc_attr( $modal_id ); ?>"
		class="aegis-modal aegis-modal--<?php echo esc_attr( $modal_type ); ?> aegis-modal--<?php echo esc_attr( $animation ); ?>"
		role="dialog"
		aria-modal="true"
		aria-labelledby="<?php echo esc_attr( $title_id ); ?>"
		aria-hidden="true"
		tabindex="-1"
		hidden
	>
		<?php // Overlay (clickable to close if enabled). ?>
		<div class="aegis-modal__overlay" <?php echo $close_on_overlay ? 'data-close-modal' : ''; ?>></div>

		<?php // Modal Content Container. ?>
		<div class="aegis-modal__container">
			
			<?php // Close button outside. ?>
			<?php if ( $show_close_button && 'outside' === $close_button_pos ) : ?>
				<button
					type="button"
					class="aegis-modal__close aegis-modal__close--outside"
					aria-label="<?php esc_attr_e( 'Close modal', 'aegis' ); ?>"
					data-close-modal
				>
					<?php echo $close_button_svg; ?>
				</button>
			<?php endif; ?>

			<div class="aegis-modal__content" role="document">
				
				<?php // Close button inside. ?>
				<?php if ( $show_close_button && 'inside' === $close_button_pos ) : ?>
					<button
						type="button"
						class="aegis-modal__close aegis-modal__close--inside"
						aria-label="<?php esc_attr_e( 'Close modal', 'aegis' ); ?>"
						data-close-modal
					>
						<?php echo $close_button_svg; ?>
					</button>
				<?php endif; ?>

				<?php // Modal Title (for accessibility, can be visually hidden). ?>
				<?php if ( $modal_title ) : ?>
					<h2 id="<?php echo esc_attr( $title_id ); ?>" class="aegis-modal__title">
						<?php echo esc_html( $modal_title ); ?>
					</h2>
				<?php else : ?>
					<span id="<?php echo esc_attr( $title_id ); ?>" class="screen-reader-text">
						<?php esc_html_e( 'Modal dialog', 'aegis' ); ?>
					</span>
				<?php endif; ?>

				<?php // Inner Blocks Content. ?>
				<div class="aegis-modal__body">
					<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>

			</div>
		</div>
	</div>

</div>
