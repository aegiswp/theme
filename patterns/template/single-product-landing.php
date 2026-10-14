<?php
/**
 * Title: Single Product Landing
 * Slug: single-product-landing
 * Categories: template
 * Template Types: single-product-landing
 * Inserter: false
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->
<!-- wp:group {"tagName":"main","anchor":"main","className":"site-main","metadata":{"name":"Main"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group site-main" style="padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--lg)">
	<!-- wp:woocommerce/breadcrumbs /-->
	<!-- wp:woocommerce/store-notices /-->
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"55%"} -->
		<div class="wp-block-column" style="flex-basis:55%">
			<!-- wp:woocommerce/product-image-gallery /-->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"width":"45%"} -->
		<div class="wp-block-column" style="flex-basis:45%">
			<!-- wp:post-title {"level":1,"fontSize":"36"} /-->
			<!-- wp:woocommerce/product-rating {"isDescendentOfSingleProductTemplate":true} /-->
			<!-- wp:woocommerce/product-price {"isDescendentOfSingleProductTemplate":true,"fontSize":"24"} /-->
			<!-- wp:post-excerpt {"fontSize":"16"} /-->
			<!-- wp:woocommerce/add-to-cart-form /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:post-content {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}}} /-->
	<!-- wp:pattern {"slug":"product-featured-grid"} /-->
</main>
<!-- /wp:group -->
<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
