<?php
/**
 * Title: 05. Archive Pattern
 * Slug: aegis/archive-05
 * Categories: archives
 * Description: Block pattern displaying an archive of posts on a gradient background with featured images, categories, dates, titles, excerpts, and pagination.
 * Keywords: archive, categories, date, excerpt, featured image, pagination, title
 * Viewport Width: 1400
 * Block Types: core/group, core/post-date, core/post-excerpt, core/post-featured-image, core/post-template, core/post-terms, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('05. Archive Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["archives"],"patternName":"aegis/archive-05"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
    <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","orientation":"horizontal"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:query-title {"type":"archive","level":2,"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"huge"} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"taxQuery":null},"align":"wide","layout":{"type":"default"},"tagName":"main","ariaLabel":"<?php echo esc_attr_x( 'Posts archive', 'ARIA label for the posts archive section', 'aegis' ); ?>"} -->
    <main class="wp-block-query alignwide">
        <!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"35rem"}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30","right":"0"},"margin":{"bottom":"0"},"blockGap":"0"}},"gradient":"diagonal-tertiary-to-transparent-right-bottom"} -->
        <div class="wp-block-group has-diagonal-tertiary-to-transparent-right-bottom-gradient-background has-background" style="margin-bottom:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--30)">
            <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","dimRatio":100,"gradient":"diagonal-transparent-to-tiny-tertiary-right-bottom","style":{"border":{"radius":"4px"}}} /-->

            <!-- wp:group {"style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"20px","bottom":"20px"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px">
                <!-- wp:group {"style":{"spacing":{"padding":{"left":"0px","right":"0px","top":"0px","bottom":"0px"},"margin":{"top":"0px"}}},"backgroundColor":"tertiary","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center","orientation":"horizontal"}} -->
                <div class="wp-block-group has-tertiary-background-color has-background" style="margin-top:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">
                    <!-- wp:post-terms {"term":"category","textAlign":"right","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"foreground","fontSize":"tiny"} /-->

                    <!-- wp:post-date {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"fontSize":"tiny"} /-->
                </div>
                <!-- /wp:group -->

                <!-- wp:post-title {"level":3,"isLink":true,"className":"is-style-hide-underline","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"foreground","fontSize":"huge"} /-->

                <!-- wp:post-excerpt {"moreText":"<?php echo esc_html_x( 'Read More', 'Post excerpt read more link text (15-25 characters recommended)', 'aegis' ); ?>","excerptLength":25} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"foreground","fontSize":"tiny","layout":{"type":"flex","justifyContent":"space-between","orientation":"horizontal"}} -->
        <!-- wp:query-pagination-previous {"label":"<?php echo esc_html_x( 'Previous Posts', 'Previous page navigation text in archive', 'aegis' ); ?>"} /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next {"label":"<?php echo esc_html_x( 'Next Posts', 'Next page navigation text in archive', 'aegis' ); ?>"} /-->
        <!-- /wp:query-pagination -->
        
        <!-- wp:paragraph {"align":"center","className":"screen-reader-text","fontSize":"small"} -->
        <p class="has-text-align-center screen-reader-text has-small-font-size"><?php echo esc_html_x( 'Archive navigation', 'Screen reader text for archive navigation', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->
    </main>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->