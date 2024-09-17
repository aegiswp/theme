<?php
/**
 * Title: 01. About Pattern
 * Slug: aegis/about-01
 * Categories: about
 * Description: An About section pattern with a diagonal gradient background, featuring an image with a custom border and shadow, a tagline, a section title, a short description, and a call-to-action button. Designed to effectively communicate key values or characteristics.
 * Keywords: about, section, image, tagline, title, description, call-to-action, gradient, border, shadow
 * Viewport Width: 1400
 * Block Types: core/group, core/columns, core/column, core/image, core/paragraph, core/heading, core/buttons, core/button
 * Inserter: true
 * 
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('01. About Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["about"],"patternName":"aegis/about-03"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"gradient":"diagonal-tertiary-to-background","layout":{"type":"default"}} -->
<div class="wp-block-group has-diagonal-tertiary-to-background-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":2091,"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","style":{"shadow":"var:preset|shadow|foreground-shadow-right-bottom","border":{"width":"2px"}},"borderColor":"foreground"} -->
<figure class="wp-block-image size-large has-custom-border is-style-default"><img src="https://aegiswp.local/wp-content/uploads/2024/08/thumb_1920x1200_dark-1024x640.webp" alt="Placeholder image depicting abstract mountains and a sun. Replaced with your image." class="has-border-color has-foreground-border-color wp-image-2091" style="border-width:2px;box-shadow:var(--wp--preset--shadow--foreground-shadow-right-bottom);aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-20px"}}},"fontSize":"tiny"} -->
<p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-20px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase">Enter your tagline here</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
<h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase">Section Title</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Provide a short description (up to 333 characters) highlighting the core principles, values, or characteristics.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap","orientation":"horizontal"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-dense-shadow"} -->
<div class="wp-block-button is-style-dense-shadow"><a class="wp-block-button__link wp-element-button" href="#">Call to Action</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x('01. About Pattern', 'Name of the pattern', 'aegis'); ?>","categories":["about"],"patternName":"aegis/about-01"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"gradient":"diagonal-tertiary-to-background","layout":{"type":"default"}} -->
<div class="wp-block-group has-diagonal-tertiary-to-background-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">

  <!-- wp:columns {"verticalAlignment":"center"} -->
  <div class="wp-block-columns are-vertically-aligned-center">

    <!-- wp:column {"verticalAlignment":"center"} -->
    <div class="wp-block-column is-vertically-aligned-center">

      <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","style":{"shadow":"var:preset|shadow|foreground-shadow-right-bottom","border":{"width":"2px"}},"borderColor":"foreground"} -->
      <figure class="wp-block-image size-large has-custom-border is-style-default">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/thumb_1200x1920_dark.webp" alt="<?php echo esc_attr_e('Placeholder image depicting abstract mountains and a sun. Replace with your image.', 'aegis'); ?>" class="has-border-color has-foreground-border-color" style="border-width:2px;box-shadow:var(--wp--preset--shadow--foreground-shadow-right-bottom);aspect-ratio:16/9;object-fit:cover" />
      </figure>
      <!-- /wp:image -->

    </div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"center"} -->
    <div class="wp-block-column is-vertically-aligned-center">

      <!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"-20px"}}},"fontSize":"tiny"} -->
      <p class="has-text-align-left has-tiny-font-size" style="margin-bottom:-20px;font-style:normal;font-weight:400;letter-spacing:3px;text-transform:uppercase"><?php echo esc_html_x('Enter tagline here', 'Replace with a descriptive section tagline.', 'aegis'); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"gigantic"} -->
      <h2 class="wp-block-heading has-gigantic-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase"><?php echo esc_html_x('Section Title', 'Replace with a descriptive section title.', 'aegis'); ?></h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph -->
      <p>
        <?php echo esc_html_x('Provide a short description (up to 333 characters) highlighting the core principles, values, or characteristics.', 'Replace with a descriptive section description.', 'aegis'); ?>
      </p>
      <!-- /wp:paragraph -->

      <!-- wp:buttons {"layout":{"type":"flex","flexWrap":"nowrap","orientation":"horizontal"}} -->
      <div class="wp-block-buttons">

        <!-- wp:button {"className":"is-style-dense-shadow"} -->
        <div class="wp-block-button is-style-dense-shadow">
          <a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Call to Action', 'Call to action button text.', 'aegis' ); ?></a>
        </div>
        <!-- /wp:button -->

      </div>
      <!-- /wp:buttons -->

    </div>
    <!-- /wp:column -->

  </div>
  <!-- /wp:columns -->

</div>
<!-- /wp:group -->