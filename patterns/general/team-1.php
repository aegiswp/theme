<?php
/**
 * Team 1 Block Pattern
 */
return array(
    'title'          => __( 'Team 1', 'aegis' ),
    'categories'     => array( 'aegis-team' ),
    'blockTypes'     => array( 'core/template-part/footer' ),
    'description'    => __( 'A default team block pattern', 'aegis' ),
    'keywords'       => array( 'team', 'navigation', 'portfolio' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( 'wp_template' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"gradient":"horizontal-primary-to-background","className":"volunteers ","layout":{"contentSize":"","type":"constrained"}} -->
	<div class="wp-block-group alignfull volunteers has-horizontal-primary-to-background-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"20px"}}}} -->
	<div class="wp-block-column" style="padding-bottom:20px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border" style="padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
	<!-- wp:image {"align":"center","width":160,"sizeSlug":"large","linkDestination":"none","style":{"border":{"width":"0px","style":"none","radius":"100px"},"color":{"duotone":"unset"}},"className":"is-style-rounded "} -->
	<figure class="wp-block-image aligncenter size-large is-resized has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-1.jpg" alt="' . esc_attr__( 'Team Member', 'aegis' ) . '" style="border-style:none;border-width:0px;border-radius:100px" width="160"/></figure>
	<!-- /wp:image -->	
	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"300","textTransform":"uppercase","letterSpacing":"1px"}},"className":"tagline","fontSize":"tiny"} -->
	<p class="has-text-align-center tagline has-tiny-font-size" style="font-style:normal;font-weight:300;letter-spacing:1px;text-transform:uppercase">' . esc_html__( 'Fashion Designer', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:heading {"textAlign":"center","fontSize":"extra-large"} -->
	<h2 class="has-text-align-center has-extra-large-font-size">' . esc_html__( 'Marcus Pemberton', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
	<p class="has-text-align-center has-small-font-size">' . esc_html__( 'In my role as a fashion designer, I endeavor to craft distinct creations that encapsulate style, elegance, and ease.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#000000","size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
	<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
	<!-- wp:social-link {"url":"facebook.com","service":"facebook"} /-->
	<!-- wp:social-link {"url":"linkedin.com","service":"linkedin"} /-->		
	<!-- wp:social-link {"url":"instagram.com","service":"instagram"} /-->
	</ul>
	<!-- /wp:social-links -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"20px"}}}} -->
	<div class="wp-block-column" style="padding-bottom:20px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border" style="padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
	<!-- wp:image {"align":"center","width":160,"sizeSlug":"large","linkDestination":"none","style":{"border":{"width":"0px","style":"none","radius":"100px"},"color":{"duotone":"unset"}},"className":"is-style-rounded "} -->
	<figure class="wp-block-image aligncenter size-large is-resized has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-3.jpg" alt="' . esc_attr__( 'Team Member', 'aegis' ) . '" style="border-style:none;border-width:0px;border-radius:100px" width="160"/></figure>
	<!-- /wp:image -->
	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"300","textTransform":"uppercase","letterSpacing":"1px"}},"className":"tagline","fontSize":"tiny"} -->
	<p class="has-text-align-center tagline has-tiny-font-size" style="font-style:normal;font-weight:300;letter-spacing:1px;text-transform:uppercase">' . esc_html__( 'CEO', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:heading {"textAlign":"center","fontSize":"extra-large"} -->
	<h2 class="has-text-align-center has-extra-large-font-size">' . esc_html__( 'Evelyn Cartwright', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
	<p class="has-text-align-center has-small-font-size">' . esc_html__( 'As a CEO in the fashion industry, I deem it crucial to remain abreast of emerging technologies and materials shaping textile innovation.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#000000","size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
	<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
	<!-- wp:social-link {"url":"facebook.com","service":"facebook"} /-->
	<!-- wp:social-link {"url":"linkedin.com","service":"linkedin"} /-->		
	<!-- wp:social-link {"url":"instagram.com","service":"instagram"} /-->
	</ul>
	<!-- /wp:social-links -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"20px"}}}} -->
	<div class="wp-block-column" style="padding-bottom:20px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border" style="padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
	<!-- wp:image {"align":"center","width":160,"sizeSlug":"large","linkDestination":"none","style":{"border":{"width":"0px","style":"none","radius":"100px"},"color":{"duotone":"unset"}},"className":"is-style-rounded "} -->
	<figure class="wp-block-image aligncenter size-large is-resized has-custom-border is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-4.jpg" alt="' . esc_attr__( 'Team Member', 'aegis' ) . '" style="border-style:none;border-width:0px;border-radius:100px" width="160"/></figure>
	<!-- /wp:image -->	
	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"300","textTransform":"uppercase","letterSpacing":"1px"}},"className":"tagline","fontSize":"tiny"} -->
	<p class="has-text-align-center tagline has-tiny-font-size" style="font-style:normal;font-weight:300;letter-spacing:1px;text-transform:uppercase">' . esc_html__( 'CMO', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:heading {"textAlign":"center","fontSize":"extra-large"} -->
	<h2 class="has-text-align-center has-extra-large-font-size">' . esc_html__( 'Lila Fernandez', 'aegis' ) . '</h2>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
	<p class="has-text-align-center has-small-font-size">' . esc_html__( 'Fashion marketing is all about connecting with your target audience and understanding their needs, wants, and desires.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#000000","size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
	<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
	<!-- wp:social-link {"url":"facebook.com","service":"facebook"} /-->
	<!-- wp:social-link {"url":"linkedin.com","service":"linkedin"} /-->		
	<!-- wp:social-link {"url":"instagram.com","service":"instagram"} /-->
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