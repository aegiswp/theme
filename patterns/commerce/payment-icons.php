<?php
/**
 * Title: Payment Icons
 * Slug: payment-icons
 * Categories: commerce
 * Keywords: payment, icons, visa, mastercard, paypal, amex, apple pay, google pay
 * Description: Accepted payment method icons that inherit the theme dark/light color scheme. Uses outline marks (payment/{name}-outline).
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["commerce"],"patternName":"payment-icons","name":"Payment Icons"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)">
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"14"} -->
		<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( 'We accept', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"aegis-payment-icons","style":{"spacing":{"blockGap":"var:preset|spacing|sm","margin":{"top":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
	<div class="wp-block-group aegis-payment-icons" style="margin-top:var(--wp--preset--spacing--xs)">
		<!-- wp:icon {"icon":"payment/visa-outline","ariaLabel":"Visa","style":{"dimensions":{"width":"48px"}}} /-->

		<!-- wp:icon {"icon":"payment/mastercard-outline","ariaLabel":"Mastercard","style":{"dimensions":{"width":"48px"}}} /-->

		<!-- wp:icon {"icon":"payment/amex-outline","ariaLabel":"American Express","style":{"dimensions":{"width":"48px"}}} /-->

		<!-- wp:icon {"icon":"payment/paypal-outline","ariaLabel":"PayPal","style":{"dimensions":{"width":"48px"}}} /-->

		<!-- wp:icon {"icon":"payment/discover-outline","ariaLabel":"Discover","style":{"dimensions":{"width":"48px"}}} /-->

		<!-- wp:icon {"icon":"payment/jcb-outline","ariaLabel":"JCB","style":{"dimensions":{"width":"48px"}}} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
