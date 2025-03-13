<?php
/**
 * Title: 08. Archive Pattern
 * Slug: aegis/archive-08
 * Categories: archives
 * Description: Dual-column archive layout integrating an author bio, dynamic advertisement, product showcase, and a modern post grid with refined spacing and intuitive pagination.
 * Keywords: archive, author, ad, product, grid, blog, pagination
 * Viewport Width: 1400
 * Block Types: core/button, core/buttons, core/columns, core/column, core/group, core/heading, core/image, core/paragraph, core/post-date, core/post-excerpt, core/post-featured-image, core/post-template, core/post-terms, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title, core/social-link, core/social-links
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( '08. Archive Pattern', 'Pattern name for inserter', 'aegis' ); ?>","categories":["<?php echo esc_html_x( 'archives', 'Block pattern category', 'aegis' ); ?>"],"patternName":"aegis/archive-08"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">

  <!-- wp:columns {"align":"wide"} -->
  <div class="wp-block-columns alignwide">

    <!-- wp:column {"width":"33.33%","className":"is-style-hide-mobile"} -->
    <div class="wp-block-column is-style-hide-mobile" style="flex-basis:33.33%">

      <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"border":{"width":"1px"}},"backgroundColor":"tertiary","borderColor":"foreground"} -->
      <div class="wp-block-group has-border-color has-foreground-border-color has-tertiary-background-color has-background" style="border-width:1px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">

        <!-- wp:image {"width":"120px","aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none","align":"center","className":"is-resized is-style-rounded"} -->
        <figure class="wp-block-image aligncenter size-large is-resized is-style-rounded">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/thumb_800x800_dark.webp' ); ?>" alt="<?php echo esc_attr_x( 'Profile photo placeholder. Replace with author image.', 'Image alt text', 'aegis' ); ?>" style="aspect-ratio:1;object-fit:cover;width:120px" />
        </figure>
        <!-- /wp:image -->

        <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
        <h3 class="wp-block-heading has-text-align-center has-large-font-size">
          <?php echo esc_html_x( 'Author Name', 'Default author name', 'aegis' ); ?>
        </h3>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"textAlign":"center","style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"5px","bottom":"0"}}},"fontSize":"tiny"} -->
        <p class="has-text-align-center has-tiny-font-size" style="margin-top:5px;margin-bottom:0;text-transform:uppercase">
          <?php echo esc_html_x( 'Position', 'Default position under author name', 'aegis' ); ?>
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"textAlign":"center","fontSize":"small"} -->
        <p class="has-text-align-center has-small-font-size">
          <?php echo esc_html_x( 'Brief biography for the author. Max 160 characters.', 'Default author bio', 'aegis' ); ?>
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:social-links {"iconColor":"tertiary","iconColorValue":"#f3f4f5","iconBackgroundColor":"foreground","iconBackgroundColorValue":"#211F1D","className":"is-style-default","layout":{"type":"flex","justifyContent":"center"}} -->
        <ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-default">
          <!-- wp:social-link {"url":"#","service":"facebook","label":"<?php echo esc_attr_x( 'Facebook', 'Social label', 'aegis' ); ?>"} /-->
          <!-- wp:social-link {"url":"#","service":"linkedin","label":"<?php echo esc_attr_x( 'LinkedIn', 'Social label', 'aegis' ); ?>"} /-->
          <!-- wp:social-link {"url":"#","service":"instagram","label":"<?php echo esc_attr_x( 'Instagram', 'Social label', 'aegis' ); ?>"} /-->
          <!-- wp:social-link {"url":"#","service":"wordpress","label":"<?php echo esc_attr_x( 'WordPress', 'Social label', 'aegis' ); ?>"} /-->
        </ul>
        <!-- /wp:social-links -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"backgroundColor":"contrast","textColor":"base","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} -->
      <div class="wp-block-group has-base-color has-contrast-background-color has-text-color has-background has-link-color">

        <!-- wp:paragraph {"textAlign":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px"}},"fontSize":"small"} -->
        <p class="has-text-align-left has-small-font-size" style="text-transform:uppercase;letter-spacing:3px;">
          <?php echo esc_html_x( 'Ad Space', 'Ad banner heading', 'aegis' ); ?>
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
        <figure class="wp-block-image aligncenter size-full">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/thumb_1920x1200_dark.webp' ); ?>" alt="<?php echo esc_attr_x( 'Advertisement placeholder image. Replace with actual ad creative.', 'Image alt text', 'aegis' ); ?>" style="aspect-ratio:1;object-fit:cover" />
        </figure>
        <!-- /wp:image -->
      </div>
      <!-- /wp:group -->

      <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40"}},"border":{"width":"1px"}},"backgroundColor":"tertiary","borderColor":"foreground"} -->
      <div class="wp-block-group has-border-color has-foreground-border-color has-tertiary-background-color has-background" style="border-width:1px;padding-bottom:var(--wp--preset--spacing--40)">

        <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center"} -->
        <figure class="wp-block-image aligncenter size-full">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/thumb_1920x1200_dark.webp' ); ?>" alt="<?php echo esc_attr_x( 'Product feature image placeholder. Replace with product photo.', 'Image alt text', 'aegis' ); ?>" style="aspect-ratio:16/9;object-fit:cover" />
        </figure>
        <!-- /wp:image -->

        <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"var:preset|spacing|40","bottom":"0","left":"var:preset|spacing|40"}}}} -->
        <div class="wp-block-group" style="padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)">

          <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
          <h3 class="wp-block-heading has-text-align-center has-large-font-size">
            <?php echo esc_html_x( 'Product Name', 'Default product title', 'aegis' ); ?>
          </h3>
          <!-- /wp:heading -->

          <!-- wp:paragraph {"textAlign":"center","fontSize":"small"} -->
          <p class="has-text-align-center has-small-font-size">
            <?php echo esc_html_x( 'Short product description or offer.', 'Default product excerpt', 'aegis' ); ?>
          </p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons">
          <!-- wp:button {"className":"is-style-outline"} -->
          <div class="wp-block-button is-style-outline">
            <a class="wp-block-button__link" href="#">
              <?php echo esc_html_x( 'Buy Now', 'Call to action', 'aegis' ); ?>
            </a>
          </div>
          <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"66.66%"} -->
    <div class="wp-block-column" style="flex-basis:66.66%">

      <!-- wp:query {"query":{"perPage":6,"postType":"post","order":"desc","orderBy":"date","inherit":false}} -->
      <div class="wp-block-query">

        <!-- wp:post-template -->
        <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->
        <!-- wp:post-date {"fontSize":"small"} /-->
        <!-- wp:post-title {"level":3,"isLink":true,"fontSize":"xx-large"} /-->
        <!-- wp:post-excerpt {"excerptLength":25} /-->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","fontSize":"small","layout":{"type":"flex","justifyContent":"space-between"}} -->
          <!-- wp:query-pagination-previous {"label":"<?php echo esc_html_x( 'Previous Posts', 'Pagination label', 'aegis' ); ?>"} /-->
          <!-- wp:query-pagination-numbers /-->
          <!-- wp:query-pagination-next {"label":"<?php echo esc_html_x( 'Next Posts', 'Pagination label', 'aegis' ); ?>"} /-->
        <!-- /wp:query-pagination -->
      </div>
      <!-- /wp:query -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->
