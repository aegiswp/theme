<?php
/**
 * 03. About Us Block Pattern
 */
return array(
	'title'	  => __( '03. About Us', 'aegis' ),
	'description' => __( 'About Us with tagline, headings, paragraphs, images, and button', 'aegis' ),
	'categories' => array( 'aegis-about' ),
	'content' => '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|30","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30"}}},"gradient":"vertical-secondary-to-background","className":"about","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull about has-vertical-secondary-to-background-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":"43.33%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:43.33%">
			<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
			<p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('About Us', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"huge"} -->
			<h2 class="wp-block-heading has-huge-font-size" style="margin-top:0;font-style:normal;font-weight:300"><strong>' . esc_html__('Main', 'aegis') . '</strong> ' . esc_html__('Heading', 'aegis') . '</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . esc_html__('About Content (333 chars): [Provide a detailed overview of a specific topic, product, or service.]', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-aegis-button-shadow is-style-aegis-button-shadow"} -->
				<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#">' . esc_html__('Call to Action', 'aegis') . '</a></div>
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
					<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-3-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:300"><strong>' . esc_html__('Sub', 'aegis') . '</strong> ' . esc_html__('Heading', 'aegis') . '</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('Benefits Overview (108 chars): [Highlight key advantages or unique offerings of the organization.]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-3-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:300"><strong>' . esc_html__('Sub', 'aegis') . '</strong> ' . esc_html__('Heading', 'aegis') . '</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('Benefits Overview (108 chars): [Highlight key advantages or unique offerings of the organization.]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->

			<!-- wp:columns -->
			<div class="wp-block-columns">
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-3-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:300"><strong>' . esc_html__('Sub', 'aegis') . '</strong> ' . esc_html__('Heading', 'aegis') . '</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('Benefits Overview (108 chars): [Highlight key advantages or unique offerings of the organization.]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-3-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:300"><strong>' . esc_html__('Sub', 'aegis') . '</strong> ' . esc_html__('Heading', 'aegis') . '</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('Benefits Overview (108 chars): [Highlight key advantages or unique offerings of the organization.]', 'aegis') . '</p>
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