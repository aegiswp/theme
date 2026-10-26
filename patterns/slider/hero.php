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
<!-- wp:aegis/slider {"lightboxEnabled":false,"perPage":1,"autoplay":false,"interval":6000,"showArrows":true,"showDots":true,"loop":true,"align":"full","metadata":{"name":"Hero"}} -->
	<!-- wp:aegis/slide {"metadata":{"name":"Transform Your Digital Presence"}} -->
		<!-- wp:cover {"dimRatio":40,"overlayColor":"neutral-0","isUserOverlayColor":true,"minHeight":600,"minHeightUnit":"px","contentPosition":"center center","className":"is-style-dark"} -->
		<div class="wp-block-cover is-style-dark" style="min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-neutral-0-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container">
			<!-- wp:heading {"textAlign":"center","level":2,"textColor":"neutral-950"} -->
			<h2 class="wp-block-heading has-text-align-center has-neutral-950-color has-text-color"><?php echo esc_html__( 'Transform Your Digital Presence', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-950"} -->
			<p class="has-text-align-center has-neutral-950-color has-text-color"><?php echo esc_html__( 'Create stunning websites with our powerful block-based design system.', 'aegis' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-fill"} -->
				<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Get Started', 'aegis' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"textColor":"neutral-950","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|neutral-950"}}}}} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-neutral-950-color has-text-color has-link-color wp-element-button"><?php echo esc_html__( 'Learn More', 'aegis' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div></div>
		<!-- /wp:cover -->
	<!-- /wp:aegis/slide -->

	<!-- wp:aegis/slide {"metadata":{"name":"Built for Teams"}} -->
		<!-- wp:cover {"dimRatio":50,"overlayColor":"neutral-0","isUserOverlayColor":true,"minHeight":600,"minHeightUnit":"px","contentPosition":"center center","className":"is-style-dark"} -->
		<div class="wp-block-cover is-style-dark" style="min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-neutral-0-background-color has-background-dim"></span><div class="wp-block-cover__inner-container">
			<!-- wp:heading {"textAlign":"center","level":2,"textColor":"neutral-950"} -->
			<h2 class="wp-block-heading has-text-align-center has-neutral-950-color has-text-color"><?php echo esc_html__( 'Built for Teams', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-950"} -->
			<p class="has-text-align-center has-neutral-950-color has-text-color"><?php echo esc_html__( 'Collaborate seamlessly with your team using our intuitive tools.', 'aegis' ); ?></p>
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
	<!-- /wp:aegis/slide -->

	<!-- wp:aegis/slide {"metadata":{"name":"Data-Driven Results"}} -->
		<!-- wp:cover {"dimRatio":40,"overlayColor":"neutral-0","isUserOverlayColor":true,"minHeight":600,"minHeightUnit":"px","contentPosition":"center center","className":"is-style-dark"} -->
		<div class="wp-block-cover is-style-dark" style="min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-neutral-0-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container">
			<!-- wp:heading {"textAlign":"center","level":2,"textColor":"neutral-950"} -->
			<h2 class="wp-block-heading has-text-align-center has-neutral-950-color has-text-color"><?php echo esc_html__( 'Data-Driven Results', 'aegis' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"neutral-950"} -->
			<p class="has-text-align-center has-neutral-950-color has-text-color"><?php echo esc_html__( 'Make informed decisions with powerful analytics and insights.', 'aegis' ); ?></p>
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
	<!-- /wp:aegis/slide -->
<!-- /wp:aegis/slider -->
