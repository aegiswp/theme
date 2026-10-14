<?php
$registry = WP_Block_Patterns_Registry::get_instance();
$cats     = WP_Block_Pattern_Categories_Registry::get_instance()->get_all_registered();
$page_cat  = null;
$pages_cat = null;

foreach ( $cats as $c ) {
	if ( ( $c['name'] ?? '' ) === 'page' ) {
		$page_cat = $c;
	}
	if ( ( $c['name'] ?? '' ) === 'pages' ) {
		$pages_cat = $c;
	}
}

echo 'page category: ' . ( $page_cat ? wp_json_encode( $page_cat ) : 'absent' ) . PHP_EOL;
echo 'pages category: ' . ( $pages_cat ? wp_json_encode( $pages_cat ) : 'absent' ) . PHP_EOL;

$samples = [ 'pages-home', 'pages-about', 'pages-contact', 'pages-landing', 'page-home', 'page-about' ];
foreach ( $samples as $slug ) {
	echo $slug . ': ' . ( $registry->is_registered( $slug ) ? 'yes' : 'no' ) . PHP_EOL;
}

$count = 0;
foreach ( $registry->get_all_registered() as $p ) {
	if ( in_array( 'pages', $p['categories'] ?? [], true ) ) {
		++$count;
	}
}
echo "patterns in pages: $count\n";
