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
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Our Latest Work', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php echo esc_html__( 'Explore our portfolio of successful projects and creative solutions.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:spacer {"height":"40px"} -->
	<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:aegis/slider {"perPage":3,"autoplay":false,"showArrows":true,"showDots":false,"loop":true,"drag":true,"breakpoints":true,"height":"350px","align":"wide","style":{"spacing":{"blockGap":"24px"}}} -->
	<div class="wp-block-aegis-slider alignwide">
		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:cover {"url":"https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800","dimRatio":60,"minHeight":350,"contentPosition":"bottom left","isDark":true} -->
			<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left" style="min-height:350px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_attr__( 'E-commerce Platform', 'aegis' ); ?>" src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
				<!-- wp:group {"style":{"spacing":{"padding":{"left":"24px","right":"24px","bottom":"24px"}}}} -->
				<div class="wp-block-group" style="padding-right:24px;padding-bottom:24px;padding-left:24px">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.25rem"}},"textColor":"neutral-0"} -->
					<h3 class="wp-block-heading has-neutral-0-color has-text-color" style="font-size:1.25rem"><?php echo esc_html__( 'E-commerce Platform', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"neutral-300"} -->
					<p class="has-neutral-300-color has-text-color" style="font-size:0.875rem"><?php echo esc_html__( 'Web Development', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div></div>
			<!-- /wp:cover -->
		</div>
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:cover {"url":"https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800","dimRatio":60,"minHeight":350,"contentPosition":"bottom left","isDark":true} -->
			<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left" style="min-height:350px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_attr__( 'Brand Identity Design', 'aegis' ); ?>" src="https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
				<!-- wp:group {"style":{"spacing":{"padding":{"left":"24px","right":"24px","bottom":"24px"}}}} -->
				<div class="wp-block-group" style="padding-right:24px;padding-bottom:24px;padding-left:24px">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.25rem"}},"textColor":"neutral-0"} -->
					<h3 class="wp-block-heading has-neutral-0-color has-text-color" style="font-size:1.25rem"><?php echo esc_html__( 'Brand Identity', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"neutral-300"} -->
					<p class="has-neutral-300-color has-text-color" style="font-size:0.875rem"><?php echo esc_html__( 'Branding & Design', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div></div>
			<!-- /wp:cover -->
		</div>
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:cover {"url":"https://images.unsplash.com/photo-1551650975-87deedd944c3?w=800","dimRatio":60,"minHeight":350,"contentPosition":"bottom left","isDark":true} -->
			<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left" style="min-height:350px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_attr__( 'Mobile App Design', 'aegis' ); ?>" src="https://images.unsplash.com/photo-1551650975-87deedd944c3?w=800" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
				<!-- wp:group {"style":{"spacing":{"padding":{"left":"24px","right":"24px","bottom":"24px"}}}} -->
				<div class="wp-block-group" style="padding-right:24px;padding-bottom:24px;padding-left:24px">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.25rem"}},"textColor":"neutral-0"} -->
					<h3 class="wp-block-heading has-neutral-0-color has-text-color" style="font-size:1.25rem"><?php echo esc_html__( 'Mobile App', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"neutral-300"} -->
					<p class="has-neutral-300-color has-text-color" style="font-size:0.875rem"><?php echo esc_html__( 'UI/UX Design', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div></div>
			<!-- /wp:cover -->
		</div>
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:cover {"url":"https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800","dimRatio":60,"minHeight":350,"contentPosition":"bottom left","isDark":true} -->
			<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left" style="min-height:350px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_attr__( 'Marketing Campaign', 'aegis' ); ?>" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
				<!-- wp:group {"style":{"spacing":{"padding":{"left":"24px","right":"24px","bottom":"24px"}}}} -->
				<div class="wp-block-group" style="padding-right:24px;padding-bottom:24px;padding-left:24px">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.25rem"}},"textColor":"neutral-0"} -->
					<h3 class="wp-block-heading has-neutral-0-color has-text-color" style="font-size:1.25rem"><?php echo esc_html__( 'Marketing Campaign', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"neutral-300"} -->
					<p class="has-neutral-300-color has-text-color" style="font-size:0.875rem"><?php echo esc_html__( 'Digital Marketing', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div></div>
			<!-- /wp:cover -->
		</div>
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:cover {"url":"https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800","dimRatio":60,"minHeight":350,"contentPosition":"bottom left","isDark":true} -->
			<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-left" style="min-height:350px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_attr__( 'Corporate Website', 'aegis' ); ?>" src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
				<!-- wp:group {"style":{"spacing":{"padding":{"left":"24px","right":"24px","bottom":"24px"}}}} -->
				<div class="wp-block-group" style="padding-right:24px;padding-bottom:24px;padding-left:24px">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.25rem"}},"textColor":"neutral-0"} -->
					<h3 class="wp-block-heading has-neutral-0-color has-text-color" style="font-size:1.25rem"><?php echo esc_html__( 'Corporate Website', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"textColor":"neutral-300"} -->
					<p class="has-neutral-300-color has-text-color" style="font-size:0.875rem"><?php echo esc_html__( 'Web Development', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div></div>
			<!-- /wp:cover -->
		</div>
		<!-- /wp:aegis/slide -->
	</div>
	<!-- /wp:aegis/slider -->
</div>
<!-- /wp:group -->
