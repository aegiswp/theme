<?php
/**
 * 01. About Us Block Pattern
 */
return array(
	'title'	      => __( '01. About Us', 'aegis' ),
	'description' => __( 'About Us', 'aegis' ),
	'categories'  => array( 'aegis-about' ),
	'content' => '
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"gradient":"diagonal-secondary-to-background","className":"about","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull about has-diagonal-secondary-to-background-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"bottom":"0","top":"0"}}}} -->
	<div class="wp-block-columns alignwide" style="padding-top:0;padding-bottom:0">
		<!-- wp:column {"verticalAlignment":"center","width":""} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:group {"gradient":"horizontal-primary-to-background"} -->
			<div class="wp-block-group has-horizontal-primary-to-background-gradient-background has-background">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"size-full aegis-right is-style-aegis-shadow-image"} -->
				<figure class="wp-block-image size-full aegis-right is-style-aegis-shadow-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_700x550_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" /></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"0","bottom":"var:preset|spacing|50","left":"0"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0">
			<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
			<p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__('About Us', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"gigantic"} -->
			<h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;font-style:normal;font-weight:300"><strong>' . esc_html__('Main', 'aegis') . '</strong> ' . esc_html__('Heading', 'aegis') . '</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . esc_html__('About Content (333 chars): [Provide a detailed overview of a specific topic, product, or service.]', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
				<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#">' . esc_html__('Call to Action', 'aegis') . '</a></div>
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