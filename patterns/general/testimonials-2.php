<?php
/**
 * 02. Testimonials Block Pattern
 */
return array(
	'title'	  => __( '02. Testimonials', 'aegis' ),
	'description' => __( 'Testimonials', 'aegis' ),
	'categories' => array( 'aegis-testimonials' ),
	'content'	=> '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"className":"testimonials","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull testimonials" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"className":"is-style-aegis-border"} -->
			<div class="wp-block-group is-style-aegis-border" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"align":"right","className":"quote-mark","fontSize":"extra-large"} -->
				<p class="has-text-align-right quote-mark has-extra-large-font-size">' . esc_html__('❞', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"large"} -->
				<h3 class="wp-block-heading has-large-font-size">' . esc_html__('Heading', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"className":"rating","fontSize":"tiny"} -->
				<p class="rating has-tiny-font-size" style="letter-spacing:2px">' . esc_html__('★★★★★', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:quote {"className":"is-style-default"} -->
				<blockquote class="wp-block-quote is-style-default">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('"Testimonials that are too long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey a message."', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"100px","height":"100px","scale":"cover","className":"is-style-rounded"} -->
					<figure class="wp-block-image is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_120x120_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="object-fit:cover;width:100px;height:100px" /></figure>
					<!-- /wp:image -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('Customer Name', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"is-style-aegis-border"} -->
			<div class="wp-block-group is-style-aegis-border has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"align":"right","className":"quote-mark","fontSize":"extra-large"} -->
				<p class="has-text-align-right quote-mark has-extra-large-font-size">' . esc_html__('❞', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"large"} -->
				<h3 class="wp-block-heading has-large-font-size">' . esc_html__('Heading', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"className":"rating","fontSize":"tiny"} -->
				<p class="rating has-tiny-font-size" style="letter-spacing:2px">' . esc_html__('★★★★★', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:quote {"className":"is-style-default"} -->
				<blockquote class="wp-block-quote is-style-default">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('"Testimonials that are too long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey a message."', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"100px","height":"100px","scale":"cover","className":"is-style-rounded"} -->
					<figure class="wp-block-image is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_120x120_dark.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="object-fit:cover;width:100px;height:100px" /></figure>
					<!-- /wp:image -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('Customer Name', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"foreground","textColor":"background","className":"is-style-aegis-border"} -->
			<div class="wp-block-group is-style-aegis-border has-background-color has-foreground-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"align":"right","className":"quote-mark","fontSize":"extra-large"} -->
				<p class="has-text-align-right quote-mark has-extra-large-font-size">' . esc_html__('❞', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"large"} -->
				<h3 class="wp-block-heading has-large-font-size">' . esc_html__('Heading', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"className":"rating","fontSize":"tiny"} -->
				<p class="rating has-tiny-font-size" style="letter-spacing:2px">' . esc_html__('★★★★★', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:quote {"className":"is-style-default"} -->
				<blockquote class="wp-block-quote is-style-default">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('"Testimonials that are too long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey a message."', 'aegis') . '</p>
					<!-- /wp:paragraph -->
				</blockquote>
				<!-- /wp:quote -->

				<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:image {"width":"100px","height":"100px","scale":"cover","className":"is-style-rounded"} -->
					<figure class="wp-block-image is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_120x120_light.webp" alt="' . esc_attr__('Describe the main elements of the image and its context.', 'aegis') . '" style="object-fit:cover;width:100px;height:100px" /></figure>
					<!-- /wp:image -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__('Customer Name', 'aegis') . '</p>
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