<?php
/**
 * FAQ 2 Block Pattern
 */
return array(
    'title'          => __( 'FAQ 2', 'aegis' ),
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
    'content'        => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"13px","left":"13px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--50);padding-right:13px;padding-bottom:var(--wp--preset--spacing--50);padding-left:13px">
	<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
	<h2 class="has-text-align-center" style="font-style:normal;font-weight:400">' . esc_html__( 'Have', 'aegis' ) . '<strong> ' . esc_html__( 'questions?', 'aegis' ) . '</strong> ' . esc_html__( 'Well, we have all the ', 'aegis' ) . '<strong>' . esc_html__( 'answers', 'aegis' ) . '</strong></h2>
	<!-- /wp:heading -->	
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|40","bottom":"0","left":"var:preset|spacing|40"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)">
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","right":"0px","left":"0px"}}},"className":"faq","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull faq" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"bottom":{"color":"#e7e2de","width":"2px"}}},"className":"trigger is-style-default","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group trigger is-style-default" style="border-bottom-color:#e7e2de;border-bottom-width:2px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
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
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","right":"0px","left":"0px"}}},"className":"faq","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull faq" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"bottom":{"color":"#e7e2de","width":"2px"}}},"className":"trigger","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group trigger" style="border-bottom-color:#e7e2de;border-bottom-width:2px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
	<h3 style="font-style:normal;font-weight:400">' . esc_html__( '02. Refund Guarantee?', 'aegis' ) . '</h3>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"fontSize":"large"} -->
	<p class="has-large-font-size">+</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"content","layout":{"type":"constrained"}} -->
	<div class="wp-block-group content has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Our Refund Guarantee promises a complete reimbursement if your purchase does not meet your expectations.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","right":"0px","left":"0px"}}},"className":"faq","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull faq" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"bottom":{"color":"#e7e2de","width":"2px"}}},"className":"trigger","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group trigger" style="border-bottom-color:#e7e2de;border-bottom-width:2px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
	<h3 style="font-style:normal;font-weight:400">' . esc_html__( '03. Flexible Payment?', 'aegis' ) . '</h3>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"fontSize":"large"} -->
	<p class="has-large-font-size">+</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"secondary","className":"content","layout":{"type":"constrained"}} -->
	<div class="wp-block-group content has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Our adaptable payment solutions offer customers an array of payment choices, ranging from credit cards and debit cards to online payment platforms and cash transactions.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->',
);