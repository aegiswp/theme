<?php
/**
 * Title: Recently Viewed Products
 * Slug: recently-viewed
 * Categories: commerce
 * Keywords: recently viewed, products, history, browsing
 * Description: A section displaying recently viewed products using a product collection grid.
 * Viewport Width: 1280
 * Block Types: core/group
 */
?>

<!-- wp:group {"metadata":{"categories":["commerce"],"patternName":"commerce-recently-viewed","name":"Recently Viewed Products"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"},"animation":{"event":"","iterationCount":"","duration":"","delay":""}} -->
<div class="wp-block-group alignwide has-animation" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg);animation-iteration-count:"><!-- wp:heading {"textAlign":"center","fontSize":"24"} -->
	<h2 class="wp-block-heading has-text-align-center has-24-font-size"><?php echo esc_html__( 'Recently Viewed', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"textColor":"neutral-600","fontSize":"16"} -->
	<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-16-font-size aligncenter" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Pick up where you left off.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"perPage":4,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"date","search":"","exclude":[],"inherit":false,"taxQuery":[],"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."},"align":"wide"} -->
	<div class="wp-block-woocommerce-product-collection alignwide"><!-- wp:woocommerce/product-template -->
		<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--xs)"><!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} -->
			<!-- wp:woocommerce/product-sale-badge {"align":"right"} /-->
			<!-- /wp:woocommerce/product-image -->

			<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0","top":"0"}}},"fontSize":"16","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

			<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","fontSize":"16"} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:woocommerce/product-template -->
	</div>
	<!-- /wp:woocommerce/product-collection -->
</div>
<!-- /wp:group -->