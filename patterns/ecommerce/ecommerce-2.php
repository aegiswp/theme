<?php
/**
 * eCommerce 2 Block Pattern
 */
return array(
	'title'	  => __( 'eCommerce 2', 'aegis' ),
	'description' => __( 'A simple block pattern for displaying a product grid.', 'aegis' ),
    'categories' => array( 'aegis-ecommerce' ),
	'content'	=> '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"30px","left":"30px"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-2-image is-style-aegis-effect-2-image"} -->
			<figure class="wp-block-image size-full is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_480x715_black.jpg" alt="' . esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"background","className":"aegis-negative-margin-top is-style-aegis-hover-shadow"} -->
			<div class="wp-block-group aegis-negative-margin-top is-style-aegis-hover-shadow has-background-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"textColor":"foreground","fontSize":"tiny"} -->
					<p class="has-foreground-color has-text-color has-tiny-font-size" style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph -->
					<p><strong>' . esc_html__( '$00.00', 'aegis' ) . '</strong></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"fontSize":"large"} -->
				<h2 class="wp-block-heading has-large-font-size">' . esc_html__( 'Product Name', 'aegis' ) . '</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>' . esc_html__( 'A range of 50-150 characters is common for grid view descriptions. This is just enough to give a brief overview of the product without overwhelming the viewer.', 'aegis' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow is-style-aegis-button-shadow","fontSize":"small"} -->
					<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a
							class="wp-block-button__link wp-element-button">' . esc_html__( 'Call to Action', 'aegis' ) . '</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-2-image is-style-aegis-effect-2-image"} -->
			<figure class="wp-block-image size-full is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_480x715_black.jpg" alt="Describe the main elements of the image and its context." /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"background","className":"aegis-negative-margin-top is-style-aegis-hover-shadow"} -->
			<div class="wp-block-group aegis-negative-margin-top is-style-aegis-hover-shadow has-background-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"textColor":"foreground","fontSize":"tiny"} -->
					<p class="has-foreground-color has-text-color has-tiny-font-size" style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph -->
					<p><strong>' . esc_html__( '$00.00', 'aegis' ) . '</strong></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"fontSize":"large"} -->
				<h2 class="wp-block-heading has-large-font-size">' . esc_html__( 'Product Name', 'aegis' ) . '</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>' . esc_html__( 'A range of 50-150 characters is common for grid view descriptions. This is just enough to give a brief overview of the product without overwhelming the viewer.', 'aegis' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow is-style-aegis-button-shadow","fontSize":"small"} -->
					<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600">
					<a class="wp-block-button__link wp-element-button">' . esc_html__( 'Call to Action', 'aegis' ) . '</a>
					</div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-2-image is-style-aegis-effect-2-image"} -->
			<figure class="wp-block-image size-full is-style-aegis-effect-2-image"><img
					src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_480x715_black.jpg"
					alt="' .	esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"background","className":"aegis-negative-margin-top is-style-aegis-hover-shadow"} -->
			<div class="wp-block-group aegis-negative-margin-top is-style-aegis-hover-shadow has-background-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"textColor":"foreground","fontSize":"tiny"} -->
					<p class="has-foreground-color has-text-color has-tiny-font-size" style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph -->
					<p><strong>' . esc_html__( '$00.00', 'aegis' ) . '</strong></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"fontSize":"large"} -->
				<h2 class="wp-block-heading has-large-font-size">' . esc_html__( 'Product Name', 'aegis' ) . '</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>' . esc_html__( 'A range of 50-150 characters is common for grid view descriptions. This is just enough to give a brief overview of the product without overwhelming the viewer.', 'aegis' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow is-style-aegis-button-shadow","fontSize":"small"} -->
					<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size"
						style="font-style:normal;font-weight:600"><a
							class="wp-block-button__link wp-element-button">' . esc_html__( 'Call to Action', 'aegis' ) . '</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
);