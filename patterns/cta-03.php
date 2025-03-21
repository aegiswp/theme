<?php
/**
 * Title: 03. CTA Pattern
 * Slug: aegis/cta-03
 * Categories: call-to-action
 * Description: Block pattern featuring a wide layout with a background image, tagline, bold headline, descriptive text, and call-to-action buttons. Designed for impactful messaging and accessibility.
 * Keywords: call-to-action, background image, headline, tagline, description, buttons
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/columns, core/group, core/heading, core/image, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["<?php echo esc_html_x('call-to-action', 'Name of the categories', 'aegis'); ?>"],"patternName":"aegis/cta-03","name":"<?php echo esc_html_x('03. CTA Pattern', 'Name of the pattern', 'aegis'); ?>"},"align":"wide"} -->
<div class="wp-block-group alignwide">
    <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_html__( 'Featured background image for the call to action section', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover" /></figure>
    <!-- /wp:image -->

    <!-- wp:columns -->
    <div class="wp-block-columns">
        <!-- wp:column {"verticalAlignment":"top"} -->
        <div class="wp-block-column is-vertically-aligned-top">
            <!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-15px"}}},"fontSize":"medium"} -->
            <p class="has-text-align-left has-medium-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Special Opportunity', 'CTA tagline (15-25 characters recommended)', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontSize":"6.5rem"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
            <h3 class="wp-block-heading" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;font-size:6.5rem;text-transform:uppercase"><?php echo esc_html_x( 'Don\'t Miss Out', 'CTA heading (15-30 characters recommended)', 'aegis' ); ?></h3>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"padding":{"bottom":"6rem"}}}} -->
        <div class="wp-block-column is-vertically-aligned-bottom" style="padding-bottom:6rem">
            <!-- wp:paragraph -->
            <p><?php echo esc_html_x( 'Join thousands of satisfied customers who have already taken advantage of this exclusive offer. Limited availability means this opportunity won\'t last long.', 'CTA description (100-150 characters recommended)', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-outline"} -->
                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Start Now', 'Primary CTA button text (10-15 characters recommended)', 'aegis' ); ?></a></div>
                <!-- /wp:button -->

                <!-- wp:button {"className":"is-style-outline","style":{"border":{"width":"0px","style":"none"}}} -->
                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#" style="border-style:none;border-width:0px"><?php echo esc_html_x( 'Learn More', 'Secondary CTA button text (10-15 characters recommended)', 'aegis' ); ?> <span class="wp-element-button__arrow" aria-hidden="true">&rarr;</span></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->