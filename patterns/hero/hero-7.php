<?php

/**
 * 07. Hero Block Pattern
 */
return array(
    'title'      => __('07. Hero', 'aegis'),
    'description' => __('Hero with Tagline, Heading, and Social Icons Block', 'aegis'),
    'categories' => array('aegis-hero'),
    'content' => '
<!-- wp:group {"tagName":"section","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"className":"alignfull","metadata":{"name":"' . esc_html__('Hero Section', 'aegis') . '"}} -->
<section class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:cover {"url":"' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark.webp","dimRatio":70,"overlayColor":"foreground","minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}},"className":"is-style-default"} -->
    <div class="wp-block-cover alignfull is-style-default" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100vh">
        <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
        <img class="wp-block-cover__image-background" src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"10%"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="padding-top:10%;padding-right:var(--wp--preset--spacing--30);padding-bottom:10%;padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"horizontal","justifyContent":"center","verticalAlignment":"center","flexWrap":"wrap"}} -->
                <div class="wp-block-group" style="margin-top:0;margin-bottom:0">
                    <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"has-tagline","fontSize":"tiny"} -->
                    <p class="has-text-align-center has-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('[tagline (60 characters): Provide a brief overview of a specific podcast topic, interview, or discussion.]', 'aegis') . '</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase","fontSize":"6rem"},"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}}},"className":"is-style-default"} -->
                    <h1 class="wp-block-heading has-text-align-center is-style-default" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30);font-size:6rem;font-style:normal;font-weight:600;text-transform:uppercase">' . esc_html__('[Podcast]', 'aegis') . '</h1>
                    <!-- /wp:heading -->

                    <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","iconBackgroundColor":"background","iconBackgroundColorValue":"#f6f5f2","openInNewTab":true,"showLabels":true,"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
                    <ul class="wp-block-social-links has-visible-labels has-icon-color has-icon-background-color">
                        <!-- wp:social-link {"url":"#","service":"spotify","label":"Spotify"} /-->

                        <!-- wp:social-link {"url":"#","service":"soundcloud","label":"SoundCloud"} /-->

                        <!-- wp:social-link {"url":"#","service":"youtube","label":"YouTube"} /-->
                    </ul>
                    <!-- /wp:social-links -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</section>
<!-- /wp:group -->',
);
