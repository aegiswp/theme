<?php
/**
 * Title: 06. CTA Pattern
 * Slug: aegis/cta-06
 * Categories: call-to-action
 * Description: Block pattern featuring a tagline, heading, description, and call-to-action buttons, with a centered layout and gradient background.
 * Keywords: call-to-action, buttons, tagline, heading, description, gradient, centered
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/group, core/heading, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('06. CTA Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('call-to-action', 'Name of the categories', 'aegis'); ?>"],"patternName":"aegis/cta-06"},"className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"gradient":"diagonal-foreground-to-primary-left-bottom","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-section-dark has-diagonal-foreground-to-primary-left-bottom-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
    <!-- wp:group {"gradient":"diagonal-foreground-to-primary-left-bottom","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
    <div class="wp-block-group has-diagonal-foreground-to-primary-left-bottom-gradient-background has-background">
        <!-- wp:paragraph {"align":"center","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-15px"}}},"fontSize":"tiny"} -->
        <p class="has-text-align-center has-tiny-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Limited Offer', 'CTA tagline (10-20 characters recommended)', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
        <h3 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase">
            <?php echo esc_html_x( 'Act Now', 'CTA heading (10-15 characters recommended)', 'aegis' ); ?>
        </h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php echo esc_html_x( 'This special promotion ends soon. Join hundreds of satisfied customers who have already taken advantage of our exclusive pricing.', 'CTA description (100-150 characters recommended)', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
        <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-outline"} -->
                <div class="wp-block-button is-style-outline">
                    <a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Get Started', 'Primary CTA button text (10-15 characters recommended)', 'aegis' ); ?></a>
                </div>
                <!-- /wp:button -->

                <!-- wp:button -->
                <div class="wp-block-button">
                    <a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Learn More', 'Secondary CTA button text (10-15 characters recommended)', 'aegis' ); ?> <span class="wp-element-button__arrow" aria-hidden="true">&rarr;</span></a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->