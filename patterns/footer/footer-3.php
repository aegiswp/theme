<?php
/**
 * Footer 3 Block Pattern
 */
return array(
    'title'          => __( 'Footer 3', 'aegis' ),
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
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"0px","right":"30px","left":"30px"}}},"backgroundColor":"white","layout":{"contentSize":"","type":"constrained"}} -->
	<div class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:30px;padding-bottom:0px;padding-left:30px">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"bottom":"30px"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-bottom:30px">
	<!-- wp:column {"width":"30%","style":{"spacing":{"padding":{"right":"80px","top":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-right:80px;flex-basis:30%">
	<!-- wp:site-title {"isLink":false,"style":{"spacing":{"margin":{"top":"0px","bottom":"30px"}},"typography":{"lineHeight":"1","textTransform":"none"}},"textColor":"intrace-primary","fontSize":"extra-large"} /-->	
	<!-- wp:paragraph {"textColor":"intrace-body-text","fontSize":"small"} -->
	<p class="has-intrace-body-text-color has-text-color has-small-font-size">' . esc_html__( 'In 2023, contemporary fashion trends have gravitated towards designs characterized by audacity, distinctiveness, and innovation.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#000000","size":"has-small-icon-size","style":{"spacing":{"blockGap":"20px","margin":{"top":"30px","bottom":"24px"}}},"className":"is-style-logos-only"} -->
	<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:30px;margin-bottom:24px">
	<!-- wp:social-link {"url":"facebook.com","service":"facebook"} /-->
	<!-- wp:social-link {"url":"linkedin.com","service":"linkedin"} /-->		
	<!-- wp:social-link {"url":"instagram.com","service":"instagram"} /-->
	</ul>
	<!-- /wp:social-links -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0px","bottom":"25px"}}},"textColor":"intrace-primary","fontSize":"medium"} -->
	<h2 class="has-intrace-primary-color has-text-color has-medium-font-size" style="margin-top:0px;margin-bottom:25px">' . esc_html__( 'Information', 'aegis' ) . '</h2>
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
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0px","bottom":"25px"}}},"textColor":"intrace-primary","fontSize":"medium"} -->
	<h2 class="has-intrace-primary-color has-text-color has-medium-font-size" style="margin-top:0px;margin-bottom:25px">' . esc_html__( 'Services', 'aegis' ) . '</h2>
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
	<!-- wp:column {"width":"30%","style":{"spacing":{"padding":{"top":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);flex-basis:30%">
	<!-- wp:heading {"textColor":"intrace-primary","fontSize":"medium"} -->
	<h2 class="has-intrace-primary-color has-text-color has-medium-font-size">' . esc_html__( 'Our Events', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:gallery {"linkTo":"none"} -->
	<figure class="wp-block-gallery has-nested-images columns-default is-cropped">
	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-2-image"} -->
	<figure class="wp-block-image size-full is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-1.jpg" alt="' . esc_attr__( 'Image of a product', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-2-image"} -->
	<figure class="wp-block-image size-full is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-3.jpg" alt="' . esc_attr__( 'Image of a product', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-effect-2-image"} -->
	<figure class="wp-block-image size-full is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-4.jpg" alt="' . esc_attr__( 'Image of a product', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</figure>
	<!-- /wp:gallery -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:columns {"align":"wide","className":"intrace-margin-top-n50"} -->
	<div class="wp-block-columns alignwide intrace-margin-top-n50">
	<!-- wp:column {"width":"100%"} -->
	<div class="wp-block-column" style="flex-basis:100%">
	<!-- wp:separator {"opacity":"css","backgroundColor":"intrace-border-2","className":"aligncenter is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-intrace-border-2-color has-css-opacity has-intrace-border-2-background-color has-background aligncenter is-style-wide"/>
	<!-- /wp:separator -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0">
	<!-- wp:columns {"style":{"spacing":{"padding":{"top":"10px"}}},"className":"intrace-margin-top-n20"} -->
	<div class="wp-block-columns intrace-margin-top-n20" style="padding-top:10px">
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:paragraph {"textColor":"intrace-body-text","fontSize":"tiny"} -->
	<p class="has-intrace-body-text-color has-text-color has-tiny-font-size">' . esc_attr__( '© 2023 Your Company EDU ·', 'aegis' ) . ' <a href="' . esc_html__( 'https://github.com/atmostfear-entertainment/aegis/', 'aegis' ) . '">' . esc_attr__( 'Aegis', 'aegis' ) . '</a> ' . esc_attr__( 'by Atmostfear Entertainment', 'aegis' ) . '</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:column -->
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:paragraph {"align":"right","fontSize":"tiny"} -->
	<p class="has-text-align-right has-tiny-font-size"><a href="#">' . esc_attr__( 'Cookie Policy', 'aegis' ) . '</a></p>
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