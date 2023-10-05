<?php
/**
 * Testimonials 1 Block Pattern
 */
return array(
    'title'          => __( 'Testimonials 1', 'aegis' ),
    'categories'     => array( 'aegis-testimonials' ),
    'blockTypes'     => array( '' ),
    'description'    => __( 'A default team block pattern', 'aegis' ),
    'keywords'       => array( 'team', 'navigation', 'portfolio' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( '' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"className":"testimonials","layout":{"contentSize":"","type":"constrained"}} -->
	<div class="wp-block-group alignfull testimonials" style="padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"10px"}}}} -->
	<div class="wp-block-column" style="padding-bottom:10px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"radius":{"bottomRight":"0px"},"top":{"color":"var:preset|color|senary","width":"4px"}}},"backgroundColor":"secondary","className":"is-style-default"} -->
	<div class="wp-block-group is-style-default has-secondary-background-color has-background" style="border-bottom-right-radius:0px;border-top-color:var(--wp--preset--color--senary);border-top-width:4px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:quote {"className":"is-style-default"} -->
	<blockquote class="wp-block-quote is-style-default">
	<!-- wp:paragraph -->
	<p>' . esc_html__( '"I am thoroughly satisfied with my recent acquisitions from Aegis. The designs are contemporary and chic, while the materials exhibit a tactile elegance. Upon wearing these selections, I garnered numerous commendations. Opting for Aegis for my wardrobe augmentation was a judicious choice."', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</blockquote>
	<!-- /wp:quote -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"5%","right":"5%","bottom":"5%","left":"5%"}},"border":{"radius":"0px"}},"gradient":"diagonal-background-to-secondary-triangle","className":"negative-margin"} -->
	<div class="wp-block-group negative-margin has-diagonal-background-to-secondary-triangle-gradient-background has-background" style="border-radius:0px;padding-top:5%;padding-right:5%;padding-bottom:5%;padding-left:5%">
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"right"}} -->
	<div class="wp-block-group">
	<!-- wp:heading {"fontSize":"medium"} -->
	<h2 class="has-medium-font-size" id="a-small-heading">' . esc_html__( 'Clara Mitchell', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:image {"width":100,"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"100px"}},"className":"is-style-aegis-shadow-image"} -->
	<figure class="wp-block-image size-large is-resized has-custom-border is-style-aegis-shadow-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholders-1.jpg" alt="' . esc_attr__( 'Member', 'aegis' ) . '" style="border-radius:100px" width="100"/></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"10px"}}}} -->
	<div class="wp-block-column" style="padding-bottom:10px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"radius":"0px","top":{"color":"var:preset|color|senary","width":"4px"}}},"backgroundColor":"secondary","className":"is-style-default"} -->
	<div class="wp-block-group is-style-default has-secondary-background-color has-background" style="border-radius:0px;border-top-color:var(--wp--preset--color--senary);border-top-width:4px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:quote {"className":"is-style-default"} -->
	<blockquote class="wp-block-quote is-style-default">
	<!-- wp:paragraph -->
	<p>' . esc_html__( '"I really love the clothes from this boutique. I always find just what I need for any event, and the quality is top-notch. Plus, the prices are affordable, so I can buy more without spending a fortune."', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</blockquote>
	<!-- /wp:quote -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"5%","right":"5%","bottom":"5%","left":"5%"}},"border":{"radius":"0px"}},"gradient":"diagonal-background-to-secondary-triangle","className":"negative-margin"} -->
	<div class="wp-block-group negative-margin has-diagonal-background-to-secondary-triangle-gradient-background has-background" style="border-radius:0px;padding-top:5%;padding-right:5%;padding-bottom:5%;padding-left:5%"><!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"right"}} -->
	<div class="wp-block-group">
	<!-- wp:heading {"fontSize":"medium"} -->
	<h2 class="has-medium-font-size" id="a-small-heading">' . esc_html__( 'Sofia Castellanos', 'aegis' ) . '</h2>
	<!-- /wp:heading -->	
	<!-- wp:image {"width":100,"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"100px"}},"className":"is-style-aegis-shadow-image"} -->
	<figure class="wp-block-image size-large is-resized has-custom-border is-style-aegis-shadow-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-3.jpg" alt="' . esc_attr__( 'Member', 'aegis' ) . '" style="border-radius:100px" width="100"/></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"10px"}}}} -->
	<div class="wp-block-column" style="padding-bottom:10px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"radius":"0px","top":{"color":"var:preset|color|senary","width":"4px"}}},"backgroundColor":"secondary","className":"is-style-default"} -->
	<div class="wp-block-group is-style-default has-secondary-background-color has-background" style="border-radius:0px;border-top-color:var(--wp--preset--color--senary);border-top-width:4px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:quote {"className":"is-style-default"} -->
	<blockquote class="wp-block-quote is-style-default">
	<!-- wp:paragraph -->
	<p>' . esc_html__( '"I am a big fan of shopping at Aegis! They have a fantastic range of clothes at good prices. Whether I need something casual or formal, they have got me covered. Plus, the quality is always on point."', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</blockquote>
	<!-- /wp:quote -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"5%","right":"5%","bottom":"5%","left":"5%"}},"border":{"radius":"0px"}},"gradient":"diagonal-background-to-secondary-triangle","className":"negative-margin"} -->
	<div class="wp-block-group negative-margin has-diagonal-background-to-secondary-triangle-gradient-background has-background" style="border-radius:0px;padding-top:5%;padding-right:5%;padding-bottom:5%;padding-left:5%">
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"right"}} -->
	<div class="wp-block-group"><!-- wp:heading {"fontSize":"medium"} -->
	<h2 class="has-medium-font-size" id="a-small-heading">' . esc_html__( 'Adrian Blackwood', 'aegis' ) . '</h2>
	<!-- /wp:heading -->	
	<!-- wp:image {"width":100,"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"100px"}},"className":"is-style-aegis-shadow-image"} -->
	<figure class="wp-block-image size-large is-resized has-custom-border is-style-aegis-shadow-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-4.jpg" alt="' . esc_attr__( 'Member', 'aegis' ) . '" style="border-radius:100px" width="100"/></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->',
);