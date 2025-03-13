<?php
/**
 * Title: 03. About Pattern
 * Slug: aegis/about-03
 * Categories: about
 * Description: Dual-column layout with an image on the left and a vertically aligned tagline, heading, paragraph, and social links on the right, designed for storytelling or team messaging.
 * Keywords: about, image, intro, mission, message, social links, team
 * Viewport Width: 1400
 * Block Types: core/column, core/columns, core/group, core/heading, core/image, core/paragraph, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( '03. About Pattern', 'Name of the pattern', 'aegis' ); ?>","categories":["<?php echo esc_html_x( 'about', 'Category name', 'aegis' ); ?>"],"patternName":"aegis/about-03"},"className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"gradient":"diagonal-primary-to-contrast-left-bottom","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-section-dark has-diagonal-primary-to-contrast-left-bottom-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
  <!-- wp:columns {"verticalAlignment":"center"} -->
  <div class="wp-block-columns are-vertically-aligned-center">

    <!-- wp:column {"verticalAlignment":"center","width":""} -->
    <div class="wp-block-column is-vertically-aligned-center">
      <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","style":{"shadow":"var:preset|shadow|primary-solid-shadow-right-bottom","border":{"width":"2px"}},"borderColor":"base"} -->
      <figure class="wp-block-image size-large has-custom-border is-style-default">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/thumb_1920x1200_light.webp"
             alt="<?php echo esc_attr__( 'Abstract illustration featuring the theme’s logo', 'aegis' ); ?>"
             class="has-border-color has-base-border-color"
             style="border-width:2px;box-shadow:var(--wp--preset--shadow--primary-solid-shadow-right-bottom);aspect-ratio:16/9;object-fit:cover" />
      </figure>
      <!-- /wp:image -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"center","width":""} -->
    <div class="wp-block-column is-vertically-aligned-center">

      <!-- wp:paragraph {"align":"left","metadata":{"name":"<?php echo esc_html_x( 'Tagline', 'Tagline label', 'aegis' ); ?>"}, "style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
      <p class="has-text-align-left has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase">
        <?php echo esc_html_x( 'Your tagline here', 'Short theme description or tagline', 'aegis' ); ?>
      </p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"xx-large"} -->
      <h2 class="wp-block-heading has-xx-large-font-size" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;text-transform:uppercase">
        <?php echo esc_html_x( 'About Us', 'Main heading (20–40 characters recommended)', 'aegis' ); ?>
      </h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
      <p style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)">
        <?php echo esc_html_x( 'Write a concise paragraph summarizing your core values or mission (max. 250 characters)', 'Paragraph with character limit guidance', 'aegis' ); ?>
      </p>
      <!-- /wp:paragraph -->

      <!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"wrap","orientation":"horizontal","justifyContent":"left"}} -->
      <div class="wp-block-group">
        <!-- wp:paragraph {"align":"left","className":"is-style-outline-shadow"} -->
        <p class="has-text-align-left is-style-outline-shadow" id="social-heading">
          <?php echo esc_html_x( 'Connect With Us', 'Heading above social media icons', 'aegis' ); ?>
        </p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->

      <!-- wp:social-links {"iconColor":"background","iconColorValue":"#f6f5f2","openInNewTab":true,"align":"left","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
      <ul class="wp-block-social-links alignleft has-icon-color is-style-logos-only">
        <!-- wp:social-link {"url":"#","service":"facebook","label":"<?php echo esc_attr_x( 'Facebook', 'Social link label', 'aegis' ); ?>"} /-->
        <!-- wp:social-link {"url":"#","service":"linkedin","label":"<?php echo esc_attr_x( 'LinkedIn', 'Social link label', 'aegis' ); ?>"} /-->
        <!-- wp:social-link {"url":"#","service":"threads","label":"<?php echo esc_attr_x( 'Threads', 'Social link label', 'aegis' ); ?>"} /-->
        <!-- wp:social-link {"url":"#","service":"x","label":"<?php echo esc_attr_x( 'X', 'Social link label', 'aegis' ); ?>"} /-->
        <!-- wp:social-link {"url":"#","service":"instagram","label":"<?php echo esc_attr_x( 'Instagram', 'Social link label', 'aegis' ); ?>"} /-->
        <!-- wp:social-link {"url":"#","service":"pinterest","label":"<?php echo esc_attr_x( 'Pinterest', 'Social link label', 'aegis' ); ?>"} /-->
        <!-- wp:social-link {"url":"#","service":"tiktok","label":"<?php echo esc_attr_x( 'TikTok', 'Social link label', 'aegis' ); ?>"} /-->
      </ul>
      <!-- /wp:social-links -->

    </div>
    <!-- /wp:column -->

  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->
