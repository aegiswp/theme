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
			<!-- wp:icon {"icon":"social/aegis","url":"<?php echo esc_url( home_url( '/' ) ); ?>","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-store-default-aegis\" data-icon=\"social-aegis\" style=\"min-width:35px;height:35px\" fill=\"currentColor\"><title id=\"icon-store-default-aegis\">Aegis Icon</title><path d=\"M10.06 7.75 L12.02 3.87 L13.95 7.72 L16.65 9.29 L12.03 0 L7.34 9.3 L10.06 7.75 Z M18.37 12.72 L18.2 12.36 L15.5 10.79 L17.02 13.68 L20.05 18.61 L12.02 15.17 L3.98 18.62 L6.96 13.68 L8.39 10.81 L5.67 12.39 L5.5 12.71 L0 22.87 L12.01 16.87 L24 22.94 L18.37 12.72 Z\" stroke=\"none\" fill-rule=\"evenodd\"></path></svg>","style":{"dimensions":{"width":"35px"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:navigation {"icon":"menu","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account"]},"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxs","bottom":"var:preset|spacing|xxs"}}},"layout":{"type":"flex","justifyContent":"center"}} /-->
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
