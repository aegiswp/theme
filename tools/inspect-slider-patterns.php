<?php
/**
 * Inspect which slider patterns are registered and whether they include placeholders.
 *
 * @package Aegis
 */

$dirs = apply_filters( 'aegis_pattern_dirs', [ get_stylesheet_directory() . '/patterns' ] );
echo "Pattern dirs:\n";
foreach ( $dirs as $dir ) {
	echo ' - ' . $dir . "\n";
	$slider = trailingslashit( $dir ) . 'slider';
	if ( is_dir( $slider ) ) {
		foreach ( glob( $slider . '/*.php' ) ?: [] as $file ) {
			echo '   file: ' . basename( $file ) . "\n";
		}
		// Also list dotted files.
		foreach ( glob( $slider . '/.*.php' ) ?: [] as $file ) {
			echo '   dotfile: ' . basename( $file ) . "\n";
		}
	}
}

echo "\nRegistered slider-related patterns:\n";
$regs = WP_Block_Patterns_Registry::get_instance()->get_all_registered();
foreach ( $regs as $p ) {
	$name  = $p['name'] ?? '';
	$title = $p['title'] ?? '';
	$cat  = implode( ',', $p['categories'] ?? [] );
	if ( ! str_contains( $cat, 'slider' ) && ! str_contains( strtolower( $title ), 'slider' ) && ! str_contains( strtolower( $title ), 'carousel' ) && ! str_contains( strtolower( $name ), 'slider' ) ) {
		continue;
	}
	$content = $p['content'] ?? '';
	echo sprintf(
		"%s | %s | pravatar:%s | unsplash:%s | 20px:%s | placeholder-img:%s\n",
		$name,
		$title,
		str_contains( $content, 'pravatar' ) ? 'yes' : 'no',
		str_contains( $content, 'unsplash' ) ? 'yes' : 'no',
		str_contains( $content, 'font-size:20px' ) ? 'yes' : 'no',
		str_contains( $content, '<img alt=""' ) ? 'yes' : 'no'
	);
}
