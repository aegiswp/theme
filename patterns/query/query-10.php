<?php
/**
 * 10. Blog Posts Grid Block Pattern
 */
return array(
    'title'      => __('10. Blog Posts Grid', 'aegis'),
    'description' => __('Blog Posts Grid', 'aegis'),
    'categories' => array('aegis-query'),
    'content' => '<!-- wp:group {"metadata":{"name":"' . esc_html__('10. Blog Pattern', 'aegis') . '"},"align":"full","style":{"spacing":{"padding":{"right":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"background","gradient":"horizontal-foreground-to-background","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-background-color has-horizontal-foreground-to-background-gradient-background has-text-color has-background has-link-color" style="padding-right:0;padding-left:0">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0","margin":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
    <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
        <p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('Latest Articles', 'aegis') . '</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"typography":{"fontSize":"6rem","textTransform":"uppercase"}}} -->
        <h2 class="wp-block-heading" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-size:6rem;text-transform:uppercase">' . esc_html__('Featured', 'aegis') . '</h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}}} -->
        <p class="has-text-align-center" style="margin-top:0">' . esc_html__('Paragraph (333 characters): Detail the purpose of the featured posts.', 'aegis') . '</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"metadata":{"name":""},"align":"full","style":{"spacing":{"padding":{"left":"var:preset|spacing|30","top":"0","bottom":"0","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30)">
        <!-- wp:query {"queryId":9,"query":{"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","sticky":"exclude","perPage":10,"inherit":false},"enhancedPagination":true,"align":"wide","layout":{"type":"default"}} -->
        <div class="wp-block-query alignwide">
            <!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":3}} -->
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"foreground","className":"is-style-default","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-default has-foreground-background-color has-background" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:cover {"useFeaturedImage":true,"dimRatio":40,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":270,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"","wideSize":""}} -->
                <div class="wp-block-cover" style="padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30);min-height:270px">
                    <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-40 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container">
                        <!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-post-title-border","fontSize":"large"} /-->
                    </div>
                </div>
                <!-- /wp:cover -->

                <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
                <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                    <!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":25,"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","className":"is-style-default","fontSize":"small"} /-->
                </div>
                <!-- /wp:group -->
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