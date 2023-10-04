<?php
/**
 * Hero 3 Block Pattern
 */
return array(
    'title'          => __( 'Hero 3', 'aegis' ),
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
    'content'        => '<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( '/assets/images/fashion-placeholder-4.jpg' ) ) . '","dimRatio":0,"focalPoint":{"x":0.63,"y":0.2},"minHeight":700,"isDark":false,"className":"is-style-aegis-hover-shadow","style":{"color":{}}} -->
	<div class="wp-block-cover is-light is-style-aegis-hover-shadow" style="min-height:700px">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="' . esc_attr__( 'Image', 'aegis' ) . '" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-4.jpg" style="object-position:63% 20%" data-object-fit="cover" data-object-position="63% 20%"/>
	<div class="wp-block-cover__inner-container">
	<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
	<p class="has-text-align-center has-large-font-size"></p>
	<!-- /wp:paragraph -->
	</div>
	</div>
	<!-- /wp:cover -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column {"verticalAlignment":"center"} -->
	<div class="wp-block-column is-vertically-aligned-center">
	<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( '/assets/images/fashion-placeholder-7.jpg' ) ) . '","dimRatio":0,"minHeight":325,"className":"is-style-aegis-hover-shadow","style":{"color":{}}} -->
	<div class="wp-block-cover is-style-aegis-hover-shadow" style="min-height:325px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="' . esc_attr__( 'Image', 'aegis' ) . '" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-7.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
	<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
	<p class="has-text-align-center has-large-font-size"></p>
	<!-- /wp:paragraph -->
	</div>
	</div>
	<!-- /wp:cover -->
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|30","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"is-style-aegis-border","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-aegis-border has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"400","textTransform":"uppercase","letterSpacing":"10px"}},"fontSize":"tiny"} -->
	<h2 class="has-text-align-center has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:10px;text-transform:uppercase">' . esc_html__( 'Snow Moon Sale', 'aegis' ) . '</h2>
	<!-- /wp:heading -->	
	<!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"gigantic"} -->
	<h3 class="has-text-align-center has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( '-40%', 'aegis' ) . '</h3>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","bottom":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small"} -->
	<p class="has-text-align-center has-small-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-right:var(--wp--preset--spacing--50);padding-bottom:0;padding-left:var(--wp--preset--spacing--50)">' . esc_html__( 'Introducing the Winter Moon fashion promotion! Prepare to avail discounts on contemporary ensembles!', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
	<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"border":{"radius":"0px"}},"className":"is-style-aegis-button-shadow","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button" style="border-radius:0px">' . esc_html__( 'Shop the Sale', 'aegis' ) . '</a></div>
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