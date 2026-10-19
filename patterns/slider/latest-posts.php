<?php
/**
 * Title: Latest Posts Carousel
 * Slug: latest-posts
 * Categories: slider, blog
 * Keywords: slider, carousel, posts, blog, latest, cards, query
 * Description: A card carousel of the latest posts with featured image, category, date, title, and excerpt.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xll","bottom":"var:preset|spacing|xll"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained"},"metadata":{"name":"Latest Posts Carousel"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xll);padding-bottom:var(--wp--preset--spacing--xll)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Latest Posts', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
	<p class="has-text-align-center has-neutral-500-color has-text-color"><?php echo esc_html__( 'Fresh ideas, updates, and stories from our blog.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:spacer {"height":"40px"} -->
	<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:query {"namespace":"aegis/carousel","queryId":81,"query":{"perPage":7,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"aegisProCarouselEnabled":true,"aegisProCarouselPerView":3,"aegisProCarouselPerViewTablet":2,"aegisProCarouselPerViewMobile":1,"aegisProCarouselGap":"1.5rem","aegisProCarouselNavigation":true,"aegisProCarouselNavStyle":"chevrons","aegisProCarouselNavPosition":"outside","aegisProCarouselPagination":true,"aegisProCarouselPaginationStyle":"dots","aegisProCarouselLoop":true,"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
			<!-- wp:group {"className":"aegis-carousel-item is-style-surface","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"4px"}},"layout":{"type":"constrained"},"backgroundColor":"neutral-50"} -->
			<div class="wp-block-group aegis-carousel-item is-style-surface has-neutral-50-background-color has-background" style="border-radius:4px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"spacing":{"margin":{"bottom":"0"}}}} /-->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"},"blockGap":"10px"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xs);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--xs)">
					<!-- wp:group {"style":{"spacing":{"blockGap":"6px","margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","orientation":"horizontal"},"textColor":"neutral-500"} -->
					<div class="wp-block-group has-neutral-500-color has-text-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none","fontSize":"0.8125rem","lineHeight":"1.4"},"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|neutral-500"}}}}} /-->

						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontSize":"0.8125rem","lineHeight":"1.4"}},"textColor":"neutral-500"} -->
						<p class="has-neutral-500-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:0.8125rem;line-height:1.4">|</p>
						<!-- /wp:paragraph -->

						<!-- wp:post-date {"format":"F j, Y","style":{"typography":{"fontSize":"0.8125rem","lineHeight":"1.4"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-500"} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"700","lineHeight":"1.3"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

					<!-- wp:post-excerpt {"moreText":"","excerptLength":18,"showMoreOnNewLine":false,"style":{"typography":{"fontSize":"0.9375rem","lineHeight":"1.55"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-600"} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
			<p class="has-text-align-center has-neutral-500-color has-text-color"><?php echo esc_html__( 'No posts found.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
