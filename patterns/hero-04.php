<?php
/**
 * Title: 04. Hero Pattern
 * Slug: aegis/hero-04
 * Categories: hero
 * Description: Full-width hero with a vertical layout, tagline, heading, description, and decorative elements with laurels.
 * Keywords: hero, event, cover
 * Viewport Width: 1400
 * Block Types: core/group, core/cover, core/heading, core/paragraph, core/columns, core/column, core/image
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('04. Hero Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["<?php echo esc_html_x('hero', 'Name of the category', 'aegis'); ?>"],"patternName":"aegis/hero-03"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp","alt":"<?php echo esc_attr__('Placeholder image depicting abstract mountains and a sun. Replace with your image.', 'aegis'); ?>","dimRatio":60,"overlayColor":"foreground","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-cover alignwide" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50);min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background" alt="<?php echo esc_attr__('Placeholder image depicting abstract mountains and a sun. Replace with your image.', 'aegis'); ?>" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1920x1200_dark.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left","metadata":{"name":"Tagline"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-30px"}}},"fontSize":"tiny"} -->
<p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-30px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('Tagline', 'Replace with a descriptive tagline.', 'aegis'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
<h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x('Heading', 'Replace with a descriptive headline.', 'aegis'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"layout":{"selfStretch":"fixed","flexSize":"50%"},"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
<p class="has-text-align-center" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0"><?php echo esc_html_x('Provide a brief description with a maximum of 155 characters. Highlight key details of awards, including criteria, recipients, or event information.', 'Replace with a description of the section.', 'aegis'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"75%","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"blockGap":{"left":"var:preset|spacing|80"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:column {"verticalAlignment":"center","width":"22%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:22%"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","isDecorative":true} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_left.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:40px"/></figure>
<!-- /wp:image -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:600;letter-spacing:3px;line-height:1;text-transform:uppercase"><?php echo esc_html_x('Category', 'Replace with a descriptive category.', 'aegis'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:0"><?php echo esc_html_x('Nominee', 'Replace with the name of a nominee.', 'aegis'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","isDecorative":true} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_right.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:40px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"22%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:22%"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","isDecorative":true} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_left.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:40px"/></figure>
<!-- /wp:image -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:600;letter-spacing:3px;line-height:1;text-transform:uppercase"><?php echo esc_html_x('Category', 'Replace with a descriptive category.', 'aegis'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:0"><?php echo esc_html_x('Nominee', 'Replace with the name of a nominee.', 'aegis'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","isDecorative":true} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_right.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:40px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"22%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:22%"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","isDecorative":true} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_left.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:40px"/></figure>
<!-- /wp:image -->

<!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"600","lineHeight":"1"}},"fontSize":"small"} -->
<p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:600;letter-spacing:3px;line-height:1;text-transform:uppercase"><?php echo esc_html_x('Category', 'Replace with a descriptive category.', 'aegis'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:0"><?php echo esc_html_x('Nominee', 'Replace with the name of a nominee.', 'aegis'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:image {"width":"40px","sizeSlug":"full","linkDestination":"none","isDecorative":true} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/laurel_right.svg" alt="<?php echo esc_attr__('This image is decorative', 'aegis'); ?>" style="width:40px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->