<?php
/**
 * Title: 01. Archive Pattern
 * Slug: aegis/archive-01
 * Categories: archives
 * Description: Archive layout displaying posts in a grid format with featured images, metadata, and navigation. Ideal for category or date-based archives.
 * Keywords: archive, grid, posts, pagination, metadata, image
 * Viewport Width: 1400
 * Block Types: core/group, core/post-date, core/post-excerpt, core/post-featured-image, core/post-template, core/post-terms, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( '01. Archive Pattern', 'Name of the pattern', 'aegis' ); ?>","categories":["<?php echo esc_html_x( 'archives', 'Category name', 'aegis' ); ?>"],"patternName":"aegis/archive-01"},"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

  <!-- wp:group -->
  <div class="wp-block-group">
    <!-- wp:query-title {"type":"archive","level":2} /-->
  </div>
  <!-- /wp:group -->

  <!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"align":"wide","layout":{"type":"default"}} -->
  <div class="wp-block-query alignwide">

    <!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"100rem"}} -->

    <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"},"margin":{"bottom":"0"}}}} -->
    <div class="wp-block-group" style="margin-bottom:0;padding-bottom:var(--wp--preset--spacing--30)">

      <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->

      <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"margin":{"top":"0"}}},"backgroundColor":"tertiary","layout":{"type":"flex","justifyContent":"space-between","orientation":"horizontal"}} -->
      <div class="wp-block-group has-tertiary-background-color has-background" style="margin-top:0;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
        <!-- wp:post-terms {"term":"category","textAlign":"right","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"contrast","fontSize":"small"} /-->
        <!-- wp:post-date {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"fontSize":"small"} /-->
      </div>
      <!-- /wp:group -->

      <!-- wp:post-title {"level":3,"isLink":true,"className":"is-style-hide-underline","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"foreground","fontSize":"xx-large"} /-->

      <!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false} /-->
    </div>
    <!-- /wp:group -->

    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"primary","fontSize":"small","layout":{"type":"flex","justifyContent":"space-between","orientation":"horizontal"}} -->
      <!-- wp:query-pagination-previous {"label":"Previous Page"} /-->
      <!-- wp:query-pagination-numbers /-->
      <!-- wp:query-pagination-next {"label":"Next Page"} /-->
    <!-- /wp:query-pagination -->

  </div>
  <!-- /wp:query -->
</div>
<!-- /wp:group -->
