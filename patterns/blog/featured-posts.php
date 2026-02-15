<?php
/**
 * Title: Featured Posts
 * Slug: featured-posts
 * Categories: blog
 * Keywords: blog, featured, posts, grid, highlight
 * Description: A grid of featured blog posts.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"blog-featured-posts","name":"Featured Posts"},"align":"wide","layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignwide has-animation" style="animation-iteration-count:"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|sm","left":"var:preset|spacing|sm"},"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
    <div class="wp-block-columns alignwide has-animation" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);animation-iteration-count:"><!-- wp:column {"animation":{"duration":"","delay":"","iterationCount":"","event":""}} -->
        <div class="wp-block-column has-animation" style="animation-iteration-count:"><!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"duration":"","delay":"","iterationCount":"","event":""}} -->
                <div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","sizeSlug":"full","style":{"aspectRatio":{"all":""},"objectFit":{"all":""},"objectPosition":{"all":""},"height":{"all":"100%"},"width":{"all":""}}} /-->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                    <div class="wp-block-group has-animation" style="margin-top:0;margin-bottom:0;animation-iteration-count:"><!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-200","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                        <p class="has-neutral-200-color has-text-color has-animation" style="margin-top:0;margin-bottom:0;animation-iteration-count:">|</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:post-title {"isLink":true} /-->

                    <!-- wp:post-excerpt {"hideReadMore":true} /-->
                </div>
                <!-- /wp:group -->
                <!-- /wp:post-template -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-column has-animation" style="animation-iteration-count:"><!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->
                <!-- wp:columns {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}}} -->
                <div class="wp-block-columns" style="margin-bottom:var(--wp--preset--spacing--sm)"><!-- wp:column {"verticalAlignment":"center","width":"80px","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                    <div class="wp-block-column is-vertically-aligned-center has-animation" style="flex-basis:80px;animation-iteration-count:"><!-- wp:post-featured-image {"isLink":true,"width":"80px","height":"80px","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"aspectRatio":{"all":"16/9","desktop":"1/1"}}} /--></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"top","width":"75%","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                    <div class="wp-block-column is-vertically-aligned-top has-animation" style="flex-basis:75%;animation-iteration-count:"><!-- wp:group {"style":{"spacing":{"blockGap":{"left":"0"}}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                        <div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"20"} /-->

                            <!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"left":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","flexWrap":"nowrap"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                            <div class="wp-block-group has-animation" style="margin-top:0;margin-bottom:0;animation-iteration-count:"><!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->

                                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-200","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                                <p class="has-neutral-200-color has-text-color has-animation" style="margin-top:0;margin-bottom:0;animation-iteration-count:">|</p>
                                <!-- /wp:paragraph -->

                                <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:column -->
                </div>
                <!-- /wp:columns -->
                <!-- /wp:post-template -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->