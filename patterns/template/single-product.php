<?php
/**
 * Title: Single Product
 * Slug: single-product
 * Categories: template
 * Template Types: single-product
 * Inserter: false
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","className":"site-main","metadata":{"name":"Main"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group site-main" style="padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--lg)">
	<!-- wp:woocommerce/breadcrumbs /-->

	<!-- wp:woocommerce/store-notices /-->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|lg"},"margin":{"top":"var:preset|spacing|sm"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--sm)">
		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:woocommerce/product-image-gallery /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:woocommerce/product-sale-badge {"align":""} /-->

				<!-- wp:post-title {"level":1,"style":{"typography":{"lineHeight":"1.3"}},"fontSize":"32","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

				<!-- wp:woocommerce/product-rating {"isDescendentOfSingleProductTemplate":true} /-->

				<!-- wp:woocommerce/product-price {"isDescendentOfSingleProductTemplate":true,"style":{"typography":{"fontSize":"24px","fontWeight":"600"}}} /-->

				<!-- wp:post-excerpt {"excerptLength":40,"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}},"textColor":"neutral-600","fontSize":"16","__woocommerceNamespace":"woocommerce/product-collection/product-summary"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}}},"className":"is-style-wide"} -->
			<hr class="wp-block-separator is-style-wide" style="margin-top:var(--wp--preset--spacing--sm);margin-bottom:var(--wp--preset--spacing--sm)" />
			<!-- /wp:separator -->

			<!-- wp:woocommerce/add-to-cart-form /-->

			<!-- wp:separator {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}}},"className":"is-style-wide"} -->
			<hr class="wp-block-separator is-style-wide" style="margin-top:var(--wp--preset--spacing--sm);margin-bottom:var(--wp--preset--spacing--sm)" />
			<!-- /wp:separator -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","orientation":"vertical"},"fontSize":"14"} -->
			<div class="wp-block-group has-14-font-size">
				<!-- wp:woocommerce/product-sku {"isDescendentOfSingleProductTemplate":true} /-->

				<!-- wp:post-terms {"term":"product_cat","prefix":"<?php echo esc_attr__( 'Category: ', 'aegis' ); ?>"} /-->

				<!-- wp:post-terms {"term":"product_tag","prefix":"<?php echo esc_attr__( 'Tags: ', 'aegis' ); ?>"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
				<!-- wp:html -->
				<div style="display:flex;align-items:center;gap:6px">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity:0.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
					<span style="font-size:13px;opacity:0.6"><?php echo esc_html__( 'Secure Checkout', 'aegis' ); ?></span>
				</div>
				<!-- /wp:html -->

				<!-- wp:html -->
				<div style="display:flex;align-items:center;gap:6px">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity:0.5"><rect width="20" height="14" x="2" y="5" rx="2"/><line x1="2" x2="22" y1="10" y2="10"/></svg>
					<span style="font-size:13px;opacity:0.6"><?php echo esc_html__( 'Free Shipping', 'aegis' ); ?></span>
				</div>
				<!-- /wp:html -->

				<!-- wp:html -->
				<div style="display:flex;align-items:center;gap:6px">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity:0.5"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
					<span style="font-size:13px;opacity:0.6"><?php echo esc_html__( '30-Day Returns', 'aegis' ); ?></span>
				</div>
				<!-- /wp:html -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
		<!-- wp:woocommerce/product-details {"align":"wide"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"fontSize":"24"} -->
		<h2 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Related Products', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:woocommerce/related-products {"align":"wide"} -->
		<div class="wp-block-woocommerce-related-products alignwide">
			<!-- wp:query {"queryId":10,"query":{"perPage":4,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"woocommerce/related-products","lock":{"remove":true,"move":true}} -->
			<div class="wp-block-query">
				<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"grid","columnCount":4}} -->
				<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--sm)">
					<!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} -->
					<!-- wp:woocommerce/product-sale-badge {"align":"right"} /-->
					<!-- /wp:woocommerce/product-image -->

					<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0","top":"0"}},"typography":{"lineHeight":"1.4","fontSize":"16px"}},"__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

					<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","style":{"typography":{"fontSize":"16px"}}} /-->

					<!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"fontSize":"14"} /-->
				</div>
				<!-- /wp:group -->
				<!-- /wp:post-template -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:woocommerce/related-products -->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->