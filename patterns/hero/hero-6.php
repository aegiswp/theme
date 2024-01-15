<?php
/**
 * 06. Hero Block Pattern
 */
return array(
    'title'      => __('06. Hero', 'aegis'),
	'description' => __('Full-screen hero with gradient background, left aligned heading, paragraph, call-to-action button, and right aligned video', 'aegis'),
    'categories' => array('aegis-hero'),
    'content' => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"gradient":"vertical-background-to-foreground","className":"has-no-gradient-on-mobile","layout":{"type":"default"},"metadata":{"name":"' . esc_html__('05. Hero Pattern', 'aegis') . '"}} -->
    <div class="wp-block-group alignwide has-no-gradient-on-mobile has-vertical-background-to-foreground-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":""} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"300","fontSize":"3.6rem"}}} -->
			<h1 class="wp-block-heading" style="font-size:3.6rem;font-style:normal;font-weight:300">' . wp_kses_post(_x('<strong>Main</strong> Headline', 'Sample descriptive heading', 'aegis')) . '</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . esc_html__('[Paragraph (335 characters): Promote an offer, summarize an article, or share a news update.]', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
				<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#">' . esc_html__('[Call to Action]', 'aegis') . '</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"60%","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
		<div class="wp-block-column" style="padding-top:0;padding-bottom:0;flex-basis:60%">
			<!-- wp:video {"className":"is-style-aegis-shadow"} -->
			<figure class="wp-block-video is-style-aegis-shadow"><video controls poster="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" preload="auto" src="' . esc_url(get_template_directory_uri()) . '/assets/videos/sample.mp4" playsinline></video></figure>
			<!-- /wp:video -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
);