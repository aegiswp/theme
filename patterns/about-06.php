<?php
/**
 * Title: 06. About Pattern
 * Slug: aegis/about-06
 * Categories: about
 * Description: A block pattern featuring an about section with a gradient background, a large image on the left, and content on the right, including a tagline, heading, description, and call-to-action button.
 * Keywords: about, image, full-width, call-to-action
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/image, core/paragraph, core/heading, core/button, core/buttons
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( '06. About Pattern', 'Name of the pattern', 'aegis' ); ?>","categories":["<?php echo esc_html_x( 'about', 'Name of the category', 'aegis' ); ?>"],"patternName":"aegis/about-06"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"gradient":"vertical-foreground-to-background","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull has-vertical-foreground-to-background-gradient-background has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:0;padding-bottom:var(--wp--preset--spacing--40);padding-left:0">
    <!-- wp:columns {"align":"full","style":{"spacing":{"margin":{"bottom":"0"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"gradient":"horizontal-foreground-to-background"} -->
    <div class="wp-block-columns alignfull has-horizontal-foreground-to-background-gradient-background has-background" style="margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
        <!-- wp:column {"width":"33.33%","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
        <div class="wp-block-column" style="padding-right:0;padding-left:0;flex-basis:33.33%">
            <!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"color":[],"border":{"radius":{"topLeft":null,"topRight":null,"bottomRight":null}},"shadow":"var:preset|shadow|tertiary-solid-shadow-left-top"}} -->
            <figure class="wp-block-image size-full"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_html__( 'Abstract illustration featuring the theme\'s logo. Please replace this image with your own.', 'aegis' ); ?>" style="box-shadow:var(--wp--preset--shadow--tertiary-solid-shadow-left-top);aspect-ratio:3/4;object-fit:cover" />
            </figure>
            <!-- /wp:image -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"66.66%","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"shadow":"var:preset|shadow|foreground-outlined-shadow-left-bottom"},"backgroundColor":"background"} -->
        <div class="wp-block-column is-vertically-aligned-center has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);box-shadow:var(--wp--preset--shadow--foreground-outlined-shadow-left-bottom);flex-basis:66.66%">
            <!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-15px"}}},"fontSize":"tiny"} -->
            <p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-15px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'Tagline', 'Enter a brief and descriptive tagline here.', 'aegis' ); ?></p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
            <h3 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Heading', 'Enter a compelling headline for this section.', 'aegis' ); ?></h3>
            <!-- /wp:heading -->

            <!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph -->
                <p><?php echo esc_html_x( 'Provide a concise description, up to 333 characters, summarizing your core principles, values, or key characteristics for easy understanding.', 'aegis' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap","orientation":"horizontal"}} -->
                <div class="wp-block-buttons">
                    <!-- wp:button {"className":"is-style-outline-shadow"} -->
                    <div class="wp-block-button is-style-outline-shadow"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action', 'Call-to-action button text', 'aegis' ); ?></a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->