<?php
/**
 * 02. Hero Block Pattern
 */
return array(
    'title'      => __('02. Hero', 'aegis'),
    'description' => __('Hero', 'aegis'),
    'categories' => array('aegis-hero'),
    'content'    => '
<!-- wp:cover {"url":"' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark.webp","dimRatio":70,"overlayColor":"foreground","focalPoint":{"x":0.5,"y":0.5},"minHeight":700,"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"className":"is-style-default"} -->
<div class="wp-block-cover alignwide is-style-default" style="margin-top:0;margin-bottom:0;min-height:700px"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
<img class="wp-block-cover__image-background" alt="' . esc_attr_x('Default background image for the hero section', 'Description of the default image', 'aegis') . '" src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_1800x1200_dark.webp" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%" />
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"10px"},"spacing":{"margin":{"top":"var:preset|spacing|30","right":"0","bottom":"0","left":"0"}}},"fontSize":"tiny"} -->
			<p class="has-tiny-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:0;margin-left:0;letter-spacing:10px;text-transform:uppercase">' . esc_html_x('Content Title (11 chars)', 'Placeholder for content title', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"gigantic"} -->
			<h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__('Main Headline', 'aegis') . '</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . esc_html_x('Content Highlight (146 chars): [Promote an offer, summarize an article, or share a news update.]', 'Placeholder for content highlight', 'aegis') . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","flexWrap":"nowrap"}} -->
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