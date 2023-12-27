<?php
/**
 * 03. Video Block Pattern
 */
return array(
    'title'      => __('03. Video', 'aegis'),
    'description' => __('Video Media Player with Heading, Text, Socials, and Button', 'aegis'),
    'categories' => array('aegis-video'),
    'content' => '
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"gradient":"vertical-secondary-to-background","className":"video","layout":{"type":"default"},"metadata":{"name":"Video Section"}} -->
<section class="wp-block-group alignfull video has-vertical-secondary-to-background-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"0","top":"0"}}}} -->
    <div class="wp-block-columns alignwide" style="padding-top:0;padding-bottom:0">
        <!-- wp:column {"verticalAlignment":"center","width":"","className":"is-style-default"} -->
        <div class="wp-block-column is-vertically-aligned-center is-style-default">
            <!-- wp:group {"gradient":"horizontal-primary-to-background","className":"is-style-aegis-shadow"} -->
            <div class="wp-block-group is-style-aegis-shadow has-horizontal-primary-to-background-gradient-background has-background">
                <!-- wp:video -->
                <figure class="wp-block-video">
                <video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_725x410_dark.webp" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/aegis.mp4" playsinline></video>
                </figure>
                <!-- /wp:video -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
        <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
            <p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('Video', 'aegis') . '</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"gigantic"} -->
            <h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;font-style:normal;font-weight:300"><strong>' . esc_html__('[Video Title]', 'aegis') . '</strong></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>' . esc_html__('Video Description (333 characters): [Provide a brief synopsis of the video clip.]', 'aegis') . '</p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"layout":{"type":"default"}} -->
            <div class="wp-block-group">
                <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","openInNewTab":true,"size":"has-small-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left"}} -->
                <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
                    <!-- wp:social-link {"url":"#","service":"spotify","label":"Spotify"} /-->

                    <!-- wp:social-link {"url":"#","service":"youtube","label":"YouTube"} /-->

                    <!-- wp:social-link {"url":"#","service":"bandcamp","label":"Bandcamp"} /-->

                    <!-- wp:social-link {"url":"#","service":"soundcloud","label":"SoundCloud"} /-->
                </ul>
                <!-- /wp:social-links -->

                <!-- wp:buttons -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
                    <div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#">' . esc_html__('Call to Action', 'aegis') . '</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</section>
<!-- /wp:group -->',
);