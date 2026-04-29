<?php
/**
 * Title: Page Checkout Multi-Step
 * Slug: page-checkout-multi-step
 * Categories: template
 * Template Types: page-checkout-multi-step
 * Inserter: false
 */
?>

<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","metadata":{"name":"Main"},"className":"site-main","layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group site-main">
	<!-- wp:woocommerce/store-notices /-->

	<!-- wp:woocommerce/breadcrumbs /-->

	<!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}},"fontSize":"36"} -->
	<h1 class="wp-block-heading has-text-align-center has-36-font-size" style="margin-bottom:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Checkout', 'aegis' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","className":"aegis-checkout-steps","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide aegis-checkout-steps" style="margin-bottom:var(--wp--preset--spacing--md)">
		<!-- wp:group {"className":"aegis-checkout-step is-active","style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
		<div class="wp-block-group aegis-checkout-step is-active">
			<!-- wp:paragraph {"className":"aegis-step-number","fontSize":"14"} -->
			<p class="aegis-step-number has-14-font-size">1</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"14"} -->
			<p class="has-14-font-size"><?php echo esc_html__( 'Shipping', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:separator {"className":"is-style-wide","style":{"layout":{"selfStretch":"fixed","flexSize":"60px"}}} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" />
		<!-- /wp:separator -->

		<!-- wp:group {"className":"aegis-checkout-step","style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
		<div class="wp-block-group aegis-checkout-step">
			<!-- wp:paragraph {"className":"aegis-step-number","fontSize":"14"} -->
			<p class="aegis-step-number has-14-font-size">2</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"14"} -->
			<p class="has-14-font-size"><?php echo esc_html__( 'Payment', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:separator {"className":"is-style-wide","style":{"layout":{"selfStretch":"fixed","flexSize":"60px"}}} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide" />
		<!-- /wp:separator -->

		<!-- wp:group {"className":"aegis-checkout-step","style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
		<div class="wp-block-group aegis-checkout-step">
			<!-- wp:paragraph {"className":"aegis-step-number","fontSize":"14"} -->
			<p class="aegis-step-number has-14-font-size">3</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"14"} -->
			<p class="has-14-font-size"><?php echo esc_html__( 'Review', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:woocommerce/checkout {"align":"wide","className":"aegis-checkout-multi-step"} -->
	<div class="wp-block-woocommerce-checkout alignwide aegis-checkout-multi-step is-loading">
		<!-- wp:woocommerce/checkout-fields-block -->
		<div class="wp-block-woocommerce-checkout-fields-block">
			<!-- wp:woocommerce/checkout-express-payment-block /-->

			<!-- wp:group {"className":"aegis-checkout-step-1"} -->
			<div class="wp-block-group aegis-checkout-step-1">
				<!-- wp:woocommerce/checkout-contact-information-block /-->

				<!-- wp:woocommerce/checkout-shipping-address-block /-->

				<!-- wp:woocommerce/checkout-shipping-methods-block /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"aegis-checkout-step-2","style":{"display":{"all":"none"}}} -->
			<div class="wp-block-group aegis-checkout-step-2">
				<!-- wp:woocommerce/checkout-billing-address-block /-->

				<!-- wp:woocommerce/checkout-payment-block /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"aegis-checkout-step-3","style":{"display":{"all":"none"}}} -->
			<div class="wp-block-group aegis-checkout-step-3">
				<!-- wp:woocommerce/checkout-additional-information-block /-->

				<!-- wp:woocommerce/checkout-order-note-block /-->

				<!-- wp:woocommerce/checkout-terms-block /-->

				<!-- wp:woocommerce/checkout-actions-block /-->
			</div>
			<!-- /wp:group -->
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

	<!-- wp:group {"align":"wide","className":"aegis-checkout-navigation","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide aegis-checkout-navigation" style="margin-top:var(--wp--preset--spacing--sm)">
		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-outline aegis-checkout-prev","style":{"display":{"all":"none"}}} -->
			<div class="wp-block-button is-style-outline aegis-checkout-prev"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( '← Previous Step', 'aegis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"aegis-checkout-next"} -->
			<div class="wp-block-button aegis-checkout-next"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Continue to Payment →', 'aegis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

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
