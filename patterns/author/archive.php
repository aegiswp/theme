<?php
/**
 * Title: Author Archive
 * Slug: archive
 * Categories: author
 * Keywords: author, archive, posts, grid
 * Description: A full-width author archive with avatar header and three-column post grid.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["author"],"patternName":"author-archive"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignfull has-animation" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);animation-iteration-count:"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|md","margin":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","orientation":"vertical"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
    <div class="wp-block-group has-animation" style="margin-bottom:var(--wp--preset--spacing--xl);animation-iteration-count:"><!-- wp:avatar {"align":"center","style":{"border":{"radius":"100%"}}} /-->

        <!-- wp:query-title {"type":"archive","textAlign":"center","fontSize":"48"} /-->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-400","fontSize":"18","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-18-font-size aligncenter has-animation" style="margin-top:0;animation-iteration-count:"><?php echo esc_html__( 'Exploring ideas, sharing insights, and documenting the journey.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:separator {"opacity":"css","align":"wide","className":"has-text-color has-neutral-100-color is-style-wide"} -->
        <hr class="wp-block-separator alignwide has-css-opacity has-text-color has-neutral-100-color is-style-wide" />
        <!-- /wp:separator -->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide"} -->
    <div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","style":{"aspectRatio":{"all":""},"objectFit":{"all":""}}} /-->

            <!-- wp:post-terms {"term":"category","className":"is-style-sub-heading"} /-->

            <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"22"} /-->

            <!-- wp:post-excerpt {"excerptLength":16,"style":{"spacing":{"margin":{"top":"0"}}},"hideReadMore":true} /-->

            <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"textColor":"neutral-400","fontSize":"14"} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"paginationArrow":"arrow","style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
        <!-- wp:query-pagination-previous /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->

        <!-- wp:query-no-results -->
        <!-- wp:paragraph {"align":"center"} -->
        <p class="aligncenter has-text-align-center aligncenter"><?php echo esc_html__( 'No posts found by this author.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->