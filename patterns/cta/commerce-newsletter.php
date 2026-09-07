<?php
/**
 * Title: Commerce Newsletter CTA
 * Slug: commerce-newsletter
 * Categories: cta
 * Keywords: cta, newsletter, email, subscribe, commerce, woocommerce
 * Description: A newsletter signup CTA with discount incentive for store visitors.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["cta"],"patternName":"commerce-newsletter","name":"Commerce Newsletter CTA"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"neutral-50","layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group"><!-- wp:icon {"icon":"wordpress/mail","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" xml:space=\"preserve\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03ada048\" data-icon=\"wordpress-mail\" style=\"min-width:45px;height:45px\" fill=\"currentColor\"><title id=\"icon-6a2cc03ada048\">Mail Icon</title><path d=\"M19 5H5c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zM4.5 7c0-.3.2-.5.5-.5h14c.3 0 .5.2.5.5v1.3l-7.6 4.4-7.4-4.3V7zm15 8.6V17c0 .3-.2.5-.5.5H5c-.3 0-.5-.2-.5-.5v-6.9l5.9 3.4 1.5.9 1.5-.9 6.1-3.5v5.6z\"></path></svg>","style":{"dimensions":{"width":"45px"}}} /-->
<!-- wp:heading {"textAlign":"center","fontSize":"28"} -->
		<h2 class="wp-block-heading has-text-align-center has-28-font-size"><?php echo esc_html__( 'Get 10% Off Your First Order', 'aegis' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"16"} -->
		<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-16-font-size aligncenter"><?php echo esc_html__( 'Subscribe to our newsletter for exclusive deals, new arrivals, and insider-only discounts delivered straight to your inbox.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)"><!-- wp:search {"showLabel":false,"placeholder":"Email address","buttonText":"Subscribe","className":"is-style-newsletter"} /--></div>
		<!-- /wp:group -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"12"} -->
		<p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-12-font-size aligncenter"><?php echo esc_html__( 'No spam, ever. Unsubscribe anytime.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->