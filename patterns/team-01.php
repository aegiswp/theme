<?php
/**
 * 01. Team Block Pattern
 */
return array(
	'title'	  => __( '01. Team', 'aegis' ),
	'description' => __( 'Team three-columns with image, heading, paragraph, separator,and social icons', 'aegis' ),
	'categories' => array( 'aegis-team' ),
	'content'	=> '<!-- wp:group {"metadata":{"name":"' . esc_html__('01. Team Pattern', 'aegis') . '"},"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"gradient":"diagonal-tertiary-to-background-right-bottom","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-diagonal-tertiary-to-background-right-bottom-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":{"top":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:0">
		<!-- wp:column {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"backgroundColor":"background"} -->
		<div class="wp-block-column has-background-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"className":"is-style-aegis-border"} -->
			<div class="wp-block-group is-style-aegis-border" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:image {"width":"160px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"color":{"duotone":"unset"}},"className":"is-style-rounded"} -->
				<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:160px" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"extra-large"} -->
				<h3 class="wp-block-heading has-text-align-center has-extra-large-font-size">' . esc_html__('[Name]', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"300","textTransform":"uppercase","letterSpacing":"1px"}},"className":"is-tagline","fontSize":"tiny"} -->
				<p class="has-text-align-center is-tagline has-tiny-font-size"
					style="font-style:normal;font-weight:300;letter-spacing:1px;text-transform:uppercase">' . esc_html__('[Job Position]', 'aegis') . '
				</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
				<p class="has-text-align-center has-small-font-size">' . esc_html__('Team Bio (131 chars): [Share a brief overview of a team members role, expertise, or passion.]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"backgroundColor":"septenary"} -->
				<hr class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background" />
				<!-- /wp:separator -->

				<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","size":"has-small-icon-size","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0">
					<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->
					<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn","rel":"LinkedIn"} /-->
					<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram","rel":"Instagram"} /-->
					<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress","rel":"WordPress"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"backgroundColor":"tertiary"} -->
		<div class="wp-block-column has-tertiary-background-color has-background">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"className":"is-style-aegis-border"} -->
			<div class="wp-block-group is-style-aegis-border" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:image {"width":"160px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"color":{"duotone":"unset"}},"className":"is-style-rounded"} -->
				<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:160px" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"extra-large"} -->
				<h3 class="wp-block-heading has-text-align-center has-extra-large-font-size">' . esc_html__('[Name]', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"300","textTransform":"uppercase","letterSpacing":"1px"}},"className":"is-tagline","fontSize":"tiny"} -->
				<p class="has-text-align-center is-tagline has-tiny-font-size" style="font-style:normal;font-weight:300;letter-spacing:1px;text-transform:uppercase">' . esc_html__('[Job Position]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
				<p class="has-text-align-center has-small-font-size">' . esc_html__('Team Bio (131 chars): [Share a brief overview of a team members role, expertise, or passion.]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"backgroundColor":"foreground"} -->
				<hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background" />
				<!-- /wp:separator -->

				<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","size":"has-small-icon-size","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0">
					<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->
					<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn","rel":"LinkedIn"} /-->
					<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram","rel":"Instagram"} /-->
					<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress","rel":"WordPress"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"backgroundColor":"foreground","textColor":"background"} -->
		<div class="wp-block-column has-background-color has-foreground-background-color has-text-color has-background">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"className":"is-style-aegis-border"} -->
			<div class="wp-block-group is-style-aegis-border" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:image {"width":"160px","aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"color":{"duotone":"unset"}},"className":"is-style-rounded "} -->
				<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_light.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover;width:160px" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"extra-large"} -->
				<h3 class="wp-block-heading has-text-align-center has-extra-large-font-size">' . esc_html__('[Name]', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"300","textTransform":"uppercase","letterSpacing":"1px"}},"className":"is-tagline","fontSize":"tiny"} -->
				<p class="has-text-align-center is-tagline has-tiny-font-size" style="font-style:normal;font-weight:300;letter-spacing:1px;text-transform:uppercase">' . esc_html__('[Job Position]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
				<p class="has-text-align-center has-small-font-size">' . esc_html__('Team Bio (131 chars): [Share a brief overview of a team members role, expertise, or passion.]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"backgroundColor":"background","className":"is-style-default"} -->
				<hr class="wp-block-separator has-text-color has-background-color has-alpha-channel-opacity has-background-background-color has-background is-style-default" />
				<!-- /wp:separator -->

				<!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","size":"has-small-icon-size","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"0"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0">
					<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->
					<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn","rel":"LinkedIn"} /-->
					<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram","rel":"Instagram"} /-->
					<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress","rel":"WordPress"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
);
