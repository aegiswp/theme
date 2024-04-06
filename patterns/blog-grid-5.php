<?php
/**
 * Title: 05. Blog Grid Pattern
 * Slug: aegis/blog-grid-5
 * Categories: blog
 * Description: Displays a three-column grid of blog postings with tagline, heading, paragraph, cover images, titles, and excerpts
 * Keywords: blog, featured, grid, posts
 * Viewport Width: 1400
 * Block Types: core/cover, core/group, core/query, core/post-template, core/post-featured-image, core/post-date, core/post-title, core/post-excerpt
 * Inserter: true
 * 
 * @package aegis
 * @since Aegis 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('05. Blog Grid Pattern', 'Name of the pattern', 'aegis'); ?>"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"gradient":"horizontal-foreground-to-background","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-horizontal-foreground-to-background-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0","margin":{"bottom":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap"}} -->
    <div class="wp-block-group has-background-color has-text-color has-link-color" style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"fontSize":"tiny"} -->
        <p class="has-text-align-left has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('[Tagline]', 'Replace with a descriptive tagline', 'aegis'); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"typography":{"fontSize":"6rem","textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
        <h2 class="wp-block-heading has-background-color has-text-color has-link-color" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-size:6rem;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}}} -->
        <p class="has-text-align-center" style="margin-top:0"><?php echo esc_html_x('[Description (333 characters): Detail the purpose of the featured posts.]', 'Replace with a description of the section', 'aegis'); ?></p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"metadata":{"name":""},"align":"wide","style":{"spacing":{"padding":{"left":"0","top":"0","bottom":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
        <!-- wp:query {"query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"className":"alignwide","layout":{"inherit":false}} -->
        <div class="wp-block-query alignwide">
            <!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":3}} -->
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"foreground","className":"is-style-default","layout":{"type":"constrained"}} -->
            <div class="wp-block-group is-style-default has-foreground-background-color has-background" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:cover {"useFeaturedImage":true,"dimRatio":40,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":270,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"","wideSize":""}} -->
                <div class="wp-block-cover" style="padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30);min-height:270px">
                    <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-40 has-background-dim"></span>
                    <div class="wp-block-cover__inner-container">
                        <!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"background","className":"is-style-aegis-post-title-border","fontSize":"large"} /-->
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
<!-- /wp:group -->