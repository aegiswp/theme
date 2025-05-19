<?php
/**
 * Title: 02. Header Pattern
 * Slug: aegis/header-02
 * Categories: headers
 * Description: Features social links, a centralized site title, and a right-aligned search bar and mini-cart, all within a full-width group.
 * Keywords: header, search bar, social links, navigation, e-commerce, business, responsive
 * Viewport Width: 1400
 * Block Types: core/template-part/header
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["headers"],"patternName":"aegis/header-02","name":"02. Header Pattern"},"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"inherit":false}} -->
<div class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|10","top":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
		<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
		<p class="has-text-align-center has-small-font-size"><?php echo esc_html__('Offer Highlight: Announce a special deal or limited-time opportunity (max. 52 characters).', 'aegis'); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"margin":{"top":"0","bottom":"0"}},"border":{"bottom":{"color":"var:preset|color|quaternary","width":"1px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--quaternary);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
		<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"align":"wide"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center is-not-stacked-on-mobile">
			<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%">
				<!-- wp:social-links {"iconColor":"contrast","iconColorValue":"#1c1c1e","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"facebook","label":""} /-->

					<!-- wp:social-link {"url":"#","service":"linkedin","label":""} /-->

					<!-- wp:social-link {"url":"#","service":"instagram","label":""} /-->

					<!-- wp:social-link {"url":"#","service":"bluesky","label":""} /-->

					<!-- wp:social-link {"url":"#","service":"wordpress","label":""} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:site-logo {"align":"center"} /--></div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%">
				<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":"var:preset|spacing|10","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
				<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-right:0;padding-left:0">
					<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search products…","width":350,"widthUnit":"px","buttonText":"Search","buttonUseIcon":true,"query":{"post_type":"product"},"className":"is-style-hide-on-mobile","style":{"border":{"width":"1px"},"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"small","borderColor":"contrast","namespace":"woocommerce/product-search"} /-->

					<!-- wp:woocommerce/mini-cart {"miniCartIcon":"bag","addToCartBehaviour":"open_drawer","hasHiddenPrice":false,"fontSize":"small"} /-->

					<!-- wp:woocommerce/customer-account {"displayStyle":"icon_only","iconStyle":"line","iconClass":"wc-block-customer-account__account-icon","fontSize":"small","style":{"spacing":{"padding":{"top":"5px","bottom":"5px","left":"5px","right":"5px"}}}} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"5px","right":"var:preset|spacing|20","left":"var:preset|spacing|20","bottom":"5px"},"margin":{"top":"0","bottom":"0"}},"border":{"bottom":{"color":"var:preset|color|quaternary","width":"1px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="border-bottom-color:var(--wp--preset--color--quaternary);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:5px;padding-right:var(--wp--preset--spacing--20);padding-bottom:5px;padding-left:var(--wp--preset--spacing--20)">
		<!-- wp:navigation {"icon":"menu","overlayBackgroundColor":"base","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account"]},"className":"is-style-default","fontSize":"medium","layout":{"type":"flex","setCascadingProperties":"true","justifyContent":"center","orientation":"horizontal","flexWrap":"wrap"}} /--></div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
