<?php
/**
 * Title: 05. Blog Pattern
 * Slug: aegis/blog-05
 * Categories: blog
 * Description: Display a list of blog entries with a left sidebar that includes titles, featured images, excerpts, and pagination on the right
 * Keywords: blog, posts, pagination, featured image, excerpt
 * Viewport Width: 1400
 * Block Types: core/group, core/query, core/post-template, core/post-featured-image, core/post-terms, core/post-date, core/post-title, core/post-excerpt, core/query-pagination, core/query-pagination-previous, core/query-pagination-numbers, core/query-pagination-next
 * Inserter: true
 * 
 * @package aegis
 * @since Aegis 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('05. Blog Pattern', 'Name of the pattern', 'aegis'); ?>"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column {"width":"33.33%","className":"is-style-hide-mobile"} -->
        <div class="wp-block-column is-style-hide-mobile" style="flex-basis:33.33%">
            <!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
            <div class="wp-block-group alignwide">
                <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40","top":"var:preset|spacing|40","right":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"border":{"width":"1px"}},"borderColor":"foreground","backgroundColor":"tertiary"} -->
                <div class="wp-block-group has-border-color has-foreground-border-color has-tertiary-background-color has-background" style="border-width:1px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
                    <!-- wp:image {"width":"120px","aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","align":"center","style":{"color":{"duotone":"unset"}},"className":"is-resized is-style-rounded"} -->
                    <figure class="wp-block-image aligncenter size-large is-resized is-style-rounded"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_800x800_dark.webp" alt="<?php echo esc_attr_e('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" style="aspect-ratio:1;object-fit:cover;width:120px" /></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
                    <h3 class="wp-block-heading has-text-align-center has-large-font-size"><?php echo esc_html_x('[Author]', 'Replace with an author name.', 'aegis'); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"5px"}}},"fontSize":"tiny"} -->
                    <p class="has-text-align-center has-tiny-font-size" style="margin-top:5px;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x('[Position]', 'Replace with a job position.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size"><?php echo esc_html_x('[Description (160 characters): Introduce the author and set the tone or purpose of the content.]', 'Replace with a description of the author.', 'aegis'); ?></p>
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
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background"} -->
            <div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background has-link-color">
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","right":"0","bottom":"0","left":"20px"}}}} -->
                <div class="wp-block-group" style="padding-top:20px;padding-right:0;padding-bottom:0;padding-left:20px">
                    <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
                    <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_e('[Advertising]', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_attr_e('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" style="aspect-ratio:1;object-fit:cover" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40"}},"border":{"width":"1px"}},"borderColor":"foreground","backgroundColor":"tertiary"} -->
            <div class="wp-block-group has-border-color has-foreground-border-color has-tertiary-background-color has-background"
                style="border-width:1px;padding-bottom:var(--wp--preset--spacing--40)">
                <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
                <figure class="wp-block-image aligncenter size-full"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_attr_e('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" style="aspect-ratio:16/9;object-fit:cover" /></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|40","bottom":"0","left":"var:preset|spacing|40"}}}} -->
                <div class="wp-block-group" style="padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)">
                    <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
                    <h3 class="wp-block-heading has-text-align-center has-large-font-size"><?php echo esc_html_e('[Product]', 'aegis'); ?></h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"align":"center","fontSize":"small"} -->
                    <p class="has-text-align-center has-small-font-size"><?php echo esc_html_x('[Description (50-150 characters): Enter a brief overview of a product.]', 'Replace with a product description.', 'aegis'); ?></p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"className":"is-style-fill"} -->
                    <div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text.', 'aegis' ); ?></a></div>
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
                <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"className":"is-style-default","layout":{"type":"default"}} -->
                <div class="wp-block-group is-style-default" style="padding-right:0;padding-left:0">
                    <!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]}} -->
                    <div class="wp-block-query">
                        <!-- wp:post-template {"layout":{"type":"default"}} -->
                        <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"color":{"duotone":"unset"}},"className":"is-style-default"} /-->

                        <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
                        <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
                            <!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"className":"is-style-aegis-post-title-hide-underline","fontSize":"huge"} /-->

                            <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex"}} -->
                            <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:0;padding-bottom:0;padding-left:0">
                                <!-- wp:post-date {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"top":"5px","right":"15px","bottom":"5px","left":"15px"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"backgroundColor":"tertiary","fontSize":"tiny"} /-->

                                <!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"15px","right":"15px"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"tertiary","fontSize":"tiny"} /-->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:post-excerpt {"moreText":"Read More","className":"is-style-default"} /-->
                        </div>
                        <!-- /wp:group -->
                        <!-- /wp:post-template -->

                        <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"layout":{"type":"flex","justifyContent":"space-between"},"fontSize":"small"} -->
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