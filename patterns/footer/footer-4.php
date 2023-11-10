<?php
/**
 * 04. Footer Block Pattern
 */
return array(
	'title'	      => __( '04. Footer', 'aegis' ),
	'description' => __( 'Footer Block Pattern', 'aegis' ),
	'categories'  => array( 'aegis-footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content' => '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"30px","right":"30px"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:30px;padding-bottom:var(--wp--preset--spacing--60);padding-left:30px">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--40)">
			<!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"gigantic"} -->
			<h4 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="font-style:normal;font-weight:300">' . esc_html__( '[80 characters: Guide users to seek more information or assistance.]', 'aegis' ) . '</h4>
			<!-- /wp:heading -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
				<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Call to Action', 'aegis' ) . '</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-wide"} -->
		<hr class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-wide" />
		<!-- /wp:separator -->

		<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","openInNewTab":true,"size":"has-normal-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"30px","bottom":"24px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
		<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only" style="margin-top:30px;margin-bottom:24px">
		<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->

		<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->

		<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->

		<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress"} /-->
		</ul>
		<!-- /wp:social-links -->

		<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-wide"} -->
		<hr class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-wide" />
		<!-- /wp:separator -->

		<!-- wp:columns {"style":{"spacing":{"blockGap":"0px","margin":{"top":"0px"},"padding":{"top":"20px"}}}} -->
		<div class="wp-block-columns" style="margin-top:0px;padding-top:20px">
			<!-- wp:column {"verticalAlignment":"center","width":"","fontSize":"small"} -->
			<div class="wp-block-column is-vertically-aligned-center has-small-font-size">
				<!-- wp:paragraph {"fontSize":"tiny"} -->
				<p class="has-tiny-font-size">' . esc_html__( '©', 'aegis' ) . ' ' . esc_html__( '[Year]', 'aegis' ) . ' ' . esc_html__( '[Company]', 'aegis' ) . '</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":""} -->
			<div class="wp-block-column is-vertically-aligned-center">
				<!-- wp:paragraph {"align":"right","fontSize":"tiny"} -->
				<p class="has-text-align-right has-tiny-font-size"><a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ). '</a> · <a href="#">'. esc_html__( '[Menu Item]' , 'aegis' ). '</a> · <a href="#">' . esc_html__( '[Menu Item]' , 'aegis' ).'</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->',
);