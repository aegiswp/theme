<?php
/**
 * Title: 07. Header Pattern
 * Slug: aegis/header-07
 * Categories: header
 * Description: A modern header layout featuring a striking offer highlight and a sleek navigation interface, complemented by a mini-cart for easy access.
 * Keywords: header, modern, sticky, e-commerce, navigation, responsive, top header, offer highlight
 * Viewport Width: 1400
 * Block Types: core/template-part/header
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["header"],"patternName":"aegis/header-07","name":"<?php echo esc_html_x('07. Header Pattern', 'Name of the pattern', 'aegis'); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"foreground","textColor":"background","layout":{"inherit":false}} -->
<div class="wp-block-group alignfull has-background-color has-foreground-background-color has-text-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"7px","right":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"7px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:7px;padding-right:var(--wp--preset--spacing--30);padding-bottom:7px;padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:paragraph {"align":"center","className":"is-style-default","fontSize":"tiny"} -->
		<p class="has-text-align-center is-style-default has-tiny-font-size"><?php echo esc_html_e('[Offer Highlight (52 chars): Announce a special deal or limited-time opportunity.]', 'aegis'); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10px","right":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"10px"},"margin":{"top":"0","bottom":"0"}},"border":{"top":{"color":"#282828","width":"1px"},"right":[],"bottom":{"color":"#282828","width":"1px"},"left":[]}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="border-top-color:#282828;border-top-width:1px;border-bottom-color:#282828;border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:10px;padding-right:var(--wp--preset--spacing--30);padding-bottom:10px;padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center is-not-stacked-on-mobile" style="padding-right:0;padding-left:0">
			<!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%">
				<!-- wp:site-title {"level":0,"textAlign":"left","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"extra-large"} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"80%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:80%">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
				<div class="wp-block-group">
					<!-- wp:navigation {"icon":"menu","overlayBackgroundColor":"foreground","overlayTextColor":"background","className":"is-style-default","layout":{"type":"flex","setCascadingProperties":"true","justifyContent":"right","orientation":"horizontal","flexWrap":"wrap"},"fontSize":"tiny"} /-->

					<!-- wp:woocommerce/mini-cart {"miniCartIcon":"bag","addToCartBehaviour":"open_drawer","style":{"typography":{"fontSize":"12px"}}} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->