<?php
/**
 * Title: Related Posts: List
 * Slug: related-posts-list
 * Categories: blog
 * Keywords: related, posts, similar, recommended, list
 * Description: A horizontal list of related posts with small thumbnails, titles, and dates.
 * Viewport Width: 1280
 */
?>

<!-- wp:group {"metadata":{"categories":["blog"],"patternName":"related-posts-list","name":"Related Posts: List"},"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)"><!-- wp:aegis/related-posts {"postsPerPage":4,"columns":1,"styleVariant":"list","heading":"You May Also Like","headingTag":"h2","showFeaturedImage":true,"showDate":true,"showExcerpt":false,"showCategory":false,"taxonomySource":"auto","fallbackBehavior":"latest","imageAspectRatio":"1/1","align":"wide"} /--></div>
<!-- /wp:group -->
