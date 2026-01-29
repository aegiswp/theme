<?php
/**
 * Title: Two Column Featured
 * Slug: two-column-featured
 * Categories: blog
 * Keywords: blog, two column, featured, sidebar, posts
 * Description: Two column layout with featured post and sidebar list.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"two-column-featured","name":"Two Column Featured"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide"><!-- wp:column {"width":"66.66%"} -->
        <div class="wp-block-column" style="flex-basis:66.66%">
            <!-- wp:query {"queryId":0,"query":{"perPage":"1","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group">
                    <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"aspectRatio":{"all":"16/9"},"objectFit":{"all":"cover"},"border":{"radius":"12px"}}} /-->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"0","bottom":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--xxs)">
                        <!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"3px","left":"3px"}}},"textColor":"neutral-200"} -->
                        <p class="has-neutral-200-color has-text-color" style="margin-top:0;margin-bottom:0;padding-right:3px;padding-left:3px">|</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"36"} /-->

                    <!-- wp:post-excerpt {"excerptLength":35,"hideReadMore":true} /-->

                    <!-- wp:post-author {"showBio":false,"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} /-->
                </div>
                <!-- /wp:group -->
                <!-- /wp:post-template -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"33.33%"} -->
        <div class="wp-block-column" style="flex-basis:33.33%">
            <!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}},"typography":{"fontWeight":"600","textTransform":"uppercase","letterSpacing":"0.05em"}},"fontSize":"14"} -->
            <h4 class="wp-block-heading has-14-font-size" style="margin-bottom:var(--wp--preset--spacing--md);font-weight:600;letter-spacing:0.05em;text-transform:uppercase">Recent Posts</h4>
            <!-- /wp:heading -->

            <!-- wp:query {"queryId":0,"query":{"perPage":"4","pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)">
                    <!-- wp:post-title {"level":5,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontWeight":"500"}},"fontSize":"16"} /-->

                    <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs","bottom":"0"}}},"textColor":"neutral-400","fontSize":"13"} /-->
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