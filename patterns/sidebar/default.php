<?php
/**
 * Title: Sidebar Default
 * Slug: default
 * Categories: sidebar
 * Keywords: sidebar, widgets, blog, author, calendar, search, categories
 * Description: A complete blog sidebar with author bio, search, recent posts, categories, archives, calendar, tags, and social links.
 * Viewport Width: 400
 * Block Types: core/template-part/sidebar
 */

$aegis_sidebar_author = null;
$aegis_sidebar_users  = get_users(
	array(
		'role'    => 'administrator',
		'number'  => 1,
		'orderby' => 'ID',
		'order'   => 'ASC',
	)
);

if ( ! empty( $aegis_sidebar_users[0] ) ) {
	$aegis_sidebar_author = $aegis_sidebar_users[0];
} else {
	$aegis_sidebar_users = get_users(
		array(
			'number'  => 1,
			'orderby' => 'ID',
			'order'   => 'ASC',
		)
	);
	$aegis_sidebar_author = $aegis_sidebar_users[0] ?? null;
}

$aegis_sidebar_author_id   = $aegis_sidebar_author ? (int) $aegis_sidebar_author->ID : 0;
$aegis_sidebar_author_name = $aegis_sidebar_author ? $aegis_sidebar_author->display_name : get_bloginfo( 'name' );
$aegis_sidebar_author_bio  = $aegis_sidebar_author_id ? (string) get_user_meta( $aegis_sidebar_author_id, 'description', true ) : '';

if ( '' === trim( $aegis_sidebar_author_bio ) ) {
	$aegis_sidebar_author_bio = (string) get_bloginfo( 'description' );
}

if ( '' === trim( $aegis_sidebar_author_bio ) ) {
	$aegis_sidebar_author_bio = __( 'Writer, editor, and curious mind sharing ideas worth reading.', 'aegis' );
}

$aegis_sidebar_author_url = $aegis_sidebar_author_id ? get_author_posts_url( $aegis_sidebar_author_id ) : home_url( '/' );
?>

<!-- wp:group {"metadata":{"categories":["sidebar"],"patternName":"sidebar-default","name":"Sidebar Default"},"style":{"spacing":{"blockGap":"var:preset|spacing|md"},"position":{"type":"sticky","top":"0px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group">

	<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
		<!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","fontSize":"12"} -->
		<p class="has-text-align-center is-style-sub-heading has-12-font-size"><?php echo esc_html__( 'About the Author', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<?php if ( $aegis_sidebar_author_id ) : ?>
		<!-- wp:avatar {"size":88,"userId":<?php echo (int) $aegis_sidebar_author_id; ?>,"isLink":true,"style":{"border":{"radius":"100%"}}} /-->
		<?php endif; ?>

		<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"18"} -->
		<h3 class="wp-block-heading has-text-align-center has-18-font-size"><a href="<?php echo esc_url( $aegis_sidebar_author_url ); ?>"><?php echo esc_html( $aegis_sidebar_author_name ); ?></a></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"14"} -->
		<p class="has-text-align-center has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html( $aegis_sidebar_author_bio ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:social-links {"iconColor":"neutral-600","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"12px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
			<!-- wp:social-link {"url":"#","service":"facebook"} /-->
			<!-- wp:social-link {"url":"#","service":"instagram"} /-->
			<!-- wp:social-link {"url":"#","service":"x"} /-->
			<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
			<!-- wp:social-link {"url":"#","service":"bluesky"} /-->
		</ul>
		<!-- /wp:social-links -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
		<!-- wp:heading {"level":3,"fontSize":"16"} -->
		<h3 class="wp-block-heading has-16-font-size"><?php echo esc_html__( 'Search', 'aegis' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:search {"label":"<?php echo esc_attr__( 'Search', 'aegis' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr__( 'Search posts…', 'aegis' ); ?>","width":100,"widthUnit":"%","buttonText":"<?php echo esc_attr__( 'Search', 'aegis' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"fontSize":"14"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
		<!-- wp:heading {"level":3,"fontSize":"16"} -->
		<h3 class="wp-block-heading has-16-font-size"><?php echo esc_html__( 'Recent Posts', 'aegis' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:latest-posts {"postsToShow":4,"displayPostDate":true,"displayFeaturedImage":true,"featuredImageAlign":"left","featuredImageSizeSlug":"thumbnail","featuredImageSizeWidth":56,"featuredImageSizeHeight":56,"addLinkToFeaturedImage":true,"fontSize":"14"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
		<!-- wp:heading {"level":3,"fontSize":"16"} -->
		<h3 class="wp-block-heading has-16-font-size"><?php echo esc_html__( 'Categories', 'aegis' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:categories {"showPostCounts":true,"showOnlyTopLevel":true,"showLabel":false,"fontSize":"14"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
		<!-- wp:heading {"level":3,"fontSize":"16"} -->
		<h3 class="wp-block-heading has-16-font-size"><?php echo esc_html__( 'Archives', 'aegis' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:archives {"showPostCounts":true,"showLabel":false,"type":"monthly","fontSize":"14"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
		<!-- wp:heading {"level":3,"fontSize":"16"} -->
		<h3 class="wp-block-heading has-16-font-size"><?php echo esc_html__( 'Calendar', 'aegis' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:calendar {"fontSize":"14"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
		<!-- wp:heading {"level":3,"fontSize":"16"} -->
		<h3 class="wp-block-heading has-16-font-size"><?php echo esc_html__( 'Tags', 'aegis' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:tag-cloud {"taxonomy":"post_tag","numberOfTags":24,"smallestFontSize":"12px","largestFontSize":"12px"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
	<div class="wp-block-group is-style-surface" style="padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
		<!-- wp:heading {"level":3,"fontSize":"16"} -->
		<h3 class="wp-block-heading has-16-font-size"><?php echo esc_html__( 'Stay in the loop', 'aegis' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"textColor":"neutral-600","fontSize":"14"} -->
		<p class="has-neutral-600-color has-text-color has-14-font-size"><?php echo esc_html__( 'Get new posts and updates delivered to your inbox.', 'aegis' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:search {"label":"","showLabel":false,"placeholder":"<?php echo esc_attr__( 'Your email', 'aegis' ); ?>","width":100,"widthUnit":"%","buttonText":"<?php echo esc_attr__( 'Subscribe', 'aegis' ); ?>","buttonPosition":"button-outside","buttonUseIcon":false,"className":"is-style-newsletter","fontSize":"14"} /-->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
