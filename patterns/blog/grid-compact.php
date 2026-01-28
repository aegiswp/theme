<?php
/**
 * Title: Grid Compact
 * Slug: grid-compact
 * Categories: blog
 * Keywords: blog, grid, compact, small, thumbnail
 * Description: A compact grid with small thumbnails and titles.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"grid-compact","name":"Grid Compact"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:query {"queryId":0,"query":{"perPage":4,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|md"}}} -->
    <div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"grid","columnCount":4}} -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
        <div class="wp-block-group">
            <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","style":{"aspectRatio":{"all":"1"},"objectFit":{"all":"cover"},"border":{"radius":"8px"}}} /-->

            <!-- wp:post-terms {"term":"category","className":"is-style-default","style":{"typography":{"textDecoration":"none","fontWeight":"500","textTransform":"uppercase","letterSpacing":"0.05em"}},"fontSize":"10"} /-->

            <!-- wp:post-title {"level":4,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontWeight":"500","lineHeight":"1.4"}},"fontSize":"16"} /-->

            <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs","bottom":"0"}}},"textColor":"neutral-400","fontSize":"12"} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
        <!-- wp:query-pagination-previous /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->