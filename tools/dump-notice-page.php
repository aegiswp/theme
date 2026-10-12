<?php
$c = get_post( 2237 )->post_content;
// Show first success-related chunk.
if ( preg_match( '/<!-- wp:group \{[^}]*Success Notice[^}]*\} -->.*?<!-- \/wp:group -->\s*<!-- \/wp:group -->/s', $c, $m ) ) {
	WP_CLI::log( substr( $m[0], 0, 900 ) );
} elseif ( preg_match( '/Success Notice.{0,400}/s', $c, $m ) ) {
	WP_CLI::log( $m[0] );
} else {
	WP_CLI::log( substr( $c, 0, 800 ) );
}
