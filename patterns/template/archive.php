<?php
/**
 * Title: Template Archive
 * Slug: archive
 * Categories: template
 * Template Types: template-archive
 * Inserter: false
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","metadata":{"name":"Main"},"align":"full","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull">
    <!-- wp:group {"metadata":{"categories":["hero"],"patternName":"archive","name":"Heading"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"
        style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
        <!-- wp:query-title {"type":"archive","textAlign":"center"} /-->

        <!-- wp:post-terms {"term":"category","textAlign":"center","style":{"spacing":{"blockGap":"var:preset|spacing|xs","padding":{"right":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}}},"align":"center","showAll":true} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"metadata":{"categories":["blog"],"patternName":"latest-posts","name":"Archive"},"align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|sm","top":"var:preset|spacing|xs"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull"
        style="padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--sm)">
        <!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":"","offset":"","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"parents":[],"taxQuery":null,"format":[]},"align":"wide","layout":{"inherit":false},"style":{"spacing":{"blockGap":"1.5em"}}} -->
        <div class="wp-block-query alignwide">
            <!-- wp:post-template {"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":null}} -->
            <!-- wp:post-featured-image {"isLink":true,"style":{"aspectRatio":{"all":"16/9"},"objectFit":{"all":"cover"},"objectPosition":{"all":"center"},"height":{"all":"100%"},"width":{"all":"100%"}}} /-->

            <!-- wp:group {"metadata":{"name":"Desktop"},"style":{"spacing":{"blockGap":{"top":"4px","left":"4px"},"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"display":{"mobile":"none"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","orientation":"horizontal"}} -->
            <div class="wp-block-group"
                style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:post-terms {"term":"category","className":"is-style-default","style":{"typography":{"textDecoration":"none"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"12"} /-->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"12"} -->
                <p class="has-12-font-size" style="margin-top:0;margin-bottom:0">|</p>
                <!-- /wp:paragraph -->

                <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"12"} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"metadata":{"name":"Mobile"},"style":{"spacing":{"blockGap":{"top":"4px","left":"4px"},"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"display":{"desktop":"none"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","orientation":"horizontal"}} -->
            <div class="wp-block-group"
                style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"12"} /-->
            </div>
            <!-- /wp:group -->

            <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0.5em","right":"0em","bottom":"0.5em","left":"0em"}},"typography":{"lineHeight":"1.4"}},"fontSize":"24"} /-->

            <!-- wp:post-excerpt {"moreText":"Read more","excerptLength":20,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"hideReadMore":true} /-->
            <!-- /wp:post-template -->

            <!-- wp:query-pagination {"paginationArrow":"arrow","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
            <!-- wp:query-pagination-previous /-->

            <!-- wp:query-pagination-numbers /-->

            <!-- wp:query-pagination-next /-->
            <!-- /wp:query-pagination -->

            <!-- wp:query-no-results -->
            <!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
            <p></p>
            <!-- /wp:paragraph -->
            <!-- /wp:query-no-results -->
        </div>
        <!-- /wp:query -->
    </div>
    <!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->