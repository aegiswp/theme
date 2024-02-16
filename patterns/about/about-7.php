<?php
/**
 * 07. About Block Pattern
 */
return array(
    'title'      => __('07. About Pattern', 'aegis'),
    'description' => __('Grid Gallery with Tagline, Heading, both vertical and horizontal Paragraphs', 'aegis'),
    'categories' => array('aegis-about'),
    'content' => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"gradient":"vertical-background-to-secondary","layout":{"type":"constrained"},"metadata":{"name":"' . esc_html__('07. About Pattern', 'aegis') . '"}} -->
    <div class="wp-block-group has-vertical-background-to-secondary-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
    <div class="wp-block-columns alignwide" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:column {"verticalAlignment":"center","width":"5%","className":"is-hidden-on-mobile"} -->
        <div class="wp-block-column is-vertically-aligned-center is-hidden-on-mobile" style="flex-basis:5%">
            <!-- wp:paragraph {"align":"right","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"typography":{"fontSize":"6.9rem","lineHeight":"1","writingMode":"vertical-rl","textTransform":"uppercase","fontStyle":"normal","fontWeight":"700","letterSpacing":"3px"}},"textColor":"secondary"} -->
            <p class="has-text-align-right has-secondary-color has-text-color has-link-color" style="font-size:6.9rem;font-style:normal;font-weight:700;letter-spacing:3px;line-height:1;text-transform:uppercase;writing-mode:vertical-rl">' . esc_html__('About', 'aegis') . '</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"19%"} -->
        <div class="wp-block-column" style="flex-basis:19%">
            <!-- wp:cover {"url":"' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp","dimRatio":70,"overlayColor":"foreground","minHeight":75,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"border":{"width":"1px"}},"borderColor":"background","className":"is-style-aegis-shadow","layout":{"type":"default"}} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center is-style-aegis-shadow has-border-color has-background-border-color" style="border-width:1px;min-height:75vh"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-top:0;padding-bottom:0">
                        <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
                        <p class="has-text-align-center has-medium-font-size">' . esc_html__('[Name]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                        <p class="has-text-align-center has-small-font-size">' . esc_html__('[Position]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"19%","className":"is-hidden-on-mobile"} -->
        <div class="wp-block-column is-vertically-aligned-center is-hidden-on-mobile" style="flex-basis:19%">
            <!-- wp:cover {"url":"' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp","dimRatio":70,"overlayColor":"foreground","focalPoint":{"x":0.76,"y":0.72},"minHeight":65,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"border":{"width":"1px"}},"borderColor":"background","className":"is-style-aegis-shadow"} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center is-style-aegis-shadow has-border-color has-background-border-color" style="border-width:1px;min-height:65vh"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" style="object-position:76% 72%" data-object-fit="cover" data-object-position="76% 72%" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-top:0;padding-bottom:0">
                        <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
                        <p class="has-text-align-center has-medium-font-size">' . esc_html__('[Name]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                        <p class="has-text-align-center has-small-font-size">' . esc_html__('[Position]', 'aegis') . '
                        </p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"19%","className":"is-hidden-on-mobile"} -->
        <div class="wp-block-column is-vertically-aligned-center is-hidden-on-mobile" style="flex-basis:19%">
            <!-- wp:cover {"url":"' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp","dimRatio":70,"overlayColor":"foreground","minHeight":55,"minHeightUnit":"vh","contentPosition":"bottom center","style":{"border":{"width":"1px"}},"borderColor":"background","className":"is-style-aegis-shadow"} -->
            <div class="wp-block-cover has-custom-content-position is-position-bottom-center is-style-aegis-shadow has-border-color has-background-border-color" style="border-width:1px;min-height:55vh"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","verticalAlignment":"bottom","orientation":"vertical"}} -->
                    <div class="wp-block-group" style="padding-top:0;padding-bottom:0">
                        <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
                        <p class="has-text-align-center has-medium-font-size">' . esc_html__('[Name]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                        <p class="has-text-align-center has-small-font-size">' . esc_html__('[Position]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"38%"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:38%">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0","margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
            <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
                <p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('Who we are', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"typography":{"fontSize":"6rem","textTransform":"uppercase"}}} -->
                <h2 class="wp-block-heading" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-size:6rem;text-transform:uppercase">' . esc_html__('About', 'aegis') . '</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}}} -->
                <p style="margin-top:0">' . esc_html__('Paragraph (333 characters): Detail the core principles, values, or characteristics of the organization or subject.', 'aegis') . '</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->',
);