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

<!-- wp:group {"tagName":"main","anchor":"main","align":"full","className":"site-main","layout":{"type":"constrained"},"metadata":{"name":"Main"}} -->
<main id="main" class="wp-block-group alignfull site-main">
	<!-- wp:post-title {"textAlign":"center","level":1,"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg"}}},"fontSize":"52"} /-->

	<!-- wp:post-excerpt {"textAlign":"center","excerptLength":40,"hideReadMore":true,"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|md"}}},"textColor":"neutral-600","fontSize":"18"} /-->

	<!-- wp:post-featured-image {"style":{"aspectRatio":{"all":"16/9"},"objectFit":{"all":"cover"},"spacing":{"padding":{"bottom":"var:preset|spacing|md"}}},"usePlaceholder":"none"} /-->

	<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--xl)">
		<!-- wp:post-content {"layout":{"type":"constrained"}} /-->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
