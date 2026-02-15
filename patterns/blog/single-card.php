<?php
/**
 * Title: Single Blog Card
 * Slug: single-card
 * Categories: blog
 * Keywords: blog, card, post, single
 * Description: A single blog post card layout.
 * Viewport Width: 600
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"blog-single-card","name":"Single Blog Card"},"layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[],"format":[]},"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}}} -->
    <div style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)" class="wp-block-query"><!-- wp:post-template -->
        <!-- wp:group {"metadata":{"categories":["blog"],"patternName":"single-card","name":"Single Blog Card"},"style":{"spacing":{"blockGap":"0"},"maxWidth":{"all":"400px"}},"layout":{"type":"flex","orientation":"vertical"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-group has-animation" style="animation-iteration-count:"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","dimRatio":30,"style":{"aspectRatio":{"all":""},"objectFit":{"all":""},"objectPosition":{"all":""},"height":{"all":"100%"},"width":{"all":""}}} /-->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
            <div class="wp-block-group has-animation" style="margin-top:0;margin-bottom:0;animation-iteration-count:"><!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-200"} -->
                <p class="has-neutral-200-color has-text-color" style="margin-top:0;margin-bottom:0">|</p>
                <!-- /wp:paragraph -->

                <!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0.5em","right":"0em","bottom":"0.5em","left":"0em"}},"typography":{"lineHeight":"1.4"}},"fontSize":"24","visibility":{"hideOnDesktop":false}} /-->

            <!-- wp:post-excerpt {"moreText":"Read more","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"hideReadMore":true} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->