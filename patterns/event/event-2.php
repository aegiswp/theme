<?php
/**
 * 02. Event Block Pattern
 */
return array(
    'title'      => __('02. Event', 'aegis'),
    'description' => __('Block Pattern with Image, Tagline, Heading, Date, Paragraph, Buttons, and Social Icons', 'aegis'),
    'categories' => array('aegis-event'),
    'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"gradient":"diagonal-background-to-secondary","layout":{"type":"constrained"},"metadata":{"name":"' . esc_html__('02. Event Pattern', 'aegis') . '"}} -->
<div class="wp-block-group alignfull has-diagonal-background-to-secondary-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"0","top":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"var:preset|spacing|40"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:column {"verticalAlignment":"top","width":"33.33%","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"className":"is-style-default"} -->
        <div class="wp-block-column is-vertically-aligned-top is-style-default" style="padding-top:0;padding-bottom:0;flex-basis:33.33%">
            <!-- wp:image {"lightbox":{"enabled":true},"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-shadow-image"} -->
            <figure class="wp-block-image size-full is-style-aegis-shadow-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:3/4;object-fit:cover" /></figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:66.66%">
            <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"},"padding":{"bottom":"0","top":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
                <p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('[Tagline]', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"top":"5px","bottom":"10px"}}},"fontSize":"gigantic"} -->
                <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:5px;margin-bottom:10px;font-style:normal;font-weight:300"><strong>' . esc_html__('[Heading]', 'aegis') . '</strong></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>' . esc_html__('[Paragraph (133 characters): Provide details about upcoming events, including themes, or special highlights.]', 'aegis') . '</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

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
                    <!-- wp:button {"backgroundColor":"foreground","width":50,"className":"is-style-aegis-3d-button-dark"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-50 is-style-aegis-3d-button-dark">
                        <a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#">' . esc_html__('[Call to Action]', 'aegis') . '</a></div>
                    <!-- /wp:button -->

                    <!-- wp:button {"backgroundColor":"foreground","width":50,"className":"is-style-aegis-3d-button-dark"} -->
                    <div class="wp-block-button has-custom-width wp-block-button__width-50 is-style-aegis-3d-button-dark">
                        <a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#">' . esc_html__('[Call to Action]', 'aegis') . '</a></div>
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