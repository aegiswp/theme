<?php
/**
 * Title: 01. Header Pattern
 * Slug: aegis/header-01
 * Categories: headers
 * Description: A default header layout featuring a full-width design with social links, a special offer announcement, a search functionality, and a navigation menu.
 * Keywords: header, navigation, social links, search bar, responsive, full-width
 * Viewport Width: 1400
 * Block Types: core/template-part/header
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["headers"],"patternName":"aegis/header-01","name":"01. Header Pattern"},"align":"full","layout":{"inherit":false}} -->
<div class="wp-block-group alignfull">
	<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|10","top":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"align":"center","fontSize":"small"} -->
		<p class="has-text-align-center has-small-font-size"><?php echo esc_html__('Offer Highlight: Announce a special deal or limited-time opportunity (max. 52 characters).', 'aegis'); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"5px","bottom":"5px"},"margin":{"top":"0","bottom":"0"}},"border":{"bottom":{"color":"var:preset|color|quaternary","width":"1px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--quaternary);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:5px;padding-right:var(--wp--preset--spacing--20);padding-bottom:5px;padding-left:var(--wp--preset--spacing--20)">
		<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"align":"wide"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center is-not-stacked-on-mobile">
			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center">
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

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","left":"var:preset|spacing|20","bottom":"var:preset|spacing|10"},"margin":{"top":"0","bottom":"0"}},"border":{"bottom":{"color":"var:preset|color|quaternary","width":"1px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="border-bottom-color:var(--wp--preset--color--quaternary);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
		<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center is-not-stacked-on-mobile" style="padding-right:0;padding-left:0">
			<!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:site-logo /--></div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"80%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:80%">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
				<div class="wp-block-group">
					<!-- wp:navigation {"icon":"menu","overlayBackgroundColor":"base","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account"]},"style":{"spacing":{"blockGap":"0"}},"fontSize":"medium","layout":{"type":"flex","setCascadingProperties":"true","justifyContent":"right","orientation":"horizontal","flexWrap":"wrap"}} /--></div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
