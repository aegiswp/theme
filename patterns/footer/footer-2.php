<?php
/**
 * Title: Footer 2
 * Slug: aegis/footer-2
 * Categories: footer
 * Description: A detailed footer block pattern with sections for company info, services, social media, and other relevant details
 * Keywords: footer, company, information, services, social media
 * Viewport Width: 1500
 * Block Types: core/template-part/footer
 * Post Types: wp_template
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"0","right":"30px","left":"30px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--50);padding-right:30px;padding-bottom:0;padding-left:30px">
		<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
		<div class="wp-block-columns alignwide" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"medium"} -->
					<h3 class="has-medium-font-size" style="margin-top:20px"><?php echo esc_html__('Company', 'aegis') ?></h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-bottom:0"><?php echo esc_html__('Find a location nearest you.&nbsp;', 'aegis') ?></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30","top":"0"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30)"><a href="#"><?php echo esc_html__('Find Our Stores', 'aegis') ?></a></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:0px"><a href="#"><?php echo esc_html__('+57 (0)311 8968 3325', 'aegis') ?></a></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:0px"><a href="#"><?php echo esc_html__('contact@domain.com', 'aegis') ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"0","right":"0","left":"0","top":"0"}}},"className":"is-style-default","layout":{"type":"constrained"}} -->
				<div class="wp-block-group is-style-default" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"medium"} -->
					<h3 class="has-medium-font-size" style="margin-top:20px"><?php echo esc_html__('Information', 'aegis') ?></h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"12px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:12px"><a href="#"><?php echo esc_html__('Shop', 'aegis') ?></a></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:10px"><a href="#"><?php echo esc_html__('My Account', 'aegis') ?></a></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:10px"><a href="#"><?php echo esc_html__('Cart', 'aegis') ?></a></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"10px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:10px"><a href="#"><?php echo esc_html__('Checkout', 'aegis') ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"0","right":"0","left":"0","top":"0"}}},"className":"is-style-default","layout":{"type":"constrained"}} -->
				<div class="wp-block-group is-style-default" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"medium"} -->
					<h3 class="has-medium-font-size" style="margin-top:20px"><?php echo esc_html__('Services', 'aegis') ?></h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"20px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:20px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#"><?php echo esc_html__('About Us', 'aegis') ?></a></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#"><?php echo esc_html__('Careers', 'aegis') ?></a></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#"><?php echo esc_html__('Delivery Info', 'aegis') ?></a></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"0","bottom":"0","left":"0","top":"10px"}}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="margin-top:10px;margin-right:0;margin-bottom:0;margin-left:0"><a href="#"><?php echo esc_html__('Privacy Policy', 'aegis') ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"0","right":"0","left":"0","top":"0"}}},"className":"is-style-default","layout":{"type":"constrained"}} -->
				<div class="wp-block-group is-style-default" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"20px"}}},"fontSize":"medium"} -->
					<h3 class="has-medium-font-size" style="margin-top:20px"><?php echo esc_html__('Social Media', 'aegis') ?></h3>
					<!-- /wp:heading -->
					<!-- wp:social-links {"iconColor":"black","iconColorValue":"#000000","showLabels":true,"size":"has-small-icon-size","style":{"spacing":{"blockGap":{"top":"10px","left":"10px"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left"}} -->
					<ul class="wp-block-social-links has-small-icon-size has-visible-labels has-icon-color is-style-logos-only" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:social-link {"url":"facebook.com","service":"facebook","label":"Facebook"} /-->
						<!-- wp:social-link {"url":"linkedin.com","service":"linkedin",,"label":"LinkedIn"} /-->
						<!-- wp:social-link {"url":"instagram.com","service":"instagram","label":"Instagram"} /-->
					</ul>
					<!-- /wp:social-links -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
		<!-- wp:separator {"align":"full","backgroundColor":"septenary"} -->
		<hr class="wp-block-separator alignfull has-text-color has-septenary-color has-alpha-channel-opacity has-septenary-background-color has-background" />
		<!-- /wp:separator -->
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"30px","left":"30px"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group alignfull" style="padding-right:30px;padding-left:30px">
			<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
			<div class="wp-block-group alignwide"><!-- wp:image {"width":300,"sizeSlug":"large","linkDestination":"none"} -->
				<figure class="wp-block-image size-large is-resized"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/cards.png" alt="<?php echo esc_attr__('Icon', 'aegis') ?>" width="300" /></figure>
				<!-- /wp:image -->
				<!-- wp:paragraph {"fontSize":"tiny"} -->
				<p class="has-tiny-font-size"><?php echo esc_attr__('© 2023', 'aegis') ?> <a href="<?php echo esc_html__('https://github.com/atmostfear-entertainment/aegis/', 'aegis') ?>"> <?php echo esc_attr__('Aegis', 'aegis') ?></a> <?php echo esc_attr__('by Atmostfear Entertainment', 'aegis') ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->