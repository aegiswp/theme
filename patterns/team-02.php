<?php
/**
 * 02. Team Block Pattern
 */
return array(
	'title'	  => __( '02. Team', 'aegis' ),
	'description' => __( 'Team three-columns with big image, headings, paragraphs, separator, and social icons', 'aegis' ),
	'categories' => array( 'aegis-team' ),
	'content'	=> '<!-- wp:group {"metadata":{"name":"' . esc_html__('02. Team Pattern', 'aegis') . '"},"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"contentSize":"","type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"0"}}} -->
		<div class="wp-block-column" style="padding-top:0;padding-bottom:0">
			<!-- wp:image {"aspectRatio":"1","scale":"cover"} -->
			<figure class="wp-block-image"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"padding":{"right":"35px","bottom":"35px","left":"35px","top":"5px"}}},"backgroundColor":"background"} -->
			<div class="wp-block-group has-background-background-color has-background" style="padding-top:5px;padding-right:35px;padding-bottom:35px;padding-left:35px">
				<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"textTransform":"capitalize","lineHeight":"0.8"},"spacing":{"margin":{"top":"40px"}}},"fontSize":"extra-large"} -->
				<h3 class="wp-block-heading has-text-align-left has-extra-large-font-size" style="margin-top:40px;line-height:0.8;text-transform:capitalize">' . esc_html__('[Name]', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"left","style":{"typography":{"lineHeight":"0.1"}},"fontSize":"small"} -->
				<p class="has-text-align-left has-small-font-size" style="line-height:0.1">' . esc_html__('[Job Position]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"fontSize":"small"} -->
				<p class="has-text-align-left has-small-font-size" style="margin-top:var(--wp--preset--spacing--40)">' . esc_html__('Team Bio (131 chars): [Share a brief overview of a team members role, expertise, or passion.]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"backgroundColor":"foreground","className":"is-style-default"} -->
				<hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-default" />
				<!-- /wp:separator -->

				<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","iconBackgroundColor":"background","iconBackgroundColorValue":"#f6f5f2","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"top":"10px","left":"10px"}}},"className":"is-style-default","layout":{"type":"flex","justifyContent":"left"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color has-icon-background-color is-style-default">
					<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->
					<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->
					<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->
					<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"padding":{"right":"35px","bottom":"35px","left":"35px","top":"5px"}}},"backgroundColor":"tertiary"} -->
			<div class="wp-block-group has-tertiary-background-color has-background" style="padding-top:5px;padding-right:35px;padding-bottom:35px;padding-left:35px">
				<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"textTransform":"capitalize","lineHeight":"0.8"},"spacing":{"margin":{"top":"40px"}}},"fontSize":"extra-large"} -->
				<h3 class="wp-block-heading has-text-align-left has-extra-large-font-size" style="margin-top:40px;line-height:0.8;text-transform:capitalize">' . esc_html__('[Name]', 'aegis') . '</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"left","style":{"typography":{"lineHeight":"0.1"}},"fontSize":"small"} -->
				<p class="has-text-align-left has-small-font-size" style="line-height:0.1">' . esc_html__('[Job Position]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"className":"has-text-color","fontSize":"small"} -->
				<p class="has-text-align-left has-text-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--40)">' . esc_html__('Team Bio (131 chars): [Share a brief overview of a team members role, expertise, or passion.]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"backgroundColor":"background","className":"is-style-default"} -->
				<hr class="wp-block-separator has-text-color has-background-color has-alpha-channel-opacity has-background-background-color has-background is-style-default" />
				<!-- /wp:separator -->

				<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","iconBackgroundColor":"tertiary","iconBackgroundColorValue":"#f0eee9","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"top":"10px","left":"10px"}}},"className":"is-style-default","layout":{"type":"flex","justifyContent":"left"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-color has-icon-background-color is-style-default">
					<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->
					<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->
					<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->
					<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress"} /-->
				</ul>
				<!-- /wp:social-links -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"border":{"width":"0px","style":"none"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"}}} -->
		<div class="wp-block-column" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="' . esc_url(get_template_directory_uri()) . '/assets/images/thumb_800x800_dark.webp" alt="' . esc_html__('Describe the main elements of the image and its context.', 'aegis') . '" style="aspect-ratio:1;object-fit:cover" /></figure>
			<!-- /wp:image -->

			<!-- wp:group {"style":{"spacing":{"padding":{"right":"35px","bottom":"35px","left":"35px","top":"5px"}}},"backgroundColor":"foreground","textColor":"background","layout":{"type":"default"}} -->
			<div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background" style="padding-top:5px;padding-right:35px;padding-bottom:35px;padding-left:35px">
				<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"textTransform":"capitalize","lineHeight":"0.8"},"spacing":{"margin":{"top":"40px"}}},"fontSize":"extra-large"} -->
				<h3 class="wp-block-heading has-text-align-left has-extra-large-font-size" style="margin-top:40px;line-height:0.8;text-transform:capitalize">' . esc_html__('[Name]', 'aegis') .'</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"left","style":{"typography":{"lineHeight":"0.1"}},"fontSize":"small"} -->
				<p class="has-text-align-left has-small-font-size" style="line-height:0.1">' . esc_html__('[Job Position]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"className":"has-text-color","fontSize":"small"} -->
				<p class="has-text-align-left has-text-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--40)">' . esc_html__('Team Bio (131 chars): [Share a brief overview of a team members role, expertise, or passion.]', 'aegis') . '</p>
				<!-- /wp:paragraph -->

				<!-- wp:separator {"backgroundColor":"background","className":"is-style-default"} -->
				<hr class="wp-block-separator has-text-color has-background-color has-alpha-channel-opacity has-background-background-color has-background is-style-default" />
				<!-- /wp:separator -->

				<!-- wp:social-links {"iconBackgroundColor":"foreground","iconBackgroundColorValue":"#1c1c1e","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"top":"10px","left":"10px"}}},"className":"is-style-default","layout":{"type":"flex","justifyContent":"left"}} -->
				<ul class="wp-block-social-links has-small-icon-size has-icon-background-color is-style-default">
					<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->
					<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->
					<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->
					<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress"} /-->
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
