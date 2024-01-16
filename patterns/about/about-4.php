<?php
/**
 * 04. About Block Pattern
 */
return array(
    'title'      => __('04. About', 'aegis'),
    'description' => __('Block Pattern Two Columns with Tagline, Heading, Paragraphs, Media, and Button', 'aegis'),
    'categories' => array('aegis-about'),
    'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"gradient":"vertical-background-to-foreground","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('04. About Pattern', 'aegis') . '"}} -->
<div class="wp-block-group alignfull has-vertical-background-to-foreground-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"0","bottom":"var:preset|spacing|30","left":"0"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":[]}},"gradient":"vertical-small-background-to-secondary","layout":{"type":"default"}} -->
    <div class="wp-block-group has-vertical-small-background-to-secondary-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
        <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
        <div class="wp-block-columns" style="margin-top:0;margin-bottom:0">
            <!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
                <p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('[Tagline]', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} -->
                <h3 class="wp-block-heading" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px">' . esc_html__('[Heading]', 'aegis') . '</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} -->
                <p style="margin-bottom:var(--wp--preset--spacing--30)">' . esc_html__('[Paragraph (45 characters): Express core values or motivations.]', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:image {"aspectRatio":"3/4","scale":"cover","className":"size-full is-style-aegis-effect-1-image is-hidden-on-mobile"} -->
                <figure class="wp-block-image size-full is-style-aegis-effect-1-image is-hidden-on-mobile"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:3/4;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"66.66%"} -->
            <div class="wp-block-column" style="flex-basis:66.66%">
                <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topLeft":null,"bottomLeft":null,"bottomRight":null}}},"className":"is-style-aegis-effect-1-image"} -->
                <figure class="wp-block-image size-full is-style-aegis-effect-1-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:16/9;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0px","left":"0px"}}}} -->
                <div class="wp-block-columns">
                    <!-- wp:column {"width":"66.66%","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
                    <div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:66.66%">
                        <!-- wp:paragraph -->
                        <p>' . esc_html__('[Paragraph (333 characters): Detail the core principles, values, or characteristics of the organization or subject.]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons -->
                        <div class="wp-block-buttons">
                            <!-- wp:button {"backgroundColor":"secondary","textColor":"foreground","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"className":"is-style-aegis-button-shadow-outline"} -->
                            <div class="wp-block-button is-style-aegis-button-shadow-outline"><a class="wp-block-button__link has-foreground-color has-secondary-background-color has-text-color has-background has-link-color wp-element-button" href="#">' . esc_html__('[Call to Action]', 'aegis') . '</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->',
);