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

<!-- wp:group {"lock":{"move":false,"remove":false},"metadata":{"categories":["blog"],"patternName":"featured-post"},"align":"wide","className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide is-style-default"
    style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
    <!-- wp:columns {"align":"wide","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
    <div class="wp-block-columns alignwide is-style-surface"
        style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
        <!-- wp:column {"width":""} -->
        <div class="wp-block-column">
            <!-- wp:query {"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":{"category":[105052]}},"enhancedPagination":true,"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:columns -->
                <div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":""} -->
                    <div class="wp-block-column is-vertically-aligned-center">
                        <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"objectPosition":{"all":"top"}}} /-->
                    </div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":""} -->
                    <div class="wp-block-column is-vertically-aligned-center">
                        <!-- wp:group {"align":"wide","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                        <div class="wp-block-group alignwide">
                            <!-- wp:paragraph {"align":"left","className":"is-style-sub-heading","style":{"typography":{"lineHeight":"0"}}} -->
                            <p class="alignleft has-text-align-left is-style-sub-heading alignleft"
                                style="line-height:0">Featured</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:post-title {"isLink":true} /-->

                            <!-- wp:group {"style":{"spacing":{"blockGap":{"top":"4px","left":"4px"},"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"display":{"mobile":"none"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","orientation":"horizontal"}} -->
                            <div class="wp-block-group"
                                style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                                <!-- wp:post-terms {"term":"category","className":"is-style-default","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"12"} /-->

                                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"12"} -->
                                <p class="has-12-font-size" style="margin-top:0;margin-bottom:0">|</p>
                                <!-- /wp:paragraph -->

                                <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"12"} /-->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:post-excerpt {"excerptLength":25,"hideReadMore":true} /-->
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