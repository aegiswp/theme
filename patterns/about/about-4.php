<?php
/**
 * 04. About Us Block Pattern
 */
return array(
    'title'      => __('04. About Us', 'aegis'),
    'description' => __('About Us with tagline, heading, paragraph, images, and button', 'aegis'),
    'categories' => array('aegis-about'),
    'content' => '
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"},"metadata":{"name":"' . esc_html__('About Section', 'aegis') . '"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|30","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":[]}},"gradient":"vertical-small-background-to-secondary","layout":{"type":"default"}} -->
    <div class="wp-block-group has-vertical-small-background-to-secondary-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)">
        <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
        <div class="wp-block-columns" style="margin-top:0;margin-bottom:0">
            <!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
                <p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('About Us', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} -->
                <h3 class="wp-block-heading" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px">' . esc_html__('[Heading]', 'aegis') . '</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>' . esc_html__('[Inspiration Statement (45 chars): Express core values or motivations.]', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:image {sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topLeft":null,"topRight":null,"bottomRight":null}}},"className":"is-style-aegis-effect-1-image"} -->
                <figure class="wp-block-image size-full is-style-aegis-effect-1-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"66.66%"} -->
            <div class="wp-block-column" style="flex-basis:66.66%">
                <!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topLeft":null,"bottomLeft":null,"bottomRight":null}}},"className":"is-style-aegis-effect-1-image"} -->
                <figure class="wp-block-image size-full is-style-aegis-effect-1-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                <!-- /wp:image -->

                <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0px","left":"0px"}}}} -->
                <div class="wp-block-columns">
                    <!-- wp:column {"width":"66.66%","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}}} -->
                    <div class="wp-block-column" style="padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30);flex-basis:66.66%">
                        <!-- wp:paragraph -->
                        <p>' . esc_attr__('[Content (205 chars): Detail the core principles, values, or characteristics of the organization or subject.]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons -->
                        <div class="wp-block-buttons">
                            <!-- wp:button {"backgroundColor":"background","textColor":"foreground","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"className":"is-style-aegis-button-shadow-outline"} -->
                            <div class="wp-block-button is-style-aegis-button-shadow-outline"><a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background has-link-color wp-element-button" href="#">' . esc_attr__('Call to Action', 'aegis') . '</a></div>
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
</section>
<!-- /wp:group -->',
);