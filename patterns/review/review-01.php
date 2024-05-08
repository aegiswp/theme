<?php
/**
 * 01. Review Block Pattern
 */
return array(
    'title'      => __('01. Review', 'aegis'),
    'description' => __('Book Review with agline, Heading, rating, paragraph, featured image and gallery', 'aegis'),
    'categories' => array('aegis-review'),
    'content' => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"},"metadata":{"name":"' . esc_html__('01. Review Pattern', 'aegis') . '"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"0","top":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0">
        <!-- wp:column {"verticalAlignment":"top","width":"33.33%","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
        <div class="wp-block-column is-vertically-aligned-top" style="padding-top:0;padding-bottom:0;flex-basis:33.33%">
            <!-- wp:group {"gradient":"horizontal-primary-to-background","layout":{"type":"default"}} -->
            <div class="wp-block-group has-horizontal-primary-to-background-gradient-background has-background">
                <!-- wp:image {"lightbox":{"enabled":true},"aspectRatio":"9/16","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-shadow-image"} -->
                <figure class="wp-block-image size-full is-style-aegis-shadow-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:9/16;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"top","width":"66.66%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
        <div class="wp-block-column is-vertically-aligned-top" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:66.66%">
            <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"bottom":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-bottom:0">
                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
                <p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('Review', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"5px"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"gigantic"} -->
                <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-bottom:5px;font-style:normal;font-weight:300"><strong>' . esc_html__('Book Title', 'aegis') . '</strong></h3>
                <!-- /wp:heading -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0">
                    <!-- wp:paragraph {"align":"left","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"tiny"} -->
                    <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:500">' . esc_html__('Rating', 'aegis') . '</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span>
                    </p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:paragraph -->
                <p>' . esc_html__('Review Description (333 characters): [Provide a summary, just long enough to give a brief overview of the review without overwhelming the reader.]', 'aegis') . '</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-bottom:0">
                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
                <p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">PReview</p>
                <!-- /wp:paragraph -->

                <!-- wp:gallery {"columns":5,"linkTo":"none","sizeSlug":"full","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
                <figure class="wp-block-gallery has-nested-images columns-5 is-cropped">
                    <!-- wp:image {"lightbox":{"enabled":true},"linkDestination":"none","className":"size-full is-style-aegis-shadow-image"} -->
                    <figure class="wp-block-image size-full is-style-aegis-shadow-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"lightbox":{"enabled":true},"linkDestination":"none","className":"size-full is-style-aegis-shadow-image"} -->
                    <figure class="wp-block-image size-full is-style-aegis-shadow-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"lightbox":{"enabled":true},"linkDestination":"none","className":"size-full is-style-aegis-shadow-image"} -->
                    <figure class="wp-block-image size-full is-style-aegis-shadow-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"lightbox":{"enabled":true},"linkDestination":"none","className":"size-full is-style-aegis-shadow-image"} -->
                    <figure class="wp-block-image size-full is-style-aegis-shadow-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"lightbox":{"enabled":true},"linkDestination":"none","className":"size-full is-style-aegis-shadow-image"} -->
                    <figure class="wp-block-image size-full is-style-aegis-shadow-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                    <!-- /wp:image -->
                </figure>
                <!-- /wp:gallery -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0">
                <!-- wp:separator {"backgroundColor":"secondary","className":"is-style-wide"} -->
                <hr class="wp-block-separator has-text-color has-secondary-color has-alpha-channel-opacity has-secondary-background-color has-background is-style-wide" />
                <!-- /wp:separator -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"space-between","orientation":"horizontal"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"textAlign":"center","backgroundColor":"background","textColor":"foreground","width":50,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"className":"is-style-aegis-button-shadow-outline"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-50 is-style-aegis-button-shadow-outline"><a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background has-link-color has-text-align-center wp-element-button" href="#">' . esc_html__('[Call to Action]', 'aegis') . '</a></div>
                    <!-- /wp:button -->

                    <!-- wp:button {"textAlign":"center","backgroundColor":"background","textColor":"foreground","width":50,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"className":"is-style-aegis-button-shadow-outline"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-50 is-style-aegis-button-shadow-outline">
                    <a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background has-link-color has-text-align-center wp-element-button" href="#">' . esc_html__('[Call to Action', 'aegis') . '</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->

                <!-- wp:separator {"backgroundColor":"secondary","className":"is-style-wide"} -->
                <hr class="wp-block-separator has-text-color has-secondary-color has-alpha-channel-opacity has-secondary-background-color has-background is-style-wide" />
                <!-- /wp:separator -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
                <div class="wp-block-group"
                    style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                    <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"tiny"} -->
                    <p class="has-tiny-font-size" style="font-style:normal;font-weight:500">' . esc_html__('Support Author:', 'aegis') . '</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","size":"has-small-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left"}} -->
                    <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"
                        style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
                        <!-- wp:social-link {"url":"#","service":"amazon","label":"Amazon"} /-->

                        <!-- wp:social-link {"url":"#","service":"etsy","label":"Etsy"} /-->

                        <!-- wp:social-link {"url":"#","service":"goodreads","label":"Goodreads"} /-->

                        <!-- wp:social-link {"url":"#","service":"patreon","label":"Patreon"} /-->
                    </ul>
                    <!-- /wp:social-links -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->',
);
