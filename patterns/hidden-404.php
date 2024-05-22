<?php
/**
 * Title: 404
 * Slug: aegis/hidden-404
 * Inserter: no
 */
?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"right":"var(--wp--custom--spacing--small, 1.25rem)","left":"var(--wp--custom--spacing--small, 1.25rem)"}}},"className":"site-content"} -->
<main class="wp-block-group site-content" style="padding-right:var(--wp--custom--spacing--small, 1.25rem);padding-left:var(--wp--custom--spacing--small, 1.25rem)">
    <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"3rem"},"blockGap":"var:preset|spacing|30"}},"layout":{"inherit":true,"type":"constrained"}} -->
    <div class="wp-block-group" style="padding-bottom:3rem">
        <!-- wp:heading {"style":{"typography":{"fontSize":"clamp(4rem, 40vw, 20rem)","fontWeight":"200","lineHeight":"1"}},"className":"has-text-align-center"} -->
        <h2 class="wp-block-heading has-text-align-center" style="font-size:clamp(4rem, 40vw, 20rem);font-weight:200;line-height:1"><?php echo esc_html_x( '404', 'Error code for a webpage that is not found.', 'aegis' ); ?></h2>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center"><?php echo esc_html_x( 'The page you are looking for does not exist, or it has been moved. Please try searching using the form below.', 'Message to convey that a webpage could not be found', 'aegis' ); ?></p>
        <!-- /wp:paragraph -->

        <!-- wp:search {"label":"Search","showLabel":false,"width":50,"widthUnit":"%","buttonText":"Search","buttonUseIcon":true,"align":"center","backgroundColor":"foreground"} /-->
    </div>
    <!-- /wp:group -->
</main>
<!-- /wp:group -->