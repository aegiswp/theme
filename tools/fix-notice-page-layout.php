<?php
/**
 * One-shot: make Notice page alert banners full-width with bleed padding.
 *
 * @package Aegis
 */

$post = get_post( 2237 );
if ( ! $post ) {
	WP_CLI::error( 'Notice page not found.' );
}

$content = $post->post_content;
$updated = $content;

// Shared structural replacements for the four alert notices.
$pairs = [
	[
		'"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|sm","right":"var:preset|spacing|sm"}',
		'"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}',
	],
	[
		' class="wp-block-group alignwide ',
		' class="wp-block-group alignfull ',
	],
	[
		'padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--sm)',
		'padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--lg)',
	],
	[
		'"backgroundColor":"success-100","layout":{"type":"constrained"}',
		'"backgroundColor":"success-100","layout":{"type":"default"}',
	],
	[
		'"backgroundColor":"warning-100","layout":{"type":"constrained"}',
		'"backgroundColor":"warning-100","layout":{"type":"default"}',
	],
	[
		'"backgroundColor":"neutral-50","layout":{"type":"constrained"}',
		'"backgroundColor":"neutral-50","layout":{"type":"default"}',
	],
	[
		'"backgroundColor":"error-100","layout":{"type":"constrained"}',
		'"backgroundColor":"error-100","layout":{"type":"default"}',
	],
	[
		'<!-- wp:group {"layout":{"type":"constrained"}} -->',
		'<!-- wp:group {"layout":{"type":"default"}} -->',
	],
];

foreach ( $pairs as $pair ) {
	$updated = str_replace( $pair[0], $pair[1], $updated );
}

// Testimonial disclaimer bleed padding.
$updated = str_replace(
	'"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}}},"backgroundColor":"primary-500","textColor":"neutral-0","layout":{"type":"constrained"}',
	'"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"backgroundColor":"primary-500","textColor":"neutral-0","layout":{"type":"default"}',
	$updated
);
$updated = str_replace(
	'has-neutral-0-color has-primary-500-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)"',
	'has-neutral-0-color has-primary-500-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--sm);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--sm);padding-left:var(--wp--preset--spacing--lg)"',
	$updated
);

if ( $updated === $content ) {
	WP_CLI::warning( 'No Notice page layout changes applied.' );
	return;
}

wp_update_post(
	[
		'ID'           => 2237,
		'post_content' => $updated,
	]
);

WP_CLI::success( 'Updated Notice page layouts.' );
