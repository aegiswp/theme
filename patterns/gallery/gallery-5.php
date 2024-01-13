<?php
/**
 * 05. Gallery Block Pattern
 */
return array(
    'title'      => __('05. Gallery', 'aegis'),
    'description' => __('Full width image gallery', 'aegis'),
    'categories' => array('aegis-gallery'),
    'content' => '<!-- wp:group {"metadata":{"name":"' . esc_html__('05. Gallery Pattern', 'aegis') . '"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"foreground","textColor":"background","layout":{"type":"default"}} -->
    <div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"},"padding":{"bottom":"0"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--40);padding-bottom:0">
        <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"has-tagline","fontSize":"tiny"} -->
        <p class="has-text-align-center has-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('[Tagline]', 'aegis') . '</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"var:preset|spacing|30","left":"0px"}}},"fontSize":"gigantic"} -->
        <h3 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:var(--wp--preset--spacing--30);margin-left:0px">[Heading]</h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
        <p class="has-text-align-center" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( '[Paragraph (333 characters): Provide details about the photographs, gallery themes, or special highlights.]', 'aegis') . '</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:gallery {"linkTo":"none","align":"full","style":{"spacing":{"blockGap":{"top":"0px","left":"0px"}}}} -->
    <figure class="wp-block-gallery alignfull has-nested-images columns-default is-cropped">
        <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
        <!-- /wp:image -->

        <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
        <!-- /wp:image -->

        <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
        <!-- /wp:image -->

        <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
        <!-- /wp:image -->

        <!-- wp:image {"lightbox":{"enabled":true},"id":3662,"sizeSlug":"large","linkDestination":"none"} -->
        <figure class="wp-block-image size-large"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
        <!-- /wp:image -->
    </figure>
    <!-- /wp:gallery -->
</div>
<!-- /wp:group -->',
);