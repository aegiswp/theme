<?php
/**
 * Commerce 4 Block Pattern
 */
return array(
	'title'	  => __( 'Commerce 4', 'aegis' ),
	'description' => __( 'A promotional call to action block pattern', 'aegis' ),
	'categories' => array( 'aegis-commerce' ),
	'content' => '
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"}}}} -->
	<div class="wp-block-group alignwide"
		style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px">
		<!-- wp:group {"style":{"border":{"width":"2px"},"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"borderColor":"foreground"} -->
		<div class="wp-block-group has-border-color has-foreground-border-color"
			style="border-width:2px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
			<!-- wp:columns -->
			<div class="wp-block-columns">
				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center">' . esc_html__( 'Grab Your', 'aegis' ) .' <strong>' . esc_html__( '[Discount]%',
							'aegis' ) . '</strong> ' . esc_html__( 'Off! Shop [Product/Collection]
							Now During Our [Event Name] Sale.',
							'aegis' ) . '</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"textAlign":"center","style":{"typography":{"letterSpacing":"10px","textTransform":"uppercase"},"spacing":{"margin":{"top":"0"}}},"className":"fade aegis-negative-margin-top"} -->
					<h2 class="wp-block-heading has-text-align-center fade aegis-negative-margin-top"
						style="margin-top:0;letter-spacing:10px;text-transform:uppercase"><strong>' . esc_html__( 'Sale', 'aegis' ) .
							'</strong></h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"className":"aegis-negative-margin-top","fontSize":"small"} -->
					<p class="has-text-align-center aegis-negative-margin-top has-small-font-size" style="margin-top:0">
						<em>' . esc_html__( 'Urgency CTA (38 characters): [Convey limited time offer and prompt
							action.]', 'aegis' ) . '</em></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"3px","backgroundColor":"tertiary"} -->
				<div class="wp-block-column has-tertiary-background-color has-background" style="flex-basis:3px"></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"align":"center",sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
					<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img
							src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_200x200_black.jpg" alt="' .
							esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"textAlign":"center","level":3} -->
					<h3 class="wp-block-heading has-text-align-center"><strong>' . esc_html__( 'New [Item/Collection]', 'aegis' ) . '</strong></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center">' . esc_html__( 'Promotion Update (76
						characters): [Describe current discount/promotion
						on specific items/collections.]', 'aegis' ) . '</p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class="wp-block-buttons">
						<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"aligncenter is-style-yuna-button-shadow is-style-aegis-button-shadow","fontSize":"small"} -->
						<div class="wp-block-button has-custom-font-size aligncenter is-style-yuna-button-shadow is-style-aegis-button-shadow has-small-font-size"
							style="font-style:normal;font-weight:600"><a
								class="wp-block-button__link wp-element-button">' . esc_html__( 'Call to Action', 'aegis' ) . '</a></div>
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