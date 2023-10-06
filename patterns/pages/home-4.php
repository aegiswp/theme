<?php
/**
 * Home Page 4 Block Pattern
 */
return array(
    'title'          => __( 'Home 4', 'aegis' ),
    'categories'     => array( 'aegis-pages' ),
    'blockTypes'     => array( '' ),
    'description'    => __( 'A default home page block pattern', 'aegis' ),
    'keywords'       => array( 'home', 'page', 'featured' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( '' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","right":"30px","left":"30px"}}},"className":"is-style-default","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull is-style-default" style="padding-top:var(--wp--preset--spacing--40);padding-right:30px;padding-bottom:var(--wp--preset--spacing--40);padding-left:30px"><!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"verticalAlignment":"center","width":""} -->
	<div class="wp-block-column is-vertically-aligned-center">
	<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"300","fontSize":"3.6rem"}}} -->
	<h2 style="font-size:3.6rem;font-style:normal;font-weight:300"><strong>' . esc_html__( 'New', 'aegis' ) . '</strong> ' . esc_html__( 'Arrivals', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Introducing our latest fashion ensemble! This season, we present a curated range of contemporary aesthetics to enhance your style. Be it classic elegance or audacious designs, our collection caters to diverse preferences.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:buttons -->
	<div class="wp-block-buttons">
	<!-- wp:button {"style":{"border":{"radius":"0px"},"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button" style="border-radius:0px">' . esc_html__( 'Shop Now', 'aegis' ) . '</a></div>
	<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"width":"60%","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"floating-image"} -->
	<div class="wp-block-column floating-image" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);flex-basis:60%">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-shadow-image image-one"} -->
	<figure class="wp-block-image size-large is-style-aegis-shadow-image image-one"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-3.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-shadow-image image-two"} -->
	<figure class="wp-block-image size-large is-style-aegis-shadow-image image-two"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-1.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-shadow-image image-three"} -->
	<figure class="wp-block-image size-large is-style-aegis-shadow-image image-three"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-2.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"var:preset|spacing|30","bottom":"0"}}},"gradient":"vertical-background-to-secondary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-vertical-background-to-secondary-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:30px;padding-bottom:0;padding-left:30px">
	<!-- wp:heading {"align":"wide","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
	<h2 class="alignwide" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'On Sale', 'aegis' ) . '</h2>
	<!-- /wp:heading -->	
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0"><!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small"} -->
	<p class="has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'Our winter fashion promotion is currently underway, offering reductions of up to 40% on selected styles.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="padding-top:10px">
	<!-- wp:woocommerce/product-on-sale {"rows":1,"categories":[],"contentVisibility":{"image":true,"title":true,"price":true,"rating":true,"button":true},"stockStatus":["","instock","outofstock","onbackorder"],"orderby":"popularity","align":"wide"} /-->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"30px","left":"30px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
	<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
	<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
	<p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__( 'About Us', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}}}} -->
	<h2 style="margin-top:0">' . esc_html__( 'Streetwear perpetually encourages our pursuit of distinctiveness.', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'For women, street fashion celebrates personal expression, seamlessly blending with trending nuances. From audacious highlights to enduring classics, it offers boundless stylistic versatility.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons -->
	<div class="wp-block-buttons">
	<!-- wp:button {"className":"is-style-aegis-button-shadow is-style-aegis-button-shadow"} -->
	<div class="wp-block-button is-style-aegis-button-shadow is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#">' . esc_html__( 'Our Mission', 'aegis' ) . '</a></div>
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
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-2-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-4.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-2-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion--placeholder-6.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
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
	<!-- /wp:group -->
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"var:preset|spacing|30","bottom":"0"}}},"gradient":"vertical-background-to-secondary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-vertical-background-to-secondary-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:30px;padding-bottom:0;padding-left:30px">
	<!-- wp:heading {"align":"wide","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
	<h2 class="alignwide" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'On Sale', 'aegis' ) . '</h2>
	<!-- /wp:heading -->	
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0">
	<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small"} -->
	<p class="has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'Our winter fashion promotion is currently underway, offering reductions of up to 40% on selected styles.', 'aegis' ) . '</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:group -->	
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="padding-top:10px">
	<!-- wp:woocommerce/product-new {"columns":4,"rows":1,"categories":[],"align":"wide"} /-->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"30px","left":"30px"},"margin":{"bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
	<p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__( 'Reviews', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}}}} -->
	<h2 style="margin-top:0">' . esc_html__( 'Visit our establishment today and immerse yourself in fashion s pinnacle.', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"backgroundColor":"background","className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border has-background-background-color has-background" style="padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
	<!-- wp:columns -->
	<div class="wp-block-columns">
	<!-- wp:column {"width":"66.66%"} -->
	<div class="wp-block-column" style="flex-basis:66.66%">
	<!-- wp:paragraph -->
	<p><strong>' . esc_html__( 'Rose Smith', 'aegis' ) . '</strong></p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","fontSize":"10px"}},"textColor":"foreground","className":"aegis-rating"} -->
	<p class="aegis-rating has-foreground-color has-text-color" style="font-size:10px;letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"textColor":"foreground","fontSize":"small"} -->
	<p class="has-foreground-color has-text-color has-small-font-size">' . esc_html__( 'Fusce gravida ut nisi et facilisis. Nullam ut mi fermentum, posuere dolor id, ultricies ipsum. Duis urna ipsum, tincidunt ut lorem.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"width":"33.33%"} -->
	<div class="wp-block-column" style="flex-basis:33.33%">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-3-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-4.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-default"} -->
	<hr class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-default"/>
	<!-- /wp:separator -->
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
	<div class="wp-block-group">
	<!-- wp:image {"width":80,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
	<figure class="wp-block-image size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-1.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" width="80"/></figure>
	<!-- /wp:image -->
	<!-- wp:heading {"fontSize":"medium"} -->
	<h2 class="has-medium-font-size" id="a-small-heading">' . esc_html__( 'Leather Jacket', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"backgroundColor":"background","className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border has-background-background-color has-background" style="padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
	<!-- wp:columns -->
	<div class="wp-block-columns">
	<!-- wp:column {"width":"66.66%"} -->
	<div class="wp-block-column" style="flex-basis:66.66%">
	<!-- wp:paragraph -->
	<p><strong>' . esc_html__( 'Clara Mitchell', 'aegis' ) . '</strong></p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","fontSize":"10px"}},"textColor":"foreground","className":"aegis-rating"} -->
	<p class="aegis-rating has-foreground-color has-text-color" style="font-size:10px;letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"textColor":"foreground","fontSize":"small"} -->
	<p class="has-foreground-color has-text-color has-small-font-size">' . esc_html__( 'Fusce gravida ut nisi et facilisis. Nullam ut mi fermentum, posuere dolor id, ultricies ipsum. Duis urna ipsum, tincidunt ut lorem.', 'aegis' ) . '</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:column -->
	<!-- wp:column {"width":"33.33%"} -->
	<div class="wp-block-column" style="flex-basis:33.33%">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-3-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-5.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-default"} -->
	<hr class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-default"/>
	<!-- /wp:separator -->	
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
	<div class="wp-block-group"><!-- wp:image {"width":80,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
	<figure class="wp-block-image size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-4.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" width="80"/></figure>
	<!-- /wp:image -->	
	<!-- wp:heading {"fontSize":"medium"} -->
	<h2 class="has-medium-font-size" id="a-small-heading">' . esc_html__( 'Street T-Shirt', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"backgroundColor":"background","className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border has-background-background-color has-background" style="padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
	<!-- wp:columns -->
	<div class="wp-block-columns">
	<!-- wp:column {"width":"66.66%"} -->
	<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:paragraph -->
	<p><strong>' . esc_html__( 'Adrian Blackwood', 'aegis' ) . '</strong></p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","fontSize":"10px"}},"textColor":"foreground","className":"aegis-rating"} -->
	<p class="aegis-rating has-foreground-color has-text-color" style="font-size:10px;letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"textColor":"foreground","fontSize":"small"} -->
	<p class="has-foreground-color has-text-color has-small-font-size">' . esc_html__( 'Fusce gravida ut nisi et facilisis. Nullam ut mi fermentum, posuere dolor id, ultricies ipsum. Duis urna ipsum, tincidunt ut lorem.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"width":"33.33%"} -->
	<div class="wp-block-column" style="flex-basis:33.33%">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-3-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-6.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-default"} -->
	<hr class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-default"/>
	<!-- /wp:separator -->
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
	<div class="wp-block-group">
	<!-- wp:image {"width":80,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
	<figure class="wp-block-image size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-3.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" width="80"/></figure>
	<!-- /wp:image -->
	<!-- wp:heading {"fontSize":"medium"} -->
	<h2 class="has-medium-font-size" id="a-small-heading">' . esc_html__( 'Leather Jacket', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
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