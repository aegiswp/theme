<?php
/**
 * Title: Product Category Grid
 * Slug: category-grid
 * Categories: product
 * Keywords: product, category, grid, woocommerce, shop
 * Description: Product category cards with images, titles, and product counts.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["product"],"patternName":"category-grid","name":"Product Category Grid"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
	<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"fontSize":"32"} -->
	<h2 class="wp-block-heading has-text-align-center has-32-font-size" style="margin-bottom:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Shop by Category', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|md","left":"0"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group is-style-surface" style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--md);padding-left:0">
				<!-- wp:image {"aspectRatio":"16/9","scale":"cover"} -->
				<figure class="wp-block-image"><img alt="" style="aspect-ratio:16/9;object-fit:cover" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"20"} -->
				<h3 class="wp-block-heading has-text-align-center has-20-font-size"><?php echo esc_html__( 'New Arrivals', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"14"} -->
				<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( '24 Products', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-outline","fontSize":"14"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-14-font-size has-custom-font-size wp-element-button"><?php echo esc_html__( 'Browse Category', 'aegis' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|md","left":"0"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group is-style-surface" style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--md);padding-left:0">
				<!-- wp:image {"aspectRatio":"16/9","scale":"cover"} -->
				<figure class="wp-block-image"><img alt="" style="aspect-ratio:16/9;object-fit:cover" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"20"} -->
				<h3 class="wp-block-heading has-text-align-center has-20-font-size"><?php echo esc_html__( 'Best Sellers', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"14"} -->
				<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( '18 Products', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-outline","fontSize":"14"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-14-font-size has-custom-font-size wp-element-button"><?php echo esc_html__( 'Browse Category', 'aegis' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"var:preset|spacing|md","left":"0"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
			<div class="wp-block-group is-style-surface" style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--md);padding-left:0">
				<!-- wp:image {"aspectRatio":"16/9","scale":"cover"} -->
				<figure class="wp-block-image"><img alt="" style="aspect-ratio:16/9;object-fit:cover" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"20"} -->
				<h3 class="wp-block-heading has-text-align-center has-20-font-size"><?php echo esc_html__( 'On Sale', 'aegis' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"14"} -->
				<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-14-font-size aligncenter"><?php echo esc_html__( '12 Products', 'aegis' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-outline","fontSize":"14"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-14-font-size has-custom-font-size wp-element-button"><?php echo esc_html__( 'Browse Category', 'aegis' ); ?></a></div>
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
