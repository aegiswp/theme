<?php
/**
 * Find all sliders / slides / Sarah on demo page.
 *
 * @package Aegis
 */

$c = (string) get_post_field( 'post_content', 2385 );
echo 'length: ' . strlen( $c ) . "\n";
echo 'aegis/slider: ' . substr_count( $c, 'wp:aegis/slider' ) . "\n";
echo 'aegis/slide: ' . substr_count( $c, 'wp:aegis/slide' ) . "\n";
echo 'Sarah: ' . ( str_contains( $c, 'Sarah Johnson' ) ? 'yes' : 'no' ) . "\n";
echo 'Transform Your: ' . ( str_contains( $c, 'Transform Your Digital' ) ? 'yes' : 'no' ) . "\n";
echo 'Latest Posts: ' . ( str_contains( $c, 'Latest Posts' ) ? 'yes' : 'no' ) . "\n";
echo 'Featured Books: ' . ( str_contains( $c, 'Featured Books' ) ? 'yes' : 'no' ) . "\n";
echo 'wp:block refs: ' . substr_count( $c, '<!-- wp:block ' ) . "\n";

$walk = static function ( array $blocks, int $depth = 0 ) use ( &$walk ): void {
	foreach ( $blocks as $block ) {
		$name = $block['blockName'] ?? null;
		if ( ! $name ) {
			continue;
		}
		$indent = str_repeat( '  ', $depth );
		$extra  = '';
		if ( $name === 'aegis/slider' ) {
			$kids = $block['innerBlocks'] ?? array();
			$slide_kids = array_values(
				array_filter(
					$kids,
					static fn( $b ) => ( $b['blockName'] ?? '' ) === 'aegis/slide'
				)
			);
			$extra = ' children=' . count( $kids ) . ' slides=' . count( $slide_kids );
			$meta  = $block['attrs']['metadata']['name'] ?? '';
			if ( $meta ) {
				$extra .= ' name=' . $meta;
			}
		}
		if ( $name === 'core/block' ) {
			$extra = ' ref=' . ( $block['attrs']['ref'] ?? '?' );
		}
		echo $indent . $name . $extra . "\n";
		if ( in_array( $name, array( 'aegis/slider', 'aegis/slide', 'core/block', 'core/group' ), true )
			|| $depth < 2
		) {
			if ( ! empty( $block['innerBlocks'] ) ) {
				$walk( $block['innerBlocks'], $depth + 1 );
			}
		}
	}
};

echo "--- tree ---\n";
$walk( parse_blocks( $c ) );
