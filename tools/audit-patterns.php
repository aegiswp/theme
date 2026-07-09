<?php
/**
 * Pattern / template / block reference audit for Aegis.
 *
 * Run: studio wp eval-file wp-content/themes/aegis/tools/audit-patterns.php
 *
 * @package Aegis
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 1 );
}

$errors   = [];
$warnings = [];

/**
 * @return list<string>
 */
function aegis_audit_pattern_files(): array {
	$files = [];
	$roots = [
		get_template_directory() . '/patterns',
		WP_PLUGIN_DIR . '/aegis/patterns/woocommerce',
		WP_PLUGIN_DIR . '/aegis/patterns/wishlist',
		WP_PLUGIN_DIR . '/aegis-pro/patterns/aegis',
		WP_PLUGIN_DIR . '/aegis-pro/patterns/slider',
	];

	foreach ( $roots as $root ) {
		if ( ! is_dir( $root ) ) {
			continue;
		}
		$iterator = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator( $root, FilesystemIterator::SKIP_DOTS )
		);
		foreach ( $iterator as $file ) {
			if ( $file->isFile() && 'php' === $file->getExtension() ) {
				$basename = $file->getBasename();
				if ( str_starts_with( $basename, '.' ) ) {
					continue;
				}
				$files[] = $file->getPathname();
			}
		}
	}

	foreach ( [ WP_PLUGIN_DIR . '/aegis-pro/patterns/utility' ] as $utility_dir ) {
		if ( ! is_dir( $utility_dir ) ) {
			continue;
		}
		foreach ( glob( $utility_dir . '/*.php' ) ?: [] as $file ) {
			$files[] = $file;
		}
	}

	return $files;
}

/**
 * @param string $file Pattern PHP file.
 * @return array{slug: string, category: string}|null
 */
function aegis_audit_parse_pattern_header( string $file ): ?array {
	$head = file_get_contents( $file, false, null, 0, 2048 );
	if ( ! is_string( $head ) ) {
		return null;
	}
	if ( ! preg_match( '/\* Slug:\s*([^\r\n]+)/', $head, $slug_m ) ) {
		return null;
	}
	if ( ! preg_match( '/\* Categories:\s*([^\r\n]+)/', $head, $cat_m ) ) {
		return null;
	}
	$category = trim( explode( ',', $cat_m[1] )[0] );

	return [
		'slug'     => trim( $slug_m[1] ),
		'category' => $category,
	];
}

/**
 * @param list<string> $files
 * @return array<string, list<string>>
 */
function aegis_audit_build_expected_registry( array $files ): array {
	$registry = [];

	foreach ( $files as $file ) {
		$parsed = aegis_audit_parse_pattern_header( $file );
		if ( null === $parsed ) {
			continue;
		}
		$registered = $parsed['category'] . '-' . $parsed['slug'];
		$registry[ $registered ] ??= [];
		$registry[ $registered ][] = $file;
	}

	return $registry;
}

/**
 * @param string $content File contents.
 * @return list<string>
 */
function aegis_audit_extract_pattern_slugs( string $content ): array {
	if ( ! preg_match_all( '/<!-- wp:pattern \{"slug":"([^"]+)"/', $content, $matches ) ) {
		return [];
	}
	return array_unique( $matches[1] );
}

/**
 * @param string $content File contents.
 * @return list<string>
 */
function aegis_audit_extract_block_names( string $content ): array {
	if ( ! preg_match_all( '/<!-- wp:([a-z0-9-]+\/[a-z0-9-]+)/', $content, $matches ) ) {
		return [];
	}
	return array_unique( $matches[1] );
}

$pattern_files = aegis_audit_pattern_files();
$expected      = aegis_audit_build_expected_registry( $pattern_files );

foreach ( $expected as $slug => $sources ) {
	if ( count( $sources ) > 1 ) {
		$errors[] = "duplicate registered slug '$slug': " . implode( ', ', $sources );
	}
}

