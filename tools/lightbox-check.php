<?php
echo 'repo=' . ( class_exists( '\Aegis\Plugin\Settings\Repository' ) ? '1' : '0' ) . "\n";
if ( class_exists( '\Aegis\Plugin\Settings\Repository' ) ) {
	echo 'wc_integration=' . ( \Aegis\Plugin\Settings\Repository::is_integration_enabled( 'woocommerce' ) ? '1' : '0' ) . "\n";
}
echo 'lightbox_class=' . ( class_exists( '\Aegis\Framework\Integrations\WooCommerce\ProductGalleryLightbox' ) ? '1' : '0' ) . "\n";
echo 'theme_support_lightbox=' . ( current_theme_supports( 'wc-product-gallery-lightbox' ) ? '1' : '0' ) . "\n";
echo 'filter_photoswipe=' . ( apply_filters( 'woocommerce_single_product_photoswipe_enabled', true ) ? '1' : '0' ) . "\n";

if ( class_exists( '\Aegis\Plugin\Settings\IntegrationsSettings' ) ) {
	echo "IntegrationsSettings exists\n";
	$r = new ReflectionClass( '\Aegis\Plugin\Settings\IntegrationsSettings' );
	echo 'file=' . $r->getFileName() . "\n";
}
if ( class_exists( '\Aegis\Plugin\Integrations\IntegrationsSettings' ) ) {
	echo "Integrations\\IntegrationsSettings exists\n";
}

// Find who provides is_integration_enabled
foreach ( get_declared_classes() as $c ) {
	if ( str_contains( $c, 'IntegrationsSettings' ) ) {
		echo "found=$c\n";
	}
}
