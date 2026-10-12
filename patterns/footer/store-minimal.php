<?php
/**
 * Title: Store Footer Minimal
 * Slug: store-minimal
 * Categories: footer
 * Block Types: core/template-part/footer
 * Keywords: footer, store, minimal, funnel, checkout, woocommerce
 * Description: A minimal store footer with copyright, privacy/terms links, and payment icons — ideal for checkout and funnel pages.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["footer"],"patternName":"store-minimal","name":"Store Footer Minimal"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"},"margin":{"top":"0","bottom":"0"}},"border":{"top":{"color":"var:preset|color|neutral-200","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--neutral-200);border-top-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--xs)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"14"} -->
		<div class="wp-block-group has-14-font-size">
			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><?php echo esc_html__( '© Copyright {year}', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:site-title {"level":0,"style":{"typography":{"fontSize":"14px"}},"textColor":"neutral-600"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"14"} -->
		<div class="wp-block-group has-14-font-size">
			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><a href="<?php echo esc_url( aegis_url( '/privacy-policy/' ) ); ?>" style="color:inherit"><?php echo esc_html__( 'Privacy Policy', 'aegis' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><a href="<?php echo esc_url( aegis_url( '/terms-and-conditions/' ) ); ?>" style="color:inherit"><?php echo esc_html__( 'Terms & Conditions', 'aegis' ); ?></a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><a href="<?php echo esc_url( aegis_url( '/refund-policy/' ) ); ?>" style="color:inherit"><?php echo esc_html__( 'Refund Policy', 'aegis' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"aegis-payment-icons","style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group aegis-payment-icons">
			<!-- wp:icon {"icon":"payment/visa","ariaLabel":"Visa","style":{"dimensions":{"width":"32px"}}} /-->

			<!-- wp:icon {"icon":"payment/mastercard","ariaLabel":"Mastercard","style":{"dimensions":{"width":"32px"}}} /-->

			<!-- wp:icon {"icon":"payment/paypal","ariaLabel":"PayPal","style":{"dimensions":{"width":"32px"}}} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
