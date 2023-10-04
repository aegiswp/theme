<?php
/**
 * Contact 2 Block Pattern
 */
return array(
    'title'          => __( 'Contact 2', 'aegis' ),
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
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"30px"}}},"gradient":"diagonal-secondary-to-foreground","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-diagonal-secondary-to-foreground-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
	<!-- wp:heading {"level":1,"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
	<h1 class="alignwide" style="margin-bottom:var(--wp--preset--spacing--50)">' . esc_html__( 'Get in Touch', 'aegis' ) . '</h1>
	<!-- /wp:heading -->	
	<!-- wp:columns {"verticalAlignment":"top","align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-top" style="padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:column {"verticalAlignment":"top","width":"50%","style":{"spacing":{"padding":{"right":"10%"}}}} -->
	<div class="wp-block-column is-vertically-aligned-top" style="padding-right:10%;flex-basis:50%">
	<!-- wp:paragraph {"fontSize":"medium"} -->
	<p class="has-medium-font-size">' . esc_html__( 'For any inquiries, please call or visit us. We are at your service.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Should you have inquiries or wish to connect, kindly complete the form below. We will respond promptly.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column {"verticalAlignment":"top"} -->
	<div class="wp-block-column is-vertically-aligned-top">
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size">' . esc_html__( 'Shop', 'aegis' ) . '</h2>
	<!-- /wp:heading -->	
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Calle 123', 'aegis' ) . '<br>' . esc_html__( 'Barrio Esperanza', 'aegis' ) . '<br>' . esc_html__( 'Bogotá, 110821, Colombia', 'aegis' ) . '<br>' . esc_html__( '+57 (0)311 8968 3325', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"verticalAlignment":"top"} -->
	<div class="wp-block-column is-vertically-aligned-top">
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size">' . esc_html__( 'Headquarters', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Calle 123', 'aegis' ) . '<br>' . esc_html__( 'Barrio Esperanza', 'aegis' ) . '<br>' . esc_html__( 'Bogotá, 110821, Colombia', 'aegis' ) . '<br>' . esc_html__( '+57 (0)311 8968 3325', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	
	<!-- wp:image {"align":"full","sizeSlug":"large","linkDestination":"none"} -->
	<figure class="wp-block-image alignfull size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/hero-placeholder-1.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:group -->',
);