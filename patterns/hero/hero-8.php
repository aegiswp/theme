<?php
/**
 * 08. Hero Block Pattern
 */
return array(
    'title'      => __('08. Hero', 'aegis'),
    'description' => __('Full-screen hero with gradient background, left aligned heading, paragraph, and social links', 'aegis'),
    'categories' => array('aegis-hero'),
    'content' => '<!-- wp:group {"metadata":{"name":"' . esc_html__('08. Hero Pattern', 'aegis') . '"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"dimensions":{"minHeight":"px"}},"className":"has-no-gradient-on-mobile","layout":{"type":"default"}} -->
    <div class="wp-block-group alignfull has-no-gradient-on-mobile" style="min-height:px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:cover {"url":"' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp","dimRatio":70,"customOverlayColor":"#8f8b84","minHeight":100,"minHeightUnit":"vh","gradient":"vertical-background-to-foreground","contentPosition":"center center","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
    <div class="wp-block-cover alignfull is-light" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100vh">
        <span aria-hidden="true" class="wp-block-cover__background has-background-dim-70 has-background-dim wp-block-cover__gradient-background has-background-gradient has-vertical-background-to-foreground-gradient-background" style="background-color:#8f8b84"></span>
        <img class="wp-block-cover__image-background" src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","left":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:columns -->
                <div class="wp-block-columns">
                    <!-- wp:column {"width":"60%"} -->
                    <div class="wp-block-column" style="flex-basis:60%">
                        <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|80"}}},"layout":{"type":"flex","orientation":"horizontal","justifyContent":"left","verticalAlignment":"center","flexWrap":"wrap"}} -->
                        <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--80)">
                            <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"left":"0","right":"0","top":"4px","bottom":"15px"}},"color":{"background":"#1c1c1ee6"}},"textColor":"background","className":"is-style-default","fontSize":"gigantic"} -->
                            <h1 class="wp-block-heading has-text-align-center is-style-default has-background-color has-text-color has-background has-gigantic-font-size" style="background-color:#1c1c1ee6;margin-top:0;margin-bottom:0;padding-top:4px;padding-right:0;padding-bottom:15px;padding-left:0;font-style:normal;font-weight:600;text-transform:uppercase">' . esc_html__('[Podcast]', 'aegis') . '</h1>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"color":{"background":"#1c1c1ee6"},"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"padding":{"right":"5px","left":"5px","top":"5px","bottom":"5px"}}},"textColor":"background","className":"is-tagline","fontSize":"tiny"} -->
                            <p class="has-text-align-left is-tagline has-background-color has-text-color has-background has-tiny-font-size" style="background-color:#1c1c1ee6;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('[tagline (60 characters): Provide a brief overview of a specific podcast topic, interview, or discussion.]', 'aegis') . '</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","iconBackgroundColor":"foreground","iconBackgroundColorValue":"#1c1c1e","openInNewTab":false,"layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} -->
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
</div>
<!-- /wp:group -->',
);