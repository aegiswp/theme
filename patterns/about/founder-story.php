<?php
/**
 * Title: About Founder Story
 * Slug: founder-story
 * Categories: about
 * Keywords: about, founder, story, biography, ceo, origin
 * Description: A founder story section with image and narrative text.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["about"],"patternName":"founder-story","name":"About Founder Story"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
			<!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
			<figure class="wp-block-image size-full has-custom-border" style="border-radius:12px"><img alt="" style="border-radius:12px;aspect-ratio:3/4;object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
			<!-- wp:paragraph {"className":"is-style-sub-heading"} -->
			<p class="is-style-sub-heading"><?php echo esc_html__( 'Our Story', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"fontSize":"40"} -->
			<h2 class="wp-block-heading has-40-font-size"><?php echo esc_html__( 'Built from Frustration, Fueled by Curiosity', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'In 2018, after years of watching talented teams struggle with tools that got in the way more than they helped, our founder decided enough was enough. The first prototype was built in a weekend, driven by a simple question: what if the tool just worked?', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"textColor":"neutral-600"} -->
			<p class="has-neutral-600-color has-text-color"><?php echo esc_html__( 'That weekend project became a company. What started as a one-person mission to simplify the complex has grown into a global team of designers, engineers, and dreamers who share one belief: great software should feel invisible.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
				<!-- wp:paragraph {"className":"is-style-heading","fontSize":"18"} -->
				<p class="is-style-heading has-18-font-size"><?php echo esc_html__( 'Sarah Mitchell', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"textColor":"neutral-500","fontSize":"14"} -->
				<p class="has-neutral-500-color has-text-color has-14-font-size"><?php echo esc_html__( 'Founder & CEO', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
