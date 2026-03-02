<?php
/**
 * Title: Cookie Consent Modal
 * Slug: cookie-consent
 * Categories: modal
 * Keywords: modal, cookie, consent, gdpr, privacy
 * Description: A cookie consent modal that appears on page load.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

?>
<!-- wp:aegis/modal {"modalId":"cookie-consent-modal","modalType":"bottom-sheet","triggerType":"timed","modalTitle":"<?php echo esc_attr__('Cookie Consent', 'aegis'); ?>","animation":"slide","timedTriggerDelay":1000,"showOnce":true,"showOnceExpiry":365,"closeOnOverlay":false,"closeOnEsc":false} -->
<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center">
    <!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%">
        <!-- wp:paragraph -->
        <p><?php echo esc_html__('We use cookies to enhance your browsing experience and analyze site traffic. By clicking "Accept", you consent to our use of cookies.', 'aegis'); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
        <div class="wp-block-buttons">
            <!-- wp:button {"className":"cookie-accept"} -->
            <div class="wp-block-button cookie-accept"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__('Accept', 'aegis'); ?></a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"is-style-outline cookie-settings"} -->
            <div class="wp-block-button is-style-outline cookie-settings"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__('Settings', 'aegis'); ?></a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns -->
<!-- /wp:aegis/modal -->