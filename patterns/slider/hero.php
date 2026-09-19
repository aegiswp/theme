<?php
/**
 * Title: Hero Slider
 * Slug: hero
 * Categories: slider
 * Keywords: slider, hero, carousel, banner
 * Description: A full-width hero slider with call-to-action buttons.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

?>
<!-- wp:aegis/slider {"perPage":1,"autoplay":true,"interval":6000,"showArrows":true,"showDots":true,"loop":true,"height":"600px","align":"full"} -->
<div class="wp-block-aegis-slider alignfull">
	<!-- wp:aegis/slide -->
	<div class="wp-block-aegis-slide">
		<!-- wp:cover {"url":"https://images.unsplash.com/photo-1497366216548-37526070297c?w=1920","dimRatio":40,"minHeight":600,"contentPosition":"center center","isDark":true} -->
		<div class="wp-block-cover is-light" style="min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_attr__( 'Modern office workspace', 'aegis' ); ?>" src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=1920" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
			<!-- wp:heading {"textAlign":"center","level":1,"textColor":"neutral-0"} -->
			<h1 class="wp-block-heading has-text-align-center has-neutral-0-color has-text-color"><?php echo esc_html__( 'Transform Your Digital Presence', 'aegis' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-0"} -->
			<p class="has-text-align-center has-neutral-0-color has-text-color"><?php echo esc_html__( 'Create stunning websites with our powerful block-based design system.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-fill"} -->
				<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Get Started', 'aegis' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline","textColor":"neutral-0"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-neutral-0-color has-text-color wp-element-button"><?php echo esc_html__( 'Learn More', 'aegis' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div></div>
		<!-- /wp:cover -->
	</div>
	<!-- /wp:aegis/slide -->

	<!-- wp:aegis/slide -->
	<div class="wp-block-aegis-slide">
		<!-- wp:cover {"url":"https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1920","dimRatio":50,"minHeight":600,"contentPosition":"center center","isDark":true} -->
		<div class="wp-block-cover is-light" style="min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_attr__( 'Team collaboration', 'aegis' ); ?>" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1920" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
			<!-- wp:heading {"textAlign":"center","level":1,"textColor":"neutral-0"} -->
			<h1 class="wp-block-heading has-text-align-center has-neutral-0-color has-text-color"><?php echo esc_html__( 'Built for Teams', 'aegis' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-0"} -->
			<p class="has-text-align-center has-neutral-0-color has-text-color"><?php echo esc_html__( 'Collaborate seamlessly with your team using our intuitive tools.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Start Free Trial', 'aegis' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div></div>
		<!-- /wp:cover -->
	</div>
	<!-- /wp:aegis/slide -->

	<!-- wp:aegis/slide -->
	<div class="wp-block-aegis-slide">
		<!-- wp:cover {"url":"https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1920","dimRatio":45,"minHeight":600,"contentPosition":"center center","isDark":true} -->
		<div class="wp-block-cover is-light" style="min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-40 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_attr__( 'Analytics dashboard', 'aegis' ); ?>" src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1920" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
			<!-- wp:heading {"textAlign":"center","level":1,"textColor":"neutral-0"} -->
			<h1 class="wp-block-heading has-text-align-center has-neutral-0-color has-text-color"><?php echo esc_html__( 'Data-Driven Results', 'aegis' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-0"} -->
			<p class="has-text-align-center has-neutral-0-color has-text-color"><?php echo esc_html__( 'Make informed decisions with powerful analytics and insights.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'View Demo', 'aegis' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div></div>
		<!-- /wp:cover -->
	</div>
	<!-- /wp:aegis/slide -->
</div>
<!-- /wp:aegis/slider -->
