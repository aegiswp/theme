<?php
$content = do_blocks( '<!-- wp:pattern {"slug":"sidebar-default"} /-->' );

foreach ( array( 'wp-block-avatar', 'About the Author', 'wp-block-calendar', 'wp-block-latest-posts', 'wp-block-categories', 'wp-block-archives', 'wp-block-tag-cloud', 'wp-block-social-links', 'is-style-newsletter' ) as $needle ) {
	WP_CLI::log( $needle . ': ' . ( str_contains( $content, $needle ) ? 'yes' : 'no' ) );
}

$parts = get_posts(
	array(
		'post_type'      => 'wp_template_part',
		'post_status'    => 'any',
		'name'           => 'sidebar',
		'posts_per_page' => 5,
	)
);

if ( empty( $parts ) ) {
	WP_CLI::log( 'customized sidebar template part: none' );
} else {
	foreach ( $parts as $part ) {
		WP_CLI::log( 'customized sidebar id=' . $part->ID . ' status=' . $part->post_status . ' has pattern ref=' . ( str_contains( $part->post_content, 'sidebar-default' ) ? 'yes' : 'no' ) );
	}
}
