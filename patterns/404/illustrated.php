<?php
/**
 * Title: 404 Illustrated
 * Slug: illustrated
 * Categories: 404
 * Keywords: 404, not found, error, illustrated, search, creative
 * Description: A 404 error page with a large illustration area and search prompt.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["404"],"patternName":"illustrated","name":"404 Illustrated"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}},"dimensions":{"minHeight":"70vh"}},"backgroundColor":"neutral-50","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="min-height:70vh;padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:image {"width":"280px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
	<figure class="wp-block-image aligncenter size-full is-resized"><img alt="" style="width:280px" /></figure>
	<!-- /wp:image -->

	<!-- wp:heading {"textAlign":"center","fontSize":"40","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
	<h2 class="wp-block-heading has-text-align-center has-40-font-size" style="margin-top:var(--wp--preset--spacing--md)"><?php echo esc_html__( 'Oops! Nothing Here', 'aegis' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-600","style":{"layout":{"selfStretch":"fit"}}} -->
	<p class="aligncenter has-text-align-center has-neutral-600-color has-text-color aligncenter"><?php echo esc_html__( 'It looks like this page has wandered off. Try searching for what you need, or head back to the homepage.', 'aegis' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search the site...","width":100,"widthUnit":"%","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"layout":{"selfStretch":"fixed","flexSize":"480px"},"border":{"radius":"8px"}}} /-->

	<!-- wp:paragraph {"align":"center","textColor":"neutral-400","fontSize":"14","style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
	<p class="aligncenter has-text-align-center has-neutral-400-color has-text-color has-14-font-size aligncenter" style="margin-top:var(--wp--preset--spacing--sm)"><?php echo esc_html__( 'Or go back to the', 'aegis' ); ?> <a href="/"><?php echo esc_html__( 'homepage', 'aegis' ); ?></a>.</p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
