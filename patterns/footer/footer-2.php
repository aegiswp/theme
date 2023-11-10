<?php
/**
 * 02. Footer Block Pattern
 */
return array(
	'title'	      => __( '02. Footer', 'aegis' ),
	'description' => __( 'Footer Block Pattern', 'aegis' ),
	'categories'  => array( 'aegis-footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content' => '
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-bottom:0">
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","right":"30px","left":"30px"}},"border":{"top":{"color":"var:preset|color|septenary","width":"1px"},"bottom":{"color":"var:preset|color|septenary","width":"1px"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-secondary-background-color has-background" style="border-top-color:var(--wp--preset--color--septenary);border-top-width:1px;border-bottom-color:var(--wp--preset--color--septenary);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:30px;padding-bottom:var(--wp--preset--spacing--30);padding-left:30px">
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
					<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%">
						<!-- wp:image {"width":35,"sizeSlug":"full","linkDestination":"none"} -->
						<figure class="wp-block-image size-full is-resized">
						<img src="' . esc_url( get_template_directory_uri() ) . '/assets/icons/delivery.svg" alt="' . esc_attr__( 'Describe the icon context.', 'aegis' ) . '" style="width:35px" width="35" /></figure>
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
						<figure class="wp-block-image size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/icons/returns.svg"	alt="' . esc_attr__( 'Describe the icon context.', 'aegis' ) . '" style="width:35px" width="35" /></figure>
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

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"0","right":"30px","left":"30px"},"margin":{"top":"0"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-secondary-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:0;padding-left:30px">
		<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:site-title {"isLink":false,"style":{"spacing":{"margin":{"top":"0px","bottom":"30px"}},"typography":{"lineHeight":"1","textTransform":"none"}},"textColor":"intrace-primary"} /-->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-bottom:0">' . esc_html__( 'Description (27 chars):' , 'aegis' ) . '</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30","top":"0"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30)"><a href="#">' . esc_html__( '[Guide to nearby shops.]' , 'aegis' ) . '</a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:0px"><a href="#">' . esc_html__( '+000 (0)[Phone Number' ,	'aegis' ) . '</a>]</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:0px"><a href="#">' . esc_html__( '[email@address.com]' , 'aegis' ) . '</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"0","right":"0","left":"0","top":"0"}}},"className":"is-style-default","layout":{"type":"constrained"}} -->
				<div class="wp-block-group is-style-default" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"medium"} -->
					<h3 class="wp-block-heading has-medium-font-size" style="margin-top:20px">' . esc_html__( '[Heading]' , 'aegis' ). '</h3>
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
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"0","right":"0","left":"0","top":"0"}}},"className":"is-style-default","layout":{"type":"constrained"}} -->
				<div class="wp-block-group is-style-default" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"medium"} -->
					<h3 class="wp-block-heading has-medium-font-size" style="margin-top:20px">' . esc_html__( '[Heading]' , 'aegis' ). '</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"20px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:20px;margin-right:0;margin-bottom:0;margin-left:0">
						<a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0">
						<a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0">
						<a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0">
						<a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"0","right":"0","left":"0","top":"0"}}},"className":"is-style-default","layout":{"type":"constrained"}} -->
				<div class="wp-block-group is-style-default" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"medium"} -->
					<h3 class="wp-block-heading has-medium-font-size" style="margin-top:20px">' . esc_html__( '[Heading]' , 'aegis' ). '</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"20px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:20px;margin-right:0;margin-bottom:0;margin-left:0">
						<a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0">
						<a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0">
						<a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0">
						<a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-secondary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
		<!-- wp:separator {"align":"full","backgroundColor":"septenary"} -->
		<hr class="wp-block-separator alignfull has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background" />
		<!-- /wp:separator -->

		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group alignfull" style="padding-right:30px;padding-left:30px">
			<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group alignwide">
				<!-- wp:paragraph {"fontSize":"tiny"} -->
				<p class="has-tiny-font-size">' . esc_html__( '©', 'aegis' ) . ' ' . esc_html__( '[Year]', 'aegis' ) . ' ' . esc_html__( '[Company]', 'aegis' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:site-title {"fontSize":"medium"} /-->

				<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","openInNewTab":true,"size":"has-small-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"30px","bottom":"24px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"right"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:30px;margin-bottom:24px">
				<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->

				<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->

				<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->

				<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->',
);