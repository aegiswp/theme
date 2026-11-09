<?php
// Dev tool: run from the command line only, never over HTTP.
if ( PHP_SAPI !== 'cli' ) {
	exit( 1 );
}

$c = get_post( 2206 )->post_content;
$p = strpos( $c, 'Modular Architecture' );
$s = strrpos( substr( $c, 0, $p ), '<!-- wp:group' );
WP_CLI::log( substr( $c, $s, 1200 ) );
