<?php
/**
 * Footer 3 Block Pattern
 */
return array(
	'title'	      => __( 'Footer 3', 'aegis' ),
	'description' => __( 'Footer block pattern', 'aegis' ),
	'categories'  => array( 'aegis-footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content' => '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"0px","right":"30px","left":"30px"}}},"backgroundColor":"white","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:30px;padding-bottom:0px;padding-left:30px">
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","right":"30px","left":"30px"}},"border":{"top":{"color":"var:preset|color|septenary","width":"1px"},"right":{},"bottom":{"color":"var:preset|color|septenary","width":"1px"},"left":{}}},"layout":{"type":"default"}} -->
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
						<h3 class="wp-block-heading has-medium-font-size">Returns Guarantee</h3>
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
						<figure class="wp-block-image size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/icons/support.svg" alt="' . esc_html__( '[State time frame for returns.]', 'aegis' ) . '" style="width:35px" width="35" /></figure>
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

	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"bottom":"30px"}}}} -->
		<div class="wp-block-columns alignwide" style="margin-bottom:30px">
			<!-- wp:column {"width":"30%","style":{"spacing":{"padding":{"right":"80px","top":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-right:80px;flex-basis:30%">
				<!-- wp:site-title {"isLink":false,"style":{"spacing":{"margin":{"top":"0px","bottom":"30px"}},"typography":{"lineHeight":"1","textTransform":"none"}},"textColor":"intrace-primary","fontSize":"extra-large"} /-->

				<!-- wp:paragraph {"textColor":"intrace-body-text","fontSize":"small"} -->
				<p class="has-intrace-body-text-color has-text-color has-small-font-size">' . esc_html__( 'Company Info (95 chars): [Briefly describe the mission, vision, or unique selling proposition.]' , 'aegis' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","size":"has-small-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"30px","bottom":"24px"}}},"className":"is-style-logos-only"} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:30px;margin-bottom:24px">
					<!-- wp:social-link {"url":"https://facebook.com/","service":"facebook","label":"Facebook"} /-->

					<!-- wp:social-link {"url":"https://linkedin.com/","service":"linkedin","rel":"LinkedIn"} /-->

					<!-- wp:social-link {"url":"https://tiktok.com/","service":"tiktok","rel":"TikTok"} /-->

					<!-- wp:social-link {"url":"https://instagram.com/","service":"instagram","rel":"Instagram"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30)">
			<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0px","bottom":"25px"}}},"textColor":"intrace-primary","fontSize":"medium"} -->
			<h3 class="wp-block-heading has-intrace-primary-color has-text-color has-medium-font-size" style="margin-top:0px;margin-bottom:25px">' . esc_html__( '[Heading]' , 'aegis' ). '</h3>
			<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"12px"}}},"fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:12px"><a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30)">
			<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0px","bottom":"25px"}}},"textColor":"intrace-primary","fontSize":"medium"} -->
			<h3 class="wp-block-heading has-intrace-primary-color has-text-color has-medium-font-size" style="margin-top:0px;margin-bottom:25px">' . esc_html__( '[Heading]' , 'aegis' ). '</h3>
			<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"20px"}}},"fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:20px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
				<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"30%","style":{"spacing":{"padding":{"top":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);flex-basis:30%">
			<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0px","bottom":"25px"}}},"textColor":"intrace-primary","fontSize":"medium"} -->
			<h3 class="wp-block-heading has-intrace-primary-color has-text-color has-medium-font-size" style="margin-top:0px;margin-bottom:25px">' . esc_html__( '[Heading]' , 'aegis' ). '</h3>
				<!-- /wp:heading -->

				<!-- wp:gallery {"linkTo":"none"} -->
				<figure class="wp-block-gallery has-nested-images columns-default is-cropped">
					<!-- wp:image {""sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-2-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_150x150_darkcolor.webp" alt="' . esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" /></figure>
					<!-- /wp:image -->

					<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-2-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_150x150_darkcolor.webp" alt="' . esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" /></figure>
					<!-- /wp:image -->

					<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-2-image"} -->
					<figure class="wp-block-image size-large is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_150x150_darkcolor.webp" alt="' . esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" /></figure>
					<!-- /wp:image -->
				</figure>
				<!-- /wp:gallery -->
				</div>
				<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

		<!-- wp:columns {"align":"wide","className":"intrace-margin-top-n50"} -->
		<div class="wp-block-columns alignwide intrace-margin-top-n50">
			<!-- wp:column {"width":"100%"} -->
			<div class="wp-block-column" style="flex-basis:100%">

				<!-- wp:separator {"backgroundColor":"secondary","className":"aligncenter is-style-wide"} -->
				<hr class="wp-block-separator has-text-color has-secondary-color has-alpha-channel-opacity has-secondary-background-color has-background aligncenter is-style-wide" />
				<!-- /wp:separator -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0">
		<!-- wp:columns {"style":{"spacing":{"padding":{"top":"10px"}}},"className":"intrace-margin-top-n20"} -->
		<div class="wp-block-columns intrace-margin-top-n20" style="padding-top:10px">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"textColor":"intrace-body-text","fontSize":"tiny"} -->
				<p class="has-intrace-body-text-color has-text-color has-tiny-font-size">' . esc_html__( '©', 'aegis' ) . ' ' . esc_html__( '[Year]', 'aegis' ) . ' ' . esc_html__( '[Company]', 'aegis' ) . '</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"align":"right","fontSize":"tiny"} -->
				<p class="has-text-align-right has-tiny-font-size"><a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a> · <a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a> · <a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->',
);