<?php
/**
 * Insert a fresh page with the current progress-bars pattern.
 *
 * @package aegis
 */

$path = get_stylesheet_directory() . '/patterns/stats/progress-bars.php';
ob_start();
include $path;
$content = ob_get_clean();

$page_id = wp_insert_post(
	array(
		'post_title'   => 'Progress Bars Editor Check',
		'post_status'  => 'draft',
		'post_type'    => 'page',
		'post_content' => $content,
	)
);

echo (int) $page_id . "\n";
echo admin_url( 'post.php?post=' . (int) $page_id . '&action=edit' ) . "\n";
