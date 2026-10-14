<?php
$posts = get_posts(
	[
		'post_type'      => 'wp_template',
		'name'           => 'single-product',
		'post_status'    => 'any',
		'posts_per_page' => 10,
	]
);

if ( ! $posts ) {
	echo "no customized wp_template\n";
	return;
}

foreach ( $posts as $p ) {
	$count = substr_count( $p->post_content, 'product-sale-badge' );
	$above = (bool) preg_match(
		'/product-sale-badge[^>]*>\s*<!-- wp:post-title/',
		$p->post_content
	) || (bool) preg_match(
		'/product-sale-badge.*"align":""/',
		$p->post_content
	);
	echo "ID={$p->ID} status={$p->post_status} badges={$count} above_title=" . ( $above ? '1' : '0' ) . "\n";
}
