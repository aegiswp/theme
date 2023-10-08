<?php
/**
 * Commerce 3 Block Pattern
 */
return array(
	'title'	  => __( 'Commerce 3', 'aegis' ),
	'description' => __( 'Testimonials grid block pattern', 'aegis' ),
	'categories' => array( 'aegis-commerce' ),
	'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull"
		style="padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
				<p class="has-text-align-left tagline has-tiny-font-size"
					style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__( 'Testimonials', 'aegis' ) . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"huge"} -->
				<h3 class="wp-block-heading has-huge-font-size" style="margin-top:0">' . esc_html__( 'Brand Value Proposition [57
					characters]', 'aegis' ) .
					'</h3>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"backgroundColor":"background","className":"is-style-aegis-border"} -->
				<div class="wp-block-group is-style-aegis-border has-background-background-color has-background"
					style="padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
					<!-- wp:columns -->
					<div class="wp-block-columns">
						<!-- wp:column {"width":"100%"} -->
						<div class="wp-block-column" style="flex-basis:100%">
							<!-- wp:paragraph -->
							<p><strong>Product Name</strong></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"textColor":"foreground","className":"aegis-rating","fontSize":"tiny"} -->
							<p class="aegis-rating has-foreground-color has-text-color has-tiny-font-size"
								style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"textColor":"foreground","fontSize":"small"} -->
							<p class="has-foreground-color has-text-color has-small-font-size">' . esc_html__( 'Testimonials that are too
								long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey
								a message.', 'aegis' ) . '</p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:column -->
					</div>
					<!-- /wp:columns -->

					<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-default"} -->
					<hr
						class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-default" />
					<!-- /wp:separator -->

					<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
					<div class="wp-block-group">
						<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-resized is-style-rounded"} -->
						<figure class="wp-block-image size-full is-resized is-style-rounded"><img
								src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_80x80_black.jpg"
								alt="' .
								esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" /></figure>
						<!-- /wp:image -->

						<!-- wp:paragraph {"fontSize":"tiny"} -->
						<p class="has-tiny-font-size">' . esc_html__( 'Customer Name', 'aegis' ) . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"backgroundColor":"background","className":"is-style-aegis-border"} -->
				<div class="wp-block-group is-style-aegis-border has-background-background-color has-background"
					style="padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
					<!-- wp:columns -->
					<div class="wp-block-columns">
						<!-- wp:column {"width":"100%"} -->
						<div class="wp-block-column" style="flex-basis:100%">
							<!-- wp:paragraph -->
							<p><strong>Product Name</strong></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"textColor":"foreground","className":"aegis-rating","fontSize":"tiny"} -->
							<p class="aegis-rating has-foreground-color has-text-color has-tiny-font-size"
								style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"textColor":"foreground","fontSize":"small"} -->
							<p class="has-foreground-color has-text-color has-small-font-size">' . esc_html__( 'Testimonials that are too
								long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey
								a message.', 'aegis' ) . '</p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:column -->
					</div>
					<!-- /wp:columns -->

					<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-default"} -->
					<hr
						class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-default" />
					<!-- /wp:separator -->

					<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
					<div class="wp-block-group">
						<!-- wp:image {"className":"size-full is-resized is-style-rounded"} -->
						<figure class="wp-block-image size-full is-resized is-style-rounded"><img
								src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_80x80_black.jpg"
								alt="' .
								esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" /></figure>
						<!-- /wp:image -->

						<!-- wp:paragraph {"fontSize":"tiny"} -->
						<p class="has-tiny-font-size">' . esc_html__( 'Customer Name', 'aegis' ) . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"backgroundColor":"background","className":"is-style-aegis-border"} -->
				<div class="wp-block-group is-style-aegis-border has-background-background-color has-background"
					style="padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
					<!-- wp:columns -->
					<div class="wp-block-columns">
						<!-- wp:column {"width":"100%"} -->
						<div class="wp-block-column" style="flex-basis:100%">
							<!-- wp:paragraph -->
							<p><strong>Product Name</strong></p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"textColor":"foreground","className":"aegis-rating","fontSize":"tiny"} -->
							<p class="aegis-rating has-foreground-color has-text-color has-tiny-font-size"
								style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
							<!-- /wp:paragraph -->

							<!-- wp:paragraph {"textColor":"foreground","fontSize":"small"} -->
							<p class="has-foreground-color has-text-color has-small-font-size">' . esc_html__( 'Testimonials that are too
								long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey
								a message.', 'aegis' ) . '</p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:column -->
					</div>
					<!-- /wp:columns -->

					<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-default"} -->
					<hr
						class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-default" />
					<!-- /wp:separator -->

					<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
					<div class="wp-block-group">
						<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-resized is-style-rounded"} -->
						<figure class="wp-block-image size-full is-resized is-style-rounded"><img
								src="' . esc_url( get_template_directory_uri() ) . '/assets/images/placeholder_80x80_black.jpg"
								alt="' .
								esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" /></figure>
						<!-- /wp:image -->

						<!-- wp:paragraph {"fontSize":"tiny"} -->
						<p class="has-tiny-font-size">' . esc_html__( 'Customer Name', 'aegis' ) . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->',
	);