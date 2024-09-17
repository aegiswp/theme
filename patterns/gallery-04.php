<?php
/**
 * Title: 04. Gallery Pattern
 * Slug: aegis/gallery-04
 * Categories: gallery, media
 * Description: Video gallery featuring a prominent highlighted video alongside four smaller videos arranged in a four-column layout.
 * Keywords: gallery, video, multi-column, featured video, media display
 * Viewport Width: 1200
 * Block Types: core/group, core/columns, core/column, core/video, core/paragraph, core/heading
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('04. Gallery Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30)">
        <!-- wp:column {"width":"50%","className":"is-style-hide-mobile"} -->
        <div class="wp-block-column is-style-hide-mobile" style="flex-basis:50%">
            <!-- wp:columns -->
            <div class="wp-block-columns">
                <!-- wp:column {"verticalAlignment":"center","className":"is-style-default"} -->
                <div class="wp-block-column is-vertically-aligned-center is-style-default">
                    <!-- wp:video -->
                    <figure class="wp-block-video"><video controls poster="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/videos/sample.mp4" playsinline></video></figure>
                    <!-- /wp:video -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0","margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
                <p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('[Tagline]', 'Replace with a descriptive section tagline', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"gigantic"} -->
                <h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-bottom:0;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive section title.', 'aegis'); ?></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}}} -->
                <p style="margin-top:0"><?php echo esc_html_x('[Description (333 characters): Provide a brief overview of specific video topics, including themes, or special highlights.]', 'Replace with a description of the section', 'aegis'); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"verticalAlignment":"top","align":"wide"} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-top">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:columns -->
            <div class="wp-block-columns">
                <!-- wp:column {"verticalAlignment":"center","backgroundColor":"foreground","textColor":"background","className":"is-style-default"} -->
                <div class="wp-block-column is-vertically-aligned-center is-style-default has-background-color has-foreground-background-color has-text-color has-background">
                    <!-- wp:video -->
                    <figure class="wp-block-video"><video controls poster="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/videos/sample.mp4" playsinline></video></figure>
                    <!-- /wp:video -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap"}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                        <!-- wp:heading {"level":3,"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-medium-font-size"><?php echo esc_html_x('[Video Title]', 'Replace with a descriptive video title.', 'aegis'); ?></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"small"} -->
                        <p class="has-small-font-size"><?php echo esc_html_x('[Description (65 characters): Provide a brief synopsis of the video.]', 'Replace with a descriptive video summary.', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","backgroundColor":"foreground","textColor":"background","className":"is-style-default"} -->
                <div class="wp-block-column is-vertically-aligned-center is-style-default has-background-color has-foreground-background-color has-text-color has-background">
                    <!-- wp:video -->
                    <figure class="wp-block-video"><video controls poster="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/videos/sample.mp4" playsinline></video></figure>
                    <!-- /wp:video -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap"}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                        <!-- wp:heading {"level":3,"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-medium-font-size"><?php echo esc_html_x('[Video Title]', 'Replace with a descriptive video title.', 'aegis'); ?></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"small"} -->
                        <p class="has-small-font-size"><?php echo esc_html_x('[Description (65 characters): Provide a brief synopsis of the video.]', 'Replace with a descriptive video summary.', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","backgroundColor":"quinary","className":"is-style-default"} -->
                <div
                    class="wp-block-column is-vertically-aligned-center is-style-default has-quinary-background-color has-background">
                    <!-- wp:video -->
                    <figure class="wp-block-video"><video controls poster="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/videos/sample.mp4" playsinline></video></figure>
                    <!-- /wp:video -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap"}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                        <!-- wp:heading {"level":3,"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-medium-font-size"><?php echo esc_html_x('[Video Title]', 'Replace with a descriptive video title.', 'aegis'); ?></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"small"} -->
                        <p class="has-small-font-size"><?php echo esc_html_x('[Description (65 characters): Provide a brief synopsis of the video.]', 'Replace with a descriptive video summary.', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","backgroundColor":"quinary","className":"is-style-default"} -->
                <div class="wp-block-column is-vertically-aligned-center is-style-default has-quinary-background-color has-background">
                    <!-- wp:video -->
                    <figure class="wp-block-video"><video controls poster="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/videos/sample.mp4" playsinline></video></figure>
                    <!-- /wp:video -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"wrap"}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                        <!-- wp:heading {"level":3,"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-medium-font-size"><?php echo esc_html_x('[Video Title]', 'Replace with a descriptive video title.', 'aegis'); ?></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"small"} -->
                        <p class="has-small-font-size"><?php echo esc_html_x('[Description (65 characters): Provide a brief synopsis of the video.]', 'Replace with a descriptive video summary.', 'aegis'); ?></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->