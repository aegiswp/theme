<?php
/**
 * 04. Hero Block Pattern
 */
return array(
    'title'      => __('04. Hero', 'aegis'),
    'description' => __('Full-screen hero with cover background video, dark overlay, and light centered heading, paragraph, and a call-to-action button', 'aegis'),
    'categories' => array('aegis-hero'),
    'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"},"metadata":{"name":"' . esc_html__('04. Hero Pattern', 'aegis') . '"}} -->
    <div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:cover {"url":"' . esc_url(get_template_directory_uri()) . '/assets/video/sample.mp4","dimRatio":70,"overlayColor":"foreground","backgroundType":"video","minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}},"color":[]}} -->
    <div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50);min-height:100vh">
        <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
        <video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="' . esc_url(get_template_directory_uri()) . '/assets/video/sample.mp4" data-object-fit="cover"></video>
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="padding-right:0;padding-left:0">
                <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"gigantic"} -->
                <h1 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="font-style:normal;font-weight:400">' . wp_kses_post(_x('<strong>Main</strong> Headline', 'Sample descriptive heading', 'aegis')) . '</h1>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center">' . esc_html__('[Paragraph (155 characters): Promote an offer, summarize an article, or share a news update.]', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
                    <!-- wp:button {"style":{"color":{"background":"#1c1c1fb3"}},"className":"is-style-outline"} -->
                    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-background wp-element-button" href="#" style="background-color:#1c1c1fb3">' . esc_html__('[Call to Action]', 'aegis') . '</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->',
);