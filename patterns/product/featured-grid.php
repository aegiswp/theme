<?php
/**
 * Title: Featured Product Grid
 * Slug: featured-grid
 * Categories: product
 * Keywords: product, featured, grid, woocommerce, shop
 * Description: A three-column featured products grid with sale badges, ratings, and Add to Cart buttons.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["product"],"patternName":"featured-grid","name":"Featured Product Grid"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--md)">
		<!-- wp:heading {"fontSize":"32"} -->
		<h2 class="wp-block-heading has-32-font-size"><?php echo esc_html__( 'Featured Products', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-ghost","fontSize":"14"} -->
			<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link has-14-font-size has-custom-font-size wp-element-button" href="/shop"><?php echo esc_html__( 'View All →', 'aegis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:woocommerce/product-collection {"queryId":10,"query":{"perPage":3,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"date","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":true,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"queryContextIncludes":["collection"],"align":"wide"} -->
	<div class="wp-block-woocommerce-product-collection alignwide">
		<!-- wp:woocommerce/product-template -->
		<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|md","left":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group is-style-surface" style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--md);padding-left:0">
			<!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} -->
			<!-- wp:woocommerce/product-sale-badge {"align":"right"} /-->
			<!-- /wp:woocommerce/product-image -->

			<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"},"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
				<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0","top":"0"}},"typography":{"lineHeight":"1.4","fontSize":"18px"}},"__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

				<!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"textAlign":"center","style":{"typography":{"fontSize":"14px"}}} /-->

				<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","style":{"typography":{"fontSize":"16px"}}} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
			<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)">
				<!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
		<!-- /wp:woocommerce/product-template -->

		<!-- wp:woocommerce/product-collection-no-results -->
		<!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
		<p class="aligncenter has-text-align-center has-medium-font-size aligncenter"><?php echo esc_html__( 'No featured products found. Mark products as featured in WooCommerce to display them here.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- /wp:woocommerce/product-collection-no-results -->
	</div>
	<!-- /wp:woocommerce/product-collection -->
</div>
<!-- /wp:group -->
