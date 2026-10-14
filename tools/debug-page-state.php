<?php
/**
 * Debug slider demo page + carousel boot.
 *
 * @package Aegis
 */

echo 'pro-active: ' . ( is_plugin_active( 'aegis-pro/aegis-pro.php' ) ? 'yes' : 'no' ) . "\n";
echo 'carousel-setting: ' . ( \Aegis\Framework\ServiceProvider::is_block_enabled( 'query_loop_carousel_layout' ) ? 'on' : 'off' ) . "\n";
echo 'CarouselLayout: ' . ( class_exists( '\\AegisPro\\Query\\CarouselLayout' ) ? 'yes' : 'no' ) . "\n";

$c = (string) get_post_field( 'post_content', 2385 );
echo 'attr-in-content: ' . ( str_contains( $c, 'aegisProCarouselEnabled' ) ? 'yes' : 'no' ) . "\n";
echo 'surface-in-content: ' . ( str_contains( $c, 'aegis-carousel-item is-style-surface' ) ? 'yes' : 'no' ) . "\n";
echo 'neutral-50: ' . ( str_contains( $c, 'neutral-50' ) ? 'yes' : 'no' ) . "\n";
echo 'hero-learn-more: ' . ( str_contains( $c, 'Learn More' ) ? 'yes' : 'no' ) . "\n";
echo 'has-filter: ' . ( has_filter( 'render_block_core/query' ) ? 'yes' : 'no' ) . "\n";

$find = static function ( array $blocks ) use ( &$find ): ?array {
	foreach ( $blocks as $block ) {
		if ( ( $block['blockName'] ?? '' ) === 'core/query' ) {
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
if ( $query ) {
	echo 'query-enabled: ' . ( ! empty( $query['attrs']['aegisProCarouselEnabled'] ) ? 'yes' : 'no' ) . "\n";
	echo 'query-attrs: ' . wp_json_encode(
		array_intersect_key(
			$query['attrs'] ?? array(),
			array_flip( array( 'namespace', 'aegisProCarouselEnabled', 'aegisProCarouselPerView', 'align' ) )
		)
	) . "\n";
} else {
	echo "no-query\n";
}

// Validate hero outline button markup vs expected save.
$pos = strpos( $c, 'Learn More' );
if ( false !== $pos ) {
	echo 'learn-more-context: ' . substr( $c, max( 0, $pos - 280 ), 420 ) . "\n";
}
