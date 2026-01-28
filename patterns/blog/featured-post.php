<?php
/**
 * Title: Featured Post
 * Slug: featured-post
 * Categories: blog
 * Keywords: blog, featured, post, highlight
 * Description: A highlighted featured post layout.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"lock":{"move":false,"remove":false},"metadata":{"categories":["blog"],"patternName":"featured-post","name":"Featured Post"},"align":"wide","className":"is-style-default","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide is-style-default">
    <!-- wp:columns {"align":"wide","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"},"blockGap":{"top":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}}} -->
    <div class="wp-block-columns alignwide is-style-surface"
        style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--lg)">
        <!-- wp:column {"width":""} -->
        <div class="wp-block-column">
            <!-- wp:query {"queryId":0,"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"enhancedPagination":true,"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:columns {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}}}} -->
                <div class="wp-block-columns" style="padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)">
                    <!-- wp:column {"verticalAlignment":"center","width":""} -->
                    <div class="wp-block-column is-vertically-aligned-center">
                        <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"objectPosition":{"all":"top"}}} /-->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":""} -->
                    <div class="wp-block-column is-vertically-aligned-center">
                        <!-- wp:group {"align":"wide","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                        <div class="wp-block-group alignwide">
                            <!-- wp:paragraph {"align":"left","className":"is-style-sub-heading","style":{"typography":{"lineHeight":"0"}}} -->
                            <p class="alignleft has-text-align-left is-style-sub-heading alignleft" style="line-height:0">Featured</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:post-title {"isLink":true} /-->

                            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                            <div class="wp-block-group" style="margin-top:0;margin-bottom:0">
                                <!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->

                                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"3px","left":"3px"}}},"textColor":"neutral-200"} -->
                                <p class="has-neutral-200-color has-text-color" style="margin-top:0;margin-bottom:0;padding-right:3px;padding-left:3px">|</p>
                                <!-- /wp:paragraph -->

                                <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:post-excerpt {"excerptLength":55,"hideReadMore":true} /-->
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