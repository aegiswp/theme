<?php
/**
 * Title: 02. About Pattern
 * Slug: aegis/about-02
 * Categories: about
 * Description: Two-column layout with content and call-to-action on the left, and media, tagline, and social links on the right, ideal for introducing your organization.
 * Keywords: about, introduction, mission, social media, team, tagline
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/column, core/columns, core/group, core/heading, core/image, core/paragraph, core/separator, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( '02. About Pattern', 'Name of the pattern', 'aegis' ); ?>","categories":["<?php echo esc_html_x( 'about', 'Category name', 'aegis' ); ?>"],"patternName":"aegis/about-02"},"gradient":"vertical-small-base-to-tertiary","layout":{"type":"default"}} -->
<div class="wp-block-group has-vertical-small-base-to-tertiary-gradient-background has-background">
  <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}}} -->
  <div class="wp-block-columns are-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">

    <!-- wp:column {"verticalAlignment":"center"} -->
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

      <!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"wrap","orientation":"horizontal","justifyContent":"left"}} -->
      <div class="wp-block-buttons">
        <!-- wp:button {"className":"is-style-dense-shadow"} -->
        <div class="wp-block-button is-style-dense-shadow">
          <a class="wp-block-button__link wp-element-button" href="#">
            <?php echo esc_html_x( 'Learn More', 'Call-to-action button text (10–15 characters recommended)', 'aegis' ); ?>
          </a>
        </div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"center"} -->
    <div class="wp-block-column is-vertically-aligned-center">

      <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-default","style":{"shadow":"var:preset|shadow|primary-faded-shadow-left-bottom","border":{"width":"2px"}},"borderColor":"base"} -->
      <figure class="wp-block-image size-large has-custom-border is-style-default">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/thumb_1920x1200_dark.webp"
             alt="<?php echo esc_attr__( 'Abstract illustration featuring the theme’s logo', 'aegis' ); ?>"
             class="has-border-color has-base-border-color"
             style="border-width:2px;box-shadow:var(--wp--preset--shadow--primary-faded-shadow-left-bottom);aspect-ratio:16/9;object-fit:cover" />
      </figure>
      <!-- /wp:image -->

      <!-- wp:paragraph {"align":"center","style":{"typography":{"letterSpacing":"3px","textTransform":"uppercase","fontStyle":"normal","fontWeight":"500"}},"fontSize":"medium"} -->
      <p class="has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:500;letter-spacing:3px;text-transform:uppercase">
        <?php echo esc_html_x( 'Follow Our Journey', 'Secondary tagline under image', 'aegis' ); ?>
      </p>
      <!-- /wp:paragraph -->

      <!-- wp:separator {"className":"is-style-default","backgroundColor":"foreground"} -->
      <hr class="wp-block-separator has-text-color has-foreground-color has-alpha-channel-opacity has-foreground-background-color has-background is-style-default" />
      <!-- /wp:separator -->

      <!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"small"} -->
      <p class="has-text-align-center has-small-font-size" id="social-heading" style="font-style:normal;font-weight:500">
        <?php echo esc_html_x( 'Connect With Us', 'Heading above social media icons', 'aegis' ); ?>
      </p>
      <!-- /wp:paragraph -->

      <!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#1c1c1e","openInNewTab":true,"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
      <ul class="wp-block-social-links has-icon-color is-style-logos-only">
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
