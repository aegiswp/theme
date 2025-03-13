<?php
/**
 * Title: 03. Archive Pattern
 * Slug: aegis/archive-03
 * Categories: archives
 * Description: Immersive full-height cover archive pattern with dark overlay, titles, metadata, and excerpts, ideal for visually rich archives or feature sections.
 * Keywords: archive, cover, grid, excerpt, featured image, overlay, dark theme, metadata, pagination
 * Viewport Width: 1400
 * Block Types: core/group, core/cover, core/post-date, core/post-excerpt, core/post-template, core/post-terms, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( '03. Archive Pattern', 'Name of the pattern', 'aegis' ); ?>","categories":["<?php echo esc_html_x( 'archives', 'Category name', 'aegis' ); ?>"],"patternName":"aegis/archive-03"},"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0">

  <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"stretch","orientation":"vertical"}} -->
  <div class="wp-block-group alignwide">
    <!-- wp:query-title {"type":"archive","level":2} /-->
  </div>
  <!-- /wp:group -->

  <!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"tagName":"main","align":"wide","layout":{"type":"default"}} -->
  <main class="wp-block-query alignwide">

    <!-- wp:post-template {"align":"wide","layout":{"type":"default"}} -->

    <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"},"margin":{"bottom":"var:preset|spacing|30"}}},"backgroundColor":"quaternary"} -->
    <div class="wp-block-group has-quaternary-background-color has-background" style="margin-bottom:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">

      <!-- wp:cover {"useFeaturedImage":true,"dimRatio":70,"overlayColor":"contrast","isUserOverlayColor":true,"minHeight":100,"minHeightUnit":"vh","tagName":"article","className":"is-dark","layout":{"type":"constrained"}} -->
      <article class="wp-block-cover is-dark" style="min-height:100vh">
        <span aria-hidden="true" class="wp-block-cover__background has-contrast-background-color has-background-dim-70 has-background-dim"></span>
        <div class="wp-block-cover__inner-container">
          <!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"className":"is-style-aegis-post-title-hide-underline","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|quaternary"}}}}},"textColor":"background","fontSize":"xx-large"} /-->
        </div>
      </article>
      <!-- /wp:cover -->

      <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","right":"var:preset|spacing|20","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20"},"margin":{"top":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"contrast","textColor":"base","layout":{"type":"flex","justifyContent":"space-between","verticalAlignment":"center","orientation":"horizontal"}} -->
      <div class="wp-block-group has-base-color has-contrast-background-color has-text-color has-background has-link-color" style="margin-top:0;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)">
        <!-- wp:post-terms {"term":"category","textAlign":"right","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|quaternary"}},"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"small"} /-->

        <!-- wp:post-date {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|quaternary"}},"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"small"} /-->
      </div>
      <!-- /wp:group -->

      <!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"className":"is-style-default","style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} /-->

    </div>
    <!-- /wp:group -->

    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"small","layout":{"type":"flex","justifyContent":"space-between"}} -->
      <!-- wp:query-pagination-previous {"label":"Previous Posts"} /-->
      <!-- wp:query-pagination-numbers /-->
      <!-- wp:query-pagination-next {"label":"Next Posts"} /-->
    <!-- /wp:query-pagination -->

  </main>
  <!-- /wp:query -->

</div>
<!-- /wp:group -->
