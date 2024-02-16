<?php
/**
 * 02. Hero Block Pattern
 */
return array(
    'title'      => __('02. Hero', 'aegis'),
    'description' => __('Full-screen hero with cover background image, dark overlay, and light left-centered tagline, heading, paragraph, and a call-to-action button', 'aegis'),
    'categories' => array('aegis-hero'),
    'content'    => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"dimensions":{"minHeight":""}},"layout":{"type":"default"},"metadata":{"name":"' . esc_html__('02. Hero Pattern', 'aegis') . '"}} -->
    <div class="wp-block-group alignwide" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:cover {"url":"' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp","dimRatio":70,"overlayColor":"foreground","minHeight":100,"minHeightUnit":"vh","align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<div class="wp-block-cover alignwide" style="margin-top:0;margin-bottom:0;min-height:100vh">
	<span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
	<img class="wp-block-cover__image-background" src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1920x1200_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" data-object-fit="cover" />
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"10px"},"spacing":{"margin":{"top":"var:preset|spacing|30","right":"0","bottom":"0","left":"0"}}},"className":"is-tagline","fontSize":"tiny"} -->
				<p class="is-tagline has-tiny-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:0;margin-left:0;letter-spacing:10px;text-transform:uppercase">' . esc_html__('[Tagline (11 characters)]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":1,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"gigantic"} -->
				<h1 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__('[Main Headline]', 'aegis') . '</h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>' . esc_html__('[Paragraph (155 characters): Promote an offer, summarize an article, or share a news update.]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
					<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#">' . esc_html__('[Call to Action]', 'aegis') . '</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->',
);