<?php
/**
 * Title: Grid Boxed
 * Slug: grid-boxed
 * Categories: blog
 * Keywords: blog, grid, boxed, posts, cards
 * Description: A boxed grid layout for blog posts.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"grid-boxed","name":"Grid Boxed"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","right":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--sm)">
    <!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","style":{"spacing":{"blockGap":"1em"}}} -->
    <div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:group {"className":"is-style-surface has-background-white-color","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"1em"}},"backgroundColor":"white","layout":{"type":"default"}} -->
        <div class="wp-block-group is-style-surface has-background-white-color has-white-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
            <!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":{"topRight":"6px","bottomLeft":"0px","bottomRight":"0px"}},"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"aspectRatio":{"all":"16/9"},"objectFit":{"all":"cover"}}} /-->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5em","right":"1.5em","bottom":"1.5em","left":"1.5em"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:1.5em;padding-right:1.5em;padding-bottom:1.5em;padding-left:1.5em">
                <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->

                <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"24"} /-->

                <!-- wp:post-excerpt {"moreText":"Read more","style":{"spacing":{"margin":{"right":"0","left":"0"}}},"hideReadMore":true} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
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
