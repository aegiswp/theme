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

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"two-column-featured","name":"Two Column Featured"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignwide has-animation" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);animation-iteration-count:"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
    <div class="wp-block-columns alignwide has-animation" style="animation-iteration-count:"><!-- wp:column {"width":"66.66%","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-column has-animation" style="flex-basis:66.66%;animation-iteration-count:"><!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"aspectRatio":{"all":"16/9"},"objectFit":{"all":"cover"}}} /-->

                    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"0","bottom":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","flexWrap":"nowrap"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                    <div class="wp-block-group has-animation" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--xxs);animation-iteration-count:"><!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->

                        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-200"} -->
                        <p class="has-neutral-200-color has-text-color" style="margin-top:0;margin-bottom:0">|</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"32"} /-->

                    <!-- wp:post-excerpt {"excerptLength":35,"hideReadMore":true} /-->

                    <!-- wp:post-author {"showBio":false,"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} /-->
                </div>
                <!-- /wp:group -->
                <!-- /wp:post-template -->
            </div>
            <!-- /wp:query -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"33.33%","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-column has-animation" style="flex-basis:33.33%;animation-iteration-count:"><!-- wp:paragraph {"className":"is-style-sub-heading","fontSize":"14"} -->
            <p class="is-style-sub-heading has-14-font-size"><?php echo esc_html__( 'Recent Posts', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":"1","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}},"border":{"bottom":{"color":"var:preset|color|neutral-100","width":"1px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--neutral-100);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)"><!-- wp:post-title {"level":5,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontWeight":"500","fontStyle":"normal"}},"fontSize":"16"} /-->

                    <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"var:preset|spacing|xxs","bottom":"0"}}},"textColor":"neutral-400","fontSize":"12"} /-->
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