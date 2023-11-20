<?php
/**
 * 09. Header Block Pattern
 */
return array(
    'title'       => __('09. Header', 'aegis'),
    'description' => __('09. Header', 'aegis'),
    'categories'  => array('aegis-header'),
    'blockTypes'  => array('core/template-part/header'),
    'content'     => '
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"foreground","textColor":"background","className":"header-9","layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull header-9 has-background-color has-foreground-background-color has-text-color has-background"
		style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-left:0">
		<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","bottom":"10px","left":"var:preset|spacing|30","top":"10px"}}},"backgroundColor":"secondary","textColor":"foreground","className":"header-banner","layout":{"type":"constrained"},"metadata":{"name":""}} -->
		<div class="wp-block-group header-banner has-foreground-color has-secondary-background-color has-text-color has-background"
			style="padding-top:10px;padding-right:var(--wp--preset--spacing--30);padding-bottom:10px;padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:paragraph {"align":"center","fontSize":"tiny"} -->
			<p class="has-text-align-center has-tiny-font-size">' . esc_html__( 'Offer Highlight (52 chars): [Announce a special deal or limited-time opportunity.]', 'aegis' ) . '</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","right":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"10px"},"margin":{"top":"0","bottom":"0"}}},"className":"header-socials","layout":{"type":"constrained"},"metadata":{"name":""}} -->
		<div class="wp-block-group header-socials" style="margin-top:0;margin-bottom:0;padding-top:10px;padding-right:var(--wp--preset--spacing--30);padding-bottom:10px;padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
			<div class="wp-block-columns alignwide are-vertically-aligned-center">
				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","openInNewTab":true,"size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left"}} -->
					<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
						<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->

						<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->

						<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->

						<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress"} /-->
					</ul>
					<!-- /wp:social-links -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:group {"align":"wide","className":"banner-info","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
					<div class="wp-block-group alignwide banner-info">
						<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search products…","width":350,"widthUnit":"px","buttonText":"Search","buttonPosition":"no-button","query":{"post_type":"product"},"style":{"border":{"width":"1px"}},"borderColor":"background","className":"hide-mobile"} /-->

						<!-- wp:woocommerce/mini-cart {"hasHiddenPrice":true,"style":{"typography":{"fontSize":"12px"}}} /-->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","bottom":"10px"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group" style="padding-top:10px;padding-bottom:10px">
			<!-- wp:site-title {"textAlign":"center"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10px","right":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"10px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:10px;padding-right:var(--wp--preset--spacing--30);padding-bottom:10px;padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
			<div class="wp-block-columns alignwide are-vertically-aligned-center is-not-stacked-on-mobile"
				style="padding-right:0;padding-left:0">
				<!-- wp:column {"verticalAlignment":"center","width":""} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:navigation {"icon":"menu","overlayBackgroundColor":"foreground","className":"is-style-default","layout":{"type":"flex","setCascadingProperties":"true","justifyContent":"center","orientation":"horizontal","flexWrap":"wrap"},"fontSize":"tiny"} /-->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->',
);