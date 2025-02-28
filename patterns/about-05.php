<?php
/**
 * Title: 05. About Pattern
 * Slug: aegis/about-05
 * Categories: about
 * Description: Block pattern featuring a tagline, heading, paragraph, and call-to-action button on the left, and a vertical image on the right.
 * Keywords: about, call-to-action, description, heading, image, tagline
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/column, core/columns, core/group, core/heading, core/image, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["<?php echo esc_html_x( 'about', 'Name of the category', 'aegis' ); ?>"],"patternName":"aegis/about-05","name":"<?php echo esc_html_x( '05. About Pattern', 'Name of the pattern', 'aegis' ); ?>"},"className":"alignwide has-vertical-background-to-foreground-gradient-background has-background"} -->
<div class="wp-block-group alignwide has-vertical-background-to-foreground-gradient-background has-background">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"0","bottom":"var:preset|spacing|40","left":"0"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":[]}},"gradient":"vertical-small-background-to-tertiary","layout":{"type":"default"}} -->
    <div class="wp-block-group has-vertical-small-background-to-tertiary-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:0;padding-bottom:var(--wp--preset--spacing--40);padding-left:0">
        <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0"},"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0"}}}} -->
        <div class="wp-block-columns" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0">
            <!-- wp:column {"width":"66.66%"} -->
            <div class="wp-block-column" style="flex-basis:66.66%">
                <!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-15px"}}},"fontSize":"tiny"} -->
                <p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Tagline', 'Enter a brief tagline (15-25 characters recommended)', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
                <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Heading', 'Enter a main heading (20-40 characters recommended)', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-ease-out","style":{"border":{"radius":{"topLeft":null,"bottomLeft":null,"bottomRight":null}}}} -->
                <figure class="wp-block-image size-full is-style-ease-out"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_html__( 'Featured image for the about section. Please replace with relevant image.', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover"/></figure>
                <!-- /wp:image -->

                <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
                <div class="wp-block-group">
                    <!-- wp:paragraph -->
                    <p><?php echo esc_html_x( 'Provide a concise description, up to 250 characters, summarizing your core principles, values, or key characteristics for easy understanding.', 'Paragraph content guidance with character limit', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap","orientation":"horizontal"}} -->
                    <div class="wp-block-buttons">
                        <!-- wp:button {"className":"is-style-outline-shadow"} -->
                        <div class="wp-block-button is-style-outline-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Learn More', 'Button text (10-20 characters recommended)', 'aegis' ); ?></a>
                        </div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
                <!-- wp:image {"aspectRatio":"3/4","scale":"cover","className":"size-full is-style-ease-out is-style-hide-mobile"} -->
                <figure class="wp-block-image size-full is-style-ease-out is-style-hide-mobile"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_html__( 'Vertical portrait or product image. Hidden on mobile devices.', 'aegis' ); ?>" style="aspect-ratio:3/4;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->