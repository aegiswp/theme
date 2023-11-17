<?php
/**
 * 09. Header Block Pattern
 */
return array(
	'title'	  => __( '09. Header', 'aegis' ),
	'description' => __( 'Header', 'aegis' ),
	'categories' => array( 'aegis-header' ),
	'blockTypes' => array( 'core/template-part/header' ),
	'content' => '
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"30px","left":"30px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"foreground","textColor":"white","className":"header-8 has-background-color","layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull header-8 has-background-color has-white-color has-foreground-background-color has-text-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:30px;padding-left:30px">
	<!-- wp:group {"style":{"typography":{"fontSize":"13px"},"spacing":{"blockGap":"0","padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:13px">
	<!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","openInNewTab":true,"size":"has-small-icon-size","className":"is-style-logos-only"} -->
	<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
	<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->
	
	<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->
	
	<!-- wp:social-link {"url":"#","service":"instagram"} /-->
	
	<!-- wp:social-link {"url":"#","service":"wordpress"} /-->
	</ul>
	<!-- /wp:social-links -->
	
	<!-- wp:woocommerce/mini-cart {"hasHiddenPrice":true,"style":{"typography":{"fontSize":"12px"}}} /-->
	</div>
	<!-- /wp:group -->
	
	<!-- wp:group {"layout":{"type":"default"}} -->
	<div class="wp-block-group">
	<!-- wp:site-title {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}}} /--></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","bottom":"10px"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group" style="padding-top:10px;padding-bottom:10px"><!-- wp:navigation {"ref":4,"icon":"menu","overlayBackgroundColor":"foreground","overlayTextColor":"background","layout":{"type":"flex","justifyContent":"center"},"fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->',
);