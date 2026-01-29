<?php
/**
 * Title: Single Column
 * Slug: single-column
 * Categories: blog
 * Keywords: blog, single, column, posts, list
 * Description: A single column blog post list.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"single-column","name":"Single Column"},"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
    <!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}}} -->
    <h1 class="wp-block-heading has-text-align-center" style="margin-top:var(--wp--preset--spacing--lg)">Latest Posts</h1>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"contentSize":null,"type":"constrained"},"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|lg","top":"var:preset|spacing|sm"}}}} -->
    <div style="padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--lg)" class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
        <!-- wp:post-featured-image {"height":"200px"} /-->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"0","bottom":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--xxs)">
            <!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"3px","left":"3px"}}},"textColor":"neutral-200"} -->
            <p class="has-neutral-200-color has-text-color" style="margin-top:0;margin-bottom:0;padding-right:3px;padding-left:3px">|</p>
            <!-- /wp:paragraph -->

            <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0px","bottom":"var:preset|spacing|xs"}}}} /-->

        <!-- wp:post-excerpt {"moreText":"Read more","style":{"spacing":{"margin":{"bottom":"2em"}}}} /-->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination -->
        <!-- wp:query-pagination-previous /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->

        <!-- wp:query-no-results -->
        <!-- wp:paragraph {"placeholder":"Add text or blocks that will display when the query returns no results."} -->
        <p></p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->