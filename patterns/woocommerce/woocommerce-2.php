<?php
/**
 * WooCommerce 2 Block Pattern
 */
return array(
    'title'          => __( 'WooCommerce 2', 'aegis' ),
    'categories'     => array( 'aegis-woocommerce' ),
    'blockTypes'     => array( 'core/block' ),
    'description'    => __( 'A shopping block pattern', 'aegis' ),
    'keywords'       => array( 'shop', 'woocommerce' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( '' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"30px","left":"30px"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-2-image is-style-aegis-effect-2-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-2-image is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-4.jpg" alt="' . esc_attr__( 'Image of a product', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"background","className":"aegis-negative-margin-top is-style-aegis-hover-shadow"} -->
	<div class="wp-block-group aegis-negative-margin-top is-style-aegis-hover-shadow has-background-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group">
	<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"textColor":"foreground","fontSize":"tiny"} -->
	<p class="has-foreground-color has-text-color has-tiny-font-size" style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph -->
	<p><strong>' . esc_html__( '$24', 'aegis' ) . '</strong></p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size"><strong>' . esc_html__( 'Leather Jacket', 'aegis' ) . '</strong></h2>
	<!-- /wp:heading -->	
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Fusce gravida ut nisi et facilisis. Nullam ut mi fermentum, posuere dolor id, ultricies ipsum. Duis urna ipsum, tincidunt ut lorem.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons -->
	<div class="wp-block-buttons">
	<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow is-style-aegis-button-shadow","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Shop Now', 'aegis' ) . '</a></div>
	<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-2-image is-style-aegis-effect-2-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-2-image is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-5.jpg" alt="' . esc_attr__( 'Image of a product', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"background","className":"aegis-negative-margin-top is-style-aegis-hover-shadow"} -->
	<div class="wp-block-group aegis-negative-margin-top is-style-aegis-hover-shadow has-background-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group">
	<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"textColor":"foreground","fontSize":"tiny"} -->
	<p class="has-foreground-color has-text-color has-tiny-font-size" style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph -->
	<p><strong>' . esc_html__( '$46', 'aegis' ) . '</strong></p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:group -->	
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size">' . esc_html__( 'Sleeve T-Shirt', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Fusce gravida ut nisi et facilisis. Nullam ut mi fermentum, posuere dolor id, ultricies ipsum. Duis urna ipsum, tincidunt ut lorem.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:buttons -->
	<div class="wp-block-buttons">
	<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow is-style-aegis-button-shadow","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Shop Now', 'aegis' ) . '</a></div>
	<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-2-image is-style-aegis-effect-2-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-2-image is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-6.jpg" alt="' . esc_attr__( 'Image of a product', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"background","className":"aegis-negative-margin-top is-style-aegis-hover-shadow"} -->
	<div class="wp-block-group aegis-negative-margin-top is-style-aegis-hover-shadow has-background-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"textColor":"foreground","fontSize":"tiny"} -->
	<p class="has-foreground-color has-text-color has-tiny-font-size" style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph -->
	<p><strong>' . esc_html__( '94$', 'aegis' ) . '</strong></p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size"><strong>' . esc_html__( 'Urban Jacket', 'aegis' ) . '</strong></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Fusce gravida ut nisi et facilisis. Nullam ut mi fermentum, posuere dolor id, ultricies ipsum. Duis urna ipsum, tincidunt ut lorem.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:buttons -->
	<div class="wp-block-buttons">
	<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-aegis-button-shadow is-style-aegis-button-shadow","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Shop Now', 'aegis' ) . '</a></div>
	<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->',
);