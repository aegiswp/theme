<?php
/**
 * 03. Media Gallery Block Pattern
 */
return array(
    'title'      => __('03. Media Gallery', 'aegis'),
    'description' => __('Mixed Video and Image Gallery with Tagline, Headings, and Paragraphs', 'aegis'),
    'categories' => array('aegis-gallery'),
    'content' => '<!-- wp:group {"metadata":{"name":"' . esc_html__('03. Gallery Pattern', 'aegis') . '"},"align":"wide","style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"gradient":"vertical-secondary-to-background","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide has-vertical-secondary-to-background-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"verticalAlignment":"top","align":"wide","style":{"spacing":{"blockGap":{"top":"0"},"padding":{"top":"0","bottom":"0"}}}} -->
    <div class="wp-block-columns alignwide are-vertically-aligned-top" style="padding-top:0;padding-bottom:0">
        <!-- wp:column {"verticalAlignment":"top","width":"40%","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-column is-vertically-aligned-top" style="padding-bottom:var(--wp--preset--spacing--30);flex-basis:40%">
            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
            <p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('[Tagline]', 'aegis') . '</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"5px","bottom":"10px"}}},"fontSize":"gigantic"} -->
            <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:5px;margin-bottom:10px;font-style:normal;font-weight:600">' . esc_html__('[Heading]', 'aegis') . '</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"medium"} -->
            <p class="has-medium-font-size">' . esc_html__('[Paragraph (333 characters): Provide details about the videos, including themes, or special highlights.]', 'aegis') . '</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"60%"} -->
        <div class="wp-block-column" style="flex-basis:60%">
            <!-- wp:columns -->
            <div class="wp-block-columns">
                <!-- wp:column {"verticalAlignment":"center","backgroundColor":"foreground","textColor":"background","className":"is-style-default"} -->
                <div class="wp-block-column is-vertically-aligned-center is-style-default has-background-color has-foreground-background-color has-text-color has-background">
                    <!-- wp:video -->
                    <figure class="wp-block-video"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" preload="auto" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/sample.mp4" playsinline></video></figure>
                    <!-- /wp:video -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-medium-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:300"><strong>' . esc_html__('[Heading]', 'aegis') . '</strong></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"tiny"} -->
                        <p class="has-tiny-font-size">' . esc_html__('[Paragraph (65 characters): Provide a brief synopsis of the video.]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"className":"is-style-default"} -->
                <div class="wp-block-column is-style-default">
                    <!-- wp:image {"lightbox":{"enabled":true},"width":"400px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
                    <figure class="wp-block-image size-full is-resized is-style-default"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_light.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:400px" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->

            <!-- wp:columns -->
            <div class="wp-block-columns">
                <!-- wp:column {"verticalAlignment":"center","backgroundColor":"senary","className":"is-style-default"} -->
                <div class="wp-block-column is-vertically-aligned-center is-style-default has-senary-background-color has-background">
                    <!-- wp:video -->
                    <figure class="wp-block-video"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" preload="auto" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/sample.mp4" playsinline></video></figure>
                    <!-- /wp:video -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-medium-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:300"><strong>' . esc_html__('[Heading]', 'aegis') . '</strong></h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"tiny"} -->
                        <p class="has-tiny-font-size">' . esc_html__('[Paragraph (65 characters): Provide a brief synopsis of the video.]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"className":"is-style-default"} -->
                <div class="wp-block-column is-style-default">
                    <!-- wp:image {"lightbox":{"enabled":true},"width":"400px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:400px" /></figure>
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