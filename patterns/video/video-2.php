<?php
/**
 * 02. Video Block Pattern
 */
return array(
    'title'      => __('02. Video', 'aegis'),
    'description' => __('Video Media Player with Credits', 'aegis'),
    'categories' => array('aegis-video'),
    'content' => '
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"gradient":"diagonal-background-to-secondary","className":"video","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('Video Section', 'aegis') . '"}} -->
<section class="wp-block-group alignfull video has-diagonal-background-to-secondary-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:group {"align":"full","layout":{"type":"default"}} -->
    <div class="wp-block-group alignfull">
        <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"10px"},"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"tagline","fontSize":"tiny"} -->
        <p class="tagline has-tiny-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;letter-spacing:10px;text-transform:uppercase">' . esc_html__('Video', 'aegis') . '</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"gigantic"} -->
        <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__('[Video Title]', 'aegis') . '</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p>' . esc_html__('Video Description (333 characters): [Provide a brief synopsis of the video clip.]', 'aegis') . '</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"is-style-aegis-shadow","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull is-style-aegis-shadow" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30)">
        <!-- wp:video {"align":"full"} -->
        <figure class="wp-block-video alignfull"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1410x800_dark.webp" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/aegis.mp4" playsinline></video></figure>
        <!-- /wp:video -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","layout":{"type":"default"}} -->
    <div class="wp-block-group alignfull">
        <!-- wp:columns {"isStackedOnMobile":false,"align":"wide"} -->
        <div class="wp-block-columns alignwide is-not-stacked-on-mobile">
            <!-- wp:column {"width":"50%","className":"hide-on-mobile"} -->
            <div class="wp-block-column hide-on-mobile" style="flex-basis:50%">
                <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"5px","bottom":"5px"}}},"fontSize":"small"} -->
                <p class="has-small-font-size" style="margin-top:5px;margin-bottom:5px;font-style:normal;font-weight:600">' . esc_html__('[Credits]', 'aegis') . '</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"5px","bottom":"5px"}}},"fontSize":"small"} -->
                <p class="has-small-font-size" style="margin-top:5px;margin-bottom:5px">' . esc_html__('[Position]', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"5px","bottom":"5px"}}},"fontSize":"small"} -->
                <p class="has-small-font-size" style="margin-top:5px;margin-bottom:5px">' . esc_html__('[Position]', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"5px","bottom":"5px"}}},"fontSize":"small"} -->
                <p class="has-small-font-size" style="margin-top:5px;margin-bottom:5px">' . esc_html__('[Position]', 'aegis') . '</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"5px","bottom":"5px"}}},"fontSize":"small"} -->
                <p class="has-small-font-size" style="margin-top:5px;margin-bottom:5px">' . esc_html__('[Name]', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"5px","bottom":"5px"}}},"fontSize":"small"} -->
                <p class="has-small-font-size" style="margin-top:5px;margin-bottom:5px">' . esc_html__('[Name]', 'aegis') . '</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"5px","bottom":"5px"}}},"fontSize":"small"} -->
                <p class="has-small-font-size" style="margin-top:5px;margin-bottom:5px">' . esc_html__('[Name]', 'aegis') . '</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->',
);