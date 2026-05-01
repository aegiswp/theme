<?php
/**
 * Title: Product Landing Page (Dynamic)
 * Slug: product-landing-dynamic
 * Categories: page
 * Keywords: product, landing, dynamic, woocommerce, collection
 * Description: A dynamic product landing page using WooCommerce product collections, featured products, on-sale grid, and category browsing.
 * Viewport Width: 1280
 * Block Types: core/post-content
 * Post Types: page
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"product-landing-dynamic","name":"Product Landing Page (Dynamic)"},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull">

	<!-- wp:pattern {"slug":"header-store-default"} /-->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"primary-900","textColor":"white","layout":{"type":"constrained","contentSize":"720px"}} -->
	<div class="wp-block-group alignfull has-white-color has-primary-900-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xl)">
		<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"lineHeight":"1.2"}},"fontSize":"42"} -->
		<h1 class="wp-block-heading has-text-align-center has-42-font-size" style="line-height:1.2"><?php echo esc_html__( 'Discover Our Collection', 'aegis' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-200"}}}},"textColor":"neutral-200","fontSize":"18"} -->
		<p class="aligncenter has-text-align-center has-neutral-200-color has-text-color has-link-color has-18-font-size aligncenter"><?php echo esc_html__( 'Curated products designed to elevate your experience. Browse our latest arrivals, best sellers, and exclusive deals.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)">
			<!-- wp:button {"backgroundColor":"white","textColor":"primary-900","fontSize":"16"} -->
			<div class="wp-block-button has-custom-font-size has-16-font-size"><a class="wp-block-button__link has-primary-900-color has-white-background-color has-text-color has-background wp-element-button" href="/shop"><?php echo esc_html__( 'Shop All Products', 'aegis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"product-featured-grid"} /-->

	<!-- wp:pattern {"slug":"product-category-grid"} /-->

	<!-- wp:pattern {"slug":"product-on-sale"} /-->

	<!-- wp:pattern {"slug":"commerce-trust-badges"} /-->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained","contentSize":"800px"}} -->
	<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xs"}}},"fontSize":"32"} -->
		<h2 class="wp-block-heading has-text-align-center has-32-font-size" style="margin-bottom:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Recently Viewed', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-600","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"16"} -->
		<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-16-font-size aligncenter" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Pick up where you left off with products you\'ve recently browsed.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:woocommerce/product-collection {"queryId":12,"query":{"perPage":4,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"date","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"queryContextIncludes":["collection"],"align":"wide"} -->
		<div class="wp-block-woocommerce-product-collection alignwide">
			<!-- wp:woocommerce/product-template -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|sm","left":"0"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--sm);padding-left:0">
				<!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} /-->

				<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0","top":"0"}},"typography":{"lineHeight":"1.4","fontSize":"16px"}},"__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

				<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","style":{"typography":{"fontSize":"16px"}}} /-->
			</div>
			<!-- /wp:group -->
			<!-- /wp:woocommerce/product-template -->
		</div>
		<!-- /wp:woocommerce/product-collection -->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"cta-commerce-newsletter"} /-->

	<!-- wp:pattern {"slug":"commerce-payment-icons"} /-->

	<!-- wp:pattern {"slug":"footer-store-default"} /-->

</div>
<!-- /wp:group -->
