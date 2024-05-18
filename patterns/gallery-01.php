<?php
/**
 * Title: 01. Gallery Pattern
 * Slug: aegis/gallery-01
 * Categories: gallery, media
 * Description: Two-column video gallery with tagline, headings, and paragraphs on the left, and video content on the right.
 * Keywords: gallery, video, two-column, media display, video content
 * Viewport Width: 1200
 * Block Types: core/group, core/columns, core/column, core/paragraph, core/heading, core/video
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('01. Gallery Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0","margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
            <p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('[Tagline]', 'Replace with a descriptive section tagline', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"typography":{"fontSize":"6rem","textTransform":"uppercase"}}} -->
            <h2 class="wp-block-heading" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-size:6rem;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive section title.', 'aegis'); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}}} -->
            <p style="margin-top:0"><?php echo esc_html_x('[Description (333 characters): Provide a brief overview of specific video topics, including themes, or special highlights.]', 'Replace with a description of the section', 'aegis'); ?></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:columns -->
        <div class="wp-block-columns">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:video {"className":"is-style-aegis-shadow"} -->
                <figure class="wp-block-video is-style-aegis-shadow"><video controls poster="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/videos/sample.mp4" playsinline></video></figure>
                <!-- /wp:video -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading"><?php echo esc_html_x('[Video Title]', 'Replace with a descriptive video title.', 'aegis'); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php echo esc_html_x('[Description (65 characters): Provide a brief synopsis of the video.]', 'Replace with a descriptive video summary.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:video {"className":"is-style-aegis-shadow"} -->
                <figure class="wp-block-video is-style-aegis-shadow"><video controls poster="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/videos/sample.mp4" playsinline></video></figure>
                <!-- /wp:video -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading"><?php echo esc_html_x('[Video Title]', 'Replace with a descriptive video title.', 'aegis'); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php echo esc_html_x('[Description (65 characters): Provide a brief synopsis of the video.]', 'Replace with a descriptive video summary.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->

        <!-- wp:columns -->
        <div class="wp-block-columns">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:video {"className":"is-style-aegis-shadow"} -->
                <figure class="wp-block-video is-style-aegis-shadow"><video controls poster="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/videos/sample.mp4" playsinline></video></figure>
                <!-- /wp:video -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading"><?php echo esc_html_x('[Video Title]', 'Replace with a descriptive video title.', 'aegis'); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php echo esc_html_x('[Description (65 characters): Provide a brief synopsis of the video.]', 'Replace with a descriptive video summary.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:video {"className":"is-style-aegis-shadow"} -->
                <figure class="wp-block-video is-style-aegis-shadow"><video controls poster="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/videos/sample.mp4" playsinline></video></figure>
                <!-- /wp:video -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading"><?php echo esc_html_x('[Video Title]', 'Replace with a descriptive video title.', 'aegis'); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p><?php echo esc_html_x('[Description (65 characters): Provide a brief synopsis of the video.]', 'Replace with a descriptive video summary.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->