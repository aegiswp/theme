<?php
/**
 * 01. Testimonials Block Pattern
 */
return array(
	'title'	  => __( '01. Testimonials', 'aegis' ),
	'description' => __( 'Testimonials Block Pattern', 'aegis' ),
	'categories' => array( 'aegis-testimonials' ),
	'content'	=> '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"className":"testimonials","layout":{"contentSize":"","type":"constrained"}} -->
<div class="wp-block-group alignfull testimonials" style="padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"10px"}}}} -->
		<div class="wp-block-column" style="padding-bottom:10px">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"top":{"color":"var:preset|color|foreground","width":"2px"},"right":{},"bottom":{},"left":{}}},"backgroundColor":"secondary","className":"is-style-default"} -->
			<div class="wp-block-group is-style-default has-secondary-background-color has-background" style="border-top-color:var(--wp--preset--color--foreground);border-top-width:2px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:quote {"className":"is-style-default"} -->
				<blockquote class="wp-block-quote is-style-default">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__( '"Testimonials that are too long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey a message."' , 'aegis' ). '</p>
					<!-- /wp:paragraph -->
				</blockquote>
				<!-- /wp:quote -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"5%","right":"5%","bottom":"5%","left":"5%"},"margin":{"top":"0","bottom":"0"}}},"gradient":"diagonal-background-to-secondary-triangle"} -->
			<div class="wp-block-group has-diagonal-background-to-secondary-triangle-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:5%;padding-right:5%;padding-bottom:5%;padding-left:5%">
				<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"right"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__( 'Customer Name' , 'aegis' ). '</p>
					<!-- /wp:paragraph -->

					<!-- wp:image {"width":"100px","height":"100px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"100px"}},"className":"is-style-aegis-shadow-image"} -->
					<figure class="wp-block-image size-full is-resized has-custom-border is-style-aegis-shadow-image">
						<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/thumb_120x120_dark.webp" alt="' . esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" style="border-radius:100px;width:100px;height:100px" /></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"10px"}}}} -->
		<div class="wp-block-column" style="padding-bottom:10px">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"top":{"color":"var:preset|color|foreground","width":"2px"},"right":{},"bottom":{},"left":{}}},"backgroundColor":"secondary","className":"is-style-default"} -->
			<div class="wp-block-group is-style-default has-secondary-background-color has-background" style="border-top-color:var(--wp--preset--color--foreground);border-top-width:2px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:quote {"className":"is-style-default"} -->
				<blockquote class="wp-block-quote is-style-default">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__( '"Testimonials that are too long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey a message."' , 'aegis' ). '</p>
					<!-- /wp:paragraph -->
				</blockquote>
				<!-- /wp:quote -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"5%","right":"5%","bottom":"5%","left":"5%"},"margin":{"top":"0","bottom":"0"}}},"gradient":"diagonal-background-to-secondary-triangle"} -->
			<div class="wp-block-group has-diagonal-background-to-secondary-triangle-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:5%;padding-right:5%;padding-bottom:5%;padding-left:5%">
				<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"right"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__( 'Customer Name' , 'aegis' ). '</p>
					<!-- /wp:paragraph -->

					<!-- wp:image {"width":"100px","height":"100px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"100px"}},"className":"is-style-aegis-shadow-image"} -->
					<figure class="wp-block-image size-full is-resized has-custom-border is-style-aegis-shadow-image">
						<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/thumb_120x120_dark.webp" alt="' . esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" style="border-radius:100px;width:100px;height:100px" /></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"10px"}}}} -->
		<div class="wp-block-column" style="padding-bottom:10px">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"top":{"color":"var:preset|color|foreground","width":"2px"},"right":{},"bottom":{},"left":{}}},"backgroundColor":"secondary","className":"is-style-default"} -->
			<div class="wp-block-group is-style-default has-secondary-background-color has-background" style="border-top-color:var(--wp--preset--color--foreground);border-top-width:2px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:quote {"className":"is-style-default"} -->
				<blockquote class="wp-block-quote is-style-default">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__( '"Testimonials that are too long can overwhelm visitors, especially in a grid format. Around 155 characters are usually enough to convey a message."' , 'aegis' ). '</p>
					<!-- /wp:paragraph -->
				</blockquote>
				<!-- /wp:quote -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"5%","right":"5%","bottom":"5%","left":"5%"},"margin":{"top":"0","bottom":"0"}}},"gradient":"diagonal-background-to-secondary-triangle"} -->
			<div class="wp-block-group has-diagonal-background-to-secondary-triangle-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:5%;padding-right:5%;padding-bottom:5%;padding-left:5%">
				<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"right"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">' . esc_html__( 'Customer Name' , 'aegis' ). '</p>
					<!-- /wp:paragraph -->

					<!-- wp:image {"width":"100px","height":"100px","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"100px"}},"className":"is-style-aegis-shadow-image"} -->
					<figure class="wp-block-image size-full is-resized has-custom-border is-style-aegis-shadow-image">
						<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/thumb_120x120_dark.webp" alt="' . esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" style="border-radius:100px;width:100px;height:100px" /></figure>
					<!-- /wp:image -->
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