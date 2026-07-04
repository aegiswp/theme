<?php
/**
 * Title: Wide
 * Slug: wide
 * Categories: footer
 * Keywords: footer, wide, columns, navigation
 * Description: A wide footer with multiple columns.
 * Viewport Width: 1280
 * Block Types: core/template-part/footer
 */
?>

<!-- wp:group {"metadata":{"categories":["footer"],"patternName":"wide","name":"Wide"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"textDecoration":"none"}},"fontSize":"14","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull has-14-font-size" style="margin-top:0;margin-bottom:0;text-decoration:none">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide"
		style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"4px","padding":{"bottom":"var:preset|spacing|xxs"}},"zIndex":{"all":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"},"onclick":""} -->
		<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--xxs)">
			<!-- wp:image {"className":"is-style-icon","iconSet":"social","iconName":"aegis","textColor":"primary-500","iconSize":"45px","iconSvgString":"\u003csvg xmlns=\u0022http://www.w3.org/2000/svg\u0022 viewBox=\u00220 0 24 24\u0022 role=\u0022img\u0022 aria-labelledby=\u0022icon-6a2cc03b36330\u0022 data-icon=\u0022social-aegis\u0022 style=\u0022min-width:45px;height:45px\u0022 fill=\u0022currentColor\u0022\u003e\u003ctitle id=\u0022icon-6a2cc03b36330\u0022\u003eAegis Icon\u003c/title\u003e\u003cpath d=\u0022M10.06 7.75 L12.02 3.87 L13.95 7.72 L16.65 9.29 L12.03 0 L7.34 9.3 L10.06 7.75 Z M18.37 12.72 L18.2 12.36 L15.5 10.79 L17.02 13.68 L20.05 18.61 L12.02 15.17 L3.98 18.62 L6.96 13.68 L8.39 10.81 L5.67 12.39 L5.5 12.71 L0 22.87 L12.01 16.87 L24 22.94 L18.37 12.72 Z\u0022 stroke=\u0022none\u0022 fill-rule=\u0022evenodd\u0022\u003e\u003c/path\u003e\u003c/svg\u003e"} --><figure class="wp-block-image is-style-icon" style="--wp--custom--icon--size:45px;--wp--custom--icon--url:url('data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 24 24&quot; role=&quot;img&quot; aria-labelledby=&quot;icon-6a2cc03b36330&quot; data-icon=&quot;social-aegis&quot; style=&quot;min-width:45px;height:45px&quot; fill=&quot;currentColor&quot;><title id=&quot;icon-6a2cc03b36330&quot;>Aegis Icon</title><path d=&quot;M10.06 7.75 L12.02 3.87 L13.95 7.72 L16.65 9.29 L12.03 0 L7.34 9.3 L10.06 7.75 Z M18.37 12.72 L18.2 12.36 L15.5 10.79 L17.02 13.68 L20.05 18.61 L12.02 15.17 L3.98 18.62 L6.96 13.68 L8.39 10.81 L5.67 12.39 L5.5 12.71 L0 22.87 L12.01 16.87 L24 22.94 L18.37 12.72 Z&quot; stroke=&quot;none&quot; fill-rule=&quot;evenodd&quot;></path></svg>')"><img alt="" /></figure><!-- /wp:image -->
