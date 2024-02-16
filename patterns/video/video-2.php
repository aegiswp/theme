<?php
/**
 * 02. Video Block Pattern
 */
return array(
    'title'      => __('02. Video', 'aegis'),
    'description' => __('Large video with tagline, heading, paragraph, and credits', 'aegis'),
    'categories' => array('aegis-video'),
    'content' => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"gradient":"diagonal-background-to-secondary","layout":{"type":"constrained"},"metadata":{"name":"' . esc_html__('02. Video Pattern', 'aegis') . '"}} -->
    <div class="wp-block-group has-diagonal-background-to-secondary-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0","margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
            <p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('Video', 'aegis') . '</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"gigantic"} -->
            <h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px">' . esc_html__('Title', 'aegis') . '</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}}} -->
            <p style="margin-top:0">' . esc_html__('Video Description (333 characters): [Provide a brief synopsis of the video.]', 'aegis') . '</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"default"}} -->
        <div class="wp-block-group alignfull" style="padding-right:0;padding-left:0">
            <!-- wp:video {"align":"full"} -->
            <figure class="wp-block-video alignfull"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/sample.mp4" playsinline></video></figure>
            <!-- /wp:video -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
        <div class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
            <!-- wp:columns {"isStackedOnMobile":false,"align":"wide"} -->
            <div class="wp-block-columns alignwide is-not-stacked-on-mobile">
                <!-- wp:column {"width":"50%","className":"is-hidden-on-mobile"} -->
                <div class="wp-block-column is-hidden-on-mobile" style="flex-basis:50%">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"wrap","orientation":"vertical","justifyContent":"left"}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                        <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"5px","bottom":"5px"}}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="margin-top:5px;margin-bottom:5px;font-style:normal;font-weight:600">' . esc_html__('Credits:', 'aegis') . '</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","orientation":"vertical","justifyContent":"right"}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="margin-top:0;margin-bottom:0">' . esc_html__('Position', 'aegis') . '</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="margin-top:0;margin-bottom:0">' . esc_html__('Position', 'aegis') . '</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="margin-top:0;margin-bottom:0">' . esc_html__('Position', 'aegis') . '</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","orientation":"vertical","justifyContent":"right"}} -->
                    <div class="wp-block-group"
                        style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="margin-top:0;margin-bottom:0">' . esc_html__('Position', 'aegis') . '</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="margin-top:0;margin-bottom:0">' . esc_html__('Position', 'aegis') . '</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"small"} -->
                        <p class="has-small-font-size" style="margin-top:0;margin-bottom:0">' . esc_html__('Position', 'aegis') . '</p>
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
</div>
<!-- /wp:group -->',
);