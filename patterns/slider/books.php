<?php
/**
 * Title: Books Slider
 * Slug: books
 * Categories: slider
 * Keywords: slider, books, reading, library, cover, carousel
 * Description: A full-width book slider with cover image on the left and title, description, and CTAs on the right.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"},"metadata":{"name":"Books Slider"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Featured Books', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
	<p class="has-text-align-center has-neutral-500-color has-text-color"><?php echo esc_html__( 'Hand-picked titles worth your next read.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:spacer {"height":"40px"} -->
	<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:aegis/slider {"lightboxEnabled":false,"perPage":1,"autoplay":false,"showArrows":true,"showDots":true,"loop":true,"align":"wide","className":"is-arrows-outside","metadata":{"name":"Books"}} -->
		<!-- wp:aegis/slide {"metadata":{"name":"Building With Blocks"}} -->
			<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|md","left":"var:preset|spacing|xl"}}}} -->
			<div class="wp-block-columns are-vertically-aligned-center">
				<!-- wp:column {"verticalAlignment":"center","width":"32%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:32%">
					<!-- wp:image {"lightbox":{"enabled":false},"aspectRatio":"2/3","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"4px"}}} -->
					<figure class="wp-block-image size-large has-custom-border" style="border-radius:4px"><img alt="" style="border-radius:4px;aspect-ratio:2/3;object-fit:cover"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":"68%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:68%">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem","fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase"}},"textColor":"neutral-500"} -->
					<p class="has-neutral-500-color has-text-color" style="font-size:0.75rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html__( 'Design', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"2rem","fontWeight":"600","lineHeight":"1.2"},"spacing":{"margin":{"top":"8px","bottom":"0"}}}} -->
					<h3 class="wp-block-heading" style="margin-top:8px;margin-bottom:0;font-size:2rem;font-weight:600;line-height:1.2"><?php echo esc_html__( 'Building With Blocks', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.0625rem","lineHeight":"1.65"},"spacing":{"margin":{"top":"16px","bottom":"0"}}},"textColor":"neutral-500"} -->
					<p class="has-neutral-500-color has-text-color" style="margin-top:16px;margin-bottom:0;font-size:1.0625rem;line-height:1.65"><?php echo esc_html__( 'A practical guide to crafting fast, accessible WordPress sites with the block editor—patterns, theme.json, and modern design systems included.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"28px"},"blockGap":{"left":"12px"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
					<div class="wp-block-buttons" style="margin-top:28px">
						<!-- wp:button {"className":"is-style-fill"} -->
						<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Read More', 'aegis' ); ?></a></div>
						<!-- /wp:button -->

						<!-- wp:button {"className":"is-style-outline"} -->
						<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Buy Now', 'aegis' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"Content That Converts"}} -->
			<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|md","left":"var:preset|spacing|xl"}}}} -->
			<div class="wp-block-columns are-vertically-aligned-center">
				<!-- wp:column {"verticalAlignment":"center","width":"32%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:32%">
					<!-- wp:image {"lightbox":{"enabled":false},"aspectRatio":"2/3","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"4px"}}} -->
					<figure class="wp-block-image size-large has-custom-border" style="border-radius:4px"><img alt="" style="border-radius:4px;aspect-ratio:2/3;object-fit:cover"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":"68%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:68%">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem","fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase"}},"textColor":"neutral-500"} -->
					<p class="has-neutral-500-color has-text-color" style="font-size:0.75rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html__( 'Strategy', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"2rem","fontWeight":"600","lineHeight":"1.2"},"spacing":{"margin":{"top":"8px","bottom":"0"}}}} -->
					<h3 class="wp-block-heading" style="margin-top:8px;margin-bottom:0;font-size:2rem;font-weight:600;line-height:1.2"><?php echo esc_html__( 'Content That Converts', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.0625rem","lineHeight":"1.65"},"spacing":{"margin":{"top":"16px","bottom":"0"}}},"textColor":"neutral-500"} -->
					<p class="has-neutral-500-color has-text-color" style="margin-top:16px;margin-bottom:0;font-size:1.0625rem;line-height:1.65"><?php echo esc_html__( 'Learn how to structure landing pages, CTAs, and storytelling so every visit moves readers closer to action—without sacrificing brand clarity.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"28px"},"blockGap":{"left":"12px"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
					<div class="wp-block-buttons" style="margin-top:28px">
						<!-- wp:button {"className":"is-style-fill"} -->
						<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Read More', 'aegis' ); ?></a></div>
						<!-- /wp:button -->

						<!-- wp:button {"className":"is-style-outline"} -->
						<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Buy Now', 'aegis' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"Speed Without Compromise"}} -->
			<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|md","left":"var:preset|spacing|xl"}}}} -->
			<div class="wp-block-columns are-vertically-aligned-center">
				<!-- wp:column {"verticalAlignment":"center","width":"32%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:32%">
					<!-- wp:image {"lightbox":{"enabled":false},"aspectRatio":"2/3","scale":"cover","sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"4px"}}} -->
					<figure class="wp-block-image size-large has-custom-border" style="border-radius:4px"><img alt="" style="border-radius:4px;aspect-ratio:2/3;object-fit:cover"/></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":"68%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:68%">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem","fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase"}},"textColor":"neutral-500"} -->
					<p class="has-neutral-500-color has-text-color" style="font-size:0.75rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html__( 'Performance', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"2rem","fontWeight":"600","lineHeight":"1.2"},"spacing":{"margin":{"top":"8px","bottom":"0"}}}} -->
					<h3 class="wp-block-heading" style="margin-top:8px;margin-bottom:0;font-size:2rem;font-weight:600;line-height:1.2"><?php echo esc_html__( 'Speed Without Compromise', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.0625rem","lineHeight":"1.65"},"spacing":{"margin":{"top":"16px","bottom":"0"}}},"textColor":"neutral-500"} -->
					<p class="has-neutral-500-color has-text-color" style="margin-top:16px;margin-bottom:0;font-size:1.0625rem;line-height:1.65"><?php echo esc_html__( 'Techniques for lean assets, smart loading, and Core Web Vitals—so your site feels instant on every device.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"28px"},"blockGap":{"left":"12px"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
					<div class="wp-block-buttons" style="margin-top:28px">
						<!-- wp:button {"className":"is-style-fill"} -->
						<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Read More', 'aegis' ); ?></a></div>
						<!-- /wp:button -->

						<!-- wp:button {"className":"is-style-outline"} -->
						<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Buy Now', 'aegis' ); ?></a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		<!-- /wp:aegis/slide -->
	<!-- /wp:aegis/slider -->
</div>
<!-- /wp:group -->
