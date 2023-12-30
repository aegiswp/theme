<?php
/**
 * 08. Hero Block Pattern
 */
return array(
    'title'      => __('08. Hero', 'aegis'),
    'description' => __('Hero with Tagline, Heading, Social Icons Block, and Duotone Overlay', 'aegis'),
    'categories' => array('aegis-hero'),
    'content' => '
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"dimensions":{"minHeight":"px"}},"className":"is-not-gradient-on-mobile","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('Hero Section', 'aegis') . '"}} -->
<section class="wp-block-group alignfull is-not-gradient-on-mobile" style="min-height:px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:cover {"url":"' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark.webp","dimRatio":70,"minHeight":100,"minHeightUnit":"vh","gradient":"vertical-background-to-foreground","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}},"className":"is-style-default"} -->
    <div class="wp-block-cover alignfull is-style-default" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100vh">
        <span aria-hidden="true" class="wp-block-cover__background has-background-dim-70 has-background-dim wp-block-cover__gradient-background has-background-gradient has-vertical-background-to-foreground-gradient-background"></span>
        <img class="wp-block-cover__image-background" src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"10%"},"blockGap":"0"}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="padding-top:10%;padding-right:var(--wp--preset--spacing--30);padding-bottom:10%;padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:columns -->
                <div class="wp-block-columns">
                    <!-- wp:column {"width":"60%"} -->
                    <div class="wp-block-column" style="flex-basis:60%">
                        <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"horizontal","justifyContent":"left","verticalAlignment":"center","flexWrap":"wrap"}} -->
                        <div class="wp-block-group" style="margin-top:0;margin-bottom:0">
                            <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"foreground","className":"is-style-default","fontSize":"gigantic"} -->
                            <h1 class="wp-block-heading has-text-align-center is-style-default has-foreground-color has-text-color has-gigantic-font-size" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:600;text-transform:uppercase">' . esc_html__('[Podcast]', 'aegis') . '</h1>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"textColor":"foreground","className":"has-tagline","fontSize":"tiny"} -->
                            <p class="has-text-align-left has-tagline has-foreground-color has-text-color has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('[tagline (60 characters): Provide a brief overview of a specific podcast topic, interview, or discussion.]', 'aegis') . '</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","iconBackgroundColor":"foreground","iconBackgroundColorValue":"#1c1c1e","openInNewTab":true,"layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} -->
                            <ul class="wp-block-social-links has-icon-color has-icon-background-color">
                                <!-- wp:social-link {"url":"#","service":"spotify","label":"Spotify"} /-->

                                <!-- wp:social-link {"url":"#","service":"youtube","label":"YouTube"} /-->

                                <!-- wp:social-link {"url":"#","service":"soundcloud","label":"SoundCloud"} /-->

                                <!-- wp:social-link {"url":"#","service":"feed","label":"RSS Feed"} /-->
                            </ul>
                            <!-- /wp:social-links -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</section>
<!-- /wp:group -->',
);