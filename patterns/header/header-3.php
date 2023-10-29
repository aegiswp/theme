<?php
/**
 * 03. Header Block Pattern
 */
return array(
	'title'	  => __( '03. Header (Fixed)', 'aegis' ),
	'description' => __( 'Header (Fixed)', 'aegis' ),
	'categories' => array( 'aegis-header' ),
	'blockTypes' => array( 'core/template-part/header' ),
	'content' => '
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"header header-1","layout":{"inherit":false}} -->
	<div class="wp-block-group alignfull header header-1" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","bottom":"10px","left":"var:preset|spacing|30","top":"10px"}}},"backgroundColor":"secondary","className":"aegis-banner","layout":{"type":"constrained"}} -->
		<div class="wp-block-group aegis-banner has-secondary-background-color has-background" style="padding-top:10px;padding-right:var(--wp--preset--spacing--30);padding-bottom:10px;padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:paragraph {"align":"center","fontSize":"tiny"} -->
			<p class="has-text-align-center has-tiny-font-size">' . esc_html__( 'Offer Highlight (52 chars): [Announce a special deal or limited-time opportunity.]', 'aegis' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","right":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"10px"},"margin":{"top":"0","bottom":"0"}}},"className":"socials-cart aegis-banner","layout":{"type":"constrained"}} -->
		<div class="wp-block-group socials-cart aegis-banner" style="margin-top:0;margin-bottom:0;padding-top:10px;padding-right:var(--wp--preset--spacing--30);padding-bottom:10px;padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide">
				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","openInNewTab":true,"size":"has-small-icon-size","className":"is-style-logos-only socials","layout":{"type":"flex","justifyContent":"left"}} -->
					<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only socials">
						<!-- wp:social-link {"url":"https://facebook.com/","service":"facebook","label":"Facebook"} /-->

						<!-- wp:social-link {"url":"https://linkedin.com/","service":"linkedin","label":"LinkedIn"} /-->

						<!-- wp:social-link {"url":"https://instagram.com/","service":"instagram","label":"Instagram"} /-->

						<!-- wp:social-link {"url":"htps://wordpress.org/","service":"wordpress","label":"WordPress"} /-->

						<!-- wp:social-link {"url":"https://github.com/","service":"github","label":"GitHub"} /-->
					</ul>
					<!-- /wp:social-links -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:group {"align":"wide","className":"banner-info","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
					<div class="wp-block-group alignwide banner-info">
						<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search products…","width":350,"widthUnit":"px","buttonText":"Search","buttonPosition":"no-button","query":{"post_type":"product"},"style":{"border":{"width":"1px","color":"#1c1c1e"}},"className":"hide-mobile"} /-->

						<!-- wp:woocommerce/mini-cart {"hasHiddenPrice":true,"style":{"typography":{"fontSize":"13px"}}} /-->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10px","right":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"10px"},"margin":{"top":"0","bottom":"0"}},"border":{"top":{"color":"var:preset|color|septenary","width":"1px"},"bottom":{"color":"var:preset|color|septenary","width":"1px"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group alignwide" style="border-top-color:var(--wp--preset--color--septenary);border-top-width:1px;border-bottom-color:var(--wp--preset--color--septenary);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:10px;padding-right:var(--wp--preset--spacing--30);padding-bottom:10px;padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:columns {"isStackedOnMobile":false,"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
			<div class="wp-block-columns alignwide is-not-stacked-on-mobile" style="padding-right:0;padding-left:0">
				<!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%">
					<!-- wp:site-title {"level":0,"textAlign":"left","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"extra-large"} /-->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":"75%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:75%">
					<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
					<div class="wp-block-group">
						<!-- wp:navigation {"ref":4,"overlayBackgroundColor":"background","className":"is-style-default","layout":{"type":"flex","setCascadingProperties":"true","justifyContent":"right","orientation":"horizontal","flexWrap":"wrap"},"fontSize":"tiny"} /-->
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