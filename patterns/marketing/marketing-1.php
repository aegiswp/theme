<?php
/**
 * 01. Marketing Block Pattern
 */
return array(
	'title'	  => __( '01. Marketing', 'aegis' ),
	'description' => __( 'Call to Action for new item or product promotion sale', 'aegis' ),
	'categories' => array( 'aegis-marketing' ),
	'content' => '<!-- wp:group {"metadata":{"name":"' . esc_html__('01. Marketing Pattern', 'aegis') . '"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"width":"1px"}},"borderColor":"foreground"} -->
	<div class="wp-block-group has-border-color has-foreground-border-color" style="border-width:1px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:columns -->
		<div class="wp-block-columns">
			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center">
				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . wp_kses_post(_x( 'Grab Your <strong>[Discount]%</strong> Off! Shop [Product/Collection] Now During Our [Event Name] Sale.', 'Sample descriptive paragraph', 'aegis')) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"letterSpacing":"10px","textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"gigantic"} -->
				<h4 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="margin-top:var(--wp--preset--spacing--30);letter-spacing:10px;text-transform:uppercase">' . esc_html__('Sale', 'aegis') . '</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"small"} -->
				<p class="has-text-align-center has-small-font-size" style="margin-top:0"><em>' . esc_html__('Urgency CTA (38 characters): [Convey limited time offer and prompt action.]', 'aegis') . '</em></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"1px","backgroundColor":"foreground"} -->
			<div class="wp-block-column has-foreground-background-color has-background" style="flex-basis:1px"></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:image {"width":"150px","aspectRatio":"1","scale":"cover","className":"aligncenter size-full is-resized is-style-rounded"} -->
				<figure class="wp-block-image is-resized aligncenter size-full is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:150px" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
				<h5 class="wp-block-heading has-text-align-center" style="font-style:normal;font-weight:400"><strong>' . esc_html__('New [Item/Collection]', 'aegis') . '</strong></h5>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">' . esc_html__('Promotion Update (76 characters): [Describe current discount/promotion on specific items/collections.]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
					<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button">' . esc_html__('[Call to Action]', 'aegis') . '</a></div>
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