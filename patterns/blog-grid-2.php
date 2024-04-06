<?php
/**
 * Title: 02. Blog Grid Pattern
 * Slug: aegis/blog-grid-2
 * Categories: blog
 * Description: Displays a three-column grid of blog postings with featured images, dates, titles, and excerpts
 * Keywords: blog, featured, grid, posts
 * Viewport Width: 1400
 * Block Types: core/group, core/query, core/post-template, core/post-featured-image, core/post-date, core/post-title, core/post-excerpt
 * Inserter: true
 * 
 * @package aegis
 * @since Aegis 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('02. Blog Grid Pattern', 'Name of the pattern', 'aegis'); ?>"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:group {"align":"full"} -->
    <div class="wp-block-group alignfull">
        <!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"inherit":false}} -->
        <div class="wp-block-query">
            <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
            <!-- wp:group {"backgroundColor":"secondary","layout":{"type":"default"}} -->
            <div class="wp-block-group has-secondary-background-color has-background">
                <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"color":{"duotone":"unset"}},"className":"is-style-default"} /-->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"0"}}}} -->
                <div class="wp-block-group" style="padding-top:15px;padding-bottom:0">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"}},"className":"has-negative-margin","layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group has-negative-margin" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                        <!-- wp:post-date {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"top":"10px","right":"10px","bottom":"10px","left":"10px"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"backgroundColor":"secondary","className":"is-style-default","fontSize":"tiny"} /-->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30","right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                        <!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"className":"is-style-aegis-post-title-border","fontSize":"extra-large"} /-->

                        <!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":25,"className":"is-style-default","fontSize":"small"} /-->
                    </div>
                    <!-- /wp:group -->
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
<!-- /wp:group -->