<?php
/**
 * Title: 02. CTA Pattern
 * Slug: aegis/cta-02
 * Categories: call-to-action
 * Description: Block pattern featuring an image alongside a tagline, heading, description, and call-to-action buttons.
 * Keywords: call-to-action, buttons, image, tagline, heading, description
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/column, core/columns, core/group, core/heading, core/image, core/paragraph, core/social-link, core/social-links, core/media-text
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["call-to-action"],"patternName":"aegis/cta-02","name":"<?php echo esc_html_x('02. CTA Pattern', 'Name of the pattern', 'aegis'); ?>"},"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"gradient":"diagonal-foreground-to-primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-diagonal-foreground-to-primary-gradient-background has-background" style="padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:media-text {"align":"full","mediaId":544,"mediaLink":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","mediaType":"image","mediaWidth":60,"verticalAlignment":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"textColor":"background","gradient":"diagonal-foreground-to-transparent-right-bottom"} -->
    <div class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-center has-background-color has-diagonal-foreground-to-transparent-right-bottom-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;grid-template-columns:60% auto">
        <figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" class="wp-image-544 size-full" /></figure>
        <div class="wp-block-media-text__content">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap","orientation":"vertical"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-15px"}}},"fontSize":"tiny"} -->
                <p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
                <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php echo esc_html_x( 'Provide a concise description, up to 155 characters, summarizing the key points of an offer, article, or news update.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
                <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
                    <!-- wp:buttons {"layout":{"type":"flex","orientation":"horizontal","justifyContent":"space-between"}} -->
                    <div class="wp-block-buttons">
                        <!-- wp:button {"backgroundColor":"background","textColor":"foreground","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}}} -->
                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background has-link-color wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a></div>
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
    </div>
    <!-- /wp:media-text -->
</div>
<!-- /wp:group -->