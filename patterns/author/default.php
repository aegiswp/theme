<?php
/**
 * Title: List with Author
 * Slug: default
 * Categories: author
 * Keywords: blog, list, author, posts, horizontal
 * Description: A horizontal list layout with author information.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["author"],"patternName":"default","name":"List with Author"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"},"animation":{"duration":"","delay":"","iterationCount":""}} -->
<div class="wp-block-group alignwide has-animation" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);animation-iteration-count:">
    <!-- wp:query {"queryId":0,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide","style":{"spacing":{"blockGap":"0"}}} -->
    <div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"default"}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"default"},"animation":{"duration":"","delay":"","iterationCount":""}} -->
        <div class="wp-block-group has-animation" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);animation-iteration-count:">
            <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|md","left":"var:preset|spacing|lg"}}},"animation":{"duration":"","delay":"","iterationCount":""}} -->
            <div class="wp-block-columns are-vertically-aligned-center has-animation" style="animation-iteration-count:">
                <!-- wp:column {"verticalAlignment":"center","width":"35%","animation":{"duration":"","delay":"","iterationCount":""}} -->
                <div class="wp-block-column is-vertically-aligned-center has-animation" style="flex-basis:35%;animation-iteration-count:">
                    <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"aspectRatio":{"all":""},"objectFit":{"all":""}}} /-->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"verticalAlignment":"center","width":"65%","animation":{"duration":"","delay":"","iterationCount":""}} -->
                <div class="wp-block-column is-vertically-aligned-center has-animation" style="flex-basis:65%;animation-iteration-count:">
                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"duration":"","delay":"","iterationCount":""}} -->
                    <div class="wp-block-group has-animation" style="animation-iteration-count:">
                        <!-- wp:post-terms {"term":"category","className":"is-style-sub-heading"} /-->

                        <!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"28"} /-->

                        <!-- wp:post-excerpt {"excerptLength":20,"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs","bottom":"0"}}},"hideReadMore":true} /-->

                        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"nowrap"},"animation":{"duration":"","delay":"","iterationCount":""}} -->
                        <div class="wp-block-group has-animation" style="margin-top:var(--wp--preset--spacing--sm);animation-iteration-count:">
                            <!-- wp:post-author {"avatarSize":40,"showBio":false,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

                            <!-- wp:paragraph {"style":{"spacing":{"padding":{"right":"3px","left":"3px"},"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-200"} -->
                            <p class="has-neutral-200-color has-text-color" style="margin-top:0;margin-bottom:0;padding-right:3px;padding-left:3px">|</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"16"} /-->

                            <!-- wp:paragraph {"style":{"spacing":{"padding":{"right":"3px","left":"3px"},"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-200"} -->
                            <p class="has-neutral-200-color has-text-color" style="margin-top:0;margin-bottom:0;padding-right:3px;padding-left:3px">|</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:read-more {"content":"Read more →","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary-500"}}},"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"paginationArrow":"arrow","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
        <!-- wp:query-pagination-previous /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->