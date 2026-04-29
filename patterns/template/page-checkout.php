<?php
/**
 * Title: Page Checkout
 * Slug: page-checkout
 * Categories: template
 * Template Types: page-checkout
 * Inserter: false
 */
?>

<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","metadata":{"name":"Main"},"className":"site-main","layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group site-main">
	<!-- wp:woocommerce/store-notices /-->

	<!-- wp:woocommerce/breadcrumbs /-->

	<!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"36"} -->
	<h1 class="wp-block-heading has-text-align-center has-36-font-size" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Checkout', 'aegis' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:woocommerce/checkout {"align":"wide"} -->
	<div class="wp-block-woocommerce-checkout alignwide is-loading">
		<!-- wp:woocommerce/checkout-fields-block -->
		<div class="wp-block-woocommerce-checkout-fields-block">
			<!-- wp:woocommerce/checkout-express-payment-block /-->

			<!-- wp:woocommerce/checkout-contact-information-block /-->

			<!-- wp:woocommerce/checkout-shipping-address-block /-->

			<!-- wp:woocommerce/checkout-billing-address-block /-->

			<!-- wp:woocommerce/checkout-shipping-methods-block /-->

			<!-- wp:woocommerce/checkout-payment-block /-->

			<!-- wp:woocommerce/checkout-additional-information-block /-->

			<!-- wp:woocommerce/checkout-order-note-block /-->

			<!-- wp:woocommerce/checkout-terms-block /-->

			<!-- wp:woocommerce/checkout-actions-block /-->
		</div>
		<!-- /wp:woocommerce/checkout-fields-block -->

		<!-- wp:woocommerce/checkout-totals-block -->
		<div class="wp-block-woocommerce-checkout-totals-block">
			<!-- wp:woocommerce/checkout-order-summary-block -->
			<div class="wp-block-woocommerce-checkout-order-summary-block">
				<!-- wp:woocommerce/checkout-order-summary-cart-items-block /-->
				<!-- wp:woocommerce/checkout-order-summary-subtotal-block /-->
				<!-- wp:woocommerce/checkout-order-summary-fee-block /-->
				<!-- wp:woocommerce/checkout-order-summary-discount-block /-->
				<!-- wp:woocommerce/checkout-order-summary-coupon-block /-->
				<!-- wp:woocommerce/checkout-order-summary-shipping-block /-->
				<!-- wp:woocommerce/checkout-order-summary-taxes-block /-->
			</div>
			<!-- /wp:woocommerce/checkout-order-summary-block -->
		</div>
		<!-- /wp:woocommerce/checkout-totals-block -->
	</div>
	<!-- /wp:woocommerce/checkout -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--md)">
		<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"14"} -->
		<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-14-font-size aligncenter">🔒 <?php echo esc_html__( 'Secure checkout powered by industry-standard encryption', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
