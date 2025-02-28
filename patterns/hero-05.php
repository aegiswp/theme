<?php
/**
 * Title: 05. Hero Pattern
 * Slug: aegis/hero-5
 * Categories: hero, podcast
 * Description: Block pattern featuring a full-screen cover with a bold headline, tagline, description, and decorative logos, complemented by call-to-action buttons. Designed to deliver visual impact and accessibility for various content types.
 * Keywords: hero, cover, podcast, tagline, headline, description, logos, call-to-action
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/cover, core/group, core/heading, core/image, core/paragraph
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('05. Hero Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('hero, podcast', 'Name of the categories', 'aegis'); ?>"],"patternName":"aegis/hero-5"},"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
    <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>","dimRatio":70,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1000px"}} -->
    <div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:100vh">
        <span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" data-object-fit="cover" />
        <div class="wp-block-cover__inner-container">
            <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase","fontSize":"5rem"}}} -->
                <h1 class="wp-block-heading has-text-align-center" style="font-size:5rem;font-style:normal;font-weight:600;text-transform:uppercase">
                    <?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?>
                </h1>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|30"}}}} -->
                <p class="has-text-align-center" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--30)">
                    <?php echo esc_html_x('Provide a concise description, up to 155 characters, summarizing the key points of an offer, article, or news update.', 'Replace with a description of the section.', 'aegis'); ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap","orientation":"horizontal"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"backgroundColor":"background","textColor":"foreground","className":"is-style-outline","style":{"border":{"width":"2px"},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}}},"borderColor":"foreground"} -->
                    <div class="wp-block-button is-style-outline">
                        <a class="wp-block-button__link has-foreground-color has-background-background-color has-text-color has-background has-link-color has-border-color has-foreground-border-color wp-element-button" href="#" style="border-width:2px"><?php echo esc_html_x( 'Call to Action →', 'Call-to-action button text', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->

                    <!-- wp:button {"backgroundColor":"foreground","className":"is-style-outline"} -->
                    <div class="wp-block-button is-style-outline">
                        <a class="wp-block-button__link has-foreground-background-color has-background wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
                <!-- wp:paragraph {"align":"center","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"bottom":"-20px"}}},"fontSize":"tiny"} -->
                <p class="has-text-align-center has-tiny-font-size" style="margin-bottom:-20px;font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase">
                    <?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?>
                </p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","right":"0","left":"0"},"blockGap":"var:preset|spacing|40","margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"neutral-700","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
                <div class="wp-block-group has-neutral-700-color has-text-color" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-style:normal;font-weight:500">
                    <!-- wp:image {"width":"70px","sizeSlug":"thumbnail","linkDestination":"none","align":"center"} -->
                    <figure class="wp-block-image aligncenter size-thumbnail is-resized">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_aegis_light.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:70px" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"width":"70px","sizeSlug":"thumbnail","linkDestination":"none","align":"center"} -->
                    <figure class="wp-block-image aligncenter size-thumbnail is-resized">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_aegis_light.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:70px" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"width":"70px","sizeSlug":"thumbnail","linkDestination":"none","align":"center"} -->
                    <figure class="wp-block-image aligncenter size-thumbnail is-resized">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_aegis_light.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:70px" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"width":"70px","sizeSlug":"thumbnail","linkDestination":"none","align":"center"} -->
                    <figure class="wp-block-image aligncenter size-thumbnail is-resized">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_aegis_light.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:70px" />
                    </figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->