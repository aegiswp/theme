<?php
/**
 * 01. Video Block Pattern
 */
return array(
    'title'      => __('01. Video', 'aegis'),
    'description' => __('Video Media Player with Gradient Background', 'aegis'),
    'categories' => array('aegis-video'),
    'content' => '
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"gradient":"horizontal-foreground-to-background","className":"video","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('Video Section', 'aegis') . '"}} -->
<section class="wp-block-group alignfull video has-horizontal-foreground-to-background-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull">
        <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"textColor":"background","fontSize":"gigantic"} -->
        <h3 class="wp-block-heading has-text-align-center has-background-color has-text-color has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__('[Video Title]', 'aegis') . '</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","textColor":"background"} -->
        <p class="has-text-align-center has-background-color has-text-color">' . esc_html__('Video Description (333 characters): [Provide a brief synopsis of the video clip.]', 'aegis') . '</p>
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
</section>
<!-- /wp:group -->',
);