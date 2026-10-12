<?php
/**
 * One-shot: fix Newsletter Banner button contrast on the Newsletter page.
 *
 * @package Aegis
 */

$post = get_post( 2233 );
if ( ! $post ) {
	WP_CLI::error( 'Newsletter page not found.' );
}

$content = $post->post_content;

$old_button = '<!-- wp:button {"backgroundColor":"primary-25","textColor":"neutral-100","className":"is-style-fill","fontSize":"15"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-neutral-100-color has-primary-25-background-color has-text-color has-background has-15-font-size has-custom-font-size wp-element-button" href="#">Subscribe Now</a></div>
<!-- /wp:button -->';

$new_button = '<!-- wp:button {"fontSize":"15"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-15-font-size has-custom-font-size wp-element-button" href="#">Subscribe Now</a></div>
<!-- /wp:button -->';

$old_group_attrs = '"backgroundColor":"neutral-100","textColor":"neutral-900"';
$new_group_attrs = '"backgroundColor":"neutral-0"';

$old_group_html = 'has-neutral-900-color has-neutral-100-background-color has-text-color has-background is-style-dark';
$new_group_html = 'has-neutral-0-background-color has-background is-style-dark';

$updated = $content;
$updated = str_replace( $old_button, $new_button, $updated );
$updated = str_replace( $old_group_attrs, $new_group_attrs, $updated );
$updated = str_replace( $old_group_html, $new_group_html, $updated );
$updated = str_replace(
	'"textColor":"neutral-900","fontSize":"36"',
	'"textColor":"neutral-950","fontSize":"36"',
	$updated
);
$updated = str_replace( 'has-neutral-900-color has-text-color has-36-font-size', 'has-neutral-950-color has-text-color has-36-font-size', $updated );
$updated = str_replace(
	'"textColor":"neutral-600","fontSize":"16"',
	'"textColor":"neutral-500","fontSize":"16"',
	$updated
);
$updated = str_replace( 'has-neutral-600-color has-text-color has-16-font-size', 'has-neutral-500-color has-text-color has-16-font-size', $updated );

if ( $updated === $content ) {
	// Try translated / escaped variants via looser button match.
	if ( preg_match( '/<!-- wp:button \{[^}]*primary-25[^}]*\} -->.*?<!-- \/wp:button -->/s', $content, $m ) ) {
		$updated = preg_replace(
			'/<!-- wp:button \{[^}]*primary-25[^}]*\} -->.*?<!-- \/wp:button -->/s',
			$new_button,
			$content,
			1
		);
	}
}

if ( $updated === $content ) {
	WP_CLI::warning( 'No Newsletter Banner button markup matched.' );
	if ( preg_match( '/Subscribe Now.{0,200}/s', $content, $m ) ) {
		WP_CLI::log( $m[0] );
	}
	return;
}

wp_update_post(
	[
		'ID'           => 2233,
		'post_content' => $updated,
	]
);

WP_CLI::success( 'Updated Newsletter page banner button.' );
