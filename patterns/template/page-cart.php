<?php
/**
 * Title: Page Cart
 * Slug: page-cart
 * Categories: template
 * Template Types: page-cart
 * Inserter: false
 */
?>

<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","metadata":{"name":"Main"},"className":"site-main","layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group site-main">
	<!-- wp:woocommerce/store-notices /-->

	<!-- wp:woocommerce/breadcrumbs /-->

	<!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"36"} -->
	<h1 class="wp-block-heading has-text-align-center has-36-font-size" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Your Cart', 'aegis' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:woocommerce/cart {"align":"wide"} -->
	<div class="wp-block-woocommerce-cart alignwide is-loading">
		<!-- wp:woocommerce/filled-cart-block -->
		<div class="wp-block-woocommerce-filled-cart-block">
			<!-- wp:woocommerce/cart-items-block -->
			<div class="wp-block-woocommerce-cart-items-block">
				<!-- wp:woocommerce/cart-line-items-block -->
				<div class="wp-block-woocommerce-cart-line-items-block"></div>
				<!-- /wp:woocommerce/cart-line-items-block -->

				<!-- wp:woocommerce/cart-cross-sells-block -->
				<div class="wp-block-woocommerce-cart-cross-sells-block">
					<!-- wp:heading {"fontSize":"20"} -->
					<h2 class="wp-block-heading has-20-font-size"><?php echo esc_html__( 'You may also like', 'aegis' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:woocommerce/cart-cross-sells-products-block -->
					<div class="wp-block-woocommerce-cart-cross-sells-products-block"></div>
					<!-- /wp:woocommerce/cart-cross-sells-products-block -->
				</div>
				<!-- /wp:woocommerce/cart-cross-sells-block -->
			</div>
			<!-- /wp:woocommerce/cart-items-block -->

			<!-- wp:woocommerce/cart-totals-block -->
			<div class="wp-block-woocommerce-cart-totals-block">
				<!-- wp:woocommerce/cart-order-summary-block -->
				<div class="wp-block-woocommerce-cart-order-summary-block">
					<!-- wp:woocommerce/cart-order-summary-heading-block -->
					<div class="wp-block-woocommerce-cart-order-summary-heading-block"></div>
					<!-- /wp:woocommerce/cart-order-summary-heading-block -->

					<!-- wp:woocommerce/cart-order-summary-subtotal-block /-->
					<!-- wp:woocommerce/cart-order-summary-fee-block /-->
					<!-- wp:woocommerce/cart-order-summary-discount-block /-->
					<!-- wp:woocommerce/cart-order-summary-coupon-block /-->
					<!-- wp:woocommerce/cart-order-summary-shipping-block /-->
					<!-- wp:woocommerce/cart-order-summary-taxes-block /-->
				</div>
				<!-- /wp:woocommerce/cart-order-summary-block -->

				<!-- wp:woocommerce/cart-express-payment-block /-->

				<!-- wp:woocommerce/proceed-to-checkout-block /-->

				<!-- wp:woocommerce/cart-accepted-payment-methods-block /-->
			</div>
			<!-- /wp:woocommerce/cart-totals-block -->
		</div>
		<!-- /wp:woocommerce/filled-cart-block -->

		<!-- wp:woocommerce/empty-cart-block -->
		<div class="wp-block-woocommerce-empty-cart-block">
			<!-- wp:heading {"textAlign":"center","fontSize":"24"} -->
			<h2 class="wp-block-heading has-text-align-center has-24-font-size"><?php echo esc_html__( 'Your cart is currently empty', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="aligncenter has-text-align-center aligncenter"><?php echo esc_html__( 'Looks like you haven\'t added anything to your cart yet.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/shop"><?php echo esc_html__( 'Browse Products', 'aegis' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:woocommerce/empty-cart-block -->
	</div>
	<!-- /wp:woocommerce/cart -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
