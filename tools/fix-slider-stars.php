<?php
/**
 * One-off: shrink testimonial stars on the Slider patterns page.
 *
 * @package Aegis
 */

$post_id = 2385;
$post    = get_post( $post_id );

if ( ! $post ) {
	fwrite( STDERR, "Post {$post_id} not found.\n" );
	exit( 1 );
}

$content = $post->post_content;
$content = str_replace(
	array(
		'fontSize":"48px"',
		'font-size:48px;line-height:1',
		'fontSize":"32px"',
		'font-size:32px;line-height:1',
	),
	array(
		'fontSize":"20px"',
		'font-size:20px;line-height:1',
		'fontSize":"20px"',
		'font-size:20px;line-height:1',
	),
	$content
);

$result = wp_update_post(
	array(
		'ID'           => $post_id,
		'post_content' => $content,
	),
	true
);

if ( is_wp_error( $result ) ) {
	fwrite( STDERR, $result->get_error_message() . "\n" );
	exit( 1 );
}

echo 'Updated stars to 20px. Count: ' . substr_count( $content, 'font-size:20px' ) . "\n";
