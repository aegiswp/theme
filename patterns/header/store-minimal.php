<?php
/**
 * Title: Store Header Minimal
 * Slug: store-minimal
 * Categories: header
 * Block Types: core/template-part/header
 * Keywords: header, store, minimal, funnel, checkout, woocommerce
 * Description: A minimal store header with logo and secure checkout badge — ideal for checkout and funnel pages.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["header"],"patternName":"store-minimal","name":"Store Header Minimal"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":30} /-->

			<!-- wp:site-title {"level":0,"style":{"typography":{"fontSize":"18px","fontWeight":"700"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;opacity:0.6"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
			<!-- /wp:html -->

			<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
			<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Secure Checkout', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
