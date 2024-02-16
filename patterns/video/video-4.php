<?php
/**
 * 04. Video Block Pattern
 */
return array(
    'title'      => __('04. Video', 'aegis'),
    'description' => __('Large video with Heading, and Paragraph', 'aegis'),
    'categories' => array('aegis-video'),
    'content' => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"foreground","textColor":"background","layout":{"type":"constrained"},"metadata":{"name":"' . esc_html__('04. Video Pattern', 'aegis') . '"}} -->
<div class="wp-block-group alignwide has-background-color has-foreground-background-color has-text-color has-background"
    style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"width":""} -->
        <div class="wp-block-column">
            <!-- wp:video -->
            <figure class="wp-block-video"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/sample.mp4" playsinline></video></figure>
            <!-- /wp:video -->

            <!-- wp:columns -->
            <div class="wp-block-columns">
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"large"} -->
                    <h3 class="wp-block-heading has-large-font-size" style="margin-top:0;font-style:normal;font-weight:300"><strong>' . esc_html__('Video Title', 'aegis') . '</strong></h3>
                    <!-- /wp:heading -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
                <div class="wp-block-column" style="padding-right:0;padding-left:0">
                    <!-- wp:paragraph {"align":"right","style":{"typography":{"lineHeight":"1.5"}},"fontSize":"small"} -->
                    <p class="has-text-align-right has-small-font-size" style="line-height:1.5">' . esc_html__('Video Description (333 characters): Provide a brief synopsis of the video.', 'aegis') . '</p>
                    <!-- /wp:paragraph -->
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