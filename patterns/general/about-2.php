<?php
/**
 * About 2 Block Pattern
 */
return array(
    'title'          => __( 'About 2', 'aegis' ),
    'categories'     => array( 'aegis-about' ),
    'blockTypes'     => array( 'core/block' ),
    'description'    => __( 'An About Us block pattern', 'aegis' ),
    'keywords'       => array( 'about', 'page' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( '' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","right":"28px","left":"30px"}}},"className":"what-we-do","layout":{"contentSize":"","type":"constrained"}} -->
	<div class="wp-block-group alignfull what-we-do" style="padding-top:var(--wp--preset--spacing--60);padding-right:28px;padding-bottom:var(--wp--preset--spacing--60);padding-left:30px">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"verticalAlignment":"center","width":"43.33%"} -->
	<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:43.33%">
	<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
	<p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__( 'About Us', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300","lineHeight":"1","fontSize":"2.15rem"}}} -->
	<p style="font-size:2.15rem;font-style:normal;font-weight:300;line-height:1"><strong>' . esc_html__( 'Street', 'aegis' ) . '</strong> ' . esc_html__( 'Fashion for Women', 'aegis' ) . '</p>
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
	<!-- wp:column {"width":"56.66%","style":{"spacing":{"padding":{"left":"0"}}}} -->
	<div class="wp-block-column" style="padding-left:0;flex-basis:56.66%">
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'For women, street fashion encapsulates individual flair, melded with trending nuances. It spans from iconic staples to bold statements, offering boundless stylistic freedom.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:columns {"style":{"spacing":{"padding":{"top":"6%"}}}} -->
	<div class="wp-block-columns" style="padding-top:6%">
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"unset"}},"className":"tagline"} -->
	<figure class="wp-block-image size-full tagline"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/icon-1.jpg" alt="' . esc_attr__( 'Representation of a delivery truck', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size" id="a-small-heading">' . esc_html__( 'Free Shipping', 'aegis' ) . '</h2>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"fontSize":"ext-medium"} -->
	<p class="has-ext-medium-font-size">' . esc_html__( 'Your items will be shipped for free using our standard shipping method. Please allow 1-2 weeks for delivery.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"unset"}},"className":"tagline"} -->
	<figure class="wp-block-image size-full tagline"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/icon-2.jpg" alt="' . esc_attr__( 'Icon', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size" id="a-second-heading-1">' . esc_html__( 'Returns Guarantee', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph {"fontSize":"ext-medium"} -->
	<p class="has-ext-medium-font-size">' . esc_html__( 'The returns guarantee ensures a full reimbursement if your purchase does not meet your satisfaction.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->	
	<!-- wp:columns -->
	<div class="wp-block-columns">
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"unset"}},"className":"tagline"} -->
	<figure class="wp-block-image size-full tagline"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/icon-3.jpg" alt="' . esc_attr__( 'Icon', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size" id="a-second-heading">' . esc_html__( 'Secure Transactions', 'aegis' ) . '</h2>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"fontSize":"ext-medium"} -->
	<p class="has-ext-medium-font-size">' . esc_html__( 'Our secure transactions feature provides customers a diverse range of payment options, encompassing credit cards, debit cards, online payment services, and cash.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"unset"}},"className":"tagline"} -->
	<figure class="wp-block-image size-full tagline"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/icon-4.jpg" alt="' . esc_attr__( 'Icon', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size" id="a-third-heading">' . esc_html__( 'Online Support', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"fontSize":"ext-medium"} -->
	<p class="has-ext-medium-font-size">' . esc_html__( 'Our online support prioritizes swift, dependable, and constructive assistance. Reach out to us via email and chat for any inquiries.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
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