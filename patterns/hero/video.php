<?php
/**
 * Title: Hero Video
 * Slug: video
 * Categories: hero
 * Keywords: hero, video, background, fullscreen, media
 * Description: A hero section with video background placeholder.
 * Viewport Width: 1280
 */
?>

<!-- wp:cover {"className":"is-style-dark","dimRatio":60,"overlayColor":"neutral-0","isUserOverlayColor":true,"minHeight":85,"minHeightUnit":"vh","isDark":true,"metadata":{"categories":["hero"],"patternName":"hero-video","name":"Hero Video"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull is-style-dark"
	style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl);min-height:85vh">
	<span aria-hidden="true"
		class="wp-block-cover__background has-neutral-0-background-color has-background-dim-60 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"textAlign":"center","level":1,"textColor":"neutral-950","fontSize":"60"} -->
			<h1 class="wp-block-heading has-text-align-center has-neutral-950-color has-text-color has-60-font-size"><?php echo esc_html__( 'Crafting Digital Experiences That Inspire', 'aegis' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-700","fontSize":"20"} -->
			<p class="has-text-align-center has-neutral-700-color has-text-color has-20-font-size"><?php echo esc_html__( 'We blend creativity with technology to deliver solutions that drive growth and leave lasting impressions.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Explore Our Work', 'aegis' ); ?></a></div>
<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-ghost"} -->
<div class="wp-block-button is-style-ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Contact Us', 'aegis' ); ?></a></div>
<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->