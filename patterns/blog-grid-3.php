<?php
/**
 * Title: 03. Blog Grid Pattern
 * Slug: aegis/blog-grid-3
 * Categories: blog
 * Description: Displays a three-column grid of blog postings with cover images, titles, excerpts, and dates
 * Keywords: blog, featured, grid, posts
 * Viewport Width: 1400
 * Block Types: core/group, core/query, core/post-template, core/post-featured-image, core/post-date, core/post-title, core/post-excerpt
 * Inserter: true
 * 
 * @package aegis
 * @since Aegis 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('03. Blog Grid Pattern', 'Name of the pattern', 'aegis'); ?>"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"className":"alignwide","layout":{"inherit":false}} -->
        <div class="wp-block-query alignwide">
            <!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":3}} -->
            <!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"customOverlayColor":"#222222","isUserOverlayColor":true,"minHeight":270,"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"className":"is-style-default","layout":{"type":"constrained"}} -->
            <div class="wp-block-cover is-style-default" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);min-height:270px">
                <span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#222222"></span>
                <div class="wp-block-cover__inner-container">
                    <!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"background","className":"is-style-aegis-post-title-border","fontSize":"large"} /-->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|30","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"negative-margin is-style-default","layout":{"type":"default"}} -->
            <div class="wp-block-group negative-margin is-style-default has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":25,"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"is-style-default"} /-->

                <!-- wp:post-date {"textAlign":"right","style":{"spacing":{"margin":{"top":"10px","right":"0","bottom":"0","left":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"foreground","className":"aegis-bottom-date","fontSize":"tiny"} /-->
            </div>
            <!-- /wp:group -->
            <!-- /wp:post-template -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->