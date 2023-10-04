<?php
/**
 * Footer 4 Block Pattern
 */
return array(
    'title'          => __( 'Footer 4', 'aegis' ),
    'categories'     => array( 'aegis-footer' ),
    'blockTypes'     => array( 'core/template-part/footer' ),
    'description'    => __( 'A default footer block pattern', 'aegis' ),
    'keywords'       => array( 'footer', 'navigation', 'branding' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( 'wp_template' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( '/assets/images/hero-placeholder-1.jpg' ) ) . '","dimRatio":80,"overlayColor":"foreground","focalPoint":{"x":0.95,"y":0},"minHeight":700,"align":"full"} -->
	<div class="wp-block-cover alignfull" style="min-height:700px">
	<span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background " alt="' . esc_attr__( 'Background Image', 'aegis' ) . '" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/hero-placeholder-1.jpg" style="object-position:95% 0%" data-object-fit="cover" data-object-position="95% 0%"/>
	<div class="wp-block-cover__inner-container">
	<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|50","right":"30px","left":"30px"},"blockGap":"0px"},"border":{"width":"0px","style":"none"},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"textColor":"foreground","gradient":"vertical-background-to-secondary","className":"footer is-style-aegis-shadow","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide footer is-style-aegis-shadow has-foreground-color has-vertical-background-to-secondary-gradient-background has-text-color has-background has-link-color" style="border-style:none;border-width:0px;padding-top:var(--wp--preset--spacing--40);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"bottom":"40px"},"blockGap":"10px"}}} -->
	<div class="wp-block-columns alignwide" style="margin-bottom:40px">
	<!-- wp:column {"width":"25%","style":{"spacing":{"blockGap":"0px","padding":{"top":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);flex-basis:25%">
	<!-- wp:site-title {"isLink":false,"style":{"spacing":{"margin":{"top":"0px","bottom":"30px"}},"typography":{"lineHeight":"1","textTransform":"none"}},"textColor":"intrace-primary"} /-->
	<!-- wp:paragraph {"textColor":"intrace-body-text","fontSize":"small"} -->
	<p class="has-intrace-body-text-color has-text-color has-small-font-size">' . esc_html__( 'In 2023, contemporary fashion trends have gravitated towards designs characterized by audacity, distinctiveness, and innovation.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"style":{"spacing":{"blockGap":"10px","padding":{"top":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"20px"}}},"fontSize":"large"} -->
	<h4 class="has-large-font-size" style="margin-bottom:20px">' . esc_html__( 'Information', 'aegis' ) . '</h4>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"12px"}}},"fontSize":"small"} -->
	<p class="has-small-font-size" style="margin-top:12px"><a href="#">' . esc_html__( 'Shop', 'aegis' ) . '</a></p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
	<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__( 'My Account', 'aegis' ) . '</a></p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
	<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__( 'Cart', 'aegis' ) . '</a></p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
	<p class="has-small-font-size" style="margin-top:10px"><a href="#">' . esc_html__( 'Checkout', 'aegis' ) . '</a></p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:column -->	
	<!-- wp:column {"width":"25%","style":{"spacing":{"padding":{"right":"0px","top":"var:preset|spacing|30"},"blockGap":"10px"}}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-right:0px;flex-basis:25%">
	<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"20px"}}}} -->
	<h4 style="margin-bottom:20px">' . esc_html__( 'Services', 'aegis' ) . '</h4>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"20px"}}},"fontSize":"small"} -->
	<p class="has-small-font-size" style="margin-top:20px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">' . esc_html__( 'About Us', 'aegis' ) . '</a></p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
	<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">' . esc_html__( 'Careers', 'aegis' ) . '</a></p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
	<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">' . esc_html__( 'Delivery Info', 'aegis' ) . '</a></p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
	<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#">' . esc_html__( 'Privacy Policy', 'aegis' ) . '</a></p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column {"verticalAlignment":"top","width":"30%","style":{"spacing":{"padding":{"left":"0","top":"var:preset|spacing|30","right":"0"},"blockGap":"0"}}} -->
	<div class="wp-block-column is-vertically-aligned-top" style="padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-left:0;flex-basis:30%">
	<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"20px"}}}} -->
	<h4 style="margin-bottom:20px">' . esc_html__( 'Our Latest Collection', 'aegis' ) . '</h4>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"fontSize":"small"} -->
	<p class="has-small-font-size">' . esc_html__( 'Augment your wardrobe with our most recent assortment of sophisticated attire. Elevate your aesthetic with our contemporary fashion ensemble.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30)">
	<!-- wp:buttons {"style":{"spacing":{"blockGap":"0"}}} -->
	<div class="wp-block-buttons">
	<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
	<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Shop Now', 'aegis' ) . '</a></div>
	<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:separator {"backgroundColor":"secondary","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-secondary-color has-alpha-channel-opacity has-secondary-background-color has-background is-style-wide"/>
	<!-- /wp:separator -->
	<!-- wp:columns {"style":{"spacing":{"blockGap":"0px","margin":{"top":"0","bottom":"0"}}}} -->
	<div class="wp-block-columns" style="margin-top:0;margin-bottom:0">
	<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
	<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:paragraph {"fontSize":"tiny"} -->
	<p class="has-tiny-font-size">' . esc_attr__( '© 2023 Your Company EDU ·', 'aegis' ) . ' <a href="' . esc_html__( 'https://github.com/atmostfear-entertainment/aegis/', 'aegis' ) . '">' . esc_attr__( 'Aegis', 'aegis' ) . '</a> ' . esc_attr__( 'by Atmostfear Entertainment', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"verticalAlignment":"center"} -->
	<div class="wp-block-column is-vertically-aligned-center">
	<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#000000","size":"has-small-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"30px","bottom":"24px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"right"}} -->
	<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:30px;margin-bottom:24px">
	<!-- wp:social-link {"url":"facebook.com","service":"facebook"} /-->
	<!-- wp:social-link {"url":"linkedin.com","service":"linkedin"} /-->		
	<!-- wp:social-link {"url":"instagram.com","service":"instagram"} /-->
	</ul>
	<!-- /wp:social-links -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	</div>
	<!-- /wp:cover -->',
);