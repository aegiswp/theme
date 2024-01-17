<?php
/**
 * 01. Media Gallery Block Pattern
 */
return array(
    'title'      => __('01. Video Gallery', 'aegis'),
    'description' => __('Gallery with Tagline, Headings, Paragraphs, and Videos', 'aegis'),
    'categories' => array('aegis-gallery'),
    'content' => '<!-- wp:group {"metadata":{"name":"' . esc_html__('01. Gallery Pattern', 'aegis') . '"},"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"foreground","textColor":"background","layout":{"type":"default"}}-->
    <div class="wp-block-group alignwide has-background-color has-foreground-background-color has-text-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
        <p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('[Tagline]', 'aegis') . '</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"top":"5px","bottom":"10px"}}},"fontSize":"gigantic"} -->
        <h4 class="wp-block-heading has-gigantic-font-size" style="margin-top:5px;margin-bottom:10px;font-style:normal;font-weight:300"><strong>' . esc_html__('[Heading]', 'aegis') . '</strong></h4>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>' . esc_html__('[Paragraph (333 characters): Provide details about the videos, including themes, or special highlights.]', 'aegis') . '</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"0"},"padding":{"top":"0","bottom":"0"}}}} -->
    <div class="wp-block-columns alignwide"
        style="margin-top:var(--wp--preset--spacing--40);margin-bottom:0;padding-top:0;padding-bottom:0">
        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:video -->
            <figure class="wp-block-video"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_light.webp" preload="auto" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/sample.mp4" playsinline></video></figure>
            <!-- /wp:video -->

            <!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"large"} -->
            <h4 class="wp-block-heading has-large-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0;font-style:normal;font-weight:300"><strong>' . esc_html__('[Heading]', 'aegis') . '</strong></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size">' . esc_html__('[Paragraph (65 characters): Provide a brief synopsis of the video.]', 'aegis') . '</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:video -->
           <figure class="wp-block-video"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_light.webp" preload="auto" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/sample.mp4" playsinline></video></figure>
            <!-- /wp:video -->

            <!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"large"} -->
            <h4 class="wp-block-heading has-large-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0;font-style:normal;font-weight:300"><strong>' . esc_html__('[Heading]', 'aegis') . '</strong></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size">' . esc_html__('[Paragraph (65 characters): Provide a brief synopsis of the video.]', 'aegis') . '</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"0"},"padding":{"top":"0","bottom":"0"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:0;padding-top:0;padding-bottom:0">
        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:video -->
            <figure class="wp-block-video"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_light.webp" preload="auto" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/sample.mp4" playsinline></video></figure>
            <!-- /wp:video -->

            <!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"large"} -->
            <h4 class="wp-block-heading has-large-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0;font-style:normal;font-weight:300"><strong>' . esc_html__('[Heading]', 'aegis') . '</strong></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size">' . esc_html__('[Paragraph (65 characters): Provide a brief synopsis of the video.]', 'aegis') . '</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:video -->
            <figure class="wp-block-video"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_light.webp" preload="auto" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/sample.mp4" playsinline></video></figure>
            <!-- /wp:video -->

            <!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"large"} -->
            <h4 class="wp-block-heading has-large-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0;font-style:normal;font-weight:300"><strong>' . esc_html__('[Heading]', 'aegis') . '</strong></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"fontSize":"small"} -->
            <p class="has-small-font-size">' . esc_html__('[Paragraph (65 characters): Provide a brief synopsis of the video.]', 'aegis') . '</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->',
);