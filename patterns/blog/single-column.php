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

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"blog-single-column","name":"Single Column"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignwide has-animation" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);animation-iteration-count:"><!-- wp:heading {"textAlign":"center","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
    <h2 class="wp-block-heading has-text-align-center has-animation" style="animation-iteration-count:"><?php echo esc_html__( 'Latest Posts', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"contentSize":null,"type":"constrained"}} -->
    <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
        <!-- wp:post-featured-image {"height":"200px"} /-->

        <!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"},"margin":{"top":"0","bottom":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","flexWrap":"nowrap"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-group has-animation" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--xxs);animation-iteration-count:"><!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-200","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
            <p class="has-neutral-200-color has-text-color has-animation" style="margin-top:0;margin-bottom:0;animation-iteration-count:">|</p>
            <!-- /wp:paragraph -->

            <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|xs"}}}} /-->

        <!-- wp:post-excerpt {"moreText":"Read more","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}}} /-->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"center"}} -->
        <!-- wp:query-pagination-previous /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->

        <!-- wp:query-no-results {"align":"center"} -->
        <!-- wp:paragraph {"placeholder":"Add text or blocks that will display when the query returns no results."} -->
        <p></p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->