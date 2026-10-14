<?php
/**
 * Title: Hero Minimal
 * Slug: minimal
 * Categories: hero
 * Keywords: hero, minimal, heading, simple
 * Description: A minimal hero with subheading, title, and short intro text.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["hero"],"patternName":"hero-minimal","name":"Hero Minimal"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:group {"layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
<p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Welcome', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"52"} -->
<h1 class="wp-block-heading has-text-align-center has-52-font-size"><?php echo esc_html__( 'Build something remarkable', 'aegis' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"18"} -->
<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-18-font-size aligncenter"><?php echo esc_html__( 'A clean starting point for pages that need a simple hero without extra visual weight.', 'aegis' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
