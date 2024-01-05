<?php
/**
 * 01. Audio Block Pattern
 */
return array(
    'title'      => __('01. Audio', 'aegis'),
    'description' => __('Block Pattern with Image, Tagline, Heading, Paragraph, Social Icons, Button and Audio Player', 'aegis'),
    'categories' => array('aegis-audio'),
    'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"gradient":"vertical-foreground-to-background","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('01. Audio Pattern', 'aegis') . '"}} -->
<div class="wp-block-group alignfull has-vertical-foreground-to-background-gradient-background has-background" style="margin-top:0;margin-bottom:0">
    <!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0px","left":"0px"},"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"backgroundColor":"foreground"} -->
    <div class="wp-block-columns has-foreground-background-color has-background" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">
        <!-- wp:column {"width":"50%"} -->
        <div class="wp-block-column" style="flex-basis:50%">
            <!-- wp:cover {"url":"' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_light.webp","dimRatio":80,"overlayColor":"foreground","minHeight":370,"minHeightUnit":"px","contentPosition":"center center","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}}} -->
            <div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);min-height:370px">
                <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-80 has-background-dim"></span>
                <img class="wp-block-cover__image-background" src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_light.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" data-object-fit="cover" />
                <div class="wp-block-cover__inner-container">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1","fontStyle":"normal","fontWeight":"100","fontSize":"200px"}}} -->
                    <p class="has-text-align-center" style="font-size:200px;font-style:normal;font-weight:100;line-height:1">' . esc_attr__('[01.]', 'aegis') . '</p>
                    <!-- /wp:paragraph -->
                </div>
            </div>
            <!-- /wp:cover -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"left":"var:preset|spacing|40","right":"var:preset|spacing|40","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40);flex-basis:50%">
            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"textColor":"background","className":"tagline","fontSize":"tiny"} -->
            <p class="has-text-align-left tagline has-background-color has-text-color has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_attr__('[Tagline]', 'aegis') . '</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"left","level":3,"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"var:preset|spacing|30","left":"0px"}}},"textColor":"background","fontSize":"huge"} -->
            <h3 class="wp-block-heading has-text-align-left has-background-color has-text-color has-huge-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:var(--wp--preset--spacing--30);margin-left:0px">' . esc_attr__('[Heading]', 'aegis') . '</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"tiny"} -->
            <p class="has-background-color has-text-color has-link-color has-tiny-font-size">' . esc_attr__('[Paragraph (60 characters): Provide a brief overview of a specific podcast topic, radio show, interview, or discussion.]', 'aegis') . '</p>
            <!-- /wp:paragraph -->

            <!-- wp:audio {"id":3241,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
            <figure class="wp-block-audio" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"><audio controls src="' . esc_url(get_template_directory_uri()) . '/assets/audios/sample.mp4"></audio></figure>
            <!-- /wp:audio -->

            <!-- wp:columns -->
            <div class="wp-block-columns">
                <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
                <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
                    <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","iconBackgroundColor":"background","iconBackgroundColorValue":"#f6f5f2","openInNewTab":true,"layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} -->
                    <ul class="wp-block-social-links has-icon-color has-icon-background-color">
                        <!-- wp:social-link {"url":"#","service":"spotify","label":"Spotify"} /-->

                        <!-- wp:social-link {"url":"#","service":"youtube","label":"YouTube"} /-->

                        <!-- wp:social-link {"url":"#","service":"soundcloud","label":"SoundCloud"} /-->

                        <!-- wp:social-link {"url":"#","service":"feed","label":"RSS Feed"} /-->
                    </ul>
                    <!-- /wp:social-links -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
                <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%">
                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
                    <div class="wp-block-buttons">
                        <!-- wp:button {"textColor":"white","width":100,"className":"is-style-aegis-button-shadow-outline"} -->
                        <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-aegis-button-shadow-outline">
                           <a class="wp-block-button__link has-white-color has-text-color wp-element-button" href="#0">' . esc_attr__('[Call to Action]', 'aegis') . '</a>
                          </div>
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
        <!-- /wp:group -->',
);