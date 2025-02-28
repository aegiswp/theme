<?php
/**
 * Title: 04. Event Pattern
 * Slug: aegis/event-04
 * Categories: events
 * Description: Block pattern featuring three-column event sections with full-height cover images, tagline, heading, brief description, and call-to-action buttons.
 * Keywords: call-to-action, event, images, layout, promotions, social
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/cover, core/heading, core/paragraph, core/buttons, core/button, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('04. Event Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('events', 'Name of the category', 'aegis'); ?>"],"patternName":"aegis/event-04"},"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"100vh"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="min-height:100vh;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"width":"33.33%"} -->
        <div class="wp-block-column" style="flex-basis:33.33%">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","alt":"<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>","dimRatio":60,"overlayColor":"foreground","isUserOverlayColor":true,"focalPoint":{"x":0.26,"y":0.37},"minHeight":100,"minHeightUnit":"vh","contentPosition":"bottom center","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="min-height:100vh">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span>
                <img class="wp-block-cover__image-background" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" style="object-position:26% 37%" data-object-fit="cover" data-object-position="26% 37%" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30)">
                        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                        <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
                            <?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?>
                        </p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"right":"0px","left":"0px","top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0"}},"typography":{"textTransform":"none"}},"fontSize":"gigantic"} -->
                        <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;padding-top:0;padding-bottom:0;text-transform:none">
                            <?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?>
                        </h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}}} -->
                        <p style="margin-top:0">
                            <?php echo esc_html_x('Provide a concise description, up to 160 characters, summarizing the key of a specific event, or events.', 'Replace with a description of the section.', 'aegis'); ?>
                        </p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
                    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)">
                        <!-- wp:button {"className":"is-style-outline-shadow"} -->
                        <div class="wp-block-button is-style-outline-shadow"><a class="wp-block-button__link wp-element-button">
                            <?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a>
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
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","alt":"<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>","dimRatio":60,"overlayColor":"foreground","isUserOverlayColor":true,"focalPoint":{"x":0.26,"y":0.37},"minHeight":100,"minHeightUnit":"vh","contentPosition":"bottom center","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="min-height:100vh">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span>
                <img class="wp-block-cover__image-background" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" style="object-position:26% 37%" data-object-fit="cover" data-object-position="26% 37%" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30)">
                        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                        <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
                            <?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?>
                        </p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"right":"0px","left":"0px","top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0"}},"typography":{"textTransform":"none"}},"fontSize":"gigantic"} -->
                        <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;padding-top:0;padding-bottom:0;text-transform:none">
                            <?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?>
                        </h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}}} -->
                        <p style="margin-top:0">
                            <?php echo esc_html_x('Provide a concise description, up to 160 characters, summarizing the key of a specific event, or events.', 'Replace with a description of the section.', 'aegis'); ?>
                        </p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
                    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)">
                        <!-- wp:button {"className":"is-style-outline-shadow"} -->
                        <div class="wp-block-button is-style-outline-shadow"><a class="wp-block-button__link wp-element-button">
                            <?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a>
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
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp","alt":"<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>","dimRatio":60,"overlayColor":"foreground","isUserOverlayColor":true,"focalPoint":{"x":0.26,"y":0.37},"minHeight":100,"minHeightUnit":"vh","contentPosition":"bottom center","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="min-height:100vh">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span>
                <img class="wp-block-cover__image-background" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" style="object-position:26% 37%" data-object-fit="cover" data-object-position="26% 37%" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30)">
                        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                        <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
                            <?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?>
                        </p>
                        <!-- /wp:paragraph -->

                        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"right":"0px","left":"0px","top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0"}},"typography":{"textTransform":"none"}},"fontSize":"gigantic"} -->
                        <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;padding-top:0;padding-bottom:0;text-transform:none">
                            <?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?>
                        </h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}}} -->
                        <p style="margin-top:0">
                            <?php echo esc_html_x('Provide a concise description, up to 160 characters, summarizing the key of a specific event, or events.', 'Replace with a description of the section.', 'aegis'); ?>
                        </p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
                    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)">
                        <!-- wp:button {"className":"is-style-outline-shadow"} -->
                        <div class="wp-block-button is-style-outline-shadow">
                            <a class="wp-block-button__link wp-element-button">
                                <?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?>
                            </a>
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