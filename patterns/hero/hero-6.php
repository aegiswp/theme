<?php
/**
 * 06. Hero Block Pattern
 */
return array(
    'title'      => __('06. Hero', 'aegis'),
    'description' => __('Hero with Heading, Text, Button and Video', 'aegis'),
    'categories' => array('aegis-hero'),
    'content' => '
<!-- wp:group {"tagName":"section","align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"gradient":"vertical-background-to-foreground","className":"is-not-gradient-on-mobile","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('Hero Section', 'aegis') . '"}} -->
<section class="wp-block-group alignwide is-not-gradient-on-mobile has-vertical-background-to-foreground-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":""} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"300","fontSize":"3.6rem"}}} -->
			<h2 class="wp-block-heading" style="font-size:3.6rem;font-style:normal;font-weight:300"><strong>' . esc_html__('Main', 'aegis') . '</strong> ' . esc_html__('Heading', 'aegis') . '</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . esc_html__('Hero Content (333 chars): [Provide a brief overview of a specific topic, product, or service.]', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow","fontSize":"small"} -->
				<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button" href="#">' . esc_html__('Call to Action', 'aegis') . '</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"60%","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
		<div class="wp-block-column" style="padding-top:0;padding-bottom:0;flex-basis:60%">
			<!-- wp:video {"className":"is-style-aegis-shadow wp-has-aspect-ratio"} -->
			<figure class="wp-block-video is-style-aegis-shadow wp-has-aspect-ratio"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark.webp" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/aegis.mp4" playsinline></video></figure>
			<!-- /wp:video -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->',
);