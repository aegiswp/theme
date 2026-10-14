<?php
/**
 * Rebuild Slider demo page + clear pattern caches.
 *
 * @package Aegis
 */

$post_id = 2385;
$files   = array(
	'testimonials.php',
	'team.php',
	'features.php',
	'portfolio.php',
	'hero.php',
	'latest-posts.php',
	'books.php',
);

$dir     = get_theme_file_path( 'patterns/slider' );
$content = '';

foreach ( $files as $file ) {
	$path = $dir . '/' . $file;
	if ( ! is_readable( $path ) ) {
		fwrite( STDERR, "Missing {$path}\n" );
		exit( 1 );
	}
	ob_start();
	include $path;
	$content .= trim( (string) ob_get_clean() ) . "\n\n";
}

// wp_update_post() expects slashed data — preserve \" inside block JSON (icon SVGs).
$result = wp_update_post(
	array(
		'ID'           => $post_id,
		'post_content' => wp_slash( trim( $content ) ),
	),
	true
);

if ( is_wp_error( $result ) ) {
	fwrite( STDERR, $result->get_error_message() . "\n" );
	exit( 1 );
}

delete_transient( 'wp_theme_files_patterns-' . get_stylesheet() );
delete_expired_transients( true );

echo 'Page refreshed. pravatar in content: ' . ( str_contains( $content, 'pravatar' ) ? 'yes' : 'no' ) . "\n";
echo '20px stars: ' . ( str_contains( $content, 'font-size:20px' ) ? 'yes' : 'no' ) . "\n";
