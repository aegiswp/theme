<?php
/**
 * Title: 09. Header Pattern
 * Slug: aegis/header-09
 * Categories: headers
 * Description: This header combines a prominent hero image with an overlayed offer highlight, creating a striking visual first impression.
 * Keywords: header, hero image, modern, navigation, social links, e-commerce, overlay, responsive
 * Viewport Width: 1400
 * Block Types: core/template-part/header
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["header"],"patternName":"aegis/header-09","name":"<?php echo esc_html_x('09. Header Pattern', 'Name of the pattern', 'aegis'); ?>"},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull">
	<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers', 'aegis'); ?>","dimRatio":70,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"is-style-default header-hero additional"} -->
	<div class="wp-block-cover alignfull is-style-default header-hero additional" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100vh">
	<span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers', 'aegis'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" data-object-fit="cover" />
		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
			<div class="wp-block-group alignwide">
				<!-- wp:group {"align":"full","layout":{"inherit":false}} -->
				<div class="wp-block-group alignfull">
					<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","bottom":"7px","left":"var:preset|spacing|30","top":"7px"}}},"backgroundColor":"foreground","textColor":"background","layout":{"type":"constrained"}} -->
					<div class="wp-block-group has-background-color has-foreground-background-color has-text-color has-background" style="padding-top:7px;padding-right:var(--wp--preset--spacing--30);padding-bottom:7px;padding-left:var(--wp--preset--spacing--30)">
						<!-- wp:paragraph {"align":"center","fontSize":"tiny"} -->
						<p class="has-text-align-center has-tiny-font-size"><?php echo esc_html_x('[Offer Highlight (52 chars): Announce a special deal or limited-time opportunity.]', 'Replace with a description of the section.', 'aegis'); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","right":"var:preset|spacing|30","left":"var:preset|spacing|30","bottom":"10px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"background","className":"has-flex-columns has-search-and-icon","layout":{"type":"constrained"}} -->
					<div class="wp-block-group has-flex-columns has-search-and-icon has-background-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:10px;padding-right:var(--wp--preset--spacing--30);padding-bottom:10px;padding-left:var(--wp--preset--spacing--30)">
						<!-- wp:columns {"isStackedOnMobile":false,"align":"wide"} -->
						<div class="wp-block-columns alignwide is-not-stacked-on-mobile">
							<!-- wp:column {"verticalAlignment":"center"} -->
							<div class="wp-block-column is-vertically-aligned-center">
								<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left"}} -->
								<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
									<!-- wp:social-link {"url":"#","service":"facebook","label":"Facebook"} /-->

									<!-- wp:social-link {"url":"#","service":"linkedin","label":"LinkedIn"} /-->

									<!-- wp:social-link {"url":"#","service":"instagram","label":"Instagram"} /-->

									<!-- wp:social-link {"url":"#","service":"wordpress","label":"WordPress"} /-->
								</ul>
								<!-- /wp:social-links -->
							</div>
							<!-- /wp:column -->

							<!-- wp:column -->
							<div class="wp-block-column">
								<!-- wp:group {"align":"wide","className":"has-search-and-icon","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
								<div class="wp-block-group alignwide has-search-and-icon">
									<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search products…","width":350,"widthUnit":"px","buttonText":"Search","buttonPosition":"no-button","query":{"post_type":"product"},"style":{"border":{"width":"1px","color":"#1c1c1e"}},"className":"is-style-hide-mobile"} /-->

									<!-- wp:woocommerce/mini-cart {"miniCartIcon":"bag","addToCartBehaviour":"open_drawer","iconColor":{"slug":"foreground","color":"#1c1c1e","name":"Foreground","class":"has-foreground-product-count-color"},"productCountColor":{"slug":"foreground","color":"#1c1c1e","name":"Foreground","class":"has-foreground-product-count-color"},"style":{"typography":{"fontSize":"12px"}}} /-->
								</div>
								<!-- /wp:group -->
							</div>
							<!-- /wp:column -->
						</div>
						<!-- /wp:columns -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10px","bottom":"10px","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
					<div class="wp-block-group alignwide" style="padding-top:10px;padding-right:var(--wp--preset--spacing--30);padding-bottom:10px;padding-left:var(--wp--preset--spacing--30)">
						<!-- wp:columns {"isStackedOnMobile":false,"align":"wide"} -->
						<div class="wp-block-columns alignwide is-not-stacked-on-mobile">
							<!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
							<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%">
								<!-- wp:site-title {"level":0,"textAlign":"left","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"extra-large"} /-->
							</div>
							<!-- /wp:column -->

							<!-- wp:column {"verticalAlignment":"center","width":"80%"} -->
							<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:80%">
								<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
								<div class="wp-block-group">
									<!-- wp:navigation {""icon":"menu","overlayBackgroundColor":"foreground","overlayTextColor":"background","className":"is-style-default","layout":{"type":"flex","setCascadingProperties":"true","justifyContent":"right","orientation":"horizontal","flexWrap":"wrap"},"fontSize":"tiny"} /-->
								</div>
								<!-- /wp:group -->
							</div>
							<!-- /wp:column -->
						</div>
						<!-- /wp:columns -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"gigantic"} -->
				<h2 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="font-style:normal;font-weight:400"><?php echo wp_kses_post( _x( '<strong>Main</strong> Heading', 'Replace with a descriptive section title.', 'aegis' ) ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center"><?php echo esc_html_e('[About Content (333 chars): Provide a detailed overview of a specific topic, product, or service.]', 'aegis'); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"is-style-dense-shadow","fontSize":"small"} -->
					<div class="wp-block-button has-custom-font-size is-style-dense-shadow has-small-font-size" style="font-style:normal;font-weight:600"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text.', 'aegis' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->
</div>
<!-- /wp:group -->
