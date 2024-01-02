<?php
/**
 * 05. About Us Block Pattern
 */
return array(
    'title'      => __('05. About Us', 'aegis'),
    'description' => __('About Us with tagline, heading, paragraph, image, and button', 'aegis'),
    'categories' => array('aegis-about'),
    'content' => '
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"gradient":"vertical-background-to-foreground","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('About Section', 'aegis') . '"}} -->
<section class="wp-block-group alignfull has-vertical-background-to-foreground-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"verticalAlignment":null,"align":"full","style":{"spacing":{"margin":{"bottom":"0"}}}} -->
    <div class="wp-block-columns alignfull" style="margin-bottom:0">
        <!-- wp:column {"width":"33.33%"} -->
        <div class="wp-block-column" style="flex-basis:33.33%">
            <!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"color":[],"border":{"radius":{"topLeft":null,"topRight":null,"bottomRight":null}}}} -->
            <figure class="wp-block-image size-full"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"foreground","textColor":"white"} -->
        <div class="wp-block-column is-vertically-aligned-center has-white-color has-foreground-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);flex-basis:66.66%">
            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
            <p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('About Us', 'aegis') . '</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"fontSize":"huge"} -->
            <h3 class="wp-block-heading has-huge-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px">' . esc_html__('[Heading]', 'aegis') . '</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>' . esc_html__('[Inspiration Statement (45 chars): Express core values or motivations.]', 'aegis') . '</p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph -->
            <p>' . esc_attr__('[Content (205 chars): Detail the core principles, values, or characteristics of the organization or subject.]', 'aegis') . '</p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
            <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
                <!-- wp:button {"className":"is-style-aegis-button-shadow-outline"} -->
                <div class="wp-block-button is-style-aegis-button-shadow-outline"><a class="wp-block-button__link wp-element-button" href="#">' . esc_attr__('Call to Action', 'aegis') . '</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</section>
<!-- /wp:group -->',
);