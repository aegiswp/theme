<?php
/**
 * Migrate aegis/video blocks to core/video in post content.
 *
 * Usage: wp eval-file wp-content/themes/aegis/tools/migrate-aegis-video.php
 *
 * @package Aegis
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Migrate block markup from aegis/video to core/video.
 *
 * @param string $content Post content.
 *
 * @return string
 */
function aegis_migrate_video_block_content( string $content ): string {
	if ( ! has_blocks( $content ) || false === strpos( $content, 'wp:aegis/video' ) ) {
		return $content;
	}

	$blocks = parse_blocks( $content );
	$blocks = array_map( 'aegis_migrate_video_block_tree', $blocks );

	return serialize_blocks( $blocks );
}

/**
 * Recursively migrate blocks in a tree.
 *
 * @param array<string, mixed> $block Block array.
 *
 * @return array<string, mixed>
 */
function aegis_migrate_video_block_tree( array $block ): array {
	if ( ( $block['blockName'] ?? '' ) === 'aegis/video' ) {
		$attrs = is_array( $block['attrs'] ?? null ) ? $block['attrs'] : array();

		return array(
			'blockName'    => 'core/video',
			'attrs'        => array(
				'src'         => $attrs['src'] ?? '',
				'poster'      => $attrs['poster'] ?? '',
				'caption'     => $attrs['caption'] ?? '',
				'autoplay'    => $attrs['autoplay'] ?? false,
				'loop'        => $attrs['loop'] ?? false,
				'muted'       => $attrs['muted'] ?? false,
				'controls'    => $attrs['controls'] ?? true,
				'preload'     => $attrs['preload'] ?? 'metadata',
				'playsInline' => $attrs['playsInline'] ?? true,
			),
			'innerBlocks'  => array(),
			'innerHTML'    => '',
			'innerContent' => array(),
		);
	}

	if ( ! empty( $block['innerBlocks'] ) && is_array( $block['innerBlocks'] ) ) {
		$block['innerBlocks'] = array_map( 'aegis_migrate_video_block_tree', $block['innerBlocks'] );
	}

	return $block;
}

$updated = 0;

$query = new WP_Query(
	array(
		'post_type'      => array( 'post', 'page', 'wp_template', 'wp_template_part', 'wp_block' ),
		'post_status'    => array( 'publish', 'draft', 'private', 'future' ),
		'posts_per_page' => -1,
		'fields'         => 'ids',
	)
);

foreach ( $query->posts as $post_id ) {
	$content = (string) get_post_field( 'post_content', $post_id );

	if ( false === strpos( $content, 'wp:aegis/video' ) ) {
		continue;
	}

	$migrated = aegis_migrate_video_block_content( $content );

	if ( $migrated === $content ) {
		continue;
	}

	wp_update_post(
		array(
			'ID'           => $post_id,
			'post_content' => $migrated,
		)
	);

	++$updated;
	echo 'Migrated post ID ' . (int) $post_id . PHP_EOL;
}

echo 'Done. Updated ' . (int) $updated . ' item(s).' . PHP_EOL;
