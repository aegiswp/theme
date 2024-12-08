<?php
/**
 * Title: 01. CTA Pattern
 * Slug: aegis/cta-01
 * Categories: call-to-action
 * Description: Block pattern featuring a background image with a tagline, heading, description, and call-to-action buttons.
 * Keywords: call-to-action, buttons, image, tagline, heading, description
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/group, core/heading, core/image, core/paragraph, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["call-to-action"],"patternName":"aegis/cta-01","name":"<?php echo esc_html_x('01. CTA Pattern', 'Name of the pattern', 'aegis'); ?>"},"align":"wide"} -->
<div class="wp-block-group alignwide">
    <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover" /></figure>
    <!-- /wp:image -->

    <!-- wp:columns -->
    <div class="wp-block-columns">
        <!-- wp:column {"verticalAlignment":"top"} -->
        <div class="wp-block-column is-vertically-aligned-top">
            <!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-15px"}}},"fontSize":"medium"} -->
            <p class="has-text-align-left has-medium-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontSize":"6.5rem"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
            <h3 class="wp-block-heading" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;font-size:6.5rem;text-transform:uppercase"><?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?></h3>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"padding":{"bottom":"6rem"}}}} -->
        <div class="wp-block-column is-vertically-aligned-bottom" style="padding-bottom:6rem">
            <!-- wp:paragraph -->
            <p><?php echo esc_html_x( 'Provide a concise description, up to 155 characters, summarizing the key points of an offer, article, or news update.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-outline"} -->
                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a></div>
                <!-- /wp:button -->

                <!-- wp:button {"className":"is-style-outline","style":{"border":{"width":"0px","style":"none"}}} -->
                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#" style="border-style:none;border-width:0px"><?php echo esc_html_x( 'Call to Action →', 'Call-to-action button text', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->