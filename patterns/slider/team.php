<?php
/**
 * Title: Team Carousel
 * Slug: team
 * Categories: slider
 * Keywords: slider, team, members, staff, carousel, people
 * Description: A team members carousel with profile photos and social links.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xll","bottom":"var:preset|spacing|xll"}}},"layout":{"type":"constrained"},"metadata":{"name":"Team Carousel"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xll);padding-bottom:var(--wp--preset--spacing--xll)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Meet Our Team', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
	<p class="has-text-align-center has-neutral-500-color has-text-color"><?php echo esc_html__( 'The talented people behind our success.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:spacer {"height":"40px"} -->
	<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:aegis/slider {"perPage":4,"autoplay":false,"showArrows":true,"showDots":false,"loop":true,"lightboxEnabled":false,"breakpoints":true,"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"metadata":{"name":"Team"}} -->
		<!-- wp:aegis/slide {"metadata":{"name":"John Smith"}} -->
			<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"},"blockGap":"var:preset|spacing|xs"},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface" style="border-radius:12px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--xs)">
				<!-- wp:image {"lightbox":{"enabled":false},"align":"center","width":"120px","height":"120px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border" style="border-radius:100%"><img alt="" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:120px;height:120px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.125rem"},"spacing":{"margin":{"top":"8px","bottom":"0"}}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="margin-top:8px;margin-bottom:0;font-size:1.125rem"><?php echo esc_html__( 'John Smith', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-top:0;font-size:0.875rem"><?php echo esc_html__( 'CEO & Founder', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"neutral-500","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"8px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
					<!-- wp:social-link {"url":"#","service":"x"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"Sarah Johnson"}} -->
			<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"},"blockGap":"var:preset|spacing|xs"},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface" style="border-radius:12px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--xs)">
				<!-- wp:image {"lightbox":{"enabled":false},"align":"center","width":"120px","height":"120px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border" style="border-radius:100%"><img alt="" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:120px;height:120px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.125rem"},"spacing":{"margin":{"top":"8px","bottom":"0"}}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="margin-top:8px;margin-bottom:0;font-size:1.125rem"><?php echo esc_html__( 'Sarah Johnson', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-top:0;font-size:0.875rem"><?php echo esc_html__( 'Creative Director', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"neutral-500","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"8px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
					<!-- wp:social-link {"url":"#","service":"dribbble"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"Michael Chen"}} -->
			<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"},"blockGap":"var:preset|spacing|xs"},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface" style="border-radius:12px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--xs)">
				<!-- wp:image {"lightbox":{"enabled":false},"align":"center","width":"120px","height":"120px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border" style="border-radius:100%"><img alt="" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:120px;height:120px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.125rem"},"spacing":{"margin":{"top":"8px","bottom":"0"}}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="margin-top:8px;margin-bottom:0;font-size:1.125rem"><?php echo esc_html__( 'Michael Chen', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-top:0;font-size:0.875rem"><?php echo esc_html__( 'Lead Developer', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"neutral-500","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"8px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"github"} /-->
					<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"Emily Rodriguez"}} -->
			<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"},"blockGap":"var:preset|spacing|xs"},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface" style="border-radius:12px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--xs)">
				<!-- wp:image {"lightbox":{"enabled":false},"align":"center","width":"120px","height":"120px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border" style="border-radius:100%"><img alt="" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:120px;height:120px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.125rem"},"spacing":{"margin":{"top":"8px","bottom":"0"}}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="margin-top:8px;margin-bottom:0;font-size:1.125rem"><?php echo esc_html__( 'Emily Rodriguez', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-top:0;font-size:0.875rem"><?php echo esc_html__( 'UX Designer', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"neutral-500","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"8px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
					<!-- wp:social-link {"url":"#","service":"behance"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"David Kim"}} -->
			<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"},"blockGap":"var:preset|spacing|xs"},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface" style="border-radius:12px;padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--xs)">
				<!-- wp:image {"lightbox":{"enabled":false},"align":"center","width":"120px","height":"120px","aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border" style="border-radius:100%"><img alt="" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:120px;height:120px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.125rem"},"spacing":{"margin":{"top":"8px","bottom":"0"}}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="margin-top:8px;margin-bottom:0;font-size:1.125rem"><?php echo esc_html__( 'David Kim', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-top:0;font-size:0.875rem"><?php echo esc_html__( 'Marketing Lead', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"neutral-500","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"8px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
					<!-- wp:social-link {"url":"#","service":"x"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:aegis/slide -->
<!-- /wp:aegis/slider -->
</div>
<!-- /wp:group -->
