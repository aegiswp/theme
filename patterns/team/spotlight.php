<?php
/**
 * Title: Team Spotlight
 * Slug: spotlight
 * Categories: team
 * Keywords: team, spotlight, member, profile, featured, individual
 * Description: A single team member spotlight with large photo and detailed bio.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["team"],"patternName":"spotlight","name":"Team Spotlight"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
			<figure class="wp-block-image size-full has-custom-border" style="border-radius:12px"><img alt="" style="border-radius:12px;aspect-ratio:1;object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:paragraph {"className":"is-style-sub-heading","fontSize":"14"} -->
			<p class="is-style-sub-heading has-14-font-size"><?php echo esc_html__( 'Meet Our Founder', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"fontSize":"36"} -->
			<h2 class="wp-block-heading has-36-font-size"><?php echo esc_html__( 'Alex Rivera', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"primary-500","fontSize":"16","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
			<p class="has-primary-500-color has-text-color has-16-font-size" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'CEO & Co-Founder', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'Alex spent a decade leading product teams at some of the most recognized technology companies in the world before founding this company in 2019. With a background in both engineering and design, Alex brings a rare perspective that bridges the gap between technical possibility and human need.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'When not building the future of digital tools, you can find Alex mentoring early-stage founders, contributing to open-source projects, or hiking trails across the Pacific Northwest.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:social-links {"iconColor":"neutral-400","size":"has-small-icon-size","className":"has-icon-color is-style-logos-only","style":{"spacing":{"blockGap":{"left":"20px"},"margin":{"top":"var:preset|spacing|md"}}}} -->
			<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--md)">
				<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
				<!-- wp:social-link {"url":"#","service":"x"} /-->
				<!-- wp:social-link {"url":"#","service":"github"} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
