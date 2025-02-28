<?php
/**
 * Title: 05. Gallery Pattern
 * Slug: aegis/gallery-05
 * Categories: gallery, media
 * Description: An expansive full-width image gallery designed to showcase a collection of photographs prominently. This layout emphasizes the visual impact with large images aligned in a seamless full-width display, complemented by minimalistic textual elements for descriptions.
 * Keywords: gallery, images, full-width, photo display, media
 * Viewport Width: 1200
 * Block Types: core/group, core/gallery, core/paragraph, core/heading, core/image
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"backgroundColor":"foreground","layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('05. Gallery Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
    <div class="wp-block-group has-foreground-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0","margin":{"bottom":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
    <div class="wp-block-group has-background-color has-text-color has-link-color"
        style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
        <p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('[Tagline]', 'Replace with a descriptive section tagline', 'aegis'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"style":{"typography":{"fontSize":"6rem","textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
        <h2 class="wp-block-heading" style="margin-top:0;margin-bottom:0;font-size:6rem;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive section title.', 'aegis'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}}} -->
        <p class="has-text-align-center" style="margin-top:0"><?php echo esc_html_x('[Description (333 characters): Provide a brief overview of specific photographs, including themes, or special highlights.]', 'Replace with a description of the section', 'aegis'); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"full","layout":{"type":"default"}} -->
    <div class="wp-block-group alignfull">
        <!-- wp:gallery {"imageCrop":false,"linkTo":"none","align":"full"} -->
        <figure class="wp-block-gallery alignfull has-nested-images columns-default">
            <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers', 'aegis'); ?>" /></figure>
            <!-- /wp:image -->

            <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers', 'aegis'); ?>" /></figure>
            <!-- /wp:image -->

            <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers', 'aegis'); ?>" /></figure>
            <!-- /wp:image -->

            <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers', 'aegis'); ?>" /></figure>
            <!-- /wp:image -->

            <!-- wp:image {"lightbox":{"enabled":true},"sizeSlug":"large","linkDestination":"none"} -->
            <figure class="wp-block-image size-large"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers', 'aegis'); ?>" /></figure>
            <!-- /wp:image -->
        </figure>
        <!-- /wp:gallery -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->