<?php
/**
 * Title: 09. Hero Pattern
 * Slug: aegis/hero-09
 * Categories: hero
 * Description: Full-width dual parallax background hero with heading, paragraph, and social links on the left
 * Keywords: hero, parallax, podcast, social links
 * Viewport Width: 1400
 * Block Types: core/group, core/cover, core/heading, core/paragraph, core/social-links
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('09. Hero Pattern', 'Name of the pattern', 'aegis'); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>","dimRatio":70,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|30","bottom":"0","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
    <div class="wp-block-cover alignfull has-background-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30);min-height:100vh">
        <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
            <img class="wp-block-cover__image-background" alt="<?php echo esc_attr__('Add a brief description of the placeholder image and its context, non-text content for screen readers.', 'aegis'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"gigantic"} -->
                <h1 class="wp-block-heading has-text-align-center has-gigantic-font-size style="font-style:normal;font-weight:400"><?php echo wp_kses_post( _x( '<strong>Main</strong> Heading', 'Replace with a descriptive section title.', 'aegis' ) ); ?></h1>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php echo esc_html_x('[Description (155 characters): Enter a brief overview of an offer, article, or overview of a news update.]', 'Replace with a description of the section', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search","buttonPosition":"button-inside","style":{"border":{"width":"0px","style":"none"}}} /-->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->