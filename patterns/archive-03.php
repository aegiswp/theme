<?php
/**
 * Title: 03. Archive Pattern
 * Slug: aegis/archive-03
 * Categories: archives
 * Description: Block pattern displaying posts with a cover block using featured images, titles, excerpts, categories, dates, and pagination.
 * Keywords: archive, categories, date, excerpt, featured image, pagination, title
 * Viewport Width: 1400
 * Block Types: core/cover, core/group, core/post-date, core/post-excerpt, core/post-template, core/post-terms, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('03. Archive Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["archives"],"patternName":"aegis/archive-03"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
    <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","orientation":"horizontal"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:query-title {"type":"archive","level":2,"style":{"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"huge"} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"taxQuery":null},"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"35rem"}} -->
        <!-- wp:group {"className":"is-style-section-dark","style":{"spacing":{"padding":{"bottom":"0","right":"0"},"margin":{"bottom":"0"},"blockGap":"0"}},"backgroundColor":"foreground"} -->
        <div class="wp-block-group is-style-section-dark has-foreground-background-color has-background" style="margin-bottom:0;padding-right:0;padding-bottom:0">
            <!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"customOverlayColor":"#30383a","isUserOverlayColor":true,"layout":{"type":"constrained"}} -->
            <div class="wp-block-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#30383a"></span>
                <div class="wp-block-cover__inner-container">
                    <!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|quaternary"}}}}},"textColor":"background","fontSize":"huge"} /-->
                </div>
            </div>
            <!-- /wp:cover -->

            <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:post-excerpt {"moreText":"","excerptLength":25} /-->

                <!-- wp:group {"style":{"spacing":{"padding":{"left":"0","right":"0","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0px"}}},"layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center","orientation":"horizontal"}} -->
                <div class="wp-block-group" style="margin-top:0px;padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
                    <!-- wp:post-terms {"term":"category","textAlign":"right","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|quaternary"}}}}},"textColor":"background","fontSize":"tiny"} /-->

                    <!-- wp:post-date {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|quaternary"}}}}},"textColor":"background","fontSize":"tiny"} /-->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"foreground","fontSize":"tiny","layout":{"type":"flex","justifyContent":"space-between","orientation":"horizontal"}} -->
        <!-- wp:query-pagination-previous /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->
    </div>
    <!-- /wp:query -->
</div>
<!-- /wp:group -->