<?php
/**
 * Footer Block Pattern
 */
return array(
	'title'	      => __( 'Footer', 'aegis' ),
	'description' => __( 'Footer Block Pattern', 'aegis' ),
	'categories'  => array( 'aegis-footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content' => '
<!-- wp:group {"tagName":"footer","align":"full","layout":{"type":"constrained"}} -->
<footer class="wp-block-group alignfull">
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","right":"30px","left":"30px"}},"border":{"top":{"color":"var:preset|color|septenary","width":"1px"},"right":{},"bottom":{"color":"var:preset|color|septenary","width":"1px"},"left":{}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--septenary);border-top-width:1px;border-bottom-color:var(--wp--preset--color--septenary);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:30px;padding-bottom:var(--wp--preset--spacing--30);padding-left:30px">
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
					<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%">
						<!-- wp:image {"width":35,"sizeSlug":"full","linkDestination":"none"} -->
						<figure class="wp-block-image size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/icons/delivery.svg" alt="' . esc_attr__( 'Describe the icon context.', 'aegis' ) . '" style="width:35px" width="35" /></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"90%"} -->
					<div class="wp-block-column" style="flex-basis:90%">
						<!-- wp:heading {"level":3,"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-medium-font-size">' . esc_html__( 'Shipping Included', 'aegis' ) . '</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( '[State offer based on order value.]', 'aegis' ) . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
					<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%">
						<!-- wp:image {"width":35,"sizeSlug":"full","linkDestination":"none"} -->
						<figure class="wp-block-image size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/icons/returns.svg" alt="' . esc_attr__( 'Describe the icon context.', 'aegis' ) . '" style="width:35px" width="35" /></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"90%"} -->
					<div class="wp-block-column" style="flex-basis:90%">
						<!-- wp:heading {"level":3,"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-medium-font-size">' . esc_html__( 'Returns Guarantee', 'aegis' ) . '</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( '[State time frame for returns.]', 'aegis' ) . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
					<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%">
						<!-- wp:image {"width":35,"sizeSlug":"full","linkDestination":"none"} -->
						<figure class="wp-block-image size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/icons/support.svg" alt="' . esc_attr__( 'Describe the icon context.', 'aegis' ) . '" style="width:35px" width="35" /></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"90%"} -->
					<div class="wp-block-column" style="flex-basis:90%">
						<!-- wp:heading {"level":3,"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-medium-font-size">' . esc_html__( 'Online Assistance', 'aegis' ) . '</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( '[State service or operation hours.]', 'aegis' ) . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
					<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%">
						<!-- wp:image {"width":35,"sizeSlug":"full","linkDestination":"none"} -->
						<figure class="wp-block-image size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/icons/payment.svg" alt="' . esc_attr__( 'Describe the icon context.', 'aegis' ) . '" style="width:35px" width="35" /></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"90%"} -->
					<div class="wp-block-column" style="flex-basis:90%">
						<!-- wp:heading {"level":3,"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-medium-font-size">' . esc_html__( 'Secure Checkout', 'aegis' ) . '</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( '[State diverse payment methods.]' , 'aegis' ) . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull">
		<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
		<div class="wp-block-group alignfull">
			<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","right":"30px","left":"30px"},"blockGap":"0px"},"border":{"width":"0px","style":"none"},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","gradient":"vertical-background-to-secondary","className":"footer is-style-default","layout":{"type":"default"}} -->
			<div class="wp-block-group alignwide footer is-style-default has-foreground-color has-vertical-background-to-secondary-gradient-background has-text-color has-background has-link-color" style="border-style:none;border-width:0px;padding-top:var(--wp--preset--spacing--40);padding-right:30px;padding-bottom:var(--wp--preset--spacing--40);padding-left:30px">
				<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"bottom":"40px"},"blockGap":"10px"}}} -->
				<div class="wp-block-columns alignwide" style="margin-bottom:40px">
					<!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"0px","padding":{"top":"var:preset|spacing|30"}}}} -->
					<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);flex-basis:25%">
						<!-- wp:site-title {"isLink":false,"style":{"spacing":{"margin":{"top":"0px","bottom":"30px"}},"typography":{"lineHeight":"1","textTransform":"none"}},"textColor":"intrace-primary"} /-->

						<!-- wp:paragraph {"textColor":"intrace-body-text","fontSize":"small"} -->
						<p class="has-intrace-body-text-color has-text-color has-small-font-size">' . esc_html__( 'Company Info (95 chars): [Briefly describe the mission, vision, or unique selling proposition.]' , 'aegis' ) . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"style":{"spacing":{"blockGap":"10px","padding":{"top":"var:preset|spacing|30"}}}} -->
					<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30)">
						<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"20px"}}},"fontSize":"large"} -->
						<h4 class="wp-block-heading has-large-font-size" style="margin-bottom:20px">' . esc_html__( '[Heading]' , 'aegis' ). '</h4>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"12px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:12px"><a href="#">' . esc_html__( '[Menu Item]', 'aegis' ) . '</a></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__( '[Menu Item]', 'aegis' ) . '</a></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__( '[Menu Item]', 'aegis' ) . '</a></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__( '[Menu Item]', 'aegis' ) . '</a></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"25%","style":{"spacing":{"padding":{"right":"0px","top":"var:preset|spacing|30"},"blockGap":"10px"}}} -->
					<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-right:0px;flex-basis:25%">
						<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"20px"}}}} -->
						<h4 class="wp-block-heading" style="margin-bottom:20px">' . esc_html__( '[Heading]', 'aegis' ) . '</h4>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"20px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:20px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">' . esc_html__( '[Menu Item]', 'aegis' ) . '</a></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0"><a	href="#">' . esc_html__( '[Menu Item]', 'aegis' ) . '</a></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">' . esc_html__( '[Menu Item]', 'aegis' ) . '</a>
						</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">' . esc_html__( '[Menu Item]', 'aegis' ) . '</a></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"verticalAlignment":"top","width":"30%","style":{"spacing":{"padding":{"left":"0","top":"var:preset|spacing|30","right":"0"},"blockGap":"0"}}} -->
					<div class="wp-block-column is-vertically-aligned-top" style="padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-left:0;flex-basis:30%">
						<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"20px"}}}} -->
						<h4 class="wp-block-heading" style="margin-bottom:20px">' . esc_html__( 'Title (21 chars): [Section focus.]', 'aegis' ) . '</h4>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"fontSize":"small"} -->
						<p class="has-small-font-size">' . esc_html__( 'Shop Highlight (124 chars): [Promote new arrivals, featured collections, or seasonal favorites.]', 'aegis' ) . ' </p>
						<!-- /wp:paragraph -->

						<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
						<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30)">
							<!-- wp:buttons {"style":{"spacing":{"blockGap":"0"}}} -->
							<div class="wp-block-buttons">
								<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
								<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Call to Action', 'aegis' ) . '</a></div>
								<!-- /wp:button -->
							</div>
							<!-- /wp:buttons -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->

				<!-- wp:separator {"backgroundColor":"secondary","className":"is-style-wide"} -->
				<hr class="wp-block-separator has-text-color has-secondary-color has-alpha-channel-opacity has-secondary-background-color has-background is-style-wide" />
				<!-- /wp:separator -->

				<!-- wp:columns {"style":{"spacing":{"blockGap":"0px","margin":{"top":"0","bottom":"0"}}}} -->
				<div class="wp-block-columns" style="margin-top:0;margin-bottom:0">
					<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
					<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
						<!-- wp:paragraph {"fontSize":"tiny"} -->
						<p class="has-tiny-font-size">' . esc_html__( '©', 'aegis' ) . ' ' . esc_html__( '[Year]', 'aegis' ) . ' ' . esc_html__( '[Company]', 'aegis' ) . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"verticalAlignment":"center"} -->
					<div class="wp-block-column is-vertically-aligned-center">
						<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","openInNewTab":true,"size":"has-small-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"30px","bottom":"24px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"right"}} -->
						<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:30px;margin-bottom:24px">
						<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->

						<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->

						<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->

						<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress"} /-->
						</ul>
						<!-- /wp:social-links -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</footer>
<!-- /wp:group -->',
);