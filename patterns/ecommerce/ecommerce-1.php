<?php
/**
 * 01. eCommerce Block Pattern
 */
return array(
	'title'	  => __( '01. eCommerce', 'aegis' ),
	'description' => __( 'eCommerce with columns, images, rating, pricing, headings, paragraphs, and buttons', 'aegis' ),
    'categories' => array( 'aegis-ecommerce' ),
	'content' => '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|30","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"is-style-default"} -->
		<div class="wp-block-column is-style-default has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:image {"align":"center","className":"size-large is-style-default"} -->
			<figure class="wp-block-image aligncenter size-large is-style-default"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"textColor":"foreground","fontSize":"tiny"} -->
				<p class="has-foreground-color has-text-color has-tiny-font-size" style="letter-spacing:2px">' . esc_html__('★★★★★', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><strong>' . esc_html__('$00.00', 'aegis') . '</strong></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":3,"className":"has-large-font-size"} -->
            <h3 class="wp-block-heading has-large-font-size">' . esc_html__('Product Name', 'aegis') . '</h3>
            <!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . esc_html__('A range of 50-150 characters is common for grid view descriptions. This is just enough to give a brief overview of the product without overwhelming the viewer.', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow","fontSize":"small"} -->
				<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button">' . esc_html__('Call to Action', 'aegis') . '</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"senary","className":"is-style-default"} -->
		<div class="wp-block-column is-style-default has-senary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:image {"align":"center","className":"size-large is-style-default"} -->
			<figure class="wp-block-image aligncenter size-large is-style-default"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"textColor":"foreground","fontSize":"tiny"} -->
				<p class="has-foreground-color has-text-color has-tiny-font-size" style="letter-spacing:2px">' . esc_html__('★★★★★', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><strong>' . esc_html__('$00.00', 'aegis') . '</strong></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":3,"className":"has-large-font-size"} -->
            <h3 class="wp-block-heading has-large-font-size">' . esc_html__('Product Name', 'aegis') . '</h3>
            <!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . esc_html__('A range of 50-150 characters is common for grid view descriptions. This is just enough to give a brief overview of the product without overwhelming the viewer.', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"foreground","textColor":"background","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"className":"is-style-aegis-button-shadow-outline","fontSize":"small"} -->
				<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow-outline has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link has-background-color has-foreground-background-color has-text-color has-background has-link-color wp-element-button">' . esc_html__('Call to Action', 'aegis') . '</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background","className":"is-style-default"} -->
		<div class="wp-block-column is-style-default has-background-color has-foreground-background-color has-text-color has-background has-link-color"
			style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:image {"align":"center","id":2060,"sizeSlug":"full","linkDestination":"none","className":"size-large is-style-default"} -->
			<figure class="wp-block-image aligncenter size-full size-large is-style-default"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1200x1920_light.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"fontSize":"tiny"} -->
				<p class="has-tiny-font-size" style="letter-spacing:2px">' . esc_html__('★★★★★', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><strong>' . esc_html__('$00.00', 'aegis') . '</strong></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"level":3,"className":"has-large-font-size"} -->
            <h3 class="wp-block-heading has-large-font-size">' . esc_html__('Product Name', 'aegis') . '</h3>
            <!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . esc_html__('A range of 50-150 characters is common for grid view descriptions. This is just enough to give a brief overview of the product without overwhelming the viewer.', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow-outline","fontSize":"small"} -->
				<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow-outline has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button">' . esc_html__('Call to Action', 'aegis') . '</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
);