<?php
/**
 * Validate a theme pattern's block markup against WordPress serializers.
 *
 * Usage: wp eval-file wp-content/themes/aegis/tools/validate-pattern.php talk-hero
 *    or: php -d display_errors=1 this-file.php (after wp-load)
 */

require dirname( __DIR__, 4 ) . '/wp-load.php';

// WP-CLI: studio wp eval-file tools/validate-pattern.php event/talk-hero
// Plain PHP argv also works when bootstrapped.
$file = 'event/talk-hero';
if ( defined( 'WP_CLI' ) && WP_CLI && isset( $args[0] ) ) {
	$file = (string) $args[0];
} elseif ( isset( $argv[1] ) ) {
	$file = (string) $argv[1];
}
$path = get_template_directory() . '/patterns/' . $file . '.php';

if ( ! is_readable( $path ) ) {
	fwrite( STDERR, "Missing: {$path}\n" );
	exit( 1 );
}

ob_start();
include $path;
$content = ob_get_clean();

$registry = WP_Block_Type_Registry::get_instance();

$check = static function ( array $blocks, int $depth = 0 ) use ( &$check, $registry ): int {
	$errors = 0;

	foreach ( $blocks as $block ) {
		$name = $block['blockName'] ?? null;
		if ( ! $name ) {
			continue;
		}

		$type = $registry->get_registered( $name );
		$indent = str_repeat( '  ', $depth );

		if ( ! $type ) {
			echo "{$indent}UNKNOWN {$name}\n";
			$errors++;
			continue;
		}

		$is_valid = true;
		if ( function_exists( 'validate_block' ) ) {
			// WP 6.x uses block validation in JS primarily; PHP has limited helpers.
		}

		// Re-serialize and compare source-sensitive HTML for dynamic mismatch signals.
		$original_inner = $block['innerHTML'] ?? '';
		$reserialized   = serialize_block( $block );
		$reparsed       = parse_blocks( $reserialized )[0] ?? null;
		$new_inner      = $reparsed['innerHTML'] ?? '';

		// Normalize whitespace for comparison.
		$norm = static function ( string $html ): string {
			$html = preg_replace( '/\s+/', ' ', $html );
			return trim( (string) $html );
		};

		$orig_n = $norm( $original_inner );
		$new_n  = $norm( $new_inner );

		if ( $orig_n !== $new_n && $original_inner !== '' ) {
			echo "{$indent}MISMATCH {$name}\n";
			echo "{$indent}  ATTRS: " . wp_json_encode( $block['attrs'] ) . "\n";
			echo "{$indent}  HAVE: {$orig_n}\n";
			echo "{$indent}  WANT: {$new_n}\n";
			$errors++;
		} else {
			echo "{$indent}OK {$name}\n";
		}

		if ( ! empty( $block['innerBlocks'] ) ) {
			$errors += $check( $block['innerBlocks'], $depth + 1 );
		}
	}

	return $errors;
};

$blocks = parse_blocks( $content );
$count  = $check( $blocks );

echo $count ? "\n{$count} mismatch(es)\n" : "\nAll blocks match serializer output.\n";
exit( $count ? 1 : 0 );
