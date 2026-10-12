<?php
/**
 * Temporary preview page for progress-bars pattern.
 *
 * @package aegis
 */

$path = get_stylesheet_directory() . '/patterns/stats/progress-bars.php';
ob_start();
include $path;
$content = ob_get_clean();

$page_id = (int) get_option( 'aegis_progress_bars_preview_id' );
if ( ! $page_id || ! get_post( $page_id ) ) {
	$page_id = wp_insert_post(
		array(
			'post_title'   => 'Progress Bars Preview',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => $content,
		)
	);
	update_option( 'aegis_progress_bars_preview_id', $page_id );
} else {
	wp_update_post(
		array(
			'ID'           => $page_id,
			'post_content' => $content,
		)
	);
}

echo get_permalink( $page_id ) . "\n";
echo 'id=' . $page_id . "\n";
