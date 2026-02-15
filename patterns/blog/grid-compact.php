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

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"blog-grid-compact","name":"Grid Compact"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignwide has-animation" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);animation-iteration-count:"><!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|md"}}} -->
    <div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"grid","columnCount":4}} -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","style":{"aspectRatio":{"all":"1"},"objectFit":{"all":"cover"}}} /-->

            <!-- wp:post-terms {"term":"category","className":"is-style-sub-heading","showAll":false} /-->

            <!-- wp:post-title {"level":4,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontWeight":"500","lineHeight":"1.4","fontStyle":"normal"}},"fontSize":"18"} /-->

            <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs","bottom":"0"}}},"textColor":"neutral-400","fontSize":"12"} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"paginationArrow":"arrow","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
        <!-- wp:query-pagination-previous /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->

        <!-- wp:query-no-results -->
        <!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results."} -->
        <p class="aligncenter has-text-align-center aligncenter"></p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->