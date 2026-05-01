<?php
/**
 * Title: Shop Full Width
 * Slug: shop-full-width
 * Categories: page
 * Keywords: shop, full width, products, store, grid, filters
 * Description: A full-width shop page with top-bar filters and a wide product grid without sidebar.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["page"],"patternName":"shop-full-width","name":"Shop Full Width"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
	<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|sm"}}},"layout":{"type":"constrained","contentSize":"720px"}} -->
	<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--sm)">
		<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading"} -->
		<p class="aligncenter has-text-align-center is-style-sub-heading aligncenter"><?php echo esc_html__( 'Our Store', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"42"} -->
		<h1 class="wp-block-heading has-text-align-center has-42-font-size"><?php echo esc_html__( 'Browse All Products', 'aegis' ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"18"} -->
		<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color has-18-font-size aligncenter"><?php echo esc_html__( 'Explore our full catalog of premium products.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--sm)">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group">
			<!-- wp:woocommerce/filter-wrapper {"filterType":"price-filter","heading":"<?php echo esc_attr__( 'Price', 'aegis' ); ?>"} -->
			<div class="wp-block-woocommerce-filter-wrapper">
				<!-- wp:woocommerce/price-filter {"heading":"<?php echo esc_attr__( 'Price', 'aegis' ); ?>","lock":{"remove":true}} -->
				<div class="wp-block-woocommerce-price-filter is-loading" data-showinputfields="true" data-showfilterbutton="false" data-heading="<?php echo esc_attr__( 'Price', 'aegis' ); ?>" data-heading-level="3">
					<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
				</div>
				<!-- /wp:woocommerce/price-filter -->
			</div>
			<!-- /wp:woocommerce/filter-wrapper -->

			<!-- wp:woocommerce/filter-wrapper {"filterType":"stock-filter","heading":"<?php echo esc_attr__( 'Availability', 'aegis' ); ?>"} -->
			<div class="wp-block-woocommerce-filter-wrapper">
				<!-- wp:woocommerce/stock-filter {"heading":"<?php echo esc_attr__( 'Availability', 'aegis' ); ?>","lock":{"remove":true}} -->
				<div class="wp-block-woocommerce-stock-filter is-loading" data-show-counts="true" data-heading="<?php echo esc_attr__( 'Availability', 'aegis' ); ?>" data-heading-level="3">
					<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
				</div>
				<!-- /wp:woocommerce/stock-filter -->
			</div>
			<!-- /wp:woocommerce/filter-wrapper -->

			<!-- wp:woocommerce/filter-wrapper {"filterType":"rating-filter","heading":"<?php echo esc_attr__( 'Rating', 'aegis' ); ?>"} -->
			<div class="wp-block-woocommerce-filter-wrapper">
				<!-- wp:woocommerce/rating-filter {"heading":"<?php echo esc_attr__( 'Rating', 'aegis' ); ?>","lock":{"remove":true}} -->
				<div class="wp-block-woocommerce-rating-filter is-loading" data-show-counts="true" data-heading="<?php echo esc_attr__( 'Rating', 'aegis' ); ?>" data-heading-level="3">
					<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
				</div>
				<!-- /wp:woocommerce/rating-filter -->
			</div>
			<!-- /wp:woocommerce/filter-wrapper -->

			<!-- wp:woocommerce/filter-wrapper {"filterType":"active-filters","heading":"<?php echo esc_attr__( 'Active Filters', 'aegis' ); ?>"} -->
			<div class="wp-block-woocommerce-filter-wrapper">
				<!-- wp:woocommerce/active-filters {"heading":"","lock":{"remove":true}} -->
				<div class="wp-block-woocommerce-active-filters is-loading" data-display-style="chips" data-heading="" data-heading-level="3">
					<span aria-hidden="true" class="wc-block-active-filters__placeholder"></span>
				</div>
				<!-- /wp:woocommerce/active-filters -->
			</div>
			<!-- /wp:woocommerce/filter-wrapper -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:woocommerce/product-results-count /-->
			<!-- wp:woocommerce/catalog-sorting /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:woocommerce/product-collection {"queryId":5,"query":{"perPage":16,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":true},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"queryContextIncludes":["collection"],"align":"wide"} -->
	<div class="wp-block-woocommerce-product-collection alignwide">
		<!-- wp:woocommerce/product-template -->
		<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|sm"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--sm)">
			<!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} -->
			<!-- wp:woocommerce/product-sale-badge {"align":"right"} /-->
			<!-- /wp:woocommerce/product-image -->

			<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0","top":"0"}},"typography":{"lineHeight":"1.4","fontSize":"16px"}},"__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

			<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","style":{"typography":{"fontSize":"16px"}}} /-->

			<!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:woocommerce/product-template -->

		<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|sm"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<!-- wp:query-pagination-previous /-->

		<!-- wp:query-pagination-numbers /-->

		<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->

		<!-- wp:woocommerce/product-collection-no-results -->
		<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"fontSize":"medium"} -->
			<p class="has-medium-font-size"><strong><?php echo esc_html__( 'No products found', 'aegis' ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html__( 'You can try', 'aegis' ); ?> <a href="#" class="wc-link-clear-any-filters"><?php echo esc_html__( 'clearing any filters', 'aegis' ); ?></a> <?php echo esc_html__( 'or head to our', 'aegis' ); ?> <a href="#" class="wc-link-stores-home"><?php echo esc_html__( 'store\'s home', 'aegis' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<!-- /wp:woocommerce/product-collection-no-results -->
	</div>
	<!-- /wp:woocommerce/product-collection -->
</div>
<!-- /wp:group -->
