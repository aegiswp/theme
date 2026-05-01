<?php
/**
 * Title: Page Wishlist
 * Slug: page-wishlist
 * Categories: template
 * Template Types: page-wishlist
 * Inserter: false
 */
?>

<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","metadata":{"name":"Main"},"className":"site-main","layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group site-main">
	<!-- wp:woocommerce/store-notices /-->

	<!-- wp:woocommerce/breadcrumbs /-->

	<!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"36"} -->
	<h1 class="wp-block-heading has-text-align-center has-36-font-size" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'My Wishlist', 'aegis' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"16"} -->
	<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-16-font-size aligncenter"><?php echo esc_html__( 'Save your favorite items and come back to them anytime.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:shortcode -->
		[ti_wishlisttable]
		<!-- /wp:shortcode -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide" style="padding-bottom:var(--wp--preset--spacing--lg)">
		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/shop"><?php echo esc_html__( 'Continue Shopping', 'aegis' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
