<?php
/**
 * Title: Portfolio Carousel
 * Slug: portfolio
 * Categories: slider
 * Keywords: slider, portfolio, gallery, carousel, projects, showcase
 * Description: A multi-slide portfolio carousel showcasing projects with hover overlays.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"constrained"},"metadata":{"name":"Portfolio Carousel"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Our Latest Work', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-500"} -->
	<p class="has-text-align-center has-neutral-500-color has-text-color"><?php echo esc_html__( 'Explore our portfolio of successful projects and creative solutions.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:spacer {"height":"40px"} -->
	<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:aegis/slider {"lightboxEnabled":false,"perPage":3,"autoplay":false,"showArrows":true,"showDots":false,"loop":true,"drag":true,"breakpoints":true,"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"metadata":{"name":"Portfolio"}} -->
		<!-- wp:aegis/slide {"metadata":{"name":"E-commerce Platform"}} -->
			<!-- wp:cover {"dimRatio":50,"overlayColor":"neutral-0","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","contentPosition":"bottom left","className":"is-style-dark","style":{"border":{"radius":"16px"}}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-dark" style="border-radius:16px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-neutral-0-background-color has-background-dim"></span><div class="wp-block-cover__inner-container">
				<!-- wp:group {"style":{"spacing":{"blockGap":"6px","padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem","fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase"}},"textColor":"neutral-950"} -->
					<p class="has-neutral-950-color has-text-color" style="font-size:0.75rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html__( 'Web Development', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"700"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-950"} -->
					<h3 class="wp-block-heading has-neutral-950-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:1.25rem;font-weight:700"><?php echo esc_html__( 'E-commerce Platform', 'aegis' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->
			</div></div>
			<!-- /wp:cover -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"Brand Identity"}} -->
			<!-- wp:cover {"dimRatio":50,"overlayColor":"neutral-0","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","contentPosition":"bottom left","className":"is-style-dark","style":{"border":{"radius":"16px"}}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-dark" style="border-radius:16px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-neutral-0-background-color has-background-dim"></span><div class="wp-block-cover__inner-container">
				<!-- wp:group {"style":{"spacing":{"blockGap":"6px","padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem","fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase"}},"textColor":"neutral-950"} -->
					<p class="has-neutral-950-color has-text-color" style="font-size:0.75rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html__( 'Branding', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"700"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-950"} -->
					<h3 class="wp-block-heading has-neutral-950-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:1.25rem;font-weight:700"><?php echo esc_html__( 'Brand Identity', 'aegis' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->
			</div></div>
			<!-- /wp:cover -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"Wellness Tracker"}} -->
			<!-- wp:cover {"dimRatio":50,"overlayColor":"neutral-0","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","contentPosition":"bottom left","className":"is-style-dark","style":{"border":{"radius":"16px"}}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-dark" style="border-radius:16px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-neutral-0-background-color has-background-dim"></span><div class="wp-block-cover__inner-container">
				<!-- wp:group {"style":{"spacing":{"blockGap":"6px","padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem","fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase"}},"textColor":"neutral-950"} -->
					<p class="has-neutral-950-color has-text-color" style="font-size:0.75rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html__( 'Mobile App', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"700"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-950"} -->
					<h3 class="wp-block-heading has-neutral-950-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:1.25rem;font-weight:700"><?php echo esc_html__( 'Wellness Tracker', 'aegis' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->
			</div></div>
			<!-- /wp:cover -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"Product Dashboard"}} -->
			<!-- wp:cover {"dimRatio":50,"overlayColor":"neutral-0","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","contentPosition":"bottom left","className":"is-style-dark","style":{"border":{"radius":"16px"}}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-dark" style="border-radius:16px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-neutral-0-background-color has-background-dim"></span><div class="wp-block-cover__inner-container">
				<!-- wp:group {"style":{"spacing":{"blockGap":"6px","padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem","fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase"}},"textColor":"neutral-950"} -->
					<p class="has-neutral-950-color has-text-color" style="font-size:0.75rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html__( 'UI/UX Design', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"700"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-950"} -->
					<h3 class="wp-block-heading has-neutral-950-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:1.25rem;font-weight:700"><?php echo esc_html__( 'Product Dashboard', 'aegis' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->
			</div></div>
			<!-- /wp:cover -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"Campaign Launch"}} -->
			<!-- wp:cover {"dimRatio":50,"overlayColor":"neutral-0","isUserOverlayColor":true,"minHeight":420,"minHeightUnit":"px","contentPosition":"bottom left","className":"is-style-dark","style":{"border":{"radius":"16px"}}} -->
			<div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-dark" style="border-radius:16px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-neutral-0-background-color has-background-dim"></span><div class="wp-block-cover__inner-container">
				<!-- wp:group {"style":{"spacing":{"blockGap":"6px","padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem","fontWeight":"600","letterSpacing":"0.08em","textTransform":"uppercase"}},"textColor":"neutral-950"} -->
					<p class="has-neutral-950-color has-text-color" style="font-size:0.75rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html__( 'Digital Marketing', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"700"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"neutral-950"} -->
					<h3 class="wp-block-heading has-neutral-950-color has-text-color" style="margin-top:0;margin-bottom:0;font-size:1.25rem;font-weight:700"><?php echo esc_html__( 'Campaign Launch', 'aegis' ); ?></h3>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:group -->
			</div></div>
			<!-- /wp:cover -->
		<!-- /wp:aegis/slide -->
<!-- /wp:aegis/slider -->
</div>
<!-- /wp:group -->
