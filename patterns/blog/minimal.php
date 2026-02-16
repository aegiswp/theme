<?php
/**
 * Title: Minimal
 * Slug: minimal
 * Categories: blog
 * Keywords: blog, minimal, clean, text, simple
 * Description: A clean, text-focused minimal blog layout.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"minimal","name":"Minimal"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":""},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group has-animation" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);animation-iteration-count:"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
    <h2 class="wp-block-heading has-text-align-center has-animation" style="margin-bottom:var(--wp--preset--spacing--lg);animation-iteration-count:"><?php echo esc_html__( 'Latest Articles', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"style":{"spacing":{"blockGap":"0"}}} -->
    <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-group has-animation" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);animation-iteration-count:"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
            <div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-terms {"term":"category","className":"is-style-sub-heading"} /-->

                <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontWeight":"500","fontStyle":"normal"}},"fontSize":"20"} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-400","fontSize":"14"} /-->
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