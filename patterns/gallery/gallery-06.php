<?php
/**
 * 06. Gallery Block Pattern
 */
return array(
    'title'      => __('06. Gallery', 'aegis'),
    'description' => __('Grid Gallery with Tagline, Heading, and Paragraph', 'aegis'),
    'categories' => array('aegis-gallery'),
    'content' => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"gradient":"diagonal-secondary-to-background","layout":{"type":"constrained"},"metadata":{"name":"' . esc_html__('06. Gallery Pattern', 'aegis') . '"}} -->
    <div class="wp-block-group has-diagonal-secondary-to-background-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":"40px","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0","margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
                <p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('Gallery', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"style":{"typography":{"fontSize":"6rem","textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                <h2 class="wp-block-heading" style="margin-top:0;margin-bottom:0;font-size:6rem;text-transform:uppercase">' . esc_html__('Photos', 'aegis') . '</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}}} -->
                <p style="margin-top:0">' . esc_html__('Description (333 characters): Provide details about the photographs, including themes, or special highlights.', 'aegis') . '</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"gradient":"diagonal-background-to-secondary"} -->
        <div class="wp-block-column is-vertically-aligned-center has-diagonal-background-to-secondary-gradient-background has-background"
            style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
            <!-- wp:columns -->
            <div class="wp-block-columns">
                <!-- wp:column {"width":""} -->
                <div class="wp-block-column">
                    <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
                    <figure class="wp-block-image size-full is-style-default"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
                    <figure class="wp-block-image size-full is-style-default"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->',
);
