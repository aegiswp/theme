<?php
/**
 * About 1 Block Pattern
 */
return array(
	'title'	      => __( 'About 1', 'aegis' ),
	'description' => __( 'About Us Block Pattern', 'aegis' ),
	'categories'  => array( 'aegis-about' ),
	'content' => '
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"gradient":"diagonal-secondary-to-background","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-diagonal-secondary-to-background-gradient-background has-background" style="margin-top:0;margin-bottom:0">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0px","left":"0px"},"padding":{"bottom":"var:preset|spacing|40","top":"var:preset|spacing|40"},"margin":{"top":"0px","bottom":"0px"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
		<!-- wp:column {"verticalAlignment":"center","width":""} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:group {"style":{"border":{"radius":{"topLeft":"500px","bottomLeft":"500px"}}},"gradient":"horizontal-primary-to-background","className":"aegis-left-top"} -->
			<div class="wp-block-group aegis-left-top has-horizontal-primary-to-background-gradient-background has-background" style="border-top-left-radius:500px;border-bottom-left-radius:500px">
				<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"size-full aegis-right is-style-aegis-shadow-image"} -->
				<figure class="wp-block-image size-large size-full aegis-right is-style-aegis-shadow-image">
				<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/thumb_1700x1350_dark.webp" alt="' . esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" />
				</figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
			<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
			<p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__( 'About Us', 'aegis' ) . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300","lineHeight":"1.2"}},"fontSize":"x-large"} -->
			<p class="has-x-large-font-size" style="font-style:normal;font-weight:300;line-height:1.2"><strong>' . esc_html__( 'Main', 'aegis' ) . '</strong> ' . esc_html__( 'Heading', 'aegis' ) . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p>' . esc_html__( 'About Content (333 chars): [Provide a detailed overview of a specific topic, product, or service.]' , 'aegis' ) . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
				<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#">' . esc_html__( 'Call to Action' , 'aegis' ) . '</a></div>
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