</div>
		<!-- /wp:group -->

		<!-- wp:search {"label":"","showLabel":false,"placeholder":"Search this site","width":75,"widthUnit":"%","buttonText":"Search","style":{"spacing":{"blockGap":"var:preset|spacing|xxs"}},"textColor":"currentColor"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}},"border":{"bottom":{"width":"1px"}}}} -->
	<div class="wp-block-columns alignwide"
		style="border-bottom-width:1px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)">
		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:columns {"isStackedOnMobile":false} -->
			<div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:heading {"level":6,"className":"has-text-align-left is-style-heading","fontSize":"inherit"} -->
					<h6 class="wp-block-heading has-text-align-left is-style-heading has-inherit-font-size"><?php echo esc_html__( 'Navigation', 'aegis' ); ?></h6>
					<!-- /wp:heading -->

					<!-- wp:navigation {"overlayMenu":"never","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"},"blockGap":"10px"},"typography":{"fontStyle":"normal","fontWeight":"400"}},"layout":{"type":"flex","orientation":"vertical"}} /-->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:heading {"level":6,"className":"has-text-align-left is-style-heading","fontSize":"inherit"} -->
					<h6 class="wp-block-heading has-text-align-left is-style-heading has-inherit-font-size"><?php echo esc_html__( 'Navigation', 'aegis' ); ?></h6>
					<!-- /wp:heading -->

					<!-- wp:navigation {"overlayMenu":"never","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"},"blockGap":"10px"},"typography":{"fontStyle":"normal","fontWeight":"400"}},"layout":{"type":"flex","orientation":"vertical"}} /-->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:columns {"isStackedOnMobile":false} -->
			<div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:heading {"level":6,"className":"has-text-align-left is-style-heading","fontSize":"inherit"} -->
					<h6 class="wp-block-heading has-text-align-left is-style-heading has-inherit-font-size"><?php echo esc_html__( 'Navigation', 'aegis' ); ?></h6>
					<!-- /wp:heading -->

					<!-- wp:navigation {"overlayMenu":"never","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"},"blockGap":"10px"},"typography":{"fontStyle":"normal","fontWeight":"400"}},"layout":{"type":"flex","orientation":"vertical"}} /-->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:heading {"level":6,"className":"has-text-align-left is-style-heading","fontSize":"inherit"} -->
					<h6 class="wp-block-heading has-text-align-left is-style-heading has-inherit-font-size"><?php echo esc_html__( 'Navigation', 'aegis' ); ?></h6>
					<!-- /wp:heading -->

					<!-- wp:navigation {"overlayMenu":"never","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"},"blockGap":"10px"},"typography":{"fontStyle":"normal","fontWeight":"400"}},"layout":{"type":"flex","orientation":"vertical"}} /-->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:columns {"isStackedOnMobile":false} -->
			<div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:heading {"level":6,"className":"has-text-align-left is-style-heading","fontSize":"inherit"} -->
					<h6 class="wp-block-heading has-text-align-left is-style-heading has-inherit-font-size"><?php echo esc_html__( 'Navigation', 'aegis' ); ?></h6>
					<!-- /wp:heading -->

					<!-- wp:navigation {"overlayMenu":"never","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"},"blockGap":"10px"},"typography":{"fontStyle":"normal","fontWeight":"400"}},"layout":{"type":"flex","orientation":"vertical"}} /-->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:heading {"level":6,"className":"has-text-align-left is-style-heading","fontSize":"inherit"} -->
					<h6 class="wp-block-heading has-text-align-left is-style-heading has-inherit-font-size"><?php echo esc_html__( 'Navigation', 'aegis' ); ?></h6>
					<!-- /wp:heading -->

					<!-- wp:navigation {"overlayMenu":"never","style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"},"blockGap":"10px"},"typography":{"fontStyle":"normal","fontWeight":"400"}},"layout":{"type":"flex","orientation":"vertical"}} /-->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|md","top":"var:preset|spacing|md"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide"
		style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
		<!-- wp:social-links {"iconColor":"neutral-400","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"20px","left":"20px"}}},"layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} -->
		<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
			<!-- wp:social-link {"url":"#","service":"facebook"} /-->

			<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

			<!-- wp:social-link {"url":"#","service":"bluesky"} /-->

			<!-- wp:social-link {"url":"#","service":"instagram"} /-->
		</ul>
		<!-- /wp:social-links -->

		<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0.2em","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
			<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0">
				<!-- wp:paragraph {"align":"center"} -->
				<p class="aligncenter has-text-align-center aligncenter"><?php echo esc_html__( '© Copyright {year}', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:site-title {"level":0} /-->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="aligncenter has-text-align-center aligncenter"><?php echo esc_html__( '· All rights reserved.', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group"><!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"transparent","textColor":"current","className":"is-style-fill","style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|xxs","bottom":"0","left":"var:preset|spacing|xxs"}}},"onclick":"window.scrollTo({ top: 0, behavior: 'smooth' })","shadowPreset":"none","shadowPresetHover":"sm","iconSet":"WordPress","iconName":"chevron-up","iconSize":"20px","iconPosition":"end","iconSvgString":"\u003csvg viewBox=\u00220 0 24 24\u0022 xmlns=\u0022http://www.w3.org/2000/svg\u0022\u003e\u003cpath d=\u0022M6.5 12.4 12 8l5.5 4.4-.9 1.2L12 10l-4.5 3.6-1-1.2z\u0022/\u003e\u003c/svg\u003e"} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button has-transparent-background-color has-background has-current-color"><?php echo esc_html__( 'Back to Top', 'aegis' ); ?></a></div>
<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->