<?php
/**
 * Title: Page No Title
 * Slug: page-no-title
 * Categories: template
 * Template Types: page, page-no-title
 * Inserter: false
 * Description: Page template without an automatic title. Authors must supply exactly one h1 heading in the page content.
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","align":"full","className":"site-main","layout":{"type":"constrained"},"metadata":{"name":"Main"}} -->
<main id="main" class="wp-block-group alignfull site-main">
	<!-- wp:post-content {"layout":{"type":"constrained"}} /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
