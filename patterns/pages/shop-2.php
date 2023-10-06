<?php
/**
 * Shop 2 Page Block Pattern
 */
return array(
    'title'          => __( 'Shop 2', 'aegis' ),
    'categories'     => array( 'aegis-pages' ),
    'blockTypes'     => array( '' ),
    'description'    => __( 'A default shop page block pattern', 'aegis' ),
    'keywords'       => array( 'home', 'page', 'featured', 'shop' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( '' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( '/assets/images/fashion-placeholder-8.jpg' ) ) . '","dimRatio":60,"overlayColor":"foreground","focalPoint":{"x":0.81,"y":0.6},"minHeight":700,"align":"wide","className":"is-style-default"} -->
	<div class="wp-block-cover alignwide is-style-default" style="min-height:700px"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="' . esc_attr__( 'Background Image', 'aegis' ) . '" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-8.jpg" style="object-position:81% 60%" data-object-fit="cover" data-object-position="81% 60%"/>
	<div class="wp-block-cover__inner-container">
	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
	<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"10px"},"spacing":{"margin":{"top":"var:preset|spacing|30","right":"0","bottom":"0","left":"0"}}},"fontSize":"tiny"} -->
	<p class="has-tiny-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:0;margin-left:0;letter-spacing:10px;text-transform:uppercase">' . esc_html__( 'Winter Moon Sale', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"gigantic"} -->
	<h2 class="has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'Urban Fashion', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'It is the season to update your winter attire! Visit our Winter Moon Fashion Sale to discover the latest trends at unparalleled prices.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"}} -->
	<div class="wp-block-buttons">
	<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"border":{"radius":"0px"}},"className":"is-style-aegis-button-shadow","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px">' . esc_html__( 'Shop the Sale', 'aegis' ) . '</a></div>
	<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
	</div>
	</div>
	<!-- /wp:cover -->	
	<!-- wp:woocommerce/all-products {"columns":4,"rows":2,"alignButtons":false,"contentVisibility":{"orderBy":true},"orderby":"date","layoutConfig":[["woocommerce/product-image",{"imageSizing":"cropped"}],["woocommerce/product-title"],["woocommerce/product-price"],["woocommerce/product-rating"],["woocommerce/product-button"]],"align":"wide"} -->
	<div class="wp-block-woocommerce-all-products alignwide wc-block-all-products" data-attributes="{&quot;align&quot;:&quot;wide&quot;,&quot;alignButtons&quot;:false,&quot;columns&quot;:4,&quot;contentVisibility&quot;:{&quot;orderBy&quot;:true},&quot;isPreview&quot;:false,&quot;layoutConfig&quot;:[[&quot;woocommerce/product-image&quot;,{&quot;imageSizing&quot;:&quot;cropped&quot;}],[&quot;woocommerce/product-title&quot;],[&quot;woocommerce/product-price&quot;],[&quot;woocommerce/product-rating&quot;],[&quot;woocommerce/product-button&quot;]],&quot;orderby&quot;:&quot;date&quot;,&quot;rows&quot;:2}"></div>
	<!-- /wp:woocommerce/all-products -->',
);