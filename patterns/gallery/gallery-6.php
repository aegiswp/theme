<?php
/**
 * 06. Gallery Block Pattern
 */
return array(
    'title'      => __('06. Gallery', 'aegis'),
    'description' => __('Grid Gallery with Heading, Paragraph, and buttons', 'aegis'),
    'categories' => array('aegis-gallery'),
    'content' => '<!-- wp:group {"metadata":{"name":"06. Gallery Pattern"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"gradient":"diagonal-secondary-to-background","layout":{"type":"default"}} -->
    <div class="wp-block-group alignfull has-diagonal-secondary-to-background-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":"40px","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
            <!-- wp:heading {"className":"is-style-default","fontSize":"huge"} -->
            <h2 class="wp-block-heading is-style-default has-huge-font-size"><mark style="background-color:#1c1c1e" class="has-inline-color has-background-color">' . esc_html__('[Heading]', 'aegis') . '</mark></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>' . esc_html__( '[Paragraph (133 characters): Provide details about upcoming events, including themes, or special highlights.]', 'aegis') . '</p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button -->
                <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">' . esc_html__('[Call to Action]', 'aegis') . '</a></div>
                <!-- /wp:button -->

                <!-- wp:button -->
                <div class="wp-block-button"><a class="wp-block-button__link wp-element-button">' . esc_html__('[Call to Action]', 'aegis') . '</a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
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