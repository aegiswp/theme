<?php
/**
 * Title: Latest Posts
 * Slug: latest-posts
 * Categories: blog
 * Keywords: blog, latest, posts, recent
 * Description: A section displaying the latest blog posts.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"latest-posts","name":"Latest Posts"},"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|xl","top":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignwide has-animation" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl);animation-iteration-count:"><!-- wp:heading {"textAlign":"center","className":"wp-block-heading","style":{"spacing":{"margin":{"bottom":"0","top":"0"},"padding":{"bottom":"var:preset|spacing|sm"}}},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
    <h2 class="wp-block-heading has-text-align-center has-animation" style="margin-top:0;margin-bottom:0;padding-bottom:var(--wp--preset--spacing--sm);animation-iteration-count:"><?php echo esc_html__( 'Latest Posts', 'aegis' ); ?></h2>
    <!-- /wp:heading -->

    <!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":"","offset":"","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide","layout":{"inherit":false},"style":{"spacing":{"blockGap":"1.5em"}}} -->
    <div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"aspectRatio":{"all":""},"objectFit":{"all":""},"objectPosition":{"all":""},"height":{"all":"100%"},"width":{"all":""}}} /-->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
        <div class="wp-block-group has-animation" style="margin-top:0;margin-bottom:0;animation-iteration-count:"><!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->

            <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-200","animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
            <p class="has-neutral-200-color has-text-color has-animation" style="margin-top:0;margin-bottom:0;animation-iteration-count:">|</p>
            <!-- /wp:paragraph -->

            <!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"14"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0.5em","right":"0em","bottom":"0.5em","left":"0em"}},"typography":{"lineHeight":"1.4"}},"fontSize":"24"} /-->

        <!-- wp:post-excerpt {"moreText":"Read more","excerptLength":20,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"hideReadMore":true} /-->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->