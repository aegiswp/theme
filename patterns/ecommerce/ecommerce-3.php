<?php
/**
 * 03. eCommerce Block Pattern
 */
return array(
	'title'	  => __( '03. eCommerce', 'aegis' ),
	'description' => __( 'eCommerce with tagline, heading, paragraph, rating and images', 'aegis' ),
	'categories' => array( 'aegis-ecommerce' ),
	'content' => '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
			<p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('Testimonials', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"huge"} -->
			<h3 class="wp-block-heading has-huge-font-size" style="margin-top:0">' . esc_html__('Brand Value Proposition [57 characters]', 'aegis') . '</h3>
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
						<p><strong>' . esc_html__('Product Name', 'aegis') . '</strong></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"className":"aegis-rating","fontSize":"tiny"} -->
						<p class="aegis-rating has-tiny-font-size" style="letter-spacing:2px">' . esc_html__('★★★★★', 'aegis') . '</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"fontSize":"small"} -->
						<p class="has-small-font-size">' . esc_html__('Testimonials that are too long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey a message.', 'aegis') . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->

				<!-- wp:separator {"backgroundColor":"foreground","className":"is-style-default"} -->
				<hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-default" />
				<!-- /wp:separator -->

				<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left","flexWrap":"wrap"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"80px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-resized is-style-rounded"} -->
                    <figure class="wp-block-image size-full is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:80px"/></figure>
                    <!-- /wp:image -->

					<!-- wp:paragraph {"fontSize":"tiny"} -->
					<p class="has-tiny-font-size">' . esc_html__('Customer Name', 'aegis') . '</p>
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
						<p><strong>' . esc_html__('Product Name', 'aegis') . '</strong></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"className":"aegis-rating","fontSize":"tiny"} -->
						<p class="aegis-rating has-tiny-font-size" style="letter-spacing:2px">' . esc_html__('★★★★★', 'aegis') . '</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"fontSize":"small"} -->
						<p class="has-small-font-size">' . esc_html__('Testimonials that are too long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey a message.', 'aegis') . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->

				<!-- wp:separator {"backgroundColor":"foreground","className":"is-style-default"} -->
				<hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-default" />
				<!-- /wp:separator -->

				<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left","flexWrap":"wrap"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"80px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-resized is-style-rounded"} -->
                    <figure class="wp-block-image size-full is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:80px"/></figure>
                    <!-- /wp:image -->

					<!-- wp:paragraph {"fontSize":"tiny"} -->
					<p class="has-tiny-font-size">' . esc_html__('Customer Name', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background","className":"is-style-aegis-border"} -->
			<div class="wp-block-group is-style-aegis-border has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:columns -->
				<div class="wp-block-columns">
					<!-- wp:column {"width":""} -->
					<div class="wp-block-column">
						<!-- wp:paragraph -->
						<p><strong>' . esc_html__('Product Name', 'aegis') . '</strong></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"className":"aegis-rating","fontSize":"tiny"} -->
						<p class="aegis-rating has-tiny-font-size" style="letter-spacing:2px">' . esc_html__('★★★★★', 'aegis') . '</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"fontSize":"small"} -->
						<p class="has-small-font-size">' . esc_html__('Testimonials that are too long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey a message.', 'aegis') . '</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->

				<!-- wp:separator {"backgroundColor":"background","className":"is-style-default"} -->
				<hr class="wp-block-separator has-text-color has-background-color has-alpha-channel-opacity has-background-background-color has-background is-style-default" />
				<!-- /wp:separator -->

				<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left","flexWrap":"wrap"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"80px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-resized is-style-rounded"} -->
                    <figure class="wp-block-image size-full is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:80px"/></figure>
                    <!-- /wp:image -->

					<!-- wp:paragraph {"fontSize":"tiny"} -->
					<p class="has-tiny-font-size">' . esc_html__('Customer Name', 'aegis') . '</p>
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