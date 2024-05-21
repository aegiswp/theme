<?php
/**
 * Title: 04. Hero Pattern
 * Slug: aegis/hero-04
 * Categories: hero
 * Description: Full-width cover video background hero with a centered headline, paragraph, and call to action button
 * Keywords: call to action, hero, video
 * Viewport Width: 1400
 * Block Types: core/group, core/cover, core/heading, core/paragraph, core/buttons
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"},"metadata":{"name":"<?php echo esc_html_x('04. Hero Pattern', 'Name of the pattern', 'aegis'); ?>"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
    <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/videos/sample.mp4","dimRatio":70,"overlayColor":"foreground","backgroundType":"video","minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}},"color":[]}} -->
    <div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50);min-height:100vh">
        <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span>
        <video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/videos/sample.mp4" data-object-fit="cover"></video>
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="padding-right:0;padding-left:0">
                <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"gigantic"} -->
                <h1 class="wp-block-heading has-text-align-center has-gigantic-font-size" style="font-style:normal;font-weight:400"><?php echo wp_kses_post( _x( '<strong>Main</strong> Heading', 'Replace with a descriptive section title.', 'aegis' ) ); ?></h1>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center"} -->
                <p class="has-text-align-center"><?php echo esc_html_x('[Description (155 characters): Enter a brief overview of an offer, article, or overview of a news update.]', 'Replace with a description of the section', 'aegis'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
                    <!-- wp:button {"style":{"color":{"background":"#1c1c1fb3"}},"className":"is-style-outline"} -->
                    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-background wp-element-button" href="#" style="background-color:#1c1c1fb3"><?php echo esc_html_x( '[Call to Action]', 'Call to action button text.', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->