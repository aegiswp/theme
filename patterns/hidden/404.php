<?php
/**
 * Title: Page 404
 * Slug: 404
 * Categories: hidden
 * Keywords: 404, error, not found, page
 * Description: A 404 error page layout.
 * Viewport Width: 1280
 * Block Types: core/post-content
 */
?>

<!-- wp:group {"metadata":{"categories":["hidden"],"patternName":"404","name":"Page 404"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","right":"var:preset|spacing|sm","left":"var:preset|spacing|sm"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--sm)">
    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","orientation":"vertical","justifyContent":"center"}} -->
    <div class="wp-block-group">
        <!-- wp:paragraph {"align":"center","className":"is-style-sub-heading","fontSize":"60"} -->
        <p class="aligncenter has-text-align-center is-style-sub-heading has-60-font-size aligncenter"><?php echo esc_html__( '404', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:heading {"textAlign":"center","level":1} -->
        <h1 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Page Not Found', 'aegis' ); ?></h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="aligncenter has-text-align-center aligncenter"><?php echo esc_html__( 'Sorry, the page you are looking for could not be found. Try searching the site using the search form below.', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search this site","widthUnit":"%","buttonText":"Search","buttonUseIcon":true,"style":{"spacing":{"margin":{"top":"2em"}}}} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->