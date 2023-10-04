<?php
/**
 * Header 2 Block Pattern
 */
return array(
    'title'          => __( 'Header 2', 'aegis' ),
    'categories'     => array( 'aegis-header' ),
    'blockTypes'     => array( 'core/template-part/header' ),
    'description'    => __( 'A default header pattern for the Aegis theme.', 'aegis' ),
    'keywords'       => array( 'header', 'navigation', 'branding' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( 'wp_template' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"className":"header-2","layout":{"inherit":false}} -->
	<div class="wp-block-group alignfull header-2" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"30px","bottom":"0","left":"30px"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-secondary-background-color has-background" style="padding-top:0;padding-right:30px;padding-bottom:0;padding-left:30px">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"style":{"spacing":{"padding":{"top":"10px","bottom":"10px","right":"2px"}}}} -->
	<div class="wp-block-column" style="padding-top:10px;padding-right:2px;padding-bottom:10px">
	<!-- wp:paragraph {"align":"center","fontSize":"tiny"} -->
	<p class="has-text-align-center has-tiny-font-size">' . esc_html__( 'Shop Now and Enjoy Free Shipping!!!', 'aegis' ) . ' ' . esc_html__( 'Exclusive Offer for Orders Above', 'aegis' ) . ' <strong>' . esc_html__( '$100', 'aegis' ) . '</strong>.</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","right":"30px","left":"30px","bottom":"10px"},"margin":{"top":"0","bottom":"0"}}},"className":"socials-cart","layout":{"type":"constrained"}} -->
	<div class="wp-block-group socials-cart" style="margin-top:0;margin-bottom:0;padding-top:10px;padding-right:30px;padding-bottom:10px;padding-left:30px">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"verticalAlignment":"center"} -->
	<div class="wp-block-column is-vertically-aligned-center">
	<!-- wp:social-links {"iconColor":"black","iconColorValue":"#000000","size":"has-small-icon-size","className":"is-style-logos-only"} -->
	<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
	<!-- wp:social-link {"url":"facebook.com","service":"facebook"} /-->
	<!-- wp:social-link {"url":"linkedin.com","service":"linkedin"} /-->		
	<!-- wp:social-link {"url":"instagram.com","service":"instagram"} /-->
	</ul>
	<!-- /wp:social-links --></div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:site-title {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"fontSize":"large"} /-->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:group {"align":"wide","className":"banner-info","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
	<div class="wp-block-group alignwide banner-info">
	<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search products…","width":350,"widthUnit":"px","buttonText":"Search","buttonPosition":"no-button","query":{"post_type":"product"},"style":{"border":{"color":"#211f1dde","width":"2px","radius":"0px"}},"className":"hide-mobile"} /-->	
	<!-- wp:woocommerce/mini-cart {"hasHiddenPrice":true,"style":{"typography":{"fontSize":"13px"}}} /-->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10px","right":"30px","left":"30px"},"margin":{"top":"0","bottom":"0"}},"border":{"top":{"color":"var:preset|color|septenary","width":"1px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="border-top-color:var(--wp--preset--color--septenary);border-top-width:1px;margin-top:0;margin-bottom:0;padding-top:10px;padding-right:30px;padding-left:30px">
	<!-- wp:columns {"isStackedOnMobile":false,"align":"wide","style":{"spacing":{"padding":{"right":"0px","left":"0px"}}}} -->
	<div class="wp-block-columns alignwide is-not-stacked-on-mobile" style="padding-right:0px;padding-left:0px">
	<!-- wp:column {"verticalAlignment":"center","width":""} -->
	<div class="wp-block-column is-vertically-aligned-center">
	<!-- wp:navigation {"className":"is-style-default","layout":{"type":"flex","setCascadingProperties":"true","justifyContent":"center","orientation":"horizontal","flexWrap":"wrap"},"fontSize":"tiny"} /-->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->',
);