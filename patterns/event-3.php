<?php
/**
 * Title: 03. Event Pattern
 * Slug: aegis/event-3
 * Categories: call-to-action, events, gallery, hero
 * Description: Multicolumn block pattern with tagline, heading, paragraph on the left and vertical gallery showcase on the right
 * Keywords: events
 * Viewport Width: 1400
 * Block Types: core/column, core/columns, core/cover, core/group, core/heading, core/paragraph
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"backgroundColor":"foreground","textColor":"background","layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('03. Event Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"verticalAlignment":"top","width":"","layout":{"type":"default"}} -->
        <div class="wp-block-column is-vertically-aligned-top">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="padding-top:0;padding-bottom:0">

                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('[Tagline]', 'Replace with a descriptive tagline', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"style":{"spacing":{"margin":{"right":"0px","left":"0px","top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0"}},"typography":{"textTransform":"uppercase","fontSize":"5.8rem"}}} -->
                <h2 class="wp-block-heading" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;padding-top:0;padding-bottom:0;font-size:5.8rem;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}}} -->
                <p style="margin-top:0"><?php echo esc_html_x('[Description (350 characters): Enter a brief overview of a specific event, or events.]', 'Replace with a description of the section', 'aegis'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"top","width":"2%","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"className":"is-hidden-on-mobile"} -->
        <div class="wp-block-column is-vertically-aligned-top is-hidden-on-mobile" style="padding-top:0;padding-bottom:0;flex-basis:2%">
            <!-- wp:paragraph {"align":"right","style":{"typography":{"fontSize":"4rem","lineHeight":"1","writingMode":"vertical-rl","textTransform":"uppercase","fontStyle":"normal","fontWeight":"600","letterSpacing":"3px"}}} -->
            <p class="has-text-align-right" style="font-size:4rem;font-style:normal;font-weight:600;letter-spacing:3px;line-height:1;text-transform:uppercase;writing-mode:vertical-rl"><?php echo esc_html_x('[Section]', 'Replace with a descriptive title', 'aegis'); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"25%"} -->
        <div class="wp-block-column" style="flex-basis:25%">

            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","dimRatio":60,"overlayColor":"foreground","minHeight":75,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"border":{"width":"1px"}},"borderColor":"background","layout":{"type":"default"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center has-border-color has-background-border-color" style="border-width:1px;min-height:75vh">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span>
                <img class="wp-block-cover__image-background" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Placeholder image: Brief description of the image and its context, non-text content for screen readers.', 'aegis'); ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-top:0;padding-bottom:0">

                        <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
                        <p class="has-text-align-center has-medium-font-size"><?php echo esc_html_x('[Artwork]', 'Replace with artwork title', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                        <p class="has-text-align-center has-small-font-size"><?php echo esc_html_x('[Artist]', 'Replace with the artist name', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->

                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"20%","className":"is-hidden-on-mobile"} -->
        <div class="wp-block-column is-hidden-on-mobile" style="flex-basis:20%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","dimRatio":60,"overlayColor":"foreground","minHeight":50,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"border":{"width":"1px"}},"borderColor":"background","className":"is-style-aegis-shadow","layout":{"type":"default"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center is-style-aegis-shadow has-border-color has-background-border-color" style="border-width:1px;min-height:50vh">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span>
                <img class="wp-block-cover__image-background" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Placeholder image: Brief description of the image and its context, non-text content for screen readers.', 'aegis'); ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-top:0;padding-bottom:0">

                        <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
                        <p class="has-text-align-center has-medium-font-size"><?php echo esc_html_x('[Artwork]', 'Replace with artwork title', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                        <p class="has-text-align-center has-small-font-size"><?php echo esc_html_x('[Artist]', 'Replace with the artist name', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","dimRatio":60,"overlayColor":"foreground","minHeight":30,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"border":{"width":"1px"}},"borderColor":"background","layout":{"type":"default"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center has-border-color has-background-border-color" style="border-width:1px;min-height:30vh">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span>
                <img class="wp-block-cover__image-background" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Placeholder image: Brief description of the image and its context, non-text content for screen readers.', 'aegis'); ?>" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-top:0;padding-bottom:0">

                        <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
                        <p class="has-text-align-center has-medium-font-size"><?php echo esc_html_x('[Artwork]', 'Replace with artwork title', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                        <p class="has-text-align-center has-small-font-size"><?php echo esc_html_x('[Artist]', 'Replace with the artist name', 'aegis'); ?></p>
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