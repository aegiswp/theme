<?php
/**
 * Verify carousel attrs are registered and present after refresh.
 *
 * @package Aegis
 */

$registry = WP_Block_Type_Registry::get_instance()->get_registered( 'core/query' );
echo 'registered-attr: ' . ( isset( $registry->attributes['aegisProCarouselEnabled'] ) ? 'yes' : 'no' ) . "\n";

$c = (string) get_post_field( 'post_content', 2385 );
echo 'attr-in-content: ' . ( str_contains( $c, 'aegisProCarouselEnabled' ) ? 'yes' : 'no' ) . "\n";
echo 'learn-more: ' . ( str_contains( $c, 'Learn More' ) ? 'yes' : 'no' ) . "\n";

$find = static function ( array $blocks ) use ( &$find ): ?array {
	foreach ( $blocks as $block ) {
		if ( ( $block['blockName'] ?? '' ) === 'core/query' && ! empty( $block['attrs']['aegisProCarouselEnabled'] ) ) {
			return $block;
		}
		if ( ! empty( $block['innerBlocks'] ) ) {
			$found = $find( $block['innerBlocks'] );
			if ( $found ) {
				return $found;
			}
		}
	}
	return null;
};

$query = $find( parse_blocks( $c ) );
if ( ! $query ) {
	echo "no-enabled-query\n";
	return;
}

$rendered = render_block( $query );
echo 'has-wrapper: ' . ( str_contains( $rendered, 'aegis-carousel-query' ) ? 'yes' : 'no' ) . "\n";
