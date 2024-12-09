<?php
/**
 * Title: 04. CTA Pattern
 * Slug: aegis/cta-04
 * Categories: call-to-action
 * Description: Block pattern featuring a centered call-to-action layout with a gradient background, tagline, heading, and action buttons, ensuring readability and accessibility for all users.
 * Keywords: call-to-action, buttons, heading, description, tagline, gradient
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/group, core/heading, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('04. CTA Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["call-to-action"],"patternName":"aegis/cta-04"},"className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"gradient":"diagonal-foreground-to-primary-left-bottom","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-section-dark has-diagonal-foreground-to-primary-left-bottom-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
    <!-- wp:group {"gradient":"diagonal-foreground-to-primary-left-bottom","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
    <div class="wp-block-group has-diagonal-foreground-to-primary-left-bottom-gradient-background has-background">
        <!-- wp:paragraph {"align":"center","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-15px"}}},"fontSize":"tiny"} -->
        <p class="has-text-align-center has-tiny-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
        <h3 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?></h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php echo esc_html_x( 'Provide a concise description, up to 155 characters, summarizing the key points of an offer, article, or news update.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
        <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-outline"} -->
                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a></div>
                <!-- /wp:button -->

                <!-- wp:button -->
                <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action →', 'Call-to-action button text', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->