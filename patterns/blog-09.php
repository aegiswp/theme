<?php
/**
 * Title: 09. Blog Pattern
 * Slug: aegis/blog-09
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

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('09. Blog Pattern', 'Name of the pattern', 'aegis'); ?>"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"gradient":"diagonal-foreground-to-transparent-right-bottom","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-diagonal-foreground-to-transparent-right-bottom-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0","margin":{"bottom":"var:preset|spacing|30"}}},"textColor":"background","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap","verticalAlignment":"top"}} -->
    <div class="wp-block-group alignwide has-background-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
        <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('[Tagline]', 'Replace with a descriptive section tagline.', 'aegis'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"typography":{"fontSize":"6rem","textTransform":"uppercase"}}} -->
        <h2 class="wp-block-heading" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-size:6rem;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive section title.', 'aegis'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}}} -->
        <p class="has-text-align-center" style="margin-top:0"><?php echo esc_html_x('[Description (333 characters): Detail the purpose of the featured posts.]', 'Replace with a description of the featured posts.', 'aegis'); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"inherit":false}} -->
        <div class="wp-block-query">
            <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
            <!-- wp:group {"backgroundColor":"background","layout":{"type":"default"}} -->
            <div class="wp-block-group has-background-background-color has-background">
                <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"color":{"duotone":"unset"}},"className":"is-style-default"} /-->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"0"}}}} -->
                <div class="wp-block-group" style="padding-top:15px;padding-bottom:0">
                    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"}},"className":"has-negative-margin","layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
                    <div class="wp-block-group has-negative-margin" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                        <!-- wp:post-date {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"top":"10px","right":"10px","bottom":"10px","left":"10px"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"backgroundColor":"background","className":"is-style-default","fontSize":"tiny"} /-->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30","right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}}} -->
                    <div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                        <!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"className":"is-style-aegis-post-title-hide-underline","fontSize":"extra-large"} /-->

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