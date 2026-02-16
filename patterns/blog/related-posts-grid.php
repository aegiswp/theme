<?php
/**
 * Title: Related Posts: Grid
 * Slug: related-posts-grid
 * Categories: blog
 * Keywords: related, posts, similar, recommended, grid
 * Description: A 3-column grid of related posts with featured image, date, category, title, and excerpt.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"related-posts-grid","name":"Related Posts: Grid"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:aegis/related-posts {"postsPerPage":3,"columns":3,"styleVariant":"grid","heading":"Related Posts","headingTag":"h2","showFeaturedImage":true,"showDate":true,"showExcerpt":true,"showCategory":true,"taxonomySource":"auto","fallbackBehavior":"latest","excerptLength":20,"imageAspectRatio":"16/9","align":"wide"} /--></div>
<!-- /wp:group -->
