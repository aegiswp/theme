<?php
/**
 * Generates src/Blocks/blocks-manifest.php from theme block.json files.
 *
 * @package Aegis
 */

declare( strict_types=1 );

$blocks_dir = __DIR__ . '/../src/Blocks';
$manifest   = [];
$files      = glob( $blocks_dir . '/*/block.json' ) ?: [];

foreach ( $files as $block_json ) {
	$raw = file_get_contents( $block_json );

	if ( $raw === false ) {
		continue;
	}

	$metadata = json_decode( $raw, true );

	if ( ! is_array( $metadata ) || empty( $metadata['name'] ) ) {
		continue;
	}

	if ( ! str_starts_with( (string) $metadata['name'], 'aegis/' ) ) {
		continue;
	}

	$slug              = basename( dirname( $block_json ) );
	$manifest[ $slug ] = $metadata;
}

ksort( $manifest );

$output  = "<?php\n// This file is generated. Do not modify it manually.\nreturn ";
$output .= var_export( $manifest, true );
$output .= ";\n";

file_put_contents( $blocks_dir . '/blocks-manifest.php', $output );

echo 'Wrote ' . count( $manifest ) . " blocks to src/Blocks/blocks-manifest.php\n";
