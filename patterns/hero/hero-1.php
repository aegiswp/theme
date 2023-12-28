<?php
/**
 * 01. Hero Block Pattern
 */
return array(
    'title'      => __('01. Hero', 'aegis'),
    'description' => __('Hero', 'aegis'),
    'categories' => array('aegis-hero'),
    'content' => '
<!-- wp:cover {"url":"' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark.webp","dimRatio":70,"overlayColor":"foreground","focalPoint":{"x":0.5,"y":0.5},"minHeight":800,"contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}},"className":"is-style-default header-hero additional"} -->
<div class="wp-block-cover alignfull is-style-default header-hero additional" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:800px">
	<span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="' . esc_attr_x('Default background image for the hero', 'Description of the default image', 'aegis') . '" src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark.webp" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%" />
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"240px","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group" style="padding-top:240px;padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"gigantic"} -->
			<h2 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="font-style:normal;font-weight:400"><strong>' . esc_html__('Main', 'aegis') . '</strong> ' . esc_html__('Heading', 'aegis') . '</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . esc_html_x('About Content (333 chars): [Provide a detailed overview of a specific topic, product, or service.]', 'Placeholder content for the about section', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow","fontSize":"small"} -->
				<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button" href="#">' . esc_html__('Call to Action', 'aegis') . '</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->',
);