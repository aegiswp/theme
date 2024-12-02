<?php
/**
 * Title: 03. CTA Pattern
 * Slug: aegis/cta-03
 * Categories: call-to-action
 * Description: Two-column with heading, paragraph, image, and call to action button
 * Keywords: cta, marketing, promotion, sale
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/heading, core/paragraph, core/image, core/button
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('03. CTA Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["call-to-action"],"patternName":"aegis/cta-03"},"className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"0","left":"var:preset|spacing|40","right":"0"}}},"gradient":"diagonal-primary-to-foreground","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-section-dark has-diagonal-primary-to-foreground-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:0;padding-bottom:0;padding-left:var(--wp--preset--spacing--40)">
    <!-- wp:columns {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
    <div class="wp-block-columns" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-bottom:var(--wp--preset--spacing--30)">
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
                <!-- wp:buttons -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"background","textColor":"foreground","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}}} -->
                    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background has-link-color wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->

                    <!-- wp:button {"backgroundColor":"primary"} -->
                    <div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action →', 'Call-to-action button text', 'aegis' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"bottom","width":""} -->
        <div class="wp-block-column is-vertically-aligned-bottom">
            <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default"} -->
            <figure class="wp-block-image size-large is-style-default"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->