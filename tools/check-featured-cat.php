<?php
$registry = WP_Block_Patterns_Registry::get_instance();
$cats     = WP_Block_Pattern_Categories_Registry::get_instance()->get_all_registered();
$feature  = null;
$featured = null;

foreach ( $cats as $c ) {
	if ( ( $c['name'] ?? '' ) === 'feature' ) {
		$feature = $c;
	}
	if ( ( $c['name'] ?? '' ) === 'featured' ) {
		$featured = $c;
	}
}

echo 'feature category: ' . ( $feature ? wp_json_encode( $feature ) : 'absent' ) . PHP_EOL;
echo 'featured category: ' . ( $featured ? wp_json_encode( $featured ) : 'absent' ) . PHP_EOL;

$samples = [
	'featured-icon-boxes',
	'featured-grid-icons',
	'featured-images-two-column',
	'featured-icons',
	'featured-images-stacked',
	'feature-icons',
	'feature-icon-boxes',
];
foreach ( $samples as $slug ) {
	echo $slug . ': ' . ( $registry->is_registered( $slug ) ? 'yes' : 'no' ) . PHP_EOL;
}

$count = 0;
foreach ( $registry->get_all_registered() as $p ) {
	if ( in_array( 'featured', $p['categories'] ?? [], true ) ) {
		++$count;
	}
}
echo "patterns in featured: $count\n";
