<?php
/**
 * Title: 08. Header Pattern
 * Slug: aegis/header-08
 * Categories: header
 * Description: This header pattern features a minimalistic approach with a clean and clear design, integrating an offer highlight and a dynamic navigation interface including a mini-cart.
 * Keywords: header, minimalistic, clean, modern, navigation, e-commerce, dynamic, responsive
 * Viewport Width: 1400
 * Block Types: core/template-part/header
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["header"],"patternName":"aegis/header-08","name":"<?php echo esc_html_x('08. Header Pattern', 'Name of the pattern', 'aegis'); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"inherit":false}} -->
<div class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","bottom":"7px","left":"var:preset|spacing|30","top":"7px"}}},"backgroundColor":"foreground","textColor":"background","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background" style="padding-top:7px;padding-right:var(--wp--preset--spacing--30);padding-bottom:7px;padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:paragraph {"align":"center","fontSize":"tiny"} -->
		<p class="has-text-align-center has-tiny-font-size"><?php echo esc_html_x('[Offer Highlight (52 chars): Announce a special deal or limited-time opportunity.]', 'Replace with a description of the section.', 'aegis'); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10px","right":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"10px"},"margin":{"top":"0","bottom":"0"}},"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:10px;padding-right:var(--wp--preset--spacing--30);padding-bottom:10px;padding-left:var(--wp--preset--spacing--30)">
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
					<!-- wp:navigation {"icon":"menu","overlayBackgroundColor":"background","className":"is-style-default","layout":{"type":"flex","setCascadingProperties":"true","justifyContent":"right","orientation":"horizontal","flexWrap":"wrap"},"fontSize":"tiny"} /-->

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