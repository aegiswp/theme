<?php
/**
 * FAQ 1 Block Pattern
 */
return array(
    'title'          => __( 'FAQ 1', 'aegis' ),
    'categories'     => array( 'aegis-faq' ),
    'blockTypes'     => array( 'core/page' ),
    'description'    => __( 'FAQ block pattern', 'aegis' ),
    'keywords'       => array( 'faq', 'page' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( '' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","right":"30px","left":"30px"}}},"gradient":"vertical-background-to-foreground","className":"what-we-do gradient","layout":{"contentSize":"","type":"constrained"}} -->
	<div class="wp-block-group alignfull what-we-do gradient has-vertical-background-to-foreground-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:30px;padding-bottom:var(--wp--preset--spacing--60);padding-left:30px">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"width":"56.66%","style":{"spacing":{"padding":{"left":"0","right":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-column" style="padding-right:var(--wp--preset--spacing--50);padding-left:0;flex-basis:56.66%">
	<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
	<h2 style="font-style:normal;font-weight:400">' . esc_html__( 'Have', 'aegis' ) . '<strong> ' . esc_html__( 'questions?', 'aegis' ) . '</strong> ' . esc_html__( 'Well, we have all the ', 'aegis' ) . '<strong>' . esc_html__( 'answers', 'aegis' ) . '</strong></h2>
	<!-- /wp:heading -->	
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"0px","right":"0px","left":"0px"}}},"className":"faq","layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull faq" style="padding-top:var(--wp--preset--spacing--30);padding-right:0px;padding-bottom:0px;padding-left:0px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|30","left":"0"}},"border":{"bottom":{"color":"var:preset|color|senary","width":"2px"}}},"className":"trigger is-style-default","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group trigger is-style-default" style="border-bottom-color:var(--wp--preset--color--senary);border-bottom-width:2px;padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
	<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
	<h3 style="font-style:normal;font-weight:400">' . esc_html__( '01. Free Shipping?', 'aegis' ) . '</h3>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"fontSize":"large"} -->
	<p class="has-large-font-size">+</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"content","layout":{"type":"constrained"}} -->
	<div class="wp-block-group content has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'We offer complimentary standard shipping for your items. Kindly anticipate a delivery window of 1-2 weeks.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","right":"0px","left":"0px"}}},"className":"faq","layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull faq" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|30","left":"0"}},"border":{"bottom":{"color":"var:preset|color|senary","width":"2px"}}},"className":"trigger","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group trigger" style="border-bottom-color:var(--wp--preset--color--senary);border-bottom-width:2px;padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
	<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
	<h3 style="font-style:normal;font-weight:400">' . esc_html__( '02. Refund Guarantee?', 'aegis' ) . '</h3>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"fontSize":"large"} -->
	<p class="has-large-font-size">+</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"content","layout":{"type":"constrained"}} -->
	<div class="wp-block-group content has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:paragraph -->
	<p>' . esc_html__( 'Our Refund Guarantee promises a complete reimbursement if your purchase does not meet your expectations.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","right":"0px","left":"0px"}}},"className":"faq","layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull faq" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|30","left":"0"}},"border":{"bottom":{"color":"var:preset|color|senary","width":"2px"}}},"className":"trigger","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group trigger" style="border-bottom-color:var(--wp--preset--color--senary);border-bottom-width:2px;padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0">
	<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
	<h3 style="font-style:normal;font-weight:400">' . esc_html__( '03. Flexible Payment?', 'aegis' ) . '</h3>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"fontSize":"large"} -->
	<p class="has-large-font-size">+</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"content","layout":{"type":"constrained"}} -->
	<div class="wp-block-group content has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:paragraph -->
	<p>' . esc_html__( 'Our adaptable payment solutions offer customers an array of payment choices, ranging from credit cards and debit cards to online payment platforms and cash transactions.', 'aegis' ) . '</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"verticalAlignment":"center","width":"43.33%"} -->
	<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:43.33%">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"backgroundColor":"background","textColor":"foreground","className":"is-style-aegis-shadow","layout":{"type":"constrained"}} -->
	<div class="wp-block-group is-style-aegis-shadow has-foreground-color has-background-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","right":"15px","bottom":"15px","left":"15px"},"blockGap":"0"},"border":{"radius":"100px"}},"backgroundColor":"foreground","className":"icon","layout":{"type":"constrained"}} -->
	<div class="wp-block-group icon has-foreground-background-color has-background" style="border-radius:100px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:image {"width":40,"sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":["#FFFFFF","#FFFFFF"]}}} -->
	<figure class="wp-block-image size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/email-icon.png" alt="' . esc_attr__( 'Icon', 'aegis' ) . '" width="40"/></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:group -->
	<!-- wp:heading {"level":3} -->
	<h3>' . esc_html__( 'Did not find your ', 'aegis' ) . '<strong>' . esc_html__( 'answer', 'aegis' ) . '</strong>' . esc_html__( '?', 'aegis' ) . '</h3>
	<!-- /wp:heading -->
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'We will answer your questions as soon as possible.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons -->
	<div class="wp-block-buttons">
	<!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
	<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#">' . esc_html__( 'Send your Question', 'aegis' ) . '</a></div>
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