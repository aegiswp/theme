<?php
/**
 * Title: Commerce Free Shipping CTA
 * Slug: commerce-free-shipping
 * Categories: cta
 * Keywords: cta, shipping, free, commerce, banner, woocommerce
 * Description: A slim announcement bar CTA promoting free shipping with a threshold and shop link.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["cta"],"patternName":"commerce-free-shipping","name":"Commerce Free Shipping CTA"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}}},"backgroundColor":"primary-500","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-primary-500-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group"><!-- wp:icon {"icon":"wordpress/shipping","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03ad7938\" data-icon=\"wordpress-shipping\" style=\"min-width:40px;height:40px\" fill=\"currentColor\"><title id=\"icon-6a2cc03ad7938\">Shipping Icon</title><path d=\"M3 6.75C3 5.784 3.784 5 4.75 5H15v2.313l.05.027 5.056 2.73.394.212v3.468a1.75 1.75 0 0 1-1.75 1.75h-.012a2.5 2.5 0 1 1-4.975 0H9.737a2.5 2.5 0 1 1-4.975 0H3V6.75zM13.5 14V6.5H4.75a.25.25 0 0 0-.25.25V14h.965a2.493 2.493 0 0 1 1.785-.75c.7 0 1.332.287 1.785.75H13.5zm4.535 0h.715a.25.25 0 0 0 .25-.25v-2.573l-4-2.16v4.568a2.487 2.487 0 0 1 1.25-.335c.7 0 1.332.287 1.785.75zM6.282 15.5a1.002 1.002 0 0 0 .968 1.25 1 1 0 1 0-.968-1.25zm9 0a1 1 0 1 0 1.937.498 1 1 0 0 0-1.938-.498z\"></path></svg>","style":{"dimensions":{"width":"40px"}}} /-->
<!-- wp:paragraph -->
		<p><?php echo esc_html__( 'Free shipping on all orders over $50!', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p><a href="#" style="color:inherit;text-decoration:underline"><?php echo esc_html__( 'Shop Now →', 'aegis' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->