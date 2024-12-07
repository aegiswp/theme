<?php
/**
 * Title: 08. Archive Pattern
 * Slug: aegis/archive-08
 * Categories: archives
 * Description: Block pattern presenting an archive of posts with a sidebar layout with an author profile, ad space, and posts featuring dates, featured images, titles, excerpts, and pagination.
 * Keywords: archive, ad, author, date, excerpt, featured image, pagination, title
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/column, core/columns, core/group, core/heading, core/image, core/paragraph, core/post-date, core/post-excerpt, core/post-featured-image, core/post-template, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('08. Archive Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["archives"],"patternName":"aegis/archive-07"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"width":"33.33%","className":"is-style-hide-mobile"} -->
        <div class="wp-block-column is-style-hide-mobile" style="flex-basis:33.33%">
            <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40","top":"var:preset|spacing|40","right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"gradient":"diagonal-tertiary-to-transparent-right-bottom"} -->
            <div class="wp-block-group has-diagonal-tertiary-to-transparent-right-bottom-gradient-background has-background"
                style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
                <!-- wp:image {"width":"120px","aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","align":"center","className":"is-resized is-style-rounded","style":{"color":{"duotone":"unset"}}} -->
                <figure class="wp-block-image aligncenter size-large is-resized is-style-rounded"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_800x800_dark.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="aspect-ratio:1;object-fit:cover;width:120px" /></figure>
                <!-- /wp:image -->

                <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
                <h3 class="wp-block-heading has-text-align-center has-large-font-size"><?php echo esc_html_x( 'Author Name', 'Enter the author name here.', 'aegis' ); ?></h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"5px"}}},"fontSize":"tiny"} -->
                <p class="has-text-align-center has-tiny-font-size" style="margin-top:5px;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Position', 'Enter the author position here.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                <p class="has-text-align-center has-small-font-size">
                    <?php echo esc_html_x('Provide a concise description, up to 160 characters, summarizing the author biography.', 'Replace with a description of the section.', 'aegis'); ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:social-links {"iconColor":"tertiary","iconColorValue":"#f3f4f5","iconBackgroundColor":"foreground","iconBackgroundColorValue":"#211F1D","className":"is-style-default","layout":{"type":"flex","justifyContent":"center"}} -->
                <ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default">
                    <!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->

                    <!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->

                    <!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->

                    <!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress"} /-->
                </ul>
                <!-- /wp:social-links -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background"} -->
            <div
                class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background has-link-color">
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","right":"0","bottom":"0","left":"20px"}}}} -->
                <div class="wp-block-group" style="padding-top:20px;padding-right:0;padding-bottom:0;padding-left:20px">
                    <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                    <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Ad Space', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="aspect-ratio:1;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"className":"is-style-section-dark","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40"}}},"gradient":"diagonal-foreground-to-transparent-left-bottom"} -->
            <div class="wp-block-group is-style-section-dark has-diagonal-foreground-to-transparent-left-bottom-gradient-background has-background"
                style="padding-bottom:var(--wp--preset--spacing--40)">
                <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|40","bottom":"0","left":"var:preset|spacing|40"}}}} -->
                <div class="wp-block-group" style="padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)">
                    <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
                    <h3 class="wp-block-heading has-text-align-center has-large-font-size"><?php echo esc_html_x( 'Product Name', 'Enter a brief and descriptive product title here.', 'aegis' ); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size">
                        <?php echo esc_html_x('Provide a concise description, up to 50 characters, summarizing the key points of an offer.', 'Replace with a description of the section.', 'aegis'); ?>
                    </p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"className":"is-style-fill"} -->
                    <div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"66.66%","layout":{"type":"default"}} -->
        <div class="wp-block-column" style="flex-basis:66.66%">
            <!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0","padding":{"right":"0"}}}} -->
            <div class="wp-block-group alignfull" style="padding-right:0">
                <!-- wp:group {"className":"is-style-default","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"default"}} -->
                <div class="wp-block-group is-style-default" style="padding-right:0;padding-left:0">
                    <!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[]}} -->
                    <div class="wp-block-query">
                        <!-- wp:post-template {"layout":{"type":"default"}} -->
                        <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","className":"is-style-default","style":{"color":{"duotone":"unset"}}} /-->

                        <!-- wp:group {"className":"has-negative-margin","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0","margin":{"top":"-65px"}}},"layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap"}} -->
                        <div class="wp-block-group has-negative-margin"
                            style="margin-top:-65px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                            <!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"10px","right":"5px"}}},"backgroundColor":"tertiary","fontSize":"tiny"} -->
                            <p class="has-tertiary-background-color has-background has-tiny-font-size" style="padding-top:20px;padding-right:5px;padding-bottom:20px;padding-left:10px">Published:</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:post-date {"className":"is-style-default","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"top":"20px","right":"10px","bottom":"20px","left":"0px"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"backgroundColor":"tertiary","textColor":"foreground","fontSize":"tiny"} /-->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"bottom":"var:preset|spacing|30"}}},"gradient":"diagonal-tertiary-to-transparent-right-bottom"} -->
                        <div class="wp-block-group has-diagonal-tertiary-to-transparent-right-bottom-gradient-background has-background" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                            <!-- wp:post-title {"level":3,"isLink":true,"className":"is-style-aegis-post-title-hide-underline is-style-hide-underline","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}},"fontSize":"huge"} /-->

                            <!-- wp:post-excerpt {"moreText":"Read More","className":"is-style-default"} /-->
                        </div>
                        <!-- /wp:group -->
                        <!-- /wp:post-template -->

                        <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"tiny","layout":{"type":"flex","justifyContent":"space-between"}} -->
                        <!-- wp:query-pagination-previous /-->

                        <!-- wp:query-pagination-numbers /-->

                        <!-- wp:query-pagination-next /-->
                        <!-- /wp:query-pagination -->
                    </div>
                    <!-- /wp:query -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->