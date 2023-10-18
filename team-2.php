<?php
/**
 * Team 2 block pattern
 */
return array(
	'title'	  => __( 'Team 2', 'aegis' ),
	'categories' => array( 'aegis-team' ),
	'content'	=> '
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"className":"team","layout":{"contentSize":"","type":"constrained"}} -->
	<div class="wp-block-group alignfull team" style="padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide">
			<!-- wp:column {"className":"is-style-default"} -->
			<div class="wp-block-column is-style-default">
				<!-- wp:image {""sizeSlug":"full","linkDestination":"none","className":"team-image"} -->
				<figure class="wp-block-image size-full team-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/thumb_480x480_dark.webp" alt="' . esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" /></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"padding":{"right":"35px","bottom":"35px","left":"35px","top":"5px"}}},"backgroundColor":"background","className":"is-style-aegis-shadow has-team-group"} -->
				<div class="wp-block-group is-style-aegis-shadow has-team-group has-background-background-color has-background" style="padding-top:5px;padding-right:35px;padding-bottom:35px;padding-left:35px">
					<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"700","lineHeight":"0.8"},"spacing":{"margin":{"top":"40px"}}},"fontSize":"extra-large"} -->
					<h3 class="wp-block-heading has-text-align-left has-extra-large-font-size" style="margin-top:40px;font-style:normal;font-weight:700;line-height:0.8;text-transform:capitalize">' . esc_html__( '[Name]' , 'aegis' ). '</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"left","style":{"typography":{"lineHeight":"0.1","fontStyle":"normal","fontWeight":"400"}},"className":"has-text-color","fontSize":"small"} -->
					<p class="has-text-align-left has-text-color has-small-font-size" style="font-style:normal;font-weight:400;line-height:0.1">' . esc_html__( '[Job Position]' , 'aegis' ). '</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"align":"left","className":"has-text-color","fontSize":"small"} -->
					<p class="has-text-align-left has-text-color has-small-font-size">' . esc_html__( 'Bio Statement (131 chars): [Describe ones passion, expertise, or unique approach in their field.]' , 'aegis' ). '</p>
					<!-- /wp:paragraph -->

					<!-- wp:separator {"backgroundColor":"foreground","className":"is-style-default"} -->
					<hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-default" />
					<!-- /wp:separator -->

					<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","iconBackgroundColor":"background","iconBackgroundColorValue":"#f6f5f2","openInNewTab":true,"size":"has-small-icon-size","style":{"spacing":{"blockGap":{"top":"10px","left":"10px"}}},"className":"is-style-pill-shape","layout":{"type":"flex","justifyContent":"left"}} -->
					<ul class="wp-block-social-links has-small-icon-size has-icon-color has-icon-background-color is-style-pill-shape">
						<!-- wp:social-link {"url":"https://facebook.com/","service":"facebook","label":"Facebook"} /-->

						<!-- wp:social-link {"url":"https://linkedin.com/","service":"linkedin","label":"LinkedIn"} /-->

						<!-- wp:social-link {"url":"https://instagram.com/","service":"instagram","label":"Instagram"} /-->

						<!-- wp:social-link {"url":"https://wordpress.org/","service":"wordpress","label":"WordPress"} /-->
					</ul>
					<!-- /wp:social-links -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"is-style-default"} -->
			<div class="wp-block-column is-style-default">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"team-image"} -->
				<figure class="wp-block-image size-full team-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/thumb_480x480_dark.webp" alt="' . esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" /></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"padding":{"right":"35px","bottom":"35px","left":"35px","top":"5px"}}},"backgroundColor":"secondary","className":"is-style-aegis-shadow has-team-group"} -->
				<div class="wp-block-group is-style-aegis-shadow has-team-group has-secondary-background-color has-background" style="padding-top:5px;padding-right:35px;padding-bottom:35px;padding-left:35px">
					<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"700","lineHeight":"0.8"},"spacing":{"margin":{"top":"40px"}}},"fontSize":"extra-large"} -->
					<h3 class="wp-block-heading has-text-align-left has-extra-large-font-size" style="margin-top:40px;font-style:normal;font-weight:700;line-height:0.8;text-transform:capitalize">' . esc_html__( '[Name]' , 'aegis' ). '</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"left","style":{"typography":{"lineHeight":"0.1","fontStyle":"normal","fontWeight":"400"}},"className":"has-text-color","fontSize":"small"} -->
					<p class="has-text-align-left has-text-color has-small-font-size" style="font-style:normal;font-weight:400;line-height:0.1">' . esc_html__( '[Job Position]' , 'aegis' ). '</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"align":"left","className":"has-text-color","fontSize":"small"} -->
					<p class="has-text-align-left has-text-color has-small-font-size">' . esc_html__( 'Bio Statement (131 chars): [Describe ones passion, expertise, or unique approach in their field.]' , 'aegis' ). '</p>
					<!-- /wp:paragraph -->

					<!-- wp:separator {"backgroundColor":"background","className":"is-style-default"} -->
					<hr class="wp-block-separator has-text-color has-background-color has-alpha-channel-opacity has-background-background-color has-background is-style-default" />
					<!-- /wp:separator -->

					<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","iconBackgroundColor":"secondary","iconBackgroundColorValue":"#f0eee9","openInNewTab":true,"size":"has-small-icon-size","style":{"spacing":{"blockGap":{"top":"10px","left":"10px"}}},"className":"is-style-default","layout":{"type":"flex","justifyContent":"left"}} -->
					<ul class="wp-block-social-links has-small-icon-size has-icon-color has-icon-background-color is-style-default">
						<!-- wp:social-link {"url":"https://facebook.com/","service":"facebook","label":"Facebook"} /-->

						<!-- wp:social-link {"url":"https://linkedin.com/","service":"linkedin","label":"LinkedIn"} /-->

						<!-- wp:social-link {"url":"https://instagram.com/","service":"instagram","label":"Instagram"} /-->

						<!-- wp:social-link {"url":"https://wordpress.org/","service":"wordpress","label":"WordPress"} /-->
					</ul>
					<!-- /wp:social-links -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"is-style-default"} -->
			<div class="wp-block-column is-style-default" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"bottomRight":"0px"}}},"className":"team-image"} -->
				<figure class="wp-block-image size-full has-custom-border team-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/thumb_480x480_dark.webp" alt="' . esc_attr__( 'Describe the main elements of the image and its context.', 'aegis' ) . '" style="border-bottom-right-radius:0px" /></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"padding":{"right":"35px","bottom":"35px","left":"35px","top":"5px"}}},"backgroundColor":"foreground","textColor":"background","className":"is-style-aegis-shadow has-team-group","layout":{"type":"default"}} -->
				<div class="wp-block-group is-style-aegis-shadow has-team-group has-background-color has-foreground-background-color has-text-color has-background" style="padding-top:5px;padding-right:35px;padding-bottom:35px;padding-left:35px">
					<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"700","lineHeight":"0.8"},"spacing":{"margin":{"top":"40px"}}},"fontSize":"extra-large"} -->
					<h3 class="wp-block-heading has-text-align-left has-extra-large-font-size" style="margin-top:40px;font-style:normal;font-weight:700;line-height:0.8;text-transform:capitalize">' . esc_html__( '[Name]' , 'aegis' ). '</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"left","style":{"typography":{"lineHeight":"0.1","fontStyle":"normal","fontWeight":"400"}},"className":"has-text-color","fontSize":"small"} -->
					<p class="has-text-align-left has-text-color has-small-font-size" style="font-style:normal;font-weight:400;line-height:0.1">' . esc_html__( '[Job Position]' , 'aegis' ). '</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"align":"left","className":"has-text-color","fontSize":"small"} -->
					<p class="has-text-align-left has-text-color has-small-font-size">' . esc_html__( 'Team Bio (131 chars): [Share a brief overview of a team members role, expertise, or passion.]' , 'aegis' ). '</p>
					<!-- /wp:paragraph -->

					<!-- wp:separator {"backgroundColor":"background","className":"is-style-default"} -->
					<hr class="wp-block-separator has-text-color has-background-color has-alpha-channel-opacity has-background-background-color has-background is-style-default" />
					<!-- /wp:separator -->

					<!-- wp:social-links {"iconBackgroundColor":"foreground","iconBackgroundColorValue":"#1c1c1e","openInNewTab":true,"size":"has-small-icon-size","style":{"spacing":{"blockGap":{"top":"10px","left":"10px"}}},"className":"is-style-default","layout":{"type":"flex","justifyContent":"left"}} -->
					<ul class="wp-block-social-links has-small-icon-size has-icon-background-color is-style-default">
						<!-- wp:social-link {"url":"https://facebook.com/","service":"facebook","label":"Facebook"} /-->

						<!-- wp:social-link {"url":"https://linkedin.com/","service":"linkedin","label":"LinkedIn"} /-->

						<!-- wp:social-link {"url":"https://instagram.com/","service":"instagram","label":"Instagram"} /-->

						<!-- wp:social-link {"url":"https://wordpress.org/","service":"wordpress","label":"WordPress"} /-->
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