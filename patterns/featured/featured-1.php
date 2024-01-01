<?php
/**
 * 01. Featured Block Pattern
 */
return array(
    'title'      => __('01. Featured', 'aegis'),
    'description' => __('Featured Grid with Media and Text', 'aegis'),
    'categories' => array('aegis-featured'),
    'content' => '
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"foreground","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('Featured Section', 'aegis') . '"}} -->
<section class="wp-block-group alignfull has-foreground-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"0px","left":"0px"},"margin":{"top":"0px","bottom":"0px"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0px;margin-bottom:0px">
        <!-- wp:column {"verticalAlignment":"center","width":"50%","layout":{"type":"default"}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
            <!-- wp:media-text {"align":"wide","mediaPosition":"right","mediaType":"image","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"foreground","textColor":"white"} -->
            <div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile has-white-color has-foreground-background-color has-text-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <div class="wp-block-media-text__content">
                    <!-- wp:group {"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"large"} -->
                        <h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase">' . esc_attr__('[Title]', 'aegis') . '</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"small"} -->
                        <p class="has-small-font-size">' . esc_attr__('[Description (75 characters): Provide a brief description of the feature.]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}}}} -->
                        <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0">
                            <!-- wp:button {"className":"is-style-aegis-button-shadow-outline"} -->
                            <div class="wp-block-button is-style-aegis-button-shadow-outline"><a class="wp-block-button__link wp-element-button" href="#">' . esc_attr__('Call to Action', 'aegis') . '</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <figure class="wp-block-media-text__media"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_light.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
            </div>
            <!-- /wp:media-text -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"50%","layout":{"type":"default"}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
            <!-- wp:media-text {"align":"wide","mediaPosition":"right","mediaType":"image","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"foreground","textColor":"white"} -->
            <div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile has-white-color has-foreground-background-color has-text-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <div class="wp-block-media-text__content">
                    <!-- wp:group {"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"large"} -->
                        <h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase">' . esc_attr__('[Title]', 'aegis') . '</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"small"} -->
                        <p class="has-small-font-size">' . esc_attr__('[Description (75 characters): Provide a brief description of the feature.]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}}}} -->
                        <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0">
                            <!-- wp:button {"className":"is-style-aegis-button-shadow-outline"} -->
                            <div class="wp-block-button is-style-aegis-button-shadow-outline"><a class="wp-block-button__link wp-element-button" href="#">' . esc_attr__('Call to Action', 'aegis') . '</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <figure class="wp-block-media-text__media"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_light.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
            </div>
            <!-- /wp:media-text -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"0px","left":"0px"},"margin":{"top":"0px","bottom":"0px"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0px;margin-bottom:0px">
        <!-- wp:column {"verticalAlignment":"center","width":"50%","layout":{"type":"default"}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
            <!-- wp:media-text {"align":"wide","mediaType":"image","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"foreground","textColor":"white"} -->
            <div class="wp-block-media-text alignwide is-stacked-on-mobile has-white-color has-foreground-background-color has-text-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <figure class="wp-block-media-text__media"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_light.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                <div class="wp-block-media-text__content">
                    <!-- wp:group {"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"large"} -->
                        <h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase">' . esc_html__('[Title]', 'aegis') . '</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"small"} -->
                        <p class="has-small-font-size">' . esc_attr__('[Description (75 characters): Provide a brief description of the feature.]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}}}} -->
                        <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0">
                            <!-- wp:button {"className":"is-style-aegis-button-shadow-outline"} -->
                            <div class="wp-block-button is-style-aegis-button-shadow-outline"><a class="wp-block-button__link wp-element-button" href="#">' . esc_attr__('Call to Action', 'aegis') . '</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:media-text -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"50%","layout":{"type":"default"}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
            <!-- wp:media-text {"align":"wide","mediaType":"image","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"foreground","textColor":"white"} -->
            <div class="wp-block-media-text alignwide is-stacked-on-mobile has-white-color has-foreground-background-color has-text-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <figure class="wp-block-media-text__media"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_light.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
                <div class="wp-block-media-text__content">
                    <!-- wp:group {"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"large"} -->
                        <h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:500;text-transform:uppercase">' . esc_html__('[Title]', 'aegis') . '</h3>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"small"} -->
                        <p class="has-small-font-size">' . esc_attr__('[Description (75 characters): Provide a brief description of the feature.]', 'aegis') . '</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}}}} -->
                        <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0">
                            <!-- wp:button {"className":"is-style-aegis-button-shadow-outline"} -->
                            <div class="wp-block-button is-style-aegis-button-shadow-outline"><a class="wp-block-button__link wp-element-button" href="#">' . esc_attr__('Call to Action', 'aegis') . '</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
            </div>
            <!-- /wp:media-text -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</section>
<!-- /wp:group -->',
);