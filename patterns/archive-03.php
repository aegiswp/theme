<?php
/**
 * Title: 03. Archive Pattern
 * Slug: aegis/archive-03
 * Categories: blog
 * Description: A visually engaging archive pattern featuring a cover block with a featured image, post titles, excerpts, and pagination. The design includes a diagonal gradient background and centered text for enhanced readability and aesthetic appeal.
 * Keywords: archive, blog, cover block, featured image, post title, excerpt, pagination, gradient
 * Viewport Width: 1400
 * Block Types: core/group, core/query-title, core/query, core/post-template, core/cover, core/post-title, core/post-excerpt, core/query-pagination
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('03. Archive Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["blog"],"patternName":"aegis/blog-01"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
    <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","orientation":"vertical"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:query-title {"type":"archive","level":2,"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"huge"} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"parents":[],"taxQuery":null},"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"35rem"}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|60"},"margin":{"bottom":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","gradient":"diagonal-foreground-to-transparent-right-bottom"} -->
        <div class="wp-block-group has-background-color has-diagonal-foreground-to-transparent-right-bottom-gradient-background has-text-color has-background has-link-color"
            style="margin-bottom:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60)">
            <!-- wp:cover {"useFeaturedImage":true,"dimRatio":70,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":55,"minHeightUnit":"vh","className":"is-style-default","style":{"spacing":{"padding":{"right":"0","left":"0"}},"dimensions":{"aspectRatio":"16/9"},"color":{}},"layout":{"type":"default"}} -->
            <div class="wp-block-cover is-style-default" style="padding-right:0;padding-left:0;min-height:55vh"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span>
                <div class="wp-block-cover__inner-container">
                    <!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"className":"is-style-aegis-post-title-hide-underline","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|quaternary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"background","fontSize":"huge"} /-->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|20"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
                <!-- wp:post-excerpt {"moreText":"Read More"} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","layout":{"type":"flex","justifyContent":"space-between","orientation":"horizontal"}} -->
        <!-- wp:query-pagination-previous /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->