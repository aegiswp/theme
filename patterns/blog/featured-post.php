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

<!-- wp:group {"lock":{"move":false,"remove":false},"metadata":{"categories":["blog"],"patternName":"featured-post","name":"Featured Post"},"align":"wide","className":"is-style-default","layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignwide is-style-default has-animation" style="animation-iteration-count:"><!-- wp:columns {"align":"wide","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"},"blockGap":{"top":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
    <div class="wp-block-columns alignwide is-style-surface has-animation" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--lg);animation-iteration-count:"><!-- wp:column {"width":"","animation":{"duration":"","delay":"","iterationCount":"","event":""}} -->
        <div class="wp-block-column has-animation" style="animation-iteration-count:"><!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[],"format":[]},"style":{"spacing":{"blockGap":"0"}}} -->
            <div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
                <!-- wp:columns {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}}},"animation":{"duration":"","delay":"","iterationCount":"","event":""}} -->
                <div class="wp-block-columns has-animation" style="padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);animation-iteration-count:"><!-- wp:column {"verticalAlignment":"center","width":"","animation":{"event":"","iterationCount":"","delay":"","duration":""}} -->
                    <div class="wp-block-column is-vertically-aligned-center has-animation" style="animation-iteration-count:"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"objectPosition":{"all":""}}} /--></div>
                    <!-- /wp:column -->

                    <!-- wp:column {"verticalAlignment":"center","width":"","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
                    <div class="wp-block-column is-vertically-aligned-center has-animation" style="animation-iteration-count:"><!-- wp:group {"align":"wide","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
                        <div class="wp-block-group alignwide"><!-- wp:paragraph {"align":"left","className":"is-style-sub-heading","style":{"typography":{"lineHeight":"0"}}} -->
                            <p class="alignleft has-text-align-left is-style-sub-heading alignleft" style="line-height:0"><?php echo esc_html__( 'Featured', 'aegis' ); ?></p>
                            <!-- /wp:paragraph -->

                            <!-- wp:post-title {"isLink":true} /-->

                            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                            <div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->

                                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"3px","left":"3px"}}},"textColor":"neutral-200"} -->
                                <p class="has-neutral-200-color has-text-color" style="margin-top:0;margin-bottom:0;padding-right:3px;padding-left:3px">|</p>
                                <!-- /wp:paragraph -->

                                <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:post-excerpt {"hideReadMore":true} /-->
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