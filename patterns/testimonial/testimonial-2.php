<?php
/**
 * 02. Testimonials Block Pattern
 */
return array(
	'title'	  => __( '02. Testimonial', 'aegis' ),
	'description' => __( 'Testimonial', 'aegis' ),
	'categories' => array( 'aegis-testimonial' ),
	'content'	=> '<!-- wp:group {"metadata":{"name":"' . esc_html__('02. Testimonials Pattern', 'aegis') . '"},"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
    <div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide","className":"testimonials"} -->
	<div class="wp-block-columns alignwide testimonials">
		<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
		<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"is-style-aegis-border"} -->
			<div class="wp-block-group is-style-aegis-border has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"align":"right","className":"is-quote-mark","fontSize":"extra-large"} -->
				<p class="has-text-align-right is-quote-mark has-extra-large-font-size">' . esc_html__('❞', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"large"} -->
				<h3 class="wp-block-heading has-large-font-size">' . esc_html__('[Heading]', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"},"spacing":{"margin":{"bottom":"var:preset|spacing|30","top":"0"}}},"fontSize":"tiny"} -->
				<p class="has-tiny-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30);letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span>				
				</p>
				<!-- /wp:paragraph -->

				<!-- wp:quote {"metadata":{"name":""},"className":"is-style-default"} -->
				<blockquote class="wp-block-quote is-style-default">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">"' . esc_html__('Testimonials that are too long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey a message.', 'aegis') . '"</p>
					<!-- /wp:paragraph -->
				</blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"0"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:image {"width":"100px","aspectRatio":"1","scale":"cover","className":"is-style-rounded"} -->
					<figure class="wp-block-image is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:100px" /></figure>
					<!-- /wp:image -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('[Customer Name]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
		<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"is-style-aegis-border"} -->
			<div class="wp-block-group is-style-aegis-border has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"align":"right","className":"is-quote-mark","fontSize":"extra-large"} -->
				<p class="has-text-align-right is-quote-mark has-extra-large-font-size">' . esc_html__('❞', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"large"} -->
				<h3 class="wp-block-heading has-large-font-size">' . esc_html__('[Heading]', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"},"spacing":{"margin":{"bottom":"var:preset|spacing|30","top":"0"}}},"fontSize":"tiny"} -->
				<p class="has-tiny-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30);letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span>					
				</p>
				<!-- /wp:paragraph -->

				<!-- wp:quote {"metadata":{"name":""},"className":"is-style-default"} -->
				<blockquote class="wp-block-quote is-style-default">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">"' . esc_html__('Testimonials that are too long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey a message.', 'aegis') . '"</p>
					<!-- /wp:paragraph -->
				</blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"0"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:image {"width":"100px","aspectRatio":"1","scale":"cover","className":"is-style-rounded"} -->
					<figure class="wp-block-image is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:100px" /></figure>
					<!-- /wp:image -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('[Customer Name]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
		<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background","className":"is-style-aegis-border"} -->
			<div class="wp-block-group is-style-aegis-border has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"align":"right","className":"is-quote-mark","fontSize":"extra-large"} -->
				<p class="has-text-align-right is-quote-mark has-extra-large-font-size">' . esc_html__('❞', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"large"} -->
				<h3 class="wp-block-heading has-large-font-size">' . esc_html__('[Heading]', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"},"spacing":{"margin":{"bottom":"var:preset|spacing|30","top":"0"}}},"fontSize":"tiny"} -->
				<p class="has-tiny-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30);letter-spacing:2px"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-half"></span><span class="dashicons dashicons-star-empty"></span>					
				</p>
				<!-- /wp:paragraph -->

				<!-- wp:quote {"metadata":{"name":""},"className":"is-style-default"} -->
				<blockquote class="wp-block-quote is-style-default">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">"' . esc_html__('Testimonials that are too long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey a message.', 'aegis') . '"</p>
					<!-- /wp:paragraph -->
				</blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"var:preset|spacing|30","bottom":"0"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:image {"width":"100px","aspectRatio":"1","scale":"cover","className":"is-style-rounded"} -->
					<figure class="wp-block-image is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_light.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:100px" /></figure>
					<!-- /wp:image -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('[Customer Name]', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
);