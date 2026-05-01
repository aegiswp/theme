<?php
/**
 * Title: Features Slider
 * Slug: features
 * Categories: slider
 * Keywords: slider, features, services, cards, carousel
 * Description: A features carousel displaying service cards with icons and descriptions.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Why Choose Us', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php echo esc_html__( 'Discover the features that set us apart from the competition.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:spacer {"height":"40px"} -->
	<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:aegis/slider {"perPage":3,"autoplay":true,"interval":5000,"pauseOnHover":true,"showArrows":true,"showDots":true,"loop":true,"breakpoints":true,"align":"wide","style":{"spacing":{"blockGap":"32px"}}} -->
	<div class="wp-block-aegis-slider alignwide">
		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"32px","bottom":"32px","left":"24px","right":"24px"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:12px;padding-top:32px;padding-right:24px;padding-bottom:32px;padding-left:24px">
				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"48px"}}} -->
				<p class="has-text-align-center" style="font-size:48px">🚀</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem"><?php echo esc_html__( 'Lightning Fast', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9375rem"}}} -->
				<p class="has-text-align-center" style="font-size:0.9375rem"><?php echo esc_html__( 'Optimized for speed with lazy loading, minimal JavaScript, and efficient CSS delivery.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"32px","bottom":"32px","left":"24px","right":"24px"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:12px;padding-top:32px;padding-right:24px;padding-bottom:32px;padding-left:24px">
				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"48px"}}} -->
				<p class="has-text-align-center" style="font-size:48px">♿</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem"><?php echo esc_html__( 'Fully Accessible', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9375rem"}}} -->
				<p class="has-text-align-center" style="font-size:0.9375rem"><?php echo esc_html__( 'WCAG 2.1 compliant with keyboard navigation, screen reader support, and reduced motion.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"32px","bottom":"32px","left":"24px","right":"24px"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:12px;padding-top:32px;padding-right:24px;padding-bottom:32px;padding-left:24px">
				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"48px"}}} -->
				<p class="has-text-align-center" style="font-size:48px">🔒</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem"><?php echo esc_html__( 'Secure by Design', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9375rem"}}} -->
				<p class="has-text-align-center" style="font-size:0.9375rem"><?php echo esc_html__( 'Built with security best practices including proper escaping and sanitization.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"32px","bottom":"32px","left":"24px","right":"24px"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:12px;padding-top:32px;padding-right:24px;padding-bottom:32px;padding-left:24px">
				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"48px"}}} -->
				<p class="has-text-align-center" style="font-size:48px">📱</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem"><?php echo esc_html__( 'Fully Responsive', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9375rem"}}} -->
				<p class="has-text-align-center" style="font-size:0.9375rem"><?php echo esc_html__( 'Looks perfect on every device with customizable breakpoints for desktop, tablet, and mobile.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide -->
		<div class="wp-block-aegis-slide">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"32px","bottom":"32px","left":"24px","right":"24px"}},"border":{"radius":"12px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-base-background-color has-background" style="border-radius:12px;padding-top:32px;padding-right:24px;padding-bottom:32px;padding-left:24px">
				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"48px"}}} -->
				<p class="has-text-align-center" style="font-size:48px">🎨</p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem"><?php echo esc_html__( 'Easy to Customize', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9375rem"}}} -->
				<p class="has-text-align-center" style="font-size:0.9375rem"><?php echo esc_html__( 'Intuitive block editor controls make customization a breeze without any coding required.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:aegis/slide -->
	</div>
	<!-- /wp:aegis/slider -->
</div>
<!-- /wp:group -->
