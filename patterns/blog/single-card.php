<?php
/**
 * Title: Single Blog Card
 * Slug: single-card
 * Categories: blog
 * ID: 432
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"single-card","name":"Single Blog Card"},"style":{"spacing":{"blockGap":"0"},"maxWidth":{"all":"400px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group">
    <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","dimRatio":30,"style":{"aspectRatio":{"all":""},"objectFit":{"all":""},"objectPosition":{"all":"top"},"height":{"all":"100%"},"width":{"all":""}}} /-->

    <!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|xxs","left":"var:preset|spacing|xxs"},"margin":{"top":"var:preset|spacing|xs"}},"display":{"mobile":"none"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","orientation":"horizontal"}} -->
    <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--xs)">
        <!-- wp:post-terms {"term":"category","className":"is-style-default","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|neutral-200"}}}},"textColor":"neutral-200"} -->
        <p class="has-neutral-200-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0">|</p>
        <!-- /wp:paragraph -->

        <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0.5em","right":"0em","bottom":"0.5em","left":"0em"}},"typography":{"lineHeight":"1.4"}},"fontSize":"24"} /-->

    <!-- wp:post-excerpt {"moreText":"Read more","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"hideReadMore":true} /-->
</div>
<!-- /wp:group -->