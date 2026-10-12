<?php
$post = get_post( 2206 );
if ( ! $post ) {
	WP_CLI::error( 'Feature page not found.' );
}

$content = $post->post_content;
$updated = str_replace(
	[
		'"categories":["feature"]',
		'"patternName":"feature-image"',
		'"patternName":"feature-images-two-column"',
		'"patternName":"feature-icon-boxes"',
		'"patternName":"feature-grid-icons"',
		'"patternName":"feature-alternating"',
	],
	[
		'"categories":["featured"]',
		'"patternName":"featured-image"',
		'"patternName":"featured-images-two-column"',
		'"patternName":"featured-icon-boxes"',
		'"patternName":"featured-grid-icons"',
		'"patternName":"featured-alternating"',
	],
	$content
);

if ( $updated === $content ) {
	WP_CLI::warning( 'No metadata updates needed on Feature page.' );
	return;
}

wp_update_post(
	[
		'ID'           => 2206,
		'post_content' => $updated,
	]
);

WP_CLI::success( 'Updated Feature page pattern metadata.' );
