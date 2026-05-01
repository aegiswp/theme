<?php
/**
 * Title: Store Header Default
 * Slug: store-default
 * Categories: header
 * Block Types: core/template-part/header
 * Keywords: header, store, woocommerce, shop, cart, account
 * Description: A full store header with logo, shop navigation, search, customer account, and mini-cart.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["header"],"patternName":"store-default","name":"Store Header Default"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}},"zIndex":{"all":"99"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--xs);padding-left:var(--wp--preset--spacing--xs)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":35} /-->

			<!-- wp:site-title {"level":0,"style":{"typography":{"fontSize":"20px","fontWeight":"700"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:navigation {"icon":"menu","className":"is-style-slide-in","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account"]},"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","justifyContent":"center"}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
		<div class="wp-block-group">
			<!-- wp:search {"label":"","showLabel":false,"placeholder":"<?php echo esc_attr__( 'Search products…', 'aegis' ); ?>","width":200,"widthUnit":"px","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"display":{"mobile":"none"}},"fontSize":"14"} /-->

			<!-- wp:woocommerce/customer-account {"displayStyle":"icon_only","iconStyle":"line","iconClass":"wc-block-customer-account__account-icon","style":{"typography":{"fontSize":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dfont-size\u002d\u002d14)"}}} /-->

			<!-- wp:woocommerce/mini-cart {"className":"is-style-rich","style":{"typography":{"fontSize":"var(\u002d\u002dwp\u002d\u002dpreset\u002d\u002dfont-size\u002d\u002d14)"}}} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
