<?php
/**
 * Title: Page My Account
 * Slug: page-my-account
 * Categories: template
 * Template Types: page-my-account
 * Inserter: false
 */
?>

<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","metadata":{"name":"Main"},"className":"site-main","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group site-main" style="padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--lg)">
	<!-- wp:woocommerce/store-notices /-->

	<!-- wp:woocommerce/breadcrumbs /-->

	<!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"36"} -->
	<h1 class="wp-block-heading has-text-align-center has-36-font-size" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'My Account', 'aegis' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","className":"woocommerce-account-wrapper","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide woocommerce-account-wrapper">
		<!-- wp:shortcode -->
		[woocommerce_my_account]
		<!-- /wp:shortcode -->
	</div>
	<!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
