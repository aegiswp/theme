<?php
/**
 * Title: 03. Hero Pattern
 * Slug: aegis/hero-03
 * Categories: hero
 * Description: Full-width cover hero event awards with left, center, and right laurels, headline, and paragraphs
 * Keywords: announcement, awards, event, hero, promotion
 * Viewport Width: 1400
 * Block Types: core/group, core/cover, core/columns, core/column, core/image, core/heading, core/paragraph
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"default"},"metadata":{"name":"<?php echo esc_html_x('03. Hero Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","dimRatio":70,"overlayColor":"foreground","minHeight":100,"minHeightUnit":"vh","align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
    <div class="wp-block-cover alignwide" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50);min-height:100vh">
        <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
        <img class="wp-block-cover__image-background" alt="<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container">
            <!-- wp:columns {"verticalAlignment":"center"} -->
            <div class="wp-block-columns are-vertically-aligned-center">
                <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"0","bottom":"var:preset|spacing|30","left":"0"}}}} -->
                <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"wrap"}} -->
                    <div class="wp-block-group">
                        <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_left.svg" alt="<?php echo esc_attr__('Decorative element.', 'aegis'); ?>" style="width:40px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:group -->
                        <div class="wp-block-group">
                            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"fontSize":"small"} -->
                            <p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;line-height:1;text-transform:uppercase"><?php echo esc_html_x( '[Category]', 'Replace with a descriptive category', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"small"} -->
                            <p class="has-text-align-center has-small-font-size" style="margin-top:0"><?php echo esc_html_x( '[Nominee]', 'Replace with a nominee real name', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_right.svg" alt="<?php echo esc_attr__('Decorative element.', 'aegis'); ?>" style="width:40px" /></figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"0","bottom":"var:preset|spacing|30","left":"0"}}}} -->
                <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"wrap"}} -->
                    <div class="wp-block-group">
                        <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_left.svg" alt="<?php echo esc_attr__('Decorative element.', 'aegis'); ?>" style="width:40px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:group -->
                        <div class="wp-block-group">
                            <!-- wp:heading {"textAlign":"left","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"uppercase","lineHeight":"1","letterSpacing":"3px"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"small"} -->
                            <h1 class="wp-block-heading has-text-align-left has-small-font-size" style="margin-bottom:0;font-style:normal;font-weight:500;letter-spacing:3px;line-height:1;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive section title.', 'aegis'); ?></h1>
                            <!-- /wp:heading -->

                            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}},"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
                            <p class="has-text-align-center has-small-font-size" style="margin-top:0;text-transform:uppercase"><?php echo esc_html_x('[Date]', 'Replace with date of the event', 'aegis'); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_right.svg" alt="<?php echo esc_attr__('Decorative element.', 'aegis'); ?>" style="width:40px" /></figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"0","bottom":"var:preset|spacing|30","left":"0"}}}} -->
                <div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group">
                        <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_left.svg" alt="<?php echo esc_attr__('Decorative element.', 'aegis'); ?>" style="width:40px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:group -->
                        <div class="wp-block-group">
                            <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500","lineHeight":"1"}},"fontSize":"small"} -->
                            <p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;line-height:1;text-transform:uppercase"><?php echo esc_html_x( '[Category]', 'Replace with a descriptive category', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"small"} -->
                            <p class="has-text-align-center has-small-font-size" style="margin-top:0"><?php echo esc_html_x( '[Nominee]', 'Replace with a nominee real name', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none"} -->
                        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_right.svg" alt="<?php echo esc_attr__('Decorative element.', 'aegis'); ?>" style="width:40px" /></figure>
                        <!-- /wp:image -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->