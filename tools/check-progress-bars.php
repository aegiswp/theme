<?php
/**
 * Temporary: inspect progress-bars pattern render output.
 *
 * @package aegis
 */

$path = get_stylesheet_directory() . '/patterns/stats/progress-bars.php';
ob_start();
include $path;
$raw = ob_get_clean();

$html = do_blocks( $raw );

echo "RAW_HAS_WIDTH_ATTR=" . ( str_contains( $raw, '"width":{"all"' ) ? 'yes' : 'no' ) . "\n";
echo "HTML_HAS_WIDTH_CLASS=" . ( str_contains( $html, 'has-width' ) ? 'yes' : 'no' ) . "\n";
echo "HTML_HAS_CSS_WIDTH=" . ( preg_match( '/style="[^"]*width:\d+%/', $html ) ? 'yes' : 'no' ) . "\n";
echo "HTML_HAS_VAR_WIDTH=" . ( str_contains( $html, '--width:' ) ? 'yes' : 'no' ) . "\n";
echo "HTML_HAS_OVERFLOW_CLASS=" . ( str_contains( $html, 'has-overflow-hidden' ) ? 'yes' : 'no' ) . "\n";

if ( preg_match_all( '/has-primary-500[^"]*"[^>]*style="([^"]*)"/', $html, $m ) ) {
	echo "FILL_STYLES:\n";
	foreach ( $m[1] as $s ) {
		echo '  ' . $s . "\n";
	}
}

if ( preg_match_all( '/class="([^"]*has-primary-500[^"]*)"/', $html, $m ) ) {
	echo "FILL_CLASSES:\n";
	foreach ( $m[1] as $s ) {
		echo '  ' . $s . "\n";
	}
}

if ( preg_match_all( '/has-neutral-300[^"]*"[^>]*style="([^"]*)"/', $html, $m ) ) {
	echo "TRACK_STYLES:\n";
	foreach ( $m[1] as $s ) {
		echo '  ' . $s . "\n";
	}
}

if ( preg_match_all( '/class="([^"]*has-neutral-300[^"]*)"/', $html, $m ) ) {
	echo "TRACK_CLASSES:\n";
	foreach ( $m[1] as $s ) {
		echo '  ' . $s . "\n";
	}
}
