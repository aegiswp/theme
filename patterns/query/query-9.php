<?php
/**
 * 09. Blog Posts Grid Block Pattern
 */
return array(
    'title'      => __('09. Blog Posts Grid', 'aegis'),
    'description' => __('Blog Posts Grid', 'aegis'),
    'categories' => array('aegis-query'),
    'content' => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"},"metadata":{"name":"' . esc_html__('09. Blog Pattern', 'aegis') . '"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"inherit":false}} -->
        <div class="wp-block-query alignwide">
            <!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":3}} -->
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"width":"1px"}},"borderColor":"foreground","backgroundColor":"secondary","className":"negative-margin is-style-default","layout":{"type":"default"}} -->
            <div class="wp-block-group negative-margin is-style-default has-border-color has-foreground-border-color has-secondary-background-color has-background" style="border-width:1px;margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"foreground","className":"is-style-aegis-post-title-border","fontSize":"large"} /-->

                <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"color":{"duotone":"unset"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"className":"is-style-aegis-post-featured-image-effect-1"} /-->

                <!-- wp:post-excerpt {"moreText":"Read More","excerptLength":25,"className":"is-style-default"} /-->
            </div>
            <!-- /wp:group -->
            <!-- /wp:post-template -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->',
);