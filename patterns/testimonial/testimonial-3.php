<?php
/**
 * 03. Testimonials Block Pattern
 */
return array(
	'title'	  => __( '03. Testimonials', 'aegis' ),
	'description' => __( 'Block Pattern with Tagline, Headings, Paragraphs, Ratings and Images', 'aegis' ),
	'categories' => array( 'aegis-testimonial' ),
	'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"className":"is-style-default","layout":{"type":"constrained"},"metadata":{"name":"' . esc_html__('03. Testimonials Pattern', 'aegis') . '"}} -->
<div class="wp-block-group alignfull is-style-default" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
			<p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('[Tagline]', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"huge"} -->
			<h3 class="wp-block-heading has-huge-font-size" style="margin-top:0">' . esc_html__('[Heading (57 characters): Brand Value Proposition]', 'aegis') . '</h3>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"background","className":"is-style-aegis-border"} -->
			<div class="wp-block-group is-style-aegis-border has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"width":""} -->
					<div class="wp-block-column">
						<!-- wp:paragraph -->
						<p><strong>' . esc_html__('[Product Name]', 'aegis') . '</strong></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"className":"aegis-rating","fontSize":"tiny"} -->
						<p class="aegis-rating has-tiny-font-size" style="letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0">' . esc_html__('[Paragraph (155 characters): Testimonials that are too long can overwhelm visitors, especially in a grid format.]', 'aegis') . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->

				<!-- wp:separator {"backgroundColor":"foreground","className":"is-style-wide"} -->
				<hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-wide" />
				<!-- /wp:separator -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left","flexWrap":"wrap"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:image {"width":"80px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
					<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:80px" /></figure>
					<!-- /wp:image -->

					<!-- wp:paragraph {"fontSize":"tiny"} -->
					<p class="has-tiny-font-size">' . esc_html__('[Customer Name]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"is-style-aegis-border"} -->
			<div class="wp-block-group is-style-aegis-border has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"width":""} -->
					<div class="wp-block-column">
						<!-- wp:paragraph -->
						<p><strong>' . esc_html__('[Product Name]', 'aegis') . '</strong></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"className":"aegis-rating","fontSize":"tiny"} -->
						<p class="aegis-rating has-tiny-font-size" style="letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:var(--wp--preset--spacing--30)">' . esc_html__('[Paragraph (155 characters): Testimonials that are too long can overwhelm visitors, especially in a grid format.]', 'aegis') . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->

				<!-- wp:separator {"backgroundColor":"foreground","className":"is-style-wide"} -->
				<hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-wide" />
				<!-- /wp:separator -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left","flexWrap":"wrap"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:image {"width":"80px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
					<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:80px" /></figure>
					<!-- /wp:image -->

					<!-- wp:paragraph {"fontSize":"tiny"} -->
					<p class="has-tiny-font-size">' . esc_html__('[Customer Name]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"foreground","textColor":"background","className":"is-style-default"} -->
			<div class="wp-block-group is-style-default has-background-color has-foreground-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"width":""} -->
					<div class="wp-block-column">
						<!-- wp:paragraph -->
						<p><strong>' . esc_html__('[Product Name]', 'aegis') . '</strong></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"className":"aegis-rating","fontSize":"tiny"} -->
						<p class="aegis-rating has-tiny-font-size" style="letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"small"} -->
						<p class="has-small-font-size" style="margin-top:var(--wp--preset--spacing--30)">' . esc_html__('[Paragraph (155 characters): Testimonials that are too long can overwhelm visitors, especially in a grid format.]', 'aegis') . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->

				<!-- wp:separator {"backgroundColor":"background","className":"is-style-wide"} -->
				<hr class="wp-block-separator has-text-color has-background-color has-alpha-channel-opacity has-background-background-color has-background is-style-wide" />
				<!-- /wp:separator -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left","flexWrap":"wrap"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:image {"width":"80px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded"} -->
					<figure class="wp-block-image size-full is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:80px" /></figure>
					<!-- /wp:image -->

					<!-- wp:paragraph {"fontSize":"tiny"} -->
					<p class="has-tiny-font-size">' . esc_html__('[Customer Name]', 'aegis') . '</p>
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