$legacy = [ 'agencify', 'codeify', 'saasify', 'launchify', 'blockify.local', '/themes/codeify/', '/themes/agencify/' ];

foreach ( $pattern_files as $file ) {
	$content = (string) file_get_contents( $file );
	foreach ( $legacy as $needle ) {
		if ( str_contains( $content, $needle ) ) {
			$warnings[] = "legacy reference '$needle' in $file";
		}
	}
	if ( str_contains( $content, 'wp:aegis/google-map' ) ) {
		$errors[] = "unmigrated google-map block in $file";
	}
	if ( preg_match( '/<!-- wp:pattern \{[^}]+\}(?!\s*\/-->)/', $content ) ) {
		$errors[] = "malformed pattern block comment in $file";
	}
}

$consumers = array_merge(
	glob( get_template_directory() . '/templates/*.html' ) ?: [],
	glob( get_template_directory() . '/parts/*.html' ) ?: [],
	$pattern_files
);

$registry = WP_Block_Patterns_Registry::get_instance();
$blocks   = WP_Block_Type_Registry::get_instance();

$referenced = [];
$queue      = [];

foreach ( $consumers as $path ) {
	$content = (string) file_get_contents( $path );
	foreach ( aegis_audit_extract_pattern_slugs( $content ) as $slug ) {
		$referenced[ $slug ]   = true;
		$queue[]               = $slug;
	}
	foreach ( aegis_audit_extract_block_names( $content ) as $block ) {
		if ( $blocks->is_registered( $block ) ) {
			continue;
		}
		$message = "unregistered block '$block' in $path";
		if ( str_starts_with( $block, 'co-authors/' ) || str_starts_with( $block, 'woocommerce/' ) ) {
			$warnings[] = $message . ' (optional plugin)';
			continue;
		}
		$errors[] = $message;
	}
}

$seen = [];
while ( $queue ) {
	$slug = array_shift( $queue );
	if ( isset( $seen[ $slug ] ) ) {
		continue;
	}
	$seen[ $slug ] = true;

	if ( ! isset( $expected[ $slug ] ) && ! $registry->get_registered( $slug ) ) {
		$errors[] = "missing pattern slug '$slug'";
		continue;
	}

	$pattern = $registry->get_registered( $slug );
	$content = is_array( $pattern ) ? (string) ( $pattern['content'] ?? '' ) : '';
	if ( '' === $content && isset( $expected[ $slug ] ) ) {
		$source = $expected[ $slug ][0];
		$content = (string) file_get_contents( $source );
		$php_end = strpos( $content, '?>' );
		if ( false !== $php_end ) {
			$content = (string) substr( $content, $php_end + 2 );
		}
	}

	foreach ( aegis_audit_extract_pattern_slugs( $content ) as $nested ) {
		if ( ! isset( $seen[ $nested ] ) ) {
			$queue[] = $nested;
		}
	}
}

$theme_json_path = get_template_directory() . '/theme.json';
$theme_json      = json_decode( (string) file_get_contents( $theme_json_path ), true );
if ( is_array( $theme_json ) && isset( $theme_json['customTemplates'] ) ) {
	foreach ( $theme_json['customTemplates'] as $template ) {
		$name = (string) ( $template['name'] ?? '' );
		if ( '' === $name ) {
			continue;
		}
		$file = get_template_directory() . '/templates/' . $name . '.html';
		if ( ! is_readable( $file ) ) {
			$errors[] = "customTemplates name '$name' has no templates/$name.html";
		}
	}
}

$report = [
	'errors'        => $errors,
	'warnings'      => $warnings,
	'error_count'   => count( $errors ),
	'warning_count' => count( $warnings ),
	'pattern_files' => count( $pattern_files ),
	'expected_slugs'=> count( $expected ),
];

echo wp_json_encode( $report, JSON_PRETTY_PRINT ) . PHP_EOL;

exit( $errors ? 1 : 0 );
