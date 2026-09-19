<?php
/**
 * Title: Testimonials Slider
 * Slug: testimonials
 * Categories: slider
 * Keywords: slider, testimonials, reviews, quotes, carousel
 * Description: A testimonials carousel with customer reviews, avatars, and star ratings.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

?>
<!-- wp:aegis/slider {"perPage":1,"autoplay":true,"interval":8000,"showArrows":false,"showDots":true,"loop":true,"height":"400px","align":"wide"} -->
<div class="wp-block-aegis-slider alignwide">
	<!-- wp:aegis/slide -->
	<div class="wp-block-aegis-slide">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"700px"}} -->
		<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"48px","lineHeight":"1"}}} -->
			<p class="has-text-align-center" style="font-size:48px;line-height:1">★★★★★</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25rem","fontStyle":"italic"}}} -->
			<p class="has-text-align-center" style="font-size:1.25rem;font-style:italic"><?php echo esc_html__( '"This theme has completely transformed how we build websites. The block-based approach is intuitive and the results are stunning. Highly recommended for any serious web project."', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"60px","height":"60px","sizeSlug":"thumbnail","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image size-thumbnail is-resized has-custom-border"><img src="https://i.pravatar.cc/150?img=1" alt="<?php echo esc_attr__( 'Sarah Johnson', 'aegis' ); ?>" style="border-radius:100%;width:60px;height:60px"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"},"spacing":{"margin":{"bottom":"0"}}}} -->
					<p style="margin-bottom:0;font-weight:600"><?php echo esc_html__( 'Sarah Johnson', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500"} -->
					<p class="has-neutral-500-color has-text-color" style="margin-top:0;font-size:0.875rem"><?php echo esc_html__( 'CEO, TechStart Inc.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:aegis/slide -->

	<!-- wp:aegis/slide -->
	<div class="wp-block-aegis-slide">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"700px"}} -->
		<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"48px","lineHeight":"1"}}} -->
			<p class="has-text-align-center" style="font-size:48px;line-height:1">★★★★★</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25rem","fontStyle":"italic"}}} -->
			<p class="has-text-align-center" style="font-size:1.25rem;font-style:italic"><?php echo esc_html__( '"The performance optimizations are incredible. Our page load times dropped by 40% after switching to this theme. The accessibility features are also top-notch."', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"60px","height":"60px","sizeSlug":"thumbnail","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image size-thumbnail is-resized has-custom-border"><img src="https://i.pravatar.cc/150?img=3" alt="<?php echo esc_attr__( 'Michael Chen', 'aegis' ); ?>" style="border-radius:100%;width:60px;height:60px"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"},"spacing":{"margin":{"bottom":"0"}}}} -->
					<p style="margin-bottom:0;font-weight:600"><?php echo esc_html__( 'Michael Chen', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500"} -->
					<p class="has-neutral-500-color has-text-color" style="margin-top:0;font-size:0.875rem"><?php echo esc_html__( 'Lead Developer, WebCraft', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:aegis/slide -->

	<!-- wp:aegis/slide -->
	<div class="wp-block-aegis-slide">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"700px"}} -->
		<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"48px","lineHeight":"1"}}} -->
			<p class="has-text-align-center" style="font-size:48px;line-height:1">★★★★★</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25rem","fontStyle":"italic"}}} -->
			<p class="has-text-align-center" style="font-size:1.25rem;font-style:italic"><?php echo esc_html__( '"Finally, a theme that takes accessibility seriously. Our clients love how inclusive their websites have become. The support team is also fantastic."', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"60px","height":"60px","sizeSlug":"thumbnail","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image size-thumbnail is-resized has-custom-border"><img src="https://i.pravatar.cc/150?img=5" alt="<?php echo esc_attr__( 'Emily Rodriguez', 'aegis' ); ?>" style="border-radius:100%;width:60px;height:60px"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"},"spacing":{"margin":{"bottom":"0"}}}} -->
					<p style="margin-bottom:0;font-weight:600"><?php echo esc_html__( 'Emily Rodriguez', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500"} -->
					<p class="has-neutral-500-color has-text-color" style="margin-top:0;font-size:0.875rem"><?php echo esc_html__( 'UX Designer, AccessibleWeb', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:aegis/slide -->
</div>
<!-- /wp:aegis/slider -->
