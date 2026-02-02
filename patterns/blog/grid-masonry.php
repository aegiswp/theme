<?php

/**
 * Title: Grid Masonry
 * Slug: grid-masonry
 * Categories: blog
 * Keywords: blog, grid, masonry, posts, alternating
 * Description: A masonry-style grid with alternating post sizes.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"grid-masonry","name":"Grid Masonry"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignwide has-animation" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);animation-iteration-count:"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|md","left":"var:preset|spacing|md"}}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
    <div class="wp-block-columns alignwide has-animation" style="animation-iteration-count:"><!-- wp:column {"width":"60%","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-column has-animation" style="flex-basis:60%;animation-iteration-count:"><!-- wp:query {"queryId":0,"query":{"perPage":"1","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"duration":"","delay":"","iterationCount":"","event":""}} -->
                <div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","style":{"aspectRatio":{"all":""},"objectFit":{"all":""}}} /-->

                    <!-- wp:post-terms {"term":"category","className":"is-style-default","style":{"typography":{"textDecoration":"none","fontWeight":"500","fontStyle":"normal"}}} /-->

                    <!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"36"} /-->

                    <!-- wp:post-excerpt {"excerptLength":30,"hideReadMore":true} /-->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                    <div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /--></div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
                <!-- /wp:post-template -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"40%","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-column has-animation" style="flex-basis:40%;animation-iteration-count:"><!-- wp:query {"queryId":0,"query":{"perPage":"2","pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"style":{"spacing":{"blockGap":"var:preset|spacing|md"}}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xs","left":"var:preset|spacing|xs"},"margin":{"bottom":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                <div class="wp-block-group has-animation" style="margin-bottom:var(--wp--preset--spacing--sm);animation-iteration-count:"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"aspectRatio":{"all":""},"objectFit":{"all":""}}} /-->

                    <!-- wp:post-terms {"term":"category","className":"is-style-default","style":{"typography":{"textDecoration":"none","fontWeight":"500","fontStyle":"normal"}},"fontSize":"14"} /-->

                    <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"24"} /-->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                    <div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /--></div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
                <!-- /wp:post-template -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->