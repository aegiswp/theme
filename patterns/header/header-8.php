<?php
/**
 * 08. Header Block Pattern
 */
return array(
    'title'       => __('08. Header', 'aegis'),
    'description' => __('08. Header', 'aegis'),
    'categories'  => array('aegis-header'),
    'blockTypes'  => array('core/template-part/header'),
    'content'     => '
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"header-8","layout":{"inherit":false}} -->
	<div class="wp-block-group alignfull header-8" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","bottom":"10px","left":"var:preset|spacing|30","top":"10px"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="padding-top:10px;padding-right:var(--wp--preset--spacing--30);padding-bottom:10px;padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:paragraph {"align":"center","fontSize":"tiny"} -->
			<p class="has-text-align-center has-tiny-font-size">' . esc_html__( 'Offer Highlight (52 chars): [Announce a special deal or limited-time opportunity.]', 'aegis' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10px","right":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"10px"},"margin":{"top":"0","bottom":"0"}},"border":{"bottom":{"color":"var:preset|color|foreground","width":"1px"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group alignwide" style="border-bottom-color:var(--wp--preset--color--foreground);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:10px;padding-right:var(--wp--preset--spacing--30);padding-bottom:10px;padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
			<div class="wp-block-columns alignwide are-vertically-aligned-center is-not-stacked-on-mobile" style="padding-right:0;padding-left:0">
				<!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">
					<!-- wp:site-title {"level":0,"textAlign":"left","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"extra-large"} /-->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":"70%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:70%">
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
					<div class="wp-block-group">
						<!-- wp:navigation {"icon":"menu","overlayBackgroundColor":"background","className":"is-style-default","layout":{"type":"flex","setCascadingProperties":"true","justifyContent":"right","orientation":"horizontal","flexWrap":"wrap"},"fontSize":"tiny"} /-->

						<!-- wp:woocommerce/mini-cart {"hasHiddenPrice":true,"style":{"typography":{"fontSize":"12px"}}} /-->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->',
);