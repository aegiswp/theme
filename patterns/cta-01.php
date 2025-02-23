<?php
/**
 * Title: 01. CTA Pattern
 * Slug: aegis/cta-01
 * Categories: call-to-action
 * Description: Block pattern featuring a gradient background, bold typography, and a call-to-action layout with a tagline, headline, and buttons, designed for accessibility and user engagement.
 * Keywords: call-to-action, buttons, headline, tagline, gradient
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/columns, core/group, core/heading, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('01. CTA Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('call-to-action', 'Name of the categories', 'aegis'); ?>"],"patternName":"aegis/cta-01"},"gradient":"vertical-background-to-foreground","layout":{"type":"default"}} -->
<div class="wp-block-group has-vertical-background-to-foreground-gradient-background has-background">
    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"gradient":"diagonal-tertiary-to-transparent-right-top"} -->
    <div class="wp-block-columns are-vertically-aligned-center has-diagonal-tertiary-to-transparent-right-top-gradient-background has-background"
        style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
        <!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
            <!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"bottom":"-15px"}}},"fontSize":"tiny"} -->
            <p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase">
                <?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?>
            </p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
            <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase">
                <?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?>
            </h3>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-fill","style":{"border":{"width":"2px"}},"borderColor":"background"} -->
                <div class="wp-block-button is-style-fill">
                    <a class="wp-block-button__link has-border-color has-background-border-color wp-element-button" style="border-width:2px"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a>
                </div>
                <!-- /wp:button -->

                <!-- wp:button {"backgroundColor":"tertiary","textColor":"foreground","className":"is-style-fill","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}}} -->
                <div class="wp-block-button is-style-fill">
                    <a class="wp-block-button__link has-foreground-color has-tertiary-background-color has-text-color has-background has-link-color wp-element-button">
                        <?php echo esc_html_x( 'Call to Action →', 'Call-to-action button text', 'aegis' ); ?>
                    </a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->