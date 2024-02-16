<?php
/**
 * 05. Hero Block Pattern
 */
return array(
	'title'	  => __( '05. Hero', 'aegis' ),
    'description' => __('Full-screen hero with gradient background, left aligned heading, paragraph, call-to-action button, and right aligned grid images', 'aegis'),
	'categories' => array( 'aegis-hero' ),
	'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"100vh"}},"gradient":"vertical-background-to-foreground","className":"grid-gallery","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('05. Hero Pattern', 'aegis') . '"}} -->
    <div class="wp-block-group alignfull grid-gallery has-vertical-background-to-foreground-gradient-background has-background" style="min-height:100vh;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns alignwide" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"gigantic"} -->
            <h1 class="wp-block-heading has-gigantic-font-size" style="font-style:normal;font-weight:300">' . wp_kses_post(_x('<strong>Main</strong> Headline', 'Sample descriptive heading', 'aegis')) . '</h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|80","bottom":"0","left":"0"}}},"className":"mobile-padding-paragraph"} -->
            <p class="mobile-padding-paragraph" style="padding-top:0;padding-right:var(--wp--preset--spacing--80);padding-bottom:0;padding-left:0">' . esc_html__('[Paragraph (335 characters): Promote an offer, summarize an article, or share a news update.]', 'aegis') . '</p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-aegis-button-effect-2"} -->
                <div class="wp-block-button is-style-aegis-button-effect-2"><a class="wp-block-button__link wp-element-button">' . esc_html__('[Call to Action]', 'aegis') . '</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:columns -->
            <div class="wp-block-columns">
                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:image {"aspectRatio":"9/16","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
                    <figure class="wp-block-image size-large is-style-aegis-effect-3-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:9/16;object-fit:cover" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:image {"aspectRatio":"9/16","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-hidden-on-mobile is-style-aegis-effect-3-image"} -->
                    <figure class="wp-block-image size-large is-hidden-on-mobile is-style-aegis-effect-3-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_light.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:9/16;object-fit:cover" /></figure>
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