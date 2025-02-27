<?php
/**
 * Title: 03. Archive Pattern
 * Slug: aegis/archive-03
 * Categories: archives
 * Description: Block pattern presenting an archive of posts with cover backgrounds, categories, dates, excerpts, titles, and pagination.
 * Keywords: archive, categories, cover, date, excerpt, pagination, title
 * Viewport Width: 1400
 * Block Types: core/cover, core/group, core/post-date, core/post-excerpt, core/post-template, core/post-terms, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('03. Archive Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["archives"],"patternName":"aegis/archive-03"},"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0">
    <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"stretch","orientation":"vertical"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:query-title {"type":"archive","level":2} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"taxQuery":null},"align":"wide","layout":{"type":"default"},"tagName":"main","ariaLabel":"<?php echo esc_attr_x( 'Archive posts', 'ARIA label for the post archive section', 'aegis' ); ?>"} -->
    <main class="wp-block-query alignwide">
        <!-- wp:post-template {"align":"wide","layout":{"type":"default"}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"},"margin":{"bottom":"var:preset|spacing|30"}}},"backgroundColor":"quaternary"} -->
        <div class="wp-block-group has-quaternary-background-color has-background" style="margin-bottom:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
            <!-- wp:cover {"useFeaturedImage":true,"dimRatio":70,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":60,"minHeightUnit":"vh","isDark":true,"layout":{"type":"constrained"},"tagName":"article"} -->
            <article class="wp-block-cover is-dark" style="min-height:60vh"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
                <div class="wp-block-cover__inner-container">
                    <!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"className":"is-style-aegis-post-title-hide-underline","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|quaternary"}}}}},"textColor":"background","fontSize":"huge"} /-->
                </div>
            </article>
            <!-- /wp:cover -->

            <!-- wp:group {"className":"has-negative-margin","style":{"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"},"margin":{"top":"0px"}}},"backgroundColor":"foreground","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center","orientation":"horizontal"}} -->
            <div class="wp-block-group has-negative-margin has-foreground-background-color has-background" style="margin-top:0px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px">
                <!-- wp:post-terms {"term":"category","textAlign":"right","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|quaternary"}},"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"tiny"} /-->

                <!-- wp:post-date {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|quaternary"}},"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"tiny"} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:post-excerpt {"moreText":"<?php echo esc_html_x( 'Read More', 'Post excerpt read more link text (15-25 characters recommended)', 'aegis' ); ?>","className":"is-style-default","style":{"spacing":{"padding":{"right":"20px","left":"20px"}}}} /-->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->
        
        <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"tiny","layout":{"type":"flex","justifyContent":"space-between"}} -->
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