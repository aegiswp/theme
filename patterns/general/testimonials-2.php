<?php
/**
 * Testimonials 2 Block Pattern
 */
return array(
    'title'          => __( 'Testimonials 2', 'aegis' ),
    'categories'     => array( 'aegis-testimonials' ),
    'blockTypes'     => array( '' ),
    'description'    => __( 'A default team block pattern', 'aegis' ),
    'keywords'       => array( 'team', 'navigation', 'portfolio' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( '' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"className":"testimonials","layout":{"contentSize":"","type":"constrained"}} -->
	<div class="wp-block-group alignfull testimonials" style="padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px"><!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide"><!-- wp:column {"style":{"spacing":{"padding":{"bottom":"10px"}}}} -->
	<div class="wp-block-column" style="padding-bottom:10px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:paragraph {"align":"right","className":"quote-mark","fontSize":"huge"} -->
	<p class="has-text-align-right quote-mark has-huge-font-size">' . esc_html__( '❞', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size"><strong>' . esc_html__( 'Excelent Work', 'aegis' ) . '</strong></h2>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"className":"rating","fontSize":"tiny"} -->
	<p class="rating has-tiny-font-size" style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:quote {"className":"is-style-default"} -->
	<blockquote class="wp-block-quote is-style-default"><!-- wp:paragraph -->
	<p>' . esc_html__( 'I hold great admiration for the attire from this boutique. Consistently, I discover impeccable pieces suitable for various events, and the quality is unparalleled. The pricing structure is also commendable, allowing for extensive purchases without undue financial strain.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</blockquote>
	<!-- /wp:quote -->
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
	<div class="wp-block-group"><!-- wp:image {"width":100,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
	<figure class="wp-block-image size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-1.jpg" alt="' . esc_attr__( 'Member', 'aegis' ) . '" width="100"/></figure>
	<!-- /wp:image -->
	<!-- wp:heading {"fontSize":"medium"} -->
	<h2 class="has-medium-font-size" id="a-small-heading"><strong>' . esc_html__( 'Clara Mitchell', 'aegis' ) . '</strong></h2>
	<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"10px"}}}} -->
	<div class="wp-block-column" style="padding-bottom:10px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:paragraph {"align":"right","className":"quote-mark","fontSize":"huge"} -->
	<p class="has-text-align-right quote-mark has-huge-font-size">' . esc_html__( '❞', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size"><strong>' . esc_html__( 'Great Job', 'aegis' ) . '</strong></h2>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"className":"rating","fontSize":"tiny"} -->
	<p class="rating has-tiny-font-size" style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:quote {"className":"is-style-default"} -->
	<blockquote class="wp-block-quote is-style-default">
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'I am a big fan of shopping at Aegis! They have a fantastic range of clothes at good prices. Whether I need something casual or formal, they have got me covered. Plus, the quality is always on point.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</blockquote>
	<!-- /wp:quote -->	
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
	<div class="wp-block-group">
	<!-- wp:image {"width":100,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
	<figure class="wp-block-image size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-3.jpg" alt="' . esc_attr__( 'Member', 'aegis' ) . '" width="100"/></figure>
	<!-- /wp:image -->
	<!-- wp:heading {"fontSize":"medium"} -->
	<h2 class="has-medium-font-size" id="a-small-heading"><strong>' . esc_html__( 'Sofia Castellanos', 'aegis' ) . '</strong></h2>
	<!-- /wp:heading --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group --></div>
	<!-- /wp:column -->
	<!-- wp:column {"style":{"spacing":{"padding":{"bottom":"10px"}}}} -->
	<div class="wp-block-column" style="padding-bottom:10px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"background","className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:paragraph {"align":"right","className":"quote-mark","fontSize":"huge"} -->
	<p class="has-text-align-right quote-mark has-huge-font-size">' . esc_html__( '❞', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size"><strong>' . esc_html__( 'Excelent Work', 'aegis' ) . '</strong></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px"}},"className":"rating","fontSize":"tiny"} -->
	<p class="rating has-tiny-font-size" style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:quote {"className":"is-style-default"} -->
	<blockquote class="wp-block-quote is-style-default"><!-- wp:paragraph -->
	<p>' . esc_html__( 'I hold great admiration for the attire from this boutique. Consistently, I discover impeccable pieces suitable for various events, and the quality is unparalleled. The pricing structure is also commendable, allowing for extensive purchases without undue financial strain.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</blockquote>
	<!-- /wp:quote -->	
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
	<div class="wp-block-group">
	<!-- wp:image {"width":100,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
	<figure class="wp-block-image size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-4.jpg" alt="' . esc_attr__( 'Member', 'aegis' ) . '" width="100"/></figure>
	<!-- /wp:image -->	
	<!-- wp:heading {"fontSize":"medium"} -->
	<h2 class="has-medium-font-size" id="a-small-heading"><strong>' . esc_html__( 'Adrian Blackwood', 'aegis' ) . '</strong></h2>
	<!-- /wp:heading --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
	<!-- /wp:group -->',
);