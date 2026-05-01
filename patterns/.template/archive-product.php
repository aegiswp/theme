<?php
/**
 * Title: Archive Product
 * Slug: archive-product
 * Categories: template
 * Template Types: archive-product
 * Inserter: false
 */
?>

<!-- wp:template-part {"slug":"header","tagName":"header","className":"site-header"} /-->

<!-- wp:group {"tagName":"main","anchor":"main","metadata":{"name":"Main"},"className":"site-main","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group site-main" style="padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--lg)">
	<!-- wp:woocommerce/breadcrumbs /-->

	<!-- wp:woocommerce/store-notices /-->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="margin-bottom:var(--wp--preset--spacing--sm)">
		<!-- wp:query-title {"type":"archive","showPrefix":false} /-->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:woocommerce/product-results-count /-->
			<!-- wp:woocommerce/catalog-sorting /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|md"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"25%"} -->
		<div class="wp-block-column" style="flex-basis:25%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":4,"fontSize":"16"} -->
				<h4 class="wp-block-heading has-16-font-size"><?php echo esc_html__( 'Filter Products', 'aegis' ); ?></h4>
				<!-- /wp:heading -->

				<!-- wp:woocommerce/filter-wrapper {"filterType":"price-filter","heading":"<?php echo esc_attr__( 'Price', 'aegis' ); ?>"} -->
				<div class="wp-block-woocommerce-filter-wrapper">
					<!-- wp:heading {"level":5,"fontSize":"14"} -->
					<h5 class="wp-block-heading has-14-font-size"><?php echo esc_html__( 'Price', 'aegis' ); ?></h5>
					<!-- /wp:heading -->

					<!-- wp:woocommerce/price-filter {"heading":"","lock":{"remove":true}} -->
					<div class="wp-block-woocommerce-price-filter is-loading" data-showinputfields="true" data-showfilterbutton="false" data-heading="" data-heading-level="3">
						<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
					</div>
					<!-- /wp:woocommerce/price-filter -->
				</div>
				<!-- /wp:woocommerce/filter-wrapper -->

				<!-- wp:woocommerce/filter-wrapper {"filterType":"attribute-filter","heading":"<?php echo esc_attr__( 'Color', 'aegis' ); ?>"} -->
				<div class="wp-block-woocommerce-filter-wrapper">
					<!-- wp:heading {"level":5,"fontSize":"14"} -->
					<h5 class="wp-block-heading has-14-font-size"><?php echo esc_html__( 'Color', 'aegis' ); ?></h5>
					<!-- /wp:heading -->

					<!-- wp:woocommerce/attribute-filter {"attributeId":0,"heading":"","lock":{"remove":true}} -->
					<div class="wp-block-woocommerce-attribute-filter is-loading" data-attribute-id="0" data-show-counts="true" data-query-type="or" data-heading="" data-heading-level="3">
						<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
					</div>
					<!-- /wp:woocommerce/attribute-filter -->
				</div>
				<!-- /wp:woocommerce/filter-wrapper -->

				<!-- wp:woocommerce/filter-wrapper {"filterType":"stock-filter","heading":"<?php echo esc_attr__( 'Availability', 'aegis' ); ?>"} -->
				<div class="wp-block-woocommerce-filter-wrapper">
					<!-- wp:heading {"level":5,"fontSize":"14"} -->
					<h5 class="wp-block-heading has-14-font-size"><?php echo esc_html__( 'Availability', 'aegis' ); ?></h5>
					<!-- /wp:heading -->

					<!-- wp:woocommerce/stock-filter {"heading":"","lock":{"remove":true}} -->
					<div class="wp-block-woocommerce-stock-filter is-loading" data-show-counts="true" data-heading="" data-heading-level="3">
						<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
					</div>
					<!-- /wp:woocommerce/stock-filter -->
				</div>
				<!-- /wp:woocommerce/filter-wrapper -->

				<!-- wp:woocommerce/filter-wrapper {"filterType":"rating-filter","heading":"<?php echo esc_attr__( 'Rating', 'aegis' ); ?>"} -->
				<div class="wp-block-woocommerce-filter-wrapper">
					<!-- wp:heading {"level":5,"fontSize":"14"} -->
					<h5 class="wp-block-heading has-14-font-size"><?php echo esc_html__( 'Rating', 'aegis' ); ?></h5>
					<!-- /wp:heading -->

					<!-- wp:woocommerce/rating-filter {"heading":"","lock":{"remove":true}} -->
					<div class="wp-block-woocommerce-rating-filter is-loading" data-show-counts="true" data-heading="" data-heading-level="3">
						<span aria-hidden="true" class="wc-block-product-categories__placeholder"></span>
					</div>
					<!-- /wp:woocommerce/rating-filter -->
				</div>
				<!-- /wp:woocommerce/filter-wrapper -->

				<!-- wp:woocommerce/filter-wrapper {"filterType":"active-filters","heading":"<?php echo esc_attr__( 'Active Filters', 'aegis' ); ?>"} -->
				<div class="wp-block-woocommerce-filter-wrapper">
					<!-- wp:heading {"level":5,"fontSize":"14"} -->
					<h5 class="wp-block-heading has-14-font-size"><?php echo esc_html__( 'Active Filters', 'aegis' ); ?></h5>
					<!-- /wp:heading -->

					<!-- wp:woocommerce/active-filters {"heading":"","lock":{"remove":true}} -->
					<div class="wp-block-woocommerce-active-filters is-loading" data-display-style="list" data-heading="" data-heading-level="3">
						<span aria-hidden="true" class="wc-block-active-filters__placeholder"></span>
					</div>
					<!-- /wp:woocommerce/active-filters -->
				</div>
				<!-- /wp:woocommerce/filter-wrapper -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"75%"} -->
		<div class="wp-block-column" style="flex-basis:75%">
			<!-- wp:woocommerce/product-collection {"queryId":1,"query":{"perPage":12,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":true,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":true,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill"},"queryContextIncludes":["collection"]} -->
			<div class="wp-block-woocommerce-product-collection">
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
					<p class="has-medium-font-size"><strong><?php echo esc_html__( 'No results found', 'aegis' ); ?></strong></p>
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
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->