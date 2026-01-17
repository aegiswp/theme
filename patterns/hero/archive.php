<?php
/**
 * Title: Hero Archive
 * Slug: archive
 * Categories: hero
 * ID: 603
 */
?>

<!-- wp:group {"metadata":{"categories":["hero"],"patternName":"archive","name":"Archive"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|md"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"
    style="padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
    <!-- wp:query-title {"type":"archive","textAlign":"center"} /-->

    <!-- wp:post-terms {"term":"category","textAlign":"center","style":{"spacing":{"blockGap":"var:preset|spacing|xs","padding":{"right":"var:preset|spacing|xs","left":"var:preset|spacing|xs"}}},"align":"center","showAll":true} /-->
</div>
<!-- /wp:group -->