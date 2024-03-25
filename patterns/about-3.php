<?php
/**
 * Title: 03. About Pattern
 * Slug: aegis/about-3
 * Categories: about
 * Description: Multicolumn block pattern with tagline, heading, paragraph, and button on the left, and two-column, four media, headings, and paragraphs on the right
 * Keywords: about, call-to-action, buttons, columns, heading, image, media
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/paragraph, core/heading, core/button, core/image
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|30","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"gradient":"vertical-secondary-to-background","layout":{"type":"constrained"},"metadata":{"name":"<?php echo esc_html_x('03. About Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group alignfull has-vertical-secondary-to-background-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"verticalAlignment":"center","width":"43.33%","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);flex-basis:43.33%">
			<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"0"}}},"fontSize":"tiny"} -->
			<p class="has-text-align-left has-tiny-font-size" style="margin-bottom:0;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('[Tagline]', 'Replace with a descriptive tagline', 'aegis'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
			<h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
			<p style="margin-top:var(--wp--preset--spacing--30)"><?php echo esc_html_x('[Description (333 characters): Detail the core principles, values, or characteristics of the organization or subject.]', 'Replace with a description of the section', 'aegis'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
				<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text', 'aegis' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"56.66%","style":{"spacing":{"padding":{"left":"0"}}}} -->
		<div class="wp-block-column" style="padding-left:0;flex-basis:56.66%">
			<!-- wp:columns {"style":{"spacing":{"margin":{"bottom":"0"}}}} -->
			<div class="wp-block-columns" style="margin-bottom:0">
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-3-image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_attr__('Placeholder image: Brief description of the image and its context, non-text content for screen readers.', 'aegis'); ?>" style="aspect-ratio:4/3;object-fit:cover" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size"><?php echo esc_html_x('[Description (100 characters): Highlight key advantages or unique offerings of the organization.]', 'Replace with a description of the section', 'aegis'); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-3-image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_attr__('Placeholder image: Brief description of the image and its context, non-text content for screen readers.', 'aegis'); ?>" style="aspect-ratio:4/3;object-fit:cover" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size"><?php echo esc_html_x('[Description (100 characters): Highlight key advantages or unique offerings of the organization.]', 'Replace with a description of the section', 'aegis'); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->

			<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
			<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--50)">
				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-3-image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_attr__('Placeholder image: Brief description of the image and its context, non-text content for screen readers.', 'aegis'); ?>" style="aspect-ratio:4/3;object-fit:cover" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size"><?php echo esc_html_x('[Description (100 characters): Highlight key advantages or unique offerings of the organization.]', 'Replace with a description of the section', 'aegis'); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
					<figure class="wp-block-image size-full is-style-aegis-effect-3-image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" alt="<?php echo esc_attr__('Placeholder image: Brief description of the image and its context, non-text content for screen readers.', 'aegis'); ?>" style="aspect-ratio:4/3;object-fit:cover" /></figure>
					<!-- /wp:image -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"large"} -->
					<h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:400"><?php echo esc_html_x('[Heading]', 'Replace with a descriptive title', 'aegis'); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size"><?php echo esc_html_x('[Description (100 characters): Highlight key advantages or unique offerings of the organization.]', 'Replace with a description of the section', 'aegis'); ?></p>
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
<!-- /wp:group -->