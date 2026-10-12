<?php
/**
 * Compare progress-bars pattern markup to serialize_blocks output.
 *
 * @package aegis
 */

$path = get_stylesheet_directory() . '/patterns/stats/progress-bars.php';
ob_start();
include $path;
$raw = ob_get_clean();

$blocks      = parse_blocks( $raw );
$serialized = serialize_blocks( $blocks );

echo 'same=' . ( trim( $raw ) === trim( $serialized ) ? 'yes' : 'no' ) . "\n";

// Extract first fill group comment + opening div from each.
preg_match_all( '/<!-- wp:group \{[^}]*flexSize[^;]*-->\s*<div[^>]+>/', $raw, $raw_matches );
preg_match_all( '/<!-- wp:group \{[^}]*flexSize[^;]*-->\s*<div[^>]+>/', $serialized, $ser_matches );

echo "raw_flex_groups=" . count( $raw_matches[0] ) . "\n";
echo "ser_flex_groups=" . count( $ser_matches[0] ) . "\n";

if ( ! empty( $raw_matches[0][0] ) ) {
	echo "RAW0:\n" . $raw_matches[0][0] . "\n";
}
if ( ! empty( $ser_matches[0][0] ) ) {
	echo "SER0:\n" . $ser_matches[0][0] . "\n";
}

// Also show first primary fill div styles from both.
preg_match( '/has-primary-500-background-color[^>]*>/', $raw, $r1 );
preg_match( '/has-primary-500-background-color[^>]*>/', $serialized, $s1 );
echo "RAW_FILL: " . ( $r1[0] ?? 'none' ) . "\n";
echo "SER_FILL: " . ( $s1[0] ?? 'none' ) . "\n";

file_put_contents( WP_CONTENT_DIR . '/uploads/progress-raw.html', $raw );
file_put_contents( WP_CONTENT_DIR . '/uploads/progress-serialized.html', $serialized );
echo "wrote uploads/progress-*.html\n";
