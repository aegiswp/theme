<?php
/**
 * 04. eCommerce Block Pattern
 */
return array(
	'title'	  => __( '04. eCommerce', 'aegis' ),
	'description' => __( 'eCommerce', 'aegis' ),
	'categories' => array( 'aegis-ecommerce' ),
	'content' => '
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"
	style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"width":"1px"}},"borderColor":"foreground"} -->
	<div class="wp-block-group has-border-color has-foreground-border-color"
		style="border-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:columns -->
		<div class="wp-block-columns">
			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center">
				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . esc_html__('Grab Your', 'aegis') . ' <strong>' .
						esc_html__('[Discount]%', 'aegis') . '</strong> ' . esc_html__('Off! Shop [Product/Collection]
					Now During Our [Event Name] Sale.', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"letterSpacing":"10px","textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"className":"fade aegis-negative-margin-top","fontSize":"gigantic"} -->
				<h4 class="wp-block-heading has-text-align-center fade aegis-negative-margin-top has-gigantic-font-size"
					style="margin-top:var(--wp--preset--spacing--30);letter-spacing:10px;text-transform:uppercase">' .
					esc_html__('Sale', 'aegis') . '</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"small"} -->
				<p class="has-text-align-center has-small-font-size" style="margin-top:0"><em>' . esc_html__('Urgency
						CTA (38 characters): [Convey limited time offer and prompt action.]', 'aegis') . '</em></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"1px","backgroundColor":"foreground"} -->
			<div class="wp-block-column has-foreground-background-color has-background" style="flex-basis:1px"></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:image {"className":"aligncenter size-full is-resized is-style-rounded"} -->
				<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img
						src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_200x200_dark.webp"
						alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" />
				</figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="wp-block-heading has-text-align-center"><strong>' . esc_html__('New [Item/Collection]',
						'aegis') . '</strong></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . esc_html__('Promotion Update (76 characters): [Describe current
					discount/promotion on specific items/collections.]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"aligncenter is-style-yuna-button-shadow is-style-aegis-button-shadow","fontSize":"small"} -->
					<div class="wp-block-button has-custom-font-size aligncenter is-style-yuna-button-shadow is-style-aegis-button-shadow has-small-font-size"
						style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button">' .
							esc_html__('Call to Action', 'aegis') . '</a></div>
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
<!-- /wp:group -->',
);