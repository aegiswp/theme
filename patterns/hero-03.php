<?php
/**
 * Title: 03. Hero Pattern
 * Slug: aegis/hero-03
 * Categories: hero
 * Description: Block pattern featuring a centered layout with a full-screen cover, headline, description, and laurels for categories or nominees, designed for accessibility and impactful presentation.
 * Keywords: hero, cover, headline, description, laurels, categories, nominees
 * Viewport Width: 1400
 * Block Types: core/columns, core/cover, core/group, core/heading, core/image, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('03. Hero Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('hero', 'Name of the category', 'aegis'); ?>"],"patternName":"aegis/hero-03"},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull">
    <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>","dimRatio":60,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
    <div class="wp-block-cover alignwide" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50);min-height:100vh">
        <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-30px"}}},"fontSize":"tiny"} -->
                <p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-30px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">
                    <?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
                <h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase">
                    <?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?>
                </h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"layout":{"selfStretch":"fixed","flexSize":"50%"},"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
                <p class="has-text-align-center" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0">
                    <?php echo esc_html_x('Provide a concise description, up to 155 characters, summarizing the key points of an offer, article, or news update.', 'Replace with a description of the section.', 'aegis'); ?>
                </p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"layout":{"type":"constrained","contentSize":"75%","justifyContent":"center"}} -->
            <div class="wp-block-group">
                <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"blockGap":{"left":"var:preset|spacing|80"}}}} -->
                <div class="wp-block-columns are-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                    <!-- wp:column {"verticalAlignment":"center","width":"22%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:22%">
                        <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"wrap"}} -->
                        <div class="wp-block-group">
                            <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","isDecorative":true} -->
                            <figure class="wp-block-image size-full is-resized">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_left.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:40px" />
                            </figure>
                            <!-- /wp:image -->

                            <!-- wp:group -->
                            <div class="wp-block-group">
                                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}},"fontSize":"small"} -->
                                <p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:600;letter-spacing:3px;line-height:1;text-transform:uppercase">
                                    <?php echo esc_html_x('Category', 'Replace with a descriptive category.', 'aegis'); ?>
                                </p>
                                <!-- /wp:paragraph -->

                                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"small"} -->
                                <p class="has-text-align-center has-small-font-size" style="margin-top:0">
                                    <?php echo esc_html_x('Nominee', 'Replace with the name of a nominee.', 'aegis'); ?>
                                </p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","isDecorative":true} -->
                            <figure class="wp-block-image size-full is-resized">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_right.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:40px" />
                            </figure>
                            <!-- /wp:image -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":"22%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:22%">
                        <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"wrap"}} -->
                        <div class="wp-block-group">
                            <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","isDecorative":true} -->
                            <figure class="wp-block-image size-full is-resized">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_left.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:40px" />
                            </figure>
                            <!-- /wp:image -->

                            <!-- wp:group -->
                            <div class="wp-block-group">
                                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}},"fontSize":"small"} -->
                                <p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:600;letter-spacing:3px;line-height:1;text-transform:uppercase">
                                    <?php echo esc_html_x('Category', 'Replace with a descriptive category.', 'aegis'); ?>
                                </p>
                                <!-- /wp:paragraph -->

                                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"small"} -->
                                <p class="has-text-align-center has-small-font-size" style="margin-top:0">
                                    <?php echo esc_html_x('Nominee', 'Replace with the name of a nominee.', 'aegis'); ?>
                                </p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","isDecorative":true} -->
                            <figure class="wp-block-image size-full is-resized">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_right.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:40px" />
                            </figure>
                            <!-- /wp:image -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":"22%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
                    <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:22%">
                        <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"wrap"}} -->
                        <div class="wp-block-group">
                            <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","isDecorative":true} -->
                            <figure class="wp-block-image size-full is-resized">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_left.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:40px" />
                            </figure>
                            <!-- /wp:image -->

                            <!-- wp:group -->
                            <div class="wp-block-group">
                                <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}},"fontSize":"small"} -->
                                <p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:600;letter-spacing:3px;line-height:1;text-transform:uppercase">
                                    <?php echo esc_html_x('Category', 'Replace with a descriptive category.', 'aegis'); ?>
                                </p>
                                <!-- /wp:paragraph -->

                                <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"small"} -->
                                <p class="has-text-align-center has-small-font-size" style="margin-top:0">
                                    <?php echo esc_html_x('Nominee', 'Replace with the name of a nominee.', 'aegis'); ?>
                                </p>
                                <!-- /wp:paragraph -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","isDecorative":true} -->
                            <figure class="wp-block-image size-full is-resized">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_right.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:40px" />
                            </figure>
                            <!-- /wp:image -->
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
<!-- /wp:group -->