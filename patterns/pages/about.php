<?php
/**
 * About Page Block Pattern
 */
return array(
    'title'          => __( 'About Page', 'aegis' ),
    'categories'     => array( 'aegis-about' ),
    'blockTypes'     => array( '' ),
    'description'    => __( 'A default team block pattern', 'aegis' ),
    'keywords'       => array( 'about', 'page', 'featured' ),
    'viewportWidth'  => 1440,
    'postTypes'      => array( '' ),
    'inserter'       => true,
    'scope'          => 'all',
    'mode'           => 'auto',
    'orientation'    => 'horizontal',
    'supports'       => array( 'align', 'color', 'fontSize' ),
    'content'        => '<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"0px","left":"0px"},"padding":{"bottom":"0","top":"var:preset|spacing|40"}}},"className":"what-we-do"} -->
	<div class="wp-block-columns alignwide what-we-do" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:0">
	<!-- wp:column {"verticalAlignment":"center","width":""} -->
	<div class="wp-block-column is-vertically-aligned-center">
	<!-- wp:group {"style":{"border":{"radius":{"topLeft":"500px","bottomLeft":"500px"}}},"gradient":"horizontal-primary-to-background","className":"aegis-left-top"} -->
	<div class="wp-block-group aegis-left-top has-horizontal-primary-to-background-gradient-background has-background" style="border-top-left-radius:500px;border-bottom-left-radius:500px">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"size-full aegis-right is-style-default"} -->
	<figure class="wp-block-image size-large size-full aegis-right is-style-default"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/hero-placeholder-1.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
	<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
	<p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__( 'About Us', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300","lineHeight":"1.2"}},"fontSize":"x-large"} -->
	<p class="has-x-large-font-size" style="font-style:normal;font-weight:300;line-height:1.2"><strong>' . esc_html__( 'Urban', 'aegis' ) . '</strong> ' . esc_html__( 'Fashion', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Urban fashion is a style seen on everyday people in common places like parks, malls, and streets. It often reflects current fashion industry trends, popular culture, and the influence of social media.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-aegis-button-shadow"} -->
	<div class="wp-block-button is-style-aegis-button-shadow"><a class="wp-block-button__link wp-element-button" href="#0">' . esc_html__( 'Our Mission', 'aegis' ) . '</a></div>
	<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->	
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"backgroundColor":"secondary","className":"aegis-trusted-by is-style-aegis-border","layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignwide aegis-trusted-by is-style-aegis-border has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"verticalAlignment":"center","width":"48%"} -->
	<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:48%">
	<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
	<p class="has-text-align-center has-large-font-size">' . esc_html__( 'Trusted by over&nbsp;', 'aegis' ) . '<strong>' . esc_html__( '700,000+&nbsp;', 'aegis' ) . '</strong>' . esc_html__( 'Clients worldwide since 2010', 'aegis' ) . '</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:column -->
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"800"}},"fontSize":"huge"} -->
	<p class="has-text-align-center has-huge-font-size" style="font-style:normal;font-weight:800">' . esc_html__( '4.8', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"align":"center","style":{"typography":{"letterSpacing":"2px"}},"className":"aegis-rating"} -->
	<p class="has-text-align-center aegis-rating" style="letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center">' . esc_html__( '5000 Ratings', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"800"}},"fontSize":"huge"} -->
	<p class="has-text-align-center has-huge-font-size" style="font-style:normal;font-weight:800">' . esc_html__( '2000+', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"align":"center","className":"aegis-rating"} -->
	<p class="has-text-align-center aegis-rating">' . esc_html__( 'Worldwide Sales per Year', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","right":"28px","left":"30px"}}},"className":"what-we-do","layout":{"contentSize":"","type":"constrained"}} -->
	<div class="wp-block-group alignfull what-we-do" style="padding-top:var(--wp--preset--spacing--60);padding-right:28px;padding-bottom:var(--wp--preset--spacing--60);padding-left:30px"><!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","width":"43.33%"} -->
	<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:43.33%"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
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
	<p>' . esc_html__( 'Urban fashion for women celebrates personal style while playing with current trends. Whether it is bold statement items or timeless essentials, street fashion adapts to your unique taste.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:columns {"style":{"spacing":{"padding":{"top":"6%"}}}} -->
	<div class="wp-block-columns" style="padding-top:6%">
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"unset"}},"className":"tagline"} -->
	<figure class="wp-block-image size-full tagline"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/icon-placeholder-1.jpg" alt="' . esc_attr__( 'Icon', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size" id="a-small-heading">' . esc_html__( 'Free Shipping', 'aegis' ) . '</h2>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"fontSize":"ext-medium"} -->
	<p class="has-ext-medium-font-size">' . esc_html__( 'We offer free standard shipping for your items. Expect delivery within 1-2 weeks.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"unset"}},"className":"tagline"} -->
	<figure class="wp-block-image size-full tagline"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/icon-placeholder-2.jpg" alt="' . esc_attr__( 'Icon', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size" id="a-second-heading-1">' . esc_html__( 'Retuns Guarantee', 'aegis' ) . '</h2>
	<!-- /wp:heading -->	
	<!-- wp:paragraph {"fontSize":"ext-medium"} -->
	<p class="has-ext-medium-font-size">' . esc_html__( 'Our Returns Guarantee promises a full refund if your purchase does not meet your satisfaction.', 'aegis' ) . '</p>
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
	<figure class="wp-block-image size-full tagline"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/icon-placeholder-3.jpg" alt="' . esc_attr__( 'Icon', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size" id="a-second-heading">' . esc_html__( 'Secure Transactions', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"fontSize":"ext-medium"} -->
	<p class="has-ext-medium-font-size">' . esc_html__( 'Our Secure Transactions provide a range of payment choices, from credit and debit cards to online services and cash options.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"unset"}},"className":"tagline"} -->
	<figure class="wp-block-image size-full tagline"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/icon-placeholder-4.jpg" alt="' . esc_attr__( 'Icon', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->	
	<!-- wp:heading {"fontSize":"large"} -->
	<h2 class="has-large-font-size" id="a-third-heading">' . esc_html__( 'Online Support', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"fontSize":"ext-medium"} -->
	<p class="has-ext-medium-font-size">' . esc_html__( 'Our online support prioritizes prompt, dependable assistance for our customers. Reach out via email or chat for any inquiries.', 'aegis' ) . '</p>
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
	<!-- /wp:group -->
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
	<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
	<!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"}},"className":"tagline","fontSize":"tiny"} -->
	<p class="has-text-align-left tagline has-tiny-font-size" style="font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">' . esc_html__( 'About Us', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0"}}}} -->
	<h2 style="margin-top:0">' . esc_html__( 'Streetwear constantly encourages our pursuit of distinctiveness.', 'aegis' ) . '</h2>
	<!-- /wp:heading -->	
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'For women, street fashion embodies personal style while also engaging with current trends. Ranging from bold statements to timeless essentials, it offers diverse stylistic expression.', 'aegis' ) . '</p>
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
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:columns -->
	<div class="wp-block-columns">
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-2-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-4.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image --></div>
	<!-- /wp:column -->
	<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-2-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-2-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-6.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->	
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"30px","left":"30px"},"margin":{"bottom":"0"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:var(--wp--preset--spacing--50);padding-left:30px">
    <!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"backgroundColor":"background","className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border has-background-background-color has-background" style="padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
	<!-- wp:columns -->
	<div class="wp-block-columns">
	<!-- wp:column {"width":"66.66%"} -->
	<div class="wp-block-column" style="flex-basis:66.66%">
	<!-- wp:paragraph -->
	<p><strong>' . esc_html__( 'Clara Mitchell', 'aegis' ) . '</strong></p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","fontSize":"10px"}},"textColor":"foreground","className":"aegis-rating"} -->
	<p class="aegis-rating has-foreground-color has-text-color" style="font-size:10px;letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"textColor":"foreground","fontSize":"small"} -->
	<p class="has-foreground-color has-text-color has-small-font-size">' . esc_html__( 'Fusce gravida ut nisi et facilisis. Nullam ut mi fermentum, posuere dolor id, ultricies ipsum. Duis urna ipsum, tincidunt ut lorem.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column {"width":"33.33%"} -->
	<div class="wp-block-column" style="flex-basis:33.33%">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-3-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-4.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-default"} -->
	<hr class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-default"/>
	<!-- /wp:separator -->	
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
	<div class="wp-block-group">
	<!-- wp:image {"width":80,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
	<figure class="wp-block-image size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-1.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" width="80"/></figure>
	<!-- /wp:image -->	
	<!-- wp:heading {"fontSize":"medium"} -->
	<h2 class="has-medium-font-size" id="a-small-heading">' . esc_html__( 'Leather Jacket', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"backgroundColor":"background","className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border has-background-background-color has-background" style="padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
	<!-- wp:columns -->
	<div class="wp-block-columns">
	<!-- wp:column {"width":"66.66%"} -->
	<div class="wp-block-column" style="flex-basis:66.66%">
	<!-- wp:paragraph -->
	<p><strong>' . esc_html__( 'Adrian Blackwood', 'aegis' ) . '</strong></p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","fontSize":"10px"}},"textColor":"foreground","className":"aegis-rating"} -->
	<p class="aegis-rating has-foreground-color has-text-color" style="font-size:10px;letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"textColor":"foreground","fontSize":"small"} -->
	<p class="has-foreground-color has-text-color has-small-font-size">' . esc_html__( 'Fusce gravida ut nisi et facilisis. Nullam ut mi fermentum, posuere dolor id, ultricies ipsum. Duis urna ipsum, tincidunt ut lorem.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"width":"33.33%"} -->
	<div class="wp-block-column" style="flex-basis:33.33%">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-3-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-4.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->	
	<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-default"} -->
	<hr class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-default"/>
	<!-- /wp:separator -->
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
	<div class="wp-block-group">
	<!-- wp:image {"width":80,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
	<figure class="wp-block-image size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-1.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" width="80"/></figure>
	<!-- /wp:image -->	
	<!-- wp:heading {"fontSize":"medium"} -->
	<h2 class="has-medium-font-size" id="a-small-heading">' . esc_html__( 'Leather Jacket', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->	
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"backgroundColor":"background","className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border has-background-background-color has-background" style="padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
	<!-- wp:columns -->
	<div class="wp-block-columns">
	<!-- wp:column {"width":"66.66%"} -->
	<div class="wp-block-column" style="flex-basis:66.66%">
	<!-- wp:paragraph -->
	<p><strong>' . esc_html__( 'Sofia Castellanos', 'aegis' ) . '</strong></p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","fontSize":"10px"}},"textColor":"foreground","className":"aegis-rating"} -->
	<p class="aegis-rating has-foreground-color has-text-color" style="font-size:10px;letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"textColor":"foreground","fontSize":"small"} -->
	<p class="has-foreground-color has-text-color has-small-font-size">' . esc_html__( 'Fusce gravida ut nisi et facilisis. Nullam ut mi fermentum, posuere dolor id, ultricies ipsum. Duis urna ipsum, tincidunt ut lorem.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"width":"33.33%"} -->
	<div class="wp-block-column" style="flex-basis:33.33%">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-3-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-5.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-default"} -->
	<hr class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-default"/>
	<!-- /wp:separator -->	
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
	<div class="wp-block-group">
	<!-- wp:image {"width":80,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
	<figure class="wp-block-image size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-4.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" width="80"/></figure>
	<!-- /wp:image -->
	<!-- wp:heading {"fontSize":"medium"} -->
	<h2 class="has-medium-font-size" id="a-small-heading">' . esc_html__( 'Street T-Shirt', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column -->
	<div class="wp-block-column">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"10%","right":"10%","bottom":"10%","left":"10%"}}},"backgroundColor":"background","className":"is-style-aegis-border"} -->
	<div class="wp-block-group is-style-aegis-border has-background-background-color has-background" style="padding-top:10%;padding-right:10%;padding-bottom:10%;padding-left:10%">
	<!-- wp:columns -->
	<div class="wp-block-columns">
	<!-- wp:column {"width":"66.66%"} -->
	<div class="wp-block-column" style="flex-basis:66.66%">
	<!-- wp:paragraph -->
	<p><strong>' . esc_html__( 'Adrian Blackwood', 'aegis' ) . '</strong></p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"2px","fontSize":"10px"}},"textColor":"foreground","className":"aegis-rating"} -->
	<p class="aegis-rating has-foreground-color has-text-color" style="font-size:10px;letter-spacing:2px">' . esc_html__( '★★★★★', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->	
	<!-- wp:paragraph {"textColor":"foreground","fontSize":"small"} -->
	<p class="has-foreground-color has-text-color has-small-font-size">' . esc_html__( 'Fusce gravida ut nisi et facilisis. Nullam ut mi fermentum, posuere dolor id, ultricies ipsum. Duis urna ipsum, tincidunt ut lorem.', 'aegis' ) . '</p>
	<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"width":"33.33%"} -->
	<div class="wp-block-column" style="flex-basis:33.33%">
	<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-aegis-effect-3-image"} -->
	<figure class="wp-block-image size-large is-style-aegis-effect-3-image"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/fashion-placeholder-6.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" /></figure>
	<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->	
	<!-- wp:separator {"backgroundColor":"septenary","className":"is-style-default"} -->
	<hr class="wp-block-separator has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background is-style-default"/>
	<!-- /wp:separator -->	
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"left"}} -->
	<div class="wp-block-group">
	<!-- wp:image {"width":80,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
	<figure class="wp-block-image size-large is-resized is-style-rounded"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/product-placeholder-3.jpg" alt="' . esc_attr__( 'Image', 'aegis' ) . '" width="80"/></figure>
	<!-- /wp:image -->
	<!-- wp:heading {"fontSize":"medium"} -->
	<h2 class="has-medium-font-size" id="a-small-heading">' . esc_html__( 'Leather Jacket', 'aegis' ) . '</h2>
	<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->',
);