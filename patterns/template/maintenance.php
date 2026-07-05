<?php
/**
 * Title: Maintenance
 * Slug: maintenance
 * Categories: template
 * Template Types: maintenance
 * Inserter: false
 */
?>

<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","metadata":{"name":"Main"},"align":"full","className":"site-main","layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group alignfull site-main">
	<!-- wp:cover {"dimRatio":90,"overlayColor":"neutral-950","isUserOverlayColor":true,"minHeight":80,"minHeightUnit":"vh","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxl","bottom":"var:preset|spacing|xxl"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--xxl);padding-bottom:var(--wp--preset--spacing--xxl);min-height:80vh">
		<span aria-hidden="true" class="wp-block-cover__background has-neutral-950-background-color has-background-dim-90 has-background-dim"></span>
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"layout":{"type":"constrained","contentSize":"640px"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","textColor":"warning-300"} -->
				<p class="aligncenter has-text-align-center is-style-sub-heading has-warning-300-color has-text-color aligncenter"><?php echo esc_html__( 'Scheduled Maintenance', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"center","level":1,"textColor":"neutral-0","fontSize":"52"} -->
				<h1 class="wp-block-heading has-text-align-center has-neutral-0-color has-text-color has-52-font-size"><?php echo esc_html__( 'We will be back shortly', 'aegis' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-200","fontSize":"18"} -->
				<p class="aligncenter has-text-align-center has-neutral-200-color has-text-color has-18-font-size aligncenter"><?php echo esc_html__( 'Our site is temporarily unavailable while we perform maintenance. Thank you for your patience.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--md)">
					<!-- wp:loginout {"displayLoginAsForm":false,"fontSize":"16"} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->
