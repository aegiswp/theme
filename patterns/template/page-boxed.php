<?php
/**
 * Title: Page Boxed
 * Slug: page-boxed
 * Categories: template
 * Template Types: page, page-boxed
 * Inserter: false
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","align":"full","className":"site-main","layout":{"type":"constrained"},"metadata":{"name":"Main"}} -->
<main id="main" class="wp-block-group alignfull site-main">
	<!-- wp:post-title {"level":1,"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|md"}}}} /-->

	<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--xl)">
		<!-- wp:post-content {"layout":{"type":"constrained"}} /-->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
