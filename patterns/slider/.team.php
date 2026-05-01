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
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center","textColor":"neutral-0"} -->
	<h2 class="wp-block-heading has-text-align-center has-neutral-0-color has-text-color"><?php echo esc_html__( 'Meet Our Team', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-300"} -->
	<p class="has-text-align-center has-neutral-300-color has-text-color"><?php echo esc_html__( 'The talented people behind our success.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:spacer {"height":"40px"} -->
	<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:aegis/slider {"perPage":4,"autoplay":false,"showArrows":true,"showDots":false,"loop":true,"breakpoints":true,"align":"wide","style":{"spacing":{"blockGap":"24px"}}} -->
	<div class="wp-block-aegis-slider alignwide">
		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"16px","right":"16px"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:12px;padding-top:24px;padding-right:16px;padding-bottom:24px;padding-left:16px">
				<!-- wp:image {"align":"center","width":"120px","height":"120px","sizeSlug":"thumbnail","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border"><img src="https://i.pravatar.cc/200?img=11" alt="<?php echo esc_attr__( 'John Smith', 'aegis' ); ?>" style="border-radius:100%;width:120px;height:120px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.125rem"},"spacing":{"margin":{"top":"16px","bottom":"4px"}}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="margin-top:16px;margin-bottom:4px;font-size:1.125rem"><?php echo esc_html__( 'John Smith', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-top:0;font-size:0.875rem"><?php echo esc_html__( 'CEO & Founder', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"contrast","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"8px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
					<!-- wp:social-link {"url":"#","service":"x"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"16px","right":"16px"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:12px;padding-top:24px;padding-right:16px;padding-bottom:24px;padding-left:16px">
				<!-- wp:image {"align":"center","width":"120px","height":"120px","sizeSlug":"thumbnail","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border"><img src="https://i.pravatar.cc/200?img=5" alt="<?php echo esc_attr__( 'Sarah Johnson', 'aegis' ); ?>" style="border-radius:100%;width:120px;height:120px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.125rem"},"spacing":{"margin":{"top":"16px","bottom":"4px"}}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="margin-top:16px;margin-bottom:4px;font-size:1.125rem"><?php echo esc_html__( 'Sarah Johnson', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-top:0;font-size:0.875rem"><?php echo esc_html__( 'Creative Director', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"contrast","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"8px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
					<!-- wp:social-link {"url":"#","service":"dribbble"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"16px","right":"16px"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:12px;padding-top:24px;padding-right:16px;padding-bottom:24px;padding-left:16px">
				<!-- wp:image {"align":"center","width":"120px","height":"120px","sizeSlug":"thumbnail","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border"><img src="https://i.pravatar.cc/200?img=12" alt="<?php echo esc_attr__( 'Michael Chen', 'aegis' ); ?>" style="border-radius:100%;width:120px;height:120px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.125rem"},"spacing":{"margin":{"top":"16px","bottom":"4px"}}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="margin-top:16px;margin-bottom:4px;font-size:1.125rem"><?php echo esc_html__( 'Michael Chen', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-top:0;font-size:0.875rem"><?php echo esc_html__( 'Lead Developer', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"contrast","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"8px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"github"} /-->
					<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"16px","right":"16px"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:12px;padding-top:24px;padding-right:16px;padding-bottom:24px;padding-left:16px">
				<!-- wp:image {"align":"center","width":"120px","height":"120px","sizeSlug":"thumbnail","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border"><img src="https://i.pravatar.cc/200?img=9" alt="<?php echo esc_attr__( 'Emily Rodriguez', 'aegis' ); ?>" style="border-radius:100%;width:120px;height:120px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.125rem"},"spacing":{"margin":{"top":"16px","bottom":"4px"}}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="margin-top:16px;margin-bottom:4px;font-size:1.125rem"><?php echo esc_html__( 'Emily Rodriguez', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-top:0;font-size:0.875rem"><?php echo esc_html__( 'UX Designer', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"contrast","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"8px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
					<!-- wp:social-link {"url":"#","service":"behance"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"16px","right":"16px"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:12px;padding-top:24px;padding-right:16px;padding-bottom:24px;padding-left:16px">
				<!-- wp:image {"align":"center","width":"120px","height":"120px","sizeSlug":"thumbnail","style":{"border":{"radius":"100%"}}} -->
				<figure class="wp-block-image aligncenter size-thumbnail is-resized has-custom-border"><img src="https://i.pravatar.cc/200?img=15" alt="<?php echo esc_attr__( 'David Kim', 'aegis' ); ?>" style="border-radius:100%;width:120px;height:120px"/></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.125rem"},"spacing":{"margin":{"top":"16px","bottom":"4px"}}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="margin-top:16px;margin-bottom:4px;font-size:1.125rem"><?php echo esc_html__( 'David Kim', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"spacing":{"margin":{"top":"0"}}},"textColor":"neutral-500"} -->
				<p class="has-text-align-center has-neutral-500-color has-text-color" style="margin-top:0;font-size:0.875rem"><?php echo esc_html__( 'Marketing Lead', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:social-links {"iconColor":"contrast","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"8px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
					<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
					<!-- wp:social-link {"url":"#","service":"x"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:aegis/slide -->
	</div>
	<!-- /wp:aegis/slider -->
</div>
<!-- /wp:group -->
