<?php
/**
 * Hero 3 block pattern
 */
return array(
	'title'	  => __( 'Hero 3', 'aegis' ),
	'categories' => array( 'aegis-hero' ),
	'content' => '
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","right":"60px","left":"60px"}}},"gradient":"vertical-background-to-foreground","className":"is-style-default","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide is-style-default has-vertical-background-to-foreground-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:60px;padding-bottom:var(--wp--preset--spacing--60);padding-left:60px">
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column {"verticalAlignment":"center","width":""} -->
			<div class="wp-block-column is-vertically-aligned-center">
				<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"300","fontSize":"3.6rem"}}} -->
				<h2 class="wp-block-heading" style="font-size:3.6rem;font-style:normal;font-weight:300"><strong>' . esc_html__( 'Main' , 'aegis' ). '</strong> ' . esc_html__( 'Heading' , 'aegis' ). '</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>' . esc_html_x( 'Product Description (88 chars): [Detail key aspects or selling points of a product.]', 'Placeholder for product description', 'aegis' ). '</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow","fontSize":"small"} -->
					<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600">
						<a class="wp-block-button__link wp-element-button" href="#">' . esc_html__( 'Call to Action' , 'aegis' ). '</a>
					</div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"60%","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"floating-image"} -->
			<div class="wp-block-column floating-image" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);flex-basis:60%">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-shadow-image image-one"} -->
				<figure class="wp-block-image size-full is-style-aegis-shadow-image image-one"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/thumb_450x680_dark.webp" alt="' . esc_attr_x( 'Default product image one for the section', 'Description of the first default product image', 'aegis' ) . '" /></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-shadow-image image-two"} -->
				<figure class="wp-block-image size-large is-style-aegis-shadow-image image-two"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/thumb_680x1025_light.webp" alt="' . esc_attr_x( 'Default product image two for the section', 'Description of the second default product image', 'aegis' ) . '" /></figure>
				<!-- /wp:image -->

				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-shadow-image image-three"} -->
				<figure class="wp-block-image size-full is-style-aegis-shadow-image image-three"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/thumb_450x680_light.webp" alt="' . esc_attr_x( 'Default product image three for the section', 'Description of the third default product image', 'aegis' ) . '" /></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->',
);