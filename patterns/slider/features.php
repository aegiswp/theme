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
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xll","bottom":"var:preset|spacing|xll"}}},"layout":{"type":"constrained"},"metadata":{"name":"Features Slider"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xll);padding-bottom:var(--wp--preset--spacing--xll)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Why Choose Us', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php echo esc_html__( 'Discover the features that set us apart from the competition.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:spacer {"height":"40px"} -->
	<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:aegis/slider {"lightboxEnabled":false,"perPage":3,"autoplay":false,"interval":5000,"pauseOnHover":true,"showArrows":true,"showDots":true,"loop":true,"breakpoints":true,"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"metadata":{"name":"Features"}} -->
		<!-- wp:aegis/slide {"metadata":{"name":"Lightning Fast"}} -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"},"blockGap":"var:preset|spacing|xs"},"border":{"radius":"12px"}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface" style="border-radius:12px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--sm)">
				<!-- wp:icon {"icon":"core/arrow-up-right","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-features-fast\" data-icon=\"wordpress-arrow-up-right\" style=\"min-width:40px;height:40px\" fill=\"currentColor\"><title id=\"icon-features-fast\">Arrow Up Right Icon</title><path d=\"M10.1 6.1v1.4h5.2L6 16.8 7.2 18l9.3-9.3v5.2h1.4L18 6l-7.9.1z\"></path></svg>","style":{"dimensions":{"width":"40px"}},"align":"center"} /-->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem"><?php echo esc_html__( 'Lightning Fast', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9375rem"}}} -->
				<p class="has-text-align-center" style="font-size:0.9375rem"><?php echo esc_html__( 'Optimized for speed with lazy loading, minimal JavaScript, and efficient CSS delivery.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"Fully Accessible"}} -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"},"blockGap":"var:preset|spacing|xs"},"border":{"radius":"12px"}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface" style="border-radius:12px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--sm)">
				<!-- wp:icon {"icon":"remixicon/accessibility-line","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-features-a11y\" data-icon=\"remixicon-accessibility-line\" style=\"min-width:40px;height:40px\" fill=\"currentColor\"><title id=\"icon-features-a11y\">Accessibility Icon</title><path d=\"M4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12ZM12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM12 8.5C12.8284 8.5 13.5 7.82843 13.5 7C13.5 6.17157 12.8284 5.5 12 5.5C11.1716 5.5 10.5 6.17157 10.5 7C10.5 7.82843 11.1716 8.5 12 8.5ZM12 9.49988C10.4427 9.49988 8.82151 9.14306 7.37106 8.57129L6.62891 10.4285C7.70479 10.8579 8.8573 11.1468 9.99989 11.3301C9.99989 12.2004 10.0849 13.0939 9.68317 13.8974L8.10546 17.0528L9.89432 17.9472L11.4471 14.8416C11.5518 14.6322 11.7658 14.5 11.9999 14.5C12.234 14.5 12.448 14.6323 12.5527 14.8416L14.1055 17.9472L15.8943 17.0528L14.3166 13.8974C13.9149 13.0939 13.9999 12.2004 13.9999 11.3301C15.1409 11.1471 16.2818 10.8534 17.359 10.4332C17.3843 10.4233 16.6291 8.57118 16.6264 8.57225C15.1728 9.13901 13.5595 9.49988 12 9.49988Z\"></path></svg>","style":{"dimensions":{"width":"40px"}},"align":"center"} /-->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem"><?php echo esc_html__( 'Fully Accessible', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9375rem"}}} -->
				<p class="has-text-align-center" style="font-size:0.9375rem"><?php echo esc_html__( 'Accessibility-ready: keyboard navigation, screen reader support, and reduced motion.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"Secure by Design"}} -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"},"blockGap":"var:preset|spacing|xs"},"border":{"radius":"12px"}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface" style="border-radius:12px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--sm)">
				<!-- wp:icon {"icon":"core/shield","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-features-secure\" data-icon=\"wordpress-shield\" style=\"min-width:40px;height:40px\" fill=\"currentColor\"><title id=\"icon-features-secure\">Shield Icon</title><path fill-rule=\"evenodd\" d=\"m12 3.176 6.75 3.068v4.574c0 3.9-2.504 7.59-6.035 8.755a2.283 2.283 0 0 1-1.43 0c-3.53-1.164-6.035-4.856-6.035-8.755V6.244L12 3.176zM6.75 7.21v3.608c0 3.313 2.145 6.388 5.005 7.33a.775.775 0 0 0 .49 0c2.86-.942 5.005-4.017 5.005-7.33V7.21L12 4.824 6.75 7.21z\" clip-rule=\"evenodd\"></path></svg>","style":{"dimensions":{"width":"40px"}},"align":"center"} /-->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem"><?php echo esc_html__( 'Secure by Design', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9375rem"}}} -->
				<p class="has-text-align-center" style="font-size:0.9375rem"><?php echo esc_html__( 'Built with security best practices including proper escaping and sanitization.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"Fully Responsive"}} -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"},"blockGap":"var:preset|spacing|xs"},"border":{"radius":"12px"}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface" style="border-radius:12px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--sm)">
				<!-- wp:icon {"icon":"core/mobile","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-features-responsive\" data-icon=\"wordpress-mobile\" style=\"min-width:40px;height:40px\" fill=\"currentColor\"><title id=\"icon-features-responsive\">Mobile Icon</title><path d=\"M15 4H9c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h6c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm.5 14c0 .3-.2.5-.5.5H9c-.3 0-.5-.2-.5-.5V6c0-.3.2-.5.5-.5h6c.3 0 .5.2.5.5v12zm-4.5-.5h2V16h-2v1.5z\"></path></svg>","style":{"dimensions":{"width":"40px"}},"align":"center"} /-->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem"><?php echo esc_html__( 'Fully Responsive', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9375rem"}}} -->
				<p class="has-text-align-center" style="font-size:0.9375rem"><?php echo esc_html__( 'Looks perfect on every device with customizable breakpoints for desktop, tablet, and mobile.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:aegis/slide -->

		<!-- wp:aegis/slide {"metadata":{"name":"Easy to Customize"}} -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"},"blockGap":"var:preset|spacing|xs"},"border":{"radius":"12px"}},"className":"is-style-surface","layout":{"type":"constrained"}} -->
			<div class="wp-block-group is-style-surface" style="border-radius:12px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--sm)">
				<!-- wp:icon {"icon":"core/styles","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-features-customize\" data-icon=\"wordpress-styles\" style=\"min-width:40px;height:40px\" fill=\"currentColor\"><title id=\"icon-features-customize\">Styles Icon</title><path d=\"M12 4c-4.4 0-8 3.6-8 8v.1c0 4.1 3.2 7.5 7.2 7.9h.8c4.4 0 8-3.6 8-8s-3.6-8-8-8zm0 15V5c3.9 0 7 3.1 7 7s-3.1 7-7 7z\"></path></svg>","style":{"dimensions":{"width":"40px"}},"align":"center"} /-->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.25rem"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:1.25rem"><?php echo esc_html__( 'Easy to Customize', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9375rem"}}} -->
				<p class="has-text-align-center" style="font-size:0.9375rem"><?php echo esc_html__( 'Intuitive block editor controls make customization a breeze without any coding required.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:aegis/slide -->
<!-- /wp:aegis/slider -->
</div>
<!-- /wp:group -->
