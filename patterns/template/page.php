<?php
/**
 * Title: Template Page
 * Slug: page
 * Categories: template
 * Template Types: template-page
 * Inserter: false
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","align":"full","className":"site-main","layout":{"type":"constrained"},"metadata":{"name":"Main"}} -->
<main class="wp-block-group alignfull site-main"><!-- wp:pattern {"slug":"hero-minimal","preview":true} /-->
    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-bottom:var(--wp--preset--spacing--xl)">
        <!-- wp:post-content /--></div>
    <!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->