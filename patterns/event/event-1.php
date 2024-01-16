<?php
/**
 * 01. Event Block Pattern
 */
return array(
    'title'      => __('01. Event', 'aegis'),
    'description' => __('Block Pattern with Video, Heading, Date, Paragraph, Button, and Social Icons', 'aegis'),
    'categories' => array('aegis-event'),
    'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"gradient":"diagonal-secondary-to-background","layout":{"type":"constrained"},"metadata":{"name":"' . esc_html__('01. Event Pattern', 'aegis') . '"}} -->
<div class="wp-block-group alignfull has-diagonal-secondary-to-background-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"},"padding":{"bottom":"0","top":"0"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);padding-top:0;padding-bottom:0">
        <!-- wp:heading {"textAlign":"center","level":3,"align":"wide","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"huge"} -->
        <h3 class="wp-block-heading alignwide has-text-align-center has-huge-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__('[Heading]', 'aegis') . '</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
        <p class="has-text-align-center" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__('[Paragraph (133 characters): Provide details about upcoming events, including themes, or special highlights.]', 'aegis') . '</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"0","top":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"var:preset|spacing|40"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:column {"verticalAlignment":"top","width":"","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"className":"is-style-default"} -->
        <div class="wp-block-column is-vertically-aligned-top is-style-default" style="padding-top:0;padding-bottom:0">
            <!-- wp:video -->
            <figure class="wp-block-video"><video controls poster= "' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" src= "' . esc_url(get_template_directory_uri()) . '/assets/videos/sample.mp4" playsinline></video></figure>
            <!-- /wp:video -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
            <!-- wp:query {"query":{"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"perPage":"4"},"enhancedPagination":true,"align":"wide"} -->
            <div class="wp-block-query alignwide">
                <!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                <div class="wp-block-columns" style="margin-top:0;margin-bottom:0">
                    <!-- wp:column {"verticalAlignment":"center","width":"10em"} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10em">
                        <!-- wp:post-date {"textAlign":"center","style":{"spacing":{"padding":{"top":"10px","right":"15px","bottom":"10px","left":"15px"}}},"backgroundColor":"foreground","textColor":"background","fontSize":"small"} /-->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":""} -->
                    <div class="wp-block-column is-vertically-aligned-center">
                        <!-- wp:post-title {"level":4,"isLink":true,"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"className":"is-style-aegis-post-title-border"} /-->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->

                <!-- wp:separator {"backgroundColor":"foreground","className":"is-style-default"} -->
                <hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-default" />
                <!-- /wp:separator -->
                <!-- /wp:post-template -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"foreground","width":100,"className":"is-style-aegis-3d-button-dark"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-aegis-3d-button-dark">
                        <a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#">' . esc_html__('[Call to Action]', 'aegis') . '</a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40);padding-top:0;padding-bottom:0">
        <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","openInNewTab":false,"size":"has-small-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
            <!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->

            <!-- wp:social-link {"url":"#","service":"meetup","label":"Meetup"} /-->

            <!-- wp:social-link {"url":"#","service":"patreon","label":"Patreon"} /-->

            <!-- wp:social-link {"url":"#","service":"google","label":"Google"} /-->
        </ul>
        <!-- /wp:social-links -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->',
);