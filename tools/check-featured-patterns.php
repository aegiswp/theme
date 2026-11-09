<?php
// Dev tool: run from the command line only, never over HTTP.
if ( PHP_SAPI !== 'cli' ) {
	exit( 1 );
}

$registry = WP_Block_Patterns_Registry::get_instance()->get_all_registered();
$slugs    = [];
foreach ( $registry as $pattern ) {
	$name = $pattern['name'] ?? '';
	if ( str_contains( $name, 'feature' ) ) {
		$cats    = isset( $pattern['categories'] ) ? implode( ',', $pattern['categories'] ) : '';
		$slugs[] = $name . ' [' . $cats . ']';
	}
}
sort( $slugs );
foreach ( $slugs as $s ) {
	WP_CLI::log( $s );
}
WP_CLI::success( count( $slugs ) . ' patterns matched.' );
