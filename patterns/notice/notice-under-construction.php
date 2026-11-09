<?php
/**
 * Title: Under Construction
 * Slug: notice-under-construction
 * Categories: notice
 * Keywords: notice, construction, maintenance, coming soon, placeholder, wip
 * Description: A centered under-construction or maintenance placeholder notice.
 * Viewport Width: 600
 */
?>

<!-- wp:group {"metadata":{"categories":["notice"],"patternName":"notice-under-construction","name":"Under Construction"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"backgroundColor":"warning-100","layout":{"type":"constrained","contentSize":"600px"}} -->
<div class="wp-block-group alignfull has-warning-100-background-color has-background" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)"><!-- wp:icon {"icon":"wordpress/tool","style":{"dimensions":{"width":"64px"}},"align":"center"} /-->
<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"32"} -->
	<h2 class="wp-block-heading has-text-align-center has-32-font-size" style="font-style:normal;font-weight:700"><?php echo esc_html__( 'Under Construction', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"16px"}},"textColor":"neutral-600"} -->
	<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter" style="font-size:16px"><?php echo esc_html__( 'We are currently working on this section. Please check back soon for updates. We appreciate your patience as we build something great.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
