<?php
/**
 * Hero 4 Block Pattern
 */
return array(
    'title'          => __( 'Hero 4', 'aegis' ),
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
    'content'        => '<!-- wp:media-text {"mediaType":"image","mediaWidth":42,"imageFill":false} -->
    <div class="wp-block-media-text alignwide is-stacked-on-mobile" style="grid-template-columns:42% auto"><figure class="wp-block-media-text__media"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-4.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '"/></figure>
	<div class="wp-block-media-text__content"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"10px"},"spacing":{"margin":{"top":"var:preset|spacing|30","right":"0","bottom":"0","left":"0"}}},"fontSize":"tiny"} -->
	<p class="has-tiny-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-right:0;margin-bottom:0;margin-left:0;letter-spacing:10px;text-transform:uppercase">' . esc_html__( 'Winter Moon Sale', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"gigantic"} -->
	<h2 class="has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">' . esc_html__( 'Urban Fashion', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Embark on a winter moon style rejuvenation! Explore our Winter Street Fashion Sale for the season s most sought-after ensembles at unmatched values.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"}} -->
	<div class="wp-block-buttons">
	<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"border":{"radius":"0px"}},"className":"is-style-aegis-button-shadow","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-aegis-button-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:0px">' . esc_html__( 'Shop the Sale', 'aegis' ) . '</a></div>
	<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
	</div>
	</div>
	<!-- /wp:media-text -->',
);