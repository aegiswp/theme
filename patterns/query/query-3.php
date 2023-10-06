<?php
/**
 * Blog Layout 3 Block Pattern
 *
 * This pattern showcases a two-column layout with blog posts on the left and 
 * a profile section followed by an event promotion on the right.
 */
return array(
    'title'          => __( 'Blog Layout 3', 'aegis' ),
    'categories'     => array( 'aegis-query' ),
    'blockTypes'     => array( 'post', 'page' ),
    'description'    => __( 'A two-column layout showcasing blog posts alongside a profile and event promotion section.', 'aegis' ),
    'keywords'       => array( 'two-columns', 'profile', 'event', 'social links', 'promotion', 'call-to-action', 'blog', 'query', 'pagination', 'date', 'title', 'excerpt', 'featured image', 'layout' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( 'post', 'page' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"30px","left":"30px"}}},"className":"blog-sidebar","layout":{"inherit":false}} -->
	<div class="wp-block-group alignfull blog-sidebar" style="padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
	<!-- wp:group {"align":"wide","layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignwide">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"width":"66.66%"} -->
	<div class="wp-block-column" style="flex-basis:66.66%">
	<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0","padding":{"right":"var:preset|spacing|30"}}},"className":"additional-column-padding"} -->
	<div class="wp-block-group alignfull additional-column-padding" style="padding-right:var(--wp--preset--spacing--30)">
	<!-- wp:group {"className":"is-style-default","layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group is-style-default">
	<!-- wp:query {"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list"},"align":"wide","layout":{"inherit":false}} -->
	<div class="wp-block-query alignwide">
	<!-- wp:post-template -->
	<!-- wp:post-featured-image {"isLink":true,"style":{"color":{"duotone":"unset"}}} /-->
	<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"3rem"}}}} -->
	<div class="wp-block-group" style="padding-bottom:3rem">
	<!-- wp:post-title {"style":{"spacing":{"margin":{"top":"10px","bottom":"0px"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"var(--wp--custom--typography--font-size--huge), clamp(2.25rem, 4vw, 2.75rem))"} /-->
	<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","bottom":"0","left":"0"},"margin":{"bottom":"0","top":"10px"}}},"layout":{"type":"flex"}} -->
	<div class="wp-block-group" style="margin-top:10px;margin-bottom:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:post-date {"format":"F j, Y","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"top":"5px","right":"15px","bottom":"5px","left":"15px"}}},"backgroundColor":"senary","fontSize":"tiny"} /-->
	</div>
	<!-- /wp:group -->
	<!-- wp:post-excerpt {"moreText":"Read More"} /-->
	</div>
	<!-- /wp:group -->
	<!-- /wp:post-template -->
	<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
	<!-- wp:query-pagination-previous {"fontSize":"small"} /-->
	<!-- wp:query-pagination-numbers /-->
	<!-- wp:query-pagination-next {"fontSize":"small"} /-->
	<!-- /wp:query-pagination -->
	</div>
	<!-- /wp:query -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"width":"33.33%"} -->
	<div class="wp-block-column" style="flex-basis:33.33%">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0rem","left":"0px"}}},"layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignwide" style="padding-top:0px;padding-right:0px;padding-bottom:0rem;padding-left:0px">
	<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"40px","top":"40px","right":"40px","left":"40px"}}},"backgroundColor":"secondary","className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border has-secondary-background-color has-background" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px">
	<!-- wp:image {"align":"center","width":120,"sizeSlug":"large","linkDestination":"none","style":{"color":{"duotone":"unset"}},"className":"is-style-rounded"} -->
	<figure class="wp-block-image aligncenter size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-1.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" width="120"/></figure>
	<!-- /wp:image -->
	<!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}}} -->
	<h3 class="has-text-align-center" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0"><strong>' . esc_html__( 'Clara Mitchell', 'aegis' ) . '</strong></h3>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"5px"}}},"fontSize":"tiny"} -->
	<p class="has-text-align-center has-tiny-font-size" id="blogger" style="margin-top:5px;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase">' . esc_html__( 'Fashion Designer', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
	<p class="has-text-align-center has-small-font-size">' . esc_html__( 'Hello! Welcome to our charity blog. We aim to inspire you to take action and create change. Thanks for joining us!', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0rem","right":"0rem","bottom":"0rem","left":"0rem"}}},"className":"is-style-default aegis-team-additional","layout":{"inherit":false,"contentSize":"1200px","type":"constrained"}} -->
	<div class="wp-block-group alignwide is-style-default aegis-team-additional" style="padding-top:0rem;padding-right:0rem;padding-bottom:0rem;padding-left:0rem">
	<!-- wp:social-links {"iconColor":"background","iconColorValue":"#ffffff","iconBackgroundColor":"foreground","iconBackgroundColorValue":"#211F1D","className":"is-style-default","layout":{"type":"flex","justifyContent":"center"}} -->
	<ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default">
	<!-- wp:social-link {"url":"facebook.com","service":"facebook"} /-->
	<!-- wp:social-link {"url":"linkedin.com","service":"linkedin"} /-->		
	<!-- wp:social-link {"url":"instagram.com","service":"instagram"} /-->
	</ul>
	<!-- /wp:social-links -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"40px","top":"0px"}}},"className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border" style="padding-top:0px;padding-bottom:40px">
	<!-- wp:image {"align":"center","id":76,"sizeSlug":"large","linkDestination":"none","style":{"color":{"duotone":"unset"}},"className":"is-style-default"} -->
	<figure class="wp-block-image aligncenter size-large is-style-default"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/hero-placeholder-1.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	<!-- wp:heading {"textAlign":"center","level":4} -->
	<h4 class="has-text-align-center">' . esc_html__( 'Fashion Event', 'aegis' ) . '</h4>
	<!-- /wp:heading -->
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","right":"20px","bottom":"0px","left":"20px"}}}} -->
	<div class="wp-block-group" style="padding-top:0px;padding-right:20px;padding-bottom:0px;padding-left:20px">
	<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
	<p class="has-text-align-center has-small-font-size">' . esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris purus urna.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
	<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
	<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Order Now', 'aegis' ) . '</a></div>
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
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->',
);