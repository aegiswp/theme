<?php
/**
 * Title: 01. Archive Pattern
 * Slug: aegis/archive-01
 * Categories: blog
 * Description: A wide, grid-based archive pattern featuring post titles, featured images, excerpts, and pagination with a focus on readability and user navigation.
 * Keywords: archive, blog, grid, pagination, post list
 * Viewport Width: 1400
 * Block Types: core/group, core/query-title, core/query, core/post-template, core/post-featured-image, core/post-terms, core/post-date, core/post-title, core/post-excerpt, core/query-pagination
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('01. Archive Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["blog"],"patternName":"aegis/archive-01"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
    <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","orientation":"vertical"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:query-title {"type":"archive","level":2,"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"huge"} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"parents":[],"taxQuery":null},"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"35rem"}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40"},"margin":{"bottom":"var:preset|spacing|40"}}}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
            <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"},"margin":{"top":"0px"}}},"backgroundColor":"tertiary","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center","orientation":"horizontal"}} -->
            <div class="wp-block-group has-tertiary-background-color has-background" style="margin-top:0px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
                <!-- wp:post-terms {"term":"category","textAlign":"right","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} /-->

                <!-- wp:post-date {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:post-title {"level":3,"isLink":true,"className":"is-style-hide-underline","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"fontSize":"huge"} /-->

            <!-- wp:post-excerpt {"moreText":"Read More"} /-->
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