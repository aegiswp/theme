<?php
$revision = get_post( 2294 );
if ( ! $revision || 'revision' !== $revision->post_type ) {
	WP_CLI::error( 'Revision 2294 not found.' );
}

$content = $revision->post_content;

$old_form = '<form style="display:flex;align-items:center;gap:8px;margin-top:8px">
				<input type="email" placeholder="Your email" style="flex:1;box-sizing:border-box;height:42px;margin:0;padding:0 14px;border:1px solid var(--wp--preset--color--neutral-300);border-radius:6px;font-size:14px;line-height:1;background:var(--wp--preset--color--neutral-0);color:inherit" required />
				<button type="submit" style="box-sizing:border-box;height:42px;margin:0;padding:0 20px;background:var(--wp--preset--color--primary-500);color:var(--wp--preset--color--neutral-0);border:1px solid transparent;border-radius:6px;font-size:14px;line-height:1;font-weight:600;cursor:pointer;white-space:nowrap">Subscribe</button>
			</form>';

$new_form = '<form class="aegis-store-newsletter" style="display:flex;align-items:center;gap:8px;margin-top:8px">
				<input type="email" placeholder="Your email" style="flex:1 1 auto;min-width:0;box-sizing:border-box;height:42px;margin:0;padding:0 14px;border:1px solid var(--wp--preset--color--neutral-300);border-radius:6px;font-size:14px;line-height:42px;background:var(--wp--preset--color--neutral-0);color:inherit;align-self:center" required />
				<button type="submit" style="box-sizing:border-box;flex:0 0 auto;height:42px;margin:0;padding:0 20px;background:var(--wp--preset--color--primary-500);color:var(--wp--preset--color--neutral-0);border:1px solid transparent;border-radius:6px;font-size:14px;line-height:42px;font-weight:600;cursor:pointer;white-space:nowrap;display:inline-flex;align-items:center;justify-content:center;align-self:center">Subscribe</button>
			</form>';

if ( ! str_contains( $content, $old_form ) ) {
	WP_CLI::warning( 'Exact form not found in revision — restoring revision as-is.' );
} else {
	$content = str_replace( $old_form, $new_form, $content );
	WP_CLI::log( 'Form styles applied on top of revision.' );
}

// Ensure brand icon JSON is valid (serialize_block_attributes encoding).
$home = home_url( '/' );
$svg  = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-labelledby="icon-footer-store-aegis" data-icon="social-aegis" style="min-width:35px;height:35px" fill="currentColor"><title id="icon-footer-store-aegis">Aegis Icon</title><path d="M10.06 7.75 L12.02 3.87 L13.95 7.72 L16.65 9.29 L12.03 0 L7.34 9.3 L10.06 7.75 Z M18.37 12.72 L18.2 12.36 L15.5 10.79 L17.02 13.68 L20.05 18.61 L12.02 15.17 L3.98 18.62 L6.96 13.68 L8.39 10.81 L5.67 12.39 L5.5 12.71 L0 22.87 L12.01 16.87 L24 22.94 L18.37 12.72 Z" stroke="none" fill-rule="evenodd"></path></svg>';

$good_icon = '<!-- wp:icon ' . serialize_block_attributes(
	array(
		'icon'          => 'social/aegis',
		'url'           => $home,
		'iconSvgString' => $svg,
		'style'         => array(
			'dimensions' => array(
				'width' => '35px',
			),
		),
	)
) . ' /-->';

// Replace footer brand icon only: the one immediately before Quality products blurb.
$pattern = '/<!-- wp:icon \{[^>]*?icon-footer-store-aegis[^>]*?\} \/-->/s';
if ( preg_match( $pattern, $content ) ) {
	$content = preg_replace( $pattern, $good_icon, $content, 1 );
	WP_CLI::log( 'Re-encoded footer brand icon.' );
} elseif ( preg_match( '/<!-- wp:icon \{"icon":"social\/aegis".*?\/-->/s', $content, $m ) ) {
	// Fallback: replace first social/aegis that sits before Quality products.
	$q = strpos( $content, 'Quality products with fast shipping' );
	$before = substr( $content, 0, $q );
	if ( preg_match_all( '/<!-- wp:icon \{"icon":"social\/aegis".*?\/-->/s', $before, $all ) ) {
		$last = end( $all[0] );
		$content = str_replace( $last, $good_icon, $content );
		WP_CLI::log( 'Replaced last social/aegis before Quality products.' );
	}
}

wp_update_post(
	array(
		'ID'           => 2289,
		'post_content' => $content,
	)
);

$saved = (string) get_post_field( 'post_content', 2289 );
WP_CLI::success(
	sprintf(
		'Restored. len=%d ultimate=%s columns=%d newsletter=%s siteLogo=%s',
		strlen( $saved ),
		str_contains( $saved, 'Ultimate Product' ) ? 'yes' : 'no',
		substr_count( $saved, '<!-- wp:columns' ),
		str_contains( $saved, 'aegis-store-newsletter' ) ? 'yes' : 'no',
		str_contains( $saved, 'site-logo {"width":30}' ) ? 'yes' : 'no'
	)
);

// Parse check for icon before quality.
$blocks = parse_blocks( $saved );
$found  = false;
$walker = function ( $blocks ) use ( &$walker, &$found ) {
	foreach ( $blocks as $b ) {
		$name = (string) ( $b['blockName'] ?? '' );
		if ( str_ends_with( $name, 'icon' ) && ( $b['attrs']['icon'] ?? '' ) === 'social/aegis' && ! empty( $b['attrs']['iconSvgString'] ) ) {
			if ( str_contains( $b['attrs']['iconSvgString'], 'icon-footer-store-aegis' ) || str_contains( $b['attrs']['iconSvgString'], 'social-aegis' ) ) {
				$found = true;
			}
		}
		if ( ! empty( $b['innerBlocks'] ) ) {
			$walker( $b['innerBlocks'] );
		}
	}
};
$walker( $blocks );
WP_CLI::log( 'parsed social/aegis icon: ' . ( $found ? 'yes' : 'no' ) );
