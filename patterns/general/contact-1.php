<?php
/**
 * Contact 1 Block Pattern
 */
return array(
    'title'          => __( 'Contact 1', 'aegis' ),
    'categories'     => array( 'aegis-contact' ),
    'blockTypes'     => array( 'core/page' ),
    'description'    => __( 'An Contact Us block pattern', 'aegis' ),
    'keywords'       => array( 'contact', 'page', 'form' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( '' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|50","right":"30px","left":"30px"}}},"layout":{"contentSize":"","type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--80);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0%","right":"0%","bottom":"0%","left":"0%"}},"border":{"radius":"0px"}},"backgroundColor":"foreground"} -->
	<div class="wp-block-group alignwide has-foreground-background-color has-background" style="border-radius:0px;padding-top:0%;padding-right:0%;padding-bottom:0%;padding-left:0%">
	<!-- wp:group {"style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"backgroundColor":"secondary","className":"left-bottom"} -->
	<div class="wp-block-group left-bottom has-secondary-background-color has-background" style="border-radius:0px;padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"width":"80%"} -->
	<div class="wp-block-column" style="flex-basis:80%">
	<!-- wp:heading {"textColor":"black","fontSize":"gigantic"} -->
	<h2 class="has-black-color has-text-color has-gigantic-font-size" id="ready-to-grow-your-online-business"><strong>' . esc_html__( 'Contact Us', 'aegis' ) . ' </strong></h2>
	<!-- /wp:heading -->	
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Should you have inquiries or wish to connect, kindly complete the form below. We will respond promptly.', 'aegis' ) . ' </p>
	<!-- /wp:paragraph -->	
	<!-- wp:columns -->
	<div class="wp-block-columns">
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"large"} -->
	<h3 class="has-text-align-left has-large-font-size" id="tel" style="font-style:normal;font-weight:600">' . esc_html__( 'Telephone:', 'aegis' ) . ' </h3>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"left"} -->
	<p class="has-text-align-left">' . esc_html__( '+57 (0)311 8968 3325', 'aegis' ) . ' </p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"large"} -->
	<h3 class="has-text-align-left has-large-font-size" id="tel" style="font-style:normal;font-weight:600">' . esc_html__( 'Address:', 'aegis' ) . ' </h3>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"left"} -->
	<p class="has-text-align-left">' . esc_html__( 'Address Line 1', 'aegis' ) . ' </p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"large"} -->
	<h3 class="has-text-align-left has-large-font-size" id="tel" style="font-style:normal;font-weight:600">' . esc_html__( 'Address:', 'aegis' ) . ' </h3>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"align":"left"} -->
	<p class="has-text-align-left">' . esc_html__( 'contact@domain.com', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->	
	<!-- wp:spacer {"height":"30px","className":"ext-my-0"} -->
	<div style="height:30px" aria-hidden="true" class="wp-block-spacer ext-my-0"></div>
	<!-- /wp:spacer -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column {"width":"20%"} -->
	<div class="wp-block-column" style="flex-basis:20%"></div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->	
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"width":"100%"} -->
	<div class="wp-block-column" style="flex-basis:100%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
	<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/hero-placeholder-1.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->',
);