<?php
/**
 * 01. Footer Block Pattern
 */
return array(
	'title'	      => __( '01. Footer', 'aegis' ),
	'description' => __( 'Footer', 'aegis' ),
	'categories'  => array( 'aegis-footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content' => '<!-- wp:group {"tagName":"footer","align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"},"metadata":{"name":"' . esc_html__('01. Footer Pattern', 'aegis') . '"}} -->
<footer class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}},"border":{"top":{"color":"var:preset|color|secondary","width":"1px"},"bottom":{"color":"var:preset|color|secondary","width":"1px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--secondary);border-top-width:1px;border-bottom-color:var(--wp--preset--color--secondary);border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column {"width":""} -->
			<div class="wp-block-column">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
					<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%">
						<!-- wp:image {"width":"35px","sizeSlug":"full","linkDestination":"none"} -->
						<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_template_directory_uri()) . '/assets/icons/delivery.svg" alt="' . esc_html__('Describe the icon context', 'aegis') . '" style="width:35px" /></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":""} -->
					<div class="wp-block-column">
						<!-- wp:heading {"level":3,"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-medium-font-size">' . esc_html__('Shipping Included', 'aegis') . '</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"tiny"} -->
						<p class="has-tiny-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__('[Offer based on order value.]', 'aegis') . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":""} -->
			<div class="wp-block-column">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
					<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%">
						<!-- wp:image {"width":"35px","sizeSlug":"full","linkDestination":"none"} -->
						<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_template_directory_uri()) . '/assets/icons/returns.svg" alt="' . esc_html__('Describe the icon context', 'aegis') . '" style="width:35px" /></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":""} -->
					<div class="wp-block-column">
						<!-- wp:heading {"level":3,"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-medium-font-size">' . esc_html__('Returns Guarantee', 'aegis') . '</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"tiny"} -->
						<p class="has-tiny-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__('[Time frame for returns.]', 'aegis') . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":""} -->
			<div class="wp-block-column">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
					<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%">
						<!-- wp:image {"width":"35px","sizeSlug":"full","linkDestination":"none"} -->
						<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_template_directory_uri()) . '/assets/icons/support.svg" alt="' . esc_html__('Describe the icon context', 'aegis') . '" style="width:35px" /></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":""} -->
					<div class="wp-block-column">
						<!-- wp:heading {"level":3,"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-medium-font-size">' . esc_html__('Online Assistance', 'aegis') . '</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"tiny"} -->
						<p class="has-tiny-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__('[Service or operation hours.]', 'aegis') . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":""} -->
			<div class="wp-block-column">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
					<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%">
						<!-- wp:image {"width":"35px","sizeSlug":"full","linkDestination":"none"} -->
						<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_template_directory_uri()) . '/assets/icons/payment.svg" alt="' . esc_html__('Describe the icon context', 'aegis') . '" style="width:35px" /></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":""} -->
					<div class="wp-block-column">
						<!-- wp:heading {"level":3,"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-medium-font-size">' . esc_html__('Secure Checkout', 'aegis') . '</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"tiny"} -->
						<p class="has-tiny-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__('[Diverse payment methods.]', 'aegis') . '</p>
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

	<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"0","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"textColor":"foreground","gradient":"vertical-background-to-secondary","className":"footer is-style-default","layout":{"type":"default"}} -->
			<div class="wp-block-group alignwide footer is-style-default has-foreground-color has-vertical-background-to-secondary-gradient-background has-text-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"0"}}}} -->
				<div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-bottom:0">
					<!-- wp:column {"width":"20%","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"var:preset|spacing|30"}}}} -->
					<div class="wp-block-column" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--30);flex-basis:20%">
						<!-- wp:site-title {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}},"typography":{"lineHeight":"1"}},"textColor":"intrace-primary"} /-->

						<!-- wp:paragraph {"textColor":"intrace-body-text","fontSize":"small"} -->
						<p class="has-intrace-body-text-color has-text-color has-small-font-size">' . esc_html__('[Paragraph (95 characters): Briefly describe the mission, vision, or unique selling proposition.]', 'aegis') . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"15%","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"var:preset|spacing|30"}}}} -->
					<div class="wp-block-column" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--30);flex-basis:15%">
						<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"20px"}}},"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-medium-font-size" style="margin-bottom:20px">' . esc_html__('[Heading]', 'aegis') . '</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"12px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:12px"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:10px"><a href="#">[Menu Item]</a></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"15%","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"var:preset|spacing|30"}}}} -->
					<div class="wp-block-column" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--30);flex-basis:15%">
						<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"20px"}}},"fontSize":"medium"} -->
						<h3 class="wp-block-heading has-medium-font-size" style="margin-bottom:20px">' . esc_html__('[Heading]', 'aegis') . '</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"12px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:12px"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"verticalAlignment":"top","width":"40%","style":{"spacing":{"padding":{"left":"var:preset|spacing|30","top":"0","right":"0","bottom":"var:preset|spacing|30"},"blockGap":"0"}},"className":"hide-on-mobile"} -->
					<div class="wp-block-column is-vertically-aligned-top hide-on-mobile" style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);flex-basis:40%">
						<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"20px"}}}} -->
						<h4 class="wp-block-heading" style="margin-bottom:20px">' . esc_html__('[Title (21 characters): Section focus.]', 'aegis') . '</h4>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"fontSize":"small"} -->
						<p class="has-small-font-size">' . esc_html__('[Shop Highlight (124 characters): Promote new arrivals, featured collections, or seasonal favorites.]', 'aegis') . '</p>
						<!-- /wp:paragraph -->

						<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
						<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30)">
							<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"0"}}} -->
							<div class="wp-block-buttons">
								<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
								<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button">' . esc_html__('[Call to Action]', 'aegis') . '</a></div>
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

				<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"0"},"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
				<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
					<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
						<!-- wp:paragraph {"fontSize":"tiny"} -->
						<p class="has-tiny-font-size">' . esc_html__('© [Year] [Company]', 'aegis') . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
					<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
						<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","openInNewTab":true,"size":"has-small-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"right"}} -->
						<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"
							style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
							<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->

							<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->

							<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->

							<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress"} /-->
						</ul>
						<!-- /wp:social-links -->

						<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap","orientation":"vertical"}} -->
						<div class="wp-block-buttons">
							<!-- wp:button {"backgroundColor":"foreground","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"className":"scroll-to-top float-right is-style-outline"} -->
							<div class="wp-block-button scroll-to-top float-right is-style-outline"><a class="wp-block-button__link has-background-color has-foreground-background-color has-text-color has-background has-link-color wp-element-button"><span class="dashicons dashicons-arrow-up-alt"></span></a>
							</div>
							<!-- /wp:button -->
						</div>
						<!-- /wp:buttons -->
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