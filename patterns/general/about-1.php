<?php
/**
 * About 1 Block Pattern
 */
return array(
    'title'          => __( 'About 1', 'aegis' ),
    'categories'     => array( 'aegis-about' ),
    'blockTypes'     => array( 'core/block' ),
    'description'    => __( 'An About Us block pattern', 'aegis' ),
    'keywords'       => array( 'about', 'page' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( '' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0px","left":"0px"},"padding":{"bottom":"0","top":"var:preset|spacing|40"}}},"className":"what-we-do"} -->
	<div class="wp-block-columns alignwide what-we-do" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:0">
	<!-- wp:column {"verticalAlignment":"center","width":""} -->
	<div class="wp-block-column is-vertically-aligned-center">
	<!-- wp:group {"style":{"border":{"radius":{"topLeft":"500px","bottomLeft":"500px"}}},"gradient":"horizontal-primary-to-background","className":"aegis-left-top"} -->
	<div class="wp-block-group aegis-left-top has-horizontal-primary-to-background-gradient-background has-background" style="border-top-left-radius:500px;border-bottom-left-radius:500px">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"size-full aegis-right is-style-default"} -->
	<figure class="wp-block-image size-large size-full aegis-right is-style-default"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/hero-placeholder-1.jpg" alt="' . esc_attr__( 'Hero image representation', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
	<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
	<p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__( 'About Us', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300","lineHeight":"1.2"}},"fontSize":"x-large"} -->
	<p class="has-x-large-font-size" style="font-style:normal;font-weight:300;line-height:1.2"><strong>' . esc_html__( 'Street', 'aegis' ) . '</strong> ' . esc_html__( 'Fashion', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Street fashion, prevalent among individuals in public spaces like parks and malls, often draws inspiration from prevailing industry trends, popular culture, and social media.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:buttons -->
	<div class="wp-block-buttons">
	<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
	<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#0">' . esc_html__( 'Our Mission', 'aegis' ) . '</a></div>
	<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"backgroundColor":"secondary","className":"aegis-trusted-by is-style-aegis-border","layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignwide aegis-trusted-by is-style-aegis-border has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"verticalAlignment":"center","width":"48%"} -->
	<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:48%"><!-- wp:paragraph {"align":"center","fontSize":"large"} -->
	<p class="has-text-align-center has-large-font-size">' . esc_html__( 'Trusted by over&nbsp;', 'aegis' ) . '<strong>' . esc_html__( '700,000+&nbsp;', 'aegis' ) . '</strong>' . esc_html__( 'Clients worldwide since 2010', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"800"}},"fontSize":"huge"} -->
	<p class="has-text-align-center has-huge-font-size" style="font-style:normal;font-weight:800">' . esc_html__( '4.8', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"align":"center","style":{"typography":{"letterSpacing":"2px"}},"className":"aegis-rating"} -->
	<p class="has-text-align-center aegis-rating" style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">' . esc_html__( '5000 Ratings', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"800"}},"fontSize":"huge"} -->
	<p class="has-text-align-center has-huge-font-size" style="font-style:normal;font-weight:800">' . esc_html__( '2000+', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"align":"center","className":"aegis-rating"} -->
	<p class="has-text-align-center aegis-rating">' . esc_html__( 'Worldwide Sales per Year', 'aegis' ) . '</p>
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