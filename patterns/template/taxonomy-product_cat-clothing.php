<?php
/**
 * Title: Product Category Clothing
 * Slug: taxonomy-product_cat-clothing
 * Categories: template
 * Template Types: taxonomy-product_cat-clothing
 * Inserter: false
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","className":"site-main","metadata":{"name":"Main"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group site-main" style="padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--lg)">
	<!-- wp:woocommerce/breadcrumbs /-->
	<!-- wp:woocommerce/store-notices /-->
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--sm)">
		<!-- wp:query-title {"type":"archive","showPrefix":false} /-->
		<!-- wp:term-description {"textColor":"neutral-600","fontSize":"16"} /-->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--sm)">
		<!-- wp:woocommerce/product-results-count /-->
		<!-- wp:woocommerce/catalog-sorting /-->
	</div>
	<!-- /wp:group -->
	<!-- wp:woocommerce/product-collection {"queryId":21,"query":{"perPage":12,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":true,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":true,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"queryContextIncludes":["collection"],"align":"wide"} -->
	<div class="wp-block-woocommerce-product-collection alignwide">
		<!-- wp:woocommerce/product-template -->
		<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--sm)">
			<!-- wp:woocommerce/product-image {"showSaleBadge":true,"imageSizing":"cropped","isDescendentOfQueryLoop":true} /-->
			<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"typography":{"lineHeight":"1.4","fontSize":"16px"}},"__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->
			<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","style":{"typography":{"fontSize":"16px"}}} /-->
			<!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"fontSize":"14"} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:woocommerce/product-template -->
		<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->
		<!-- wp:woocommerce/product-collection-no-results -->
		<!-- wp:paragraph -->
		<p><?php echo esc_html__( 'No products found.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- /wp:woocommerce/product-collection-no-results -->
	</div>
	<!-- /wp:woocommerce/product-collection -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->

