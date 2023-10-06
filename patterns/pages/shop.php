<?php
/**
 * Shop Page Block Pattern
 */
return array(
    'title'          => __( 'Shop', 'aegis' ),
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
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","right":"30px","left":"30px"}}},"className":"blog-sidebar","layout":{"inherit":false}} -->
	<div class="wp-block-group alignfull blog-sidebar" style="padding-top:var(--wp--preset--spacing--30);padding-right:30px;padding-bottom:var(--wp--preset--spacing--30);padding-left:30px">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"width":"26%"} -->
	<div class="wp-block-column" style="flex-basis:26%"><!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
	<!-- wp:heading {"level":3,"fontSize":"large"} -->
	<h3 class="has-large-font-size">' . esc_html__( 'Categories', 'aegis' ) . '</h3>
	<!-- /wp:heading -->	
	<!-- wp:woocommerce/product-categories {"hasImage":true} /-->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0rem","left":"0px"}}},"layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="padding-top:0px;padding-right:0px;padding-bottom:0rem;padding-left:0px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:woocommerce/filter-wrapper {"filterType":"price-filter","heading":"Filter by price"} -->
	<div class="wp-block-woocommerce-filter-wrapper">
	<!-- wp:heading {"level":3,"fontSize":"large"} -->
	<h3 class="has-large-font-size">' . esc_html__( 'Filter by Price', 'aegis' ) . '</h3>
	<!-- /wp:heading -->
	<!-- wp:woocommerce/price-filter {"inlineInput":true,"heading":"","lock":{"remove":true}} -->
	<div class="wp-block-woocommerce-price-filter is-loading" data-showinputfields="true" data-showfilterbutton="false" data-heading="" data-heading-level="3"><span aria-hidden="true" class="wc-block-product-categories__placeholder"></span></div>
	<!-- /wp:woocommerce/price-filter -->
	</div>
	<!-- /wp:woocommerce/filter-wrapper -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0rem","right":"0rem","bottom":"0rem","left":"0rem"}}},"className":"is-style-default aegis-team-additional","layout":{"inherit":false,"contentSize":"1200px","type":"constrained"}} -->
	<div class="wp-block-group alignwide is-style-default aegis-team-additional" style="padding-top:0rem;padding-right:0rem;padding-bottom:0rem;padding-left:0rem">
	<!-- wp:woocommerce/filter-wrapper {"filterType":"rating-filter","heading":"Filter by rating"} -->
	<div class="wp-block-woocommerce-filter-wrapper">
	<!-- wp:heading {"level":3,"fontSize":"large"} -->
	<h3 class="has-large-font-size">' . esc_html__( 'Filter by Rating', 'aegis' ) . '</h3>
	<!-- /wp:heading -->
	<!-- wp:woocommerce/rating-filter {"lock":{"remove":true}} -->
	<div class="wp-block-woocommerce-rating-filter is-loading" data-show-counts="true">
	<span aria-hidden="true" class="wc-block-product-rating-filter__placeholder"></span>
	</div>
	<!-- /wp:woocommerce/rating-filter -->
	</div>
	<!-- /wp:woocommerce/filter-wrapper -->
	</div>
	<!-- /wp:group -->
	<!-- wp:woocommerce/filter-wrapper {"filterType":"stock-filter","heading":"Filter by stock status"} -->
	<div class="wp-block-woocommerce-filter-wrapper">
	<!-- wp:heading {"level":3,"fontSize":"large"} -->
	<h3 class="has-large-font-size">' . esc_html__( 'Filter by stock status', 'aegis' ) . '</h3>
	<!-- /wp:heading -->	
	<!-- wp:woocommerce/stock-filter {"heading":"","lock":{"remove":true}} -->
	<div class="wp-block-woocommerce-stock-filter is-loading" data-show-counts="true" data-heading="" data-heading-level="3">
	<span aria-hidden="true" class="wc-block-product-stock-filter__placeholder"></span>
	</div>
	<!-- /wp:woocommerce/stock-filter -->
	</div>
	<!-- /wp:woocommerce/filter-wrapper -->
	<!-- wp:woocommerce/reviews-by-product {"editMode":false,"imageType":"product","showLoadMore":false,"showOrderby":false,"productId":1991} -->
	<div class="wp-block-woocommerce-reviews-by-product wc-block-reviews-by-product has-image has-name has-date has-rating has-content" data-image-type="product" data-orderby="most-recent" data-reviews-on-page-load="10" data-reviews-on-load-more="10" data-show-load-more="false" data-show-orderby="false" data-product-id="1991"></div>
	<!-- /wp:woocommerce/reviews-by-product -->
	<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search products…","buttonText":"Search","query":{"post_type":"product"}} /-->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"width":"74%"} -->
	<div class="wp-block-column" style="flex-basis:74%">
	<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"className":"additional-column-padding-left"} -->
	<div class="wp-block-group alignfull additional-column-padding-left" style="margin-top:0;margin-bottom:0;padding-right:0;padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"className":"is-style-default","layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group is-style-default">
	<!-- wp:woocommerce/all-products {"columns":3,"rows":3,"alignButtons":false,"contentVisibility":{"orderBy":true},"orderby":"date","layoutConfig":[["woocommerce/product-image",{"imageSizing":"cropped"}],["woocommerce/product-title"],["woocommerce/product-price"],["woocommerce/product-rating"],["woocommerce/product-button"]],"align":"wide"} -->
	<div class="wp-block-woocommerce-all-products alignwide wc-block-all-products" data-attributes="{&quot;align&quot;:&quot;wide&quot;,&quot;alignButtons&quot;:false,&quot;columns&quot;:3,&quot;contentVisibility&quot;:{&quot;orderBy&quot;:true},&quot;isPreview&quot;:false,&quot;layoutConfig&quot;:[[&quot;woocommerce/product-image&quot;,{&quot;imageSizing&quot;:&quot;cropped&quot;}],[&quot;woocommerce/product-title&quot;],[&quot;woocommerce/product-price&quot;],[&quot;woocommerce/product-rating&quot;],[&quot;woocommerce/product-button&quot;]],&quot;orderby&quot;:&quot;date&quot;,&quot;rows&quot;:3}"></div>
	<!-- /wp:woocommerce/all-products --></div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->',
);