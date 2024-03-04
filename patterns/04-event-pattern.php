<?php
/**
 * Title: 04. Event Pattern
 * Slug: aegis/04-event-pattern
 * Categories: call-to-action, event, gallery, hero
 * Description: This pattern offers a triple-column layout for event promotion, featuring eye-catching images, event details, and CTAs in a clean, organized format.
 * Keywords: call to action, event, gallery, hero, media
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/column, core/columns, core/cover, core/group, core/heading, core/paragraph
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"100vh"}},"layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('04. Event Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group" style="min-height:100vh;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"width":"33.33%"} -->
        <div class="wp-block-column" style="flex-basis:33.33%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","dimRatio":60,"overlayColor":"foreground","focalPoint":{"x":0.26,"y":0.37},"minHeight":100,"minHeightUnit":"vh","contentPosition":"bottom center","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="min-height:100vh">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span>
                <img class="wp-block-cover__image-background" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Placeholder image for event promotion - replace with your event poster, artist\'s photograph or artwork.', 'aegis'); ?>" style="object-position:26% 37%" data-object-fit="cover" data-object-position="26% 37%" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30)">
                        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                        <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_e('Upcoming Event', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"right":"0px","left":"0px","top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0"}},"typography":{"textTransform":"none"}},"fontSize":"gigantic"} -->
                        <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;padding-top:0;padding-bottom:0;text-transform:none"><?php echo esc_html_x('Event Title', 'Event call to action title', 'aegis'); ?></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}}} -->
                        <p style="margin-top:0"><?php echo esc_html_x('Description (up to 120 characters): Enter a brief summary of your events here.', 'Events call to action description', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
                    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)">
                        <!-- wp:button {"className":"is-style-outline"} -->
                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( 'Call to Action', 'Call to action button text', 'aegis' ); ?></a>
                        </div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"33.33%"} -->
        <div class="wp-block-column" style="flex-basis:33.33%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","dimRatio":60,"overlayColor":"foreground","focalPoint":{"x":0.26,"y":0.37},"minHeight":100,"minHeightUnit":"vh","contentPosition":"bottom center","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="min-height:100vh">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span>
                <img class="wp-block-cover__image-background" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Placeholder image for event promotion - replace with your event poster, artist\'s photograph or artwork.', 'aegis'); ?>" style="object-position:26% 37%" data-object-fit="cover" data-object-position="26% 37%" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30)">
                        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                        <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_e('Upcoming Event', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"right":"0px","left":"0px","top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0"}},"typography":{"textTransform":"none"}},"fontSize":"gigantic"} -->
                        <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;padding-top:0;padding-bottom:0;text-transform:none"><?php echo esc_html_x('Event Title', 'Event call to action title', 'aegis'); ?></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}}} -->
                        <p style="margin-top:0"><?php echo esc_html_x('Description (up to 120 characters): Enter a brief summary of your events here.', 'Events call to action description', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
                    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)">
                        <!-- wp:button {"className":"is-style-outline"} -->
                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( 'Call to Action', 'Call to action button text', 'aegis' ); ?></a></div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"33.33%"} -->
        <div class="wp-block-column" style="flex-basis:33.33%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","dimRatio":60,"overlayColor":"foreground","focalPoint":{"x":0.26,"y":0.37},"minHeight":100,"minHeightUnit":"vh","contentPosition":"bottom center","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="min-height:100vh">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span>
                <img class="wp-block-cover__image-background" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Placeholder image for event promotion - replace with your event poster, artist\'s photograph or artwork.', 'aegis'); ?>" style="object-position:26% 37%" data-object-fit="cover" data-object-position="26% 37%" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30)">

                        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                        <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_e('Upcoming Event', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"right":"0px","left":"0px","top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0"}},"typography":{"textTransform":"none"}},"fontSize":"gigantic"} -->
                        <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;padding-top:0;padding-bottom:0;text-transform:none"><?php echo esc_html_x('Event Title', 'Event call to action title', 'aegis'); ?></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}}} -->
                        <p style="margin-top:0"><?php echo esc_html_x('Description (up to 120 characters): Enter a brief summary of your events here.', 'Events call to action description', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
                    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)">
                        <!-- wp:button {"className":"is-style-outline"} -->
                        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( 'Call to Action', 'Call to action button text', 'aegis' ); ?></a>
                        </div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->