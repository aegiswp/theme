<?php
/**
 * 03. Footer Block Pattern
 */
return array(
	'title'	      => __( '03. Footer', 'aegis' ),
	'description' => __( 'Footer', 'aegis' ),
	'categories'  => array( 'aegis-footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content' => '<!-- wp:group {"tagName":"footer","metadata":{"name":"' . esc_html__('03. Footer Pattern', 'aegis') . '"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"secondary","layout":{"type":"default"}} -->
<footer class="wp-block-group alignfull has-secondary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","right":"0","left":"0"}},"border":{"top":{"color":"var:preset|color|senary","width":"1px"},"bottom":{"color":"var:preset|color|senary","width":"1px"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--senary);border-top-width:1px;border-bottom-color:var(--wp--preset--color--senary);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column -->
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

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"verticalAlignment":"center","width":"10%","style":{"spacing":{"blockGap":"var:preset|spacing|70"}}} -->
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

			<!-- wp:column -->
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

			<!-- wp:column -->
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

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"bottom":"0"}}}} -->
		<div class="wp-block-columns alignwide" style="margin-bottom:0">
			<!-- wp:column {"width":"30%","style":{"spacing":{"padding":{"right":"80px","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-right:80px;padding-bottom:var(--wp--preset--spacing--30);flex-basis:30%">
				<!-- wp:site-title {"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}},"typography":{"lineHeight":"1"}},"textColor":"intrace-primary","fontSize":"extra-large"} /-->

				<!-- wp:paragraph {"textColor":"intrace-body-text","fontSize":"small"} -->
				<p class="has-intrace-body-text-color has-text-color has-small-font-size">' . esc_html__('[Paragraph (95 characters): Briefly describe the mission, vision, or unique selling proposition.]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","size":"has-small-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"is-style-logos-only"} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
					<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->

					<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->

					<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->

					<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
				<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"35px"}}},"textColor":"intrace-primary","fontSize":"medium"} -->
				<h3 class="wp-block-heading has-intrace-primary-color has-text-color has-medium-font-size" style="margin-top:0;margin-bottom:35px">' . esc_html__('[Heading]', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"tiny"} -->
				<p class="has-tiny-font-size" style="margin-top:0"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"tiny"} -->
				<p class="has-tiny-font-size" style="margin-top:10px"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"tiny"} -->
				<p class="has-tiny-font-size" style="margin-top:10px"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"tiny"} -->
				<p class="has-tiny-font-size" style="margin-top:10px"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
				<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"35px"}}},"textColor":"intrace-primary","fontSize":"medium"} -->
				<h3 class="wp-block-heading has-intrace-primary-color has-text-color has-medium-font-size" style="margin-top:0;margin-bottom:35px">' . esc_html__('[Heading]', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"tiny"} -->
				<p class="has-tiny-font-size" style="margin-top:0"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"tiny"} -->
				<p class="has-tiny-font-size" style="margin-top:10px"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"tiny"} -->
				<p class="has-tiny-font-size" style="margin-top:10px"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"tiny"} -->
				<p class="has-tiny-font-size" style="margin-top:10px"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"30%","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);flex-basis:30%">
				<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"35px"}}},"textColor":"intrace-primary","fontSize":"medium"} -->
				<h3 class="wp-block-heading has-intrace-primary-color has-text-color has-medium-font-size" style="margin-top:0;margin-bottom:35px">' . esc_html__('[Heading]', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:gallery {"linkTo":"none","sizeSlug":"full"} -->
				<figure class="wp-block-gallery has-nested-images columns-default is-cropped">
					<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"size-full is-style-default"} -->
					<figure class="wp-block-image size-full is-style-default"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
					<!-- /wp:image -->

					<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
					<figure class="wp-block-image size-full is-style-default"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
					<!-- /wp:image -->

					<!-- wp:image {"className":"size-full is-style-default"} -->
					<figure class="wp-block-image size-full is-style-default"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
	                <!-- /wp:image -->
				</figure>
				<!-- /wp:gallery -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"}},"border":{"top":{"color":"var:preset|color|senary","width":"1px"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="border-top-color:var(--wp--preset--color--senary);border-top-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
		<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- wp:paragraph {"textColor":"intrace-body-text","fontSize":"tiny"} -->
			<p class="has-intrace-body-text-color has-text-color has-tiny-font-size">' . esc_html__('© [Year] [Company]', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"right","className":"is-style-default","fontSize":"tiny"} -->
			<p class="has-text-align-right is-style-default has-tiny-font-size"><a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a> · <a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a> · <a href="#">' . esc_html__('[Menu Item]', 'aegis') . '</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"foreground","textColor":"background","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"className":"scroll-to-top float-right is-style-outline"} -->
		<div class="wp-block-button scroll-to-top float-right is-style-outline"><a class="wp-block-button__link has-background-color has-foreground-background-color has-text-color has-background has-link-color wp-element-button"><span class="dashicons dashicons-arrow-up-alt"></span></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</footer>
<!-- /wp:group -->',
);
