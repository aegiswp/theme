<?php
/**
 * Title: Order Confirmation
 * Slug: order-confirmation
 * Categories: template
 * Template Types: order-confirmation
 * Inserter: false
 */
?>

<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","metadata":{"name":"Main"},"className":"site-main","layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group site-main">
	<!-- wp:woocommerce/store-notices /-->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|md"}}},"layout":{"type":"constrained","contentSize":"800px"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--md)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"align":"center","fontSize":"48"} -->
			<p class="aligncenter has-text-align-center has-48-font-size aligncenter">✓</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"36"} -->
			<h1 class="wp-block-heading has-text-align-center has-36-font-size"><?php echo esc_html__( 'Thank You for Your Order', 'aegis' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"18"} -->
			<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-18-font-size aligncenter"><?php echo esc_html__( 'Your order has been received and is being processed. You will receive a confirmation email shortly.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|md"}}},"layout":{"type":"constrained","contentSize":"800px"}} -->
	<div class="wp-block-group alignwide" style="padding-bottom:var(--wp--preset--spacing--md)">
		<!-- wp:woocommerce/order-confirmation-status /-->

		<!-- wp:woocommerce/order-confirmation-summary /-->

		<!-- wp:woocommerce/order-confirmation-totals-wrapper {"align":"wide"} -->
		<div class="wp-block-woocommerce-order-confirmation-totals-wrapper alignwide">
			<!-- wp:heading {"level":2,"fontSize":"24"} -->
			<h2 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Order Details', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:woocommerce/order-confirmation-totals /-->
		</div>
		<!-- /wp:woocommerce/order-confirmation-totals-wrapper -->

		<!-- wp:woocommerce/order-confirmation-downloads-wrapper -->
		<div class="wp-block-woocommerce-order-confirmation-downloads-wrapper">
			<!-- wp:heading {"level":2,"fontSize":"24"} -->
			<h2 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Downloads', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:woocommerce/order-confirmation-downloads /-->
		</div>
		<!-- /wp:woocommerce/order-confirmation-downloads-wrapper -->

		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--md)">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:woocommerce/order-confirmation-shipping-wrapper -->
				<div class="wp-block-woocommerce-order-confirmation-shipping-wrapper">
					<!-- wp:heading {"level":2,"fontSize":"24"} -->
					<h2 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Shipping Address', 'aegis' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:woocommerce/order-confirmation-shipping-address /-->
				</div>
				<!-- /wp:woocommerce/order-confirmation-shipping-wrapper -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:woocommerce/order-confirmation-billing-wrapper -->
				<div class="wp-block-woocommerce-order-confirmation-billing-wrapper">
					<!-- wp:heading {"level":2,"fontSize":"24"} -->
					<h2 class="wp-block-heading has-24-font-size"><?php echo esc_html__( 'Billing Address', 'aegis' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:woocommerce/order-confirmation-billing-address /-->
				</div>
				<!-- /wp:woocommerce/order-confirmation-billing-wrapper -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:woocommerce/order-confirmation-additional-information /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"},"margin":{"top":"var:preset|spacing|md"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained","contentSize":"800px"}} -->
	<div class="wp-block-group alignwide is-style-surface has-neutral-50-background-color has-background" style="margin-top:var(--wp--preset--spacing--md);padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:heading {"textAlign":"center","level":2,"fontSize":"24"} -->
		<h2 class="wp-block-heading has-text-align-center has-24-font-size"><?php echo esc_html__( 'You May Also Like', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:woocommerce/product-collection {"queryId":2,"query":{"perPage":3,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"popularity","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"queryContextIncludes":["collection"],"align":"wide"} -->
		<div class="wp-block-woocommerce-product-collection alignwide">
			<!-- wp:woocommerce/product-template -->
			<!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} /-->

			<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0.75rem","top":"0"}},"typography":{"lineHeight":"1.4","fontSize":"18px"}},"__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

			<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","style":{"typography":{"fontSize":"16px"}}} /-->

			<!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
			<!-- /wp:woocommerce/product-template -->
		</div>
		<!-- /wp:woocommerce/product-collection -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/shop"><?php echo esc_html__( 'Continue Shopping', 'aegis' ); ?></a></div>
			<!-- /wp:button -->

			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/my-account"><?php echo esc_html__( 'View My Account', 'aegis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
