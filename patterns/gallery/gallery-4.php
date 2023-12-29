<?php
/**
 * 04. Video Gallery Block Pattern
 */
return array(
    'title'      => __('04. Video Gallery', 'aegis'),
    'description' => __('Mixed Video and Image Gallery with Heading, and Text', 'aegis'),
    'categories' => array('aegis-gallery'),
    'content' => '
<!-- wp:group {"tagName":"section","align":"wide","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"gradient":"vertical-secondary-to-background","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('Gallery Section', 'aegis') . '"}} -->
<section class="wp-block-group alignwide has-vertical-secondary-to-background-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30)">
        <!-- wp:column {"width":"50%","className":"hide-on-mobile"} -->
        <div class="wp-block-column hide-on-mobile" style="flex-basis:50%">
            <!-- wp:columns -->
            <div class="wp-block-columns">
                <!-- wp:column {"verticalAlignment":"center","className":"is-style-default"} -->
                <div class="wp-block-column is-vertically-aligned-center is-style-default">
                    <!-- wp:video -->
                    <figure class="wp-block-video"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark.webp" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/aegis.mp4" playsinline></video></figure>
                    <!-- /wp:video -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"has-tagline","fontSize":"tiny"} -->
            <p class="has-text-align-left has-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('Gallery', 'aegis') . '</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"5px","bottom":"10px"}}},"className":"is-style-default","fontSize":"gigantic"} -->
            <h4 class="wp-block-heading is-style-default has-gigantic-font-size" style="margin-top:5px;margin-bottom:10px;font-style:normal;font-weight:600">' . esc_html__('[Video Title]', 'aegis') . '</h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"medium"} -->
            <p class="has-medium-font-size">Video Description (333 characters): [Provide a brief synopsis of the video.]</p>
            <!-- /wp:paragraph -->
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
                    <figure class="wp-block-video"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark.webp" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/aegis.mp4" playsinline></video></figure>
                    <!-- /wp:video -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-medium-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:300"><strong>' . esc_html__('[Video Title]', 'aegis') . '</strong></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"tiny"} -->
                        <p class="has-tiny-font-size">' . esc_html__('Video Description (60 characters): [Provide a brief synopsis of the video.]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","backgroundColor":"foreground","textColor":"background","className":"is-style-default"} -->
                <div class="wp-block-column is-vertically-aligned-center is-style-default has-background-color has-foreground-background-color has-text-color has-background">
                    <!-- wp:video -->
                    <figure class="wp-block-video"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark.webp" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/aegis.mp4" playsinline></video></figure>
                    <!-- /wp:video -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-medium-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:300"><strong>' . esc_html__('[Video Title]', 'aegis') . '</strong></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"tiny"} -->
                        <p class="has-tiny-font-size">' . esc_html__('Video Description (60 characters): [Provide a brief synopsis of the video.]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","backgroundColor":"senary","className":"is-style-default"} -->
                <div class="wp-block-column is-vertically-aligned-center is-style-default has-senary-background-color has-background">
                    <!-- wp:video -->
                    <figure class="wp-block-video"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark.webp" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/aegis.mp4" playsinline></video></figure>
                    <!-- /wp:video -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-medium-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:300"><strong>' . esc_html__('[Video Title]', 'aegis') . '</strong></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"tiny"} -->
                        <p class="has-tiny-font-size">' . esc_html__('Video Description (60 characters): [Provide a brief synopsis of the video.]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","backgroundColor":"senary","className":"is-style-default"} -->
                <div
                    class="wp-block-column is-vertically-aligned-center is-style-default has-senary-background-color has-background">
                    <!-- wp:video -->
                    <figure class="wp-block-video"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark-1.webp" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/aegis.mp4" playsinline></video></figure>
                    <!-- /wp:video -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-medium-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:300"><strong>' . esc_html__('[Video Title]', 'aegis') . '</strong></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"tiny"} -->
                        <p class="has-tiny-font-size">' . esc_html__('Video Description (60 characters): [Provide a brief synopsis of the video.]', 'aegis') . '</p>
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
</section>
<!-- /wp:group -->',
);