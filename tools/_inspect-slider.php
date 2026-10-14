<?php
// phpcs:ignoreFile
$p = get_post( 2385 );
$c = $p->post_content;
echo '120px imgs: ' . substr_count( $c, 'width:120px' ) . "\n";
echo '60px imgs: ' . substr_count( $c, 'width:60px' ) . "\n";
if ( preg_match( '/Meet Our Team.*?width:(\d+)px/s', $c, $m ) ) {
	echo "first width after Meet Our Team: {$m[1]}\n";
}
echo 'warnings unlikely - sample team figure: ';
if ( preg_match( '/Meet Our Team.*?(<figure class="wp-block-image.*?<\/figure>)/s', $c, $m ) ) {
	echo $m[1] . "\n";
}
