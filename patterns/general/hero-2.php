<?php
/**
 * Hero 2 Block Pattern
 */
return array(
    'title'          => __( 'Hero 2', 'aegis' ),
    'categories'     => array( 'aegis-hero' ),
    'blockTypes'     => array( 'core/page' ),
    'description'    => __( 'Hero block pattern', 'aegis' ),
    'keywords'       => array( 'hero', 'featured' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( '' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","right":"30px","left":"30px"}}},"gradient":"vertical-background-to-foreground","className":"grid-gallery","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull grid-gallery has-vertical-background-to-foreground-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--70);padding-right:30px;padding-bottom:var(--wp--preset--spacing--70);padding-left:30px">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"verticalAlignment":"center"} -->
	<div class="wp-block-column is-vertically-aligned-center">
	<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"gigantic"} -->
	<h2 class="has-gigantic-font-size" style="font-style:normal;font-weight:300"><strong>' . esc_html__( 'New', 'aegis' ) . '</strong> ' . esc_html__( 'Collection', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|80","bottom":"0","left":"0"}}},"className":"mobile-padding-paragraph"} -->
	<p class="mobile-padding-paragraph" style="padding-top:0;padding-right:var(--wp--preset--spacing--80);padding-bottom:0;padding-left:0">' . esc_html__( 'Introducing our latest fashion ensemble! This season, immerse in a curated selection of contemporary aesthetics to elevate your fashion quotient. Be it timeless elegance or audacious designs, our collection caters to diverse tastes.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons -->
	<div class="wp-block-buttons">
	<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
	<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Shop Now', 'aegis' ) . '</a></div>
	<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:columns -->
	<div class="wp-block-columns">
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-3-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder4.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"hide-mobile is-style-aegis-effect-3-image"} -->
	<figure class="wp-block-image size-large hide-mobile is-style-aegis-effect-3-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-5.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"hide-mobile is-style-aegis-effect-3-image"} -->
	<figure class="wp-block-image size-large hide-mobile is-style-aegis-effect-3-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-5.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"hide-mobile is-style-aegis-effect-3-image"} -->
	<figure class="wp-block-image size-large hide-mobile is-style-aegis-effect-3-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-6.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->',
);