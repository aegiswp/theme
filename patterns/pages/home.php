<?php
/**
 * Home Page Pattern
 */
return array(
	'title'	  => __( 'Home', 'aegis' ),
	'categories' => array( 'aegis-pages' ),
	'content'	=> '<!-- wp:group {"align":"wide","className":"hero-sale","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide hero-sale"><!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","className":"left"} -->
	<div class="wp-block-column is-vertically-aligned-center left"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|30","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"is-style-aegis-border top","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-aegis-border top has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"400","textTransform":"uppercase","letterSpacing":"10px"}},"fontSize":"tiny"} -->
	<h2 class="has-text-align-center has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:10px;text-transform:uppercase">' . esc_html__( 'Winter Sale', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	
	<!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"gigantic"} -->
	<h3 class="has-text-align-center has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( '-40%', 'aegis' ) . '</h3>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","bottom":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small"} -->
	<p class="has-text-align-center has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-right:var(--wp--preset--spacing--50);padding-bottom:0;padding-left:var(--wp--preset--spacing--50)">' . esc_html__( 'Welcome to the winter fashion sale! Get ready to save on the latest looks!', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"border":{"radius":"0px"}},"className":"is-style-aegis-button-shadow","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button" style="border-radius:0px">' . esc_html__( 'Shop the Sale', 'aegis' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:group -->
	
	<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( '/assets/images/fashion-7.jpg' ) ) . '","dimRatio":0,"minHeight":325,"className":"is-style-aegis-hover-shadow bottom","style":{"color":{}}} -->
	<div class="wp-block-cover is-style-aegis-hover-shadow bottom" style="min-height:325px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="' . esc_attr__( 'Fashion & Style', 'aegis' ) . '" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-7.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"></div></div>
	<!-- /wp:cover --></div>
	<!-- /wp:column -->
	
	<!-- wp:column {"className":"right"} -->
	<div class="wp-block-column right"><!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( '/assets/images/fashion-4.jpg' ) ) . '","dimRatio":0,"focalPoint":{"x":0.63,"y":0.2},"minHeight":700,"isDark":false,"className":"is-style-aegis-hover-shadow","style":{"color":{}}} -->
	<div class="wp-block-cover is-light is-style-aegis-hover-shadow" style="min-height:700px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background" alt="' . esc_attr__( 'Fashion & Style', 'aegis' ) . '" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-4.jpg" style="object-position:63% 20%" data-object-fit="cover" data-object-position="63% 20%"/><div class="wp-block-cover__inner-container"></div></div>
	<!-- /wp:cover --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
	<!-- /wp:group -->
	
	

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"var:preset|spacing|40","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-right:30px;padding-bottom:0;padding-left:30px"><!-- wp:heading {"align":"wide","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
	<h2 class="alignwide" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'On Sale', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0"><!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small"} -->
	<p class="has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'Our winter fashion sale is now on, with up to 40% off select styles.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-default"} -->
	<hr class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-default"/>
	<!-- /wp:separator --></div>
	<!-- /wp:group -->
	
	<!-- wp:woocommerce/product-on-sale {"rows":1,"categories":[],"contentVisibility":{"image":true,"title":true,"price":true,"rating":true,"button":true},"stockStatus":["","instock","outofstock","onbackorder"],"orderby":"popularity","align":"wide"} /--></div>
	<!-- /wp:group -->
	
	

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","right":"60px","left":"60px"}}},"backgroundColor":"secondary","className":"is-style-default","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide is-style-default has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:60px;padding-bottom:var(--wp--preset--spacing--60);padding-left:60px"><!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","width":""} -->
	<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"300","fontSize":"3.6rem"}}} -->
	<h2 style="font-size:3.6rem;font-style:normal;font-weight:300"><strong>' . esc_html__( 'New', 'aegis' ) . '</strong> ' . esc_html__( 'Collection', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Welcome to our new fashion collection! This season, we are bringing you a fresh array of modern looks to keep your style on point. Whether you are looking for something classic or bold, this collection has something for everyone.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"},"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button" style="border-radius:0px">' . esc_html__( 'Shop Now', 'aegis' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:column -->
	
	<!-- wp:column {"width":"60%","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"floating-image"} -->
	<div class="wp-block-column floating-image" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);flex-basis:60%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-shadow-image image-one"} -->
	<figure class="wp-block-image size-large is-style-aegis-shadow-image image-one"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-3.jpg" alt="' . esc_attr__( 'Fashion & Style', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-shadow-image image-two"} -->
	<figure class="wp-block-image size-large is-style-aegis-shadow-image image-two"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-1.jpg" alt="' . esc_attr__( 'Fashion & Style', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-shadow-image image-three"} -->
	<figure class="wp-block-image size-large is-style-aegis-shadow-image image-three"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-2.jpg" alt="' . esc_attr__( 'Fashion & Style', 'aegis' ) . '" /></figure>
	<!-- /wp:image --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
	<!-- /wp:group -->
	
	

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"var:preset|spacing|40","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-right:30px;padding-bottom:0;padding-left:30px"><!-- wp:heading {"align":"wide","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
	<h2 class="alignwide" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'Newest Products', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0"><!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small"} -->
	<p class="has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'The newest fashion products in 2023 have been all about bold, daring and unique designs.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-default"} -->
	<hr class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-default"/>
	<!-- /wp:separator --></div>
	<!-- /wp:group -->
	
	<!-- wp:woocommerce/product-new {"columns":4,"rows":1,"categories":[],"align":"wide"} /--></div>
	<!-- /wp:group -->
	
	

	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","right":"60px","left":"60px"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"backgroundColor":"foreground","textColor":"background","className":"is-style-default","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide is-style-default has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--60);padding-right:60px;padding-bottom:var(--wp--preset--spacing--60);padding-left:60px"><!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide"><!-- wp:column {"width":"60%","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"floating-image"} -->
	<div class="wp-block-column floating-image" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);flex-basis:60%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-shadow-image image-one"} -->
	<figure class="wp-block-image size-full is-style-aegis-shadow-image image-one"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-3.jpg" alt="' . esc_attr__( 'Fashion & Style', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-shadow-image image-two"} -->
	<figure class="wp-block-image size-large is-style-aegis-shadow-image image-two"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-1.jpg" alt="' . esc_attr__( 'Fashion & Style', 'aegis' ) . '"/></figure>
	<!-- /wp:image -->
	
	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-aegis-shadow-image image-three"} -->
	<figure class="wp-block-image size-full is-style-aegis-shadow-image image-three"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-3.jpg" alt="' . esc_attr__( 'Fashion & Style', 'aegis' ) . '" /></figure>
	<!-- /wp:image --></div>
	<!-- /wp:column -->
	
	<!-- wp:column {"verticalAlignment":"center","width":""} -->
	<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"300","fontSize":"3.6rem"}}} -->
	<h2 style="font-size:3.6rem;font-style:normal;font-weight:300"><strong>' . esc_html__( 'On Sale', 'aegis' ) . '</strong> ' . esc_html__( 'Collection', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'It is time to freshen up your wardrobe with our latest fashion collection! From bold statement pieces to classic staples, our collection has something for everyone. Update your style today and be the trendsetter you know you are!', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"background","textColor":"foreground","style":{"border":{"radius":"0px"},"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background wp-element-button" style="border-radius:0px">' . esc_html__( 'Shop the Sale', 'aegis' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
	<!-- /wp:group -->
	
	

	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"var:preset|spacing|40","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-right:30px;padding-bottom:0;padding-left:30px"><!-- wp:heading {"align":"wide","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
	<h2 class="alignwide" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'Shop by Categories', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	
	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0"><!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small"} -->
	<p class="has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'Browse through our categories to find the perfect look for you.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-default"} -->
	<hr class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-default"/>
	<!-- /wp:separator --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40"}}},"className":"product-category","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide product-category" style="padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide"><!-- wp:column -->
	<div class="wp-block-column"><!-- wp:woocommerce/featured-category {"editMode":false,"focalPoint":{"x":0.52,"y":0.26},"imageFit":"cover","mediaId":2012,"mediaSrc":"' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-3.jpg","minHeight":566,"categoryId":19,"showDesc":false} -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
	<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="">' . esc_html__( 'Street Fashion', 'aegis' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	<!-- /wp:woocommerce/featured-category -->
	
	<!-- wp:woocommerce/featured-category {"editMode":false,"focalPoint":{"x":0.5,"y":0.67},"imageFit":"cover","mediaId":2009,"mediaSrc":"' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-2.jpg","minHeight":358,"categoryId":22,"showDesc":false} -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
	<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="">' . esc_html__( 'Jacket', 'aegis' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	<!-- /wp:woocommerce/featured-category --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:columns -->
	<div class="wp-block-columns"><!-- wp:column -->
	<div class="wp-block-column"><!-- wp:woocommerce/featured-category {"editMode":false,"focalPoint":{"x":0.5,"y":0.52},"imageFit":"cover","mediaId":2010,"mediaSrc":"' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-1.jpg","minHeight":424,"categoryId":17,"showDesc":false} -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
	<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="">' . esc_html__( 'Jeans', 'aegis' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	<!-- /wp:woocommerce/featured-category --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:woocommerce/featured-category {"editMode":false,"imageFit":"cover","mediaId":2011,"mediaSrc":"' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-4.jpg","minHeight":422,"categoryId":20,"showDesc":false} -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
	<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="">' . esc_html__( 'Shirts', 'aegis' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	<!-- /wp:woocommerce/featured-category --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns -->
	
	<!-- wp:woocommerce/featured-category {"editMode":false,"focalPoint":{"x":0.43,"y":0.2},"imageFit":"cover","mediaId":2008,"mediaSrc":"' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-5.jpg","minHeight":499,"categoryId":20,"showDesc":false,"textColor":"foreground"} -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"foreground","style":{"border":{"radius":"0px"},"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow"} -->
	<div class="wp-block-button is-style-aegis-button-shadow" style="font-style:normal;font-weight:600"><a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="" style="border-radius:0px">' . esc_html__( 'Bluse', 'aegis' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	<!-- /wp:woocommerce/featured-category --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
	<!-- /wp:group -->',
);
