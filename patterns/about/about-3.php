<?php
/**
 * 03. About Block Pattern
 */
return array(
	'title'	  => __( '03. About', 'aegis' ),
	'description' => __( 'Block Pattern with Tagline, Headings, Paragraphs, Medias, and Button', 'aegis' ),
	'categories' => array( 'aegis-about' ),
	'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|30","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"gradient":"vertical-secondary-to-background","layout":{"type":"constrained"},"metadata":{"name":"' . esc_html__('03. About Pattern', 'aegis') . '"}} -->
    <div class="wp-block-group alignfull has-vertical-secondary-to-background-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":"43.33%","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"var:preset|spacing|40"}}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:0;flex-basis:43.33%">
			<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"is-tagline","fontSize":"tiny"} -->
			<p class="has-text-align-left is-tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('[Tagline]', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"huge"} -->
			<h3 class="wp-block-heading has-huge-font-size" style="margin-top:0;font-style:normal;font-weight:300"><strong>' . esc_html__('[Heading]', 'aegis') . '</strong></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . esc_html__('[Paragraph (333 characters): Detail the core principles, values, or characteristics of the organization or subject.]', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
				<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#">' . esc_html__('[Call to Action]', 'aegis') . '</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"56.66%","style":{"spacing":{"padding":{"left":"0"}}}} -->
		<div class="wp-block-column" style="padding-left:0;flex-basis:56.66%">
			<!-- wp:columns -->
			<div class="wp-block-columns">
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-3-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:4/3;object-fit:cover" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:400">' . esc_html__('[Heading]', 'aegis') . '</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('[Paragraph (100 characters): Highlight key advantages or unique offerings of the organization.]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-3-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:4/3;object-fit:cover" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:400">' . esc_html__('[Heading]', 'aegis') . '</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('[Paragraph (100 characters): Highlight key advantages or unique offerings of the organization.]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->

			<!-- wp:columns -->
			<div class="wp-block-columns">
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-3-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:4/3;object-fit:cover" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:400">' . esc_html__('[Heading]', 'aegis') . '</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('[Paragraph (100 characters): Highlight key advantages or unique offerings of the organization.]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-3-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:4/3;object-fit:cover" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:400">' . esc_html__('[Heading]', 'aegis') . '</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('[Paragraph (100 characters): Highlight key advantages or unique offerings of the organization.]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
);