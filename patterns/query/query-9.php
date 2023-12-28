<?php
/**
 * 09. Blog Posts Grid Block Pattern
 */
return array(
    'title'      => __('09. Blog Posts Grid', 'aegis'),
    'description' => __('Blog Posts Grid', 'aegis'),
    'categories' => array('aegis-query'),
    'content' => '
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"left":"var:preset|spacing|30","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"},"metadata":{"name":"' . esc_html__('Posts Section', 'aegis') . '"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
    <!-- wp:query {"queryId":9,"query":{"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","sticky":"exclude","perPage":"3"},"enhancedPagination":true,"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":3}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"background","className":"negative-margin is-style-aegis-border","layout":{"type":"constrained"}} -->
        <div class="wp-block-group negative-margin is-style-aegis-border has-background-background-color has-background" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
            <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"is-style-aegis-post-title-border"} /-->

            <!-- wp:post-featured-image {"isLink":true,"style":{"color":{"duotone":"unset"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"className":"is-style-aegis-post-featured-image-effect-1"} /-->

            <!-- wp:post-excerpt {"moreText":"Read More","excerptLength":20,"className":"is-style-default"} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->
</section>
<!-- /wp:group -->',
);