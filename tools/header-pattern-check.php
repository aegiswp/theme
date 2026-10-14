<?php
/**
 * One-off: verify header-default pattern registration / render length.
 *
 * Usage: studio wp eval-file wp-content/themes/aegis/tools/header-pattern-check.php
 */

$registered = WP_Block_Patterns_Registry::get_instance()->is_registered( 'header-default' );
$html       = do_blocks( '<!-- wp:pattern {"slug":"header-default"} /-->' );
$plugin     = class_exists( \Aegis\Plugin\Integrations\WooCommerce::class );
$wc         = class_exists( 'WooCommerce' ) || function_exists( 'WC' );

echo 'plugin_class=' . ( $plugin ? '1' : '0' ) . "\n";
echo 'woocommerce=' . ( $wc ? '1' : '0' ) . "\n";
echo 'pattern_registered=' . ( $registered ? '1' : '0' ) . "\n";
echo 'pattern_html_len=' . strlen( $html ) . "\n";
echo 'has_logo=' . ( str_contains( $html, 'wp-block-site-logo' ) ? '1' : '0' ) . "\n";
echo 'has_minicart=' . ( str_contains( $html, 'mini-cart' ) || str_contains( $html, 'woocommerce' ) ? '1' : '0' ) . "\n";
