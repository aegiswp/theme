<?php
/**
 * Title: 04. CTA Pattern
 * Slug: aegis/cta-04
 * Categories: call-to-action
 * Description: Block pattern featuring an image alongside a tagline, heading, description, and call-to-action buttons.
 * Keywords: call-to-action, buttons, image, tagline, heading, description
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/column, core/columns, core/group, core/heading, core/image, core/paragraph, core/social-link, core/social-links, core/media-text
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["call-to-action"],"patternName":"aegis/cta-04","name":"04. CTA Pattern"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"0","right":"0"}}},"gradient":"diagonal-foreground-to-primary","layout":{"type":"default"}} -->
<div class="wp-block-group has-diagonal-foreground-to-primary-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0"><!-- wp:media-text {"align":"full","mediaId":544,"mediaLink":"<?php echo esc_url( get_theme_file_uri( 'assets/images/thumb_1920x1200_dark.webp' ) ); ?>","mediaType":"image","mediaWidth":60,"verticalAlignment":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"textColor":"background","gradient":"diagonal-foreground-to-transparent-right-bottom"} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-center has-background-color has-diagonal-foreground-to-transparent-right-bottom-gradient-background has-text-color has-background has-link-color" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;grid-template-columns:60% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/thumb_1920x1200_dark.webp' ) ); ?>" alt="<?php echo esc_attr__( 'Featured image showcasing our latest product or service offering', 'aegis' ); ?>" class="wp-image-544 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x( 'New Release', 'CTA tagline', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x( 'Introducing', 'CTA heading', 'aegis' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
<p style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html_x( 'Our newest product is now available with exclusive launch pricing. Be among the first to experience the features that will transform how you work.', 'CTA description', 'aegis' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-dense-shadow","style":{"border":{"radius":"0px","width":"2px"}},"borderColor":"contrast"} -->
<div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link has-border-color has-contrast-border-color wp-element-button" href="#" style="border-width:2px;border-radius:0px"><?php echo esc_html_x( 'Learn More', 'Secondary CTA button text', 'aegis' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"base","textColor":"contrast","className":"is-style-fill","style":{"border":{"radius":"0px"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}}} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:0px"><?php echo esc_html_x( 'Buy Now', 'Primary CTA button text', 'aegis' ); ?> <span class="wp-element-button__arrow" aria-hidden="true"><?php echo esc_html_x( '→', 'Arrow for CTA button', 'aegis' ); ?></span></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:media-text --></div>
<!-- /wp:group -->
