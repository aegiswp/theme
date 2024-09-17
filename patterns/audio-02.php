<?php
/**
 * Title: 02. Audio Pattern
 * Slug: aegis/audio-02
 * Categories: audio
 * Description: Block pattern with two-column cover overlay on the left and tagline, headline, paragraph, audio player, social icons and call to action button on the right
 * Keywords: audio, call-to-action, music, podcast, radio
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/cover, core/paragraph, core/heading, core/audio, core/buttons
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('02. Audio Pattern', 'Name of the pattern', 'aegis'); ?>"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"gradient":"diagonal-tertiary-to-background-right-bottom","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-diagonal-tertiary-to-background-right-bottom-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0","margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap","verticalAlignment":"top"}} -->
    <div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
        <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('[Tagline]', 'Replace with a descriptive section tagline.', 'aegis'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"typography":{"fontSize":"6rem","textTransform":"uppercase"}}} -->
        <h2 class="wp-block-heading" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-size:6rem;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive section title.', 'aegis'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}}} -->
        <p class="has-text-align-center" style="margin-top:0"><?php echo esc_html_x('[Description (333 characters): Provide a brief overview of featured podcasts, radio show, interviews, or discussions.]', 'Replace with a description of the section.', 'aegis'); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background"} -->
        <div class="wp-block-column has-background-color has-foreground-background-color has-text-color has-background has-link-color">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_light.webp","dimRatio":70,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":370,"minHeightUnit":"px","contentPosition":"center center","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}}} -->
            <div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);min-height:370px">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
                    <img class="wp-block-cover__image-background" alt="<?php echo esc_attr_e('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_light.webp" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:paragraph -->
                    <p></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"0","left":"var:preset|spacing|30"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"10px","right":"0px","bottom":"10px","left":"0px"}}},"fontSize":"tiny"} -->
                <p class="has-tiny-font-size" style="padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php echo esc_html_x('[Date', 'Replace by date of publishing.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"10px","right":"0px","bottom":"10px","left":"0px"}}},"fontSize":"tiny"} -->
                <p class="has-tiny-font-size" style="padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php echo esc_html_x('[Time]', 'Replace by total playing time.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:15px;padding-right:0;padding-bottom:0">
                <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30","right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                    <!-- wp:heading {"fontSize":"large"} -->
                    <h2 class="wp-block-heading has-large-font-size"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive section title.', 'aegis'); ?></h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php echo esc_html_x('[Description (60 characters): Provide a brief overview of a specific podcast topic, radio show, interview, or discussion.]', 'Replace with a description of the section.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap","orientation":"horizontal"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:buttons -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"foreground","style":{"spacing":{"padding":{"left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"fontSize":"tiny"} -->
                    <div class="wp-block-button has-custom-font-size has-tiny-font-size">
                        <a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text.', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background"} -->
        <div class="wp-block-column has-background-color has-foreground-background-color has-text-color has-background has-link-color">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_light.webp","dimRatio":70,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":370,"minHeightUnit":"px","contentPosition":"center center","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}}} -->
            <div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);min-height:370px">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
                <img class="wp-block-cover__image-background" alt="<?php echo esc_attr_e('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_light.webp" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:paragraph -->
                    <p></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"0","left":"var:preset|spacing|30"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"10px","right":"0px","bottom":"10px","left":"0px"}}},"fontSize":"tiny"} -->
                <p class="has-tiny-font-size" style="padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php echo esc_html_x('[Date', 'Replace by date of publishing.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"10px","right":"0px","bottom":"10px","left":"0px"}}},"fontSize":"tiny"} -->
                <p class="has-tiny-font-size" style="padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php echo esc_html_x('[Time]', 'Replace by total playing time.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:15px;padding-right:0;padding-bottom:0">
                <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30","right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                    <!-- wp:heading {"fontSize":"large"} -->
                    <h2 class="wp-block-heading has-large-font-size"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive section title.', 'aegis'); ?></h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php echo esc_html_x('[Description (60 characters): Provide a brief overview of a specific podcast topic, radio show, interview, or discussion.]', 'Replace with a description of the section.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap","orientation":"horizontal"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:buttons -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"foreground","style":{"spacing":{"padding":{"left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"fontSize":"tiny"} -->
                    <div class="wp-block-button has-custom-font-size has-tiny-font-size">
                        <a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text.', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background"} -->
        <div class="wp-block-column has-background-color has-foreground-background-color has-text-color has-background has-link-color">
            <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_light.webp","dimRatio":70,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":370,"minHeightUnit":"px","contentPosition":"center center","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}}} -->
            <div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);min-height:370px">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
                <img class="wp-block-cover__image-background" alt="<?php echo esc_attr_e('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_light.webp" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:paragraph -->
                    <p></p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"0","left":"var:preset|spacing|30"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"10px","right":"0px","bottom":"10px","left":"0px"}}},"fontSize":"tiny"} -->
                <p class="has-tiny-font-size" style="padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php echo esc_html_x('[Time]', 'Replace by total playing time.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"10px","right":"0px","bottom":"10px","left":"0px"}}},"fontSize":"tiny"} -->
                <p class="has-tiny-font-size" style="padding-top:10px;padding-right:0px;padding-bottom:10px;padding-left:0px"><?php echo esc_html_x('[Time]', 'Replace by total playing time.', 'aegis'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:15px;padding-right:0;padding-bottom:0">
                <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30","right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                    <!-- wp:heading {"fontSize":"large"} -->
                    <h2 class="wp-block-heading has-large-font-size"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive section title.', 'aegis'); ?></h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php echo esc_html_x('[Description (60 characters): Provide a brief overview of a specific podcast topic, radio show, interview, or discussion.]', 'Replace with a description of the section.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap","orientation":"horizontal"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:buttons -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"foreground","style":{"spacing":{"padding":{"left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"fontSize":"tiny"} -->
                    <div class="wp-block-button has-custom-font-size has-tiny-font-size">
                        <a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text.', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->