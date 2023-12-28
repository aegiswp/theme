<?php
/**
 * 05. Hero Block Pattern
 */
return array(
	'title'	  => __( '05. Hero', 'aegis' ),
	'description' => __('Hero with Heading, Text, Button and Grid Images', 'aegis'),
	'categories' => array( 'aegis-hero' ),
	'content' => '
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"gradient":"vertical-background-to-foreground","className":"grid-gallery","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('Hero Section', 'aegis') . '"}} -->
<section class="wp-block-group alignfull grid-gallery has-vertical-background-to-foreground-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns alignwide" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
        <!-- wp:column {"verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center">
            <!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"gigantic"} -->
            <h2 class="wp-block-heading has-gigantic-font-size" style="font-style:normal;font-weight:300"><strong>' . esc_html__('Main', 'aegis') . '</strong> ' . esc_html__('Heading', 'aegis') . '</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|80","bottom":"0","left":"0"}}},"className":"mobile-padding-paragraph"} -->
            <p class="mobile-padding-paragraph" style="padding-top:0;padding-right:var(--wp--preset--spacing--80);padding-bottom:0;padding-left:0">' . esc_html__('Hero Content (333 chars): [Provide a brief overview of a specific topic, product, or service.]', 'aegis') . '</p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-aegis-button-effect-2"} -->
                <div class="wp-block-button is-style-aegis-button-effect-2"><a class="wp-block-button__link wp-element-button">' . esc_html__('Call to Action', 'aegis') . '</a></div>
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
                    <!-- wp:image {"scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
                    <figure class="wp-block-image size-large is-style-aegis-effect-3-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_450x680_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="object-fit:cover" /></figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column -->
                <div class="wp-block-column">
                    <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"hide-on-mobile is-style-aegis-effect-3-image"} -->
                    <figure class="wp-block-image size-large hide-on-mobile is-style-aegis-effect-3-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_450x680_light.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                    <!-- /wp:image -->
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