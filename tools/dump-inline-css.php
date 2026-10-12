<?php
/**
 * Dump whether inlined aegis CSS contains the tab fix.
 */

$styles = $GLOBALS['wp_styles'] ?? null;
if ( ! $styles ) {
	echo "no wp_styles\n";
	return;
}

$handle = 'aegis';
$extra  = $styles->get_data( $handle, 'after' );
$css    = is_array( $extra ) ? implode( "\n", $extra ) : (string) $extra;

echo 'handle_enqueued=' . ( wp_style_is( $handle, 'enqueued' ) || wp_style_is( $handle, 'done' ) ? '1' : '0' ) . "\n";
echo 'inline_len=' . strlen( $css ) . "\n";
echo 'has_fix=' . ( str_contains( $css, 'content:none' ) ? '1' : '0' ) . "\n";
echo 'has_old=' . ( str_contains( $css, 'li.active::before{box-shadow' ) ? '1' : '0' ) . "\n";
echo 'has_gap=' . ( str_contains( $css, 'column-gap:.35em' ) ? '1' : '0' ) . "\n";

$file = get_template_directory() . '/vendor/aegis/framework/public/css/plugins/woocommerce/woocommerce.css';
echo 'file_fix=' . ( str_contains( (string) file_get_contents( $file ), 'content:none' ) ? '1' : '0' ) . "\n";
