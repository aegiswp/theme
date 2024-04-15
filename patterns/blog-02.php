<?php
/**
 * Title: 02. Blog Pattern
 * Slug: aegis/blog-02
 * Categories: blog
 * Description: Two-column grid of blog entries with archive title, post titles, featured images, excerpts, call to action buttons, and pagination
 * Keywords: blog, posts, pagination, featured image, excerpt
 * Viewport Width: 1400
 * Block Types: core/group, core/query, core/post-template, core/post-featured-image, core/post-title, core/post-excerpt, core/query-pagination, core/query-pagination-previous, core/query-pagination-numbers, core/query-pagination-next
 * Inserter: true
 * 
 * @package aegis
 * @since Aegis 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('02. Blog Pattern', 'Name of the pattern', 'aegis'); ?>"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"stretch","orientation":"vertical"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:query-title {"type":"archive","level":2} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"parents":[],"taxQuery":null},"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"align":"wide","layout":{"type":"grid","columnCount":2}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"},"margin":{"bottom":"var:preset|spacing|30"}}}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
            <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"className":"is-style-aegis-post-title-border","fontSize":"huge"} /-->

            <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->

            <!-- wp:post-excerpt {"moreText":"Read More","className":"is-style-default"} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"layout":{"type":"flex","justifyContent":"space-between"},"fontSize":"small"} -->
        <!-- wp:query-pagination-previous /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->