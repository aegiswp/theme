<?php
/**
 * Title: 02. Archive Pattern
 * Slug: aegis/archive-02
 * Categories: archives
 * Description: Minimal archive layout with featured image overlays, titles, excerpts, and pagination, ideal for showcasing content in a clean visual grid.
 * Keywords: archive, content grid, posts, summary, featured image, excerpt, pagination
 * Viewport Width: 1400
 * Block Types: core/group, core/post-excerpt, core/post-featured-image, core/post-template, core/post-title, core/query, core/query-pagination, core/query-pagination-next, core/query-pagination-numbers, core/query-pagination-previous, core/query-title
 * Inserter: true
 *
 * @package aegis
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( '02. Archive Pattern', 'Name of the pattern', 'aegis' ); ?>","categories":["<?php echo esc_html_x( 'archives', 'Category name', 'aegis' ); ?>"],"patternName":"aegis/archive-02"},"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0">

  <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"stretch","orientation":"vertical"}} -->
  <div class="wp-block-group alignwide">
    <!-- wp:query-title {"type":"archive","level":2} /-->
  </div>
  <!-- /wp:group -->

  <!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"align":"wide","layout":{"type":"default"}} -->
  <div class="wp-block-query alignwide">

    <!-- wp:post-template {"align":"wide","layout":{"type":"default"}} -->

    <!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"},"margin":{"bottom":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">

      <!-- wp:post-title {"level":3,"isLink":true,"className":"is-style-aegis-post-title-hide-underline","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"xx-large"} /-->

      <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","dimRatio":100,"gradient":"diagonal-transparent-to-tiny-tertiary-right-bottom"} /-->

      <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"1rem","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"tertiary","layout":{"type":"default"}} -->
      <div class="wp-block-group has-tertiary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:1rem;padding-left:var(--wp--preset--spacing--20)">
        <!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"className":"is-style-default","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} /-->
      </div>
      <!-- /wp:group -->

    </div>
    <!-- /wp:group -->

    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"fontSize":"small","layout":{"type":"flex","justifyContent":"space-between"}} -->
      <!-- wp:query-pagination-previous {"label":"Previous Posts"} /-->
      <!-- wp:query-pagination-numbers /-->
      <!-- wp:query-pagination-next {"label":"Next Posts"} /-->
    <!-- /wp:query-pagination -->

  </div>
  <!-- /wp:query -->

</div>
<!-- /wp:group -->
