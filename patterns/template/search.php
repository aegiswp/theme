<?php
/**
 * Title: Template Search
 * Slug: search
 * Categories: template
 * Template Types: template-search
 * Inserter: false
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","align":"full","className":"site-main","layout":{"type":"constrained"},"metadata":{"name":"Main"}} -->
<main class="wp-block-group alignfull site-main">
    <!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg"}}},"className":"is-style-sub-heading"} -->
    <p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"
        style="padding-top:var(--wp--preset--spacing--lg)">Search Results</p>
    <!-- /wp:paragraph -->
    <!-- wp:query-title {"type":"search","textAlign":"center","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|xs","top":"var:preset|spacing|xxs"}}}} /-->
    <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--lg)">
        <!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Try another search","buttonText":"Search"} /-->
    </div>
    <!-- /wp:group -->
    <!-- wp:pattern {"slug":"blog-three-column","preview":true} /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->