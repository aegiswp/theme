<?php
/**
 * Title: 01. About Pattern
 * Slug: aegis/about-1
 * Categories: about
 * Description: This pattern features a tagline, heading, paragraph, media, and button, arranged in a compelling layout to introduce an organization or subject. It employs a diagonal gradient background and wide alignment for media-text blocks, enhancing visual appeal and focus.
 * Keywords: about, tagline, heading, paragraph, media, button, diagonal gradient, wide alignment
 * Viewport Width: 1400
 * Block Types: core/group, core/media-text, core/paragraph, core/heading, core/button
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>	

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"gradient":"diagonal-secondary-to-background","layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('01. About Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group has-diagonal-secondary-to-background-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:media-text {"align":"wide","mediaId":1410,"mediaLink":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","mediaType":"image","imageFill":false} -->
    <div class="wp-block-media-text alignwide is-stacked-on-mobile">
        <figure class="wp-block-media-text__media"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_attr__('Placeholder image - Replace with an image, photograph, or artwork.', 'aegis'); ?>" class="wp-image-1410 size-full" /></figure>
        <div class="wp-block-media-text__content">
            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"tiny"} -->
            <p class="has-text-align-left has-tiny-font-size" style="margin-bottom:0;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_e('[Tagline]', 'Replace with a descriptive tagline', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
            <h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
            <p style="margin-top:var(--wp--preset--spacing--30)"><?php echo esc_html_x('[Description (333 characters): Detail the core principles, values, or characteristics of the organization or subject.]', 'Replace with a description of the section', 'aegis'); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
                <div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
    </div>
    <!-- /wp:media-text -->
</div>
<!-- /wp:group -->