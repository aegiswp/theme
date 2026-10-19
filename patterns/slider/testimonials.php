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
<!-- wp:aegis/slider {"perPage":1,"autoplay":false,"interval":8000,"showArrows":false,"showDots":true,"loop":true,"lightboxEnabled":false,"align":"wide","metadata":{"name":"Testimonials"}} -->
<!-- wp:aegis/slide {"metadata":{"name":"Sarah Johnson"}} -->
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xll","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained","contentSize":"700px","justifyContent":"center"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xll);padding-left:var(--wp--preset--spacing--lg)">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"20px","lineHeight":"1"}}} -->
		<p class="has-text-align-center" style="font-size:20px;line-height:1">★★★★★</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.125rem","fontStyle":"italic","lineHeight":"1.6"}}} -->
		<p class="has-text-align-center" style="font-size:1.125rem;font-style:italic;line-height:1.6"><?php echo esc_html__( '"This theme has completely transformed how we build websites. The block-based approach is intuitive and the results are stunning. Highly recommended for any serious web project."', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"8px","margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"60px","height":"60px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image size-thumbnail is-resized has-custom-border" style="border-radius:100%"><img alt="" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:60px;height:60px"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"className":"is-style-heading","fontSize":"16"} -->
				<p class="is-style-heading has-16-font-size"><?php echo esc_html__( 'Sarah Johnson', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
				<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'CEO, TechStart Inc.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
<!-- /wp:aegis/slide -->

<!-- wp:aegis/slide {"metadata":{"name":"Michael Chen"}} -->
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xll","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained","contentSize":"700px","justifyContent":"center"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xll);padding-left:var(--wp--preset--spacing--lg)">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"20px","lineHeight":"1"}}} -->
		<p class="has-text-align-center" style="font-size:20px;line-height:1">★★★★★</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.125rem","fontStyle":"italic","lineHeight":"1.6"}}} -->
		<p class="has-text-align-center" style="font-size:1.125rem;font-style:italic;line-height:1.6"><?php echo esc_html__( '"The performance optimizations are incredible. Our page load times dropped by 40% after switching to this theme. The accessibility features are also top-notch."', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"8px","margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"60px","height":"60px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image size-thumbnail is-resized has-custom-border" style="border-radius:100%"><img alt="" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:60px;height:60px"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"className":"is-style-heading","fontSize":"16"} -->
				<p class="is-style-heading has-16-font-size"><?php echo esc_html__( 'Michael Chen', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
				<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Lead Developer, WebCraft', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
<!-- /wp:aegis/slide -->

<!-- wp:aegis/slide {"metadata":{"name":"Emily Rodriguez"}} -->
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xll","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained","contentSize":"700px","justifyContent":"center"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xll);padding-left:var(--wp--preset--spacing--lg)">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"20px","lineHeight":"1"}}} -->
		<p class="has-text-align-center" style="font-size:20px;line-height:1">★★★★★</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.125rem","fontStyle":"italic","lineHeight":"1.6"}}} -->
		<p class="has-text-align-center" style="font-size:1.125rem;font-style:italic;line-height:1.6"><?php echo esc_html__( '"Finally, a theme that takes accessibility seriously. Our clients love how inclusive their websites have become. The support team is also fantastic."', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"8px","margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
			<!-- wp:image {"lightbox":{"enabled":false},"width":"60px","height":"60px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100%"}}} -->
			<figure class="wp-block-image size-thumbnail is-resized has-custom-border" style="border-radius:100%"><img alt="" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:60px;height:60px"/></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"className":"is-style-heading","fontSize":"16"} -->
				<p class="is-style-heading has-16-font-size"><?php echo esc_html__( 'Emily Rodriguez', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
				<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'UX Designer, AccessibleWeb', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
<!-- /wp:aegis/slide -->
<!-- /wp:aegis/slider -->
