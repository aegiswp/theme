<?php
/**
 * One-shot: sync Talk Hero circular avatar attrs on the Event page.
 *
 * @package Aegis
 */

$post_id = 2165;
$post    = get_post( $post_id );
if ( ! $post ) {
	WP_CLI::error( 'Post not found.' );
}

$old = '<!-- wp:image {"width":"64px","height":"64px","aspectRatio":"1","scale":"cover","style":{"border":{"radius":"100%"}}} -->
<figure class="wp-block-image is-resized has-custom-border" style="border-radius:100%"><img alt="" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:64px;height:64px"/></figure>';

$new = '<!-- wp:image {"width":"64px","height":"64px","aspectRatio":"1","scale":"cover","style":{"border":{"radius":"100%"},"width":{"all":"64px"}}} -->
<figure class="wp-block-image is-resized has-custom-border" style="border-radius:100%"><img alt="" style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:64px;height:64px"/></figure>';

$content = $post->post_content;
if ( ! str_contains( $content, $old ) ) {
	// Try without height on the comment (pattern may have been older).
	$old_alt = '<!-- wp:image {"width":"64px","aspectRatio":"1","scale":"cover","style":{"border":{"radius":"100%"}}} -->
<figure class="wp-block-image is-resized has-custom-border" style="border-radius:100%"><img style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:64px" alt="" /></figure>';
	$new_alt = '<!-- wp:image {"width":"64px","height":"64px","aspectRatio":"1","scale":"cover","style":{"border":{"radius":"100%"},"width":{"all":"64px"}}} -->
<figure class="wp-block-image is-resized has-custom-border" style="border-radius:100%"><img style="border-radius:100%;aspect-ratio:1;object-fit:cover;width:64px;height:64px" alt="" /></figure>';

	if ( str_contains( $content, $old_alt ) ) {
		$content = str_replace( $old_alt, $new_alt, $content );
	} elseif ( str_contains( $content, '"width":{"all":"64px"}' ) && str_contains( $content, 'border-radius:100%' ) ) {
		WP_CLI::success( 'Event page avatar already has width.all.' );
		return;
	} else {
		WP_CLI::warning( 'Could not find exact Talk Hero image markup; dumping nearby snippet.' );
		if ( preg_match( '/<!-- wp:image \{[^}]*border[^}]*\} -->\s*<figure class="wp-block-image is-resized[^>]*>.*?<\/figure>/s', $content, $m ) ) {
			WP_CLI::log( $m[0] );
		}
		return;
	}
} else {
	$content = str_replace( $old, $new, $content );
}

wp_update_post(
	[
		'ID'           => $post_id,
		'post_content' => $content,
	]
);

WP_CLI::success( 'Updated Event page Talk Hero avatar markup.' );
