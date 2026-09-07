<?php
/**
 * Title: Feature Icon Boxes
 * Slug: icon-boxes
 * Categories: feature
 * Keywords: feature, icons, boxes, grid, services
 * Description: A grid of icon boxes showcasing features or services.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"lock":{"move":false,"remove":false},"metadata":{"name":"Feature Icon Boxes","categories":["feature"],"patternName":"icon-boxes"},"align":"full","className":"is-style-default","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-default" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-reverse-on-mobile is-reverse-mobile","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"},"blockGap":{"top":"var:preset|spacing|lg","left":"var:preset|spacing|lg"}},"u002du002dflex-direction":"column-reverse","u002du002dflex-direction-desktop":"row"}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center is-reverse-on-mobile is-reverse-mobile" style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
		<!-- wp:column {"verticalAlignment":"center","width":"","style":{"order":{"mobile":"2"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|sm"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
			<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--sm)">
				<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
				<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
					<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
					<p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Features', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"textAlign":"center","style":{"display":{"all":"","mobile":""}},"fontSize":"48"} -->
					<h2 class="wp-block-heading has-text-align-center has-48-font-size"><?php echo esc_html__( 'Editor Evolved', 'aegis' ); ?></h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
					<p class="aligncenter has-text-align-center has-18-font-size aligncenter"><?php echo esc_html__( 'Enhance the native experience with lightweight blocks engineered to integrate seamlessly without bloating the core.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide">
				<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"blockGap":"0px"}}} -->
				<div class="wp-block-column is-style-surface">
					<!-- wp:group {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xxs"},"margin":{"bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xs)">
						<!-- wp:icon {"icon":"core/menu","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03b0dac0\" data-icon=\"wordpress-menu\" style=\"min-width:20px;height:20px\" fill=\"currentColor\"><title id=\"icon-6a2cc03b0dac0\">Menu Icon</title><path d=\"M5 5v1.5h14V5H5zm0 7.8h14v-1.5H5v1.5zM5 19h14v-1.5H5V19z\"></path></svg>","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"align":"left","className":"is-style-sub-heading"} -->
						<p class="alignleft has-text-align-left is-style-sub-heading alignleft"><?php echo esc_html__( 'Navigation', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:heading {"textAlign":"left","level":3,"style":{"display":{"all":"","mobile":""},"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
					<h3 class="wp-block-heading has-text-align-left" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'Visual Nav', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}}}} -->
					<p style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Construct rich dropdowns with images and widgets directly in the canvas, requiring zero code.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"blockGap":"0px"}}} -->
				<div class="wp-block-column is-style-surface">
					<!-- wp:group {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xxs"},"margin":{"bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xs)">
						<!-- wp:icon {"icon":"wordpress/typography","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03b128e0\" data-icon=\"wordpress-typography\" style=\"min-width:20px;height:20px\" fill=\"currentColor\"><title id=\"icon-6a2cc03b128e0\">Typography Icon</title><path d=\"M6.9 7 3 17.8h1.7l1-2.8h4.1l1 2.8h1.7L8.6 7H6.9zm-.7 6.6 1.5-4.3 1.5 4.3h-3zM21.6 17c-.1.1-.2.2-.3.2-.1.1-.2.1-.4.1s-.3-.1-.4-.2c-.1-.1-.1-.3-.1-.6V12c0-.5 0-1-.1-1.4-.1-.4-.3-.7-.5-1-.2-.2-.5-.4-.9-.5-.4 0-.8-.1-1.3-.1s-1 .1-1.4.2c-.4.1-.7.3-1 .4-.2.2-.4.3-.6.5-.1.2-.2.4-.2.7 0 .3.1.5.2.8.2.2.4.3.8.3.3 0 .6-.1.8-.3.2-.2.3-.4.3-.7 0-.3-.1-.5-.2-.7-.2-.2-.4-.3-.6-.4.2-.2.4-.3.7-.4.3-.1.6-.1.8-.1.3 0 .6 0 .8.1.2.1.4.3.5.5.1.2.2.5.2.9v1.1c0 .3-.1.5-.3.6-.2.2-.5.3-.9.4-.3.1-.7.3-1.1.4-.4.1-.8.3-1.1.5-.3.2-.6.4-.8.7-.2.3-.3.7-.3 1.2 0 .6.2 1.1.5 1.4.3.4.9.5 1.6.5.5 0 1-.1 1.4-.3.4-.2.8-.6 1.1-1.1 0 .4.1.7.3 1 .2.3.6.4 1.2.4.4 0 .7-.1.9-.2.2-.1.5-.3.7-.4h-.3zm-3-.9c-.2.4-.5.7-.8.8-.3.2-.6.2-.8.2-.4 0-.6-.1-.9-.3-.2-.2-.3-.6-.3-1.1 0-.5.1-.9.3-1.2s.5-.5.8-.7c.3-.2.7-.3 1-.5.3-.1.6-.3.7-.6v3.4z\"></path></svg>","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"align":"left","className":"is-style-sub-heading"} -->
						<p class="alignleft has-text-align-left is-style-sub-heading alignleft"><?php echo esc_html__( 'Typography', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:heading {"textAlign":"left","level":3,"style":{"display":{"all":"","mobile":""},"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
					<h3 class="wp-block-heading has-text-align-left" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'Fluid Text', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}}}} -->
					<p style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Break linear constraints by wrapping typography along organic paths for high-impact editorial design.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"blockGap":"0px"}}} -->
				<div class="wp-block-column is-style-surface">
					<!-- wp:group {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xxs"},"margin":{"bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xs)">
						<!-- wp:icon {"icon":"wordpress/move-to","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03b1b580\" data-icon=\"wordpress-move-to\" style=\"min-width:20px;height:20px\" fill=\"currentColor\"><title id=\"icon-6a2cc03b1b580\">Move To Icon</title><path d=\"M19.75 9c0-1.257-.565-2.197-1.39-2.858-.797-.64-1.827-1.017-2.815-1.247-1.802-.42-3.703-.403-4.383-.396L11 4.5V6l.177-.001c.696-.006 2.416-.02 4.028.356.887.207 1.67.518 2.216.957.52.416.829.945.829 1.688 0 .592-.167.966-.407 1.23-.255.281-.656.508-1.236.674-1.19.34-2.82.346-4.607.346h-.077c-1.692 0-3.527 0-4.942.404-.732.209-1.424.545-1.935 1.108-.526.579-.796 1.33-.796 2.238 0 1.257.565 2.197 1.39 2.858.797.64 1.827 1.017 2.815 1.247 1.802.42 3.703.403 4.383.396L13 19.5h.714V22L18 18.5 13.714 15v3H13l-.177.001c-.696.006-2.416.02-4.028-.356-.887-.207-1.67-.518-2.216-.957-.52-.416-.829-.945-.829-1.688 0-.592.167-.966.407-1.23.255-.281.656-.508 1.237-.674 1.189-.34 2.819-.346 4.606-.346h.077c1.692 0 3.527 0 4.941-.404.732-.209 1.425-.545 1.936-1.108.526-.579.796-1.33.796-2.238z\"></path></svg>","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"align":"left","className":"is-style-sub-heading"} -->
						<p class="alignleft has-text-align-left is-style-sub-heading alignleft"><?php echo esc_html__( 'Kinetics', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:heading {"textAlign":"left","level":3,"style":{"display":{"all":"","mobile":""},"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
					<h3 class="wp-block-heading has-text-align-left" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'Motion Loop', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}}}} -->
					<p style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Inject kinetic energy with smooth scrolling marquees of text or images that drive user engagement.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->

			<!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide">
				<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"blockGap":"0px"}}} -->
				<div class="wp-block-column is-style-surface">
					<!-- wp:group {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xxs"},"margin":{"bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xs)">
						<!-- wp:icon {"icon":"core/block-table","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03b1d4c0\" data-icon=\"wordpress-block-table\" style=\"min-width:20px;height:20px\" fill=\"currentColor\"><title id=\"icon-6a2cc03b1d4c0\">Block Table Icon</title><path d=\"M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 4.5h14c.3 0 .5.2.5.5v3.5h-15V5c0-.3.2-.5.5-.5zm8 5.5h6.5v3.5H13V10zm-1.5 3.5h-7V10h7v3.5zm-7 5.5v-4h7v4.5H5c-.3 0-.5-.2-.5-.5zm14.5.5h-6V15h6.5v4c0 .3-.2.5-.5.5z\"></path></svg>","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"align":"left","className":"is-style-sub-heading"} -->
						<p class="alignleft has-text-align-left is-style-sub-heading alignleft"><?php echo esc_html__( 'Structure', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:heading {"textAlign":"left","level":3,"style":{"display":{"all":"","mobile":""},"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
					<h3 class="wp-block-heading has-text-align-left" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'Smart Grid', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}}}} -->
					<p style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Manage alignment automatically, transcending basic columns with an intrinsic responsive system.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"blockGap":"0px"}}} -->
				<div class="wp-block-column is-style-surface">
					<!-- wp:group {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xxs"},"margin":{"bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xs)">
						<!-- wp:icon {"icon":"core/arrow-up-right","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" xml:space=\"preserve\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03b1e078\" data-icon=\"wordpress-arrow-up-right\" style=\"min-width:20px;height:20px\" fill=\"currentColor\"><title id=\"icon-6a2cc03b1e078\">Arrow Up Right Icon</title><path d=\"M10.1 6.1v1.4h5.2L6 16.8 7.2 18l9.3-9.3v5.2h1.4L18 6l-7.9.1z\"></path></svg>","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"align":"left","className":"is-style-sub-heading"} -->
						<p class="alignleft has-text-align-left is-style-sub-heading alignleft"><?php echo esc_html__( 'Growth', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:heading {"textAlign":"left","level":3,"style":{"display":{"all":"","mobile":""},"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
					<h3 class="wp-block-heading has-text-align-left" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'Live Data', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}}}} -->
					<p style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Visualize growth by animating critical metrics as they scroll into view for dynamic polish.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"blockGap":"0px"}}} -->
				<div class="wp-block-column is-style-surface">
					<!-- wp:group {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xxs"},"margin":{"bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xs)">
						<!-- wp:icon {"icon":"wordpress/filter","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03b22e98\" data-icon=\"wordpress-filter\" style=\"min-width:20px;height:20px\" fill=\"currentColor\"><title id=\"icon-6a2cc03b22e98\">Filter Icon</title><path d=\"M12 4 4 19h16L12 4zm0 3.2 5.5 10.3H12V7.2z\"></path></svg>","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"align":"left","className":"is-style-sub-heading"} -->
						<p class="alignleft has-text-align-left is-style-sub-heading alignleft"><?php echo esc_html__( 'Curation', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:heading {"textAlign":"left","level":3,"style":{"display":{"all":"","mobile":""},"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
					<h3 class="wp-block-heading has-text-align-left" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'Query Logic', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}}}} -->
					<p style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Filter content with precision, controlling display parameters to arrange portfolios effortlessly.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->

			<!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide">
				<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"blockGap":"0px"}}} -->
				<div class="wp-block-column is-style-surface">
					<!-- wp:group {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xxs"},"margin":{"bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xs)">
						<!-- wp:icon {"icon":"remixicon/map-marker","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"align":"left","className":"is-style-sub-heading"} -->
						<p class="alignleft has-text-align-left is-style-sub-heading alignleft"><?php echo esc_html__( 'Local', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:heading {"textAlign":"left","level":3,"style":{"display":{"all":"","mobile":""},"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
					<h3 class="wp-block-heading has-text-align-left" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'Safe Maps', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}}}} -->
					<p style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Guide visitors without tracking using lightweight, GDPR-compliant maps embedded locally.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"blockGap":"0px"}}} -->
				<div class="wp-block-column is-style-surface">
					<!-- wp:group {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xxs"},"margin":{"bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xs)">
						<!-- wp:icon {"icon":"core/block-meta","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03b2b750\" data-icon=\"wordpress-block-meta\" style=\"min-width:20px;height:20px\" fill=\"currentColor\"><title id=\"icon-6a2cc03b2b750\">Block Meta Icon</title><path fill-rule=\"evenodd\" d=\"M8.95 11.25H4v1.5h4.95v4.5H13V18c0 1.1.9 2 2 2h3c1.1 0 2-.9 2-2v-3c0-1.1-.9-2-2-2h-3c-1.1 0-2 .9-2 2v.75h-2.55v-7.5H13V9c0 1.1.9 2 2 2h3c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2h-3c-1.1 0-2 .9-2 2v.75H8.95v4.5ZM14.5 15v3c0 .3.2.5.5.5h3c.3 0 .5-.2.5-.5v-3c0-.3-.2-.5-.5-.5h-3c-.3 0-.5.2-.5.5Zm0-6V6c0-.3.2-.5.5-.5h3c.3 0 .5.2.5.5v3c0 .3-.2.5-.5.5h-3c-.3 0-.5-.2-.5-.5Z\" clip-rule=\"evenodd\"></path></svg>","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"align":"left","className":"is-style-sub-heading"} -->
						<p class="alignleft has-text-align-left is-style-sub-heading alignleft"><?php echo esc_html__( 'Hierarchy', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:heading {"textAlign":"left","level":3,"style":{"display":{"all":"","mobile":""},"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
					<h3 class="wp-block-heading has-text-align-left" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'Site Path', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}}}} -->
					<p style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Boost SEO and usability by generating clear structural links to define hierarchy instantly.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"className":"is-style-surface","style":{"spacing":{"blockGap":"0px"}}} -->
				<div class="wp-block-column is-style-surface">
					<!-- wp:group {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xxs"},"margin":{"bottom":"var:preset|spacing|xs"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
					<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xs)">
						<!-- wp:icon {"icon":"wordpress/swatch","iconSvgString":"<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" role=\"img\" aria-labelledby=\"icon-6a2cc03b2f1e8\" data-icon=\"wordpress-swatch\" style=\"min-width:20px;height:20px\" fill=\"currentColor\"><title id=\"icon-6a2cc03b2f1e8\">Swatch Icon</title><path d=\"M5 17.7c.4.5.8.9 1.2 1.2l1.1-1.4c-.4-.3-.7-.6-1-1L5 17.7zM5 6.3l1.4 1.1c.3-.4.6-.7 1-1L6.3 5c-.5.4-.9.8-1.3 1.3zm.1 7.8-1.7.5c.2.6.4 1.1.7 1.6l1.5-.8c-.2-.4-.4-.8-.5-1.3zM4.8 12v-.7L3 11.1v1.8l1.7-.2c.1-.2.1-.5.1-.7zm3 7.9c.5.3 1.1.5 1.6.7l.5-1.7c-.5-.1-.9-.3-1.3-.5l-.8 1.5zM19 6.3c-.4-.5-.8-.9-1.2-1.2l-1.1 1.4c.4.3.7.6 1 1L19 6.3zm-.1 3.6 1.7-.5c-.2-.6-.4-1.1-.7-1.6l-1.5.8c.2.4.4.8.5 1.3zM5.6 8.6l-1.5-.8c-.3.5-.5 1-.7 1.6l1.7.5c.1-.5.3-.9.5-1.3zm2.2-4.5.8 1.5c.4-.2.8-.4 1.3-.5l-.5-1.7c-.6.2-1.1.4-1.6.7zm8.8 13.5 1.1 1.4c.5-.4.9-.8 1.2-1.2l-1.4-1.1c-.2.3-.5.6-.9.9zm1.8-2.2 1.5.8c.3-.5.5-1.1.7-1.6l-1.7-.5c-.1.5-.3.9-.5 1.3zm2.6-4.3-1.7.2v1.4l1.7.2v-1.8zM11.1 3l.2 1.7h1.4l.2-1.7h-1.8zm3 2.1c.5.1.9.3 1.3.5l.8-1.5c-.5-.3-1.1-.5-1.6-.7l-.5 1.7zM12 19.2h-.7l-.2 1.8h1.8l-.2-1.7c-.2-.1-.5-.1-.7-.1zm2.1-.3.5 1.7c.6-.2 1.1-.4 1.6-.7l-.8-1.5c-.4.2-.8.4-1.3.5z\"></path></svg>","style":{"dimensions":{"width":"20px"}}} /-->
<!-- wp:paragraph {"align":"left","className":"is-style-sub-heading"} -->
						<p class="alignleft has-text-align-left is-style-sub-heading alignleft"><?php echo esc_html__( 'Clarity', 'aegis' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:heading {"textAlign":"left","level":3,"style":{"display":{"all":"","mobile":""},"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
					<h3 class="wp-block-heading has-text-align-left" style="font-style:normal;font-weight:500"><?php echo esc_html__( 'SVG Icons', 'aegis' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs"}}}} -->
					<p style="padding-top:var(--wp--preset--spacing--xs)"><?php echo esc_html__( 'Keep interfaces razor-sharp with scalable vectors that break up dense text on any resolution.', 'aegis' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->