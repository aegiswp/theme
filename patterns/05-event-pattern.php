<?php
/**
 * Title: 05. Event Pattern
 * Slug: aegis/05-event-pattern
 * Categories: call-to-action, event, gallery, hero
 * Description: A hero pattern that excels in event promotion, featuring dual cover images on each side for visual depth, complemented by central event information.
 * Keywords: call to action, cover images, event, gallery, hero, social links
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/cover, core/paragraph, core/heading, core/buttons, core/button, core/social-links, core/image
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"dimensions":{"minHeight":"px"}},"layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('05. Event Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group" style="min-height:px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"right":"0","left":"0"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center" style="padding-right:0;padding-left:0">
        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"default"}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-right:0;padding-left:0;flex-basis:66.66%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","dimRatio":60,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-cover" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);min-height:100vh">
                <span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim"></span>
                <img class="wp-block-cover__image-background" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_attr__('Placeholder image for event promotion - replace with your event poster, artist\'s photograph or artwork.', 'aegis'); ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"left":"0","right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30);padding-left:0">
                        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                        <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_e('Upcoming Event', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":1,"style":{"spacing":{"margin":{"right":"0px","left":"0px","top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"typography":{"textTransform":"none","fontSize":"5.8rem"}}} -->
                        <h1 class="wp-block-heading" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:5.8rem;text-transform:none"><?php echo esc_html_x('Event Title', 'Event call to action title', 'aegis'); ?></h1>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}}} -->
                        <p style="margin-top:0"><?php echo esc_html_x('Description (up to 160 characters): Enter a brief summary of your event here.', 'Event call to action description', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
                    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
                        <!-- wp:button {"className":"is-style-outline"} -->
                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( 'Call to Action', 'Call to action button text', 'aegis' ); ?></a>
                        </div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->

                    <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"style":{"typography":{"textTransform":"none","fontStyle":"normal","fontWeight":"600"}},"fontSize":"tiny"} -->
                        <p class="has-tiny-font-size" style="font-style:normal;font-weight:600;text-transform:none"><?php echo esc_html_e('Support:', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:social-links {"iconColor":"background","iconColorValue":"#f9f9f9","size":"has-small-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left"}} -->
                        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
                            <!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->

                            <!-- wp:social-link {"url":"#","service":"meetup","label":"Meetup"} /-->

                            <!-- wp:social-link {"url":"#","service":"patreon","label":"Patreon"} /-->

                            <!-- wp:social-link {"url":"#","service":"google","label":"Google"} /-->
                        </ul>
                        <!-- /wp:social-links -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"33.33%","layout":{"type":"default"}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","dimRatio":60,"overlayColor":"foreground","minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-cover" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);min-height:100vh">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span>
                <img class="wp-block-cover__image-background" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Placeholder image for event promotion - replace with your event poster, artist\'s photograph or artwork.', 'aegis'); ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"center","flexWrap":"wrap"}} -->
                    <div class="wp-block-group">
                        <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_left.svg" alt="<?php echo esc_attr__('Decorative element.', 'aegis'); ?>" style="width:40px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:group {"style":{"spacing":{"padding":{"right":"5px","left":"5px"}}}} -->
                        <div class="wp-block-group" style="padding-right:5px;padding-left:5px">
                            <!-- wp:heading {"textAlign":"left","style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"uppercase","lineHeight":"1","letterSpacing":"3px"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"small"} -->
                            <h2 class="wp-block-heading has-text-align-left has-small-font-size" style="margin-bottom:0;font-style:normal;font-weight:500;letter-spacing:3px;line-height:1;text-transform:uppercase"><?php echo esc_html_x('Event Title', 'Event call to action title', 'aegis'); ?></h2>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}},"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
                            <p class="has-text-align-center has-small-font-size" style="margin-top:0;text-transform:uppercase"><?php echo esc_html_x('Date of Event', 'Event call to action date', 'aegis'); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_right.svg" alt="<?php echo esc_attr__('Decorative element.', 'aegis'); ?>" style="width:40px" /></figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-top:0;padding-bottom:0">
                        <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
                        <p class="has-text-align-center has-medium-font-size"><?php echo esc_html_e('Artwork Title', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                        <p class="has-text-align-center has-small-font-size"><?php echo esc_html_e('Artist Name', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->