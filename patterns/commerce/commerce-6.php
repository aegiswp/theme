<?php
/**
 * Commerce 6 Block Pattern
 */
return array(
	'title'	      => __( 'Commerce 6', 'aegis' ),
	'description' => __( 'Shop by Categories block pattern', 'aegis' ),
	'categories'  => array( 'aegis-commerce' ),
	'content'     => '
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40"}}},"className":"product-category","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide product-category" style="padding-bottom:var(--wp--preset--spacing--40)">
		<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0">
			<!-- wp:heading {"align":"wide","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
			<h2 class="wp-block-heading alignwide" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'Shop by Categories', 'aegis' ) .'</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small"} -->
			<p class="has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'Navigation Prompt (69 chars): [Guide user to explore product range.]', 'aegis' ) .'</p>
			<!-- /wp:paragraph -->

			<!-- wp:separator {"style":{"color":{"background":"#eeeeee"}}} -->
			<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background" style="background-color:#eeeeee;color:#eeeeee" />
			<!-- /wp:separator -->
		</div>
		<!-- /wp:group -->

		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:woocommerce/featured-category {"editMode":false,"focalPoint":{"x":0.52,"y":0.26},"imageFit":"cover","mediaId":2012,"mediaSrc":"' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_350x425_black.jpg","minHeight":566,"categoryId":19,"showDesc":false} -->
				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
					<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="">' . esc_html__( 'Category', 'aegis' ) .'</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
				<!-- /wp:woocommerce/featured-category -->

				<!-- wp:woocommerce/featured-category {"editMode":false,"focalPoint":{"x":0.5,"y":0.67},"imageFit":"cover","mediaId":2009,"mediaSrc":"' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_350x425_black.jpg","minHeight":358,"categoryId":22,"showDesc":false} -->
				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
					<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="">' . esc_html__( 'Category', 'aegis' ) .'</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
				<!-- /wp:woocommerce/featured-category -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column -->
					<div class="wp-block-column">
						<!-- wp:woocommerce/featured-category {"editMode":false,"focalPoint":{"x":0.5,"y":0.52},"imageFit":"cover","mediaId":2010,"mediaSrc":"' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_730x500_black.jpg","minHeight":424,"categoryId":17,"showDesc":false} -->
						<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
						<div class="wp-block-buttons">
							<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
							<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="">' . esc_html__( 'Category', 'aegis' ) .'</a></div>
							<!-- /wp:button -->
						</div>
						<!-- /wp:buttons -->
						<!-- /wp:woocommerce/featured-category -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column -->
					<div class="wp-block-column">
						<!-- wp:woocommerce/featured-category {"editMode":false,"imageFit":"cover","mediaId":2011,"mediaSrc":"' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_350x425_black.jpg","minHeight":422,"categoryId":20,"showDesc":false} -->
						<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
						<div class="wp-block-buttons">
							<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
							<div class="wp-block-button is-style-aegis-button-shadow"><a
									class="wp-block-button__link wp-element-button" href="">' . esc_html__( 'Category', 'aegis' ) .'</a></div>
							<!-- /wp:button -->
						</div>
						<!-- /wp:buttons -->
						<!-- /wp:woocommerce/featured-category -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->

				<!-- wp:woocommerce/featured-category {"editMode":false,"focalPoint":{"x":0.43,"y":0.2},"imageFit":"cover","mediaId":2008,"mediaSrc":"' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_730x500_black.jpg","minHeight":499,"categoryId":20,"showDesc":false,"textColor":"foreground"} -->
				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"foreground","style":{"border":{"radius":"0px"},"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow"} -->
					<div class="wp-block-button is-style-aegis-button-shadow" style="font-style:normal;font-weight:600"><a
							class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href=""
							style="border-radius:0px">' . esc_html__( 'Category', 'aegis' ) .'</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
				<!-- /wp:woocommerce/featured-category -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->',
);